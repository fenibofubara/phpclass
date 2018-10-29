	<?php	
	/* A constructor is used to just initiate a whole class with arguments that all its methods can automatically work with.
	if constructor is not used then we will need to create instances of the class per method  and then start initiating them one after another.
	*/
	class solve{
	public function __construct($a,$b,$c){
		// ---------------This is the construtor class--------------------
				//$this->subtract($a,$b,$c);
				//$this->add($a,$b,$c);	
			}
	
	
	public function subtract($a,$b,$c){
		$ff = $a - $b - $c;
		echo $ff."<br>"; 
		
	}
	public function add($a,$b,$c){
	$essence = $a + $b + $c;
	echo $essence;
	//return $essence;
	
}
	}
//--- Call Up here -----
   // object       instance
	$photocopy = new solve(3,2,1);
	// ----------multiple instances of a class-------------------
	$student1 = new solve(3,2,1);
	echo $student1->subtract(3,2,0);
	$student2 = new solve(4,3,1);
	echo $student2->add(4,3,1);
	
	/* 
	So different users of an app 'student1'/'student2' can actually be using the instance
	 */
		?>