<!-- Model part of the login page. -->

<?php

  session_start();

  require 'Model/SendQuery.php';

  $email = $_POST["email"];
  $password = $_POST["password"];

  $query = new SendQuery();
  $emailData = $query->select(NULL, $email, NULL);

  if(isset($emailData) && $emailData->fetch_assoc()["Email"] == $email) {

    $passwordData = $query->select(NULL, $email, $password);

    if(isset($passwordData) && $passwordData->fetch_assoc()["Password"] == $password) {

      $_SESSION["email"] = $email;
      unset($_POST);
      $_SESSION["login"] = TRUE;
      header("Location: /posts");
          
    }
    
    else {

      $GLOBALS["passwordErr"] = "Incorrect Password";
      unset($_POST);
      require 'View/login_page.php';

    }

  }

  else {

    $GLOBALS["emailErr"] = "You don't have any account for this Email-ID.";
    unset($_POST);
    require 'View/login_page.php';

  }

?>
