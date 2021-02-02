@section('registro-cuadro')
<div class="page-content" style="background: white">
    <div class="form-v10-content container-fluid g-0" >
        <form class="form-detail row g-0" action="{{route('envio')}}"  method="post" id="myform">
            @csrf
            <div class="form-left col-md-6">
                <h2>Formulario de registro</h2>
                <div class="form-group row g-0">
                    <div class="form-row form-row-1 col-6">
                        <input type="text" name="nombre" value="{{old('nombre')}}" id="nombre" class="form-control input-text" placeholder="Nombre">
                        {!! $errors->first('nombre',
                        '<div class="mensaje_error">
                            :message
                        </div>')!!}
                    </div>
                    <div class="form-row form-row-2 col-6">
                        <input type="text" name="apellidos" value="{{old('apellidos')}}" id="apellidos" class="form-control input-text" placeholder="Apellidos">
                        {!! $errors->first('apellidos',
                        '<div class="mensaje_error">
                            :message
                        </div>')!!}
                    </div>
                </div>
                <div class="form-group row g-0">
                    <div class="form-row form-row-1 col-6">
                        <input type="text" name="dni" value="{{old('dni')}}" id="dni" class="form-control" placeholder="Dni">
                        {!! $errors->first('dni',
                        '<div class="mensaje_error">
                            :message
                        </div>')!!}
                        @isset($registro)
                            <div class="mensaje_error">
                                Este DNI ya está registrado
                            </div>
                        @endisset
                    </div>
                    <div class="form-row form-row-2 col-6">
                        <input type="date" name="fnacimiento" value="{{old('fnacimiento')}}" id="fnacimiento" class="form-control" placeholder="Fecha de nacimiento">
                        {!! $errors->first('fnacimiento',
                        '<div class="mensaje_error">
                            :message
                        </div>')!!}
                    </div>
                </div>
                <div class="form-group row g-0">
                    <div class="form-row form-row-1 col-6">
                        <input type="text" name="pais_nacimiento" value="{{old('pais_nacimiento')}}" id="pais" class="form-control" placeholder="País de nacimiento">
                        {!! $errors->first('pais_nacimiento',
                        '<div class="mensaje_error">
                            :message
                        </div>')!!}
                    </div>
                    <div class="form-row form-row-2 col-6">
                        <input type="tel" name="tel" value="{{old('tel')}}" id="tel" class="form-control" placeholder="Teléfono">
                        {!! $errors->first('tel',
                        '<div class="mensaje_error">
                            :message
                        </div>')!!}
                    </div>
                </div>
                <div class="form-group row g-0">
                    <div class="form-row form-row-1 col-6">
                        <input type="password" name="pass" value="{{old('pass')}}" id="pass" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Contraseña">
                        {!! $errors->first('pass',
                        '<div class="mensaje_error">
                            :message
                        </div>')!!}
                    </div>
                    <div class="form-row form-row-2 col-6">
                        <input type="password" name="pass2" value="{{old('pass2')}}" id="pass2" class="form-control" placeholder="Repite contraseña">
                        {!! $errors->first('pass2',
                        '<div class="mensaje_error">
                            :message
                        </div>')!!}
                    </div>
                    <div class="form-row form-row-2 col-6 " style="padding: 0 12px 0 60px">
                        <P>Rol:</P>
                    <select name="rol">
                        <option value="0">Coordinador</option>
                        <option value="1">Tecnico</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="form-right col-md-6">
                <h2>Datos de contacto</h2>
                <div class="form-row">
                    <input type="text" name="direccion" value="{{old('direccion')}}" id="direccion" class="form-control" placeholder="Calle">
                    {!! $errors->first('direccion',
                       '<div class="mensaje_error">
                           :message
                       </div>')!!}
                </div>
                <div class="form-group row g-0">
                    <div class="form-row form-row-1 col-6">
                        <input type="text" name="numero" value="{{old('numero')}}" id="numero" class="form-control" placeholder="Número">
                        {!! $errors->first('numero',
                        '<div class="mensaje_error">
                            :message
                        </div>')!!}
                    </div>
                    <div class="form-row form-row-2 col-6">
                        <input type="text" name="piso" value="{{old('piso')}}" id="piso" class="form-control" placeholder="Piso">
                        {!! $errors->first('piso',
                        '<div class="mensaje_error">
                            :message
                        </div>')!!}
                    </div>
                </div>
                <div class="form-row">
                    <input type="text" name="email" value="{{old('email')}}" id="email" class="form-control input-text" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Email">
                    {!! $errors->first('email',
                    '<div class="mensaje_error">
                        :message
                    </div>')!!}
                </div>
                <div class="form-checkbox form-check">
                    <label class="form-check-label" for="condiciones"><p>Acepto los <a href="#" class="text">Términos y condiciones</a> de este sitio web.</p>
                        <input type="checkbox" name="condiciones" id="condiciones" class="form-check-input" checked>
                        <span class="checkmark"></span>
                    </label>
                    {!! $errors->first('condiciones',
                       '<div class="mensaje_error">
                           :message
                       </div>')!!}
                </div>
                <div class="form-row-last">
                    <input type="button" onclick="validaciones()" class="register" value="Registrarse">
                </div>
                <input type="hidden" name="calle" id="calle">
                <input type="hidden" name="cod_postal" id="cod_postal">
                <input type="hidden" name="latitud" id="latitud">
                <input type="hidden" name="longitud" id="longitud">
            </div>
        </form>
    </div>
</div>
@endsection


