<!-- HTML part of login page -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@400;500&family=Poppins:wght@100;200;300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Content/css/style_index.css">
  <title>Login</title>
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <form action="/login" method="POST">
      <label for="email">Email-ID</label>
      <span>*</span>
      <input type="email" id="email" name="email" required>
      <span class="error">
        <?php
          if(isset($GLOBALS["emailErr"])) {
            echo $GLOBALS["emailErr"];
            unset($GLOBALS["emailErr"]);
            unset($_POST);
          }
        ?>
      </span>
      <br><br>
      <label for="pwd">Password</label>
      <span>*</span>
      <input type="password" id="password" name="password" required>
      <span class="error">
        <?php
          if(isset($GLOBALS["passwordErr"])) {
            echo $GLOBALS["passwordErr"];
            unset($GLOBALS["passwordErr"]);
            unset($_POST);
          }
        ?>
      </span>
      <br><br>
      <input type="submit" value="Login">
      <ul>
        <li>
          <a href="/register">Register</a>
        </li>
        <li>
          <a href="/resetpassword">Reset Password</a> 
        </li>
      </ul>
    </form>
  </div>
</body>
</html>
