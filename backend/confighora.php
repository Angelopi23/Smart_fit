<?php
// conexión a la base de datos
require("../backend/login/database.php");


// obtener el ID de la hora seleccionada
$horaId = $_GET['turnos'];

// consulta para obtener las hora del turno seleccionada
$consulta = "SELECT * FROM horarios WHERE idturno = " . $horaId;
$ejecutarConsulta = mysqli_query($conexion, $consulta);

// generar opciones de horas en formato HTML
while ($fila = mysqli_fetch_array($ejecutarConsulta)) {
  echo '<div id="opcionhora">';
  echo '<a href="#" class="opcionhora" onclick="seleccionarhora(event)">';
  echo '<div class="contenido-opcionhora">';
  echo '<div class="textoshora" id="contoptionhora">';
  echo '<p class="descripcionhora">' . $fila['hora'] . '</p>';
  echo '</div>';
  echo '</div>';
  echo '</a>';
  echo '</div>';
}

// cerrar la conexión a la base de datos
mysqli_close($conexion);
?>