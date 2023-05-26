<?php 


require("../login/database.php");

$id = $_SESSION['id'];

$consulta = "select * from carrito where usuario=".$id;

$resultado=mysqli_query($conexion,$consulta);

if($resultado){
    $array_res = array();
   
    while($row = $resultado->fetch_array()){
        $array_res[] =($row);            
    }

   
}
//echo $consulta;
//var_dump($array_res);

//header("location:/backend/carrito.php");
//var_dump($_SESSION);

?>