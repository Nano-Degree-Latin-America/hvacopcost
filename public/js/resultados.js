var chart;
$(document).ready(function () {

    $('#btn-imprimir').on('click', function () {
        // printDiv('content');
        $('#settingsIcon').addClass('hidden');
        $('.static-content').addClass('hidden');
        $('#resultadoContent').removeClass('center');
        window.print()
        setTimeout(() => {
            $('#settingsIcon').removeClass('hidden')
            $('.static-content').removeClass('hidden');
            $('#resultadoContent').addClass('center');
        }, 100);
    });
    $('#logoSitio').on('click', function () {
        localStorage.clear();
    });
    calcularCostos();
    $('#cheValorS').text().length > 1  ? true : $('#cheValorS').text('$0')

    $('#porcentaje').on('keypress',function(e) {
        if(e.which == 13) {
            recalcular();
        }
    });
    $( window ).scroll(function() {
        $(window).scrollTop() < 460 && bannersDown();
        $(window).scrollTop() > 900 && bannersUp();
      });

})

function bannersDown(){
    $('.static-content').addClass('bannerDown');
    $('.static-content').removeClass('bannerUp');
}
function bannersUp(){
    $('.static-content').removeClass('bannerDown');
    $('.static-content').addClass('bannerUp');
    $('.static-content').removeClass('lhide');
    $('.static-content').removeClass('rhide');
}

function printDiv(nombreDiv) {
    var contenido = document.getElementById(nombreDiv).innerHTML;
    var contenidoOriginal = document.body.innerHTML;

    document.body.innerHTML = contenido;

    window.print();

    document.body.innerHTML = contenidoOriginal;
}

function calcularCostos() {
    var unidad = $('#cUnidad').text(); //0-tr; 1-Kw; 2-Btuh
    var capacidadEquipo = $('#cSize').text();
    var capacidadEquipo2 = $('#cSize2').text();
    var tarifa = $('#cTarifa').text();
    var hrs = $('#hrsEnfriado').text();
    var valorEstandarActual = $('#csStdValue').text();
    var valorEstandarPropuesto = $('#cheStdValue').text();
    var costoEnergiaActual = calcularCostoEnergia(unidad, capacidadEquipo, tarifa, hrs, valorEstandarActual);
    var costoEnergiaPropuesto = calcularCostoEnergia(unidad, capacidadEquipo2, tarifa, hrs, valorEstandarPropuesto);
    var roiActual = calcularCoolingActual(costoEnergiaActual);
    var roiPropuesto = calcularCoolingPropuesto(costoEnergiaPropuesto);
    var diferencia = Number.isNaN(parseFloat($('#resultadoCs').text().replace(/,/g, '')) - parseFloat($('#resultadoChe').text().replace(/,/g, ''))) ? 0 : parseFloat($('#resultadoCs').text().replace(/,/g, '')) - parseFloat($('#resultadoChe').text().replace(/,/g, ''))
    let lblDiferencia = "";
    let cont = 0;
    for(let i = diferencia.toFixed().length -1; i >= 0; i--){
        cont % 3 == 0 && i != diferencia.toFixed().length -1 ? lblDiferencia = diferencia.toFixed().charAt(i)+','+lblDiferencia  : lblDiferencia = diferencia.toFixed().charAt(i)+lblDiferencia ;
        cont ++;
    }
    $('#diferencia').text(lblDiferencia);
    calcularRoi(roiActual, roiPropuesto);
    let roiActualAcum = [];
    let roiPropuestoAcum = [];
    roiActual.map((valor, i)=>{
        acum = i == 0 ? 0 : roiActualAcum[i-1]
        roiActualAcum.push((parseFloat(acum) + parseFloat(valor)+""))
    });
    roiPropuesto.map((valor, i)=>{
        acum = i == 0 ? 0 : roiPropuestoAcum[i-1]
        roiPropuestoAcum.push((parseFloat(acum) + parseFloat(valor)+""))
    });
    pintarGraficaDiferencia(roiActualAcum, roiPropuestoAcum);
}

