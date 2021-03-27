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

        // TO CREATE TABLE
        $sql = "CREATE TABLE CARS (
          carid int PRIMARY KEY NOT NULL AUTO_INCREMENT,
          model VARCHAR(20) NOT NULL,
          imgs VARCHAR(30) NOT NULL,
          price VARCHAR(5) NOT NULL,
          available BIT DEFAULT 1
          )";

    if($conn->query($sql) === TRUE){
      $sql = "INSERT INTO cars (model, imgs, price)  
      VALUES('Starex Minivan', 'imgs/StarexMinivan.png', '2.05'), 
            ('Red Audi 2008', 'imgs/Audi.png', '1.35'), 
            ('Honda 2004', 'imgs/2004.png', '0.95'), 
            ('Honda Odyssey', 'imgs/Odyssey.png', '1.35'), 
            ('Ford', 'imgs/Ford.png', '1.50'), 
            ('Honda CRV', 'imgs/CRV.png', '1.80'), 
            ('Honda Jazz', 'imgs/Jazz.png', '1.05') "; 
      if ($conn->query($sql) === true) {}
    }

    $sql = "CREATE TABLE flower(
      flowerid VARCHAR(4) PRIMARY KEY NOT NULL,
      flowerType VARCHAR(30) NOT NULL,
      storeCode VARCHAR(20) NOT NULL,
      img VARCHAR(30) NOT NULL,
      price VARCHAR(5) NOT NULL
    )";

  if($conn->query($sql) === TRUE){

  $sql = "INSERT INTO flower(flowerid, flowerType, storeCode, img, price)
  VALUES ('f1', 'Colorful Bouquet', 'a1', 'imgs/flowers.png', '10.00'),
        ('f2', 'White Lilies', 'b2', 'imgs/lilies.png', '13.00'),
        ('f3', 'Assorted Yellows', 'c3', 'imgs/yellowF.png', '13.00'),
        ('f4', 'Flower Crown (Full)', 'd4', 'imgs/crown3.jpg', '15.00'),
        ('f5', 'Flower Crown (Half)', 'e5', 'imgs/crown1.jpg', '7.50')";
  if ($conn->query($sql) === true) {}
  }
          $iorderid = $_POST["orderid"];
          $iuserid = (int) $_SESSION['userid'];
            try {
              $sql = "SELECT orderid, productid, date_issued FROM ORDERS WHERE orderid = $iorderid AND userid = $iuserid";
              $result = mysqli_query($conn, $sql);
              if(mysqli_num_rows($result) > 0){
                $row = $result->fetch_assoc();

                if($row["productid"] === ""){
                  $row["productid"] = "-";
                }

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
