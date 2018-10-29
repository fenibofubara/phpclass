<?php

// "INSERTING INTO TABLE USING PREPARED STATEMENT & BIND PARAM";
if($stmt = $this->con->prepare("INSERT INTO users(regno, surname, firstname, middlename, gender) values(?,?,?,?,?)")){
$stmt->bind_param('issss', $regno, $surname, $firstname,$middlename, $gender);
if($stmt->execute()){
$stmt->close(); 
return "Registration Successful!");
}else{
return "Registration Failed! ".$this->con->error);
}
}else{
/* Error */
return "Registration Failed! ".$this->con->error);
}
return $this->goto_notify(1,"Unknown Error! ".$this->con->error . "Try Again Later");



//SELECT STATEMENT

$sql = "SELECT * FROM staff_details  WHERE  	regno = '$regno' LIMIT 1";
if(!$result = $this->con->query($sql))
{
return "Encountered Error, Please Rtry".$this->con->error;
}
$i=0;
while($row = $result->fetch_assoc()){
$regno			=(int)$row['regno'];
$surname		=stripslashes($row['surname']);
$i++;
}


//Updating Records
$sql = "UPDATE staff_details SET surname='$surname', othernames='$othernames', gender='$gender' WHERE regno='$regno'";
if(!$this->con->query($sql)){
return "Error: ".$this->con->error;
}else{
return "Update Successful";
}			


public function sanitize($word){
return $this->connection->real_escape_string(htmlspecialchars(trim($word)));
}			


//DELETE RECORDS	
$sql = "DELETE FROM $table WHERE $field='$id' LIMIT 1"; 
if($this->con->query($sql)){
$this->con->close();
return "Successfully Deleted";
}else{
/* Error */
return "Error: " . $this->con->error;
}
