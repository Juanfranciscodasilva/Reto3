$('#formulario').on('show.bs.collapse', function() {
    $("#iconoFormulario").addClass('fa fa-arrow-alt-circle-up').removeClass('fa fa-arrow-alt-circle-down');
});

$('#formulario').on('hide.bs.collapse', function() {
    $("#iconoFormulario").addClass('fa fa-arrow-alt-circle-down').removeClass('fa fa-arrow-alt-circle-up');
});

$('#archivo').change(function (){
        if ($("#archivo").val()== ""){
            alert($("#archivo").val());
            $("#iconoArchivo").css("display","none");
        }else{
            alert($("#archivo").val());
            $("#iconoArchivo").css("display","inline");
        }

});