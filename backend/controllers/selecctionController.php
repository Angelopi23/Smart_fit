<?php 

session_start();
require("../login/database.php");

$maquinas = "select * from maquinas";
$sedes = "select * from sedes";
$horarios = "select * from horarios";
$zonas = "select * from zona_entrenamiento";
$turno = "select * from turnos";
$fecha = "select * from fechas";

$q_maquinas=mysqli_query($conexion,$maquinas);
$q_horarios=mysqli_query($conexion,$horarios);
$q_zonas=mysqli_query($conexion,$zonas);
$q_turno=mysqli_query($conexion,$turno);
$q_fecha=mysqli_query($conexion,$fecha);
$q_sedes=mysqli_query($conexion,$sedes);



if($q_sedes && $q_maquinas && $q_horarios && $q_zonas && $q_turno && $q_fecha){
    $sedes = array();
    $maquinas = array();
    $horarios = array();
    $zonas = array();
    $turno = array();
    $fecha = array();

    while($row = $q_sedes->fetch_array()){
        $sede[] =($row['sede']);            
    }

    while($row2 = $q_maquinas->fetch_array()){
        $maquinas[] =($row2['maquina']);     
    }

    while($row3 = $q_horarios->fetch_array()){
        if ($row3['hora'] !== null) {
            $horarios[] = $row3['hora'];
        }    
    }

    while($row3 = $q_zonas->fetch_array()){
        $zonas[] =($row3['entrenamiento']);       
    }

    while($row4 = $q_turno->fetch_array()){
        $turno[] =($row4['turno']); 
    }

    while($row5 = $q_fecha->fetch_array()){
        $fecha[] =($row5['fecha']);  
    }

    
    $_SESSION['sede']=$sede;
    $_SESSION['maquinas']=$maquinas;
    $_SESSION['horarios']=$horarios;
    $_SESSION['zonas']=$zonas;
    $_SESSION['turno']=$turno;
    $_SESSION['fecha']=$fecha;
    
   
}
header("location:/backend/seleccion.php");
//var_dump($_SESSION);

?>