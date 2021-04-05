<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <title>Reviews</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       <link href="style.css" rel="stylesheet" type="text/css" />
       <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </head>

    <body>
    <div class="topnav">
      <h3>P2S</h3>
      <div class="option">
      <a href="index.php">Home</a>
      <a href="about.html">About Us</a>
      <a href="contact.html">Contact Us</a>
      <a class="active" href="reviews.php">Reviews</a>
      <a href="cart.php">Shopping Cart</a>
      <a href="signin.php">Sign-in</a>
      </div>
    </div>

        <br><br><br>

        <h2 style="text-align: center;">Our customers love us!</h2>

        <br><br>
        <p style="text-align: center">Over the past decade P2S has been committed in ensuring your safety and affordability by providing an eco-friendly alternative to some of our competitors. <br> By helping more than thousands and thousands of people each day we have established loyal customers that just can't seem to get enough of us! <br> Read on to find out what just some of them had to say.</p>

        <br><br><br>

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

                <!-- The Modal -->
                <div id="myModal" class="modal">

                  <!-- Modal content -->
                  <div class="modal-content" id="revModal">
                    <span class="close">&times;</span>
                    <h1 style="text-align: center;">Let us know what you think!</h1>
                    <form class="revForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <label for="service">Services: </label>
                      <select class="service" name="service">
                        <option value="noSel">Select a service</option>
                        <option value="A">Service A</option>
                        <option value="B">Service B</option>
                        <option value="C">Service C</option>
                        <option value="D">Service D</option>
                      </select>
                      <label for="stars">Rating: </label>
                      <div class="stars" data-rating="3">
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                      </div>
                      <textarea name="review" rows="8" cols="80" placeholder="Something else you want to say (optional)"></textarea>
                      <button type="submit" name="button" style="margin-bottom: 20px;" >Submit Review</button>
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
                        let num = 0;
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

    </body>
</html>
