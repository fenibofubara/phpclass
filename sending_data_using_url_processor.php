<?php 
include("timestable_function.php");

//$_REQUEST['x'];// use request to achieve both GET and POST
//we use _GET wen we want to work with URL
if(isset($_GET['x'])) {
$x = $_GET['x'];
timestable($x);
} else{
header("location: sending_data_using_url1.php");
}
/* 
function timestable($x,$j=12){
ECHO "<H2> Times Table Of $x<br>";
for($i = 1;$i<=$j;$i++){
$res = $x*$i;
echo "$x x $i = $res <br>";
}
echo "<br> <br> <br>"; 
} */
?>