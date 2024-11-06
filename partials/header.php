<!DOCTYPE php>
<php lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
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