<!DOCTYPE html>
<html lang="en" dir="ltr">
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
      <a href="signin.php">Log Out</a>
      </div>
    </div>

    <!-- For SPA -->
    <div class="sidenav">
      <br><br>
      <a href="#">View</a>
      <a href="#">Insert</a>
      <a href="#">Delete</a>
      <a href="#">Update</a>
    </div>

    <div class="main">
      <br><br><br>
      <h1 style="text-align: center;">Database Maintenance</h1>

    <div class="selection" id="topForm">
      <form class="" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" width="200px;">
        <label for="table"> Table: </label>
          <select name="table" >
            <option value="noSel">No Selection</option>
            <option value="CARS">Cars</option>
            <option value="FLOWERS">Flowers</option>
            <option value="COFFEE">Coffee</option>
            <option value="ITEMS">Items</option>
            <option value="ORDERS">Orders</option>
            <option value="TRIPS">Trips</option>
            <option value="USERS">Users</option>
          </select>
        <label for="option"> Options: </label>
          <select name="option">
            <option value="noSel">No Selection</option>
            <option value="view">VIEW</option>
            <option value="insert">INSERT</option>
            <option value="delete">DELETE</option>
            <option value="update">UPDATE</option>
          </select>
          <input class="select" name="select" type="submit" value="Make Selection">
      </form>
    </div>

    <div class="viewTable">
      <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "services";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

           if (isset($_POST['select']))
           {
             //CAR TABLE VIEW
             if ($_POST['table'] === "CARS" && $_POST['option'] === "view"){
               $sql = "SELECT * FROM cars";
               $result = mysqli_query($conn, $sql);

               echo "<table>
                       <tr>
                       <th>CAR ID</th>
                       <th>MODEL</th>
                       <th>IMAGES</th>
                       <th>PRICE</th>
                       <th>AVAILABILITY</th>
                       </tr>";
               try {
                 if(mysqli_num_rows($result) > 0){

                   while($row = mysqli_fetch_assoc($result)){
                       echo "<tr><td>" . $row["carid"]
                       .  " </td><td> " . $row["model"]
                       .  " </td><td> " . $row["imgs"]
                       .  " </td><td> " . $row["price"]
                       .  " </td><td> " . $row["available"]
                       . " </td></tr><br>";
                   }
                   echo "</table>";
                 }
                 else {
                     throw new Exception("No Records Found");
                 }
               }
               catch (Exception $e) {
                 echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
               }
             }

             //FLOWER TABLE VIEW
             elseif ($_POST['table'] === "FLOWERS" && $_POST['option'] === "view"){

                $sql = "SELECT * FROM flower";
                $result = mysqli_query($conn, $sql);

                echo "<table>
                        <tr>
                        <th>FLOWER ID</th>
                        <th>FLOWER TYPE</th>
                        <th>STORE CODE</th>
                        <th>IMAGES</th>
                        <th>PRICE</th>
                        </tr>";

                try {
                  if(mysqli_num_rows($result) > 0){

                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr> <td>" . $row["flowerid"]
                        .  " </td><td> " . $row["flowerType"]
                        .  " </td><td> " . $row["storeCode"]
                        .  " </td><td> " . $row["img"]
                        .  " </td><td> " . $row["price"]
                        . " </td></tr><br>";
                    }
                    echo "</table>";
                  } else {
                      throw new Exception("No Records Found");
                  }
                } catch (Exception $e) {
                  echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
                }

             }

            //COFFEE TABLE VIEW
             elseif ($_POST['table'] === "COFFEE" && $_POST['option'] === "view"){
               $sql = "SELECT * FROM COFFEE";
               $result = mysqli_query($conn, $sql);

               echo "<table>
                       <tr>
                       <th>COFFEE ID</th>
                       <th>COFFEE TYPE</th>
                       <th>STORE CODE</th>
                       <th>IMAGES</th>
                       <th>PRICE</th>
                       </tr>";

               try {
                 if(mysqli_num_rows($result) > 0){

                   while($row = mysqli_fetch_assoc($result)){
                       echo "<tr> <td>" . $row["coffeeid"]
                       .  " </td><td> " . $row["coffeeType"]
                       .  " </td><td> " . $row["storeCode"]
                       .  " </td><td> " . $row["img"]
                       .  " </td><td> " . $row["price"]
                       . " </td></tr><br>";
                   }
                   echo "</table>";
                 } else {
                     throw new Exception("No Records Found");
                 }
               } catch (Exception $e) {
                 echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
               }
             }

              //ITEMS TABLE VIEW
             elseif ($_POST['table'] === "ITEMS" && $_POST['option'] === "view"){

                $sql = "SELECT * FROM ITEMS";
                $result = mysqli_query($conn, $sql);

                echo "<table>
                        <tr>
                        <th>PRODUCT ID</th>
                        <th>USER ID</th>
                        <th>SOURCE</th>
                        <th>DESTINATION</th>
                        <th>DISTANCE</th>
                        <th>TIME</th>
                        </tr>";

                try {
                  if(mysqli_num_rows($result) > 0){

                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td>" . $row["PRODUCTID"]
                        .  " </td><td> " . $row["USERID"]
                        .  " </td><td> " . $row["SRC"]
                        .  " </td><td> " . $row["DEST"]
                        .  " </td><td> " . $row["DIST"]
                        .  " </td><td> " . $row["TM"]
                        . " </td></tr><br>";
                    }
                    echo "</table>";
                  } else {
                      throw new Exception("No Records Found");
                  }
                } catch (Exception $e) {
                  echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
                }
             }

            //ORDER TABLE VIEW
             elseif ($_POST['table'] === "ORDERS" && $_POST['option'] === "view"){
               $sql = "SELECT * FROM ORDERS";
               $result = mysqli_query($conn, $sql);

               echo "<table>
                       <tr>
                       <th>ORDER ID</th>
                       <th>USER ID</th>
                       <th>TRIP ID</th>
                       <th>PRODUCT ID</th>
                       <th>DATE ISSUED</th>
                       </tr>";

               try {
                 if(mysqli_num_rows($result) > 0){

                   while($row = mysqli_fetch_assoc($result)){
                       echo "<tr><td>" . $row["orderid"]
                       .  " </td><td> " . $row["userid"]
                       .  " </td><td> " . $row["tripid"]
                       .  " </td><td> " . $row["productid"]
                       .  " </td><td> " . $row["date_issued"]
                       . " </td></tr><br>";
                   }
                   echo "</table>";
                 } else {
                     throw new Exception("No Records Found");
                 }
               } catch (Exception $e) {
                 echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
               }
             }

             //TRIPS TABLE VIEW
             elseif ($_POST['table'] === "TRIPS" && $_POST['option'] === "view"){
               $sql = "SELECT * FROM TRIPS";
               $result = mysqli_query($conn, $sql);

               echo "<table>
                       <tr>
                       <th>TRIP ID</th>
                       <th>USER ID</th>
                       <th>CAR ID</th>
                       <th>SOURCE</th>
                       <th>DESTINATION</th>
                       <th>DISTANCE</th>
                       <th>PRICE</th>
                       <th>TIME</th>
                       </tr>";

               try {
                 if(mysqli_num_rows($result) > 0){

                   while($row = mysqli_fetch_assoc($result)){
                       echo "<tr><td>" . $row["TRIPID"]
                       .  " </td><td> " . $row["USERID"]
                       .  " </td><td> " . $row["CARID"]
                       .  " </td><td> " . $row["SRC"]
                       .  " </td><td> " . $row["DEST"]
                       .  " </td><td> " . $row["DIST"]
                       .  " </td><td> " . $row["PRICE"]
                       .  " </td><td> " . $row["TM"]
                       . " </td></tr><br>";
                   }
                   echo "</table>";
                 } else {
                     throw new Exception("No Records Found");
                 }
               } catch (Exception $e) {
                 echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
               }
             }

              //USERS TABLE VIEW
             elseif ($_POST['table'] === "USERS" && $_POST['option'] === "view"){

                $sql = "SELECT * FROM USERS";
                $result = mysqli_query($conn, $sql);

                echo "<table>
                        <tr>
                        <th>USER ID</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>TELEPHONE</th>
                        <th>MAILING ADDRESS</th>
                        <th>EMAIL</th>
                        </tr>";

                try {
                  if(mysqli_num_rows($result) > 0){

                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td>" . $row["USERID"]
                        .  " </td><td> " . $row["USERNAME"]
                        .  " </td><td> " . $row["PSWRD"]
                        .  " </td><td> " . $row["FIRST_NAME"]
                        .  " </td><td> " . $row["LAST_NAME"]
                        .  " </td><td> " . $row["TEL_NO"]
                        .  " </td><td> " . $row["MAIL_ADDR"]
                        .  " </td><td> " . $row["EMAIL"]
                        . " </td></tr><br>";
                    }
                    echo "</table>";
                  } else {
                      throw new Exception("No Records Found");
                  }
                } catch (Exception $e) {
                  echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
                }
             }

              //INSERT VALUES INTO CARS TABLE
              elseif ($_POST['table'] === "CARS" && $_POST['option'] === "insert")
              {

                echo "<div>
                  <form class='insert' method='post' action='insert.php'>

                    <label for='model'> Model: </label>
                    <input type='text' name='model' id='insertForm'></input>
                    <label for='imgs'> Image: </label>
                    <input type='text' name='imgs' id='insertForm'></input>
                    <label for='price'> Price: </label>
                    <input type='text' name='price' id='insertForm'></input>

                    <input type='submit' name='insert' value='Insert Data'>
                  </form>
                </div>";
              }

              else if ($_POST['table'] === "FLOWERS" && $_POST['option'] === "insert"){

                echo "<div>
                  <form class='insert' method='post' action='insert_flower.php'>

                    <label for='flowerid'> ID: </label>
                    <input type='text' name='flowerid' id='insertForm'></input>
                    <label for='flowerType'> Type: </label>
                    <input type='text' name='flowerType' id='insertForm'></input>
                    <label for='storeCode'> Store Code: </label>
                    <input type='text' name='storeCode' id='insertForm'></input>
                    <label for='img'> Image: </label>
                    <input type='text' name='img' id='insertForm'></input>
                    <label for='price'> Price: </label>
                    <input type='text' name='price' id='insertForm'></input>

                    <input type='submit' name='insert' value='Insert Data'>
                  </form>
                </div>";
              }

              else if ($_POST['table'] === "COFFEE" && $_POST['option'] === "insert"){
                 echo "<div>
                  <form class='insert' method='post' action='insert_coffee.php'>

                    <label for='coffeeid'> ID: </label>
                    <input type='text' name='coffeeid' id='insertForm'></input>
                    <label for='coffeeType'> Type: </label>
                    <input type='text' name='coffeeType' id='insertForm'></input>
                    <label for='storeCode'> Store Code: </label>
                    <input type='text' name='storeCode' id='insertForm'></input>
                    <label for='img'> Image: </label>
                    <input type='text' name='img' id='insertForm'></input>
                    <label for='price'> Price: </label>
                    <input type='text' name='price' id='insertForm'></input>

                    <input type='submit' name='insert' value='Insert Data'>
                  </form>
                </div>";
              }

              else if ($_POST['table'] === "ITEMS" && $_POST['option'] === "insert"){
                  echo "<div>
                  <form class='insert' method='post' action='insert_items.php'>

                    <label for='productid'> Product ID: </label>
                    <input type='text' name='productid' id='insertForm'></input>
                    <label for='userid'> User ID: </label>
                    <input type='text' name='userid' id='insertForm'></input>
                    <label for='src'> Source: </label>
                    <input type='text' name='src' id='insertForm'></input>
                    <label for='dest'> Destination: </label>
                    <input type='text' name='dest' id='insertForm'></input>
                    <label for='dist'> Distance: </label>
                    <input type='text' name='dist' id='insertForm'></input>
                    <label for='tm'> Time: </label>
                    <input type='time' name='tm' id='insertForm'></input>

                    <input type='submit' name='insert' value='Insert Data'>
                  </form>
                </div>";
              }

              else if ($_POST['table'] === "ORDERS" && $_POST['option'] === "insert"){
                echo "<div>
                  <form class='insert' method='post' action='insert_order.php'>

                    <label for='orderid'> Order ID: </label>
                    <input type='text' name='orderid' id='insertForm'></input>
                    <label for='userid'> User ID: </label>
                    <input type='text' name='userid' id='insertForm'></input>
                    <label for='tripid'> Trip ID: </label>
                    <input type='text' name='tripid' id='insertForm'></input>
                    <label for='productid'> Product ID: </label>
                    <input type='text' name='productid' id='insertForm'></input>
                    <label for='date_issued'> Date: </label>
                    <input type='date' name='date_issued' id='insertForm'></input>

                    <input type='submit' name='insert' value='Insert Data'>
                  </form>
                </div>";

              }

              else if ($_POST['table'] === "TRIPS" && $_POST['option'] === "insert"){
                echo "<div>
                  <form class='insert' method='post' action='insert_trips.php'>

                    <label for='userid'> User ID: </label>
                    <input type='text' name='userid' id='insertForm'></input>
                    <label for='carid'> Car ID: </label>
                    <input type='text' name='carid' id='insertForm'></input>
                    <label for='src'> Source: </label>
                    <input type='text' name='src' id='insertForm'></input>
                    <label for='dest'> Destination: </label>
                    <input type='text' name='dest' id='insertForm'></input>
                    <label for='dist'> Distance: </label>
                    <input type='text' name='dist' id='insertForm'></input>
                    <label for='price'> Price: </label>
                    <input type='text' name='price' id='insertForm'></input>
                    <label for='tm'> Time: </label>
                    <input type='time' name='tm' id='insertForm'></input>

                    <input type='submit' name='insert' value='Insert Data'>
                  </form>
                </div>";

              }

              else if ($_POST['table'] === "USERS" && $_POST['option'] === "insert"){
                  echo "<div>
                  <form class='insert' method='post' action='insert_users.php'>

                    <label for='username'> Username: </label>
                    <input type='text' name='username' id='insertForm'></input>
                    <label for='pswrd'> Password: </label>
                    <input type='text' name='pswrd' id='insertForm'></input>
                    <label for='first_name'> First Name: </label>
                    <input type='text' name='first_name' id='insertForm'></input>
                    <label for='last_name'> Surname: </label>
                    <input type='text' name='last_name' id='insertForm'></input>
                    <label for='tel_no'> Tel. No: </label>
                    <input type='text' name='tel_no' id='insertForm'></input>
                    <label for='mail_addr'> Mailing Address: </label>
                    <input type='text' name='mail_addr' id='insertForm'></input>
                    <label for='email'> Email: </label>
                    <input type='text' name='email' id='insertForm'></input>

                    <input type='submit' name='insert' value='Insert Data'>
                  </form>
                </div>";

              }

              //DELETE Operation
              else if ($_POST['table'] === "CARS" && $_POST['option'] === "delete"){
                echo "<div>
                <form class='insert' method='post' action='delete_car.php'>
                    <label for='carid'> Car ID: </label>
                    <input type='text' name='carid' id='insertForm'></input>

                    <input type='submit' name='insert' value='Delete Data'>
                </form>
                </div>";
              }

              else if ($_POST['table'] === "FLOWERS" && $_POST['option'] === "delete"){
                echo "<div>
                <form class='insert' method='post' action='delete_flower.php'>
                    <label for='flowerid'> Flower ID: </label>
                    <input type='text' name='flowerid' id='insertForm'></input>

                    <input type='submit' name='insert' value='Delete Data'>
                </form>
                </div>";
              }

              else if ($_POST['table'] === "COFFEE" && $_POST['option'] === "delete"){
                echo "<div>
                <form class='insert' method='post' action='delete_coffee.php'>
                    <label for='coffeeid'> Coffee ID: </label>
                    <input type='text' name='coffeeid' id='insertForm'></input>

                    <input type='submit' name='insert' value='Delete Data'>
                </form>
                </div>";
              }

              else if ($_POST['table'] === "ITEMS" && $_POST['option'] === "delete"){
                echo "<div>
                <form class='insert' method='post' action='delete_item.php'>
                    <label for='productid'> Product ID: </label>
                    <input type='text' name='productid' id='insertForm'></input>

                    <input type='submit' name='insert' value='Delete Data'>
                </form>
                </div>";
              }

              else if ($_POST['table'] === "TRIPS" && $_POST['option'] === "delete"){
                echo "<div>
                <form class='insert' method='post' action='delete_trip.php'>
                    <label for='tripid'> Trip ID: </label>
                    <input type='text' name='tripid' id='insertForm'></input>

                    <input type='submit' name='insert' value='Delete Data'>
                </form>
                </div>";
              }

              else if ($_POST['table'] === "ORDERS" && $_POST['option'] === "delete"){
                echo "<div>
                <form class='insert' method='post' action='delete_order.php'>
                    <label for='orderid'> Order ID: </label>
                    <input type='text' name='orderid' id='insertForm'></input>

                    <input type='submit' name='insert' value='Delete Data'>
                </form>
                </div>";
              }

              else if ($_POST['table'] === "USERS" && $_POST['option'] === "delete"){
                echo "<div>
                <form class='insert' method='post' action='delete_user.php'>
                    <label for='userid'> User ID: </label>
                    <input type='text' name='userid' id='insertForm'></input>

                    <input type='submit' name='insert' value='Delete Data'>
                </form>
                </div>";
              }
              //UPDATE Operation
              else if ($_POST['table'] === "CARS" && $_POST['option'] === "update"){
                echo "<div>
                <form method='post' action='update_car.php'>
                    <label for='carid'> Car ID: </label>
                    <input type='text' name='carid' id='insertForm'></input>
                    <select name='cars' style='width:200px;'>
                      <option value='price'>Price</option>
                      <option value='model'>Model</option>
                      <option value='available'>Availability</option>
                    </select>
                    <label for='val' style='margin-left: 15px;'> Value: </label>
                    <input type='text' name='val' id='insertForm'></input>
                    <input type='submit' name='update' value='Update Data'>
                </form>
                </div>";
              }

              else if ($_POST['table'] === "FLOWERS" && $_POST['option'] === "update"){
                echo "<div>
                <form method='post' action='update_flower.php'>
                <label for='flowerid'> Flower ID: </label>
                <input type='text' name='flowerid' id='insertForm'></input>
                <select name='flowers' style='width:200px;'>
                <option value='price'>Price</option>
                <option value='flowerType'>Flower Type</option>
                <option value='storeCode'>Store Code</option>
                </select>
                <label for='val' style='margin-left: 15px;'> Value: </label>
                <input type='text' name='val' id='insertForm'></input>
                <input type='submit' name='update' value='Update Data'>
                </form>
                </div>";
              }

              else if ($_POST['table'] === "COFFEE" && $_POST['option'] === "update"){
                echo "<div>
                <form method='post' action='update_coffee.php'>
                <label for='coffeeid'> Coffee ID: </label>
                <input type='text' name='coffeeid' id='insertForm'></input>
                <select name='coffee' style='width:200px;'>
                <option value='price'>Price</option>
                <option value='coffeeType'>Coffee Type</option>
                <option value='storeCode'>Store Code</option>
                </select>
                <label for='val' style='margin-left: 15px;'> Value: </label>
                <input type='text' name='val' id='insertForm'></input>
                <input type='submit' name='update' value='Update Data'>
                </form>
                </div>";
              }

              else if ($_POST['table'] === "ITEMS" && $_POST['option'] === "update"){
                echo "<div>
                <form method='post' action='update_item.php'>
                <label for='productid'> Product ID: </label>
                <input type='text' name='productid' id='insertForm'></input>
                <select name='items' style='width:200px;'>
                <option value='SRC'>Source</option>
                <option value='DEST'>Destination</option>
                <option value='DIST'>Distance</option>
                <option value='TM'>Time</option>
                <option value='USERID'>User ID</option>
                </select>
                <label for='val' style='margin-left: 15px;'> Value: </label>
                <input type='text' name='val' id='insertForm'></input>
                <input type='submit' name='update' value='Update Data'>
                </form>
                </div>";
              }

              else if ($_POST['table'] === "TRIPS" && $_POST['option'] === "update"){
                echo "<div>
                <form method='post' action='update_trip.php'>
                <label for= tripid'> Trip ID: </label>
                <input type='text' name='tripid' id='insertForm'></input>
                <select name='trips' style='width:200px;'>
                <option value='CARID'>Car ID</option>
                <option value='SRC'>Source</option>
                <option value='DEST'>Destination</option>
                <option value='DIST'>Distance</option>
                <option value='TM'>Time</option>
                <option value='USERID'>User ID</option>
                </select>
                <label for='val'> Value: </label>
                <input type='text' name='val' id='insertForm'></input>
                <input type='submit' name='update' value='Update Data'>
                </form>
                </div>";
              }

              else if ($_POST['table'] === "ORDERS" && $_POST['option'] === "update"){
                echo "<div>
                <form method='post' action='update_order.php'>
                <label for='orderid'> Order ID: </label>
                <input type='text' name='orderid' id='insertForm'></input>
                <select name='orders' style='width:200px;'>
                <option value='productid'>Product ID</option>
                <option value='tripid'>Trip ID</option>
                <option value='userid'>User ID</option>
                <option value='date_issued'>Date Issued</option>
                </select>
                <label for='val'> Value: </label>
                <input type='text' name='val' id='insertForm'></input>
                <input type='submit' name='update' value='Update Data'>
                </form>
                </div>";
              }

              else if ($_POST['table'] === "USERS" && $_POST['option'] === "update"){
                echo "<div>
                <form method='post' action='update_user.php'>
                <label for='userid'> User ID: </label>
                <input type='text' name='userid' id='insertForm'></input>
                <select name='user' style='width:200px;'>
                <option value='BALANCE'>Balance</option>
                <option value='USERNAME'>Username</option>
                <option value='PSWRD'>Password</option>
                <option value='FIRST_NAME'>First Name</option>
                <option value='LAST_NAME'>Last Name</option>
                <option value='TEL_NO'>Phone Number</option>
                <option value='MAIL_ADDR'>Mail Address</option>
                <option value='EMAIL'>Email</option>
                </select>
                <label for='val'> Value: </label>
                <input type='text' name='val' id='insertForm'></input>
                <input type='submit' name='update' value='Update Data'>
                </form>
                </div>";
              }
              else {
                echo "Invalid Selection";
              }
           }//end of isset statement
        $conn -> close();
       ?>

</form>
    </div>

    </div>

  </body>
</html>
