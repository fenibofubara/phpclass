<?php
$errmsg = isset($_POST['errorstatus'])?"<font color=red>Invalid Username or password</font>":"";
$signedout = isset($_POST['signedout'])?"<font color=blue>you have been signed out</font>":"";

?>

<!DOCTYPE html>
<html>
<head>
<title>Fill Form</title>
<link type = 'text/css' rel='stylesheet' href='bootstrap/css/bootstrap.min.css'>
</head>
<body>
<?php echo $errmsg;?>
<?php echo "$signedout";?>
<form action='userarea.php' method='POST'>
<label>Username:</label>
<input type='text' name='usrname'><br>
<label>Password</label>
<input type='password' name='pssword'><br>
<button class='btn btn-success' name='login'>LOGIN</button>
</form>
</body>
</html>

	
	
	