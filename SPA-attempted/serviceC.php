<?php
ob_start();
session_start();
?>
<body ng-controller="ServiceController">

    <div style="text-align: center;"><br><br><br><br>
      <h4>Please choose one of the following options to help you compare and select the most eco-friendly trip</h4><br><br>
    </div>

    <div class="service1">

      <a href="#!home/serviceC_A"><button class="service2">Ride to a destination from this source</button></a>
        <br>
      <a href="#!home/serviceC_B"><button class="service2">Ride & Deliver an item from a store</button></a>
    </div>

    </body>
