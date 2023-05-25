<?php
// conexión a la base de datos
require("../backend/login/database.php");

// obtener el ID de la zona seleccionada
$zonaId = $_GET['zona'];

// consulta para obtener las máquinas de la zona seleccionada
$consulta = "SELECT * FROM maquinas WHERE id = " . $zonaId;
$ejecutarConsulta = mysqli_query($conexion, $consulta);

// generar opciones de máquina en formato HTML
while ($fila = mysqli_fetch_array($ejecutarConsulta)) {
  echo '<div id="opcionmaq">';
  echo '<a href="#" class="opcionmaq" onclick="seleccionarMaq(event)">';
  echo '<div class="contenido-opcionmaq">';
  echo '<div class="textosmaq" id="contoptionmaq">';
  echo '<p class="descripcionmaq">' . $fila['maquina'] . '</p>';
  echo '</div>';
  echo '</div>';
  echo '</a>';
  echo '</div>';
}

// cerrar la conexión a la base de datos
mysqli_close($conexion);
?>