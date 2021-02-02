
@section("bloque_usuarios")
<div id="cuadro" class=" container d-lg-flex flex-wrap justify-content-between justify-content-xl-around">
    <div id="buscadorUsuarios" class="w-100">
        <form id="buscarUsuario" action="{{route("buscadorCoordinador")}}" method="post" class="d-flex flex-wrap">
            @csrf
            <input type="text" placeholder="DNI..." name="dni" required>
            <button type="submit"><span class="fa fa-search"></span>&nbspBuscar</button>
            <a href="{{route("todosLosUsuarios")}}">Buscar todos</a>
        </form>
    </div>
    @if(count($usuarios["izquierda"]) > 0 && count($usuarios["derecha"]) > 0)
    <div id="izquierda">
        @foreach($usuarios["izquierda"] as $usuario)
        <div class="usuario">
            <div class="titulo-usuario d-flex align-items-center justify-content-between" id="usuario{{$usuario->id}}" data-toggle="collapse" href="#usuarioCompleto{{$usuario->id}}" aria-controls="usuarioCompleto{{$usuario->id}}">
                <p><b>DNI: {{$usuario->id}} </b></p>
                <div>
                    <span><b>Nombre:</b> <span>{{$usuario->nombre}} {{$usuario->apellidos}}</span></span>
                </div>
            </div>

            <div id="usuarioCompleto{{$usuario->id}}" class="collapse cuerpo-usuario">
                <div class="">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="margin-right"><b>Fecha de nacimiento:</b> {{$usuario->fecha_nacimiento}}</div>
                        <div><b>Pais de nacimiento:</b> {{$usuario->pais_nacimiento}}</div>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="margin-right"><b>Email:</b> {{$usuario->email}}</div>
                        <div><b>telefono:</b> {{$usuario->telefono}}</div>
                    </div>
                    <div>
                        <div><b>Rol:</b> {{$usuario->rol}}</div>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <h2>Direccion</h2>
                    <div class="">
                        <div><b>Calle:</b> {{$usuario->direccionArray["calle"]}}</div>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="margin-right"><b>Portal:</b> {{$usuario->direccionArray["portal"]}}</div>
                        <div class="margin-right"><b>Piso:</b> {{$usuario->direccionArray["piso"]}}</div>
                        <div class="margin-right"><b>Cod. postal:</b> {{$usuario->direccionArray["cod_postal"]}}</div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div id="derecha">
        @foreach($usuarios["derecha"] as $usuario)
            <div class="usuario">
                <div class="titulo-usuario d-flex align-items-center justify-content-between" id="usuario{{$usuario->id}}" data-toggle="collapse" href="#usuarioCompleto{{$usuario->id}}" aria-controls="usuarioCompleto{{$usuario->id}}">
                    <p><b>DNI: {{$usuario->id}} </b></p>
                    <div>
                        <span><b>Nombre:</b> <span>{{$usuario->nombre}} {{$usuario->apellidos}}</span></span>
                    </div>
                </div>

                <div id="usuarioCompleto{{$usuario->id}}" class="collapse cuerpo-usuario">
                    <div class="">
                        <div class="d-flex justify-content-between flex-wrap">
                            <div class="margin-right"><b>Fecha de nacimiento:</b> {{$usuario->fecha_nacimiento}}</div>
                            <div><b>Pais de nacimiento:</b> {{$usuario->pais_nacimiento}}</div>
                        </div>
                        <div class="d-flex justify-content-between flex-wrap">
                            <div class="margin-right"><b>Email:</b> {{$usuario->email}}</div>
                            <div><b>telefono:</b> {{$usuario->telefono}}</div>
                        </div>
                        <div>
                            <div><b>Rol:</b> {{$usuario->rol}}</div>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <h2>Direccion</h2>
                        <div class="">
                            <div><b>Calle:</b> {{$usuario->direccionArray["calle"]}}</div>
                        </div>
                        <div class="d-flex justify-content-between flex-wrap">
                            <div class="margin-right"><b>Portal:</b> {{$usuario->direccionArray["portal"]}}</div>
                            <div class="margin-right"><b>Piso:</b> {{$usuario->direccionArray["piso"]}}</div>
                            <div class="margin-right"><b>Cod. postal:</b> {{$usuario->direccionArray["cod_postal"]}}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @else
        @if(count($usuarios["izquierda"]) == 1)
            <div class="w-100 d-flex justify-content-center">
                <div class="usuario">
                    <div class="titulo-usuario d-flex align-items-center justify-content-between" id="usuario{{$usuarios["izquierda"][0]->id}}" data-toggle="collapse" href="#usuarioCompleto{{$usuarios["izquierda"][0]->id}}" aria-controls="usuarioCompleto{{$usuarios["izquierda"][0]->id}}">
                        <p><b>DNI: {{$usuarios["izquierda"][0]->id}} </b></p>
                        <div>
                            <span><b>Nombre:</b> <span>{{$usuarios["izquierda"][0]->nombre}} {{$usuarios["izquierda"][0]->apellidos}}</span></span>
                        </div>
                    </div>

                    <div id="usuarioCompleto{{$usuarios["izquierda"][0]->id}}" class="collapse cuerpo-usuario">
                        <div class="">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="margin-right"><b>Fecha de nacimiento:</b> {{$usuarios["izquierda"][0]->fecha_nacimiento}}</div>
                                <div><b>Pais de nacimiento:</b> {{$usuarios["izquierda"][0]->pais_nacimiento}}</div>
                            </div>
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="margin-right"><b>Email:</b> {{$usuarios["izquierda"][0]->email}}</div>
                                <div><b>telefono:</b> {{$usuarios["izquierda"][0]->telefono}}</div>
                            </div>
                            <div>
                                <div><b>Rol:</b> {{$usuarios["izquierda"][0]->rol}}</div>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <h2>Direccion</h2>
                            <div class="">
                                <div><b>Calle:</b> {{$usuarios["izquierda"][0]->direccionArray["calle"]}}</div>
                            </div>
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="margin-right"><b>Portal:</b> {{$usuarios["izquierda"][0]->direccionArray["portal"]}}</div>
                                <div class="margin-right"><b>Piso:</b> {{$usuarios["izquierda"][0]->direccionArray["piso"]}}</div>
                                <div class="margin-right"><b>Cod. postal:</b> {{$usuarios["izquierda"][0]->direccionArray["cod_postal"]}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @if(isset($usuarios["dni"]))
            <div class="w-100">
                <p style="text-align: center"><b>No hay ningún usuario registrado con el dni: {{$usuarios["dni"]}}</b></p>
            </div>
            @else
                <div class="w-100">
                    <p style="text-align: center"><b>No hay ningún usuario registrado</b></p>
                </div>
            @endif
        @endif
    @endif
</div>
@if(count($usuarios["izquierda"]) > 1)
{{ $usuarios["todos"]->links('pagination::bootstrap-4') }}
@endif
@endsection
