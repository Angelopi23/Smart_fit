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

$querySede = "SELECT id, sede FROM sedes ORDER BY sede ASC";
$resultSede = $conexion->query($querySede);

$queryfechas= "SELECT id, fecha FROM fechas ORDER BY fecha ASC";
$resultfechas = $conexion->query($queryfechas);

if(isset($_POST['carrito_btn'])) {
  // Obtener los valores seleccionados
  $sede = $_POST['sede'];
  $zona = $_POST['zona'];
  $maq = $_POST['maq'];
  $dia = $_POST['dia'];
  $turno= $_POST['turno'];
  $hora = $_POST['hora'];
  
  // Insertar los valores en la tabla "carrito"
  $insertar = "INSERT INTO carrito (sede, zona, maq, dia, turno, hora) VALUES ('$sede', '$zona', '$maq', '$dia', '$turno','$hora')";
  $resultado = $conexion->query($insertar);
  
  if($resultado) {
    // La inserción se realizó correctamente, puedes redirigir al usuario o mostrar un mensaje de éxito
    echo "Producto añadido al carrito exitosamente";
  } else {
    // Ocurrió un error durante la inserción, puedes mostrar un mensaje de error o realizar alguna acción adicional
    echo "Error al añadir el producto al carrito";
  }
}
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
                  <?php echo utf8_decode($nombre.' '.$apellido); ?>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                    <li><hr class="dropdown-divider"></hr></li>
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
        <form  method="POST" action="carrito.php">
        
        <div class="row pt-3 pb-3">
          <h3>Reserva <span>por:</span></h3>
        </div>
  
        <div class="row">
          <div class="col-sm-6 col-lg-3">
           
              <div class="selectbox col">
                <div class="select " id="select">
                  <div class="contenido-select" id="contselect">
                    <h1 class="titulo">Por sede</h1>
                    <p class="descripcion">Elige tu sede</p>
                  </div>
                  <i class="fas fa-angle-down"></i>
                </div>
  
  

                <div class="opciones" id="opciones">
                  <?php while($rowSede = $resultSede->fetch_assoc()) {?>
                    <a href="#" class="opcion">
                      <div class="contenido-opcion">
                        <div class="textos">
                          <p class="descripcion" style="text-decoration: solid;"><?php echo $rowSede['sede'];?></p>
                        </div>
                      </div>
                    </a>
                  <?php } ?>
                </div>


              </div>
        
              <input type="hidden" name="sede" id="inputSelect" value="">
        
          </div>
  
  
                      <!--SELECCION DE ZONA-->

<div class="col-sm-6 col-lg-3">
  
    <div class="selectboxzona col">
      <div class="selectzona" id="selectzona">
        <div class="contenido-selectzona" id="contselectzona">
          <h1 class="titulozona">Por zona</h1>
          <p class="descripcionzona">Elige tu zona</p>
        </div>
        <i class="fas fa-angle-down"></i>
      </div>

      <div class="opcioneszona" id="opcioneszona">
        <?php
       
// conexión a la base de datos
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'smart_fit';

$conexion = mysqli_connect($server, $username, $password, $database);

// consulta para obtener los datos de la tabla "zona_entrenamiento"
$consulta = "SELECT * FROM zona_entrenamiento";
$ejecutarConsulta = mysqli_query($conexion, $consulta);

        // generar opciones para el menú desplegable
        while ($fila = mysqli_fetch_array($ejecutarConsulta)) {
          echo '<a href="#" class="opcionzona" onclick="cargarMaquinas(' . $fila['id'] . ')">';
          echo '<div class="contenido-opcionzona">';
          echo '<div class="textoszona">';
          echo '<p class="descripcionzona">' . $fila['entrenamiento'] . '</p>';
          echo '</div>';
          echo '</div>';
          echo '</a>';
        }
        ?>
      </div>
    </div>

    <input type="hidden" name="zona" id="inputSelectzona" value="">
  
