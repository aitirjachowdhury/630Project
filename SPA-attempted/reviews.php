
<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <title>P2S</title>
       <link href="style.css" rel="stylesheet" type="text/css" />
       <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </head>

    <body>

        <br><br>
        <h2 style="text-align: center;">Our customers love us!</h2>

        <br>
        <p style="text-align: center">Over the past decade P2S has been committed in ensuring your safety and affordability by providing an eco-friendly alternative to some of our competitors. <br> By helping more than thousands and thousands of people each day we have established loyal customers that just can't seem to get enough of us! <br> Read on to find out what just some of them had to say.</p>



        <section class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-8 mx-auto">
                        <div class="p-5 bg-white shadow rounded">
                            <div class="carousel slide" id="carouselExampleIndicators" data-ride="carousel">
                                <ol class="carousel-indicators mb-0">
                                    <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner px-5 pb-4">
                                    <div class="carousel-item active">
                                        <div class="media"><img class="rounded-circle img-thumbnail" src="https://res.cloudinary.com/mhmd/image/upload/v1579676165/avatar-1_ffutqr.jpg" alt="" width="75">
                                            <div class="media-body ml-3">
                                                <blockquote class="blockquote border-0 p-0">
                                                    <p class="font-italic lead"> <i class="fa fa-quote-left mr-3 text-success"></i>P2S is absolutely amazing. They provide much better service than Uber for a significantly cheap price!</p>
                                                    <footer class="blockquote-footer">
                                                        <cite title="Source Title">Jim Kepler, Toronto, ON</cite>
                                                    </footer>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <div class="media"><img class="rounded-circle img-thumbnail" src="https://res.cloudinary.com/mhmd/image/upload/v1579676165/avatar-3_hdxocq.jpg" alt="" width="75">
                                            <div class="media-body ml-3">
                                                <blockquote class="blockquote border-0 p-0">
                                                    <p class="font-italic lead"> <i class="fa fa-quote-left mr-3 text-success"></i>As someone who truly cares for the environment, I love how eco-friendly their trips are! I will definitely be using their services more often.</p>
                                                    <footer class="blockquote-footer">
                                                        <cite title="Source Title">Anya Kim-Taylor, Vaughan, ON</cite>
                                                    </footer>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <div class="media"><img class="rounded-circle img-thumbnail" src="https://res.cloudinary.com/mhmd/image/upload/v1579676165/avatar-2_gibm2s.jpg" alt="" width="75">
                                            <div class="media-body ml-3">
                                                <blockquote class="blockquote border-0 p-0">
                                                    <p class="font-italic lead"> <i class="fa fa-quote-left mr-3 text-success"></i>Recently I had to send my car in to get fixed and so I used their services after being recommended by a close friend. The service provided by P2S is truly on a whole other level. 10/10 recommend!</p>
                                                    <footer class="blockquote-footer">
                                                        <cite title="Source Title">Sam Barnick</cite>
                                                    </footer>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a class="carousel-control-prev width-auto" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <i class="fa fa-angle-left text-dark text-lg"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next width-auto" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <i class="fa fa-angle-right text-dark text-lg"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<!-- Getting reviews from users -->

                <!-- Trigger/Open The Modal -->
                <button id="revBtn">Let us know what you think!</button>

                <!-- The Modal  style="display:block;"-->
                <div id="myModal" class="modal">

                  <!-- Modal content -->
                  <div class="modal-content" id="revModal">
                    <span class="close">&times;</span>
                    <h1 style="text-align: center;">Let us know what you think!</h1>
                    <form class="revForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <br>
                      <label for="service">Services: </label>
                      <select class="service" name="service">
                        <option disabled selected value required>Select a service</option>
                        <option value="A">Service A - Ride to Destination</option>
                        <option value="B">Service B - Ride & Delivery from Store</option>
                        <option value="C">Service C - Ride Green</option>
                        <option value="D">Service D - Green Cleaning Services</option>
                      </select>
                      <br>
                      <label for="stars">Rating: </label>
                      <select class="rating" name="rating">
                        <option disabled selected value required>Select a service</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                      <br>
                      <label for="orderid">Enter OrderID: </label>
                      <input type="text" name="orderid">
                      <br>
                      <textarea name="review" rows="8" cols="80" placeholder="Something else you want to say (optional)"></textarea>
                      <button type="submit" name="button" style="margin-bottom:20px; margin-left:35%" >Submit Review</button>
                    </form>
                  </div>

                </div>

                <script>
                    // Get the modal
                    var modal = document.getElementById("myModal");
                    // Get the button that opens the modal
                    var btn = document.getElementById("revBtn");
                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];
                    // When the user clicks the button, open the modal
                    btn.onclick = function() {
                      modal.style.display = "block";
                    }
                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                      modal.style.display = "none";
                    }
                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                      if (event.target == modal) {
                        modal.style.display = "none";
                      }
                    }

                    //getting the star rating
                    let num = 0;
                    document.addEventListener('DOMContentLoaded', function(){
                        let stars = document.querySelectorAll('.star');
                        stars.forEach(function(star){
                            star.addEventListener('click', setRating);
                        });

                        let rating = parseInt(document.querySelector('.stars').getAttribute('data-rating'));
                        let target = stars[rating - 1];
                        target.dispatchEvent(new MouseEvent('click'));

                    });
                    function setRating(ev){
                        let span = ev.currentTarget;
                        let stars = document.querySelectorAll('.star');
                        let match = false;
                        //let num = 0;
                        stars.forEach(function(star, index){
                            if(match){
                                star.classList.remove('rated');
                            }else{
                                star.classList.add('rated');
                            }
                            //are we currently looking at the span that was clicked
                            if(star === span){
                                match = true;
                                num = index + 1;
                            }
                        });
                        document.querySelector('.stars').setAttribute('data-rating', num);
                    }

                </script>
                <br><br><br>

                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "services";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }

                // TO CREATE TABLE
                $sql = "CREATE TABLE REVIEWS (
                reviewid int PRIMARY KEY NOT NULL AUTO_INCREMENT,
                serviceType VARCHAR(50) NOT NULL,
                rating INT NOT NULL,
                review VARCHAR(250) NOT NULL,
                orderid VARCHAR(11))";

                if($conn->query($sql) === TRUE){
                $sql = "INSERT INTO REVIEWS (serviceType, rating, review)
                VALUES ('A', 5, 'EXCELLENT!'),
                    ('B', 5, 'EXCELLENT!'),
                    ('C', 5, 'EXCELLENT!'),
                    ('D', 5, 'EXCELLENT!')";
                if ($conn->query($sql) === true) {}}

                $serviceType = $_POST['service'];
                $rating = $_POST['rating'];
                $review = $_POST['review'];
                $orderid = $_POST['orderid'];

                $sql = "INSERT INTO REVIEWS(serviceType, rating, review, orderid)
                VALUES ('$serviceType', '$rating', '$review', '$orderid')";

                if($conn->query($sql) === TRUE){

                $sql="SELECT orderid, rating FROM REVIEWS";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                  while($review_row = mysqli_fetch_assoc($result)){
                    $review_datas[] = $review_row;
                  }
                }
                $sql = "SELECT orderid, productid FROM ORDERS";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                  while($order_row = mysqli_fetch_assoc($result)){
                    $order_datas[] = $order_row;
                  }
                }

                if(count($review_datas) != 0 && count($order_datas) != 0){
                  foreach ($order_datas as $order_row){
                    //echo "orderid from Orders: " . $order_row["orderid"];
                    foreach ($review_datas as $review_row){
                      //echo "Reviews: " . $review_row["orderid"] . " ";
                      if($review_row["orderid"] == $order_row["orderid"]){
                          //echo "orderid from Orders: " . $order_row["orderid"];
                          //echo "Reviews: " . $review_row["orderid"] . " ";
                          $productid = $order_row["productid"];
                          //echo $order_row["productid"];
                        }
                      }
                  }
                }

                $sql = "SELECT rating FROM FLOWER WHERE flowerid = '$productid'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                      while($flower_row = mysqli_fetch_assoc($result)){
                        $flower_datas[] = $flower_row;
                      }
                    }
                    if(count($flower_datas) != 0){
                      foreach($flower_datas as $flower_row) {
                        $flower += $flower_row["rating"];
                      }
                      $flower += $review_row['rating'];
                      //$avg_flower = $flower / count($flower_datas);
                      $avg_flower = $flower / 2;
                  $sql1 = "UPDATE FLOWER SET rating='$avg_flower' WHERE flowerid='$productid'";
                  //echo $sql1;
                  if ($conn->query($sql1) === true){}
                    }

                header('Location: reviews.php');
              }


