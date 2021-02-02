function inicializarGraficaQueso(aceptadas,proceso,finalizadas,denegadas){
    let options = {
        series: [aceptadas, proceso, finalizadas, denegadas],
        chart: {
            type: 'pie',
        },
        labels: ['Aceptadas', 'En proceso', 'Finalizadas', 'Denegadas'],
        responsive: [{
            options: {
                legend: {
                    position: 'bottom'
                }
            }
        }],
    };

    let chart = new ApexCharts(document.querySelector("#queso"), options);
    chart.render();
}

function inicializarGraficaBarras(construccion,reforma,demolicion){
    let options = {
        series: [{
            name: 'Tipo de obra',
            data: [construccion,reforma,demolicion]
        }],
        chart: {
            height: 350,
            type: 'bar',
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    position: 'top', // top, center, bottom
                },
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val;
            },
            offsetY: -20,
            style: {
                fontSize: '12px',
                colors: ["black"]
            }
        },

        xaxis: {
            categories: ["Construccion","Reforma","Demolicion"],
            position: 'top',
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            },
            crosshairs: {
                fill: {
                    type: 'gradient',
                    gradient: {
                        colorFrom: '#D8E3F0',
                        colorTo: '#BED1E6',
                        stops: [0, 100],
                        opacityFrom: 0.4,
                        opacityTo: 0.5,
                    }
                }
            },
            tooltip: {
                enabled: true,
            }
        },
        yaxis: {
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false,
            },
            labels: {
                show: false,
                formatter: function (val) {
                    return val;
                }
            }

        },
        title: {
            text: 'Cantidad de obras por tipo de obra',
            floating: true,
            offsetY: 330,
            align: 'center',
            style: {
                color: '#444'
            }
        }
    };

    let chart = new ApexCharts(document.querySelector("#barras"), options);
    chart.render();
}

function inicializarGraficaLineas(aceptadas){
    let options = {
        chart: {
            height: 380,
            type: 'line' // se puede cambiar por 'area' y 'bar'
        },
        title: {
            text: 'Obras aceptadas año 2021', // Titulo de la grafica, se muestra en la parte superior
        },
        xaxis: {
            categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'], // son 7 valores, deben coincidir con los valores de los datos en las series.
        },
        series: [{
            name: "Año actual", // Nombre de la serie, se muestra cuando hay mas de 1 serie
            data: [aceptadas[0], aceptadas[1], aceptadas[2], aceptadas[3], aceptadas[4], aceptadas[5], aceptadas[6], aceptadas[7], aceptadas[8], aceptadas[9], aceptadas[10], aceptadas[11]] // valores hay 7 valores, debes coincidir con los valores de: xaxis
        }],
        colors:[ 'forestgreen' ]
        ,
        grid: {
            row: {
                colors: ['#e5e5e5','transparent'], // color de fondo separados por coma para alternarlos
            }
        }
    }

    let chart = new ApexCharts( document.querySelector("#lineas") , options);

    chart.render();
}

function validarNotNull(){
    let value = $("#buscarMes").val()
    if (value == "null"){
        $("#buscarMes").css("border","solid red 1px");
        return false;
    }else{
        $("#buscarMes").css("border","solid black 1px");
        return true;
    }
}






