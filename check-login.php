<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
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
