<?php 

 require ('../Controlador/conexion.php');

$respuesta = $_POST['respuesta'];
$nombre = $_POST['nombre'];



$sqlRespuesta ="SELECT * FROM `preguntas` as p INNER JOIN respuestas as r on p.id_preguntas = r.id_pregunta where respuesta = '$respuesta'"  ;
$respuestas =$mysqli->query($sqlRespuesta);

$estado  = $respuestas->fetch_array(MYSQLI_ASSOC);

if ($estado['estado'] == 1) {



	$sqlCategoria = "Select categoria, puntajePartida,puntaje from jugadores where nombre ='$nombre'";
    $resp =$mysqli->query($sqlCategoria);
    $categoria  = $resp->fetch_array(MYSQLI_ASSOC);




		$sql = "UPDATE jugadores SET categoria = '$categoria[categoria]' + 1, puntajePartida = '$categoria[puntajePartida]' + 100 WHERE nombre ='$nombre'";
	$resp =$mysqli->query($sql);
	if ($categoria['puntajePartida'] >= 400) {

			$sqlPa = "UPDATE jugadores SET puntaje = '$categoria[puntaje]' + 500 WHERE nombre ='$nombre'";
	$resp =$mysqli->query($sqlPa);


	header("Location:../Vista/preguntas.php?nombre=$nombre");
}else{
	  echo "<script>
                alert('Completo el reto');
                window.location= '../index.php'
    </script>";
}





}else{
      
       echo "<script>
                alert('Vuelva Intentarlo');
                window.location= '../index.php'
    </script>";
  
    
	
}


 ?>