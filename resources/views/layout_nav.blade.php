

@section('nav')
    <nav class="navbar navbar-expand-lg navbar-dark" id="mainNav">
        <div class="container">
            <img src="img/logos/logo.jpg" alt="logo" class="img-fluid" id="logo" />
            <button class="navbar-toggler navbar-toggler-right d-lg-block" onclick="redireccionarLogin()">
                {{ $botonNav }}
            </button>
        </div>
    </nav>
@endsection

