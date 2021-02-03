<?php

use App\Models\Roles;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\PagUsuario;
use App\Http\Controllers\PagTecnico;
use App\Models\tablaEstructuras;
use App\Models\tablaTiposObra;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//RUTAS LOGIN

Route::get('login','App\Http\Controllers\Logincontroller@index')->name('login');

Route::post('login','App\Http\Controllers\Logincontroller@login')->name('logged');

//RUTAS USUARIO

Route::get('/usuario', 'App\Http\Controllers\PagUsuario@entrar');

Route::post('usuario', 'App\Http\Controllers\PagUsuario@solicitarObra')->name('usuario.solicitarObra');

//RUTAS TECNICO

Route::get('/tecnico', function (){
    session_start();
    if (!isset($_SESSION["user"])){
        return redirect("login");
    }else{
        if($_SESSION["user"]["rol"]!=1){
            return back();
        }
    }
    $obrasSolicitadas = app(PagTecnico::class)->extraerObras(1);
    $obrasAceptadas = app(PagTecnico::class)->extraerObras(2);
    $botonNav = "CERRAR SESION";
    return view("tecnico")->with('botonNav', $botonNav)->with("obrasSolicitadas",$obrasSolicitadas)->with("obrasAceptadas",$obrasAceptadas);
});

Route::get('/tecnico/{estado}/{id}', 'App\Http\Controllers\PagTecnico@cambiarEstado');

Route::get('/tecnico/obra/aceptar/{id}', 'App\Http\Controllers\PagTecnico@aceptarObra');

Route::get('/tecnico/obra/denegar/{id}', 'App\Http\Controllers\PagTecnico@denegarObra');

Route::post('/tecnico','App\Http\Controllers\PagTecnico@comentarios')->name("comentarios");

//RUTAS CAMBIAR CONTRASEÑA

Route::get('/emailtestform', function () {
    $botonNav = "INICIAR SESION";
    $dato = "black";
    return view('emailtest',compact('dato'))->with('botonNav',$botonNav);
})->name('emailtestform'); //Esta ruta la ponemos en la raiz para que nada mas ejecutar nuestra aplicación aparezca nuestro formulario

Route::post('/contactar', 'App\Http\Controllers\EmailController@contact')->name('contact');//Ruta que esta señalando nuestro formulario

Route::get('reset','App\Http\Controllers\ResetController@index')->name('reset');

Route::patch('reset','App\Http\Controllers\ResetController@update')->name('reseteo');

Route::get('confimacion',function (){
    $botonNav = "INICIAR SESION";
    return view('confirmacion')->with('botonNav',$botonNav);
})->name('confirmacion');

//RUTAS PAGINA PRINCIPAL

Route::get('/', 'App\Http\Controllers\PagPrincipal@entrar');

//RUTAS DE REGISTRO

Route::view('/registro','registro')->name('registro');

Route::post('registro','App\Http\Controllers\RegistroController@store');


//RUTA PARA DESCARGAR ARCHIVOS

Route::get('/public/{archivo}', function ($archivo){
    return Storage::download("planos/".base64_decode($archivo));
});

//RUTAS COORDINADOR

Route::get('coordinador','App\Http\Controllers\PagCoordinador@entrar')->name("todosLosUsuarios");

Route::post('envio','App\Http\Controllers\PagCoordinador@store')->name('envio');

Route::post('coordinador','App\Http\Controllers\PagCoordinador@decidirOpcion')->name("buscadorCoordinador");



