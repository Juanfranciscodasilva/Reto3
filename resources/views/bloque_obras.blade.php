@section("bloque_obras")
    <main class="container">
        <div class="d-lg-flex justify-content-between container flex-wrap">
            <div class="w-100" id="buscadorObras">
                <div class="d-flex justify-content-center flex-wrap" id="buscarPorID">
                    <form class="d-flex justify-content-center flex-wrap" method="post" action="{{route("buscadorCoordinador")}}">
                        @csrf
                        <input type="text" name="idObra" placeholder="ID..." required>
                        <button type="submit" class="margin-right"><span class="fa fa-search"></span>&nbspBuscar</button>
                        <a href="{{route("todosLosUsuarios")}}">Buscar todas</a>
                    </form>
                </div>
            </div>
            @if(!isset($datosObras["unica"]))
            <div id="izquierda-obras" class="flex-column">
                <h1>Obras por asignar</h1>
                @if(count($datosObras["sin-tecnico"]) != 0)
                    @foreach($datosObras["sin-tecnico"] as $obra)
                        <div class="obra">
                            <div class="titulo-obra d-flex justify-content-between" id="obra{{$obra->id}}" data-toggle="collapse" href="#obraCompleta{{$obra->id}}" aria-controls="obraCompleta{{$obra->id}}">
                                <p><b>ID: {{$obra->id}} </b>&nbsp{{ $obra->direccionString }}</p>
                                <div>
                                    <span><b>Estado:</b> <span>{{ $obra->estadoString}}</span></span>
                                </div>
                            </div>

                            <div id="obraCompleta{{$obra->id}}" class="collapse cuerpo-obra">
                                <div class="">
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <div><b>Estructura:</b> {{$obra->tipo_estructura}}</div>
                                        <div><b>Obra:</b> {{$obra->tipo_obra}}</div>
                                    </div>
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <div><b>Fecha de inicio:</b> {{$obra->fecha_inicio}}</div>
                                        <div><b>Fecha final:</b> {{$obra->fecha_fin}}</div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <div><b>Solicitante:</b> {{$obra->datosSolicitante["nombre"]}}</div>
                                        <div><b>Teléfono:</b> {{$obra->datosSolicitante["telefono"]}}</div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div><b>Email:</b> {{$obra->datosSolicitante["email"]}}</div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <div><b>Técnico:</b> {{$obra->datosTecnico["nombre"]}}</div>
                                        <div><b>Teléfono:</b> {{$obra->datosTecnico["telefono"]}}</div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div><b>Email:</b> {{$obra->datosTecnico["email"]}}</div>
                                    </div>
                                </div>
                                <div>
                                    <p><b>Descripción: </b>{{$obra->descripcion}}</p>
                                </div>
                                    @if($obra->plano != null)
                                        <div class="d-flex justify-content-between">
                                            <a href="/public/{{$obra->plano}}" class="botonDescargar">Descargar plano</a>
                                        </div>
                                    @endif
                                <div class="w-100 d-flex flex-wrap apartadoCambiarTecnico">
                                    <h2 class="w-100" style="text-align: center">Asignar técnico</h2>
                                    <div class="w-100 d-flex flex-wrap justify-content-center">
                                        <select id="cambiarTecnico{{$obra->id}}" class="margin-right">
                                            <option value="null">-- Selecciona un técnico --</option>
                                            @foreach($datosObras["tecnicos"] as $tecnico)
                                                <option value="{{$tecnico->id}}">{{$tecnico->nombre}} {{$tecnico->apellidos}}</option>
                                            @endforeach
                                        </select>
                                        <button onclick="cambiarTecnico({{$obra->id}})">Cambiar</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="d-flex justify-content-center"><span style="padding: 5px 10px; background: white; border: solid black 1px; border-radius: 5px;font-weight: bold">No tienes obras pendientes por asginar</span></p>
                @endif
            </div>
            <div id="derecha-obras" class="">
                <h1 id="h1Formulario2">Obras asignadas</h1>
                @if(count($datosObras["con-tecnico"]) != 0)
                    @foreach($datosObras["con-tecnico"] as $obra)
                        <div class="obra">
                            <div class="titulo-obra d-flex justify-content-between" id="obra{{$obra->id}}" data-toggle="collapse" href="#obraCompleta{{$obra->id}}" aria-controls="obraCompleta{{$obra->id}}">
                                <p><b>ID: {{$obra->id}} </b>&nbsp{{ $obra->direccionString }}</p>
                                <div>
                                    <span><b>Estado:</b> <span>{{ $obra->estadoString}}</span></span>
                                </div>
                            </div>

                            <div id="obraCompleta{{$obra->id}}" class="collapse cuerpo-obra">
                                <div class="">
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <div><b>Estructura:</b> {{$obra->tipo_estructura}}</div>
                                        <div><b>Obra:</b> {{$obra->tipo_obra}}</div>
                                    </div>
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <div><b>Fecha de inicio:</b> {{$obra->fecha_inicio}}</div>
                                        <div><b>Fecha final:</b> {{$obra->fecha_fin}}</div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <div><b>Solicitante:</b> {{$obra->datosSolicitante["nombre"]}}</div>
                                        <div><b>Teléfono:</b> {{$obra->datosSolicitante["telefono"]}}</div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div><b>Email:</b> {{$obra->datosSolicitante["email"]}}</div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <div><b>Técnico:</b> {{$obra->datosTecnico["nombre"]}}</div>
                                        <div><b>Teléfono:</b> {{$obra->datosTecnico["telefono"]}}</div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div><b>Email:</b> {{$obra->datosTecnico["email"]}}</div>
                                    </div>
                                </div>
                                <div>
                                    <p><b>Descripción: </b>{{$obra->descripcion}}</p>
                                </div>
                                @if($obra->plano != null)
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <a href="/public/{{$obra->plano}}" class="botonDescargar">Descargar plano</a>
                                    </div>
                                @endif
                                <div class="w-100 d-flex flex-wrap apartadoCambiarTecnico">
                                    <h2 class="w-100" style="text-align: center">Cambiar técnico</h2>
                                    <div class="w-100 d-flex flex-wrap justify-content-center">
                                        <select id="cambiarTecnico{{$obra->id}}" class="margin-right">
                                            <option value="null">-- Selecciona un técnico --</option>
                                            @foreach($datosObras["tecnicos"] as $tecnico)
                                                <option value="{{$tecnico->id}}">{{$tecnico->nombre}} {{$tecnico->apellidos}}</option>
                                            @endforeach
                                        </select>
                                        <button onclick="cambiarTecnico({{$obra->id}})">Cambiar</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                        {{ $datosObras["con-tecnico"]->links('pagination::bootstrap-4') }}
                @else
                    <p class="d-flex justify-content-center"><span style="padding: 5px 10px; background: white; border: solid black 1px; border-radius: 5px;font-weight: bold">No hay obras asignadas</span></p>
                @endif
            </div>
            @else
                <div class="w-100 d-flex justify-content-center">
                    <div class="obra" id="unicaObra">
                        <div class="titulo-obra d-flex justify-content-between" id="obra{{$datosObras["unica"]->id}}" data-toggle="collapse" href="#obraCompleta{{$datosObras["unica"]->id}}" aria-controls="obraCompleta{{$datosObras["unica"]->id}}">
                            <p><b>ID: {{$datosObras["unica"]->id}} </b>&nbsp{{ $datosObras["unica"]->direccionString }}</p>
                            <div>
                                <span><b>Estado:</b> <span>{{ $datosObras["unica"]->estadoString}}</span></span>
                            </div>
                        </div>

                        <div id="obraCompleta{{$datosObras["unica"]->id}}" class="collapse cuerpo-obra">
                            <div class="">
                                <div class="d-flex justify-content-between flex-wrap">
                                    <div><b>Estructura:</b> {{$datosObras["unica"]->tipo_estructura}}</div>
                                    <div><b>Obra:</b> {{$datosObras["unica"]->tipo_obra}}</div>
                                </div>
                                <div class="d-flex justify-content-between flex-wrap">
                                    <div><b>Fecha de inicio:</b> {{$datosObras["unica"]->fecha_inicio}}</div>
                                    <div><b>Fecha final:</b> {{$datosObras["unica"]->fecha_fin}}</div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex justify-content-between flex-wrap">
                                    <div><b>Solicitante:</b> {{$datosObras["unica"]->datosSolicitante["nombre"]}}</div>
                                    <div><b>Teléfono:</b> {{$datosObras["unica"]->datosSolicitante["telefono"]}}</div>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <div><b>Email:</b> {{$datosObras["unica"]->datosSolicitante["email"]}}</div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex justify-content-between flex-wrap">
                                    <div><b>Técnico:</b> {{$datosObras["unica"]->datosTecnico["nombre"]}}</div>
                                    <div><b>Teléfono:</b> {{$datosObras["unica"]->datosTecnico["telefono"]}}</div>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <div><b>Email:</b> {{$datosObras["unica"]->datosTecnico["email"]}}</div>
                                </div>
                            </div>
                            <div>
                                <p><b>Descripción: </b>{{$datosObras["unica"]->descripcion}}</p>
                            </div>
                            @if($datosObras["unica"]->plano != null)
                                <div class="d-flex justify-content-between flex-wrap">
                                    <a href="/public/{{$datosObras["unica"]->plano}}" class="botonDescargar">Descargar plano</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </main>
@endsection
