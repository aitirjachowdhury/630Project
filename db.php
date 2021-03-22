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
      <a href="index.php">Home</a>
      <a href="about.html">About Us</a>
      <a href="contact.html">Contact Us</a>
      <a href="reviews.html">Reviews</a>
      <a href="cart.php">Shopping Cart</a>
      <a href="db.php" class="active">DB Maintain</a>
      <a href="signin.php">Sign-in</a>
      </div>
    </div>

    <div class="selection" id="topForm">
      <form class="" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" width="200px;">
        <label for="table"> Table: </label>
          <select name="table" >
            <option value="CARS">Cars</option>
            <option value="noSel">No Selection</option>
            <option value="FLOWERS">Flowers</option>
            <option value="COFFEE">Coffee</option>
            <option value="ITEMS">Items</option>
            <option value="ORDERS">Orders</option>
            <option value="TRIPS">Trips</option>
            <option value="USERS">Users</option>
          </select>
        <label for="option"> Options: </label>
          <select name="option">
            <option value="insert">INSERT</option>
            <option value="noSel">No Selection</option>
            <option value="view">VIEW</option>
            <option value="delete">DELETE</option>
            <option value="update">UPDATE</option>
          </select>
          <input class="select" name="select" type="submit" value="Make Selection">
          <!-- <button type="select" name="select" style="width: 200px" onclick="hello()">
          Make Selection </button> -->
      </form>
    </div>

<!--
    <div class="selection" >
      <form class="insert" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

        <label for="model">Model: </label>
        <input type="text" name="model"id="insertForm"></input>
        <label for="imgs">Image: </label>
        <input type="text" name="imgs"id="insertForm"></input>
        <label for="price">Price: </label>
        <input type="text" name="price"id="insertForm"></input>

        <input type="submit" name="insert" value="Insert Data">
      </form>
    </div>
-->

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
             //}
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


           }
              //INSERT VALUES INTO CARS TABLE
              elseif ($_POST['table'] === "CARS" && $_POST['option'] === "insert")
              {

                echo "<div>
                  <form class='insert' method='post' action='" . $_SERVER['PHP_SELF'] . "'>

                    <label for='model'> Model: </label>
                    <input type='text' name='model' id='insertForm'></input>
                    <label for='imgs'> Image: </label>
                    <input type='text' name='imgs' id='insertForm'></input>
                    <label for='price'> Price: </label>
                    <input type='text' name='price' id='insertForm'></input>

                    <input type='submit' name='insert' value='Insert Data'>
                  </form>
                </div>";

                if (isset($_POST['insert'])){

                  $model = $POST_['model'];
                  $imgs = $POST_['imgs'];
                  $price = $POST_['price'];

                  $sql = "INSERT INTO CARS (model, imgs, price)
                          VALUES ('$model', '$imgs', '$price')";

                          try {
                            if($conn->query($sql) == TRUE){
                              echo "<h2>New Record Created Successfully</h2>";
                            }
                            else {
                              throw new Exception("Failed To Create Record");
                            }
                          }
                          catch (Exception $e) {
                              echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
                          }
                }
              }
            /*
              else if ($_POST['table'] === "FLOWERS" && $_POST['option'] === "insert"){


              }
              else if ($_POST['table'] === "COFFEE" && $_POST['option'] === "insert"){


              }
              else if ($_POST['table'] === "ITEMS" && $_POST['option'] === "insert"){


              }
              else if ($_POST['table'] === "ORDERS" && $_POST['option'] === "insert"){


              }
              else if ($_POST['table'] === "TRIPS" && $_POST['option'] === "insert"){


              }
              else if ($_POST['table'] === "USERS" && $_POST['option'] === "insert"){


              }
              */
              else {
                echo "string";
              }

           }//end of isset statement



        $conn -> close();
       ?>

</form>
    </div>


  </body>
</html>