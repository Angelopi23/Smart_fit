<?php
	
    require dirname(__DIR__).'/login/conexion.php';
	require dirname(__DIR__).'/login/funcs.php';

	$user_id = $_POST['user_id'];
	$token = $_POST['token'];
	$password = $_POST['password'];
	$con_password = $_POST['con_password'];

	if(validaPassword($password,$con_password)){
		if(cambiaPassword($password,$user_id, $token)){
			echo "Password modificado";
			echo "<br> <a href='/backend/login/login.php'>Iniciar Sesión</a>";
		}else{
			echo "Error al modificar password";
		}
	}else{
		echo "Las contraseñas no coinciden";
	}
?>	