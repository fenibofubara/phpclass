<?php
require('const.inc.php');

class controller{
	private $con;
	public function __construct(){
		$this->openconnection(); // this is done so that openconnection will run automatically
		}
	
	public function openconnection(){
		GLOBAL $DBSERVER,$DBUSER,$DBPASSWORD,$DBNAME;
		$this->con = mysqli_connect($DBSERVER,$DBUSER,$DBPASSWORD,$DBNAME);
		if(mysqli_connect_errno()){
			die('DATEBASE CONNECTION FAILED'); // no point showing the other webpages when database connection is failed.
		}else{
			//echo "Database Connection Successful,<BR>";
		}
	}
	
	public function recordfeedback_old(){
		$fullname = htmlspecialchars($_POST['Fullname']);// htmlspecialchars is used to turn every special characters to text equivalent so that any injected code bug will run as text 'sql injection
		$email = htmlspecialchars($_POST['Email']);
		$number = htmlspecialchars($_POST['Number']);
		$gender = htmlspecialchars($_POST['gender']);
		$message = htmlspecialchars($_POST['Message']);
		
		$sql = "INSERT INTO feedback(fullname,email,mobile,message) VALUES('$fullname','$email','$number','$message')";
			if(($this->con->query($sql))===TRUE){
				return "Feedback Successfully Submited";
			}
			else{
				return "Unable to Record, reason:".$this->con->error; // $this->con->error:tels you the main cause of the error in mysql
			}
		
	}	
	
