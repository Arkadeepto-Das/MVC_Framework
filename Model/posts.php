<!-- Model part of the posts page. -->

<?php

  if(isset($_POST) && $_POST != Array()) {

    require 'Model/SendQuery.php';
    $query = new SendQuery();

    $postText = $_POST["text"];
    $postText = htmlspecialchars($postText, ENT_QUOTES);

    if(isset($postText)) {
      
      if($_FILES["image"]["name"] === NULL) {

        require 'Classes/Validation.php';
        $validate = new Validation();

        $imageResult = $validate->imageValidation($_FILES["image"]["name"],
        $_FILES["image"]["size"], $_FILES["image"]["tmp_name"]);

        if($imageResult === FALSE) {
          
          $_SESSION["imageErr"] = "Image should be max 8mb and type should be jpg,
          png and jpeg only.";
          require 'View/posts_page.php';

        }

        else {
        
          $query->addPosts($_SESSION["email"], $postText, $imageResult);
          unset($_POST);
          header("Location: /posts");
        
        }

      }

      else {
        $query->addPosts($_SESSION["email"], $postText);
        unset($_POST);
        header("Location: /posts");
      }

    }

    else {

      if(isset($_FILES["image"]["name"])) {
        $query->addPosts($_SESSION["email"], NULL, $imageResult);
        unset($_POST);
        header("Location: /posts");
      }

    }

  }

  else {
    
    if(!isset($_SESSION)) {
      session_start();
    }

    if(isset($_SESSION["login"]) && $_SESSION["login"] === TRUE) {

      require 'Model/SendQuery.php';
      $query = new SendQuery();

      $_SESSION["postsData"] = $query->fetchPosts();
      require 'View/posts_page.php';

    }

    else {
      require 'Controller/login.php';
    }  

  }

?>