function calcularRoi(roiActual, roiPropuesto) {
    var diferencia = [];
    var data = [];
    var costoEquipo1 = $('#cheValorS').text().replaceAll(',', '').substring(1);
    var costoEquipo2 = $('#cheValorS2').text().replaceAll(',', '').substring(1);
    var costoEquipo = costoEquipo2 - costoEquipo1;
    var roi = [];
    for (let i = 0; i < roiActual.length; i++) {
        diferencia.push((roiActual[i] - roiPropuesto[i]).toFixed());
    }
    for (let i = 0; i < diferencia.length; i++) {
        i == 0 ? data.push(diferencia[i]) : data.push(parseFloat(data[i - 1]) + parseFloat(diferencia[i]))
        roi.push((((data[i] - costoEquipo) / (costoEquipo)).toFixed(2) * 100));
    }
    let diferenciaAcum = [0];
    diferencia.map((valor,i) => {
        diferenciaAcum.push(parseFloat(diferenciaAcum[i]) + parseFloat(valor))
    })
    pintarGraficaRoi(roi);
    pintarGraficaDiferencia2(diferenciaAcum);
}

function calcularCoolingActual(costoEnergia) {
    var sistema = $('#csTipo').text(); //0-Estandar; 1-Split; 2-Mini Split; 3-VRF; 4-C/Economizador; 5-C/Economizador y VAV; 6-Chillers Standard; 7-Chillers Variable;
    var disenio = $('#csDisenio').text(); //0-ASHRAE 55/62.1/90.1; 1-Basico; 2-Basico c/ducto flexible; 3-ducto Flex. y Plenum Ret.
    var mantenimiento = $('#csMantenimiento').text(); //0-ASHRAE 180 Proactivo; 1-Deficiente; 2-Sin mantenimiento

    // var costoEnergia = calcularCostoEnergia(unidad);
    var sistemaValue = calcularCostoSistema(costoEnergia, sistema);
    var disenioValue = calcularCostoDisenio(costoEnergia, disenio);
    var mantenimientoValue = calcularCostoMantenimiento(costoEnergia, mantenimiento);

    var tipoEstandar = $('#csStd').text(); //0-SEER; 1-IEER; 2-IPVL; 3-AFUE
    var resultado = pintarResultados(costoEnergia, sistemaValue, disenioValue, mantenimientoValue);
    var resultadoCs = Number.isNaN( resultado) ? 0 : resultado
    let lblResultadoCs = "";
    let cont = 0;
    for(let i = resultadoCs.toFixed().length -1; i >= 0; i--){
        cont % 3 == 0 && i != resultadoCs.toFixed().length -1 ? lblResultadoCs = resultadoCs.toFixed().charAt(i)+','+lblResultadoCs  : lblResultadoCs = resultadoCs.toFixed().charAt(i)+lblResultadoCs ;
        cont ++;
    }
    $('#resultadoCs').text(lblResultadoCs);
    var incrementoActual = incrementoElectrico(resultado, $('#porcentaje').val());
    return incrementoActual;

}

function calcularCoolingPropuesto(costoEnergia) {
    var sistema = $('#cheTipo').text(); //0-Estandar; 1-Split; 2-Mini Split; 3-VRF; 4-C/Economizador; 5-C/Economizador y VAV; 6-Chillers Standard; 7-Chillers Variable;
    var disenio = $('#cheDisenio').text(); //0-ASHRAE 55/62.1/90.1; 1-Basico; 2-Basico c/ducto flexible; 3-ducto Flex. y Plenum Ret.
    var mantenimiento = $('#cheMantenimiento').text(); //0-ASHRAE 180 Proactivo; 1-Deficiente; 2-Sin mantenimiento

    // var costoEnergia = calcularCostoEnergia(unidad);
    var sistemaValue = calcularCostoSistema(costoEnergia, sistema);
    var disenioValue = calcularCostoDisenio(costoEnergia, disenio);
    var mantenimientoValue = calcularCostoMantenimiento(costoEnergia, mantenimiento);
    var tipoEstandar = $('#csStd').text(); //0-SEER; 1-IEER; 2-IPVL; 3-AFUE
    var resultado = pintarResultados(costoEnergia, sistemaValue, disenioValue, mantenimientoValue);
    var resultadoChe = Number.isNaN( resultado) ? 0 : resultado
    let lblResultadoChe = "";
    let cont = 0;
    for(let i = resultadoChe.toFixed().length -1; i >= 0; i--){
        cont % 3 == 0 && i != resultadoChe.toFixed().length -1 ? lblResultadoChe = resultadoChe.toFixed().charAt(i)+','+lblResultadoChe  : lblResultadoChe = resultadoChe.toFixed().charAt(i)+lblResultadoChe ;
        cont ++;
    }
    $('#resultadoChe').text(lblResultadoChe);
    var incrementoPropuesto = incrementoElectrico(resultado, $('#porcentaje').val());
    return incrementoPropuesto;
}

