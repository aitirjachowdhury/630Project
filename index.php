<?php
ob_start();
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
      <a class="active" href="#">Home</a>
      <a href="about.html">About Us</a>
      <a href="contact.html">Contact Us</a>
      <a href="reviews.html">Reviews</a>
      <a href="cart.php">Shopping Cart</a>
      <a href="db.php">DB Maintain</a>
      <a href="signin.php">Sign-in</a>
      </div>
    </div>
    <form id="distance_form" method="post"> 
      <input style="position: fixed; width: 20%; margin: 10px;" type="number" name="orderid" placeholder="Search Order ID..">
    </form>    

    <div style="text-align: center;"><br><br><br><br>
      <h2>Welcome to P2S!</h2><br>
      <h4>Choose one of the following options to get started</h4><br><br>
    </div>

    <div class="service1">
      <button class="service2" onclick="window.location.href='serviceA.php';">Ride to a destination from this source</button><br>
      <button class="service2" onclick="window.location.href='serviceB.php';">Ride & Deliver an item from a store</button>
    </div>

    <div id="searchresult"></div>

    <script>
  function displayRes(oid, pid, date){
    var textb = document.getElementById("searchresult");
    textb.innerHTML = '
    ORDER ID: ' + oid + '<br>' + '
    PRODUCT ID: ' + pid + '<br>' + '
    DATE ISSUED: ' + date;
    textb.style.display = "block";
  }
  </script> 

    <?php
 if($_SERVER["REQUEST_METHOD"] == "POST" )
 {
    if($_POST['orderid'] < 1){
      echo "<script>alert('Invalid Order ID.')</script>";
    }
    else{
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
          $servername = "localhost";
          $username = "root";
          $pswrd = "";
          $dbname = "services";

          $conn = new mysqli($servername, $username, $pswrd, $dbname);

          if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

          $iorderid = $_POST["orderid"];
          $iuserid = (int) $_SESSION['userid'];
            try {
              $sql = "SELECT orderid, productid, date_issued FROM ORDERS WHERE orderid = $iorderid AND userid = $iuserid";
              $result = mysqli_query($conn, $sql);
              if(mysqli_num_rows($result) > 0){
                $row = $result->fetch_assoc();

                echo "<script>
                var textb = document.getElementById(\"searchresult\");
                textb.innerHTML = 'Order ID: " . $row["orderid"]."<br>Product ID: " . $row["productid"]."<br>Date issued: " . $row["date_issued"]."';
                textb.style.display = \"block\";
                </script>" ;
              }
              else{
                echo "<script>alert('ORDER ID does not exist!')</script>" ;
              }
            } catch (Exception $e) {
              echo "<script>alert('ORDER ID does not exist!')</script>" ;
            }
            $conn->close();
            }
      else {echo "<script>alert('Please Login!')</script>" ;}
    }
  }

    ?>   
    
    

  </body>
</html>
