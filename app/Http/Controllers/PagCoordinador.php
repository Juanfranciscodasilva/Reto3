<?php

namespace App\Http\Controllers;

use App\Models\Direcciones;
use App\Models\Persona;
use App\Models\Roles;
use App\Models\tablaEstados;
use App\Models\tablaEstructuras;
use App\Models\tablaObras;
use App\Models\tablaTiposObra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Utils;

class PagCoordinador extends Controller
{
    public function entrar(){
        session_start();
        if (!isset($_SESSION["user"])){
            return redirect("login");
        }else{
            if($_SESSION["user"]["rol"]!=0){
                return back();
            }
        }

        //DATOS PARA LA VENTANA DE REGISTRO

        $roles = Roles::get();

        //DATOS PARA LA VENTANA DE ESTADISTICAS

        $datosGraficas = $this->datosVentanaEstadisticas(01,2021);

        //DATOS PARA LA VENTANA DE OBRAS

            $datosObras = $this->obtenerObrasCoordinador();

        //DATOS PARA LA VENTANA DE USUARIOS

        $usuarios = $this->obtenerUsuarios();

        return view("coordinador")
            ->with("botonNav","CERRAR SESION")
            ->with("datosRegistro",$roles)
            ->with("datosGraficas",$datosGraficas)
            ->with("datosObras",$datosObras)
            ->with("usuarios",$usuarios)
            ->with("menu",true);
    }

    public function datosVentanaEstadisticas($mes,$ano){
        $graficaEstados = $this->graficaEstados($mes,$ano);
        $graficaTiposDeObra = $this->graficaTiposDeObra($mes,$ano);
        $graficaObrasAceptadas = $this->graficaObrasAceptadas($ano);
        $mesString = $this->obtenerStringMes($mes);

        $datosGraficas = [
            "estados" => $graficaEstados,
            "tipo_obras" => $graficaTiposDeObra,
            "obras_aceptadas" => $graficaObrasAceptadas,
            "mes" => $mesString,
            "ano" => $ano
        ];

        return $datosGraficas;
    }

    public function obtenerStringMes($mes){
        switch ($mes){
            case "01":
                return "Enero";
            case "02":
                return "Febrero";
            case "03":
                return "Marzo";
            case "04":
                return "Abril";
            case "05":
                return "Mayo";
            case "06":
                return "Junio";
            case "07":
                return "Julio";
            case "08":
                return "Agosto";
            case "09":
                return "Septiembre";
            case "10":
                return "Octubre";
            case "11":
                return "Noviembre";
            case "12":
                return "Diciembre";
        }
    }

    public function graficaEstados($mes,$ano){

        $obrasAceptadas = DB::select("SELECT * FROM obras where estado = 2 AND month(fecha_inicio) = $mes AND year(fecha_inicio) = $ano;");
        $obrasEnProceso = DB::select("SELECT * FROM obras where estado = 3 AND month(fecha_inicio) = $mes AND year(fecha_inicio) = $ano;");
        $obrasFinalizadas = DB::select("SELECT * FROM obras where estado = 4 AND month(fecha_inicio) = $mes AND year(fecha_inicio) = $ano;");
        $obrasDenegadas = DB::select("SELECT * FROM obras where estado = 5 AND month(fecha_inicio) = $mes AND year(fecha_inicio) = $ano;");

        $obrasEstados = [
            "aceptadas" =>  count($obrasAceptadas),
            "proceso" =>  count($obrasEnProceso),
            "finalizadas" =>  count($obrasFinalizadas),
            "denegadas" =>  count($obrasDenegadas)
        ];

        return $obrasEstados;
    }

