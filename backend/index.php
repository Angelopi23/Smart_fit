
<?php

/*
include("../backend/data/validar-usuario.php");*/
session_start();
$conexion=mysqli_connect('localhost','root','','smart'); 

if(!isset($_SESSION['email'])){
header("location:../login/login.php");

}
    
$idUser=$_SESSION['email'];
$nombre = $_SESSION['nombres'];
$apellido = $_SESSION['apellidos'];

$mostrar="SELECT*FROM registro
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
    <title>Smart fit</title>
    <link rel="shortcut icon" href="/logoFAVICON/smart.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos-principal.css">
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
            <li><a class="zona" href="/backend/zonasentrenamiento.php">ZONAS DE ENTRENAMIENTO</a></li>
            <li><a class="maquina" href="">MAQUINAS</a></li>
            <li><a class="carrito" href="">CARRITO</a></li>
            <li><a class="empieza" href=""><?php echo utf8_decode($nombre.' '.$apellido); ?></a></li>
        </ul>
    </nav>
    </div>
  </div>
</header>


<div class="img-principal">

    <div class="portada">
    <h1>BIENVENIDO <a>A</a> </h1> <br>
    <h1>SMART <a> FIT </a></h1>
    <br>
    <br>
    </div>
    
    <div class="portada2">
    <h2>RESERVA TUS MAQUINAS  Y DISFRUTA DE LA</h2> 
    <h2>MEJOR EXPERIENCIA</h2> <br>

    <h2 class="p2"><a> ¡Saca tu </a> mejor forma!</h2>
    </div>



<div class="footer"> 

<div class="menuabajo">
    <ul>
        <li><a class="cardio" href="/backend/zona-cardio.php">Cardio</a></li>
        <li><a class="funcional" href="">Funcional</a></li>
        <li><a class="pesolibre" href="">Peso libre</a></li>
        <li><a class="fuerza" href="">Fuerza</a></li>
        <li><a class="estiramiento" href="">Estiramiento</a></li>
    </ul>
</div>
</div>

</div>
   



</body>
</html>