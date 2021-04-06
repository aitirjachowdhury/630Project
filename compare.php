<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width">
         <title>P2S</title>
         <link href="style.css" rel="stylesheet" type="text/css" />
         <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
      <div class="content">
      <br><br><br><h1 class="title">Compare & Select</h1>
      <div class="underline"></div>
        <div class="small-container">
          <div class="row">
            <div class="col-3">
              <?php
                 $servername = "localhost";
                 $username = "root";
                 $pswrd = "";
                 $dbname = "services";

                 $conn = new mysqli($servername, $username, $pswrd, $dbname);

                 if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}  

                  $datas = array();

                  if(isset($_SESSION['userid'])) {
                     $iuserid = (int) $_SESSION['userid'];

        # TO READ DATA
        $sql = "SELECT tripid, userid, carid, src, dest, dist, price FROM TRIPS WHERE userid = '$iuserid' AND type = 'sCA'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
            $datas[] = $row;
          }
        }
        # TO PRINT
        if(count($datas) != 0){
          $html = "";
          foreach($datas as $row) {
            $icarid = (int) $row['carid'];
            $itripid = $row['tripid'];
            $sql = "SELECT model, imgs, price FROM CARS WHERE carid = $icarid";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            $row2 = $result->fetch_assoc(); 
            $html .= " <div class=\"col-3\">
            <tr><img src=\"".$row2["imgs"]."\">
            <p>".$row2["model"]."</p>
            <small>Price per km: $".$row2["price"]."</small>
            </td><br>
            <td>Source: ".$row["src"]."</td><br>
            <td>Destination: ".$row["dest"]."</td><br>
            <td>Distance: ".round($row["dist"],2)." km</td><br>
            <td>Total: $".$row["price"]."</td><br>
            <button>Remove</button></tr></div>";}
          echo $html;} } }

                 $conn -> close();
              ?>

          </div>
        </div>
       </div>
      </div>
    </body>
</html>