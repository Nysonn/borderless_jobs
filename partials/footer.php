<footer>
  <div class="footer-container">
    <div class="footer-left">
       <h2>Borderless Jobs</h2> 
    <p>&copy; <span id="year"></span> All rights reserved.</p>
    </div>
    <div class="footer-right">
      <a href="#"><img src="images/facebook.png" alt="Facebook"></a>
      <a href="#"><img src="images/twitter.png" alt="Twitter"></a>
      <a href="#"><img src="images/instagram.png" alt="Instagram"></a>
    </div>
  </div>
</footer> 

<!--CURRENT-YEAR-->
<script>
      document.getElementById('year').textContent = new Date().getFullYear();

      function toggleMenu() {
      const menu = document.getElementById('menu');
      const closeIcon = document.getElementById('close-icon');

      menu.classList.toggle('active');
      closeIcon.classList.toggle('active');
      }

    
</script>