<!-- Controller part of the login page -->

<?php

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'Model/login.php';
  }

  else {
    require 'View/login_page.php';
  }

?>