    public function graficaTiposDeObra($mes,$ano){

        $obrasConstruccion = DB::select("SELECT * FROM obras where tipo_obra = 1 AND month(fecha_inicio) = $mes AND year(fecha_inicio) = $ano;");
        $obrasReforma = DB::select("SELECT * FROM obras where tipo_obra = 2 AND month(fecha_inicio) = $mes AND year(fecha_inicio) = $ano;");
        $obrasDemolicion = DB::select("SELECT * FROM obras where tipo_obra = 3 AND month(fecha_inicio) = $mes AND year(fecha_inicio) = $ano;");

        $obrasTipoDeObra = [
            "construccion" =>  count($obrasConstruccion),
            "reforma" =>  count($obrasReforma),
            "demolicion" =>  count($obrasDemolicion)
        ];

        return $obrasTipoDeObra;
    }

    public function graficaObrasAceptadas($ano){
        $meses = ["01","02","03","04","05","06","07","08","09","10","11","12"];
        $aceptadasPorMes = [];
        foreach ($meses as $mes){
            $obrasDelMes = DB::select("SELECT * FROM obras where estado != 5 AND month(fecha_inicio) = '$mes' AND year(fecha_inicio) = '$ano';");
            array_push($aceptadasPorMes,count($obrasDelMes));
        }

        return $aceptadasPorMes;
    }

    public function obtenerObrasCoordinador(){
        $obrasSinTecnico = tablaObras::get()->where("estado",1)->where("tecnico",null);
        $obrasSinTecnico = $this->modificarDatosCompletosObras($obrasSinTecnico);
        $obrasSinTecnicoArray = [];
        foreach ($obrasSinTecnico as $obra){
            array_push($obrasSinTecnicoArray,$obra);
        }
        $obrasConTecnico = tablaObras::where("tecnico" , "!=",null)->where("estado","!=",5)->paginate(5);
        $obrasConTecnico = $this->modificarDatosCompletosObras($obrasConTecnico);

        $tecnicos = Persona::get()->where("rol",1);

        $datosObras = [
          "sin-tecnico" => $obrasSinTecnicoArray,
          "con-tecnico" => $obrasConTecnico,
            "tecnicos" => $tecnicos
        ];

        return $datosObras;
    }

    public function obtenerUsuarios(){
        $usuarios = [];
            $usuarios = Persona::paginate(10);


        $usuarios = $this->modificarDatosCompletosUsuarios($usuarios);

        $usuariosColumnas = $this->dividirUsuariosColumnas($usuarios);

        return $usuariosColumnas;
    }

    public function dividirUsuariosColumnas($usuarios){
        $mitad = round(count($usuarios)/2);
        $izquierda = [];
        $derecha = [];
        $contador = 0;
        foreach ($usuarios as $usuario){
            array_push($izquierda,$usuario);
            $contador ++;
            if ($contador == $mitad){
                break;
            }
        }
        $contador = 0;
        foreach ($usuarios as $usuario){
            $contador ++;
            if ($contador > $mitad){
                array_push($derecha,$usuario);
            }
        }

        $usuariosColumnas = [
            "izquierda" => $izquierda,
            "derecha" => $derecha,
            "todos" => $usuarios
        ];

        return $usuariosColumnas;
    }

    public function buscarUsuario($request){

        //DATOS PARA LA VENTANA DE USUARIOS

        $dni = $request->dni;
        $persona = Persona::find($dni);
        $usuarios = [
            "izquierda" => [],
            "derecha" => [],
            "dni" => ""
        ];
        if ($persona != ""){
            array_push($usuarios["izquierda"],$persona);
           $usuarios["izquierda"] = $this->modificarDatosCompletosUsuarios($usuarios["izquierda"]);
        }else{
            $usuarios["dni"] = $dni;
        }


        //DATOS PARA LA VENTANA DE REGISTRO
        $roles = Roles::get();

        //DATOS PARA LA VENTANA DE ESTADISTICAS

        $datosGraficas = $this->datosVentanaEstadisticas(01,2021);

        //DATOS PARA LA VENTANA DE OBRAS

        $datosObras = $this->obtenerObrasCoordinador();


        return view("coordinador")
            ->with("botonNav","CERRAR SESION")
            ->with("datosRegistro",$roles)
            ->with("datosGraficas",$datosGraficas)
            ->with("datosObras",$datosObras)
            ->with("usuarios",$usuarios)
            ->with("menu",true);

    }

