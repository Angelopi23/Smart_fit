<?php 

//var_dump($_POST);
session_start();
require("../login/database.php");

$sedes = $_POST["sede"];
$zona = $_POST["zona"];
$maq = $_POST["maq"];
$hora = $_POST["hora"];
$turno = $_POST["turno"];
$dia = $_POST["dia"];//fechas



$insert = "INSERT INTO `smart_fit`.`carrito` (`sedes`, `maquina`, `horarios`, `zona`, `turno`, `fecha`) VALUES ('".$sedes."', '".$maq."', '".$hora."', '".$zona."', '".$turno."', '".$dia."');
";

echo $insert;

$respuesta=mysqli_query($conexion,$insert);


header("location:/backend/seleccion.php");


?>