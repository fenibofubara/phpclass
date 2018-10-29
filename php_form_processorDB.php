<?php 
include_once('includes/mylibrary.inc.php'); //used to ensure that the file is included once just once
if(isset($_POST['Fullname'])) {
	echo $fen->recordfeedback();//object of the class controller
}
if(isset($_GET['delid'])){
	echo $fen->remove_feedback();
}
	echo $fen->showfeedbacks();

?>