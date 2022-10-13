<?php 
error_reporting(E_ALL); 
ini_set('display_errors','1'); 
$nope = fopen("birthdays.txt", "a+") or die("error");
$text = "[".$_POST['birthday']." , ".$_POST['name']."]";
fwrite($nope, $text);
fclose($nope);
 ?>
