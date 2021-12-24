                <?php 
                require ('../Controlador/conexion.php');
                $nombre = $_GET['nombre'];
             


                $sqlJugador ="SELECT * FROM `jugadores` where nombre = '$nombre'";
                $jugadores =$mysqli->query($sqlJugador);
                $jugador = $jugadores->fetch_array(MYSQLI_ASSOC);
                $category =  $jugador['categoria'];

                $sql = "select * from preguntas where id_categoria = '$category'";
                $resultado=$mysqli->query($sql);

                $numero_aleatorio = rand(0,4);
                $dir = array();
                $cont = 0;
                while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
                 $dir[$cont] = $row['pregunta'];
                 $cont++;
             }



             ?>


             <!DOCTYPE html>
             <html lang="en">
             <head>
               <meta charset="utf-8">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <meta name="viewport" content="width=device-width, initial-scale=1">
               <title>Sofka U</title>
               <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
               <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
               <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
               <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
               <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
           </head>
           <body>
            <style >
                *{
                    transition: all 0.3s ;
                }
                body{
                    background: white;
                    padding: 0;
                    margin:  0;
                    text-align: center;
                    font-size: 240%;
                    border: 2px solid black;
                    margin-top: 80px;
                    height: auto;


                }
                .contenedor{

                    height: auto;
                    display: inline-flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    width: 80%;

                }
                .encabezado{
                    background: white;
                    min-width: 100%;
                    width: 100%;
                    padding: 10px;
                    border: 3px solid red;
                }
                .categoria{

                    text-align: left;
                }
                .pregunta{
                    padding: 10px;
                }
                .imagen{
                    object-fit: cover;
                    height: 200px;
                    width: 100%;

                }
                .btn{
                    background: white;
                    width:60%;
                    padding: 10px;
                    margin: 5px;
                    font-size: 80%;
                }
                .derecho{
                    text-align: center;
                }
                .container {
                  display: flex; /* or inline-flex */
                  width: 100%;
              }

          </style>
 <form  method="post" action="../Controlador/validar.php"  >
          <div class="contenedor">                        
            <div class="encabezado">
                <div class="row container">
                    <div class="col-md-4">
                        <div class="categoria">
                              <input type="text"name="nombre" id="nombre" value="<?php echo $nombre; ?>" readonly>

                        </div></div>
                        <div class="col-md-4">
                            <div class="derecho">
                                <label > Puntaje partida: <?php echo $jugador['puntajePartida']; ?></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label > Puntaje General: <?php echo $jugador['puntaje'];?></label>
                        </div>
                        <br>
                        <div class="pregunta">
                            <label><?php echo $dir[$numero_aleatorio];
                            $sqlRespuesta ="SELECT * FROM `preguntas` as p INNER JOIN respuestas as r on p.id_preguntas = r.id_pregunta where pregunta = '$dir[$numero_aleatorio]'";
                            $respuetas =$mysqli->query($sqlRespuesta); ?>
                        </label>
                    </div>
                </div>
            </div> 


         
           

           
                <br>
                <div class="text-center col-md-8">

                    <div >  <label for="exampleFormControlSelect1">Seleccione la respuesta correcta</label>   <select class="form-control" id="respuesta" name="respuesta"><?php  while($rows = $respuetas->fetch_array(MYSQLI_ASSOC)) { ?>


                        <option value="<?php echo $rows['respuesta'];?>">

                            <?php echo $rows['respuesta'];?></option>
                        <?php } ?>  
                    </select>

                </div>
                <br>
                <div  class="col-sd-20">
                    <button type="submit" class="btn btn-warning">Comprobar</button>
                </div>

            </form>




            <br><br>
            <div class="row container">      

             <div class="col-sd-10">
                 <button  onclick="location.href='../Controlador/retirarse.php'" class="btn btn-warning">Retirar</button>
             </div>
         </div>

     </body>
     </html>