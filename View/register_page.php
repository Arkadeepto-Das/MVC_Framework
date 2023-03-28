<!-- HTML part of register page -->

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
  <title>Register</title>
</head>
<body>
  <div class="container">
    <h1>Register</h1>
    <form action="/register" method="POST" enctype="multipart/form-data">
      <label for="user">Username</label>
      <span>*</span>
      <input type="text" id="user" name="user" required>
      <span class="error">
        <?php
          if(isset($GLOBALS["userErr"])) {
            echo $GLOBALS["userErr"];
            unset($GLOBALS["userErr"]);
          }
        ?>
      </span>
      <label for="email">Email-ID</label>
      <span>*</span>
      <input type="email" id="email" name="email" required>
      <span class="error">
        <?php
          if(isset($GLOBALS["emailErr"])) {
            echo $GLOBALS["emailErr"];
            unset($GLOBALS["emailErr"]);
          }
        ?>
      </span>
      <br><br>
      <label for="password">Password</label>
      <span>*</span>
      <input type="password" id="password" name="password" required>
      <span class="error">
        <?php
          if(isset($GLOBALS["passwordErr"])) {
            echo $GLOBALS["passwordErr"];
            unset($GLOBALS["passwordErr"]);
          }
        ?>
      </span>
      <br><br>
      <label for="image">Profile image</label>
      <input type="file" id="image" name="image" accept="image/">
      <span class="error">
        <?php
          if(isset($GLOBALS["imageErr"])) {
            echo $GLOBALS["imageErr"];
            unset($GLOBALS["imageErr"]);
          }
        ?>
      </span>
      <br><br>
      <input type="submit" value="Sign Up">
    </form>
  </div>
</body>
</html>
