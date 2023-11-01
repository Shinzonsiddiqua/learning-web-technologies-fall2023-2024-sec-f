<html>
    <head>
        <title>Login</title>
    </head>
    <body>
    <center>
        <table height=720 width=1080>
            <tr height=70>
                <td >
                     <table width = "800">
                    <tr>
                        <td>
                           
                        </td>
                        <td align="right">
                     <a href="login.php"> Login</a>   <a href="registration.php">| Registration</a>  
                    </td>    
                </tr>    
                </table>
                    
                </td>
            </tr>
            <tr>
                <td>      
                    <H2>LOGIN</H2>
                    
                <form method="POST" action="logincheck.php"  >
                            <fieldset>
                               
                             Username: <input type="text" name="username" value=""/> <br>
                              Password: <input type="password" name="password" value=""/> <br> 
                              <hr>
                             
                            <input type="submit" name="submit" value="Submit"/>
                            <input type="reset" name="reset" value="Reset">
                            
            </fieldset>
        </form>
</td>
            </tr>
           
        </table>
    </center>
    </body>
</html>