    public function modificarDatosCompletosUsuarios($usuarios){
        foreach ($usuarios as $usuario){
            //APARTADO DEL ROL
            $rol = $usuario->rol;
            $rolBBDD = Roles::get()->where("id",$rol)->first();
            $usuario->rol = $rolBBDD->nombre;

            //APARTADO DE DIRECCION

            $direccion = $usuario->direccion;
            $direccionBBDD = Direcciones::get()->where("id",$direccion)->first();
            $direccionArray = [
                "calle" => $direccionBBDD->calle,
                "portal" => $direccionBBDD->numero,
                "piso" => $direccionBBDD->piso,
                "cod_postal" => $direccionBBDD->cod_postal
            ];
            $usuario->direccionArray = $direccionArray;
        }
        return $usuarios;
    }

    public function modificarDatosCompletosObras($obras){
        foreach ($obras as $obraBBDD){
            //DATO tipo de obra
            $tipoObra = tablaTiposObra::get()->where('id',$obraBBDD->tipo_obra)->first();
            $obraBBDD->tipo_obra = $tipoObra->nombre;

            //DATO tipo de estructura
            $tipoEstructura = tablaEstructuras::get()->where('id',$obraBBDD->tipo_estructura)->first();
            $obraBBDD->tipo_estructura = $tipoEstructura->nombre;

            //DATO estado de la obra
            $estado = tablaEstados::get()->where('id',$obraBBDD->estado)->first();
            $obraBBDD->estadoString = $estado->estado;

            switch ($estado->id){
                case 2:
                    $obraBBDD->mensajeCambiarEstado = "Iniciar Obra";
                    break;
                case 3:
                    $obraBBDD->mensajeCambiarEstado = "Finalizar Obra";
                    break;
            }

            //DATOS de la direccion
            $direccionBBDD = Direcciones::get()->where('id',$obraBBDD->direccion)->first();

            //datos de la calle
            $direccion = $direccionBBDD->calle.' '.$direccionBBDD->numero.' '.$direccionBBDD->piso;
            $obraBBDD->direccionString = $direccion;

            //datos de latitud y longitud
            $obraBBDD->latitud = $direccionBBDD->latitud;
            $obraBBDD->longitud = $direccionBBDD->longitud;

            //DATOS del solicitante
            $solicitante = Persona::get()->where('id',$obraBBDD->solicitante)->first();

            //ARRAY DATOS SOLICITANTE
            $datosSolicitante = [
                "nombre" => $solicitante->nombre." ".$solicitante->apellidos,
                "email" => $solicitante->email,
                "telefono" => $solicitante->telefono
            ];
            $obraBBDD->datosSolicitante = $datosSolicitante;

            //DATOS del tecnico
            $datosTecnico = [];
            if ($obraBBDD->tecnico != null){
                $tecnico = Persona::get()->where('id',$obraBBDD->tecnico)->first();

                //ARRAY DATOS TECNICO
                $datosTecnico = [
                    "nombre" => $tecnico->nombre." ".$tecnico->apellidos,
                    "email" => $tecnico->email,
                    "telefono" => $tecnico->telefono
                ];
            }else{
                //ARRAY DATOS TECNICO
                $datosTecnico = [
                    "nombre" => "No asignado",
                    "email" => "-----",
                    "telefono" => "-----"
                ];
            }
            $obraBBDD->datosTecnico = $datosTecnico;

            //APARTADO DE FECHA

            if ($obraBBDD->fecha_inicio == null){
                $obraBBDD->fecha_inicio = "No iniciada";
            }

            if ($obraBBDD->fecha_fin == null){
                $obraBBDD->fecha_fin = "No acabada";
            }
        }
        return $obras;
    }

