
<html>
    <head>
        <title> Date Of Birth</title>
</head>
<body>
    <fieldset>
    <h2>Submit Your Date Of Birth</h2>
    <form method ="post">
        <label for= "dob">Date of Birth</label>
        <input type= "date" name="dob" id="dob" required> 
        <input type= "Submit" value= Submit><br><br>
</fieldset>
</form>
</body>
</html>

<?php echo $_POST["dob"];
?>
