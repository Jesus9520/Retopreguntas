<?php 

require('conexion.php');
$nombre = $_POST['nombre'];
$sql="INSERT INTO jugadores(nombre) values ('$nombre')";
$resultado = $mysqli->query($sql);

header("Location:../Vista/preguntas.php?nombre=$nombre");

?>