<!-- Controller part of the register page. -->

<?php

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'Model/register.php';
  }

  else {
    require 'View/register_page.php';
  }

?>
