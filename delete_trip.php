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

        $tripid = $_POST['tripid'];

        $sql = "DELETE FROM TRIPS WHERE TRIPID = '$tripid'";

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