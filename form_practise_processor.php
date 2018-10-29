<?php
if(isset($_POST['message'])){
	foreach($k=>$v){
		echo"$k : $v";
	}
}
else{
	header(location:"formpractise.php");
}
?>