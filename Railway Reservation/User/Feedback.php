<?php
session_start();

// Do not display this page if the user have not logged in
if (!$_SESSION['pid']) {
    header('location: ./index.php');
}

// $_SESSION['pid'] = '1';
include('../Admin/database.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Railway Reservation</title>

    <style>
        * {
            margin: 0%;
            padding: 0%;
        }

        .main_cont {
            border: 2px solid #f7f9fb;
            width: 68%;
            text-align: center;
            margin: 3% auto;
            padding: 4% 0px;
            opacity: 0.9;
            background: #f7f9fb;
        }

        .title {
            font-size: 290%;
            margin-bottom: 4%;
            color : black;
        }

        span {
            display: block;
            font-size: 122%;
            margin: 2%;
        }

        input {
            border: 1px solid #8f959b;
            padding: 14px;
            width: 50%;
        }

        textarea {
            font-size: 144%;
            width: 50%;
            padding: 14px;
            border: 1px solid #8f959b;
        }

        .submitbtn {
            margin-top: 3%;
            font-size: 120%;
            padding: 1% 3%;
            border: 2px solid;
            border-radius: 5px;
            color: white;
            font-weight: bold; 
            background-color: #1658bb;
            border-color: #1658bb;
        }

        .submitbtn:hover {
            border: 3px solid;
            background: transparent;
            color: #1658bb;
        }
    </style>

</head>

<body>
    <!-- Navbar -->
    <?php include('../Components/Navbar_User.php'); ?>

    <!-- Feedback Form -->
    <div class="section">
        <form method="POST" action="" class="container main_cont">
            <span class="title">Feedback</span>

            <div class="">
                <input type="text" name="subject" placeholder="Enter Your Subject" required>
            </div>
            <div class="">
                <textarea rows="6" name="description" placeholder="Enter Description" required style="margin-top: 2%;"></textarea>
            </div>

            <button type="submit" name="submitbtn" class="submitbtn">Submit</button>
        </form>
    </div>

    <?php

    // Sending Feedback
    if (isset($_POST['submitbtn'])) {
        $subject = $_POST['subject'];
        $description = $_POST['description'];

        $digits = 3;
        $fdbackid = rand(pow(10, $digits-1), pow(10, $digits)-1);
        $result = mysqli_query($con, "insert into feedbacktb values('" . $fdbackid . "'," . $_SESSION['pid'] . ",current_timestamp(),'" . $subject . "','" . $description . "');");
        if ($result) {
            echo "<script>alert('Thanks for your Valuable Feedback ');</script>";
        } else {
            //   echo mysqli_error($con);
            echo "<script>alert('Feedback Submission Failed... Please Try Again...');</script>";
        }
    }
    ?>


    <!-- Footer -->
    <?php include('../Components/Footer.php'); ?>

</body>

</html>