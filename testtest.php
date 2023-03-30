<?php 
$myFile = "filename.php"; // or .php   
$fh = fopen($myFile, 'w'); // or die("error");  
$stringData = "your html code php code goes here";   
fwrite($fh, $stringData);
fclose($fh);

?>