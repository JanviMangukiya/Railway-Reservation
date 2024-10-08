<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway Reservation</title>
</head>

<body>
    <?php

    include('db.php');

    // Delete Passenger Account
    if (isset($_GET['id'])) {
        $fetch_data =  mysqli_query($con, "select email from passengertb where pid=" . $_GET['id']);
        $arry_data = mysqli_fetch_array($fetch_data);
        $email = $arry_data[0];
        $result = mysqli_query($con, "delete from passengertb where pid=" . $_GET['id']);

        // Account deleted successfully
        if ($result) {
            $mail_result = mail($email, "Accout Deletion Acknowledgement", "This is to Inform you that your Account has been Deleted.");

            if ($mail_result) {
                // Mail sent successfully to the user
                echo
                "<script>
                    let a = confirm('Account Deleted Successfully and Corresponding mail have been sent to the user.');
                    if (a || !a) {
                        window.location.assign('showAccounts.php');
                    }
                </script>";
            } else {
                // Mail sending failed to the user
                echo "
                <script>
                    let a = confirm('Account Deleted Successfully but Corresponding mail sending to the user failed due to some reason.');
                    if (a || !a) {
                        window.location.assign('showAccounts.php');
                    }
                </script>";
            }
        } else {
            echo "Account Deletion Failed... " . mysqli_error($con);
        }
    }

    // Delete particular feedback
    if (isset($_GET['fdbackid'])) {
        $result = mysqli_query($con, "delete from feedbacktb where fdbackid=" . $_GET['fdbackid']);

        if ($result) {
            header('location: ViewFeedbacks.php');
        } else {
            echo "Record Deletion Failed... " . mysqli_error($con);
        }
    }

    // Delete All feedback
    if (isset($_GET['deleteallfdback'])) {
        $result = mysqli_query($con, "delete from feedbacktb;");

        if ($result) {
            header('location: ViewFeedbacks.php');
        } else {
            echo "Record Deletion Failed... " . mysqli_error($con);
        }
    }

    ?>
</body>

</html>