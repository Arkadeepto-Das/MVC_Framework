<!-- HTML part of OTP verification page -->

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
  <title>Verify OTP</title>
</head>
<body>
  <div class="container">
    <h1>Verify OTP</h1>
    <form action="/verify" method="POST">
      <label for="otp">Verify OTP</label>
      <span>*</span>
      <input type="text" id="otp" name="otp" required>
      <span class="error">
        <?php
          if(isset($GLOBALS["otpErr"])) {
            echo $GLOBALS["otpErr"];
            unset($GLOBALS["otpErr"]);
          }
        ?>
      </span>
      <br><br>
      <input type="submit" value="Verify">
    </form>
  </div>
</body>
</html>
