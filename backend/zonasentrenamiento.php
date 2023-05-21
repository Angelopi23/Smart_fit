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
    <link rel="stylesheet" href="/backend/css/zona-entrenamiento.css">
    <title>Zonas de entrenamiento</title>
</head>
<body>
    

   
<header>
    <div class="enlaces">
        <div class="menu container">
    
        <a  class="smart">SMART </a>
        <img id="logo2" src="css/logo2.png" alt="">

        <a  class="fit"> FIT</a>
        <input type="checkbox" id="menu"/>
        <label for="menu">
           <img src="css/menu-icono.png" class="menu-icono" alt=""> 
        </label>

        <nav class="menuarriba">
        <ul>
            <li><a class="sede" href="/backend/sedes.php">SEDES</a></li>
            <li><a class="zona" href="">ZONAS DE ENTRENAMIENTO</a></li>
            <li><a class="reservar" href="">RESERVAR</a></li>
            <li><a class="carrito" href="">CARRITO</a></li>
          <li><a class="empieza" href=""><?php echo utf8_decode($nombre.' '.$apellido); ?></a></li>
        </ul>
    </nav>
    </div>
  </div>
 </header>


 <div class="palabra">
   <h2><a>Buscar</a> por:</h2> 
   </div>
 <div class="buscar-contenedor">
   
 <input type="search" class="buscador1" id="buscador" placeholder="Ingresa tu zona de entrenamiento">

 <button id="btn" class="btn"><img src="/imagenes/imgsedes/lupa.png" alt=""></button>
 </div>


 <div class="palabra2">
   <h2>Zonas de <a>entrenamiento</a></h2> 
   </div>


   <div class="img-contenedor">

    <div class="item"><img src="/imagenes/zonas-entrenamiento/cardio.png" alt=""></div>
    <div class="item"><img src="/imagenes/zonas-entrenamiento/funcional.png" alt=""></div>
    <div class="item"><img src="/imagenes/zonas-entrenamiento/fuerza.jpg" alt=""></div>

   </div>


<footer class="ultimo">

    <h2><a> ¡Saca tu </a> mejor forma!</h2>

</footer>

</body>
</html>