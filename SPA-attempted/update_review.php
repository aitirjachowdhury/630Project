<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
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

              $reviewid = $_POST['reviewid'];
              $change = $_POST['reviews'];
              $value = $_POST['val'];

              $sql = "UPDATE REVIEWS SET $change = '$value' WHERE reviewid = $reviewid";

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
                      throw new Exception("Failed to update record");
                  }
              } catch (Exception $e) {
                  echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
              }
          }

          $conn -> close();
     ?>
 </body>
</html>