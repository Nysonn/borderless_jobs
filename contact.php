<?php include 'partials/header.php'; ?>

<link rel="stylesheet" href="contact.css">

  <div class="main-container">
    <div class="contact-container">
      <h2>Contact Us</h2>
      <form class="contact-form" action="send_contact_email.php" method="POST">
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" required>
        </div>
        
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" name="phone">
        </div>
        
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="4" required></textarea>
        </div>
        
        <div class="form-group">
          <button type="submit" class="submit-btn">Submit</button>
        </div>
      </form>
    </div>
  </div>
  
</body>

<?php include 'partials/footer.php'; ?>