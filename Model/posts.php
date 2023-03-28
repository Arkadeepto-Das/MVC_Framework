<?php

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST)) {

      $postText = $_POST["text"];

      require 'Model/SendQuery.php';
      $query = new SendQuery();

      if(isset($postText)) {
        
        if(isset($postImage)) {
          $query->addPosts($GLOBALS["email"], $postText, $postImage);
        }
  
        else {
          $query->addPosts($GLOBALS["email"], $postText);
        }
  
      }
  
      else {
  
        if(isset($postImage)) {
          $query->addPosts($GLOBALS["email"], NULL, $postImage);
        }
  
      }
  
    }

  }

  $_SESSION["postsData"] = $query->fetchPosts();
  require 'View/posts_page.php';

?>