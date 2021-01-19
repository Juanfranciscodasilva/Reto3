@extends('layout')
@include('layout_nav')
@include('layout_footer')

@section('head')
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ayuntamiento Vitoria-Gasteiz</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/nav.css" rel="stylesheet" />
    <link href="css/footer.css" rel="stylesheet" />
    <link href="css/usuario.css" rel="stylesheet" />
    <link href="css/obras.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
@endsection

@section('body')
    <body class="sb-nav-fixed">
    @yield('nav')
    <main class="container">
        <div class="d-lg-flex justify-content-between">
            <div id="izquierda" class="flex-column">
                <h1 id="h1Formulario" data-toggle="collapse" href="#formulario" aria-controls="formulario">Solicitar Nueva Obra <span id="iconoFormulario" class="fa fa-arrow-alt-circle-down"></span></h1>
                <h1 id="h1Formulario2">Solicitar Nueva obra</h1>
                <form class="collapse" id="formulario">
                    <div id="div-direccion">
                        <h2>Dirección</h2>
                        <div>
                            <label for="calle">Calle: </label> <input type="text" id="calle" name="calle" placeholder="Calle...">
                        </div>
                        <div>
                            <label for="portal">Portal: </label> <input type="text" id="portal" name="portal" placeholder="Portal...">
                        </div>
                        <div>
                            <label for="piso">Piso: </label> <input type="text" id="piso" name="piso" placeholder="Piso...">
                        </div>
                        <div>
                            <label for="mano">Mano: </label> <input type="text" id="mano" name="mano" placeholder="Mano...">
                        </div>
                        <div>
                            <label for="codpostal">Cod. Postal: </label> <input type="text" id="codpostal" name="codpostal" placeholder="Código postal...">
                        </div>
                    </div>
                    <div id="div-obra">
                        <h2>Obra</h2>
                        <div>
                            <label for="tipoEstructura">Tipo de estructura: </label>
                            <select id="tipoEstructura" name="estructura">
                                <option>Casa</option>
                                <option>Terreno</option>
                                <option>Apartamento</option>
                                <option>Edificio</option>
                                <option>Urbanizacion</option>
                            </select>
                        </div>
                        <div>
                            <label for="tipoObra">Tipo de obra: </label>
                            <select id="tipoObra" name="obra">
                                <option>Remodelacion</option>
                                <option>Construccion</option>
                                <option>Demolicion</option>
                            </select>
                        </div>
                        <div id="div-descripcion">
                            <label for="descripcion">Descripción: </label>
                            <textarea placeholder="Escriba una descripción..." id="descripcion" rows="3" name="descripcion"></textarea>
                        </div>

                        <div id="div-archivo">
                            <label for="archivo" id="adjuntarPlano" style="cursor: pointer">Adjuntar plano<span class="fa fa-check-circle" id="iconoArchivo"></span></label>
                            <input type="file" name="archivo" id="archivo">
                        </div>
                    </div>


                </form>
            </div>
            <div id="derecha" class="">
                <h1>Obras Solicitadas</h1>
                <div class="obra">
                    <div class="titulo-obra d-flex justify-content-between" id="obra1" data-toggle="collapse" href="#obraCompleta1" aria-controls="obraCompleta1">
                        <p>c/ voluntaria entrega 3 5D, Remodelación</p>
                        <div>
                            <span><b>Estado:</b> <span>En proceso</span></span>
                        </div>
                    </div>

                    <div id="obraCompleta1" class="collapse cuerpo-obra">
                        <div class="">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div><b>Estructura:</b> Apartamento</div>
                                <div><b>Obra:</b> Reforma</div>
                            </div>
                            <div class="d-flex justify-content-start">
                                <div><b>Fecha de inicio:</b> 19/01/2021</div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between flex-wrap">
                                <div><b>Técnico:</b> Juan Da Silva</div>
                                <div><b>Teléfono:</b> 999999999</div>
                            </div>
                            <div class="d-flex justify-content-start">
                                <div><b>Email:</b> juanfrancisco.dasilva@ikasle.egibide.org</div>
                            </div>
                        </div>
                        <div>
                            <p><b>Descripción: </b>Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit. Delectus dolores exercitationem
                                iusto natus porro quo repudiandae ut? Dolorem facilis fugit
                                libero nisi placeat temporibus. Accusamus beatae expedita
                                numquam sint tenetur!</p>
                        </div>
                    </div>
                </div>
                <div class="obra">
                    <div class="titulo-obra d-flex justify-content-between" id="obra2" data-toggle="collapse" href="#obraCompleta2" aria-controls="obraCompleta2">
                        <p>c/ ejemplo ejemplo 3 5D, Remodelación</p>
                        <div>
                            <span><b>Estado:</b> <span>Terminada</span></span>
                        </div>
                    </div>

                    <div id="obraCompleta2" class="collapse cuerpo-obra">
                        <div class="">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div><b>Estructura:</b> Apartamento</div>
                                <div><b>Obra:</b> Reforma</div>
                            </div>
                            <div class="d-flex justify-content-start">
                                <div><b>Fecha de inicio:</b> 19/01/2021</div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between flex-wrap">
                                <div><b>Técnico:</b> Juan Da Silva</div>
                                <div><b>Teléfono:</b> 999999999</div>
                            </div>
                            <div class="d-flex justify-content-start">
                                <div><b>Email:</b> juanfrancisco.dasilva@ikasle.egibide.org</div>
                            </div>
                        </div>
                        <div>
                            <p><b>Descripción: </b>Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit. Delectus dolores exercitationem
                                iusto natus porro quo repudiandae ut? Dolorem facilis fugit
                                libero nisi placeat temporibus. Accusamus beatae expedita
                                numquam sint tenetur!</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </main>
    @yield('footer')
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/usuario.js"></script>
    <script src="js/principal.js"></script>
    </body>
@endsection
