
<?php
ob_start();
session_start();
?>

        <br><br><br>



    <div class="content" >
      <h1 class="title">ALL AVAILABLE CARS</h1>
      <div class="underline"></div>
        <div class="small-container">
        <div class="row">


      <?php
      $servername = "localhost";
      $username = "root";
      $pswrd = "";
      $dbname = "services";

      $conn = new mysqli($servername, $username, $pswrd, $dbname);

      if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

        // TO CREATE TABLE
        $sql = "CREATE TABLE CARS (
          carid int PRIMARY KEY AUTO_INCREMENT,
          model VARCHAR(20) NOT NULL,
          img VARCHAR(30) NOT NULL,
          price VARCHAR(5) NOT NULL,
          available BIT DEFAULT 1
          )";

    if($conn->query($sql) === TRUE){
      $sql = "INSERT INTO CARS (model, img, price)
      VALUES('Starex Minivan', 'imgs/StarexMinivan.png', '2.05'),
            ('Red Audi 2008', 'imgs/Audi.png', '1.35'),
            ('Honda 2004', 'imgs/2004.png', '0.95'),
            ('Honda Odyssey', 'imgs/Odyssey.png', '1.35'),
            ('Ford', 'imgs/Ford.png', '1.50'),
            ('Honda CRV', 'imgs/CRV.png', '1.80'),
            ('Honda Jazz', 'imgs/Jazz.png', '1.05') ";
      if ($conn->query($sql) === true) {}
    }

        $datas = array();

        # TO READ DATA
        $sql = "SELECT * FROM CARS WHERE available = 1";
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
            $html .= " <div class=\"col-3\">
            <h3>".$row["model"]."</h3>
            <img src=\"".$row["img"]."\">
            <p>Price: $".$row["price"]." </p>
            <p>(per km)</p>
            <button type=\"button\" onclick=\"openBox('" .$row["carid"]."','" .$row["model"]."', ".$row["price"].")\";>Select
            </button>
          </div>";}
          echo $html;
        }

        $conn -> close();

        ?>

            </div>
        </div>
    </div>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDx5lbrMhv8DOYOGxWQavDHU0ZmBT2P-g8&callback=initMap"></script>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST" )
{
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if($_POST["price"] == "")
    {
      echo "<script>alert('Order Failed! Make sure to Set the map before clicking Order')</script>";
    }
    else{
      $check = (float) $_POST["distance"];
      if($check < 50){
      $servername = "localhost";
      $username = "root";
      $pswrd = "";
      $dbname = "services";

      $conn = new mysqli($servername, $username, $pswrd, $dbname);

      if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}


        // TO CREATE TABLE
        $sql = "CREATE TABLE TRIPS (
          tripid int PRIMARY KEY AUTO_INCREMENT,
          userid INT NOT NULL,
          carid INT NOT NULL,
          src VARCHAR(50) NOT NULL,
          dest VARCHAR(50) NOT NULL,
          dist VARCHAR(5) NOT NULL,
          price VARCHAR(5) NOT NULL,
          tm TIME NOT NULL,
          type VARCHAR(4) NOT NULL
          )";

    if($conn->query($sql) === TRUE){}

    $uid = $_SESSION['userid'];
    $cid = $_POST['carids'];
    $src = $_POST['srcaddr'];
    $dest = $_POST['destaddr'];
    $dist = $_POST['distance'];
    $price = ((float) $_POST['price']) * $check;
    $price2 = round($price, 2);
    $tm = $_POST['time'];
    $sql = "INSERT INTO TRIPS (userid, carid, src, dest, dist, price, tm, type)
    VALUES ('$uid', '$cid', '$src', '$dest', '$dist', '$price2', '$tm', 'sA')";

    try {
        if($conn->query($sql) === TRUE){
          $_SESSION['service'] = "sA";
          header('Location: cart.php');
        } else {
          throw new Exception("Something went wrong! Try again later.");
        }
    } catch (Exception $e) {
          echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
    }

    $conn -> close();

  }
else{
  echo "<script>alert('Distance cannot be greater than 50km')</script>" ;
}
    }
  }
  else {echo "<script>alert('Please Login!');window.location.href = \"signin.php\";</script>" ;}
}


    ?>
