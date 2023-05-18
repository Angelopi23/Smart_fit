<?php
$SERVER='localhost';
$username='root';
$password='';
$database='smar';



try{
    $conn= new PDO("mysql:host=$server;dbname=$database;",$username,$password);
}catch (PDOException $e) {

    die('connected failed: '.$e->getMessage());

}





?>










