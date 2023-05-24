
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
    <title>Smart fit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/logoFAVICON/smart.png" type="image/x-icon">
    <link rel="stylesheet" href="/backend/css/estilos-principal.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>
<body>

    <!--NAVBAR-->
    <nav class="navbar navbar-expand-xl fixed-top" id="navbar">
        <div class="container">
          <a class="navbar-brand" href="#" id="logo">SMART <img src="/backend/css/logo2.png"><span>FIT</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span><i class="fa-solid fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="/backend/sedes.php">SEDES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/backend/zonasentrenamiento.php">ZONAS DE ENTRENAMIENTO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/backend/login/login.php">RESERVAR</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-3" href="/backend/carrito.php">CARRITO</a>
              </li>
              <li class="nav-item">
                <div class="dropdown">
                  <button type="button" class="dropdown-toggle btn" data-bs-toggle="dropdown">
                  <?php echo utf8_decode($nombre.' '.$apellido); ?>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                    <li><hr class="dropdown-divider"></hr></li>
                    <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <!--NAVBAR-->


<div class="img-principal">

    <div class="portada">
    <h1>BIENVENIDO <a class="a">A</a> </h1> <br>
    <h1>SMART <a class="fit"> FIT </a></h1>
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
        <li><a class="funcional" href="/backend/zona-funcional.php">Funcional</a></li>
        <li><a class="pesolibre" href="">Peso libre</a></li>
        <li><a class="fuerza" href="/backend/zona-fuerza.php">Fuerza</a></li>
        <li><a class="estiramiento" href="">Estiramiento</a></li>
    </ul>
</div>
</div>

</div>
   


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>