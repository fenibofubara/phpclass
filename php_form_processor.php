<?php 
include_once('includes/mylibrary.inc.php');
if(isset($_POST)) {
	$res=$_POST['Fullname'];
	echo "$res <br>";
	$res1=$_POST['Email'];
	echo "$res1 <br>";
	$res2=$_POST['Number'];
	echo "$res2<br>";
	$res3=$_POST['Message'];
	echo "$res3";
/* foreach($_POST as $k => $v){  //foreach('arrayname' as 'key'=>'value')
	echo "$k = $v <br>";
} */
} else{
echo "Please fill the form";
}
?>