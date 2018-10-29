<?php
$signedout = isset($_GET['signedout'])?"<font color=blue>you have been signed out</font>":"";
?>
<!DOCTYPE html>
<html>
<header>
<title>LoginSessionPractise</title>
<link type='text/css' rel='stylesheet' href='bootstrap/css/bootstrap.min.css'>
</header>
<body>
<?php 
echo $signedout;
?>
<form action='page_sessio_practise.php' method='POST'>
<label>Username:</label>
<input type='text' name='name'><br>
<label>Password:</label>
<input type='password' name='pwd'><br>
<input type='submit' name='btn' value='ENTER' class='btn btn-success'>
</form>
</body>
</html>