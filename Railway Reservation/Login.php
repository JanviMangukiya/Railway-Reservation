<?php
    include('Admin/database.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Railway Reservation</title>

</head>

<body>
    <!-- Login Form -->
    <div class="container my-3">
       <h6> <span style="display: block; text-align: center; font-size: 300%; padding-top: 10%;">Login</span></h6>

        <form method="POST" action="Login.php" style="padding-top: 4%;">
        <center>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email Address" id="exampleInputEmail1" aria-describedby="emailHelp" style="width: 45%; border: 1px solid #8f959b;">
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" id="exampleInputPassword1" style="width: 45%; border: 1px solid #8f959b;">
            </div>
        </center>

            <div class="submitbtn_class" style="text-align: center;">
                <button type="submit" name="btnlogin" class="btn btn-primary" style="width: 45%; font-weight: bold; background-color: #1658bb;border-color: #1658bb; font-size: 110%">Login</button>
            </div>
        </form>
    </div>

    <!-- Links -->
    <div class="section" style="justify-content: space-around; display: flex; padding-top: 2%">
        <div class="Register">
            <span>Don't have an account?</span>
            <span><a href="./User/Register.php" style="margin-left : 4px;">Create Account</a></span><br>

            <div class="Forgot_password" style="padding-top: 2%;">
                <span>Forgot your password?</span>
                <span><a href="./User/ForgotPassword.php" style="margin-left : 4px;">Forgot Password</a></span>
            </div>
            
        </div>
    </div>

    <!-- Login button is clicked -->
    <?php
    if (isset($_POST['btnlogin'])) {
        // Admin Login
        if ($_POST['email'] == 'admin@gmail.com' && $_POST['password'] == 'admin') {
            session_start();
            $_SESSION['admin'] = 'admin';
            header('location: Admin/showAccounts.php');
        }

        // User's Login
        $rows = mysqli_query($con, "select * from passengertb where email='" . $_POST['email'] . "' and pass='" . $_POST['password'] . "'");


        if (mysqli_affected_rows($con) == 1) {

            $row  = mysqli_fetch_array($rows);
            session_start();
            $_SESSION['pid'] = $row[0];

            header('location: ./User/index.php');
        } else {
            echo "<script>alert('Invalid Login Credentials...');</script>";
        }
    }
    ?>

</body>

</html>