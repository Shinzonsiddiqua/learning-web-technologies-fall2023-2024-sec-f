<?php include '../../view/Renderer.php'; ?>

<?php
session_start();
error_reporting(0);
$navbar_admin = '../../view/Navbar_Applicant.php';
// Your specific content goes here
Renderer::start();
?>


<?php
$login_email_error = '';
$login_password_error = '';

$Applicant_ProfileService_file = "/Rookie_Recruit_Job_Marketplace/controller/applicant/Applicant_ProfileService.php";




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rookie Recruit Job Marketplace</title>

</head>
<body>

<!-- MY PROFILE START -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Page title -->
            <div class="my-5">
                <h3>My Profile</h3>
                <hr>
            </div>
            <!-- Form START -->
            <form action="<?php echo $Applicant_ProfileService_file;?>" method="post" class="file-upload">
                <div class="row mb-5 gx-5">
                    <!-- Contact detail -->
                    <div class="col-xxl-8 mb-5 mb-xxl-0">
                        <div class="bg-secondary-soft px-4 py-5 rounded">
                            <div class="row g-3">

                                <!-- Full Name  -->
                                <div class="col-md-6">
                                    <label for="full_name" class="form-label">Full Name</label>
                                    <input type="text" id="full_name" name="full_name" value="<?php echo $_SESSION["full_name"];?>" class="form-control" placeholder="Full Name Here" >
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" value="<?php echo $_SESSION["data"]["email"];?>" placeholder="Email Here" class="form-control">
                                </div>

                                <!-- Type -->
                                <div class="col-md-6">
                                    <label for="type" class="form-label">Position / Post</label>
                                    <input type="text" id="type" name="type" value="<?php echo $_SESSION["data"]["type"];?>" class="form-control" placeholder="Position Here">
                                </div>
                                <!-- Status  -->
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Account Status</label>
                                    <input disabled type="text" id="status" name="status" value="<?php echo $_SESSION["data"]["status"];?>" class="form-control" placeholder="Status Here" >
                                </div>



                            </div> <!-- Row END -->
                        </div>
                    </div>

                    <!-- Social media detail -->
                    <div class="row mb-5 gx-5">


                        <!-- change password -->
                        <!--                    <div class="col-xxl-6">-->
                        <div class="bg-secondary-soft px-4 py-5 rounded">
                            <div class="row g-3">
                                <h4 class="my-4">Change Password</h4>
                                <!-- Old password -->
                                <div class="col-md-6">
                                    <label for="oldPassword" class="form-label">Old password</label>
                                    <input type="password" id="oldPassword" name="oldPassword" placeholder="Old Password Here" class="form-control">
                                </div>
                                <!-- New password -->
                                <div class="col-md-6">
                                    <label for="newPassword" class="form-label">New password</label>
                                    <input type="password" id="newPassword" name="newPassword" placeholder="New Password Here" class="form-control" >
                                </div>
                                <!-- Confirm password -->
                                <div class="col-md-12">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Same New Password Here" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <!--                    </div>-->
                    </div> <!-- Row END -->
                    <!-- button -->
                    <div class="gap-3 d-md-flex justify-content-md-end text-center">
                        <!--                    <button type="button" class="btn btn-danger btn-lg"><a href="" style="text-decoration: none; color: inherit" >Delete profile </a></button>-->
                        <input type="submit" value="Update Profile" style="text-decoration: none; color: white" class="btn btn-primary btn-lg"/>
                    </div>
            </form> <!-- Form END -->
        </div>
    </div>
</div>

<!-- MY PROFILE END -->




</body>
</html>
<?php Renderer::end(); ?>


<?php include $navbar_admin;?>
