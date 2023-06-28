<!-- Model part of the OTP verification page. -->

<?php
  
  $otp = $_POST["otp"];

  if($otp == $validate->otp) {

    $query->resetPassword($email, $newPassword);
    unset($_POST);
    require 'Controller/login_page.php';
  }

  else {
    $GLOBALS["otpErr"] = "Enter correct OTP.";
    require 'View/verify_otp.php';
  }

?>
