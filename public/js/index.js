// var sc = require('state-cities-db');

$(document).ready(function () {
    cap_term_change('TR');
    $('#pais').val($('#paises option:selected').text());
    $('#ciudad').val($('#ciudades option:selected').text());
    getPaises();
    traer_categorias_edif();
    $('#div_next').addClass("hidden");
    $('#calcular').attr('disabled', true);
    $('#calcular').css('background-color','gray');
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

            let dollarUSLocale = Intl.NumberFormat('en-US');



            var num_aux = dollarUSLocale.format(cooling);

            $('#hrsEnfriado').val(num_aux);
            $('#hrsEnfriado_1_2').val(num_aux);
            $('#hrsEnfriado_1_3').val(num_aux);

            $('#hrsEnfriado_2_1').val(num_aux);
            $('#hrsEnfriado_2_2').val(num_aux);
            $('#hrsEnfriado_2_3').val(num_aux);

            $('#hrsEnfriado_3_1').val(num_aux);
            $('#hrsEnfriado_3_2').val(num_aux);
            $('#hrsEnfriado_3_3').val(num_aux);
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
            cont_sol_1 =  cont_sol_1 + 1;
            $('#set_sol_1').val(set_sol_1);
            $('#cont_sol_1').val(cont_sol_1);
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
            cont_sol_2 =  cont_sol_2 + 1;
            $('#cont_sol_2').val(cont_sol_2);
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
            cont_sol_3 =  cont_sol_3 + 1;
            $('#cont_sol_3').val(cont_sol_3);
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
                case "8":
                    var arry = '{ "arr" : [' +
                    '{ "text":"Enfriado por Aire" , "value":"enf_air" },' +
                    '{"text":"Enfriado por Agua" , "value":"enf_agu" } ]}';
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
            case "8":
                var arry = '{ "arr" : [' +
                '{ "text":"Enfriado por Aire" , "value":"enf_air" },' +
                '{"text":"Enfriado por Agua" , "value":"enf_agu" } ]}';
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
                case "8":
                    var arry = '{ "arr" : [' +
                    '{ "text":"Enfriado por Aire" , "value":"enf_air" },' +
                    '{"text":"Enfriado por Agua" , "value":"enf_agu" } ]}';
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
                  value: '',
                  text: 'Seleccionar'
              }));

        $('#'+id_tipo_control).empty();
         $('#'+id_tipo_control).append($('<option>', {
             value: 0,
             text: 'Seleccionar'
         }));

         $('#'+id_dr).empty();
         $('#'+id_dr).append($('<option>', {
             value: '',
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
                          '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":0.14 } ]}';
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
                          '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":0.14 } ]}';
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
                          '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":0.14 } ]}';

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
                          '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":0.14 } ]}';

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
                        '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":0.14 } ]}';
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
                        '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":0.14 } ]}';


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
                      case "enf_air":
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
                        '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":0.14 } ]}';
                        $('#'+equipo_value).val(1.08);

                      break;

                      case "enf_agu":
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
                        '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":0.14 } ]}';
                        $('#'+equipo_value).val(1.13);

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
              value: '',
              text: 'Seleccionar'
          }));

          $('#'+id_tipo_control).empty();
          $('#'+id_tipo_control).append($('<option>', {
              value: 0,
              text: 'Seleccionar'
          }));

          $('#'+id_dr).empty();
          $('#'+id_dr).append($('<option>', {
              value: '',
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

          case "enf_air":
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
            '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":0.14 } ]}';
            $('#'+equipo_value).val(1.08);

          break;

          case "enf_agu":
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
            '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":0.14 } ]}';
            $('#'+equipo_value).val(1.13);

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
              value: '',
              text: 'Seleccione'
          }));


          $('#'+id_tipo_control).empty();
          $('#'+id_tipo_control).append($('<option>', {
              value: 0,
              text: 'Seleccione'
          }));

          $('#'+id_dr).empty();
          $('#'+id_dr).append($('<option>', {
              value: '',
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

          case "enf_air":
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
            '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":0.14 } ]}';
            $('#'+equipo_value).val(1.08);

          break;

          case "enf_agu":
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
            '{"text":"Sin Pruebas ASHRAE Standard 70" , "value":0.14 } ]}';
            $('#'+equipo_value).val(1.13);

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

        let dollarUSLocale = Intl.NumberFormat('en-US');
        var num = parseFloat(value);


        var num_aux = dollarUSLocale.format(num);

        $('#costo_elec').val('$'+num_aux);
        $('#costo_elec_1_2').val('$'+num_aux);
        $('#costo_elec_1_3').val('$'+num_aux);

        $('#costo_elec_2_1').val('$'+num_aux);
        $('#costo_elec_2_2').val('$'+num_aux);
        $('#costo_elec_2_3').val('$'+num_aux);

        $('#costo_elec_3_1').val('$'+num_aux);
        $('#costo_elec_3_2').val('$'+num_aux);
        $('#costo_elec_3_3').val('$'+num_aux);
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

function check_input(value,id,id_warning){
    var inpt = $("#"+id);
    if (inpt.val() == '' || inpt.val() == '0') {
        document.getElementById(id_warning).innerHTML = "Campo Obligatorio";
    }else{
        document.getElementById(id_warning).innerHTML = "";
    }
}

function format_num(value,id){
    var inpt = $("#"+id);
    let dollarUSLocale = Intl.NumberFormat('en-US');
    var num = parseFloat(value);

    if (inpt.val() != '') {
       var num_aux = dollarUSLocale.format(num);
       var num_format_split = num_aux.split(',');
       inpt.val('$'+num_aux);
    }

}

function format_nums_no_$(value,id){
    var inpt = $("#"+id);
    let dollarUSLocale = Intl.NumberFormat('en-US');
    var num = parseFloat(value);

    if (inpt.val() != '') {
       var num_aux = dollarUSLocale.format(num);
       var num_format_split = num_aux.split(',');
       inpt.val(num_aux);
    }

}



function inactive_display(value)
{
   var cont_sol_1 =  parseInt($('#cont_sol_1').val());
   var cont_sol_2 =  parseInt($('#cont_sol_2').val());
   var cont_sol_3 =  parseInt($('#cont_sol_3').val());

   var set_sol_1 =  parseInt($('#set_sol_1').val());





    if (value == 'sol_1') {

        if(cont_sol_1 == 3){
             $( "#sol_1_2" ).addClass( "hidden" );
             var select_1_2 = $('#cUnidad_1_2');
             select_1_2.val($('option:first', select_1_2).val());

             $( "#sol_1_3" ).addClass( "hidden" );
             var select_1_3 = $('#cUnidad_1_3');
             select_1_3.val($('option:first', select_1_3).val());

             cont_sol_1 =  cont_sol_1 - 1;
             set_sol_1 =  set_sol_1 - 1;
             $('#set_sol_1').val(set_sol_1);
             $('#cont_sol_1').val(cont_sol_1);
         }else if(cont_sol_1 == 4){
             set_sol_1 =  set_sol_1 - 1;
             cont_sol_1 =  cont_sol_1 - 1;
             $('#set_sol_1').val(set_sol_1);
             $('#cont_sol_1').val(cont_sol_1);
             $( "#sol_1_2" ).removeClass( "hidden" );
             $( "#sol_1_3" ).addClass( "hidden" );
             var select_1_3 = $('#cUnidad_1_3');
             select_1_3.val($('option:first', select_1_3).val());

         }
    }


    if (value == 'sol_2') {

        if(cont_sol_2 == 3){
            $( "#sol_2_2" ).addClass( "hidden" );
            var select_2_2 = $('#cUnidad_2_2');
            select_2_2.val($('option:first', select_2_2).val());

            $( "#sol_2_3" ).addClass( "hidden" );
            var select_2_3 = $('#cUnidad_2_3');
            select_2_3.val($('option:first', select_2_3).val());

            cont_sol_2 =  cont_sol_2 - 1;
            $('#cont_sol_2').val(cont_sol_2);
        }else if(cont_sol_2 == 4){

           cont_sol_2 =  cont_sol_2 - 1;
            $('#cont_sol_2').val(cont_sol_2);
            $( "#sol_2_2" ).removeClass( "hidden" );
            var select_2_2 = $('#cUnidad_2_2');
            select_2_2.val($('option:first', select_2_2).val());
            $( "#sol_2_3" ).addClass( "hidden" );
        }
    }

    if (value == 'sol_3') {

        if(cont_sol_3 == 3){
             $( "#sol_3_2" ).addClass( "hidden" );
             var select_3_2 = $('#cUnidad_3_2');
             select_3_2.val($('option:first', select_3_2).val());

             $( "#sol_3_3" ).addClass( "hidden" );
             var select_3_3 = $('#cUnidad_3_3');
             select_3_3.val($('option:first', select_3_3).val());

             cont_sol_3 =  cont_sol_3 - 1;
             $('#cont_sol_3').val(cont_sol_3);
         }else if(cont_sol_3 == 4){

            cont_sol_3 =  cont_sol_3 - 1;
             $('#cont_sol_3').val(cont_sol_3);
             $( "#sol_3_2" ).removeClass( "hidden" );
             $( "#sol_3_3" ).addClass( "hidden" );
             $( "#sol_3_3" ).addClass( "hidden" );
             var select_3_3 = $('#cUnidad_3_3');
             select_3_3.val($('option:first', select_3_3).val());

         }
    }

}

 function check_form_submit(){
    var sol_1_1 = $('#cUnidad_1_1');
    var sol_1_2 = $('#cUnidad_1_2');
    var sol_1_3 = $('#cUnidad_1_3');

    var sol_2_1 = $('#cUnidad_2_1');
    var sol_2_2 = $('#cUnidad_2_2');

    var sol_3_1 = $('#cUnidad_3_1');
    var sol_3_2 = $('#cUnidad_3_2');


    /* alert(sol_1_2.val()); */
    if (sol_1_1.val() != '0'){

        /////////////////////////////////////
       var tipo_equipo_1_1 =$('#csTipo');
       var tipo_equipo_1_1_count = $('#tipo_equipo_1_1_count').val();

       if(tipo_equipo_1_1.val() == 0){

        tipo_equipo_1_1.css("border-color", "red")
        tipo_equipo_1_1_count = 1;
        $('#tipo_equipo_1_1_count').val(tipo_equipo_1_1_count);

       }else if (tipo_equipo_1_1.val() != 0) {

        tipo_equipo_1_1_count = 0;
        $('#tipo_equipo_1_1_count').val(tipo_equipo_1_1_count);

       }
       /////////////////////////////////////
       var  capacidad_total_1_1=$('#capacidad_total');
       var capacidad_total_1_1_count = $('#capacidad_total_1_1_count').val();

       if(capacidad_total_1_1.val() == 0){

        capacidad_total_1_1.css("border-color", "red")
        capacidad_total_1_1_count = 1;
        $('#capacidad_total_1_1_count').val(capacidad_total_1_1_count);

       }else if (capacidad_total_1_1.val() != 0) {

        capacidad_total_1_1_count = 0;
        $('#capacidad_total_1_1_count').val(capacidad_total_1_1_count);

       }
        /////////////////////////////////////
       var costo_elec_1_1 =$('#costo_elec');
       var costo_elec_1_1_count = $('#costo_elec_1_1_count').val();

       if(costo_elec_1_1.val() == 0){

        costo_elec_1_1.css("border-color", "red")
        costo_elec_1_1_count = 1;
        $('#costo_elec_1_1_count').val(costo_elec_1_1_count);

       }else if (costo_elec_1_1.val() != 0) {

        costo_elec_1_1_count = 0;
        $('#costo_elec_1_1_count').val(costo_elec_1_1_count);

       }
         /////////////////////////////////////

       var csStd_cant_1_1 =$('#csStd_cant_1_1');
       var csStd_cant_1_1_count = $('#csStd_cant_1_1_count').val();

       if(csStd_cant_1_1.val() == 0){

        csStd_cant_1_1.css("border-color", "red");
        csStd_cant_1_1_count = 1;
        $('#csStd_cant_1_1_count').val(csStd_cant_1_1_count);

       }else if (csStd_cant_1_1.val() != 0) {

        csStd_cant_1_1_count = 0;
        $('#csStd_cant_1_1_count').val(csStd_cant_1_1_count);

       }

     /////////////////////////////////////
       var tipo_control_1_1 =$('#tipo_control_1_1');
       var tipo_control_1_count = $('#tipo_control_1_1_count').val();

       if(tipo_control_1_1.val() == 0 || tipo_control_1_1.val() == null){

        tipo_control_1_1.css("border-color", "red")
        tipo_control_1_count = 1;
        $('#tipo_control_1_count').val(tipo_control_1_count);

       }else if (csStd_cant_1_1.val() != 0) {

        tipo_control_1_count = 0;
        $('#tipo_control_1_count').val(tipo_control_1_count);

       }
        /////////////////////////////////////
       var dr_1_1 =$('#dr_1_1');
       var dr_1_1_count = $('#dr_1_1_count').val();

       if(dr_1_1.val() == "" || dr_1_1.val() == null){

        dr_1_1.css("border-color", "red")
        dr_1_1_count = 1;
        $('#dr_1_1_count').val(dr_1_1_count);

       }else if (dr_1_1.val() != "" || dr_1_1.val() != null) {

        dr_1_1_count = 0;
        $('#dr_1_1_count').val(dr_1_1_count);

       }
        /////////////////////////////////////
       var csMantenimiento =$('#csMantenimiento');
       var csMantenimiento_1_1_count = $('#csMantenimiento_1_1_count').val();

       if(csMantenimiento.val() == 0){

        csMantenimiento.css("border-color", "red")
        csMantenimiento_1_1_count = 1;
        $('#csMantenimiento_1_1_count').val(csMantenimiento_1_1_count);

       }else if (csMantenimiento.val() != 0) {

        csMantenimiento_1_1_count = 0;
        $('#csMantenimiento_1_1_count').val(csMantenimiento_1_1_count);

       }
       /////////////////////////////////////
       var csDisenio_1_1 =$('#csDisenio_1_1');
       var csDisenio_1_1_count = $('#csDisenio_1_1_count').val();

       if(csDisenio_1_1.val() == '' || csDisenio_1_1.val() == null){

        csDisenio_1_1.css("border-color", "red")
        csDisenio_1_1_count = 1;
        $('#csDisenio_1_1_count').val(csDisenio_1_1_count);

       }else if (csDisenio_1_1.val() != '' || csDisenio_1_1.val() != null) {

            csDisenio_1_1_count = 0;
           $('#csDisenio_1_1_count').val(csDisenio_1_1_count);


       }
        /////////////////////////////////////
       var hrsEnfriado =$('#hrsEnfriado');
       var hrsEnfriado_1_1_count = $('#hrsEnfriado_1_1_count').val();

       if(hrsEnfriado.val() == 0 || hrsEnfriado.val() == ""){

        hrsEnfriado.css("border-color", "red")
        hrsEnfriado_1_1_count = 1;

        $('#hrsEnfriado_1_1_count').val(hrsEnfriado_1_1_count);
       }else if (hrsEnfriado.val() != 0 || hrsEnfriado.val() != null) {

        hrsEnfriado_1_1_count = 0;
       $('#hrsEnfriado_1_1_count').val(hrsEnfriado_1_1_count);

        }

       var count_inps_1_1 = tipo_equipo_1_1_count + capacidad_total_1_1_count + costo_elec_1_1_count + dr_1_1_count + csStd_cant_1_1_count + tipo_control_1_count + csMantenimiento_1_1_count + csDisenio_1_1_count + hrsEnfriado_1_1_count;

       if(count_inps_1_1>0){
            Swal.fire({
                        title: '¡Atención!',
                        icon: 'warning',
                        text:'Faltan campos por completar en la Solucion Base'

                    })
                    return false;
                    }

    }

    //////////////////////////////////////////////////////////////

    if (sol_1_2.val() != '0'){

        var tipo_equipo_1_2 =$('#csTipo_1_2');
        var csTipo_1_2_count = $('#csTipo_1_2_count').val();

        if(tipo_equipo_1_2.val() == 0  || tipo_equipo_1_2.val() == null){

            tipo_equipo_1_2.css("border-color", "red")
            csTipo_1_2_count = 1;
            $('#csTipo_1_2_count').val(csTipo_1_2_count);

        }else if (tipo_equipo_1_2.val() != 0 || tipo_equipo_1_2.val() != null) {

            csTipo_1_2_count = 0;
            $('#csTipo_1_2_count').val(csTipo_1_2_count);

       }

        var  capacidad_total_1_2=$('#capacidad_total_1_2');
        var capacidad_tota_1_2_count = $('#capacidad_tota_1_2_count').val();

        if(capacidad_total_1_2.val() == 0){
            capacidad_total_1_2.css("border-color", "red")
            capacidad_tota_1_2_count = 1;
            $('#capacidad_tota_1_2_count').val(capacidad_tota_1_2_count);
        }else if (capacidad_total_1_2.val() != 0) {

            capacidad_tota_1_2_count = 0;
        $('#capacidad_tota_1_2_count').val(capacidad_tota_1_2_count);

        }

        var costo_elec_1_2 =$('#costo_elec_1_2');
        var costo_elec_1_2_count = $('#costo_elec_1_2_count').val();

        if(costo_elec_1_2.val() == 0){
            costo_elec_1_2.css("border-color", "red")
            costo_elec_1_2_count = 1;
            $('#costo_elec_1_2_count').val(costo_elec_1_2_count);
        }else if (costo_elec_1_2.val() != 0) {

            costo_elec_1_2_count = 0;
        $('#costo_elec_1_2_count').val(costo_elec_1_2_count);

        }

        var csStd_cant_1_2 =$('#csStd_cant_1_2');
        var csStd_1_2_count = $('#csStd_1_2_count').val();

        if(csStd_cant_1_2.val() == 0){
            csStd_cant_1_2.css("border-color", "red")
            csStd_1_2_count = 1;
            $('#csStd_1_2_count').val(csStd_1_2_count);
        }else if (csStd_cant_1_2.val() != 0) {

            csStd_1_2_count = 0;
        $('#csStd_1_2_count').val(csStd_1_2_count);

        }

        var tipo_control_1_2 =$('#tipo_control_1_2');
        var tipo_control_1_2_count = $('#tipo_control_1_2_count').val();

        if(tipo_control_1_2.val() == 0 || tipo_control_1_2.val() == null){
            tipo_control_1_2.css("border-color", "red")
            tipo_control_1_2_count = 1;
            $('#tipo_control_1_2_count').val(tipo_control_1_2_count);
        }else if (tipo_control_1_2.val() != 0) {

            tipo_control_1_2_count = 0;
            $('#tipo_control_1_2_count').val(tipo_control_1_2_count);

        }

        var dr_1_2 =$('#dr_1_2');
        var dr_1_2_count = $('#dr_1_2_count').val();

        if(dr_1_2.val() == "" || dr_1_2.val() == null){

            dr_1_2.css("border-color", "red")
            dr_1_2_count = 1;
            $('#dr_1_2_count').val(dr_1_2_count);

        }else if (dr_1_2 .val() != '' || dr_1_2.val() != null) {

            dr_1_2_count = 0;
            $('#dr_1_2_count').val(dr_1_2_count);

        }

        var csMantenimiento_1_2 =$('#csMantenimiento_1_2');
        var csMantenimiento_1_2_count = $('#csMantenimiento_1_2_count').val();

        if(csMantenimiento_1_2.val() == 0){

            csMantenimiento_1_2.css("border-color", "red")
            csMantenimiento_1_2_count = 1;
            $('#csMantenimiento_1_2_count').val(csMantenimiento_1_2_count);

        }else if (csMantenimiento_1_2.val() != 0) {

            csMantenimiento_1_2_count = 0;
            $('#csMantenimiento_1_2_count').val(csMantenimiento_1_2_count);

        }

        var csDisenio_1_2 =$('#csDisenio_1_2');
        var csDisenio_1_2_count = $('#csDisenio_1_2_count').val();

        if(csDisenio_1_2.val() == "" || csDisenio_1_2.val() == null){

         csDisenio_1_2.css("border-color", "red")
         csDisenio_1_2_count = 1;
         $('#csDisenio_1_2_count').val(csDisenio_1_2_count);

        }else if (csDisenio_1_2.val() != '' || csDisenio_1_2.val() != null) {

            csDisenio_1_2_count = 0;
        $('#csDisenio_1_2_count').val(csDisenio_1_2_count);


        }

        var hrsEnfriado_1_2 =$('#hrsEnfriado_1_2');
        var hrsEnfriado_1_2_count = $('#hrsEnfriado_1_2_count').val();

        if(hrsEnfriado_1_2.val() == 0 || hrsEnfriado_1_2.val() == ""){

            hrsEnfriado_1_2.css("border-color", "red")
         hrsEnfriado_1_2_count = 1;
         $('#hrsEnfriado_1_2_count').val(hrsEnfriado_1_2_count);

        }else if (hrsEnfriado_1_2.val() != 0) {

            hrsEnfriado_1_2_count = 0;
        $('#hrsEnfriado_1_2_count').val(hrsEnfriado_1_2_count);

        }


            var count_inps_1_2 = csTipo_1_2_count +
            capacidad_tota_1_2_count + costo_elec_1_2_count
            + dr_1_2_count + csStd_1_2_count +
            tipo_control_1_2_count + csMantenimiento_1_2_count +
            csDisenio_1_2_count + hrsEnfriado_1_2_count;
            if(count_inps_1_2>0){
                Swal.fire({
                            title: '¡Atención!',
                            icon: 'warning',
                            text:'Faltan campos por completar en la Solucion Base'

                        })
                        return false;
                        }

        }

        ////////////////////////////////////////

        if (sol_1_3.val() != '0'){
            var tipo_equipo_1_3 =$('#csTipo_1_3');
            var csTipo_1_3_count = $('#csTipo_1_3_count').val();
            if(tipo_equipo_1_3.val() == 0  || tipo_equipo_1_3.val() == null){

                tipo_equipo_1_3.css("border-color", "red")
                csTipo_1_3_count = 1;
                $('#csTipo_1_3_count').val(csTipo_1_3_count);
            }else if (tipo_equipo_1_3.val() != 0) {

                csTipo_1_3_count = 0;
                $('#csTipo_1_3_count').val(csTipo_1_3_count);

            }

            var  capacidad_total_1_3=$('#capacidad_total_1_3');
            var capacidad_total_1_3_count = $('#capacidad_total_1_3_count').val();

            if(capacidad_total_1_3.val() == 0){

                capacidad_total_1_3.css("border-color", "red")
                capacidad_total_1_3_count = 1;
                $('#capacidad_total_1_3_count').val(capacidad_total_1_3_count);
            }else if (capacidad_total_1_3.val() != 0) {

                capacidad_total_1_3_count = 0;
                $('#capacidad_total_1_3_count').val(capacidad_total_1_3_count);

            }

            var costo_elec_1_3 =$('#costo_elec_1_3');
            var costo_elec_1_3_count = $('#costo_elec_1_3_count').val();

            if(costo_elec_1_3.val() == 0){

                costo_elec_1_3.css("border-color", "red")
                costo_elec_1_3_count = 1;
                $('#costo_elec_1_3_count').val(costo_elec_1_3_count);

            }else if (costo_elec_1_3.val() != 0) {

                costo_elec_1_3_count = 0;
            $('#costo_elec_1_3_count').val(costo_elec_1_3_count);

            }

            var csStd_cant_1_3 =$('#csStd_cant_1_3');
            var csStd_cant_1_3_count = $('#csStd_cant_1_3_count').val();

            if(csStd_cant_1_3.val() == 0){
                csStd_cant_1_3.css("border-color", "red")
                csStd_cant_1_3_count = 1;
                $('#csStd_cant_1_3_count').val(csStd_cant_1_3_count);
            }else if (csStd_cant_1_1.val() != 0) {

                csStd_cant_1_3_count = 0;
            $('#csStd_cant_1_3_count').val(csStd_cant_1_3_count);

            }

            var tipo_control_1_3 =$('#tipo_control_1_3');
            var tipo_control_1_3_count = $('#tipo_control_1_3_count').val();

            if(tipo_control_1_3.val() == 0 || tipo_control_1_3.val() == null){
                tipo_control_1_3.css("border-color", "red")
                tipo_control_1_3_count = 1;
                $('#tipo_control_1_3_count').val(tipo_control_1_3_count);
            }else if (tipo_control_1_3.val() != 0) {

                tipo_control_1_3_count = 0;
            $('#tipo_control_1_3_count').val(tipo_control_1_3_count);

            }

            var dr_1_3 =$('#dr_1_3');
            var dr_1_3_count = $('#dr_1_3_count').val();

            if(dr_1_3.val() == '' || dr_1_3.val() == null){
                dr_1_3.css("border-color", "red")
                dr_1_3_count = 1;
                $('#dr_1_3_count').val(dr_1_3_count);
            }else if (dr_1_3.val() != '' || dr_1_3.val() != null) {

                dr_1_3_count = 0;
            $('#dr_1_3_count').val(dr_1_3_count);

            }

            var csMantenimiento_1_3 =$('#csMantenimiento_1_3');
            var csMantenimiento_1_3_count = $('#csMantenimiento_1_3_count').val();

            if(csMantenimiento_1_3.val() == 0){
                csMantenimiento_1_3.css("border-color", "red")
                csMantenimiento_1_3_count = 1;
                $('#csMantenimiento_1_3_count').val(csMantenimiento_1_3_count);
            }else if (csMantenimiento_1_3.val() != 0) {

                csMantenimiento_1_3_count = 0;
            $('#csMantenimiento_1_3_count').val(csMantenimiento_1_3_count);

            }

            var csDisenio_1_3 =$('#csDisenio_1_3');
            var csDisenio_1_3_count = $('#csDisenio_1_3_count').val();

            if(csDisenio_1_3.val() == 0 || csDisenio_1_3.val() == null){
                csDisenio_1_3.css("border-color", "red")
                csDisenio_1_3_count = 1;
                $('#csDisenio_1_3_count').val(csDisenio_1_3_count);
            }else if (csDisenio_1_3.val() != 0) {

                csDisenio_1_3_count = 0;
            $('#csDisenio_1_3_count').val(csDisenio_1_3_count);

            }

            var hrsEnfriado_1_3 =$('#hrsEnfriado_1_3');
            var hrsEnfriado_1_3_count = $('#hrsEnfriado_1_3_count').val();

            if(hrsEnfriado_1_3.val() == 0 || hrsEnfriado_1_3.val() == ""){
                hrsEnfriado_1_3.css("border-color", "red")
                hrsEnfriado_1_3_count = 1;
                $('#hrsEnfriado_1_3_count').val(hrsEnfriado_1_3_count);
            }else if (hrsEnfriado_1_3.val() != 0) {

                hrsEnfriado_1_3_count = 0;
            $('#hrsEnfriado_1_3_count').val(hrsEnfriado_1_3_count);

            }











            var count_inps_1_3 = csTipo_1_3_count +
            capacidad_total_1_3_count + costo_elec_1_3_count
            + dr_1_3_count + csStd_cant_1_3_count +
            tipo_control_1_3_count + csMantenimiento_1_3_count +
            csDisenio_1_3_count + hrsEnfriado_1_3_count;

            if(count_inps_1_3>0){
                Swal.fire({
                            title: '¡Atención!',
                            icon: 'warning',
                            text:'Faltan campos por completar en la Solucion Base'

                        })
                        return false;
                        }
            }


                if (sol_2_1.val() != '0'){

                    /////////////////////////////////////
                var tipo_equipo_2_1 =$('#cheTipo_2_1');
                var cheTipo_2_1_count = $('#cheTipo_2_1_count').val();

                if(tipo_equipo_2_1.val() == 0){

                    tipo_equipo_2_1.css("border-color", "red")
                    cheTipo_2_1_count = 1;
                    $('#cheTipo_2_1_count').val(cheTipo_2_1_count);

                }else if (tipo_equipo_2_1.val() != 0) {

                    cheTipo_2_1_count = 0;
                    $('#cheTipo_2_1_count').val(cheTipo_2_1_count);

                }
                /////////////////////////////////////
                var  capacidad_total_2_1=$('#capacidad_total_2_1');
                var capacidad_total_2_1_count = $('#capacidad_total_2_1_count').val();

                if(capacidad_total_2_1.val() == 0 || capacidad_total_2_1.val() == ''){

                    capacidad_total_2_1.css("border-color", "red")
                    capacidad_total_2_1_count = 1;
                    $('#capacidad_total_2_1_count').val(capacidad_total_2_1_count);

                }else if (capacidad_total_2_1.val() != 0 || capacidad_total_2_1.val() != '') {

                    capacidad_total_2_1_count = 0;
                    $('#capacidad_total_2_1_count').val(capacidad_total_2_1_count);

                }
                    /////////////////////////////////////
                var costo_elec_2_1 =$('#costo_elec_2_1');
                var costo_elec_2_1_count = $('#costo_elec_2_1_count').val();

                if(costo_elec_2_1.val() == 0){

                    costo_elec_2_1.css("border-color", "red")
                    costo_elec_2_1_count = 1;
                    $('#costo_elec_2_1_count').val(costo_elec_2_1_count);

                }else if (costo_elec_2_1.val() != 0) {

                    costo_elec_2_1_count = 0;
                    $('#costo_elec_2_1_count').val(costo_elec_2_1_count);

                }
                    /////////////////////////////////////

                var csStd_cant_2_1 =$('#csStd_cant_2_1');
                var csStd_cant_2_1_count = $('#csStd_cant_2_1_count').val();

                if(csStd_cant_2_1.val() == 0){

                    csStd_cant_2_1.css("border-color", "red");
                    csStd_cant_2_1_count = 1;
                    $('#csStd_cant_2_1_count').val(csStd_cant_2_1_count);

                }else if (csStd_cant_2_1.val() != 0) {

                    csStd_cant_2_1_count = 0;
                    $('#csStd_cant_2_1_count').val(csStd_cant_2_1_count);

                }

                /////////////////////////////////////
                var tipo_control_2_1 =$('#tipo_control_2_1');
                var tipo_control_2_1_count = $('#tipo_control_2_1_count').val();

                if(tipo_control_2_1.val() == 0 || tipo_control_2_1.val() == null){

                    tipo_control_2_1.css("border-color", "red")
                    tipo_control_2_1_count = 1;
                    $('#tipo_control_2_1_count').val(tipo_control_2_1_count);

                }else if (tipo_control_2_1.val() != 0) {

                    tipo_control_2_1_count = 0;
                    $('#tipo_control_2_1_count').val(tipo_control_2_1_count);

                }
                    /////////////////////////////////////
                var dr_2_1 =$('#dr_2_1');
                var dr_2_1_count = $('#dr_2_1_count').val();

                if(dr_2_1.val() == '' || dr_2_1.val() == null){

                    dr_2_1.css("border-color", "red")
                    dr_2_1_count = 1;
                    $('#dr_2_1_count').val(dr_2_1_count);

                }else if (dr_2_1.val() != '' || dr_2_1.val() != null) {

                    dr_2_1_count = 0;
                    $('#dr_2_1_count').val(dr_2_1_count);

                }
                    /////////////////////////////////////
                var csMantenimiento_2_1 =$('#csMantenimiento_2_1');
                var csMantenimiento_2_1_count = $('#csMantenimiento_2_1_count').val();

                if(csMantenimiento_2_1.val() == 0){

                    csMantenimiento_2_1.css("border-color", "red")
                    csMantenimiento_2_1_count = 1;
                    $('#csMantenimiento_2_1_count').val(csMantenimiento_2_1_count);

                }else if (csMantenimiento_2_1.val() != 0) {

                    csMantenimiento_2_1_count = 0;
                    $('#csMantenimiento_2_1_count').val(csMantenimiento_2_1_count);

                }
                /////////////////////////////////////
                var cheDisenio_2_1 =$('#cheDisenio_2_1');
                var cheDisenio_2_1_count = $('#cheDisenio_2_1_count').val();

                if(cheDisenio_2_1.val() == '' || cheDisenio_2_1.val() == null){

                    cheDisenio_2_1.css("border-color", "red")
                    cheDisenio_2_1_count = 1;
                    $('#cheDisenio_2_1_count').val(cheDisenio_2_1_count);

                }else if (cheDisenio_2_1.val() != '' || cheDisenio_2_1.val() != null) {

                    cheDisenio_2_1_count = 0;
                    $('#cheDisenio_2_1_count').val(cheDisenio_2_1_count);


                }
                    /////////////////////////////////////
                var hrsEnfriado_2_1 =$('#hrsEnfriado_2_1');
                var hrsEnfriado_2_1_count = $('#hrsEnfriado_2_1_count').val();

                if(hrsEnfriado_2_1.val() == 0 || hrsEnfriado_2_1.val() == ""){

                    hrsEnfriado_2_1.css("border-color", "red")
                    hrsEnfriado_2_1_count = 1;
                    $('#hrsEnfriado_2_1_count').val(hrsEnfriado_2_1_count);

                }else if (hrsEnfriado_2_1.val() != 0 || hrsEnfriado_2_1.val() != null) {

                    hrsEnfriado_2_1_count = 0;
                $('#hrsEnfriado_2_1_count').val(hrsEnfriado_2_1_count);

                    }

                var count_inps_2_1 = cheTipo_2_1_count + capacidad_total_2_1_count + costo_elec_2_1_count + dr_2_1_count + csStd_cant_2_1_count + tipo_control_2_1_count + csMantenimiento_2_1_count + cheDisenio_2_1_count + hrsEnfriado_2_1_count;
              /*       alert(count_inps_2_1); */
                if(count_inps_2_1>0){
                        Swal.fire({
                                    title: '¡Atención!',
                                    icon: 'warning',
                                    text:'Faltan campos por completar en la Solucion A'

                                })
                                return false;
                                }



                }


                if (sol_2_2.val() != '0'){

                    /////////////////////////////////////
                var cheTipo_2_2 =$('#cheTipo_2_2');
                var cheTipo_2_2_count = $('#cheTipo_2_2_count').val();

                if(cheTipo_2_2.val() == 0){

                    cheTipo_2_2.css("border-color", "red")
                    cheTipo_2_2_count = 1;
                    $('#cheTipo_2_2_count').val(cheTipo_2_2_count);

                }else if (cheTipo_2_2.val() != 0) {

                    cheTipo_2_2_count = 0;
                    $('#cheTipo_2_2_count').val(cheTipo_2_2_count);

                }
                /////////////////////////////////////
                var  capacidad_total_2_2=$('#capacidad_total_2_2');
                var capacidad_total_2_2_count = $('#capacidad_total_2_2_count').val();

                if(capacidad_total_2_2.val() == 0 || capacidad_total_2_2.val() == ''){

                    capacidad_total_2_2.css("border-color", "red")
                    capacidad_total_2_2_count = 1;
                    $('#capacidad_total_2_2_count').val(capacidad_total_2_2_count);

                }else if (capacidad_total_2_2.val() != 0 || capacidad_total_2_2.val() != '') {

                    capacidad_total_2_2_count = 0;
                    $('#capacidad_total_2_2_count').val(capacidad_total_2_2_count);

                }
                    /////////////////////////////////////
                var costo_elec_2_2 =$('#costo_elec_2_2');
                var costo_elec_2_2_count = $('#costo_elec_2_2_count').val();

                if(costo_elec_2_2.val() == 0){

                    costo_elec_2_2.css("border-color", "red")
                    costo_elec_2_2_count = 1;
                    $('#costo_elec_2_2_count').val(costo_elec_2_2_count);

                }else if (costo_elec_2_2.val() != 0) {

                    costo_elec_2_2_count = 0;
                    $('#costo_elec_2_2_count').val(costo_elec_2_2_count);

                }
                    /////////////////////////////////////

                var csStd_cant_2_2 =$('#csStd_cant_2_2');
                var csStd_cant_2_2_count = $('#csStd_cant_2_2_count').val();

                if(csStd_cant_2_2.val() == 0){

                    csStd_cant_2_2.css("border-color", "red");
                    csStd_cant_2_2_count = 1;
                    $('#csStd_cant_2_2_count').val(csStd_cant_2_2_count);

                }else if (csStd_cant_2_2.val() != 0) {

                    csStd_cant_2_2_count = 0;
                    $('#csStd_cant_2_2_count').val(csStd_cant_2_2_count);

                }

                /////////////////////////////////////
                var tipo_control_2_2 =$('#tipo_control_2_2');
                var tipo_control_2_2_count = $('#tipo_control_2_2_count').val();

                if(tipo_control_2_2.val() == 0 || tipo_control_2_2.val() == null){

                    tipo_control_2_2.css("border-color", "red")
                    tipo_control_2_2_count = 1;
                    $('#tipo_control_2_2_count').val(tipo_control_2_2_count);

                }else if (tipo_control_2_2.val() != 0) {

                    tipo_control_2_2_count = 0;
                    $('#tipo_control_2_2_count').val(tipo_control_2_2_count);

                }
                    /////////////////////////////////////
                var dr_2_2 =$('#dr_2_2');
                var dr_2_2_count = $('#dr_2_2_count').val();

                if(dr_2_2.val() == '' || dr_2_2.val() == null){

                    dr_2_2.css("border-color", "red")
                    dr_2_2_count = 1;
                    $('#dr_2_2_count').val(dr_2_2_count);

                }else if (dr_2_2.val() != '' || dr_2_2.val() != null) {

                    dr_2_2_count = 0;
                    $('#dr_2_2_count').val(dr_2_2_count);

                }
                    /////////////////////////////////////
                var cheMantenimiento_2_2 =$('#cheMantenimiento_2_2');
                var cheMantenimiento_2_2_count = $('#cheMantenimiento_2_2_count').val();

                if(cheMantenimiento_2_2.val() == 0){

                    cheMantenimiento_2_2.css("border-color", "red")
                    cheMantenimiento_2_2_count = 1;
                    $('#cheMantenimiento_2_2_count').val(cheMantenimiento_2_2_count);

                }else if (cheMantenimiento_2_2.val() != 0) {

                    cheMantenimiento_2_2_count = 0;
                    $('#cheMantenimiento_2_2_count').val(cheMantenimiento_2_2_count);

                }
                /////////////////////////////////////
                var cheDisenio_2_2 =$('#cheDisenio_2_2');
                var cheDisenio_2_2_count = $('#cheDisenio_2_2_count').val();

                if(cheDisenio_2_2.val() == '' || cheDisenio_2_2.val() == null){

                    cheDisenio_2_2.css("border-color", "red")
                    cheDisenio_2_2_count = 1;
                    $('#cheDisenio_2_2_count').val(cheDisenio_2_2_count);

                }else if (cheDisenio_2_2.val() != '' || cheDisenio_2_2.val() != null) {

                    cheDisenio_2_2_count = 0;
                    $('#cheDisenio_2_2_count').val(cheDisenio_2_2_count);


                }
                    /////////////////////////////////////
                var hrsEnfriado_2_2 =$('#hrsEnfriado_2_2');
                var hrsEnfriado_2_2_count = $('#hrsEnfriado_2_2_count').val();

                if(hrsEnfriado_2_2.val() == 0 || hrsEnfriado_2_2.val() == ""){

                    hrsEnfriado_2_2.css("border-color", "red")
                    hrsEnfriado_2_2_count = 1;
                    $('#hrsEnfriado_2_2_count').val(hrsEnfriado_2_2_count);

                }else if (hrsEnfriado_2_2.val() != 0 || hrsEnfriado_2_2.val() != null) {

                    hrsEnfriado_2_2_count = 0;
                $('#hrsEnfriado_2_2_count').val(hrsEnfriado_2_2_count);

                    }

                    /*       alert(count_inps_2_1); */










                var count_inps_2_2 = cheTipo_2_2_count
                + capacidad_total_2_2_count
                + costo_elec_2_2_count
                + dr_2_2_count + csStd_cant_2_2_count
                 + tipo_control_2_2_count + cheMantenimiento_2_2_count
                 + cheDisenio_2_2_count + hrsEnfriado_2_2_count;

                if(count_inps_2_2>0){
                        Swal.fire({
                                    title: '¡Atención!',
                                    icon: 'warning',
                                    text:'Faltan campos por completar en la Solucion A'

                                })
                                return false;
                                }

                }

//////////////////////////////////////////////////////////////////////////////////////////


                /* ////////////////3.1//////////////////// */

                if (sol_3_1.val() != '0'){

                    /////////////////////////////////////
                var cheTipo_3_1 =$('#cheTipo_3_1');
                var cheTipo_3_1_count = $('#cheTipo_3_1_count').val();

                if(cheTipo_3_1.val() == 0){

                    cheTipo_3_1.css("border-color", "red")
                    cheTipo_3_1_count = 1;
                    $('#cheTipo_3_1_count').val(cheTipo_3_1_count);

                }else if (cheTipo_3_1.val() != 0) {

                    cheTipo_3_1_count = 0;
                    $('#cheTipo_3_1_count').val(cheTipo_3_1_count);

                }
                /////////////////////////////////////
                var  capacidad_total_3_1=$('#capacidad_total_3_1');
                var capacidad_total_3_1_count = $('#capacidad_total_3_1_count').val();

                if(capacidad_total_3_1.val() == 0 || capacidad_total_3_1.val() == ''){

                    capacidad_total_3_1.css("border-color", "red")
                    capacidad_total_3_1_count = 1;
                    $('#capacidad_total_3_1_count').val(capacidad_total_3_1_count);

                }else if (capacidad_total_3_1.val() != 0 || capacidad_total_3_1.val() != '') {

                    capacidad_total_3_1_count = 0;
                    $('#capacidad_total_3_1_count').val(capacidad_total_3_1_count);

                }
                    /////////////////////////////////////
                var costo_elec_3_1 =$('#costo_elec_3_1');
                var costo_elec_3_1_count = $('#costo_elec_3_1_count').val();

                if(costo_elec_3_1.val() == 0){

                    costo_elec_3_1.css("border-color", "red")
                    costo_elec_3_1_count = 1;
                    $('#costo_elec_3_1_count').val(costo_elec_3_1_count);

                }else if (costo_elec_3_1.val() != 0) {

                    costo_elec_3_1_count = 0;
                    $('#costo_elec_3_1_count').val(costo_elec_3_1_count);

                }
                    /////////////////////////////////////

                var cheStd_3_1 =$('#cheStd_3_1');
                var cheStd_3_1_count = $('#cheStd_3_1_count').val();

                if(cheStd_3_1.val() == 0){

                    cheStd_3_1.css("border-color", "red");
                    cheStd_3_1_count = 1;
                    $('#cheStd_3_1_count').val(cheStd_3_1_count);

                }else if (cheStd_3_1.val() != 0) {

                    cheStd_3_1_count = 0;
                    $('#cheStd_3_1_count').val(cheStd_3_1_count);

                }

                /////////////////////////////////////
                var tipo_control_3_1 =$('#tipo_control_3_1');
                var tipo_control_3_1_count = $('#tipo_control_3_1_count').val();

                if(tipo_control_3_1.val() == 0 || tipo_control_3_1.val() == null){

                    tipo_control_3_1.css("border-color", "red")
                    tipo_control_3_1_count = 1;
                    $('#tipo_control_3_1_count').val(tipo_control_3_1_count);

                }else if (tipo_control_3_1.val() != 0) {

                    tipo_control_3_1_count = 0;
                    $('#tipo_control_3_1_count').val(tipo_control_3_1_count);

                }
                    /////////////////////////////////////
                var dr_3_1 =$('#dr_3_1');
                var dr_3_1_count = $('#dr_3_1_count').val();

                if(dr_3_1.val() == '' || dr_3_1.val() == null){

                    dr_3_1.css("border-color", "red")
                    dr_3_1_count = 1;
                    $('#dr_3_1_count').val(dr_3_1_count);

                }else if (dr_3_1.val() != '' || dr_3_1.val() != null) {

                    dr_3_1_count = 0;
                    $('#dr_3_1_count').val(dr_3_1_count);

                }
                    /////////////////////////////////////
                var cheMantenimiento_3_1 =$('#cheMantenimiento_3_1');
                var cheMantenimiento_3_1_count = $('#cheMantenimiento_3_1_count').val();

                if(cheMantenimiento_3_1.val() == 0){

                    cheMantenimiento_3_1.css("border-color", "red")
                    cheMantenimiento_3_1_count = 1;
                    $('#cheMantenimiento_3_1_count').val(cheMantenimiento_3_1_count);

                }else if (cheMantenimiento_3_1.val() != 0) {

                    cheMantenimiento_3_1_count = 0;
                    $('#cheMantenimiento_3_1_count').val(cheMantenimiento_3_1_count);

                }
                /////////////////////////////////////
                var cheDisenio_3_1 =$('#cheDisenio_3_1');
                var cheDisenio_3_1_count = $('#cheDisenio_3_1_count').val();

                if(cheDisenio_3_1.val() == '' || cheDisenio_3_1.val() == null){

                    cheDisenio_3_1.css("border-color", "red")
                    cheDisenio_3_1_count = 1;
                    $('#cheDisenio_3_1_count').val(cheDisenio_3_1_count);

                }else if (cheDisenio_3_1.val() != '' || cheDisenio_3_1.val() != null) {

                    cheDisenio_3_1_count = 0;
                    $('#cheDisenio_3_1_count').val(cheDisenio_3_1_count);


                }
                    /////////////////////////////////////
                var hrsEnfriado_3_1 =$('#hrsEnfriado_3_1');
                var hrsEnfriado_3_1_count = $('#hrsEnfriado_3_1_count').val();

                if(hrsEnfriado_3_1.val() == 0 || hrsEnfriado_3_1.val() == ""){

                    hrsEnfriado_3_1.css("border-color", "red")
                    hrsEnfriado_3_1_count = 1;
                    $('#hrsEnfriado_3_1_count').val(hrsEnfriado_3_1_count);

                }else if (hrsEnfriado_3_1.val() != 0 || hrsEnfriado_3_1.val() != null) {

                    hrsEnfriado_3_1_count = 0;
                $('#hrsEnfriado_3_1_count').val(hrsEnfriado_3_1_count);

                    }


                var count_inps_3_1 = cheTipo_3_1_count + capacidad_total_3_1_count + costo_elec_3_1_count + dr_3_1_count + cheStd_3_1_count + tipo_control_3_1_count + cheMantenimiento_3_1_count + cheDisenio_3_1_count + hrsEnfriado_3_1_count;
              /*       alert(count_inps_2_1); */
                if(count_inps_3_1>0){
                        Swal.fire({
                                    title: '¡Atención!',
                                    icon: 'warning',
                                    text:'Faltan campos por completar en la Solucion B'

                                })
                                return false;
                                }

                }

                ////////////////////3-2//////////////////////////////////////
                if (sol_3_2.val() != '0'){

                    /////////////////////////////////////
                var cheTipo_3_2 =$('#cheTipo_3_2');
                var cheTipo_3_2_count = $('#cheTipo_3_2_count').val();

                if(cheTipo_3_2.val() == 0){

                    cheTipo_3_2.css("border-color", "red")
                    cheTipo_3_2_count = 1;
                    $('#cheTipo_3_2_count').val(cheTipo_3_2_count);

                }else if (cheTipo_3_2.val() != 0) {

                    cheTipo_3_2_count = 0;
                    $('#cheTipo_3_2_count').val(cheTipo_3_2_count);

                }
                /////////////////////////////////////
                var  capacidad_total_3_2=$('#capacidad_total_3_2');
                var capacidad_total_3_2_count = $('#capacidad_total_3_2_count').val();

                if(capacidad_total_3_2.val() == 0 || capacidad_total_3_2.val() == ''){

                    capacidad_total_3_2.css("border-color", "red")
                    capacidad_total_3_2_count = 1;
                    $('#capacidad_total_3_2_count').val(capacidad_total_3_2_count);

                }else if (capacidad_total_3_2.val() != 0 || capacidad_total_3_2.val() != '') {

                    capacidad_total_3_2_count = 0;
                    $('#capacidad_total_3_2_count').val(capacidad_total_3_2_count);

                }
                    /////////////////////////////////////
                var costo_elec_3_2 =$('#costo_elec_3_2');
                var costo_elec_3_2_count = $('#costo_elec_3_2_count').val();

                if(costo_elec_3_2.val() == 0){

                    costo_elec_3_2.css("border-color", "red")
                    costo_elec_3_2_count = 1;
                    $('#costo_elec_3_2_count').val(costo_elec_3_2_count);

                }else if (costo_elec_3_2.val() != 0) {

                    costo_elec_3_2_count = 0;
                    $('#costo_elec_3_2_count').val(costo_elec_3_2_count);

                }
                    /////////////////////////////////////

                var csStd_cant_3_2 =$('#csStd_cant_3_2');
                var csStd_cant_3_2_count = $('#csStd_cant_3_2_count').val();

                if(csStd_cant_3_2.val() == 0){

                    csStd_cant_3_2.css("border-color", "red");
                    csStd_cant_3_2_count = 1;
                    $('#csStd_cant_3_2_count').val(csStd_cant_3_2_count);

                }else if (csStd_cant_3_2.val() != 0) {

                    csStd_cant_3_2_count = 0;
                    $('#csStd_cant_3_2_count').val(csStd_cant_3_2_count);

                }

                /////////////////////////////////////
                var tipo_control_3_2 =$('#tipo_control_3_2');
                var tipo_control_3_2_count = $('#tipo_control_3_2_count').val();

                if(tipo_control_3_2.val() == 0 || tipo_control_3_2.val() == null){

                    tipo_control_3_2.css("border-color", "red")
                    tipo_control_3_2_count = 1;
                    $('#tipo_control_3_2_count').val(tipo_control_3_2_count);

                }else if (tipo_control_3_2.val() != 0) {

                    tipo_control_3_2_count = 0;
                    $('#tipo_control_3_2_count').val(tipo_control_3_2_count);

                }
                    /////////////////////////////////////
                var dr_3_2 =$('#dr_3_2');
                var dr_3_2_count = $('#dr_3_2_count').val();

                if(dr_3_2.val() == '' || dr_3_2.val() == null){

                    dr_3_2.css("border-color", "red")
                    dr_3_2_count = 1;
                    $('#dr_3_2_count').val(dr_3_2_count);

                }else if (dr_3_2.val() != '' || dr_3_2.val() != null) {

                    dr_3_2_count = 0;
                    $('#dr_3_2_count').val(dr_3_2_count);

                }
                    /////////////////////////////////////
                var cheMantenimiento_3_2 =$('#cheMantenimiento_3_2');
                var cheMantenimiento_3_2_count = $('#cheMantenimiento_3_2_count').val();

                if(cheMantenimiento_3_2.val() == 0){

                    cheMantenimiento_3_2.css("border-color", "red")
                    cheMantenimiento_3_2_count = 1;
                    $('#cheMantenimiento_3_2_count').val(cheMantenimiento_3_2_count);

                }else if (cheMantenimiento_3_2.val() != 0) {

                    cheMantenimiento_3_2_count = 0;
                    $('#cheMantenimiento_3_2_count').val(cheMantenimiento_3_2_count);

                }
                /////////////////////////////////////
                var cheDisenio_3_2 =$('#cheDisenio_3_2');
                var cheDisenio_3_2_count = $('#cheDisenio_3_2_count').val();

                if(cheDisenio_3_2.val() == '' || cheDisenio_3_2.val() == null){

                    cheDisenio_3_2.css("border-color", "red")
                    cheDisenio_3_2_count = 1;
                    $('#cheDisenio_3_2_count').val(cheDisenio_3_2_count);

                }else if (cheDisenio_3_2.val() != '' || cheDisenio_3_2.val() != null) {

                    cheDisenio_3_2_count = 0;
                    $('#cheDisenio_3_2_count').val(cheDisenio_3_2_count);


                }
                    /////////////////////////////////////
                var hrsEnfriado_3_2 =$('#hrsEnfriado_3_2');
                var hrsEnfriado_3_2_count = $('#hrsEnfriado_3_2_count').val();

                if(hrsEnfriado_3_2.val() == 0 || hrsEnfriado_3_2.val() == ""){

                    hrsEnfriado_3_2.css("border-color", "red")
                    hrsEnfriado_3_2_count = 1;
                    $('#hrsEnfriado_3_2_count').val(hrsEnfriado_3_2_count);

                }else if (hrsEnfriado_3_2.val() != 0 || hrsEnfriado_3_2.val() != null) {

                    hrsEnfriado_3_2_count = 0;
                $('#hrsEnfriado_3_2_count').val(hrsEnfriado_3_2_count);

                    }











                var count_inps_3_2 = cheTipo_3_2_count +
                capacidad_total_3_2_count + costo_elec_3_2_count +
                dr_3_2_count + csStd_cant_3_2_count + tipo_control_3_2_count +
                cheMantenimiento_3_2_count + cheDisenio_3_2_count +
                hrsEnfriado_3_2_count;
              /*       alert(count_inps_2_1); */
                if(count_inps_3_2>0){
                        Swal.fire({
                                    title: '¡Atención!',
                                    icon: 'warning',
                                    text:'Faltan campos por completar en la Solucion B'

                                })
                                return false;
                                }

                }
                /////////////////////////////////////////////////////////
                formulario = document.getElementById('formulario');
                formulario.submit();

  }

function valida_selects_inps(id_input){
   input_select = $('#'+id_input);
   if (input_select.val() != 0 || input_select.val() != null){
    input_select.css('border-color','#3182ce');
   }else if (input_select.val() == 0 || input_select.val() == null){
    input_select.css("border-color", "red");
   }
}

function valida_form_calc(){
    var sol_1_1 = $('#cUnidad_1_1');
    var sol_1_2 = $('#cUnidad_1_2');
    var sol_1_3 = $('#cUnidad_1_3');
    if (sol_1_1.val() != '0'){
        $('#calcular').attr('disabled', false);
        $('#calcular').css('background-color','#3c6382');
    }else if (sol_1_1.val() == '0'){
        $('#calcular').attr('disabled', true);
        $('#calcular').css('background-color','gray');
    }
}


