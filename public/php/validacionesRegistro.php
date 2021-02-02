<?php
use App\Models\Persona;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


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

$where = $_POST["data"];
$where2 = $_POST["email"];


$smt = $db->prepare("SELECT * FROM personas WHERE id ='$where'");
$smt->setFetchMode(PDO::FETCH_OBJ);
$smt->execute();

$sm2 = $db->prepare("SELECT * FROM personas WHERE email ='$where2'");
$sm2->setFetchMode(PDO::FETCH_OBJ);
$sm2->execute();

    if (empty($smt->fetchObject())) {
        if (empty($sm2->fetchObject())) {
            echo "nocorreo";
        }else{
            echo "sicorreo";
        }
    }else{
      echo 'sidni';
    }




