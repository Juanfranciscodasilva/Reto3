<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class PagPrincipal extends Controller
{
    public function entrar(){
        session_start();
        session_destroy();

        $_SESSION["user"] = "";

        if (isset($_COOKIE["ventana"])){
            setcookie("ventana",'',time()-100);
        }

            return view('principal')->with('botonNav',"INICIAR SESION");
    }
}
