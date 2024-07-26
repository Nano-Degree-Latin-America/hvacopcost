// var sc = require('state-cities-db');

$(document).ready(function () {


    cap_term_change('TR');
    //getPaises();
    traer_categorias_edif();
    $('#div_next_h').addClass("hidden");
    $('#calcular_p_n').attr('disabled', true);
    $('#calcular_p_n').css('background-color','gray');
    $('#calcular_p_r').attr('disabled', true);
    $('#calcular_p_r').css('background-color','gray');


    /* $('#marcas_modal').select2({
        width: 'resolve'
    }); */
 /*    $('#next').attr('disabled', true); */
    //selecciona pais -> pinta ciudades de ese pais en el select
    $('#paises').on('change', function () {
        getCiudades($('#paises').val());
    });

    $('#btn-reset').on('click', function () {
        resetValues();
    });

    /* $('#equipo_modal').on('change', function () {
        var eficiencia = $('#equipo_modal').val();
        mostrar_eficiencias(eficiencia,'eficiencia_modal')
    }); */



    var eficiencia = $('#equipo_modal').val();
    mostrar_eficiencias(eficiencia,'eficiencia_modal');
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
        $('#pais_retro').val($('#paises option:selected').text());
      });
      $("#ciudades").on('change', () => {
        $('#ciudad').val($('#ciudades option:selected').text());
        $('#ciudad_retro').val($('#paises option:selected').text());
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
    $('#pais').val($('#paises option:selected').text());
    $('#pais_retro').val($('#paises option:selected').text());
   // $('#ciudad').val($('#ciudades option:selected').text());
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
            $('#count_ciudad').val(0);
            checksuma();
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

            $('#hrsEnfriado_1_1_retro').val(num_aux);
            $('#hrsEnfriado_1_2_retro').val(num_aux);
           // $('#hrsEnfriado_1_1_retro').val(num_aux);

            $('#hrsEnfriado_2_1_retro').val(num_aux);
            $('#hrsEnfriado_2_2_retro').val(num_aux);
           // $('#hrsEnfriado_2_3').val(num_aux);

            $('#hrsEnfriado_3_1_retro').val(num_aux);
            $('#hrsEnfriado_3_1_retro').val(num_aux);

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

function active_display(value){
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
            $('#base_border_bottom').css('border-bottom', '2px solid');
            $('#base_border_bottom').css('border-bottom-right-radius', '2px');
            $('#base_border_bottom').css('border-bottom-left-radius', '2px');

        }/* else if(cont_sol_1 == 3){
            set_sol_1 =  set_sol_1 + 1;
            cont_sol_1 =  cont_sol_1 + 1;
            $('#set_sol_1').val(set_sol_1);
            $('#cont_sol_1').val(cont_sol_1);
            $( "#sol_1_2" ).removeClass( "hidden" );
            $( "#sol_1_3" ).removeClass( "hidden" );

        } */


    }else if(value == 'sol_2') {

        if(cont_sol_2 == 2){
            $( "#sol_2_2" ).removeClass( "hidden" );
            $( "#sol_2_3" ).addClass( "hidden" );
            cont_sol_2 =  cont_sol_2 + 1;
            $('#cont_sol_2').val(cont_sol_2);
            $('#2_border_bottom').css('border-bottom', '2px solid');
             $('#2_border_bottom').css("border-color","#3182ce");
             $('#2_border_bottom').css('border-bottom-right-radius', '2px');
             $('#2_border_bottom').css('border-bottom-left-radius', '2px');
        }/* else if(cont_sol_2 == 3){
            cont_sol_2 =  cont_sol_2 + 1;
            $('#cont_sol_2').val(cont_sol_2);
            $( "#sol_2_2" ).removeClass( "hidden" );
            $( "#sol_2_3" ).removeClass( "hidden" );
        } */

    }else if(value == 'sol_3') {
        if(cont_sol_3 == 2){
            $( "#sol_3_2" ).removeClass( "hidden" );
            $( "#sol_3_3" ).addClass( "hidden" );
            cont_sol_3 =  cont_sol_3 + 1;
            $('#cont_sol_3').val(cont_sol_3);
            $('#3_border_bottom').css('border-bottom', '2px solid');
            $('#3_border_bottom').css("border-color","#3182ce");
            $('#3_border_bottom').css('border-bottom-right-radius', '2px');
            $('#3_border_bottom').css('border-bottom-left-radius', '2px');
        }/* else if(cont_sol_3 == 3){
            cont_sol_3 =  cont_sol_3 + 1;
            $('#cont_sol_3').val(cont_sol_3);
            $( "#sol_3_2" ).removeClass( "hidden" );
            $( "#sol_3_3" ).removeClass( "hidden" );
        } */

    }
}

function active_display_retro(value){
    var cont_sol_1 =  parseInt($('#cont_sol_1_retro').val());
    var cont_sol_2 =  parseInt($('#cont_sol_2_retro').val());
    var cont_sol_3 =  parseInt($('#cont_sol_3_retro').val());

    var set_sol_1 =  parseInt($('#set_sol_1_retro').val());

     if (value == 'sol_1_retro') {

        if(cont_sol_1 == 2){
             $( "#sol_1_2_retro" ).removeClass( "hidden" );
             $( "#sol_1_3" ).addClass( "hidden" );
             cont_sol_1 =  cont_sol_1 + 1;
             set_sol_1 =  set_sol_1 + 1;
             $('#set_sol_1_retro').val(set_sol_1);
             $('#cont_sol_1_retro').val(cont_sol_1);
         }else if(cont_sol_1 == 3){
             set_sol_1 =  set_sol_1 + 1;
             cont_sol_1 =  cont_sol_1 + 1;
             $('#set_sol_1_retro').val(set_sol_1);
             $('#cont_sol_1_retro').val(cont_sol_1);
             $( "#sol_1_2_retro" ).removeClass( "hidden" );
             //$( "#sol_1_3_retro" ).removeClass( "hidden" );

         }


     }else if(value == 'sol_2_retro') {

         if(cont_sol_2 == 2){
             $( "#sol_2_2_retro" ).removeClass( "hidden" );
             //$( "#sol_2_3_retro" ).addClass( "hidden" );
             cont_sol_2 =  cont_sol_2 + 1;
             $('#cont_sol_2_retro').val(cont_sol_2);
         }else if(cont_sol_2 == 3){
             cont_sol_2 =  cont_sol_2 + 1;
             $('#cont_sol_2_retro').val(cont_sol_2);
             $( "#sol_2_2_retro" ).removeClass( "hidden" );
             //$( "#sol_2_3_retro" ).removeClass( "hidden" );
         }

     }else if(value == 'sol_3_retro') {
        if(cont_sol_3 == 2){
            $( "#sol_3_2_retro" ).removeClass( "hidden" );
            cont_sol_3 =  cont_sol_3 + 1;
            $('#cont_sol_3_retro').val(cont_sol_3);
        }else if(cont_sol_3 == 3){
            cont_sol_3 =  cont_sol_3 + 1;
            $('#cont_sol_3_retro').val(cont_sol_3);
            $( "#sol_3_2_retro" ).removeClass( "hidden" );
        }

    }
 }

 function inactive_display_retro(value){
    var cont_sol_1 =  parseInt($('#cont_sol_1_retro').val());
    var cont_sol_2 =  parseInt($('#cont_sol_2_retro').val());
    var cont_sol_3 =  parseInt($('#cont_sol_3_retro').val());

    var set_sol_1 =  parseInt($('#set_sol_1_retro').val());





     if (value == 'sol_1_retro') {
         if(cont_sol_1 == 3){

             $( "#sol_1_2_retro" ).addClass( "hidden" );
              var select_1_2 = $('#cUnidad_1_2_retro');
              select_1_2.val($('option:first', select_1_2).val());
              cont_sol_1 =  cont_sol_1 - 1;
              set_sol_1 =  set_sol_1 - 1;
              $('#set_sol_1_retro').val(set_sol_1);
              $('#cont_sol_1_retro').val(cont_sol_1);
          }else if(cont_sol_1 == 4){
              set_sol_1 =  set_sol_1 - 1;
              cont_sol_1 =  cont_sol_1 - 1;
              $('#set_sol_1_retro').val(set_sol_1);
              $('#cont_sol_1_retro').val(cont_sol_1);
              $( "#sol_1_2_retro" ).removeClass( "hidden" );


          }
     }


     if (value == 'sol_2_retro') {

         if(cont_sol_2 == 3){
             $( "#sol_2_2_retro" ).addClass( "hidden" );
             var select_2_2 = $('#cUnidad_2_2_retro');
             select_2_2.val($('option:first', select_2_2).val());
             cont_sol_2 =  cont_sol_2 - 1;
             $('#cont_sol_2_retro').val(cont_sol_2);
         }else if(cont_sol_2 == 4){

            cont_sol_2 =  cont_sol_2 - 1;
             $('#cont_sol_2_retro').val(cont_sol_2);
             $( "#sol_2_2_retro" ).removeClass( "hidden" );
             var select_2_2 = $('#cUnidad_2_2_retro');
             select_2_2.val($('option:first', select_2_2).val());
         }
     }

     if (value == 'sol_3_retro') {

         if(cont_sol_3 == 3){
              $( "#sol_3_2_retro" ).addClass( "hidden" );
              var select_3_2 = $('#cUnidad_3_2_retro');
              select_3_2.val($('option:first', select_3_2).val());
              cont_sol_3 =  cont_sol_3 - 1;
              $('#cont_sol_3_retro').val(cont_sol_3);
          }else if(cont_sol_3 == 4){
             cont_sol_3 =  cont_sol_3 - 1;
              $('#cont_sol_3_retro').val(cont_sol_3);
              $( "#sol_3_2_retro" ).removeClass( "hidden" );
          }
     }

 }

 function check_val_text(id,ima){

    $('#'+id).empty();
    if(ima == 'es'){
        $('#'+id).append($('<option>', {
            value: '',
            text: '-Seleccionar-'
        }));
    }
    if(ima == 'port'){
        $('#'+id).append($('<option>', {
            value: '',
            text: '-Selecione-'
        }));
    }
 }


function unidadHvac(value,num_div,id_select){
  /*  var set_sol_1 =  $('#set_sol_1').val(); */
  var ima =  $('#idioma').val();
    if( num_div == 1){
      /*  $('#'+id_select).empty();
            $('#'+id_select).append($('<option>', {
                value: 0,
                text: 'Seleccionar'
            })); */
            check_val_text(id_select,ima);

            let arry = set_unit_type(value);

            const myObj = JSON.parse(arry);
                      for (let i = 0; i < myObj.arr.length; i++) {
                        $('#'+id_select).append($('<option>', {
                            value:  myObj.arr[i].value,
                            text:  myObj.arr[i].text
                        }));
                        console.log( myObj.arr[i].value);
                    }


    }else if( num_div == 2){
        check_val_text(id_select,ima);
        let arry = set_unit_type(value);

        const myObj = JSON.parse(arry);
                  for (let i = 0; i < myObj.arr.length; i++) {
                    $('#'+id_select).append($('<option>', {
                        value:  myObj.arr[i].value,
                        text:  myObj.arr[i].text
                    }));
                    console.log( myObj.arr[i].value);
                }
    }else if(num_div == 3){
        check_val_text(id_select,ima);
        let arry = set_unit_type(value);

        const myObj = JSON.parse(arry);
                  for (let i = 0; i < myObj.arr.length; i++) {
                    $('#'+id_select).append($('<option>', {
                        value:  myObj.arr[i].value,
                        text:  myObj.arr[i].text
                    }));
                    console.log( myObj.arr[i].value);
                }
    }
    var costo_elec = $('#costo_elec');
   $('#costo_elec_2_1').val(costo_elec.val());
   $('#costo_elec_3_1').val(costo_elec.val());
   var costo_elec = $('#costo_elec_1_1_retro');
   $('#costo_elec_2_1_retro').val(costo_elec.val());
   $('#costo_elec_3_1_retro').val(costo_elec.val());
}

function set_unit_type(value){
    switch (value) {
        case "1":
        var arry = '{ "arr" : [' +
        '{ "text":"Básico" , "value":"basico" },' +
        '{ "text":"c/ Economizador" , "value":"c_economizador" },' +
        '{ "text":"c/ Heat Recovery" , "value":"w_heat_rec" } ]}';
        break;

        case "2":
        var arry = '{ "arr" : [' +
        '{ "text":"Manejadora" , "value":"manejadora" },' +
        '{ "text":"Fancoil M/HSP" , "value":"fancoil" },' +
        '{"text":"Fancoil LSP" , "value":"fancoil_lsp_spt" } ]}';
        break;
        case "3":
        var arry = '{ "arr" : [' +
        '{ "text":"Pared - Piso - Techo" , "value":"ca_pi_te" },' +
        '{ "text":"Fancoil (LSP)" , "value":"fancoil_lsp" },' +
        '{ "text":"Cassette" , "value":"ca" }' +
        ']}';
        break;
        case "4":
        /* var arry = '{ "arr" : [' +
        '{ "text":"Manejadoras" , "value":"man" },' +
        '{ "text":"Fancoils (M/HSP)" , "value":"fancoil_hsp" },' +
        '{ "text":"Manejadoras c/DOA" , "value":"man_doa" },' +
        '{ "text":"Fancoils (M/HSP) c/ DOA" , "value":"fan_hsp_doa" },' +
        '{ "text":"Manejadoras DOA + HR" , "value":"man_doa_hr" },' +
        '{ "text":"Fancoils (M/HSP) DOA + HR" , "value":"fan_hsp_doa_hr" }' +
        ']}';
        break; */
        var arry = '{ "arr" : [' +
        '{ "text":"Manejadoras" , "value":"man" },' +
        '{ "text":"Fancoils (M/HSP)" , "value":"fancoil_hsp" },' +
        '{ "text":"Manejadoras DOA + HR" , "value":"man_doa_hr" }' +
        ']}';
        break;
        case "5":
        var arry =  '{ "arr" : [' +
        '{ "text":"Horiozontal" , "value":"horz" },' +
        '{ "text":"Vertical" , "value":"vert" }' +
        ']}';

        break;
        case "6":
        var arry = '{ "arr" : [' +
            '{ "text":"Torre Circuito Cerrado" , "value":"agu_cir_cer" },' +
            '{"text":"Torre Circuito Abierto" , "value":"agu_cir_abr" } ]}';
        break;
        case "7":
        var arry =  '{ "arr" : [' +
        '{ "text":"Pared - Piso - Techo" , "value":"pa_pi_te" },' +
        '{ "text":"Ductado (Concealed)" , "value":"duc_con" },' +
        '{ "text":"Cassette" , "value":"cass" }' +
        ']}';
        break;
        /* case "8":
            var arry = '{ "arr" : [' +
            '{ "text":"Manejadora" , "value":"man_scholl_const" },' +
            '{"text":"Fan Coils L/M HSP" , "value":"fan_hsp_scholl_const" } ]}';
        break;

        case "9":
            var arry = '{ "arr" : [' +
            '{ "text":"Manejadora" , "value":"man_scholl_var" },' +
            '{ "text":"Fan Coils L/M HSP" , "value":"fan_hsp_scholl_var" },' +
            '{"text":"Chilled Beans" , "value":"chill_bean_scholl_var" } ]}';
        break;

        case "10":
            var arry = '{ "arr" : [' +
            '{ "text":"Manejadora" , "value":"man_scholl_tor_four_eta" },' +
            '{ "text":"Fan Coils L/M HSP" , "value":"fan_hsp_tor_four_eta" },' +
            '{"text":"Chilled Beans" , "value":"chill_bean_tor_four_eta" } ]}';
        break; */


      default:
            // code block
    }

    return arry;
}

function change_diseño(value,num_div,id_select,id_tipo_control,id_dr,id_tipo_ventilacion,id_tipo_filtracion,equipo_value){
    /*  var set_sol_1 =  $('#set_sol_1').val(); */
    //console.log(value);
    var ima =  $('#idioma').val();
      if( num_div == 1){

        check_val_text(id_select,ima);
        check_val_text(id_tipo_control,ima);
        check_val_text(id_dr,ima);
        check_val_text(id_tipo_ventilacion,ima);
        check_val_text(id_tipo_filtracion,ima);
         $('#'+equipo_value).empty();
              var arry_disenio = set_diseño(value);
              const myObj = JSON.parse(arry_disenio);
                        for (let i = 0; i < myObj.arry_diseño.length; i++) {
                          $('#'+id_select).append($('<option>', {
                              value:  myObj.arry_diseño[i].value,
                              text:  myObj.arry_diseño[i].text
                          }));

                      }

                      var arry_control = set_control(value);
                      const myObj_cont = JSON.parse(arry_control);
                      for (let i = 0; i < myObj_cont.arry_control.length; i++) {
                        $('#'+id_tipo_control).append($('<option>', {
                            value:  myObj_cont.arry_control[i].value,
                            text:  myObj_cont.arry_control[i].text
                        }));

                    }

                    var arry_vent = set_ventilacion(value);
                    const myObj_vent = JSON.parse(arry_vent);
                    for (let i = 0; i < myObj_vent.arry_vent.length; i++) {
                      $('#'+id_tipo_ventilacion).append($('<option>', {
                          value:  myObj_vent.arry_vent[i].value,
                          text:  myObj_vent.arry_vent[i].text
                      }));

                  }

                  var arry_filt = set_filtracion(value);
                    const myObj_filt= JSON.parse(arry_filt);
                    for (let i = 0; i < myObj_filt.arry_filt.length; i++) {
                      $('#'+id_tipo_filtracion).append($('<option>', {
                          value:  myObj_filt.arry_filt[i].value,
                          text:  myObj_filt.arry_filt[i].text
                      }));

                  }

                    var arry_dr = set_dr(value,equipo_value);
                    const myObj_dr = JSON.parse(arry_dr);
                    for (let i = 0; i < myObj_dr.arry_dr.length; i++) {
                      $('#'+id_dr).append($('<option>', {
                          value:  myObj_dr.arry_dr[i].value,
                          text:  myObj_dr.arry_dr[i].text
                      }));

                  }


      }else if( num_div == 2){
          check_val_text(id_select,ima);
          check_val_text(id_tipo_control,ima);
          check_val_text(id_dr,ima);
        check_val_text(id_tipo_ventilacion,ima);
        check_val_text(id_tipo_filtracion,ima);

          $('#'+equipo_value).empty();


          var arry_disenio = set_diseño(value);

          const myObj = JSON.parse(arry_disenio);
                    for (let i = 0; i < myObj.arry_diseño.length; i++) {
                      $('#'+id_select).append($('<option>', {
                          value:  myObj.arry_diseño[i].value,
                          text:  myObj.arry_diseño[i].text
                      }));

                  }
                var arry_control = set_control(value);
                  const myObj_cont = JSON.parse(arry_control);
                  for (let i = 0; i < myObj_cont.arry_control.length; i++) {
                    $('#'+id_tipo_control).append($('<option>', {
                        value:  myObj_cont.arry_control[i].value,
                        text:  myObj_cont.arry_control[i].text
                    }));

                }

                    var arry_vent = set_ventilacion(value);
                    const myObj_vent = JSON.parse(arry_vent);
                    for (let i = 0; i < myObj_vent.arry_vent.length; i++) {
                      $('#'+id_tipo_ventilacion).append($('<option>', {
                          value:  myObj_vent.arry_vent[i].value,
                          text:  myObj_vent.arry_vent[i].text
                      }));

                  }

                  var arry_filt = set_filtracion(value);
                    const myObj_filt= JSON.parse(arry_filt);
                    for (let i = 0; i < myObj_filt.arry_filt.length; i++) {
                      $('#'+id_tipo_filtracion).append($('<option>', {
                          value:  myObj_filt.arry_filt[i].value,
                          text:  myObj_filt.arry_filt[i].text
                      }));

                  }

                var arry_dr = set_dr(value,equipo_value);
                const myObj_dr = JSON.parse(arry_dr);
                for (let i = 0; i < myObj_dr.arry_dr.length; i++) {
                  $('#'+id_dr).append($('<option>', {
                      value:  myObj_dr.arry_dr[i].value,
                      text:  myObj_dr.arry_dr[i].text
                  }));

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

          var arry_disenio = set_diseño(value);

          const myObj = JSON.parse(arry_disenio);
                    for (let i = 0; i < myObj.arry_diseño.length; i++) {
                      $('#'+id_select).append($('<option>', {
                          value:  myObj.arry_diseño[i].value,
                          text:  myObj.arry_diseño[i].text
                      }));

                  }
                  var arry_control = set_control(value);
                  const myObj_cont = JSON.parse(arry_control);
                  for (let i = 0; i < myObj_cont.arry_control.length; i++) {
                    $('#'+id_tipo_control).append($('<option>', {
                        value:  myObj_cont.arry_control[i].value,
                        text:  myObj_cont.arry_control[i].text
                    }));

                }
                var arry_dr = set_dr(value,equipo_value);
                const myObj_dr = JSON.parse(arry_dr);
                for (let i = 0; i < myObj_dr.arry_dr.length; i++) {
                  $('#'+id_dr).append($('<option>', {
                      value:  myObj_dr.arry_dr[i].value,
                      text:  myObj_dr.arry_dr[i].text
                  }));

              }
      }

  }

  function set_diseño(value){
    switch (value) {

        case "basico":

        var arry_disenio = '{ "arry_diseño" : [' +
          '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.12},' +
          '{ "text":"Descarga Directa Ductada" , "value":0.05},' +
          '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
          '{"text":"VAV y Retorno Ductado" , "value":-0.2} ]}';
        break;

    case "c_economizador":

      var arry_disenio = '{ "arry_diseño" : [' +
          '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.12},' +
          '{ "text":"Descarga Directa Ductada" , "value":0.05},' +
          '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
          '{"text":"VAV y Retorno Ductado" , "value":-0.2 } ]}';
    break;

    case "w_heat_rec":

      var arry_disenio = '{ "arry_diseño" : [' +
        '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.12},' +
        '{ "text":"Descarga Directa Ductada" , "value":0.05},' +
        '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
        '{"text":"VAV y Retorno Ductado" , "value":-0.2 } ]}';
      break;

    case "manejadora":

      var arry_disenio = '{ "arry_diseño" : [' +
         '{ "text":"Descarga Directa Sin Ductar" , "value":0.08},' +
         '{ "text":"Descarga Directa Ductada" , "value":0.05},' +
         '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.11},' +
         '{ "text":"Inyección y Retorno Ductado" , "value":0} ]}';
    break;

    case "fancoil":

      var arry_disenio = '{ "arry_diseño" : [' +
          '{ "text":"Descarga Directa Sin Ductar" , "value":0.08},' +
          '{ "text":"Descarga Directa Ductada" , "value":0.05},' +
          '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.12},' +
          '{"text":"Inyección y Retorno Ductado" , "value":0 } ]}';
    break;

    case "fancoil_lsp_spt":

    var arry_disenio = '{ "arry_diseño" : [' +
          '{ "text":"Descarga Directa Sin Ductar" , "value":0.08},' +
          '{ "text":"Descarga Directa Ductada" , "value":0.06},' +
          '{"text":"Ducto Flex. y Plenum Retorno" , "value":0.12 } ]}';

  break;

    case "ca_pi_te":
      var arry_disenio = '{ "arry_diseño" : [' +
          '{ "text":"Sin Unidad DOA" , "value":0.08},' +
          '{ "text":"Con Unidad DOA" , "value":0},' +
          '{"text":"Unidad DOA + Heat Recovery" , "value":-0.05 } ]}';
    break;

    case "fancoil_lsp":
      var arry_disenio = '{ "arry_diseño" : [' +
          '{ "text":"Sin Unidad DOA" , "value":0.08},' +
          '{ "text":"Con DOA y Descarga Ductada" , "value":0},' +
          '{"text":"Unidad DOA + Heat Recovery" , "value":-0.05 } ]}';
    break;

    case "ca":

    var arry_disenio = '{ "arry_diseño" : [' +
          '{ "text":"Sin Unidad DOA" , "value":0.16},' +
          '{ "text":"Con Unidad DOA" , "value":0},' +
          '{"text":"Unidad DOA + Heat Recovery" , "value":-0.05 } ]}';
     break;

     case "man":

      var arry_disenio = '{ "arry_diseño" : [' +
          '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
          '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.12},' +
          '{"text":"Descarga Directa Ductada" , "value":0.06 } ]}';
     break;

     case "fancoil_hsp":

      var arry_disenio = '{ "arry_diseño" : [' +
        '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
        '{ "text":"Ducto Flex. y Retorno Ductado" , "value":0.05},' +
        '{"text":"Ducto Flex. y Plenum Retorno" , "value":0.12 } ]}';
     break;

     case "man_doa_hr":

      var arry_disenio = '{ "arry_diseño" : [' +
        '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
        '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.12},' +
        '{"text":"Descarga Directa Ductada" , "value":0.06 } ]}';
     break;


   /* horz
   vert */
    case "horz":
      var arry_disenio = '{ "arry_diseño" : [' +
      '{ "text":"Filtros Aire MERV < 7" , "value":0.12},' +
      '{"text":"Filtros Aire MERV > 7" , "value":0} ]}';
    break;

    case "vert":
      var arry_disenio = '{ "arry_diseño" : [' +
      '{ "text":"Descarga Ductada c/ MERV < 7" , "value":0.1},' +
      '{"text":"Descarga Ductada c/ MERV > 7" , "value":-0.1 } ]}';
    break;

    case "agu_cir_cer":
      var arry_disenio = '{ "arry_diseño" : [' +
      '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
      '{ "text":"Inyección y Retorno Flexible" , "value":0.09},' +
      '{"text":"Inyección Flex. y Plenum Retorno" , "value":0.12 } ]}';
    break;

    case "agu_cir_abr":
      var arry_disenio = '{ "arry_diseño" : [' +
      '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
      '{ "text":"Inyección y Retorno Flexible" , "value":0.09},' +
      '{"text":"Inyección Flex. y Plenum Retorno" , "value":0.12 } ]}';
    break;

    case "pa_pi_te":
      var arry_disenio = '{ "arry_diseño" : [' +
      '{ "text":"Condensador Arriba" , "value":0.12},' +
      '{ "text":"Condensador Abajo" , "value":0.1},' +
      '{ "text":"Espalda con Espalda" , "value":0} ]}';
      break;

    case "duc_con":
      var arry_disenio = '{ "arry_diseño" : [' +
      '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
      '{ "text":"Inyección Ductada y Plenum Retorno" , "value":0.07} ]}';
      break;

      case "cass":
          var arry_disenio = '{ "arry_diseño" : [' +
          '{ "text":"Condensador Arriba" , "value":0.12},' +
          '{ "text":"Condensador Abajo" , "value":0.1} ]}';
      break;


   case "man_scholl_const":
      var arry_disenio = '{ "arry_diseño" : [' +
      '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
      '{ "text":"Inyección y Retorno Flexible" , "value":0.12},' +
      '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
      '{"text":"VAV y Retorno Ductado" , "value":-0.15 } ]}';
    break;

    case "fan_hsp_scholl_const":
      var arry_disenio = '{ "arry_diseño" : [' +
      '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
      '{ "text":"Inyección y Retorno Flexible" , "value":0.12},' +
      '{"text":"Inyección y Retorno Ductado" , "value":0 } ]}';
    break;


    case "man_scholl_var":
      var arry_disenio = '{ "arry_diseño" : [' +
      '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
      '{ "text":"Inyección y Retorno Flexible" , "value":0.12},' +
      '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
      '{ "text":"VAV y Retorno Ductado" , "value":-0.15},' +
      '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.2 } ]}';
    break;

    case "fan_hsp_scholl_var":
      var arry_disenio = '{ "arry_diseño" : [' +
      '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
      '{ "text":"Inyección y Retorno Flexible" , "value":0.12},' +
      '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
      '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.15 } ]}';

    break;

    case "chill_bean_scholl_var":
      var arry_disenio = '{ "arry_diseño" : [' +
      '{ "text":"Sistema Pasivo" , "value":0.05},' +
      '{"text":"Sistema Activo" , "value":-0.19 } ]}';
    break;

    case "man_scholl_tor_four_eta":
      var arry_disenio = '{ "arry_diseño" : [' +
      '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
      '{ "text":"Inyección y Retorno Flexible" , "value":0.12},' +
      '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
      '{ "text":"VAV y Retorno Ductado" , "value":-0.15},' +
      '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.2 } ]}';
    break;

   case "fan_hsp_tor_four_eta":
      var arry_disenio = '{ "arry_diseño" : [' +
      '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
      '{ "text":"Inyección y Retorno Flexible" , "value":0.12},' +
      '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
      '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.15 } ]}';
  break;

  case "chill_bean_tor_four_eta":
      var arry_disenio = '{ "arry_diseño" : [' +
      '{ "text":"Sistema Pasivo" , "value":0.05},' +
      '{"text":"Sistema Activo" , "value":-0.19 } ]}';
  break;

    default:
      // code block

      }
        if(arry_disenio.length>0){
           return arry_disenio;
        }else{
            return false;
        }
  }

  function set_control(value){

    switch (value) {
            case "basico":
            var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Fuera Zona de Confort" , "value":1.06},' +
            '{ "text":"Termostato en Zona de Confort" , "value":1},' +
            '{"text":"Termostato Inteligente en Zona" , "value":0.95 },' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';
        break;

        case "c_economizador":

        var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Fuera Zona de Confort" , "value":1.06},' +
            '{ "text":"Termostato en Zona de Confort" , "value":1},' +
            '{"text":"Termostato Inteligente en Zona" , "value":0.95 },' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';
        break;

        case "w_heat_rec":

        var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Fuera Zona de Confort" , "value":1.06},' +
            '{ "text":"Termostato en Zona de Confort" , "value":1},' +
            '{"text":"Termostato Inteligente en Zona" , "value":0.95 },' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';
        break;

        case "manejadora":

        var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Fuera Zona de Confort" , "value":1.06},' +
            '{ "text":"Termostato en Zona de Confort" , "value":1},' +
            '{"text":"Termostato Inteligente en Zona" , "value":0.95 } ]}';
        break;

        case "fancoil":

        var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Fuera Zona de Confort" , "value":1.06},' +
            '{ "text":"Termostato en Zona de Confort" , "value":1},' +
            '{"text":"Termostato Inteligente en Zona" , "value":0.95 } ]}';
        break;

        case "fancoil_lsp_spt":

        var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Fuera Zona de Confort" , "value":1.06},' +
            '{ "text":"Termostato en Zona de Confort" , "value":1},' +
            '{"text":"Termostato Inteligente en Zona" , "value":0.95 } ]}';
        break;

        case "ca_pi_te":
        var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.06},' +
            '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.94 } ]}';
        break;

        case "fancoil_lsp":
        var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.06},' +
            '{ "text":"Termostato Inteligente en Zona" , "value":1},' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.95 } ]}';
        break;

        case "ca":

        var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.06},' +
            '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.94 } ]}';
        break;

        case "man":

        var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.06},' +
            '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';
        break;

        case "fancoil_hsp":

        var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.06},' +
            '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';
        break;

        case "man_doa":

        var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.06},' +
            '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';
        break;

        case "fan_hsp_doa":

        var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.06},' +
            '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';
        break;

        case "man_doa_hr":

        var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.06},' +
            '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';
        break;

        case "fan_hsp_doa_hr":

        var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.06},' +
            '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';
        break;

        case "horz":
        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Interno" , "value":1.04},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{"text":"Termostato Inteligente en Zona" , "value":0.95 } ]}';
        break;

        case "vert":
        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.06},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{"text":"Termostato Inteligente en Zona" , "value":0.95 } ]}';
        break;

        case "agu_cir_cer":
        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.06},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{"text":"Termostato Inteligente en Zona" , "value":0.95 },' +
        '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';
        break;

        case "agu_cir_abr":
        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.06},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{"text":"Termostato Inteligente en Zona" , "value":0.95 },' +
        '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';
        break;

        case "pa_pi_te":
        var arry_control = '{ "arry_control" : [' +
        '{"text":"Termostato Interno" , "value":1.04 }  ]}';
        break;

        case "duc_con":
        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.06},' +
        '{"text":"Termostato Inteligente en Zona" , "value":0.94 }  ]}';
        break;

        case "cass":
            var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Interno" , "value":1.04},' +
            '{"text":"Termostato Inteligente en Zona" , "value":0.94 }  ]}';
        break;


        case "man_scholl_const":
        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
        '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';
        break;

        case "fan_hsp_scholl_const":
        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{"text":"Termostato Inteligente en Zona" , "value":0.95 } ]}';
        break;


        case "man_scholl_var":
        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
        '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';
        break;

        case "fan_hsp_scholl_var":
        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{"text":"Termostato Inteligente en Zona" , "value":0.95 } ]}';
        break;

        case "chill_bean_scholl_var":
        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
        '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';
        break;

        case "man_scholl_tor_four_eta":
        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
        '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';
        break;

        case "fan_hsp_tor_four_eta":
        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{"text":"Termostato Inteligente en Zona" , "value":0.95 } ]}';
        break;

        case "chill_bean_tor_four_eta":
        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
        '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';
        break;

        default:
        // code block

  }
            if(arry_control.length>0){
                return arry_control;
             }else{
                 return false;
             }
}

function set_dr(value,equipo_value){
    switch (value) {

        case "basico":

             var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
              '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

             $('#'+equipo_value).val(1);

        break;

        case "c_economizador":

          var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
              '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

             $('#'+equipo_value).val(0.94);

        break;

        case "w_heat_rec":
            var arry_dr = '{ "arry_dr" : [' +
            '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
            '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

             $('#'+equipo_value).val(0.9);

          break;

        case "manejadora":
            var arry_dr = '{ "arry_dr" : [' +
             '{ "text":"No Aplica" , "value":0},' +
             '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
             '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

            $('#'+equipo_value).val(1.04);

        break;

        case "fancoil":

          var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"No Aplica" , "value":0},' +
              '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
              '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

            $('#'+equipo_value).val(1.05);
        break;

        case "fancoil_lsp_spt":

        var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"No Aplica" , "value":0},' +
              '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
              '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

          $('#'+equipo_value).val(1.09);

      break;

        case "ca_pi_te":
          var arry_dr = '{ "arry_dr" : [' +
              '{"text":"No Aplica" , "value":0.08 } ]}';

            $('#'+equipo_value).val(0.98);
        break;

        case "fancoil_lsp":
          var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"No Aplica" , "value":0},' +
              '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
              '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

         $('#'+equipo_value).val(1.01);
        break;

        case "ca":
        var arry_dr = '{ "arry_dr" : [' +
              '{"text":"No Aplica" , "value":0.08 } ]}';

         $('#'+equipo_value).val(0.96);
         break;

         case "man":

          var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
              '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

          $('#'+equipo_value).val(1.06);

         break;

         case "fancoil_hsp":
            var arry_dr = '{ "arry_dr" : [' +
            '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
            '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

          $('#'+equipo_value).val(1.08);

         break;

         case "man_doa":
            var arry_dr = '{ "arry_dr" : [' +
            '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
            '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

          $('#'+equipo_value).val(0.94);

         break;

         case "fan_hsp_doa":
          var arry_dr = '{ "arry_dr" : [' +
            '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
            '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

          $('#'+equipo_value).val(0.96);

         break;

         case "man_doa_hr":

          var arry_dr = '{ "arry_dr" : [' +
            '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
            '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

          $('#'+equipo_value).val(0.84);

         break;

         case "fan_hsp_doa_hr":

          var arry_dr = '{ "arry_dr" : [' +
            '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
            '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

          $('#'+equipo_value).val(0.86);

         break;

       case "horz":
        var arry_dr = '{ "arry_dr" : [' +
        '{"text":"No Aplica" , "value":0.08 } ]}';

        $('#'+equipo_value).val(1.05);

      break;

      case "vert":
        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.1},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

        $('#'+equipo_value).val(1);

      break;

      case "agu_cir_cer":
        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"No Aplica" , "value":0},' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

        $('#'+equipo_value).val(0.86);

      break;

      case "agu_cir_abr":
        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"No Aplica" , "value":0},' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

        $('#'+equipo_value).val(0.96);

      break;

      case "pa_pi_te":
        var arry_dr = '{ "arry_dr" : [' +
        '{"text":"No Aplica" , "value":0.08 } ]}';

        $('#'+equipo_value).val(0.94);

        break;

      case "duc_con":
        var arry_dr = '{ "arry_dr" : [' +
        '{"text":"No Aplica" , "value":0.08 } ]}';

        $('#'+equipo_value).val(0.91);

        break;

        case "cass":
            var arry_dr = '{ "arry_dr" : [' +
            '{"text":"No Aplica" , "value":0.08 } ]}';

            $('#'+equipo_value).val(0.94);

        break;


     case "man_scholl_const":
        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';
        $('#'+equipo_value).val(1);

      break;

      case "fan_hsp_scholl_const":
        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';
        $('#'+equipo_value).val(1.05);
      break;


      case "man_scholl_var":
        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';
        $('#'+equipo_value).val(0.96);
      break;

      case "fan_hsp_scholl_var":
        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';
        $('#'+equipo_value).val(0.98);
      break;

      case "chill_bean_scholl_var":
        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';
        $('#'+equipo_value).val(0.9);

      break;

      case "man_scholl_tor_four_eta":
        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';
        $('#'+equipo_value).val(0.93);

      break;

     case "fan_hsp_tor_four_eta":
        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';
        $('#'+equipo_value).val(0.95);

    break;

    case "chill_bean_tor_four_eta":
        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';
        $('#'+equipo_value).val(0.87);

      break;

      default:
        // code block

        }
return arry_dr;
}

function set_filtracion(value){
    switch (value) {

        case "basico":

             var arry_filt = '{ "arry_filt" : [' +
              '{ "text":"MERV ≥ 7" , "value":1},' +
              '{ "text":"MERV ≥ 7 Lavables" , "value":1.04},' +
              '{ "text":"Metalicos Lavables" , "value":1.08},' +
              '{"text":"Sin Filtros" , "value":1.12 } ]}';
        break;

        case "c_economizador":

            var arry_filt = '{ "arry_filt" : [' +
            '{ "text":"MERV ≥ 7" , "value":1},' +
            '{ "text":"MERV ≥ 7 Lavables" , "value":1.04},' +
            '{ "text":"Metalicos Lavables" , "value":1.08},' +
            '{"text":"Sin Filtros" , "value":1.12 } ]}';
        break;

        case "w_heat_rec":
            var arry_filt = '{ "arry_filt" : [' +
            '{ "text":"MERV ≥ 7" , "value":1},' +
            '{ "text":"MERV ≥ 7 Lavables" , "value":1.04},' +
            '{ "text":"Metalicos Lavables" , "value":1.08},' +
            '{"text":"Sin Filtros" , "value":1.12 } ]}';
          break;

        case "manejadora":
            var arry_filt = '{ "arry_filt" : [' +
            '{ "text":"MERV ≥ 7" , "value":1},' +
            '{ "text":"MERV ≥ 7 Lavables" , "value":1.04},' +
            '{ "text":"Metalicos Lavables" , "value":1.08},' +
            '{"text":"Sin Filtros" , "value":1.12 } ]}';
        break;

        case "fancoil":

            var arry_filt = '{ "arry_filt" : [' +
            '{ "text":"MERV ≥ 7" , "value":1},' +
            '{ "text":"MERV ≥ 7 Lavables" , "value":1.04},' +
            '{ "text":"Metalicos Lavables" , "value":1.08},' +
            '{"text":"Sin Filtros" , "value":1.2 } ]}';
        break;

        case "fancoil_lsp_spt":

            var arry_filt = '{ "arry_filt" : [' +
            '{ "text":"MERV ≥ 7" , "value":1},' +
            '{ "text":"MERV ≥ 7 Lavables" , "value":1.04},' +
            '{ "text":"Metalicos Lavables" , "value":1.08},' +
            '{"text":"Sin Filtros" , "value":1.12 } ]}';
      break;

        case "ca_pi_te":
            var arry_filt = '{ "arry_filt" : [' +
            '{ "text":"MERV ≥ 7" , "value":1},' +
            '{ "text":"MERV ≥ 7 Lavables" , "value":1.04},' +
            '{ "text":"Metalicos Lavables" , "value":1.08},' +
            '{"text":"Sin Filtros" , "value":1.12 } ]}';
        break;

        case "fancoil_lsp":
            var arry_filt = '{ "arry_filt" : [' +
            '{ "text":"MERV ≥ 7" , "value":1},' +
            '{ "text":"MERV ≥ 7 Lavables" , "value":1.04},' +
            '{ "text":"Metalicos Lavables" , "value":1.08},' +
            '{"text":"Sin Filtros" , "value":1.12 } ]}';
        break;

        case "ca":
            var arry_filt = '{ "arry_filt" : [' +
            '{ "text":"MERV ≥ 7" , "value":1},' +
            '{ "text":"MERV ≥ 7 Lavables" , "value":1.04},' +
            '{ "text":"Metalicos Lavables" , "value":1.08},' +
            '{"text":"Sin Filtros" , "value":1.12 } ]}';
         break;

         case "man":

         var arry_filt = '{ "arry_filt" : [' +
         '{ "text":"MERV ≥ 7" , "value":1},' +
         '{ "text":"MERV ≥ 7 Lavables" , "value":1.04},' +
         '{ "text":"Metalicos Lavables" , "value":1.08},' +
         '{"text":"Sin Filtros" , "value":1.12 } ]}';

         break;

         case "fancoil_hsp":
            var arry_filt = '{ "arry_filt" : [' +
            '{ "text":"MERV ≥ 7" , "value":1},' +
            '{ "text":"MERV ≥ 7 Lavables" , "value":1.04},' +
            '{ "text":"Metalicos Lavables" , "value":1.08},' +
            '{"text":"Sin Filtros" , "value":1.12 } ]}';

         break;

         case "man_doa":
            var arry_filt = '{ "arry_filt" : [' +
            '{ "text":"MERV ≥ 7" , "value":1},' +
            '{ "text":"MERV ≥ 7 Lavables" , "value":1.04},' +
            '{ "text":"Metalicos Lavables" , "value":1.08},' +
            '{"text":"Sin Filtros" , "value":1.12 } ]}';

         break;

       case "horz":
        var arry_filt = '{ "arry_filt" : [' +
        '{ "text":"MERV ≥ 7" , "value":1},' +
        '{ "text":"MERV < 7  Lavables" , "value":1.08},' +
        '{"text":"Sin Filtros" , "value":1.12 } ]}';

      break;

      case "vert":
        var arry_filt = '{ "arry_filt" : [' +
        '{ "text":"MERV ≥ 7" , "value":1},' +
        '{ "text":"MERV < 7  Lavables" , "value":1.08},' +
        '{"text":"Sin Filtros" , "value":1.12 } ]}';

      break;

      case "agu_cir_cer":
        var arry_filt = '{ "arry_filt" : [' +
        '{ "text":"MERV ≥ 7" , "value":1},' +
        '{ "text":"MERV < 7  Lavables" , "value":1.08},' +
        '{"text":"Sin Filtros" , "value":1.12 } ]}';

      break;

      case "agu_cir_abr":
        var arry_filt = '{ "arry_filt" : [' +
        '{ "text":"MERV ≥ 7" , "value":1},' +
        '{ "text":"MERV < 7  Lavables" , "value":1.08},' +
        '{"text":"Sin Filtros" , "value":1.12 } ]}';

      break;

      case "pa_pi_te":
        var arry_filt = '{ "arry_filt" : [' +
        '{ "text":"MERV ≥ 7" , "value":1},' +
        '{ "text":"MERV < 7  Lavables" , "value":1.08},' +
        '{"text":"Sin Filtros" , "value":1.12 } ]}';
        break;

      case "duc_con":
        var arry_filt = '{ "arry_filt" : [' +
        '{ "text":"MERV ≥ 7" , "value":1},' +
        '{ "text":"MERV < 7  Lavables" , "value":1.08},' +
        '{"text":"Sin Filtros" , "value":1.12 } ]}';
        break;

        case "cass":
            var arry_filt = '{ "arry_filt" : [' +
            '{ "text":"MERV ≥ 7" , "value":1},' +
            '{ "text":"MERV < 7  Lavables" , "value":1.08},' +
            '{"text":"Sin Filtros" , "value":1.12 } ]}';
        break;
      default:
        // code block
        }
return arry_filt;
}

function set_ventilacion(value){

    switch (value) {

        case "basico":

             var arry_vent = '{ "arry_vent" : [' +
              '{ "text":"Aire Exterior Constante" , "value":-0.05},' +
              '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
              '{"text":"Sin Ventilación" , "value":0.1 } ]}';
        break;

        case "c_economizador":

            var arry_vent = '{ "arry_vent" : [' +
            '{ "text":"Aire Exterior Constante" , "value":-0.05},' +
            '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
            '{"text":"Sin Ventilación" , "value":0.1 } ]}';

        case "w_heat_rec":
            var arry_vent = '{ "arry_vent" : [' +
            '{ "text":"Aire Exterior Constante" , "value":-0.05},' +
            '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
            '{"text":"Sin Ventilación" , "value":0.1 } ]}';
          break;

        case "manejadora":
            var arry_vent = '{ "arry_vent" : [' +
            '{ "text":"Aire Exterior Constante" , "value":-0.05},' +
            '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
            '{"text":"Sin Ventilación" , "value":0.1 } ]}';
        break;

        case "fancoil":

            var arry_vent = '{ "arry_vent" : [' +
            '{ "text":"Aire Exterior Constante" , "value":-0.05},' +
            '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
              '{"text":"Sin Ventilación" , "value":0.1 } ]}';
        break;

        case "fancoil_lsp_spt":

            var arry_vent = '{ "arry_vent" : [' +
            '{ "text":"Aire Exterior Constante" , "value":-0.05},' +
            '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
            '{"text":"Sin Ventilación" , "value":0.1 } ]}';
      break;

        case "ca_pi_te":
            var arry_vent = '{ "arry_vent" : [' +
            '{ "text":"Aire Exterior Constante" , "value":-0.08},' +
            '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
            '{"text":"Sin Ventilación" , "value":0.12 } ]}';
        break;

        case "fancoil_lsp":
            var arry_vent = '{ "arry_vent" : [' +
            '{ "text":"Aire Exterior Constante" , "value":-0.08},' +
            '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
            '{"text":"Sin Ventilación" , "value":0.12 } ]}';
        break;

        case "ca":
            var arry_vent = '{ "arry_vent" : [' +
            '{ "text":"Aire Exterior Constante" , "value":-0.08},' +
            '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
            '{"text":"Sin Ventilación" , "value":0.12 } ]}';
         break;

         case "man":

         var arry_vent = '{ "arry_vent" : [' +
         '{ "text":"Aire Exterior Constante" , "value":-0.08},' +
         '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
         '{"text":"Sin Ventilación" , "value":0.1 } ]}';
         break;

         case "fancoil_hsp":
            var arry_vent = '{ "arry_vent" : [' +
            '{ "text":"Aire Exterior Constante" , "value":-0.08},' +
            '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
            '{"text":"Sin Ventilación" , "value":0.1 } ]}';
         break;

         case "man_doa":
            var arry_vent = '{ "arry_vent" : [' +
            '{ "text":"Aire Exterior Constante" , "value":-0.08},' +
            '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
            '{"text":"Sin Ventilación" , "value":0.1 } ]}';
         break;

       case "horz":
        var arry_vent = '{ "arry_vent" : [' +
        '{ "text":"Aire Exterior Constante" , "value":-0.05},' +
        '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
        '{"text":"Sin Ventilación" , "value":0.1 } ]}';
      break;

      case "vert":
        var arry_vent = '{ "arry_vent" : [' +
        '{ "text":"Aire Exterior Constante" , "value":-0.05},' +
        '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
        '{"text":"Sin Ventilación" , "value":0.1 } ]}';
      break;

      case "agu_cir_cer":
        var arry_vent = '{ "arry_vent" : [' +
        '{ "text":"Aire Exterior Constante" , "value":-0.05},' +
        '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
        '{"text":"Sin Ventilación" , "value":0.1 } ]}';
      break;

      case "agu_cir_abr":
        var arry_vent = '{ "arry_vent" : [' +
        '{ "text":"Aire Exterior Constante" , "value":-0.05},' +
        '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
        '{"text":"Sin Ventilación" , "value":0.1 } ]}';
      break;

      case "pa_pi_te":
        var arry_vent = '{ "arry_vent" : [' +
        '{ "text":"Aire Exterior Constante" , "value":-0.05},' +
        '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
        '{"text":"Sin Ventilación" , "value":0.1 } ]}';
        break;

      case "duc_con":
        var arry_vent = '{ "arry_vent" : [' +
        '{ "text":"Aire Exterior Constante" , "value":-0.05},' +
        '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
        '{"text":"Sin Ventilación" , "value":0.1 } ]}';
        break;

        case "cass":
            var arry_vent = '{ "arry_vent" : [' +
            '{ "text":"Aire Exterior Constante" , "value":-0.05},' +
            '{ "text":"Aire Exterior y Sensor CO2" , "value":-0.15},' +
            '{"text":"Sin Ventilación" , "value":0.1 } ]}';
        break;
      default:
        // code block
        }

return arry_vent;
}

/*


            case "basico":

            var arry_disenio = '{ "arry_diseño" : [' +
              '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
              '{ "text":"Descarga Directa Ductada" , "value":0.1},' +
              '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
              '{ "text":"VAV y Retorno Ductado" , "value":-0.2},' +
              '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.25 } ]}';

            var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
              '{ "text":"Termostato en Zona de Confort" , "value":1},' +
              '{"text":"Termostato Inteligente en Zona" , "value":0.95 },' +
              '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';

            var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
              '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

             $('#'+equipo_value).val(1);

        break;

        case "c_economizador":

          var arry_disenio = '{ "arry_diseño" : [' +
              '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
              '{ "text":"Descarga Directa Ductada" , "value":0.1},' +
              '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
              '{ "text":"VAV y Retorno Ductado" , "value":-0.2},' +
              '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.25 } ]}';

          var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
              '{ "text":"Termostato en Zona de Confort" , "value":1},' +
              '{"text":"Termostato Inteligente en Zona" , "value":0.95 },' +
              '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';

          var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
              '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

             $('#'+equipo_value).val(0.94);

        break;

        case "w_heat_rec":

          var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
            '{ "text":"Descarga Directa Ductada" , "value":0.1},' +
            '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
            '{ "text":"VAV y Retorno Ductado" , "value":-0.2},' +
            '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.25 } ]}';

          var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
            '{ "text":"Termostato en Zona de Confort" , "value":1},' +
            '{"text":"Termostato Inteligente en Zona" , "value":0.95 },' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';

          var arry_dr = '{ "arry_dr" : [' +
            '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
            '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

             $('#'+equipo_value).val(0.9);

          break;

        case "manejadora":

          var arry_disenio = '{ "arry_diseño" : [' +
             '{ "text":"Descarga Directa Sin Ductar" , "value":0.15},' +
             '{ "text":"Descarga Directa Ductada" , "value":0.1},' +
             '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
             '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
             '{ "text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.2} ]}';

          var arry_control = '{ "arry_control" : [' +
             '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
             '{ "text":"Termostato en Zona de Confort" , "value":1},' +
             '{"text":"Termostato Inteligente en Zona" , "value":0.95 } ]}';

          var arry_dr = '{ "arry_dr" : [' +
             '{ "text":"No Aplica" , "value":0},' +
             '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
             '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

            $('#'+equipo_value).val(1.04);

        break;

        case "fancoil":

          var arry_disenio = '{ "arry_diseño" : [' +
              '{ "text":"Descarga Directa Sin Ductar" , "value":0.15},' +
              '{ "text":"Descarga Directa Ductada" , "value":0.1},' +
              '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
              '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
              '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.2 } ]}';

          var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
              '{ "text":"Termostato en Zona de Confort" , "value":1},' +
              '{"text":"Termostato Inteligente en Zona" , "value":0.95 } ]}';

            var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"No Aplica" , "value":0},' +
              '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
              '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

            $('#'+equipo_value).val(1.05);
        break;

        case "fancoil_lsp_spt":

        var arry_disenio = '{ "arry_diseño" : [' +
              '{ "text":"Descarga Directa Sin Ductar" , "value":0.15},' +
              '{ "text":"Descarga Directa Ductada" , "value":0.1},' +
              '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
              '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.2 } ]}';

        var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
              '{ "text":"Termostato en Zona de Confort" , "value":1},' +
              '{"text":"Termostato Inteligente en Zona" , "value":0.95 } ]}';

        var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"No Aplica" , "value":0},' +
              '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
              '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

          $('#'+equipo_value).val(1.09);

      break;

        case "ca_pi_te":
          var arry_disenio = '{ "arry_diseño" : [' +
              '{ "text":"Sin Unidad DOA" , "value":0.16},' +
              '{ "text":"Con Unidad DOA" , "value":0},' +
              '{ "text":"Unidad DOA + Heat Recovery" , "value":-0.05},' +
              '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.14 } ]}';


          var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.12},' +
              '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
              '{"text":"Termostato en Red / DDC en Zona" , "value":0.94 } ]}';

            var arry_dr = '{ "arry_dr" : [' +
              '{"text":"No Aplica" , "value":0.08 } ]}';

            $('#'+equipo_value).val(0.98);
        break;

        case "fancoil_lsp":
          var arry_disenio = '{ "arry_diseño" : [' +
              '{ "text":"Sin Unidad DOA" , "value":0.16},' +
              '{ "text":"Con DOA y Descarga Ductada" , "value":0},' +
              '{ "text":"Unidad DOA + Heat Recovery" , "value":-0.05},' +
              '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.14 } ]}';

          var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.12},' +
              '{ "text":"Termostato Inteligente en Zona" , "value":1},' +
              '{"text":"Termostato en Red / DDC en Zona" , "value":0.95 } ]}';

          var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"No Aplica" , "value":0},' +
              '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
              '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

         $('#'+equipo_value).val(1.01);
        break;

        case "ca":

        var arry_disenio = '{ "arry_diseño" : [' +
              '{ "text":"Sin Unidad DOA" , "value":0.16},' +
              '{ "text":"Con Unidad DOA" , "value":0},' +
              '{ "text":"Unidad DOA + Heat Recovery" , "value":-0.05},' +
              '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.14 } ]}';

        var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.12},' +
              '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
              '{"text":"Termostato en Red / DDC en Zona" , "value":0.94 } ]}';

         var arry_dr = '{ "arry_dr" : [' +
              '{"text":"No Aplica" , "value":0.08 } ]}';

         $('#'+equipo_value).val(0.96);
         break;

         case "man":

          var arry_disenio = '{ "arry_diseño" : [' +
              '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
              '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
              '{"text":"Descarga Directa Ductada" , "value":0.1 } ]}';

          var arry_control = '{ "arry_control" : [' +
              '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.12},' +
              '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
              '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';

          var arry_dr = '{ "arry_dr" : [' +
              '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
              '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

          $('#'+equipo_value).val(1.06);

         break;

         case "fancoil_hsp":

          var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"Inyección y Retorno Ductado" , "value":0.03},' +
            '{ "text":"Ducto Flex. y Retorno Ductado" , "value":0.12},' +
            '{"text":"Ducto Flex. y Plenum Retorno" , "value":0.19 } ]}';

          var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.12},' +
            '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';

          var arry_dr = '{ "arry_dr" : [' +
            '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
            '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

          $('#'+equipo_value).val(1.08);

         break;

         case "man_doa":

          var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
            '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
            '{ "text":"Descarga Directa Ductada" , "value":0.1},' +
            '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.25 } ]}';

          var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.12},' +
            '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';

          var arry_dr = '{ "arry_dr" : [' +
            '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
            '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

          $('#'+equipo_value).val(0.94);

         break;

         case "fan_hsp_doa":

          var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
            '{ "text":"Ducto Flex. y Retorno Ductado" , "value":0.12},' +
            '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
            '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.18 } ]}';

          var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.12},' +
            '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';

          var arry_dr = '{ "arry_dr" : [' +
            '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
            '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

          $('#'+equipo_value).val(0.96);

         break;

         case "man_doa_hr":

          var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
            '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
            '{ "text":"Descarga Directa Ductada" , "value":0.1},' +
            '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.25 } ]}';

          var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.12},' +
            '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';

          var arry_dr = '{ "arry_dr" : [' +
            '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
            '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

          $('#'+equipo_value).val(0.84);

         break;

         case "fan_hsp_doa_hr":

          var arry_disenio = '{ "arry_diseño" : [' +
          '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
          '{ "text":"Ducto Flex. y Retorno Ductado" , "value":0.12},' +
          '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
          '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.18 } ]}';

          var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.12},' +
            '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
            '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';

          var arry_dr = '{ "arry_dr" : [' +
            '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
            '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

          $('#'+equipo_value).val(0.86);

         break;

       case "horz":
        var arry_disenio = '{ "arry_diseño" : [' +
        '{ "text":"Filtros Aire MERV < 7" , "value":0.12},' +
        '{"text":"Filtros Aire MERV > 7" , "value":0} ]}';

        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Interno" , "value":1.1},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{"text":"Termostato Inteligente en Zona" , "value":0.95 } ]}';

        var arry_dr = '{ "arry_dr" : [' +
        '{"text":"No Aplica" , "value":0.08 } ]}';

        $('#'+equipo_value).val(1.05);

      break;

      case "vert":
        var arry_disenio = '{ "arry_diseño" : [' +
        '{ "text":"Descarga Ductada c/ MERV < 7" , "value":0.1},' +
        '{"text":"Descarga Ductada c/ MERV > 7" , "value":-0.1 } ]}';

        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{"text":"Termostato Inteligente en Zona" , "value":0.95 } ]}';

        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.1},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

        $('#'+equipo_value).val(1);

      break;

      case "agu_cir_cer":
        var arry_disenio = '{ "arry_diseño" : [' +
        '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
        '{ "text":"Inyección y Retorno Flexible" , "value":0.12},' +
        '{ "text":"Inyección Flex. y Plenum Retorno" , "value":0.19},' +
        '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.22 } ]}';

        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{"text":"Termostato Inteligente en Zona" , "value":0.95 },' +
        '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';

        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"No Aplica" , "value":0},' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

        $('#'+equipo_value).val(0.86);

      break;

      case "agu_cir_abr":
        var arry_disenio = '{ "arry_diseño" : [' +
        '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
        '{ "text":"Inyección y Retorno Flexible" , "value":0.12},' +
        '{ "text":"Inyección Flex. y Plenum Retorno" , "value":0.19},' +
        '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.22 } ]}';

        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{"text":"Termostato Inteligente en Zona" , "value":0.95 },' +
        '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';

        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"No Aplica" , "value":0},' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';

        $('#'+equipo_value).val(0.96);

      break;

      case "pa_pi_te":
        var arry_disenio = '{ "arry_diseño" : [' +
        '{ "text":"Condensador Arriba" , "value":0.06},' +
        '{ "text":"Condensador Abajo" , "value":0.08},' +
        '{ "text":"Espalda con Espalda" , "value":0} ]}';

        var arry_control = '{ "arry_control" : [' +
        '{"text":"Termostato Interno" , "value":1.1 }  ]}';

        var arry_dr = '{ "arry_dr" : [' +
        '{"text":"No Aplica" , "value":0.08 } ]}';

        $('#'+equipo_value).val(0.94);

        break;

      case "duc_con":
        var arry_disenio = '{ "arry_diseño" : [' +
        '{ "text":"Inyección y Retorno Ductado" , "value":0.04},' +
        '{ "text":"Inyección Ductada y Plenum Retorno" , "value":0.15} ]}';

        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Inteligente Fuera Zona" , "value":1.12},' +
        '{"text":"Termostato Inteligente en Zona" , "value":0.94 }  ]}';

        var arry_dr = '{ "arry_dr" : [' +
        '{"text":"No Aplica" , "value":0.08 } ]}';

        $('#'+equipo_value).val(0.91);

        break;

        case "cass":
            var arry_disenio = '{ "arry_diseño" : [' +
            '{ "text":"Condensador Arriba" , "value":0.12},' +
            '{ "text":"Condensador Abajo" , "value":0.1} ]}';

            var arry_control = '{ "arry_control" : [' +
            '{ "text":"Termostato Interno" , "value":1.1},' +
            '{"text":"Termostato Inteligente en Zona" , "value":0.94 }  ]}';

            var arry_dr = '{ "arry_dr" : [' +
            '{"text":"No Aplica" , "value":0.08 } ]}';

            $('#'+equipo_value).val(0.94);

        break;


     case "man_scholl_const":
        var arry_disenio = '{ "arry_diseño" : [' +
        '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
        '{ "text":"Inyección y Retorno Flexible" , "value":0.12},' +
        '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
        '{"text":"VAV y Retorno Ductado" , "value":-0.15 } ]}';

        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
        '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';

        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';
        $('#'+equipo_value).val(1);

      break;

      case "fan_hsp_scholl_const":
        var arry_disenio = '{ "arry_diseño" : [' +
        '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
        '{ "text":"Inyección y Retorno Flexible" , "value":0.12},' +
        '{"text":"Inyección y Retorno Ductado" , "value":0 } ]}';

        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{"text":"Termostato Inteligente en Zona" , "value":0.95 } ]}';

        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';
        $('#'+equipo_value).val(1.05);

      break;


      case "man_scholl_var":
        var arry_disenio = '{ "arry_diseño" : [' +
        '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
        '{ "text":"Inyección y Retorno Flexible" , "value":0.12},' +
        '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
        '{ "text":"VAV y Retorno Ductado" , "value":-0.15},' +
        '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.2 } ]}';

        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
        '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';

        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';
        $('#'+equipo_value).val(0.96);

      break;

      case "fan_hsp_scholl_var":
        var arry_disenio = '{ "arry_diseño" : [' +
        '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
        '{ "text":"Inyección y Retorno Flexible" , "value":0.12},' +
        '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
        '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.15 } ]}';

        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{"text":"Termostato Inteligente en Zona" , "value":0.95 } ]}';

        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';
        $('#'+equipo_value).val(0.98);

      break;

      case "chill_bean_scholl_var":
        var arry_disenio = '{ "arry_diseño" : [' +
        '{ "text":"Sistema Pasivo" , "value":0.05},' +
        '{"text":"Sistema Activo" , "value":-0.19 } ]}';

        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
        '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';

        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';
        $('#'+equipo_value).val(0.9);

      break;

      case "man_scholl_tor_four_eta":
        var arry_disenio = '{ "arry_diseño" : [' +
        '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
        '{ "text":"Inyección y Retorno Flexible" , "value":0.12},' +
        '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
        '{ "text":"VAV y Retorno Ductado" , "value":-0.15},' +
        '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.2 } ]}';

        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
        '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';

        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';
        $('#'+equipo_value).val(0.93);

      break;

     case "fan_hsp_tor_four_eta":
        var arry_disenio = '{ "arry_diseño" : [' +
        '{ "text":"Ducto Flex. y Plenum Retorno" , "value":0.19},' +
        '{ "text":"Inyección y Retorno Flexible" , "value":0.12},' +
        '{ "text":"Inyección y Retorno Ductado" , "value":0},' +
        '{"text":"Basado en ASHRAE 90.1 - 2019" , "value":-0.15 } ]}';

        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{"text":"Termostato Inteligente en Zona" , "value":0.95 } ]}';

        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';
        $('#'+equipo_value).val(0.95);

    break;

    case "chill_bean_tor_four_eta":
        var arry_disenio = '{ "arry_diseño" : [' +
        '{ "text":"Sistema Pasivo" , "value":0.05},' +
        '{"text":"Sistema Activo" , "value":-0.19 } ]}';

        var arry_control = '{ "arry_control" : [' +
        '{ "text":"Termostato Fuera Zona de Confort" , "value":1.12},' +
        '{ "text":"Termostato en Zona de Confort" , "value":1},' +
        '{ "text":"Termostato Inteligente en Zona" , "value":0.95},' +
        '{"text":"Termostato en Red / DDC en Zona" , "value":0.93 } ]}';

        var arry_dr = '{ "arry_dr" : [' +
        '{ "text":"Cumple ASHRAE Standard 70" , "value":-0.01},' +
        '{"text":"No Cumple ASHRAE Standard 70" , "value":0.11 } ]}';
        $('#'+equipo_value).val(0.87);

      break;

      default:
        // code block

        }
*/

  function check_unidad(value){
    var ft = document.getElementById("check_ft");
    var mc = document.getElementById("check_mc");
    var unidad = document.getElementById("unidad");
    if(value == 'ft'){
        ft.checked = true;
        mc.checked = false;
        unidad.value = value;
         $('#count_unidad').val(1);
    }else if(value == 'mc'){
        ft.checked = false;
        mc.checked = true;
        unidad.value = value;
         $('#count_unidad').val(1);
    }

    checksuma();
  }

  function check_form_proy(value,new_p,retro_p,button_np,button_rp,action,type_p_aux){
    var pn = document.getElementById("pn");
    var pr = document.getElementById("pr");
    var man = document.getElementById("man");
    var type_p = document.getElementById("type_p");
    var action_submit_send = document.getElementById("action_submit_send");
    if(document.getElementById("id_project")){
        var id_project = document.getElementById("id_project").value;
    }
    if(value == 'pn'){
        pn.checked = true;
        pr.checked = false;
        man.checked = false;
        type_p.value = 1;
        //si tipo es igual a 2
        if(parseInt(type_p_aux) === 2 || parseInt(type_p_aux) === 3 ){
            action_submit_send.value = 'store';
            //se da de alta nuevas soluciones tipo proyecto retrofit
        }
        //si tipo es igual a 1
        if(parseInt(type_p_aux) === 1 || parseInt(type_p_aux) === 0){
            action_submit_send.value = 'update';
            //se actualiza proyecto nuevo
        }
        $('#'+retro_p).addClass("hidden");
        $('#'+new_p).removeClass("hidden");
        $('#'+button_np).removeClass("hidden");
        $('#'+button_rp).addClass("hidden");
        inactive_tarjets_retro('pn');
    }else if(value == 'pr'){
        type_p.value = 2;
        pn.checked = false;
        pr.checked = true;
        man.checked = false;

        if(action == 'edit'){

        }
        if(action != 'edit'){
            var equipo_1 = $('#cUnidad_1_1_retro').val();
            $('#csStd_1_1_retro').prop('disabled', false);
            send_marcas_equipo(equipo_1);
        }
         //si tipo es igual a 1
        if(parseInt(type_p_aux) === 1 || parseInt(type_p_aux) === 0 || parseInt(type_p_aux) === 3){
            action_submit_send.value = 'store';
             //se da de alta nuevas soluciones tipo proyecto nuevo
             clean_form_retro(0);

        }
        //si tipo es igual a 2
        if(parseInt(type_p_aux) === 2){
            action_submit_send.value = 'update';
            traer_unidad_hvac_edit(id_project,1,1,'cUnidad_1_1_retro','csTipo_1_1_retro','csDisenio_1_1_retro','tipo_control_1_1_retro','dr_1_1_retro','csMantenimiento_1_1_retro','lblCsTipo_1_1_retro'
            ,'capacidad_total_1_1_retro','costo_elec_1_1_retro','csStd_retro_1_1_cant','costo_recu_1_1_retro','csStd_1_1_retro'
            ,'maintenance_cost_1_1_retro','marca_1_1_retro','modelo_1_1_retro','yrs_vida_1_1_retro','const_an_rep_1_1','');
            //2_1
            traer_unidad_hvac_edit(id_project,1,2,'cUnidad_2_1_retro','cheTipo_2_1_retro','cheDisenio_2_1_retro','tipo_control_2_1_retro','dr_2_1_retro','csMantenimiento_2_1_retro','lblCsTipo_2_1_retro'
            ,'capacidad_total_2_1_retro','costo_elec_2_1_retro','csStd_cant_2_1_retro','costo_recu_2_1_retro','csStd_2_1_retro'
            ,'maintenance_cost_2_1_retro','marca_2_1_retro','modelo_2_1_retro','yrs_vida_2_1_retro','const_an_rep_2_1','action_submit_2_1_retro');
            //3_1
            traer_unidad_hvac_edit(id_project,1,3,'cUnidad_3_1_retro','cheTipo_3_1_retro','cheDisenio_3_1_retro','tipo_control_3_1_retro','dr_3_1_retro','cheMantenimiento_3_1_retro','lblCsTipo_3_1_retro'
            ,'capacidad_total_3_1_retro','costo_elec_3_1_retro','csStd_cant_3_1_retro','costo_recu_3_1_retro','csStd_3_1_retro'
            ,'maintenance_cost_3_1_retro','marca_3_1_retro','modelo_3_1_retro','yrs_vida_3_1_retro','const_an_rep_3_1','action_submit_3_1_retro');
            //se actualiza proyecto retro
        }
        $('#'+retro_p).removeClass("hidden");
        $('#'+new_p).addClass("hidden");
        $('#'+button_rp).removeClass("hidden");
        $('#'+button_np).addClass("hidden");
        $('#costo_anual_reparaciones_2_1_retro').addClass("hidden");
        $('#costo_anual_reparaciones_3_1_retro').addClass("hidden");
        inactive_tarjets_retro('pr');
        $('#inv_ini_capex_2_1_retro').removeClass("hidden");
        $('#inv_ini_capex_2_1_mant').addClass("hidden");
        $('#inv_ini_capex_3_1_retro').removeClass("hidden");
        $('#inv_ini_capex_3_1_mant').addClass("hidden");
        $('#button_inactive_2_1_mant').addClass("hidden");
        $('#button_inactive_2_1_retro').removeClass("hidden");
        $('#button_inactive_3_1_retro').removeClass("hidden");
        $('#button_inactive_3_1_mant').addClass("hidden");

    }else if(value == 'man'){
        type_p.value = 3;
        pn.checked = false;
        pr.checked = false;
        man.checked = true;

        if(action == 'edit'){

        }
        if(action != 'edit'){

            $('#csStd_1_1_retro').prop('disabled', false);
            send_marcas();
        }
         //si tipo es igual a 1
        if(parseInt(type_p_aux) === 1 || parseInt(type_p_aux) === 0 || parseInt(type_p_aux) === 2) {
            action_submit_send.value = 'store';
             //se da de alta nuevas soluciones tipo proyecto nuevo
             clean_form_retro(0);
        }
        //si tipo es igual a 2
        if(parseInt(type_p_aux) === 3){
            action_submit_send.value = 'update';

            //1_1
            traer_unidad_hvac_edit(id_project,1,1,'cUnidad_1_1_retro','csTipo_1_1_retro','csDisenio_1_1_retro','tipo_control_1_1_retro','dr_1_1_retro','csMantenimiento_1_1_retro','lblCsTipo_1_1_retro'
            ,'capacidad_total_1_1_retro','costo_elec_1_1_retro','csStd_retro_1_1_cant','costo_recu_1_1_retro','csStd_1_1_retro'
            ,'maintenance_cost_1_1_retro','marca_1_1_retro','modelo_1_1_retro','yrs_vida_1_1_retro','const_an_rep_1_1','');
            //2_1
            traer_unidad_hvac_edit(id_project,1,2,'cUnidad_2_1_retro','cheTipo_2_1_retro','cheDisenio_2_1_retro','tipo_control_2_1_retro','dr_2_1_retro','csMantenimiento_2_1_retro','lblCsTipo_2_1_retro'
            ,'capacidad_total_2_1_retro','costo_elec_2_1_retro','csStd_cant_2_1_retro','costo_recu_2_1_retro','csStd_2_1_retro'
            ,'maintenance_cost_2_1_retro','marca_2_1_retro','modelo_2_1_retro','yrs_vida_2_1_retro','const_an_rep_2_1','action_submit_2_1_retro');
            //3_1
            traer_unidad_hvac_edit(id_project,1,3,'cUnidad_3_1_retro','cheTipo_3_1_retro','cheDisenio_3_1_retro','tipo_control_3_1_retro','dr_3_1_retro','cheMantenimiento_3_1_retro','lblCsTipo_3_1_retro'
            ,'capacidad_total_3_1_retro','costo_elec_3_1_retro','csStd_cant_3_1_retro','costo_recu_3_1_retro','csStd_3_1_retro'
            ,'maintenance_cost_3_1_retro','marca_3_1_retro','modelo_3_1_retro','yrs_vida_3_1_retro','const_an_rep_3_1','action_submit_3_1_retro');
            //se act+ualiza proyecto retro
        }
        $('#'+retro_p).removeClass("hidden");
        $('#'+new_p).addClass("hidden");
        $('#'+button_rp).removeClass("hidden");
        $('#'+button_np).addClass("hidden");
        $('#costo_anual_reparaciones_2_1_retro').removeClass("hidden");
        $('#costo_anual_reparaciones_3_1_retro').removeClass("hidden");
        inactive_tarjets_retro('man');
        $('#inv_ini_capex_2_1_retro').addClass("hidden");
        $('#inv_ini_capex_2_1_mant').removeClass("hidden");
        $('#inv_ini_capex_3_1_retro').addClass("hidden");
        $('#inv_ini_capex_3_1_mant').removeClass("hidden");
        $('#button_inactive_2_1_mant').removeClass("hidden");
        $('#button_inactive_2_1_retro').addClass("hidden");
        $('#button_inactive_3_1_retro').addClass("hidden");
        $('#button_inactive_3_1_mant').removeClass("hidden");
    }
  }

  function check_form_proy_edit(type_p,id_project){
    calcular_p_n = $('#calcular_p_n_Edit');
    calcular_p_r = $('#calcular_p_r_Edit');
    if(type_p == 1 || type_p == 0){
        $('#display_nuevo_project_edit').removeClass("hidden");
        $('#display_nuevo_retrofit_edit').addClass("hidden");
        $('#type_p').val(1);
        calcular_p_n.removeClass("hidden");
        calcular_p_r.addClass("hidden");

    }

    if(type_p == 2 ){
        $('#display_nuevo_retrofit_edit').removeClass("hidden");
        $('#display_nuevo_project_edit').addClass("hidden");
        $('#type_p').val(type_p);
        calcular_p_n.addClass("hidden");
        calcular_p_r.removeClass("hidden");
        traer_unidad_hvac_edit(id_project,1,1,'cUnidad_1_1_retro','csTipo_1_1_retro','csDisenio_1_1_retro','tipo_control_1_1_retro','dr_1_1_retro','csMantenimiento_1_1_retro','lblCsTipo_1_1_retro'
        ,'capacidad_total_1_1_retro','costo_elec_1_1_retro','csStd_retro_1_1_cant','costo_recu_1_1_retro','csStd_1_1_retro'
        ,'maintenance_cost_1_1_retro','marca_1_1_retro','modelo_1_1_retro','yrs_vida_1_1_retro','const_an_rep_1_1','');

        inactive_tarjets_retro('pr');
        $('#costo_anual_reparaciones_2_1_retro').addClass("hidden");
        $('#costo_anual_reparaciones_3_1_retro').addClass("hidden");
        $('#button_inactive_2_1_mant').addClass("hidden");
        $('#button_inactive_2_1_retro').removeClass("hidden");
        $('#button_inactive_3_1_retro').removeClass("hidden");
        $('#button_inactive_3_1_mant').addClass("hidden");
        $('#inv_ini_capex_2_1_retro').removeClass("hidden");
        $('#inv_ini_capex_2_1_mant').addClass("hidden");
        $('#inv_ini_capex_3_1_retro').removeClass("hidden");
        $('#inv_ini_capex_3_1_mant').addClass("hidden");
    }else if(type_p == 3){
        $('#display_nuevo_retrofit_edit').removeClass("hidden");
        $('#display_nuevo_project_edit').addClass("hidden");
        $('#type_p').val(type_p);
        calcular_p_n.addClass("hidden");
        calcular_p_r.removeClass("hidden");
        $('#costo_anual_reparaciones_2_1_retro').removeClass("hidden");
        $('#costo_anual_reparaciones_3_1_retro').removeClass("hidden");
        inactive_tarjets_retro('man');
        $('#button_inactive_2_1_mant').removeClass("hidden");
        $('#button_inactive_2_1_retro').addClass("hidden");
        $('#button_inactive_3_1_retro').addClass("hidden");
        $('#button_inactive_3_1_mant').removeClass("hidden");
        $('#inv_ini_capex_2_1_retro').addClass("hidden");
        $('#inv_ini_capex_2_1_mant').removeClass("hidden");
        $('#inv_ini_capex_3_1_retro').addClass("hidden");
        $('#inv_ini_capex_3_1_mant').removeClass("hidden");
    }

  }

  function send_marcas_to(id,val,equipo){

    var ima =  $('#idioma').val();
        $.ajax({
            type: 'get',
            url: '/send_marcas_equipo/'+equipo,
            success: function (response) {
                //retro_1_1
               /*  $('#marca_1_1_retro').empty();
                $('#marca_1_1_retro').append($('<option>', {
                    value: '',
                    text: 'Seleccionar'
                })); */
                $("#"+id).empty();
                var marca_1_1_retro = id;
                check_val_text(marca_1_1_retro,ima);


                response.map((marca, i) => {
                    $('#'+id).append($('<option>', {
                        value: marca.id,
                        text: marca.marca,
                    }));
                });
                $("#"+id).find('option[value="' + val + '"]').attr("selected", "selected");
                //$("#"+id+" option[value='" + val + "']").attr("selected","selected");



            },
            error: function (responsetext) {

            }
        });
  }

  function send_marcas(){
    var ima =  $('#idioma').val();
        $.ajax({
            type: 'get',
            url: '/send_marcas',
            success: function (response) {
                //retro_1_1
               /*  $('#marca_1_1_retro').empty();
                $('#marca_1_1_retro').append($('<option>', {
                    value: '',
                    text: 'Seleccionar'
                })); */
                var marca_1_1_retro = 'marca_1_1_retro';
                check_val_text(marca_1_1_retro,ima);

                response.map((marca, i) => {
                    $('#marca_1_1_retro').append($('<option>', {
                        value: marca.id,
                        text: marca.marca,
                    }));
                });
                 //retro modal
                /*  $('#marcas_modal').empty();
                 $('#marcas_modal').append($('<option>', {
                     value: '',
                     text: 'Seleccionar'
                 })); */
                 var marcas_modal = 'marcas_modal';
                 check_val_text(marcas_modal,ima);
                 response.map((marca, i) => {
                     $('#marcas_modal').append($('<option>', {
                         value: marca.id,
                         text: marca.marca,
                     }));
                 });

                 //retro 2_1
                 var marca_2_1_retro = 'marca_2_1_retro';
                 check_val_text(marca_2_1_retro,ima);
/*                  $('#marca_2_1_retro').empty();
                 $('#marca_2_1_retro').append($('<option>', {
                     value: '',
                     text: 'Seleccionar'
                 })); */

                 response.map((marca, i) => {
                     $('#marca_2_1_retro').append($('<option>', {
                         value: marca.id,
                         text: marca.marca,
                     }));
                 });

                  //retro modal 2_1
                  /* $('#marcas_modal_2_1').empty();
                  $('#marcas_modal_2_1').append($('<option>', {
                      value: '',
                      text: 'Seleccionar'
                  })); */
                  var marcas_modal_2_1 = 'marcas_modal_2_1';
                  check_val_text(marcas_modal_2_1,ima);
                  response.map((marca, i) => {
                      $('#marcas_modal_2_1').append($('<option>', {
                          value: marca.id,
                          text: marca.marca,
                      }));
                  });

                  //retro 3_1
                  var marca_3_1_retro = 'marca_3_1_retro';
                  check_val_text(marca_3_1_retro,ima);

                  /* $('#marca_3_1_retro').empty();
                  $('#marca_3_1_retro').append($('<option>', {
                      value: '',
                      text: 'Seleccionar'
                  })); */

                  response.map((marca, i) => {
                      $('#marca_3_1_retro').append($('<option>', {
                          value: marca.id,
                          text: marca.marca,
                      }));
                  });

                  //retro modal 2_1
                  var marcas_modal_3_1 = 'marcas_modal_3_1';
                  check_val_text(marcas_modal_3_1,ima);
                  response.map((marca, i) => {
                      $('#marcas_modal_3_1').append($('<option>', {
                          value: marca.id,
                          text: marca.marca,
                      }));
                  });



            },
            error: function (responsetext) {

            }
        });
  }


  function check_marcas_guardadas(value,id){
    if(value == '-Marcas Guardadas-'){
        $('#'+id).val('');

    }

  }



  function send_marcas_equipo(value){
    var ima =  $('#idioma').val();
        $.ajax({
            type: 'get',
            url: '/send_marcas_equipo/'+value,
            success: function (response) {

                //retro_1_1
               /*  $('#marca_1_1_retro').empty();
                $('#marca_1_1_retro').append($('<option>', {
                    value: '',
                    text: 'Seleccionar'
                })); */

                $('#browsers').empty();
                $('#marca_modal').val('');
                $('#marca_modal_retro').val('');
                $('#browsers').append($('<option>', {
                    value: '-Marcas Guardadas-'
                }));



                response.map((marca, i) => {
                    $('#browsers').append($('<option>', {
                        value: marca.marca,
                    }));
                });

                //$("#browsers").find('option[value="Marcas Guardadas"]').prop("disabled", true);



/*                 var marca_modal = 'marca_modal';

                check_val_text(marca_modal,ima);

                response.map((marca, i) => {
                    $('#marca_modal').append($('<option>', {
                        value: marca.id,
                        text: marca.marca,
                    }));

                }); */

                var marca_modal = 'marca_modal_retro';

                check_val_text(marca_modal,ima);

                response.map((marca, i) => {
                    $('#marca_modal_retro').append($('<option>', {
                        value: marca.id,
                        text: marca.marca,
                    }));

                });


                 var marca_1_1 = 'marca_1_1';
                 check_val_text(marca_1_1,ima);

                 response.map((marca, i) => {
                     $('#marca_1_1').append($('<option>', {
                         value: marca.id,
                         text: marca.marca,
                     }));
                 });

                 var marca_1_2 = 'marca_1_2';
                 check_val_text(marca_1_2,ima);

                 response.map((marca, i) => {
                     $('#marca_1_2').append($('<option>', {
                         value: marca.id,
                         text: marca.marca,
                     }));
                 });

                 var marca_2_1 = 'marca_2_1';
                 check_val_text(marca_2_1,ima);

                 response.map((marca, i) => {
                     $('#marca_2_1').append($('<option>', {
                         value: marca.id,
                         text: marca.marca,
                     }));
                 });

                 var marca_2_2 = 'marca_2_2';
                 check_val_text(marca_2_2,ima);

                 response.map((marca, i) => {
                     $('#marca_2_2').append($('<option>', {
                         value: marca.id,
                         text: marca.marca,
                     }));
                 });

                 var marca_3_1 = 'marca_3_1';
                 check_val_text(marca_3_1,ima);

                 response.map((marca, i) => {
                     $('#marca_3_1').append($('<option>', {
                         value: marca.id,
                         text: marca.marca,
                     }));
                 });

                 var marca_3_2 = 'marca_3_2';
                 check_val_text(marca_3_2,ima);

                 response.map((marca, i) => {
                     $('#marca_3_2').append($('<option>', {
                         value: marca.id,
                         text: marca.marca,
                     }));
                 });

   //retro modal
                 var marca_1_1_retro = 'marca_1_1_retro';
                 check_val_text(marca_1_1_retro,ima);

                 response.map((marca, i) => {
                     $('#marca_1_1_retro').append($('<option>', {
                         value: marca.id,
                         text: marca.marca,
                     }));
                 });

                 var marca_2_1_retro = 'marca_2_1_retro';
                 check_val_text(marca_2_1_retro,ima);

                 response.map((marca, i) => {
                     $('#marca_2_1_retro').append($('<option>', {
                         value: marca.id,
                         text: marca.marca,
                     }));
                 });

                 var marca_3_1_retro = 'marca_3_1_retro';
                 check_val_text(marca_3_1_retro,ima);

                 response.map((marca, i) => {
                     $('#marca_3_1_retro').append($('<option>', {
                         value: marca.id,
                         text: marca.marca,
                     }));
                 });

            },
            error: function (responsetext) {

            }
        });
  }

  function send_marca_to_modal(value,id){
    $("#"+id).find('option[value="'+value+'"]').attr("selected", "selected");
  }

  function new_marc_add(id,marcas_mod) {
    var value = $('#'+id).val();
    $.ajax({
        type: 'POST',
        url: '/store_new_marc/'+ value,
        dataType: 'json',
        data: {
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (response) {
            Swal.fire({
                title: '¡Exito!',
                icon: 'success',
                text:'Nueva Marca Guardada'

            })
            send_marcas();
            $("#"+id).val('');
            $("#"+marcas_mod).find('option[value="'+response.id+'"]').attr("selected", "selected");

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}



  function send_modelos(value,id){
    var ima =  $('#idioma').val();
    $.ajax({
        type: 'get',
        url: '/send_modelos/'+value,
        success: function (response) {
            check_val_text(id,ima);
            response.map((marca, i) => {
                $('#'+id).append($('<option>', {
                    value: marca.id,
                    text: marca.modelo,
                }));
            });



        },
        error: function (responsetext) {

        }
    });
}

function send_modelo_edit(value,id,id_modelo){
    var ima =  $('#idioma').val();
    $.ajax({
        type: 'get',
        url: '/send_modelos/'+value,
        success: function (response) {

            check_val_text(id,ima);
            response.map((marca, i) => {
                $('#'+id).append($('<option>', {
                    value: marca.id,
                    text: marca.modelo,
                }));
            });
            $("#"+id).find('option[value="' + id_modelo + '"]').attr("selected", "selected");

        },
        error: function (responsetext) {

        }
    });
}



function new_model_or_marck_add(modelo,marcas_mod,eficiencia_modal, equipo) {
    var modelo = $('#'+modelo).val();

    var marca = $('#'+marcas_mod).val();
    var eficiencia = $('#'+eficiencia_modal).val();
    //var equipo  = $('#cUnidad_1_1_retro').val();

    if(marca == ''){
        marca = 'empty';
    }
    if(modelo == ''){
        modelo = 'empty';
    }

    var token = $("._token").val();
    $.ajax({
        type: 'GET',
        url: '/store_new_model/'+ marca +'/'+ modelo +"/"+ eficiencia +"/"+ equipo,
        success: function (response) {

            Swal.fire({
                title: '¡Exito!',
                icon: 'success',
                text:'Nuevo Modelo Guardado'

            })
            $('#nuevo_modelo_modal').val('');
            send_marcas_equipo(equipo);
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
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
   var inp_text_retro =  $('#name_diseno_'+myArray[1]+'_'+myArray[2]+'_retro');
   inp_text_retro.val(text);

}

function send_name_t_c(value){
    /*  console.log($('#'+value+' option:selected').text()); */
    const myArray = value.split('_');
    var text_t_c = $('#'+value+' option:selected').text();
    var inp_text_t_C =  $('#name_t_control_'+myArray[2]+'_'+myArray[3]);
    inp_text_t_C.val(text_t_c);
    var inp_text_t_C_retro =  $('#name_t_control_'+myArray[2]+'_'+myArray[3]+'_retro');
    inp_text_t_C_retro.val(text_t_c);


}

function send_name_dr(value){
    const myArray = value.split('_');
    var text_dr = $('#'+value+' option:selected').text();
    var inp_text_dr =  $('#dr_name_'+myArray[1]+'_'+myArray[2]);
    inp_text_dr.val(text_dr);
    var inp_text_dr_retro =  $('#dr_name_'+myArray[1]+'_'+myArray[2]+'_retro');
    inp_text_dr_retro.val(text_dr);
}

function send_name_vent(value){
    const myArray = value.split('_');
    var text_vent = $('#'+value+' option:selected').text();
    var inp_text_vent =  $('#ventilacion_name_'+myArray[1]+'_'+myArray[2]);
    inp_text_vent.val(text_vent);
    var inp_text_vent_retro =  $('#ventilacion_name_'+myArray[1]+'_'+myArray[2]+'_retro');
    inp_text_vent_retro.val(text_vent);
}

function send_name_filt(value){
    const myArray = value.split('_');
    var text_filt = $('#'+value+' option:selected').text();
    var inp_text_filt =  $('#filtracion_name_'+myArray[1]+'_'+myArray[2]);
    inp_text_filt.val(text_filt);
    var inp_text_filt_retro =  $('#filtracion_name_'+myArray[1]+'_'+myArray[2]+'_retro');
    inp_text_filt_retro.val(text_filt);
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

function traer_t_edif(id_cat,ima) {
    var ima =  $('#idioma').val();

    $.ajax({
        type: 'get',
        url: '/get_cat_edi/'+ id_cat,
        success: function (response) {


            var tipo_edificio = 'tipo_edificio';
            check_val_text(tipo_edificio,ima);
            $('#count_tipo_edificio').val(0);
            checksuma();
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
        //RETRO
        $('#unidad_capacidad_tot_1_2_retro').val('');

        $('#unidad_capacidad_tot_2_1_retro').val('');
        //$('#unidad_capacidad_tot_2_2').val('');


        $('#unidad_capacidad_tot_3_1_retro').val('');
        //$('#unidad_capacidad_tot_3_2').val('');

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

         //RETRO
         $('#unidad_capacidad_tot_1_2_retro').val(value);

         $('#unidad_capacidad_tot_2_1_retro').val(value);
         //$('#unidad_capacidad_tot_2_2').val('');


         $('#unidad_capacidad_tot_3_1_retro').val(value);
         //$('#unidad_capacidad_tot_3_2').val('');
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
        //retrofit
        $('#costo_elec_1_2_retro').val('');

        $('#costo_elec_2_1_retro').val('');
       // $('#costo_elec_2_2_retro').val('');

        $('#costo_elec_3_1_retro').val('');
       // $('#costo_elec_3_2_retro').val('');

    }

    if(value !== '0'){

        const myArray = value.split('$');

    let dollarUSLocale = Intl.NumberFormat('en-US');

    if (myArray.length > 1) {
        var num = parseFloat(myArray[1]);
        const myArray_coma =myArray[1].split(',');

        if (myArray_coma.length > 1) {
            if (myArray_coma.length == 2) {
               num = myArray_coma[0] + myArray_coma[1];
            }

            if (myArray_coma.length == 3) {
                num = myArray_coma[0] + myArray_coma[1] + myArray_coma[2];
             }

             if (myArray_coma.length == 4) {
                num = myArray_coma[0] + myArray_coma[1] + myArray_coma[2] + myArray_coma[3];
             }

             if (myArray_coma.length == 5) {
                num = myArray_coma[0] + myArray_coma[1] + myArray_coma[2] + myArray_coma[3] + myArray_coma[4];
             }

             if (myArray_coma.length == 6) {
                num = myArray_coma[0] + myArray_coma[1] + myArray_coma[2] + myArray_coma[3] + myArray_coma[4] + myArray_coma[6];
             }
        }
    }

    if (myArray.length==1) {
        var num = parseFloat(value);
    }

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

         //retrofit
         $('#costo_elec_1_1_retro').val('$'+num_aux);
         $('#costo_elec_1_2_retro').val('$'+num_aux);

         $('#costo_elec_2_1_retro').val('$'+num_aux);
         $('#costo_elec_2_2_retro').val('$'+num_aux);

         $('#costo_elec_3_1_retro').val('$'+num_aux);
         $('#costo_elec_3_2_retro').val('$'+num_aux);
    }

}

function set_porcent_hvac(value,ima){
    $.ajax({
        type: 'get',
        url: '/porcents_aux/'+ value,
        success: function (response) {
            /* $('#porcent_hvac').empty();
            $('#porcent_hvac').append($('<option>', {
                value: 0,
                text: 'Seleccionar'
            }));
            $('#count_porcent_hvac').val(0); */

            var porcent_hvac = 'porcent_hvac';
            check_val_text(porcent_hvac,ima);
            $('#count_porcent_hvac').val(0);
            checksuma();
            response.map((cat_ed, i) => {
                $('#porcent_hvac').append($('<option>', {
                    value: cat_ed,
                    text: cat_ed + '%',
                }));
            });



        },
        error: function (responsetext) {

        }
    });

}
function change(idm,id){
    var text_port = 'Opção Obrigatória';
    var text_es = 'Campo Obligatorio';
    if(idm == 'es'){
        document.getElementById(id).innerHTML = text_es;
    }
    if(idm == 'port'){
        document.getElementById(id).innerHTML = text_port;
    }
}

function change_swal(idm){
    if(idm == 'es'){
        Swal.fire(
            'Atención',
            "Seleccionar Unidad",
            'warning'
        )
    }

    if(idm == 'port'){
        Swal.fire(
            'Atenção',
            "Selecionar Unidade",
            'warning'
        )
    }

}
function buton_check(idm){
    var name = $("#name_pro");

    if (name.val() == '') {
        change(idm,'name_warning');
        return false;
    }
    var cat_ed = $("#cat_ed");
    if (cat_ed.val() == '0') {
        change(idm,'cat_ed_warning');
        return false;
    }
    var tipo_edificio = $("#tipo_edificio");
    if (tipo_edificio.val() == '0') {
        change(idm,'tipo_Edificio_warning');
        return false;
    }
    var ar_project = $("#ar_project");
    if (ar_project.val() == '') {
        change(idm,'ar_project_warning');
        return false;
    }
    var paises = $("#paises");
    if (paises.val() == '0') {
        change(idm,'paises_warning');
        return false;
    }

    var ciudades = $("#ciudades");
    if (ciudades.val() == '0') {
        change(idm,'ciudad_warning');
        return false;
    }

    var inflacion = $("#inc_ene");
    if (inflacion.val() == '') {
        change(idm,'inc_ene_warning');
        return false;
    }


    var porcent_tiempo = $("#tiempo_porcent");
    if (porcent_tiempo.val() == '') {
        change(idm,'tiempo_porcent_warning');
        return false;
    }

    var porcent_hvac = $("#porcent_hvac");
    if (porcent_hvac.val() == "" || porcent_hvac.val() == null) {
        change(idm,'por_hvac_warning');
        return false;
    }



    var check_mc = $("#check_mc");
    var check_ft = $("#check_ft");

    if (check_mc.prop('checked') === false && check_ft.prop('checked') === false) {
        change_swal(idm);
        return false;
    }


    if (name.val() !== '' && cat_ed.val() !== '0' && tipo_edificio.val() !== '0' && ar_project.val() !== '' && paises.val() !== '0' && ciudades.val() !== '0' && porcent_hvac.val() !== '0' && porcent_tiempo.val() !== '',inflacion.val() !== '') {
       /*  $('#next').attr('disabled', false); */
       $('#div_next').addClass("hidden");
       $('#div_next_h').removeClass("hidden");
    }
}

function buton_check_edit(){
    var name = $("#name_pro");
    if (name.val() == '') {
        change(idm,'name_warning');
        return false;
    }
    var cat_ed = $("#cat_ed");
    if (cat_ed.val() == '0') {
        change(idm,'cat_ed_warning');
        return false;
    }
    var tipo_edificio = $("#tipo_edificio");
    if (tipo_edificio.val() == '0') {
        change(idm,'tipo_Edificio_warning');
        return false;
    }
    var ar_project = $("#ar_project");
    if (ar_project.val() == '') {
        change(idm,'ar_project_warning');
        return false;
    }
    var paises = $("#paises_edit");

    if (paises.val() == '0') {
        change(idm,'paises_warning');
        return false;
    }
    var ciudades = $("#ciudades_edit");
    if (ciudades.val() == '0') {
        change(idm,'ciudad_warning');
        return false;
    }

    var inflacion = $("#inc_ene");
    if (inflacion.val() == '') {
        change(idm,'inc_ene_warning');
        return false;
    }


    var porcent_tiempo = $("#tiempo_porcent");
    if (porcent_tiempo.val() == '') {
        change(idm,'tiempo_porcent_warning');
        return false;
    }

    var porcent_hvac = $("#porcent_hvac");
    if (porcent_hvac.val() == "" || porcent_hvac.val() == null) {
       change(idm,'por_hvac_warning');
        return false;
    }

    var tipo_edificio_edit = $("#tipo_edificio_edit");
    if (tipo_edificio_edit.val() == '0') {
        change(idm,'tipo_Edificio_warning');
        return false;
    }





    var check_mc = $("#check_mc");
    var check_ft = $("#check_ft");
    if (check_mc.prop('checked') === false && check_ft.prop('checked') === false) {
        change_swal(idm);
        return false;
    }


    if (name.val() !== '' && cat_ed.val() !== '0' && tipo_edificio.val() !== '0' && ar_project.val() !== '' && paises.val() !== '0' && ciudades.val() !== '0' && porcent_hvac.val() !== '0' && porcent_tiempo.val() !== '',inflacion.val() !== '') {
       /*  $('#next').attr('disabled', false); */
       $('#div_next').addClass("hidden");
       $('#div_next_h').removeClass("hidden");
    }
}

function check_input(value,id,id_warning){
    var inpt = $("#"+id);
    if (inpt.val() == '' || inpt.val() == '0') {
        change(id_warning);
    }else{
        document.getElementById(id_warning).innerHTML = "";

    }
}

function format_num(value,id){
    var inpt = $("#"+id);
    const myArray = value.split('$');

    let dollarUSLocale = Intl.NumberFormat('en-US');
    if (myArray.length > 1) {
        var num = parseFloat(myArray[1]);
        const myArray_coma =myArray[1].split(',');

        if (myArray_coma.length > 1) {
            if (myArray_coma.length == 2) {
               num = myArray_coma[0] + myArray_coma[1];
            }

            if (myArray_coma.length == 3) {
                num = myArray_coma[0] + myArray_coma[1] + myArray_coma[2];
             }

             if (myArray_coma.length == 4) {
                num = myArray_coma[0] + myArray_coma[1] + myArray_coma[2] + myArray_coma[3];
             }

             if (myArray_coma.length == 5) {
                num = myArray_coma[0] + myArray_coma[1] + myArray_coma[2] + myArray_coma[3] + myArray_coma[4];
             }

             if (myArray_coma.length == 6) {
                num = myArray_coma[0] + myArray_coma[1] + myArray_coma[2] + myArray_coma[3] + myArray_coma[4] + myArray_coma[6];
             }
        }
    }

    if (myArray.length==1) {
        var num = parseFloat(value);
    }

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



function inactive_display(value){
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
             $('#base_border_bottom').css('border-bottom', 'none');
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
            $('#cont_sol_2').val(cont_sol_2);$('#2_border_bottom').css('border-bottom', 'none');
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
             $('#cont_sol_3').val(cont_sol_3);$('#3_border_bottom').css('border-bottom', 'none');
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

function trans_sols_valid(idm){
    if(idm == 'es'){
        Swal.fire({
            title: 'Atencion!',
            icon: 'warning',
            text:'Faltan campos por completar en la Solucion Base'

        })

    }

    if(idm == 'port'){
        Swal.fire({
            title: 'Atenção!',
            icon: 'warning',
            text:'Campos em falta a preencher na Solução Base'

        })

    }
}

function trans_sols_valid_ab(idm,sol){
    if(sol == 'A'){
        if(idm == 'es'){
            Swal.fire({
                title: 'Atencion!',
                icon: 'warning',
                text:'Faltan campos por completar en la Solucion A'

            })

        }

        if(idm == 'port'){
            Swal.fire({
                title: 'Atenção!',
                icon: 'warning',
                text:'Campos em falta a preencher na Solução A'

            })

        }
    }

    if(sol == 'B'){
        if(idm == 'es'){
            Swal.fire({
                title: 'Atencion!',
                icon: 'warning',
                text:'Faltan campos por completar en la Solucion B'

            })

        }

        if(idm == 'port'){
            Swal.fire({
                title: 'Atenção!',
                icon: 'warning',
                text:'Campos em falta a preencher na Solução B'

            })

        }
    }
}



 function check_form_submit(p_type,idm,action,id_project,fecha_project){


    if(action == 'update'){
        const fechaUno = new Date(fecha_project); // Primera fecha
        const fechaDos = new Date('2024-07-12 00:00:00'); //
        const tiempoFechaUno = fechaUno.getTime();
        const tiempoFechaDos = fechaDos.getTime();

        if (tiempoFechaUno < tiempoFechaDos) {
            var action_use = 1;
        } else if (tiempoFechaUno > tiempoFechaDos) {
            var action_use = 2;
        }

    }else{
        var action_use = 2;
    }


    if(p_type == 1){

    var sol_1_1 = $('#cUnidad_1_1');
    var sol_1_2 = $('#cUnidad_1_2');
    var sol_1_3 = $('#cUnidad_1_3');

    var sol_2_1 = $('#cUnidad_2_1');
    var sol_2_2 = $('#cUnidad_2_2');
    var sol_2_3 = $('#cUnidad_2_3');

    var sol_3_1 = $('#cUnidad_3_1');
    var sol_3_2 = $('#cUnidad_3_2');
    var sol_3_3 = $('#cUnidad_3_3');


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

       if(action_use == 2  || action == 'store'){

            /////////////////////////////////////
            var ventilacion_1_1 =$('#ventilacion_1_1');
            var ventilacion_1_1_count = $('#ventilacion_1_1_count').val();

            if(ventilacion_1_1.val() == "" || ventilacion_1_1.val() == null){

            ventilacion_1_1.css("border-color", "red")
            ventilacion_1_1_count = 1;
            $('#ventilacion_1_1_count').val(ventilacion_1_1_count);

            }else if (ventilacion_1_1.val() != "" || ventilacion_1_1.val() != null) {

            ventilacion_1_1_count = 0;
            $('#ventilacion_1_1_count').val(ventilacion_1_1_count);

            }
            /////////////////////////////////////

            var filtracion_1_1 =$('#filtracion_1_1');
            var filtracion_1_1_count = $('#filtracion_1_1_count').val();

            if(filtracion_1_1.val() == "" || filtracion_1_1.val() == null){

            filtracion_1_1.css("border-color", "red")
            filtracion_1_1_count = 1;
            $('#filtracion_1_1_count').val(filtracion_1_1_count);

            }else if (filtracion_1_1.val() != "" || filtracion_1_1.val() != null) {

            filtracion_1_1_count = 0;
            $('#filtracion_1_1_count').val(filtracion_1_1_count);

            }
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

        var cheValorS_1_1 =$('#cheValorS_1_1');
        var cheValorS_1_1_count = $('#cheValorS_1_1_count').val();
        const myArray_chevalor_1_1 = cheValorS_1_1.val().split('$');
        var var_chevalor_1_1 =  myArray_chevalor_1_1[1];

        if(var_chevalor_1_1 <= 0 || cheValorS_1_1.val() == ""){

            cheValorS_1_1.css("border-color", "red")
            cheValorS_1_1_count = 1;

            $('#cheValorS_1_1_count').val(cheValorS_1_1_count);
           }else if (var_chevalor_1_1 > 0 || cheValorS_1_1.val() != null) {

            cheValorS_1_1_count = 0;
           $('#cheValorS_1_1_count').val(cheValorS_1_1_count);

        }

       var count_inps_1_1 = tipo_equipo_1_1_count + capacidad_total_1_1_count + costo_elec_1_1_count + dr_1_1_count + csStd_cant_1_1_count + tipo_control_1_count + csMantenimiento_1_1_count + csDisenio_1_1_count + hrsEnfriado_1_1_count + cheValorS_1_1_count  + ventilacion_1_1_count + filtracion_1_1_count;

       if(count_inps_1_1>0){
        trans_sols_valid(idm);
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

        if(action_use == 2 || action == 'store'){
            /////////////////////////////////////
            var ventilacion_1_2 =$('#ventilacion_1_2');
            var ventilacion_1_2_count = $('#ventilacion_1_2_count').val();

            if(ventilacion_1_2.val() == "" || ventilacion_1_2.val() == null){

                ventilacion_1_2.css("border-color", "red")
                ventilacion_1_2_count = 1;
            $('#ventilacion_1_2_count').val(ventilacion_1_2_count);

            }else if (ventilacion_1_2.val() != "" || ventilacion_1_2.val() != null) {

                ventilacion_1_2_count = 0;
            $('#ventilacion_1_2_count').val(ventilacion_1_2_count);

            }
            /////////////////////////////////////

            var filtracion_1_2 =$('#filtracion_1_2');
            var filtracion_1_2_count = $('#filtracion_1_2_count').val();

            if(filtracion_1_2.val() == "" || filtracion_1_2.val() == null){

            filtracion_1_2.css("border-color", "red")
            filtracion_1_2_count = 1;
            $('#filtracion_1_2_count').val(filtracion_1_2_count);

            }else if (filtracion_1_2.val() != "" || filtracion_1_2.val() != null) {

                filtracion_1_2_count = 0;
            $('#filtracion_1_2_count').val(filtracion_1_2_count);

            }
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

        var cheValorS_1_2 =$('#cheValorS_1_2');
        var cheValorS_1_2_count = $('#cheValorS_1_2_count').val();
        const myArray_chevalor_1_1 = cheValorS_1_2.val().split('$');
        var var_chevalor_1_2 =  myArray_chevalor_1_1[1];

        if(var_chevalor_1_2 <= 0 || cheValorS_1_2.val() == ""){

            cheValorS_1_2.css("border-color", "red")
            cheValorS_1_2_count = 1;

            $('#cheValorS_1_2_count').val(cheValorS_1_2_count);
           }else if (var_chevalor_1_2 > 0 || cheValorS_1_2.val() != null) {

            cheValorS_1_2_count = 0;
           $('#cheValorS_1_2_count').val(cheValorS_1_2_count);

        }

            var count_inps_1_2 = csTipo_1_2_count +
            capacidad_tota_1_2_count + costo_elec_1_2_count
            + dr_1_2_count + csStd_1_2_count +
            tipo_control_1_2_count + csMantenimiento_1_2_count +
            csDisenio_1_2_count + hrsEnfriado_1_2_count + cheValorS_1_2_count+ ventilacion_1_2_count + filtracion_1_2_count;
            if(count_inps_1_2>0){
                trans_sols_valid(idm);
                        return false;
                        }

        }

        ////////////////////////////////////////
        /* if (sol_1_3.val() != '0'){
            alert(sol_1_3.val());
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

            if(dr_1_3.val() == "" || dr_1_3.val() == null){
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

            if(csDisenio_1_3.val() == "" || csDisenio_1_3.val() == null){
                csDisenio_1_3.css("border-color", "red")
                csDisenio_1_3_count = 1;
                $('#csDisenio_1_3_count').val(csDisenio_1_3_count);
            }else if (csDisenio_1_3.val() != "") {

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


            var cheValorS_1_3 =$('#cheValorS_1_3');
            var cheValorS_1_3_count = $('#cheValorS_1_3_count').val();
            const myArray_chevalor_1_1 = cheValorS_1_3.val().split('$');
            var var_chevalor_1_3 =  myArray_chevalor_1_1[1];

            if(var_chevalor_1_3 <= 0 || cheValorS_1_3.val() == ""){

                cheValorS_1_3.css("border-color", "red")
                cheValorS_1_3_count = 1;

                $('#cheValorS_1_3_count').val(cheValorS_1_3_count);
               }else if (var_chevalor_1_3 > 0 || cheValorS_1_3.val() != null) {

                cheValorS_1_3_count = 0;
               $('#cheValorS_1_3_count').val(cheValorS_1_3_count);

            }

            var count_inps_1_3 = csTipo_1_3_count +
            capacidad_total_1_3_count + costo_elec_1_3_count
            + dr_1_3_count + csStd_cant_1_3_count +
            tipo_control_1_3_count + csMantenimiento_1_3_count +
            csDisenio_1_3_count + hrsEnfriado_1_3_count + cheValorS_1_3_count;

            if(count_inps_1_3>0){
                trans_sols_valid(idm);
                        return false;
                        }
            } */


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

                if(action_use == 2 || action == 'store'){
                    /////////////////////////////////////
                    var ventilacion_2_1 =$('#ventilacion_2_1');
                    var ventilacion_2_1_count = $('#ventilacion_2_1_count').val();

                    if(ventilacion_2_1.val() == "" || ventilacion_2_1.val() == null){

                        ventilacion_2_1.css("border-color", "red")
                        ventilacion_2_1_count = 1;
                    $('#ventilacion_2_1_count').val(ventilacion_2_1_count);

                    }else if (ventilacion_2_1.val() != "" || ventilacion_2_1.val() != null) {

                        ventilacion_2_1_count = 0;
                    $('#ventilacion_2_1_count').val(ventilacion_2_1_count);

                    }
                    /////////////////////////////////////

                    var filtracion_2_1 =$('#filtracion_2_1');
                    var filtracion_2_1_count = $('#filtracion_2_1_count').val();

                    if(filtracion_2_1.val() == "" || filtracion_2_1.val() == null){

                    filtracion_2_1.css("border-color", "red")
                    filtracion_2_1_count = 1;
                    $('#filtracion_2_1_count').val(filtracion_2_1_count);

                    }else if (filtracion_2_1.val() != "" || filtracion_2_1.val() != null) {

                        filtracion_2_1_count = 0;
                    $('#filtracion_2_1_count').val(filtracion_2_1_count);

                    }
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

                    var cheValorS_2_1 =$('#cheValorS_2_1');
                    var cheValorS_2_1_count = $('#cheValorS_2_1_count').val();
                    const myArray_chevalor_1_1 = cheValorS_2_1.val().split('$');
                    var var_chevalor_2_1 =  myArray_chevalor_1_1[1];

                    if(var_chevalor_2_1 <= 0 || cheValorS_2_1.val() == ""){

                        cheValorS_2_1.css("border-color", "red")
                        cheValorS_2_1_count = 1;

                        $('#cheValorS_2_1_count').val(cheValorS_2_1_count);
                       }else if (var_chevalor_2_1 > 0 || cheValorS_2_1.val() != null) {

                        cheValorS_2_1_count = 0;
                       $('#cheValorS_2_1_count').val(cheValorS_2_1_count);

                    }

                var count_inps_2_1 = cheTipo_2_1_count + capacidad_total_2_1_count + costo_elec_2_1_count + dr_2_1_count + csStd_cant_2_1_count + tipo_control_2_1_count + csMantenimiento_2_1_count + cheDisenio_2_1_count +
                hrsEnfriado_2_1_count + cheValorS_2_1_count + ventilacion_2_1_count + filtracion_2_1_count;
              /*       alert(count_inps_2_1); */
                if(count_inps_2_1>0){
                    trans_sols_valid_ab(idm,'A')
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

                if(action_use == 2  || action == 'store'){
                    /////////////////////////////////////
                    var ventilacion_2_2 =$('#ventilacion_2_2');
                    var ventilacion_2_2_count = $('#ventilacion_2_2_count').val();

                    if(ventilacion_2_2.val() == "" || ventilacion_2_2.val() == null){

                        ventilacion_2_2.css("border-color", "red")
                        ventilacion_2_2_count = 1;
                    $('#ventilacion_2_2_count').val(ventilacion_2_2_count);

                    }else if (ventilacion_2_2.val() != "" || ventilacion_2_2.val() != null) {

                        ventilacion_2_2_count = 0;
                    $('#ventilacion_2_2_count').val(ventilacion_2_2_count);

                    }
                    /////////////////////////////////////

                    var filtracion_2_2 =$('#filtracion_2_2');
                    var filtracion_2_2_count = $('#filtracion_2_2_count').val();

                    if(filtracion_2_2.val() == "" || filtracion_2_2.val() == null){

                    filtracion_2_2.css("border-color", "red")
                    filtracion_2_2_count = 1;
                    $('#filtracion_2_2_count').val(filtracion_2_2_count);

                    }else if (filtracion_2_2.val() != "" || filtracion_2_2.val() != null) {

                        filtracion_2_2_count = 0;
                    $('#filtracion_2_2_count').val(filtracion_2_2_count);

                    }
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

                    var cheValorS_2_2 =$('#cheValorS_2_2');
                    var cheValorS_2_2_count = $('#cheValorS_2_2_count').val();
                    const myArray_chevalor_2_2 = cheValorS_2_2.val().split('$');
                    var var_chevalor_2_2 =  myArray_chevalor_2_2[1];

                    if(var_chevalor_2_2 <= 0 || cheValorS_2_2.val() == ""){

                        cheValorS_2_2.css("border-color", "red")
                        cheValorS_2_2_count = 1;

                        $('#cheValorS_2_2_count').val(cheValorS_2_2_count);
                       }else if (var_chevalor_2_2 > 0 || cheValorS_2_2.val() != null) {

                        cheValorS_2_2_count = 0;
                       $('#cheValorS_2_2_count').val(cheValorS_2_2_count);

                    }

                    /*       alert(count_inps_2_1); */
                var count_inps_2_2 = cheTipo_2_2_count
                + capacidad_total_2_2_count
                + costo_elec_2_2_count
                + dr_2_2_count + csStd_cant_2_2_count
                 + tipo_control_2_2_count + cheMantenimiento_2_2_count
                 + cheDisenio_2_2_count + hrsEnfriado_2_2_count + cheValorS_2_2_count+ventilacion_2_2_count+filtracion_2_2_count;

                if(count_inps_2_2>0){
                    trans_sols_valid_ab(idm,'A')
                                return false;
                                }

                }

                /* if (sol_2_3.val() != '0'){
                    var tipo_equipo_2_3 =$('#cheTipo_2_3');
                    var cheTipo_2_3_count = $('#cheTipo_2_3_count').val();

                    if(tipo_equipo_2_3.val() == 0  || tipo_equipo_2_3.val() == null){

                        tipo_equipo_2_3.css("border-color", "red")
                        cheTipo_2_3_count = 1;
                        $('#cheTipo_2_3_count').val(cheTipo_2_3_count);
                    }else if (tipo_equipo_2_3 != 0) {

                        cheTipo_2_3_count = 0;
                        $('#cheTipo_2_3_count').val(cheTipo_2_3_count);

                    }

                    var  capacidad_total_2_3=$('#capacidad_total_2_3');
                    var capacidad_total_2_3_count = $('#capacidad_total_2_3_count').val();

                    if(capacidad_total_2_3.val() == 0){

                        capacidad_total_2_3.css("border-color", "red")
                        capacidad_total_2_3_count = 1;
                        $('#capacidad_total_2_3_count').val(capacidad_total_2_3_count);
                    }else if (capacidad_total_2_3.val() != 0) {

                        capacidad_total_2_3_count = 0;
                        $('#capacidad_total_2_3_count').val(capacidad_total_2_3_count);

                    }

                    var costo_elec_2_3 =$('#costo_elec_2_3');
                    var costo_elec_2_3_count = $('#costo_elec_2_3_count').val();

                    if(costo_elec_2_3.val() == 0){

                        costo_elec_2_3.css("border-color", "red")
                        costo_elec_2_3_count = 1;
                        $('#costo_elec_2_3_count').val(costo_elec_2_3_count);

                    }else if (costo_elec_2_3.val() != 0) {

                        costo_elec_2_3_count = 0;
                    $('#costo_elec_2_3_count').val(costo_elec_2_3_count);

                    }

                    var csStd_cant_2_3 =$('#csStd_cant_2_3');
                    var csStd_cant_2_3_count = $('#csStd_cant_2_3_count').val();

                    if(csStd_cant_2_3.val() == 0){
                        csStd_cant_2_3.css("border-color", "red")
                        csStd_cant_2_3_count = 1;
                        $('#csStd_cant_2_3_count').val(csStd_cant_2_3_count);
                    }else if (csStd_cant_1_1.val() != 0) {

                        csStd_cant_2_3_count = 0;
                    $('#csStd_cant_2_3_count').val(csStd_cant_2_3_count);

                    }

                    var tipo_control_2_3 =$('#tipo_control_2_3');
                    var tipo_control_2_3_count = $('#tipo_control_2_3_count').val();

                    if(tipo_control_2_3.val() == 0 || tipo_control_2_3.val() == null){
                        tipo_control_2_3.css("border-color", "red")
                        tipo_control_2_3_count = 1;
                        $('#tipo_control_2_3_count').val(tipo_control_2_3_count);
                    }else if (tipo_control_2_3.val() != 0) {

                        tipo_control_2_3_count = 0;
                    $('#tipo_control_2_3_count').val(tipo_control_2_3_count);

                    }

                    var dr_2_3 =$('#dr_2_3');
                    var dr_2_3_count = $('#dr_2_3_count').val();

                    if(dr_2_3.val() == '' || dr_2_3.val() == null){
                        dr_2_3.css("border-color", "red")
                        dr_2_3_count = 1;
                        $('#dr_2_3_count').val(dr_2_3_count);
                    }else if (dr_2_3.val() != '' || dr_2_3.val() != null) {

                        dr_2_3_count = 0;
                    $('#dr_2_3_count').val(dr_2_3_count);

                    }

                    var cheMantenimiento_2_3 =$('#cheMantenimiento_2_3');
                    var cheMantenimiento_2_3_count = $('#cheMantenimiento_2_3_count').val();

                    if(cheMantenimiento_2_3.val() == 0){
                        cheMantenimiento_2_3.css("border-color", "red")
                        cheMantenimiento_2_3_count = 1;
                        $('#cheMantenimiento_2_3_count').val(cheMantenimiento_2_3_count);
                    }else if (cheMantenimiento_2_3.val() != 0) {

                        cheMantenimiento_2_3_count = 0;
                    $('#cheMantenimiento_2_3_count').val(cheMantenimiento_2_3_count);

                    }

                    var cheDisenio_2_3 =$('#cheDisenio_2_3');
                    var cheDisenio_2_3_count = $('#cheDisenio_2_3_count').val();

                    if(cheDisenio_2_3.val() == '' || cheDisenio_2_3.val() == null){
                        cheDisenio_2_3.css("border-color", "red")
                        cheDisenio_2_3_count = 1;
                        $('#cheDisenio_2_3_count').val(cheDisenio_2_3_count);
                    }else if (cheDisenio_2_3.val() != 0) {

                        cheDisenio_2_3_count = 0;
                    $('#cheDisenio_2_3_count').val(cheDisenio_2_3_count);

                    }

                    var hrsEnfriado_2_3 =$('#hrsEnfriado_2_3');
                    var hrsEnfriado_2_3_count = $('#hrsEnfriado_2_3_count').val();

                    if(hrsEnfriado_2_3.val() == 0 || hrsEnfriado_2_3.val() == ""){
                        hrsEnfriado_2_3.css("border-color", "red")
                        hrsEnfriado_2_3_count = 1;
                        $('#hrsEnfriado_2_3_count').val(hrsEnfriado_2_3_count);
                    }else if (hrsEnfriado_2_3.val() != 0) {

                        hrsEnfriado_2_3_count = 0;
                    $('#hrsEnfriado_2_3_count').val(hrsEnfriado_2_3_count);

                    }


                    var cheValorS_2_3 =$('#cheValorS_2_3');
                    var cheValorS_2_3_count = $('#cheValorS_2_3_count').val();
                    const myArray_chevalor_1_1 = cheValorS_2_3.val().split('$');
                    var var_chevalor_1_3 =  myArray_chevalor_1_1[1];

                    if(var_chevalor_1_3 <= 0 || cheValorS_2_3.val() == ""){

                        cheValorS_2_3.css("border-color", "red")
                        cheValorS_2_3_count = 1;

                        $('#cheValorS_2_3_count').val(cheValorS_2_3_count);
                       }else if (var_chevalor_1_3 > 0 || cheValorS_2_3.val() != null) {

                        cheValorS_2_3_count = 0;
                       $('#cheValorS_2_3_count').val(cheValorS_2_3_count);

                    }

                    var count_inps_2_3 = cheTipo_2_3_count +
                    capacidad_total_2_3_count + costo_elec_2_3_count
                    + csStd_cant_2_3_count + tipo_control_2_3_count +
                    dr_2_3_count + cheMantenimiento_2_3_count +
                    cheDisenio_2_3_count + hrsEnfriado_2_3_count + cheValorS_2_3_count;

                    if(count_inps_2_3>0){
                        trans_sols_valid_ab(idm,'A')
                                return false;
                                }
                    } */

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

                if(action_use == 2 || action == 'store'){
                    /////////////////////////////////////
                    var ventilacion_3_1 =$('#ventilacion_3_1');
                    var ventilacion_3_1_count = $('#ventilacion_2_2_count').val();

                    if(ventilacion_3_1.val() == "" || ventilacion_3_1.val() == null){

                        ventilacion_3_1.css("border-color", "red")
                        ventilacion_3_1_count = 1;
                    $('#ventilacion_3_1_count').val(ventilacion_3_1_count);

                    }else if (ventilacion_3_1.val() != "" || ventilacion_3_1.val() != null) {

                        ventilacion_3_1_count = 0;
                    $('#ventilacion_3_1_count').val(ventilacion_3_1_count);

                    }
                    /////////////////////////////////////

                    var filtracion_3_1 =$('#filtracion_3_1');
                    var filtracion_3_1_count = $('#filtracion_3_1_count').val();

                    if(filtracion_3_1.val() == "" || filtracion_3_1.val() == null){

                    filtracion_3_1.css("border-color", "red")
                    filtracion_3_1_count = 1;
                    $('#filtracion_3_1_count').val(filtracion_3_1_count);

                    }else if (filtracion_3_1.val() != "" || filtracion_3_1.val() != null) {

                        filtracion_3_1_count = 0;
                    $('#filtracion_3_1_count').val(filtracion_3_1_count);

                    }
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


                    var cheValorS_3_1 =$('#cheValorS_3_1');
                    var cheValorS_3_1_count = $('#cheValorS_3_1_count').val();
                    const myArray_chevalor_3_1 = cheValorS_3_1.val().split('$');
                    var var_chevalor_3_1 =  myArray_chevalor_3_1[1];

                    if(var_chevalor_3_1 <= 0 || cheValorS_3_1.val() == ""){

                        cheValorS_3_1.css("border-color", "red")
                        cheValorS_3_1_count = 1;

                        $('#cheValorS_3_1_count').val(cheValorS_3_1_count);
                       }else if (var_chevalor_3_1 > 0 || cheValorS_3_1.val() != null) {

                        cheValorS_3_1_count = 0;
                       $('#cheValorS_3_1_count').val(cheValorS_3_1_count);

                    }

                var count_inps_3_1 = cheTipo_3_1_count + capacidad_total_3_1_count + costo_elec_3_1_count + dr_3_1_count + cheStd_3_1_count + tipo_control_3_1_count + cheMantenimiento_3_1_count + cheDisenio_3_1_count + hrsEnfriado_3_1_count + cheValorS_3_1_count+ventilacion_3_1_count+filtracion_3_1_count;
              /*       alert(count_inps_2_1); */
                if(count_inps_3_1>0){
                    trans_sols_valid_ab(idm,'B');
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
                if(action_use == 2  || action == 'store'){
                    /////////////////////////////////////
                    var ventilacion_3_2 =$('#ventilacion_3_2');
                    var ventilacion_3_2_count = $('#ventilacion_3_2_count').val();

                    if(ventilacion_3_2.val() == "" || ventilacion_3_2.val() == null){

                        ventilacion_3_2.css("border-color", "red")
                        ventilacion_3_2_count = 1;
                    $('#ventilacion_3_2_count').val(ventilacion_3_2_count);

                    }else if (ventilacion_3_2.val() != "" || ventilacion_3_2.val() != null) {

                        ventilacion_3_2_count = 0;
                    $('#ventilacion_3_2_count').val(ventilacion_3_2_count);

                    }
                    /////////////////////////////////////

                    var filtracion_3_2 =$('#filtracion_3_2');
                    var filtracion_3_2_count = $('#filtracion_3_2_count').val();

                    if(filtracion_3_2.val() == "" || filtracion_3_2.val() == null){

                    filtracion_3_2.css("border-color", "red")
                    filtracion_3_2_count = 1;
                    $('#filtracion_3_2_count').val(filtracion_3_2_count);

                    }else if (filtracion_3_2.val() != "" || filtracion_3_2.val() != null) {

                        filtracion_3_2_count = 0;
                    $('#filtracion_3_2_count').val(filtracion_3_2_count);

                    }
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




                    var cheValorS2_3_2 =$('#cheValorS2_3_2');
                    var cheValorS2_3_2_count = $('#cheValorS2_3_2_count').val();
                    const myArray_chevalor_1_1 = cheValorS2_3_2.val().split('$');
                    var var_chevalor_3_2 =  myArray_chevalor_1_1[1];

                    if(var_chevalor_3_2 <= 0 || cheValorS2_3_2.val() == ""){

                        cheValorS2_3_2.css("border-color", "red")
                        cheValorS2_3_2_count = 1;

                        $('#cheValorS2_3_2_count').val(cheValorS2_3_2_count);
                       }else if (var_chevalor_3_2 > 0 || cheValorS2_3_2.val() != null) {

                        cheValorS2_3_2_count = 0;
                       $('#cheValorS2_3_2_count').val(cheValorS2_3_2_count);

                    }






                var count_inps_3_2 = cheTipo_3_2_count +
                capacidad_total_3_2_count + costo_elec_3_2_count +
                dr_3_2_count + csStd_cant_3_2_count + tipo_control_3_2_count +
                cheMantenimiento_3_2_count + cheDisenio_3_2_count +
                hrsEnfriado_3_2_count + cheValorS2_3_2_count;
              /*       alert(count_inps_2_1); */
                if(count_inps_3_2>0){
                    trans_sols_valid_ab(idm,'B');
                                return false;
                                }

                }

               /*  if (sol_3_3.val() != '0'){
                    var cheTipo_3_3 =$('#cheTipo_3_3');
                    var cheTipo_3_3_count = $('#cheTipo_3_3_count').val();
                    if(cheTipo_3_3.val() == 0  || cheTipo_3_3.val() == null){

                        cheTipo_3_3.css("border-color", "red")
                        cheTipo_3_3_count = 1;
                        $('#cheTipo_3_3_count').val(cheTipo_3_3_count);
                    }else if (cheTipo_3_3.val() != 0) {

                        cheTipo_3_3_count = 0;
                        $('#cheTipo_3_3_count').val(cheTipo_3_3_count);

                    }

                    var  capacidad_total_3_3=$('#capacidad_total_3_3');
                    var capacidad_total_3_3_count = $('#capacidad_total_3_3_count').val();

                    if(capacidad_total_3_3.val() == 0){

                        capacidad_total_3_3.css("border-color", "red")
                        capacidad_total_3_3_count = 1;
                        $('#capacidad_total_3_3_count').val(capacidad_total_3_3_count);
                    }else if (capacidad_total_3_3.val() != 0) {

                        capacidad_total_3_3_count = 0;
                        $('#capacidad_total_3_3_count').val(capacidad_total_3_3_count);

                    }

                    var costo_elec_3_3 =$('#costo_elec_3_3');
                    var costo_elec_3_3_count = $('#costo_elec_3_3_count').val();

                    if(costo_elec_3_3.val() == 0){

                        costo_elec_3_3.css("border-color", "red")
                        costo_elec_3_3_count = 1;
                        $('#costo_elec_3_3_count').val(costo_elec_3_3_count);

                    }else if (costo_elec_3_3.val() != 0) {

                        costo_elec_3_3_count = 0;
                    $('#costo_elec_3_3_count').val(costo_elec_3_3_count);

                    }

                    var cheStd_3_3 =$('#cheStd_3_3');
                    var cheStd_3_3_count = $('#cheStd_3_3_count').val();

                    if(cheStd_3_3.val() == 0){
                        cheStd_3_3.css("border-color", "red")
                        cheStd_3_3_count = 1;
                        $('#cheStd_3_3_count').val(cheStd_3_3_count);
                    }else if (cheStd_3_3.val() != 0) {

                        cheStd_3_3_count = 0;
                    $('#cheStd_3_3_count').val(cheStd_3_3_count);

                    }

                    var tipo_control_3_3 =$('#tipo_control_3_3');
                    var tipo_control_3_3_count = $('#tipo_control_3_3_count').val();

                    if(tipo_control_3_3.val() == 0 || tipo_control_3_3.val() == null){
                        tipo_control_3_3.css("border-color", "red")
                        tipo_control_3_3_count = 1;
                        $('#tipo_control_3_3_count').val(tipo_control_3_3_count);
                    }else if (tipo_control_3_3.val() != 0) {

                        tipo_control_3_3_count = 0;
                    $('#tipo_control_3_3_count').val(tipo_control_3_3_count);

                    }

                    var dr_3_3 =$('#dr_3_3');
                    var dr_3_3_count = $('#dr_3_3_count').val();

                    if(dr_3_3.val() == '' || dr_3_3.val() == null){
                        dr_3_3.css("border-color", "red")
                        dr_3_3_count = 1;
                        $('#dr_3_3_count').val(dr_3_3_count);
                    }else if (dr_3_3.val() != '' || dr_3_3.val() != null) {

                        dr_3_3_count = 0;
                    $('#dr_3_3_count').val(dr_3_3_count);

                    }

                    var cheMantenimiento_3_3 =$('#cheMantenimiento_3_3');
                    var cheMantenimiento_3_3_count = $('#cheMantenimiento_3_3_count').val();

                    if(cheMantenimiento_3_3.val() == 0){
                        cheMantenimiento_3_3.css("border-color", "red")
                        cheMantenimiento_3_3_count = 1;
                        $('#cheMantenimiento_3_3_count').val(cheMantenimiento_3_3_count);
                    }else if (cheMantenimiento_3_3.val() != 0) {

                        cheMantenimiento_3_3_count = 0;
                    $('#cheMantenimiento_3_3_count').val(cheMantenimiento_3_3_count);

                    }

                    var cheDisenio_3_3 =$('#cheDisenio_3_3');
                    var cheDisenio_3_3_count = $('#cheDisenio_3_3_count').val();

                    if(cheDisenio_3_3.val() == '' || cheDisenio_3_3.val() == null){
                        cheDisenio_3_3.css("border-color", "red")
                        cheDisenio_3_3_count = 1;
                        $('#cheDisenio_3_3_count').val(cheDisenio_3_3_count);
                    }else if (cheDisenio_3_3.val() != 0) {

                        cheDisenio_3_3_count = 0;
                    $('#cheDisenio_3_3_count').val(cheDisenio_3_3_count);

                    }

                    var hrsEnfriado_3_3 =$('#hrsEnfriado_3_3');
                    var hrsEnfriado_3_3_count = $('#hrsEnfriado_3_3_count').val();

                    if(hrsEnfriado_3_3.val() == 0 || hrsEnfriado_3_3.val() == ""){
                        hrsEnfriado_3_3.css("border-color", "red")
                        hrsEnfriado_3_3_count = 1;
                        $('#hrsEnfriado_3_3_count').val(hrsEnfriado_3_3_count);
                    }else if (hrsEnfriado_3_3.val() != 0) {

                        hrsEnfriado_3_3_count = 0;
                    $('#hrsEnfriado_3_3_count').val(hrsEnfriado_3_3_count);

                    }


                    var cheValorS_3_3 =$('#cheValorS_3_3');
                    var cheValorS_3_3_count = $('#cheValorS_3_3_count').val();
                    const myArray_chevalor_1_1 = cheValorS_3_3.val().split('$');
                    var var_chevalor_3_3 =  myArray_chevalor_1_1[1];

                    if(var_chevalor_3_3 <= 0 || cheValorS_3_3.val() == ""){

                        cheValorS_3_3.css("border-color", "red")
                        cheValorS_3_3_count = 1;

                        $('#cheValorS_3_3_count').val(cheValorS_3_3_count);
                       }else if (var_chevalor_3_3 > 0 || cheValorS_3_3.val() != null) {

                        cheValorS_3_3_count = 0;
                       $('#cheValorS_3_3_count').val(cheValorS_3_3_count);

                    }

                    var count_inps_3_3 = cheTipo_3_3_count +
                    capacidad_total_3_3_count + costo_elec_3_3_count
                    + cheStd_3_3_count + tipo_control_3_3_count +
                    dr_3_3_count + cheMantenimiento_3_3_count +
                    cheDisenio_3_3_count + hrsEnfriado_3_3_count + cheValorS_3_3_count;

                    if(count_inps_3_3>0){
                        trans_sols_valid_ab(idm,'B');
                                return false;
                                }
                    } */
                /////////////////////////////////////////////////////////
                formulario = document.getElementById('formulario');
                formulario.submit();

     }

     if(p_type == 2){
        check_form_retro(idm,fecha_project,action);
     }
    }

    function check_form_submit_demo(p_type,idm){

        if(p_type == 1){

        var sol_1_1 = $('#cUnidad_1_1');

        var sol_2_1 = $('#cUnidad_2_1');

        var sol_3_1 = $('#cUnidad_3_1');


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

            var cheValorS_1_1 =$('#cheValorS_1_1');
            var cheValorS_1_1_count = $('#cheValorS_1_1_count').val();
            const myArray_chevalor_1_1 = cheValorS_1_1.val().split('$');
            var var_chevalor_1_1 =  myArray_chevalor_1_1[1];

            if(var_chevalor_1_1 <= 0 || cheValorS_1_1.val() == ""){

                cheValorS_1_1.css("border-color", "red")
                cheValorS_1_1_count = 1;

                $('#cheValorS_1_1_count').val(cheValorS_1_1_count);
               }else if (var_chevalor_1_1 > 0 || cheValorS_1_1.val() != null) {

                cheValorS_1_1_count = 0;
               $('#cheValorS_1_1_count').val(cheValorS_1_1_count);

            }

           var count_inps_1_1 = tipo_equipo_1_1_count + capacidad_total_1_1_count + costo_elec_1_1_count + dr_1_1_count + csStd_cant_1_1_count + tipo_control_1_count + csMantenimiento_1_1_count + csDisenio_1_1_count + hrsEnfriado_1_1_count + cheValorS_1_1_count;

           if(count_inps_1_1>0){
            trans_sols_valid(idm);
                        return false;
                        }

        }

        //////////////////////////////////////////////////////////////

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

                        var cheValorS_2_1 =$('#cheValorS_2_1');
                        var cheValorS_2_1_count = $('#cheValorS_2_1_count').val();
                        const myArray_chevalor_1_1 = cheValorS_2_1.val().split('$');
                        var var_chevalor_2_1 =  myArray_chevalor_1_1[1];

                        if(var_chevalor_2_1 <= 0 || cheValorS_2_1.val() == ""){

                            cheValorS_2_1.css("border-color", "red")
                            cheValorS_2_1_count = 1;

                            $('#cheValorS_2_1_count').val(cheValorS_2_1_count);
                           }else if (var_chevalor_2_1 > 0 || cheValorS_2_1.val() != null) {

                            cheValorS_2_1_count = 0;
                           $('#cheValorS_2_1_count').val(cheValorS_2_1_count);

                        }

                    var count_inps_2_1 = cheTipo_2_1_count + capacidad_total_2_1_count + costo_elec_2_1_count + dr_2_1_count + csStd_cant_2_1_count + tipo_control_2_1_count + csMantenimiento_2_1_count + cheDisenio_2_1_count + hrsEnfriado_2_1_count + cheValorS_2_1_count;
                  /*       alert(count_inps_2_1); */
                    if(count_inps_2_1>0){
                        trans_sols_valid_ab(idm,'A')
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


                        var cheValorS_3_1 =$('#cheValorS_3_1');
                        var cheValorS_3_1_count = $('#cheValorS_3_1_count').val();
                        const myArray_chevalor_3_1 = cheValorS_3_1.val().split('$');
                        var var_chevalor_3_1 =  myArray_chevalor_3_1[1];

                        if(var_chevalor_3_1 <= 0 || cheValorS_3_1.val() == ""){

                            cheValorS_3_1.css("border-color", "red")
                            cheValorS_3_1_count = 1;

                            $('#cheValorS_3_1_count').val(cheValorS_3_1_count);
                           }else if (var_chevalor_3_1 > 0 || cheValorS_3_1.val() != null) {

                            cheValorS_3_1_count = 0;
                           $('#cheValorS_3_1_count').val(cheValorS_3_1_count);

                        }

                    var count_inps_3_1 = cheTipo_3_1_count + capacidad_total_3_1_count + costo_elec_3_1_count + dr_3_1_count + cheStd_3_1_count + tipo_control_3_1_count + cheMantenimiento_3_1_count + cheDisenio_3_1_count + hrsEnfriado_3_1_count + cheValorS_3_1_count;
                  /*       alert(count_inps_2_1); */
                    if(count_inps_3_1>0){
                        trans_sols_valid_ab(idm,'B');
                                    return false;
                                    }

                    }

                    /////////////////////////////////////////////////////////
                    formulario = document.getElementById('formulario');
                    formulario.submit();

         }

         if(p_type == 2){
            check_form_retro(idm,fecha_project,action);
         }
        }

        function check_fecha_proj(id_project){
            $.ajax({
                type: 'get',
                url: '/check_date_2_0/'+id_project,
                success: function (response) {

                  return response;
                },

            });
          }

function check_form_retro(idm,fecha_project,action){

 if(action == 'update'){
    const fechaUno = new Date(fecha_project); // Primera fecha
    const fechaDos = new Date('2024-07-12 00:00:00'); //
    const tiempoFechaUno = fechaUno.getTime();
    const tiempoFechaDos = fechaDos.getTime();

    if (tiempoFechaUno < tiempoFechaDos) {
        var action_use = 1;
    } else if (tiempoFechaUno > tiempoFechaDos) {
        var action_use = 2;
    }
}else{
    var action_use = 2;
}


    var sol_1_1_retro = $('#cUnidad_1_1_retro');
    var sol_1_2_retro = $('#cUnidad_1_2');
    //var sol_1_3 = $('#cUnidad_1_3');

    var sol_2_1_retro = $('#cUnidad_2_1_retro');
    var sol_2_2_retro = $('#cUnidad_2_2');
    //var sol_2_3 = $('#cUnidad_2_3');

    var sol_3_1_retro = $('#cUnidad_3_1_retro');
    var sol_3_2_retro = $('#cUnidad_3_2');
    //var sol_3_3 = $('#cUnidad_3_3');


                if (sol_1_1_retro.val() != '0'){

                    /////////////////////////////////////
                var tipo_equipo_1_1 =$('#csTipo_1_1_retro');
                var tipo_equipo_1_1_count = $('#tipo_equipo_1_1_count_retro').val();

                if(tipo_equipo_1_1.val() == 0){

                    tipo_equipo_1_1.css("border-color", "red")
                    tipo_equipo_1_1_count = 1;
                    $('#tipo_equipo_1_1_count').val(tipo_equipo_1_1_count);

                }else if (tipo_equipo_1_1.val() != 0) {

                    tipo_equipo_1_1_count = 0;
                    $('#tipo_equipo_1_1_count').val(tipo_equipo_1_1_count);

                }

                 /////////////////////////////////////
                 var  marca_1_1_retro=$('#marca_1_1_retro');
                 var marca_1_1_retro_count = $('#marca_1_1_retro_count').val();

                 if(marca_1_1_retro.val() == '' || marca_1_1_retro.val() == null){

                    marca_1_1_retro.css("border-color", "red")
                     marca_1_1_retro_count = 1;
                     $('#marca_1_1_retro_count').val(marca_1_1_retro_count);

                 }else if (marca_1_1_retro.val() != '') {

                     marca_1_1_retro_count = 0;
                     $('#marca_1_1_retro_count').val(marca_1_1_retro_count);

                 }

                  /////////////////////////////////////
                var  modelo_1_1_retro=$('#modelo_1_1_retro');
                var modelo_1_1_retro_count = $('#modelo_1_1_retro_count').val();

                if(modelo_1_1_retro.val() == '' || modelo_1_1_retro.val() == null){

                    modelo_1_1_retro.css("border-color", "red")
                    modelo_1_1_retro_count = 1;
                    $('#modelo_1_1_retro_count').val(modelo_1_1_retro_count);

                }else if (modelo_1_1_retro.val() != '') {

                    modelo_1_1_retro_count = 0;
                    $('#modelo_1_1_retro_count').val(modelo_1_1_retro_count);

                }
                /////////////////////////////////////
                var  yrs_vida_1_1_retro=$('#yrs_vida_1_1_retro');
                var yrs_vida_1_1_retro_count = $('#yrs_vida_1_1_retro_count').val();

                if(yrs_vida_1_1_retro.val() == '' || yrs_vida_1_1_retro.val() == null){

                    yrs_vida_1_1_retro.css("border-color", "red")
                    yrs_vida_1_1_retro_count = 1;
                    $('#yrs_vida_1_1_retro_count').val(yrs_vida_1_1_retro_count);

                }else if (yrs_vida_1_1_retro.val() != '') {

                    yrs_vida_1_1_retro_count = 0;
                    $('#yrs_vida_1_1_retro_count').val(yrs_vida_1_1_retro_count);

                }
                /////////////////////////////////////
                var csStd_retro_1_1_cant =$('#csStd_retro_1_1_cant');
                var csStd_retro_1_1_count = $('#csStd_retro_1_1_count').val();

                if(csStd_retro_1_1_cant.val() == ''){

                    csStd_retro_1_1_cant.css("border-color", "red");
                    csStd_retro_1_1_count = 1;
                    $('#csStd_retro_1_1_count').val(csStd_retro_1_1_count);

                }else if (csStd_retro_1_1_cant.val() != '') {

                    csStd_retro_1_1_count = 0;
                    $('#csStd_retro_1_1_count').val(csStd_retro_1_1_count);

                }

                /////////////////////////////////////
                var  capacidad_total_1_1_retro=$('#capacidad_total_1_1_retro');
                var capacidad_total_1_1_retro_count = $('#capacidad_total_1_1_retro_count').val();

                if(capacidad_total_1_1_retro.val() == 0){

                    capacidad_total_1_1_retro.css("border-color", "red")
                    capacidad_total_1_1_retro_count = 1;
                    $('#capacidad_total_1_1_retro_count').val(capacidad_total_1_1_retro_count);

                }else if (capacidad_total_1_1_retro.val() != 0) {

                    capacidad_total_1_1_retro_count = 0;
                    $('#capacidad_total_1_1_retro_count').val(capacidad_total_1_1_retro_count);

                }

                    /////////////////////////////////////
                    var csDisenio_1_1_retro =$('#csDisenio_1_1_retro');
                    var csDisenio_1_1_retro_count = $('#csDisenio_1_1_retro_count').val();

                    if(csDisenio_1_1_retro.val() == '' || csDisenio_1_1_retro.val() == null){

                        csDisenio_1_1_retro.css("border-color", "red")
                        csDisenio_1_1_retro_count = 1;
                        $('#csDisenio_1_1_retro_count').val(csDisenio_1_1_retro_count);

                    }else if (csDisenio_1_1_retro.val() != '' || csDisenio_1_1_retro.val() != null) {

                            csDisenio_1_1_retro_count = 0;
                        $('#csDisenio_1_1_retro_count').val(csDisenio_1_1_retro_count);


                    }
                        /////////////////////////////////////
                var costo_elec_1_1_retro =$('#costo_elec_1_1_retro');
                var costo_elec_1_1_retro_count = $('#costo_elec_1_1_retro_count').val();

                if(costo_elec_1_1_retro.val() == 0){

                    costo_elec_1_1_retro.css("border-color", "red")
                    costo_elec_1_1_retro_count = 1;
                    $('#costo_elec_1_1_retro_count').val(costo_elec_1_1_retro_count);

                }else if (costo_elec_1_1_retro.val() != 0) {

                    costo_elec_1_1_retro_count = 0;
                    $('#costo_elec_1_1_retro_count').val(costo_elec_1_1_retro_count);

                }
                    /////////////////////////////////////
                    var hrsEnfriado_1_1_retro =$('#hrsEnfriado_1_1_retro');
                var hrsEnfriado_1_1_retro_count = $('#hrsEnfriado_1_1_retro_count').val();

                if(hrsEnfriado_1_1_retro.val() == 0 || hrsEnfriado_1_1_retro.val() == ""){

                    hrsEnfriado_1_1_retro.css("border-color", "red")
                    hrsEnfriado_1_1_retro_count = 1;

                    $('#hrsEnfriado_1_1_retro_count').val(hrsEnfriado_1_1_retro_count);
                }else if (hrsEnfriado_1_1_retro.val() != 0 || hrsEnfriado_1_1_retro.val() != null) {

                    hrsEnfriado_1_1_retro_count = 0;
                $('#hrsEnfriado_1_1_retro_count').val(hrsEnfriado_1_1_retro_count);

                    }


                var tipo_control_1_1_retro =$('#tipo_control_1_1_retro');
                var tipo_control_1_1_retro_count = $('#tipo_control_1_1_retro_count').val();

                if(tipo_control_1_1_retro.val() == 0 || tipo_control_1_1_retro.val() == null){

                    tipo_control_1_1_retro.css("border-color", "red")
                    tipo_control_1_1_retro_count = 1;
                    $('#tipo_control_1_1_retro_count').val(tipo_control_1_1_retro_count);

                }else if (tipo_control_1_1_retro.val() != 0) {

                    tipo_control_1_1_retro_count = 0;
                    $('#tipo_control_1_1_retro_count').val(tipo_control_1_1_retro_count);

                }
                    /////////////////////////////////////
                var dr_1_1_retro =$('#dr_1_1_retro');
                var dr_1_1_retro_count = $('#dr_1_1_retro_count').val();

                if(dr_1_1_retro.val() == "" || dr_1_1_retro.val() == null){

                    dr_1_1_retro.css("border-color", "red")
                    dr_1_1_retro_count = 1;
                    $('#dr_1_1_retro_count').val(dr_1_1_retro_count);

                }else if (dr_1_1_retro.val() != "" || dr_1_1_retro.val() != null) {

                    dr_1_1_retro_count = 0;
                    $('#dr_1_1_retro_count').val(dr_1_1_retro_count);

                }

                if(action_use == 2  || action == 'store'){

                    /////////////////////////////////////
                    var ventilacion_1_1_retro =$('#ventilacion_1_1_retro');
                    var ventilacion_1_1_retro_count = $('#ventilacion_1_1_retro_count').val();

                    if(ventilacion_1_1_retro.val() == "" || ventilacion_1_1_retro.val() == null){

                        ventilacion_1_1_retro.css("border-color", "red")
                        ventilacion_1_1_retro_count = 1;
                    $('#ventilacion_1_1_retro_count').val(ventilacion_1_1_retro_count);

                    }else if (ventilacion_1_1_retro.val() != "" || ventilacion_1_1_retro.val() != null) {

                        ventilacion_1_1_retro_count = 0;
                    $('#ventilacion_1_1_retro_count').val(ventilacion_1_1_retro_count);

                    }
                    /////////////////////////////////////

                    var filtracion_1_1_retro =$('#filtracion_1_1_retro');
                    var filtracion_1_1_retro_count = $('#filtracion_1_1_retro_count').val();

                    if(filtracion_1_1_retro.val() == "" || filtracion_1_1_retro.val() == null){

                    filtracion_1_1_retro.css("border-color", "red")
                    filtracion_1_1_retro_count = 1;
                    $('#filtracion_1_1_retro_count').val(filtracion_1_1_retro_count);

                    }else if (filtracion_1_1_retro.val() != "" || filtracion_1_1_retro.val() != null) {

                        filtracion_1_1_retro_count = 0;
                    $('#filtracion_1_1_retro_count').val(filtracion_1_1_retro_count);

                    }
               }
                    /////////////////////////////////////
                var csMantenimiento_1_1_retro =$('#csMantenimiento_1_1_retro');
                var csMantenimiento_1_1_retro_count = $('#csMantenimiento_1_1_retro_count').val();

                if(csMantenimiento_1_1_retro.val() == 0){

                    csMantenimiento_1_1_retro.css("border-color", "red")
                    csMantenimiento_1_1_retro_count = 1;
                    $('#csMantenimiento_1_1_retro_count').val(csMantenimiento_1_1_retro_count);

                }else if (csMantenimiento_1_1_retro.val() != 0) {

                    csMantenimiento_1_1_retro_count = 0;
                    $('#csMantenimiento_1_1_retro_count').val(csMantenimiento_1_1_retro_count);

                }
                /////////////////////////////////////
                var costo_recu_1_1_retro =$('#costo_recu_1_1_retro');
                var costo_recu_1_1_retro_count = $('#costo_recu_1_1_retro_count').val();

                if(costo_recu_1_1_retro.val() == 0 || costo_recu_1_1_retro.val() == ""){

                    costo_recu_1_1_retro.css("border-color", "red")
                    costo_recu_1_1_retro_count = 1;

                    $('#costo_recu_1_1_retro_count').val(costo_recu_1_1_retro_count);
                }else if (costo_recu_1_1_retro.val() != 0 || costo_recu_1_1_retro.val() != null) {

                    costo_recu_1_1_retro_count = 0;
                $('#costo_recu_1_1_retro_count').val(costo_recu_1_1_retro_count);

                    }


                    /////////////////////////////////////
                    var maintenance_cost_1_1_retro =$('#maintenance_cost_1_1_retro');
                    var maintenance_cost_1_1_retro_count = $('#maintenance_cost_1_1_retro_count').val();
                    const myArray_maintenance_cost_1_1 = maintenance_cost_1_1_retro.val().split('$');
                    var var_maintenance_cost_1_1_retro =  myArray_maintenance_cost_1_1[1];

                    if(var_maintenance_cost_1_1_retro < 0){

                        maintenance_cost_1_1_retro.css("border-color", "red")
                        maintenance_cost_1_1_retro_count = 1;

                        $('#maintenance_cost_1_1_retro_count').val(maintenance_cost_1_1_retro_count);
                    }else if (var_maintenance_cost_1_1_retro >= 0 || maintenance_cost_1_1_retro.val() != null) {

                        maintenance_cost_1_1_retro_count = 0;
                    $('#maintenance_cost_1_1_retro_count').val(maintenance_cost_1_1_retro_count);

                    }

                    /////////////////////////////////////
                    var const_an_rep_1_1 =$('#const_an_rep_1_1');
                    var const_an_rep_1_1_count = $('#const_an_rep_1_1_count').val();
                    const myArray_const_an_rep_1_1 = const_an_rep_1_1.val().split('$');
                    var var_const_an_rep_1_1 =  myArray_const_an_rep_1_1[1];

                    if(var_const_an_rep_1_1 <= 0 || const_an_rep_1_1.val() == ""){

                        const_an_rep_1_1.css("border-color", "red")
                        const_an_rep_1_1_count = 1;

                        $('#const_an_rep_1_1_count').val(const_an_rep_1_1_count);
                    }else if (const_an_rep_1_1 > 0 || const_an_rep_1_1.val() != null) {

                        const_an_rep_1_1_count = 0;
                    $('#const_an_rep_1_1_count').val(const_an_rep_1_1_count);

                    }

                var count_inps_1_1 = tipo_equipo_1_1_count + marca_1_1_retro_count + modelo_1_1_retro_count + yrs_vida_1_1_retro_count + csStd_retro_1_1_count + capacidad_total_1_1_retro_count + csDisenio_1_1_retro_count + costo_elec_1_1_retro_count + hrsEnfriado_1_1_retro_count + tipo_control_1_1_retro_count + dr_1_1_retro_count + csMantenimiento_1_1_retro_count + costo_recu_1_1_retro_count + maintenance_cost_1_1_retro_count + const_an_rep_1_1_count +ventilacion_1_1_retro_count+filtracion_1_1_retro_count;

                if(count_inps_1_1>0){
                    trans_sols_valid(idm);
                                return false;
                                }

                }
                //////////2_1
                if (sol_2_1_retro.val() != '0'){

                    /////////////////////////////////////
                var cheTipo_2_1_retro =$('#cheTipo_2_1_retro');
                var cheTipo_2_1_count_retro = $('#cheTipo_2_1_count_retro').val();

                if(cheTipo_2_1_retro.val() == 0){

                    cheTipo_2_1_retro.css("border-color", "red")
                    cheTipo_2_1_count_retro = 1;
                    $('#cheTipo_2_1_count_retro').val(cheTipo_2_1_count_retro);

                }else if (cheTipo_2_1_retro.val() != 0) {

                    cheTipo_2_1_count_retro = 0;
                    $('#cheTipo_2_1_count_retro').val(cheTipo_2_1_count_retro);

                }

                 /////////////////////////////////////
                 var marca_2_1_retro=$('#marca_2_1_retro');
                 var marca_2_1_retro_count = $('#marca_2_1_retro_count').val();

                 if(marca_2_1_retro.val() == '' || marca_2_1_retro.val() == null){

                    marca_2_1_retro.css("border-color", "red")
                     marca_2_1_retro_count = 1;
                     $('#marca_2_1_retro_count').val(marca_2_1_retro_count);

                 }else if (marca_2_1_retro.val() != '') {

                     marca_2_1_retro_count = 0;
                     $('#marca_2_1_retro_count').val(marca_2_1_retro_count);

                 }

                  /////////////////////////////////////
                var  modelo_2_1_retro=$('#modelo_2_1_retro');
                var modelo_2_1_retro_count = $('#modelo_2_1_retro_count').val();

                if(modelo_2_1_retro.val() === '' || modelo_2_1_retro.val() === null || modelo_2_1_retro.val() === 0){

                    modelo_2_1_retro.css("border-color", "red")
                    modelo_2_1_retro_count = 1;
                    $('#modelo_2_1_retro_count').val(modelo_2_1_retro_count);

                }else if (modelo_2_1_retro.val() != '') {

                    modelo_2_1_retro_count = 0;
                    $('#modelo_2_1_retro_count').val(modelo_2_1_retro_count);

                }
                /////////////////////////////////////
                var  yrs_vida_2_1_retro=$('#yrs_vida_2_1_retro');
                var yrs_vida_2_1_retro_count = $('#yrs_vida_2_1_retro_count').val();

                if(yrs_vida_2_1_retro.val() == '' || yrs_vida_2_1_retro.val() == null){

                    yrs_vida_2_1_retro.css("border-color", "red")
                    yrs_vida_2_1_retro_count = 1;
                    $('#yrs_vida_2_1_retro_count').val(yrs_vida_2_1_retro_count);

                }else if (yrs_vida_2_1_retro.val() != '') {

                    yrs_vida_2_1_retro_count = 0;
                    $('#yrs_vida_2_1_retro_count').val(yrs_vida_2_1_retro_count);

                }
                /////////////////////////////////////
                var csStd_cant_2_1_retro =$('#csStd_cant_2_1_retro');
                var csStd_2_1_retro_count = $('#csStd_2_1_retro_count').val();

                if(csStd_cant_2_1_retro.val() == ''){

                    csStd_cant_2_1_retro.css("border-color", "red");
                    csStd_2_1_retro_count = 1;
                    $('#csStd_2_1_retro_count').val(csStd_2_1_retro_count);

                }else if (csStd_cant_2_1_retro.val() != '') {

                    csStd_2_1_retro_count = 0;
                    $('#csStd_2_1_retro_count').val(csStd_2_1_retro_count);

                }

                /////////////////////////////////////
                var  capacidad_total_2_1_retro=$('#capacidad_total_2_1_retro');
                var capacidad_total_2_1_retro_count = $('#capacidad_total_2_1_retro_count').val();

                if(capacidad_total_2_1_retro.val() == 0){

                    capacidad_total_2_1_retro.css("border-color", "red")
                    capacidad_total_2_1_retro_count = 1;
                    $('#capacidad_total_2_1_retro_count').val(capacidad_total_2_1_retro_count);

                }else if (capacidad_total_2_1_retro.val() != 0) {

                    capacidad_total_2_1_retro_count = 0;
                    $('#capacidad_total_2_1_retro_count').val(capacidad_total_2_1_retro_count);

                }

                    /////////////////////////////////////
                    var cheDisenio_2_1_retro =$('#cheDisenio_2_1_retro');
                    var cheDisenio_2_1_retro_count = $('#cheDisenio_2_1_retro').val();

                    if(cheDisenio_2_1_retro.val() == '' || cheDisenio_2_1_retro.val() == null){

                        cheDisenio_2_1_retro.css("border-color", "red")
                        cheDisenio_2_1_retro_count = 1;
                        $('#cheDisenio_2_1_retro_count').val(cheDisenio_2_1_retro_count);

                    }else if (cheDisenio_2_1_retro.val() != '' || cheDisenio_2_1_retro.val() != null) {

                            cheDisenio_2_1_retro_count = 0;
                        $('#cheDisenio_2_1_retro_count').val(cheDisenio_2_1_retro_count);


                    }
                        /////////////////////////////////////
                var costo_elec_2_1_retro =$('#costo_elec_2_1_retro');
                var costo_elec_2_1_retro_count = $('#costo_elec_2_1_retro_count').val();

                if(costo_elec_2_1_retro.val() == 0){

                    costo_elec_2_1_retro.css("border-color", "red")
                    costo_elec_2_1_retro_count = 1;
                    $('#costo_elec_2_1_retro_count').val(costo_elec_2_1_retro_count);

                }else if (costo_elec_2_1_retro.val() != 0) {

                    costo_elec_2_1_retro_count = 0;
                    $('#costo_elec_2_1_retro_count').val(costo_elec_2_1_retro_count);

                }
                    /////////////////////////////////////
                var hrsEnfriado_2_1_retro =$('#hrsEnfriado_2_1_retro');
                var hrsEnfriado_2_1_retro_count = $('#hrsEnfriado_2_1_retro_count').val();

                if(hrsEnfriado_2_1_retro.val() == 0 || hrsEnfriado_2_1_retro.val() == ""){

                    hrsEnfriado_2_1_retro.css("border-color", "red")
                    hrsEnfriado_2_1_retro_count = 1;

                    $('#hrsEnfriado_2_1_retro_count').val(hrsEnfriado_2_1_retro_count);
                }else if (hrsEnfriado_2_1_retro.val() != 0 || hrsEnfriado_2_1_retro.val() != null) {

                    hrsEnfriado_2_1_retro_count = 0;
                $('#hrsEnfriado_2_1_retro_count').val(hrsEnfriado_2_1_retro_count);

                    }


                var tipo_control_2_1_retro =$('#tipo_control_2_1_retro');
                var tipo_control_2_1_retro_count = $('#tipo_control_2_1_retro_count').val();

                if(tipo_control_2_1_retro.val() == 0 || tipo_control_2_1_retro.val() == null){

                    tipo_control_2_1_retro.css("border-color", "red")
                    tipo_control_2_1_retro_count = 1;
                    $('#tipo_control_2_1_retro_count').val(tipo_control_2_1_retro_count);

                }else if (tipo_control_2_1_retro.val() != 0) {

                    tipo_control_2_1_retro_count = 0;
                    $('#tipo_control_2_1_retro_count').val(tipo_control_2_1_retro_count);

                }
                    /////////////////////////////////////
                var dr_2_1_retro =$('#dr_2_1_retro');
                var dr_2_1_retro_count = $('#dr_2_1_retro_count').val();

                if(dr_2_1_retro.val() == "" || dr_2_1_retro.val() == null){

                    dr_2_1_retro.css("border-color", "red")
                    dr_2_1_retro_count = 1;
                    $('#dr_2_1_retro_count').val(dr_2_1_retro_count);

                }else if (dr_2_1_retro.val() != "" || dr_2_1_retro.val() != null) {

                    dr_2_1_retro_count = 0;
                    $('#dr_2_1_retro_count').val(dr_2_1_retro_count);

                }

                if(action_use == 2 || action == 'store'){
                    /////////////////////////////////////
                    var ventilacion_2_1_retro =$('#ventilacion_2_1_retro');
                    var ventilacion_2_1_retro_count = $('#ventilacion_2_1_retro_count').val();

                    if(ventilacion_2_1_retro.val() == "" || ventilacion_2_1_retro.val() == null){

                        ventilacion_2_1_retro.css("border-color", "red")
                        ventilacion_2_1_retro_count = 1;
                    $('#ventilacion_2_1_retro_count').val(ventilacion_2_1_retro_count);

                    }else if (ventilacion_2_1_retro.val() != "" || ventilacion_2_1_retro.val() != null) {

                        ventilacion_2_1_retro_count = 0;
                    $('#ventilacion_2_1_retro_count').val(ventilacion_2_1_retro_count);

                    }
                    /////////////////////////////////////

                    var filtracion_2_1_retro =$('#filtracion_2_1_retro');
                    var filtracion_2_1_retro_count = $('#filtracion_2_1_retro_count').val();

                    if(filtracion_2_1_retro.val() == "" || filtracion_2_1_retro.val() == null){

                    filtracion_2_1_retro.css("border-color", "red")
                    filtracion_2_1_retro_count = 1;
                    $('#filtracion_2_1_retro_count').val(filtracion_2_1_retro_count);

                    }else if (filtracion_2_1_retro.val() != "" || filtracion_2_1_retro.val() != null) {

                        filtracion_2_1_retro_count = 0;
                    $('#filtracion_2_1_retro_count').val(filtracion_2_1_retro_count);

                    }
               }
                    /////////////////////////////////////
                var csMantenimiento_2_1_retro =$('#csMantenimiento_2_1_retro');
                var csMantenimiento_2_1_retro_count = $('#csMantenimiento_2_1_retro_count').val();

                if(csMantenimiento_2_1_retro.val() == 0){

                    csMantenimiento_2_1_retro.css("border-color", "red")
                    csMantenimiento_2_1_retro_count = 1;
                    $('#csMantenimiento_2_1_retro_count').val(csMantenimiento_2_1_retro_count);

                }else if (csMantenimiento_2_1_retro.val() != 0) {

                    csMantenimiento_2_1_retro_count = 0;
                    $('#csMantenimiento_2_1_retro_count').val(csMantenimiento_2_1_retro_count);

                }
                /////////////////////////////////////
                var costo_recu_2_1_retro =$('#costo_recu_2_1_retro');
                var costo_recu_1_1_retro_count = $('#costo_recu_1_1_retro_count').val();

                if(costo_recu_2_1_retro.val() == 0 || costo_recu_2_1_retro.val() == ""){

                    costo_recu_2_1_retro.css("border-color", "red")
                    costo_recu_1_1_retro_count = 1;

                    $('#costo_recu_1_1_retro_count').val(costo_recu_1_1_retro_count);
                }else if (costo_recu_2_1_retro.val() != 0 || costo_recu_2_1_retro.val() != null) {

                    costo_recu_1_1_retro_count = 0;
                $('#costo_recu_1_1_retro_count').val(costo_recu_1_1_retro_count);

                    }


                    /////////////////////////////////////
                    var maintenance_cost_2_1_retro =$('#maintenance_cost_2_1_retro');
                    var maintenance_cost_2_1_retro_count = $('#maintenance_cost_2_1_retro_count').val();
                    const myArray_maintenance_cost_2_1 = maintenance_cost_2_1_retro.val().split('$');
                    var var_maintenance_cost_2_1_retro =  myArray_maintenance_cost_2_1[1];

                    if(var_maintenance_cost_2_1_retro < 0){

                        maintenance_cost_2_1_retro.css("border-color", "red")
                        maintenance_cost_2_1_retro_count = 1;

                        $('#maintenance_cost_2_1_retro_count').val(maintenance_cost_2_1_retro_count);
                    }else if (var_maintenance_cost_2_1_retro >= 0 || maintenance_cost_2_1_retro.val() != null) {

                        maintenance_cost_2_1_retro_count = 0;
                    $('#maintenance_cost_2_1_retro_count').val(maintenance_cost_2_1_retro_count);

                    }
                    /////////////////////////////////////
                    /* var const_an_rep_2_1 =$('#const_an_rep_2_1');
                    var const_an_rep_2_1_retro_count = $('#const_an_rep_2_1_retro_count').val();
                    const myArray_const_an_rep_2_1 = const_an_rep_2_1.val().split('$');
                    var var_const_an_rep_2_1 =  myArray_const_an_rep_2_1[1];

                    if(var_const_an_rep_2_1 <= 0 || const_an_rep_2_1.val() == ""){

                        const_an_rep_2_1.css("border-color", "red")
                        const_an_rep_2_1_retro_count = 1;

                        $('#const_an_rep_2_1_retro_count').val(const_an_rep_2_1_retro_count);
                    }else if (const_an_rep_2_1 > 0 || const_an_rep_2_1.val() != null) {

                        const_an_rep_2_1_retro_count = 0;
                    $('#const_an_rep_2_1_retro_count').val(const_an_rep_2_1_retro_count);

                    } */

                var count_inps_2_1 = cheTipo_2_1_count_retro + marca_2_1_retro_count + modelo_2_1_retro_count + yrs_vida_2_1_retro_count + csStd_2_1_retro_count + capacidad_total_2_1_retro_count + cheDisenio_2_1_retro_count + costo_elec_2_1_retro_count + hrsEnfriado_2_1_retro_count + tipo_control_2_1_retro_count + dr_2_1_retro_count + csMantenimiento_2_1_retro_count + costo_recu_1_1_retro_count + maintenance_cost_2_1_retro_count +ventilacion_2_1_retro_count+filtracion_2_1_retro_count;

                if(count_inps_2_1>0){
                    trans_sols_valid_ab(idm,'A')
                                return false;
                                }

                }

                //3 1
                if (sol_3_1_retro.val() != '0'){

                    /////////////////////////////////////
                var cheTipo_3_1_retro =$('#cheTipo_3_1_retro');
                var cheTipo_3_1_retro_count = $('#cheTipo_3_1_retro_count').val();

                if(cheTipo_3_1_retro.val() == 0){

                    cheTipo_3_1_retro.css("border-color", "red")
                    cheTipo_3_1_retro_count = 1;
                    $('#cheTipo_3_1_retro_count').val(cheTipo_3_1_retro_count);

                }else if (cheTipo_3_1_retro.val() != 0) {

                    cheTipo_3_1_retro_count = 0;
                    $('#cheTipo_3_1_retro_count').val(cheTipo_3_1_retro_count);

                }

                 /////////////////////////////////////
                 var marca_3_1_retro=$('#marca_3_1_retro');
                 var marca_3_1_retro_count = $('#marca_3_1_retro_count').val();

                 if(marca_3_1_retro.val() == '' || marca_3_1_retro.val() == null){

                    marca_3_1_retro.css("border-color", "red")
                     marca_3_1_retro_count = 1;
                     $('#marca_3_1_retro_count').val(marca_3_1_retro_count);

                 }else if (marca_3_1_retro.val() != '') {

                     marca_3_1_retro_count = 0;
                     $('#marca_3_1_retro_count').val(marca_3_1_retro_count);

                 }

                  /////////////////////////////////////
                var  modelo_3_1_retro=$('#modelo_3_1_retro');
                var modelo_3_1_retro_count = $('#modelo_3_1_retro_count').val();

                if(modelo_3_1_retro.val() === '' || modelo_3_1_retro.val() === null || modelo_3_1_retro.val() === 0){

                    modelo_3_1_retro.css("border-color", "red")
                    modelo_3_1_retro_count = 1;
                    $('#modelo_3_1_retro_count').val(modelo_3_1_retro_count);

                }else if (modelo_3_1_retro.val() !== '' || modelo_3_1_retro.val() !== null || modelo_3_1_retro.val() !== 0) {

                    modelo_3_1_retro_count = 0;
                    $('#modelo_3_1_retro_count').val(modelo_3_1_retro_count);

                }

                /////////////////////////////////////
                var  yrs_vida_3_1_retro=$('#yrs_vida_3_1_retro');
                var yrs_vida_3_1_retro_count = $('#yrs_vida_3_1_retro_count').val();

                if(yrs_vida_3_1_retro.val() == '' || yrs_vida_3_1_retro.val() == null){

                    yrs_vida_3_1_retro.css("border-color", "red")
                    yrs_vida_3_1_retro_count = 1;
                    $('#yrs_vida_3_1_retro_count').val(yrs_vida_3_1_retro_count);

                }else if (yrs_vida_3_1_retro.val() != '') {

                    yrs_vida_3_1_retro_count = 0;
                    $('#yrs_vida_3_1_retro_count').val(yrs_vida_3_1_retro_count);

                }
                /////////////////////////////////////
                var csStd_cant_3_1_retro =$('#csStd_cant_3_1_retro');
                var cheStd_3_1_retro_count = $('#cheStd_3_1_retro_count').val();

                if(csStd_cant_3_1_retro.val() == ''){

                    csStd_cant_3_1_retro.css("border-color", "red");
                    cheStd_3_1_retro_count = 1;
                    $('#cheStd_3_1_retro_count').val(cheStd_3_1_retro_count);

                }else if (csStd_cant_3_1_retro.val() != '') {

                    cheStd_3_1_retro_count = 0;
                    $('#cheStd_3_1_retro_count').val(cheStd_3_1_retro_count);

                }

                /////////////////////////////////////
                var  capacidad_total_3_1_retro=$('#capacidad_total_3_1_retro');
                var capacidad_total_3_1_retro_count = $('#capacidad_total_3_1_retro_count').val();

                if(capacidad_total_3_1_retro.val() == 0){

                    capacidad_total_3_1_retro.css("border-color", "red")
                    capacidad_total_3_1_retro_count = 1;
                    $('#capacidad_total_3_1_retro_count').val(capacidad_total_3_1_retro_count);

                }else if (capacidad_total_3_1_retro.val() != 0) {

                    capacidad_total_3_1_retro_count = 0;
                    $('#capacidad_total_3_1_retro_count').val(capacidad_total_3_1_retro_count);

                }

                    /////////////////////////////////////
                    var cheDisenio_2_1_retro =$('#cheDisenio_2_1_retro');
                    var cheDisenio_3_1_retro_count = $('#cheDisenio_3_1_retro_count').val();

                    if(cheDisenio_2_1_retro.val() == '' || cheDisenio_2_1_retro.val() == null){

                        cheDisenio_2_1_retro.css("border-color", "red")
                        cheDisenio_3_1_retro_count = 1;
                        $('#cheDisenio_3_1_retro_count').val(cheDisenio_3_1_retro_count);

                    }else if (cheDisenio_2_1_retro.val() != '' || cheDisenio_2_1_retro.val() != null) {

                            cheDisenio_3_1_retro_count = 0;
                        $('#cheDisenio_3_1_retro_count').val(cheDisenio_3_1_retro_count);


                    }
                        /////////////////////////////////////
                var costo_elec_3_1_retro =$('#costo_elec_3_1_retro');
                var costo_elec_3_1_retro_count = $('#costo_elec_3_1_retro_count').val();

                if(costo_elec_3_1_retro.val() == 0){

                    costo_elec_3_1_retro.css("border-color", "red")
                    costo_elec_3_1_retro_count = 1;
                    $('#costo_elec_3_1_retro_count').val(costo_elec_3_1_retro_count);

                }else if (costo_elec_3_1_retro.val() != 0) {

                    costo_elec_3_1_retro_count = 0;
                    $('#costo_elec_3_1_retro_count').val(costo_elec_3_1_retro_count);

                }
                    /////////////////////////////////////
                var hrsEnfriado_3_1_retro =$('#hrsEnfriado_3_1_retro');
                var hrsEnfriado_3_1_retro_count = $('#hrsEnfriado_3_1_retro_count').val();

                if(hrsEnfriado_3_1_retro.val() == 0 || hrsEnfriado_3_1_retro.val() == ""){

                    hrsEnfriado_3_1_retro.css("border-color", "red")
                    hrsEnfriado_3_1_retro_count = 1;

                    $('#hrsEnfriado_3_1_retro_count').val(hrsEnfriado_3_1_retro_count);
                }else if (hrsEnfriado_3_1_retro.val() != 0 || hrsEnfriado_3_1_retro.val() != null) {

                    hrsEnfriado_3_1_retro_count = 0;
                $('#hrsEnfriado_3_1_retro_count').val(hrsEnfriado_3_1_retro_count);

                    }


                var tipo_control_3_1_retro =$('#tipo_control_3_1_retro');
                var tipo_control_3_1_retro_count = $('#tipo_control_3_1_retro_count').val();

                if(tipo_control_3_1_retro.val() == 0 || tipo_control_3_1_retro.val() == null){

                    tipo_control_3_1_retro.css("border-color", "red")
                    tipo_control_3_1_retro_count = 1;
                    $('#tipo_control_3_1_retro_count').val(tipo_control_3_1_retro_count);

                }else if (tipo_control_3_1_retro.val() != 0) {

                    tipo_control_3_1_retro_count = 0;
                    $('#tipo_control_3_1_retro_count').val(tipo_control_3_1_retro_count);

                }
                    /////////////////////////////////////
                var dr_3_1_retro =$('#dr_3_1_retro');
                var dr_3_1_retro_count = $('#dr_3_1_retro_count').val();

                if(dr_3_1_retro.val() == "" || dr_3_1_retro.val() == null){

                    dr_3_1_retro.css("border-color", "red")
                    dr_3_1_retro_count = 1;
                    $('#dr_3_1_retro_count').val(dr_3_1_retro_count);

                }else if (dr_3_1_retro.val() != "" || dr_3_1_retro.val() != null) {

                    dr_3_1_retro_count = 0;
                    $('#dr_3_1_retro_count').val(dr_3_1_retro_count);

                }

                if(action_use == 2 || action == 'store'){
                    /////////////////////////////////////
                    var ventilacion_3_1_retro =$('#ventilacion_3_1_retro');
                    var ventilacion_3_1_retro_count = $('#ventilacion_3_1_retro_count').val();

                    if(ventilacion_3_1_retro.val() == "" || ventilacion_3_1_retro.val() == null){

                        ventilacion_3_1_retro.css("border-color", "red")
                        ventilacion_3_1_retro_count = 1;
                    $('#ventilacion_3_1_retro_count').val(ventilacion_3_1_retro_count);

                    }else if (ventilacion_3_1_retro.val() != "" || ventilacion_3_1_retro.val() != null) {

                        ventilacion_3_1_retro_count = 0;
                    $('#ventilacion_3_1_retro_count').val(ventilacion_3_1_retro_count);

                    }
                    /////////////////////////////////////

                    var filtracion_3_1_retro =$('#filtracion_3_1_retro');
                    var filtracion_3_1_retro_count = $('#filtracion_3_1_retro_count').val();

                    if(filtracion_3_1_retro.val() == "" || filtracion_3_1_retro.val() == null){

                    filtracion_3_1_retro_count.css("border-color", "red")
                    filtracion_3_1_retro_count = 1;
                    $('#filtracion_3_1_retro_count').val(filtracion_3_1_retro_count);

                    }else if (filtracion_3_1_retro.val() != "" || filtracion_3_1_retro.val() != null) {

                        filtracion_3_1_retro_count = 0;
                    $('#filtracion_3_1_retro_count').val(filtracion_3_1_retro_count);

                    }
               }
                    /////////////////////////////////////
                var cheMantenimiento_3_1_retro =$('#cheMantenimiento_3_1_retro');
                var cheMantenimiento_3_1_retro_count = $('#cheMantenimiento_3_1_retro_count').val();

                if(cheMantenimiento_3_1_retro.val() == 0){

                    cheMantenimiento_3_1_retro.css("border-color", "red")
                    cheMantenimiento_3_1_retro_count = 1;
                    $('#cheMantenimiento_3_1_retro_count').val(cheMantenimiento_3_1_retro_count);

                }else if (cheMantenimiento_3_1_retro.val() != 0) {

                    cheMantenimiento_3_1_retro_count = 0;
                    $('#cheMantenimiento_3_1_retro_count').val(cheMantenimiento_3_1_retro_count);

                }
                /////////////////////////////////////
                var costo_recu_3_1_retro =$('#costo_recu_3_1_retro');
                var costo_recu_3_1_retro_count = $('#costo_recu_3_1_retro_count').val();

                if(costo_recu_3_1_retro.val() == 0 || costo_recu_3_1_retro.val() == ""){

                    costo_recu_3_1_retro.css("border-color", "red")
                    costo_recu_3_1_retro_count = 1;

                    $('#costo_recu_3_1_retro_count').val(costo_recu_3_1_retro_count);
                }else if (costo_recu_3_1_retro.val() != 0 || costo_recu_3_1_retro.val() != null) {

                    costo_recu_3_1_retro_count = 0;
                $('#costo_recu_3_1_retro_count').val(costo_recu_3_1_retro_count);

                    }


                    /////////////////////////////////////
                    var maintenance_cost_3_1_retro =$('#maintenance_cost_3_1_retro');
                    var maintenance_cost_3_1_retro_count = $('#maintenance_cost_3_1_retro_count').val();
                    const myArray_maintenance_cost_3_1 = maintenance_cost_3_1_retro.val().split('$');
                    var var_maintenance_cost_3_1_retro =  myArray_maintenance_cost_3_1[1];

                    if(var_maintenance_cost_3_1_retro < 0){

                        maintenance_cost_3_1_retro.css("border-color", "red")
                        maintenance_cost_3_1_retro_count = 1;

                        $('#maintenance_cost_3_1_retro_count').val(maintenance_cost_3_1_retro_count);
                    }else if (var_maintenance_cost_3_1_retro >= 0 || maintenance_cost_3_1_retro.val() != null) {

                        maintenance_cost_3_1_retro_count = 0;
                    $('#maintenance_cost_3_1_retro_count').val(maintenance_cost_3_1_retro_count);

                    }
                    /////////////////////////////////////
                   /*  var const_an_rep_3_1 =$('#const_an_rep_3_1');
                    var const_an_rep_3_1_retro_count = $('#const_an_rep_3_1_retro_count').val();
                    const myArray_const_an_rep_2_1 = const_an_rep_3_1.val().split('$');
                    var var_const_an_rep_2_1 =  myArray_const_an_rep_2_1[1];

                    if(var_const_an_rep_2_1 <= 0 || const_an_rep_3_1.val() == ""){

                        const_an_rep_3_1.css("border-color", "red")
                        const_an_rep_3_1_retro_count = 1;

                        $('#const_an_rep_3_1_retro_count').val(const_an_rep_3_1_retro_count);
                    }else if (const_an_rep_3_1 > 0 || const_an_rep_3_1.val() != null) {

                        const_an_rep_3_1_retro_count = 0;
                    $('#const_an_rep_3_1_retro_count').val(const_an_rep_3_1_retro_count);

                    } */

                var count_inps_3_1 = cheTipo_3_1_retro_count + marca_3_1_retro_count + modelo_3_1_retro_count + yrs_vida_3_1_retro_count + cheStd_3_1_retro_count + capacidad_total_3_1_retro_count + cheDisenio_3_1_retro_count + costo_elec_3_1_retro_count + hrsEnfriado_3_1_retro_count + tipo_control_3_1_retro_count + dr_3_1_retro_count + cheMantenimiento_3_1_retro_count + costo_recu_3_1_retro_count + maintenance_cost_3_1_retro_count+ventilacion_3_1_retro_count+filtracion_3_1_retro_count;

                if(count_inps_3_1>0){
                    trans_sols_valid_ab(idm,'B')
                                return false;
                                }

                }



                formulario = document.getElementById('formulario');
                formulario.submit();

}

function valida_selects_inps(id_input){
   input_select = $('#'+id_input);
   if (input_select.val() != 0 || input_select.val() != null){
    input_select.css('border-color','#1B17BB');
   }else if (input_select.val() == 0 || input_select.val() == null){
    input_select.css("border-color", "red");
   }
}

function valida_form_calc(p_type){

    if(p_type == 1){
        var sol_1_1 = $('#cUnidad_1_1');
        var sol_1_2 = $('#cUnidad_1_2');
        var sol_1_3 = $('#cUnidad_1_3');

        if (sol_1_1.val() != 0){
            $('#calcular_p_n').attr('disabled', false);
            $('#calcular_p_n').css('background-color','#1B17BB');
        }else if (sol_1_1.val() == 0){
            $('#calcular_p_n').attr('disabled', true);
            $('#calcular_p_n').css('background-color','gray');
        }
    }

    if(p_type == 2){
        var sol_1_1 = $('#cUnidad_1_1_retro');

        if (sol_1_1.val() != 0){
            $('#calcular_p_r').attr('disabled', false);
            $('#calcular_p_r').css('background-color','#1B17BB');
        }else if (sol_1_1.val() == 0){
            $('#calcular_p_r').attr('disabled', true);
            $('#calcular_p_r').css('background-color','gray');
        }
    }
}


function traer_unidad_hvac(id_project,num_sol,num_enf,cUnidad,csTipo,csDisenio,tipo_control,dr
    ,Mantenimiento,lblCsTipo,capacidad_total,costo_elec,csStd_cant
    ,cheValorS,num_solu,action_submit,csStd,maintenance_cost,marca,modelo,ventilacion,filtracion) {
    $.ajax({
        type: 'get',
        url: "/traer_unidad_hvac/" + id_project + "/" + num_sol + "/" +num_enf,
        success: function (res) {
            if (res){

                let dollarUSLocale = Intl.NumberFormat('en-US');
                $("#"+capacidad_total).val(dollarUSLocale.format(res.val_unidad.capacidad_tot));
                $("#"+costo_elec).val('$'+dollarUSLocale.format(res.val_unidad.costo_elec));
                $("#"+csStd_cant).val(dollarUSLocale.format(res.val_unidad.eficencia_ene_cant));
                $("#"+cheValorS).val('$'+dollarUSLocale.format(res.val_unidad.val_aprox));
                $("#"+maintenance_cost).val('$'+dollarUSLocale.format(res.val_unidad.costo_mantenimiento));
                $("#"+cUnidad).find('option[value="' + res.val_unidad.unidad_hvac + '"]').attr("selected", "selected");
                unidadHvac(res.val_unidad.unidad_hvac,1,csTipo,csDisenio);
                $("#"+csTipo).find('option[value="' + res.val_unidad.tipo_equipo + '"]').attr("selected", "selected");
                change_diseño(res.val_unidad.tipo_equipo,1,csDisenio,tipo_control,dr,ventilacion,filtracion,lblCsTipo);
                $("#"+csDisenio).find('option[value="' + res.val_unidad.tipo_diseño + '"]').attr("selected", "selected");
                $("#"+tipo_control).find('option[value="' + res.val_unidad.tipo_control + '"]').attr("selected", "selected");
                $("#"+dr).find('option[value="' + res.val_unidad.dr + '"]').attr("selected", "selected");
                $("#"+ventilacion).find('option[value="' + res.val_unidad.ventilacion + '"]').attr("selected", "selected");
                $("#"+filtracion).find('option[value="' + res.val_unidad.filtracion + '"]').attr("selected", "selected");

                $("#"+Mantenimiento).find('option[value="' +   res.val_unidad.mantenimiento + '"]').attr("selected", "selected");
                send_marcas_to(marca,res.val_unidad.id_marca,res.val_unidad.unidad_hvac);
                send_modelo_edit(res.val_unidad.id_marca,modelo,res.val_unidad.id_modelo);
                send_name(csDisenio);
                send_name_t_c(tipo_control);
                send_name_dr(dr);
                send_name_vent(ventilacion);
                send_name_filt(filtracion);
                check_chiller(res.val_unidad.unidad_hvac,csStd,res.val_unidad.type_p);
                $("#"+csStd).find('option[value="'+ res.val_unidad.eficencia_ene +'"]').attr("selected", "selected");
               /*  set_ser_to_sers(res.val_unidad.eficencia_ene); */

                if(num_solu != '' || num_solu != null){
                    $("#"+action_submit).val('update');
                    $( "#"+num_solu ).removeClass( "hidden" );
                    if(num_solu == 'sol_1_2' || num_solu == 'sol_2_2' || num_solu == 'sol_3_2'){
                        if(num_solu == 'sol_1_2'){
                            $('#base_border_bottom').css('border-bottom', '2px solid');
                            $('#base_border_bottom').css('border-bottom-right-radius', '2px');
                            $('#base_border_bottom').css('border-bottom-left-radius', '2px');
                        }else if(num_solu == 'sol_2_2'){
                            $('#2_border_bottom').css('border-bottom', '2px solid');
                            $('#2_border_bottom').css("border-color","#3182ce");
                            $('#2_border_bottom').css('border-bottom-right-radius', '2px');
                            $('#2_border_bottom').css('border-bottom-left-radius', '2px');
                        }else if(num_solu == 'sol_3_2'){
                            $('#3_border_bottom').css('border-bottom', '2px solid');
                            $('#3_border_bottom').css("border-color","#3182ce");
                            $('#3_border_bottom').css('border-bottom-right-radius', '2px');
                            $('#3_border_bottom').css('border-bottom-left-radius', '2px');
                        }
                    }
                    if (cont_sol !== '' || cont_sol !== null){
                        var cont_val = parseInt($('#'+cont_sol).val());
                        var sum_cont = cont_val + 1;
                        $('#'+cont_sol).val(sum_cont);
                    }
                    /*  $cont_sol =
                    parseInt($('#cont_sol_3').val()); */
                }


            }else{

            }
            /* $('#cat_ed').append($('<option>', {
                value: 0,
                text: 'Seleccionar'
            }));

            response.map((cat_ed, i) => {
                $('#cat_ed').append($('<option>', {
                    value: cat_ed.id,
                    text: cat_ed.name
                }));
            }); */

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function traer_unidad_hvac_edit(id_project,num_sol,num_enf,cUnidad,csTipo,csDisenio,tipo_control,dr
    ,ventilacion,filtracion,Mantenimiento,lblCsTipo,capacidad_total,costo_elec,csStd_cant
    ,costo_recu,csStd,maintenance_cost,marca,modelo,yrs_vida,const_an_rep,action_submit) {
    $.ajax({
        type: 'get',
        url: "/traer_unidad_hvac/" + id_project + "/" + num_sol + "/" +num_enf,
        success: function (res) {
            if (res){

                let dollarUSLocale = Intl.NumberFormat('en-US');
                $("#"+capacidad_total).val(dollarUSLocale.format(res.val_unidad.capacidad_tot));
                $("#"+costo_elec).val('$'+dollarUSLocale.format(res.val_unidad.costo_elec));
                $("#"+csStd_cant).val(dollarUSLocale.format(res.val_unidad.eficencia_ene_cant));
                $("#"+costo_recu).val('$'+dollarUSLocale.format(res.val_unidad.val_aprox));
                $("#"+yrs_vida).val(res.val_unidad.yrs_vida);
                $("#"+const_an_rep).val('$'+dollarUSLocale.format(res.val_unidad.cost_an_re));
                $("#"+maintenance_cost).val('$'+dollarUSLocale.format(res.val_unidad.costo_mantenimiento));

                $("#"+cUnidad).empty();
                $("#"+cUnidad).append($('<option>', {
                    value: 0,
                    text: 'Seleccionar'
                }));
                $("#"+cUnidad).append($('<option>', {
                    value: 1,
                    text: 'Paquetes (RTU)'
                }));
                $("#"+cUnidad).append($('<option>', {
                    value: 2,
                    text: 'Split DX'
                }));
                $("#"+cUnidad).append($('<option>', {
                    value: 3,
                    text: 'VRF No Ductados'
                }));
                $("#"+cUnidad).append($('<option>', {
                    value: 4,
                    text: 'VRF Ductados'
                }));
                $("#"+cUnidad).append($('<option>', {
                    value: 5,
                    text: 'PTAC/VTAC'
                }));
                $("#"+cUnidad).append($('<option>', {
                    value: 6,
                    text: 'WSHP'
                }));
                $("#"+cUnidad).append($('<option>', {
                    value: 7,
                    text: 'Minisplit Inverter'
                }));
/*                 $("#"+cUnidad).append($('<option>', {
                    value: 8,
                    text: 'Chiller - Aire - Scroll Constante'
                }));
                $("#"+cUnidad).append($('<option>', {
                    value: 9,
                    text: 'Chiller - Aire - Scroll Variable'
                }));
                $("#"+cUnidad).append($('<option>', {
                    value: 10,
                    text: 'Chiller - Aire - Tornillo 4 Etapas'
                })); */
                $("#"+cUnidad).find('option[value="' + res.val_unidad.unidad_hvac + '"]').attr("selected", "selected");
                /*
                <option value="1">Paquetes (RTU)</option>
                                    <option value="2">Split DX</option>
                                    <option value="3">VRF No Ductados</option>
                                    <option value="4">VRF Ductados</option>
                                    <option value="5">PTAC/VTAC</option>
                                    <option value="6">WSHP</option>
                                    <option value="7">Minisplit Inverter</option>
                                    <option value="8">Chiller - Aire - Scroll Constante</option>
                                    <option value="9">Chiller - Aire - Scroll Variable</option>
                                    <option value="10">Chiller - Aire - Tornillo 4 Etapas</option>
                */
                unidadHvac(res.val_unidad.unidad_hvac,1,csTipo,csDisenio);
                $("#"+csTipo).find('option[value="' + res.val_unidad.tipo_equipo + '"]').attr("selected", "selected");
                change_diseño(res.val_unidad.tipo_equipo,1,csDisenio,tipo_control,dr,ventilacion,filtracion,lblCsTipo);
                $("#"+csDisenio).find('option[value="' + res.val_unidad.tipo_diseño + '"]').attr("selected", "selected");
                $("#"+tipo_control).find('option[value="' + res.val_unidad.tipo_control + '"]').attr("selected", "selected");
                $("#"+dr).find('option[value="' + res.val_unidad.dr + '"]').attr("selected", "selected");
                $("#"+ventilacion).find('option[value="' + res.val_unidad.ventilacion + '"]').attr("selected", "selected");
                $("#"+filtracion).find('option[value="' + res.val_unidad.filtracion + '"]').attr("selected", "selected");
                $("#"+Mantenimiento).find('option[value="' +   res.val_unidad.mantenimiento + '"]').attr("selected", "selected");

                send_marcas_to(marca,res.val_unidad.id_marca,res.val_unidad.unidad_hvac);
                send_modelo_edit(res.val_unidad.id_marca,modelo,res.val_unidad.id_modelo);
                send_name(csDisenio);
                send_name_t_c(tipo_control);
                send_name_dr(dr);
                send_name_filt(filtracion);
                send_name_vent(ventilacion);
                check_chiller(res.val_unidad.unidad_hvac,csStd,res.val_unidad.type_p);
                /* $('#'+csStd).empty();
                $('#'+csStd).append($('<option>', {
                    value: 'SEER',
                    text: 'SEER'
                }));
                $('#'+csStd).append($('<option>', {
                    value: 'SEER2',
                    text: 'SEER2'
                }));

                $('#'+csStd).append($('<option>', {
                    value: 'IEER',
                    text: 'IEER'
                })); */
                $("#"+csStd).find('option[value="' + res.val_unidad.eficencia_ene + '"]').attr("selected", "selected");
                $("#"+action_submit).val('update');
                /* if (cont_sol !== '' || cont_sol !== null){
                    var cont_val = parseInt($('#'+cont_sol).val());
                    var sum_cont = cont_val + 1;
                    $('#'+cont_sol).val(sum_cont);
                } */


            }else{

            }
            /* $('#cat_ed').append($('<option>', {
                value: 0,
                text: 'Seleccionar'
            }));

            response.map((cat_ed, i) => {
                $('#cat_ed').append($('<option>', {
                    value: cat_ed.id,
                    text: cat_ed.name
                }));
            }); */

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function inactive_display_edit(value,id_project,num_enf,num_sol){
    var cont_sol_1 =  parseInt($('#cont_sol_1').val());
    var cont_sol_2 =  parseInt($('#cont_sol_2').val());
    var cont_sol_3 =  parseInt($('#cont_sol_3').val());

    var set_sol_1 =  parseInt($('#set_sol_1').val());


     if (value == 'sol_1') {
         if(cont_sol_1 == 2){

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

$('#base_border_bottom').css('border-bottom', 'none');
                $.ajax({
                    type: 'get',
                    url: '/inactive_tarject/'+ id_project +'/'+ num_enf + '/' +num_sol,
                    success: function (response) {
                    console.log(response.solution_del);


                    },
                    error: function (responsetext) {

                    }
                });



          }else if(cont_sol_1 == 3){

              set_sol_1 =  set_sol_1 - 1;
              cont_sol_1 =  cont_sol_1 - 1;
              $('#set_sol_1').val(set_sol_1);
              $('#cont_sol_1').val(cont_sol_1);
              $( "#sol_1_2" ).removeClass( "hidden" );
              $( "#sol_1_3" ).addClass( "hidden" );
              var select_1_3 = $('#cUnidad_1_3');
              select_1_3.val($('option:first', select_1_3).val());

               $.ajax({
                    type: 'get',
                    url: '/inactive_tarject/'+ id_project +'/'+ num_enf + '/' +num_sol,
                    success: function (response) {
                    console.log(response.solution_del);


                    },
                    error: function (responsetext) {

                    }
                });

          }
     }


     if (value == 'sol_2') {

         if(cont_sol_2 == 2){
             $( "#sol_2_2" ).addClass( "hidden" );
             var select_2_2 = $('#cUnidad_2_2');
             select_2_2.val($('option:first', select_2_2).val());

             $( "#sol_2_3" ).addClass( "hidden" );
             var select_2_3 = $('#cUnidad_2_3');
             select_2_3.val($('option:first', select_2_3).val());

             cont_sol_2 =  cont_sol_2 - 1;
             $('#cont_sol_2').val(cont_sol_2);
 $('#2_border_bottom').css('border-bottom', 'none');
             $.ajax({
                type: 'get',
                url: '/inactive_tarject/'+ id_project +'/'+ num_enf + '/' +num_sol,
                success: function (response) {
                console.log(response.solution_del);


                },
                error: function (responsetext) {

                }
            });

         }else if(cont_sol_2 == 3){

            cont_sol_2 =  cont_sol_2 - 1;
             $('#cont_sol_2').val(cont_sol_2);
             $( "#sol_2_2" ).removeClass( "hidden" );
             var select_2_3 = $('#cUnidad_2_3');
             select_2_3.val($('option:first', select_2_3).val());
             $( "#sol_2_3" ).addClass( "hidden" );

             $.ajax({
                type: 'get',
                url: '/inactive_tarject/'+ id_project +'/'+ num_enf + '/' +num_sol,
                success: function (response) {
                console.log(response.solution_del);


                },
                error: function (responsetext) {

                }
            });
         }
     }

     if (value == 'sol_3') {

         if(cont_sol_3 == 2){
              $( "#sol_3_2" ).addClass( "hidden" );
              var select_3_2 = $('#cUnidad_3_2');
              select_3_2.val($('option:first', select_3_2).val());

              $( "#sol_3_3" ).addClass( "hidden" );
              var select_3_3 = $('#cUnidad_3_3');
              select_3_3.val($('option:first', select_3_3).val());

              cont_sol_3 =  cont_sol_3 - 1;
              $('#cont_sol_3').val(cont_sol_3);
              $('#3_border_bottom').css('border-bottom', 'none');
              $.ajax({
                type: 'get',
                url: '/inactive_tarject/'+ id_project +'/'+ num_enf + '/' +num_sol,
                success: function (response) {
                console.log(response.solution_del);


                },
                error: function (responsetext) {

                }
            });
          }else if(cont_sol_3 == 3){

             cont_sol_3 =  cont_sol_3 - 1;
              $('#cont_sol_3').val(cont_sol_3);
              $( "#sol_3_2" ).removeClass( "hidden" );
              $( "#sol_3_3" ).addClass( "hidden" );
              var select_3_3 = $('#cUnidad_3_3');
              select_3_3.val($('option:first', select_3_3).val());

              $.ajax({
                type: 'get',
                url: '/inactive_tarject/'+ id_project +'/'+ num_enf + '/' +num_sol,
                success: function (response) {
                console.log(response.solution_del);


                },
                error: function (responsetext) {

                }
            });
          }
     }

 }

 function active_display_Edit(value){
    var cont_sol_1 =  parseInt($('#cont_sol_1').val());
    var cont_sol_2 =  parseInt($('#cont_sol_2').val());
    var cont_sol_3 =  parseInt($('#cont_sol_3').val());

    var set_sol_1 =  parseInt($('#set_sol_1').val());

     if (value == 'sol_1') {

        if(cont_sol_1 == 1){
             $("#sol_1_2").removeClass( "hidden" );
             $("#sol_1_3").addClass( "hidden" );
             $("#action_submit_1_2").val('store');
             var consto_elect_project = $("#costo_elec").val();
             $("#costo_elec_1_2").val(consto_elect_project);
            /*  $("#sol_1_3").val(''); */
            //validando_eliminacion mandar store a vallidar_submit
             cont_sol_1 =  cont_sol_1 + 1;
             set_sol_1 =  set_sol_1 + 1;
             $('#set_sol_1').val(set_sol_1);
             $('#cont_sol_1').val(cont_sol_1);
             $('#base_border_bottom').css('border-bottom', '2px solid');
             $('#base_border_bottom').css('border-bottom-right-radius', '2px');
             $('#base_border_bottom').css('border-bottom-left-radius', '2px');
         }/* else if(cont_sol_1 == 2){
             set_sol_1 =  set_sol_1 + 1;
             cont_sol_1 =  cont_sol_1 + 1;
             $('#set_sol_1').val(set_sol_1);
             $('#cont_sol_1').val(cont_sol_1);
             $( "#sol_1_2" ).removeClass( "hidden" );
             $( "#sol_1_3" ).removeClass( "hidden" );
             var consto_elect_project = $("#costo_elec").val();
             $("#costo_elec_1_2").val(consto_elect_project);
             $("#costo_elec_1_3").val(consto_elect_project);
             $("#action_submit_1_3").val('store');

         } */


     }else if(value == 'sol_2') {
         if (cont_sol_2 == 0 ){

            let valor_unidad_hvac =  $("#cUnidad_2_1").val();

              if(valor_unidad_hvac === '0' || valor_unidad_hvac === ''){

                  return false;
              }

              if(valor_unidad_hvac !== '0' && valor_unidad_hvac !== ''){
                  cont_sol_2 = 1;
              }

          }

         if(cont_sol_2 == 1){
             $( "#sol_2_2" ).removeClass( "hidden" );
             $( "#sol_2_3" ).addClass( "hidden" );

             $("#action_submit_2_2").val('store');
             var consto_elect_project = $("#costo_elec").val();
             $("#costo_elec_2_2").val(consto_elect_project);

             cont_sol_2 =  cont_sol_2 + 1;
             $('#cont_sol_2').val(cont_sol_2);
             $('#2_border_bottom').css('border-bottom', '2px solid');
             $('#2_border_bottom').css("border-color","#3182ce");
             $('#2_border_bottom').css('border-bottom-right-radius', '2px');
             $('#2_border_bottom').css('border-bottom-left-radius', '2px');
         }/* else if(cont_sol_2 == 2){
             cont_sol_2 =  cont_sol_2 + 1;
             $('#cont_sol_2').val(cont_sol_2);
             $( "#sol_2_2" ).removeClass( "hidden" );
             $( "#sol_2_3" ).removeClass( "hidden" );

             $("#action_submit_2_3").val('store');
             var consto_elect_project = $("#costo_elec").val();
             $("#costo_elec_2_3").val(consto_elect_project);
         } */

     }else if(value == 'sol_3') {

        if (cont_sol_3 == 0 ){

            let valor_unidad_hvac =  $("#cUnidad_3_1").val();

              if(valor_unidad_hvac === '0' || valor_unidad_hvac === ''){

                  return false;
              }

              if(valor_unidad_hvac !== '0' && valor_unidad_hvac !== ''){
                cont_sol_3 = 1;
              }

          }

         if(cont_sol_3 == 1){
             $( "#sol_3_2" ).removeClass( "hidden" );
             $( "#sol_3_3" ).addClass( "hidden" );

             $("#action_submit_3_2").val('store');
             var consto_elect_project = $("#costo_elec").val();
             $("#costo_elec_3_2").val(consto_elect_project);

             cont_sol_3 =  cont_sol_3 + 1;
             $('#cont_sol_3').val(cont_sol_3);
             $('#3_border_bottom').css('border-bottom', '2px solid');
             $('#3_border_bottom').css("border-color","#3182ce");
             $('#3_border_bottom').css('border-bottom-right-radius', '2px');
             $('#3_border_bottom').css('border-bottom-left-radius', '2px');
         }/* else if(cont_sol_3 == 2){
             cont_sol_3 =  cont_sol_3 + 1;
             $('#cont_sol_3').val(cont_sol_3);
             $( "#sol_3_2" ).removeClass( "hidden" );
             $( "#sol_3_3" ).removeClass( "hidden" );

             $("#action_submit_3_3").val('store');
             var consto_elect_project = $("#costo_elec").val();
             $("#costo_elec_3_3").val(consto_elect_project);
         } */

     }
 }

 function inactive_display_sol_edit(value,id_project,num_enf,num_sol,name_disp){
    Swal.fire({
        icon: 'info',
        title: 'Seleccione acción',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Limpiar Tarjeta',
        denyButtonText: `Eliminar Solucion `+name_disp,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            if (value == 'sol_2_1') {
                $("#cheTipo_2_1").find('option[value="0"]').attr("selected", "selected");
                $("#cheDisenio_2_1").find('option[value=""]').attr("selected", "selected");
                $("#tipo_control_2_1").find('option[value="0"]').attr("selected", "selected");
                $("#dr_2_1").find('option[value=""]').attr("selected", "selected");
                $("#csMantenimiento_2_1").find('option[value="0"]').attr("selected", "selected");
                $("#capacidad_total_2_1").val('');
                $("#csStd_cant_2_2").val('');
                $("#cheValorS_2_1").val('');
            }

            if (value == 'sol_2_1_retro') {
                $("#cheTipo_2_1_retro").find('option[value="0"]').attr("selected", "selected");
                $("#cheDisenio_2_1_retro").find('option[value=""]').attr("selected", "selected");
                $("#tipo_control_2_1_retro").find('option[value="0"]').attr("selected", "selected");
                $("#dr_2_1_retro").find('option[value=""]').attr("selected", "selected");
                $("#csMantenimiento_2_1_retro").find('option[value="0"]').attr("selected", "selected");
                $("#capacidad_total_2_1_retro").val('');
                $("#csStd_cant_2_2_retro").val('');
                $("#cheValorS_2_2_retro").val('');
                $("#modelo_2_1_retro").find('option[value=""]').attr("selected", "selected");
                $("#marca_2_1_retro").find('option[value=""]').attr("selected", "selected");
                $("#costo_recu_2_1_retro").val('');
                $("#yrs_vida_2_1_retro").val('');
                $("#maintenance_cost_2_1_retro").val('');


            }

            if (value == 'sol_3_1') {
                $("#cheTipo_3_1").find('option[value="0"]').attr("selected", "selected");
                $("#cheDisenio_3_1").find('option[value=""]').attr("selected", "selected");
                $("#tipo_control_3_1").find('option[value="0"]').attr("selected", "selected");
                $("#dr_3_1").find('option[value=""]').attr("selected", "selected");
                $("#cheMantenimiento_3_1").find('option[value="0"]').attr("selected", "selected");
                $("#capacidad_total_3_1").val('');
                $("#cheStd_3_1").val('');
                $("#cheValorS_3_1").val('');
            }

            if (value == 'sol_3_1_retro') {
                $("#cheTipo_3_1_retro").find('option[value="0"]').attr("selected", "selected");
                $("#cheDisenio_3_1_retro").find('option[value=""]').attr("selected", "selected");
                $("#tipo_control_3_1_retro").find('option[value="0"]').attr("selected", "selected");
                $("#dr_3_1_retro").find('option[value=""]').attr("selected", "selected");
                $("#cheMantenimiento_3_1_retro").find('option[value="0"]').attr("selected", "selected");
                $("#capacidad_total_3_1_retro").val('');
                $("#cheStd_3_1_retro").val('');
                $("#cheValorS_3_1_retro").val('');
                $("#modelo_3_1_retro").find('option[value=""]').attr("selected", "selected");
                $("#marca_3_1_retro").find('option[value=""]').attr("selected", "selected");
                $("#costo_recu_3_1_retro").val('');
                $("#yrs_vida_3_1_retro").val('');
                $("#maintenance_cost_3_1_retro").val('');
            }
        } else if (result.isDenied) {

            if (value == 'sol_2_1') {
                $("#cUnidad_2_1").find('option[value="0"]').attr("selected", "selected");
                $("#cheTipo_2_1").find('option[value="0"]').attr("selected", "selected");
                $("#cheDisenio_2_1").find('option[value=""]').attr("selected", "selected");
                $("#tipo_control_2_1").find('option[value="0"]').attr("selected", "selected");
                $("#dr_2_1").find('option[value=""]').attr("selected", "selected");
                $("#csMantenimiento_2_1").find('option[value="0"]').attr("selected", "selected");
                $("#capacidad_total_2_1").val('');
                $("#csStd_cant_2_2").val('');
                $("#cheValorS_2_1").val('');

                $.ajax({
                    type: 'get',
                    url: '/del_solution/'+ id_project +'/'+ num_enf + '/' +num_sol,
                    success: function (response) {
                    $("#action_submit_2_1").val('store');
                    ////sol b disp 1

                    ////sol b disp 2
                    $( "#sol_2_2" ).addClass( "hidden" );
                    $("#cUnidad_2_2").find('option[value="0"]').attr("selected", "selected");
                    ////sol b disp 3
                    $( "#sol_2_3" ).addClass( "hidden" );
                    $("#cUnidad_2_3").find('option[value="0"]').attr("selected", "selected");
                    $("#cont_sol_2").val(0);
                    },
                    error: function (responsetext) {

                    }
                });

            }

            if (value == 'sol_2_1_retro') {
                $("#cUnidad_2_1_retro").find('option[value="0"]').attr("selected", "selected");
                $("#cheTipo_2_1_retro").find('option[value="0"]').attr("selected", "selected");
                $("#cheDisenio_2_1_retro").find('option[value=""]').attr("selected", "selected");
                $("#tipo_control_2_1_retro").find('option[value="0"]').attr("selected", "selected");
                $("#dr_2_1_retro").find('option[value=""]').attr("selected", "selected");
                $("#csMantenimiento_2_1_retro").find('option[value="0"]').attr("selected", "selected");
                $("#capacidad_total_2_1_retro").val('');
                $("#csStd_cant_2_2_retro").val('');
                $("#cheValorS_2_2_retro").val('');

                $.ajax({
                    type: 'get',
                    url: '/del_solution/'+ id_project +'/'+ num_enf + '/' +num_sol,
                    success: function (response) {
                    $("#action_submit_2_1_retro").val('store');
                    ////sol b disp 1

                    ////sol b disp 2
                    $( "#sol_2_2_retro" ).addClass( "hidden" );
                    $("#cUnidad_2_2_retro").find('option[value="0"]').attr("selected", "selected");
                    ////sol b disp 3
                    $( "#sol_2_3_retro" ).addClass( "hidden" );
                    $("#cUnidad_2_3_retro").find('option[value="0"]').attr("selected", "selected");
                    $("#cont_sol_2_retro").val(0);
                    },
                    error: function (responsetext) {

                    }
                });

            }

            if (value == 'sol_3_1') {
                $("#cUnidad_3_1").find('option[value="0"]').attr("selected", "selected");
                $("#cheTipo_3_1").find('option[value="0"]').attr("selected", "selected");
                $("#cheDisenio_3_1").find('option[value=""]').attr("selected", "selected");
                $("#tipo_control_3_1").find('option[value="0"]').attr("selected", "selected");
                $("#dr_3_1").find('option[value=""]').attr("selected", "selected");
                $("#cheMantenimiento_3_1").find('option[value="0"]').attr("selected", "selected");
                $("#capacidad_total_3_1").val('');
                $("#cheStd_3_1").val('');
                $("#cheValorS_3_1").val('');

                $.ajax({
                    type: 'get',
                    url: '/del_solution/'+ id_project +'/'+ num_enf + '/' +num_sol,
                    success: function (response) {

                    $("#action_submit_3_1").val('store');

                    ////sol b disp 1

                    ////sol b disp 2
                    $( "#sol_3_2" ).addClass( "hidden" );
                    $("#cUnidad_3_2").find('option[value="0"]').attr("selected", "selected");
                    ////sol b disp 3
                    $( "#sol_3_3" ).addClass( "hidden" );
                    $("#cUnidad_3_3").find('option[value="0"]').attr("selected", "selected");
                    $("#cont_sol_3").val(0);


                    },
                    error: function (responsetext) {

                    }
                });
            }

            if (value == 'sol_3_1_retro') {
                $("#cUnidad_3_1_retro").find('option[value="0"]').attr("selected", "selected");
                $("#cheTipo_3_1_retro").find('option[value="0"]').attr("selected", "selected");
                $("#cheDisenio_3_1_retro").find('option[value=""]').attr("selected", "selected");
                $("#tipo_control_3_1_retro").find('option[value="0"]').attr("selected", "selected");
                $("#dr_3_1_retro").find('option[value=""]').attr("selected", "selected");
                $("#cheMantenimiento_3_1_retro").find('option[value="0"]').attr("selected", "selected");
                $("#capacidad_total_3_1_retro").val('');
                $("#cheStd_3_1_retro").val('');
                $("#cheValorS_3_1_retro").val('');

                $.ajax({
                    type: 'get',
                    url: '/del_solution/'+ id_project +'/'+ num_enf + '/' +num_sol,
                    success: function (response) {

                    $("#action_submit_3_1_retro").val('store');

                    ////sol b disp 1

                    ////sol b disp 2
                    $( "#sol_3_2_retro" ).addClass( "hidden" );
                    $("#cUnidad_3_2_retro").find('option[value="0"]').attr("selected", "selected");
                    ////sol b disp 3
                    $( "#sol_3_3_retro" ).addClass( "hidden" );
                    $("#cUnidad_3_3_retro").find('option[value="0"]').attr("selected", "selected");
                    $("#cont_sol_3_retro").val(0);


                    },
                    error: function (responsetext) {

                    }
                });
            }
        }
      })


 }

 function elimiinar_project(id, aux) {
    Swal.fire({
        title: '¿Eliminar Projecto?',
        text: "Se eliminara el projecto",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: 'orange',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            // var route = ruta_global + "/" + aux + "/" + id + "";
            var token = $("#_token").val();
            $.ajax({
                url: "/" + aux + "/" + id + "",
                headers: { 'X-CSRF-TOKEN': token },
                type: 'get',
                dataType: 'json',
                success: function () {
                    Swal.fire(
                        'Eliminado!',
                        'El registro se ha eliminado.',
                        'success'
                    )
                }
            });

            setTimeout(function () { location.reload() }, 1000);

            //location.reload();
        }
    })
}

function hrs_enfs_inps(value){
    let dollarUSLocale = Intl.NumberFormat('en-US');
    var num = parseFloat(value);


       var num_aux = dollarUSLocale.format(num);
       var num_format_split = num_aux.split(',');
       /* inpt.val(num_aux); */

       $('#hrsEnfriado_1_2').val(num_aux);
       $('#hrsEnfriado_1_3').val(num_aux);

       $('#hrsEnfriado_2_1').val(num_aux);
       $('#hrsEnfriado_2_2').val(num_aux);
       //$('#hrsEnfriado_2_3').val(num_aux);

       $('#hrsEnfriado_3_1').val(num_aux);
       $('#hrsEnfriado_3_2').val(num_aux);
}

function hrs_enfs_inps_retro(value){
    let dollarUSLocale = Intl.NumberFormat('en-US');
    var num = parseFloat(value);


       var num_aux = dollarUSLocale.format(num);
       var num_format_split = num_aux.split(',');
       /* inpt.val(num_aux); */

       $('#hrsEnfriado_2_1_retro').val(num_aux);
       $('#hrsEnfriado_3_1_retro').val(num_aux);
}

function mostrar_modal_energia_hvac(id){
    $("#"+id).removeClass("hidden");
}


function mostrar_modal(id){
    $("#"+id).removeClass("hidden");
}


function ocultar_modal(id){
    $("#"+id).addClass("hidden");
}

function mostrar_modal_marcas_modelos(id){

     $("#"+id).removeClass("hidden");
 }

 /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
/* function send_marcas_to_datalist() {

    $.ajax({
        type: 'get',
        url: '/send_marcas',
        success: function (response) {

            response.map((marca, i) => {
                $('#browsers').append($('<option>', {
                    value: marca.marca,
                }));
            });

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
  } */

 function send_modelos_to_datalist(value,id,equipo,modelo){

    $.ajax({
        type: 'get',
        url: '/send_modelos_datalist/'+value+'/'+equipo,
        success: function (response) {

            $('#'+id).empty();
            $('#'+modelo).val('');
            response.map((modelo, i) => {
                $('#'+id).append($('<option>', {
                    value: modelo.modelo,
                }));
            });
            console.log(response);


        },
        error: function (responsetext) {

        }
    });
  }

  function mostrar_type_p(check_types_pn,check_types_pr){
    var type_p_pn = check_types_pn;
    var type_p_pr = check_types_pr;
    var p_n_div = $("#display_nuevo_project");
    var p_r_div = $("#display_nuevo_retrofit");
    var type_value = $("#type_p");

        if(type_p_pn == 0 && type_p_pr == 0){
            return false;
        }

        if(type_p_pn == 1 && type_p_pr == 0){
            p_n_div.removeClass( "hidden" );
            p_r_div.addClass( "hidden" );
            $("#type_p").val(1);
        }

        if(type_p_pn == 0 && type_p_pr == 1){
            p_n_div.addClass( "hidden" );
            p_r_div.removeClass( "hidden" );
            $("#type_p").val(2);
        }

        if(type_p_pn == 1 && type_p_pr == 1){
            p_n_div.removeClass( "hidden" );
            p_r_div.addClass( "hidden" );
            $("#type_p").val(1);        }



    }

    function check_inp_count(count_id,id){
       var inp = $("#"+id).val();
       var inp_cont = $("#"+count_id);
       var suma_inps = 0;


       if(inp == "" || inp == 0){
            if(id == 'paises'){
                $('#count_ciudad').val(0);
            }
        inp_cont.val(0);
       }

       if(inp != "" && inp != 0){
            inp_cont.val(1);
       }

       checksuma();

    }

    function checksuma(){
        count_name_pro = $('#count_name_pro').val();
        count_paises = $('#count_paises').val();
        count_ciudad = $('#count_ciudad').val();
        count_cat_ed = $('#count_cat_ed').val();
        count_tipo_edificio = $('#count_tipo_edificio').val();
        count_ar_project = $('#count_ar_project').val();
        count_unidad = $('#count_unidad').val();
        count_tiempo_porcent = $('#count_tiempo_porcent').val();
        count_porcent_hvac = $('#count_porcent_hvac').val();

       suma_inps = parseInt(count_name_pro) + parseInt(count_paises) + parseInt(count_ciudad) + parseInt(count_cat_ed) + parseInt(count_tipo_edificio)
       + parseInt(count_ar_project) + parseInt(count_unidad) + parseInt(count_tiempo_porcent) + parseInt(count_porcent_hvac);

       if(suma_inps == 9){
        $('#div_next').addClass("hidden");
        $('#div_next_h').removeClass("hidden");
       }

       if(suma_inps < 9){
        $('#div_next').removeClass("hidden");
        $('#div_next_h').addClass("hidden");
       }

    }

    function verifica_solution(num_disp,num_sol,action_submit,num_project,type){

        $.ajax({
            type: 'get',
            url: '/verifica_solucion/'+ num_disp + '/' + num_sol + '/' + num_project + '/' + type,
            success: function (response) {
               if(response == 1){
                $("#"+action_submit).val('update');
               }

               if(response == 2){
                $("#"+action_submit).val('store');
               }

            },
            error: function (responsetext) {
                console.log(responsetext);
            }
        });

    }

/*    function send_seer_base(value){
        send_seers_all('csStd','');
    }
 */
    function set_ser_to_sers(value){

        if(value == 'SEER'){
            var efi = 'SEER';
        }

        if(value == 'SEER2'){
            var efi = 'SEER2';
        }

        if(value == 'IEER'){
            var efi = 'IEER';
        }

        /* if(value == 'IPVL'){
            var efi = 'IPVL';
        }

        if(value == 'EER'){
            var efi = 'IPVL';
        } */

        if(value === ''){
            $('#csStd_1_2').val('');
            $('#csStd_1_3').val('');

            //$("#csStd_2_1").find('option[value=""]').attr("selected", "selected");
            $('#csStd_2_1').val('');
            $('#csStd_2_2').val('');
            $('#csStd_2_3').val('');


            $('#csStd2_3_1').val('');
            $('#csStd_3_2').val('');
            $('#csStd_3_3').val('');
            //retrofit
            $('#csStd_1_1_retro').val('');
            $('#csStd_1_2_retro').val('');

            $('#csStd_2_1_retro').val('');
            $('#csStd_2_2_retro').val('');

            $('#csStd_3_1_retro').val('');
            $('#csStd_3_2_retro').val('');
        }

        if(value !== ''){


            send_seers_all('csStd','')
            send_seers_all('csStd_1_2',value)
            send_seers_all('csStd_1_3',value)

            send_seers_all('csStd_2_1',value)
            send_seers_all('csStd_2_2',value)
            send_seers_all('csStd_2_3',value)

            ///$("#csStd_2_1").find('option[value="'+value+'"]').attr("selected", "selected");
            send_seers_all('csStd2_3_1',value)
            send_seers_all('csStd_3_2',value)
            send_seers_all('csStd_3_3',value)


             //retrofit
             send_seers_all('csStd_1_1_retro',value)
             send_seers_all('csStd_2_1_retro',value)
             send_seers_all('csStd_3_1_retro',value)
             /* $('#csStd_1_1_retro').val(efi);
             $('#csStd_1_2_retro').val(efi);

             $('#csStd_2_1_retro').val(efi);
             $('#csStd_2_2_retro').val(efi);

             $('#csStd_3_1_retro').val(efi);
             $('#csStd_3_2_retro').val(efi); */
        }


     }

     function send_seers_all(id_select,value){
        $('#'+id_select).empty();
            $('#'+id_select).append($('<option>', {
                value: 'SEER',
                text: 'SEER'
            }));

            $('#'+id_select).append($('<option>', {
                value: 'SEER2',
                text: 'SEER2'
            }));

            $('#'+id_select).append($('<option>', {
                value: 'IEER',
                text: 'IEER'
            }));

            if(value == 'SEER' || value == 'SEER2' || value == 'IEER'){
                if(id_select != 'csStd'){
                    $('#'+id_select).prop('disabled', true);
                }
            }
     }



     function check_chiller(equipo,id_select,type_p){
        //no chiller
        var ima =  $('#idioma').val();
        var tipo =   $('#type_p').val();

        if(equipo <= 7){

            $('#'+id_select).empty();
            $('#'+id_select).append($('<option>', {
                value: 'SEER',
                text: 'SEER'
            }));

            $('#'+id_select).append($('<option>', {
                value: 'SEER2',
                text: 'SEER2'
            }));

            $('#'+id_select).append($('<option>', {
                value: 'IEER',
                text: 'IEER'
            }));

            if(type_p == 1){
                check_ant_equipo('csStd',id_select,equipo,'cUnidad_1_1');

            }

            if(type_p == 2){

                check_ant_equipo('csStd_1_1_retro',id_select,equipo,'cUnidad_1_1_retro');

            }
            //check_sig_seer_eer_ieer('csStd',id_select,equipo,'cUnidad_1_1');
        }
        //chiller
        if(equipo > 7 && equipo <= 10 ){

            $('#'+id_select).empty();
            /* $('#'+id_select).append($('<option>', {
                value: 'EER',
                text: 'EER'
            })); */

            $('#'+id_select).append($('<option>', {
                value: 'IPLV',
                text: 'IPLV (Kw/TR)'
            }));
            if(parseInt(tipo) == 3){

                if(id_select == 'csStd_1_1_retro'){

                }
            }else{
                $('#'+id_select).prop('disabled', false);
            }


            if(parseInt(tipo) == 1){


                inactiva_next_efi(id_select,equipo);
            }


            if(parseInt(tipo) == 2){


                inactiva_next_efi(id_select,equipo);
            }




        }
    }

    function inactiva_next_efi(id_select,equipo){
        var efi = 'SEER'

        if(id_select == 'csStd'){

             //check primero
             var chek = check_ant_equipo_aux('csStd',id_select,equipo,'cUnidad_1_1');
             if(chek == 1){
                 return false;
             }

             if(chek == 2){
                var value_modelo = $('#modelo_2_1').val();

                var array_ids = ['csStd_1_2','csStd_1_3','csStd_2_1','csStd_2_2','csStd_2_3','csStd2_3_1','csStd_3_2','csStd_3_3']

                var arry = ['cUnidad_1_2','cUnidad_1_3','cUnidad_2_1','cUnidad_2_2','cUnidad_2_3','cUnidad_3_1',,'cUnidad_3_2','cUnidad_3_3']

                for (let index = 0; index < arry.length; index++) {
                                let equipo_val = $('#'+arry[index]).val();
                                if(equipo_val > 7){

                                }

                                if(equipo_val < 7){

                                    $('#'+array_ids[index]).empty();
                                    $('#'+array_ids[index]).append($('<option>', {
                                        value: efi,
                                        text: efi
                                    }));
                                }
                                $("#csStd_2_1").prop('disabled',false);
                                send_efi(value_modelo,'csStd_2_1');
                            }


             }
        }

        if(id_select == 'csStd_1_2'){
            //check primero
            var chek = check_ant_equipo_aux('csStd',id_select,equipo,'cUnidad_1_1');
            if(chek == 1){
                return false;
            }

            if(chek == 2){
                var value_modelo = $('#modelo_2_2').val();

                var array_ids = ['csStd_1_3','csStd_2_2','csStd_2_2','csStd_2_3','csStd_3_2','csStd_3_3']

                array_ids.forEach(function(input, index) {
                    $('#'+input).empty();
                    $('#'+input).append($('<option>', {
                        value: efi,
                        text: efi
                    }));
                    $("#csStd_2_2").prop('disabled',false);
                    send_efi(value_modelo,'csStd_2_2');
                });
            }


           /*   */
        }

        if(id_select == 'csStd_1_3'){
            //check primero
            var chek = check_ant_equipo_aux('csStd',id_select,equipo,'cUnidad_1_1');
            if(chek == 1){
                return false;
            }

            if(chek == 2){

                $("#csStd_2_3").prop('disabled',false);
                $("#csStd_2_3").find('option[value="'+efi+'"]').attr("selected", "selected");
                $("#csStd_3_3").find('option[value="'+efi+'"]').attr("selected", "selected");
            }
           /*   */
        }


        if(id_select == 'csStd_2_1'){
            //check primero
            var chek = check_ant_equipo_aux('csStd',id_select,equipo,'cUnidad_1_1');

            if(chek == 1){
                return false;
            }

            if(chek == 2){

                var value_modelo = $('#modelo_3_1').val();

                var array_ids = ['csStd_1_2','csStd_1_3','csStd_2_2','csStd_2_3','csStd_3_2','csStd_3_3']

                array_ids.forEach(function(input, index) {
                    $('#'+input).empty();
                    $('#'+input).append($('<option>', {
                        value: efi,
                        text: efi
                    }));
                    $("#csStd2_3_1").prop('disabled',false);
                    send_efi(value_modelo,'csStd2_3_1');
                });

            }
            /*  */
        }

        if(id_select == 'csStd_2_2'){
            //check primero
            var chek = check_ant_equipo_aux('csStd',id_select,equipo,'cUnidad_1_1');
            if(chek == 1){
                return false;
            }

            if(chek == 2){



                var value_modelo = $('#modelo_2_2').val();

                var array_ids = ['csStd_1_3','csStd_2_3','csStd_3_2','csStd_3_3']

                array_ids.forEach(function(input, index) {
                    $('#'+input).empty();
                    $('#'+input).append($('<option>', {
                        value: efi,
                        text: efi
                    }));
                    $("#csStd_3_2").prop('disabled',false);
                    send_efi(value_modelo,'csStd_3_2');
                });
            }


           /*   */
        }

        if(id_select == 'csStd_2_3'){
            //check primero
            var chek = check_ant_equipo_aux('csStd',id_select,equipo,'cUnidad_1_1');
            if(chek == 1){
                return false;
            }

            if(chek == 2){
                $("#csStd_3_3").prop('disabled',false);
                $("#csStd_3_3").find('option[value="'+efi+'"]').attr("selected", "selected");
            }
           /*   */
        }

        if(id_select == 'csStd2_3_1'){
            //check primero
            var chek = check_ant_equipo_aux('csStd',id_select,equipo,'cUnidad_1_1');
            if(chek == 1){
                return false;
            }

            if(chek == 2){
                //$('#csStd_1_2').prop('disabled', false);

                var array_ids = ['csStd_1_2','csStd_1_3','csStd_2_2','csStd_2_3','csStd_3_2','csStd_3_3']

                array_ids.forEach(function(input, index) {
                    $('#'+input).empty();
                    $('#'+input).append($('<option>', {
                        value: efi,
                        text: efi
                    }));
                });
            }
           /*   */
        }

        if(id_select == 'csStd_3_2'){
            //check primero
            var chek = check_ant_equipo_aux('csStd',id_select,equipo,'cUnidad_1_1');
            if(chek == 1){
                return false;
            }

            if(chek == 2){


                //$("#csStd_1_3").prop('disabled',false);
                $("#csStd_1_3").find('option[value="'+efi+'"]').attr("selected", "selected");
                $("#csStd_2_3").find('option[value="'+efi+'"]').attr("selected", "selected");
                $("#csStd_3_3").find('option[value="'+efi+'"]').attr("selected", "selected");
            }
           /*   */
        }

        if(id_select == 'csStd_1_1_retro'){

            //check primero
            var chek = check_ant_equipo_aux('csStd_1_1_retro',id_select,equipo,'cUnidad_1_1_retro');
            if(chek == 1){
                return false;
            }



            if(chek == 2){

               $("#csStd_2_1_retro").find('option[value="'+efi+'"]').attr("selected", "selected");
               $("#csStd_2_1_retro").prop('disabled',false);


               $("#csStd_3_1_retro").find('option[value="'+efi+'"]').attr("selected", "selected");

               var array_ids = ['csStd_2_1_retro','csStd_3_1_retro']

               array_ids.forEach(function(input, index) {
                   $('#'+input).empty();
                   $('#'+input).append($('<option>', {
                       value: efi,
                       text: efi
                   }));
               });

            }
       }

       if(id_select == 'csStd_2_1_retro'){

        //check primero
        var chek = check_ant_equipo_aux('csStd_1_1_retro',id_select,equipo,'cUnidad_1_1_retro');
        if(chek == 1){
            return false;
        }

        if(chek == 2){

           $("#csStd_3_1_retro").prop('disabled',false);
           $("#csStd_3_1_retro").find('option[value="'+efi+'"]').attr("selected", "selected");

        }
    }

    if(id_select == 'csStd_3_1_retro'){

        //check primero
        var chek = check_ant_equipo_aux('csStd_1_1_retro',id_select,equipo,'cUnidad_1_1_retro');
        if(chek == 1){
            return false;
        }

        if(chek == 2){



        }
    }


    }

    function check_ant_equipo(base,id_select,equipo,equipo_base){
        var base_val = $("#"+base).val();
        var select_val_efi = $("#"+id_select).val();
        var select_val_equipo_base = $("#"+equipo_base).val();


        switch (id_select) {

        case "csStd":
            if(equipo <= 7){

                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));

                    check_sig_seer_eer_ieer('csStd',id_select,equipo,'cUnidad_1_1');
            }
        break;

        case "csStd_1_2":
            if(equipo <= 7){
                if(select_val_equipo_base <= 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $("#csStd_1_2").find('option[value="'+base_val+'"]').attr("selected", "selected");
                    $('#'+id_select).prop('disabled', true);

                }

                if(select_val_equipo_base > 7){
                    ///2_1
                        var val_2_1 = $("#csStd_2_1").val()
                        var Unidad_2_1 = $("#cUnidad_2_1").val()
                        if( Unidad_2_1 <= 7 && Unidad_2_1 > 0){
                            $('#'+id_select).empty();
                            $('#'+id_select).append($('<option>', {
                                value: 'SEER',
                                text: 'SEER'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'SEER2',
                                text: 'SEER2'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'IEER',
                                text: 'IEER'
                            }));
                            $("#csStd_1_2").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                            $('#'+id_select).prop('disabled', true);
                        }

                        if( Unidad_2_1 > 7){
                            //3_1
                            var val_3_1 = $("#csStd2_3_1").val()
                            var Unidad_3_1 = $("#cUnidad_3_1").val()
                            if( Unidad_3_1 <= 7 && Unidad_3_1 > 0){
                                $('#'+id_select).empty();
                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER',
                                    text: 'SEER'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER2',
                                    text: 'SEER2'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'IEER',
                                    text: 'IEER'
                                }));
                                $("#csStd_1_2").find('option[value="'+val_3_1+'"]').attr("selected", "selected");
                                $('#'+id_select).prop('disabled', true);
                            }

                            if( Unidad_3_1 > 7){
                                $('#'+id_select).empty();
                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER',
                                    text: 'SEER'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER2',
                                    text: 'SEER2'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'IEER',
                                    text: 'IEER'
                                }));

                                //$("#csStd2_3_1").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                                check_sig_seer_eer_ieer('csStd',id_select,equipo,'cUnidad_1_1');
                                $('#'+id_select).prop('disabled', false);
                            }

                            if( Unidad_3_1 == 0){
                                $('#'+id_select).empty();
                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER',
                                    text: 'SEER'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER2',
                                    text: 'SEER2'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'IEER',
                                    text: 'IEER'
                                }));

                                //$("#csStd2_3_1").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                                check_sig_seer_eer_ieer('csStd',id_select,equipo,'cUnidad_1_1');
                                $('#'+id_select).prop('disabled', false);
                            }
                        }

                        if( Unidad_2_1 == 0){
                            //3_1
                            var val_3_1 = $("#csStd2_3_1").val()
                            var Unidad_3_1 = $("#cUnidad_3_1").val()
                            if( Unidad_3_1 <= 7 && Unidad_3_1 > 0){
                                $('#'+id_select).empty();
                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER',
                                    text: 'SEER'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER2',
                                    text: 'SEER2'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'IEER',
                                    text: 'IEER'
                                }));
                                $("#csStd_1_2").find('option[value="'+val_3_1+'"]').attr("selected", "selected");
                                $('#'+id_select).prop('disabled', true);
                            }

                            if( Unidad_3_1 > 7){
                                $('#'+id_select).empty();
                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER',
                                    text: 'SEER'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER2',
                                    text: 'SEER2'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'IEER',
                                    text: 'IEER'
                                }));

                                //$("#csStd2_3_1").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                                check_sig_seer_eer_ieer('csStd',id_select,equipo,'cUnidad_1_1');
                                $('#'+id_select).prop('disabled', false);
                            }

                            if( Unidad_3_1 == 0){
                                $('#'+id_select).empty();
                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER',
                                    text: 'SEER'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER2',
                                    text: 'SEER2'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'IEER',
                                    text: 'IEER'
                                }));

                                //$("#csStd2_3_1").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                                check_sig_seer_eer_ieer('csStd',id_select,equipo,'cUnidad_1_1');
                                $('#'+id_select).prop('disabled', false);
                            }
                        }
                }

            }

        break;

        case "csStd_1_3":

            if(equipo <= 7){
                if(select_val_equipo_base <= 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $("#csStd_1_3").find('option[value="'+base_val+'"]').attr("selected", "selected");
                    $('#'+id_select).prop('disabled', true);
                }

                if(select_val_equipo_base > 7){
                    ///2_1
                        var val_2_1 = $("#csStd_2_1").val()
                        var Unidad_2_1 = $("#cUnidad_2_1").val()
                        if( Unidad_2_1 <= 7 && Unidad_2_1 > 0){

                            $('#'+id_select).empty();
                            $('#'+id_select).append($('<option>', {
                                value: 'SEER',
                                text: 'SEER'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'SEER2',
                                text: 'SEER2'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'IEER',
                                text: 'IEER'
                            }));

                            $("#csStd_1_3").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                            $('#'+id_select).prop('disabled', true);
                        }

                        if( Unidad_2_1 > 7){
                            //3_1
                            var val_3_1 = $("#csStd2_3_1").val()
                            var Unidad_3_1 = $("#cUnidad_3_1").val()

                            if( Unidad_3_1 <= 7 && Unidad_3_1 > 0){
                                $('#'+id_select).empty();
                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER',
                                    text: 'SEER'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER2',
                                    text: 'SEER2'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'IEER',
                                    text: 'IEER'
                                }));
                                $("#csStd_1_3").find('option[value="'+val_3_1+'"]').attr("selected", "selected");
                                $('#'+id_select).prop('disabled', true);
                            }

                            if( Unidad_3_1 > 7){

                                //1_2
                                    var val_1_2 = $("#csStd_1_2").val()
                                    var Unidad_1_2 = $("#cUnidad_1_2").val()

                                    if( Unidad_1_2 <= 7 && Unidad_1_2 > 0){
                                    $('#'+id_select).empty();
                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER',
                                        text: 'SEER'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER2',
                                        text: 'SEER2'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'IEER',
                                        text: 'IEER'
                                    }));
                                    $("#csStd_1_3").find('option[value="'+val_1_2+'"]').attr("selected", "selected");
                                    $('#'+id_select).prop('disabled', true);
                                    }

                                    if(Unidad_1_2 > 7){
                                        //2_2
                                        var val_2_2 = $("#csStd_2_2").val()
                                        var Unidad_2_2 = $("#cUnidad_2_2").val()
                                        if( Unidad_2_2 <= 7 && Unidad_2_2 > 0){

                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));

                                            $("#csStd_1_3").find('option[value="'+val_2_2+'"]').attr("selected", "selected");
                                            $('#'+id_select).prop('disabled', true);
                                        }
                                        if(Unidad_2_2 > 7){

                                            var val_3_2 = $("#csStd_3_2").val()
                                            var cUnidad_3_2 = $("#cUnidad_3_2").val()
                                            if( cUnidad_3_2 <= 7 && cUnidad_3_2 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_1_3").find('option[value="'+val_3_2+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                        }

                                        if(cUnidad_3_2 > 7){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            //$("#csStd2_3_1").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                                            $('#'+id_select).prop('disabled', false);
                                            check_sig_seer_eer_ieer('csStd',id_select,equipo,'cUnidad_1_1');
                                        }

                                        }
                                    }
                            }

                            if( Unidad_3_1 == 0){

                                //1_2
                                    var val_1_2 = $("#csStd_1_2").val()
                                    var Unidad_1_2 = $("#cUnidad_1_2").val()

                                    if( Unidad_1_2 <= 7 && Unidad_1_2 > 0){
                                    $('#'+id_select).empty();
                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER',
                                        text: 'SEER'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER2',
                                        text: 'SEER2'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'IEER',
                                        text: 'IEER'
                                    }));
                                    $("#csStd_1_3").find('option[value="'+val_1_2+'"]').attr("selected", "selected");
                                    $('#'+id_select).prop('disabled', true);
                                    }

                                    if(Unidad_1_2 > 7){
                                        //2_2
                                        var val_2_2 = $("#csStd_2_2").val()
                                        var Unidad_2_2 = $("#cUnidad_2_2").val()
                                        if( Unidad_2_2 <= 7 && Unidad_2_2 > 0){

                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));

                                            $("#csStd_1_3").find('option[value="'+val_2_2+'"]').attr("selected", "selected");
                                            $('#'+id_select).prop('disabled', true);
                                        }
                                        if(Unidad_2_2 > 7){

                                            var val_3_2 = $("#csStd_3_2").val()
                                            var cUnidad_3_2 = $("#cUnidad_3_2").val()
                                            if( cUnidad_3_2 <= 7 && cUnidad_3_2 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_1_3").find('option[value="'+val_3_2+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                        }

                                        if(cUnidad_3_2 > 7 || cUnidad_3_2 == 0){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            //$("#csStd2_3_1").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                                            $('#'+id_select).prop('disabled', false);
                                            check_sig_seer_eer_ieer('csStd',id_select,equipo,'cUnidad_1_1');
                                        }

                                        }
                                    }
                            }


                        }

                        if( Unidad_2_1 == 0){
                            //3_1
                            var val_3_1 = $("#csStd2_3_1").val()
                            var Unidad_3_1 = $("#cUnidad_3_1").val()

                            if( Unidad_3_1 <= 7 && Unidad_3_1 > 0){
                                $('#'+id_select).empty();
                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER',
                                    text: 'SEER'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER2',
                                    text: 'SEER2'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'IEER',
                                    text: 'IEER'
                                }));
                                $("#csStd_1_3").find('option[value="'+val_3_1+'"]').attr("selected", "selected");
                                $('#'+id_select).prop('disabled', true);
                            }

                            if( Unidad_3_1 > 7){

                                //1_2
                                    var val_1_2 = $("#csStd_1_2").val()
                                    var Unidad_1_2 = $("#cUnidad_1_2").val()

                                    if( Unidad_1_2 <= 7 && Unidad_1_2 > 0){
                                    $('#'+id_select).empty();
                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER',
                                        text: 'SEER'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER2',
                                        text: 'SEER2'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'IEER',
                                        text: 'IEER'
                                    }));
                                    $("#csStd_1_3").find('option[value="'+val_1_2+'"]').attr("selected", "selected");
                                    $('#'+id_select).prop('disabled', true);
                                    }

                                    if(Unidad_1_2 > 7){
                                        //2_2
                                        var val_2_2 = $("#csStd_2_2").val()
                                        var Unidad_2_2 = $("#cUnidad_2_2").val()
                                        if( Unidad_2_2 <= 7 && Unidad_2_2 > 0){

                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));

                                            $("#csStd_1_3").find('option[value="'+val_2_2+'"]').attr("selected", "selected");
                                            $('#'+id_select).prop('disabled', true);
                                        }
                                        if(Unidad_2_2 > 7){

                                            var val_3_2 = $("#csStd_3_2").val()
                                            var cUnidad_3_2 = $("#cUnidad_3_2").val()
                                            if( cUnidad_3_2 <= 7 && cUnidad_3_2 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_1_3").find('option[value="'+val_3_2+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                        }

                                        if(cUnidad_3_2 > 7){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            //$("#csStd2_3_1").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                                            $('#'+id_select).prop('disabled', false);
                                            check_sig_seer_eer_ieer('csStd',id_select,equipo,'cUnidad_1_1');
                                        }

                                        }
                                    }
                            }

                            if( Unidad_3_1 == 0){

                                //1_2
                                    var val_1_2 = $("#csStd_1_2").val()
                                    var Unidad_1_2 = $("#cUnidad_1_2").val()

                                    if( Unidad_1_2 <= 7 && Unidad_1_2 > 0){
                                    $('#'+id_select).empty();
                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER',
                                        text: 'SEER'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER2',
                                        text: 'SEER2'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'IEER',
                                        text: 'IEER'
                                    }));
                                    $("#csStd_1_3").find('option[value="'+val_1_2+'"]').attr("selected", "selected");
                                    $('#'+id_select).prop('disabled', true);
                                    }

                                    if(Unidad_1_2 > 7){
                                        //2_2
                                        var val_2_2 = $("#csStd_2_2").val()
                                        var Unidad_2_2 = $("#cUnidad_2_2").val()
                                        if( Unidad_2_2 <= 7 && Unidad_2_2 > 0){

                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));

                                            $("#csStd_1_3").find('option[value="'+val_2_2+'"]').attr("selected", "selected");
                                            $('#'+id_select).prop('disabled', true);
                                        }
                                        if(Unidad_2_2 > 7){

                                            var val_3_2 = $("#csStd_3_2").val()
                                            var cUnidad_3_2 = $("#cUnidad_3_2").val()
                                            if( cUnidad_3_2 <= 7 && cUnidad_3_2 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_1_3").find('option[value="'+val_3_2+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                        }

                                        if(cUnidad_3_2 > 7 || cUnidad_3_2 == 0){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            //$("#csStd2_3_1").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                                            $('#'+id_select).prop('disabled', false);
                                            check_sig_seer_eer_ieer('csStd',id_select,equipo,'cUnidad_1_1');
                                        }

                                        }

                                        if(Unidad_2_2 == 0){

                                            var val_3_2 = $("#csStd_3_2").val()
                                            var cUnidad_3_2 = $("#cUnidad_3_2").val()
                                            if( cUnidad_3_2 <= 7 && cUnidad_3_2 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_1_3").find('option[value="'+val_3_2+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                        }

                                        if(cUnidad_3_2 > 7 || cUnidad_3_2 == 0){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            //$("#csStd2_3_1").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                                            $('#'+id_select).prop('disabled', false);
                                            check_sig_seer_eer_ieer('csStd',id_select,equipo,'cUnidad_1_1');
                                        }

                                        }
                                    }
                            }


                        }
                }

            }

        break;

        case "csStd_2_1":
            if(equipo <= 7){
                if(select_val_equipo_base <= 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $("#csStd_2_1").find('option[value="'+base_val+'"]').attr("selected", "selected");
                    $('#'+id_select).prop('disabled', true);
                }

                if(select_val_equipo_base > 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $('#'+id_select).prop('disabled', false);
                    check_sig_seer_eer_ieer('csStd',id_select,equipo,'cUnidad_1_1');
                }

            }

        break;

        case "csStd_2_2":

            if(equipo <= 7){
                if(select_val_equipo_base <= 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $("#csStd_2_2").find('option[value="'+base_val+'"]').attr("selected", "selected");
                    $('#'+id_select).prop('disabled', true);
                }

                if(select_val_equipo_base > 7){
                    ///2_1
                        var val_2_1 = $("#csStd_2_1").val()
                        var Unidad_2_1 = $("#cUnidad_2_1").val()
                        if( Unidad_2_1 <= 7 && Unidad_2_1 > 0){

                            $('#'+id_select).empty();
                            $('#'+id_select).append($('<option>', {
                                value: 'SEER',
                                text: 'SEER'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'SEER2',
                                text: 'SEER2'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'IEER',
                                text: 'IEER'
                            }));

                            $("#csStd_2_2").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                            $('#'+id_select).prop('disabled', true);
                        }

                        if( Unidad_2_1 > 7){
                            //3_1
                            var val_3_1 = $("#csStd2_3_1").val()
                            var Unidad_3_1 = $("#cUnidad_3_1").val()

                            if( Unidad_3_1 <= 7 && Unidad_3_1 > 0){
                                $('#'+id_select).empty();
                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER',
                                    text: 'SEER'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER2',
                                    text: 'SEER2'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'IEER',
                                    text: 'IEER'
                                }));
                                $("#csStd_2_2").find('option[value="'+val_3_1+'"]').attr("selected", "selected");
                                $('#'+id_select).prop('disabled', true);
                            }

                            if( Unidad_3_1 > 7){

                                //1_2
                                    var val_1_2 = $("#csStd_1_2").val()
                                    var Unidad_1_2 = $("#cUnidad_1_2").val()

                                    if( Unidad_1_2 <= 7 && Unidad_1_2 > 0){
                                    $('#'+id_select).empty();
                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER',
                                        text: 'SEER'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER2',
                                        text: 'SEER2'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'IEER',
                                        text: 'IEER'
                                    }));
                                    $("#csStd_2_2").find('option[value="'+val_1_2+'"]').attr("selected", "selected");
                                    $('#'+id_select).prop('disabled', true);
                                    }

                                    if(Unidad_1_2 > 7){
                                        $('#'+id_select).empty();
                                        $('#'+id_select).append($('<option>', {
                                            value: 'SEER',
                                            text: 'SEER'
                                        }));

                                        $('#'+id_select).append($('<option>', {
                                            value: 'SEER2',
                                            text: 'SEER2'
                                        }));

                                        $('#'+id_select).append($('<option>', {
                                            value: 'IEER',
                                            text: 'IEER'
                                        }));
                                        $('#'+id_select).prop('disabled', false);
                                        check_sig_seer_eer_ieer('csStd',id_select,equipo,'cUnidad_1_1');
                                    }

                                    if(Unidad_1_2 == 0){
                                        $('#'+id_select).empty();
                                        $('#'+id_select).append($('<option>', {
                                            value: 'SEER',
                                            text: 'SEER'
                                        }));

                                        $('#'+id_select).append($('<option>', {
                                            value: 'SEER2',
                                            text: 'SEER2'
                                        }));

                                        $('#'+id_select).append($('<option>', {
                                            value: 'IEER',
                                            text: 'IEER'
                                        }));
                                        $('#'+id_select).prop('disabled', false);
                                    }


                            }

                            if( Unidad_3_1 == 0){
                                var val_1_2 = $("#csStd_1_2").val()
                                var Unidad_1_2 = $("#cUnidad_1_2").val()

                                if( Unidad_1_2 <= 7 && Unidad_1_2 > 0){
                                $('#'+id_select).empty();
                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER',
                                    text: 'SEER'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER2',
                                    text: 'SEER2'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'IEER',
                                    text: 'IEER'
                                }));
                                $("#csStd_2_2").find('option[value="'+val_1_2+'"]').attr("selected", "selected");
                                $('#'+id_select).prop('disabled', true);
                                }

                                if(Unidad_1_2 > 7){
                                    $('#'+id_select).empty();
                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER',
                                        text: 'SEER'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER2',
                                        text: 'SEER2'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'IEER',
                                        text: 'IEER'
                                    }));
                                    $('#'+id_select).prop('disabled', false);
                                    check_sig_seer_eer_ieer('csStd',id_select,equipo,'cUnidad_1_1');
                                }

                                if(Unidad_1_2 == 0){
                                    $('#'+id_select).empty();
                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER',
                                        text: 'SEER'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER2',
                                        text: 'SEER2'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'IEER',
                                        text: 'IEER'
                                    }));
                                    $('#'+id_select).prop('disabled', false);
                                }

                            }
                        }
                }

            }

        break;

        case "csStd_2_3":

            if(equipo <= 7){
                if(select_val_equipo_base <= 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $("#csStd_2_3").find('option[value="'+base_val+'"]').attr("selected", "selected");
                    $('#'+id_select).prop('disabled', true);
                }

                if(select_val_equipo_base > 7){
                    ///2_1
                        var val_2_1 = $("#csStd_2_1").val()
                        var Unidad_2_1 = $("#cUnidad_2_1").val()
                        if( Unidad_2_1 <= 7 && Unidad_2_1 > 0){

                            $('#'+id_select).empty();
                            $('#'+id_select).append($('<option>', {
                                value: 'SEER',
                                text: 'SEER'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'SEER2',
                                text: 'SEER2'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'IEER',
                                text: 'IEER'
                            }));

                            $("#csStd_2_3").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                            $('#'+id_select).prop('disabled', true);
                        }

                        if( Unidad_2_1 > 7){
                            //3_1
                            var val_3_1 = $("#csStd2_3_1").val()
                            var Unidad_3_1 = $("#cUnidad_3_1").val()

                            if( Unidad_3_1 <= 7 && Unidad_3_1 > 0){
                                $('#'+id_select).empty();
                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER',
                                    text: 'SEER'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER2',
                                    text: 'SEER2'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'IEER',
                                    text: 'IEER'
                                }));
                                $("#csStd_2_3").find('option[value="'+val_3_1+'"]').attr("selected", "selected");
                                $('#'+id_select).prop('disabled', true);
                            }

                            if( Unidad_3_1 > 7){

                                //1_2
                                    var val_1_2 = $("#csStd_1_2").val()
                                    var Unidad_1_2 = $("#cUnidad_1_2").val()

                                    if( Unidad_1_2 <= 7 && Unidad_1_2 > 0){
                                    $('#'+id_select).empty();
                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER',
                                        text: 'SEER'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER2',
                                        text: 'SEER2'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'IEER',
                                        text: 'IEER'
                                    }));
                                    $("#csStd_2_3").find('option[value="'+val_1_2+'"]').attr("selected", "selected");
                                    $('#'+id_select).prop('disabled', true);
                                    }

                                    if(Unidad_1_2 > 7){
                                        //2_2
                                        var val_2_2 = $("#csStd_2_2").val()
                                        var Unidad_2_2 = $("#cUnidad_2_2").val()
                                        if( Unidad_2_2 <= 7 && Unidad_2_2 > 0){

                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));

                                            $("#csStd_2_3").find('option[value="'+val_2_2+'"]').attr("selected", "selected");
                                            $('#'+id_select).prop('disabled', true);
                                        }
                                        if(Unidad_2_2 > 7){

                                            var val_3_2 = $("#csStd_3_2").val()
                                            var cUnidad_3_2 = $("#cUnidad_3_2").val()
                                            if( cUnidad_3_2 <= 7 && cUnidad_3_2 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_2_3").find('option[value="'+val_3_2+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                        }

                                        if(cUnidad_3_2 > 7){
                                            var csStd_2_3 = $("#csStd_2_3").val()
                                            var cUnidad_1_3 = $("#cUnidad_1_3").val()
                                            if( cUnidad_1_3 <= 7 && cUnidad_1_3 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_2_3").find('option[value="'+csStd_2_3+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                          }

                                          if(cUnidad_1_3 > 7){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);

                                          }

                                          if(cUnidad_1_3 == 0){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);

                                          }
                                        }

                                        }
                                    }

                                    if(Unidad_1_2 == 0){
                                        //2_2
                                        var val_2_2 = $("#csStd_2_2").val()
                                        var Unidad_2_2 = $("#cUnidad_2_2").val()
                                        if( Unidad_2_2 <= 7 && Unidad_2_2 > 0){

                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));

                                            $("#csStd_2_3").find('option[value="'+val_2_2+'"]').attr("selected", "selected");
                                            $('#'+id_select).prop('disabled', true);
                                        }
                                        if(Unidad_2_2 > 7){

                                            var val_3_2 = $("#csStd_3_2").val()
                                            var cUnidad_3_2 = $("#cUnidad_3_2").val()
                                            if( cUnidad_3_2 <= 7 && cUnidad_3_2 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_2_3").find('option[value="'+val_3_2+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                        }

                                        if(cUnidad_3_2 > 7){
                                            var csStd_2_3 = $("#csStd_2_3").val()
                                            var cUnidad_1_3 = $("#cUnidad_1_3").val()
                                            if( cUnidad_1_3 <= 7 && cUnidad_1_3 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_2_3").find('option[value="'+csStd_2_3+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                          }

                                          if(cUnidad_1_3 > 7){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);

                                          }

                                          if(cUnidad_1_3 == 0){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);

                                          }
                                        }

                                        }
                                    }



                            }

                            if( Unidad_3_1 == 0){

                                //1_2
                                    var val_1_2 = $("#csStd_1_2").val()
                                    var Unidad_1_2 = $("#cUnidad_1_2").val()

                                    if( Unidad_1_2 <= 7 && Unidad_1_2 > 0){
                                    $('#'+id_select).empty();
                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER',
                                        text: 'SEER'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER2',
                                        text: 'SEER2'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'IEER',
                                        text: 'IEER'
                                    }));
                                    $("#csStd_2_3").find('option[value="'+val_1_2+'"]').attr("selected", "selected");
                                    $('#'+id_select).prop('disabled', true);
                                    }

                                    if(Unidad_1_2 > 7){
                                        //2_2
                                        var val_2_2 = $("#csStd_2_2").val()
                                        var Unidad_2_2 = $("#cUnidad_2_2").val()
                                        if( Unidad_2_2 <= 7 && Unidad_2_2 > 0){

                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));

                                            $("#csStd_2_3").find('option[value="'+val_2_2+'"]').attr("selected", "selected");
                                            $('#'+id_select).prop('disabled', true);
                                        }
                                        if(Unidad_2_2 > 7){

                                            var val_3_2 = $("#csStd_3_2").val()
                                            var cUnidad_3_2 = $("#cUnidad_3_2").val()
                                            if( cUnidad_3_2 <= 7 && cUnidad_3_2 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_2_3").find('option[value="'+val_3_2+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                        }

                                        if(cUnidad_3_2 > 7){
                                            var csStd_2_3 = $("#csStd_2_3").val()
                                            var cUnidad_1_3 = $("#cUnidad_1_3").val()
                                            if( cUnidad_1_3 <= 7 && cUnidad_1_3 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_2_3").find('option[value="'+csStd_2_3+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                          }

                                          if(cUnidad_1_3 > 7){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);

                                          }

                                          if(cUnidad_1_3 == 0){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);

                                          }
                                        }

                                        if(cUnidad_3_2 == 0){
                                            var csStd_2_3 = $("#csStd_2_3").val()
                                            var cUnidad_1_3 = $("#cUnidad_1_3").val()
                                            if( cUnidad_1_3 <= 7 && cUnidad_1_3 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_2_3").find('option[value="'+csStd_2_3+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                          }

                                          if(cUnidad_1_3 > 7){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);

                                          }
                                          //me quede en check anterior 2_3 y check siguiente 1_3
                                          if(cUnidad_1_3 == 0){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);

                                          }
                                        }


                                        }
                                    }

                                    if(Unidad_1_2 == 0){
                                        //2_2
                                        var val_2_2 = $("#csStd_2_2").val()
                                        var Unidad_2_2 = $("#cUnidad_2_2").val()
                                        if( Unidad_2_2 <= 7 && Unidad_2_2 > 0){

                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));

                                            $("#csStd_2_3").find('option[value="'+val_2_2+'"]').attr("selected", "selected");
                                            $('#'+id_select).prop('disabled', true);
                                        }
                                        if(Unidad_2_2 > 7){

                                            var val_3_2 = $("#csStd_3_2").val()
                                            var cUnidad_3_2 = $("#cUnidad_3_2").val()
                                            if( cUnidad_3_2 <= 7 && cUnidad_3_2 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_2_3").find('option[value="'+val_3_2+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                        }

                                        if(cUnidad_3_2 > 7){
                                            var csStd_2_3 = $("#csStd_2_3").val()
                                            var cUnidad_1_3 = $("#cUnidad_1_3").val()
                                            if( cUnidad_1_3 <= 7 && cUnidad_1_3 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_2_3").find('option[value="'+csStd_2_3+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                          }

                                          if(cUnidad_1_3 > 7){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);

                                          }

                                          if(cUnidad_1_3 == 0){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);

                                          }
                                        }

                                        if(cUnidad_3_2 == 0){
                                            var csStd_2_3 = $("#csStd_2_3").val()
                                            var cUnidad_1_3 = $("#cUnidad_1_3").val()
                                            if( cUnidad_1_3 <= 7 && cUnidad_1_3 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_2_3").find('option[value="'+csStd_2_3+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                          }

                                          if(cUnidad_1_3 > 7){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);

                                          }
                                          //me quede en check anterior 2_3 y check siguiente 1_3
                                          if(cUnidad_1_3 == 0){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);

                                          }
                                        }


                                        }
                                    }



                            }
                        }
                }

            }

        break;

        case "csStd2_3_1":
            if(equipo <= 7){

                if(select_val_equipo_base <= 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $("#csStd2_3_1").find('option[value="'+base_val+'"]').attr("selected", "selected");
                    $('#'+id_select).prop('disabled', true);
                }

                if(select_val_equipo_base > 7){

                        var val_2_1 = $("#csStd_2_1").val()
                        var Unidad_2_1 = $("#cUnidad_2_1").val()
                        if( Unidad_2_1 <= 7 && Unidad_2_1 > 0){
                            $('#'+id_select).empty();
                            $('#'+id_select).append($('<option>', {
                                value: 'SEER',
                                text: 'SEER'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'SEER2',
                                text: 'SEER2'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'IEER',
                                text: 'IEER'
                            }));
                            $("#csStd2_3_1").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                            $('#'+id_select).prop('disabled', true);
                        }

                        if( Unidad_2_1 > 7){
                            $('#'+id_select).empty();
                            $('#'+id_select).append($('<option>', {
                                value: 'SEER',
                                text: 'SEER'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'SEER2',
                                text: 'SEER2'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'IEER',
                                text: 'IEER'
                            }));
                            //$("#csStd2_3_1").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                            $('#'+id_select).prop('disabled', false);
                            check_sig_seer_eer_ieer('csStd',id_select,equipo,'cUnidad_1_1');
                        }
                }

            }

        break;

        case "csStd_3_2":

            if(equipo <= 7){
                if(select_val_equipo_base <= 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $("#csStd_3_2").find('option[value="'+base_val+'"]').attr("selected", "selected");
                    $('#'+id_select).prop('disabled', true);
                }

                if(select_val_equipo_base > 7){
                    ///2_1
                        var val_2_1 = $("#csStd_2_1").val()
                        var Unidad_2_1 = $("#cUnidad_2_1").val()
                        if( Unidad_2_1 <= 7 && Unidad_2_1 > 0){

                            $('#'+id_select).empty();
                            $('#'+id_select).append($('<option>', {
                                value: 'SEER',
                                text: 'SEER'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'SEER2',
                                text: 'SEER2'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'IEER',
                                text: 'IEER'
                            }));

                            $("#csStd_3_2").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                            $('#'+id_select).prop('disabled', true);
                        }

                        if( Unidad_2_1 > 7){
                            //3_1
                            var val_3_1 = $("#csStd2_3_1").val()
                            var Unidad_3_1 = $("#cUnidad_3_1").val()

                            if( Unidad_3_1 <= 7 && Unidad_3_1 > 0){
                                $('#'+id_select).empty();
                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER',
                                    text: 'SEER'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER2',
                                    text: 'SEER2'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'IEER',
                                    text: 'IEER'
                                }));
                                $("#csStd_3_2").find('option[value="'+val_3_1+'"]').attr("selected", "selected");
                                $('#'+id_select).prop('disabled', true);
                            }

                            if( Unidad_3_1 > 7){

                                //1_2
                                    var val_1_2 = $("#csStd_1_2").val()
                                    var Unidad_1_2 = $("#cUnidad_1_2").val()

                                    if( Unidad_1_2 <= 7 && Unidad_1_2 > 0){
                                    $('#'+id_select).empty();
                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER',
                                        text: 'SEER'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER2',
                                        text: 'SEER2'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'IEER',
                                        text: 'IEER'
                                    }));
                                    $("#csStd_3_2").find('option[value="'+val_1_2+'"]').attr("selected", "selected");
                                    $('#'+id_select).prop('disabled', true);
                                    }

                                    if(Unidad_1_2 > 7){
                                        //2_2
                                        var val_2_2 = $("#csStd_2_2").val()
                                        var Unidad_2_2 = $("#cUnidad_2_2").val()
                                        if( Unidad_2_2 <= 7 && Unidad_2_2 > 0){

                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));

                                            $("#csStd_3_2").find('option[value="'+val_2_2+'"]').attr("selected", "selected");
                                            $('#'+id_select).prop('disabled', true);
                                        }
                                        if(Unidad_2_2 > 7){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);

                                        }
                                    }

                                    if(Unidad_1_2 == 0){
                                        var val_2_2 = $("#csStd_2_2").val()
                                        var Unidad_2_2 = $("#cUnidad_2_2").val()

                                        if(Unidad_2_2 == 0){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);
                                            check_sig_seer_eer_ieer('csStd',id_select,equipo,'cUnidad_1_1');

                                        }

                                        if(Unidad_2_2 > 0){
                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);
                                            check_sig_seer_eer_ieer('csStd',id_select,equipo,'cUnidad_1_1');

                                        }
                                    }



                            }
                        }
                }

            }

        break;


        case "csStd_3_3":
            if(equipo <= 7){
                if(select_val_equipo_base <= 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $("#csStd_3_3").find('option[value="'+base_val+'"]').attr("selected", "selected");
                    $('#'+id_select).prop('disabled', true);
                }

                if(select_val_equipo_base > 7){
                    ///2_1
                        var val_2_1 = $("#csStd_2_1").val()
                        var Unidad_2_1 = $("#cUnidad_2_1").val()
                        if( Unidad_2_1 <= 7 && Unidad_2_1 > 0){

                            $('#'+id_select).empty();
                            $('#'+id_select).append($('<option>', {
                                value: 'SEER',
                                text: 'SEER'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'SEER2',
                                text: 'SEER2'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'IEER',
                                text: 'IEER'
                            }));

                            $("#csStd_3_3").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                            $('#'+id_select).prop('disabled', true);
                        }

                        if( Unidad_2_1 > 7){
                            //3_1
                            var val_3_1 = $("#csStd2_3_1").val()
                            var Unidad_3_1 = $("#cUnidad_3_1").val()

                            if( Unidad_3_1 <= 7 && Unidad_3_1 > 0){
                                $('#'+id_select).empty();
                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER',
                                    text: 'SEER'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'SEER2',
                                    text: 'SEER2'
                                }));

                                $('#'+id_select).append($('<option>', {
                                    value: 'IEER',
                                    text: 'IEER'
                                }));
                                $("#csStd_3_3").find('option[value="'+val_3_1+'"]').attr("selected", "selected");
                                $('#'+id_select).prop('disabled', true);
                            }

                            if( Unidad_3_1 > 7){

                                //1_2
                                    var val_1_2 = $("#csStd_1_2").val()
                                    var Unidad_1_2 = $("#cUnidad_1_2").val()

                                    if( Unidad_1_2 <= 7 && Unidad_1_2 > 0){
                                    $('#'+id_select).empty();
                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER',
                                        text: 'SEER'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'SEER2',
                                        text: 'SEER2'
                                    }));

                                    $('#'+id_select).append($('<option>', {
                                        value: 'IEER',
                                        text: 'IEER'
                                    }));
                                    $("#csStd_3_3").find('option[value="'+val_1_2+'"]').attr("selected", "selected");
                                    $('#'+id_select).prop('disabled', true);
                                    }

                                    if(Unidad_1_2 > 7){
                                        //2_2
                                        var val_2_2 = $("#csStd_2_2").val()
                                        var Unidad_2_2 = $("#cUnidad_2_2").val()
                                        if( Unidad_2_2 <= 7 && Unidad_2_2 > 0){

                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));

                                            $("#csStd_3_3").find('option[value="'+val_2_2+'"]').attr("selected", "selected");
                                            $('#'+id_select).prop('disabled', true);
                                        }
                                        if(Unidad_2_2 > 7){

                                            var val_3_2 = $("#csStd_3_2").val()
                                            var cUnidad_3_2 = $("#cUnidad_3_2").val()
                                            if( cUnidad_3_2 <= 7 && cUnidad_3_2 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_3_3").find('option[value="'+val_3_2+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                        }

                                        if(cUnidad_3_2 > 7){
                                            var csStd_1_3 = $("#csStd_1_3").val()
                                            var cUnidad_1_3 = $("#cUnidad_1_3").val()
                                            if( cUnidad_1_3 <= 7 && cUnidad_1_3 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_3_3").find('option[value="'+csStd_1_3+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                          }

                                          if(cUnidad_1_3 > 7){

                                            var csStd_2_3 = $("#csStd_2_3").val()
                                            var cUnidad_2_3 = $("#cUnidad_2_3").val()
                                            if( cUnidad_2_3 <= 7 && cUnidad_2_3 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_3_3").find('option[value="'+csStd_2_3+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                          }

                                          if(cUnidad_2_3 > 7){

                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);
                                      }


/*                                             $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false); */

                                          }
                                        }

                                        }
                                    }

                                    if(Unidad_1_2 == 0){
                                        //2_2
                                        var val_2_2 = $("#csStd_2_2").val()
                                        var Unidad_2_2 = $("#cUnidad_2_2").val()
                                        if( Unidad_2_2 <= 7 && Unidad_2_2 > 0){

                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));

                                            $("#csStd_3_3").find('option[value="'+val_2_2+'"]').attr("selected", "selected");
                                            $('#'+id_select).prop('disabled', true);
                                        }
                                        if(Unidad_2_2 > 7){

                                            var val_3_2 = $("#csStd_3_2").val()
                                            var cUnidad_3_2 = $("#cUnidad_3_2").val()
                                            if( cUnidad_3_2 <= 7 && cUnidad_3_2 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_3_3").find('option[value="'+val_3_2+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                        }

                                        if(cUnidad_3_2 > 7){
                                            var csStd_1_3 = $("#csStd_1_3").val()
                                            var cUnidad_1_3 = $("#cUnidad_1_3").val()
                                            if( cUnidad_1_3 <= 7 && cUnidad_1_3 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_3_3").find('option[value="'+csStd_1_3+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                          }

                                          if(cUnidad_1_3 > 7){

                                            var csStd_2_3 = $("#csStd_2_3").val()
                                            var cUnidad_2_3 = $("#cUnidad_2_3").val()
                                            if( cUnidad_2_3 <= 7 && cUnidad_2_3 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_3_3").find('option[value="'+csStd_2_3+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                          }

                                          if(cUnidad_2_3 > 7){

                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);
                                      }


/*                                             $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false); */

                                          }

                                          if(cUnidad_1_3 == 0){

                                            var csStd_2_3 = $("#csStd_2_3").val()
                                            var cUnidad_2_3 = $("#cUnidad_2_3").val()
                                            if( cUnidad_2_3 <= 7 && cUnidad_2_3 > 0){

                                                $('#'+id_select).empty();
                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER',
                                                    text: 'SEER'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'SEER2',
                                                    text: 'SEER2'
                                                }));

                                                $('#'+id_select).append($('<option>', {
                                                    value: 'IEER',
                                                    text: 'IEER'
                                                }));

                                                $("#csStd_3_3").find('option[value="'+csStd_2_3+'"]').attr("selected", "selected");
                                                $('#'+id_select).prop('disabled', true);
                                          }

                                          if(cUnidad_2_3 > 7){

                                            $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false);
                                      }


/*                                             $('#'+id_select).empty();
                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER',
                                                text: 'SEER'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'SEER2',
                                                text: 'SEER2'
                                            }));

                                            $('#'+id_select).append($('<option>', {
                                                value: 'IEER',
                                                text: 'IEER'
                                            }));
                                            $('#'+id_select).prop('disabled', false); */

                                          }
                                        }

                                        }
                                    }





                            }
                        }
                }

            }
        break;

        case "csStd_1_1_retro":
            if(equipo <= 7){

                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));

                    check_sig_seer_eer_ieer('csStd_1_1_retro',id_select,equipo,'cUnidad_1_1_retro');
            }
        break;

        case "csStd_2_1_retro":
            if(equipo <= 7){
                if(select_val_equipo_base <= 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $("#csStd_2_1_retro").find('option[value="'+base_val+'"]').attr("selected", "selected");
                    $('#'+id_select).prop('disabled', true);
                }

                if(select_val_equipo_base > 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $('#'+id_select).prop('disabled', false);
                    check_sig_seer_eer_ieer('csStd_1_1_retro',id_select,equipo,'cUnidad_1_1_retro');
                }

            }

        break;

        case "csStd_3_1_retro":
            if(equipo <= 7){

                if(select_val_equipo_base <= 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $("#csStd_3_1_retro").find('option[value="'+base_val+'"]').attr("selected", "selected");
                    $('#'+id_select).prop('disabled', true);
                }

                if(select_val_equipo_base > 7){

                        var val_2_1 = $("#csStd_2_1_retro").val()
                        var Unidad_2_1 = $("#cUnidad_2_1_retro").val()
                        if( Unidad_2_1 <= 7 && Unidad_2_1 > 0){
                            $('#'+id_select).empty();
                            $('#'+id_select).append($('<option>', {
                                value: 'SEER',
                                text: 'SEER'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'SEER2',
                                text: 'SEER2'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'IEER',
                                text: 'IEER'
                            }));
                            $("#csStd_3_1_retro").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                            $('#'+id_select).prop('disabled', true);
                        }

                        if( Unidad_2_1 > 7){
                            $('#'+id_select).empty();
                            $('#'+id_select).append($('<option>', {
                                value: 'SEER',
                                text: 'SEER'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'SEER2',
                                text: 'SEER2'
                            }));

                            $('#'+id_select).append($('<option>', {
                                value: 'IEER',
                                text: 'IEER'
                            }));
                            //$("#csStd2_3_1").find('option[value="'+val_2_1+'"]').attr("selected", "selected");
                            $('#'+id_select).prop('disabled', false);
                            check_sig_seer_eer_ieer('csStd_1_1_retro',id_select,equipo,'cUnidad_1_1_retro');
                        }
                }

            }

        break;

        default:
                // code block
        }
    }

    function check_sig_seer_eer_ieer(base,id_select,equipo,equipo_base){
        var base_val = $("#"+base).val();
        var select_val_efi = $("#"+id_select).val();
        var select_val_equipo_base = $("#"+equipo_base).val();
        /* csStd
        csStd_1_2
        csStd_1_3
        csStd_2_1
        csStd_2_2
        csStd_2_3
        csStd2_3_1
        csStd_3_2
        csStd_3_3 */
        switch (id_select) {

            case "csStd":
                arry = ['csStd_1_2','csStd_1_3','csStd_2_1','csStd_2_2','csStd_2_3','csStd2_3_1','csStd_3_2','csStd_3_3']

                for (let index = 0; index < arry.length; index++) {

                    var val_efi = $("#"+arry[index]).val();
                    var val_efi_aux = $("#"+id_select).val();

                    if(val_efi == 'SEER' || val_efi == 'SEER2' || val_efi == 'IEER'){
                        $("#"+arry[index]).empty();
                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER',
                            text: 'SEER'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER2',
                            text: 'SEER2'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'IEER',
                            text: 'IEER'
                        }));
                        $("#"+arry[index]).find('option[value="'+val_efi_aux+'"]').attr("selected", "selected");
                        $("#"+arry[index]).prop('disabled', true);
                    }
                }
            break;

            case "csStd_1_2":
                arry = ['csStd_2_2','csStd_3_2','csStd_1_3','csStd_2_3','csStd_3_3']

                for (let index = 0; index < arry.length; index++) {

                    var val_efi = $("#"+arry[index]).val();
                    var val_efi_aux = $("#"+id_select).val();

                    if(val_efi == 'SEER' || val_efi == 'SEER2' || val_efi == 'IEER'){
                        $("#"+arry[index]).empty();
                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER',
                            text: 'SEER'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER2',
                            text: 'SEER2'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'IEER',
                            text: 'IEER'
                        }));
                        $("#"+arry[index]).find('option[value="'+val_efi_aux+'"]').attr("selected", "selected");
                        $("#"+arry[index]).prop('disabled', true);
                    }
                }
            break;

            case "csStd_1_3":
                arry = ['csStd_2_3','csStd_3_3']

                for (let index = 0; index < arry.length; index++) {

                    var val_efi = $("#"+arry[index]).val();
                    var val_efi_aux = $("#"+id_select).val();

                    if(val_efi == 'SEER' || val_efi == 'SEER2' || val_efi == 'IEER'){
                        $("#"+arry[index]).empty();
                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER',
                            text: 'SEER'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER2',
                            text: 'SEER2'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'IEER',
                            text: 'IEER'
                        }));
                        $("#"+arry[index]).find('option[value="'+val_efi_aux+'"]').attr("selected", "selected");
                        $("#"+arry[index]).prop('disabled', true);
                    }
                }
            break;

            case "csStd_2_1":
                arry = ['csStd2_3_1','csStd_1_2','csStd_2_2','csStd_3_2','csStd_1_3','csStd_2_3','csStd_3_3']

                for (let index = 0; index < arry.length; index++) {

                    var val_efi = $("#"+arry[index]).val();
                    var val_efi_aux = $("#"+id_select).val();

                    if(val_efi == 'SEER' || val_efi == 'SEER2' || val_efi == 'IEER'){
                        $("#"+arry[index]).empty();
                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER',
                            text: 'SEER'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER2',
                            text: 'SEER2'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'IEER',
                            text: 'IEER'
                        }));
                        $("#"+arry[index]).find('option[value="'+val_efi_aux+'"]').attr("selected", "selected");
                        $("#"+arry[index]).prop('disabled', true);
                    }
                }
            break;

            case "csStd_2_2":
                arry = ['csStd_3_2','csStd_1_3','csStd_2_3','csStd_3_3']

                for (let index = 0; index < arry.length; index++) {

                    var val_efi = $("#"+arry[index]).val();
                    var val_efi_aux = $("#"+id_select).val();

                    if(val_efi == 'SEER' || val_efi == 'SEER2' || val_efi == 'IEER'){
                        $("#"+arry[index]).empty();
                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER',
                            text: 'SEER'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER2',
                            text: 'SEER2'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'IEER',
                            text: 'IEER'
                        }));
                        $("#"+arry[index]).find('option[value="'+val_efi_aux+'"]').attr("selected", "selected");
                        $("#"+arry[index]).prop('disabled', true);
                    }
                }
            break;

            case "csStd_2_3":
                arry = ['csStd_3_3']

                for (let index = 0; index < arry.length; index++) {

                    var val_efi = $("#"+arry[index]).val();
                    var val_efi_aux = $("#"+id_select).val();

                    if(val_efi == 'SEER' || val_efi == 'SEER2' || val_efi == 'IEER'){
                        $("#"+arry[index]).empty();
                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER',
                            text: 'SEER'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER2',
                            text: 'SEER2'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'IEER',
                            text: 'IEER'
                        }));
                        $("#"+arry[index]).find('option[value="'+val_efi_aux+'"]').attr("selected", "selected");
                        $("#"+arry[index]).prop('disabled', true);
                    }
                }
            break;

            case "csStd2_3_1":

              arry = ['csStd_1_2','csStd_2_2','csStd_3_2','csStd_1_3','csStd_2_3','csStd_3_3']

                for (let index = 0; index < arry.length; index++) {

                    var val_efi = $("#"+arry[index]).val();
                    var val_efi_aux = $("#"+id_select).val();

                    if(val_efi == 'SEER' || val_efi == 'SEER2' || val_efi == 'IEER'){
                        $("#"+arry[index]).empty();
                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER',
                            text: 'SEER'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER2',
                            text: 'SEER2'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'IEER',
                            text:  'IEER'
                        }));

                        $("#"+arry[index]).find('option[value="'+val_efi_aux+'"]').attr("selected", "selected");
                        $("#"+arry[index]).prop('disabled', true);
                    }
                }
            break;

            case "csStd_3_2":
                arry = ['csStd_1_3','csStd_2_3','csStd_3_3']

                for (let index = 0; index < arry.length; index++) {

                    var val_efi = $("#"+arry[index]).val();
                    var val_efi_aux = $("#"+id_select).val();

                    if(val_efi == 'SEER' || val_efi == 'SEER2' || val_efi == 'IEER'){
                        $("#"+arry[index]).empty();
                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER',
                            text: 'SEER'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER2',
                            text: 'SEER2'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'IEER',
                            text: 'IEER'
                        }));
                        $("#"+arry[index]).find('option[value="'+val_efi_aux+'"]').attr("selected", "selected");
                        $("#"+arry[index]).prop('disabled', true);
                    }
                }
            break;

            case "csStd_3_3":

            break;

            case "csStd_1_1_retro":
                arry = ['csStd_2_1_retro','csStd_3_1_retro']

                for (let index = 0; index < arry.length; index++) {

                    var val_efi = $("#"+arry[index]).val();
                    var val_efi_aux = $("#"+id_select).val();

                    if(val_efi == 'SEER' || val_efi == 'SEER2' || val_efi == 'IEER'){
                        $("#"+arry[index]).empty();
                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER',
                            text: 'SEER'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER2',
                            text: 'SEER2'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'IEER',
                            text: 'IEER'
                        }));
                        $("#"+arry[index]).find('option[value="'+val_efi_aux+'"]').attr("selected", "selected");
                        $("#"+arry[index]).prop('disabled', true);
                    }
                }
            break;

            case "csStd_2_1_retro":
                arry = ['csStd_3_1_retro']

                for (let index = 0; index < arry.length; index++) {

                    var val_efi = $("#"+arry[index]).val();
                    var val_efi_aux = $("#"+id_select).val();

                    if(val_efi == 'SEER' || val_efi == 'SEER2' || val_efi == 'IEER'){
                        $("#"+arry[index]).empty();
                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER',
                            text: 'SEER'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'SEER2',
                            text: 'SEER2'
                        }));

                        $("#"+arry[index]).append($('<option>', {
                            value: 'IEER',
                            text: 'IEER'
                        }));
                        $("#"+arry[index]).find('option[value="'+val_efi_aux+'"]').attr("selected", "selected");
                        $("#"+arry[index]).prop('disabled', true);
                    }
                }
            break;

            case "csStd_3_1_retro":

            break;

            default:
        }
            }


    function check_ant_equipo_aux(base,id_select,equipo,equipo_base){

        var base_val = $("#"+base).val();
        var select_val_efi = $("#"+id_select).val();
        var select_val_equipo_base = $("#"+equipo_base).val();

        switch (id_select) {
          case "csStd":
            if(equipo <= 7){

            }

            if(equipo > 7){

                //var val_2_1 = $("#csStd_2_1").val()
                var Unidad_2_1 = $("#cUnidad_2_1").val()

                if(Unidad_2_1 <= 7 && Unidad_2_1 > 0){
                    return 2;
                }

                if(Unidad_2_1 > 7){
                    //var val_3_1 = $("#csStd2_3_1").val()
                    var Unidad_3_1 = $("#cUnidad_3_1").val()
                    if(Unidad_3_1 <= 7 && Unidad_3_1 > 0){
                        recorre_checa('csStd');

                    }

                    if(Unidad_3_1 > 7){
                        recorre_checa('csStd');

                    }

                    if(Unidad_3_1 == 0){
                        recorre_checa('csStd');
                    }
                }

                if(Unidad_2_1 == 0){

                    recorre_checa('csStd');
                }
            }
          break;

          case "csStd_1_2":
            if(equipo <= 7){
                if(select_val_equipo_base <= 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $("#csStd_1_2").find('option[value="'+base_val+'"]').attr("selected", "selected");
                    $('#'+id_select).prop('disabled', true);
                }
                return 1;
            }

            if(equipo > 7){
                if(select_val_equipo_base <= 7){

                }

                if(select_val_equipo_base > 7){

                    //var val_2_1 = $("#csStd_2_1").val()
                    var Unidad_2_1 = $("#cUnidad_2_1").val()
                    if(Unidad_2_1 <= 7 && Unidad_2_1 > 0){

                    }

                    if(Unidad_2_1 > 7){
                        //var val_3_1 = $("#csStd2_3_1").val()
                        var Unidad_3_1 = $("#cUnidad_3_1").val()
                        if(Unidad_3_1 <= 7 && Unidad_3_1 > 0){
                            return 2;
                        }

                        if(Unidad_3_1 > 7){
                            recorre_checa('csStd_1_2');

                        }

                        if(Unidad_3_1 == 0){
                            recorre_checa('csStd_1_2');
                        }
                    }

                    if(Unidad_2_1 == 0){
                        var Unidad_3_1 = $("#cUnidad_3_1").val()
                        if(Unidad_3_1 <= 7 && Unidad_3_1 > 0){

                        }

                        if(Unidad_3_1 > 7){


                        }

                        if(Unidad_3_1 == 0){
                            recorre_checa('csStd_1_2');
                        }
                    }
                }
            }

        break;

        case "csStd_1_3":
                if(equipo <= 7){
                    if(select_val_equipo_base <= 7){
                        $('#'+id_select).empty();
                        $('#'+id_select).append($('<option>', {
                            value: 'SEER',
                            text: 'SEER'
                        }));

                        $('#'+id_select).append($('<option>', {
                            value: 'SEER2',
                            text: 'SEER2'
                        }));

                        $('#'+id_select).append($('<option>', {
                            value: 'IEER',
                            text: 'IEER'
                        }));
                        $("#csStd_3_2").find('option[value="'+base_val+'"]').attr("selected", "selected");
                        $('#'+id_select).prop('disabled', true);
                    }
                    return 1;
                }

                if(equipo > 7){
                    if(select_val_equipo_base <= 7){

                    }

                    if(select_val_equipo_base > 7){
                        //var val_2_1 = $("#csStd_2_1").val()
                        var Unidad_2_1 = $("#cUnidad_2_1").val()
                        if(Unidad_2_1 <= 7 && Unidad_2_1 > 0){

                        }

                        if(Unidad_2_1 > 7){
                            //var val_3_1 = $("#csStd2_3_1").val()
                            var Unidad_3_1 = $("#cUnidad_3_1").val()
                            if(Unidad_3_1 <= 7 && Unidad_3_1 > 0){

                            }

                            if(Unidad_3_1 > 7){

                                var cUnidad_1_2 = $("#cUnidad_1_2").val()
                                if(cUnidad_1_2 <= 7 && cUnidad_1_2 > 0){

                                }

                                if(cUnidad_1_2 > 7){

                                    var cUnidad_2_2 = $("#cUnidad_2_2").val()
                                    if(cUnidad_2_2 <= 7 && cUnidad_2_2 > 0){

                                    }

                                    if(cUnidad_2_2 > 7){
                                        var cUnidad_3_2 = $("#cUnidad_3_2").val()
                                        if(cUnidad_3_2 <= 7 && cUnidad_3_2 > 0){

                                        }

                                        if(cUnidad_3_2 > 7){
                                            recorre_checa('csStd_1_3');
                                        }
                                    }

                                    if(cUnidad_2_2 == 0){
                                        var cUnidad_3_2 = $("#cUnidad_3_2").val()
                                        if(cUnidad_3_2 <= 7 && cUnidad_3_2 > 0){

                                        }

                                        if(cUnidad_3_2 > 7){
                                            recorre_checa('csStd_1_3');
                                        }
                                    }
                                }

                            }

                            if(Unidad_3_1 == 0){

                                var cUnidad_1_2 = $("#cUnidad_1_2").val()
                                if(cUnidad_1_2 <= 7 && cUnidad_1_2 > 0){

                                }

                                if(cUnidad_1_2 > 7){

                                    var cUnidad_2_2 = $("#cUnidad_2_2").val()
                                    if(cUnidad_2_2 <= 7 && cUnidad_2_2 > 0){

                                    }

                                    if(cUnidad_2_2 > 7){
                                        var cUnidad_3_2 = $("#cUnidad_3_2").val()
                                        if(cUnidad_3_2 <= 7 && cUnidad_3_2 > 0){

                                        }

                                        if(cUnidad_3_2 > 7){
                                            return 2;
                                        }

                                        if(cUnidad_3_2 == 0){
                                            return 2;
                                        }
                                    }
                                }

                            }
                        }
                    }
                }

            break;

        case "csStd_2_1":
            if(equipo <= 7){
                if(select_val_equipo_base <= 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $("#csStd_2_1").find('option[value="'+base_val+'"]').attr("selected", "selected");
                    $('#'+id_select).prop('disabled', true);
                }
                return 1;
            }

            if(equipo > 7){
                ////////
                if(select_val_equipo_base <= 7 && select_val_equipo_base > 0 ){

                }

                if(select_val_equipo_base > 7){

                    recorre_checa('csStd_2_1');
                /*  */
                /////////////
                }
            }

        break;

        case "csStd_2_2":
            if(equipo <= 7){
                if(select_val_equipo_base <= 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $("#csStd_2_2").find('option[value="'+base_val+'"]').attr("selected", "selected");
                    $('#'+id_select).prop('disabled', true);
                }
                return 1;
            }

            if(equipo > 7){
                if(select_val_equipo_base <= 7){

                }

                if(select_val_equipo_base > 7){
                    //var val_2_1 = $("#csStd_2_1").val()
                    var Unidad_2_1 = $("#cUnidad_2_1").val()
                    if(Unidad_2_1 <= 7 && Unidad_2_1 > 0){

                    }

                    if(Unidad_2_1 > 7){
                        //var val_3_1 = $("#csStd2_3_1").val()
                        var Unidad_3_1 = $("#cUnidad_3_1").val()
                        if(Unidad_3_1 <= 7 && Unidad_3_1 > 0){

                        }

                        if(Unidad_3_1 > 7){

                            var cUnidad_1_2 = $("#cUnidad_1_2").val()
                            if(cUnidad_1_2 <= 7 && cUnidad_1_2 > 0){

                            }

                            if(cUnidad_1_2 > 7){
                                recorre_checa('csStd_2_2');
                            }

                            if(cUnidad_1_2 == 0 ){
                                recorre_checa('csStd_2_2');
                            }
                        }

                        if(Unidad_3_1 == 0){

                            var cUnidad_1_2 = $("#cUnidad_1_2").val()
                            if(cUnidad_1_2 <= 7 && cUnidad_1_2 > 0){

                            }

                            if(cUnidad_1_2 > 7){
                                recorre_checa('csStd_2_2');
                            }

                            if(cUnidad_1_2 == 0 ){
                                recorre_checa('csStd_2_2');
                            }
                        }
                    }
                }
            }

        break;


        case "csStd_2_3":
            if(equipo <= 7){
                if(select_val_equipo_base <= 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $("#csStd_2_3").find('option[value="'+base_val+'"]').attr("selected", "selected");
                    $('#'+id_select).prop('disabled', true);
                }
                return 1;
            }

            if(equipo > 7){
                if(select_val_equipo_base <= 7){

                }

                if(select_val_equipo_base > 7){
                    //var val_2_1 = $("#csStd_2_1").val()
                    var Unidad_2_1 = $("#cUnidad_2_1").val()
                    if(Unidad_2_1 <= 7 && Unidad_2_1 > 0){

                    }

                    if(Unidad_2_1 > 7){
                        //var val_3_1 = $("#csStd2_3_1").val()
                        var Unidad_3_1 = $("#cUnidad_3_1").val()
                        if(Unidad_3_1 <= 7 && Unidad_3_1 > 0){

                        }

                        if(Unidad_3_1 > 7){

                            var cUnidad_1_2 = $("#cUnidad_1_2").val()
                            if(cUnidad_1_2 <= 7 && cUnidad_1_2 > 0){

                            }

                            if(cUnidad_1_2 > 7){

                                var cUnidad_2_2 = $("#cUnidad_2_2").val()
                                if(cUnidad_2_2 <= 7 && cUnidad_2_2 > 0){

                                }

                                if(cUnidad_2_2 > 7){
                                    var cUnidad_3_2 = $("#cUnidad_3_2").val()
                                    if(cUnidad_3_2 <= 7 && cUnidad_3_2 > 0){

                                    }

                                    if(cUnidad_3_2 > 7){
                                        var cUnidad_1_3 = $("#cUnidad_1_3").val()
                                        if(cUnidad_1_3 <= 7 && cUnidad_1_3 > 0){

                                        }

                                        if(cUnidad_1_3 > 7){
                                            recorre_checa('csStd_2_3');
                                        }
                                    }
                                }
                            }

                        }

                        if(Unidad_3_1 == 0){

                            var cUnidad_1_2 = $("#cUnidad_1_2").val()
                            if(cUnidad_1_2 <= 7 && cUnidad_1_2 > 0){

                            }

                            if(cUnidad_1_2 > 7){

                                var cUnidad_2_2 = $("#cUnidad_2_2").val()
                                if(cUnidad_2_2 <= 7 && cUnidad_2_2 > 0){

                                }

                                if(cUnidad_2_2 > 7){
                                    var cUnidad_3_2 = $("#cUnidad_3_2").val()
                                    if(cUnidad_3_2 <= 7 && cUnidad_3_2 > 0){

                                    }

                                    if(cUnidad_3_2 > 7){
                                        var cUnidad_1_3 = $("#cUnidad_1_3").val()
                                        if(cUnidad_1_3 <= 7 && cUnidad_1_3 > 0){

                                        }

                                        if(cUnidad_1_3 > 7){
                                            recorre_checa('csStd_2_3');
                                        }
                                    }

                                    if(cUnidad_3_2 == 0){
                                        var cUnidad_1_3 = $("#cUnidad_1_3").val()
                                        if(cUnidad_1_3 <= 7 && cUnidad_1_3 > 0){

                                        }

                                        if(cUnidad_1_3 > 7){
                                            //recorre_checa('csStd_1_3');
                                        }
                                    }
                                }


                            }

                        }
                    }
                }
            }
        break;

        case "csStd2_3_1":
            if(equipo <= 7){
                if(select_val_equipo_base <= 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $("#csStd2_3_1").find('option[value="'+base_val+'"]').attr("selected", "selected");
                    $('#'+id_select).prop('disabled', true);
                }
                return 1;
            }

            if(equipo > 7){
                if(select_val_equipo_base <= 7){

                }

                if(select_val_equipo_base > 7){
                    var val_2_1 = $("#csStd_2_1").val()
                    var Unidad_2_1 = $("#cUnidad_2_1").val()
                    if(Unidad_2_1 <= 7 && Unidad_2_1 > 0){

                    }

                    if(Unidad_2_1 > 7){
                        recorre_checa('csStd2_3_1');
                    }
                }
            }

        break;

        case "csStd_3_2":
            if(equipo <= 7){
                if(select_val_equipo_base <= 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $("#csStd_3_2").find('option[value="'+base_val+'"]').attr("selected", "selected");
                    $('#'+id_select).prop('disabled', true);
                }
                return 1;
            }

            if(equipo > 7){
                if(select_val_equipo_base <= 7){

                }

                if(select_val_equipo_base > 7){
                    //var val_2_1 = $("#csStd_2_1").val()
                    var Unidad_2_1 = $("#cUnidad_2_1").val()
                    if(Unidad_2_1 <= 7 && Unidad_2_1 > 0){

                    }

                    if(Unidad_2_1 > 7){
                        //var val_3_1 = $("#csStd2_3_1").val()
                        var Unidad_3_1 = $("#cUnidad_3_1").val()
                        if(Unidad_3_1 <= 7 && Unidad_3_1 > 0){

                        }

                        if(Unidad_3_1 > 7){

                            var cUnidad_1_2 = $("#cUnidad_1_2").val()
                            if(cUnidad_1_2 <= 7 && cUnidad_1_2 > 0){

                            }

                            if(cUnidad_1_2 > 7){

                                var cUnidad_2_2 = $("#cUnidad_2_2").val()
                                if(cUnidad_2_2 <= 7 && cUnidad_2_2 > 0){

                                }

                                if(cUnidad_2_2 > 7){
                                    recorre_checa('csStd_3_2');
                                }

                                if(cUnidad_2_2 == 0){
                                    recorre_checa('csStd_3_2');
                                }
                            }

                            if(cUnidad_1_2 == 0){

                                var cUnidad_2_2 = $("#cUnidad_2_2").val()
                                if(cUnidad_2_2 <= 7 && cUnidad_2_2 > 0){

                                }

                                if(cUnidad_2_2 > 7){
                                    recorre_checa('csStd_3_2');
                                }

                                if(cUnidad_2_2 == 0){
                                    recorre_checa('csStd_3_2');
                                }
                            }


                        }

                    }
                }
            }

        break;


        case "csStd_1_1_retro":
            if(equipo <= 7){

            }

            if(equipo > 7){
                //var val_2_1 = $("#csStd_2_1").val()
                var cUnidad_2_1_retro = $("#cUnidad_2_1_retro").val()

                if(cUnidad_2_1_retro <= 7 && cUnidad_2_1_retro > 0){

                    return 2;
                }

                if(cUnidad_2_1_retro > 7){
                    //var val_3_1 = $("#csStd2_3_1").val()
                    var cUnidad_3_1_retro = $("#cUnidad_3_1_retro").val()
                    if(cUnidad_3_1_retro <= 7 && cUnidad_3_1_retro > 0){

                    }

                    if(cUnidad_3_1_retro > 7){
                        recorre_checa('csStd_1_1_retro');

                    }

                    if(cUnidad_3_1_retro == 0){
                        recorre_checa('csStd_1_1_retro');
                    }
                }

                if(cUnidad_2_1_retro == 0){

                    recorre_checa('csStd_1_1_retro');
                }
            }
          break;

          case "csStd_2_1_retro":
            if(equipo <= 7){
                if(select_val_equipo_base <= 7){
                    $('#'+id_select).empty();
                    $('#'+id_select).append($('<option>', {
                        value: 'SEER',
                        text: 'SEER'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'SEER2',
                        text: 'SEER2'
                    }));

                    $('#'+id_select).append($('<option>', {
                        value: 'IEER',
                        text: 'IEER'
                    }));
                    $("#csStd_2_1_retro").find('option[value="'+base_val+'"]').attr("selected", "selected");
                    $('#'+id_select).prop('disabled', true);
                }
                return 1;
            }

            if(equipo > 7){
                ////////
                if(select_val_equipo_base <= 7 && select_val_equipo_base > 0 ){

                }

                if(select_val_equipo_base > 7){

                    recorre_checa('csStd_2_1_retro');
                /*  */
                /////////////
                }
            }

        break;


        default:
        }
    }


 function recorre_checa(id_select){
    switch (id_select) {
        /* arry = ['csStd_2_1','csStd2_3_1','csStd_1_2','csStd_2_2','csStd_3_2','csStd_1_3','csStd_2_3','csStd_3_3'] */
    /*     cUnidad_1_2
cUnidad_1_3
cUnidad_2_1
cUnidad_2_2
cUnidad_2_3
cUnidad_3_1
cUnidad_3_2
cUnidad_3_3 */


    case "csStd":

        arry = ['cUnidad_2_1','cUnidad_3_1','cUnidad_1_2','cUnidad_2_2','cUnidad_3_2','cUnidad_1_3','cUnidad_2_3','cUnidad_3_3']
        arry_efis = ['csStd_2_1','csStd2_3_1','csStd_1_2','csStd_2_2','csStd_3_2','csStd_1_3','csStd_2_3','csStd_3_3']
        for (let index = 0; index < arry.length; index++) {

            let unidad = $("#"+arry[index]).val()

            if(unidad == 0){

            }

            if(unidad > 0 && unidad < 7){

                $("#"+arry_efis[index]).find('option[value="SEER"]').attr("selected", "selected");
                $("#"+arry_efis[index]).prop('disabled', false);
                return false;
            }
        }

    break;

    case "csStd_2_1":

        arry = ['cUnidad_3_1','cUnidad_1_2','cUnidad_2_2','cUnidad_3_2','cUnidad_1_3','cUnidad_2_3','cUnidad_3_3']
        arry_efis = ['csStd2_3_1','csStd_1_2','csStd_2_2','csStd_3_2','csStd_1_3','csStd_2_3','csStd_3_3']
        arry_modelos = ['modelo_3_1','modelo_1_2','modelo_2_2','modelo_3_2','modelo_1_3','modelo_2_3','modelo_3_3']
        for (let index = 0; index < arry.length; index++) {

            let unidad = $("#"+arry[index]).val()

            if(unidad == 0){

            }

            if(unidad > 0 && unidad < 7){


                var value_modelo = $('#'+arry_modelos[index]).val();
                send_efi(value_modelo,arry_efis[index]);
                $("#"+arry_efis[index]).prop('disabled', false);
                return false;
            }


        }


    break;

    case "csStd2_3_1":

        arry = ['cUnidad_1_2','cUnidad_2_2','cUnidad_3_2','cUnidad_1_3','cUnidad_2_3','cUnidad_3_3']
        arry_efis = ['csStd_1_2','csStd_2_2','csStd_3_2','csStd_1_3','csStd_2_3','csStd_3_3']
        arry_modelos = ['modelo_1_2','modelo_2_2','modelo_3_2','modelo_1_3','modelo_2_3','modelo_3_3']
        for (let index = 0; index < arry.length; index++) {

            let unidad = $("#"+arry[index]).val()

            if(unidad == 0){

            }

            if(unidad > 0 && unidad < 7){

/*                 $("#"+arry_efis[index]).find('option[value="SEER"]').attr("selected", "selected");
                $("#"+arry_efis[index]).prop('disabled', false); */
                var value_modelo = $('#'+arry_modelos[index]).val();
                send_efi(value_modelo,arry_efis[index]);
                $("#"+arry_efis[index]).prop('disabled', false);
            /*     $('#'+arry_efis[index]).empty();
                $('#'+arry_efis[index]).append($('<option>', {
                    value: efi,
                    text: efi
                }));
                $("#"+arry_efis[index]).prop('disabled', false); */

                return false;
            }
        }


    break;

    case "csStd_1_2":

        arry = ['cUnidad_2_2','cUnidad_3_2','cUnidad_1_3','cUnidad_2_3','cUnidad_3_3']
        arry_efis = ['csStd_2_2','csStd_3_2','csStd_1_3','csStd_2_3','csStd_3_3']
        arry_modelos = ['modelo_2_2','modelo_3_2','modelo_1_3','modelo_2_3','modelo_3_3']
        for (let index = 0; index < arry.length; index++) {

            let unidad = $("#"+arry[index]).val()

            if(unidad == 0){

            }

            if(unidad > 0 && unidad < 7){

                var value_modelo = $('#'+arry_modelos[index]).val();
                send_efi(value_modelo,arry_efis[index]);
                $("#"+arry_efis[index]).prop('disabled', false);
                return false;
            }
        }


    break;

    case "csStd_2_2":

        arry = ['cUnidad_3_2','cUnidad_1_3','cUnidad_2_3','cUnidad_3_3']
        arry_modelos = ['modelo_3_2','modelo_1_3','modelo_2_3','modelo_3_3']
        arry_efis = ['csStd_3_2','csStd_1_3','csStd_2_3','csStd_3_3']
        for (let index = 0; index < arry.length; index++) {

            let unidad = $("#"+arry[index]).val()

            if(unidad == 0){

            }

            if(unidad > 0 && unidad < 7){
                var value_modelo = $('#'+arry_modelos[index]).val();
                send_efi(value_modelo,arry_efis[index]);
                $("#"+arry_efis[index]).prop('disabled', false);
                return false;
            }
        }


    break;

    case "csStd_3_2":

        arry = ['cUnidad_1_3','cUnidad_2_3','cUnidad_3_3']
        arry_efis = ['csStd_1_3','csStd_2_3','csStd_3_3']
        for (let index = 0; index < arry.length; index++) {

            let unidad = $("#"+arry[index]).val()

            if(unidad == 0){

            }

            if(unidad > 0 && unidad < 7){

                $("#"+arry_efis[index]).find('option[value="SEER"]').attr("selected", "selected");
                $("#"+arry_efis[index]).prop('disabled', false);
                return false;
            }
        }


    break;

    case "csStd_1_3":

        arry = ['cUnidad_2_3','cUnidad_3_3']
        arry_efis = ['csStd_2_3','csStd_3_3']
        for (let index = 0; index < arry.length; index++) {

            let unidad = $("#"+arry[index]).val()

            if(unidad == 0){

            }

            if(unidad > 0 && unidad < 7){

                $("#"+arry_efis[index]).find('option[value="SEER"]').attr("selected", "selected");
                $("#"+arry_efis[index]).prop('disabled', false);
                return false;
            }
        }


    break;

    case "csStd_2_3":

        arry = ['cUnidad_3_3']
        arry_efis = ['csStd_3_3']
        for (let index = 0; index < arry.length; index++) {

            let unidad = $("#"+arry[index]).val()

            if(unidad == 0){

            }

            if(unidad > 0 && unidad < 7){

                $("#"+arry_efis[index]).find('option[value="SEER"]').attr("selected", "selected");
                $("#"+arry_efis[index]).prop('disabled', false);
                return false;
            }
        }


    break;

    case "csStd_1_1_retro":

        arry = ['cUnidad_2_1_retro','cUnidad_3_1_retro']
        arry_efis = ['csStd_2_1_retro','csStd_3_1_retro']
        for (let index = 0; index < arry.length; index++) {

            let unidad = $("#"+arry[index]).val()

            if(unidad == 0){

            }

            if(unidad > 0 && unidad < 7){

                $("#"+arry_efis[index]).find('option[value="SEER"]').attr("selected", "selected");
                $("#"+arry_efis[index]).prop('disabled', false);
                return false;
            }
        }

    break;

    case "csStd_2_1_retro":

        arry = ['cUnidad_3_1_retro']
        arry_efis = ['csStd_3_1_retro']
        for (let index = 0; index < arry.length; index++) {

            let unidad = $("#"+arry[index]).val()

            if(unidad == 0){

            }

            if(unidad > 0 && unidad < 7){

                $("#"+arry_efis[index]).find('option[value="SEER"]').attr("selected", "selected");
                $("#"+arry_efis[index]).prop('disabled', false);
                return false;
            }
        }

    break;

    default:
        }
  }

    function check_send_efi(efi,equipo,id){

        if(id == 'csStd' && parseInt(equipo) <= 7 || id == 'csStd'){

            var arry = ['cUnidad_2_1','cUnidad_3_1','cUnidad_1_2','cUnidad_2_2','cUnidad_3_2','cUnidad_1_3','cUnidad_2_3','cUnidad_3_3','cUnidad_1_1_retro','cUnidad_2_1_retro','cUnidad_3_1_retro']
            var array_ids = ['csStd_2_1','csStd2_3_1','csStd_1_2','csStd_2_2','csStd_3_2','csStd2_1_3','csStd_2_3','csStd_3_3','csStd_1_1_retro','csStd_2_1_retro','csStd_3_1_retro']

            for (let index = 0; index < arry.length; index++) {
                let equipo_val = $('#'+arry[index]).val();
                if(equipo_val > 7){

                }

                if(equipo_val <= 7){

                    $('#'+array_ids[index]).empty();
                    $('#'+array_ids[index]).append($('<option>', {
                        value: efi,
                        text: efi
                    }));
                }
            }

        }

        if(id == 'csStd_1_2' && parseInt(equipo) <= 7 || id == 'csStd_1_2'){

            var arry = ['cUnidad_1_3','cUnidad_2_2','cUnidad_2_3','cUnidad_3_2','cUnidad_3_3','cUnidad_1_1_retro','cUnidad_2_1_retro','cUnidad_3_1_retro']
            var array_ids = ['csStd_1_3','csStd_2_2','csStd_2_3','csStd_3_2','csStd_3_3','csStd_1_1_retro','csStd_2_1_retro','csStd_3_1_retro']

            for (let index = 0; index < arry.length; index++) {
                let equipo_val = $('#'+arry[index]).val();
                if(equipo_val > 7){

                }

                if(equipo_val <= 7){

                    $('#'+array_ids[index]).empty();
                    $('#'+array_ids[index]).append($('<option>', {
                        value: efi,
                        text: efi
                    }));
                }
            }

        }

        if(id == 'csStd_1_3' && parseInt(equipo) <= 7 || id == 'csStd_1_3'){


            $("#csStd_2_3").find('option[value="'+efi+'"]').attr("selected", "selected");

            $("#csStd_3_3").find('option[value="'+efi+'"]').attr("selected", "selected");

            //retrofit
            $("#csStd_1_1_retro").find('option[value="'+efi+'"]').attr("selected", "selected");
            $("#csStd_2_1_retro").find('option[value="'+efi+'"]').attr("selected", "selected");
            $("#csStd_3_1_retro").find('option[value="'+efi+'"]').attr("selected", "selected");

        }

        if(id == 'csStd_2_3' && parseInt(equipo) < 7 || id == 'csStd_2_3'){

            //$("#csStd_1_2").find('option[value="'+efi+'"]').attr("selected", "selected");
            $("#csStd_2_3").find('option[value="'+efi+'"]').attr("selected", "selected");

            //send_seers_all('csStd_2_1',value)
            //$("#csStd_2_1").find('option[value="'+efi+'"]').attr("selected", "selected");
            //$("#csStd_2_2").find('option[value="'+efi+'"]').attr("selected", "selected");
            //$("#csStd_2_3").find('option[value="'+efi+'"]').attr("selected", "selected");

            //$("#csStd2_3_1").find('option[value="'+efi+'"]').attr("selected", "selected");
            //$("#csStd_3_2").find('option[value="'+efi+'"]').attr("selected", "selected");
            $("#csStd_3_3").find('option[value="'+efi+'"]').attr("selected", "selected");

            //retrofit
            $("#csStd_1_1_retro").find('option[value="'+efi+'"]').attr("selected", "selected");
            $("#csStd_2_1_retro").find('option[value="'+efi+'"]').attr("selected", "selected");
            $("#csStd_3_1_retro").find('option[value="'+efi+'"]').attr("selected", "selected");

        }

        if(id == 'csStd_2_1' && parseInt(equipo) <= 7 || id == 'csStd_2_1'){

            var arry = ['cUnidad_3_1','cUnidad_2_2','cUnidad_2_3','cUnidad_3_2','cUnidad_3_3','cUnidad_1_2','cUnidad_1_1_retro','cUnidad_2_1_retro','cUnidad_3_1_retro']
            var array_ids = ['csStd2_3_1','csStd_2_2','csStd_2_3','csStd_3_2','csStd_3_3','csStd_1_2','csStd_1_1_retro','csStd_2_1_retro','csStd_3_1_retro']

            for (let index = 0; index < arry.length; index++) {
                let equipo_val = $('#'+arry[index]).val();
                if(equipo_val > 7){

                }

                if(equipo_val <= 7){

                    $('#'+array_ids[index]).empty();
                    $('#'+array_ids[index]).append($('<option>', {
                        value: efi,
                        text: efi
                    }));
                }
            }


        }

        if(id == 'csStd_2_2' && parseInt(equipo) <= 7 || id == 'csStd_2_2'){

            var arry = ['cUnidad_1_3','cUnidad_2_3','cUnidad_3_2','cUnidad_3_3','cUnidad_3_3','cUnidad_2_1_retro','cUnidad_3_1_retro']
            var array_ids = ['csStd_1_3','csStd_2_3','csStd_3_2','csStd_3_3','csStd_1_1_retro','csStd_2_1_retro','csStd_3_1_retro']

            for (let index = 0; index < arry.length; index++) {
                let equipo_val = $('#'+arry[index]).val();
                if(equipo_val > 7){

                }

                if(equipo_val <= 7){

                    $('#'+array_ids[index]).empty();
                    $('#'+array_ids[index]).append($('<option>', {
                        value: efi,
                        text: efi
                    }));
                }
            }

        }

        if(id == 'csStd2_3_1' && parseInt(equipo) <= 7 || id == 'csStd2_3_1'){

            var arry = ['cUnidad_2_2','cUnidad_2_3','cUnidad_3_2','cUnidad_3_3','cUnidad_1_2','cUnidad_1_3','cUnidad_1_1_retro','cUnidad_2_1_retro','cUnidad_3_1_retro']
            var array_ids = ['csStd_2_2','csStd_2_3','csStd_3_2','csStd_3_3','csStd_1_2','csStd_1_3','csStd_1_1_retro','csStd_2_1_retro','csStd_3_1_retro']

            for (let index = 0; index < arry.length; index++) {
                let equipo_val = $('#'+arry[index]).val();
                if(equipo_val > 7){

                }

                if(equipo_val <= 7){

                    $('#'+array_ids[index]).empty();
                    $('#'+array_ids[index]).append($('<option>', {
                        value: efi,
                        text: efi
                    }));
                }
            }

        }

        if(id == 'csStd_3_2' && parseInt(equipo) <= 7 || id == 'csStd_3_2'){

            //$("#csStd_1_2").find('option[value="'+efi+'"]').attr("selected", "selected");
            $("#csStd_1_3").find('option[value="'+efi+'"]').attr("selected", "selected");

            //send_seers_all('csStd_2_1',value)
            //$("#csStd_2_1").find('option[value="'+efi+'"]').attr("selected", "selected");
            //$("#csStd_2_2").find('option[value="'+efi+'"]').attr("selected", "selected");
            $("#csStd_2_3").find('option[value="'+efi+'"]').attr("selected", "selected");

            //$("#csStd2_3_1").find('option[value="'+efi+'"]').attr("selected", "selected");
            //$("#csStd_3_2").find('option[value="'+efi+'"]').attr("selected", "selected");
            $("#csStd_3_3").find('option[value="'+efi+'"]').attr("selected", "selected");

            //retrofit
            $("#csStd_1_1_retro").find('option[value="'+efi+'"]').attr("selected", "selected");
            $("#csStd_2_1_retro").find('option[value="'+efi+'"]').attr("selected", "selected");
            $("#csStd_3_1_retro").find('option[value="'+efi+'"]').attr("selected", "selected");

        }

        if(id == 'csStd_1_1_retro' && parseInt(equipo) <= 7 || id == 'csStd_1_1_retro'){

            //retrofit
            var arry = ['cUnidad_2_1_retro','cUnidad_3_1_retro']
            var array_ids = ['csStd_2_1_retro','csStd_3_1_retro']

            for (let index = 0; index < arry.length; index++) {
                let equipo_val = $('#'+arry[index]).val();
                if(equipo_val > 7){

                }

                if(equipo_val <= 7){

                    $('#'+array_ids[index]).empty();
                    $('#'+array_ids[index]).append($('<option>', {
                        value: efi,
                        text: efi
                    }));
                }
            }


        }

        if(id == 'csStd_2_1_retro' && parseInt(equipo) <= 7 || id == 'csStd_2_1_retro'){


                //retrofit
                var arry = ['cUnidad_3_1_retro']
                var array_ids = ['csStd_3_1_retro']

                for (let index = 0; index < arry.length; index++) {
                    let equipo_val = $('#'+arry[index]).val();
                    if(equipo_val > 7){

                    }

                    if(equipo_val <= 7){

                        $('#'+array_ids[index]).empty();
                        $('#'+array_ids[index]).append($('<option>', {
                            value: efi,
                            text: efi
                        }));
                    }
                }
        }


    }

    function send_seer_selects(equipo){

        if(equipo <= 7){
            $('#'+id_select).empty();
            $('#'+id_select).append($('<option>', {
                value: 'SEER',
                text: 'SEER'
            }));
        }
        //chiller
        if(equipo > 7 && equipo <= 10 ){
            $('#'+id_select).empty();
            $('#'+id_select).append($('<option>', {
                value: 'EER',
                text: 'EER'
            }));

            $('#'+id_select).append($('<option>', {
                value: 'IPLV',
                text: 'IPLV (Kw/TR)'
            }));


        }

     }

     function change_to_porcent(porcent){

        var input_select = $('#porcent_hvac');
        const myArray = porcent.split('%');
        if (myArray.length > 1) {
            check_porcent_max_min(myArray[0]);
            //var value_set = myArray[0];
            //input_select.val(value_set + '%');

        }

        if (myArray.length==1) {
            check_porcent_max_min(porcent);
            //input_select.val(porcent + '%');
        }
     }

     function check_porcent_max_min(porcent){
        var input_select = $('#porcent_hvac');
        if(porcent > 80){
            input_select.empty();
            input_select.val(80 + '%');
            return false;
        }

        if(porcent >= 10 && porcent <= 80){
            input_select.empty();
            input_select.val(porcent + '%');
            return false;
        }

        if(porcent < 10){
            input_select.empty();
            input_select.val(10 + '%');
            return false;
        }
     }

     function inactive_tarjets_retro(type_p){
        switch (type_p) {

            case 'man':
                $('#cUnidad_2_1_retro').prop('disabled', true);
                $('#cheTipo_2_1_retro').prop('disabled', true);
                $('#marca_2_1_retro').prop('disabled', true);
                $('#modelo_2_1_retro').prop('disabled', true);
                $('#yrs_vida_2_1_retro').prop('readonly', true);
                $('#csStd_2_1_retro').prop('disabled', true);
                $('#csStd_cant_2_1_retro').prop('readonly', true);
                $('#capacidad_total_2_1_retro').prop('readonly', true);
                $('#cheDisenio_2_1_retro').prop('disabled', true);
                $('#tipo_control_2_1_retro').prop('disabled', true);
                $('#dr_2_1_retro').prop('disabled', true);
                $('#costo_recu_2_1_retro').prop('readonly', true);
                //$('#csMantenimiento_2_1_retro').prop('disabled', true);
               /*  $('#costo_recu_2_1_retro').prop('readonly', true);
                $('#maintenance_cost_2_1_retro').prop('readonly', true); */
                $('#cUnidad_3_1_retro').prop('disabled', true);
                $('#cheTipo_3_1_retro').prop('disabled', true);
                $('#marca_3_1_retro').prop('disabled', true);
                $('#modelo_3_1_retro').prop('disabled', true);
                $('#yrs_vida_3_1_retro').prop('readonly', true);
                $('#csStd_3_1_retro').prop('disabled', true);
                $('#csStd_cant_3_1_retro').prop('readonly', true);
                $('#capacidad_total_3_1_retro').prop('readonly', true);
                $('#cheDisenio_3_1_retro').prop('disabled', true);
                $('#tipo_control_3_1_retro').prop('disabled', true);
                $('#dr_3_1_retro').prop('disabled', true);
                $('#costo_recu_3_1_retro').prop('disabled', true);
                //$('#cheMantenimiento_3_1_retro').prop('disabled', true);
            break;

            case 'pn':
                $('#cUnidad_2_1_retro').prop('disabled', false);
                $('#cheTipo_2_1_retro').prop('disabled', false);
                $('#marca_2_1_retro').prop('disabled', false);
                $('#modelo_2_1_retro').prop('disabled', false);
                $('#yrs_vida_2_1_retro').prop('readonly', false);
                $('#csStd_2_1_retro').prop('readonly', false);
                $('#csStd_cant_2_1_retro').prop('readonly', false);
                $('#capacidad_total_2_1_retro').prop('readonly', false);
                $('#cheDisenio_2_1_retro').prop('disabled', false);
                $('#tipo_control_2_1_retro').prop('disabled', false);
                $('#dr_2_1_retro').prop('disabled', false);
                //$('#csMantenimiento_2_1_retro').prop('disabled', false);
               /*  $('#costo_recu_2_1_retro').prop('readonly', true);
                $('#maintenance_cost_2_1_retro').prop('readonly', true); */
                $('#cUnidad_3_1_retro').prop('disabled', false);
                $('#cheTipo_3_1_retro').prop('disabled', false);
                $('#marca_3_1_retro').prop('disabled', false);
                $('#modelo_3_1_retro').prop('disabled', false);
                $('#yrs_vida_3_1_retro').prop('readonly', false);
                $('#csStd_3_1_retro').prop('readonly', false);
                $('#csStd_cant_3_1_retro').prop('readonly', false);
                $('#capacidad_total_3_1_retro').prop('readonly', false);
                $('#cheDisenio_3_1_retro').prop('disabled', false);
                $('#tipo_control_3_1_retro').prop('disabled', false);
                $('#dr_3_1_retro').prop('disabled', false);
               // $('#cheMantenimiento_3_1_retro').prop('disabled', false);
            break;

            case 'pr':
                $('#cUnidad_2_1_retro').prop('disabled', false);
                $('#cheTipo_2_1_retro').prop('disabled', false);
                $('#marca_2_1_retro').prop('disabled', false);
                $('#modelo_2_1_retro').prop('disabled', false);
                $('#yrs_vida_2_1_retro').prop('readonly', false);
                $('#csStd_2_1_retro').prop('readonly', false);
                $('#csStd_cant_2_1_retro').prop('readonly', false);
                $('#capacidad_total_2_1_retro').prop('readonly', false);
                $('#cheDisenio_2_1_retro').prop('disabled', false);
                $('#tipo_control_2_1_retro').prop('disabled', false);
                $('#dr_2_1_retro').prop('disabled', false);
                $('#costo_recu_2_1_retro').prop('readonly', false);
                //$('#csMantenimiento_2_1_retro').prop('disabled', false);
               /*  $('#costo_recu_2_1_retro').prop('readonly', true);
                $('#maintenance_cost_2_1_retro').prop('readonly', true); */
                $('#cUnidad_3_1_retro').prop('disabled', false);
                $('#cheTipo_3_1_retro').prop('disabled', false);
                $('#marca_3_1_retro').prop('disabled', false);
                $('#modelo_3_1_retro').prop('disabled', false);
                $('#yrs_vida_3_1_retro').prop('readonly', false);
                $('#csStd_3_1_retro').prop('readonly', false);
                $('#csStd_cant_3_1_retro').prop('readonly', false);
                $('#capacidad_total_3_1_retro').prop('readonly', false);
                $('#cheDisenio_3_1_retro').prop('disabled', false);
                $('#tipo_control_3_1_retro').prop('disabled', false);
                $('#dr_3_1_retro').prop('disabled', false);
                $('#costo_recu_3_1_retro').prop('disabled', false);
                //$('#cheMantenimiento_3_1_retro').prop('disabled', false);
            break;

            default:
                break;
        }
     }

     function check_type_set_mant(type_p,value2,valu3,val){

        let type = $("#"+type_p).val();
        switch (parseInt(type)) {
            case 3:
                $("#"+value2).find('option[value="'+val+'"]').attr("selected", "selected");
                $("#"+value2).trigger( "change" );
                $("#"+valu3).find('option[value="'+val+'"]').attr("selected", "selected");
                $("#"+valu3).trigger( "change" );
            break;
            default:
            break;
        }
     }

     function check_type_set_mant_inp(type_p,value2,valu3,val){
        let type = $("#"+type_p).val();
        switch (parseInt(type)) {
            case 3:
                $("#"+value2).val(val);
                $( "#"+value2).trigger("change");
                $("#"+valu3).val(val);
                $( "#"+valu3).trigger("change");
            break;
            default:
            break;
        }
     }

     function clean_form_retro(zero){

        $("#cUnidad_1_1_retro").empty();
                $("#cUnidad_1_1_retro").append($('<option>', {
                    value: 0,
                    text: 'Seleccionar'
                }));
                $("#cUnidad_1_1_retro").append($('<option>', {
                    value: 1,
                    text: 'Paquetes (RTU)'
                }));
                $("#cUnidad_1_1_retro").append($('<option>', {
                    value: 2,
                    text: 'Split DX'
                }));
                $("#cUnidad_1_1_retro").append($('<option>', {
                    value: 3,
                    text: 'VRF No Ductados'
                }));
                $("#cUnidad_1_1_retro").append($('<option>', {
                    value: 4,
                    text: 'VRF Ductados'
                }));
                $("#cUnidad_1_1_retro").append($('<option>', {
                    value: 5,
                    text: 'PTAC/VTAC'
                }));
                $("#cUnidad_1_1_retro").append($('<option>', {
                    value: 6,
                    text: 'WSHP'
                }));
                $("#cUnidad_1_1_retro").append($('<option>', {
                    value: 7,
                    text: 'Minisplit Inverter'
                }));
  /*               $("#cUnidad_1_1_retro").append($('<option>', {
                    value: 8,
                    text: 'Chiller - Aire - Scroll Constante'
                }));
                $("#cUnidad_1_1_retro").append($('<option>', {
                    value: 9,
                    text: 'Chiller - Aire - Scroll Variable'
                }));
                $("#cUnidad_1_1_retro").append($('<option>', {
                    value: 10,
                    text: 'Chiller - Aire - Tornillo 4 Etapas'
                })); */
            $("#cUnidad_1_1_retro").find('option[value="0"]').attr("selected", "selected");
            $("#csTipo_1_1_retro").find('option[value=""]').attr("selected", "selected");
            $("#csDisenio_1_1_retro").find('option[value=""]').attr("selected", "selected");
            $("#tipo_control_1_1_retro").find('option[value=""]').attr("selected", "selected");
            $("#dr_1_1_retro").find('option[value=""]').attr("selected", "selected");
            $('#csMantenimiento_1_1_retro').empty();
            $('#csMantenimiento_1_1_retro').append($('<option>', {
                value: 0,
                text: '-Seleccionar-'
            }));
            $('#csMantenimiento_1_1_retro').append($('<option>', {
                value: 'ASHRAE 180',
                text: 'ASHRAE 180'
            }));
            $('#csMantenimiento_1_1_retro').append($('<option>', {
                value: 'Deficiente',
                text: 'Deficiente'
            }));
            $('#csMantenimiento_1_1_retro').append($('<option>', {
                value: 'Sin Mantenimiento',
                text: 'Sin Mantenimiento'
            }));
            $("#capacidad_total_1_1_retro").val('');
            $("#csStd_1_1_retro").val('SEER');
            $("#csStd_retro_1_1_cant").val('');
            $("#costo_recu_1_1_retro").val('');
            $("#modelo_1_1_retro").find('option[value=""]').attr("selected", "selected");
            $("#marca_1_1_retro").find('option[value=""]').attr("selected", "selected");
            $("#costo_recu_1_1_retro").val('');
            $("#yrs_vida_1_1_retro").val('');
            $("#maintenance_cost_1_1_retro").val('');
            $("#costo_elec_1_1_retro").val('');
            $("#const_an_rep_1_1").val('');

            $("#cUnidad_2_1_retro").find('option[value="0"]').attr("selected", "selected");
            $("#cheTipo_2_1_retro").find('option[value=""]').attr("selected", "selected");
            $("#cheDisenio_2_1_retro").find('option[value=""]').attr("selected", "selected");
            $("#tipo_control_2_1_retro").find('option[value=""]').attr("selected", "selected");
            $("#dr_2_1_retro").find('option[value=""]').attr("selected", "selected");
            $("#csMantenimiento_2_1_retro").find('option[value="0"]').attr("selected", "selected");
            $('#csMantenimiento_2_1_retro').empty();
            $('#csMantenimiento_2_1_retro').append($('<option>', {
                value: 0,
                text: '-Seleccionar-'
            }));
            $('#csMantenimiento_2_1_retro').append($('<option>', {
                value: 'ASHRAE 180',
                text: 'ASHRAE 180'
            }));
            $('#csMantenimiento_2_1_retro').append($('<option>', {
                value: 'Deficiente',
                text: 'Deficiente'
            }));
            $('#csMantenimiento_2_1_retro').append($('<option>', {
                value: 'Sin Mantenimiento',
                text: 'Sin Mantenimiento'
            }));
            $("#capacidad_total_2_1_retro").val('');
            $("#csStd_cant_2_1_retro").val('');
            $("#cheValorS_2_1_retro").val('');
            $("#modelo_2_1_retro").find('option[value=""]').attr("selected", "selected");
            $("#marca_2_1_retro").find('option[value=""]').attr("selected", "selected");
            $("#costo_recu_2_1_retro").val('');
            $("#yrs_vida_2_1_retro").val('');
            $("#maintenance_cost_2_1_retro").val('');
            $("#costo_elec_2_1_retro").val('');
            $("#const_an_rep_2_1").val('');


            $("#cUnidad_3_1_retro").find('option[value="0"]').attr("selected", "selected");
            $("#cheTipo_3_1_retro").find('option[value=""]').attr("selected", "selected");
            $("#cheDisenio_3_1_retro").find('option[value=""]').attr("selected", "selected");
            $("#tipo_control_3_1_retro").find('option[value=""]').attr("selected", "selected");
            $("#dr_3_1_retro").find('option[value=""]').attr("selected", "selected");
            $("#cheMantenimiento_3_1_retro").find('option[value="0"]').attr("selected", "selected");
            $('#cheMantenimiento_3_1_retro').empty();
            $('#cheMantenimiento_3_1_retro').append($('<option>', {
                value: 0,
                text: '-Seleccionar-'
            }));
            $('#cheMantenimiento_3_1_retro').append($('<option>', {
                value: 'ASHRAE 180',
                text: 'ASHRAE 180'
            }));
            $('#cheMantenimiento_3_1_retro').append($('<option>', {
                value: 'Deficiente',
                text: 'Deficiente'
            }));
            $('#cheMantenimiento_3_1_retro').append($('<option>', {
                value: 'Sin Mantenimiento',
                text: 'Sin Mantenimiento'
            }));
            $("#capacidad_total_3_1_retro").val('');
            $("#cheStd_3_1_retro").val('');
            $("#cheValorS_3_1_retro").val('');
            $("#modelo_3_1_retro").find('option[value=""]').attr("selected", "selected");
            $("#marca_3_1_retro").find('option[value=""]').attr("selected", "selected");
            $("#costo_recu_3_1_retro").val('');
            $("#yrs_vida_3_1_retro").val('');
            $("#costo_elec_3_1_retro").val('');
            $("#maintenance_cost_3_1_retro").val('');
            $("#csStd_cant_3_1_retro").val('');
            $("#const_an_rep_3_1").val('');

     }

     function modal_solo_paga(){
        Swal.fire({
            title: "Atención",
            text: "Esta opcion solo esta disponible para la versión de paga",
            icon: "warning",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Aceptar"
            }).then((result) => {
            if (result.isConfirmed) {
                return  false;
            }
})
     }

     function send_value_equipo_marca_form(id_input,id,value,csTipo,csDisenio,csStd,type_p,cUnidad_2_1,cUnidad_3_1){

        $("#"+id).find('option[value="' + value + '"]').attr("selected", "selected");
        send_marcas_equipo(value);

     }

     function send_value_equipo_marcas(id,value,equipo){
        send_marcas_equipo_retros(value,equipo);

     }

       function send_marcas_equipo_retros(value,equipo){
    var ima =  $('#idioma').val();
        $.ajax({
            type: 'get',
            url: '/send_marcas_equipo/'+value,
            success: function (response) {
                //retro_1_1
               /*  $('#marca_1_1_retro').empty();
                $('#marca_1_1_retro').append($('<option>', {
                    value: '',
                    text: 'Seleccionar'
                })); */
                check_val_text(equipo,ima);

                response.map((marca, i) => {
                    $('#'+equipo).append($('<option>', {
                        value: marca.id,
                        text: marca.marca,
                    }));
                });


            },
            error: function (responsetext) {

            }
        });
  }

     function send_value_equipo_marca_modal(id_input,id,id_retro,value,csTipo,csDisenio,csStd,type_p,cUnidad_2_1,cUnidad_3_1){

        $("#"+id).find('option[value="' + value + '"]').prop('selected', true);
        $("#"+id).trigger("change");
        $("#"+id_retro).find('option[value="' + value + '"]').prop('selected', true);
        $("#"+id_retro).trigger("change");
}


function send_efi(value,id_input){


    $.ajax({
        type: 'get',
        url: '/send_efi/'+ value,
        success: function (response) {
          /*   $("#"+id_input).find('option[value="' + response + '"]').prop('selected', true);
            $("#"+id_input).trigger("change"); */

            $('#'+id_input).empty();
            $('#'+id_input).append($('<option>', {
                value: response,
                text: response
            }));
           if(response == 'IPLV (Kw/TR)'){

           }else{
               $("#"+id_input).trigger("change");
           }
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function check_enfi_mod(value,id_input_b,id_input,equipo_a){

    switch (id_input) {
        case "modelo_2_1":
            var equipo_a_val = $('#'+equipo_a).val();
            if(equipo_a_val <= 7){
                return false
            }
            //chiller
            if(equipo_a_val > 7 && equipo_a_val <= 10 ){
                $.ajax({
                    type: 'get',
                    url: '/send_efi/'+ value,
                    success: function (response) {
                        $('#'+id_input_b).empty();
                        $('#'+id_input_b).append($('<option>', {
                            value: response,
                            text: response
                        }));
                        //$("#"+id_input_b).trigger("change");
                        send_seer_to_nexts_seers(id_input_b);
                    },
                    error: function (responsetext) {
                        console.log(responsetext);
                    }
                });
            }
        break;

        case "modelo_3_1":

            //valida equipo alfa hasta beta
            var equipo_a_val = $('#'+equipo_a).val();

            if(equipo_a_val <= 7){
                return false
            }
            //chiller
            if(equipo_a_val > 7 && equipo_a_val <= 10 ){
                var equipo_a_val_2_1 = $('#cUnidad_2_1').val();
                if(equipo_a_val_2_1 <= 7){
                    return false
                }

                if(equipo_a_val_2_1 > 7 && equipo_a_val_2_1 <= 10 ){
                    $.ajax({
                        type: 'get',
                        url: '/send_efi/'+ value,
                        success: function (response) {
                            $('#'+id_input_b).empty();
                            $('#'+id_input_b).append($('<option>', {
                                value: response,
                                text: response
                            }));
                            //$("#"+id_input_b).trigger("change");
                            send_seer_to_nexts_seers(id_input_b);
                        },
                        error: function (responsetext) {
                            console.log(responsetext);
                        }
                    });
                }
            }
        break;

        case "modelo_1_2":
            //valida equipo alfa hasta beta
            var equipo_a_val = $('#'+equipo_a).val();
            if(equipo_a_val <= 7){
                return false
            }
            //chiller
            if(equipo_a_val > 7 && equipo_a_val <= 10 ){
                var equipo_a_val_2_1 = $('#cUnidad_2_1').val();
                if(equipo_a_val_2_1 <= 7){
                    return false
                }

                if(equipo_a_val_2_1 > 7 && equipo_a_val_2_1 <= 10 ){

                    var equipo_a_val_3_1 = $('#cUnidad_3_1').val();
                    if(equipo_a_val_3_1 <= 7){
                        return false
                    }

                    if(equipo_a_val_3_1 > 7 && equipo_a_val_3_1 <= 10 ){
                        $.ajax({
                            type: 'get',
                            url: '/send_efi/'+ value,
                            success: function (response) {
                                $('#'+id_input_b).empty();
                                $('#'+id_input_b).append($('<option>', {
                                    value: response,
                                    text: response
                                }));
                                //$("#"+id_input_b).trigger("change");
                                send_seer_to_nexts_seers(id_input_b);
                            },
                            error: function (responsetext) {
                                console.log(responsetext);
                            }
                        });
                    }
                }
            }
        break;

        case "modelo_2_2":
            //valida equipo alfa hasta beta
            var equipo_a_val = $('#'+equipo_a).val();
            if(equipo_a_val <= 7){
                return false
            }
            //chiller
            if(equipo_a_val > 7 && equipo_a_val <= 10 ){
                var equipo_a_val_2_1 = $('#cUnidad_2_1').val();
                if(equipo_a_val_2_1 <= 7){
                    return false
                }

                if(equipo_a_val_2_1 > 7 && equipo_a_val_2_1 <= 10 ){

                    var equipo_a_val_3_1 = $('#cUnidad_3_1').val();
                    if(equipo_a_val_3_1 <= 7){
                        return false
                    }

                    if(equipo_a_val_3_1 > 7 && equipo_a_val_3_1 <= 10 ){
                        var equipo_a_val_1_2 = $('#cUnidad_1_2').val();
                        if(equipo_a_val_1_2 <= 7){
                            return false
                        }

                        if(equipo_a_val_1_2 > 7 && equipo_a_val_1_2 <= 10 ){
                            $.ajax({
                                type: 'get',
                                url: '/send_efi/'+ value,
                                success: function (response) {
                                    $('#'+id_input_b).empty();
                                    $('#'+id_input_b).append($('<option>', {
                                        value: response,
                                        text: response
                                    }));
                                    //$("#"+id_input_b).trigger("change");
                                    send_seer_to_nexts_seers(id_input_b);
                                },
                                error: function (responsetext) {
                                    console.log(responsetext);
                                }
                            });
                        }
                    }
                }
            }
        break;

        case "modelo_3_2":
            //valida equipo alfa hasta beta
            var equipo_a_val = $('#'+equipo_a).val();
            if(equipo_a_val <= 7){
                return false
            }
            //chiller
            if(equipo_a_val > 7 && equipo_a_val <= 10 ){
                var equipo_a_val_2_1 = $('#cUnidad_2_1').val();
                if(equipo_a_val_2_1 <= 7){
                    return false
                }

                if(equipo_a_val_2_1 > 7 && equipo_a_val_2_1 <= 10 ){

                    var equipo_a_val_3_1 = $('#cUnidad_3_1').val();
                    if(equipo_a_val_3_1 <= 7){
                        return false
                    }

                    if(equipo_a_val_3_1 > 7 && equipo_a_val_3_1 <= 10 ){
                        var equipo_a_val_1_2 = $('#cUnidad_1_2').val();
                        if(equipo_a_val_1_2 <= 7){
                            return false
                        }

                        if(equipo_a_val_1_2 > 7 && equipo_a_val_1_2 <= 10 ){
                            var equipo_a_val_2_2 = $('#cUnidad_2_2').val();
                            if(equipo_a_val_2_2 <= 7){
                                return false
                            }

                            if(equipo_a_val_2_2 > 7 && equipo_a_val_2_2 <= 10 ){
                                $.ajax({
                                    type: 'get',
                                    url: '/send_efi/'+ value,
                                    success: function (response) {
                                        $('#'+id_input_b).empty();
                                        $('#'+id_input_b).append($('<option>', {
                                            value: response,
                                            text: response
                                        }));
                                        //$("#"+id_input_b).trigger("change");
                                        send_seer_to_nexts_seers(id_input_b);
                                    },
                                    error: function (responsetext) {
                                        console.log(responsetext);
                                    }
                                });
                            }
                        }
                    }
                }
            }
        break;

        case "modelo_2_1_retro":
            var equipo_a_val = $('#'+equipo_a).val();
            if(equipo_a_val <= 7){
                return false
            }
            //chiller
            if(equipo_a_val > 7 && equipo_a_val <= 10 ){
                $.ajax({
                    type: 'get',
                    url: '/send_efi/'+ value,
                    success: function (response) {
                        $('#'+id_input_b).empty();
                        $('#'+id_input_b).append($('<option>', {
                            value: response,
                            text: response
                        }));
                        //$("#"+id_input_b).trigger("change");
                        send_seer_to_nexts_seers(id_input_b);
                    },
                    error: function (responsetext) {
                        console.log(responsetext);
                    }
                });
            }
        break;

        default:

    }

}

function  send_seer_to_nexts_seers(id_input_b){

    var val_id_input_b = $('#'+id_input_b).val();
    switch (id_input_b) {
        case "csStd_2_1":

            var array_ids = ['csStd2_3_1','csStd_1_2','csStd_2_2','csStd_3_2','csStd_1_1_retro','csStd_2_1_retro','csStd_3_1_retro']
            var arry = ['cUnidad_3_1','cUnidad_1_2','cUnidad_2_2','cUnidad_3_2','cUnidad_1_1_retro','cUnidad_2_1_retro','cUnidad_3_1_retro']


                        for (let index = 0; index < arry.length; index++) {
                            let equipo_val = $('#'+arry[index]).val();
                            if(equipo_val > 7){

                            }

                            if(equipo_val < 7){

                                $('#'+array_ids[index]).empty();
                                $('#'+array_ids[index]).append($('<option>', {
                                    value: val_id_input_b,
                                    text: val_id_input_b
                                }));
                            }
                        }

        break;

        case "csStd2_3_1":

            var array_ids = ['csStd_1_2','csStd_2_2','csStd_3_2','csStd_1_1_retro','csStd_2_1_retro','csStd_3_1_retro']
            var arry = ['cUnidad_1_2','cUnidad_2_2','cUnidad_3_2','cUnidad_1_1_retro','cUnidad_2_1_retro','cUnidad_3_1_retro']

            for (let index = 0; index < arry.length; index++) {
                            let equipo_val = $('#'+arry[index]).val();
                            if(equipo_val > 7){

                            }

                            if(equipo_val < 7){

                                $('#'+array_ids[index]).empty();
                                $('#'+array_ids[index]).append($('<option>', {
                                    value: val_id_input_b,
                                    text: val_id_input_b
                                }));
                            }
                        }
        break;


        case "csStd_1_2":

            var array_ids = ['csStd_2_2','csStd_3_2','csStd_1_1_retro','csStd_2_1_retro','csStd_3_1_retro']
            var arry = ['cUnidad_2_2','cUnidad_3_2','cUnidad_1_1_retro','cUnidad_2_1_retro','cUnidad_3_1_retro']

            for (let index = 0; index < arry.length; index++) {
                let equipo_val = $('#'+arry[index]).val();
                if(equipo_val > 7){

                }

                if(equipo_val < 7){

                    $('#'+array_ids[index]).empty();
                    $('#'+array_ids[index]).append($('<option>', {
                        value: val_id_input_b,
                        text: val_id_input_b
                    }));
                }
            }

        break;

        case "csStd_2_2":

            var array_ids = ['csStd_3_2','csStd_1_1_retro','csStd_2_1_retro','csStd_3_1_retro']
            var arry = ['cUnidad_3_2','cUnidad_1_1_retro','cUnidad_2_1_retro','cUnidad_3_1_retro']

            for (let index = 0; index < arry.length; index++) {
                let equipo_val = $('#'+arry[index]).val();
                if(equipo_val > 7){

                }

                if(equipo_val < 7){

                    $('#'+array_ids[index]).empty();
                    $('#'+array_ids[index]).append($('<option>', {
                        value: val_id_input_b,
                        text: val_id_input_b
                    }));
                }
            }
        break;

        case "csStd_2_1_retro":

        var array_ids = ['csStd_3_1_retro','csStd_3_1_retro']
        var arry = ['cUnidad_3_1_retro','cUnidad_3_1_retro']


                    for (let index = 0; index < arry.length; index++) {
                        let equipo_val = $('#'+arry[index]).val();
                        if(equipo_val > 7){

                        }

                        if(equipo_val < 7){

                            $('#'+array_ids[index]).empty();
                            $('#'+array_ids[index]).append($('<option>', {
                                value: val_id_input_b,
                                text: val_id_input_b
                            }));
                        }
                    }

            break;

            case "csStd_3_1_retro":

                    var array_ids = ['csStd_3_1_retro']
                    var arry = ['cUnidad_3_1_retro']

                    for (let index = 0; index < arry.length; index++) {
                                    let equipo_val = $('#'+arry[index]).val();
                                    if(equipo_val > 7){

                                    }

                                    if(equipo_val < 7){

                                        $('#'+array_ids[index]).empty();
                                        $('#'+array_ids[index]).append($('<option>', {
                                            value: val_id_input_b,
                                            text: val_id_input_b
                                        }));
                                    }
                                }
                break;

        default:

    }

}

    function mostrar_eficiencias(equipo,id_eficiencia){

        if(equipo <= 7){

            $('#'+id_eficiencia).empty();
            $('#'+id_eficiencia).append($('<option>', {
                value: 'SEER',
                text: 'SEER'
            }));

            $('#'+id_eficiencia).append($('<option>', {
                value: 'SEER2',
                text: 'SEER2'
            }));

            $('#'+id_eficiencia).append($('<option>', {
                value: 'IEER',
                text: 'IEER'
            }));


        }

        if(equipo > 7 && equipo <= 10 ){

            $('#'+id_eficiencia).empty();
            $('#'+id_eficiencia).append($('<option>', {
                value: 'IPLV',
                text: 'IPLV (Kw/TR)'
            }));
        }
     }
