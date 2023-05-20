<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/logoFAVICON/smart.png" type="image/x-icon">

    <link rel="stylesheet" href="/css/estilo-login.css">
    <title>login</title>
</head>

<body>


    <section class="left-formulario">

        <form action="validar-login.php" method="post">

            <div class="logo">
                <a class="smart">SMART </a>
                <img id="logo2" src="/css/logo2.png" alt="">
                <a class="fit"> FIT</a>
            </div>

            <h2>Inicia sesion para <a>empezar</a> </h2> <br>
            <p>¡Bienvenido de nuevo!</p>
            <p>Por favor introduce tus datos para ingresar</p>


            <label for="usuario">USUARIO</label>
            <input class="form" type="email" name="email" placeholder="Ingrese su correo electronico" required="">

            <label for="password">CONTRASEÑA</label>
            <input class="form" type="password" name="contraseña" placeholder="Ingrese su contraseña" required=""> <br>


            <div class="botones">
                <input class="boton1" type="submit" name="ingresar" value="Ingresar">
                <input class="boton2" type="submit" value="Registrar" id="registrar">
            </div>

            <p class="olvidaste"><a href="/backend/login/olvidarcontraseña.php">¿Olvidaste tu contraseña?</a></p>

        </form>

    </section>





    <section class="right-formulario">
    </section>


    <script src="/backend/JS/login.js"></script>



</body>

</html>