function calcularCostoEnergia(unidad, capacidadEquipo, tarifa, hrs, valorEstandar) {
    var costoEnergia;
    switch (unidad) {
        case '0':
            costoEnergia = ((capacidadEquipo * 12000) * hrs * (tarifa) / valorEstandar) / 1000;
            break;
        case '1':
            costoEnergia = (((capacidadEquipo / 3.5) * 12000) * hrs * (tarifa) / valorEstandar) / 1000;
            break;
        case '2':
            costoEnergia = ((capacidadEquipo) * hrs * (tarifa) / valorEstandar) / 1000;
            break;

        default:
            break;
    }
    return costoEnergia;

}

function calcularCostoSistema(costo, sistema) {
    var costoSistema;
    switch (sistema) {
        case '0':
            costoSistema = costo;
            break;
        case '1':
            costoSistema = costo / 0.94;
            break;
        case '2':
            costoSistema = costo / 0.85;
            break;
        case '3':
            costoSistema = costo / 0.91;
            break;
        case '4':
            costoSistema = costo / 0.9;
            break;
        case '5':
            costoSistema = costo / 0.86;
            break;
        case '6':
            costoSistema = costo / 0.84;
            break;
        case '7':
            costoSistema = costo / 0.82;
            break;

    }

    return costoSistema;
}

function calcularCostoDisenio(costo, disenio) {
    var costoDisenio;
    switch (disenio) {
        case '0':
            costoDisenio = 0;
            break;
        case '1':
            costoDisenio = costo * 0.25;
            break;
        case '2':
            costoDisenio = costo * 0.34;
            break;
        case '3':
            costoDisenio = costo * 0.4;
            break;

    }
    return costoDisenio;
}

function calcularCostoMantenimiento(costo, mantenimiento) {
    var costoMantenimiento;
    switch (mantenimiento) {
        case '0':
            costoMantenimiento = 0;
            break;
        case '1':
            costoMantenimiento = costo * 0.15;
            break;
        case '2':
            costoMantenimiento = costo * 0.3;
            break;
    }
    return costoMantenimiento;
}

function pintarResultados(costo, sistema, disenio, mantenimiento) {
    let resultado = sistema + disenio + mantenimiento;
    //pintarGrafica(resultado.toFixed(), $('#porcentaje').val());
    return resultado;
}

function recalcular() {
    chart.destroy();
    //pintarGrafica($('#resultadoCs').text(), $('#porcentaje').val());
    calcularCostos();
}

function incrementoElectrico(costo, porcentaje) {
    porcentaje = 1 + (porcentaje / 100);
    var costoAnio = [];
    for (let i = 0; i < 20; i++) {
        costoAnio.push((costo * (Math.pow(porcentaje, i))).toFixed());
    }
    return costoAnio;
}

function pintarGraficaRoi(data) {
    var ctx = document.getElementById('myChart').getContext('2d');
    chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Año 03", "Año 05", "Año 10", "Año 15"],
            datasets: [
                {

                    borderColor: ["#2196F3", "#512DA8", "#00897b", "#ff4081", "#dd2c00"],
                    borderWidth: 1,
                    backgroundColor: ["rgba(3, 169, 244,.3)", "rgba(103, 58, 183,.5)", "rgba(0, 150, 136,.5)", "rgba(255, 82, 82,.5)", "rgba(216, 67, 21,.5)"],
                    data: [(data[2]), data[4], data[9], data[14]]
                }
            ]
        },
        options: {
            legend: {
                display: false,
            },
            title: {
                display: true,
                text: '',
                fontSize: 14
            },
            tooltips: {
                enabled: true

            },
            hover: {
                animationDuration: 1
            },
            animation: {
                duration: 1,

                onComplete: function () {
                    var chartInstance = this.chart,
                        ctx = chartInstance.ctx;
                    ctx.textAlign = 'center';
                    ctx.fillStyle = "rgba(0, 0, 0, 1)";
                    ctx.textBaseline = 'bottom';
                    // Loop through each data in the datasets
                    this.data.datasets.forEach(function (dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function (bar, index) {
                            var data = dataset.data[index];
                            ctx.fillText(data.toFixed() + '%', bar._model.x, bar._model.y - 5);
                        });
                    });
                }
            }
        }
    });

}

