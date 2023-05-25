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
    <link rel="stylesheet" href="/backend/css/zona-fuerza.css">
    <title>Zona Fuerza</title>
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
            <h2 class="zon-cardio">ZONA DE <a> FUERZA</a></h2>
            <h2>Esta zona puedes entrenar todos los grupos musculares con las diferentes maquinas de la zona de fuerza.</h2> <br>
            <H2> Cada una de ellas funciona de distinas formas pero los objetivos son similares.</H2>
          
            <h2 class="maquina-cardio">MAQUINAS DE<a> FUERZA</a></h2>
        </div>   
        <div class="cardio2">
        <img src="/backend/imagenes/zonas-fuerza/maquina_fuerza.png" alt="">
        </div>
        </div>

        <div class="palabra">
            <h2><a>Buscar</a> por:</h2> 
            </div>
          <div class="buscar-contenedor">
            
          <input type="search" class="buscador1" id="buscador" placeholder="Ingresa tu maquina de fuerza">
         
          <button id="btn" class="btn"><img src="/backend/imagenes/imgsedes/lupa.png" alt=""></button>
        </div>

        <div class="img-contenedor">
            <div class="item" onclick="redirigirFUERZA('HACK')"><h2 class="uno">HACK SQUAT</h2><br> <img src="/backend/imagenes/zonas-fuerza/HACK__SQUAT.png" alt=""></div>
            <div class="item" onclick="redirigirFUERZA('EMPUJE')"><h2>EMPUJE DE CADERA</h2><img src="/backend/imagenes/zonas-fuerza/EMPUJE_DE_CADEA.png" alt=""></div>
            <div class="item" onclick="redirigirFUERZA('JERSEY')"><h2>JERSEY</h2><img src="/backend/imagenes/zonas-fuerza/JERSEY.png" alt=""></div>
            <div class="item" onclick="redirigirFUERZA('PRES_BANCA')"><h2>PRES DE BANCA</h2><img src="/backend/imagenes/zonas-fuerza/PRES_DE_BANCA.png" alt=""></div>
            <div class="item" onclick="redirigirFUERZA('PRENSA')"><h2>PRENSA</h2><img src="/backend/imagenes/zonas-fuerza/PRENSA.png" alt=""></div>
            <div class="item" onclick="redirigirFUERZA('REMO')"><h2>REMO CON BARRA</h2><img src="/backend/imagenes/zonas-fuerza/REMO_CON_BARRA.png" alt=""></div>
          </div>


        <footer class="ultimo">

            <h2><a> ¡Saca tu </a> mejor forma!</h2>
        
        </footer>
        
        <script>
function redirigirFUERZA(maquinas) {
  
  window.location.href = '/backend/seleccion.php?maquinas=' + maquinas;
}
</script>
</body>
</html>