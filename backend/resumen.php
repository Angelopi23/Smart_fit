
<?php

session_start();
require("../backend/login/database.php");


if(!isset($_SESSION['email'])){
header("location:../login/login.php");

}
    
$idUser=$_SESSION['email'];
$nombre = $_SESSION['nombres'];
$apellido = $_SESSION['apellidos'];

$mostrar="SELECT*FROM usuario
 WHERE email = '$idUser' " ;
$result=$conexion->query($mostrar);

$row=$result->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart fit</title>
    <link rel="shortcut icon" href="/logoFAVICON/smart.png" type="image/x-icon">
    <link rel="stylesheet" href="/backend/css/estilo-resumen.css">
</head>

<body>

    <header>
        <div class="enlaces">
            <div class="menu container">

                <a class="smart">SMART </a>
                <img id="logo2" src="/backend/css/logo2.png" alt="">

                <a class="fit"> FIT</a>
                <input type="checkbox" id="menu" />
                <label for="menu">
                    <img src="/backend/css/menu-icono.png" class="menu-icono" alt="">
                </label>

                <nav class="menuarriba">
                    <ul>
                        <li><a class="sede" href="/backend/sedes.php">SEDES</a></li>
                        <li><a class="zona" href="/backend/zonasentrenamiento.php">ZONAS DE ENTRENAMIENTO</a></li>
                        <li><a class="maquina" href="">MAQUINAS</a></li>
                        <li><a class="carrito" href="">CARRITO</a></li>
                        <li><a class="empieza" href=""><?php echo utf8_decode($nombre.' '.$apellido); ?></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="palabra"><br>
        <br>
        <h2>SMART <img style="width: 60px;" src="/backend/css/logo2.png" alt="logo2"> <a> FIT </a></h2>
        <h2>PRES DE<a>BANCA</a></h2>
        <br>
        <br>
    </div>

    <div class="portada2">

        <div class="img-contenedor">
            <div class="item">

                <img class="img-res" src="/backend/imagenes/img-resumen/resumen.jpg" alt="">
            </div>
        </div>
    </div>

   

    <section class="formulario">

        <form>
            <label for="usuario">SEDE</label>
            <input class="form" disabled type="text" name="sede" placeholder="Lima" required="">

            <label for="password">ZONA</label>
            <input class="form" disabled type="text" name="zona" placeholder="Zona de fuerza" required=""> <br>

            <label for="password">MAQUINA</label>
            <input class="form" type="text" name="maquina" placeholder="Pres de banca" required=""> <br>

            <label for="password">TURNO</label>
            <input class="form" type="text" name="turno" placeholder="Tarde" required=""> <br>

            <label for="password">HORA</label>
            <input class="form" type="text" name="hora" placeholder="7:35 PM" required=""> <br>

            <div class="botones">
                <input class="boton_agregar" type="submit" name="ingresar" value="Agregar Carrito">
            </div>

        </form>

    </section>

</body>

</html>