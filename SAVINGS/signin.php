<?php
session_start();
?>
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
    <div class="topnav">
      <h3>P2S</h3>
      <div class="option">
      <a href="index.php">Home</a>
      <a href="about.html">About Us</a>
      <a href="contact.html">Contact Us</a>
      <a href="reviews.html">Reviews</a>
      <a href="cart.php">Shopping Cart</a>
      <a href="db.php">DB Maintain</a>
      <a class="active" href="signin.php">Sign-in</a>
      </div>
    </div>

    <div class="content">
      <h1 class="title">SIGN IN</h1>
      <div class="underline"></div>
        <div class="smaller-container">
          <form action="check-login.php" method="post">
            <div class="si-container">
              <label for="uname"><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="uname" required>

              <label for="psw"><b>Password</b></label>
              <input type="password" name="psw" required>

              <button type="submit">Sign In</button>
              <button type="button" onclick="window.location.href='signup.php';">Sign Up</button>

            </div>
          </form>

        </div>
      </div>
    </div>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){

                $uname = strtolower(trim($_POST["uname"]));
                $psw = trim($_POST["psw"]);

                $servername = "localhost";
                $username = "root";
                $pswrd = "";
                $dbname = "services";

                $conn = new mysqli($servername, $username, $pswrd, $dbname);

                if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT USERID, PSWRD FROM users WHERE USERNAME = '$uname'";

                try {
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if($row["PSWRD"] == $psw){

                    $_SESSION['loggedin'] = true;
                    $_SESSION['userid'] = $row["USERID"];
                    header("location: index.php");
                    }
                    else{
                      echo '<script>alert("Incorrect password.")</script>';
                    }
                  } else {
                    echo '<script>alert("Username not found.")</script>';
                  }
                } catch (Exception $e) {
                    echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
                  }
                  $conn->close();
              }
    ?>
  </body>
</html>
