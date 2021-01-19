<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE Illuminate\Support\Facades\DB;

class insert extends Controller
{
    public function store( Request $request){
        $provincia = $request->get('provincia');
        /*DB::table('direccion')->insert(
          [
              'calle' => 'calle1',
              'numero' => '3',
              'piso' => '3I',
              'cod_postal' => 01010,
              'municipio' => 'municipio',
              'poblacion' => 'vitoria',
              'provincia' => $provincia,
          ]
        );
        $consulta = DB::select('SELECT * from direccion WHERE id="1"');*/
        return $request;
        //return view('holaprueba');
    }
}


