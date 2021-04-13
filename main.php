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

  <body>
    <div class="topnav">
      <h3>P2S</h3>
      <div class="option">

      <a href="#!home">Home</a>
      <a href="#!aboutus">About Us</a>
      <a href="#!contactus">Contact Us</a>
      <a href="#!reviews">Reviews</a>
      <a href="#!shoppingcart">Shopping Cart</a>
      <a class="active" href="#/">Sign-in</a>
      </div>
    </div>

    <div ng-view></div>

   <script src="spa.js"></script>
  </body>
</html>
