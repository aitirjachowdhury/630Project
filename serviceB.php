<?php
ob_start();
session_start();
?>

    <br><br><br>

    <div class="content">
      <h1 class="title">SEARCH STORE</h1>
      <div class="underline"></div>
        <div class="container">
          <div class="row">
            <div class="col-2">
              <a href="#coffeeShop">
              <img src="imgs/cShop.jpg">
                <h3>Coffee Shops</h3>
              </a>
            </div>
            <div class="col-2">
              <a href="#flowerShop">
                <img src="imgs/fShop.jpg">
                <h3>Flower Stores</h3>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <div class="locSelector">
          <form id="distance_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="flowerid" id="flowerid">
            <input type="hidden" name="distance" id="distance">
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


      <br><br><br><br><br>

      <!-- COFFEE SHOP -->
      <div id = "coffeeShop">
        <h2 class="title">Choose a Beverage: </h2>
      </div>
      <div class="myCoffee">
        <div class="item-container">
          <div class="row">
            <?php
                  $servername = "localhost";
                  $username = "root";
                  $pswrd = "";
                  $dbname = "services";

                  $conn = new mysqli($servername, $username, $pswrd, $dbname);

                  if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

                    $sql = "CREATE TABLE COFFEE(
                      coffeeid VARCHAR(4) PRIMARY KEY NOT NULL,
                      coffeeType VARCHAR(30) NOT NULL,
                      storeCode VARCHAR(20) NOT NULL,
                      img VARCHAR(30) NOT NULL,
                      price VARCHAR(5) NOT NULL,
                      rating FLOAT(6, 2)
                    )";

                  if($conn->query($sql) === TRUE){

                  $sql = "INSERT INTO COFFEE(coffeeid, coffeeType, storeCode, img, price, rating)
                  VALUES ('c1', 'Designed Latte', 'f6', 'imgs/coffee.png', '4.99', 3),
                        ('c2', 'Iced Coffee', 'g7', 'imgs/iced.png', '2.99', 3),
                        ('c3', 'Black Tea', 'h8', 'imgs/tea.jpg', '2.99', 3),
                        ('c4', 'Choco Pastries', 'i9', 'imgs/desert1.png', '5.99', 3),
                        ('c5', 'Colorful Macarons', 'j1', 'imgs/desert2.png', '7.99', 3)";
              if ($conn->query($sql) === true) {}

                  }


                  $datas = array();

                  # TO READ DATA
                  $sql = "SELECT * FROM COFFEE";
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
                      $html .= "<div class=\"col-4\" ondrop=\"drop(event)\" ondragover=\"allowDrop(event)\">
                      <h3>".$row["coffeeType"]."</h3>
                      <img id=\"".$row["coffeeid"]."\" src=\"".$row["img"]."\" draggable=\"true\" ondragstart=\"drag(event)\" width=\"100px\">
                      <p>Price: $".$row["price"]." </p>
                      <p>Rate: " . $row["rating"] . " / 5 </p>
                    </div>";}
                    echo $html;
                  }
$conn->close();
          ?>
            </div>
          </div>
        </div>



      <br><br><br><br><br><br>

<!-- FLOWER STORE -->
<div id = "flowerShop">
  <h2 class="title">Make your Selection: </h2>
</div>
      <div class="myFlower" ondrop="drop(event)" ondragover="allowDrop(event)">
        <div class="item-container">
          <div class="row">


                        <?php
                              $servername = "localhost";
                              $username = "root";
                              $pswrd = "";
                              $dbname = "services";

                              $conn = new mysqli($servername, $username, $pswrd, $dbname);

                              if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
