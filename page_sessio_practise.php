<?php
$realUN = "fenibo";
$realPW = "7516c3b35580b3490248629cff5e498c"; //school;
if(isset($_POST['name']) && isset($_POST['pwd'])){
		$Username = $_POST['name'];
		$Password = md5($_POST['pwd']);
	if($Username==$realUN && $Password==$realPW){
		$_SESSION['Username'] = $Username;
		$_SESSION['Password'] = $Password;
		
		echo "<h4>Sesssion Created</h4>";
		
	}
	else{
		header("location:login_Sessn_Practise.php?WrongUserNameAndPassword");
	}


echo"Welcome $Username Your ID is $Password";	
}
else{
	header("location:login_Sessn_Practise.php?emptyfields");
}
echo"<br>";
echo "<a href = 'login_Sessn_Practise.php?signedout =1'>SignOut</a>";






?>