	public function upload_manager($targetpath="uploads/"){ // default path for storage
	$ext = pathinfo($_FILES['uploaded']['name'], PATHINFO_EXTENSION); 
	$ext = strtolower($ext); 
	$uploaded_time = time(); 
	$att_reply = ""; $att_error = 0; 
	$allowedExts = array("jpg","jpeg","png","doc","docx","pdf","xls","xlsx","ppt","pptx","xps","xpsx","mp3","mp4","txt"); 
	
	$target = $targetpath . basename( $_FILES['uploaded']['name']) ; 
	$filename = basename( $_FILES['uploaded']['name']); 
	$file_size = $_FILES['uploaded']['size']; 
	$file_type = strtolower($_FILES["uploaded"]["type"]); 
	if(!in_array($ext,$allowedExts)){ 
		die("$file_type is Not Acceptable"); 
	} 
	if($_FILES['uploaded']['size'] > 5124000) {
	die('File Exceeds Maximum Limit of 5MB'); 
	}
//temp is where medias are temporary stored wen a site is opened
	if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)){ 
	$newname = $targetpath . $uploaded_time . ".".$ext; 
	if(file_exists($newname)){ 
	unlink($target);//delete it
	die('Sorry There was An Error With The Attachment, Please Try re-attaching it'); 
	} 
	else{ 
		if(!rename($target,$newname)) {
		die('Could Not Attach File Try Later'); 
		}
		else{ 
				$att_reply = $uploaded_time . ".".$ext; 
				return $att_reply; 
			}
		} 
	} 
}
		
	public function recordfeedback(){
		$fullname = $this->sanitize($_POST['Fullname']);// htmlspecialchars is used to turn every special characters to text equivalent so that any injected code bug will run as text 'sql injection
		$email = $this->sanitize($_POST['Email']);
		$number = $this->sanitize($_POST['Number']);
		//$gender = $this->sanitize($_POST['gender']);
		$message = $this->sanitize($_POST['Message']);

		/* Check if file was uploaded*/
		if(isset($_FILES['uploaded'])){	
			if($_FILES['uploaded']['size']>0){
				$uploadpath = "uploads/";
				$filename = $this->upload_manager($uploadpath);	
			}
		}
		
			// "INSERTING INTO TABLE USING PREPARED STATEMENT & BIND PARAM";
			if($stmt = $this->con->prepare("INSERT INTO feedback(fullname,email,mobile,filename,message) VALUES(?,?,?,?,?)")){
			$stmt->bind_param('sssss', $fullname,$email,$number,$filename,$message);
			if($stmt->execute()){
			$stmt->close(); 
			return "Registration Successful!";
			}else{
			return "Registration Failed! ".$this->con->error;
			}
			}else{
			/* Error */
			return "Registration Failed! ".$this->con->error;		
			}
	}	

	public function showfeedbacks(){
		// Displays all you have in your database to your page
		$sql = "SELECT * FROM feedback ORDER BY id ";// You can query in ascending or descending order.
		if(!$result = $this->con->query($sql)) //result is a database object
		{
		return "Encountered Error, Please REtry, ".$this->con->error;
		}
		$i=0;
		$id = array();
		while($row = $result->fetch_assoc()){ 
		// converts db oject to associative array which is assigned to $row
		/* 1. Converts each column item in a db row into an associative array named row[]
		   2. */
		$id[$i]		= (int)$row['id']; // casting id into int as a datatype
		$fname[]	= stripslashes($row['fullname']); // assign into an empty array fname[]
		$mail[]		= stripslashes($row['email']);//
		$mobil[]	= stripslashes($row['mobile']);
		$messag[]	= stripslashes($row['message']);
		$filenam[]	= stripslashes($row['filename']);
		
		$i++;
		}
		$c = count($id); //how does count work??
		if($c==0){return "No Records In Database";}
		echo "
		<table border='1' style='width:50%'>
		<thead>
		<tr>
		<th>S/N</th>
		<th>FULLNAME</th>
		<th>EMAIL</th>
		<th>MOBILE</th>
		<th>THE MESSAGE</th>
		<th>FILE</th>
		<th>EDIT</th>
		<th>REMOVE</th>
		</tr>
		<thead>
		";
		for($i=0,$j=1;$i<$c;$i++,$j++){
			echo "
			<tr>
			<td>$j</td>
			<td>{$fname[$i]}</td>
			<td>{$mail[$i]}</td>
			<td>{$mobil[$i]}</td>
			<td>{$messag[$i]}</td>
			<td>{$filenam[$i]}</td>
			<td><a href='php_formsDB_edit.php?editid={$id[$i]}'>Edit</a></td>
			<td><a href='?delid={$id[$i]}'>Delete</a></td>
			</tr>
			";
		}
		echo "</table>";		
	}
	// sanitize() function prevents you from taking sql injection in your database.
	public function sanitize($word){
		return $this->con->real_escape_string(htmlspecialchars(stripslashes(trim($word))));
	}	
	
	public function fetchfeedbacks($id,&$fname,&$mail,&$mobil,&$messag){
		$sql = "SELECT * FROM feedback WHERE id = '$id' ";
		if(!$result = $this->con->query($sql)) //result is a database object
		{
		return "Encountered Error, Please REtry, ".$this->con->error;
		}
		$i=0;
		while($row = $result->fetch_assoc()){ 
		$fname	= $this->sanitize($row['fullname']);
		$mail	= stripslashes($row['email']);
		$mobil	= stripslashes($row['mobile']);
		$messag	= stripslashes($row['message']);
		$i++;
		}
		
		}
	
	public function update_feedback(){
		$fullname = $this->sanitize($_POST['Fullname']);
		$email = $this->sanitize($_POST['Email']);
		$number = $this->sanitize($_POST['Number']);
		$updid = (int)$_POST['uid'];// casting for conversion of datatypes.===conversion
		$message = $this->sanitize($_POST['Message']);
	$sql = "UPDATE feedback SET fullname='$fullname', email='$email', mobile='$number', message='$message' WHERE id='$updid'";
	if($this->con->query($sql)){
	return "Update Successful <a href='php_form_processorDB.php'>Continue</a>";
	}else{
	return "Error: ".$this->con->error;
	}
}	
	
	public function remove_feedback(){
		$delid = (int)$_GET['delid'];
	$sql = "DELETE FROM feedback WHERE id='$delid'";
	if($this->con->query($sql)){
	return "Successfully Delete!";
	}else{
	return "Error: ".$this->con->error;
	}
}

	
	
	}

$fen = new controller; // create an object of the class
?>