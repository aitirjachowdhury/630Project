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

        $cname = $_POST['cname'];
        $phone = $_POST['phone'];
        $img = $_POST['img'];
        $price = $_POST['price'];

        $sql = "INSERT INTO CLEANERS(cname, phone, img, price)
                              VALUES ('$cname', '$phone', '$img', '$price')";

        try {
            if($conn->query($sql) === TRUE){
               $sql = "SELECT * FROM CLEANERS";
               $result = mysqli_query($conn, $sql);

                   echo "<table>
                        <tr>
                        <th>CLEANER ID</th>
                        <th>NAME</th>
                        <th>PHONE NO.</th>
                        <th>IMAGES</th>
                        <th>PRICE</th>
                        <th>AVAILABILITY</th>
                        </tr>";

                try {
                  if(mysqli_num_rows($result) > 0){

                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr> <td>" . $row["cid"]
                        .  " </td><td> " . $row["cname"]
                        .  " </td><td> " . $row["phone"]
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