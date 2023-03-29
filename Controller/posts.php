<!-- Controller part of the posts page -->

<?php

  session_start();

  if(isset($_SESSION["login"]) && $_SESSION["login"] === TRUE) {
    require 'Model/posts.php';
  }

  else {
    require 'Controller/login.php';
  }

?>
