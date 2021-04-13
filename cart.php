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
    <br><br><br>

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
        $_SESSION['total'] = 0;
        echo $_SESSION['service'];
        if($_SESSION['service'] == "sD"){
          // TO CREATE TABLE
          $sql = "CREATE TABLE ORDERSCL (
            cid INT PRIMARY KEY,
            userid INT NOT NULL,
            src VARCHAR(50) NOT NULL,
            dest VARCHAR(50) NOT NULL,
            dist VARCHAR(5) NOT NULL,
            price VARCHAR(5) NOT NULL,
            tm TIME NOT NULL
            )";

          if($conn->query($sql) === TRUE){}

          # TO READ DATA
          $sql = "SELECT cid, src, dest, dist, price FROM orderscl WHERE userid = $iuserid";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
          $datas[] = $row;}
          }

          # TO PRINT
          if(count($datas) != 0){
          $html = "";
          foreach($datas as $row) {
          $icleanerid = (int) $row['cid'];
          $sql = "SELECT cname, img, price FROM cleaners WHERE cid = $icleanerid";

          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            $row2 = $result->fetch_assoc();
            $html .= " <tr>
            <td>
              <div class=\"cart-info\">
              <img src=\"".$row2["img"]."\">
              <div>
              <p>".$row2["cname"]."</p>
              <small>Price per day: $".$row2["price"]."</small>
              </div>
              </div>
              </td>
              <td>".$row["src"]."</td>
              <td>".$row["dest"]."</td>
              <td>".round($row["dist"],2)." km</td>
              <td>$".$row["price"]."</td> </tr>
              ";}

              $_SESSION['total'] += $row["price"];}
            echo $html;}
        }
        elseif($_SESSION['service'] == "sA" || $_SESSION['service'] == "sCA"){
        // TO CREATE TABLE
        $sql = "CREATE TABLE TRIPS (
          tripid int PRIMARY KEY NOT NULL AUTO_INCREMENT,
          userid INT NOT NULL,
          carid INT NOT NULL,
          src VARCHAR(50) NOT NULL,
          dest VARCHAR(50) NOT NULL,
          dist VARCHAR(5) NOT NULL,
          price VARCHAR(5) NOT NULL,
          tm TIME NOT NULL,
          type VARCHAR(4) DEFAULT 'sA'
          )";

    if($conn->query($sql) === TRUE){}

    # TO READ DATA
    $sql = "SELECT carid, src, dest, dist, price FROM TRIPS WHERE userid = $iuserid";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
      $datas[] = $row;}
    }

    # TO PRINT
    if(count($datas) != 0){
      $html = "";
      foreach($datas as $row) {
        $icarid = (int) $row['carid'];
        $sql = "SELECT model, img, price FROM CARS WHERE carid = $icarid";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          $row2 = $result->fetch_assoc();
          $html .= " <tr>
          <td>
            <div class=\"cart-info\">
            <img src=\"".$row2["img"]."\">
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

            $_SESSION['total'] += $row["price"];}
          echo $html;}
        }

        elseif($_SESSION['service'] == "sB" || $_SESSION['service'] == "sCB"){
        $datas = array();
      // TO CREATE TABLE
      $sql = "CREATE TABLE ITEMS (
      productid VARCHAR(4) PRIMARY KEY,
      userid INT NOT NULL,
      src VARCHAR(50) NOT NULL,
      dest VARCHAR(50) NOT NULL,
      dist VARCHAR(5) NOT NULL,
      tm TIME NOT NULL,
      type VARCHAR DEFAULT 'sB')";

      if($conn->query($sql) === TRUE){}

      # TO READ DATA
        $sql = "SELECT * FROM ITEMS WHERE userid = $iuserid";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
            $datas[] = $row;}
        }

        # TO PRINT
        if(count($datas) != 0){
          $html = "";
          foreach($datas as $row) {
            $key2 = $row["productid"];


            if($key2[0] == 'f'){
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
                <small>Price: $".$row2["price"]."</small>
                </div>
                </div>
            </td>
            <td>".$row["src"]."</td>
            <td>".$row["dest"]."</td>
            <td>".round($row["dist"],2)." km</td>
            <td>$".$row2["price"]."</td> </tr>
            ";}
            }
            elseif($key2[0] == 'c'){
              $sql = "SELECT * FROM COFFEE WHERE coffeeid = '$key2'";

              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                $row2 = $result->fetch_assoc();
              $html .= " <tr>
              <td>
                  <div class=\"cart-info\">
                  <img src=\"".$row2["img"]."\">
                  <div>
                  <p>".$row2["coffeeType"]."</p>
                  <small>Price: $".$row2["price"]."</small>
                  </div>
                  </div>
              </td>
              <td>".$row["src"]."</td>
              <td>".$row["dest"]."</td>
              <td>".round($row["dist"],2)." km</td>
              <td>$".$row2["price"]."</td> </tr>
              ";}
            }


            $_SESSION['total'] += $row2["price"];

          }
          echo $html;
        }
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
                orderid INT PRIMARY KEY AUTO_INCREMENT,
                userid INT,
                tripid INT,
                cleanerid INT,
                productid VARCHAR(4),
                date_issued DATE DEFAULT CURRENT_DATE()
                )";

            if($conn->query($sql) === TRUE){}

          $itripid;
          $iproductid;
          $icleanerid;

          if($_SESSION['service'] == "sA" || $_SESSION['service'] == "sCA" ){
            $sql = "SELECT tripid FROM TRIPS WHERE userid = $iuserid";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $itripid = $row["tripid"];
            }
            echo $iuserid;
            echo $itripid;
            $sql = "INSERT INTO ORDERS (userid, tripid) VALUES ('$iuserid', '$itripid')";

            try {
              if($conn->query($sql) === TRUE)
              {
                $sql = "SELECT orderid FROM ORDERS WHERE userid = $iuserid AND tripid = $itripid";
                $iorderid;
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $iorderid = $row["orderid"];
                }
                echo "<script>alert('Order Successful with Order ID: ".$iorderid."');window.location.href = \"index.php\";</script>" ;


                $sql = "DELETE FROM TRIPS";
                if($conn->query($sql) === TRUE){}

              }
              else {
                throw new Exception("Something went wrong! Try again later.");
              }
          }
          catch (Exception $e) {
                echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
                echo ("Sorry " .mysqli_errno($conn));
          }

          }
          elseif($_SESSION['service'] == "sB"  || $_SESSION['service'] == "sCB"){
            $sql = "SELECT productid FROM ITEMS WHERE userid = $iuserid";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $iproductid = $row["productid"];
            }

            $sql = "INSERT INTO ORDERS (userid, productid) VALUES ('$iuserid', '$iproductid')";

            try {
              if($conn->query($sql) === TRUE){
                $sql = "SELECT orderid FROM ORDERS WHERE userid = $iuserid AND productid = '$iproductid'";
                $iorderid;
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $iorderid = $row["orderid"];
                }
                echo "<script>alert('Order Successful with Order ID: ".$iorderid."');window.location.href = \"index.php\";</script>" ;

                $sql = "DELETE FROM items";
                if($conn->query($sql) === TRUE){}

              } else {
                throw new Exception("Something went wrong! Try again later.");
              }
          } catch (Exception $e) {
                echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
          }
          }

          elseif($_SESSION['service'] == "sD"){
            $sql = "SELECT cid FROM ORDERSCL WHERE userid = $iuserid";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $icleanerid = $row["cid"];
            }

            $sql = "INSERT INTO ORDERS (userid, cleanerid) VALUES ('$iuserid', '$icleanerid')";
            try {
              if($conn->query($sql) === TRUE){
                $sql = "SELECT orderid FROM ORDERS WHERE userid = $iuserid AND cleanerid = $icleanerid";
                $iorderid;
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $iorderid = $row["orderid"];
                }
                echo "<script>alert('Order Successful with Order ID: ".$iorderid."');window.location.href = \"index.php\";</script>" ;

                $sql = "DELETE FROM orderscl";
                if($conn->query($sql) === TRUE){}

              } else {
                throw new Exception("Something went wrong! Try again later.");
              }
          } catch (Exception $e) {
                echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
          }
          }

          $conn->close();

          }
        ?>
    </body>
</html>
