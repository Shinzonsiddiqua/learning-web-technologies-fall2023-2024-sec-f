<?php 
    session_start();
    if(isset($_REQUEST['submit'])){

        
        $username = $_REQUEST['username']; 
        $password = $_REQUEST['password']; 
        $rememberme = isset($_REQUEST['rememberme']);

        if($username == "" && $password == "") {
            
            header('location: login.php');
        }
        else{
            $file = fopen('user.txt', 'r');
            
            while(!feof($file)){
                $data = fgets($file);
                $user = explode('|', $data);
                
                if($username == trim($user[0]) && $password == trim($user[1]))
                {
                    $_SESSION['username']=$user[0];
                    $_SESSION['password']=$user[1];
                    $_SESSION['name']=$user[2];
                    $_SESSION['email']=$user[3];
                    $_SESSION['gender']=$user[4];
                    $_SESSION['dob']=$user[5];
                 

                    
                       
                        setcookie('flag', 'borhan', time()+300, '/');
                    
                        header('location: admin_home.php');
                  
                    
                   

                }
                
                
            }
            
                
                    echo "invalid credentials!!";
                
        }
    }else{
        echo "invalid request...";
    }
?>