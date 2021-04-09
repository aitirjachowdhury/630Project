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

    if (isset($_POST['update'])){

        $tripid = $_POST['tripid'];
        $change = $_POST['trips'];
        $value = $_POST['val'];
        
        $sql = "UPDATE TRIPS SET $change = '$value' WHERE tripid = $tripid";

        try {
            if($conn->query($sql) === TRUE){
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
                       echo "<tr><td>" . $row["tripid"]
                       .  " </td><td> " . $row["userid"]
                       .  " </td><td> " . $row["carid"]
                       .  " </td><td> " . $row["src"]
                       .  " </td><td> " . $row["dest"]
                       .  " </td><td> " . $row["dist"]
                       .  " </td><td> " . $row["price"]
                       .  " </td><td> " . $row["tm"]
                       . " </td></tr><br>";
                   }
                   echo "</table>";
                 } else {
                     throw new Exception("No Records Found");
                 }
               } catch (Exception $e) {
                 echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
               }
            } else {
                throw new Exception("Failed to update record");
            }
        } catch (Exception $e) {
            echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
        }
    } 
    
    $conn -> close();
?>