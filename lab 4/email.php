
<html>
    <head>
        <title>Email</title>
</head>
<body>
    <fieldset>
    <h2>Submit Email</h2>
    <form method ="post">
        <label for= "email">Email:</label>
        <input type= "email" name="email" id="eamil" required> 
        <span style ="color:blue;>
        <span class ="hint-icon" title="Example:abc@email.com">?</span><br><br>
        <input type= "Submit" value= Submit><br><br>
</fieldset>
</form>
</body>
</html>

<?php echo $_POST["email"];
?>
