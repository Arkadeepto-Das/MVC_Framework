<!-- Routing part -->

<?php

  $uri = $_SERVER["REQUEST_URI"];
  $uri = rtrim($uri);

  switch ($uri) {

    case "/" :
      require 'Controller/login.php';
      break;

    case "/login" :
      require 'Controller/login.php';
      break;
    
    case "/signin" :
      require "Controller/login.php";
      break;

    case "/home" :
      require 'Controller/login.php';
      break;

    case "/register" :
      require "Controller/register.php";
      break;

    case "/signup" :
      require 'Controller/register.php';
      break;

    case "/reset" :
      require 'Controller/reset.php';
      break;

    case "/resetpassword" :
      require 'Controller/reset.php';
      break;

    case "/changepassword" :
      require 'Controller/reset.php';
      break;

    case "/forgetpassword" :
      require 'Controller/reset.php';
      break;

    case "/verify" :
      require 'Controller/verify_otp.php';
      break;

    case "verifyotp" :
      require 'Controller/verify_otp.php';
      break;

    case "/verification" :
      require 'Controller/verify_otp.php';
      break;

    case "/otpverification" :
      require 'Controller/verify_otp.php';
      break;

    case "/post" :
      require 'Controller/posts.php';
      break;

    case "/posts" :
      require 'Controller/posts.php';
      break;

    case "/logout" :
      require 'Controller/logout.php';
      break;

    case "/signout" :
      require 'Controller/logout.php';
      break;

    default :
      require 'Controller/login.php';

  }

?>
