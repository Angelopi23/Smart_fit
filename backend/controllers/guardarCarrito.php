<?php 

//var_dump($_POST);
session_start();

require("../login/database.php");

var_dump($_SESSION);

$sedes = $_POST["sede"];
$zona = $_POST["zona"];
$maq = $_POST["maq"];
$hora = $_POST["hora"];
$turno = $_POST["turno"];
$dia = $_POST["dia"];//fechas
$id = $_SESSION["id"];



$insert = "INSERT INTO `smart_fit2`.`carrito` (`sedes`, `maquina`, `horarios`, `zona`, `turno`, `fecha`, `usuario`) VALUES ('".$sedes."', '".$maq."', '".$hora."', '".$zona."', '".$turno."', '".$dia."', ".$id.");
";

echo $insert;

$respuesta=mysqli_query($conexion,$insert);


header("location:/backend/carrito.php");
//var_dump($_SESSION);


?>