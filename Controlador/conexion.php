<?php 

$mysqli= new mysqli('localhost','root','','Reto');

if ($mysqli->connect_error){
die ('error'.$mysqli->connect_error);
} 



 ?>