<?php
require('moremaths.php');


class maths extends complexmaths{
var $result;//property  global variable like to houses separated by a fence,both has d priviledges of sharing somting //by making that tin visibe with a rope ontop d fence

public function add($x,$y){
$this->result = $x + $y;
}
public function subtract($x,$y){
return $x - $y;
}
public function multiply($x,$y){
return $x * $y;
}
}
//  Callup Pattern For Classes
$mymaths = new maths;
$ans = $mymaths->subtract(10,5);
echo $ans;
// Callup pattern for return type that returns value to a global variabe
echo "<br><br>";
$mymaths -> add(10,5);
echo$mymaths->result;
echo "<br><br>";
// Inheritance Callup
echo $mymaths->incremental(5); 









//==========================================
/* class maths{
var $result;//property  global variable like  houses separated by a fence,both has d priviledges of sharing somting //by making that tin visibe with a rope ontop d fence // u can also remove the key word var

public function add($x,$y){
$this->result = $x + $y;
}
public function subtract($x,$y){
$show = $x - $y;
return $show ;
}
public function multiply($x,$y){
return $x * $y;
}
}
//  Callup Pattern For Classes
$mymaths = new maths;
$ans = $mymaths->subtract(100,5);
echo $ans;
// Callup pattern for return type that returns value to a global variabe
echo "<br><br>";
$mymaths -> add(10,5);
echo$mymaths->result; */

?>