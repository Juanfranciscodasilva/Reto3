<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('holaprueba');
});

Route::get('/prueba', function () {
    return "Hola has entrado a la prueba!";
});

Route::get('/prueba/{id}/usuario', function ($id) {
    return "Has entrado al usuario atraves de un id ".$id;
});
