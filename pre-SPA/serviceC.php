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

    <div style="text-align: center;"><br><br><br><br>
      <h4>Please choose one of the following options to help you compare and select the most eco-friendly trip</h4><br><br>
    </div>

    <div class="service1">
      <button class="service2" onclick="window.location.href='serviceC_A.php';">Ride to a destination from this source</button><br>
      <button class="service2" onclick="window.location.href='serviceC_B.php';">Ride & Deliver an item from a store</button>
    </div>
  </body>
</html>
