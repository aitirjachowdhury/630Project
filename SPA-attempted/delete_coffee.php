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

        $coffeeid = $_POST['coffeeid'];

        $sql = "DELETE FROM coffee WHERE coffeeid = '$coffeeid'";

        try {
            if($conn->query($sql) === TRUE){
              
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
               }
               catch (Exception $e) {
                 echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
               }

            } else {
                throw new Exception("Failed To Delete Record");
            }
        } catch (Exception $e) {
            echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
        }

    } else {
        echo "string";
    }

    $conn -> close();
?>