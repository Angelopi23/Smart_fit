
<?php

session_start();
require("../backend/login/database.php");


if(!isset($_SESSION['email'])){
header("location:../login/login.php");

}
    
$idUser=$_SESSION['email'];
$nombre = $_SESSION['nombres'];
$apellido = $_SESSION['apellidos'];

$mostrar="SELECT*FROM usuario
 WHERE email = '$idUser' " ;
$result=$conexion->query($mostrar);

$row=$result->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/logoFAVICON/smart.png" type="image/x-icon">
    <link rel="stylesheet" href="/backend/css/zona-funcional.css">
    <title>Zona Funcional</title>
</head>
<body>
    
   
    <header>
        <div class="enlaces">
            <div class="menu container">
        
            <a  class="smart">SMART </a>
            <img id="logo2" src="/backend/css/logo2.png" alt="">
    
            <a  class="fit"> FIT</a>
            <input type="checkbox" id="menu"/>
            <label for="menu">
               <img src="/backend/css/menu-icono.png" class="menu-icono" alt=""> 
            </label>
    
            <nav class="menuarriba">
            <ul>
                <li><a class="sede" href="/backend/sedes.php">SEDES</a></li>
                <li><a class="zona" href="/backend/zonasentrenamiento.php">ZONAS DE ENTRENAMIENTO</a></li>
                <li><a class="reservar" href="/backend/seleccion.php">RESERVAR</a></li>
                <li><a class="carrito" href="/backend/carrito.php">CARRITO</a></li>
              <li><a class="empieza" href=""><?php echo utf8_decode($nombre.' '.$apellido); ?></a></li>
            </ul>
        </nav>
        </div>
      </div>
     </header>
    

     <div class="cardio-contenedor">
  
        <div class="cardio1">
        <h2 class="zon-cardio">ZONA <a>FUNCIONAL</a></h2>
        <h2>Esta zona cuenta con una serie de equipos que puedes utilizar para ejercitarte y preparate para loq eu puedas surgir fuera del gimnasio.</h2>
      
        <h2 class="maquina-cardio">MAQUINAS <a> FUNCIONALES</a></h2>
        </div>
      
        <div class="cardio2">
        <img src="/backend/imagenes/zonas-funcional/maquina_funcional.png" alt="">
        </div>
        </div>

        <div class="palabra">
            <h2><a>Buscar</a> por:</h2> 
            </div>
          <div class="buscar-contenedor">
            
          <input type="search" class="buscador1" id="buscador" placeholder="Ingresa tu maquina funcional">
         
          <button id="btn" class="btn"><img src="/backend/imagenes/imgsedes/lupa.png" alt=""></button>
          </div>


          <div class="img-contenedor">
            <div class="item" onclick="redirigirFUNCIONAL('RACK')"><h2 class="uno">RACK FUNCIONAL</h2><br> <img src="/backend/imagenes/zonas-funcional/RACK_FUNCIONAL(2).jpg" alt=""></div>
            <div class="item" onclick="redirigirFUNCIONAL('BOLSAS')"><h2>BOLSAS DE SALM</h2><img src="/backend/imagenes/zonas-funcional/bolsas_de_salm.png" alt=""></div>
            <div class="item" onclick="redirigirFUNCIONAL('BARRAS')"><h2>BARRAS OLIMPICAS</h2><img src="/backend/imagenes/zonas-funcional/barra_olimpica.png" alt=""></div>
            <div class="item" onclick="redirigirFUNCIONAL('KETTBELLS')"><h2>KETTLEBELLS</h2><img src="/backend/imagenes/zonas-funcional/kettlebells.png" alt=""></div>
            
          </div>

          <div class="img-contenedor2">
          <div class="item5"><h2>PLACAS DE PARACHOQUES</h2><img src="/backend/imagenes/zonas-funcional/placa_de_parachoque.png" alt=""></div>
          </div>
          

          <footer class="ultimo">

            <h2><a> ¡Saca tu </a> mejor forma!</h2>
        
        </footer>
        <script>
        function redirigirFUNCIONAL(maquinas) {
  
  window.location.href = '/backend/seleccion.php?maquinas=' + maquinas;
}
</script>
</body>
</html>