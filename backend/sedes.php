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



if (isset($_POST['sedes'])) {
  $sedeSeleccionada = $_POST['sedes'];
  
  // Aquí puedes realizar las operaciones necesarias para guardar la sede en la tabla carrito
  // Por ejemplo, construir y ejecutar una consulta de inserción
  
  // Ejemplo de consulta de inserción
  $consulta = "INSERT INTO seleccion (sedes) VALUES ('$sedeSeleccionada')";
  $resultado = mysqli_query($conexion, $consulta);
  
  if ($resultado) {
      echo "Sede agregada al carrito exitosamente";
  } else {
      echo "Error al agregar la sede al carrito";
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/logoFAVICON/smart.png" type="image/x-icon">
   
    <link rel="stylesheet" href="../backend/css/estilo-sedes.css">
    <title>Sedes</title>

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
            <li><a class="sede" href="">SEDES</a></li>
            <li><a class="zona" href="/backend/zonasentrenamiento.php">ZONAS DE ENTRENAMIENTO</a></li>
            <li><a class="reservar" href="/backend/seleccion.php">RESERVAR</a></li>
            <li><a class="carrito" href="/backend/carrito.php">CARRITO</a></li>
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
   
<input type="search" class="buscador1" id="buscador" placeholder="Ingresa tu zona o ciudad">

<button id="btn" class="btn"><img src="/backend/imagenes/imgsedes/lupa.png" alt=""></button>


</div>

<?php $busqueda=mysqli_query($conexion,"SELECT * FROM sedes"); 
      $numero=mysqli_num_rows($busqueda);
    ?>
      <h5 class="result"> RESULTADOS (<?php echo $numero?>)</h5>


   <div class="centro">
        

   <form id="carritoForm" method="post" action="/backend/carrito.php">
    <div class="img-contenedor">
    <a class="item" onclick="redirigir('realplazahuancayo')"> <img src="/backend/imagenes/imgsedes/realplazahuancayo.png" alt=""></a>
        <input type="hidden" name="sedes" value="realplazahuancayo"> 
        <a class="item" onclick="redirigir('openplazahuancayo')"><img src="/backend/imagenes/imgsedes/openplazahuancayo.png" alt=""></a>
        <input type="hidden" name="sedes" value="openplazahuancayo">
        <a class="item" onclick="redirigir('fontana')" > <img src="/backend/imagenes/imgsedes/fontana.png" alt=""> </a>
        <input type="hidden" name="sedes" value="fontana">
        <a class="item" onclick="redirigir('mallSantaAnita')" > <img src="/backend/imagenes/imgsedes/mallSantaAnita.png" alt=""> </a>
        <input type="hidden" name="sedes" value="mallSantaAnita">
        <a class="item" onclick="redirigir('RealPlazaPuruchuco')" > <img src="/backend/imagenes/imgsedes/RealPlazaPuruchuco.png" alt=""> </a>
        <input type="hidden" name="sedes" value="RealPlazaPuruchuco">
        <a class="item" onclick="redirigir('AlamedaPlazaSJL')" > <img src="/backend/imagenes/imgsedes/AlamedaPlazaSJL.png" alt=""> </a>
        <input type="hidden" name="sedes" value="AlamedaPlazaSJL">
    
    
    </div>
   

    </form>

    <div class="imgderecha">
            <img src="/backend/imagenes/imgsedes/imgderecha.png" alt="">
       </div>
  </div>



<footer class="ultimo">

    <h2><a> ¡Saca tu </a> mejor forma!</h2>

</footer>
      

<script>
function redirigir(sede) {
  // Cambiar la ubicación de la ventana del navegador a zonasentrenamiento.php con el parámetro 'sede'
  window.location.href = '/backend/zonasentrenamiento.php?sede=' + sede;
}
</script>
</body>
</html>


