<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "services";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
 ?>
<br>
 <div class="insertTable">
       <form>
         Choose a table to INSERT value:
           <select ng-model="myInsert">
             <option value="" disabled>Make a Selection
             <option value="cars">Cars
             <option value="flowers">Flowers
             <option value="coffee">Coffee
             <option value="items">Service Purchases
             <option value="users">Users
             <option value="cleaners">Cleaners
             <option value="ordersCL">Orders
             <option value="reviews">Reviews
           </select>
       </form>
<br>
       <div ng-switch="myInsert">
         <div ng-switch-when="cars">
           <div>
             <form class='insert' method='post' action='DB/insert_cars.php'>
               <label for='model'> Model: </label>
               <input type='text' name='model' id='insertForm'></input>
               <label for='img'> Image: </label>
               <input type='text' name='img' id='insertForm'></input>
               <label for='price'> Price: </label>
               <input type='text' name='price' id='insertForm'></input>
               <input type='submit' name='insert' value='Insert Data'>
             </form>
           </div>
           <?php
           if (isset($_POST['insert'])){

               $model = $_POST['model'];
               $img = $_POST['img'];
               $price = $_POST['price'];

               $sql = "INSERT INTO CARS (model, img, price) VALUES ('$model', '$img', '$price')";

               try {
                   if($conn->query($sql) === TRUE){
                      $sql = "SELECT * FROM CARS";
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
                              .  " </td><td> " . $row["img"]
                              .  " </td><td> " . $row["price"]
                              .  " </td><td> " . $row["available"]
                              . " </td></tr><br>";
                          }
                          echo "</table>";
                        } else {
                            throw new Exception("No Records Found");
                        }
                      }
                      catch (Exception $e) {
                        echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
                      }

                   } else {
                       throw new Exception("Failed To Create Record");
                   }
               } catch (Exception $e) {
                   echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
               }

           } 

            ?>
         </div>
</div>

