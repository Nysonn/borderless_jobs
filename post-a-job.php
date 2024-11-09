<?php
session_start();

// Check if the user is logged in, if not, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");  // Redirect to login if not logged in
    exit();  // Stop further execution
}

require_once 'db-connect.php'; // Include database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $job_title = $_POST['job_title'];
    $job_category = $_POST['job_category'];
    $job_location = $_POST['job_location'];
    $job_description = $_POST['job_description'];
    $user_id = $_SESSION['user_id']; // Get the logged-in user's ID

    // Handle the image upload
    $image_url = null; // Default value if no image is uploaded

    if (isset($_FILES['job_image']) && $_FILES['job_image']['error'] === UPLOAD_ERR_OK) {
        // Image is uploaded, move it to a desired folder
        $upload_dir = 'uploads/jobs/'; // Ensure this folder is writable
        $image_name = basename($_FILES['job_image']['name']);
        $image_path = $upload_dir . $image_name;

        // Check if the file is an image (optional, but recommended for security)
        if (getimagesize($_FILES['job_image']['tmp_name']) !== false) {
            if (move_uploaded_file($_FILES['job_image']['tmp_name'], $image_path)) {
                $image_url = $image_path; // Store the image path in the database
            } else {
                echo "Error uploading the image.";
            }
        } else {
            echo "The uploaded file is not a valid image.";
        }
    }

    // Prepare the SQL query to insert the job data
    try {
        $sql = "INSERT INTO jobs (job_title, category, location, job_description, image_url, user_id) 
                VALUES (:job_title, :category, :location, :job_description, :image_url, :user_id)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':job_title', $job_title);
        $stmt->bindParam(':category', $job_category);
        $stmt->bindParam(':location', $job_location);
        $stmt->bindParam(':job_description', $job_description);
        $stmt->bindParam(':image_url', $image_url);
        $stmt->bindParam(':user_id', $user_id);

        // Execute the query
        if ($stmt->execute()) {
            // If the job was successfully posted, redirect to the post-a-job page or a confirmation page
            header("Location: jobs.php");
            exit(); // Stop further execution
        } else {
            echo "Error: Could not post the job.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <title>Post a Job</title>
    <link rel="stylesheet" href="post-a-job.css">
</head>
<body>
    <div class="post-job-container">
        <h2>Post a New Job</h2>
        <form action="post-a-job.php" method="POST" enctype="multipart/form-data">
            <!-- Row for Job Title and Job Category -->
            <div class="form-row">
                <div class="form-group">
                    <label for="job-title">Job Title</label>
                    <input type="text" id="job-title" name="job_title" required>
                </div>
                <div class="form-group">
                    <label for="job-category">Category</label>
                    <input type="text" id="job-category" name="job_category" placeholder="e.g., Home Assistance" required>
                </div>
            </div>

            <!-- Job Location -->
            <div class="form-group">
                <label for="job-location">Location</label>
                <input type="text" id="job-location" name="job_location" placeholder="e.g., Kyanja, Kampala" required>
            </div>

            <!-- Job Description -->
            <div class="form-group">
                <label for="job-description">Job Description</label>
                <textarea id="job-description" name="job_description" rows="5" required></textarea>
            </div>

            <!-- Job Image Upload -->
            <div class="form-group">
                <label for="job-image">Upload Image (optional)</label>
                <input type="file" id="job-image" name="job_image" accept="image/*">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Post Job</button>
        </form>
    </div>
</body>
</html>
