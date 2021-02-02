@section("bloque_graficas")
    <div class="container" id="pagina">
        <div class="w-100 d-flex justify-content-center flex-wrap" id="buscadorEstadisticas">
            <form class="d-flex justify-content-center flex-wrap" method="post" action="{{route("buscadorCoordinador")}}" onsubmit="return validarNotNull()">
                @csrf
                <select name="mes" id="buscarMes">
                    <option value="null">--- Selecciona un mes ---</option>
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
                <button type="submit" class="margin-right"><span class="fa fa-search"></span>&nbspBuscar</button>
            </form>
        </div>
        <h1 class="h1-graficas"><b>Mes:</b> {{$datosGraficas["mes"]}}</h1>
        <div id="primer-bloque">
            <div id="queso">

            </div>
            <div id="barras">

            </div>
        </div>
        <h1 class="h1-graficas"><b>Año:</b> {{$datosGraficas["ano"]}}</h1>
        <div>
            <div id="lineas">

            </div>
        </div>

    </div>
@endsection
