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

        $userid = $_POST['userid'];
        $carid = $_POST['carid'];
        $src = $_POST['src'];
        $dest = $_POST['dest'];
        $dist = $_POST['dist'];
        $price = $_POST['price'];
        $tm = $_POST['tm'];

        $sql = "INSERT INTO TRIPS(userid, carid, src, dest, dist, price, tm)
                              VALUES ('$userid', '$carid', '$src', '$dest', '$dist', '$price', '$tm')";

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