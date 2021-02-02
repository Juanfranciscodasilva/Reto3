var  arrayerrores  = []
var evento;


function validaciones(){
    arrayerrores = [];
    validarApellido()
    validarNombre()
    validarTelefono()
    pais()
    validarPass()
    validarPass2()
    validarPiso()
    validarNumeroPortal()
    validarDni()
    validarFecha()
    validarEmail()
 {
        $.ajax({
            url: "php/validacionesRegistro.php",
            type: "POST",
            data: {data: $('#dni').val(),email:$('#email').val() },
            success: function (valor) {

                if (valor == 'sidni') {

                    $('#dni').css('border', '1px solid red')
                    arrayerrores.push('#dni')


                    }else
                    { if ( valor == 'sicorreo'){
                        $('#email').css('border', '1px solid red')
                        arrayerrores.push('#email')
                    }else{
                        if (arrayerrores.length==0)
                        {
                            enviarFormulario()
                        }

                    }

                    }
                }



        });
    }

console.log(arrayerrores)
}

function enviarFormulario(){
    $("#myform").first().submit();
}

function validarNombre(){

    let name : string | number | string[] = $('#nombre').val();
    let patron = RegExp("^[A-zÀ-ÿ]+([ ]+[A-zÀ-ÿ]+)*$");
    try{
        if(!validarVacio(name)){

            $('#nombre').css('border','1px solid red')
            arrayerrores.push('#nombre')
            return false
        }else {
            if (patron.test(<string>name)){

                $('#nombre').css('border','1px solid green');
                return  true
            }else {
                $('#nombre').css('border','1px solid orange')
                arrayerrores.push('#nombre')
                return false

            }
        }

    }
    catch(err){
      alert(err);
    }
}

function validarApellido(){

    let apellido : string | number | string[] = $('#apellidos').val();
    let patron = RegExp("^[A-zÀ-ÿ]+([ ]+[A-zÀ-ÿ]+)*$");
    try{
        if(!validarVacio(apellido)){

            $('#apellidos').css('border','1px solid red')
            arrayerrores.push('#apellidos')
            return false
        }else {
            if (patron.test(<string>apellido)){

                $('#apellidos').css('border','1px solid green');

                return  true
            }else {
                $('#apellidos').css('border','1px solid orange')
                arrayerrores.push('#apellidos')
                return false
            }
        }

    }
    catch(err){
        alert(err);
    }
}

function validarDni(){

    let  dni : string | number | string[] = $('#dni').val();
    let patron = RegExp("^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$");
    try{
        if(!validarVacio(dni)){

            $('#dni').css('border','1px solid red')
            arrayerrores.push('#dni')
            return false
        }else {
            if (patron.test(<string>dni)){

                $('#dni').css('border','1px solid green');
                return  true
            }else {
                $('#dni').css('border','1px solid orange')
                arrayerrores.push('#dni')
                return false
            }
        }

    }
    catch(err){
        alert(err);
    }
}

function pais(){

    let pais : string | number | string[] = $('#pais').val();
    let patron = RegExp("^[A-zÀ-ÿ]+([ ]+[A-zÀ-ÿ]+)*$");
    try{
        if(!validarVacio(pais)){

            $('#pais').css('border','1px solid red')
            arrayerrores.push('#pais')

            return false
        }else {
            if (patron.test(<string>pais)){

                $('#pais').css('border','1px solid green');
                return  true
            }else {
                $('#pais').css('border','1px solid orange')
                arrayerrores.push('#pais')
                return false
            }
        }

    }
    catch(err){
        alert(err);
    }
}

function validarTelefono(){

    let telefono : string | number | string[] = $('#tel').val();
    let patron = RegExp("^[9|6]{1}[0-9]{8}$");
    try{
        if(!validarVacio(telefono)){

            $('#tel').css('border','1px solid red')
            arrayerrores.push('#telefono')

            return false
        }else {
            if (patron.test(<string>telefono)){

                $('#tel').css('border','1px solid green');


                return  true
            }else {
                $('#tel').css('border','1px solid orange')
                arrayerrores.push('#telefono')

                return false
            }
        }

    }
    catch(err){
        alert(err);
    }
}


function validarPass(){

    let pass : string | number | string[] = $('#pass').val();
    let patron = RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$");
    try{
        if(!validarVacio(pass)){

            $('#pass').css('border','1px solid red')
            arrayerrores.push('#pass')

            return false
        }else {
            if (patron.test(<string>pass)){

                $('#pass').css('border','1px solid green');
                return  true
            }else {
                $('#pass').css('border','1px solid orange')
                arrayerrores.push('#pass')

                return false
            }
        }

    }
    catch(err){
        alert(err);
    }
}
function validarNumeroPortal(){

    let np : string | number | string[] = $('#numero').val();
    let patron = RegExp("[1-9]+[0-9]*");
    try{
        if(!validarVacio(np)){

            $('#numero').css('border','1px solid red')
            arrayerrores.push('#numero')

            return false
        }else {
            if (patron.test(<string>np)){

                $('#piso').css('border','1px solid green');
                return  true
            }else {
                $('#numero').css('border','1px solid orange')
                arrayerrores.push('#numero')

                return false
            }
        }

    }
    catch(err){
        alert(err);
    }
}

function validarPiso(){

    let piso : string | number | string[] = $('#piso').val();
    let patron = RegExp("^[0-9]+[\\- ]?[a-zA-Z]+$");
    try{
        if(!validarVacio(piso)){

            $('#piso').css('border','1px solid red')
            arrayerrores.push('#piso')

            return false
        }else {
            if (patron.test(<string>piso)){

                $('#piso').css('border','1px solid green');
                return  true
            }else {
                $('#piso').css('border','1px solid orange')
                arrayerrores.push('#piso')

                return false
            }
        }

    }
    catch(err){
        alert(err);
    }
}

function validarPass2(){

    let pass2 : string | number | string[] = $('#pass2').val();
    let pass1 : string | number | string[] = $('#pass').val();
    try{
        if(!validarVacio(pass2)){
            $('#pass2').css('border','1px solid red')
            return true;
        }
        if (pass2!=pass1) {
            $('#pass2').css('border','1px solid orange')
            arrayerrores.push('#pass2')
            return false;
        }else {
            $('#pass2').css('border','1px solid green');
            return true
        }

    }
    catch(err){
        alert(err);
    }
}

function validarFecha(){

    let fecha : string | number | string[] = $('#fnacimiento').val();

    try{
        if(!validarVacio(fecha)){
            $('#fnacimiento').css('border','1px solid red')
            arrayerrores.push('#fnacimiento')
            return true;
        }else {
            $('#fnacimiento').css('border','1px solid green')

        }

    }
    catch(err){
        alert(err);
    }
}

function validarEmail(){

    let email : string | number | string[] = $('#email').val();

    try{
        if(!validarVacio(email)){
            $('#email').css('border','1px solid red')
            arrayerrores.push('#calle')
            return true;
        }else {
            $('#email').css('border','1px solid green')

        }

    }
    catch(err){
        alert(err);
    }
}

function validarVacio(valorCampo){
    if (valorCampo == ""){
        return false;
    }else {
        return true;

    }

}

