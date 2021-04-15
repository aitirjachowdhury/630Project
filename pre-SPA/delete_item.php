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

        $productid = $_POST['productid'];

        $sql = "DELETE FROM items WHERE productid = '$productid'";

        try {
            if($conn->query($sql) === TRUE){

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
                        echo "<tr><td>" . $row["productid"]
                        .  " </td><td> " . $row["userid"]
                        .  " </td><td> " . $row["src"]
                        .  " </td><td> " . $row["dest"]
                        .  " </td><td> " . $row["dist"]
                        .  " </td><td> " . $row["tm"]
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