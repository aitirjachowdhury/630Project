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

        $serviceType = $_POST['serviceType'];
        $rating = $_POST['rating'];
        $review = $_POST['review'];

        $sql = "INSERT INTO REVIEWS(serviceType, rating, review)
                              VALUES ('$serviceType', '$rating', '$review')";

        try {
            if($conn->query($sql) === TRUE){
                $sql = "SELECT * FROM REVIEWS";
                $result = mysqli_query($conn, $sql);

                echo "<table>
                        <tr>
                        <th>REVIEW ID</th>
                        <th>SERVICE TYPE</th>
                        <th>RATING</th>
                        <th>REVIEW</th>
                        </tr>";

                try {
                  if(mysqli_num_rows($result) > 0){

                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr> <td>" . $row["reviewid"]
                        .  " </td><td> " . $row["serviceType"]
                        .  " </td><td> " . $row["rating"]
                        .  " </td><td> " . $row["review"]
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