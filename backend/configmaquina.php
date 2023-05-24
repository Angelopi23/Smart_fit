<?php
// conexión a la base de datos
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'smart_fit';

$conexion = mysqli_connect($server, $username, $password, $database);

// obtener el ID de la zona seleccionada
$zonaId = $_GET['zona'];

// consulta para obtener las máquinas de la zona seleccionada
$consulta = "SELECT * FROM maquinas WHERE id = " . $zonaId;
$ejecutarConsulta = mysqli_query($conexion, $consulta);

// generar opciones de máquina en formato HTML
while ($fila = mysqli_fetch_array($ejecutarConsulta)) {
  echo '<a href="#" class="opcionmaq">';
  echo '<div class="contenido-opcionmaq">';
  echo '<div class="textosmaq">';
  echo '<p class="descripcionmaq">' . $fila['maquina'] . '</p>';
  echo '</div>';
  echo '</div>';
  echo '</a>';
}

// cerrar la conexión a la base de datos
mysqli_close($conexion);
?>