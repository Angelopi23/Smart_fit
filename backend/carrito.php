<?php

session_start();
require("../backend/login/database.php");

$id = $_SESSION['id'];

$consulta = "SELECT c.sedes,c.maquina,c.horarios,c.zona,c.turno,c.fecha,u.nombres FROM carrito as c
INNER JOIN usuario as u
ON c.usuario = u.id
WHERE u.id =".$id;

$resultado=mysqli_query($conexion,$consulta);

if($resultado){
    $array_res = array();
   
    while($row = $resultado->fetch_array()){
        $array_res[] =($row);            
    }

   
}

// if (!isset($_SESSION['email'])) {
//   header("location:../login/login.php");
// }

// $idUser = $_SESSION['email'];
// $nombre = $_SESSION['nombres'];
// $apellido = $_SESSION['apellidos'];

// $mostrar = "SELECT*FROM usuario
//  WHERE email = '$idUser' ";
// $result = $conexion->query($mostrar);

// $row = $result->fetch_assoc();


/*
if (isset($_POST['sedes'])) {
  $sedeSeleccionada = $_POST['sedes'];
  // Aquí puedes realizar las operaciones necesarias para guardar la sede en la tabla "carrito"
  // Por ejemplo, construir y ejecutar una consulta de inserción
  $consulta = "INSERT INTO carrito (sedes) VALUES ('$sedeSeleccionada')";
  // Ejecutar la consulta
  if (mysqli_query($conexion, $consulta)) {
      echo "Sede agregada al carrito exitosamente";
  } else {
      echo "Error al agregar la sede al carrito: " . mysqli_error($conexion);
  }
} else {
  echo "Error: No se ha seleccionado ninguna sede";
}*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>carrito</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="/logoFAVICON/smart.png" type="image/x-icon">
  <link rel="stylesheet" href="/backend/css/estilo.carrito.css">

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body class="bg-black text-white">


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
            <a class="nav-link me-3" href="#">CARRITO</a>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <button type="button" class="dropdown-toggle btn" data-bs-toggle="dropdown">
                <?php echo $_SESSION['nombres'].' '.$_SESSION['apellidos'] ?> </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li>
                  <hr class="dropdown-divider">
                  </hr>
                </li>
                <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--NAVBAR-->

  <main class="container">
    <div class="py-5">
      <h2 class="fw-bolder">CARRITO</h2>
    </div>
    <div class="row justify-content-center">
      <div class="col-8">
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Sede</th>
              <th scope="col">Maquina</th>
              <th scope="col">Horarios</th>
              <th scope="col">Zona</th>
              <th scope="col">Turno</th>
              <th scope="col">Fecha</th>
              <th scope="col">Usuario</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($array_res as $fila) {;
            ?>
              <tr>
                <th scope="row">1</th>
                <td><?php echo $fila[0]; ?></td>
                <td><?php echo $fila[1]; ?></td>
                <td><?php echo $fila[2]; ?></td>
                <td><?php echo $fila[3]; ?></td>
                <td><?php echo $fila[4]; ?></td>
                <td><?php echo $fila[5]; ?></td>
                <td><?php echo $fila[6]; ?></td>

                
              </tr>
            <?php
            }
            ?>

          </tbody>
        </table>
      </div>
      <div class="col-4">
        <img src="/backend/imagenes/img-carrito/imgcarrito.png" alt="" class="img-fluid">
      </div>
    </div>
    <div class="col text-center">
      <input class="btn btn-warning fw-bolder fs-6 px-5 mb-5" type="submit" name="imprimir" value="Imprimir">
    </div>
  </main>

  <div class="footer">
    <h3>¡Saca tu <span>mejor forma!</span></h3>
  </div>
  
  <script src=""></script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>