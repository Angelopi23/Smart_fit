
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/logoFAVICON/smart.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/estilo.registro.css">
    <title>Registro</title>
</head>
<body>

    

    <section class="left-formulario">
        <form action="registro.php" method="post">


         <div   class="logo" >
        <a  class="smart">SMART </a>
        <img id="logo2" src="/css/logo2.png" alt="">
        <a  class="fit"> FIT</a>
        </div>

        <h2> <a>Registrate</a> para ingresar</h2> 
        <p>¡Bienvenido de nuevo!</p>
        <p>Por favor introduce tus datos para ingresar</p>
    

        <label for="usuario">NOMBRES</label>
        <input  class="form"  type="text" name="nombres" id="nombres" placeholder="Ingrese su nombre" required="" pattern="[a-zA-Z]+">  <!--required para que no envie formulario vacio--> <!--pattern para pedir que llene algo especifico-->
        <label for="usuario">APELLIDOS</label>
        <input class="form" type="text" name="apellidos" id="apellidos" placeholder="Ingrese sus apellidos" required="" pattern="[a-zA-Z]+" >
        <label for="usuario">EMAIL</label>
        <input class="form" type="email" name="email" id="email" placeholder="Ingrese su correo electronico" required="">
        <label for="usuario">CONTRASEÑA</label>
        <input class="form" type="password" name="contraseña" id="contraseña" placeholder="Ingrese su contraseña" required="">
        
        <div class="botones">
        <input class="boton" type="submit" value="Registrate">
        </div>  
        
        <p class="yatienes"><a href="/login/login.php">¿Ya tienes cuenta?</a></p>

       

        </form>

      
        </section>



        <section class="right-formulario">
        </section>


</body>
</html>