<?php

  /**
   * Connect to the database and send query to the database.
   * 
   * @method connect()
   *  Connect to the database.
   * @method add()
   *  Add data into the table.
   * @method select()
   *  Select column and fetch data from the database.
   * @method saveTask()
   *  Save the task number of the last task visted.
   * @method selectTask()
   *  Select the task number.
   * @method resetPassword()
   *  Reset the password.
   */

  class SendQuery {

    /**
     * Connect to the database.
     * 
     * @property string $serverName
     *  Store the server name.
     * @property string $userName
     *  Store username.
     * @property string $password
     *  Store the password.
     * @property string $dbName
     *  Store the name of the database.
     * 
     * @return mysqli object
     *  Return mysqli object after connecting to database.
     */

    public static function connect() {

      /**
       * Store the server name.
       * @var string $serverName
       */
      $serverName = "localhost";

      /**
       * Store the username.
       * @var string $userName
       */
      $userName = "root";

      /**
       * Store the password.
       * @var string $password
       */
      $password = "Arka270601das#";

      /**
       * Store the database name.
       * @var string $dbName
       */
      $dbName = "Amigos_db";

      // Create connection.
      $conn = new mysqli($serverName, $userName, $password, $dbName);
      // Check connection.
      if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      else {
        return $conn;
      }

    }

    /**
     * Insert username, password and task number to the table.
     * 
     * @param string $userName
     *  Store the username.
     * @param string $email
     *  Store the Email-ID.
     * @param string $password
     *  Store the password.
     * @param string $profileImage
     *  Store the profile image of the user if passed or else stores NULL by default.
     * 
     * @return void
     */

    public static function add(string $userName, string $email, string $password,
    string $profileImage = NULL) {
      
      $conn = self::connect();
      $data = "";

      if($profileImage === NULL) {
        $data = "INSERT INTO Users (Username, Email, Password, Profile_image)
        VALUES ('$userName', '$email', '$password', NULL)";
      }

      else {
        $data = "INSERT INTO Users (Username, Email, Password, Profile_image)
        VALUES ('$userName', '$email', '$password', '$profileImage')";
      }

      if($conn->query($data) === FALSE) {
        echo "Error" . $data . "<br>" . $conn->error;
      }

      $conn->close();
      
    }

    /**
     * Select the data from the table.
     * 
     * @param string $userName
     *  Store the Email-ID if passed or else stores NULL by default.
     * @param string $password
     *  Store the password if passed or else stores NULL by default.
     * 
     * @property string $data
     *  Store the query.
     * 
     * @return mixed
     *  Return query result if exists or else returns NULL.
     */

    public function select(string $userName = NULL, string $email = NULL, string $password = NULL) {

      $conn = self::connect();
      $data = "";

      if($password === NULL && $userName === NULL) {
        $data = "SELECT Email FROM Users WHERE Email = '$email'";
      }

      elseif($password === NULL) {
        $data = "SELECT Username FROM Users WHERE email = '$email'";
      }

      else {
        $data = "SELECT Password FROM Users WHERE Email = '$email'";
      }

      $result = $conn->query($data);
      
      if($result) {

        if(mysqli_num_rows($result) > 0) {
          return $result;
        }

        else {
          return NULL;
        }

      }

      $conn->close();

    }

    /**
     * Save the task number.
     * 
     * @param string $userName
     *  Store the username.
     * @param int $tasknum
     *  Store the task number.
     * 
     * @return void
     */

    public static function saveTask(string $userName, int $tasknum) {

      $conn = self::connect();
      $data = "UPDATE Profiles SET TaskNum = '$tasknum' WHERE Username = '$userName'";

      if($conn->query($data) === FALSE) {
        echo "Error updating record: " . $conn->error;
      }

      $conn->close();

    }

    /**
     * Select task number from the table for that username.
     * 
     * @param string $userName
     *  Store the username.
     * 
     * @return mysqli object
     *  Return the result set if it exists.
     */

    public function selectTask(string $userName) {

      $conn = self::connect();
      $data = "SELECT TaskNum FROM Profiles WHERE Username = '$userName'";

      $result = $conn->query($data);

      if($result) {

        if(mysqli_num_rows($result) > 0) {
          return $result;
        }

      }

      $conn->close();

    }

    /**
     * Reset password of the user.
     * 
     * @param string $email
     *  Store the Email-ID.
     * @param string $newPassword
     *  Store the new password given by the user.
     * 
     * @return void
     */

    public function resetPassword(string $email, string $newPassword) {

      $conn = self::connect();
      $data = "UPDATE Users SET Password = '$newPassword' WHERE Email = '$email'";

      if($conn->query($data) === FALSE) {
        echo "Error resetting password: " . $conn->error;
      }

      $conn->close();

    }

    public function fetchPosts() {

      $conn = self::connect();
      $data = "SELECT Users.Username, Posts.Post_image, Posts.Post_text, Posts.Post_date
      FROM Users
      INNER JOIN Posts ON Posts.Email = Users.Email
      ORDER BY Post_date DESC";

      $result = $conn->query($data);

      if($result) {

        if(mysqli_num_rows($result) > 0) {
          return $result;
        }

        else {
          return NULL;
        }

      }

    }

    public function addPosts($email, string $postText = NULL, string $postImage = NULL) {

      $conn = self::connect();

      $data = "INSERT INTO Posts (Email, Post_text, Post_image)
      VALUES ('$email', '$postText', '$postImage')";
      
      if($conn->query($data) === FALSE) {
        echo "Error" . $data . "<br>" . $conn->error;
      }

      $conn->close();
      
    }

  }

?>
