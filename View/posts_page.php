<!-- HTML part of the posts page -->

<?php
  $_SESSION["login"] = TRUE;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Content/css/style_posts.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@400;500&family=Poppins:wght@100;200;300;400;500&display=swap" rel="stylesheet">
  <title>Posts</title>
</head>
<body>
  <div class="navbar">
    <div class="container">
      <h1>Amigos</h1>
      <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Dropdown</button>
        <div id="myDropdown" class="dropdown-content">
          <a href="#">Profile</a>
          <a href="/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <div class="send_post">
    <div class="container">
      <form action="/posts" method="POST" enctype="multipart/form-data">
      <textarea name="text" id="text" placeholder="What's cooking, good looking?"
      cols="63" rows="4"></textarea>
      <label for="image" class="upload">Photo</label>
      <input type="file" name="image" id="image" style="display: none;">
      <input type="submit" name="submit" value="Post">
      </form>
    </div>
    <span class="error">
      <?php
        if(isset($_SESSION["imageErr"])) {
          echo $_SESSION["imageErr"];
          unset($_SESSION["imageErr"]);
        }
      ?>
    </span>
  </div>
  <div class="post_body">
    <?php

      if(isset($_SESSION["postsData"])) {

        while($row = $_SESSION["postsData"]->fetch_assoc()) {

    ?>
    <div class="container">
      <div class="posts">
        <div class="user">
          <h4>
            <?php
              if(isset($row["Username"])) {
                echo $row["Username"];
              }
            ?>
          </h4>
          <p class="date">
            <?php
              if(isset($row["Post_date"])) {
                echo $row["Post_date"];
              }
            ?>
          </p>
        </div>
        <p class="text">
          <?php
            if(isset($row["Post_text"])) {
              echo nl2br($row["Post_text"]);
            }
          ?>
        </p>
        <?php
          if(isset($row["Post_image"])) {
        ?>
        <img src="<?php echo $row["Post_image"]; ?>">
        <?php
          }
        ?>
      </div>
    </div>
    <?php

        }

      $_SESSION["postsData"]->free_result();

      }

      else {
      
    ?>
    <div class="container">
      <h1>NO POSTS</h1>
    </div>
    <?php

      }

    ?>
  </div>

  <script>
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }
    
    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
    </script>
</body>
</html>