/*
              $sqlCof = "SELECT rating, coffeeid FROM COFFEE";
                  $result = mysqli_query($conn, $sqlCof);
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                      $datas[] = $row;
                    }
                  }
              $sqlFlow = "SELECT rating, flowerid FROM FLOWER";
                  $result = mysqli_query($conn, $sqlFlow);
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                      $datas[] = $row;
                    }
                  }

              if(count($datas) != 0){
                foreach($datas as $row) {
                  if($productid == $row["flowerid"])
                  {
                    $flower += $row["rating"];
                  }
                  else if ($productid == $row["coffeeid"]){
                    $coffee += $row["coffeeid"];
                  }
                }
                if ($productid == $row["flowerid"]) {
                  $flower += $review_row['rating'];
                  $avg_flower = $flower / 2;
                  $sql1 = "UPDATE FLOWER SET rating='$avg_flower' WHERE flowerid='$productid'";
                  //echo $sql1;
                  if ($conn->query($sql1) === true){echo "flower updated!";}
                }
                else if ($productid == $row["coffeeid"]) {
                  $coffee += $review_row['rating'];
                  $avg_coffee = $coffee / 2;
                  $sql1 = "UPDATE COFFEE SET rating='$avg_coffee' WHERE coffeeid='$productid'";
                  //echo $sql1;
                  if ($conn->query($sql1) === true){}
                }
              }
              //$sql1 = "UPDATE FLOWER SET rating='$avg_flower' WHERE flowerid='$productid'";
              //echo $sql1;
              //if ($conn->query($sql1) === true){}

              header('Location: reviews.php');
            }
            */

