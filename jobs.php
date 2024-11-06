<!DOCTYPE php>
<php lang="en">
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
      <div class="job-card">
        <div class="job-image">
          <img src="images/cleaning.jpg" alt="Job Image">
        </div>
        <div class="job-details">
          <h3>Cleaning</h3>
          <p><strong>Category:</strong> Home Assistance</p>
          <p><strong>Location:</strong> Kyanja, Kampala</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque nulla eu.</p>
          <button class="contact-btn">Contact</button>
        </div>
      </div>
     
      <div class="job-card">
        <div class="job-image">
          <img src="images/tracker-farm.jpg" alt="Job Image">
        </div>
        <div class="job-details">
          <h3>Farming Help</h3>
          <p><strong>Category:</strong> Agriculture</p>
          <p><strong>Location:</strong> Seeta, Mukono</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque nulla eu.</p>
          <button class="contact-btn">Contact</button>
        </div>
      </div>

      <div class="job-card">
        <div class="job-image">
          <img src="images/glass-lands.jpg" alt="Job Image">
        </div>
        <div class="job-details">
          <h3>Land Clearing</h3>
          <p><strong>Category:</strong> Compound Work</p>
          <p><strong>Location:</strong> Kihumuro, Mbarara</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque nulla eu.</p>
          <button class="contact-btn">Contact</button>
        </div>
      </div>


      <div class="job-card">
        <div class="job-image">
          <img src="images/sweeping.jpg" alt="Job Image">
        </div>
        <div class="job-details">
          <h3>House Help</h3>
          <p><strong>Category:</strong> Home Assistance</p>
          <p><strong>Location:</strong> Ntinda, Kampala</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque nulla eu.</p>
          <button class="contact-btn">Contact</button>
        </div>
      </div>

      <div class="job-card">
        <div class="job-image">
          <img src="images/baby-sitting.jpg" alt="Job Image">
        </div>
        <div class="job-details">
          <h3>Baby-sitter</h3>
          <p><strong>Category:</strong> Home Assistance</p>
          <p><strong>Location:</strong> Kisaasi, Kampala</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque nulla eu.</p>
          <button class="contact-btn">Contact</button>
        </div>
      </div>
  


        <div class="job-card">
        <div class="job-image">
          <img src="images/cab-driver.jpg" alt="Job Image">
        </div>
        <div class="job-details">
          <h3>Taxi Driver</h3>
          <p><strong>Category:</strong> Transport</p>
          <p><strong>Location:</strong> Entebbe</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque nulla eu.</p>
          <button class="contact-btn">Contact</button>
        </div>
      </div>

        <div class="job-card">
        <div class="job-image">
          <img src="images/construction-work.jpg" alt="Job Image">
        </div>
        <div class="job-details">
          <h3>Site Worker</h3>
          <p><strong>Category:</strong> Construction</p>
          <p><strong>Location:</strong> Kasangatti</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque nulla eu.</p>
          <button class="contact-btn">Contact</button>
        </div>
      </div>

        <div class="job-card">
        <div class="job-image">
          <img src="images/cooks.jpg" alt="Job Image">
        </div>
        <div class="job-details">
          <h3>A Cook</h3>
          <p><strong>Category:</strong> Kitchen Work</p>
          <p><strong>Location:</strong> Kyadondo</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque nulla eu.</p>
          <button class="contact-btn">Contact</button>
        </div>
      </div>

      <div class="more-jobs">
        <button class="see-more-button">
          See more
         </button>
      </div>
     
     </div>
  </div>
</body>


<?php include 'partials/footer.php'; ?>