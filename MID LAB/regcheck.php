<?php 
    session_start();
    if(isset($_REQUEST['submit'])){

     
        $username = $_REQUEST['username']; 
        $password = $_REQUEST['password']; 
        $email = $_REQUEST['email'];
        $gender = $_REQUEST['gender']; 
        $dob = $_REQUEST['dob'];
        $name = $_REQUEST['name'];
        $confirmpassword= $_REQUEST['confirmpassword'];

        if($username == "" || $password == "" ||empty($name)|| $email == "" || empty($gender)||empty($dob)) {
            echo "Null value ..";
            
        }
        elseif( $password != $confirmpassword  ) {
            echo "Password does not match";
            
        }
        else{
            $file = fopen('user.txt', 'a');
            $user = $username."|".$password."|".$name."|".$email."|".$gender."|".$dob."\r\n";
            fwrite($file, $user);
            header('location: login.php');
        }
    }else{
        echo "invalid request...";
    }
?>