</div>
  
  
                    <!--SELECCION DE MAQUINA-->
                    
  
   <div class="col-sm-6 col-lg-3" >
  
  <div class="selectboxmaq col">
                <div class="selectmaq " id="selectmaq">
                  <div class="contenido-selectmaq" id="contselectmaq">
                    <h1 class="titulomaq">Por máquina</h1>
                    <p class="descripcionmaq">Elige tu máquina</p>
                  </div>
                  <i class="fas fa-angle-down"></i>
                </div>

      <div class="opcionesmaq" id="opcionesmaq">
        <!-- Aquí se cargarán dinámicamente las opciones de máquina -->
      </div>
    </div>
    <input type="hidden" name="maq" id="inputSelectmaq" value="">

</div>
  
  
  
  
  
  
                      <!--SELECCION DE FECHAS -->
  
          <div class="col-sm-6 col-lg-3">
           
              <div class="selectboxdia col">
                <div class="selectdia " id="selectdia">
                  <div class="contenido-selectdia" id="contselectdia">
                    <h1 class="titulodia">Por fecha</h1>
                    <p class="descripciondia">Elige un día</p>
                  </div>
                  <i class="fas fa-angle-down"></i>
                </div>
  
  
                <div class="opcionesdia" id="opcionesdia">
                <?php while($rowfechas = $resultfechas->fetch_assoc()) {?>
                  <a href="#" class="opciondia">
                    <div class="contenido-opciondia">
                      <div class="textosdia">
                        <p class="descripciondia" style="text-decoration: solid;"><?php echo $rowfechas['fecha'];?></p>
                      </div>
                    </div>
                  </a>
                  <?php } ?>
                </div>
        
              </div>
        
              <input type="hidden" name="dia" id="inputSelectdia" value="">
          
          </div>
  



               <!--SELECCION DE TURNOS-->

            <div class="col-sm-6 col-lg-3">
             
                <div class="selectboxturnos col">
                  <div class="selectturnos" id="selectturnos">
                    <div class="contenido-selectturnos" id="contselectturnos">
                      <h1 class="tituloturnos">Por Turno</h1>
                      <p class="descripcionturnos">Elige tu turno</p>
                    </div>
                    <i class="fas fa-angle-down"></i>
                  </div>

                  <div class="opcionesturnos" id="opcionesturnos">
                    <?php
                   
            // conexión a la base de datos
            $server = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'smart_fit';

            $conexion = mysqli_connect($server, $username, $password, $database);

            // consulta para obtener los datos de la tabla "zona_entrenamiento"
            $consulta = "SELECT * FROM turnos";
            $ejecutarConsulta = mysqli_query($conexion, $consulta);

                    // generar opciones para el menú desplegable
                    while ($fila = mysqli_fetch_array($ejecutarConsulta)) {
                      echo '<a href="#" class="opcionturnos" onclick="cargarHorarios(' . $fila['id'] . ')">';
                      echo '<div class="contenido-opcionturnos">';
                      echo '<div class="textosturnos">';
                      echo '<p class="descripcionturnos">' . $fila['turno'] . '</p>';
                      echo '</div>';
                      echo '</div>';
                      echo '</a>';
                    }
                    ?>
                  </div>
                </div>

                <input type="hidden" name="turnos" id="inputSelectturnos" value="">
           
            </div>
 

             <!--SELECCION DE HORARIOS-->
                    
  
   <div class="col-sm-6 col-lg-3" >
 
  <div class="selectboxhora col">
                <div class="selecthora " id="selecthora">
                  <div class="contenido-selecthora" id="contselecthora">
                    <h1 class="titulohora">Por horarios</h1>
                    <p class="descripcionhora">Elige tu horario</p>
                  </div>
                  <i class="fas fa-angle-down"></i>
                </div>

      <div class="opcioneshora" id="opcioneshora">
        <!-- Aquí se cargarán dinámicamente las opciones de horas -->
      </div>
    </div>
    <input type="hidden" name="hora" id="inputSelecthora" value="">

</div>

  
          <div class="col-sm-12 col-lg-3">
            <div class="filtro">
            <button class="btn botonfil pt-4 pb-4" type="submit" name="carrito_btn">AÑADIR AL CARRITO <i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
          </div>
  
  
      
        </div>

      


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

          </form>
      
    </section>
    


    <script src="/backend/JS/seleccion.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>