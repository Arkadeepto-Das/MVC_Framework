<?php

  session_start();

  if($_SESSION["login"] === TRUE) {
    require 'Model/posts.php';
  }

  else {
    require 'Controller/login.php';
  }

?>