/*
                //For Service A
                $sql = "SELECT serviceType, rating
                FROM REVIEWS
                WHERE serviceType = 'A'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){
                    $datasA[] = $row;
                  }
                }
                if(count($datasA) != 0){
                  foreach($datasA as $row) {
                    $sumA += $row["rating"];
                  }
                  $avgA = $sumA / count($datasA);
                }
                //For Service B
                $sql = "SELECT serviceType, rating
                FROM REVIEWS
                WHERE serviceType = 'B'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){
                    $datasB[] = $row;
                  }
                }
                if(count($datasB) != 0){
                  foreach($datasB as $row) {
                    $sumB += $row["rating"];
                  }
                  $avgB = $sumB / count($datasB);
                }
                //For Service C
                $sql = "SELECT serviceType, rating
                FROM REVIEWS
                WHERE serviceType = 'C'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){
                    $datasC[] = $row;
                  }
                }
                if(count($datasC) != 0){
                  foreach($datasC as $row) {
                    $sumC += $row["rating"];
                  }
                  $avgC = $sumC/ count($datasC);
                }
                //For Service D
                $sql = "SELECT serviceType, rating
                FROM REVIEWS
                WHERE serviceType = 'D'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){
                    $datasD[] = $row;
                  }
                }
                if(count($datasD) != 0){
                  foreach($datasD as $row) {
                    $sumD += $row["rating"];
                  }
                  $avgD = $sumD / count($datasD);
                }

                $html = "<br><br><div style=\"color: black;\">
                <h3 style=\"color: black;\">Service A: " . $avgA . " stars</h3>
                <h3 style=\"color: black;\">Service B: " . $avgB . " stars</h3>
                <h3 style=\"color: black;\">Service C: " . $avgC . " stars</h3>
                <h3 style=\"color: black;\">Service D: " . $avgD . " stars</h3>
                </div>";
                echo $html;
*/

                $conn -> close();
                ?>

    </body>
</html>
