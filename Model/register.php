<!-- Model part of the registration page. -->

<?php
    
  require 'Model/SendQuery.php';
  require 'Classes/Validation.php';

  $userName = $_POST["user"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  $validate = new Validation();
  $query = new SendQuery();

  // Email validation.
  if($validate->emailValidation($email) === FALSE) {

    $GLOBALS["emailErr"] = "Enter correct Email-ID.";
    unset($_POST);
    require 'View/register_page.php';

  }

  else {

    $emailData = $query->select(NULL, $email, NULL);

    if(isset($emailData) && $emailData->fetch_assoc()["Email"] == $email) {

      $userData = $query->select($userName, NULL, NULL);

      if(isset($userData)  && $userData->fetch_assoc()["Username"] == $userName) {

        // Password format validation.
        if($validate->passwordValidation($password) === FALSE) {

          $GLOBALS["passwordErr"] = "Password should be of min 8 characters with 
          atleast 1 uppercase, 1 lowercase, 1 digit and 1 special character.";

          require 'View/register_page.php';
        
        }

        else {

          if(isset($_POST["image"])) {

            //Image validation.
            $imageCheck = $validate->imageValidation($_FILES["image"]["name"],
            $_FILES["image"]["size"], $_FILES["image"]["tmp_name"]);

            if($imageCheck === FALSE) {

              $GLOBALS["imageErr"] = "File should be max 8mb and type should be jpg,
              png and jpeg only.";

              require 'View/register_page.php';

            }

            else {

              SendQuery::add($userName, $email, $password, $imageCheck);
              unset($_POST);
              require 'Contoller/login.php';
            
            }

          }

          else {

            SendQuery::add($userName, $email, $password);
            unset($_POST);
            require 'Contoller/login.php';
            
          }
        
        }

      }

      else {

        $GLOBALS["userErr"] = "This username is already registered";
        require 'View/register.php';

      }

    }

    else {

      $_SESSION["emailErr"] = "This Email-ID is already registered.";
      require 'View/register_page.php';

    }

  }

?>
