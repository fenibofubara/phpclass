<?php 
include('timestable_function.php');
if(isset($_GET['x'])){
	$x=$_GET['x'];
	timestable($x);
}
else{
	header("position:exercise.php");
}
?>