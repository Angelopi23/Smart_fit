<?php

session_start();
$conexion=mysqli_connect('localhost','root','','smart_fit'); 

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
    <link rel="stylesheet" href="/backend/css/zona-cardio.css">
    <title>Zonas Cardio</title>
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
            <li><a class="reservar" href="">RESERVAR</a></li>
            <li><a class="carrito" href="/backend/carrito.php">CARRITO</a></li>
          <li><a class="empieza" href=""><?php echo utf8_decode($nombre.' '.$apellido); ?></a></li>
        </ul>
    </nav>
    </div>
  </div>
 </header>


 <div class="cardio-contenedor">
  
  <div class="cardio1">
  <h2 class="zon-cardio">ZONA DE <a>CARDIO</a></h2>
  <h2>Se dispone una amplia oferta de maquinaria de cardio. Idóneas para mejorar tu condición física y quemar unas cuantas calorías. </h2>
 <h2> Las máquinas que te ofrecen son de Matrix o Technogym y son fáciles de usar. </h2>

  <h2 class="maquina-cardio">MAQUINAS DE <a> CARDIO</a></h2>
  </div>

  <div class="cardio2">
  <img src="/backend/imagenes/zonas-cardio/portada.png" alt="">
  </div>
  </div>





 <div class="palabra">
   <h2><a>Buscar</a> por:</h2> 
   </div>
 <div class="buscar-contenedor">
   
 <input type="search" class="buscador1" id="buscador" placeholder="Ingresa tu maquina de cardio">

 <button id="btn" class="btn"><img src="/backend/imagenes/imgsedes/lupa.png" alt=""></button>
 </div>



   <div class="img-contenedor">

    <div class="item" onclick="redirigirCARDIO('caminadora')"><h2 class="uno">CAMINADORA</h2><img src="/backend/imagenes/zonas-cardio/caminadora.png" alt=""></div>
    <div class="item"onclick="redirigirCARDIO('escalonera')"><h2>ESCALADORA</h2><img src="/backend/imagenes/zonas-cardio/escalonera.png" alt=""></div>
    <div class="item" onclick="redirigirCARDIO('bicicletas')"><h2>BICICLETAS</h2><img src="/backend/imagenes/zonas-cardio/bicicletas.png" alt=""></div>
    <div class="item" onclick="redirigirCARDIO('remadora')"><h2>REMADORAS (MAQUINA DE REMO)</h2><img src="/backend/imagenes/zonas-cardio/remadoras.png" alt=""></div>
   
   </div>
<div class="img-contenedor2">
<div class="item5" onclick="redirigirCARDIO('escalera')"><h2>ESCALERAS INFINITAS</h2><img src="/backend/imagenes/zonas-cardio/escalera.png" alt=""></div>
</div>

<footer class="ultimo">

    <h2><a> ¡Saca tu </a> mejor forma!</h2>

</footer>

<script>
function redirigirCARDIO(maquinas) {
 
  window.location.href = '/backend/seleccion.php?maquinas=' + maquinas;
}
</script>
</body>
</html>