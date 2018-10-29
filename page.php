<?php
 echo"<h3> My Page</h3>";
 $passwordreal = "d5aa1729c8c253e5d917a5264855eab8"; //i.e md5 version of freedom
 $usernamereal = "fenibo";
 //----------------------- Logout ------------------
 if(isset($_GET['signout'])){
	setcookie("usernam",$UserName,(time()-15));
	setcookie("passwrd",$UserName,(time()-15));	
	header("location:login_Practise.php?loggedout");
 }
if(isset($_POST['usernam']) && isset($_POST['passwrd'])){
	$UserName  = $_POST['usernam'];
	$PassWord  = md5($_POST['passwrd']);
if($UserName==$usernamereal && $PassWord==$passwordreal){
setcookie("usernam",$UserName,(time()+15));
setcookie("passwrd",$PassWord,(time()+15));
echo"<h3>First Cookie Operation</h3>";
}
else{
	header("location:login_Practise.php?error=InvalidUsername");
}
}
elseif(isset($_COOKIE['usernam']) && isset($_COOKIE['passwrd'])){
	$username = $_COOKIE['usernam'];
	$password = $_COOKIE['passwrd'];
	echo"<h3>Stored cookie Operation</h3>";
}
else{
	header("location:login_Practise.php");

}
     echo"WelCome $UserName Your Password is $PassWord";	
     echo"<a href='login_Practise.php?signout=1'>SignOut</a>";	
?>