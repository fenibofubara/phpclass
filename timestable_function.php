<?php

function timestable($x,$j=12){
ECHO "<H2> Times Table Of $x<br>";
for($i = 1;$i<=$j;$i++){
$res = $x*$i;
echo "$x x $i = $res <br>";
}
echo "<br> <br> <br>"; //echo does not just display output,it functions the string notwithstanding
}
/* timestaBle(7);
timestable(5);
timestable(12,5);
timestable(12,5,5);// extra variables will not affect the function
 */?>