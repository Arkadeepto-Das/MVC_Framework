<!-- Model part of reset password. -->

<?php

  session_start();

  require 'Classes/Validation.php';
  require 'Model/SendQuery.php';

  $email = $_POST["email"];
  $newPassword = $_POST["password"];

  $validate = new Validation();
  $query = new SendQuery();

  $emailData = $query->select($email);
  
  if(isset($emailData) && $emailData->fetch_assoc()["Email"] == $email) {

    // Password format validation.
    if($validate->passwordValidation($newPassword) === FALSE) {

      $GLOBALS["passwordErr"] = "Password should be of min 8 characters with 
      atleast 1 uppercase, 1 lowercase, 1 digit and 1 special character.";

      require 'View/reset_page.php';

    }

    else {
      
      // Send OTP.
      $otpCheck = $validate->sendOTP($email);
      
      if($otpCheck === FALSE) {

        $GLOBALS["otpErr"] = "Couldn't send OTP.";
        require 'View/reset_page.php';

      }

      else {

        $_SESSION["otp"] = $otpCheck;
        unset($_POST);
        require 'Controller/verify_otp.php';

      }

    }

  }

  else {

    $GLOBALS["emailErr"] = "You don't have any account for this Email-ID.";
    require 'View/reset_page.php';

  }
  
?>
