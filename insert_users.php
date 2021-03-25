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

        $username = $_POST['username'];
        $pswrd = $_POST['pswrd'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $tel_no = $_POST['tel_no'];
        $mail_addr = $_POST['mail_addr'];
        $email = $_POST['email'];

        $sql = "INSERT INTO users (USERNAME, PSWRD, FIRST_NAME, LAST_NAME, TEL_NO, MAIL_ADDR, EMAIL)
                            VALUES ('$username', '$pswrd', '$first_name', '$last_name', '$tel_no', '$mail_addr', '$email')";
        
        try {
            if($conn->query($sql) === TRUE){
               $sql = "SELECT * FROM users";
               $result = mysqli_query($conn, $sql);

               echo "<table>
                       <tr>
                       <th>USERID</th>
                       <th>USERNAME</th>
                       <th>PSWRD</th>
                       <th>FIRST NAME</th>
                       <th>LAST NAME</th>
                       <th>TEL NO.</th>
                       <th>MAILING ADDRESS</th>
                       <th>EMAIL</th>
                       <th>BALANCE</th>
                       </tr>";

               try {
                 if(mysqli_num_rows($result) > 0){

                   while($row = mysqli_fetch_assoc($result)){
                       echo "<tr><td>" . $row["USERID"]
                       .  " </td><td> " . $row["USERNAME"]
                       .  " </td><td> " . $row["PSWRD"]
                       .  " </td><td> " . $row["FIRST_NAME"]
                       .  " </td><td> " . $row["LAST_NAME"]
                        .  " </td><td> " . $row["TEL_NO"]
                       .  " </td><td> " . $row["MAIL_ADDR"]
                       .  " </td><td> " . $row["EMAIL"]
                       .  " </td><td> " . $row["BALANCE"]
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