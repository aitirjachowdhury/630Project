<?php

include 'db.php';

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "services";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

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

    } else {
        echo "string";
    }

    $conn -> close();
?>