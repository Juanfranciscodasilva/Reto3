<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use App\Models\Persona;
use function PHPUnit\Framework\isEmpty;

class Logincontroller extends Controller
{
    //
    public function index(){
        $dato ='none';
        $roles = Roles::get();
        return view('login',compact('roles'),compact('dato'));
    }

    public function login()
    {
        $dato ='none';
               if (isset($_SESSION['user']))
               {
                   session_destroy();
               }

               session_start();
               $dni = request('dni');
               $pass = request('pass');
               $rol = request('rol');
               $user = Persona::get()->where('dni', $dni)->where('password', $pass)->where('rol',$rol)->first();


        if (empty($user)) {
                   session_destroy();
            $roles = Roles::get();
            $dato = 'block';
            return view('login',compact('roles'),compact('dato'));
               }

               $_SESSION['user']=$user;

        return view('welcome',compact('dato'));




    }
}
