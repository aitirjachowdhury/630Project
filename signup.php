<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>P2S</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
  </head>
  <body>

   <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty(trim($_POST["username"]))){
          echo '<script>alert("Please enter a valid username.")</script>' ;
        } else{
            $uname = trim($_POST["username"]);

          if(empty(trim($_POST["password"])) || strlen(trim($_POST["password"])) < 8){
            echo '<script>alert("Please enter a valid password with 8 or more characters.")</script>' ;
          }else{
              $psw = trim($_POST["password"]);
              if(empty(trim($_POST["fname"]))){
                echo '<script>alert("Please enter your first name.")</script>' ;
              } else{
                $fname = trim($_POST["fname"]);
              if(empty(trim($_POST["lname"]))){
                echo '<script>alert("Please enter your last name.")</script>' ;
              } else{
                $lname = trim($_POST["lname"]);

        if(empty(trim($_POST["number"]))){
          echo '<script>alert("Please enter a valid phone number.")</script>' ;
        } else{
          $number = trim($_POST["number"]);
          $number = str_replace("-", "", $number);
        if(empty(trim($_POST["address"]))){
          echo '<script>alert("Please enter a valid address.")</script>' ;
        } else{
          $address = trim($_POST["address"]);

        if(empty(trim($_POST["email"]))){
          echo '<script>alert("Please enter a valid email address.")</script>' ;
        } else{
          $email = trim($_POST["email"]);

        $servername = "localhost";
        $username = "root";
        $pswrd = "";
        $dbname = "services";

        $conn = new mysqli($servername, $username, $pswrd, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // TO CREATE TABLE
        $sql = "CREATE TABLE users (
              userid int PRIMARY KEY AUTO_INCREMENT,
              username VARCHAR(30) UNIQUE NOT NULL,
              pswrd VARCHAR(50) NOT NULL,
              salt VARCHAR(50) NOT NULL,
              firstName text NOT NULL,
              lastName text NOT NULL,
              telNo VARCHAR(10) NOT NULL,
              mailAddr VARCHAR(50)NOT NULL,
              email VARCHAR(40) NOT NULL,
              balance int DEFAULT 0
              )";

        if($conn->query($sql) === TRUE){}
        $salt = generateRandomSalt();
        $psw = md5($psw.$salt);
        $sql = "INSERT INTO users (username, pswrd, salt, firstName, lastName, telNo, mailAddr, email) VALUES ('$uname', '$psw', '$salt', '$fname', '$lname', '$number', '$address', '$email')";

        try {
            if($conn->query($sql) === TRUE){
            header('Location: signin.php');
            } else {
              throw new Exception("Something went wrong! Try again later.");
            }
        } catch (Exception $e) {
              echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
        }
      $conn->close();
      }}}}}}}
    }

    function generateRandomSalt(){
      return base64_encode(random_bytes(12));
    }
    ?>

<div class="topnav">
      <h3>P2S</h3>
      <div class="option">
      <a href="index.php">Home</a>
      <a href="about.html">About Us</a>
      <a href="contact.html">Contact Us</a>
      <a href="reviews.php">Reviews</a>
      <a href="#news">Shopping Cart</a>
      <a class="active" href="signin.php">Sign-in</a>
      </div>
    </div>

    <div class="content">
      <h1 class="title">SIGN UP</h1>
      <div class="underline"></div>
      <p style="margin-top: 15px;">Enter all details to create your profile</p>
        <div class="smaller-container">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="si-container">
            <label>Username</label>
            <input type="text" name="username" placeholder="Enter username here">

            <label>Password</label>
            <input type="password" name="password">

            <label>First Name</label>
            <input type="text" name="fname" placeholder="Johnny">

            <label>Surname</label>
            <input type="text" name="lname" placeholder="Appleseed">

            <label>Tel. No</label>
            <input type="text" name="number" placeholder="123-456-7890">

            <label>Mailing Address</label>
            <input type="text" name="address" placeholder="123 Worm St.">

            <label>Email Address</label>
            <input type="text" name="email" placeholder="johnny.appleseed@gmail.com"><br><br>

            <input type="submit" class="account" value="Create an Account">

            <br><br>
            <label>Already have an account?
                <a href="signin.php">Sign In</a>
            </label>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
