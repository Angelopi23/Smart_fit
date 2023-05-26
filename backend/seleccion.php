<?php

session_start();
require("../backend/login/database.php");

if (!isset($_SESSION['email'])) {
  header("location:../login/login.php");
}

$idUser = $_SESSION['email'];
$nombre = $_SESSION['nombres'];
$apellido = $_SESSION['apellidos'];

$mostrar = "SELECT*FROM usuario
 WHERE email = '$idUser' ";
$result = $conexion->query($mostrar);

$row = $result->fetch_assoc();
/*
$querySede = "SELECT id, sede FROM sedes ORDER BY sede ASC";
$resultSede = $conexion->query($querySede);

$queryfechas= "SELECT id, fecha FROM fechas ORDER BY fecha ASC";
$resultfechas = $conexion->query($queryfechas);


$link=mysqli_connect("localhost","root", "");
if($link){

   mysqli_select_db($link,"smart_fit");
   mysqli_query($link,"SET NAMES 'utf8'");
} */

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="/logoFAVICON/smart.png" type="image/x-icon">
  <link rel="stylesheet" href="/backend/css/estilo-seleccion.css">

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
                <?php echo utf8_decode($nombre . ' ' . $apellido); ?>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li>
                  <hr class="dropdown-divider">
                  </hr>
                </li>
                <li><a class="dropdown-item" href="/backend/login/login.php">Cerrar Sesión</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--NAVBAR-->

  <!-- Portada -->
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="/backend/imagenes/imgreserva/fondogym2.png" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="align-middle">Reserva tus maquinas y disfruta de la mejor experiencia</h5>
        </div>
      </div>
    </div>
  </div>
  <!-- Portada -->


  <!--MENUS DESPLEGABLES -->


  <section class="seccion container-md">
    <form action="../backend/controllers/guardarCarrito.php" method="POST">

      <div class="row pt-3 pb-3">
        <h3>Reserva <span>por:</span></h3>
      </div>
      <div class="row">
        <!--SELECCION DE SEDES-->
        <div class="col-sm-6 col-lg-3">
          <div class="selectbox col">
            <select name="sede" class="select" id="select">
              <option value="">Por sede</option>
              <?php foreach ($_SESSION['sede'] as $sede) { ?>
                <option value="<?php echo $sede; ?>"><?php echo $sede; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <!--SELECCION DE ZONAS-->
        <div class="col-sm-6 col-lg-3">
          <div class="selectboxzona col">
            <select name="zona" class="selectzona" id="selectzona">
              <option value="">Por zona</option>
              <?php foreach ($_SESSION['zonas'] as $zonas) { ?>
                <option value="<?php echo $zonas; ?>"><?php echo $zonas; ?></option>
              <?php } ?>


            </select>
          </div>
        </div>
        <!--SELECCION DE MAQUINAS-->
        <div class="col-sm-6 col-lg-3">
          <div class="selectboxmaq col">
            <select name="maq" class="selectmaq" id="selectmaq">
              <option value="">Por máquina</option>
              <?php foreach ($_SESSION['maquinas'] as $maquina) { ?>
                <option value="<?php echo $maquina; ?>"><?php echo $maquina; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <!--SELECCION DE FECHAS-->
        <div class="col-sm-6 col-lg-3">
          <div class="selectboxdia col">
            <select name="dia" class="selectdia" id="selectdia">
              <option value="">Por fecha</option>
              <?php foreach ($_SESSION['fecha'] as $fecha) { ?>
                <option value="<?php echo $fecha; ?>"><?php echo $fecha; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <!--SELECCION DE TURNOS-->
        <div class="col-sm-6 col-lg-3">
          <div class="selectboxturnos col">
            <select name="turno" class="selectturnos" id="selectturnos">
              <option value="">Por turno</option>
              <?php foreach ($_SESSION['turno'] as $turno) { ?>
                <option value="<?php echo $turno; ?>"><?php echo $turno; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>


        <!--SELECCION DE HORARIOS-->


        <div class="col-sm-6 col-lg-3">
          <div class="selectboxhora col">
            <select name="hora" class="selecthora" id="selecthora">
              <option value="">Por horario</option>
              <?php foreach ($_SESSION['horarios'] as $horarios) { ?>
                <option value="<?php echo $horarios; ?>"><?php echo $horarios; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>


        <div class="col-sm-12 col-lg-3">
          <div class="filtro">
            <input type="submit" class="btn botonfil pt-4 pb-4" name="guardar_carrito" value="Guardar Carrito"><i class="fa-solid fa-magnifying-glass"></i>
          </div>
        </div>
      </div>
    </form>



<<<<<<< HEAD
    <div class="row mt-4">
      <div class="col-lg-6">
        <img class="w-100 mb-3" src="imagenes/imgreserva/primera-1.png" alt="" srcset="">
        <img class="w-100 mb-3" src="imagenes/imgreserva/primera-2.png" alt="" srcset="">
        <img class="w-100 mb-3" src="imagenes/imgreserva/primera3.png" alt="" srcset="">
      </div>
      <div class="col-lg-6">
        <img class="w-100 mb-3" src="imagenes/imgreserva/segunda-1.png" alt="" srcset="">
        <img class="w-100 mb-3" src="imagenes/imgreserva/segunda2.png" alt="" srcset="">
        <div class="row">
          <div class="col-6">
            <img class="w-100" style="height: 86.8%;" src="imagenes/imgreserva/segunda-3-1.png" alt="" srcset="">
          </div>
          <div class="col-6">
            <img class="w-100 " style="height: 86.8%;" src="imagenes/imgreserva/segunda-3-2.png" alt="" srcset="">
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-5 text-center">
      <h3>¡Saca tu <span>mejor forma!</span></h3>
    </div>



  </section>
=======

    <section class="seccion container-md">
    <form action="../backend/controllers/guardarCarrito.php" method="POST">

<div class="row pt-3 pb-3">
  <h3>Reserva <span>por:</span></h3>
</div>
<div class="row">
   <!--SELECCION DE SEDES-->
  <div class="col-sm-6 col-lg-3">
    <div class="selectbox col">
      <select name="sede" class="select" id="select">
        <option value="">Por sede</option>
        <?php foreach ($_SESSION['sede'] as $sede) { ?>
          <option value="<?php echo $sede; ?>"><?php echo $sede; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
   <!--SELECCION DE ZONAS-->
  <div class="col-sm-6 col-lg-3">
    <div class="selectboxzona col">
      <select name="zona" class="selectzona" id="selectzona">
        <option value="">Por zona</option>
        <?php foreach ($_SESSION['zonas'] as $zonas) { ?>
          <option value="<?php echo $zonas; ?>"><?php echo $zonas; ?></option>
        <?php } ?>

       
      </select>
    </div>
  </div>
   <!--SELECCION DE MAQUINAS-->
  <div class="col-sm-6 col-lg-3">
    <div class="selectboxmaq col">
      <select name="maq" class="selectmaq" id="selectmaq">
        <option value="">Por máquina</option>
        <?php foreach ($_SESSION['maquinas'] as $maquina) { ?>
          <option value="<?php echo $maquina; ?>"><?php echo $maquina; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
   <!--SELECCION DE FECHAS-->
  <div class="col-sm-6 col-lg-3">
    <div class="selectboxdia col">
      <select name="dia" class="selectdia" id="selectdia">
        <option value="">Por fecha</option>
        <?php foreach ($_SESSION['fecha'] as $fecha) { ?>
          <option value="<?php echo $fecha; ?>"><?php echo $fecha; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>

   <!--SELECCION DE TURNOS-->
  <div class="col-sm-6 col-lg-3">
        <div class="selectboxturnos col">
          <select name="turnos" class="selectturnos" id="selectturnos">
            <option value="">Por turno</option>
            <?php foreach ($_SESSION['turno'] as $turno) { ?>
              <option value="<?php echo $turno; ?>"><?php echo $turno; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>

 
             <!--SELECCION DE HORARIOS-->
                    
  
             <div class="col-sm-6 col-lg-3">
        <div class="selectboxhora col">
          <select name="hora" class="selecthora" id="selecthora">
            <option value="">Por horario</option>
            <?php foreach ($_SESSION['horarios'] as $horarios) { ?>
              <option value="<?php echo $horarios; ?>"><?php echo $horarios; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>

  
          <div class="col-sm-12 col-lg-3">
            <div class="filtro">
            <input type="submit" class="btn botonfil pt-4 pb-4" name="guardar_carrito" value="Guardar Carrito"><i class="fa-solid fa-magnifying-glass"></i>
            </div>
          </div>
        </div>
        </form>
      
>>>>>>> 85c6d681aac5cfca41bb126c42c31e4a6c58ae5d



<<<<<<< HEAD
  <script src="/backend/JS/seleccion.js"></script>
=======
       
      
    </section>
    
>>>>>>> 85c6d681aac5cfca41bb126c42c31e4a6c58ae5d

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>