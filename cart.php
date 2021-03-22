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
      <a class="active" href="cart.php">Shopping Cart</a>
      <a href="db.php">DB Maintain</a>
      <a href="signin.php">Sign-in</a>
      </div>
    </div>

    <div class="service1">
      <button class="service2" onclick="window.location.href='serviceA.php';">Ride to a destination from this source</button>
      <button class="service2" onclick="window.location.href='serviceB.php';">Ride & Deliver an item from a store</button>
    </div>

    <div class="content small-container">
        <div class="cart">
        <table>
            <tr>
                <th>Order</th>
                <th>Source</th>
                <th>Destination</th>
                <th>Distance</th>
                <th>Price</th>
            </tr>

            <?php
      $servername = "localhost";
      $username = "root";
      $pswrd = "";
      $dbname = "services";
      
      $conn = new mysqli($servername, $username, $pswrd, $dbname);
      
      if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
 
      $datas = array();
      
      if(isset($_SESSION['userid']))
      {
        $iuserid = (int) $_SESSION['userid'];
        
          # TO READ DATA
          $sql = "SELECT carid, src, dest, dist, price FROM TRIPS WHERE userid = $iuserid";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
              $datas[] = $row;
            }
          }

        # TO PRINT
        if(count($datas) != 0){
          $_SESSION['total'] =0;
          $html = "";
          foreach($datas as $row) {
            $icarid = (int) $row['carid'];
            $sql = "SELECT model, imgs, price FROM CARS WHERE carid = $icarid";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row2 = $result->fetch_assoc();
            $html .= " <tr>
            <td>
                <div class=\"cart-info\">
                <img src=\"".$row2["imgs"]."\">
                <div>
                <p>".$row2["model"]."</p>
                <small>Price per km: $".$row2["price"]."</small>
                </div>
                </div>
            </td>
            <td>".$row["src"]."</td>
            <td>".$row["dest"]."</td>
            <td>".round($row["dist"],2)." km</td>
            <td>$".$row["price"]."</td> </tr>
            ";}
            
            $_SESSION['total'] += $row["price"];

          }
          echo $html;
        }

        $datas = array();

          # TO READ DATA
          $sql = "SELECT * FROM ITEMS WHERE userid = $iuserid";

          $result = mysqli_query($conn, $sql);

          if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
              $datas[] = $row;
            }
          }

        # TO PRINT
        if(count($datas) != 0){
          $html = "";
          foreach($datas as $row) {
            $key2 = $row["PRODUCTID"];
            $sql = "SELECT * FROM FLOWER WHERE flowerid = '$key2'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row2 = $result->fetch_assoc();
            $html .= " <tr>
            <td>
                <div class=\"cart-info\">
                <img src=\"".$row2["img"]."\">
                <div>
                <p>".$row2["flowerType"]."</p>
                <small>Price per km: $".$row2["price"]."</small>
                </div>
                </div>
            </td>
            <td>".$row["SRC"]."</td>
            <td>".$row["DEST"]."</td>
            <td>".round($row["DIST"],2)." km</td>
            <td>$".$row2["price"]."</td> </tr>
            ";}
            
            $_SESSION['total'] += $row2["price"];

          }
          echo $html;    
            }
         
      
    }
      else {echo "<script>alert('Please Login to see items in cart!');window.location.href = \"signin.php\";</script>" ;}

        $conn -> close();

        ?>
        </table>   

        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td> 
                    <?php 
                    if(isset($_SESSION['total']))
                    {
                      echo("$".$_SESSION['total']); 
                    }
                    else{
                      echo("$0.00");
                    }
                    ?>  
                   </td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>
                    <?php 
                    if(isset($_SESSION['total']))
                    {
                      echo("$".round($_SESSION['total']*0.13,2)); 
                    }
                    else{
                      echo("$0.00");
                    }
                    ?>  
                    </td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>                    <?php 
                    if(isset($_SESSION['total']))
                    {
                      echo("$".round($_SESSION['total']*1.13,2)); 
                    }
                    else{
                      echo("$0.00");
                    }
                    ?>  </td>
                </tr>
            </table>        </div>
      </div>

      <form id="distance_form" method="post"> 
      <button type="submit" name="checkout"> Checkout </button>
      </form>

      <?php
        if($_SERVER["REQUEST_METHOD"] == "POST" )
        { 
          $iuserid = (int) $_SESSION['userid'];
          $servername = "localhost";
          $username = "root";
          $pswrd = "";
          $dbname = "services";

          $conn = new mysqli($servername, $username, $pswrd, $dbname);
          

          if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

              // TO CREATE TABLE
            $sql = "CREATE TABLE ORDERS(
                orderid INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                userid INT NOT NULL,
                tripid INT NOT NULL,
                productid VARCHAR(4),
                date_issued DATE DEFAULT CURRENT_DATE()
                )";

            if($conn->query($sql) === TRUE){}
          
          $itripid;
          $iproductid;

          $sql = "SELECT TRIPID FROM TRIPS WHERE USERID = $iuserid";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $itripid = $row["TRIPID"];
            }
          
          
            $sql = "SELECT PRODUCTID FROM ITEMS WHERE USERID = $iuserid";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $iproductid = $row["PRODUCTID"];
            }
          
          
            $sql = "INSERT INTO ORDERS (userid, tripid, productid) VALUES ('$iuserid', '$itripid', '$iproductid')";

            try {
              if($conn->query($sql) === TRUE){
                $sql = "SELECT orderid FROM ORDERS WHERE userid = $iuserid AND tripid = $itripid";
                $iorderid;
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $iorderid = $row["orderid"];
                }

                echo "<script>alert('Order Successful with Order ID: ".$iorderid."');window.location.href = \"index.php\";</script>" ;
              } else {
                throw new Exception("Something went wrong! Try again later.");
              }
          } catch (Exception $e) {
                echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
          }
          $conn->close();
          
          }
        ?>
    </body>
</html>