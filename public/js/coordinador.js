$(document).ready(function () {
    $('#obras').click(function () {
        forzarToggle();
        //mostrar div asociado
        $('#bloqueObras').css("display", "block");
        //y ocultar demás bloques
        $('#bloqueRegistro,#bloqueStats,#bloqueUsuarios').css("display", "none");
        removerClasesActive();
        añadirClasesActive('#obras');
    });
    $('#registro').click(function () {
        forzarToggle();
        $('#bloqueRegistro').css("display", "block");
        $('#bloqueObras,#bloqueStats,#bloqueUsuarios').css("display", "none");
        removerClasesActive();
        añadirClasesActive('#registro');
    });
    $('#stats').click(function () {
        forzarToggle();
        $('#bloqueStats').css("display", "block");
        $('#bloqueObras,#bloqueRegistro,#bloqueUsuarios').css("display", "none");
        removerClasesActive();
        añadirClasesActive('#stats');
    });
    $('#usuarios').click(function () {
        forzarToggle();
        $('#bloqueUsuarios').css("display", "block");
        $('#bloqueObras,#bloqueRegistro,#bloqueStats').css("display", "none");
        removerClasesActive();
        añadirClasesActive('#usuarios');
    });
    var cookie = buscarCookie();
    if (cookie == undefined) {
        document.cookie = "ventana=0";
    }
    var ventana = obtenerValorCookie(cookie);
    if (ventana == "0") {
        $("#obras").trigger("click");
    }
    else {
        if (ventana == "1") {
            $("#registro").trigger("click");
        }
        else {
            if (ventana == "2") {
                $("#stats").trigger("click");
            }
            else {
                if (ventana == "3") {
                    $("#usuarios").trigger("click");
                }
            }
        }
    }
});
function removerClasesActive() {
    //remover clase active de los items del nav y font-weight-bold de los links del nav
    $('.topbar .nav-item').removeClass('active');
    $('.topbar .nav-item span').removeClass('font-weight-bold');
}
function añadirClasesActive(navItem) {
    //añadir clase active y font-weight-bold al link del navitem que está activo
    $(navItem).addClass('active');
    $(navItem + " span").addClass('font-weight-bold');
}
function forzarToggle() {
    //simular clic en resoluciones móviles para cerrar el menú
    if ($(window).width() < 576)
        $('#topbarToggle').click();
}
function cambiarTecnico(id) {
    var tecnico = $("#cambiarTecnico" + id).val();
    if (tecnico == "null") {
        $("#cambiarTecnico" + id).css("border", "solid red 1px");
    }
    else {
        $("#cambiarTecnico" + id).css("border", "solid black 1px");
        $.ajax({
            url: "php/cambioDeTecnico.php",
            type: "POST",
            data: { id: id, tecnico: tecnico },
            success: function (valor) {
                window.location.reload();
            }
        });
    }
}
function actualizarCookieVentana(valor) {
    var cookie = buscarCookie();
    if (cookie == undefined) {
        document.cookie = "ventana=0";
    }
    else {
        document.cookie = "ventana=" + valor;
    }
}
function buscarCookie() {
    var cookie = document.cookie;
    var cookies = cookie.split(";");
    cookie = cookies.find(function (c) { return c.includes("ventana="); });
    return cookie;
}
function obtenerValorCookie(cookie) {
    var contenidoArray = cookie.split("=");
    var contenido = contenidoArray[1];
    return contenido;
}
