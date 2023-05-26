<?php

class conexion{

    public static function conectar(){

        define('servidor', 'localhost');
        define('nombre_bd','smart_fit');
        define('usuario','root');
        define('password','');
        
        $opciones =array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try{
            $conn = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);
            return $conn;
        }catch(Exception $e){
            die("El error de conexion es: ". $e->getMessage());
        }

    }

}



?>