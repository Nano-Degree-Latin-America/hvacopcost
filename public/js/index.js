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
        getCiudades($('#paises').val(),'ciudades');
    });

    $('#paises_mantenimiento').on('change', function () {
        getCiudades($('#paises_mantenimiento').val(),'ciudades_mantenimiento');
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

function getCiudades(idPais,id) {

    //$('#'+id).trigger('click');
    //$("#paises").val(idPais);
    //$('#pais').val($('#paises option:selected').text());
    //$('#pais_retro').val($('#paises option:selected').text());
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

            $('#'+id).empty();
            $('#'+id).append($('<option>', {
                value: 0,
                text: '-Selecciona tu ciudad-'
            }));
            $('#count_'+id).val(0);
            checksuma();
            response.map((ciudad, i) => {
                $('#'+id).append($('<option>', {
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

        }
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
        }

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
        }

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


 async function unidadHvac(value,num_div,id_select,module){

    var ima =  $('#idioma').val();
    switch (module) {
        case 1:

            await unidades_module_1(value,num_div,id_select,ima);
        break;

        case 2:
            await unidades_module_2(value,id_select,ima);
        break;

        default:
            break;
    }
  }

async function unidades_module_1(value,num_div,id_select,ima){


    if( num_div == 1){
            check_val_text(id_select,ima);
            const arry = await set_unidades_energia(value);
            const myObj = JSON.parse(arry);
                      for (let i = 0; i < myObj.length; i++) {
                        $('#'+id_select).append($('<option>', {
                            value:  myObj[i].value,
                            text:  myObj[i].text
                        }));

                    }
    }else if( num_div == 2){
        check_val_text(id_select,ima);
        const arry = await set_unidades_energia(value);
        const myObj = JSON.parse(arry);
                  for (let i = 0; i < myObj.length; i++) {
                    $('#'+id_select).append($('<option>', {
                        value:  myObj[i].value,
                        text:  myObj[i].text
                    }));

                }
    }else if(num_div == 3){
        check_val_text(id_select,ima);
        const arry = await set_unidades_energia(value);
        const myObj = JSON.parse(arry);
                  for (let i = 0; i < myObj.length; i++) {
                    $('#'+id_select).append($('<option>', {
                        value:  myObj[i].value,
                        text:  myObj[i].text
                    }));

                }
    }
    var costo_elec = $('#costo_elec');
   $('#costo_elec_2_1').val(costo_elec.val());
   $('#costo_elec_3_1').val(costo_elec.val());
   var costo_elec = $('#costo_elec_1_1_retro');
   $('#costo_elec_2_1_retro').val(costo_elec.val());
   $('#costo_elec_3_1_retro').val(costo_elec.val());

}

async function unidades_module_2(value,id_select,ima){


    check_val_text(id_select,ima);
    const arry = await set_unidades_mantenimiento(value);

    const myObj = JSON.parse(arry);

              for (let i = 0; i < myObj.length; i++) {

                $('#'+id_select).append($('<option>', {
                    value:  myObj[i].value,
                    text:  myObj[i].text
                }));
}

}

async function set_unidades_energia(value) {
    const arr = [];

    // Devolver una promesa
    return new Promise((resolve, reject) => {
        $.ajax({
            type: 'get',
            url: '/traer_unidades/' + value,
            success: function (response) {

                for (let i = 0; i < response.length; i++) {
                    if(response[i].identificador == "condensadora_split" || response[i].identificador == "condensadora_minisplit"){

                    }else{
                        arr.push({ text: response[i].unidad, value: response[i].identificador });
                    }
                }
                // Convertir el arreglo a JSON y resolver la promesa
                const arry = JSON.stringify(arr);
                resolve(arry);
            },
            error: function (responsetext) {
                reject(responsetext);
            }
        });
    });
}

async function set_unidades_mantenimiento(value) {
    const arr = [];

    // Devolver una promesa
    return new Promise((resolve, reject) => {
        $.ajax({
            type: 'get',
            url: '/traer_unidades/' + value,
            success: function (response) {

                for (let i = 0; i < response.length; i++) {
                        arr.push({ text: response[i].unidad, value: response[i].identificador });
                }
                // Convertir el arreglo a JSON y resolver la promesa
                const arry = JSON.stringify(arr);
                resolve(arry);
            },
            error: function (responsetext) {
                reject(responsetext);
            }
        });
    });
}

// Usar la función asincrónica con await
async function obtenerUnidades(value) {
    try {
        const arry = await set_unidades(value);
        console.log(arry); // Muestra el resultado en la consola
    } catch (error) {
        console.error("Error:", error);
    }
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
        '{ "text":"Manejadora (Hasta 7.5 m)" , "value":"manejadora" },' +
        '{ "text":"Manejadora (Hasta 30 m)" , "value":"manejadora2" },' +
        '{ "text":"Fancoil M/HSP (Hasta 7.5 m)" , "value":"fancoil" },' +
        '{ "text":"Fancoil M/HSP (Hasta 15 m)" , "value":"fancoil2" },' +
        '{ "text":"Fancoil LSP (Hasta 7.5 m)" , "value":"fancoil_lsp_spt" },' +
        '{ "text":"Fancoil LSP (Hasta 15 m)" , "value":"fancoil_lsp_spt2" } ]}';
        break;
        case "3":
        var arry = '{ "arr" : [' +
        '{ "text":"Pared/Piso/Techo" , "value":"ca_pi_te" },' +
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
        '{ "text":"Pared/Piso/Techo (Hasta 7.5 m)" , "value":"pa_pi_te" },' +
        '{ "text":"Pared/Piso/Techo (Hasta 15 m)" , "value":"pa_pi_te2" },' +
        '{ "text":"Concealed (Hasta 7.5 m)" , "value":"duc_con" },' +
        '{ "text":"Concealed (Hasta 15 m)" , "value":"duc_con2" },' +
        '{ "text":"Cassette (Hasta 7.5 m)" , "value":"cass" },' +
        '{ "text":"Cassette (Hasta 15 m)" , "value":"cass2" }' +
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

 async function change_diseño(value,num_div,id_select,id_tipo_control,id_dr,id_tipo_ventilacion,id_tipo_filtracion,equipo_value){
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
            const val_equipo =  await set_valor_equipo(value);
            $('#'+equipo_value).val(val_equipo);
            const arry_disenos = await set_diseños(value);
            const myObj = JSON.parse(arry_disenos);
                      for (let i = 0; i < myObj.length; i++) {
                        $('#'+id_select).append($('<option>', {
                            value:  myObj[i].value,
                            text:  myObj[i].text
                        }));
                    }

            const arry_control = await set_controles(value);
            const myObj_cont = JSON.parse(arry_control);
                        for (let i = 0; i < myObj_cont.length; i++) {
                        $('#'+id_tipo_control).append($('<option>', {
                             value:  myObj_cont[i].value,
                            text:  myObj_cont[i].text
                        }));
                    }


                    /* var arry_vent = set_ventilacion(value);
                    const myObj_vent = JSON.parse(arry_vent);
                    for (let i = 0; i < myObj_vent.arry_vent.length; i++) {
                      $('#'+id_tipo_ventilacion).append($('<option>', {
                          value:  myObj_vent.arry_vent[i].value,
                          text:  myObj_vent.arry_vent[i].text
                      }));

                  } */

                const arry_vent = await set_ventilaciones(value);
                const myObj_vent = JSON.parse(arry_vent);
                        for (let i = 0; i < myObj_vent.length; i++) {
                        $('#'+id_tipo_ventilacion).append($('<option>', {
                             value:  myObj_vent[i].value,
                            text:  myObj_vent[i].text
                        }));
                    }


                const arry_filt = await set_filtraciones(value);
                const myObj_filt = JSON.parse(arry_filt);
                        for (let i = 0; i < myObj_filt.length; i++) {
                        $('#'+id_tipo_filtracion).append($('<option>', {
                             value:  myObj_filt[i].value,
                            text:  myObj_filt[i].text
                        }));
                    }

                const arry_dr = await set_drs(value);
                const myObj_dr = JSON.parse(arry_dr);
                        for (let i = 0; i < myObj_dr.length; i++) {
                        $('#'+id_dr).append($('<option>', {
                                value:  myObj_dr[i].value,
                                text:  myObj_dr[i].text
                        }));
                    }

      }else if( num_div == 2){
          check_val_text(id_select,ima);
          check_val_text(id_tipo_control,ima);
          check_val_text(id_dr,ima);
          check_val_text(id_tipo_ventilacion,ima);
          check_val_text(id_tipo_filtracion,ima);

          $('#'+equipo_value).empty();


          const arry_disenos = await set_diseños(value);
            const myObj = JSON.parse(arry_disenos);
                      for (let i = 0; i < myObj.length; i++) {
                        $('#'+id_select).append($('<option>', {
                            value:  myObj[i].value,
                            text:  myObj[i].text
                        }));
                    }

            const arry_control = await set_controles(value);
            const myObj_cont = JSON.parse(arry_control);
                        for (let i = 0; i < myObj_cont.length; i++) {
                        $('#'+id_tipo_control).append($('<option>', {
                             value:  myObj_cont[i].value,
                            text:  myObj_cont[i].text
                        }));
                    }


                    /* var arry_vent = set_ventilacion(value);
                    const myObj_vent = JSON.parse(arry_vent);
                    for (let i = 0; i < myObj_vent.arry_vent.length; i++) {
                      $('#'+id_tipo_ventilacion).append($('<option>', {
                          value:  myObj_vent.arry_vent[i].value,
                          text:  myObj_vent.arry_vent[i].text
                      }));

                  } */

                const arry_vent = await set_ventilaciones(value);
                const myObj_vent = JSON.parse(arry_vent);
                        for (let i = 0; i < myObj_vent.length; i++) {
                        $('#'+id_tipo_ventilacion).append($('<option>', {
                             value:  myObj_vent[i].value,
                            text:  myObj_vent[i].text
                        }));
                    }


                const arry_filt = await set_filtraciones(value);
                const myObj_filt = JSON.parse(arry_filt);
                        for (let i = 0; i < myObj_filt.length; i++) {
                        $('#'+id_tipo_filtracion).append($('<option>', {
                             value:  myObj_filt[i].value,
                            text:  myObj_filt[i].text
                        }));
                    }

                const arry_dr = await set_drs(value);
                const myObj_dr = JSON.parse(arry_dr);
                        for (let i = 0; i < myObj_dr.length; i++) {
                        $('#'+id_dr).append($('<option>', {
                                value:  myObj_dr[i].value,
                                text:  myObj_dr[i].text
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

          const arry_disenos = await set_diseños(value);
            const myObj = JSON.parse(arry_disenos);
                      for (let i = 0; i < myObj.length; i++) {
                        $('#'+id_select).append($('<option>', {
                            value:  myObj[i].value,
                            text:  myObj[i].text
                        }));
                    }

            const arry_control = await set_controles(value);
            const myObj_cont = JSON.parse(arry_control);
                        for (let i = 0; i < myObj_cont.length; i++) {
                        $('#'+id_tipo_control).append($('<option>', {
                             value:  myObj_cont[i].value,
                            text:  myObj_cont[i].text
                        }));
                    }


                    /* var arry_vent = set_ventilacion(value);
                    const myObj_vent = JSON.parse(arry_vent);
                    for (let i = 0; i < myObj_vent.arry_vent.length; i++) {
                      $('#'+id_tipo_ventilacion).append($('<option>', {
                          value:  myObj_vent.arry_vent[i].value,
                          text:  myObj_vent.arry_vent[i].text
                      }));

                  } */

                const arry_vent = await set_ventilaciones(value);
                const myObj_vent = JSON.parse(arry_vent);
                        for (let i = 0; i < myObj_vent.length; i++) {
                        $('#'+id_tipo_ventilacion).append($('<option>', {
                             value:  myObj_vent[i].value,
                            text:  myObj_vent[i].text
                        }));
                    }


                const arry_filt = await set_filtraciones(value);
                const myObj_filt = JSON.parse(arry_filt);
                        for (let i = 0; i < myObj_filt.length; i++) {
                        $('#'+id_tipo_filtracion).append($('<option>', {
                             value:  myObj_filt[i].value,
                            text:  myObj_filt[i].text
                        }));
                    }

                const arry_dr = await set_drs(value);
                const myObj_dr = JSON.parse(arry_dr);
                        for (let i = 0; i < myObj_dr.length; i++) {
                        $('#'+id_dr).append($('<option>', {
                                value:  myObj_dr[i].value,
                                text:  myObj_dr[i].text
                        }));
                    }
      }

  }


  async function set_valor_equipo(value) {
    // Devolver una promesa
    return new Promise((resolve, reject) => {
        $.ajax({
            type: 'get',
            url: '/traer_valor_unidad/' + value,
            success: function (response) {
                resolve(response);
            },
            error: function (responsetext) {
                reject(responsetext);
            }
        });
    });
}

  async function set_diseños(value) {
    const arr = [];

    // Devolver una promesa
    return new Promise((resolve, reject) => {
        $.ajax({
            type: 'get',
            url: '/traer_disenos/' + value,
            success: function (response) {
                for (let i = 0; i < response.length; i++) {
                    arr.push({ text: response[i].diseno, value: response[i].valor });
                }
                // Convertir el arreglo a JSON y resolver la promesa
                const arry = JSON.stringify(arr);
                resolve(arry);
            },
            error: function (responsetext) {
                reject(responsetext);
            }
        });
    });
}

  async function set_controles(value) {
    const arr = [];

    // Devolver una promesa
    return new Promise((resolve, reject) => {
        $.ajax({
            type: 'get',
            url: '/traer_controles/' + value,
            success: function (response) {
                for (let i = 0; i < response.length; i++) {
                    arr.push({ text: response[i].control, value: response[i].valor });
                }
                // Convertir el arreglo a JSON y resolver la promesa
                const arry = JSON.stringify(arr);
                resolve(arry);
            },
            error: function (responsetext) {
                reject(responsetext);
            }
        });
    });
}


async function set_drs(value) {
    const arr = [];

    // Devolver una promesa
    return new Promise((resolve, reject) => {
        $.ajax({
            type: 'get',
            url: '/traer_drs/' + value,
            success: function (response) {
                for (let i = 0; i < response.length; i++) {
                    arr.push({ text: response[i].dr, value: response[i].valor });
                }
                // Convertir el arreglo a JSON y resolver la promesa
                const arry = JSON.stringify(arr);
                resolve(arry);
            },
            error: function (responsetext) {
                reject(responsetext);
            }
        });
    });
}

async function set_filtraciones(value) {
    const arr = [];

    // Devolver una promesa
    return new Promise((resolve, reject) => {
        $.ajax({
            type: 'get',
            url: '/traer_filtraciones/' + value,
            success: function (response) {
                for (let i = 0; i < response.length; i++) {
                    arr.push({ text: response[i].filtracion, value: response[i].valor });
                }
                // Convertir el arreglo a JSON y resolver la promesa
                const arry = JSON.stringify(arr);
                resolve(arry);
            },
            error: function (responsetext) {
                reject(responsetext);
            }
        });
    });
}

async function set_ventilaciones(value) {
    const arr = [];

    // Devolver una promesa
    return new Promise((resolve, reject) => {
        $.ajax({
            type: 'get',
            url: '/traer_ventilaciones/' + value,
            success: function (response) {
                for (let i = 0; i < response.length; i++) {
                    arr.push({ text: response[i].ventilacion, value: response[i].valor });
                }
                // Convertir el arreglo a JSON y resolver la promesa
                const arry = JSON.stringify(arr);
                resolve(arry);
            },
            error: function (responsetext) {
                reject(responsetext);
            }
        });
    });
}

async function set_ventilaciones_no_doa(value) {
    const arr = [];

    // Devolver una promesa
    return new Promise((resolve, reject) => {
        $.ajax({
            type: 'get',
            url: '/traer_ventilaciones_no_doa/' + value,
            success: function (response) {
                for (let i = 0; i < response.length; i++) {
                    arr.push({ text: response[i].ventilacion, value: response[i].valor });
                }
                // Convertir el arreglo a JSON y resolver la promesa
                const arry = JSON.stringify(arr);
                resolve(arry);
            },
            error: function (responsetext) {
                reject(responsetext);
            }
        });
    });
}

async function set_filtraciones_no_doa(value) {
    const arr = [];

    // Devolver una promesa
    return new Promise((resolve, reject) => {
        $.ajax({
            type: 'get',
            url: '/traer_filtraciones_no_doa/' + value,
            success: function (response) {
                for (let i = 0; i < response.length; i++) {
                    arr.push({ text: response[i].filtracion, value: response[i].valor });
                }
                // Convertir el arreglo a JSON y resolver la promesa
                const arry = JSON.stringify(arr);
                resolve(arry);
            },
            error: function (responsetext) {
                reject(responsetext);
            }
        });
    });
}

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

  async function check_form_proy(value,new_p,retro_p,mant_p,button_np,button_rp,action,type_p_aux){

    var pn = document.getElementById("pn");
    var pr = document.getElementById("pr");
    var man = document.getElementById("man");
    var type_p = document.getElementById("type_p");
    var action_submit_send = document.getElementById("action_submit_send");
    if(document.getElementById("id_project")){
        var id_project = document.getElementById("id_project").value;
    }

    switch (value) {
        case 'pn':

            $('#simulaciones').addClass("hidden");

            $('#forms_ene_fin_proy').removeClass("hidden");
            $('#ene_fin_pro_form_project').removeClass("hidden");
            $('#img_ene_fin_proy_hvac').removeClass("hidden");
            $('#button_calcular_ene_fin').removeClass("hidden");
            $('#forms_cal_pre').addClass("hidden");

            $('#forms_ene_fin_proy_edit').removeClass("hidden");  //forms editar
            $('#display_nuevo_retrofit_edit').addClass("hidden"); //forms editar
            $('#display_nuevo_project_edit').removeClass("hidden"); //forms editar
            //mantenimiento
            $('#mantenimiento_form_project').addClass("hidden");
            $('#'+mant_p).addClass("hidden");
            $('#simulaciones_update').addClass("hidden");
            $('#ene_fin_pro_hvac_update').removeClass("hidden");
            //$('#forms_cal_pre').removeClass("hidden");
            $('#mant_prev').addClass("hidden");
            $('#img_mantenimiento').addClass("hidden");
            $('#button_sigiuente_mantenimiento').addClass("hidden");


            $('#type_project_name').text('Nuevo');


            type_p.value = 1;

            $('#'+retro_p).addClass("hidden");
            $('#'+new_p).removeClass("hidden");
            $('#'+button_np).removeClass("hidden");
            $('#'+button_rp).addClass("hidden");
            //$('#'+button_np).prop("disabled", true);

            inactive_tarjets_retro('pn');

            /* pn.checked = true;
            pr.checked = false;
            man.checked = false; */
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
             //$('#type_project_selected').val(1);
        break;

        case 'pr':
            $('#simulaciones').addClass("hidden");
            $('#forms_ene_fin_proy').removeClass("hidden");
            $('#ene_fin_pro_form_project').removeClass("hidden");
            $('#img_ene_fin_proy_hvac').removeClass("hidden");
            $('#button_calcular_ene_fin').removeClass("hidden");
            $('#forms_cal_pre').addClass("hidden");

            $('#forms_ene_fin_proy_edit').removeClass("hidden");  //forms editar
            $('#display_nuevo_retrofit_edit').addClass("hidden"); //forms editar
            $('#display_nuevo_project_edit').removeClass("hidden"); //forms editar

            $('#'+mant_p).addClass("hidden");
            $('#mantenimiento_form_project').addClass("hidden");
            $('#mant_prev').addClass("hidden");
            $('#type_project_name').text('Retrofit');
            $('#img_mantenimiento').addClass("hidden");
            $('#button_sigiuente_mantenimiento').addClass("hidden");


            $('#simulaciones_update').addClass("hidden");
            $('#ene_fin_pro_hvac_update').removeClass("hidden");


            $('#'+retro_p).removeClass("hidden");
            type_p.value = 2;
            $('#'+retro_p).removeClass("hidden");
            $('#'+new_p).addClass("hidden");
            $('#'+button_rp).removeClass("hidden");
            $('#'+button_np).addClass("hidden");
            inactive_tarjets_retro('pr');

       /*  pn.checked = false;
        pr.checked = true;
        man.checked = false; */

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
            await traer_unidad_hvac_edit(id_project,1,1,'cUnidad_1_1_retro','csTipo_1_1_retro','csDisenio_1_1_retro','tipo_control_1_1_retro','dr_1_1_retro','ventilacion_1_1_retro','filtracion_1_1_retro','csMantenimiento_1_1_retro','lblCsTipo_1_1_retro'
            ,'capacidad_total_1_1_retro','costo_elec_1_1_retro','csStd_retro_1_1_cant','costo_recu_1_1_retro','csStd_1_1_retro'
            ,'maintenance_cost_1_1_retro','marca_1_1_retro','modelo_1_1_retro','yrs_vida_1_1_retro','const_an_rep_1_1','','tipo_ambiente_1_1_retro','proteccion_condensador_1_1_retro');
            //2_1
            await traer_unidad_hvac_edit(id_project,1,2,'cUnidad_2_1_retro','cheTipo_2_1_retro','cheDisenio_2_1_retro','tipo_control_2_1_retro','dr_2_1_retro','ventilacion_2_1_retro','filtracion_2_1_retro','csMantenimiento_2_1_retro','lblCsTipo_2_1_retro'
            ,'capacidad_total_2_1_retro','costo_elec_2_1_retro','csStd_cant_2_1_retro','costo_recu_2_1_retro','csStd_2_1_retro'
            ,'maintenance_cost_2_1_retro','marca_2_1_retro','modelo_2_1_retro','yrs_vida_2_1_retro','const_an_rep_2_1','action_submit_2_1_retro','tipo_ambiente_2_1_retro','proteccion_condensador_2_1_retro');
            //3_1
            await traer_unidad_hvac_edit(id_project,1,3,'cUnidad_3_1_retro','cheTipo_3_1_retro','cheDisenio_3_1_retro','tipo_control_3_1_retro','dr_3_1_retro','ventilacion_3_1_retro','filtracion_3_1_retro','cheMantenimiento_3_1_retro','lblCsTipo_3_1_retro'
            ,'capacidad_total_3_1_retro','costo_elec_3_1_retro','csStd_cant_3_1_retro','costo_recu_3_1_retro','csStd_3_1_retro'
            ,'maintenance_cost_3_1_retro','marca_3_1_retro','modelo_3_1_retro','yrs_vida_3_1_retro','const_an_rep_3_1','action_submit_3_1_retro','tipo_ambiente_2_1_retro','proteccion_condensador_2_1_retro');
            //se actualiza proyecto retro
        }

        $('#costo_anual_reparaciones_2_1_retro').addClass("hidden");
        $('#costo_anual_reparaciones_3_1_retro').addClass("hidden");

        $('#inv_ini_capex_2_1_retro').removeClass("hidden");
        $('#inv_ini_capex_2_1_mant').addClass("hidden");
        $('#inv_ini_capex_3_1_retro').removeClass("hidden");
        $('#inv_ini_capex_3_1_mant').addClass("hidden");
        $('#button_inactive_2_1_mant').addClass("hidden");
        $('#button_inactive_2_1_retro').removeClass("hidden");
        $('#button_inactive_3_1_retro').removeClass("hidden");
        $('#button_inactive_3_1_mant').addClass("hidden");
        //$('#type_project_selected').val(2);
        break;

        case 'man':

        if(parseInt(type_p_aux) === 1 || parseInt(type_p_aux) === 2 ){
                action_submit_send.value = 'store';
                //se da de alta nuevas soluciones tipo proyecto retrofit
            }
         //si tipo es igual a 1
        if(parseInt(type_p_aux) === 3 ){
                action_submit_send.value = 'update';
                //se actualiza proyecto nuevo
        }

            $('#simulaciones').addClass("hidden");
            $('#simulaciones_update').addClass("hidden");
            $('#forms_ene_fin_proy').addClass("hidden");
            $('#'+mant_p).removeClass("hidden");  //mantenimiento form
            $('#forms_cal_pre').removeClass("hidden");
            $('#ene_fin_pro_form_project').addClass("hidden");
            $('#button_calcular_ene_fin').addClass("hidden");
            $('#mantenimiento_form_project').removeClass("hidden");
            $('#mant_prev').removeClass("hidden");
            $('#button_sigiuente_mantenimiento').removeClass("hidden");

            $('#forms_ene_fin_proy_edit').addClass("hidden");
            $('#display_nuevo_retrofit_edit').addClass("hidden");
            $('#display_nuevo_project_edit').addClass("hidden");

            $('#img_ene_fin_proy_hvac').addClass("hidden");
            $('#img_mantenimiento').removeClass("hidden");
            set_options_factor_mantenimiento();
            set_options_factor_acceso();
            set_options_estado_unidad();



            type_p.value = 3;
        break;

        default:
            break;
    }

  }
                                       //value,new_p,retro_p,mant_p,button_np,button_rp,action,type_p_aux
  async function check_form_proy_edit(type_p,id_project,display_mant){

    calcular_p_n = $('#calcular_p_n_Edit');
    calcular_p_r = $('#calcular_p_r_Edit');

    if(type_p == 1 || type_p == 0){
        $('#forms_ene_fin_proy_edit').removeClass("hidden");
        $('#display_nuevo_project_edit').removeClass("hidden");
        $('#display_nuevo_retrofit_edit').addClass("hidden");

        $('#type_p').val(1);
        $('#forms_cal_pre').addClass("hidden");
        $('#type_project_name').text('Nuevo');
        calcular_p_n.removeClass("hidden");
        calcular_p_r.addClass("hidden");
        $('#display_mant').addClass("hidden");

        $('#button_next_mantenimiento_noadicionales').removeClass("hidden");
        $('#button_next_mantenimiento_noadicionales_edit').addClass("hidden");

        $('#save_button_mantenimiento_edit').addClass("hidden");
        $('#save_button_mantenimiento').removeClass("hidden");

    }

    if(type_p == 2 ){
        $('#forms_ene_fin_proy_edit').removeClass("hidden");
        $('#display_nuevo_retrofit_edit').removeClass("hidden");
        $('#display_nuevo_project_edit').addClass("hidden");
        $('#type_p').val(type_p);
        $('#display_mant').addClass("hidden");
        $('#type_project_name').text('Retrofit');
        calcular_p_n.addClass("hidden");
        //calcular_p_n.attr('disabled', 'disabled');
        calcular_p_r.removeClass("hidden");
        await traer_unidad_hvac_edit(id_project,1,1,'cUnidad_1_1_retro','csTipo_1_1_retro','csDisenio_1_1_retro','tipo_control_1_1_retro','dr_1_1_retro','ventilacion_1_1_retro','filtracion_1_1_retro','csMantenimiento_1_1_retro','lblCsTipo_1_1_retro'
        ,'capacidad_total_1_1_retro','costo_elec_1_1_retro','csStd_retro_1_1_cant','costo_recu_1_1_retro','csStd_1_1_retro'
        ,'maintenance_cost_1_1_retro','marca_1_1_retro','modelo_1_1_retro','yrs_vida_1_1_retro','const_an_rep_1_1','','tipo_ambiente_1_1_retro','proteccion_condensador_1_1_retro');

        inactive_tarjets_retro('pr');
        $('#forms_cal_pre').addClass("hidden");
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

        $('#button_next_mantenimiento_noadicionales').removeClass("hidden");
        $('#button_next_mantenimiento_noadicionales_edit').addClass("hidden");

        $('#save_button_mantenimiento_edit').addClass("hidden");
        $('#save_button_mantenimiento').removeClass("hidden");

    }

    if(type_p == 3){
        await traer_mantenimiento_medio_ambiente(id_project);

        $('#save_button_mantenimiento_edit').removeClass("hidden");
        $('#save_button_mantenimiento').addClass("hidden");

        $('#forms_ene_fin_proy_edit').addClass("hidden");
        $('#display_nuevo_retrofit_edit').addClass("hidden");
        $('#display_nuevo_project_edit').addClass("hidden");
        $('#type_p').val(type_p);

        $('#display_mant').removeClass("hidden");
            $('#simulaciones_update').addClass("hidden");
            $('#forms_ene_fin_proy').addClass("hidden");
            $('#img_ene_fin_proy_hvac').addClass("hidden");
            $('#img_mantenimiento').removeClass("hidden");
            //$('#'+mant_p).removeClass("hidden");  //mantenimiento form
            $('#forms_cal_pre').removeClass("hidden");
            $('#ene_fin_pro_form_project').addClass("hidden");
            $('#button_calcular_ene_fin').addClass("hidden");

            $('#mantenimiento_form_project').removeClass("hidden");
            $('#mant_prev').removeClass("hidden");
            $('#button_sigiuente_mantenimiento').removeClass("hidden");


            set_options_factor_mantenimiento();
            set_options_factor_acceso();
            set_options_estado_unidad();
            type_p.value = 3;


        calcular_p_n.addClass("hidden");
        calcular_p_r.addClass("hidden");
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
        set_yrs_tarjet($('#yrs_life_ed_mantenimiento').val(),'yrs_vida_mantenimiento');
        set_options_factor_mantenimiento_edit(medio_ambiente);
        set_horas_diarias();

        $('#button_next_mantenimiento_noadicionales').addClass("hidden");
        $('#button_next_mantenimiento_noadicionales_edit').removeClass("hidden");



    }


  }

 function set_options_factor_mantenimiento_edit(medio_ambiente){


    var token = $("#token").val();
    var endpoint = "/set_options_factor_mantenimiento";
    var ima =  $('#idioma').val();
    $.ajax({
        url: endpoint,
        type: 'get',

        headers: { 'X-CSRF-TOKEN': token },
        success: function(response) {
            $('#tipo_ambiente_mantenimiento').empty();
            check_val_text('tipo_ambiente_mantenimiento',ima)
            response.forEach(res => {
                $('#tipo_ambiente_mantenimiento').append($('<option>', {
                    value: res.id,
                    text: res.factor
                }));
            });

            $("#tipo_ambiente_mantenimiento").find('option[value="' + medio_ambiente + '"]').prop("selected", "selected");;
        },
        error: function(xhr, status, error) {
            console.error('Error al enviar los datos:', error);
        }
    });
    }

  async function traer_mantenimiento_medio_ambiente(id){

    $.ajax({
        type: 'get',
        url: '/traer_mantenimiento_medio_ambiente/'+id,
        success: await function (response) {
            set_options_factor_mantenimiento_edit(response)
            return response;
        },
        error: function (responsetext) {

        }
    });
  }

  function send_marcas_to(id,val,equipo){

    var ima =  $('#idioma').val();
        $.ajax({
            type: 'get',
            url: '/send_marcas_equipo/'+equipo,
            success: function (response) {
                $("#"+id).empty();
                var marca_1_1_retro = id;
                check_val_text(marca_1_1_retro,ima);
                response.map((marca, i) => {
                    $('#'+id).append($('<option>', {
                        value: marca.id,
                        text: marca.marca,
                    }));
                });
                console.log(id,val,equipo);

                $("#"+id).find('option[value="' + val + '"]').prop("selected", "selected");
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

                var marca_1_1_retro = 'marca_1_1_retro';
                check_val_text(marca_1_1_retro,ima);

                response.map((marca, i) => {
                    $('#marca_1_1_retro').append($('<option>', {
                        value: marca.id,
                        text: marca.marca,
                    }));
                });

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
                 response.map((marca, i) => {
                     $('#marca_2_1_retro').append($('<option>', {
                         value: marca.id,
                         text: marca.marca,
                     }));
                 });

                  //retro modal 2_1

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


   //retro modal
                 var marca_1_1_retro = 'marca_1_1_retro';
                 check_val_text(marca_1_1_retro,ima);

                 response.map((marca, i) => {
                     $('#marca_1_1_retro').append($('<option>', {
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
    //check marca generico
    $.ajax({
        type: 'get',
        url: '/check_marca/'+value,
        success: function (response) {
          if (response.marca == 'Genérico') {
            $.ajax({
                type: 'get',
                url: '/send_modelos/'+value,
                success: function (response) {
                    $('#'+id).empty();
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
                return false;
          }else{

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
        },
        error: function (responsetext) {

        }
    });

    /* $.ajax({
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
    }); */
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



function new_model_or_marck_add(modelo,marcas_mod,eficiencia_modal,equipo,eficiencia_cant,equipo_id) {
    var modelo = $('#'+modelo).val();

    var marca = $('#'+marcas_mod).val();
    var eficiencia = $('#'+eficiencia_modal).val();
    var eficiencia_can = $('#'+eficiencia_cant).val();
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
        url: '/store_new_model/'+ marca +'/'+ modelo +"/"+ eficiencia +"/"+ equipo +"/"+eficiencia_can,
        success: function (response) {
            Swal.fire({
                title: 'Guardado!',
                icon: 'success',

            })
            $('#nuevo_modelo_modal').val('');
            $('#nuevo_modelo_modal_retro').val('');
            $('#'+marcas_mod).val('');
            $('#'+eficiencia_modal).val('');
            $('#'+eficiencia_cant).val(0);
            //$("#"+equipo_id).find('option[value="0"]').attr("selected", "selected");
            send_marcas_equipo(equipo);

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function delete_mark(id_marc,id_model,equipo,eficiencia) {
    var marca = $("#"+id_marc).val();
    var modelo = $("#"+id_model).val();
    var equipo_name = $("#"+equipo).val();
    Swal.fire({
        title: '¿Eliminar?',
        text: "",
        showDenyButton: true,
        showConfirmButton: true,
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#FF6600',
        denyButtonText: `Eliminar Modelo: `+modelo,
        confirmButtonText:`Eliminar Marca: `+marca,
        confirmButtonColor: '#3182ce',

    }).then((result) => {
        var token = $("#token").val();
        if (result.isDenied) {
            $.ajax({
                url: "/delete_modele/" + marca +"/"+modelo  +"/"+equipo_name,
                headers: { 'X-CSRF-TOKEN': token },
                type: 'post',
                dataType: 'json',
                success: function (response) {
                    $("#"+id_marc).trigger("change");
                    $("#"+eficiencia).val('0');
                    Swal.fire(
                        'Eliminado!',
                        'success'
                    )
                    /* $('#marca_modal').val('');
                    send_marcas(); */
                }
            });
        }

        if (result.isConfirmed) {
            $.ajax({
                url: "/delete_marke/" + marca +"/"+"_"+"/"+equipo_name,
                headers: { 'X-CSRF-TOKEN': token },
                type: 'post',
                dataType: 'json',
                success: function (response) {
                    $("#"+equipo).trigger("change");
                    $('#'+id_model).val('');
                    $("#"+eficiencia).val(0);
                    Swal.fire(
                        'Eliminado!',
                        'success'
                    )
                    /* $('#marca_modal').val('');
                    send_marcas(); */
                }
            });
        }

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

            response.map((cat_ed, i) => {
                $('#cat_edi_mantenimiento').append($('<option>', {
                    value: cat_ed.id,
                    text: cat_ed.name
                }));
            });

        },
        error: function (responsetext) {

        }
    });
}

function traer_t_edif(id_cat,id,ima) {

    var ima =  $('#idioma').val();

    $.ajax({
        type: 'get',
        url: '/get_cat_edi/'+ id_cat,
        success: function (response) {

            var tipo_edificio = 'tipo_edificio';
            check_val_text(id,ima);
            $('#count_'+id).val(0);
            checksuma();
            response.map((cat_ed, i) => {
                $('#'+id).append($('<option>', {
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

        ////
        var tipo_ambiente_1_1 =$('#tipo_ambiente_1_1');
        var tipo_ambiente_1_1_count = $('#tipo_ambiente_1_1_count').val();

        if(tipo_ambiente_1_1.val() == 0 || tipo_ambiente_1_1.val() == null){

        tipo_ambiente_1_1.css("border-color", "red")
        tipo_ambiente_1_1_count = 1;
         $('#tipo_ambiente_1_1_count').val(tipo_ambiente_1_1_count);

        }else if (tipo_ambiente_1_1.val() != 0 || tipo_ambiente_1_1.val() != null) {

            tipo_ambiente_1_1_count = 0;
         $('#tipo_ambiente_1_1_count').val(tipo_ambiente_1_1_count);

        }
        ////

        ////
        var proteccion_condensador_1_1 =$('#proteccion_condensador_1_1');
        var proteccion_condensador_1_1_count = $('#proteccion_condensador_1_1_count').val();

        if(proteccion_condensador_1_1.val() == 0 || proteccion_condensador_1_1.val() == null){

            proteccion_condensador_1_1.css("border-color", "red")
        proteccion_condensador_1_1_count = 1;
         $('#proteccion_condensador_1_1_count').val(proteccion_condensador_1_1_count);

        }else if (proteccion_condensador_1_1.val() != 0 || proteccion_condensador_1_1.val() != null) {

            proteccion_condensador_1_1_count = 0;
         $('#proteccion_condensador_1_1_count').val(proteccion_condensador_1_1_count);

        }
        ////

       var count_inps_1_1 =  tipo_ambiente_1_1_count + proteccion_condensador_1_1_count + tipo_equipo_1_1_count + capacidad_total_1_1_count + costo_elec_1_1_count + dr_1_1_count + csStd_cant_1_1_count + tipo_control_1_count + csMantenimiento_1_1_count + csDisenio_1_1_count + hrsEnfriado_1_1_count + cheValorS_1_1_count  + ventilacion_1_1_count + filtracion_1_1_count;

       if(count_inps_1_1>0){
        trans_sols_valid(idm);
                    return false;
                    }

    }else{
        trans_sols_valid(idm);
        return false;
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

        ////
        var tipo_ambiente_1_2 =$('#tipo_ambiente_1_2');
        var tipo_ambiente_1_2_count = $('#tipo_ambiente_1_2_count').val();

        if(tipo_ambiente_1_2.val() == 0 || tipo_ambiente_1_2.val() == null){

        tipo_ambiente_1_2.css("border-color", "red")
        tipo_ambiente_1_2_count = 1;
         $('#tipo_ambiente_1_2_count').val(tipo_ambiente_1_2_count);

        }else if (tipo_ambiente_1_2.val() != 0 || tipo_ambiente_1_2.val() != null) {

            tipo_ambiente_1_2_count = 0;
         $('#tipo_ambiente_1_2_count').val(tipo_ambiente_1_2_count);

        }
        ////

        ////
        var proteccion_condensador_1_2 =$('#proteccion_condensador_1_2');
        var proteccion_condensador_1_2_count = $('#proteccion_condensador_1_2_count').val();

        if(proteccion_condensador_1_2.val() == 0 || proteccion_condensador_1_2.val() == null){

            proteccion_condensador_1_2.css("border-color", "red")
        proteccion_condensador_1_2_count = 1;
         $('#proteccion_condensador_1_2_count').val(proteccion_condensador_1_2_count);

        }else if (proteccion_condensador_1_2.val() != 0 || proteccion_condensador_1_2.val() != null) {

            proteccion_condensador_1_2_count = 0;
         $('#proteccion_condensador_1_2_count').val(proteccion_condensador_1_2_count);

        }
        ////

            var count_inps_1_2 = csTipo_1_2_count +
            capacidad_tota_1_2_count + costo_elec_1_2_count
            + dr_1_2_count + csStd_1_2_count +
            tipo_control_1_2_count + csMantenimiento_1_2_count +
            csDisenio_1_2_count + hrsEnfriado_1_2_count + cheValorS_1_2_count+ ventilacion_1_2_count + filtracion_1_2_count + tipo_ambiente_1_2_count + proteccion_condensador_1_2_count;
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

                           ////
        var tipo_ambiente_2_1 =$('#tipo_ambiente_2_1');
        var tipo_ambiente_2_1_count = $('#tipo_ambiente_2_1_count').val();

        if(tipo_ambiente_2_1.val() == 0 || tipo_ambiente_2_1.val() == null){

            tipo_ambiente_2_1.css("border-color", "red")
        tipo_ambiente_2_1_count = 1;
         $('#tipo_ambiente_2_1_count').val(tipo_ambiente_2_1_count);

        }else if (tipo_ambiente_2_1.val() != 0 || tipo_ambiente_2_1.val() != null) {

            tipo_ambiente_2_1_count = 0;
         $('#tipo_ambiente_2_1_count').val(tipo_ambiente_2_1_count);

        }
        ////

        ////
        var proteccion_condensador_2_1 =$('#proteccion_condensador_2_1');
        var proteccion_condensador_2_1_count = $('#proteccion_condensador_2_1_count').val();

        if(proteccion_condensador_2_1.val() == 0 || proteccion_condensador_2_1.val() == null){

            proteccion_condensador_2_1.css("border-color", "red")
        proteccion_condensador_2_1_count = 1;
         $('#proteccion_condensador_2_1_count').val(proteccion_condensador_2_1_count);

        }else if (proteccion_condensador_2_1.val() != 0 || proteccion_condensador_2_1.val() != null) {

            proteccion_condensador_2_1_count = 0;
         $('#proteccion_condensador_2_1_count').val(proteccion_condensador_2_1_count);

        }
        ////

                var count_inps_2_1 = cheTipo_2_1_count + capacidad_total_2_1_count + costo_elec_2_1_count + dr_2_1_count + csStd_cant_2_1_count + tipo_control_2_1_count + csMantenimiento_2_1_count + cheDisenio_2_1_count +
                hrsEnfriado_2_1_count + cheValorS_2_1_count + ventilacion_2_1_count + filtracion_2_1_count + tipo_ambiente_2_1_count + proteccion_condensador_2_1_count;
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

                           ////
                           var tipo_ambiente_2_2 =$('#tipo_ambiente_2_2');
                           var tipo_ambiente_2_2_count = $('#tipo_ambiente_2_2_count').val();

                           if(tipo_ambiente_2_2.val() == 0 || tipo_ambiente_2_2.val() == null){

                               tipo_ambiente_2_2.css("border-color", "red")
                               tipo_ambiente_2_2_count = 1;
                            $('#tipo_ambiente_2_2_count').val(tipo_ambiente_2_2_count);

                           }else if (tipo_ambiente_2_2.val() != 0 || tipo_ambiente_2_2.val() != null) {

                               tipo_ambiente_2_2_count = 0;
                            $('#tipo_ambiente_2_2_count').val(tipo_ambiente_2_2_count);

                           }
                           ////

                           ////
                           var proteccion_condensador_2_2 =$('#proteccion_condensador_2_2');
                           var proteccion_condensador_2_2_count = $('#proteccion_condensador_2_2_count').val();

                           if(proteccion_condensador_2_2.val() == 0 || proteccion_condensador_2_2.val() == null){

                               proteccion_condensador_2_2.css("border-color", "red")
                           proteccion_condensador_2_2_count = 1;
                            $('#proteccion_condensador_2_2_count').val(proteccion_condensador_2_2_count);

                           }else if (proteccion_condensador_2_2.val() != 0 || proteccion_condensador_2_2.val() != null) {

                               proteccion_condensador_2_2_count = 0;
                            $('#proteccion_condensador_2_2_count').val(proteccion_condensador_2_2_count);

                           }
                           ////


                    /*       alert(count_inps_2_1); */
                var count_inps_2_2 = cheTipo_2_2_count
                + capacidad_total_2_2_count
                + costo_elec_2_2_count
                + dr_2_2_count + csStd_cant_2_2_count
                 + tipo_control_2_2_count + cheMantenimiento_2_2_count
                 + cheDisenio_2_2_count + hrsEnfriado_2_2_count + cheValorS_2_2_count+ventilacion_2_2_count+filtracion_2_2_count+tipo_ambiente_2_2_count+proteccion_condensador_2_2_count;

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



                    ////
                    var tipo_ambiente_3_1 =$('#tipo_ambiente_3_1');
                    var tipo_ambiente_3_1_count = $('#tipo_ambiente_3_1_count').val();

                    if(tipo_ambiente_3_1.val() == 0 || tipo_ambiente_3_1.val() == null){

                        tipo_ambiente_3_1.css("border-color", "red")
                        tipo_ambiente_3_1_count = 1;
                    $('#tipo_ambiente_3_1_count').val(tipo_ambiente_3_1_count);

                    }else if (tipo_ambiente_3_1.val() != 0 || tipo_ambiente_3_1.val() != null) {

                        tipo_ambiente_3_1_count = 0;
                    $('#tipo_ambiente_3_1_count').val(tipo_ambiente_3_1_count);

                    }
                           ////

                           ////
                    var proteccion_condensador_3_1 =$('#proteccion_condensador_3_1');
                    var proteccion_condensador_3_1_count = $('#proteccion_condensador_3_1_count').val();

                    if(proteccion_condensador_3_1.val() == 0 || proteccion_condensador_3_1.val() == null){

                    proteccion_condensador_3_1.css("border-color", "red")
                    proteccion_condensador_3_1_count = 1;
                    $('#proteccion_condensador_3_1_count').val(proteccion_condensador_3_1_count);

                    }else if (proteccion_condensador_3_1.val() != 0 || proteccion_condensador_3_1.val() != null) {

                         proteccion_condensador_3_1_count = 0;
                    $('#proteccion_condensador_3_1_count').val(proteccion_condensador_3_1_count);

                    }
                           ////

                var count_inps_3_1 = cheTipo_3_1_count + capacidad_total_3_1_count + costo_elec_3_1_count + dr_3_1_count + cheStd_3_1_count + tipo_control_3_1_count + cheMantenimiento_3_1_count + cheDisenio_3_1_count + hrsEnfriado_3_1_count + cheValorS_3_1_count+ventilacion_3_1_count+filtracion_3_1_count + tipo_ambiente_3_1_count + proteccion_condensador_3_1_count;
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


                    ////
                    var tipo_ambiente_3_2 =$('#tipo_ambiente_3_2');
                    var tipo_ambiente_3_2_count = $('#tipo_ambiente_3_2_count').val();

                    if(tipo_ambiente_3_2.val() == 0 || tipo_ambiente_3_2.val() == null){

                        tipo_ambiente_3_2.css("border-color", "red")
                        tipo_ambiente_3_2_count = 1;
                    $('#tipo_ambiente_3_2_count').val(tipo_ambiente_3_2_count);

                    }else if (tipo_ambiente_3_2.val() != 0 || tipo_ambiente_3_2.val() != null) {

                        tipo_ambiente_3_2_count = 0;
                    $('#tipo_ambiente_3_2_count').val(tipo_ambiente_3_2_count);

                    }
                        ////

                        ////
                    var proteccion_condensador_3_2 =$('#proteccion_condensador_3_2');
                    var proteccion_condensador_3_2_count = $('#proteccion_condensador_3_2_count').val();

                    if(proteccion_condensador_3_2.val() == 0 || proteccion_condensador_3_2.val() == null){

                    proteccion_condensador_3_2.css("border-color", "red")
                    proteccion_condensador_3_2_count = 1;
                    $('#proteccion_condensador_3_2_count').val(proteccion_condensador_3_2_count);

                    }else if (proteccion_condensador_3_2.val() != 0 || proteccion_condensador_3_2.val() != null) {

                        proteccion_condensador_3_2_count = 0;
                    $('#proteccion_condensador_3_2_count').val(proteccion_condensador_3_2_count);

                    }
                        ////



                var count_inps_3_2 = cheTipo_3_2_count +
                capacidad_total_3_2_count + costo_elec_3_2_count +
                dr_3_2_count + csStd_cant_3_2_count + tipo_control_3_2_count +
                cheMantenimiento_3_2_count + cheDisenio_3_2_count +
                hrsEnfriado_3_2_count + cheValorS2_3_2_count +tipo_ambiente_3_2_count +proteccion_condensador_3_2_count;
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


                    ////tipo_ambiente_1_1_retro

                    var tipo_ambiente_1_1_retro =$('#tipo_ambiente_1_1_retro');
                    var tipo_ambiente_1_1_retro_count = $('#tipo_ambiente_1_1_retro_count').val();

                    if(tipo_ambiente_1_1_retro.val() == 0 || tipo_ambiente_1_1_retro.val() == null){

                        tipo_ambiente_1_1_retro.css("border-color", "red")
                        tipo_ambiente_1_1_retro_count = 1;
                    $('#tipo_ambiente_1_1_retro_count').val(tipo_ambiente_1_1_retro_count);

                    }else if (tipo_ambiente_1_1_retro.val() != null) {

                        tipo_ambiente_1_1_retro_count = 0;
                    $('#tipo_ambiente_1_1_retro_count').val(tipo_ambiente_1_1_retro_count);

                    }
                        ////

                        ////
                    var proteccion_condensador_1_1_retro =$('#proteccion_condensador_1_1_retro');
                    var proteccion_condensador_1_1_retro_count = $('#proteccion_condensador_1_1_retro_count').val();

                    if(proteccion_condensador_1_1_retro.val() == 0 || proteccion_condensador_1_1_retro.val() == null){

                    proteccion_condensador_1_1_retro.css("border-color", "red")
                    proteccion_condensador_1_1_retro_count = 1;
                    $('#proteccion_condensador_1_1_retro_count').val(proteccion_condensador_1_1_retro_count);

                    }else if (proteccion_condensador_1_1_retro.val() != 0 || proteccion_condensador_1_1_retro.val() != null) {

                        proteccion_condensador_1_1_retro_count = 0;
                    $('#proteccion_condensador_1_1_retro_count').val(proteccion_condensador_1_1_retro_count);

                    }
                        ////


                var count_inps_1_1 = tipo_equipo_1_1_count + marca_1_1_retro_count + modelo_1_1_retro_count + yrs_vida_1_1_retro_count + csStd_retro_1_1_count + capacidad_total_1_1_retro_count + csDisenio_1_1_retro_count + costo_elec_1_1_retro_count + hrsEnfriado_1_1_retro_count + tipo_control_1_1_retro_count + dr_1_1_retro_count + csMantenimiento_1_1_retro_count + costo_recu_1_1_retro_count + maintenance_cost_1_1_retro_count + const_an_rep_1_1_count +ventilacion_1_1_retro_count+filtracion_1_1_retro_count  +  tipo_ambiente_1_1_retro_count  +  proteccion_condensador_1_1_retro_count;

                if(count_inps_1_1>0){
                    trans_sols_valid(idm);
                                return false;
                                }

                }else{
                    trans_sols_valid(idm);
                    return false;
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
////tipo_ambiente_1_1_retro

                    var tipo_ambiente_2_1_retro =$('#tipo_ambiente_2_1_retro');
                    var tipo_ambiente_2_1_retro_count = $('#tipo_ambiente_2_1_retro_count').val();

                    if(tipo_ambiente_2_1_retro.val() == 0 || tipo_ambiente_2_1_retro.val() == null){

                        tipo_ambiente_2_1_retro.css("border-color", "red")
                        tipo_ambiente_2_1_retro_count = 1;
                    $('#tipo_ambiente_2_1_retro_count').val(tipo_ambiente_2_1_retro_count);

                    }else if (tipo_ambiente_2_1_retro.val() != null) {

                        tipo_ambiente_2_1_retro_count = 0;
                    $('#tipo_ambiente_2_1_retro_count').val(tipo_ambiente_2_1_retro_count);

                    }
                        ////

                        ////
                    var proteccion_condensador_2_1_retro =$('#proteccion_condensador_2_1_retro');
                    var proteccion_condensador_2_1_retro_count = $('#proteccion_condensador_2_1_retro_count').val();

                    if(proteccion_condensador_2_1_retro.val() == 0 || proteccion_condensador_2_1_retro.val() == null){

                    proteccion_condensador_2_1_retro.css("border-color", "red")
                    proteccion_condensador_2_1_retro_count = 1;
                    $('#proteccion_condensador_2_1_retro_count').val(proteccion_condensador_2_1_retro_count);

                    }else if (proteccion_condensador_2_1_retro.val() != 0 || proteccion_condensador_2_1_retro.val() != null) {

                        proteccion_condensador_2_1_retro_count = 0;
                    $('#proteccion_condensador_2_1_retro_count').val(proteccion_condensador_2_1_retro_count);

                    }
    /////

                var count_inps_2_1 = cheTipo_2_1_count_retro + marca_2_1_retro_count + modelo_2_1_retro_count + yrs_vida_2_1_retro_count + csStd_2_1_retro_count + capacidad_total_2_1_retro_count + cheDisenio_2_1_retro_count + costo_elec_2_1_retro_count + hrsEnfriado_2_1_retro_count + tipo_control_2_1_retro_count + dr_2_1_retro_count + csMantenimiento_2_1_retro_count + costo_recu_1_1_retro_count + maintenance_cost_2_1_retro_count +ventilacion_2_1_retro_count+filtracion_2_1_retro_count +  tipo_ambiente_2_1_retro_count + proteccion_condensador_2_1_retro_count;

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
////tipo_ambiente_1_1_retro

var tipo_ambiente_3_1_retro =$('#tipo_ambiente_3_1_retro');
var tipo_ambiente_3_1_retro_count = $('#tipo_ambiente_3_1_retro_count').val();

if(tipo_ambiente_3_1_retro.val() == 0 || tipo_ambiente_3_1_retro.val() == null){

    tipo_ambiente_3_1_retro.css("border-color", "red")
    tipo_ambiente_3_1_retro_count = 1;
$('#tipo_ambiente_3_1_retro_count').val(tipo_ambiente_3_1_retro_count);

}else if (tipo_ambiente_3_1_retro.val() != null) {

    tipo_ambiente_3_1_retro_count = 0;
$('#tipo_ambiente_3_1_retro_count').val(tipo_ambiente_3_1_retro_count);

}
    ////

    ////
var proteccion_condensador_3_1_retro =$('#proteccion_condensador_3_1_retro');
var proteccion_condensador_3_1_retro_count = $('#proteccion_condensador_3_1_retro_count').val();

if(proteccion_condensador_3_1_retro.val() == 0 || proteccion_condensador_3_1_retro.val() == null){

proteccion_condensador_3_1_retro.css("border-color", "red")
proteccion_condensador_3_1_retro_count = 1;
$('#proteccion_condensador_3_1_retro_count').val(proteccion_condensador_3_1_retro_count);

}else if (proteccion_condensador_3_1_retro.val() != 0 || proteccion_condensador_3_1_retro.val() != null) {

    proteccion_condensador_3_1_retro_count = 0;
$('#proteccion_condensador_3_1_retro_count').val(proteccion_condensador_3_1_retro_count);

}
/////

                var count_inps_3_1 = cheTipo_3_1_retro_count + marca_3_1_retro_count + modelo_3_1_retro_count + yrs_vida_3_1_retro_count + cheStd_3_1_retro_count + capacidad_total_3_1_retro_count + cheDisenio_3_1_retro_count + costo_elec_3_1_retro_count + hrsEnfriado_3_1_retro_count + tipo_control_3_1_retro_count + dr_3_1_retro_count + cheMantenimiento_3_1_retro_count + costo_recu_3_1_retro_count + maintenance_cost_3_1_retro_count+ventilacion_3_1_retro_count+filtracion_3_1_retro_count +tipo_ambiente_3_1_retro_count+proteccion_condensador_3_1_retro_count;

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
   if (input_select.val() != 0 || input_select.val() != null ){
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


async function traer_unidad_hvac(id_project, num_sol, num_enf, cUnidad, csTipo, csDisenio, tipo_control, dr,
    Mantenimiento, lblCsTipo, capacidad_total, costo_elec, csStd_cant,
    cheValorS, num_solu, action_submit, csStd, maintenance_cost, marca, modelo, ventilacion, filtracion, tipo_ambiente_1_1, proteccion_condensador_1_1, proteccion_condensador_value,unidad_capacidad_tot) {

    try {
        const res = await $.ajax({
            type: 'get',
            url: "/traer_unidad_hvac/" + id_project + "/" + num_sol + "/" + num_enf,
        });

        if (res) {
            let dollarUSLocale = Intl.NumberFormat('en-US');
            $("#" + capacidad_total).val(dollarUSLocale.format(res.val_unidad.capacidad_tot));
            $("#" + costo_elec).val('$' + dollarUSLocale.format(res.val_unidad.costo_elec));
            $("#" + csStd_cant).val(dollarUSLocale.format(res.val_unidad.eficencia_ene_cant));
            $("#" + cheValorS).val('$' + dollarUSLocale.format(res.val_unidad.val_aprox));
            $("#" + maintenance_cost).val('$' + dollarUSLocale.format(res.val_unidad.costo_mantenimiento));
            $("#" + cUnidad).find('option[value="' + res.val_unidad.unidad_hvac + '"]').prop("selected", "selected");
            await unidadHvac(res.val_unidad.unidad_hvac, 1, csTipo,1);
            $("#" + csTipo).find('option[value="' + res.val_unidad.tipo_equipo + '"]').prop("selected", "selected");

            await change_diseño(res.val_unidad.tipo_equipo, 1, csDisenio, tipo_control, dr, ventilacion, filtracion, lblCsTipo);
            $("#" + csDisenio).find('option[value="' + res.val_unidad.tipo_diseño + '"]').prop("selected", "selected");
            //$("#" + csDisenio).trigger('change');
            await check_sin_doa(csDisenio,ventilacion,filtracion,csTipo);
            $("#" + tipo_control).find('option[value="' + res.val_unidad.tipo_control + '"]').prop("selected", "selected");
            $("#" + dr).find('option[value="' + res.val_unidad.dr + '"]').prop("selected", "selected");
            var ventilacion_val = Math.round(res.val_unidad.ventilacion * 100) / 100;

            $("#" + ventilacion).find('option[value="'+ventilacion_val+'"]').prop("selected", "selected");
            $("#" + filtracion).find('option[value="' + res.val_unidad.filtracion + '"]').prop("selected", "selected");
            $("#" + tipo_ambiente_1_1).find('option[value="' + res.val_unidad.tipo_ambiente + '"]').prop("selected", "selected");
            await show_prot_cond(res.val_unidad.tipo_ambiente, proteccion_condensador_1_1, 'new', 3, 'paises_edit');
            $("#" + proteccion_condensador_1_1).find('option[value="' + res.val_unidad.proteccion_condensador + '"]').prop("selected", "selected");
            $("#" + proteccion_condensador_value).val(res.val_unidad.proteccion_condensador_val);
            $("#" + Mantenimiento).find('option[value="' + res.val_unidad.mantenimiento + '"]').prop("selected", "selected");
            send_marcas_to(marca, res.val_unidad.id_marca, res.val_unidad.unidad_hvac);
            send_modelo_edit(res.val_unidad.id_marca, modelo, res.val_unidad.id_modelo);
            send_name(csDisenio);
            send_name_t_c(tipo_control);
            send_name_dr(dr);
            send_name_vent(ventilacion);
            send_name_filt(filtracion);
            check_chiller(res.val_unidad.unidad_hvac, csStd, res.val_unidad.type_p);
            if(unidad_capacidad_tot != '_'){
                $("#" + unidad_capacidad_tot).find('option[value="' + res.val_unidad.unid_med + '"]').prop("selected", "selected");
                cap_term_change(res.val_unidad.unid_med);
            }
            $("#" + csStd).find('option[value="' + res.val_unidad.eficencia_ene + '"]').attr("selected", "selected");

            if (num_solu !== '' && num_solu !== null) {
                $("#" + action_submit).val('update');
                $("#" + num_solu).removeClass("hidden");
                if (num_solu === 'sol_1_2' || num_solu === 'sol_2_2' || num_solu === 'sol_3_2') {
                    if (num_solu === 'sol_1_2') {
                        $('#base_border_bottom').css({ 'border-bottom': '2px solid', 'border-bottom-right-radius': '2px', 'border-bottom-left-radius': '2px' });
                    } else if (num_solu === 'sol_2_2') {
                        $('#2_border_bottom').css({ 'border-bottom': '2px solid', 'border-color': '#3182ce', 'border-bottom-right-radius': '2px', 'border-bottom-left-radius': '2px' });
                    } else if (num_solu === 'sol_3_2') {
                        $('#3_border_bottom').css({ 'border-bottom': '2px solid', 'border-color': '#3182ce', 'border-bottom-right-radius': '2px', 'border-bottom-left-radius': '2px' });
                    }
                }
            }


        }
    } catch (error) {
        console.error("Error en traer_unidad_hvac:", error);
    }
}


 async function traer_unidad_hvac_edit(id_project,num_sol,num_enf,cUnidad,csTipo,csDisenio,tipo_control,dr
    ,ventilacion,filtracion,Mantenimiento,lblCsTipo,capacidad_total,costo_elec,csStd_cant
    ,costo_recu,csStd,maintenance_cost,marca,modelo,yrs_vida,const_an_rep,action_submit,tipo_ambiente,proteccion_condensador,proteccion_condensador_value,unidad_capacidad_tot) {

        try {
            const res = await $.ajax({
                type: 'get',
                url: "/traer_unidad_hvac/" + id_project + "/" + num_sol + "/" +num_enf,
            });

            if (res){
                let dollarUSLocale = Intl.NumberFormat('en-US');
                $("#"+capacidad_total).val(dollarUSLocale.format(res.val_unidad.capacidad_tot));
                $("#"+costo_elec).val('$'+dollarUSLocale.format(res.val_unidad.costo_elec));
                $("#"+csStd_cant).val(dollarUSLocale.format(res.val_unidad.eficencia_ene_cant));
                $("#"+costo_recu).val('$'+dollarUSLocale.format(res.val_unidad.val_aprox));
                $("#"+yrs_vida).val(res.val_unidad.yrs_vida);

                $("#"+tipo_ambiente).find('option[value="' + res.val_unidad.tipo_ambiente + '"]').attr("selected", "selected");
                await show_prot_cond(res.val_unidad.tipo_ambiente,proteccion_condensador,'retro',res.val_unidad.yrs_vida,'paises_edit')

                $("#"+proteccion_condensador).find('option[value="' + res.val_unidad.proteccion_condensador + '"]').attr("selected", "selected");
                $("#"+proteccion_condensador_value).val(res.val_unidad.proteccion_condensador_val);

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

                $("#"+cUnidad).find('option[value="' + res.val_unidad.unidad_hvac + '"]').prop("selected", "selected");
                await unidadHvac(res.val_unidad.unidad_hvac,1,csTipo,1);
                $("#"+csTipo).find('option[value="' + res.val_unidad.tipo_equipo + '"]').prop("selected", "selected");
                await change_diseño(res.val_unidad.tipo_equipo,1,csDisenio,tipo_control,dr,ventilacion,filtracion,lblCsTipo);
                $("#"+csDisenio).find('option[value="' + res.val_unidad.tipo_diseño + '"]').prop("selected", "selected");
                 await check_sin_doa(csDisenio,ventilacion,filtracion,csTipo);
                $("#"+tipo_control).find('option[value="' + res.val_unidad.tipo_control + '"]').prop("selected", "selected");
                $("#"+dr).find('option[value="' + res.val_unidad.dr + '"]').prop("selected", "selected");

                var ventilacion_val = Math.round(res.val_unidad.ventilacion * 100) / 100;
                $("#"+ventilacion).find('option[value="' + ventilacion_val + '"]').prop("selected", "selected");
                $("#"+filtracion).find('option[value="' + res.val_unidad.filtracion + '"]').prop("selected", "selected");
                $("#"+Mantenimiento).find('option[value="' +   res.val_unidad.mantenimiento + '"]').prop("selected", "selected");
                send_marcas_to(marca,res.val_unidad.id_marca,res.val_unidad.unidad_hvac);
                send_modelo_edit(res.val_unidad.id_marca,modelo,res.val_unidad.id_modelo);
                send_name(csDisenio);
                send_name_t_c(tipo_control);
                send_name_dr(dr);
                send_name_filt(filtracion);
                send_name_vent(ventilacion);
                if(unidad_capacidad_tot != '_'){
                    $("#" + unidad_capacidad_tot).find('option[value="' + res.val_unidad.unid_med + '"]').prop("selected", "selected");
                    cap_term_change(res.val_unidad.unid_med);
                }
                check_chiller(res.val_unidad.unidad_hvac,csStd,res.val_unidad.type_p);
                $("#"+csStd).find('option[value="' + res.val_unidad.eficencia_ene + '"]').prop("selected", "selected");
                $("#"+action_submit).val('update');


            }

        } catch (error) {
            console.error("Error en traer_unidad_hvac:", error);
        }

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

    function check_inp_count_mantenimiento(count_id,id){
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

        checksuma_mant();

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

    function checksuma_mant(){
        count_cliente_pro_mantenimiento = $('#count_cliente_pro_mantenimiento').val();
        count_cat_edi_mantenimiento = $('#count_cat_edi_mantenimiento').val();
        count_paises_mantenimiento = $('#count_paises_mantenimiento').val();
        count_tipo_ambiente_mantenimiento = $('#count_tipo_ambiente_mantenimiento').val();
        count_ar_project_mantenimiento = $('#count_ar_project_mantenimiento').val();
        count_name_sitio_mantenimiento = $('#count_name_sitio_mantenimiento').val();
        count_tipo_edificio_mantenimiento = $('#count_tipo_edificio_mantenimiento').val();
        count_ciudad_mantenimiento = $('#count_ciudad_mantenimiento').val();
        count_velocidad_promedio_mantenimiento = $('#count_velocidad_promedio_mantenimiento').val();
        count_ocupacion_semanal_mantenimiento = $('#count_ocupacion_semanal_mantenimiento').val();
        count_personal_enviado = $('#count_personal_enviado_mantenimiento').val();
        count_porcent_hvac_mantenimiento = $('#count_porcent_hvac_mantenimiento').val();

       suma_inps = parseInt(count_cliente_pro_mantenimiento) + parseInt(count_cat_edi_mantenimiento) + parseInt(count_paises_mantenimiento)
       + parseInt(count_tipo_ambiente_mantenimiento) + parseInt(count_ar_project_mantenimiento) + parseInt(count_name_sitio_mantenimiento) + parseInt(count_tipo_edificio_mantenimiento) + parseInt(count_ciudad_mantenimiento)
       + parseInt(count_velocidad_promedio_mantenimiento) + parseInt(count_ocupacion_semanal_mantenimiento) + parseInt(count_personal_enviado) + parseInt(count_porcent_hvac_mantenimiento);
        console.log(count_personal_enviado);

       if(suma_inps == 12){
        $('#div_next_mantenimiento').removeClass("hidden");
        $('#div_next_h_mantenimiento').addClass("hidden");

       }

       if(suma_inps < 12){
        $('#div_next_mantenimiento').addClass("hidden");
        $('#div_next_h_mantenimiento').removeClass("hidden");

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
               console.log(response);

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

     function change_to_porcent(porcent,id){

        const myArray = porcent.split('%');
        if (myArray.length > 1) {
            check_porcent_max_min(myArray[0],id);
        }

        if (myArray.length==1) {
            check_porcent_max_min(porcent,id);
        }

     }

     function change_to_porcent_mantenimiento(porcent,id){
        var input_select = $('#'+id);
        const myArray = porcent.split('%');

            input_select.val(myArray[0] + '%');
     }

     function check_porcent_max_min(porcent,id){

        var input_select = $('#'+id);
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
                //$('#'+equipo).empty();
                /* $('#'+equipo).append($('<option>', {
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


function send_efi(value,id_input,id_input_cant){
    $.ajax({
        type: 'get',
        url: '/send_efi/'+ value,
        success: function (response) {
          /*   $("#"+id_input).find('option[value="' + response + '"]').prop('selected', true);
            $("#"+id_input).trigger("change"); */
            //console.log(id_input_cant);

            $('#'+id_input).empty();
            $('#'+id_input).append($('<option>', {
                value: response.eficiencia,
                text: response.eficiencia
            }));
            $('#'+id_input_cant).val(response.eficiencia_cantidad);
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

function send_efi_cant(value,id_input_cant){
    $.ajax({
        type: 'get',
        url: '/send_efi/'+ value,
        success: function (response) {
            $('#'+id_input_cant).val(response.eficiencia_cantidad);
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


async function show_prot_cond(tipo_ambiente_id,id_prot_comp,tipo_proyect,yrs,pais){
    var ima =  $('#idioma').val();
    var pais_val = $('#'+pais).val();

    switch (tipo_proyect) {
        case 'new':
            options_tipo_proyect(tipo_ambiente_id,id_prot_comp,ima,pais_val);
        break;

        case 'retro':

            options_tipo_proyect_retro(tipo_ambiente_id,id_prot_comp,yrs,ima,pais_val);
        break;

        default:
            break;
    }

}


function options_tipo_proyect(tipo_ambiente_id,id_prot_comp,ima,pais){

    switch (tipo_ambiente_id) {
        case 'no_agresivo':
            //check_val_text(id_prot_comp,ima);
            $('#'+id_prot_comp).empty();
            $('#'+id_prot_comp).append($('<option>', {
                value: 'sin_proteccion',
                text: 'Sin Protección'
            }));

            /* if(pais == 17){
                $('#'+id_prot_comp).append($('<option>', {
                    value: 'infiniguard',
                    text: 'Infiniguard®'
                }));
            }


            $('#'+id_prot_comp).append($('<option>', {
                value: 'cobre_cobre',
                text: 'Cobre - Cobre'
            })); */
        $("#"+id_prot_comp).trigger('change');
        break;

        case 'marino':
            check_val_text(id_prot_comp,ima);

            $('#'+id_prot_comp).append($('<option>', {
                value: 'sin_proteccion',
                text: 'Sin Protección'
            }));

             $('#'+id_prot_comp).append($('<option>', {
                value: 'liquido_coating_basico',
                text: 'Líquido o Coating Básico'
            }));

            if(pais == 17){
                $('#'+id_prot_comp).append($('<option>', {
                    value: 'infiniguard',
                    text: 'Infiniguard®'
                }));
            }
            $("#"+id_prot_comp).trigger('change');
        break;

        case 'contaminado':
            check_val_text(id_prot_comp,ima);
            $('#'+id_prot_comp).append($('<option>', {
                value: 'sin_proteccion',
                text: 'Sin Protección'
            }));

            $('#'+id_prot_comp).append($('<option>', {
                value: 'liquido_coating_basico',
                text: 'Líquido o Coating Básico'
            }));


            if(pais == 17){
                $('#'+id_prot_comp).append($('<option>', {
                    value: 'infiniguard',
                    text: 'Infiniguard®'
                }));
            }
                $("#"+id_prot_comp).trigger('change');
        break;

        default:
        break;
    }
}

function send_value_box(id_set,id_get,tipo_ambiente){
    tipo_ambiente_val =  $('#'+tipo_ambiente).val();


switch (tipo_ambiente_val) {
    case 'no_agresivo':

        value = $('#'+id_set).val();
        switch (value) {
             case 'sin_proteccion':
              $('#'+id_get).val(1);
             break;

             case 'infiniguard':

                 $('#'+id_get).val(0.98);
             break;

             case 'liquido_coating_basico':
                 $('#'+id_get).val(0.98);
             break;

             default:
             break;
         }

    break;

    case 'marino':

        value = $('#'+id_set).val();
        switch (value) {
             case 'sin_proteccion':

             //var value_sin_p =  Math.pow(1 - 0.04, 0);
             $('#'+id_get).val(0.9);
             break;

             case 'infiniguard':
                 $('#'+id_get).val(1.09);
             break;

             case 'liquido_coating_basico':
                 $('#'+id_get).val(1);
             break;

             default:
             break;
         }

    break;



    case 'contaminado':

    value = $('#'+id_set).val();
    switch (value) {
         case 'sin_proteccion':

         //var value_sin_p =  Math.pow(1 - 0.015, 0);
         $('#'+id_get).val(0.98);
         break;

         case 'infiniguard':
             $('#'+id_get).val(1.14);
         break;

         case 'liquido_coating_basico':
             $('#'+id_get).val(1.01);
         break;

         default:
         break;
     }

break


    default:
    break;
}


}

function send_value_box_retro(id_set,id_get,tipo_ambiente,yrs){
    tipo_ambiente_val =  $('#'+tipo_ambiente).val();

    yrs =  $('#'+yrs).val();

switch (tipo_ambiente_val) {
    case 'no_agresivo':

        value = $('#'+id_set).val();
        switch (value) {
             case 'sin_proteccion':
              $('#'+id_get).val(1);
             break;

             case 'infiniguard':

                 $('#'+id_get).val(0.99);
             break;

             case 'liquido_coating_basico':
                 $('#'+id_get).val(1);
             break;

             default:
             break;
         }

    break;

    case 'marino':

        value = $('#'+id_set).val();
        switch (value) {
             case 'sin_proteccion':

             var value_sin_p =  Math.pow(1 - 0.04, parseInt(yrs));
             $('#'+id_get).val(value_sin_p);
             break;

             case 'infiniguard':
                 $('#'+id_get).val(0.98);
             break;

             case 'liquido_coating_basico':
                 $('#'+id_get).val(1.05);
             break;

             default:
             break;
         }

    break;



    case 'contaminado':

    value = $('#'+id_set).val();
    switch (value) {
         case 'sin_proteccion':

         var value_sin_p =  Math.pow(1 - 0.015, parseInt(yrs));
         $('#'+id_get).val(value_sin_p);
         break;

         case 'infiniguard':
             $('#'+id_get).val(0.985);
         break;

         case 'liquido_coating_basico':
             $('#'+id_get).val(1.005);
         break;

         default:
         break;
     }

break


    default:
    break;
}


}

function  options_tipo_proyect_retro(tipo_ambiente_id,id_prot_comp,yrs,ima,pais){
    var yrs_val =  $('#'+yrs).val();
    switch (tipo_ambiente_id) {
        case 'no_agresivo':
            //check_val_text(id_prot_comp,ima);
            $('#'+id_prot_comp).empty();
            $('#'+id_prot_comp).append($('<option>', {
                value: 'sin_proteccion',
                text: 'Sin Protección'
            }));

            /* if(pais == 17){
                $('#'+id_prot_comp).append($('<option>', {
                    value: 'infiniguard',
                    text: 'Infiniguard®'
                }));
            }

            $('#'+id_prot_comp).append($('<option>', {
                value: 'cobre_cobre',
                text: 'Cobre - Cobre'
            })); */
            $("#"+id_prot_comp).trigger('change');
        break;

        case 'marino':
            check_val_text(id_prot_comp,ima);
            $('#'+id_prot_comp).append($('<option>', {
                value: 'sin_proteccion',
                text: 'Sin Protección'
            }));

            $('#'+id_prot_comp).append($('<option>', {
                value: 'liquido_coating_basico',
                text: 'Líquido o Coating Básico'
            }));

            if(pais == 17){
                $('#'+id_prot_comp).append($('<option>', {
                    value: 'infiniguard',
                    text: 'Infiniguard®'
                }));
            }
            $("#"+id_prot_comp).trigger('change');

        break;

        case 'contaminado':
            check_val_text(id_prot_comp,ima);
            $('#'+id_prot_comp).append($('<option>', {
                value: 'sin_proteccion',
                text: 'Sin Protección'
            }));

            $('#'+id_prot_comp).append($('<option>', {
                value: 'liquido_coating_basico',
                text: 'Líquido o Coating Básico'
            }));

            if(pais == 17){
                $('#'+id_prot_comp).append($('<option>', {
                    value: 'infiniguard',
                    text: 'Infiniguard®'
                }));
            }
            $("#"+id_prot_comp).trigger('change');
        break;

        default:
        break;
    }
}



function clean_tipo_ambiente(){
    $("#tipo_ambiente_1_1").trigger('change');
    $("#tipo_ambiente_1_2").trigger('change');
    $("#tipo_ambiente_2_1").trigger('change');
    $("#tipo_ambiente_2_2").trigger('change');
    $("#tipo_ambiente_3_1").trigger('change');
    $("#tipo_ambiente_3_2").trigger('change');

    $("#tipo_ambiente_1_1_retro").trigger('change');
    $("#tipo_ambiente_2_1_retro").trigger('change');
    $("#tipo_ambiente_3_1_retro").trigger('change');
}

function copiar_solucion_tarjet(sol_copy,sol_paste){
    switch (sol_copy) {
        case 'Base':
            copiar_form_base_a(sol_paste);
        break;

        default:
            break;
    }
}

 async function copy_base_a(){

    var select_sistema = $('#cUnidad_1_1').val();
    $("#cUnidad_2_1").find('option[value="'+select_sistema+'"]').prop("selected", true);
    await unidadHvac(select_sistema,1,'cheTipo_2_1',1);
    check_chiller(select_sistema,'csStd_2_1',1);
    var select_unidad = $('#csTipo').val();
    $("#cheTipo_2_1").find('option[value="'+select_unidad+'"]').prop("selected", true);
    await change_diseño(select_unidad,1,'cheDisenio_2_1','tipo_control_2_1','dr_2_1','ventilacion_2_1','filtracion_2_1','lblCsTipo_2_1');
    //$("#cheTipo_2_1").trigger('change');

    var select_marca = $('#marca_1_1').val();
    $("#marca_2_1").find('option[value="'+select_marca+'"]').prop("selected", true);
    send_marcas_to('marca_2_1',select_marca,select_sistema)
    valida_selects_inps('marca_2_1');
    send_marca_to_modal(select_marca,'marcas_modal_2_1');

    var select_modelo = $('#modelo_1_1').val();
    $("#modelo_2_1").find('option[value="'+select_modelo+'"]').prop("selected", true);
    send_modelo_edit(select_marca,'modelo_2_1',select_modelo);
    /* check_enfi_mod(this.value,'csStd_2_1',this.id,'cUnidad_1_1');
    send_efi_cant(this.value,'csStd_cant_2_1') */
    //$("#modelo_2_1").trigger('change');

    var capacidad_total = $('#capacidad_total').val();
    $('#capacidad_total_2_1').val(capacidad_total);

    //$("#capacidad_total_2_1").trigger('change');
    //format_nums_no_$(capacidad_total,'capacidad_total_2_1');
    var eficiencia = $('#csStd_cant_1_1').val();
    $('#csStd_cant_2_1').val(eficiencia);
    $("#csStd_cant_2_1").trigger('change');

    var csDisenio_1_1 = $('#csDisenio_1_1').val();
    $("#cheDisenio_2_1").find('option[value="'+csDisenio_1_1+'"]').attr("selected", true);
    send_name('cheDisenio_2_1');
    await check_sin_doa('cheDisenio_2_1','ventilacion_2_1','filtracion_2_1','cheTipo_2_1');

    var tipo_control_1_1 = $('#tipo_control_1_1').val();
    $("#tipo_control_2_1").find('option[value="'+tipo_control_1_1+'"]').attr("selected", true);
    $("#tipo_control_2_1").trigger('change');

    var dr_1_1 = $('#dr_1_1').val();
    $("#dr_2_1").find('option[value="'+dr_1_1+'"]').attr("selected", true);
    $("#dr_2_1").trigger('change');

    var ventilacion_1_1 = $('#ventilacion_1_1').val();
    $("#ventilacion_2_1").find('option[value="'+ventilacion_1_1+'"]').attr("selected", true);
    $("#ventilacion_2_1").trigger('change');

    var filtracion_1_1 = $('#filtracion_1_1').val();
    $("#filtracion_2_1").find('option[value="'+filtracion_1_1+'"]').attr("selected", true);
    $("#filtracion_2_1").trigger('change');

    var csMantenimiento = $('#csMantenimiento').val();
    $("#csMantenimiento_2_1").find('option[value="'+csMantenimiento+'"]').attr("selected", true);
    $("#csMantenimiento_2_1").trigger('change');

    var tipo_ambiente_1_1 = $('#tipo_ambiente_1_1').val();
    $("#tipo_ambiente_2_1").find('option[value="'+tipo_ambiente_1_1+'"]').attr("selected", true);
    $("#tipo_ambiente_2_1").trigger('change');

    var proteccion_condensador_1_1 = $('#proteccion_condensador_1_1').val();
    $("#proteccion_condensador_2_1").find('option[value="'+proteccion_condensador_1_1+'"]').attr("selected", true);
    $("#proteccion_condensador_2_1").trigger('change');

    var cheValorS_1_1 = $('#cheValorS_1_1').val();
    $('#cheValorS_2_1').val(cheValorS_1_1);
    $("#cheValorS_2_1").trigger('change');


    var maintenance_cost_1_1 = $('#maintenance_cost_1_1').val();
    $('#maintenance_cost_2_1').val(maintenance_cost_1_1);
    $("#maintenance_cost_2_1").trigger('change');


    if($('#cUnidad_1_2').val() >  0){

        await copiar_form_a_2();
    }
}

async function copiar_form_a_2(){

    active_display('sol_2');
    active_display_Edit('sol_2');
    var cUnidad_1_2 = $('#cUnidad_1_2').val();
    $("#cUnidad_2_2").find('option[value="'+cUnidad_1_2+'"]').prop("selected", true);
    await unidadHvac(cUnidad_1_2,2,'cheTipo_2_2',1);
    check_chiller(cUnidad_1_2,'csStd_2_2',1)
    var csTipo_1_2 = $('#csTipo_1_2').val();
    $("#cheTipo_2_2").find('option[value="'+csTipo_1_2+'"]').attr("selected", true);
    await change_diseño(csTipo_1_2,2,'cheDisenio_2_2','tipo_control_2_2','dr_2_2','ventilacion_2_2','filtracion_2_2','lblCsTipo_2_2');

    var marca_1_2 = $('#marca_1_2').val();
    $("#marca_2_2").find('option[value="'+marca_1_2+'"]').attr("selected", true);
    send_marcas_to('marca_2_2',marca_1_2,cUnidad_1_2)
    valida_selects_inps('marca_2_2');
    send_marca_to_modal(marca_1_2,'marca_2_2');

    var modelo_1_2 = $('#modelo_1_2').val();
    $("#modelo_2_2").find('option[value="'+modelo_1_2+'"]').attr("selected", true);
    send_modelo_edit(marca_1_2,'modelo_2_2',modelo_1_2);
    //$("#modelo_2_2").trigger('change');

    var capacidad_total_1_2 = $('#capacidad_total_1_2').val();
    $('#capacidad_total_2_2').val(capacidad_total_1_2);
    $("#capacidad_total_2_2").trigger('change');

    var csStd_cant_1_2 = $('#csStd_cant_1_2').val();
    $('#csStd_cant_2_2').val(csStd_cant_1_2);
    $("#csStd_cant_2_2").trigger('change');


    var csDisenio_1_2 = $('#csDisenio_1_2').val();
    $("#cheDisenio_2_2").find('option[value="'+csDisenio_1_2+'"]').attr("selected", true);
    send_name('cheDisenio_2_2');
    await check_sin_doa('cheDisenio_2_2','filtracion_2_2','ventilacion_2_2','cheTipo_2_2');


    var tipo_control_1_2 = $('#tipo_control_1_2').val();
    $("#tipo_control_2_2").find('option[value="'+tipo_control_1_2+'"]').attr("selected", true);
    $("#tipo_control_2_2").trigger('change');

    var dr_1_2 = $('#dr_1_2').val();
    $("#dr_2_2").find('option[value="'+dr_1_2+'"]').attr("selected", true);
    $("#dr_2_2").trigger('change');

    var ventilacion_1_2 = $('#ventilacion_1_2').val();
    $("#ventilacion_2_2").find('option[value="'+ventilacion_1_2+'"]').attr("selected", true);
    $("#ventilacion_2_2").trigger('change');

    var filtracion_1_2 = $('#filtracion_1_2').val();
    $("#filtracion_2_2").find('option[value="'+filtracion_1_2+'"]').attr("selected", true);
    $("#filtracion_2_2").trigger('change');

    var csMantenimiento_1_2 = $('#csMantenimiento_1_2').val();
    $("#cheMantenimiento_2_2").find('option[value="'+csMantenimiento_1_2+'"]').attr("selected", true);
    $("#cheMantenimiento_2_2").trigger('change');

    var tipo_ambiente_1_2 = $('#tipo_ambiente_1_2').val();
    $("#tipo_ambiente_2_2").find('option[value="'+tipo_ambiente_1_2+'"]').attr("selected", true);
    $("#tipo_ambiente_2_2").trigger('change');

    var proteccion_condensador_1_2 = $('#proteccion_condensador_1_2').val();
    $("#proteccion_condensador_2_2").find('option[value="'+proteccion_condensador_1_2+'"]').attr("selected", true);
    $("#proteccion_condensador_2_2").trigger('change');

    var cheValorS_1_2 = $('#cheValorS_1_2').val();
    $('#cheValorS_2_2').val(cheValorS_1_2);
    $("#cheValorS_2_2").trigger('change');


    var maintenance_cost_1_2 = $('#maintenance_cost_1_2').val();
    $('#maintenance_cost_2_2').val(maintenance_cost_1_2);
    $("#maintenance_cost_2_2").trigger('change');
}

async function copiar_form_a_b(sol_paste){




/*     var select_sistema = $('#cUnidad_1_1').val();
    $("#cUnidad_2_1").find('option[value="'+select_sistema+'"]').attr("selected", true);
    await unidadHvac(select_sistema,1,'cheTipo_2_1');

    var select_unidad = $('#csTipo').val();
    $("#cheTipo_2_1").find('option[value="'+select_unidad+'"]').attr("selected", true);
    await change_diseño(select_unidad,1,'cheDisenio_2_1','tipo_control_2_1','dr_2_1','ventilacion_2_1','filtracion_2_1','lblCsTipo_2_1'); */


    var cUnidad_2_1 = $('#cUnidad_2_1').val();
    $("#cUnidad_3_1").find('option[value="'+cUnidad_2_1+'"]').attr("selected", true);
    await unidadHvac(cUnidad_2_1,1,'cheTipo_3_1',1);
    check_chiller(cUnidad_2_1,'csStd2_3_1',1)
    var cheTipo_2_1 = $('#cheTipo_2_1').val();
    $("#cheTipo_3_1").find('option[value="'+cheTipo_2_1+'"]').attr("selected", true);
    await change_diseño(cheTipo_2_1,1,'cheDisenio_3_1','tipo_control_3_1','dr_3_1','ventilacion_3_1','filtracion_3_1','lblCsTipo_3_1');

    var marca_2_1 = $('#marca_2_1').val();
    $("#marca_3_1").find('option[value="'+marca_2_1+'"]').attr("selected", "selected");
    send_marcas_to('marca_3_1',marca_2_1,cUnidad_2_1)
    valida_selects_inps('marca_3_1');
    send_marca_to_modal(marca_2_1,'marcas_modal_3_1');

    var modelo_2_1 = $('#modelo_2_1').val();
    $("#modelo_3_1").find('option[value="'+modelo_2_1+'"]').attr("selected", "selected");
    send_modelo_edit(marca_2_1,'modelo_3_1',modelo_2_1);
    //$("#modelo_3_1").trigger('change');

    var capacidad_total_2_1 = $('#capacidad_total_2_1').val();
    $('#capacidad_total_3_1').val(capacidad_total_2_1);
    //$("#capacidad_total_3_1").trigger('change');

    var eficiencia = $('#csStd_cant_2_1').val();
    $('#cheStd_3_1').val(eficiencia);
    $("#cheStd_3_1").trigger('change');


    var cheDisenio_2_1 = $('#cheDisenio_2_1').val();
    $("#cheDisenio_3_1").find('option[value="'+cheDisenio_2_1+'"]').attr("selected", true);
    //$("#cheDisenio_3_1").trigger('change');
    send_name('cheDisenio_3_1');
    await check_sin_doa('cheDisenio_3_1','ventilacion_3_1','filtracion_3_1','cheTipo_3_1');

    var tipo_control_2_1 = $('#tipo_control_2_1').val();
    $("#tipo_control_3_1").find('option[value="'+tipo_control_2_1+'"]').attr("selected", true);
    $("#tipo_control_3_1").trigger('change');

    var dr_2_1 = $('#dr_2_1').val();
    $("#dr_3_1").find('option[value="'+dr_2_1+'"]').attr("selected", true);
    $("#dr_3_1").trigger('change');

    var ventilacion_2_1 = $('#ventilacion_2_1').val();
    $("#ventilacion_3_1").find('option[value="'+ventilacion_2_1+'"]').attr("selected", true);
    $("#ventilacion_3_1").trigger('change');

    var filtracion_2_1 = $('#filtracion_2_1').val();
    $("#filtracion_3_1").find('option[value="'+filtracion_2_1+'"]').attr("selected", true);
    $("#filtracion_3_1").trigger('change');

    var csMantenimiento_2_1 = $('#csMantenimiento_2_1').val();
    $("#cheMantenimiento_3_1").find('option[value="'+csMantenimiento_2_1+'"]').attr("selected", true);
    $("#cheMantenimiento_3_1").trigger('change');

    var tipo_ambiente_2_1 = $('#tipo_ambiente_2_1').val();
    $("#tipo_ambiente_3_1").find('option[value="'+tipo_ambiente_2_1+'"]').attr("selected", true);
    $("#tipo_ambiente_3_1").trigger('change');

    var proteccion_condensador_2_1 = $('#proteccion_condensador_2_1').val();
    $("#proteccion_condensador_3_1").find('option[value="'+proteccion_condensador_2_1+'"]').attr("selected", true);
    $("#proteccion_condensador_3_1").trigger('change');

    var cheValorS_2_1 = $('#cheValorS_2_1').val();
    $('#cheValorS_3_1').val(cheValorS_2_1);
    $("#cheValorS_3_1").trigger('change');


    var maintenance_cost_2_1 = $('#maintenance_cost_2_1').val();
    $('#maintenance_cost_3_1').val(maintenance_cost_2_1);
    $("#maintenance_cost_3_1").trigger('change');

    if($('#cUnidad_2_2').val() >  0){
        await copiar_form_b_2();
    }

}

async function copiar_form_b_2(sol_paste){
    active_display('sol_3');
    active_display_Edit('sol_3');
    var cUnidad_2_2 = $('#cUnidad_2_2').val();
    $("#cUnidad_3_2").find('option[value="'+cUnidad_2_2+'"]').prop("selected", true);
    await unidadHvac(cUnidad_2_2,1,'cheTipo_3_2',1);

    var cheTipo_2_2 = $('#cheTipo_2_2').val();
    $("#cheTipo_3_2").find('option[value="'+cheTipo_2_2+'"]').attr("selected", true);
    await change_diseño(cheTipo_2_2,2,'cheDisenio_3_2','tipo_control_3_2','dr_3_2','ventilacion_3_2','filtracion_3_2','lblCsTipo_3_2');

    var select_marca = $('#marca_2_2').val();

    $("#marca_3_2").find('option[value="'+select_marca+'"]').attr("selected", "selected");
    $("#marca_3_2").trigger('change');
    send_marcas_to('marca_3_2',select_marca,cUnidad_2_2)
    valida_selects_inps('marca_3_2');
    send_marca_to_modal(select_marca,'marcas_modal_3_2');

    var select_modelo = $('#modelo_2_2').val();
    $("#modelo_3_2").find('option[value="'+select_modelo+'"]').attr("selected", true);
    send_modelo_edit(select_marca,'modelo_3_2',select_modelo);

    check_chiller(cUnidad_2_2,'csStd_3_2',1);
    //$("#modelo_3_2").trigger('change');

    var capacidad_total_2_2 = $('#capacidad_total_2_2').val();
    $('#capacidad_total_3_2').val(capacidad_total_2_2);
    $("#capacidad_total_3_2").trigger('change');

    var csStd_cant_2_2 = $('#csStd_cant_2_2').val();
    $('#csStd_cant_3_2').val(csStd_cant_2_2);
    $("#csStd_cant_3_2").trigger('change');


    var cheDisenio_2_2 = $('#cheDisenio_2_2').val();
    $("#cheDisenio_3_2").find('option[value="'+cheDisenio_2_2+'"]').attr("selected", true);
    send_name('cheDisenio_3_2');
    await check_sin_doa('cheDisenio_3_2','ventilacion_3_2','filtracion_3_2','cheTipo_3_2');


    var tipo_control_2_2 = $('#tipo_control_2_2').val();
    $("#tipo_control_3_2").find('option[value="'+tipo_control_2_2+'"]').attr("selected", true);
    $("#tipo_control_3_2").trigger('change');

    var dr_2_2 = $('#dr_2_2').val();
    $("#dr_3_2").find('option[value="'+dr_2_2+'"]').attr("selected", true);
    $("#dr_3_2").trigger('change');

    var ventilacion_2_2 = $('#ventilacion_2_2').val();
    $("#ventilacion_3_2").find('option[value="'+ventilacion_2_2+'"]').attr("selected", true);
    $("#ventilacion_3_2").trigger('change');

    var filtracion_2_2 = $('#filtracion_2_2').val();
    $("#filtracion_3_2").find('option[value="'+filtracion_2_2+'"]').attr("selected", true);
    $("#filtracion_3_2").trigger('change');

    var cheMantenimiento_2_2 = $('#cheMantenimiento_2_2').val();
    $("#cheMantenimiento_3_2").find('option[value="'+cheMantenimiento_2_2+'"]').attr("selected", true);
    $("#cheMantenimiento_3_2").trigger('change');

    var tipo_ambiente_2_2 = $('#tipo_ambiente_2_2').val();
    $("#tipo_ambiente_3_2").find('option[value="'+tipo_ambiente_2_2+'"]').attr("selected", true);
    $("#tipo_ambiente_3_2").trigger('change');

    var proteccion_condensador_2_2 = $('#proteccion_condensador_2_2').val();
    $("#proteccion_condensador_3_2").find('option[value="'+proteccion_condensador_2_2+'"]').attr("selected", true);
    $("#proteccion_condensador_3_2").trigger('change');

    var cheValorS_2_2 = $('#cheValorS_2_2').val();
    $('#cheValorS2_3_2').val(cheValorS_2_2);
    $("#cheValorS2_3_2").trigger('change');


    var maintenance_cost_2_2 = $('#maintenance_cost_2_2').val();
    $('#maintenance_cost_3_2').val(maintenance_cost_2_2);
    $("#maintenance_cost_3_2").trigger('change');
}

async function copiar_form_base_a_retro(sol_paste){

    var select_sistema = $('#cUnidad_1_1_retro').val();
    $("#cUnidad_2_1_retro").find('option[value="'+select_sistema+'"]').attr("selected", true);
     await unidadHvac(select_sistema,1,'cheTipo_2_1_retro',1);
     check_chiller(select_sistema,'csStd_2_1_retro',2)

    var select_unidad = $('#csTipo_1_1_retro').val();
    $("#cheTipo_2_1_retro").find('option[value="'+select_unidad+'"]').attr("selected", true);
     await change_diseño(select_unidad,1,'cheDisenio_2_1_retro','tipo_control_2_1_retro','dr_2_1_retro','ventilacion_2_1_retro','filtracion_2_1_retro','lblCsTipo_2_1_retro');

    var select_marca = $('#marca_1_1_retro').val();
    $("#marca_2_1_retro").find('option[value="'+select_marca+'"]').attr("selected", true);
    send_marcas_to('marca_2_1_retro',select_marca,select_sistema)
    valida_selects_inps('marca_2_1_retro');
    send_marca_to_modal(select_marca,'marcas_modal_2_1_retro');

    var select_modelo = $('#modelo_1_1_retro').val();
    $("#modelo_2_1_retro").find('option[value="'+select_modelo+'"]').attr("selected", true);
    send_modelo_edit(select_marca,'modelo_2_1_retro',select_modelo);
    //$("#modelo_2_1_retro").trigger('change');

    var yrs_vida_1_1_retro = $('#yrs_vida_1_1_retro').val();
    $('#yrs_vida_2_1_retro').val(yrs_vida_1_1_retro);
    $("#yrs_vida_2_1_retro").trigger('change');

    var capacidad_total = $('#capacidad_total_1_1_retro').val();
    $('#capacidad_total_2_1_retro').val(capacidad_total);
    $("#capacidad_total_2_1_retro").trigger('change');

    var eficiencia = $('#csStd_retro_1_1_cant').val();
    $('#csStd_cant_2_1_retro').val(eficiencia);
    $("#csStd_cant_2_1_retro").trigger('change');


    var csDisenio_1_1_retro = $('#csDisenio_1_1_retro').val();
    $("#cheDisenio_2_1_retro").find('option[value="'+csDisenio_1_1_retro+'"]').attr("selected", true);
    send_name('cheDisenio_2_1_retro');
    await check_sin_doa('cheDisenio_2_1_retro','ventilacion_2_1_retro','filtracion_2_1_retro','cheTipo_2_1_retro');


    var tipo_control_1_1_retro = $('#tipo_control_1_1_retro').val();
    $("#tipo_control_2_1_retro").find('option[value="'+tipo_control_1_1_retro+'"]').attr("selected", true);
    $("#tipo_control_2_1_retro").trigger('change');

    var dr_1_1_retro = $('#dr_1_1_retro').val();
    $("#dr_2_1_retro").find('option[value="'+dr_1_1_retro+'"]').attr("selected", true);
    $("#dr_2_1_retro").trigger('change');

    var ventilacion_1_1_retro = $('#ventilacion_1_1_retro').val();
    $("#ventilacion_2_1_retro").find('option[value="'+ventilacion_1_1_retro+'"]').attr("selected", true);
    $("#ventilacion_2_1_retro").trigger('change');

    var filtracion_1_1_retro = $('#filtracion_1_1_retro').val();
    $("#filtracion_2_1_retro").find('option[value="'+filtracion_1_1_retro+'"]').attr("selected", true);
    $("#filtracion_2_1_retro").trigger('change');

    var csMantenimiento = $('#csMantenimiento_1_1_retro').val();
    $("#csMantenimiento_2_1_retro").find('option[value="'+csMantenimiento+'"]').attr("selected", true);
    $("#csMantenimiento_2_1_retro").trigger('change');

    var tipo_ambiente_1_1_retro = $('#tipo_ambiente_1_1_retro').val();
    $("#tipo_ambiente_2_1_retro").find('option[value="'+tipo_ambiente_1_1_retro+'"]').attr("selected", true);
    $("#tipo_ambiente_2_1_retro").trigger('change');

    var proteccion_condensador_1_1_retro = $('#proteccion_condensador_1_1_retro').val();
    $("#proteccion_condensador_2_1_retro").find('option[value="'+proteccion_condensador_1_1_retro+'"]').attr("selected", true);
    $("#proteccion_condensador_2_1_retro").trigger('change');

    var maintenance_cost_1_1_retro = $('#maintenance_cost_1_1_retro').val();
    $('#maintenance_cost_2_1_retro').val(maintenance_cost_1_1_retro);
    $("#maintenance_cost_2_1_retro").trigger('change');

}

async function copiar_form_a_b_retro(sol_paste){

    var select_sistema = $('#cUnidad_2_1_retro').val();
    $("#cUnidad_3_1_retro").find('option[value="'+select_sistema+'"]').attr("selected", true);
    await unidadHvac(select_sistema,1,'cheTipo_3_1_retro',1);
    check_chiller(select_sistema,'csStd_3_1_retro',2);
    var select_unidad = $('#cheTipo_2_1_retro').val();
    $("#cheTipo_3_1_retro").find('option[value="'+select_unidad+'"]').attr("selected", true);
    await change_diseño(select_unidad,1,'cheDisenio_3_1_retro','tipo_control_3_1_retro','dr_3_1_retro','ventilacion_3_1_retro','filtracion_3_1_retro','lblCsTipo_3_1_retro');

    var select_marca = $('#marca_2_1_retro').val();
    $("#marca_3_1_retro").find('option[value="'+select_marca+'"]').attr("selected", true);
    send_marcas_to('marca_3_1_retro',select_marca,select_sistema)
    valida_selects_inps('marca_3_1_retro');
    send_marca_to_modal(select_marca,'marcas_modal_3_1_retro');

    var select_modelo = $('#modelo_2_1_retro').val();
    $("#modelo_3_1_retro").find('option[value="'+select_modelo+'"]').attr("selected", true);
    send_modelo_edit(select_marca,'modelo_3_1_retro',select_modelo);
    //$("#modelo_3_1_retro").trigger('change');

    var yrs_vida_2_1_retro = $('#yrs_vida_2_1_retro').val();
    $('#yrs_vida_3_1_retro').val(yrs_vida_2_1_retro);
    $("#yrs_vida_3_1_retro").trigger('change');

    var capacidad_total = $('#capacidad_total_2_1_retro').val();
    $('#capacidad_total_3_1_retro').val(capacidad_total);
    $("#capacidad_total_3_1_retro").trigger('change');

    var eficiencia = $('#csStd_cant_2_1_retro').val();
    $('#csStd_cant_3_1_retro').val(eficiencia);
    $("#csStd_cant_3_1_retro").trigger('change');

    var csDisenio_2_1_retro = $('#cheDisenio_2_1_retro').val();
    $("#cheDisenio_3_1_retro").find('option[value="'+csDisenio_2_1_retro+'"]').attr("selected", true);
    send_name('cheDisenio_3_1_retro');
    await check_sin_doa('cheDisenio_3_1_retro','ventilacion_3_1_retro','filtracion_3_1_retro','cheTipo_3_1_retro');

    var tipo_control_2_1_retro = $('#tipo_control_2_1_retro').val();
    $("#tipo_control_3_1_retro").find('option[value="'+tipo_control_2_1_retro+'"]').attr("selected", true);
    $("#tipo_control_3_1_retro").trigger('change');

    var dr_2_1_retro = $('#dr_2_1_retro').val();
    $("#dr_3_1_retro").find('option[value="'+dr_2_1_retro+'"]').attr("selected", true);
    $("#dr_3_1_retro").trigger('change');

    var ventilacion_2_1_retro = $('#ventilacion_2_1_retro').val();
    $("#ventilacion_3_1_retro").find('option[value="'+ventilacion_2_1_retro+'"]').attr("selected", true);
    $("#ventilacion_3_1_retro").trigger('change');

    var filtracion_2_1_retro = $('#filtracion_2_1_retro').val();
    $("#filtracion_3_1_retro").find('option[value="'+filtracion_2_1_retro+'"]').attr("selected", true);
    $("#filtracion_3_1_retro").trigger('change');

    var csMantenimiento = $('#csMantenimiento_2_1_retro').val();
    $("#cheMantenimiento_3_1_retro").find('option[value="'+csMantenimiento+'"]').attr("selected", true);
    $("#cheMantenimiento_3_1_retro").trigger('change');

    var tipo_ambiente_2_1_retro = $('#tipo_ambiente_2_1_retro').val();
    $("#tipo_ambiente_3_1_retro").find('option[value="'+tipo_ambiente_2_1_retro+'"]').attr("selected", true);
    $("#tipo_ambiente_3_1_retro").trigger('change');

    var proteccion_condensador_2_1_retro = $('#proteccion_condensador_2_1_retro').val();
    $("#proteccion_condensador_3_1_retro").find('option[value="'+proteccion_condensador_2_1_retro+'"]').attr("selected", true);
    $("#proteccion_condensador_3_1_retro").trigger('change');

    var maintenance_cost_2_1_retro = $('#maintenance_cost_2_1_retro').val();
    $('#maintenance_cost_3_1_retro').val(maintenance_cost_2_1_retro);
    $("#maintenance_cost_3_1_retro").trigger('change');

    var costo_recu_2_1_retro = $('#costo_recu_2_1_retro').val();
    $('#costo_recu_3_1_retro').val(costo_recu_2_1_retro);
    $("#costo_recu_3_1_retro").trigger('change');

}

function red_alert(tipo_ambiente,proteccion_condensador){
        var tipo_ambiente = $('#'+tipo_ambiente).val();
        var proteccion_condensador = $('#'+proteccion_condensador).val();

        if(tipo_ambiente == 'marino' && proteccion_condensador == 'sin_proteccion'){
            $('#red_alert').css('background-color','red');
        }else{
            $('#red_alert').css('background-color','#3182ce');
        }
    }

function red_alert_retro(tipo_ambiente,proteccion_condensador){
        var tipo_ambiente = $('#'+tipo_ambiente).val();
        var proteccion_condensador = $('#'+proteccion_condensador).val();

        if(tipo_ambiente == 'marino' && proteccion_condensador == 'sin_proteccion'){
            $('#red_alert_retro').css('background-color','red');

        }else{

            $('#red_alert_retro').css('background-color','#3182ce');
        }
    }


async function check_sin_doa(id,ventilacion_id,filtracion_id,equipo_id){

//me quede aqui
    if($("#"+id+" option:selected").text() == 'Sin Unidad DOA'){
        var value = $('#'+equipo_id).val();
        $('#'+ventilacion_id).empty();

         arry_vent = await set_ventilaciones_no_doa(value);
         const myObj_vent = JSON.parse(arry_vent);
         for (let i = 0; i < myObj_vent.length; i++) {
            $('#'+ventilacion_id).append($('<option>', {
                 value: Math.round(myObj_vent[i].value * 100) / 100,
                text:  myObj_vent[i].text
            }));
        }


         $('#'+filtracion_id).empty();
         arry_filt = await set_filtraciones_no_doa(value);
         const myObj_filt = JSON.parse(arry_filt);
         for (let i = 0; i < myObj_filt.length; i++) {
            $('#'+filtracion_id).append($('<option>', {
                value: Math.round(myObj_filt[i].value * 100) / 100,
                text:  myObj_filt[i].text
            }));
        }


    }else{
        var value = $('#'+equipo_id).val();
        /* ventilacion */
        $('#'+ventilacion_id).empty();
        $('#'+ventilacion_id).append($('<option>', {
            value: '',
            text: '-Seleccionar-'
        }));
        const arry_vent = await set_ventilaciones(value);
        const myObj_vent = JSON.parse(arry_vent);

        for (let i = 0; i < myObj_vent.length; i++) {
            $('#'+ventilacion_id).append($('<option>', {
                value:  Math.round(myObj_vent[i].value * 100) / 100,
                text:  myObj_vent[i].text
            }));
        }

        /* filtracion */
        $('#'+filtracion_id).empty();
        $('#'+filtracion_id).append($('<option>', {
            value: '',
            text: '-Seleccionar-'
        }));

        const arry_filt = await set_filtraciones(value);
        const myObj_filt = JSON.parse(arry_filt);

        for (let i = 0; i < myObj_filt.length; i++) {
            $('#'+filtracion_id).append($('<option>', {
                value:  Math.round(myObj_filt[i].value * 100) / 100,
                text:  myObj_filt[i].text
            }));
        }
    }
}

async function check_ventilacion(id,filtracion_id,equipo_id,unidad_id){

//me quede aqui

  var value = $('#'+unidad_id).val();
    if($('#'+equipo_id).val() == '7'){
        console.log('7');
        if($("#"+id+" option:selected").text() == 'Sin Ventilación'){

             $('#'+filtracion_id).empty();
             arry_filt = await set_filtraciones_no_doa(value);
             const myObj_filt = JSON.parse(arry_filt);
             for (let i = 0; i < myObj_filt.length; i++) {
                $('#'+filtracion_id).append($('<option>', {
                    value: Math.round(myObj_filt[i].value * 100) / 100,
                    text:  myObj_filt[i].text
                }));
            }
        }else{

        const arry_filt = await set_filtraciones(value);
        const myObj_filt = JSON.parse(arry_filt);

        $('#'+filtracion_id).empty();
        $('#'+filtracion_id).append($('<option>', {
            value: '',
            text: '-Seleccionar-'
        }));

        for (let i = 0; i < myObj_filt.length; i++) {
            $('#'+filtracion_id).append($('<option>', {
                value:  Math.round(myObj_filt[i].value * 100) / 100,
                text:  myObj_filt[i].text
            }));
        }
        }
    }
}

function back_begin(){

    $('#simulaciones').removeClass("hidden");
    $('#ene_fin_pro_form_project').addClass("hidden");
    $('#mantenimiento_form_project').addClass("hidden");

    $('#simulaciones_update').removeClass("hidden");
    $('#ene_fin_pro_hvac_update').addClass("hidden");
    $('#img_ene_fin_proy_hvac').removeClass("hidden");
    $('#img_mantenimiento').addClass("hidden");
    //$('#mantenimiento_form_project').addClass("hidden");


}

function back_show_form_project(val){


    switch (parseInt(val)) {
        case 1:
            $('#simulaciones_update').addClass("hidden");
            $('#ene_fin_pro_hvac_update').removeClass("hidden");
        break;

        case 2:
            $('#simulaciones_update').addClass("hidden");
            $('#ene_fin_pro_hvac_update').removeClass("hidden");
        break;

        default:
            break;
    }



}

function set_horas_diarias(){

    const ocupacionMap = {
        'm_50': 'Menor de 50 Hrs.',
        '168': '168 Hrs.',
        '51_167': '51 a 167 Hrs.'
    };

    const ocupacion = $("#ocupacion_semanal_mantenimiento").val();
    if (ocupacionMap[ocupacion]) {
        $("#horas_diarias_mantenimiento").val(ocupacionMap[ocupacion]);
    }

}

function set_horas_diarias_edit(value){
    if(value == 'm_50'){
        $("#horas_diarias_mantenimiento").val('Menor de 50 Hrs.');
    }

    if(value == '168'){
        $("#horas_diarias_mantenimiento").val('168 Hrs.');
    }

    if(value == '51_167'){
        $("#horas_diarias_mantenimiento").val('51 a 167 Hrs.');
    }
}

async function check_form_mantenimiento_tarjet(idm){

    /////////////////////////////////////
    var sistema =$('#sistema_mantenimiento');
    var sistema_count = $('#sistema_mantenimiento_count').val();

    if(sistema.val() == 0){

       sistema.css("border-color", "red")
       sistema_count = 1;
     $('#sistema_mantenimiento_count').val(sistema_count);

    }else if (sistema.val() != 0) {

       sistema_count = 0;
     $('#sistema_mantenimiento_count').val(sistema_count);

    }
    ////////////////////
    /////////////////////////////////////
    var unidad =$('#unidad_mantenimiento');
    var unidad_count = $('#unidad_mantenimiento_count').val();

    if(unidad.val() == 0){

       unidad.css("border-color", "red")
       unidad_count = 1;
     $('#unidad_mantenimiento_count').val(unidad_count);

    }else if (unidad.val() != 0) {

       unidad_count = 0;
     $('#unidad_mantenimiento_count').val(unidad_count);

    }
    /////////////////////////////////////
     /////////////////////////////////////
     var marca =$('#marca_mantenimiento');
     var marca_count = $('#marca_mantenimiento_count').val();

     if(marca.val() == 0){

     marca.css("border-color", "red")
     marca_count = 1;
     $('#marca_mantenimiento_count').val(marca_count);

         }else if (marca.val() != 0) {

     marca_count = 0;
     $('#marca_mantenimiento_count').val(marca_count);

     }
         /////////////////////////////////////
     /////////////////////////////////////
     var modelo_equipo =$('#modelo_mantenimiento');
     var modelo_equipo_count = $('#modelo_mantenimiento_count').val();

     if(modelo_equipo.val() == 0){

       modelo_equipo.css("border-color", "red")
       modelo_equipo_count = 1;
     $('#modelo_mantenimiento_count').val(modelo_equipo_count);

         }else if (modelo_equipo.val() != 0) {

           modelo_equipo_count = 0;
     $('#modelo_mantenimiento_count').val(modelo_equipo_count);

     }
   /////////////////////////////////////

         /////////////////////////////////////
     /*     var modelo_equipo =$('#modelo_equipo');
         var modelo_equipo_count = $('#modelo_equipo_count').val();

         if(modelo_equipo.val() == 0){

           modelo_equipo.css("border-color", "red")
           modelo_equipo_count = 1;
         $('#modelo_equipo_count').val(modelo_equipo_count);

             }else if (modelo_equipo.val() != 0) {

               modelo_equipo_count = 0;
         $('#modelo_equipo_count').val(modelo_equipo_count);

         } */
       /////////////////////////////////////
       /////////////////////////////////////
       var  capacidad_termica=$('#capacidad_termica_mantenimiento');
       var capacidad_termica_count = $('#capacidad_termica_mantenimiento_count').val();

       if(capacidad_termica.val() == 0 || capacidad_termica.val() == ''){

           capacidad_termica.css("border-color", "red")
           capacidad_termica_count = 1;
       $('#capacidad_termica_mantenimiento_count').val(capacidad_termica_count);

       }else if (capacidad_termica.val() != 0 && capacidad_termica.val() != '') {
           capacidad_termica_count = 0;
       $('#capacidad_termica_mantenimiento_count').val(capacidad_termica_count);

       }
       /////////////////////////////////////
       /////////////////////////////////////
       var  tipo_acceso=$('#tipo_acceso_mantenimiento');
       var tipo_acceso_count = $('#tipo_acceso_mantenimiento_count').val();

       if(tipo_acceso.val() == 0){

           tipo_acceso.css("border-color", "red")
           tipo_acceso_count = 1;
       $('#tipo_acceso_mantenimiento_count').val(tipo_acceso_count);

       }else if (tipo_acceso.val() != 0) {
           tipo_acceso_count = 0;
       $('#tipo_acceso_mantenimiento_count').val(tipo_acceso_count);

       }
       /////////////////////////////////////
       /////////////////////////////////////
       var  estado_unidad=$('#estado_unidad_mantenimiento');
       var estado_unidad_count = $('#estado_unidad_mantenimiento_count').val();

       if(estado_unidad.val() == 0){

           estado_unidad.css("border-color", "red")
           estado_unidad_count = 1;
       $('#estado_unidad_mantenimiento_count').val(estado_unidad_count);

       }else if (estado_unidad.val() != 0) {
           estado_unidad_count = 0;
       $('#estado_unidad_mantenimiento_count').val(estado_unidad_count);

       }
       //////////////////////////////////
       /////////////////////////////////////
       var cambio_filtros=$('#cambio_filtros_mantenimiento');
       var cambio_filtros_count = $('#cambio_filtros_mantenimiento_count').val();

       if(cambio_filtros.val() == 0){

           cambio_filtros.css("border-color", "red")
           cambio_filtros_count = 1;
       $('#cambio_filtros_mantenimiento_count').val(cambio_filtros_count);

       }else if (cambio_filtros.val() != 0) {
           cambio_filtros_count = 0;
       $('#cambio_filtros_mantenimiento_count').val(cambio_filtros_count);

       }
       //////////////////////////////////


       var count_inps = sistema_count + unidad_count + marca_count + modelo_equipo_count + modelo_equipo_count + capacidad_termica_count + tipo_acceso_count + estado_unidad_count  /* cambio_filtros_count + cantidad_filtros_count + cantidad_unidades_count */;

      if(count_inps>0){
       trans_sols_valid(idm);
                   return false;
       }else if(count_inps==0){

        var indice_tabla =  $('#indice_tabla_edit').val();
        if( indice_tabla == 0 || indice_tabla == ''){


            $('#tr_exampe').addClass('hidden');
            var valuesArray = [];
            $('#tbody_equipos').empty();
            var ids = [
                'contador_table',
                'sistema_mantenimiento',
                'unidad_mantenimiento',
                'marca_mantenimiento',
                'modelo_mantenimiento',
                'capacidad_termica_mantenimiento',
                'cantidad_unidades_mantenimiento',
                'yrs_vida_mantenimiento',
                'tipo_acceso_mantenimiento',
                'estado_unidad_mantenimiento',
                'horas_diarias_mantenimiento',
                'cambio_filtros_mantenimiento',
                'costo_filtro_mantenimiento',
                'cantidad_filtros_mantenimiento',
                'unidad_aux_mantenimiento',
                'costo_adicionales_aux_mantenimiento',
                'tipo_ambiente_mantenimiento',
                'ocupacion_semanal_mantenimiento',
                'total_horas',
                'hora_dia',
                'dias_ajustados',
                'idas_ajustados',
            ];

            var countador_table = $('#contador_table').val();
            countador_table = parseInt(countador_table) + 1;
            $('#contador_table').val(countador_table);


            //extrae valor de cada  id de ids y guarda los valores en valuesArray
            ids.forEach(function(id) {
                var value = $('#' + id).val();
                valuesArray.push(value);
            });



            // Enviar valuesArray por medio de AJAX
            var token = $("#token").val();
        $.ajax({
            url: '/traer_datos_tarjeta', // Reemplaza con la URL de tu endpoint
            type: 'post',

            headers: { 'X-CSRF-TOKEN': token },
            data: {
                values: valuesArray
            },
            success: async function(response) {

                //var res_formula = await formula_calculo_mantenimiento();

                for (var i = 0; i < response.length; i++) {

                    const arregloInterno = response[i];
                    var newRow = '<tr id='+i+'>';
                    for (let j = 0; j < arregloInterno.length; j++) {


                        var value = arregloInterno[j];
                        if (String(value).endsWith('_hidden')) {
                            newRow += '<td id="'+'td_'+ids[j]+'_'+i+'" name="'+'td_'+ids[j]+'_'+i+'"><input id="'+ids[j]+'_'+i+'" name="'+ids[j]+'_'+i+'" style="border: 2px solid; border-color:#1B17BB!important; width:100%;" hidden type="text" class="text-center text-sm font-bold h-8" value="' + value + '"></td>';
                        }else{
                            newRow += '<td id="'+'td_'+ids[j]+'_'+i+'" name="'+'td_'+ids[j]+'_'+i+'"><input id="'+ids[j]+'_'+i+'" name="'+ids[j]+'_'+i+'" style="border: 2px solid; border-color:#1B17BB!important; width:100%;" readonly type="text" class="text-center text-sm font-bold h-8" value="' + value + '"></td>';
                        }


                    }
                    /* newRow += '<input type="hidden"  value="' + res_formula + '" id="precio_'+i+'" name="precio_'+i+'">'; */
                    newRow += '<td style="width:30px;" class=""><button type="button" onclick="del_td_tr('+i+')" class="px-1 border-2 border-red-500 rounded-md text-xl text-orange-400 hover:text-white hover:bg-orange-400"><i class="fas fa-trash"></i></i></button></td>';
                    newRow += '<td style="width:30px;" class=""><button type="button" onclick="edit_regstro('+i+')" class="px-1 border-2 border-blue-500 rounded-md text-lg text-blue-400 hover:text-white hover:bg-blue-200"><i class="fas fa-edit"></i></i></button></td>';
                    newRow += '</tr>';
                    $('#tbody_equipos').append(newRow);
                }
                $('#indice_tabla_edit').val('');

            },
            error: function(xhr, status, error) {
                console.error('Error al enviar los datos:', error);
            }
        });

/*          setTimeout(() => {
            calcular_speendplan_base()
        }, 2500); */

         setTimeout(() => {
            clean_form_tarjet_mantenimiento();
        }, 2500);

////////////////////////////////
        }else if(indice_tabla > 0 || indice_tabla != ''){
            edit_registro_tabla();
            clean_form_tarjet_mantenimiento();
        }





       }

       /////////////////////////////////////
   //Livewire.emit('save_equipo')
}


async function check_form_mantenimiento_tarjet_edit(id_project,idm){

    /////////////////////////////////////
    var sistema =$('#sistema_mantenimiento');
    var sistema_count = $('#sistema_mantenimiento_count').val();

    if(sistema.val() == 0){

       sistema.css("border-color", "red")
       sistema_count = 1;
     $('#sistema_mantenimiento_count').val(sistema_count);

    }else if (sistema.val() != 0) {

       sistema_count = 0;
     $('#sistema_mantenimiento_count').val(sistema_count);

    }
    ////////////////////
    /////////////////////////////////////
    var unidad =$('#unidad_mantenimiento');
    var unidad_count = $('#unidad_mantenimiento_count').val();

    if(unidad.val() == 0){

       unidad.css("border-color", "red")
       unidad_count = 1;
     $('#unidad_mantenimiento_count').val(unidad_count);

    }else if (unidad.val() != 0) {

       unidad_count = 0;
     $('#unidad_mantenimiento_count').val(unidad_count);

    }
    /////////////////////////////////////
     /////////////////////////////////////
     var marca =$('#marca_mantenimiento');
     var marca_count = $('#marca_mantenimiento_count').val();

     if(marca.val() == 0){

     marca.css("border-color", "red")
     marca_count = 1;
     $('#marca_mantenimiento_count').val(marca_count);

         }else if (marca.val() != 0) {

     marca_count = 0;
     $('#marca_mantenimiento_count').val(marca_count);

     }
         /////////////////////////////////////
     /////////////////////////////////////
     var modelo_equipo =$('#modelo_mantenimiento');
     var modelo_equipo_count = $('#modelo_mantenimiento_count').val();

     if(modelo_equipo.val() == 0){

       modelo_equipo.css("border-color", "red")
       modelo_equipo_count = 1;
     $('#modelo_mantenimiento_count').val(modelo_equipo_count);

         }else if (modelo_equipo.val() != 0) {

           modelo_equipo_count = 0;
     $('#modelo_mantenimiento_count').val(modelo_equipo_count);

     }
   /////////////////////////////////////

         /////////////////////////////////////
     /*     var modelo_equipo =$('#modelo_equipo');
         var modelo_equipo_count = $('#modelo_equipo_count').val();

         if(modelo_equipo.val() == 0){

           modelo_equipo.css("border-color", "red")
           modelo_equipo_count = 1;
         $('#modelo_equipo_count').val(modelo_equipo_count);

             }else if (modelo_equipo.val() != 0) {

               modelo_equipo_count = 0;
         $('#modelo_equipo_count').val(modelo_equipo_count);

         } */
       /////////////////////////////////////
       /////////////////////////////////////
       var  capacidad_termica=$('#capacidad_termica_mantenimiento');
       var capacidad_termica_count = $('#capacidad_termica_mantenimiento_count').val();

       if(capacidad_termica.val() == 0 || capacidad_termica.val() == ''){

           capacidad_termica.css("border-color", "red")
           capacidad_termica_count = 1;
       $('#capacidad_termica_mantenimiento_count').val(capacidad_termica_count);

       }else if (capacidad_termica.val() != 0 && capacidad_termica.val() != '') {
           capacidad_termica_count = 0;
       $('#capacidad_termica_mantenimiento_count').val(capacidad_termica_count);

       }
       /////////////////////////////////////
       /////////////////////////////////////
       var  tipo_acceso=$('#tipo_acceso_mantenimiento');
       var tipo_acceso_count = $('#tipo_acceso_mantenimiento_count').val();

       if(tipo_acceso.val() == 0){

           tipo_acceso.css("border-color", "red")
           tipo_acceso_count = 1;
       $('#tipo_acceso_mantenimiento_count').val(tipo_acceso_count);

       }else if (tipo_acceso.val() != 0) {
           tipo_acceso_count = 0;
       $('#tipo_acceso_mantenimiento_count').val(tipo_acceso_count);

       }
       /////////////////////////////////////
       /////////////////////////////////////
       var  estado_unidad=$('#estado_unidad_mantenimiento');
       var estado_unidad_count = $('#estado_unidad_mantenimiento_count').val();

       if(estado_unidad.val() == 0){

           estado_unidad.css("border-color", "red")
           estado_unidad_count = 1;
       $('#estado_unidad_mantenimiento_count').val(estado_unidad_count);

       }else if (estado_unidad.val() != 0) {
           estado_unidad_count = 0;
       $('#estado_unidad_mantenimiento_count').val(estado_unidad_count);

       }
       //////////////////////////////////
       /////////////////////////////////////
       var cambio_filtros=$('#cambio_filtros_mantenimiento');
       var cambio_filtros_count = $('#cambio_filtros_mantenimiento_count').val();

       if(cambio_filtros.val() == 0){

           cambio_filtros.css("border-color", "red")
           cambio_filtros_count = 1;
       $('#cambio_filtros_mantenimiento_count').val(cambio_filtros_count);

       }else if (cambio_filtros.val() != 0) {
           cambio_filtros_count = 0;
       $('#cambio_filtros_mantenimiento_count').val(cambio_filtros_count);

       }
       //////////////////////////////////
       /////////////////////////////////////
      /*  var costo_filtro=$('#costo_filtro_mantenimiento');
       var costo_filtro_count = $('#costo_filtro_mantenimiento_count').val();

       if(costo_filtro.val() == 0){

           costo_filtro.css("border-color", "red")
           costo_filtro_count = 1;
       $('#costo_filtro_mantenimiento_count').val(costo_filtro_count);

       }else if (costo_filtro.val() != 0) {
           costo_filtro_count = 0;
       $('#costo_filtro_mantenimiento_count').val(costo_filtro_count);

       } */
       ////////////////////////////////
       /////////////////////////////////////
       /* var  cantidad_filtros=$('#cantidad_filtros_mantenimiento');
       var cantidad_filtros_count = $('#cantidad_filtros_mantenimiento_count').val();

       if(cantidad_filtros.val() == 0 || cantidad_filtros.val() == ''){

           cantidad_filtros.css("border-color", "red")
           cantidad_filtros_count = 1;
       $('#cantidad_filtros_mantenimiento_count').val(cantidad_filtros_count);

       }else if (cantidad_filtros.val() != 0 && cantidad_filtros.val() != '') {
           cantidad_filtros_count = 0;
       $('#cantidad_filtros_mantenimiento_count').val(cantidad_filtros_count);

       } */
       /////////////////////////////////////
       /////////////////////////////////////
       /* var  cantidad_unidades=$('#cantidad_unidades_mantenimiento');
       var cantidad_unidades_count = $('#cantidad_unidades_mantenimiento_count').val();

       if(cantidad_unidades.val() == 0 || cantidad_unidades.val() == ''){

           cantidad_unidades.css("border-color", "red")
           cantidad_unidades_count = 1;
       $('#cantidad_unidades_mantenimiento_count').val(cantidad_unidades_count);

       }else if (cantidad_unidades.val() != 0 && cantidad_unidades.val() != '') {
           cantidad_unidades_count = 0;
       $('#cantidad_unidades_mantenimiento_count').val(cantidad_unidades_count);

       } */

       var count_inps = sistema_count + unidad_count + marca_count + modelo_equipo_count + modelo_equipo_count + capacidad_termica_count + tipo_acceso_count + estado_unidad_count  /* cambio_filtros_count + cantidad_filtros_count + cantidad_unidades_count */;

      if(count_inps>0){
       trans_sols_valid(idm);
                   return false;
       }else if(count_inps==0){

        var indice_tabla =  $('#indice_tabla_edit').val();
        if( indice_tabla == 0 || indice_tabla == ''){


            $('#tr_exampe').addClass('hidden');
            var valuesArray = [];
            $('#tbody_equipos').empty();
            var ids = [
                'contador_table',
                'sistema_mantenimiento',
                'unidad_mantenimiento',
                'marca_mantenimiento',
                'modelo_mantenimiento',
                'capacidad_termica_mantenimiento',
                'cantidad_unidades_mantenimiento',
                'yrs_vida_mantenimiento',
                'tipo_acceso_mantenimiento',
                'estado_unidad_mantenimiento',
                'horas_diarias_mantenimiento',
                'cambio_filtros_mantenimiento',
                'costo_filtro_mantenimiento',
                'cantidad_filtros_mantenimiento',
                'unidad_aux_mantenimiento',
                'costo_adicionales_aux_mantenimiento',
                'tipo_ambiente_mantenimiento',
                'ocupacion_semanal_mantenimiento',
                'total_horas',
                'hora_dia',
                'dias_ajustados',
                'idas_ajustados',
            ];


            //valuesArray.push(countador_table);

            ids.forEach(function(id) {
                var value = $('#' + id).val();
                valuesArray.push(value);
            });



            // Enviar valuesArray por medio de AJAX
            var token = $("#token").val();
        $.ajax({
            url: '/nuevo_equipo_mantenimeinto/'+id_project, // Reemplaza con la URL de tu endpoint
            type: 'post',

            headers: { 'X-CSRF-TOKEN': token },
            data: {
                values: valuesArray
            },
            success: async function(response) {

                //var res_formula = await formula_calculo_mantenimiento();
                listar_mantenimiento_equipos(id_project)
                $('#id_tabla_edit').val('');

            },
            error: function(xhr, status, error) {
                console.error('Error al enviar los datos:', error);
            }
        });

/*          setTimeout(() => {
            calcular_speendplan_base()
        }, 2500); */

         setTimeout(() => {
            clean_form_tarjet_mantenimiento();
        }, 2500);

////////////////////////////////
        }else if(indice_tabla > 0 || indice_tabla != ''){
            edit_registro_tabla_edit(id_project);
            clean_form_tarjet_mantenimiento();
        }





       }

       /////////////////////////////////////
   //Livewire.emit('save_equipo')
}

async function clean_form_tarjet_mantenimiento(){
    $("#sistema_mantenimiento").find('option[value="' + 0 + '"]').prop("selected", "selected");
    //await unidadHvac(response[1],'','unidad_mantenimiento',2);
    $("#unidad_mantenimiento").find('option[value=""]').prop("selected", "selected");
    $("#marca_mantenimiento").find('option[value=""]').prop("selected", "selected");
    $("#modelo_mantenimiento").find('option[value=""]').prop("selected", "selected");
    /* send_marcas_to('marca_mantenimiento', response[3], response[1]);
    send_modelo_edit(response[2], 'modelo_mantenimiento', response[4]); */
    $('#capacidad_termica_mantenimiento').val('');
    $('#cantidad_unidades_mantenimiento').val(1);

    $("#tipo_acceso_mantenimiento").find('option[value=""]').prop("selected", "selected");
    $("#estado_unidad_mantenimiento").find('option[value=""]').prop("selected", "selected");
    $("#cambio_filtros_mantenimiento").find('option[value="0"]').prop("selected", "selected");
    $('#costo_filtro_mantenimiento').val('$0');
    $('#cantidad_filtros_mantenimiento').val(0);

}

async function del_td_tr(tr) {
   var costo_cambio_filtros_aux = $('#costo_adicionales_aux_mantenimiento_'+tr).val();
   var costos_filtro_aire_adicionales_aux = $('#costos_filtro_aire_adicionales').val();

   const mival_filtros_costos = costo_cambio_filtros_aux.split('_hidden');
   const costo_filtro_airee = costos_filtro_aire_adicionales_aux.split('$');



   const myArray_coma =costo_filtro_airee[1].split(',');

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

        }else{
            num = costo_filtro_airee[1];
        }

        var resta = parseInt(mival_filtros_costos[0]) - parseInt(num);


    var ids = [
                'contador_table',
                'sistema_mantenimiento',
                'unidad_mantenimiento',
                'marca_mantenimiento',
                'modelo_mantenimiento',
                'capacidad_termica_mantenimiento',
                'cantidad_unidades_mantenimiento',
                'yrs_vida_mantenimiento',
                'tipo_acceso_mantenimiento',
                'estado_unidad_mantenimiento',
                'horas_diarias_mantenimiento',
                'cambio_filtros_mantenimiento',
                'costo_filtro_mantenimiento',
                'cantidad_filtros_mantenimiento',
                'unidad_aux_mantenimiento',
                'costo_adicionales_aux_mantenimiento',
                'tipo_ambiente_mantenimiento',
                'ocupacion_semanal_mantenimiento',
                'total_horas',
                'hora_dia',
                'dias_ajustados',
                'idas_ajustados',
    ];

    // Enviar valuesArray por medio de AJAX
    var token = $("#token").val();
    $.ajax({
        url: '/delete_reg_table_equipos/'+tr, // Reemplaza con la URL de tu endpoint
        type: 'POST',

        headers: { 'X-CSRF-TOKEN': token },
        data: {
            values: ids,
        },
        success: async function(response) {

            //var res_formula = await formula_calculo_mantenimiento();

            $('#tbody_equipos').empty();

            for (var i = 0; i < response.length; i++) {
                const arregloInterno = response[i];
                var newRow = '<tr id='+i+'>';
                for (let j = 0; j < arregloInterno.length; j++) {

                    var value = arregloInterno[j];

                    if (String(value).endsWith('_hidden')) {
                        newRow += '<td id="'+'td_'+ids[j]+'_'+i+'" name="'+'td_'+ids[j]+'_'+i+'"><input id="'+ids[j]+'_'+i+'" name="'+ids[j]+'_'+i+'" style="border: 2px solid; border-color:#1B17BB!important; width:100%;" hidden type="text" class="text-center text-sm font-bold h-8" value="' + value + '"></td>';
                    }else{
                        newRow += '<td id="'+'td_'+ids[j]+'_'+i+'" name="'+'td_'+ids[j]+'_'+i+'"><input id="'+ids[j]+'_'+i+'" name="'+ids[j]+'_'+i+'" style="border: 2px solid; border-color:#1B17BB!important; width:100%;" readonly type="text" class="text-center text-sm font-bold h-8" value="' + value + '"></td>';
                    }
                }
                //newRow += '<input type="hidden"  value="' + res_formula + '" id="precio_'+i+'" name="precio_'+i+'">';
                newRow += '<td style="width:40px;" class=""><button type="button" onclick="del_td_tr('+i+')" class="px-1 border-2 border-red-500 rounded-md text-xl text-orange-400 hover:text-white hover:bg-orange-400"><i class="fas fa-trash"></i></i></button></td>';
                newRow += '<td style="width:30px;" class=""><button type="button" onclick="edit_regstro('+i+')" class="px-1 border-2 border-blue-500 rounded-md text-lg text-blue-400 hover:text-white hover:bg-blue-200"><i class="fas fa-edit"></i></i></button></td>';
                newRow += '</tr>';
                $('#tbody_equipos').append(newRow);

            }


        },
        error: function(xhr, status, error) {
            console.error('Error al enviar los datos:', error);
        }
    });


    var countador_table = $('#contador_table').val();
    countador_table = parseInt(countador_table) - 1;
    $('#contador_table').val(countador_table);

}

async function edit_regstro(tr) {

    var valuesArray = [];

    var ids = [
                'contador_table',
                'sistema_mantenimiento',
                'unidad_mantenimiento',
                'marca_mantenimiento',
                'modelo_mantenimiento',
                'capacidad_termica_mantenimiento',
                'cantidad_unidades_mantenimiento',
                'yrs_vida_mantenimiento',
                'tipo_acceso_mantenimiento',
                'estado_unidad_mantenimiento',
                'horas_diarias_mantenimiento',
                'cambio_filtros_mantenimiento',
                'costo_filtro_mantenimiento',
                'cantidad_filtros_mantenimiento',
                'unidad_aux_mantenimiento',
                'costo_adicionales_aux_mantenimiento',
                'tipo_ambiente_mantenimiento',
                'ocupacion_semanal_mantenimiento',
                'total_horas',
                'hora_dia',
                'dias_ajustados',
                'idas_ajustados',
    ];


    /* var countador_table = $('#contador_table').val();
    countador_table = parseInt(countador_table) + 1;
    $('#contador_table').val(countador_table); */

    //valuesArray.push(countador_table);

    ids.forEach(function(id) {
        var value = $('#' + id).val();
        valuesArray.push(value);
    });


    // Enviar valuesArray por medio de AJAX
    var token = $("#token").val();
    $.ajax({
        url: '/edit_regstro/'+tr, // Reemplaza con la URL de tu endpoint
        type: 'POST',

        headers: { 'X-CSRF-TOKEN': token },
        data: {
            values: valuesArray,
        },
        success: async function(response) {

            $('#indice_tabla_edit').val(response[0]);
            $("#sistema_mantenimiento").find('option[value="' + response[1] + '"]').prop("selected", "selected");
            await unidadHvac(response[1],'','unidad_mantenimiento',2);
            $("#unidad_mantenimiento").find('option[value="' + response[2] + '"]').prop("selected", "selected");

            send_marcas_to('marca_mantenimiento', response[3], response[1]);
            send_modelo_edit(response[3], 'modelo_mantenimiento', response[4]);


           /*  send_marcas_to(marca, res.val_unidad.id_marca, res.val_unidad.unidad_hvac);
            send_modelo_edit(res.val_unidad.id_marca, modelo, res.val_unidad.id_modelo); */


            $('#capacidad_termica_mantenimiento').val(response[5]);
            $('#cantidad_unidades_mantenimiento').val(response[6]);
            $('#yrs_vida_mantenimiento').val(response[7]);
            $("#tipo_acceso_mantenimiento").find('option[value="' + response[8] + '"]').prop("selected", "selected");
            $("#estado_unidad_mantenimiento").find('option[value="' + response[9] + '"]').prop("selected", "selected");
            $("#cambio_filtros_mantenimiento").find('option[value="' + response[11] + '"]').prop("selected", "selected");
            $('#costo_filtro_mantenimiento').val(response[12]);
            $('#cantidad_filtros_mantenimiento').val(response[13]);
            $('#'+tr).find('input').css('border-color', '#ed8936');
            $('#tr_val').val(tr);
        },
        error: function(xhr, status, error) {
            console.error('Error al enviar los datos:', error);
        }
    });


}

function edit_registro_tabla(){
    var indice = $('#indice_tabla_edit').val();
    $('#tbody_equipos').empty();
    var valuesArray = [];

    var ids = [
                'contador_table',
                'sistema_mantenimiento',
                'unidad_mantenimiento',
                'marca_mantenimiento',
                'modelo_mantenimiento',
                'capacidad_termica_mantenimiento',
                'cantidad_unidades_mantenimiento',
                'yrs_vida_mantenimiento',
                'tipo_acceso_mantenimiento',
                'estado_unidad_mantenimiento',
                'horas_diarias_mantenimiento',
                'cambio_filtros_mantenimiento',
                'costo_filtro_mantenimiento',
                'cantidad_filtros_mantenimiento',
                'unidad_aux_mantenimiento',
                'costo_adicionales_aux_mantenimiento',
                'tipo_ambiente_mantenimiento',
                'ocupacion_semanal_mantenimiento',
                'total_horas',
                'hora_dia',
                'dias_ajustados',
                'idas_ajustados',
    ];


    /* var countador_table = $('#contador_table').val();
    countador_table = parseInt(countador_table) + 1;
    $('#contador_table').val(countador_table); */

    //valuesArray.push(countador_table);

    ids.forEach(function(id) {
        var value = $('#' + id).val();
        valuesArray.push(value);
    });

    var token = $("#token").val();
    $.ajax({
        url: '/update_registro/'+indice, // Reemplaza con la URL de tu endpoint
        type: 'POST',

        headers: { 'X-CSRF-TOKEN': token },
        data: {
            values: valuesArray,
        },
        success: async function(response) {

            //var res_formula = await formula_calculo_mantenimiento();

            for (var i = 0; i < response.length; i++) {
                const arregloInterno = response[i];
                var newRow = '<tr id='+i+'>';
                for (let j = 0; j < arregloInterno.length; j++) {

                    var value = arregloInterno[j];

                    if (String(value).endsWith('_hidden')) {
                        newRow += '<td id="'+'td_'+ids[j]+'_'+i+'" name="'+'td_'+ids[j]+'_'+i+'"><input id="'+ids[j]+'_'+i+'" name="'+ids[j]+'_'+i+'" style="border: 2px solid; border-color:#1B17BB!important; width:100%;" hidden type="text" class="text-center text-sm font-bold h-8" value="' + value + '"></td>';
                    }else{
                        newRow += '<td id="'+'td_'+ids[j]+'_'+i+'" name="'+'td_'+ids[j]+'_'+i+'"><input id="'+ids[j]+'_'+i+'" name="'+ids[j]+'_'+i+'" style="border: 2px solid; border-color:#1B17BB!important; width:100%;" readonly type="text" class="text-center text-sm font-bold h-8" value="' + value + '"></td>';
                    }


                }
                //newRow += '<input type="hidden"  value="' + res_formula + '" id="precio_'+i+'" name="precio_'+i+'">';
                newRow += '<td style="width:30px;" class=""><button type="button" onclick="del_td_tr('+i+')" class="px-1 border-2 border-red-500 rounded-md text-xl text-orange-400 hover:text-white hover:bg-orange-400"><i class="fas fa-trash"></i></i></button></td>';
                newRow += '<td style="width:30px;" class=""><button type="button" onclick="edit_regstro('+i+')" class="px-1 border-2 border-blue-500 rounded-md text-lg text-blue-400 hover:text-white hover:bg-blue-200"><i class="fas fa-edit"></i></i></button></td>';
                newRow += '</tr>';
                $('#tbody_equipos').append(newRow);
            }
            var input_name_tr = $('#tr_val').val();
            $('#'+input_name_tr).find('input').css('border-color', '#1B17BB');
            $('#tr_val').val('');
            $('#indice_tabla_edit').val('');
        },
        error: function(xhr, status, error) {
            console.error('Error al enviar los datos:', error);
        }
    });

   /*  setTimeout(() => {
        calcular_speendplan_base()
    }, 2500); */

    /* setTimeout(() => {
        clean_form_tarjet_mantenimiento();
    }, 2500); */

}

async function formula_calculo_mantenimiento(i) {
    var token = $("#token").val();
    var endpoint = "/get_data_form/";
    var formData = {};

    // Serializar todos los elementos cuyo nombre termina en '_mantenimiento' o contiene '_mantenimiento_'
    /* check this  $("input[name$='_mantenimiento'], select[name$='_mantenimiento'], input[name*='_mantenimiento_'], input[name*='precio_']").each */

    try {
        $("input[name$='_mantenimiento'], select[name$='_mantenimiento'],input[name*='_mantenimiento_"+i+"']").each(function() {
            formData[$(this).attr('name')] = $(this).val();
        });
        let response = await $.ajax({
            url: endpoint,
            type: 'post',
            headers: { 'X-CSRF-TOKEN': token },
            data: formData
        });

        return response;
    } catch (error) {
        console.error('Error al enviar los datos:', error);
    }
}

function edit_registro_tabla_edit(){

var indice = $('#indice_tabla_edit').val();
$('#tbody_equipos').empty();
var valuesArray = [];

var ids = [
        'contador_table',
        'sistema_mantenimiento',
        'unidad_mantenimiento',
        'marca_mantenimiento',
        'modelo_mantenimiento',
        'capacidad_termica_mantenimiento',
        'cantidad_unidades_mantenimiento',
        'yrs_vida_mantenimiento',
        'tipo_acceso_mantenimiento',
        'estado_unidad_mantenimiento',
        'horas_diarias_mantenimiento',
        'cambio_filtros_mantenimiento',
        'costo_filtro_mantenimiento',
        'cantidad_filtros_mantenimiento',
        'unidad_aux_mantenimiento',
        'costo_adicionales_aux_mantenimiento',
        'tipo_ambiente_mantenimiento',
        'ocupacion_semanal_mantenimiento',
        'total_horas',
        'hora_dia',
        'dias_ajustados',
        'idas_ajustados',
];


/* var countador_table = $('#contador_table').val();
countador_table = parseInt(countador_table) + 1;
$('#contador_table').val(countador_table); */

//valuesArray.push(countador_table);

ids.forEach(function(id) {
    var value = $('#' + id).val();
    valuesArray.push(value);
});

var token = $("#token").val();
$.ajax({
    url: '/update_registro_edit/'+indice, // Reemplaza con la URL de tu endpoint
    type: 'POST',

    headers: { 'X-CSRF-TOKEN': token },
    data: {
        values: valuesArray,
    },
    success: async function(response) {
        listar_mantenimiento_equipos(response);
        var input_name_tr = $('#tr_val').val();
        $('#'+input_name_tr).find('input').css('border-color', '#1B17BB');
        $('#tr_val').val('');
        $('#indice_tabla_edit').val('');
        $('#id_tabla_edit').val('');
    },
    error: function(xhr, status, error) {
        console.error('Error al enviar los datos:', error);
    }
});

/*  setTimeout(() => {
    calcular_speendplan_base()
}, 2500); */

/* setTimeout(() => {
    clean_form_tarjet_mantenimiento();
}, 2500); */

}

function set_options_factor_mantenimiento(){

    var token = $("#token").val();
    var endpoint = "/set_options_factor_mantenimiento";
    var ima =  $('#idioma').val();
    $.ajax({
        url: endpoint,
        type: 'get',

        headers: { 'X-CSRF-TOKEN': token },
        success: function(response) {
            $('#tipo_ambiente_mantenimiento').empty();
            check_val_text('tipo_ambiente_mantenimiento',ima)

            response.forEach(res => {
                $('#tipo_ambiente_mantenimiento').append($('<option>', {
                    value: res.id,
                    text: res.factor
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error('Error al enviar los datos:', error);
        }
    });
}

function set_options_factor_acceso(){

    var token = $("#token").val();
    var endpoint = "/set_options_factor_acceso";
    var ima =  $('#idioma').val();
    $.ajax({
        url: endpoint,
        type: 'get',

        headers: { 'X-CSRF-TOKEN': token },
        success: function(response) {
            $('#tipo_acceso_mantenimiento').empty();
            check_val_text('tipo_acceso_mantenimiento',ima)

            response.forEach(res => {
                $('#tipo_acceso_mantenimiento').append($('<option>', {
                    value: res.id,
                    text: res.factor
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error('Error al enviar los datos:', error);
        }
    });
}

function set_options_factor_estado_unidad(){

    var token = $("#token").val();
    var endpoint = "/set_options_factor_estado_unidad";
    var ima =  $('#idioma').val();
    $.ajax({
        url: endpoint,
        type: 'get',

        headers: { 'X-CSRF-TOKEN': token },
        success: function(response) {
            $('#estado_unidad_mantenimiento').empty();
            check_val_text('estado_unidad_mantenimiento',ima)

            response.forEach(res => {
                $('#estado_unidad_mantenimiento').append($('<option>', {
                    value: res.id,
                    text: res.factor
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error('Error al enviar los datos:', error);
        }
    });
}

function set_options_estado_unidad(){
    var token = $("#token").val();
    var endpoint = "/set_options_factor_estado_unidad";
    var ima =  $('#idioma').val();
    $.ajax({
        url: endpoint,
        type: 'get',

        headers: { 'X-CSRF-TOKEN': token },
        success: function(response) {
            $('#estado_unidad_mantenimiento').empty();
            check_val_text('estado_unidad_mantenimiento',ima)

            response.forEach(res => {
                $('#estado_unidad_mantenimiento').append($('<option>', {
                    value: res.id,
                    text: res.factor
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error('Error al enviar los datos:', error);
        }
    });
}

function no_cero(value,id){
    var input_select = $('#'+id);
    input_select.val(parseInt(value));
}

function change_to(value,unidad,id){

    const myArray = value.split(unidad);

    if (myArray.length > 1) {

            check_porcent_max_min_kms(myArray[0],id,unidad);
    }

    if (myArray.length==1) {
        check_porcent_max_min_kms(value,id,unidad);
        //input_select.val(porcent + '%');
    }
}

function set_yrs_tarjet(value,id){
    var input_select = $('#'+id);
    input_select.val(parseInt(value));

}

function check_porcent_max_min_kms(value,id,unidad){
    var input_select = $('#'+id);

    switch (unidad) {
        case 'kms':
            var maxim = 300;
            var min = 0;
        break;

        case 'km/h':
            var maxim = 120;
            var min = 0;
        break;

        case '%':
            var maxim = 100;
            var min = 0;
        break;

        default:
        break;
    }

    if(value > maxim){
        input_select.empty();
        input_select.val(parseInt(maxim)+unidad);
        return false;
    }

    if(value >= min && value <= maxim){
        input_select.empty();
        input_select.val(parseInt(value)+unidad);
        return false;
    }

    if(value < min){
        input_select.empty();
        input_select.val(parseInt(min)+unidad);
        return false;
    }

 }

 function calcular_speendplan_base(){
    var token = $("#token").val();
    var formData = {};
    $("input[name$='_mantenimiento'], select[name$='_mantenimiento'],input[name*='_mantenimiento_'], input[name*='precio_'], input[name*='total_horas_'], input[name*='hora_dia_'], input[name*='dias_ajustados_'], input[name*='idas_ajustados_']").each(function() {
        formData[$(this).attr('name')] = $(this).val();
    });

    $.ajax({
        url: '/verifica_unidades_mantenimiento', // Reemplaza con la URL de tu endpoint
        type: 'get',
        success: async function(res) {
            if (res == 1) {
              Swal.fire({
                    title: 'Guardar?',
                    text: "",
                    showDenyButton: true,
                    showConfirmButton: true,
                    icon: 'question',
                    showCancelButton: true,
                    cancelButtonColor: '#FF6600',
                    confirmButtonText:`Guardar`,
                    confirmButtonColor: '#3182ce',

                }).then((result) => {
                    var token = $("#token").val();
                    if (result.isDenied) {
                    return false;
                    }

                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/spend_plan_base',  //
                            type: 'post',

                            headers: { 'X-CSRF-TOKEN': token },
                            data: {
                                values: formData
                            },
                            success: async function(response) {


                                Swal.fire({
                                    title: '¡Exito!',
                                    icon: 'success',
                                    text:'Guardado'

                                })
                                window.location.href = 'edit_project/' + response;
                            },
                            error: function(xhr, status, error) {
                                console.error('Error al enviar los datos:', error);
                            }
                        });
                    }

                })
            }else if (res == 2){
                Swal.fire({
                    title: 'Atención!',
                    icon: 'warning',
                    text:'No se ha guardado ningun elemento'
                })
                return false;
            }
        },
        error: function(xhr, status, error) {
            console.error('Error al enviar los datos:', error);
        }
    });

}

function calcular_speendplan_base_update(id_project){
    var token = $("#token").val();
    var formData = {};
    $("input[name$='_mantenimiento'], select[name$='_mantenimiento'],input[name*='_mantenimiento_'], input[name*='precio_'], input[name*='total_horas_'], input[name*='hora_dia_'], input[name*='dias_ajustados_'], input[name*='idas_ajustados_'] , input[name*='action_submit_send'], input[name*='type_p']").each(function() {
        formData[$(this).attr('name')] = $(this).val();
    });

    $.ajax({
        url: '/verifica_unidades_mantenimiento', // Reemplaza con la URL de tu endpoint
        type: 'get',
        success: async function(res) {
            if (res == 1) {
              Swal.fire({
                    title: 'Guardar?',
                    text: "",
                    showDenyButton: true,
                    showConfirmButton: true,
                    icon: 'question',
                    showCancelButton: true,
                    cancelButtonColor: '#FF6600',
                    confirmButtonText:`Guardar`,
                    confirmButtonColor: '#3182ce',

                }).then((result) => {
                    var token = $("#token").val();
                    if (result.isDenied) {
                    return false;
                    }

                    if (result.isConfirmed) {

                        $.ajax({
                            url: '/switch_proyecto_mantenimiento/'+id_project,
                            type: 'post',

                            headers: { 'X-CSRF-TOKEN': token },
                            data: {
                                values: formData
                            },
                            success: async function(response) {
                                Swal.fire({
                                    title: '¡Exito!',
                                    icon: 'success',
                                    text:'Guardado'

                                })
                                window.location.href = '/edit_project/' + response;
                            },
                            error: function(xhr, status, error) {
                                console.error('Error al enviar los datos:', error);
                            }
                        });
                    }

                })
            }else if (res == 2){
                Swal.fire({
                    title: 'Atención!',
                    icon: 'warning',
                    text:'No se ha guardado ningun elemento'
                })
                return false;
            }
        },
        error: function(xhr, status, error) {
            console.error('Error al enviar los datos:', error);
        }
    });

}


 function calcular_speendplan_base_edit(id_project){

    var token = $("#token").val();
    var formData = {};
    $("input[name$='_mantenimiento'], select[name$='_mantenimiento']").each(function() {
        formData[$(this).attr('name')] = $(this).val();
    });

    $.ajax({
        url: '/spend_plan_base_edit/'+id_project, // Reemplaza con la URL de tu endpoint
        type: 'post',

        headers: { 'X-CSRF-TOKEN': token },
        data: {
            values: formData
        },
        success: async function(response) {
            $('#valor_contrato_anual').val(response[0]);
            $('#dias_mantenimiento').val(response[1]);
            $('#tiempo_mantenimiento').val(response[2]);
            $('#tiempo_traslados').val(response[3]);
            $('#tiempo_acceso_edificio').val(response[4]);
            $('#tiempo_garantias').val(response[5]);
            $('#costos_filtro_aire_adicionales').val(response[6]);

        },
        error: function(xhr, status, error) {
            console.error('Error al enviar los datos:', error);
        }
    });
 }


 function calcular_speendplan_base_adicionales(){

    let dollarUSLocale = Intl.NumberFormat('en-US');
    var token = $("#token").val();
    var formData = {};
    var only_adicionales = {};
    $("input[name$='_adicionales'],input[name$='_mantenimiento'], select[name$='_mantenimiento'],input[name*='_mantenimiento_0'],input[name*='costo_estimado_sistema_hvac']").each(function() {
        formData[$(this).attr('name')] = $(this).val();
    });

    $("input[name$='_adicionales']").each(function() {
        only_adicionales[$(this).attr('name')] = $(this).val();
    });


    for (var key in only_adicionales) {
        if (only_adicionales.hasOwnProperty(key)) {
            var value = only_adicionales[key];


            if (value !== '0' && value !== '$0' && value !== "") {

                $.ajax({
                    url: '/spend_plan_base_adicionales', // Reemplaza con la URL de tu endpoint
                    type: 'post',

                    headers: { 'X-CSRF-TOKEN': token },
                    data: {
                        values: formData
                    },
                    success: async function(response) {
                        $('#valor_contrato_anual_adicionales_prev').val(response[0]);
                        $('#mantenimiento_justificacion_financiera_futuro').val(response[0]);
                        $('#dias_mantenimiento_adicionales_prev').val(response[1]);
                        $('#tiempo_mantenimiento_adicionales_prev').val(response[2]);
                        $('#tiempo_traslados_adicionales_prev').val(response[3]);
                        $('#tiempo_acceso_edificio_adicionales_prev').val(response[4]);
                        $('#tiempo_garantias_adicionales_prev').val(response[5]);
                        $('#materiales_gp_40').val('$'+dollarUSLocale.format(response[6]));
                        $('#equipos_gp_40').val('$'+dollarUSLocale.format(response[7]));
                        $('#mano_obra_gp_40').val('$'+dollarUSLocale.format(response[8]));
                        $('#vehiculo_gp_40').val('$'+dollarUSLocale.format(response[9]));
                        $('#contratista_gp_40').val('$'+dollarUSLocale.format(response[10]));
                        $('#viaticos_gp_40').val('$'+dollarUSLocale.format(response[11]));
                        $('#burden_gp_40').val('$'+dollarUSLocale.format(response[12]));
                        $('#ga_gp_40').val('$'+dollarUSLocale.format(response[13]));
                        $('#ventas_gp_40').val('$'+dollarUSLocale.format(response[14]));
                        $('#financiamiento_gp_40').val('$'+dollarUSLocale.format(response[15]));
                        $('#materiales_porcent_gp_40').val(response[16]);
                        $('#equipos_porcent_gp_40').val(response[17]);
                        $('#mano_obra_porcent_gp_40').val(response[18]);
                        $('#vehiculo_porcent_gp_40').val(response[19]);
                        $('#contratista_porcent_gp_40').val(response[20]);
                        $('#viaticos_porcent_gp_40').val(response[21]);
                        $('#burden_porcent_gp_40').val(response[22]);
                        $('#ga_gp_porcent_40').val(response[23]);
                        $('#ventas_porcent_gp_40').val(response[24]);
                        $('#financiamiento_porcent_gp_40').val(response[25]);
                        $('#valor_venta_gp_40').val(response[0]);
                        $('#ganancia_porcent_gp_40').val(response[26]);
                        $('#ganancia_gp_40').val('$'+dollarUSLocale.format(response[27]));

                        chart_vals_mant(response[28],response[29],response[30],response[31],response[32]);
                    },

                });
            }else{

                var valor_contrato_anual = $('#valor_contrato_anual').val();
                var dias_mantenimiento = $('#dias_mantenimiento').val();
                var tiempo_mantenimiento = $('#tiempo_mantenimiento').val();
                var tiempo_traslados = $('#tiempo_traslados').val();
                var tiempo_acceso_edificio = $('#tiempo_acceso_edificio').val();
                var tiempo_garantias = $('#tiempo_garantias').val();

                $('#valor_contrato_anual_adicionales_prev').val(valor_contrato_anual);
               $('#dias_mantenimiento_adicionales_prev').val(dias_mantenimiento);
               $('#tiempo_mantenimiento_adicionales_prev').val(tiempo_mantenimiento);
               $('#tiempo_traslados_adicionales_prev').val(tiempo_traslados);
               $('#tiempo_acceso_edificio_adicionales_prev').val(tiempo_acceso_edificio);
               $('#tiempo_garantias_adicionales_prev').val(tiempo_garantias);

            }
        }
    }
 }


 function calcular_speendplan_base_adicionales_edit(id){
    let dollarUSLocale = Intl.NumberFormat('en-US');
    var token = $("#token").val();
    var formData = {};
    var only_adicionales = {};
    $("input[name$='_adicionales'],input[name$='_mantenimiento'], select[name$='_mantenimiento'],input[name*='_mantenimiento_0'],input[name*='costo_estimado_sistema_hvac']").each(function() {
        formData[$(this).attr('name')] = $(this).val();
    });

    $("input[name$='_adicionales']").each(function() {
        only_adicionales[$(this).attr('name')] = $(this).val();
    });

    for (var key in only_adicionales) {
        if (only_adicionales.hasOwnProperty(key)) {
            var value = only_adicionales[key];
            if (value !== '0' && value !== '$0' && value !== '') {
                $.ajax({
                    url: '/spend_plan_base_adicionales_edit/'+id, // Reemplaza con la URL de tu endpoint
                    type: 'post',

                    headers: { 'X-CSRF-TOKEN': token },
                    data: {
                        values: formData
                    },
                    success: async function(response) {
                        $('#valor_contrato_anual_adicionales_prev').val(response[0]);
                        $('#mantenimiento_justificacion_financiera_futuro').val(response[0]);
                        $('#dias_mantenimiento_adicionales_prev').val(response[1]);
                        $('#tiempo_mantenimiento_adicionales_prev').val(response[2]);
                        $('#tiempo_traslados_adicionales_prev').val(response[3]);
                        $('#tiempo_acceso_edificio_adicionales_prev').val(response[4]);
                        $('#tiempo_garantias_adicionales_prev').val(response[5]);
                        $('#materiales_gp_40').val('$'+dollarUSLocale.format(response[6]));
                        $('#equipos_gp_40').val('$'+dollarUSLocale.format(response[7]));
                        $('#mano_obra_gp_40').val('$'+dollarUSLocale.format(response[8]));
                        $('#vehiculo_gp_40').val('$'+dollarUSLocale.format(response[9]));
                        $('#contratista_gp_40').val('$'+dollarUSLocale.format(response[10]));
                        $('#viaticos_gp_40').val('$'+dollarUSLocale.format(response[11]));
                        $('#burden_gp_40').val('$'+dollarUSLocale.format(response[12]));
                        $('#ga_gp_40').val('$'+dollarUSLocale.format(response[13]));
                        $('#ventas_gp_40').val('$'+dollarUSLocale.format(response[14]));
                        $('#financiamiento_gp_40').val('$'+dollarUSLocale.format(response[15]));
                        $('#materiales_porcent_gp_40').val(response[16]);
                        $('#equipos_porcent_gp_40').val(response[17]);
                        $('#mano_obra_porcent_gp_40').val(response[18]);
                        $('#vehiculo_porcent_gp_40').val(response[19]);
                        $('#contratista_porcent_gp_40').val(response[20]);
                        $('#viaticos_porcent_gp_40').val(response[21]);
                        $('#burden_porcent_gp_40').val(response[22]);
                        $('#ga_gp_porcent_40').val(response[23]);
                        $('#ventas_porcent_gp_40').val(response[24]);
                        $('#financiamiento_porcent_gp_40').val(response[25]);
                        $('#valor_venta_gp_40').val(response[0]);
                        $('#ganancia_porcent_gp_40').val(response[26]);
                        $('#ganancia_gp_40').val('$'+dollarUSLocale.format(response[27]));
                        chart_vals_mant(response[28],response[29],response[30],response[31],response[32]);
                    },

                });
            }else{
                var valor_contrato_anual = $('#valor_contrato_anual').val();
                var dias_mantenimiento = $('#dias_mantenimiento').val();
                var tiempo_mantenimiento = $('#tiempo_mantenimiento').val();
                var tiempo_traslados = $('#tiempo_traslados').val();
                var tiempo_acceso_edificio = $('#tiempo_acceso_edificio').val();
                var tiempo_garantias = $('#tiempo_garantias').val();

                $('#valor_contrato_anual_adicionales_prev').val(valor_contrato_anual);
               $('#dias_mantenimiento_adicionales_prev').val(dias_mantenimiento);
               $('#tiempo_mantenimiento_adicionales_prev').val(tiempo_mantenimiento);
               $('#tiempo_traslados_adicionales_prev').val(tiempo_traslados);
               $('#tiempo_acceso_edificio_adicionales_prev').val(tiempo_acceso_edificio);
               $('#tiempo_garantias_adicionales_prev').val(tiempo_garantias);
                chart_vals_mant(0,0,0,0,0);
            }
        }
    }
 }

 function calcular_speendplan_base_adicional_gp(porcent_aux){
    const myArray = porcent_aux.split('%');
    let porcent = myArray[0];
    console.log(porcent);

    let dollarUSLocale = Intl.NumberFormat('en-US');
    var token = $("#token").val();
    var formData = {};
    var only_adicionales = {};
    $("input[name$='_adicionales'],input[name$='_mantenimiento'], select[name$='_mantenimiento']").each(function() {
        formData[$(this).attr('name')] = $(this).val();
    });

    $("input[name$='_adicionales']").each(function() {
        only_adicionales[$(this).attr('name')] = $(this).val();
    });

    $.ajax({
        url: '/spend_plan_base_adicionales_gp'+'/'+porcent, // Reemplaza con la URL de tu endpoint
        type: 'post',
        headers: { 'X-CSRF-TOKEN': token },
        data: {
            values: formData
        },
        success: async function(response) {
            $('#materiales_gp').val('$'+dollarUSLocale.format(response[6]));
            $('#equipos_gp ').val('$'+dollarUSLocale.format(response[7]));
            $('#mano_obra_gp ').val('$'+dollarUSLocale.format(response[8]));
            $('#vehiculo_gp ').val('$'+dollarUSLocale.format(response[9]));
            $('#contratista_gp ').val('$'+dollarUSLocale.format(response[10]));
            $('#viaticos_gp ').val('$'+dollarUSLocale.format(response[11]));
            $('#burden_gp ').val('$'+dollarUSLocale.format(response[12]));
            $('#ga_gp ').val('$'+dollarUSLocale.format(response[13]));
            $('#ventas_gp ').val('$'+dollarUSLocale.format(response[14]));
            $('#financiamiento_gp ').val('$'+dollarUSLocale.format(response[15]));
            $('#materiales_porcent_gp').val(response[16]);
            $('#equipos_porcent_gp').val(response[17]);
            $('#mano_obra_porcent_gp').val(response[18]);
            $('#vehiculo_porcent_gp').val(response[19]);
            $('#contratista_porcent_gp').val(response[20]);
            $('#viaticos_porcent_gp').val(response[21]);
            $('#burden_porcent_gp').val(response[22]);
            $('#ga_porcent_gp').val(response[23]);
            $('#ventas_porcent_gp').val(response[24]);
            $('#financiamiento_porcent_gp').val(response[25]);
            $('#valor_venta_gp').val(response[0]);
            $('#ganancia_porcent_gp').val(response[26]);
            $('#ganancia_gp').val('$'+dollarUSLocale.format(response[27]));
        },

    });

 }


 function change_img(value){

    switch (value) {
        case 'basico':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:130px; width:280px;" src="/assets/images/equipos/basico.png" alt="sistemas">');
        break;

        case 'c_economizador':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:130px; width:280px;" src="/assets/images/equipos/ceconomizador.png" alt="sistemas">');
        break;

        case 'w_heat_rec':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:130px; width:280px;" src="/assets/images/equipos/heatrecovery.png" alt="sistemas">');
        break;

        case 'mochila_pared':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:250px; width:200px;" src="/assets/images/equipos/mochila.png" alt="sistemas">');
        break;

        case 'condensadora_split':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:130px; width:280px;" src="/assets/images/equipos/mochila.png" alt="sistemas">');
        break;

        case 'manejadora':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/manejadora.png" alt="sistemas">');
        break;

        case 'manejadora2':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/manejadora.png" alt="sistemas">');
        break;

        case 'fancoil':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/fancoilmhsp.png" alt="sistemas">');
        break;

        case 'fancoil2':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/fancoilmhsp.png" alt="sistemas">');
        break;

        case 'fancoil_lsp_spt':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/fancoillsp.png" alt="sistemas">');
        break;

        case 'fancoil_lsp_spt2':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/fancoillsp.png" alt="sistemas">');
        break;

        case 'condensadora_vrf_vrv':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:250px; width:200px;" src="/assets/images/equipos/condensadora.png" alt="sistemas">');
        break;

        case 'papisotecho_vrf_vrv':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/pared_piso_techo.png" alt="sistemas">');
        break;

        case 'fancoil_lsp_vrf_vrv':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/fancoilvrf.png" alt="sistemas">');
        break;

        case 'fancoil_hsp_vrf_vrv':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/fancoilmhspvrf.png" alt="sistemas">');
        break;

        case 'cassette_vrf_vrv':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/casssete.png" alt="sistemas">');
        break;

        case 'manejadora_vrf_vrv':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/manejadoravrf.png" alt="sistemas">');
        break;

        case 'horz':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:250px; width:200px;" src="/assets/images/equipos/vtac.png" alt="sistemas">');
        break;

        case 'vert':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/ptac.png" alt="sistemas">');
        break;

        case 'agu_cir_cer':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/horizontal.png" alt="sistemas">');
        break;

        case 'agu_cir_abr':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:250px; width:200px;" src="/assets/images/equipos/vertical.png" alt="sistemas">');
        break;

        case 'pa_pi_te':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/pared_piso_techominisplit.png" alt="sistemas">');
        break;

        case 'pa_pi_te2':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/pared_piso_techominisplit.png" alt="sistemas">');
        break;

        case 'duc_con':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/conceledminisplit.png" alt="sistemas">');
        break;

        case 'duc_con2':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/conceledminisplit.png" alt="sistemas">');
        break;

        case 'cass':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/casseeteminisplit.png" alt="sistemas">');
        break;

        case 'cass2':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/casseeteminisplit.png" alt="sistemas">');
        break;

        case 'condensadora_unidad':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:250px; width:200px;" src="/assets/images/equipos/condensadoraunidades.png" alt="sistemas">');
        break;

        case 'condensador_unidad':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/condensadorunidades.png" alt="sistemas">');
        break;

        case 'manejadora_unidad':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:250px; width:200px;" src="/assets/images/equipos/manejadoraunidadpresision.png" alt="sistemas">');
        break;

        case 'paquete_unidad':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:250px; width:200px;" src="/assets/images/equipos/paqueteunidad.png" alt="sistemas">');
        break;

        case 'gabinete_unidad':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:250px; width:200px;" src="/assets/images/equipos/gabinete.png" alt="sistemas">');
        break;

        case 'enfriado_aire_scroll':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/enfriadoairechiller.png" alt="sistemas">');
        break;

        case 'enfriado_agua_scroll':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/enfriadoagua.png" alt="sistemas">');
        break;

        case 'portatil_proceso_scroll':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/portatilchiller.png" alt="sistemas">');
        break;

        case 'manejadora_equipamiento_agua_fria':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/manejadoraaguafria.png" alt="sistemas">');
        break;

        case 'fan_coil_lsp_equipamiento_agua_fria':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/fancoillspaguafria.png" alt="sistemas">');
        break;

        case 'fan_coil_hsp_equipamiento_agua_fria':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/fancoilhspaguafria.png" alt="sistemas">');
        break;

        case 'bomba_agua_equipamiento_agua_fria':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/bombaagua.png" alt="sistemas">');
        break;

        case 'bomba_standby_equipamiento_agua_fria':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/bombaagua.png" alt="sistemas">');
        break;

        case 'abierta_torres_enfriamiento':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/abiertatorre.png" alt="sistemas">');
        break;

        case 'cerrada_torres_enfriamiento':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:250px; width:200px;" src="/assets/images/equipos/cerradatorre.png" alt="sistemas">');
        break;

        case 'extractor_bano_ventilacion':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/extractorbano.png" alt="sistemas">');
        break;

        case 'axial_polea_ventilacion':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/axialpoleaventilacion.png" alt="sistemas">');
        break;

        case 'axial_directo_ventilacion':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/axialdirectoventilacion.png" alt="sistemas">');
        break;

        case 'centrifugo_polea_ventilacion':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/centrifugopoleaventilacion.png" alt="sistemas">');
        break;

        case 'centrifugo_directo_ventilacion':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/centrifugoventilacion.png" alt="sistemas">');
        break;

        case 'campana_techo_ventilacion':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/campanatechoventilalacion.png" alt="sistemas">');
        break;

        case 'campana_pared_ventilacion':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/campanaventilacion.png" alt="sistemas">');
        break;

        case 'eolico_ventilacion':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/eolicoceentilacion.png" alt="sistemas">');
        break;

        case 'doa_basica_ventilacion':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/doabasicaventilacion.png" alt="sistemas">');
        break;

        case 'doa_hr_ventilacion':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/daohrventilacion.png" alt="sistemas">');
        break;

        case 'termostato_basico_accesorios':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/termostatobasicoaccesorios.png" alt="sistemas">');
        break;

        case 'termostato_inteligente_accesorios':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/termostatointeligenteaccesorio.png" alt="sistemas">');
        break;

        case 'caja_vav_basica_accesorios':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/cajavavaccesorios.png" alt="sistemas">');
        break;

        case 'caja_vav_avanzada_accesorios':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/cajavavavanzadaaccesorios.png" alt="sistemas">');
        break;

        case 'damper_manual_accesorios':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/dampermanualaccesorios.png" alt="sistemas">');
        break;

        case 'damper_motorizado_accesorios':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/dampermotorizadoaccesorios.png" alt="sistemas">');
        break;

        case 'cortinas_aire_accesorios':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/cortinaaireaccesorios.png" alt="sistemas">');
        break;

        case 'enfriado_aire_tornillo':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/enfiradoairetornillo.png" alt="sistemas">');
        break;

        case 'enfriado_agua_tornillo':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/enfriadoaguatornillo.png" alt="sistemas">');
        break;

        case 'enfriado_aire_turbocor':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/enfriadoaireturbocor.png" alt="sistemas">');
        break;

        case 'enfriado_agua_turbocor':
          $('#img_sistemas').html( '<img id="img_sistemas" name="img_sistemas" style="height:200px; width:280px;" src="/assets/images/equipos/enfriadoaguaturbocor.png" alt="sistemas">');
        break;

        default:
            break;
    }
 }

 function send_costo_cambio_filtros(){

    let dollarUSLocale = Intl.NumberFormat('en-US');

    var costo_aux = $('#costo_filtro_mantenimiento').val();
    var num_unidades = $('#cantidad_unidades_mantenimiento').val();

   // Separar la cadena usando "$" como delimitador
    var costo = money_format_to_integer(costo_aux);

    var cantidad = $('#cantidad_filtros_mantenimiento').val();
    var mult_costo_catidad = costo * cantidad;
    var total = mult_costo_catidad * num_unidades;

    $('#costos_filtro_aire_adicionales').val('$'+dollarUSLocale.format(total));
 }


 function chart_vals_mant(ideal,tipico,malo,base,c_adicionaes){

    $('#chart_vals_mant').empty();
    var options = {
         series: [{
        name: "Costo",
         data: [parseFloat(c_adicionaes).toFixed(0),parseFloat(base).toFixed(0),parseFloat(malo).toFixed(0),parseFloat(tipico).toFixed(0),parseFloat(ideal).toFixed(0) ]
       }],
         chart: {
         type: 'bar',
         height: 350
       },
       plotOptions: {
         bar: {
           borderRadius: 4,
           borderRadiusApplication: 'end',
           horizontal: true,
         }
       },
       dataLabels: {
         enabled: false
       },
       legend: {
      show: false, // Ocultar la leyenda
        },
       xaxis: {
         categories: ['C/Adicionales','Base','Malo','Tipico','Ideal'
         ],
         labels: {
               style: {
                   colors: [],
                   fontSize: '14px',
                   fontFamily: 'ABeeZee, sans-serif',
                   fontWeight: "bold",
                   cssClass: 'apexcharts-yaxis-label',
               },
           },
           formatter: function (value) {
            // Formatear los valores del eje X como moneda
            return '$'+value;
          },
       },
       yaxis:{
           labels: {
               style: {
                   colors: [],
                   fontSize: '16px',
                   fontFamily: 'ABeeZee, sans-serif',
                   fontWeight: "bold",
                   cssClass: 'apexcharts-yaxis-label',
               },
           },
       },

       };

       var chart = new ApexCharts(document.querySelector("#chart_vals_mant"), options);
       chart.render();
   }


   function save_mantenimiento(){
                formulario = document.getElementById('formulario');
                formulario.submit();
   }

   function update_mantenimiento(){
    formulario = document.getElementById('formulario');
    formulario.submit();
}

   function eui_justificacion_financiera(value){

    var area = $('#ar_project_mantenimiento').val();
    var area_aux = change_number_format_to_int(area);

    var tarifa_electrica = 0.12;
    var consumo_energia_edificio_aux = $('#consumo_energia_edificio_mantenimiento').val();
    var consumo_energia_edificio = money_format_to_integer(consumo_energia_edificio_aux);

    //enviar energia actual a justificacion eneergia
    $('#energia_justificacion_mantenimiento').val(consumo_energia_edificio_aux);
    //formula Eui
    //(Consumo Anual Edificio / 0.12) x 3.412 / (area x 10.7639)
    //area x 10.7639
    var area_x_10  = area_aux * 10.7639;
    var consumo_energia_edificio_div_tarifa_electrica  = consumo_energia_edificio / tarifa_electrica;
    var consumo_energia_edificio_div_tarifa_electrica_mult_3_412 = consumo_energia_edificio_div_tarifa_electrica * 3.412;


    var res_aux = consumo_energia_edificio_div_tarifa_electrica_mult_3_412 / area_x_10;
    var res = parseFloat(res_aux).toFixed(1);
    $('#eui_mantenimiento').val(res);

    /*  */

   }



   function calcular_justificacion_financiera(value){

    let dollarUSLocale = Intl.NumberFormat('en-US');
    var check_ashrae = $('#estandar_ashrae_checked');
    var check_merv = $('#filtros_merv_checked');
    var check_filtros = $('#remplazo_filtros_checked');
    var check_mant_prev = $('#mant_preven_checked');
    var porcent_hvac = $('#porcent_hvac_mantenimiento').val();
    var consumo_energia_edificio_aux = $('#consumo_energia_edificio_mantenimiento').val();
    var consumo_energia_edificio = money_format_to_integer(consumo_energia_edificio_aux);

    if(check_ashrae.prop('checked')){
        var valor_ashrae = 0.08
    }else{
        var valor_ashrae = 0;
    }

    if(check_merv.prop('checked')){
        var valor_merv = 0.07;
    }else{
        var valor_merv = 0;
    }

    if(check_filtros.prop('checked')){
        var valor_filtros = 0.06;
    }else{
        var valor_filtros = 0;
    }

    if(check_mant_prev.prop('checked')){
        var valor_mant_prev = 0.09;
    }else{
        var valor_mant_prev = 0;
    }


        //reduccion desperdicio eneregtico
        //consumo_energia_edificio_div_tarifa_electrica - (consumo_energia_edificio_div_tarifa_electrica x porcent_hvac x (0.08+0.07+0.06)
        var porcent_hvac_aux = change_porcent_to_num(porcent_hvac);
        var porcent_porcent = porcent_hvac_aux / 100;
        var suma_oprtunidades = valor_ashrae +  valor_merv +  valor_filtros +  valor_mant_prev;
        //consumo_energia_edificio_div_tarifa_electrica x porcent_hvac x (0.08+0.07+0.06)
        var multi_parent = consumo_energia_edificio * porcent_porcent * suma_oprtunidades;
        //consumo_energia_edificio_div_tarifa_electrica - (consumo_energia_edificio_div_tarifa_electrica x porcent_hvac x (0.08+0.07+0.06
        var resta_consumo_edificio = consumo_energia_edificio - multi_parent;
        var consumo_edificio_cantidad = dollarUSLocale.format(parseInt(resta_consumo_edificio));

        $('#consumo_energia_edificio_mantenimiento_financiero').val('$'+consumo_edificio_cantidad);
        $('#energia_justificacion_financiera_futuro').empty();
        $('#energia_justificacion_financiera_futuro').val('$'+consumo_edificio_cantidad);
        ///////////////
        //reduccion energetica
        var reduccion_energetica = consumo_energia_edificio - parseInt(resta_consumo_edificio);
        var reduccion_energetica_cantidad = dollarUSLocale.format(reduccion_energetica);
        $('#reduccion_energetica_mantenimiento_financiero').val('$'+reduccion_energetica_cantidad);
        reduccion_gastos_reparaciones();
   }


   function reduccion_gastos_reparaciones(){

    let dollarUSLocale = Intl.NumberFormat('en-US');

    var check_ashrae = $('#estandar_ashrae_checked');
    var check_merv = $('#filtros_merv_checked');
    var check_filtros = $('#remplazo_filtros_checked');
    var check_mant_prev = $('#mant_preven_checked');

    if(check_ashrae.prop('checked')){
        var valor_ashrae = 0.08
    }else{
        var valor_ashrae = 0;
    }

    if(check_merv.prop('checked')){
        var valor_merv = 0.07;
    }else{
        var valor_merv = 0;
    }

    if(check_filtros.prop('checked')){
        var valor_filtros = 0.06;
    }else{
        var valor_filtros = 0;
    }

    if(check_mant_prev.prop('checked')){
        var valor_mant_prev = 0.09;
    }else{
        var valor_mant_prev = 0;
    }
    var monto_anual_reparaciones_aux = $('#monto_actual_mantenimiento_financiero').val();
    var monto_anual_reparaciones = money_format_to_integer(monto_anual_reparaciones_aux);

    //send costo reparaciones a justificacion
  $('#reparaciones_justificacion_mantenimiento').val('$'+dollarUSLocale.format(monto_anual_reparaciones));

    var suma_oportunidades_ene = valor_ashrae +  valor_merv +  valor_filtros +  valor_mant_prev;
    var monto_anual_mult_suma_ene = monto_anual_reparaciones * suma_oportunidades_ene;
    var reduc_reparaciones =  monto_anual_mult_suma_ene / 1.02;
    var res_num = parseInt(reduc_reparaciones);
    var reduc_reparaciones_cantidad = dollarUSLocale.format(res_num);
    $('#reduccion_reparaciones_mantenimiento_financiero').val('$'+reduc_reparaciones_cantidad);
   }


   function change_number_format_to_int(val){

    const myArray_coma =val.split(',');

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
         return num;
        }
        return val;
   }


   function change_porcent_to_num(porcent){

    const myArray = porcent.split('%');
    if (myArray.length > 1) {
       return  myArray[0]
    }
 }

 function money_format_to_integer(value){
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
        return num;
    }else{
        return value;
    }
 }

 function valida_formulario_mantenimiento(){
    /////////////////////////////////////
    var cliente =$('#cliente_pro_mantenimiento');
    var cliente_count = $('#count_cliente_pro_mantenimiento').val();

    if(cliente.val() == ''){

        cliente.css("border-color", "red")
        cliente_count = 1;
     $('#count_cliente_pro_mantenimiento').val(cliente_count);

    }else if (cliente.val() != '') {

        cliente_count = 0;
     $('#count_cliente_pro_mantenimiento').val(cliente_count);

    }
    ////////////////////////////////////////////
    ////////////////////

    var cat_edi_mant =$('#cat_edi_mantenimiento');
    var cat_edi_mant_count = $('#count_cat_ed_mantenimiento').val();

    if(cat_edi_mant.val() == 0){

        cat_edi_mant.css("border-color", "red")
        cat_edi_mant_count = 1;
     $('#count_cat_ed_mantenimiento').val(cat_edi_mant_count);

    }else if (cat_edi_mant.val() != 0) {

        cat_edi_mant_count = 0;
     $('#count_cat_ed_mantenimiento').val(cat_edi_mant_count);

    }

    ////////////////////


    ////////////////////
    var cat_edi_mant =$('#cat_edi_mantenimiento');
    var cat_edi_mant_count = $('#count_cat_ed_mantenimiento').val();

    if(cat_edi_mant.val() == 0){

        cat_edi_mant.css("border-color", "red")
        cat_edi_mant_count = 1;
     $('#count_cat_ed_mantenimiento').val(cat_edi_mant_count);

    }else if (cat_edi_mant.val() != 0) {

        cat_edi_mant_count = 0;
     $('#count_cat_ed_mantenimiento').val(cat_edi_mant_count);

    }
    ////////////////////

        ////////////////////
        var pais_mant =$('#paises_mantenimiento');
        var pais_mant_mant_count = $('#count_paises_mantenimiento').val();

        if(pais_mant.val() == 0){

            pais_mant.css("border-color", "red")
            pais_mant_mant_count = 1;
         $('#count_paises_mantenimiento').val(pais_mant_mant_count);

        }else if (pais_mant.val() != 0) {

            pais_mant_mant_count = 0;
         $('#count_paises_mantenimiento').val(pais_mant_mant_count);

        }
        ////////////////////

        ////////////////////
        var ciudad_mantenimiento =$('#ciudades_mantenimiento');
        var count_ciudad_mantenimiento_count = $('#count_ciudad_mantenimiento').val();

        if(ciudad_mantenimiento.val() == 0){

            ciudad_mantenimiento.css("border-color", "red")
            count_ciudad_mantenimiento_count = 1;
         $('#count_ciudad_mantenimiento').val(count_ciudad_mantenimiento_count);

        }else if (ciudad_mantenimiento.val() != 0) {

            count_ciudad_mantenimiento_count = 0;
         $('#count_ciudad_mantenimiento').val(count_ciudad_mantenimiento_count);

        }
        ////////////////////

         ////////////////////
         var velocidad_promedio_mantenimiento =$('#velocidad_promedio_mantenimiento');
         var count_velocidad_promedio_mantenimiento = $('#count_velocidad_promedio_mantenimiento').val();

         if(velocidad_promedio_mantenimiento.val() == 0){

            velocidad_promedio_mantenimiento.css("border-color", "red")
             count_velocidad_promedio_mantenimiento = 1;
          $('#count_velocidad_promedio_mantenimiento').val(count_velocidad_promedio_mantenimiento);

         }else if (velocidad_promedio_mantenimiento.val() != 0) {

            count_velocidad_promedio_mantenimiento = 0;
          $('#count_velocidad_promedio_mantenimiento').val(count_velocidad_promedio_mantenimiento);

         }
         ////////////////////

         ////////////////////
         var name_sitio_mantenimiento =$('#name_sitio_mantenimiento');
         var count_name_sitio_mantenimiento = $('#count_name_sitio_mantenimiento').val();

         if(name_sitio_mantenimiento.val() == 0){

            name_sitio_mantenimiento.css("border-color", "red")
            count_name_sitio_mantenimiento = 1;
          $('#count_name_sitio_mantenimiento').val(count_name_sitio_mantenimiento);

         }else if (name_sitio_mantenimiento.val() != 0) {

            count_name_sitio_mantenimiento = 0;
          $('#count_name_sitio_mantenimiento').val(count_name_sitio_mantenimiento);

         }
         ////////////////////

         ////////////////////
         var tipo_edificio_mantenimiento =$('#tipo_edificio_mantenimiento');
         var count_tipo_edificio_mantenimiento = $('#count_tipo_edificio_mantenimiento').val();

         if(tipo_edificio_mantenimiento.val() == 0){

            tipo_edificio_mantenimiento.css("border-color", "red")
            count_tipo_edificio_mantenimiento = 1;
          $('#count_tipo_edificio_mantenimiento').val(count_tipo_edificio_mantenimiento);

         }else if (tipo_edificio_mantenimiento.val() != 0) {

            count_tipo_edificio_mantenimiento = 0;
          $('#count_tipo_edificio_mantenimiento').val(count_tipo_edificio_mantenimiento);

         }
         ////////////////////

         ////////////////////
         var tipo_edificio_mantenimiento =$('#tipo_edificio_mantenimiento');
         var count_tipo_edificio_mantenimiento = $('#count_tipo_edificio_mantenimiento').val();

         if(tipo_edificio_mantenimiento.val() == 0){

            tipo_edificio_mantenimiento.css("border-color", "red")
            count_tipo_edificio_mantenimiento = 1;
          $('#count_tipo_edificio_mantenimiento').val(count_tipo_edificio_mantenimiento);

         }else if (tipo_edificio_mantenimiento.val() != 0) {

            count_tipo_edificio_mantenimiento = 0;
          $('#count_tipo_edificio_mantenimiento').val(count_tipo_edificio_mantenimiento);

         }
         ////////////////////

         ////////////////////
         var distancia_sitio_mantenimiento =$('#distancia_sitio_mantenimiento');
         var count_distancia_sitio_mantenimiento = $('#count_distancia_sitio_mantenimiento').val();

         if(distancia_sitio_mantenimiento.val() == 0){

            distancia_sitio_mantenimiento.css("border-color", "red")
            count_distancia_sitio_mantenimiento = 1;
          $('#count_distancia_sitio_mantenimiento').val(count_distancia_sitio_mantenimiento);

         }else if (distancia_sitio_mantenimiento.val() != 0) {

            count_distancia_sitio_mantenimiento = 0;
          $('#count_distancia_sitio_mantenimiento').val(count_distancia_sitio_mantenimiento);

         }
         ////////////////////
        /////////////////
         var yrs_life_ed_mantenimiento =$('#yrs_life_ed_mantenimiento');
         var count_yrs_life_ed_mantenimiento = $('#count_yrs_life_ed_mantenimiento').val();

         if(yrs_life_ed_mantenimiento.val() == 0){

            yrs_life_ed_mantenimiento.css("border-color", "red")
            count_yrs_life_ed_mantenimiento = 1;
          $('#count_yrs_life_ed_mantenimiento').val(count_yrs_life_ed_mantenimiento);

         }else if (yrs_life_ed_mantenimiento.val() != 0) {

            count_yrs_life_ed_mantenimiento = 0;
          $('#count_yrs_life_ed_mantenimiento').val(count_yrs_life_ed_mantenimiento);

         }
         ////////////////////

         /////////////////
         var tipo_ambiente_mantenimiento =$('#tipo_ambiente_mantenimiento');
         var count_tipo_ambiente_mantenimiento = $('#count_tipo_ambiente_mantenimiento').val();

         if(tipo_ambiente_mantenimiento.val() == ""){

            tipo_ambiente_mantenimiento.css("border-color", "red")
            count_tipo_ambiente_mantenimiento = 1;
          $('#count_tipo_ambiente_mantenimiento').val(count_tipo_ambiente_mantenimiento);

         }else if (tipo_ambiente_mantenimiento.val() != "") {

            count_tipo_ambiente_mantenimiento = 0;
          $('#count_tipo_ambiente_mantenimiento').val(count_tipo_ambiente_mantenimiento);

         }
         ////////////////////

          /////////////////
          var personal_enviado =$('#personal_enviado_mantenimiento');
          var count_personal_enviado = $('#count_personal_enviado_mantenimiento').val();

          if(personal_enviado.val() == 0){

            personal_enviado.css("border-color", "red")
             count_personal_enviado = 1;
           $('#count_personal_enviado_mantenimiento').val(count_personal_enviado);

          }else if (personal_enviado.val() != 0) {

            count_personal_enviado = 0;
           $('#count_personal_enviado_mantenimiento').val(count_personal_enviado);

          }
          ////////////////////

          /////////////////
          var ar_project_mantenimiento =$('#ar_project_mantenimiento');
          var count_ar_project_mantenimiento = $('#count_ar_project_mantenimiento').val();

          if(ar_project_mantenimiento.val() == ''){

            ar_project_mantenimiento.css("border-color", "red")
            count_ar_project_mantenimiento = 1;
           $('#count_ar_project_mantenimiento').val(count_ar_project_mantenimiento);

          }else if (ar_project_mantenimiento.val() != '') {

            count_ar_project_mantenimiento = 0;
           $('#count_ar_project_mantenimiento').val(count_ar_project_mantenimiento);

          }
          ////////////////////

          /////////////////
          var porcent_hvac_mantenimiento =$('#porcent_hvac_mantenimiento');
          var count_porcent_hvac_mantenimiento = $('#count_porcent_hvac_mantenimiento').val();

          if(porcent_hvac_mantenimiento.val() == ''){

            porcent_hvac_mantenimiento.css("border-color", "red")
            count_porcent_hvac_mantenimiento = 1;
           $('#count_porcent_hvac_mantenimiento').val(count_porcent_hvac_mantenimiento);

          }else if (porcent_hvac_mantenimiento.val() != '') {

            count_porcent_hvac_mantenimiento = 0;
           $('#count_porcent_hvac_mantenimiento').val(count_porcent_hvac_mantenimiento);

          }
          ////////////////////

          /////////////////
          var ocupacion_semanal_mantenimiento =$('#ocupacion_semanal_mantenimiento');
          var count_ocupacion_semanal_mantenimiento = $('#count_ocupacion_semanal_mantenimiento').val();

          if(ocupacion_semanal_mantenimiento.val() == ''){

            ocupacion_semanal_mantenimiento.css("border-color", "red")
            count_ocupacion_semanal_mantenimiento = 1;
           $('#count_ocupacion_semanal_mantenimiento').val(count_ocupacion_semanal_mantenimiento);

          }else if (ocupacion_semanal_mantenimiento.val() != '') {

            count_ocupacion_semanal_mantenimiento = 0;
           $('#count_ocupacion_semanal_mantenimiento').val(count_ocupacion_semanal_mantenimiento);

          }
          ////////////////////






        var count_inps = cliente_count + cat_edi_mant_count + pais_mant_mant_count  +  count_ciudad_mantenimiento_count + count_velocidad_promedio_mantenimiento + count_name_sitio_mantenimiento + count_tipo_edificio_mantenimiento + count_distancia_sitio_mantenimiento + count_yrs_life_ed_mantenimiento + count_tipo_ambiente_mantenimiento + count_personal_enviado + count_ar_project_mantenimiento;

      if(count_inps>0){

                   return false;
       }else if(count_inps==0){
        $('#div_next_h_mantenimiento').addClass("hidden");
        $('#div_next_mantenimiento').removeClass("hidden");
       }

 }

 function justificacion_financiera_send(){
    let dollarUSLocale = Intl.NumberFormat('en-US');
    var reduccion_reparaciones_mantenimiento_financiero_aux = $('#reduccion_reparaciones_mantenimiento_financiero').val();
    var reduccion_reparaciones_mantenimiento_financiero = money_format_to_integer(reduccion_reparaciones_mantenimiento_financiero_aux);

    var reparacioness_mantenimiento_adicionales_aux = $('#reparaciones_justificacion_mantenimiento').val();
    var reparacioness_mantenimiento_adicionales =  money_format_to_integer(reparacioness_mantenimiento_adicionales_aux)

    var total_reparaciones = parseInt(reparacioness_mantenimiento_adicionales) - parseInt(reduccion_reparaciones_mantenimiento_financiero);

    $('#reparaciones_justificacion_financiera_futuro').val('$'+dollarUSLocale.format(total_reparaciones));

    //////////////suma costos actuales
    var mantenimiento_justificacion_mantenimiento_aux = $('#mantenimiento_justificacion_mantenimiento').val();
    var mantenimiento_justificacion_mantenimiento = money_format_to_integer(mantenimiento_justificacion_mantenimiento_aux);

    var energia_justificacion_mantenimiento_aux = $('#energia_justificacion_mantenimiento').val();
    var energia_justificacion_mantenimiento = money_format_to_integer(energia_justificacion_mantenimiento_aux);

    var reparacioness_mantenimiento_adicionales_aux = $('#reparaciones_justificacion_mantenimiento').val();
    var reparacioness_mantenimiento_adicionales_a =  money_format_to_integer(reparacioness_mantenimiento_adicionales_aux);

    var total_justificacion_mantenimiento = parseInt(mantenimiento_justificacion_mantenimiento) + parseInt(energia_justificacion_mantenimiento) + parseInt(reparacioness_mantenimiento_adicionales_a);

    ///resultado suma actual
    $('#total_justificacion_mantenimiento').val('$'+dollarUSLocale.format(total_justificacion_mantenimiento));


    /////////////suma costos futuros

    var mantenimiento_justificacion_financiera_futuro_aux = $('#mantenimiento_justificacion_financiera_futuro').val();
    var mantenimiento_justificacion_financiera_futuro = money_format_to_integer(mantenimiento_justificacion_financiera_futuro_aux);


    var energia_justificacion_financiera_futuro_aux = $('#energia_justificacion_financiera_futuro').val();
    var energia_justificacion_financiera_futuro = money_format_to_integer(energia_justificacion_financiera_futuro_aux);

    var reparaciones_justificacion_financiera_futuro_aux = $('#reparaciones_justificacion_financiera_futuro').val();
    var reparaciones_justificacion_financiera_futuro = money_format_to_integer(reparaciones_justificacion_financiera_futuro_aux);

    var total_justificacion_mantenimiento_futuras = parseInt(mantenimiento_justificacion_financiera_futuro) + parseInt(energia_justificacion_financiera_futuro) + parseInt(reparaciones_justificacion_financiera_futuro);
    var porcent_inflacion =  $('#inflacion_mantenimiento').val();
    const porcent_array = porcent_inflacion.split('%');



    $('#total_mantenimiento_justificacion_futuro').val('$'+dollarUSLocale.format(total_justificacion_mantenimiento_futuras));
    justidicacion_financiera_chart(total_justificacion_mantenimiento,total_justificacion_mantenimiento_futuras,porcent_array[0]);
 }

 function justificacion_financiera_send_mant(value){

    $('#mantenimiento_justificacion_mantenimiento').val(value);
 }

 function justificacion_financiera_send_mant_edit(value){

    $('#mantenimiento_justificacion_mantenimiento').val(value);
    $('#energia_justificacion_mantenimiento').val($('#consumo_energia_edificio_mantenimiento').val());
    $('#reparaciones_justificacion_mantenimiento').val($('#monto_actual_mantenimiento_financiero').val());
    $('#energia_justificacion_financiera_futuro').empty();

    $('#energia_justificacion_financiera_futuro').val($('#consumo_energia_edificio_mantenimiento_financiero').val());
 }


 function suma_mantenimiento(){

    let dollarUSLocale = Intl.NumberFormat('en-US');

   var mantenimiento_justificacion_mantenimiento_aux = $('#mantenimiento_justificacion_mantenimiento').val();
   var mantenimiento_justificacion_mantenimiento = money_format_to_integer(mantenimiento_justificacion_mantenimiento_aux)

   var energia_justificacion_mantenimiento = $('#energia_justificacion_mantenimiento').val();
   var reparacioness_mantenimiento_adicionales_aux = $('#reparaciones_justificacion_mantenimiento').val();
   var reparacioness_mantenimiento_adicionales =  money_format_to_integer(reparacioness_mantenimiento_adicionales_aux)

   var total_justificacion_mantenimiento = parseInt(mantenimiento_justificacion_mantenimiento) + parseInt(energia_justificacion_mantenimiento) + parseInt(reparacioness_mantenimiento_adicionales);
   $('#total_justificacion_mantenimiento').val('$'+dollarUSLocale.format(total_justificacion_mantenimiento));
   $('#mantenimiento_justificacion_financiera_futuro').val('$'+dollarUSLocale.format(total_justificacion_mantenimiento));


   var reduccion_reparaciones_mantenimiento_financiero_aux = $('#reduccion_reparaciones_mantenimiento_financiero').val();
   var reduccion_reparaciones_mantenimiento_financiero = money_format_to_integer(reduccion_reparaciones_mantenimiento_financiero_aux);


   var  reparaciones_futuras = parseInt(reparacioness_mantenimiento_adicionales) - parseInt(reduccion_reparaciones_mantenimiento_financiero);

   $('#reparaciones_justificacion_financiera_futuro').val(reparaciones_futuras);

   var mantenimiento_futuro_aux = $('#mantenimiento_justificacion_financiera_futuro').val();
   var mantenimiento_futuro = money_format_to_integer(mantenimiento_futuro_aux);

   var energia_justificacion_financiera_futuro_aux = $('#energia_justificacion_financiera_futuro').val();
   var energia_justificacion_financiera_futuro = money_format_to_integer(energia_justificacion_financiera_futuro_aux);

   var total_mantenimiento_justificacion_futuro = parseInt(reparaciones_futuras) + parseInt(mantenimiento_futuro) +  parseInt(energia_justificacion_financiera_futuro);

   $('#total_mantenimiento_justificacion_futuro').val('$'+dollarUSLocale.format(total_mantenimiento_justificacion_futuro));

 }

 function listar_mantenimiento_equipos(id_p){
    $('#tbody_equipos').empty();

    var ids = [
        'contador_table',
        'sistema_mantenimiento',
        'unidad_mantenimiento',
        'marca_mantenimiento',
        'modelo_mantenimiento',
        'capacidad_termica_mantenimiento',
        'cantidad_unidades_mantenimiento',
        'yrs_vida_mantenimiento',
        'tipo_acceso_mantenimiento',
        'estado_unidad_mantenimiento',
        'horas_diarias_mantenimiento',
        'cambio_filtros_mantenimiento',
        'costo_filtro_mantenimiento',
        'cantidad_filtros_mantenimiento',
        'unidad_aux_mantenimiento',
        'costo_adicionales_aux_mantenimiento',
        'tipo_ambiente_mantenimiento',
        'ocupacion_semanal_mantenimiento',
        'total_horas',
        'hora_dia',
        'dias_ajustados',
        'idas_ajustados',
        'id',
];

    var token = $("#token").val();
        $.ajax({
            url: '/traer_mantenimiento_equipos/'+id_p, // Reemplaza con la URL de tu endpoint
            type: 'post',

            headers: { 'X-CSRF-TOKEN': token },
            success: async function(response) {

                //var res_formula = await formula_calculo_mantenimiento();

                for (var i = 0; i < response.length; i++) {

                    const arregloInterno = response[i];
                    var newRow = '<tr id='+i+'>';
                    for (let j = 0; j < arregloInterno.length; j++) {


                        var value = arregloInterno[j];
                        const id_aux = arregloInterno[22].split('_');
                        var id = id_aux[0];

                        if (String(value).endsWith('_hidden')) {
                            newRow += '<td id="'+'td_'+ids[j]+'_'+i+'" name="'+'td_'+ids[j]+'_'+i+'"><input id="'+ids[j]+'_'+i+'" name="'+ids[j]+'_'+i+'" style="border: 2px solid; border-color:#1B17BB!important; width:100%;" hidden type="text" class="text-center text-sm font-bold h-8" value="' + value + '"></td>';
                        }else{
                            newRow += '<td id="'+'td_'+ids[j]+'_'+i+'" name="'+'td_'+ids[j]+'_'+i+'"><input id="'+ids[j]+'_'+i+'" name="'+ids[j]+'_'+i+'" style="border: 2px solid; border-color:#1B17BB!important; width:100%;" readonly type="text" class="text-center text-sm font-bold h-8" value="' + value + '"></td>';
                        }


                    }
                    /* newRow += '<input type="hidden"  value="' + res_formula + '" id="precio_'+i+'" name="precio_'+i+'">'; */
                    newRow += '<td style="width:30px;" class=""><button type="button" onclick="del_td_tr_edit('+id+')" class="px-1 border-2 border-red-500 rounded-md text-xl text-orange-400 hover:text-white hover:bg-orange-400"><i class="fas fa-trash"></i></i></button></td>';
                    newRow += '<td style="width:30px;" class=""><button type="button" onclick="edit_regstro_edit('+id+','+i+')" class="px-1 border-2 border-blue-500 rounded-md text-lg text-blue-400 hover:text-white hover:bg-blue-200"><i class="fas fa-edit"></i></i></button></td>';
                    newRow += '</tr>';
                    $('#tbody_equipos').append(newRow);
                }
                $('#indice_tabla_edit').val('');

            },
            error: function(xhr, status, error) {
                console.error('Error al enviar los datos:', error);
            }
        });
 }

 function del_td_tr_edit(id){
    var token = $("#token").val();
    $.ajax({
        type: 'POST',
        url: '/delete_mantenimiento_equipo/'+id,
        headers: { 'X-CSRF-TOKEN': token },
        success: function (response) {

                listar_mantenimiento_equipos(response);

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
 }

 async function edit_regstro_edit(id,tr_id){


        // Enviar valuesArray por medio de AJAX
        var token = $("#token").val();
        $.ajax({
            url: '/edit_regstro_edit/'+id, // Reemplaza con la URL de tu endpoint
            type: 'POST',

            headers: { 'X-CSRF-TOKEN': token },

            success: async function(response) {



                $('#indice_tabla_edit').val(response[0]);
                $("#sistema_mantenimiento").find('option[value="' + response[1] + '"]').prop("selected", "selected");
                await unidadHvac(response[1],'','unidad_mantenimiento',2);
                $("#unidad_mantenimiento").find('option[value="' + response[2] + '"]').prop("selected", "selected");
                send_marcas_to('marca_mantenimiento', response[3], response[1]);
                send_modelo_edit(response[3], 'modelo_mantenimiento', response[4]);


               /*  send_marcas_to(marca, res.val_unidad.id_marca, res.val_unidad.unidad_hvac);
                send_modelo_edit(res.val_unidad.id_marca, modelo, res.val_unidad.id_modelo); */


                $('#capacidad_termica_mantenimiento').val(response[5]);
                $('#cantidad_unidades_mantenimiento').val(response[6]);
                $('#yrs_vida_mantenimiento').val(response[7]);
                $("#tipo_acceso_mantenimiento").find('option[value="' + response[8] + '"]').prop("selected", "selected");
                $("#estado_unidad_mantenimiento").find('option[value="' + response[9] + '"]').prop("selected", "selected");
                $("#cambio_filtros_mantenimiento").find('option[value="' + response[11] + '"]').prop("selected", "selected");
                $('#costo_filtro_mantenimiento').val('$'+response[12]);
                $('#cantidad_filtros_mantenimiento').val(response[13]);
                $('#'+tr_id).find('input').css('border-color', '#ed8936');
                $('#tr_val').val(tr_id);
            },
            error: function(xhr, status, error) {
                console.error('Error al enviar los datos:', error);
            }
        });
 }

 function disabled_input(id){
    $('#'+id).attr('readonly', false);
 }

 function edit_unidad(id,registro,tipo,value,id){
    var token = $("#token").val();
    $.ajax({
        type: 'get',
        url: '/edit_unidades_horas/'+id,
        headers: { 'X-CSRF-TOKEN': token },
        data: {
            registro: registro,
            tipo: tipo,
            value: value,
        },
        success: function (response) {
            $('#'+id).attr('readonly', true);
        },
        error: function(xhr, status, error) {
            console.error('Error al enviar los datos:', error);
        }
    });

 }

  function save_project_mantenimiento(){
    var token = $("#token").val();
     var formData = {};
    $("input[name$='_mantenimiento'], select[name$='_mantenimiento'],input[name*='_mantenimiento_'], input[name*='precio_'], input[name*='total_horas_'], input[name*='hora_dia_'], input[name*='dias_'], input[name*='idas_ajustados_']").each(function() {
        formData[$(this).attr('name')] = $(this).val();
    });
    console.log(formData);
    return false;
    $.ajax({
        type: 'post',
        url: '/save_project_mantenimiento',
        headers: { 'X-CSRF-TOKEN': token },
        data: {
            values: formData
        },
        success: function (response) {
            $('#'+id).attr('readonly', true);
        },
        error: function(xhr, status, error) {
            console.error('Error al enviar los datos:', error);
        }
    });

 }

 function show_buttons_type_project(type){
    if(type == 1 || type == 2){
        $('#buttons_energy').removeClass('hidden');
        $('#buttons_mantainance').addClass('hidden');
    }

    if(type == 3){
        $('#buttons_energy').addClass('hidden');
        $('#buttons_mantainance').removeClass('hidden');
    }
 }

 function save_form_mantenimiento(id_project){
    var token = $("#token").val();
    var formData = {};
    $("input[name$='cliente_pro_mantenimiento'],input[name$='name_sitio_mantenimiento'],select[name$='velocidad_promedio_mantenimiento'],input[name$='distancia_sitio_mantenimiento'],input[name$='yrs_vida_mantenimiento'],select[name$='ocupacion_semanal_mantenimiento'],select[name$='tipo_ambiente_mantenimiento'],select[name$='personal_enviado_mantenimiento'],input[name$='inflacion_mantenimiento'],input[name$='ar_project_mantenimiento'],input[name$='porcent_hvac_mantenimiento'],select[name$='cat_edi_mantenimiento'],select[name$='paises_mantenimiento'],select[name$='tipo_edificio_mantenimiento'],select[name$='ciudades_mantenimiento']").each(function() {
        formData[$(this).attr('name')] = $(this).val();
    });


    $.ajax({
        type: 'post',
        url: '/update_form_project_mantenimiento/'+id_project,
        headers: { 'X-CSRF-TOKEN': token },
        data: {
            values: formData
        },
        success: function (response) {
            //$('#'+id).attr('readonly', true);
        },
        error: function(xhr, status, error) {
            console.error('Error al enviar los datos:', error);
        }
    });

 }

  function save_adicionales(id_project){
    var token = $("#token").val();
    var formData = {};
    $("input[name$='_adicionales'],input[name$='costo_estimado_sistema_hvac']").each(function() {
        formData[$(this).attr('name')] = $(this).val();
    });

    $.ajax({
        type: 'post',
        url: '/save_adicionales/'+id_project,
        headers: { 'X-CSRF-TOKEN': token },
        data: {
            values: formData
        },
        success: function (response) {
            //$('#'+id).attr('readonly', true);
        },
        error: function(xhr, status, error) {
            console.error('Error al enviar los datos:', error);
        }
    });

 }

 function save_justificacion_financiera(id_project){
    var token = $("#token").val();
    var formData = {};
    $("input[name$='consumo_energia_edificio_mantenimiento'],input[name$='eui_mantenimiento'],input[name$='consumo_energia_edificio_mantenimiento_financiero'],input[name$='reduccion_energetica_mantenimiento_financiero'],input[name$='monto_actual_mantenimiento_financiero'],input[name$='reduccion_reparaciones_mantenimiento_financiero'],input[name$='costo_mantenimiento_mantenimiento_financiero']").each(function() {
        formData[$(this).attr('name')] = $(this).val();
    });

    $("input[name$='estandar_ashrae_checked'],input[name$='filtros_merv_checked'],input[name$='remplazo_filtros_checked'],input[name$='mant_preven_checked']").each(function() {
        formData[$(this).attr('name')] = $(this).prop('checked') ? "on" : "off";
    });


    $.ajax({
        type: 'post',
        url: '/save_justificacion_financiera/'+id_project,
        headers: { 'X-CSRF-TOKEN': token },
        data: {
            values: formData
        },
        success: function (response) {
            //$('#'+id).attr('readonly', true);
        },
        error: function(xhr, status, error) {
            console.error('Error al enviar los datos:', error);
        }
    });

 }

 function send_ambiente(value,type){
    switch (type) {
        case 'new':
            $("#tipo_ambiente_1_2").find('option[value="' + value + '"]').prop("selected", "selected");
            $('#tipo_ambiente_1_2').trigger('change');
            $("#tipo_ambiente_2_1").find('option[value="' + value + '"]').prop("selected", "selected");
            $('#tipo_ambiente_2_1').trigger('change');
            $("#tipo_ambiente_2_2").find('option[value="' + value + '"]').prop("selected", "selected");
            $('#tipo_ambiente_2_2').trigger('change');
            $("#tipo_ambiente_3_1").find('option[value="' + value + '"]').prop("selected", "selected");
            $('#tipo_ambiente_3_1').trigger('change');
            $("#tipo_ambiente_3_2").find('option[value="' + value + '"]').prop("selected", "selected");
            $('#tipo_ambiente_3_2').trigger('change');
        break;

         case 'retro':
            $("#tipo_ambiente_2_1_retro").find('option[value="' + value + '"]').prop("selected", "selected");
            $('#tipo_ambiente_2_1_retro').trigger('change');
            $("#tipo_ambiente_3_1_retro").find('option[value="' + value + '"]').prop("selected", "selected");
            $('#tipo_ambiente_3_1_retro').trigger('change');
         break;

    }
 }
