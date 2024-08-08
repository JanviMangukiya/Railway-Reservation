<?php
include('database.php');
session_start();

// If the admin have logged in then only this pages should be rendered
if (!$_SESSION['admin']) {
    header('location: ../User/index.php');
}

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
    <?php include('../Components/Navbar_Admin.php'); ?>

    <h1 style="text-align: center; padding : 4%;">Add New Train</h1>
    <form action="" method="post">
        <div class="container">
            <div class="row" style="justify-content: center;">
                <div class="my-3 col-5">
                    
                    <input type="text" name="fname" class="form-control" id="exampleInputEmail1" placeholder="Train Name" aria-describedby="emailHelp" required>
                </div>
                </row>
                <div class="row" style="justify-content: center;">
                    <div class="col-5 my-3">
            
                        <input type="text" name="fsource" class="form-control" id="exampleInputEmail1" placeholder="Source" aria-describedby="emailHelp" required>
                    </div>
                    <div class="col-5 my-3">
                        
                        <input type="text" name="fdest" class="form-control" id="exampleInputEmail1" placeholder="Destination" aria-describedby="emailHelp" required>
                    </div>
                    <div class="col-5 my-3">
                    
                        <input type="number" name="businessseat" class="form-control" id="exampleInputEmail1" placeholder="Business Seat Capacity" aria-describedby="emailHelp" required>
                    </div>
                    <div class="col-5 my-3">

                        <input type="text" name="businessprice" class="form-control" id="exampleInputEmail1" placeholder="Business Class Price" aria-describedby="emailHelp" required>
                    </div>
                    <div class="col-5 my-3">
                        
                        <input type="number" name="firstseat" class="form-control" id="exampleInputEmail1" placeholder="First Seat Capacity" aria-describedby="emailHelp" required>
                    </div>
                    <div class="col-5 my-3">
                        
                        <input type="text" name="firstprice" class="form-control" id="exampleInputEmail1" placeholder="First Class Price" aria-describedby="emailHelp" required>
                    </div>
                    <div class="col-5 my-3">
                        
                        <input type="number" name="economyseat" class="form-control" id="exampleInputEmail1" placeholder="Economy Seat Capacity" aria-describedby="emailHelp" required>
                    </div>
                    <div class="col-5 my-3">
                        
                        <input type="text" name="economyprice" class="form-control" id="exampleInputEmail1" placeholder="Economy Class Price" aria-describedby="emailHelp" required>
                    </div>
                </div>
            </div><br>
            <div class="" style="text-align: center;">
                <button name="btnsubmit" type="submit" class="btn btn-primary" style="width: 20%;font-weight: bold; background-color: #1658bb;border-color: #1658bb; font-size: 110%">Add Train</button>
            </div>
    </form>


    <!-- After submit button is clicked, insert the records to the flight table -->
    <?php

    if (isset($_POST['btnsubmit'])) {
        $result = mysqli_query($con, "INSERT INTO `flighttb` (`fid`, `fname`, `fsource`, `fdest`, `business_seat_capacity`, `business_price`, `firstclass_seat_capacity`, `firstclass_price`, `economy_seat_capacity`, `economy_price`) VALUES (NULL, '" . $_POST['fname'] . "', '" . $_POST['fsource'] . "', '" . $_POST['fdest'] . "', '" . $_POST['businessseat'] . "', '" . $_POST['businessprice'] . "', '" . $_POST['firstseat'] . "', '" . $_POST['firstprice'] . "', '" . $_POST['economyseat'] . "', '" . $_POST['economyprice'] . "');");

        if ($result) {
    ?>
            <script>
                let a = alert('New Train Added Successfully!!');
                if (a || !a) {
                    window.location.assign('./Trains.php');
                }
            </script>
    <?php
        }
    }
    ?>

    <!-- Footer -->
    <?php include('../Components/Footer.php'); ?>

</body>

</html>