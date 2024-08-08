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

    <style>
        .title {
            text-align: center;
            display: block;
            font-size: 33px;
            margin-top: 1%;
        }

        .field {
            margin: 2%;
            text-align: center;
        }

        .submit_btn_class {
            text-align: center;
            margin-left: -29%;
        }
    </style>
</head>

<body>

    <section class="h-100 bg-light">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="../Images/register.jfif" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <div class="" style="margin-bottom: 3%; display: flex; align-items: center; justify-content: center;">
                                        <h1 style="text-align: center; font-size: 210%;">RAILWAY RESERVATION</h1>
                                    </div>
                                    <h2 class="mb-5" style="text-align: center; font-size: 185%;">Registration</h2>

                                    <!-- Form -->
                                    <form action="" method="post">
                                        <div class="row">
                                            <!-- First Name -->
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input required name="fname" type="text" id="form3Example1m" class="form-control form-control-lg" placeholder="First Name" style="width: 210%; border: 1px solid #8f959b;" /><br>
                                                    <input required name="lname" type="text" id="form3Example1n" class="form-control form-control-lg" placeholder="Last Name" style="width: 210%; border: 1px solid #8f959b;" /><br>
                                                    <input required name="email" type="email" id="form3Example1m1" class="form-control form-control-lg" placeholder="Email Address" style="width: 210%; border: 1px solid #8f959b;" /><br>
                                                    <input required name="mobile" type="text" id="form3Example1n1" class="form-control form-control-lg" placeholder="Mobile No." style="width: 210%; border: 1px solid #8f959b;" />
                                                </div>
                                            </div>

                                            <!-- Gender -->
                                            <div class="form-outline mb-4">
                                                <div class="" style="font-size: 130%;">
                                                    <label class="form-label" for="form3Example8">Gender: </label>
                                                    <input type="radio" name="gender" id="genderMale" value="Male" checked style="margin-left: 3%;"><span style="margin-right: 5%;">Male</span>
                                                    <input type="radio" name="gender" id="genderFemale" value="Female"><span style="margin-right: 5%;">Female</span>
                                                    <input type="radio" name="gender" id="genderOther" value="Other"><span style="margin-right: 5%;">Other</span>
                                                </div>
                                            </div>

                                            <!-- Birthdate -->
                                            <div class="form-outline mb-4">
                                                <input required name="bdate" type="date" id="bdate" max="<?php echo date('Y-m-d'); ?>" class="form-control form-control-lg" />
                                            </div>

                                            <!-- Password -->
                                            <div class="form-outline mb-4">
                                                <input required name="password" type="password" id="password" class="form-control form-control-lg" placeholder="Password" />
                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="form-outline mb-4">
                                                <input required name="confirmpassword" type="password" id="confirmpassword" class="form-control form-control-lg" placeholder="Confirm Password" />
                                            </div>

                                            <!-- Create Account Button -->
                                            <div class="d-flex justify-content-end pt-3">
                                                <button type="submit" name="btnsubmit" class="btn btn-success btn-lg ms-2" style="width: 100%; font-weight: bold; font-size: 110%">Create Account</button>
                                            </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

    if (isset($_POST['btnsubmit'])) {

        if ($_POST['password'] == $_POST['confirmpassword']) {

            include('../Admin/database.php');

            // Insert record of newly created user's account
            $result = mysqli_query($con, "INSERT INTO `passengertb` (`fname`, `lname`, `bdate`, `mobile`, `gender`, `email`, `pass`) VALUES ('" . $_POST['fname'] . "', '" . $_POST['lname'] . "', '" . $_POST['bdate'] . "', '" . $_POST['mobile'] . "', '" . $_POST['gender'] . "', '" . $_POST['email'] . "', '" . $_POST['password'] . "');");

            if ($result) {

                $msg = "Thank you for Creating an Account with Railway \n 
                We would love to Serve you ;)  \n
                Your email: " . $_POST['email'] . " password: " . $_POST['password'];

                $sent = mail($_POST['email'], 'Account Creation', $msg);

                echo "<script>
                    alert('Account Created Successfully... Corresponding mail has been sent to you...');
                    window.location.assign('./index.php');
                    </script>";
            } else {
                echo "<script>alert('Failed Creating Account...');</script>";
            }
        } else {
            echo "<script>
                let a = confirm('Incorrect Details or Password did not match with Confirm Password!!');
                if (a || !a) {
                    window.location.assign('Register.php');
                }
            </script>";
        }
    }

    ?>

</body>

</html>
