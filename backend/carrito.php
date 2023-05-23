
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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['sedes'])) {
      $sedeSeleccionada = $_POST['sedes']; // Obtener la sede seleccionada del formulario

      // Aquí puedes realizar las operaciones necesarias para guardar la sede en la tabla "sedes"
      // Por ejemplo, construir y ejecutar una consulta de inserción

      $consulta = "INSERT INTO sedes (usuario, sede) VALUES ('$idUser', '$sedeSeleccionada')";
      $resultado = mysqli_query($conexion, $consulta);

      if ($resultado) {
          $mensaje = "Sede agregada al carrito exitosamente";
      } else {
          $mensaje = "Error al agregar la sede al carrito";
      }
  }
}
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
                <a class="nav-link me-3" href="#">CARRITO</a>
              </li>
              <li class="nav-item">
                <div class="dropdown">
                  <button type="button" class="dropdown-toggle btn" data-bs-toggle="dropdown">
                  <?php echo utf8_decode($nombre.' '.$apellido); ?>   </button>
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

    <div>
        <h1 class="superior">CARRITO</h1>
    </div>

    <section class="left">

    <table class="tabla">
        <thead>
            <tr>
                <th>N°</th>
                <th>Usuario</th>
                <th>Sede</th>
                <th>Zona</th>
                <th>Máquina</th>
                <th>Turno</th>
                <th>Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
    $sedeSeleccionada = $_SESSION['sedeSeleccionada']; // Obtener la sede seleccionada de la variable de sesión

    // Aquí puedes realizar las operaciones necesarias para obtener los datos de la sede, la zona, la máquina, el turno, la hora, etc.
    // Puedes construir y ejecutar una consulta SQL para obtener los datos correspondientes a la sede seleccionada

    // Ejemplo de consulta SQL
    $conexion = mysqli_connect('localhost', 'root', '', 'smart_fit');
    $consulta = "SELECT * FROM carrito WHERE id = '$sedeSeleccionada'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $numero = 1; // Variable para enumerar las filas
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $id = $fila['id'];
            $usuario = $fila['usuario'];
            $zona = $fila['zona'];
            $maquina = $fila['maquina'];
            $turno = $fila['turno'];
            $hora = $fila['hora'];
            ?>
                   <tr>
                <td><?php echo $numero; ?></td>
                <td> <?php echo utf8_decode($nombre); ?>  </td>
                <td><?php echo ($sedeSeleccionada); ?></td>
                <td><?php echo $zona; ?></td>
                <td><?php echo $maquina; ?></td>
                <td><?php echo $turno; ?></td>
                <td><?php echo $hora; ?></td>
                <td>Acciones</td>
            </tr>
            <?php
            $numero++;
        }
    } else {
        // Si no hay resultados, puedes mostrar una fila con un mensaje indicando que no se encontraron datos
        ?>
        <tr>
            <td colspan="8">No se encontraron datos</td>
        </tr>
        <?php
    }
    ?>
            <tr>
                <td> N° </td>
                <td> usuario</td>
                <td> sede</td>
                <td> zona</td>
                <td> maquina</td>
                <td> turno</td>
                <td> hora</td>
                </tr>

    
       
           
        </tbody>
    </table>


    
    

    </section>


        <section class="img-derecha">
        <div class="card-img" style="width: 18rem;">
        <img src="/backend/imagenes/img-carrito/imgcarrito.png" class="card-img-top" alt="...">
 
</div>
       
 
        </div>
        
        </section>



        <div class="footer">
            <h3>¡Saca tu <span>mejor forma!</span></h3>
          </div>
    <script src=""></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>