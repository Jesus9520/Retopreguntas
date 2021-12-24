<?php 

require('conexion.php');
$nombre = $_POST['nombre'];

$sqlJugador ="SELECT * FROM `jugadores` where nombre = '$nombre'";
$jugadores =$mysqli->query($sqlJugador);
$jugador = $jugadores->fetch_array(MYSQLI_ASSOC);
$juga =  $jugador['nombre'];

if ($jugador['nombre']==$nombre) {
	$sql = "UPDATE jugadores SET categoria = 1, puntajePartida = 0 WHERE nombre ='$nombre'";
	$resp =$mysqli->query($sql);
	header("Location:../Vista/preguntas.php?nombre=$nombre");
}else{
	$sql="INSERT INTO jugadores(nombre,categoria) values ('$nombre',1)";
	$resultado = $mysqli->query($sql);

	header("Location:../Vista/preguntas.php?nombre=$nombre");
}




?>