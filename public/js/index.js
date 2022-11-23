// var sc = require('state-cities-db');

$(document).ready(function () {
    cap_term_change('TR');
    $('#pais').val($('#paises option:selected').text());
    $('#ciudad').val($('#ciudades option:selected').text());
    getPaises();
    traer_categorias_edif();
    $('#div_next_h').addClass("hidden");
 /*    $('#next').attr('disabled', true); */
    //selecciona pais -> pinta ciudades de ese pais en el select
    $('#paises').on('change', function () {
        getCiudades($('#paises').val());
    });
    //selecciona ciudad -> obtiene coolingo y heating hours
    $('#ciudades').on('change', function () {
        getDegreeHrs($('#paises').val(), $('#ciudades').val());
    });

    //se asigna el valor del select de unidad para mostrarlo en resultados
    $('#cUnidad').on('change', function () {
        $('#cUnidadLbl').val($('#cUnidad option:selected').text());
    });

    //se asigna el valor del select del estandar en enfriamiento actual para mostrarlo en resultados
    $('#csStd').on('change', function () {
        $('#cHEStandard').text($('#csStd option:selected').text());
        $('#lblCsStd').val($('#csStd option:selected').text());
    });

    //se asigna el valor del select de tipo de sistema en enfriamiento actual y propuesto para mostrarlo en resultados
    $('#csTipo').on('change', function () {
        $('#lblCsTipo').val($('#csTipo option:selected').text());
    });
    $('#cheTipo').on('change', function () {
        $('#lblCheTipo').val($('#cheTipo option:selected').text());
    });
    //se asigna el valor del select de diseño en enfriamiento actual y propuesto para mostrarlo en resultados
    $('#csDisenio').on('change', function () {
        $('#lblCsDisenio').val($('#csDisenio option:selected').text());
    });
    $('#cheDisenio').on('change', function () {
        $('#lblCheDisenio').val($('#cheDisenio option:selected').text());
    });
    //se asigna el valor del select de mantenimiento en enfriamiento actual y propuesto para mostrarlo en resultados
    $('#csMantenimiento').on('change', function () {
        $('#lblCsMantenimiento').val($('#csMantenimiento option:selected').text());
    });
    $('#cheMantenimiento').on('change', function () {
        $('#lblCheMantenimiento').val($('#cheMantenimiento option:selected').text());
    });

    $('#cTarifa').on('change', function () {
        $('#cTarifa2').val($('#cTarifa').val());
    });
    $('#hrsEnfriado').on('change', function () {
        $('#hrsEnfriado2').val($('#hrsEnfriado').val());
    });
    $('#csStd').on('change', function () {
        $('#csStd2').val($('#csStd').val());
    });
    $('#cUnidad').on('change', function () {
        $('#cUnidad2').val($('#cUnidad').val());
    });

    $('#calcular').on('click', function () {
        setDataLocalStorage();
    });

    $('#btn-reset').on('click', function () {
        resetValues();
    });
    $("#cheValorS").on({
        "focus": function(event) {
          $(event.target).select();
        },
        "keyup": function(event) {
          $(event.target).val(function(index, value) {
            return value.replace(/\D/g, "")

              .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
          });
        }
      });
      $("#cheValorS2").on({
        "focus": function(event) {
          $(event.target).select();
        },
        "keyup": function(event) {
          $(event.target).val(function(index, value) {
            return value.replace(/\D/g, "")

              .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
          });
        }
      });
      $('#logoSitio').on('click', function () {
        localStorage.clear();
    });

      $("#paises").on('change', () => {
        $('#pais').val($('#paises option:selected').text());
      });
      $("#ciudades").on('change', () => {
        $('#ciudad').val($('#ciudades option:selected').text());
      });
      $('area').mouseover(function() {
        cambiarLblMapa(this.alt);
     }).mouseout(function() {
        $('#paises').val() > 0 ? cambiarLblMapa($('#paises option:selected').text()) : cambiarLblMapa('Da Clic en el Mapa');
      });


});
function setDataLocalStorage(){
    localStorage.setItem("cSize", $('#cSize').val());
    localStorage.setItem("cSize2", $('#cSize2').val());
    localStorage.setItem("cUnidad", $('#cUnidad').val());
    localStorage.setItem("cTarifa", $('#cTarifa').val());
    localStorage.setItem("hrsEnfriado", $('#hrsEnfriado').val());
    localStorage.setItem("csStd", $('#csStd').val());
    localStorage.setItem("csStdValue", $('#csStdValue').val());
    localStorage.setItem("cheStd", $('#cheStd').val());
    localStorage.setItem("csTipo", $('#csTipo').val());
    localStorage.setItem("cheTipo", $('#cheTipo').val());
    localStorage.setItem("csDisenio", $('#csDisenio').val());
    localStorage.setItem("cheDisenio", $('#cheDisenio').val());
    localStorage.setItem("csMantenimiento", $('#csMantenimiento').val());
    localStorage.setItem("cheMantenimiento", $('#cheMantenimiento').val());
    localStorage.setItem("cheValorS", $('#cheValorS').val());
    localStorage.setItem("cheValorS2", $('#cheValorS2').val());
    localStorage.setItem("paises", $('#paises').val());
    localStorage.setItem("ciudades", $('#ciudades').val());
}
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? false : true;
}
function getDataLocalStorage(){
    if(localStorage.length && getParameterByName('with%20data')){
        $('#cSize').val(localStorage.getItem("cSize"));
        $('#cSize2').val(localStorage.getItem("cSize2"));
        $('#cUnidad').val(localStorage.getItem("cUnidad"));
        $('#cUnidad2').val(localStorage.getItem("cUnidad"));
        $('#cTarifa').val(localStorage.getItem("cTarifa"));
        $('#cTarifa2').val(localStorage.getItem("cTarifa"));
        $('#hrsEnfriado').val(localStorage.getItem("hrsEnfriado"));
        $('#hrsEnfriado2').val(localStorage.getItem("hrsEnfriado"));
        $('#csStd').val(localStorage.getItem("csStd"));
        $('#csStd2').val(localStorage.getItem("csStd"));
        $('#csStdValue').val(localStorage.getItem("csStdValue"));
        $('#cheStd').val(localStorage.getItem("cheStd"));
        $('#csTipo').val(localStorage.getItem("csTipo"));
        $('#cheTipo').val(localStorage.getItem("cheTipo"));
        $('#csDisenio').val(localStorage.getItem("csDisenio"));
        $('#cheDisenio').val(localStorage.getItem("cheDisenio"));
        $('#csMantenimiento').val(localStorage.getItem("csMantenimiento"));
        $('#cheMantenimiento').val(localStorage.getItem("cheMantenimiento"));
        $('#cheValorS').val(localStorage.getItem("cheValorS"));
        $('#cheValorS2').val(localStorage.getItem("cheValorS2"));
        $('#paises').val(localStorage.getItem("paises"));
        $('#paises').trigger('change');
        setTimeout(() => {
            $('#ciudades').val(localStorage.getItem("ciudades"));
            $('#cUnidad').trigger('change');
            $('#csStd').trigger('change');
            $('#csTipo').trigger('change');
            $('#csDisenio').trigger('change');
            $('#csMantenimiento').trigger('change');
            $('#cheTipo').trigger('change');
            $('#cheDisenio').trigger('change');
            $('#cheMantenimiento').trigger('change');
        }, 850);
        setTimeout(() => {
            $('#pais').val($('#paises option:selected').text());
            $('#ciudad').val($('#ciudades option:selected').text());
        }, 1000);
    }
}

