<?php
session_start();
$realuser = "fenibo";
$realpasswd = "7516c3b35580b3490248629cff5e498c";
// ------------signout code------------------------
if(isset($_GET['signout'])){
	$_SESSION['username'] = NULL;// u can use ''
	$_SESSION = array(); //???
	$_SESSION['pwd'] = NULL;
	setcookie(session_name(),NULL,time(-558585)); // ? session_name()
	session_destroy();
	header("location: login_form_session.php?signedout");
}

if(isset($_POST['usrname']) && isset($_POST['pssword'])){
	$username = $_POST['usrname'];
	$pwd = md5($_POST['pssword']);
	if($username == $realuser && $pwd== $realpasswd){
	$_SESSION['username'] = $username; // feed in the value into the index 'username' of the array.
	$_SESSION['pwd'] = $pwd;	
	}
	else{
	header("location: login_form_session.php?errorstatus=invalid");
	}
}
if(isset($_SESSION['username']) && isset($_SESSION['pwd'])){
	$username = $_SESSION['username'];
}
 else{
	 	die("eeee");

	header("location: login_form_session.php");
} 	
	
	

echo"<h1> user area</h1>";
echo"<h3> Welcome $username you can enjoy the site<br></h3>";
echo "<a href='?signout=1'>Sign Out</a>";


?>