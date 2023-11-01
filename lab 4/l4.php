
<html>
    <head>
        <title> NAME</title>
</head>
<body>
    <fieldset>
    <h2>Submit Name</h2>
    <form method ="post">
        <label for= "name">Name:</label>
        <input type= "text" name="name" id="name" required> 
        <input type= "Submit" value= Submit><br><br>
</fieldset>
</form>
</body>
</html>

<?php echo $_POST["name"];
?>
