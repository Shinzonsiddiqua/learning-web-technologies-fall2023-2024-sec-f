<?php
// Login.php
$Login_Service_file = '/Online Shop Management System/controller/Login_Service.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<form action="<?php echo $Login_Service_file;?>" method="post" onsubmit="return validateForm()">
    <h2>Login</h2>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" >

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" >

    <button type="submit">Login</button>
</form>

<script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        if (username === "" || password === "" || username === null || password === null) {
            alert("Username and password cannot be empty.");
            return false;
        }

        return true;
    }
</script>

</body>
</html>
