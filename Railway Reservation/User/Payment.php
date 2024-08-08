<?php
session_start();

// Do not display this page if the user have not logged in
if (!$_SESSION['pid'] || !$_SESSION['fid']) {
    header('location: ./index.php');
}

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

        .info_text {
            font-size: 121%;
            font-weight: 500;
        }

        .razorpay-payment-button {
            font-weight: bold;
            background-color: #148413;
            border-color: #148413;
            color: white;
            padding: 10px 20px; 
            font-size: 18px; 
            margin-left: 44%;
            border-radius: 5%;
        }
</style>

    </style>
</head>

<body>

    <?php include('../Components/Navbar_User.php'); ?>

    <?php if (!isset($_POST['hidden'])) { ?>
        <div class="info_text" style="color: red; margin-left: 30%; padding: 4%;">Click the 'Payment' Button to make the Payment...</div>
    <?php }else{ ?>
        <div class="info_text" style="color: #1658bb; margin-left: 30%; padding: 4%;">Go to 'My Ticket' Section to Download your Ticket...</div>
    <?php } ?>


    <!-- PAYMENT BY RAZOR PAY -->
    <?php

    include('../Razorpay/razorpay-php/razorpay-php/Razorpay.php');

    use Razorpay\Api\Api;

    $key_id = "rzp_test_gL9C8CXIvKQjVI";
    $secret = "OC9N4l91ACfnsUIAbXGYsW7C";


    // Creating order
    $api = new Api($key_id, $secret);
    $order = $api->order->create(array('receipt' => '123', 'amount' => $_SESSION['price'] * 100, 'currency' => 'INR'));
    ?>


    <!-- 'Pay with Razorpay' button -->
    <!-- After successful payment rediret to this same page but don't show the paymen button -->
    <?php if (!isset($_POST['hidden'])) { ?>
        <form action="" method="POST">
            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $key_id; ?>" data-amount="<?php echo $_SESSION['price'] * 100; ?>" data-currency="INR" data-order_id="<?php echo $order->id ?>" data-buttontext="Payment" data-name="Railway Booking Payment" data-description="Payment to Railway for Ticket booking" data-image="https://example.com/your_logo.jpg" data-prefill. name="" data-prefill.email="" data-theme.color="#F37254">
            </script>

            <input type="hidden" custom="Hidden Element" name="hidden" id="hidden">
        </form>
    <?php } ?>

    <!-- After successful payment, insert the records to the database, update the seats availability of the flight and send the booking confirmation mail -->
    <?php
    if (isset($_POST['hidden'])) {

        // Payment Id received after successful payment
        $pymt_id  = $_POST['razorpay_payment_id'];

        $digits = 3;
        $tid = rand(pow(10, $digits-1), pow(10, $digits)-1);
        // Insert into ticket table
        $result = mysqli_query($con, "INSERT INTO `tickettb` (`tid`, `pid`, `fid`, `pamt`, `pdate`, `Departure_Date` ,`classtype`, `foodtype`, `pymt_id`,`status`) VALUES ('" . $tid . "', '" . $_SESSION['pid'] . "', '" . $_SESSION['fid'] . "', '" . $_SESSION['price'] . "', current_timestamp(), '" . $_SESSION['departureDate'] . "' ,'" . $_SESSION['flight_class'] . "', '" . $_SESSION['flight_food'] . "', '" . $pymt_id . "','booked');");

        // If record successfully inserted to the database
        if ($result) {
            echo "<script>
            alert('Ticket booked Successfully... Download from the `My Ticket` Section.');
            </script>";

            // Send booking confirmation Mail
            $passenger_detail = mysqli_query($con, 'select email from passengertb where pid = ' . $_SESSION['pid']);
            $passenger_detail_row = mysqli_fetch_array($passenger_detail);
            $passenger_email = $passenger_detail_row[0];
            $msg = "Thank you for booking ticket with us... \n
            You can download from the `My Ticket` section. \n
            For any queries, visit www.railway.com or make a call to 9431690769
            \n Have a Happy and Safe Journey...";

            // IF mail sent successfully, show alert() to the user for the same
            if (mail($passenger_email, 'Railway Booking Confirmation', $msg)) {
                echo "<script>alert('Confirmation mail has been sent to your registered email...');</script>";
            }
        }
    }
    ?>

</body>

</html>