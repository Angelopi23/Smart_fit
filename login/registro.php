<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/logoFAVICON/smart.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/register.css">
    <title>Registro</title>
</head>
<body>

    
<div class="superior">


    <div   class="logo" >
        <a  class="smart">SMART </a>
        <img id="logo2" src="/css/logo2.png" alt="">
        <a  class="fit"> FIT</a>
        </div>


        <div class="medio">
        <h2> <a>Registrate</a> para ingresar</h2> <br>
        <p>¡Bienvenido de nuevo!</p>
        <p>Por favor introduce tus datos para ingresar</p>
        </div>


        <form class="formulario-registro"> 
        <p> <strong> NOMBRE </strong></p> 
        <input  class="form"  type="text" name="nombres" id="nombres" placeholder="Ingrese su nombre" required="" pattern="[a-zA-Z]+">  <!--required para que no envie formulario vacio--> <!--pattern para pedir que llene algo especifico-->
        <p> <strong> APELLIDO </strong></p>
        <input class="form" type="text" name="apellidos" id="apellidos" placeholder="Ingrese sus apellidos" required="" pattern="[a-zA-Z]+" >
        <p> <strong>EMAIL </strong> </p>
        <input class="form" type="email" name="correo" id="correo" placeholder="Ingrese su correo electronico" required="">
        <p> <strong>CONTRASEÑA </strong> </p>
        <input class="form" type="password" name="contraseña" id="contraseña" placeholder="Ingrese su contraseña" required="">
        
        <input class="boton" type="submit" value="Registrate">
        <p class="yatienes"><a href="">¿Ya tienes cuenta?</a></p>

        </form>

        <div class="imagen-container">
        <img  src="/css/img-registro.png" alt="">
        </div>

      

</div>



</body>
</html>