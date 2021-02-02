function elegirVentana(){
    cookie = buscarCookie();
    if (cookie == undefined){
        document.cookie = "ventana=0";
    }
    let ventana = obtenerValorCookie(cookie);

    if (ventana == 0){
        $("#obras").trigger("click");
    }else{
        if (ventana == 1){
            $("#registro").trigger("click");
        }else{
            if (ventana == 2){
                $("#stats").trigger("click");
            }else{
                if (ventana == 3){
                    $("#usuarios").trigger("click");
                }
            }
        }
    }
}

function actualizarCookieVentana(valor){
    cookie = buscarCookie();
    if (cookie == undefined){
        document.cookie = "ventana=0";
    }else{
        document.cookie = "ventana="+valor;
    }


}

function buscarCookie(){
    let cookie = document.cookie;
    let cookies = cookie.split(";");
    cookie = cookies.find(c => c.includes("ventana="));
    return cookie;
}

function obtenerValorCookie(cookie){
    let contenidoArray = cookie.split("=");
    let contenido = contenidoArray[1];
    return contenido;
}
