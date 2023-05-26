<?php


	require dirname(__DIR__).'/login/conexion.php';
	require dirname(__DIR__).'/login/funcs.php';

	$errors = array();

	if(!empty($_POST)){
		$email = $_POST['email'];

		if(!isEmail($email)){
			$errors[] = "Debe ingresar un correo electronico valido";
		}

			if(emailExiste($email)){

				$user_id = getValor('id','email',$email);
				$nombre = getValor('nombres','email',$email);

				$token = generaTokenPass($user_id);
				$url = 'http://'.$_SERVER["SERVER_NAME"].':3000/backend/login/nuevacontraseña.php?user_id='.$user_id.'&token='.$token;

				$asunto = 'Recuperar Password - Smart Fit';
				$cuerpo = "Hola $nombre: <br/><br/>Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>Para restaurar la
				contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>Cambiar contraseña</a>";

				if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
					echo "Hemos enviado un correo electrónico a la dirección $email para restablecer tu contraseña</br>";
					echo "<a href='/backend/login/login.php'>Iniciar Sesión</a>";
					exit;
				}else{
					$errors[] = "Error al enviar email";
				}

			}else{
				$errors[] = "No existe el correo electrónico";
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
    
    <link rel="stylesheet" href="/backend/css/olvidas-contra.css">
    <title>Olvidaste contraseña</title>
</head>
<body>

   
<section class="left-formulario">
    
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

        <div class="logo" >
        <a  class="smart">SMART </a>
        <img id="logo2" src="/css/logo2.png" alt="">
        <a  class="fit"> FIT</a>
        </div>  

        <h2>Recuperar <a>contraseña</a> </h2> <br>
        <p>¡Hola!</p>

      
     <label for="usuario">Email</label>
     <input class="form" type="email" name="email" id="email" placeholder="Ingrese su correo electrónico" required="" >
    
     
      <div class="botones">
        <input  class="boton1" type="submit" value="Enviar" id="Enviar">
    
     </div>  
     <?php echo resultBlock($errors); ?>
    
     </form>

    </section>
 




    <section class="right-formulario">
    </section>


    <script src="/backend/JS/olvidaste.js"></script>


</body>
</html>