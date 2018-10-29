<?php
$errmsg = isset($_POST['error'])?"<font color=red>Invalid Username or password</font>":"";
$signedoutt = isset($_POST['signout'])?"<font color=blue>you have been signed out</font>":"";
?>
<!DOCTYPE html>
<html>
<head>
<title>LoginForm</title>
<link type='text/css' rel='stylesheet' href='bootstrap/css/bootstrap.min.css'>
</head>
<body>
<?php echo"$errmsg";?>
<?php echo"$signedoutt";?>
<form action='page.php' method='POST'>
<label>Username:</label>
<input type='text' name='usernam'><br>
<label>Password:</label>
<input type='password' name='passwrd'><br>
<input type='submit' name='login' value='LOGIN' class='btn btn-default'>
</form>
</body>
</html>