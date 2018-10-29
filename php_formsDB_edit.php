<?php
include_once('includes/mylibrary.inc.php'); //used to ensure that the file is included once just once

$id = isset($_GET['editid'])?(int)$_GET['editid']:0;
$fname = $mail = $mobil = $messag = "";
$fen->fetchfeedbacks($id,$fname,$mail,$mobil,$messag);
if(isset($_POST['updateform'])){
	echo $fen->update_feedback();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>PHP Forms</title>
<link type='text/css' rel='stylesheet' href='bootstrap/css/bootstrap.min.css'>
</head>
<body>
<form action ="" method="POST">
<label>Name:</label>

<input type="text" name="Fullname" value="<?php echo $fname;?>"><br>
<label>Email:</label>
<input type="email" name="Email"  value="<?php echo $mail;?>"><br>
<label>Number:</label>
<input type="mobile" name="Number" placeholder="Include Country Code" value="<?php echo $mobil;?>"><br>
<label>Gender:</label>
<label>Your Message</label><br>
<textarea name ="Message" required><?php echo $messag;?></textarea><br>
<input type='hidden' name='uid' value='<?php echo $id;?>'>
<input type='hidden' name='updateform' value='1'>
<input type="submit" name= "submit" value="submit" class="btn btn-success">
<a href='javascript:history.back()' class="btn btn-danger">Back</a>
</form>
</body>
