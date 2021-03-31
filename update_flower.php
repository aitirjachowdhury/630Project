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

        $flowerid = $_POST['flowerid'];
        $change = $_POST['flowers'];
        $value = $_POST['val'];
        
        $sql = "UPDATE FLOWER SET $change = '$value' WHERE flowerid = '$flowerid'";

        try {
            if($conn->query($sql) === TRUE){
               echo "<h2 class='viewTable'>Record updated successfully<h2>";
            } else {
                throw new Exception("Failed to update record");
            }
        } catch (Exception $e) {
            echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
        }
    } 
    
    $conn -> close();
?>