    public function store(){


        //acceder a los datos de dirección

        $calle = request('calle');
        $numero = request('numero');
        $piso = request('piso');
        $cod_postal = request('cod_postal');
        $latitud = request('latitud');
        $longitud = request('longitud');

        //debemos verificar si ya existe:
        $dir = Direcciones::get()->where('calle',$calle)->where('numero',$numero)->where('piso',$piso)->first();
        //si no existe: insert de dirección
        if ($dir==null) {
            $dir = Direcciones::create([
                'calle' => $calle,
                'numero' => $numero,
                'piso' => $piso,
                'cod_postal' => $cod_postal,
                'latitud' => $latitud,
                'longitud' => $longitud
            ]);
        }
        //en cualquier caso nos quedamos con el id
        $idDir =  $dir->id;
        //añadir persona
        $dni = request('dni');
        //antes de hacer el insert debemos verificar si ya existe en la tabla con el dni
        $persona = Persona::find($dni);
        $passEncriptada = password_hash(request('pass'),PASSWORD_DEFAULT);
        if($persona==null){
            //si no existe añadimos persona
            $persona = Persona::create([
                'id'=>$dni,
                'nombre'=>request('nombre'),
                'apellidos'=>request('apellidos'),
                'fecha_nacimiento'=>request('fnacimiento'),
                'pais_nacimiento'=>request('pais_nacimiento'),
                'direccion'=>$idDir,
                'email'=>request('email'),
                'telefono'=>request('tel'),
                'rol'=>request('rol'),
                'password'=>$passEncriptada
            ]);
            //redirigir al login y mostrar mensaje de registro exitoso

            return back();

        }
        //si ya existe debemos mostrar un mensaje de error en la vista de registro
        else{

            return back();
        }


    }

    public function decidirOpcion(){
        $request = request();
        if(isset($request->dni)){
            return $this->buscarUsuario($request);
        }else{
            if (isset($request->idObra)){
                return $this->buscarObra($request);
            }else{
                if (isset($request->mes)){
                    return $this->estadisticasPorMes($request);
                }else{
                    return "page not found";
                }
            }
        }
    }

    public function buscarObra($request){

        $id = $request->idObra;
        $obra = tablaObras::find($id);
        $obraCompleta = [];
        if($obra != null){
            $obras = [$obra];
            $obraCompleta = $this->modificarDatosCompletosObras($obras);
        }

        $datosObras = [
            "unica" => $obraCompleta
        ];

        //DATOS PARA LA VENTANA DE REGISTRO

        $roles = Roles::get();

        //DATOS PARA LA VENTANA DE ESTADISTICAS

        $datosGraficas = $this->datosVentanaEstadisticas(01,2021);

        //DATOS PARA LA VENTANA DE USUARIOS

        $usuarios = $this->obtenerUsuarios();

        return view("coordinador")
            ->with("botonNav","CERRAR SESION")
            ->with("datosRegistro",$roles)
            ->with("datosGraficas",$datosGraficas)
            ->with("datosObras",$datosObras)
            ->with("usuarios",$usuarios)
            ->with("menu",true);

    }

    public function estadisticasPorMes($request){

        $mes = $request->mes;
        //DATOS PARA LA VENTANA DE REGISTRO

        $roles = Roles::get();

        //DATOS PARA LA VENTANA DE ESTADISTICAS

        $datosGraficas = $this->datosVentanaEstadisticas($mes,2021);

        //DATOS PARA LA VENTANA DE OBRAS

        $datosObras = $this->obtenerObrasCoordinador();

        //DATOS PARA LA VENTANA DE USUARIOS

        $usuarios = $this->obtenerUsuarios();

        return view("coordinador")
            ->with("botonNav","CERRAR SESION")
            ->with("datosRegistro",$roles)
            ->with("datosGraficas",$datosGraficas)
            ->with("datosObras",$datosObras)
            ->with("usuarios",$usuarios)
            ->with("menu",true);

    }
}

