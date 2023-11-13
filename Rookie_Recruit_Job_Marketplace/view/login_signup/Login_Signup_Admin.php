<?php

session_start();


$login_email_error = '';
$login_password_error = '';
$ADMIN_login_service = '../../controller/admin/AdminLoginService.php';
$ADMIN_signup_service = '/Rookie_Recruit_Job_Marketplace/controller/admin/AdminSignupService.php';

$_SESSION['emailError'] = "";
$_SESSION['passwordError'] = "";

$login_email_error = $_SESSION['emailError'] !== ""?:null;
$login_password_error = $_SESSION['passwordError'] !== ""?:null;


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rookie Recruit Job Marketplace</title>

</head>

<body style="overflow-y: hidden" onload="show_login();">

<!-- Login Page Start -->


<div class="login_signup_container">
    <div class="login_signup_a">


        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation" style="cursor: pointer" onclick="show_login()">
                <a class="nav-link" id="tab-login" data-mdb-toggle="pill" role="tab"
                   aria-controls="login" >Login</a>
            </li>
            <li class="nav-item" role="presentation" style="cursor: pointer" onclick="show_signup()">
                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" role="tab"
                   aria-controls="pills-register" >Register</a>
            </li>
        </ul>
        <!-- Pills navs -->

        <!-- Pills content -->

        <div class="tab-content">
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="tab-login">
                <!-- Login Form -->
                <form action="<?php echo $ADMIN_login_service;?>" method="post">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="loginEmail" name="loginEmail" class="form-control" />
                        <label class="form-label" for="loginEmail">Email</label>
                        <label class="error-label" id="loginEmailError" style="display: none"><?php echo ($login_email_error != "") ? $login_email_error : ""; ?>
                        </label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="loginPassword" name="loginPassword" class="form-control" />
                        <label class="form-label" for="loginPassword">Password</label>
                    </div>

                    <!-- 2 column grid layout -->
                    <div class="row mb-4">
                        <div class="col-md-6 d-flex justify-content-center">
                            <!-- Checkbox -->
                        </div>

                        <div class="col-md-6 d-flex justify-content-center">
                            <!-- Simple link -->
                            <a href="#!">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>



                    <!-- Register buttons -->
                    <div class="text-center" id="signup">
                        <p>Not a member? <a style="cursor: pointer" onclick="show_signup();">Register</a></p>
                    </div>
                </form>
            </div>
            <div class="" id="pills-register" role="tabpanel" aria-labelledby="tab-register">

                <!-- Signup Form -->
                <form action="<?php echo $ADMIN_signup_service?>" method="post">

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="registerEmail" name="registerEmail" class="form-control" />
                        <label class="form-label" for="registerEmail">Email</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="registerPassword" name="registerPassword" class="form-control" />
                        <label class="form-label" for="registerPassword">Password</label>
                    </div>

                    <!-- Phone input -->
                    <div style="display: none" class="form-outline mb-4">
                        <input type="text" id="phone" class="form-control" />
                        <label class="form-label" for="phone">Phone</label>
                    </div>

                    <!-- Gender input -->
                    <label style="display: none" class="form-label" for="gender">Gender</label>
                    <select style="display: none" class="form-select mb-4 dropup" id="gender">
                        <option value="" disabled selected>-- Select --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <!-- Add more options as needed -->
                    </select>
<!--                    <div class="form-outline mb-4"></div>-->

                    <!-- Date of Birth-->
                    <div style="display: none" class="form-outline mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label" for="dob">Date of Birth</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" id="dob" class="form-control" />
                            </div>
                        </div>
                    </div>



                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-3">Sign up</button>
                </form>
            </div>
        </div>
        <!-- Pills content -->


    </div>
</div>




<!-- Login Page End -->

<script>
    let login_tab = document.getElementById("tab-login");
    let signup_tab = document.getElementById("tab-register");
    let login_div = document.getElementById("login");
    let signup_div = document.getElementById("pills-register");
    let gender = document.getElementById("gender");
    // let termsConditionsModal = new bootstrap.Modal(document.getElementById('termsConditions'));



    gender.options[0].selected = true

    show_signup = () => {
        login_div.style.display = "none";
        signup_div.style.display = "block";
        signup_tab.classList.add("active");
        login_tab.classList.remove("active");
    }

    show_login = () => {
        login_div.style.display = "block";
        signup_div.style.display = "none";
        login_tab.classList.add("active");
        signup_tab.classList.remove("active");
    }



    sign_in_clicked = () => {

    }





</script>




<script src="index.js"></script>
</body>
</html>