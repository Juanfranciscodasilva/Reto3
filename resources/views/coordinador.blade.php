@extends('layout')
@include('layout_footer')
@include('layout_nav')
@include('bloque_usuarios')
@include('bloque_obras')
@include ('registro-cuadro')
@include ('bloque_graficas')

@section('head')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Blank</title>
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/nav.css" rel="stylesheet" />
    <link href="css/footer.css" rel="stylesheet" />
    <link href="css/paginacion.css" rel="stylesheet" />
    <link href="css/obras.css" rel="stylesheet" />
    <link href="css/bloque_usuarios.css" rel="stylesheet" />
    <link href="css/bloque_obras.css" rel="stylesheet" />
    <link href="css/bloque_graficas.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style_registro.css"/>
    <link rel="stylesheet" href="css/style_plantilla_registro.css">
    <!--link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/coordinador.css">
    <link rel="stylesheet" href="css/apexchart.css">
    <script type="text/javascript" src="js/apexcharts.min.js"></script>



@endsection
@section('body')
    <body id="page-top">

        @yield('nav')
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">


                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand-sm navbar-light bg-white topbar static-top shadow collapse d-sm-flex" id="menu_secciones">

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav container justify-content-around px-4">
                            <!-- OBRAS -->
                            <li class="nav-item mx-1 active" id="obras">
                                <a class="nav-link" href="#" onclick="actualizarCookieVentana(0)">
                                    <span class="mr-2 d-inline text-gray-600 font-weight-bold small">Obras</span>
                                </a>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- REGISTRAR -->
                            <li class="nav-item mx-1" id="registro">
                                <a class="nav-link" href="#" onclick="actualizarCookieVentana(1)">
                                    <span class="mr-2 d-inline text-gray-600 small">Registrar</span>
                                </a>

                            </li>



                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- ESTADISTICAS -->
                            <li class="nav-item" id="stats">
                                <a class="nav-link" href="#" onclick="actualizarCookieVentana(2)">
                                    <span class="mr-2 d-inline text-gray-600 small">Estadísticas</span>
                                </a>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- USUARIOS -->
                            <li class="nav-item" id="usuarios">
                                <a class="nav-link" href="#" onclick="actualizarCookieVentana(3)">
                                    <span class="mr-2 d-inline text-gray-600 small">Usuarios</span>
                                </a>
                            </li>
                        </ul>
                    </nav>



                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-xxl bloque" id="bloqueObras">

                        <!-- Page Heading -->
                        @yield('bloque_obras')
                    </div>
                    <div class="container-fluid  bloque" id="bloqueRegistro">

                        <!-- Page Heading -->
                        @yield('registro-cuadro')

                    </div>
                    <div class="container-fluid bloque" id="bloqueStats">

                        <!-- Page Heading -->
                        @yield('bloque_graficas')

                    </div>
                    <div class="container-fluid bloque" id="bloqueUsuarios">

                        <!-- Page Heading -->
                        @yield('bloque_usuarios')

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Footer -->
        @yield('footer')
        <!-- End of Footer -->
        <!-- Bootstrap core JavaScript-->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="js/jquery-3.5.1.min.js"></script>


        <script src="js/app.js"></script>

        {{-- <script src="js/bootstrap.bundle.js"></script>--}}
        <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>{{-- script para algolia --}}
        <script src="js/coordinadoRegistroControl.js"></script>
        <script src="js/coordinador.js"></script>
        <script src="js/registro.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/bloque_graficas.js"></script>
    <script>
        inicializarGraficaQueso({{$datosGraficas["estados"]["aceptadas"]}},{{$datosGraficas["estados"]["proceso"]}},{{$datosGraficas["estados"]["finalizadas"]}},{{$datosGraficas["estados"]["denegadas"]}});

        inicializarGraficaBarras({{$datosGraficas["tipo_obras"]["construccion"]}},{{$datosGraficas["tipo_obras"]["reforma"]}},{{$datosGraficas["tipo_obras"]["demolicion"]}});

        inicializarGraficaLineas({{json_encode($datosGraficas["obras_aceptadas"])}});
    </script>
    </body>
@endsection
