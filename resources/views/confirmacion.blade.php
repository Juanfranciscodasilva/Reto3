@extends('layout')
@include('layout_nav')
@include('layout_footer')

@section('body')
    <body>
    <div id="pagina">
    @yield('nav')
    <!-- Masthead-->
        <header class="masthead">

            <div class="container">

                <div class="text-uppercase h5 bg-light  shadow  border"  ><p id="text">Se ha enviado el correo a {{session('message') ?? 'tu correo electronico'}}
                    </p></div>
                <a class="btn btn-primary btn-xl text-uppercase shadow js-scroll-trigger m-4" href="/login">Iniciar Sesion</a>
            </div>
        </header>
        @yield('footer')
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/principal.js"></script>

    </body>
@endsection

@section('head')
    <!-- Google fonts-->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/inicio.css" rel="stylesheet" />
    <link href="css/nav.css" rel="stylesheet" />
    <link href="css/footer.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/confirmacion.css" rel="stylesheet" />
@endsection

