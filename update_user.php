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

        $userid = $_POST['userid'];
        $change = $_POST['user'];
        $value = $_POST['val'];
        
        $sql = "UPDATE USERS SET $change = '$value' WHERE userid = $userid";

        try {
            if($conn->query($sql) === TRUE){
               $sql = "SELECT * FROM USERS";
                $result = mysqli_query($conn, $sql);

                echo "<table>
                        <tr>
                        <th>USER ID</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>TELEPHONE</th>
                        <th>MAILING ADDRESS</th>
                        <th>EMAIL</th>
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