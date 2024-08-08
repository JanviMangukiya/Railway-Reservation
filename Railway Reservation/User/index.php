<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Railway Reservation</title>
</head>

<body>
    <!-- Navbar -->
    <?php
    if (isset($_SESSION['pid'])) {
        include('../Components/Navbar_User.php');
    } else {
        include('../Components/Navbar_General.php');
    }
    ?>

    <!-- Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="height: 92vh;">
                <img src="../Images//home1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Explore Your Destination</h5>
                    <p>Find your way to your chosen place with our help.</p>
                </div>
            </div>
            <div class="carousel-item" style="height: 92vh;">
                <img src="../Images//home2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Receive top-tier Railway Services</h5>
                    <p>Enjoy the benefits of top-tier railway services.</p>
                </div>
            </div>
            <div class="carousel-item" style="height: 92vh;">
                <img src="../Images//home3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Efficient Process</h5>
                    <p>Apply a few filters to quickly identify the optimal train for your journey.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Services - 3 circular obj in row -->
    <div id="services" class="container marketing my-3">
        <h1 class="" style="text-align: center;">Services that we offer</h1>
        <!-- Three columns of text below the carousel -->
        <div class="row my-3">
            <div class="col-lg-4">
                <img src="../Images//r1.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="">
                
                <h2 class="fw-normal">Express Service</h2>
                <p>Efficient transportation with limited stops ensuring quicker journeys.</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img src="../Images//r2.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="">
                
                </svg>

                <h2 class="fw-normal">Passenger Comfort</h2>
                <p>Passenger comfort is prioritized with spacious seating and onboard amenities.</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img src="../Images//r3.jpeg" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="">
                
                </svg>

                <h2 class="fw-normal">Child Care Service</h2>
                <p>Parents can relax knowing their children are in capable hands.</p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div>


    <hr class="featurette-divider">

    <!-- Photo and text side by side -->
    <div class="container marketing">
        <div class="row featurette">
            <div class="col-md-7" style="margin: auto;">
                <h2 class="featurette-heading fw-normal lh-1">Create amazing memories<h2>
                        <p class="lead">Traveling by train offers relaxation and a positive outlook, ensuring a refreshing experience throughout your journey.</p>
            </div>
            <div class="col-md-5">
                <img src="../Images//home4.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" alt="Flight image">
            </div>
        </div>
    </div>

    <div class="my-3 text-center container">
        <h3 class="">Journey to New Destinations</h3>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Traveling offers a unique opportunity to explore diverse cultures and breathtaking landscapes. Each journey allows you to immerse yourself in new traditions, taste different cuisines, and meet people from various walks of life. </p>
        </div>
    </div>

    <hr class="featurette-divider">

    <!-- Testimonial -->
    
    <hr class="featurette-divider">



    <!-- About Us -->
    <div id="about-us" class="px-4 text-center">
        <h1 class="">About Us</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">The experiences gained from travel break the routine of everyday life, providing a refreshing escape that revitalizes the spirit. Whether visiting a serene mountain village or a vibrant city, travel enriches the soul and leaves you with cherished memories and a broader perspective on the world.</p>
        </div>
    </div>



    <!-- Footer -->
    <?php include('../Components/Footer.php'); ?>
</body>

</html>