function pintarGraficaDiferencia(data1, data2) {
    const actual = {
        label: "Costo actual",
        data: [data1[2], data1[4], data1[9], data1[14], data1[19]],
        backgroundColor: ["rgba(216, 67, 21,.1)"],
        borderColor: ["#dd2c00"],
        borderWidth: 1,// Ancho del borde
    };
    const propuesto = {
        label: "Costo propuesto",
        data: [data2[2], data2[4], data2[9], data2[14], data2[19]],
        backgroundColor: ["rgba(0, 150, 136,.1)"],
        borderColor: ["#00897b"],
        borderWidth: 1,// Ancho del borde
    };
    var ctx2 = document.getElementById('myChart2').getContext('2d');
    chart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Año 03", "Año 05", "Año 10", "Año 15", "Año 20"],
            datasets: [
                    actual, propuesto
            ]
         },
        options: {
            scales: {
                yAxes: [{
                  ticks: {
                    fontColor: '#f5f5f5'
                  },
                }],
              },
            legend: {
                display: true,
            },
            title: {
                display: true,
                text: '',
                fontSize: 13
            },
            tooltips: {
                enabled: true

            },
            hover: {
                animationDuration: 1
            },
            animation: {
                duration: 1,

                onComplete: function () {
                    var chartInstance = this.chart,
                    ctx2 = chartInstance.ctx;
                    ctx2.textAlign = 'center';
                    ctx2.fillStyle = "rgba(0, 0, 0, 1)";
                    ctx2.textBaseline = 'bottom';
                    // Loop through each data in the datasets
                    this.data.datasets.forEach(function (dataset, i) {
                        if(i == 1){
                            ctx2.textBaseline = 'top';
                        }
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function (bar, index) {
                            let data = dataset.data[index];
                            let lblValor="";
                            let cont = 0;
                            for(let i = data.length -1; i >= 0; i--){
                                cont % 3 == 0 && i != data.length -1 ? lblValor = data.charAt(i)+','+lblValor  : lblValor = data.charAt(i)+lblValor ;
                                cont ++;
                            }

                            ctx2.fillText('$'+lblValor+'           ', bar._model.x, bar._model.y - 5);
                        });
                    });
                }
            }
        }
     });

}
function pintarGraficaDiferencia2(data) {
    const actual = {
        label: "Costo actual",
        data: [data[3], data[5], data[10], data[15], data[20]],
        backgroundColor: ["rgba(0, 150, 136,.1)"],
        borderColor: ["#00897b"],
        borderWidth: 1,// Ancho del borde
    };

    var ctx2 = document.getElementById('myChart3').getContext('2d');
    chart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Año 03", "Año 05", "Año 10", "Año 15", "Año 20"],
            datasets: [
                    actual
            ]
         },
        options: {
            scales: {
                yAxes: [{
                  ticks: {
                    fontColor: '#f5f5f5'
                  },
                }],
              },
            legend: {
                display: true,
            },
            title: {
                display: true,
                text: '',
                fontSize: 13
            },
            tooltips: {
                enabled: true

            },
            hover: {
                animationDuration: 1
            },
            animation: {
                duration: 1,

                onComplete: function () {
                    var chartInstance = this.chart,
                    ctx2 = chartInstance.ctx;
                    ctx2.textAlign = 'center';
                    ctx2.fillStyle = "rgba(0, 0, 0, 1)";
                    ctx2.textBaseline = 'bottom';
                    // Loop through each data in the datasets
                    this.data.datasets.forEach(function (dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function (bar, index) {
                            let data = dataset.data[index] +"";
                            let lblValor="";
                            let cont = 0;
                            for(let i = data.length -1; i >= 0; i--){
                                cont % 3 == 0 && i != data.length -1 ? lblValor = data.charAt(i)+','+lblValor  : lblValor = data.charAt(i)+lblValor ;
                                cont ++;
                            }
                            ctx2.fillText('$'+lblValor+'            ', bar._model.x, bar._model.y - 5);
                        });
                    });
                }
            }
        }
     });

}
