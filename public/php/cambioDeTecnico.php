<?php

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
$db=connect();

$id = $_POST["id"];
$tecnico = $_POST["tecnico"];

$smt = $db->prepare("UPDATE obras SET tecnico = '$tecnico' WHERE id = '$id'");
$smt->setFetchMode(PDO::FETCH_OBJ);
$smt->execute();

echo "fueaiufje";
