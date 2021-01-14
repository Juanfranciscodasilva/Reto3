<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function connect(){
    $dbname = "heroku_02c9d0b90e9f65b";
    $host = "eu-cdbr-west-03.cleardb.net";
    $user = "b46eb092a4d5de";
    $pass = "eb1a4830";

    try{
        $db = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        //echo "conexión correcta a la base de datos";
        return $db;
    }
    catch(PDOException $e){
        echo $e->getMessage();
        return null;
    }
}

$db = connect();
$stmt = $db->prepare("INSERT INTO direccion(calle,numero,piso,cod_postal,municipio,poblacion,provincia) VALUES ('calle1','3','3I',01010,'municipio','vitoria','alava')");
$stmt->execute();
header("Location: holaprueba.blade.php");

