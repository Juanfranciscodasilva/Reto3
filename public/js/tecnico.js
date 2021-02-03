
let marcadores = [];

const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'

let myMap;


function crearMarcadorMapa(latitud , longitud, calle){
    datos = [latitud,longitud,calle];
    marcadores.push(datos);
}

function establecerMarcadores(){
    for (let x=0;x<marcadores.length;x++){
       let marker= L.marker([marcadores[x][0],marcadores[x][1]]).addTo(myMap).bindPopup(marcadores[x][2]).openPopup();
    }
}

function inicializarMapa(){
     myMap = new L.map('map').setView([42.84680995240553, -2.673352714193902],12)

    L.tileLayer(tilesProvider,{
        maxZoom: 18,
    }).addTo(myMap)
}

function cambiarIconoComentarios(id){
    let estado = $("#comentariosObra"+id)[0].classList.value;
    if (estado == "collapse"){
        $("#iconoComentario"+id).addClass('fa fa-chevron-up').removeClass('fa fa-chevron-down');
    }else{
        $("#iconoComentario"+id).addClass('fa fa-chevron-down').removeClass('fa fa-chevron-up');
    }
}
