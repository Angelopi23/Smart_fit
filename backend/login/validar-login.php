<?php



$email=$_POST['email'];
$contraseña=$_POST['contraseña'];

session_start();

$_SESSION['email']=$email;


$conexion=mysqli_connect('localhost','root','','smart_fit'); 

$consulta= "SELECT*FROM usuario WHERE email='$email' and contraseña='$contraseña'  ";



$resultado=mysqli_query($conexion,$consulta);


$filas=mysqli_num_rows($resultado);

if($resultado){
    while($row = $resultado->fetch_array()){
        $nombres =strtoupper($row['nombres']);      //strtoupper codigo que pone mayusculas
        $apellidos =strtoupper( $row['apellidos']);
    }

    $_SESSION['nombres']=$nombres;
    $_SESSION['apellidos']=$apellidos;
}

if($filas){
    header("location:/backend/index.php");
    

}else{

    ?>
    <?php
    include("login.php");
    ?>
    <h2 class="advertencia">INGRESE LOS DATOS CORRECTAMENTE</h2>
    <?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);