<?php
           if (isset($_POST['select']))
           {
              //INSERT VALUES INTO CARS TABLE
              if ($_POST['table'] === "CARS" && $_POST['option'] === "insert")
              {


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
                    <label for='firstName'> First Name: </label>
                    <input type='text' name='firstName' id='insertForm'></input>
                    <label for='lastName'> Surname: </label>
                    <input type='text' name='lastName' id='insertForm'></input>
                    <label for='telNo'> Tel. No: </label>
                    <input type='text' name='telNo' id='insertForm'></input>
                    <label for='mailAddr'> Mailing Address: </label>
                    <input type='text' name='mailAddr' id='insertForm'></input>
                    <label for='email'> Email: </label>
                    <input type='text' name='email' id='insertForm'></input>

                    <input type='submit' name='insert' value='Insert Data'>
                  </form>
                </div>";

              }

              else if ($_POST['table'] === "CLEANERS" && $_POST['option'] === "insert"){
                  echo "<div>
                  <form class='insert' method='post' action='insert_cleaner.php'>

                    <label for='cname'> Name: </label>
                    <input type='text' name='cname' id='insertForm'></input>
                    <label for='phone'> Phone No: </label>
                    <input type='text' name='phone' id='insertForm'></input>
                    <label for='img'> Image: </label>
                    <input type='text' name='img' id='insertForm'></input>
                    <label for='price'> Price: </label>
                    <input type='text' name='price' id='insertForm'></input>

                    <input type='submit' name='insert' value='Insert Data'>
                  </form>
                </div>";

              }

              else if ($_POST['table'] === "ORDERSCL" && $_POST['option'] === "insert"){
                  echo "<div>
                  <form class='insert' method='post' action='insert_cleaner_order.php'>

                    <label for='cid'> Cleaner ID: </label>
                    <input type='text' name='cid' id='insertForm'></input>
                    <label for='userid'> User ID: </label>
                    <input type='text' name='userid' id='insertForm'></input>
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

              else if ($_POST['table'] === "REVIEWS" && $_POST['option'] === "insert"){
                  echo "<div>
                  <form class='insert' method='post' action='insert_review.php'>

                    <label for='serviceType'> Service Type: </label>
                    <input type='text' name='serviceType' id='insertForm'></input>
                    <label for='rating'> Rating: </label>
                    <input type='text' name='rating' id='insertForm'></input>
                    <label for='review'> Review: </label>
                    <input type='text' name='review' id='insertForm'></input>

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

              else if ($_POST['table'] === "CLEANERS" && $_POST['option'] === "delete"){
                echo "<div>
                <form class='insert' method='post' action='delete_cleaner.php'>
                    <label for='cid'> Cleaner ID: </label>
                    <input type='text' name='cid' id='insertForm'></input>

                    <input type='submit' name='insert' value='Delete Data'>
                </form>
                </div>";
              }

              else if ($_POST['table'] === "ORDERSCL" && $_POST['option'] === "delete"){
                echo "<div>
                <form class='insert' method='post' action='delete_cleaner_order.php'>
                    <label for='cid'> Cleaner ID: </label>
                    <input type='text' name='cid' id='insertForm'></input>
                    <label for='userid'> User ID: </label>
                    <input type='text' name='userid' id='insertForm'></input>

                    <input type='submit' name='insert' value='Delete Data'>
                </form>
                </div>";
              }

              else if ($_POST['table'] === "REVIEWS" && $_POST['option'] === "delete"){
                echo "<div>
                <form class='insert' method='post' action='delete_review.php'>
                    <label for='reviewid'> Review ID: </label>
                    <input type='text' name='reviewid' id='insertForm'></input>

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
                <option value='src'>Source</option>
                <option value='dest'>Destination</option>
                <option value='dist'>Distance</option>
                <option value='tm'>Time</option>
                <option value='userid'>User ID</option>
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
                <option value='carid'>Car ID</option>
                <option value='src'>Source</option>
                <option value='dest'>Destination</option>
                <option value='dist'>Distance</option>
                <option value='tm'>Time</option>
                <option value='userid'>User ID</option>
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
                <option value='balance'>Balance</option>
                <option value='username'>Username</option>
                <option value='pswrd'>Password</option>
                <option value='firstName'>First Name</option>
                <option value='lastName'>Last Name</option>
                <option value='telNo'>Phone Number</option>
                <option value='mailAddr'>Mail Address</option>
                <option value='email'>Email</option>
                </select>
                <label for='val'> Value: </label>
                <input type='text' name='val' id='insertForm'></input>
                <input type='submit' name='update' value='Update Data'>
                </form>
                </div>";
              }

              else if ($_POST['table'] === "CLEANERS" && $_POST['option'] === "update"){
                echo "<div>
                <form method='post' action='update_cleaner.php'>
                <label for='cid'> Cleaner ID: </label>
                <input type='text' name='cid' id='insertForm'></input>
                <select name='cleaners' style='width:200px;'>
                <option value='cname'>Name</option>
                <option value='phone'>Phone No.</option>
                <option value='price'>Price</option>
                <option value='available'>Availability</option>
                </select>
                <label for='val'> Value: </label>
                <input type='text' name='val' id='insertForm'></input>
                <input type='submit' name='update' value='Update Data'>
                </form>
                </div>";
              }

              else if ($_POST['table'] === "ORDERSCL" && $_POST['option'] === "update"){
                echo "<div>
                <form method='post' action='update_cleaner_order.php'>
                <label for='cid'> Cleaner ID: </label>
                <input type='text' name='cid' id='insertForm'></input>
                <select name='orderscl' style='width:200px;'>
                <option value='userid'>User ID</option>
                <option value='src'>Source</option>
                <option value='dest'>Destination</option>
                <option value='dist'>Distance</option>
                <option value='price'>Price</option>
                </select>
                <label for='val'> Value: </label>
                <input type='text' name='val' id='insertForm'></input>
                <input type='submit' name='update' value='Update Data'>
                </form>
                </div>";
              }

              else if ($_POST['table'] === "REVIEWS" && $_POST['option'] === "update"){
                echo "<div>
                <form method='post' action='update_review.php'>
                <label for='reviewid'> Review ID: </label>
                <input type='text' name='reviewid' id='insertForm'></input>
                <select name='reviews' style='width:200px;'>
                <option value='serviceType'>Service Type</option>
                <option value='rating'>Rating</option>
                <option value='review'>Review</option>
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
