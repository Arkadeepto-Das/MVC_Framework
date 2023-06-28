<!-- Controller part of the reset password page. -->

<?php

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'Model/reset.php';
  }

  else {
    require 'View/reset_page.php';
  }

?>
