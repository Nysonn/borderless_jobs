<?php
session_start(); // Start the session at the top of the file

// Set session cookie for 1 hour
$cookie_expiration = time() + 3600; // 1 hour expiration

// Include the database connection
include('db-connect.php'); 

// Fetch job listings from the database using PDO
try {
    // Prepare the SQL query to fetch job listings
    $sql = "SELECT id, job_title, category, location, job_description, image_url, user_id, created_at FROM jobs";
    $stmt = $pdo->prepare($sql);
    
    // Execute the query
    $stmt->execute();
    
    // Check if there are results
    if ($stmt->rowCount() > 0) {
        $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Fetch all the results
    } else {
        echo "No job listings found.";
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="jobs.css">
  <title>Borderless Jobs</title>
</head>
<body>
  <header>
    <div class="container">
      <div class="title">
        <h1>Borderless <strong>Jobs</strong></h1>
      </div>
      <nav class="navbar">
        <div class="menu-icon" id="menu-icon" onclick="toggleMenu()">☰</div>
        <ul id="menu">
          <div class="close-icon" id="close-icon" onclick="toggleMenu()">✖</div>
          <li><a href="index.php">Home</a></li>
          <li><a href="jobs.php">Jobs</a></li>
          <li><a href="guide.php">Guide</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="search-container">
    <div class="search-content">
      <h2>Find Jobs Near You</h2>
      <p>Search for the location where you stay to find jobs that match your area.</p>
      <form class="search-form">
        <input type="text" placeholder="Enter your location..." required>
        <button type="submit">Search</button>
      </form>
    </div>
  </div>

  <div class="main-container">

    <!-- Job Listings -->
    <div class="jobs-container">
    <?php
    // Loop through the job listings and display them
    foreach ($jobs as $row) {
        // Extract job details
        $job_title = $row['job_title'];
        $job_category = $row['category'];
        $job_location = $row['location'];
        $job_description = $row['job_description'];
        $job_image = $row['image_url'];  // Corrected to 'image_url'
    ?>
      <div class="job-card">
        <div class="job-image">
          <!-- If image exists, display it, otherwise use a placeholder -->
          <img src="<?php echo htmlspecialchars($job_image) ?: 'images/cleaning.jpg'; ?>" alt="Job Image">
        </div>
        <div class="job-details">
          <h3><?php echo htmlspecialchars($job_title); ?></h3>
          <p><strong>Category:</strong> <?php echo htmlspecialchars($job_category); ?></p>
          <p><strong>Location:</strong> <?php echo htmlspecialchars($job_location); ?></p>
          <p><?php echo nl2br(htmlspecialchars($job_description)); ?></p>
          <button class="contact-btn">Contact</button>
        </div>
      </div>
    <?php
    }
    ?>
      <div class="more-jobs">
        <button class="see-more-button">
          See more
         </button>
      </div>
    </div>
  </div>
</body>

<?php include 'partials/footer.php'; ?>
</html>