function getPaises() {
    $.ajax({
        type: 'POST',
        url: '/getPaises',
        dataType: 'json',
        data: {
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (response) {
            response.map((pais, i) => {
                $('#paises').append($('<option>', {
                    value: pais.idPais,
                    text: pais.pais
                }));
            });
            getDataLocalStorage();

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function getCiudades(idPais) {
    $('#ciudades').trigger('click');
    $("#paises").val(idPais);
    //$('#paises').trigger('change');
    $.ajax({
        type: 'POST',
        url: '/getCiudades',
        dataType: 'json',
        data: {
            idPais: idPais,
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (response) {
            $('#ciudades').empty();
            $('#ciudades').append($('<option>', {
                value: 0,
                text: '-Selecciona tu ciudad-'
            }));
            response.map((ciudad, i) => {
                $('#ciudades').append($('<option>', {
                    value: ciudad.idCiudad,
                    text: ciudad.ciudad
                }));
            });

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function getDegreeHrs(pais, cd) {
    var cooling = heating = 0;
    $.ajax({
        type: 'POST',
        url: '/getDegreeHrs',
        dataType: 'json',
        data: {
            idPais: pais,
            idCiudad: cd,
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (response) {
            response.forEach(mes => {
                mes['activoCooling'] == 1 ? heating += mes['heating'] : heating += 0;
                cooling = cooling + mes['cooling'];
            });

            $('#hrsEnfriado').val(cooling);
            $('#hrsEnfriado_1_2').val(cooling);
            $('#hrsEnfriado_1_3').val(cooling);

            $('#hrsEnfriado_2_1').val(cooling);
            $('#hrsEnfriado_2_2').val(cooling);
            $('#hrsEnfriado_2_3').val(cooling);

            $('#hrsEnfriado_3_1').val(cooling);
            $('#hrsEnfriado_3_2').val(cooling);
            $('#hrsEnfriado_3_3').val(cooling);
            $('#dDays').val(heating);

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function cambiarLblMapa(txt) {
    $('#lblMapa').text(txt);
}


//nota: validar cb standar sea igual en los dos campos pe IEER = IEER
function submit() {

}

function resetValues() {
    localStorage.clear();
    // inputs region
    $('#paises').val(0);
    getCiudades(0);
    // inputs cooling
    $('#cSize').val('');
    $('#cUnidad').val(0);
    $('#cTarifa').val('');
    $('#hrsEnfriado').val('');
    $('#csStd').val(0);
    $('#csStdValue').val('')
    $('#csTipo').val(0);
    $('#csDisenio').val(0);
    $('#csMantenimiento').val(0);
    $('#cheValorS').val('');

    $('#cSize2').val('');
    $('#cUnidad2').val(0);
    $('#cTarifa2').val('');
    $('#hrsEnfriado2').val('');
    $('#csStd2').val(0);
    $('#cheTipo').val(0);
    $('#cheDisenio').val(0);
    $('#cheMantenimiento').val(0);
    $('#cheStd').val('');
    $('#cheValorS2').val('');



}

function active_display(value)
{
   var cont_sol_1 =  parseInt($('#cont_sol_1').val());
   var cont_sol_2 =  parseInt($('#cont_sol_2').val());
   var cont_sol_3 =  parseInt($('#cont_sol_3').val());

   var set_sol_1 =  parseInt($('#set_sol_1').val());

    if (value == 'sol_1') {

       if(cont_sol_1 == 2){
            $( "#sol_1_2" ).removeClass( "hidden" );
            $( "#sol_1_3" ).addClass( "hidden" );
            cont_sol_1 =  cont_sol_1 + 1;
            set_sol_1 =  set_sol_1 + 1;
            $('#set_sol_1').val(set_sol_1);
            $('#cont_sol_1').val(cont_sol_1);
        }else if(cont_sol_1 == 3){
            set_sol_1 =  set_sol_1 + 1;
            $('#set_sol_1').val(set_sol_1);
            $( "#sol_1_2" ).removeClass( "hidden" );
            $( "#sol_1_3" ).removeClass( "hidden" );
        }


    }else if(value == 'sol_2') {

        if(cont_sol_2 == 2){
            $( "#sol_2_2" ).removeClass( "hidden" );
            $( "#sol_2_3" ).addClass( "hidden" );
            cont_sol_2 =  cont_sol_2 + 1;
            $('#cont_sol_2').val(cont_sol_2);
        }else if(cont_sol_2 == 3){
            $( "#sol_2_2" ).removeClass( "hidden" );
            $( "#sol_2_3" ).removeClass( "hidden" );
        }

    }else if(value == 'sol_3') {
        if(cont_sol_3 == 2){
            $( "#sol_3_2" ).removeClass( "hidden" );
            $( "#sol_3_3" ).addClass( "hidden" );
            cont_sol_3 =  cont_sol_3 + 1;
            $('#cont_sol_3').val(cont_sol_3);
        }else if(cont_sol_3 == 3){
            $( "#sol_3_2" ).removeClass( "hidden" );
            $( "#sol_3_3" ).removeClass( "hidden" );
        }

    }
}

function unidadHvac(value,num_div,id_select){
  /*  var set_sol_1 =  $('#set_sol_1').val(); */

    if( num_div == 1){
       $('#'+id_select).empty();
            $('#'+id_select).append($('<option>', {
                value: 0,
                text: 'Seleccionar'
            }));




            switch (value) {

                case "1":
                    var arry = '{ "arr" : [' +
                    '{ "text":"Básico" , "value":"basico" },' +
                    '{"text":"c/ Economizador" , "value":"c_economizador" } ]}';
                    break;

                case "2":
                var arry = '{ "arr" : [' +
                '{ "text":"Manejadora" , "value":"manejadora" },' +
                '{"text":"Fancoil" , "value":"fancoil" } ]}';
                break;
                case "3":
                var arry = '{ "arr" : [' +
                '{ "text":"Cassette y Piso Techo" , "value":"ca_pi_te" }' +
                ']}';
                break;
                case "4":
                var arry = '{ "arr" : [' +
                '{ "text":"Fancoils y Manejadoras" , "value":"fa_man" }' +
                ']}';
                break;
                case "5":
                var arry =  '{ "arr" : [' +
                '{ "text":"Estándar" , "value":"est_ptac" }' +
                ']}';
                break;
                case "6":
                var arry =  '{ "arr" : [' +
                '{ "text":"Estándar" , "value":"est_wshp" }' +
                ']}';
                break;
                case "7":
                var arry =  '{ "arr" : [' +
                '{ "text":"Pared - Piso - Techo" , "value":"pa_pi_te" }' +
                ']}';
                break;
              default:
                    // code block
            }

            const myObj = JSON.parse(arry);
                      for (let i = 0; i < myObj.arr.length; i++) {
                        $('#'+id_select).append($('<option>', {
                            value:  myObj.arr[i].value,
                            text:  myObj.arr[i].text
                        }));
                        console.log( myObj.arr[i].value);
                    }


    }else if( num_div == 2){
        $('#'+id_select).empty();
        $('#'+id_select).append($('<option>', {
            value: 0,
            text: 'Seleccionar'
        }));


        switch (value) {
            case "1":
                var arry = '{ "arr" : [' +
                '{ "text":"Básico" , "value":"basico" },' +
                '{"text":"c/ Economizador" , "value":"c_economizador" } ]}';


                break;
            case "2":
            var arry = '{ "arr" : [' +
            '{ "text":"Manejadora" , "value":"manejadora" },' +
            '{"text":"Fancoil" , "value":"fancoil" } ]}';
            break;
            case "3":
            var arry = '{ "arr" : [' +
            '{ "text":"Cassette y Piso Techo" , "value":"ca_pi_te" }' +
            ']}';
            break;
            case "4":
            var arry = '{ "arr" : [' +
            '{ "text":"Fancoils y Manejadoras" , "value":"fa_man" }' +
            ']}';
            break;
            case "5":
            var arry =  '{ "arr" : [' +
            '{ "text":"Estándar" , "value":"est_ptac" }' +
            ']}';
            break;
            case "6":
            var arry =  '{ "arr" : [' +
            '{ "text":"Estándar" , "value":"est_wshp" }' +
            ']}';
            break;
            case "7":
            var arry =  '{ "arr" : [' +
            '{ "text":"Pared - Piso - Techo" , "value":"pa_pi_te" }' +
            ']}';
            break;
          default:
                // code block
        }

        const myObj = JSON.parse(arry);
                  for (let i = 0; i < myObj.arr.length; i++) {
                    $('#'+id_select).append($('<option>', {
                        value:  myObj.arr[i].value,
                        text:  myObj.arr[i].text
                    }));
                    console.log( myObj.arr[i].value);
                }
    }else if(num_div == 3){
        $('#'+id_select).empty();
        $('#'+id_select).append($('<option>', {
            value: 0,
            text: 'Seleccionar'
        }));


        switch (value) {
                case "1":
                    var arry = '{ "arr" : [' +
                    '{ "text":"Básico" , "value":"basico" },' +
                    '{"text":"c/ Economizador" , "value":"c_economizador" } ]}';


                    break;
                case "2":
                var arry = '{ "arr" : [' +
                '{ "text":"Manejadora" , "value":"manejadora" },' +
                '{"text":"Fancoil" , "value":"fancoil" } ]}';
                break;
                case "3":
                var arry = '{ "arr" : [' +
                '{ "text":"Cassette y Piso Techo" , "value":"ca_pi_te" }' +
                ']}';
                break;
                case "4":
                var arry = '{ "arr" : [' +
                '{ "text":"Fancoils y Manejadoras" , "value":"fa_man" }' +
                ']}';
                break;
                case "5":
                var arry =  '{ "arr" : [' +
                '{ "text":"Estándar" , "value":"est_ptac" }' +
                ']}';
                break;
                case "6":
                var arry =  '{ "arr" : [' +
                '{ "text":"Estándar" , "value":"est_wshp" }' +
                ']}';
                break;
                case "7":
                var arry =  '{ "arr" : [' +
                '{ "text":"Pared - Piso - Techo" , "value":"pa_pi_te" }' +
                ']}';
                break;
              default:
                // code block
        }

        const myObj = JSON.parse(arry);
                  for (let i = 0; i < myObj.arr.length; i++) {
                    $('#'+id_select).append($('<option>', {
                        value:  myObj.arr[i].value,
                        text:  myObj.arr[i].text
                    }));
                    console.log( myObj.arr[i].value);
                }
    }

}

function change_diseño(value,num_div,id_select,id_tipo_control,id_dr,equipo_value){
    /*  var set_sol_1 =  $('#set_sol_1').val(); */
    console.log(value);
      if( num_div == 1){

         $('#'+id_select).empty();
              $('#'+id_select).append($('<option>', {
                  value: 0,
                  text: 'Seleccionar'
              }));

        $('#'+id_tipo_control).empty();
         $('#'+id_tipo_control).append($('<option>', {
             value: 0,
             text: 'Seleccionar'
         }));

         $('#'+id_dr).empty();
         $('#'+id_dr).append($('<option>', {
             value: 0,
             text: 'Seleccionar'
         }));

         $('#'+equipo_value).empty();



              switch (value) {

                      case "basico":

                            var arry_disenio = '{ "arry_diseño" : [' +
                          '{ "text":"c/ VAV y Retorno Ductado" , "value":0},' +
                          '{ "text":"Descarga a Plenum" , "value":0.15},' +
                          '{ "text":"c/ Ducto Flex. y Plenum Retorno" , "value":0.25},' +
                          '{"text":"ASHRAE 55/62.1/90.0" , "value":-0.15 } ]}';

                          var arry_control = '{ "arry_control" : [' +
                          '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
                          '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
                          '{"text":"Defenza de Zona" , "value":0.95 } ]}';

                          var arry_dr = '{ "arry_dr" : [' +
                          '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
                          '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';
                          $('#'+equipo_value).val(1.13);

                      break;

                      case "c_economizador":

                            var arry_disenio = '{ "arry_diseño" : [' +
                          '{ "text":"c/ VAV y Retorno Ductado" , "value":0},' +
                          '{ "text":"Descarga a Plenum" , "value":0.15},' +
                          '{ "text":"c/ Ducto Flex. y Plenum Retorno" , "value":0.25},' +
                          '{"text":"ASHRAE 55/62.1/90.0" , "value":-0.15 } ]}';

                          var arry_control = '{ "arry_control" : [' +
                          '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
                          '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
                          '{"text":"Defenza de Zona" , "value":0.95 } ]}';

                          var arry_dr = '{ "arry_dr" : [' +
                          '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
                          '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';
                          $('#'+equipo_value).val(1.03);
                      break;

                      case "manejadora":

                            var arry_disenio = '{ "arry_diseño" : [' +
                          '{ "text":"Ductado - ASHRAE" , "value":0},' +
                          '{ "text":"c/Ducto Flex. y Retorno Ductado" , "value":0.18},' +
                          '{ "text":"c/ Ducto Flex y Plenum Retorno" , "value":0.25},' +
                          '{ "text":"ASHRAE 55/62.1/90.1" , "value":-0.15},' +
                          '{"text":"Sin Ductar - Descraga Libre" , "value":0.15 } ]}';

                          var arry_control = '{ "arry_control" : [' +
                          '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
                          '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
                          '{"text":"Defenza de Zona" , "value":0.95 } ]}';

                          var arry_dr = '{ "arry_dr" : [' +
                          '{ "text":"No Aplica" , "value":0},' +
                          '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
                          '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';

                          $('#'+equipo_value).val(1.18);
                      break;

                      case "fancoil":

                        var arry_disenio = '{ "arry_diseño" : [' +
                        '{ "text":"Ductado - ASHRAE" , "value":0},' +
                        '{ "text":"c/Ducto Flex. y Retorno Ductado" , "value":0.18},' +
                        '{ "text":"c/ Ducto Flex y Plenum Retorno" , "value":0.25},' +
                        '{ "text":"ASHRAE 55/62.1/90.1" , "value":-0.15},' +
                        '{"text":"Sin Ductar - Baja SP" , "value":0.18 } ]}';

                        var arry_control = '{ "arry_control" : [' +
                          '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
                          '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
                          '{"text":"Defenza de Zona" , "value":0.95 } ]}';

                          var arry_dr = '{ "arry_dr" : [' +
                          '{ "text":"No Aplica" , "value":0},' +
                          '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
                          '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';

                          $('#'+equipo_value).val(1.2);
                      break;

                      case "ca_pi_te":
                        var arry_disenio = '{ "arry_diseño" : [' +
                        '{ "text":"Sin Ventilación (s/DOA)" , "value":0.15},' +
                        '{ "text":"c/ Ventilación Filtrada (DOA)" , "value":0.05},' +
                        '{"text":"ASHRAE 55/62.1/90.1" , "value":0 } ]}';


                        var arry_control = '{ "arry_control" : [' +
                          '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
                          '{"text":"Termostatos en Zona de Confort" , "value":1} ]}';

                          var arry_dr = '{ "arry_dr" : [' +
                          '{"text":"No Aplica" , "value":0.08 } ]}';

                          $('#'+equipo_value).val(0.95);
                      break;

                      case "fa_man":
                        var arry_disenio = '{ "arry_diseño" : [' +
                        '{ "text":"c/Ducto Flexible y sin DOA" , "value":0.25},' +
                        '{ "text":"c/ Ventilación Filtrada (DOA)" , "value":0.05},' +
                        '{"text":"ASHRAE 55/62.1/90.1" , "value":-0.05 } ]}';

                        var arry_control = '{ "arry_control" : [' +
                        '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
                        '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
                        '{"text":"Defenza de Zona" , "value":0.95 } ]}';

                        var arry_dr = '{ "arry_dr" : [' +
                        '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
                        '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';
                        $('#'+equipo_value).val(0.85);
                      break;


                      case "est_ptac":
                        var arry_disenio = '{ "arry_diseño" : [' +
                        '{ "text":"Sin Filración MERV 8" , "value":0.15},' +
                        '{"text":"c/ Filtración MERV 8" , "value":0 } ]}';

                        var arry_control = '{ "arry_control" : [' +
                        '{ "text":"Termostato Interno" , "value":1.12},' +
                        '{"text":"Termostatos en Zona de Confort" , "value":1} ]}';

                        var arry_dr = '{ "arry_dr" : [' +
                        '{"text":"No Aplica" , "value":0.08 } ]}';

                        $('#'+equipo_value).val(1.2);

                      break;

                      case "est_wshp":
                        var arry_disenio = '{ "arry_diseño" : [' +
                        '{ "text":"Sin Ventilación (s/DOA)" , "value":0.25},' +
                        '{ "text":"c/ Ventilación Filtrada (DOA)" , "value":0.05},' +
                        '{ "text":"c/ ducto Flex y Plenum Retorno" , "value":0.35},' +
                        '{"text":"ASHRAE 55/62.1/90.1" , "value":-0.05 } ]}';

                        var arry_control = '{ "arry_control" : [' +
                        '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
                        '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
                        '{"text":"Defenza de Zona" , "value":0.95 } ]}';

                        var arry_dr = '{ "arry_dr" : [' +
                        '{ "text":"No Aplica" , "value":0.08},' +
                        '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
                        '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';


                        $('#'+equipo_value).val(0.86);

                      break;

                      case "pa_pi_te":
                        var arry_disenio = '{ "arry_diseño" : [' +
                        '{ "text":"Condensador Arriba" , "value":0.85},' +
                        '{ "text":"Condensador Abajo" , "value":0.81},' +
                        '{"text":"Espalda con Espalda" , "value":0.89 } ]}';

                        var arry_control = '{ "arry_control" : [' +
                        '{"text":"Termostato Interno" , "value":1.08 } ]}';

                        var arry_dr = '{ "arry_dr" : [' +
                        '{"text":"No Aplica" , "value":0.08 } ]}';

                        $('#'+equipo_value).val(1.1);

                      break;

                    default:
                      // code block
              }



              const myObj = JSON.parse(arry_disenio);
                        for (let i = 0; i < myObj.arry_diseño.length; i++) {
                          $('#'+id_select).append($('<option>', {
                              value:  myObj.arry_diseño[i].value,
                              text:  myObj.arry_diseño[i].text
                          }));
                          console.log( myObj.arry_diseño[i].value);
                      }

                      const myObj_cont = JSON.parse(arry_control);
                      for (let i = 0; i < myObj_cont.arry_control.length; i++) {
                        $('#'+id_tipo_control).append($('<option>', {
                            value:  myObj_cont.arry_control[i].value,
                            text:  myObj_cont.arry_control[i].text
                        }));
                        console.log( myObj_cont.arry_control[i].value);
                    }

                    const myObj_dr = JSON.parse(arry_dr);
                    for (let i = 0; i < myObj_dr.arry_dr.length; i++) {
                      $('#'+id_dr).append($('<option>', {
                          value:  myObj_dr.arry_dr[i].value,
                          text:  myObj_dr.arry_dr[i].text
                      }));
                      console.log(myObj_dr.arry_dr[i].value);
                  }


      }else if( num_div == 2){
          $('#'+id_select).empty();
          $('#'+id_select).append($('<option>', {
              value: 0,
              text: 'Seleccionar'
          }));

          $('#'+id_tipo_control).empty();
          $('#'+id_tipo_control).append($('<option>', {
              value: 0,
              text: 'Seleccionar'
          }));

          $('#'+id_dr).empty();
          $('#'+id_dr).append($('<option>', {
              value: 0,
              text: 'Seleccionar'
          }));

          $('#'+equipo_value).empty();


          switch (value) {

            case "basico":

                var arry_disenio = '{ "arry_diseño" : [' +
              '{ "text":"c/ VAV y Retorno Ductado" , "value":0},' +
              '{ "text":"Descarga a Plenum" , "value":0.15},' +
              '{ "text":"c/ Ducto Flex. y Plenum Retorno" , "value":0.25},' +
              '{"text":"ASHRAE 55/62.1/90.0" , "value":-0.15 } ]}';

              var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
              '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
              '{"text":"Defenza de Zona" , "value":0.95 } ]}';

              var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
              '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';
              $('#'+equipo_value).val(1.13);

          break;

          case "c_economizador":

                var arry_disenio = '{ "arry_diseño" : [' +
              '{ "text":"c/ VAV y Retorno Ductado" , "value":0},' +
              '{ "text":"Descarga a Plenum" , "value":0.15},' +
              '{ "text":"c/ Ducto Flex. y Plenum Retorno" , "value":0.25},' +
              '{"text":"ASHRAE 55/62.1/90.0" , "value":-0.15 } ]}';

              var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
              '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
              '{"text":"Defenza de Zona" , "value":0.95 } ]}';

              var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
              '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';
              $('#'+equipo_value).val(1.03);

          break;

          case "manejadora":

                var arry_disenio = '{ "arry_diseño" : [' +
              '{ "text":"Ductado - ASHRAE" , "value":0},' +
              '{ "text":"c/Ducto Flex. y Retorno Ductado" , "value":0.18},' +
              '{ "text":"c/ Ducto Flex y Plenum Retorno" , "value":0.25},' +
              '{ "text":"ASHRAE 55/62.1/90.1" , "value":-0.15},' +
              '{"text":"Sin Ductar - Descraga Libre" , "value":0.15 } ]}';

              var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
              '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
              '{"text":"Defenza de Zona" , "value":0.95 } ]}';

              var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"No Aplica" , "value":0},' +
              '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
              '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';

              $('#'+equipo_value).val(1.18);

          break;

          case "fancoil":

            var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"Ductado - ASHRAE" , "value":0},' +
            '{ "text":"c/Ducto Flex. y Retorno Ductado" , "value":0.18},' +
            '{ "text":"c/ Ducto Flex y Plenum Retorno" , "value":0.25},' +
            '{ "text":"ASHRAE 55/62.1/90.1" , "value":-0.15},' +
            '{"text":"Sin Ductar - Baja SP" , "value":0.18 } ]}';

            var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
              '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
              '{"text":"Defenza de Zona" , "value":0.95 } ]}';

              var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"No Aplica" , "value":0},' +
              '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
              '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';

              $('#'+equipo_value).val(1.2);

          break;

          case "ca_pi_te":
            var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"Sin Ventilación (s/DOA)" , "value":0.15},' +
            '{ "text":"c/ Ventilación Filtrada (DOA)" , "value":0.05},' +
            '{"text":"ASHRAE 55/62.1/90.1" , "value":0 } ]}';


            var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
              '{"text":"Termostatos en Zona de Confort" , "value":1} ]}';

              var arry_dr = '{ "arry_dr" : [' +
              '{"text":"No Aplica" , "value":0.08 } ]}';

              $('#'+equipo_value).val(0.95);

          break;

          case "fa_man":
            var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"c/Ducto Flexible y sin DOA" , "value":0.25},' +
            '{ "text":"c/ Ventilación Filtrada (DOA)" , "value":0.05},' +
            '{"text":"ASHRAE 55/62.1/90.1" , "value":-0.05 } ]}';

            var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
            '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
            '{"text":"Defenza de Zona" , "value":0.95 } ]}';

            var arry_dr = '{ "arry_dr" : [' +
            '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
            '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';
            $('#'+equipo_value).val(0.85);
          break;


          case "est_ptac":
            var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"Sin Filración MERV 8" , "value":0.15},' +
            '{"text":"c/ Filtración MERV 8" , "value":0 } ]}';

            var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Interno" , "value":1.12},' +
            '{"text":"Termostatos en Zona de Confort" , "value":1} ]}';

            var arry_dr = '{ "arry_dr" : [' +
            '{"text":"No Aplica" , "value":0.08 } ]}';

            $('#'+equipo_value).val(1.2);
          break;

          case "est_wshp":
            var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"Sin Ventilación (s/DOA)" , "value":0.25},' +
            '{ "text":"c/ Ventilación Filtrada (DOA)" , "value":0.05},' +
            '{ "text":"c/ ducto Flex y Plenum Retorno" , "value":0.35},' +
            '{"text":"ASHRAE 55/62.1/90.1" , "value":-0.05 } ]}';

            var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
            '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
            '{"text":"Defenza de Zona" , "value":0.95 } ]}';

            var arry_dr = '{ "arry_dr" : [' +
            '{ "text":"No Aplica" , "value":0.08},' +
            '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
            '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';


            $('#'+equipo_value).val(0.86);
          break;

          case "pa_pi_te":
            var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"Condensador Arriba" , "value":0.85},' +
            '{ "text":"Condensador Abajo" , "value":0.81},' +
            '{"text":"Espalda con Espalda" , "value":0.89 } ]}';

            var arry_control = '{ "arry_control" : [' +
            '{"text":"Termostato Interno" , "value":1.08 } ]}';

            var arry_dr = '{ "arry_dr" : [' +
            '{"text":"No Aplica" , "value":0.08 } ]}';

            $('#'+equipo_value).val(1.1);
          break;

        default:
          // code block

          }

          const myObj = JSON.parse(arry_disenio);
                    for (let i = 0; i < myObj.arry_diseño.length; i++) {
                      $('#'+id_select).append($('<option>', {
                          value:  myObj.arry_diseño[i].value,
                          text:  myObj.arry_diseño[i].text
                      }));
                      console.log( myObj.arry_diseño[i].value);
                  }

                  const myObj_cont = JSON.parse(arry_control);
                  for (let i = 0; i < myObj_cont.arry_control.length; i++) {
                    $('#'+id_tipo_control).append($('<option>', {
                        value:  myObj_cont.arry_control[i].value,
                        text:  myObj_cont.arry_control[i].text
                    }));
                    console.log( myObj_cont.arry_control[i].value);
                }

                const myObj_dr = JSON.parse(arry_dr);
                for (let i = 0; i < myObj_dr.arry_dr.length; i++) {
                  $('#'+id_dr).append($('<option>', {
                      value:  myObj_dr.arry_dr[i].value,
                      text:  myObj_dr.arry_dr[i].text
                  }));
                  console.log(myObj_dr.arry_dr[i].value);
              }
      }else if(num_div == 3){
          $('#'+id_select).empty();
          $('#'+id_select).append($('<option>', {
              value: 0,
              text: 'Seleccione'
          }));


          $('#'+id_tipo_control).empty();
          $('#'+id_tipo_control).append($('<option>', {
              value: 0,
              text: 'Seleccione'
          }));

          $('#'+id_dr).empty();
          $('#'+id_dr).append($('<option>', {
              value: 0,
              text: 'Seleccione'
          }));
          $('#'+equipo_value).empty();

          switch (value) {

            case "basico":

                var arry_disenio = '{ "arry_diseño" : [' +
              '{ "text":"c/ VAV y Retorno Ductado" , "value":0},' +
              '{ "text":"Descarga a Plenum" , "value":0.15},' +
              '{ "text":"c/ Ducto Flex. y Plenum Retorno" , "value":0.25},' +
              '{"text":"ASHRAE 55/62.1/90.0" , "value":-0.15 } ]}';

              var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
              '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
              '{"text":"Defenza de Zona" , "value":0.95 } ]}';

              var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
              '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';
              $('#'+equipo_value).val(1.13);

          break;

          case "c_economizador":

                var arry_disenio = '{ "arry_diseño" : [' +
              '{ "text":"c/ VAV y Retorno Ductado" , "value":0},' +
              '{ "text":"Descarga a Plenum" , "value":0.15},' +
              '{ "text":"c/ Ducto Flex. y Plenum Retorno" , "value":0.25},' +
              '{"text":"ASHRAE 55/62.1/90.0" , "value":-0.15 } ]}';

              var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
              '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
              '{"text":"Defenza de Zona" , "value":0.95 } ]}';

              var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
              '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';
              $('#'+equipo_value).val(1.03);

          break;

          case "manejadora":

                var arry_disenio = '{ "arry_diseño" : [' +
              '{ "text":"Ductado - ASHRAE" , "value":0},' +
              '{ "text":"c/Ducto Flex. y Retorno Ductado" , "value":0.18},' +
              '{ "text":"c/ Ducto Flex y Plenum Retorno" , "value":0.25},' +
              '{ "text":"ASHRAE 55/62.1/90.1" , "value":-0.15},' +
              '{"text":"Sin Ductar - Descraga Libre" , "value":0.15 } ]}';

              var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
              '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
              '{"text":"Defenza de Zona" , "value":0.95 } ]}';

              var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"No Aplica" , "value":0},' +
              '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
              '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';

              $('#'+equipo_value).val(1.18);

          break;

          case "fancoil":

            var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"Ductado - ASHRAE" , "value":0},' +
            '{ "text":"c/Ducto Flex. y Retorno Ductado" , "value":0.18},' +
            '{ "text":"c/ Ducto Flex y Plenum Retorno" , "value":0.25},' +
            '{ "text":"ASHRAE 55/62.1/90.1" , "value":-0.15},' +
            '{"text":"Sin Ductar - Baja SP" , "value":0.18 } ]}';

            var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
              '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
              '{"text":"Defenza de Zona" , "value":0.95 } ]}';

              var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"No Aplica" , "value":0},' +
              '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
              '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';

              $('#'+equipo_value).val(1.2);

          break;

          case "ca_pi_te":
            var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"Sin Ventilación (s/DOA)" , "value":0.15},' +
            '{ "text":"c/ Ventilación Filtrada (DOA)" , "value":0.05},' +
            '{"text":"ASHRAE 55/62.1/90.1" , "value":0 } ]}';


            var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
              '{"text":"Termostatos en Zona de Confort" , "value":1} ]}';

              var arry_dr = '{ "arry_dr" : [' +
              '{"text":"No Aplica" , "value":0.08 } ]}';

              $('#'+equipo_value).val(0.95);

          break;

          case "fa_man":
            var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"c/Ducto Flexible y sin DOA" , "value":0.25},' +
            '{ "text":"c/ Ventilación Filtrada (DOA)" , "value":0.05},' +
            '{"text":"ASHRAE 55/62.1/90.1" , "value":-0.05 } ]}';

            var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
            '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
            '{"text":"Defenza de Zona" , "value":0.95 } ]}';

            var arry_dr = '{ "arry_dr" : [' +
            '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
            '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';
            $('#'+equipo_value).val(0.85);
          break;


          case "est_ptac":
            var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"Sin Filración MERV 8" , "value":0.15},' +
            '{"text":"c/ Filtración MERV 8" , "value":0 } ]}';

            var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Interno" , "value":1.12},' +
            '{"text":"Termostatos en Zona de Confort" , "value":1} ]}';

            var arry_dr = '{ "arry_dr" : [' +
            '{"text":"No Aplica" , "value":0.08 } ]}';

            $('#'+equipo_value).val(1.2);
          break;

          case "est_wshp":
            var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"Sin Ventilación (s/DOA)" , "value":0.25},' +
            '{ "text":"c/ Ventilación Filtrada (DOA)" , "value":0.05},' +
            '{ "text":"c/ ducto Flex y Plenum Retorno" , "value":0.35},' +
            '{"text":"ASHRAE 55/62.1/90.1" , "value":-0.05 } ]}';

            var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostatos Fuera Zona de Confort" , "value":1.12},' +
            '{ "text":"Termostatos en Zona de Confort" , "value":1},' +
            '{"text":"Defenza de Zona" , "value":0.95 } ]}';

            var arry_dr = '{ "arry_dr" : [' +
            '{ "text":"No Aplica" , "value":0.08},' +
            '{ "text":"Cumple ASHRAE  Standard 70" , "value":-0.1},' +
            '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":1.14 } ]}';


            $('#'+equipo_value).val(0.86);
          break;

          case "pa_pi_te":
            var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"Condensador Arriba" , "value":0.85},' +
            '{ "text":"Condensador Abajo" , "value":0.81},' +
            '{"text":"Espalda con Espalda" , "value":0.89 } ]}';

            var arry_control = '{ "arry_control" : [' +
            '{"text":"Termostato Interno" , "value":1.08 } ]}';

            var arry_dr = '{ "arry_dr" : [' +
            '{"text":"No Aplica" , "value":0.08 } ]}';

            $('#'+equipo_value).val(1.1);
          break;

            default:
          // code block
          }

          const myObj = JSON.parse(arry_disenio);
                    for (let i = 0; i < myObj.arry_diseño.length; i++) {
                      $('#'+id_select).append($('<option>', {
                          value:  myObj.arry_diseño[i].value,
                          text:  myObj.arry_diseño[i].text
                      }));
                      console.log( myObj.arry_diseño[i].value);
                  }

                  const myObj_cont = JSON.parse(arry_control);
                  for (let i = 0; i < myObj_cont.arry_control.length; i++) {
                    $('#'+id_tipo_control).append($('<option>', {
                        value:  myObj_cont.arry_control[i].value,
                        text:  myObj_cont.arry_control[i].text
                    }));
                    console.log( myObj_cont.arry_control[i].value);
                }

                const myObj_dr = JSON.parse(arry_dr);
                for (let i = 0; i < myObj_dr.arry_dr.length; i++) {
                  $('#'+id_dr).append($('<option>', {
                      value:  myObj_dr.arry_dr[i].value,
                      text:  myObj_dr.arry_dr[i].text
                  }));
                  console.log(myObj_dr.arry_dr[i].value);
              }
      }

  }

  function check_unidad(value){
    var ft = document.getElementById("check_ft");
    var mc = document.getElementById("check_mc");
    var unidad = document.getElementById("unidad");
    if(value == 'ft'){
        ft.checked = true;
        mc.checked = false;
        unidad.value = value;
    }else if(value == 'mc'){
        ft.checked = false;
        mc.checked = true;
        unidad.value = value;
    }
  }

  function check_form_submit(){

    Swal.fire({
        title: '¿Guardar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, guardar!'
    }).then((result) => {
        if (result.isConfirmed) {
            formulario = document.getElementById('formulario');
            formulario.submit();
        }/* else{
            location.href='users/create';
        } */
    })
  }

  //FUNCION PARA PERMITIR SOLO NUMEROS
function soloNumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key);
    letras = "1,2,3,4,5,6,7,8,9,0,.,.";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}


//FUNCION PARA SOLO PERMITIR LETRAS
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz.";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function send_name(value){
   /*  console.log($('#'+value+' option:selected').text()); */
   const myArray = value.split('_');
   var text = $('#'+value+' option:selected').text();
   var inp_text =  $('#name_diseno_'+myArray[1]+'_'+myArray[2]);
   inp_text.val(text);

}

function send_name_t_c(value){
    /*  console.log($('#'+value+' option:selected').text()); */
    const myArray = value.split('_');
    var text_t_c = $('#'+value+' option:selected').text();
    var inp_text_t_C =  $('#name_t_control_'+myArray[2]+'_'+myArray[3]);
    inp_text_t_C.val(text_t_c);


}

function send_name_dr(value){
    /*  console.log($('#'+value+' option:selected').text()); */
    const myArray = value.split('_');
    var text_dr = $('#'+value+' option:selected').text();
    var inp_text_dr =  $('#dr_name_'+myArray[1]+'_'+myArray[2]);
    inp_text_dr.val(text_dr);


}

function traer_categorias_edif() {
    $.ajax({
        type: 'get',
        url: '/get_cat_edi',
        dataType: 'json',
        data: {
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (response) {
            $('#cat_ed').append($('<option>', {
                value: 0,
                text: 'Seleccionar'
            }));

            response.map((cat_ed, i) => {
                $('#cat_ed').append($('<option>', {
                    value: cat_ed.id,
                    text: cat_ed.name
                }));
            });

        },
        error: function (responsetext) {

        }
    });
}

function traer_t_edif(id_cat) {
    $.ajax({
        type: 'get',
        url: '/get_cat_edi/'+ id_cat,
        success: function (response) {
            $('#tipo_edificio').empty();
            $('#tipo_edificio').append($('<option>', {
                value: 0,
                text: 'Seleccionar'
            }));

            response.map((cat_ed, i) => {
                $('#tipo_edificio').append($('<option>', {
                    value: cat_ed.id,
                    text: cat_ed.name
                }));
            });



        },
        error: function (responsetext) {

        }
    });
}

function cap_term_change(value){
    if(value === '0'){
        $('#unidad_capacidad_tot_1_2').val('');
        $('#unidad_capacidad_tot_1_3').val('');

        $('#unidad_capacidad_tot_2_1').val('');
        $('#unidad_capacidad_tot_2_2').val('');
        $('#unidad_capacidad_tot_2_3').val('');

        $('#unidad_capacidad_tot_3_1').val('');
        $('#unidad_capacidad_tot_3_2').val('');
        $('#unidad_capacidad_tot_3_3').val('');
    }

    if(value !== '0'){
        $('#unidad_capacidad_tot_1_2').val(value);
        $('#unidad_capacidad_tot_1_3').val(value);

        $('#unidad_capacidad_tot_2_1').val(value);
        $('#unidad_capacidad_tot_2_2').val(value);
        $('#unidad_capacidad_tot_2_3').val(value);

        $('#unidad_capacidad_tot_3_1').val(value);
        $('#unidad_capacidad_tot_3_2').val(value);
        $('#unidad_capacidad_tot_3_3').val(value);
    }

}

function asign_cos_ele(value){
    if(value === '0'){
        $('#costo_elec_1_2').val('');
        $('#costo_elec_1_3').val('');

        $('#costo_elec_2_1').val('');
        $('#costo_elec_2_2').val('');
        $('#costo_elec_2_3').val('');

        $('#costo_elec_3_1').val('');
        $('#costo_elec_3_2').val('');
        $('#costo_elec_3_3').val('');
    }

    if(value !== '0'){
        $('#costo_elec_1_2').val(value);
        $('#costo_elec_1_3').val(value);

        $('#costo_elec_2_1').val(value);
        $('#costo_elec_2_2').val(value);
        $('#costo_elec_2_3').val(value);

        $('#costo_elec_3_1').val(value);
        $('#costo_elec_3_2').val(value);
        $('#costo_elec_3_3').val(value);
    }

}

function set_porcent_hvac(value){
    $.ajax({
        type: 'get',
        url: '/porcents_aux/'+ value,
        success: function (response) {
            $('#porcent_hvac').empty();
            $('#porcent_hvac').append($('<option>', {
                value: 0,
                text: 'Seleccionar'
            }));

            response.map((cat_ed, i) => {
                $('#porcent_hvac').append($('<option>', {
                    value: cat_ed,
                    text: cat_ed
                }));
            });



        },
        error: function (responsetext) {

        }
    });

}

function buton_check(){
    var name = $("#name_pro");
    if (name.val() == '') {
        document.getElementById('name_warning').innerHTML = "Campo Obligatorio";
        return false;
    }
    var cat_ed = $("#cat_ed");
    if (cat_ed.val() == '0') {
        document.getElementById('cat_ed_warning').innerHTML = "Campo Obligatorio";
        return false;
    }
    var tipo_edificio = $("#tipo_edificio");
    if (tipo_edificio.val() == '0') {
        document.getElementById('tipo_Edificio_warning').innerHTML = "Campo Obligatorio";
        return false;
    }
    var ar_project = $("#ar_project");
    if (ar_project.val() == '') {
        document.getElementById('ar_project_warning').innerHTML = "Campo Obligatorio";
        return false;
    }
    var paises = $("#paises");
    if (paises.val() == '0') {
        document.getElementById('paises_warning').innerHTML = "Campo Obligatorio";
        return false;
    }
    var ciudades = $("#ciudades");
    if (ciudades.val() == '0') {
        document.getElementById('ciudad_warning').innerHTML = "Campo Obligatorio";
        return false;
    }
    var porcent_hvac = $("#porcent_hvac");
    if (porcent_hvac.val() == '0') {
        document.getElementById('por_hvac_warning').innerHTML = "Campo Obligatorio";
        return false;
    }

    var check_mc = $("#check_mc");
    var check_ft = $("#check_ft");
    if (check_mc.prop('checked') === false && check_ft.prop('checked') === false) {
        Swal.fire(
            'Atención',
            "Seleccionar Unidad",
            'warning'
        )
        return false;
    }


    if (name.val() !== '' && cat_ed.val() !== '0' && tipo_edificio.val() !== '0' && ar_project.val() !== '' && paises.val() !== '0' && ciudades.val() !== '0' && porcent_hvac.val() !== '0') {
       /*  $('#next').attr('disabled', false); */
       $('#div_next').addClass("hidden");
       $('#div_next_h').removeClass("hidden");
    }
}



   /*  const button_next = document.getElementById('next_div');

    button_next.addEventListener('mouseover', (event) => {
        alert('si');
            var name = $("#name_pro");
            if (name.val() == '') {
                $("#name_warning").innerHTML = "Escrito de demanda";
            }
            var cat_ed = $("#cat_ed");
            var tipo_edificio = $("#tipo_edificio");
            var ar_project = $("#ar_project");
            var paises = $("#paises");
            var ciudades = $("#ciudades");
            var porcent_hvac = $("#porcent_hvac");
    }); */

