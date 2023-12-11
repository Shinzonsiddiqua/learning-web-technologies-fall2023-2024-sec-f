<?php
// Register.php

$sign_up_check = '/Final lab/sign up check.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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

<form action="<?php echo $Registration_Service_file;?>" method="post" onsubmit="return validateForm()">
    <h2>Registration</h2>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name">

    <label for="contact_no">Contact Number:</label>
    <input type="text" id="contact_no" name="contact_no">

    <label for="username">Username:</label>
    <input type="text" id="username" name="username">

    <label for="password">Password:</label>
    <input type="password" id="password" name="password">

    <button type="submit">Register</button>
</form>

<script>
    function validateForm() {
        var name = document.getElementById("name").value;
        var contact_no = document.getElementById("contact_no").value;
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        if (name === "" || contact_no === "" || username === "" || password === "") {
            alert("All fields must be filled out.");
            return false;
        }

        return true;
    }
</script>

</body>
</html>