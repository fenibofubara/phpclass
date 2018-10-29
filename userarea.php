<?php
$realuser = "fenibo";
$realpasswd = "7516c3b35580b3490248629cff5e498c"; //school;

// '''''''''''''''''''''''''' Logout code ''''''''''''''''''''''''''''''''''

if(isset($_GET['signout'])){
	setcookie("username",null,time()-86400);//unsetting the cookie
	setcookie("pwd",null,time()-86400);
	header("location: login_form.php?signedout");
}

if(isset($_POST['usrname']) && isset($_POST['pssword'])){
	$username = $_POST['usrname'];
	$pwd = md5($_POST['pssword']);//'md5' is HASH encription method
	if($username == $realuser && $pwd== $realpasswd){
	setcookie("username",$username,(time() + 86400));// braket is cos of addition
	setcookie("pwd",md5($pwd),(time() + 86400));// 15 secs
	echo "<h4>First Cookie Intake</h4>";
	}
	else{
	header("location: login_form.php?errorstatus=invalid");
	}
}
elseif(isset($_COOKIE['username']) && isset($_COOKIE['pwd'])){
	$username = $_COOKIE['username'];
	echo "<h4>Life Cookie working</h4>";
}
 else{
	header("location: login_form.php");
} 	
	
	

echo"<h1> user area</h1>";
echo"<h3> Welcome $username you can enjoy the site<br></h3>";
echo "<a href='?signout=1'>Sign Out</a>";


?>