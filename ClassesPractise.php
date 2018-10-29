<?php

class solve{
var $show;
	public function subtract($a,$b){
		$ff = $a - $b;
		$this->show=$ff;
		
	}
	public function add($x,$y){
	$essence = $x + $y;
	return $essence;
}
}
//--- Call Up here -----
		$instance=new solve;
		$output = $instance->add(10,10);
		echo $output;
		echo"<br><br><br>";
		$clone = new solve;
		$clone->subtract(100,70);
		echo $clone->show; 
			
	
		
?>