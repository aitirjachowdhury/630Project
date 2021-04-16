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

        $sql = "DELETE FROM users WHERE userid = '$userid'";

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
                       echo "<tr><td>" . $row["userid"]
                       .  " </td><td> " . $row["username"]
                       .  " </td><td> " . $row["pswrd"]
                       .  " </td><td> " . $row["firstName"]
                       .  " </td><td> " . $row["lastName"]
                        .  " </td><td> " . $row["telNo"]
                       .  " </td><td> " . $row["mailAddr"]
                       .  " </td><td> " . $row["email"]
                       .  " </td><td> " . $row["balance"]
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