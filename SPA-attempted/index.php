<?php
ob_start();
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
  <body ng-controller="ServiceController">
    <br>
    <form id="distance_form" method="post">
      <input style="position: fixed; width: 20%; margin: 10px;" type="number" name="orderid" placeholder="Search Order ID..">
    </form>

    <div style="text-align: center;"><br><br><br><br>
      <h2>Welcome to P2S!</h2><br>
      <h4>Choose one of the following options to get started</h4><br><br>
    </div>

    <div class="service1" >
      <!-- <button class="service2"  onclick="window.location.href='serviceA.php'"> Ride to a destination from this source</button>
      <button class="service2" onclick="window.location.href='serviceB.php';">Ride & Deliver an item from a store</button><br>
      <button class="service2" onclick="window.location.href='serviceC.php';">Ride Green</button>
      <button class="service2" onclick="window.location.href='serviceD.php';">Clean Green</button> -->
      <a href="#!home/serviceA"><button class="service2"> Ride to a destination from this source</button></a>
      <a href="#!home/serviceB"><button class="service2"> Ride & Deliver an item from a store</button></a>
      <a href="#!home/serviceC"><button class="service2"> Ride Green</button></a>
      <a href="#!home/serviceD"><button class="service2"> Clean Green</button></a>
    </div>

    <!-- BROWSER detection code -->
    <?php
    function brdetect()
      {
          $res = $_SERVER['HTTP_USER_AGENT'];
          if ( strpos ($res, "Chrome") == true)
            echo "<h2 class='viewTable'>Browser Info: Google Chrome</h2>";
          else if ( strpos ($res, "Firefox") == true)
            echo "<h2 class='viewTable'> Browser Info: Firefox</h2>";
          else if ( strpos ($res, "Trident") == true)
            echo "<h2 class='viewTable'>Browser Info: Internet Explorer</h2>";
          else  echo "Browser: unkown";
      }
      brdetect();
    ?>

  </body>
</html>
