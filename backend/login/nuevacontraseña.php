<?php
	
    require dirname(__DIR__).'/login/conexion.php';
	require dirname(__DIR__).'/login/funcs.php';
	
	if(empty($_GET['user_id'])){
		header("Location:/backend/login/login.php");
	}

	if(empty($_GET['token'])){
		header("Location:/backend/login/login.php");
	}
	
	$user_id = $_GET['user_id'];
	$token = $_GET['token'];
	
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/logoFAVICON/smart.png" type="image/x-icon">
    
    <link rel="stylesheet" href="/backend/css/nueva-contra.css">
    <title>Nueva contraseña</title>
</head>
<body>
    
   
<section class="left-formulario">
    
<form action="/backend/login/guarda_pass.php" method="post">

        <div class="logo" >
        <a  class="smart">SMART </a>
        <img id="logo2" src="/css/logo2.png" alt="">
        <a  class="fit"> FIT</a>
        </div>  

        <h2>Ingresa tu nueva contraseña <a>para empezar</a> </h2> <br>
     <p>¡Bienvenido de nuevo!</p>
     <p>Por favor introduce tus datos para ingresar</p>

     <input type="hidden" id="user_id" name="user_id" value ="<?php echo $user_id; ?>" />
							
	<input type="hidden" id="token" name="token" value ="<?php echo $token; ?>" />

     <label for="password">NUEVA CONTRASEÑA</label>
     <input class="form" type="password" name="password" id="password" placeholder="Ingrese su nueva contraseña" required=""> <br>
     <label for="password">CONFIRMAR CONTRASEÑA</label>
     <input class="form" type="password" name="con_password" id="con_password" placeholder="Confirme su contraseña" required=""> <br>

      <div class="botones">
     <input class="boton1" type="submit" value="Confirmar">
     
     </div>  

     

     </form>

    </section>
 




    <section class="right-formulario">
    </section>


    <script src="/backend/JS/olvidaste.js"></script>



</body>
</html>