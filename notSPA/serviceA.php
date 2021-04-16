
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>P2S</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>

    <div class="topnav">
      <h3>P2S</h3>
      <div class="option">
      <a class="active" href="index.php">Home</a>
      <a href="about.html">About Us</a>
      <a href="contact.html">Contact Us</a>
      <a href="reviews.php">Reviews</a>
      <a href="cart.php">Shopping Cart</a>
      <a href="signin.php">Sign-in</a>
      </div>
    </div>
  </body>
</html>

<?php
ob_start();
session_start();
?>

        <br><br><br>

    <div id="myModal" class="modal">

      <div class="modal-content">
        <span class="close">&times;</span>
        <div class="locSelector">
        <form id="distance_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <input type="hidden" name="price" id="price">
          <input type="hidden" name="distance" id="distance">
          <input type="hidden" name="carids" id="carids">
          <input type="hidden" name="cars" id="cartype">
          <div class="address">
            <p>Source: </p>
            <input type="text" style="width: 90%;" id="srcaddr" name="srcaddr" placeholder="Enter Address" required>
          </div>

         <div class="address">
          <p>Destination: </p>
          <input type="text" style="width: 90%;" id="destaddr" name="destaddr" placeholder="Enter Address" required>         </div>

          <div style="width: 10%;padding-left: 20px; padding-top: 25px; float:left">
            <button type="submit" style = "width: 100%; padding: 7px;" id="set">Set</button>
          </div>
        <div id="map"></div>
        <p>Pick-up Time:</p>
        <input type="time" style="margin-bottom: 10px;" name="time" required>
        <br>
        <button type="submit" style="margin-bottom: 20px;" name="order">Order</button>
          </form>

      </div>
      </div>
    </div>
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

    <script>
      // Get the modal
      var map;
      var price;
      var modal = document.getElementById("myModal");

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal
      function openBox(carids, chosentype, price) {
        modal.style.display = "block";
        $('#cartype').val(chosentype);
        $('#carids').val(carids);
        this.price = price;
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
        $('#srcaddr').val('');
        $('#destaddr').val('');
        map = new google.maps.Map(document.getElementById("map"),
                  { zoom: 15, center: {lat: 43.6533, lng: -79.3834}});
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
          $('#srcaddr').val('');
          $('#destaddr').val('');
          map = new google.maps.Map(document.getElementById("map"),
                  { zoom: 15, center: {lat: 43.6533, lng: -79.3834}});
        }
      }

      var map;

      function initMap()
      {
        map = new google.maps.Map(document.getElementById("map"),
                  { zoom: 15, center: {lat: 43.6533, lng: -79.3834}});
      }

        function displayRoute(origin, destination, directionsService, directionsDisplay) {
            directionsService.route({
                origin: origin,
                destination: destination,
                travelMode: google.maps.DirectionsTravelMode.DRIVING,
                avoidTolls: true
            }, function (response, status) {
                if (status === 'OK') {
                    directionsDisplay.setMap(map);
                    directionsDisplay.setDirections(response);
                } else {
                    directionsDisplay.setMap(null);
                    directionsDisplay.setDirections(null);
                    alert('Could not display directions due to: ' + status);
                }
            });
        }

        function calculateDistance(source, destination) {

        var DistanceMatrixService = new google.maps.DistanceMatrixService();
        DistanceMatrixService.getDistanceMatrix(
            {
                origins: [source],
                destinations: [destination],
                travelMode: google.maps.DirectionsTravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                avoidHighways: false,
                avoidTolls: true
            }, function (response, status) {
              if (status != google.maps.DistanceMatrixStatus.OK) {
                $('#result').html(err);
            } else {
                var origin = response.originAddresses[0];
                var destination = response.destinationAddresses[0];
                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                    alert("Sorry! not available.");
                } else {
                    var distance = response.rows[0].elements[0].distance;
                  $('#distance').val(distance.value / 1000);
                }
              }
              });
        }


//ON SUBMIT
$( "#set" ).click(function(e) {
  e.preventDefault();
      $('#price').val(price);
            map = new google.maps.Map(document.getElementById("map"),
                  { zoom: 15, center: {lat: 43.6533, lng: -79.3834}});

            var source = $('#srcaddr').val();
            var destination = $('#destaddr').val();
            var directionsDisplay = new google.maps.DirectionsRenderer({'draggable': false});
            var directionsService = new google.maps.DirectionsService();
           displayRoute(source, destination, directionsService, directionsDisplay);
           calculateDistance(source, destination);
          });

</script>
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
    $sql = "INSERT INTO TRIPS (userid, carid, src, dest, dist, price, tm, type) VALUES ('$uid', '$cid', '$src', '$dest', '$dist', '$price2', '$tm', 'sA')";

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
