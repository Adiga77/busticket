<?php
    session_start();
    include_once('authentication.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>K-Transport - Home</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
         <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <?php include('includes/navbar.php'); ?>

          <!-- Header Start -->
          <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Book a Ticket</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active text-primary">Bookings</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

         <!-- bus Start -->
         <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="mt-3 mb-3">
                    <?php include_once('message.php'); ?>
                </div>
               <div class="row justify-content-center ">
                    <div class="col-xl-8 bg-dark py-5">
                        <form action="processes/bookings-process.php" method="post">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="">Full Name</label>
                                    <input type="text" name="username" class="form-control" placeholder="Enter your name" required>
                                </div>
                                <div class="col-12">
                                    <label for="">Email Address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter your Email" required>
                                </div>
                                <div class="col-12">
                                    <label for="">Contact</label>
                                    <input type="tel" maxlength="11" name="phone" class="form-control" placeholder="Enter your Phone Number" required>
                                </div>
                                <div class="col-12">
                                    <label for="">Number of seat</label>
                                    <input type="tel" value="1" name="seat" class="form-control" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="">Sex</label>
                                    <select class="form-select" name="route" aria-label="Default select example">
                                        <option selected disabled>Route</option>
                                        <option>Aliero-Jega</option>
                                        <option>Aliero-Kalgo</option>
                                        <option>Aliero-Birnin Kebbi</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <select class="form-select" name="gender" aria-label="Default select example">
                                        <option selected disabled>Select Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="submit" class="btn btn-success w-100 py-2">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
               </div>
            </div>
        </div>
        <!-- bus End -->

        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <div class="footer-item">
                                <h4 class="text-white mb-4">About Us</h4>
                                <p class="mb-3">We are K-Transport, A campus based transport network which aim to subcidize and satisfy students transport needs</p>
                            </div>
                            <div class="position-relative">
                                <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                                <button type="button" class="btn btn-secondary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">Subscribe</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Quick Links</h4>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> About</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Contact us</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Terms & Conditions</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Business Hours</h4>
                            <div class="mb-3">
                                <h6 class="text-muted mb-0">Mon - Friday:</h6>
                                <p class="text-white mb-0">06.00 am</p>
                                <p class="text-muted mb-0">From Campus - Birnin Kebbi</p>
                                <p class="text-white mb-0">04.00 pm</p>
                                <p class="text-muted mb-0">From Birnin Kebbi - Campus</p>
                                
                            </div>
                            <div class="mb-3">
                                <h6 class="text-muted mb-0">Vacation:</h6>
                                <p class="text-white mb-0">All Saturday and Sunday is our vacation</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Contact Info</h4>
                            <a href="#"><i class="fa fa-map-marker-alt me-2"></i>Car Park,  University Administrative Block</a>
                            <a href="mailto:ktransport@gmail.com"><i class="fas fa-envelope me-2"></i> ktransport@gmail.com</a>
                            <a href="tel:+2349039177752"><i class="fas fa-phone me-2"></i> +2349039177752</a>
                            <a href="tel:+2349039177752" class="mb-3"><i class="fas fa-print me-2"></i> +2349039177752</a>
                            <div class="d-flex">
                                <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i class="fab fa-facebook-f text-white"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i class="fab fa-twitter text-white"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i class="fab fa-instagram text-white"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle me-0" href=""><i class="fab fa-linkedin-in text-white"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-body"><a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>K-Transport @ 2024</a> | All right reserved.</span>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    </body>

</html>