/*
                                $sql = "CREATE TABLE FLOWER(
                                  flowerid VARCHAR(4) PRIMARY KEY NOT NULL,
                                  flowerType VARCHAR(30) NOT NULL,
                                  storeCode VARCHAR(20) NOT NULL,
                                  img VARCHAR(30) NOT NULL,
                                  price VARCHAR(5) NOT NULL,
                                  rating FLOAT(6, 2)
                                )";
*/
                              if($conn->query($sql) === TRUE){

                              $sql = "INSERT INTO FLOWER(flowerid, flowerType, storeCode, img, price, rating)
                              VALUES ('f1', 'Colorful Bouquet', 'a1', 'imgs/flowers.png', '10.00', 3),
                                    ('f2', 'White Lilies', 'b2', 'imgs/lilies.png', '13.00', 3),
                                    ('f3', 'Assorted Yellows', 'c3', 'imgs/yellowF.png', '13.00', 3),
                                    ('f4', 'Flower Crown (Full)', 'd4', 'imgs/crown3.jpg', '15.00', 3),
                                    ('f5', 'Flower Crown (Half)', 'e5', 'imgs/crown1.jpg', '7.50', 3)";
                          if ($conn->query($sql) === true) {}

                              }

                              $datas = array();

                              # TO READ DATA
                              $sql = "SELECT * FROM FLOWER";
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
                                  $html .= "<div class=\"col-4\" ondrop=\"drop(event)\" ondragover=\"allowDrop(event)\">
                                  <h3>".$row["flowerType"]."</h3>
                                  <img id=\"".$row["flowerid"]."\" src=\"".$row["img"]."\" draggable=\"true\" ondragstart=\"drag(event)\" width=\"100px\">
                                  <p>Price: $".$row["price"]." </p>
                                  <p>Rate: " . $row["rating"] . " / 5 </p>
                                </div>";}
                                echo $html;
                              }
            $conn->close();
                      ?>
                                </div>
          </div>
        </div>
      </div>


<div class="cartStore">
      <div id="cart" class="shoppingCart" ondrop="drop(event)" ondragover="allowDrop(event)">
      </div>
</div>



        <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        var count = 0;
        // When the user clicks the button, open the modal
        function openBox() {
          modal.style.display = "block";
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
            map = new google.maps.Map(document.getElementById("map"),
                  { zoom: 15, center: {lat: 43.6533, lng: -79.3834}});

            var source = $('#srcaddr').val();
            var destination = $('#destaddr').val();
            var directionsDisplay = new google.maps.DirectionsRenderer({'draggable': false});
            var directionsService = new google.maps.DirectionsService();
           displayRoute(source, destination, directionsService, directionsDisplay);
           calculateDistance(source, destination);
          });

          //DRAG AND DROP FUNCTIONS
          var count = 0;
          function allowDrop(ev) {
            ev.preventDefault();
          }
          function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
          }
          function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
            $('#flowerid').val(data);
            count++;
            if (count > 1 ){
              alert("Cart Full! Proceed to checkout. ");
              openBox();
            }
          }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDx5lbrMhv8DOYOGxWQavDHU0ZmBT2P-g8&callback=initMap"></script>

        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST" )
        {
          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            if($_POST["distance"] == "")
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
                $sql = "CREATE TABLE ITEMS (
                    productid VARCHAR(4) PRIMARY KEY,
                    userid INT NOT NULL,
                    src VARCHAR(50) NOT NULL,
                    dest VARCHAR(50) NOT NULL,
                    dist VARCHAR(5) NOT NULL,
                    tm TIME NOT NULL,
                    type VARCHAR(4) NOT NULL
                    )";

                if($conn->query($sql) === TRUE){}

                $uid = $_SESSION['userid'];
                $iid = $_POST['flowerid'];
                $src = $_POST['srcaddr'];
                $dest = $_POST['destaddr'];
                $dist = $_POST['distance'];
                $tm = $_POST['time'];
                $sql = "INSERT INTO ITEMS (productid, userid, src, dest, dist, tm, type) VALUES ('$iid', '$uid', '$src', '$dest', '$dist', '$tm', 'sB')";

                try {
                    if($conn->query($sql) === TRUE){
                      $_SESSION['service'] = "sB";
                      header('Location: cart.php');
                    } else {
                      throw new Exception("Something went wrong! Try again later.");
                    }
                } catch (Exception $e) {
                      echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
                }

                $conn->close();
                }
        else{
          echo "<script>alert('Distance cannot be greater than 50km')</script>" ;
        }
            }
          }
          else {echo "<script>alert('Please Login!')</script>" ;}
        }

        ?>
  </body>
</html>
