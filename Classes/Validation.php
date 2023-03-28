<?php

  require 'vendor/autoload.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  class Validation {

    public $otp;

    public function emailValidation($email) {

      // Email validation.
      if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
        return FALSE;
      }

      else {
        return TRUE;
      }

    }

    public function passwordValidation($password) {

      // Password format validation.
      if(preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=!\?]{8,20}$/",
      $password) == 1) {
        return TRUE;
      }

      else {
        return FALSE;
      }
      
    }

    public function imageValidation($imageName, $imageSize, $imageTmpName) {

      $target_dir = "Content/Images/Posts/";
      $target_file = $target_dir . basename($imageName);
      $imageType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Check if image file is an actual image or fake image.
      if(isset($_POST["submit"])) {

        $check = getimagesize($imageTmpName);

        if($check !== FALSE) {
          return FALSE;
        }
        
        else {

          // Check file size.
          if ($imageSize > 8000000) {
            return FALSE;
          }

          else {

            // Allow certain file formats.
            if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg") {
              return FALSE;
            }

            else {

              //Upload image file.
              move_uploaded_file($imageTmpName, $target_file);
              return $target_file;

            }

          }

        }

      }

    }

    public static function sendOTP(string $email) {

      $mailer = new PHPMailer(true);

      try {

        //Server settings.

        //Enable verbose debug output.
        $mailer->SMTPDebug  = SMTP::DEBUG_SERVER;
        //Send using SMTP.
        $mailer->isSMTP();
        $mailer->Mailer     = "smtp";
        $mailer->SMTPDebug  = 1;
        //Set the SMTP server to send through.
        $mailer->Host       = 'smtp.gmail.com';
        //Enable SMTP authentication.
        $mailer->SMTPAuth   = true;
        //SMTP username.
        $mailer->Username   = 'rupam251201@gmail.com';
        //SMTP password.
        $mailer->Password   = 'fozfyzjdubwxsmlk';
        //Enable implicit TLS encryption.
        $mailer->SMTPSecure = 'tls';
        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`.
        $mailer->Port       = 587;

        //Recipients.

        //Set email-ID from which mail will be sent.
        $mailer->setFrom('rupam251201@gmail.com', 'Rupam Saha');
        //Add a recipient
        $mailer->addAddress($email);

        //Content.

        //Set email format to HTML.
        $mailer->isHTML(true);
        $mailer->Subject = 'Welcome';

        // Create OTP.
        $otp = rand(1000, 9000);

        $mailer->Body    = '<b>Your otp to reset password : ' . $otp . '</b>';

        //Sends mail.
        $mailer->send();

        return $otp;

      }
      
      catch (Exception $e) {
        return FALSE;
      }

    }

  }

?>
