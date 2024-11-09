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
        <form action="submit-job.php" method="POST" enctype="multipart/form-data">
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
