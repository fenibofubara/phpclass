<?php
require('dbconst_practise.php');
class dbconnect{
     private $connt;

	public function __construct(){
		$this->openconnect(); // this is done so that openconnection will run automatically
		}
	
	public function openconnect(){
		GLOBAL $dbserver,$username,$password,$dbname;
		die("$dbserver,$username,$password,$dbname");
		$this->connt = mysqli_connect($dbserver,$username,$password,$dbname);
		if(mysqli_connect_errno()){
			die('Error connection');
		}
		else{
			echo "Database Connection Successfull";
		}
	}
}
$feni = new dbconnect;
?>