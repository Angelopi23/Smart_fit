
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

$querySede = "SELECT id, sede FROM sedes ORDER BY sede ASC";
$resultSede = $conexion->query($querySede);


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
                    <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
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



    <section class="seccion container-md">

        <div class="row pt-3 pb-3 tit-maq text-center">
          <h3 class="fs-2">PRES DE <span>BANCA</span></h3>
        </div>

        <div class="row">
            <div class="text-center">
                <img class="w-50 mb-4" src="imagenes/imgreserva/segunda2.png" alt="" srcset="">
            </div>
        </div>
  
        <div class="row">
          <div class="col-sm-6 col-xl">
            <form action="">
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
            </form>
          </div>
  
  
  
          <div class="col-sm-6 col-xl">
            <form action="">
              <div class="selectboxzona col">
                <div class="selectzona " id="selectzona">
                  <div class="contenido-selectzona" id="contselectzona">
                    <h1 class="titulozona">Por zona</h1>
                    <p class="descripcionzona">Elige tu zona</p>
                  </div>
                  <i class="fas fa-angle-down"></i>
                </div>
  
  
                <div class="opcioneszona" id="opcioneszona">
                  <a href="#" class="opcionzona">
                    <div class="contenido-opcionzona">
                      <div class="textoszona">
                        <p class="descripcionzona">Zona de Fuerza</p>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="opcionzona">
                    <div class="contenido-opcionzona">
                      <div class="textoszona">
                        <p class="descripcionzona">Zona Funcional</p>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="opcionzona">
                    <div class="contenido-opcionzona">
                      <div class="textoszona">
                        <p class="descripcionzona">Zona de cardio</p>
                      </div>
                    </div>
                  </a>
                </div>
        
              </div>
        
              <input type="hidden" name="zona" id="inputSelectzona" value="">
            </form>
          </div>
  
  
  
  
  
          <div class="col-sm-6 col-xl">
            <form action="">
              <div class="selectboxmaq col">
                <div class="selectmaq " id="selectmaq">
                  <div class="contenido-selectmaq" id="contselectmaq">
                    <h1 class="titulomaq">Por máquina</h1>
                    <p class="descripcionmaq">Elige tu máquina</p>
                  </div>
                  <i class="fas fa-angle-down"></i>
                </div>
  
  
                <div class="opcionesmaq" id="opcionesmaq">
                  <a href="#" class="opcionmaq">
                    <div class="contenido-opcionmaq">
                      <div class="textosmaq">
                        <p class="descripcionmaq">Hack Squat</p>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="opcionmaq">
                    <div class="contenido-opcionmaq">
                      <div class="textosmaq">
                        <p class="descripcionmaq">Empuje de Cadera</p>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="opcionmaq">
                    <div class="contenido-opcionmaq">
                      <div class="textosmaq">
                        <p class="descripcionmaq">Jersey</p>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="opcionmaq">
                    <div class="contenido-opcionmaq">
                      <div class="textosmaq">
                        <p class="descripcionmaq">Pres de Banca</p>
                      </div>
                    </div>
                  </a>
                </div>
        
              </div>
        
              <input type="hidden" name="maq" id="inputSelectmaq" value="">
            </form>
          </div>
  
  
  
  
  
  
  
  
          <div class="col-sm-6 col-xl">
            <form action="">
              <div class="selectboxdia col">
                <div class="selectdia " id="selectdia">
                  <div class="contenido-selectdia" id="contselectdia">
                    <h1 class="titulodia">Por fecha</h1>
                    <p class="descripciondia">Elige un día</p>
                  </div>
                  <i class="fas fa-angle-down"></i>
                </div>
  
  
                <div class="opcionesdia" id="opcionesdia">
                  <a href="#" class="opciondia">
                    <div class="contenido-opciondia">
                      <div class="textosdia">
                        <p class="descripciondia">19 de mayo</p>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="opciondia">
                    <div class="contenido-opciondia">
                      <div class="textosdia">
                        <p class="descripciondia">20 de mayo</p>
                      </div>
                    </div>
                  </a>
                </div>
        
              </div>
        
              <input type="hidden" name="dia" id="inputSelectdia" value="">
            </form>
          </div>
  
  
  
  
          <div class="col-sm-12 col-xl-2">
            <div class="filtro">
              <a class="btn botonfil pt-4 pb-4" href="#">Filtrar <i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
          </div>
  
  
      
        </div>


        <div class="row pt-3 pb-2">
            <h3>Reserva <span>la hora:</span></h3>
        </div>




        <div class="row turno">
            <h3 class="fs-4 mb-3">Turno mañana:</h3>
            <div class="btn-group col-6 col-sm-6 col-md-4 col-lg-3 mb-5">
                <button type="button" class="btn bg-white back fs-2" style="font-weight: 800;">7:30 am</button>
                <img src="css/logo2.png" class="w-25">
            </div>
            <div class="btn-group col-6 col-sm-6 col-md-4 col-lg-3 mb-5">
                <button type="button" class="btn bg-white back fs-2" style="font-weight: 800;">11:00 am</button>
                <img src="css/logo2.png" class="w-25">
            </div>
        </div>

        <div class="row turno">
            <h3 class="fs-4 mb-3">Turno tarde:</h3>
            <div class="btn-group col-6 col-sm-6 col-md-4 col-lg-3 mb-5">
                <button type="button" class="btn bg-white back fs-2" style="font-weight: 800;">3:00 pm</button>
                <img src="css/logo2.png" class="w-25">
            </div>
            <div class="btn-group col-6 col-sm-6 col-md-4 col-lg-3 mb-5">
                <button type="button" class="btn bg-white back fs-2" style="font-weight: 800;">5:30 pm</button>
                <img src="css/logo2.png" class="w-25">
            </div>
            <div class="btn-group col-6 col-sm-6 col-md-4 col-lg-3 mb-5">
                <button type="button" class="btn bg-white back fs-2" style="font-weight: 800;">6:00 pm</button>
                <img src="css/logo2.png" class="w-25">
            </div>
            
        </div>

    
          <div class="row mb-5 text-center">
            <h3>¡Saca tu <span>mejor forma!</span></h3>
          </div>



    </section>


    <script src="/backend/JS/seleccion.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>