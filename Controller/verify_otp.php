<!-- Controller part of the OTP verification page -->

<?php

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'Model/verify_otp.php';
  }

  else {
    require 'View/verify_otp.php';
  }

?>
