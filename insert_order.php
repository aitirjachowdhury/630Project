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

        $orderid = $_POST['orderid'];
        $userid = $_POST['userid'];
        $tripid = $_POST['tripid'];
        $productid = $_POST['productid'];
        $date_issued = $_POST['date_issued'];

        $sql = "INSERT INTO orders (orderid, userid, tripid, productid, date_issued)
                              VALUES ('$orderid', '$userid', '$tripid', '$productid', '$date_issued')";

        try {
            if($conn->query($sql) === TRUE){
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
                       echo "<tr> <td>" . $row["orderid"]
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