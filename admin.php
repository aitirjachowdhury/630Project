<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "services";

    $conn = new mysqli($servername, $username, $pswrd, $dbname);

    if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}


    //For Admin
    $_SESSION['type'] = 'admin';

    //For user
    $_SESSION['type'] = 'user';

    //if admin login we will check session and display admin content
    if($_SESSION['type']=='admin'){
    echo 'Admin content';
    }

    //if user login we will check session and display user content
    if($_SESSION['type']=='user'){
    echo 'User content';
    }
     ?>

  </body>
</html>
