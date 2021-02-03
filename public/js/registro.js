
var evento;

$(document).ready(function(){

    var placesAutocomplete = places({
        appId: 'pl56I4LZML91',
        apiKey: 'bc9d59afe10c3766fd6fba61355e38be',
        container: document.querySelector('#direccion'),
        countries:['es']
    });
    placesAutocomplete.on('change',function (e){
        evento = e.suggestion;
        console.log(evento);
        completarDireccion(evento);
    });




});
function completarDireccion(evento){
    $('#calle').val(evento.name);
    $('#cod_postal').val(evento.postcode);
    $('#latitud').val(evento.latlng.lat);
    $('#longitud').val(evento.latlng.lng);
}
