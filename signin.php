<?php
session_start();
?>
<!DOCTYPE html>
<html ng-app="myApp">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>P2S</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
  </head>

  <body ng-controller="SignInController">
    <div class="topnav">
      <h3>P2S</h3>
      <div class="option">
    <!--  <a href="index.php">Home</a>
      <a href="about.html">About Us</a>
      <a href="contact.html">Contact Us</a>
      <a href="reviews.php">Reviews</a>
      <a href="cart.php">Shopping Cart</a>
      <a class="active" href="signin.php">Sign-in</a> -->

      <a href="#!home">Home</a>
      <a href="#!aboutus">About Us</a>
      <a href="#!contactus">Contact Us</a>
      <a href="#!reviews">Reviews</a>
      <a href="#!shoppingcart">Shopping Cart</a>
      <a class="active" href="#/">Sign-in</a>
      </div>
    </div>

    <div ng-view>
    <div class="content">
      <h1 class="title">SIGN IN</h1>
      <div class="underline"></div>
        <div class="smaller-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="si-container">

              <label for="uname"><b>Username</b></label>
              <input type="text"
                     placeholder="Enter Username"
                     name="uname"
                     required>

              <label for="psw"><b>Password</b></label>
              <input type="password"
                     name="psw"
                     required>

              <label for="memType"><b>Select Type</b></label>
              <select class="member"
                      name="member">
                <option selected value="user">User</option>
                <option value="admin">Admin</option>
              </select>

              <br> <br>

              <button type="submit">Sign In</button>
              <button type="button" onclick="window.location.href='signup.php';">Sign Up</button>

            </div>
          </form>

        </div>
      </div>
    </div>
    </div>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){

                $uname = strtolower(trim($_POST["uname"]));
                $psw = trim($_POST["psw"]);
                $admin = "admin";


                if($uname == "admin" && $psw == "admin" && $_POST['member'] == "admin"){
                  header("location: db.php");
                }
                else{
                  $servername = "localhost";
                  $username = "root";
                  $pswrd = "";
                  $dbname = "services";

                  $conn = new mysqli($servername, $username, $pswrd, $dbname);

                  if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                  }

                  $sql = "SELECT userid, salt, pswrd FROM USERS WHERE username = '$uname'";

                  try {
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      if($row["pswrd"] == md5($psw.$row["salt"])){
                        $_SESSION['loggedin'] = true;
                        $_SESSION['userid'] = $row["userid"];
                        $_SESSION['service'] = "";
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
            }
    ?>
    <script src="spa.js"></script>
  </body>
</html>
