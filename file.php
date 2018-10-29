<?php
$handle=fopen('content.txt','w');
fwrite($handle,'Very Good Content'."\n");
fwrite($handle,'Good For SEO');

echo "File wriite done.'\n'.Check file directorry to created file";


?>