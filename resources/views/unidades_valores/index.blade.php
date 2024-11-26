@extends('layouts.admin')

@section('content')
  <style>
   .botonF1{
  width:100px;
  height:40px;
  background: #102E52;
  right:0;
  bottom:0;
  top: 10px;
  position:absolute;
  margin-right:30px;
  margin-bottom:16px;
  border:none;
  outline:none;
  color:#FFF;
  border-radius:10px;
  font-size:14px;
  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
  transition:.3s;
  cursor:pointer;
}
span{
    font-size: 14px;
  transition:.5s;
}
.botonF1:hover span{
  transform:rotate(360deg);
}
.botonF1:active{
  transform:scale(1.1);
}

.animacionVer{
  transform:scale(1);
}

.box-table:hover{
    text-decoration: underline;
    cursor: pointer;
    }

.box-table:hover{
    text-decoration: underline;
        cursor: pointer;
    }

.txt-size-s{
    font-size:10px;
    cursor: pointer;
}

.txt-size-p{
    font-size:9px;
    cursor: pointer;
}

.txt-size-val{
    font-size:9px;
    color: #3b82f6;
    cursor: pointer;
}

.txt-size-val:hover {
  color: red;
}

.text-refes{
    font-size:12px;
    cursor: pointer;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid gray;
  text-align: left;
  padding: 8px;
}

/* tr:nth-child(even) {
  background-color: #dddddd;
} */


.no-border{
    border: none;
}
  </style>
{{--   @inject('unidades','app\Http\Controllers\UnidadesValoresController') --}}
  <?php
  $idm = App::getLocale();
  ?>
  <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
  @include('unidades_valores.modal_cambio_valor')
  <div class="my-3 mx-3 font-semibold text-gray-700 flex-1">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
              <svg class="mr-2 w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
              <p class="font-roboto text-[#102E52] text-[25px]">Unidades y Valores</p>

            </a>
          </li>


        </ol>
        <div class="contenedor">
                    <a href="/lo_gout">
                        <button class="botonF1">
                            Cerrar Sesión
                            </button>
                    </a>

         </div>
      </nav>
</div>
<hr>
<?php
$arry_vals_name = ['','Unidad Hvac','Diseño','DR','Ventilación','Filtración','Control'];
$arry_sistemas = ['','Unidad Paquete (RTU)','Split DX','VRF No Ductados','VRF Ductados','PTAC / VTAC','WSHP'];
?>

  <div class="w-full h-full my-5 mx-1">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <table>

        @for ($i=1;$i < count($arry_sistemas);$i++)
        <tr class="tr_gray">
            <td class="sis_tds"><p class="txt-size-s font-bold">{{$arry_sistemas[$i]}}</p>
            </td>
            <td  class="no-border">
                <table class="h-full">
                    @foreach ($unidades as $unidad)
                    @if ($unidad->equipo == $i)
                            <tr>
                                <td class="gap-y-2">
                                    <p onclick="mostrar_modal_set_info('modal_cambio_valor','{{$unidad->id}}','unidades')" class="text-refes  text-blue-800">Unidades</p>
                                    <div class="flex gap-x-1">
                                        <p class="txt-size-p font-bold">Unidad: {{$unidad->unidad}},</p>
                                        <p class="txt-size-val font-bold">Valor: {{$unidad->valor}}</p>
                                    </div>
                                </td>

                                <td>
                                    <table cellspacing="0" cellpadding="0" class="no-border">
                                        <tr>
                                            <td class="no-border gap-y-2">
                                                <p onclick="mostrar_modal_set_info('modal_cambio_valor','{{$unidad->id}}','diseños')"  class="text-refes  text-blue-800">Diseños: {{$unidad->unidad}}</p>
                                                    @if ($unidad->equipo == $i)
                                                        @foreach ($disenos as $diseno)
                                                        @if ($diseno->id_unidad == $unidad->id)
                                                            <div class="flex gap-x-1 box-table my-1">
                                                                <p class="txt-size-p font-bold">Diseño: {{$diseno->diseno}},</p>
                                                                <p {{-- onclick="mostrar_modal_set_info('modal_cambio_valor','{{$diseno->diseno}}','{{$diseno->referencia}}',{{$diseno->valor}},{{$diseno->id}},'diseños')"  --}}class="txt-size-val font-bold">Valor: {{$diseno->valor}}</p>
                                                            </div>

                                                        @endif
                                                        @endforeach
                                                    @endif
                                            </td>
                                        </tr>
                                    </table>
                                </td>

                                <td>
                                    <table cellspacing="0" cellpadding="0" class="no-border">
                                        <tr>
                                            <td class="no-border">
                                                <p onclick="mostrar_modal_set_info('modal_cambio_valor','{{$unidad->id}}','drs')" class="text-refes  text-blue-800">D/Rs: {{$unidad->unidad}}</p>
                                                    @if ($unidad->equipo == $i)
                                                            @foreach ($drs as $dr)
                                                            @if ($dr->id_unidad == $unidad->id)
                                                                <div class="flex gap-x-1 box-table">
                                                                    <p class="txt-size-p font-bold">Dr: {{$dr->dr}},</p>
                                                                    <p class="txt-size-val font-bold">Valor: {{$dr->valor}}</p>
                                                                </div>
                                                            @endif
                                                            @endforeach
                                                    @endif
                                            </td>
                                        </tr>
                                    </table>
                                </td>

                                <td>
                                    <table cellspacing="0" cellpadding="0" class="no-border">
                                        <tr>
                                            <td  class="no-border">
                                                <p onclick="mostrar_modal_set_info('modal_cambio_valor','{{$unidad->id}}','ventilaciones')" class="text-refes text-blue-800">Ventilaciones: {{$unidad->unidad}}</p>
                                                    @if ($unidad->equipo == $i)
                                                            @foreach ($ventilaciones as $ventilacion)
                                                            @if ($ventilacion->id_unidad == $unidad->id)
                                                                <div class="flex gap-x-1 box-table">
                                                                    <p class="txt-size-p font-bold">Ventilación: {{$ventilacion->ventilacion}},</p>
                                                                    <p   class="txt-size-val font-bold">Valor: {{$ventilacion->valor}}</p>
                                                                </div>
                                                            @endif
                                                            @endforeach
                                                    @endif
                                            </td>
                                        </tr>
                                    </table>
                                </td>

                                <td>
                                    <table cellspacing="0" cellpadding="0" class="no-border">
                                        <tr>
                                            <td class="no-border">
                                                <p  onclick="mostrar_modal_set_info('modal_cambio_valor','{{$unidad->id}}','filtraciones')"  class="text-refes text-blue-800">Filtraciones: {{$unidad->unidad}}</p>
                                                    @if ($unidad->equipo == $i)
                                                            @foreach ($filtraciones as $filtracion)
                                                            @if ($filtracion->id_unidad == $unidad->id)
                                                                <div class="flex gap-x-1 box-table">
                                                                    <p class="txt-size-p font-bold">Filtracion: {{$filtracion->filtracion}},</p>
                                                                    <p class="txt-size-val font-bold">Valor: {{$filtracion->valor}}</p>
                                                                </div>
                                                            @endif
                                                            @endforeach
                                                    @endif
                                            </td>
                                        </tr>
                                    </table>
                                </td>

                                <td>
                                    <table cellspacing="0" cellpadding="0" class="no-border">
                                        <tr>
                                            <td class="no-border">
                                                <p onclick="mostrar_modal_set_info('modal_cambio_valor','{{$unidad->id}}','controles')" class="text-refes text-blue-800">Controles: {{$unidad->unidad}}</p>
                                                    @if ($unidad->equipo == $i)
                                                        @foreach ($controles as $control)
                                                        @if ($control->id_unidad == $unidad->id)
                                                            <div class="flex gap-x-1 box-table">
                                                                <p class="txt-size-p font-bold">Control: {{$control->control}},</p>
                                                                <p class="txt-size-val font-bold">Valor: {{$control->valor}}</p>
                                                            </div>
                                                        @endif
                                                        @endforeach
                                                    @endif
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                    @endif
                    @endforeach
                </table>
            </td>
          </tr>
        @endfor
      </table>
  </div>

<script>
function mostrar_modal_set_info(id,id_reg,tipo){
    $("#"+id).removeClass("hidden");
   var valores = $('#valores');
   var tipos = $('#tipos');

            $.ajax({
                url: '/set_array_modal_valores/'+ id_reg +'/'+ tipo,
                headers: { 'X-CSRF-TOKEN': token },
                type: 'get',
                dataType: 'json',
                success: function (res) {
                    valores.empty();
                    res.map((reg, i) => {

                    switch (tipo) {
                    case 'unidades':
                        var tipo_val = reg.unidad;
                        $('#id_unidad_val').val(reg.id);
                        $('#tipo_val').val(tipo);
                        $("#title_vals").html('Valor de '+tipo_val+':');
                    break;

                    case 'diseños':
                        var tipo_val = reg.diseno;
                        $('#id_unidad_val').val(reg.id_unidad);
                        $('#tipo_val').val(tipo);
                        $("#title_vals").html('Diseños de '+reg.unidad+':');
                    break;

                    case 'drs':
                        var tipo_val = reg.dr;
                        $('#id_unidad_val').val(reg.id_unidad);
                        $('#tipo_val').val(tipo);
                        $("#title_vals").html('D/Rs de '+reg.unidad+':');
                    break;

                    case 'ventilaciones':
                         var tipo_val = reg.ventilacion;
                         $('#id_unidad_val').val(reg.id_unidad);
                         $('#tipo_val').val(tipo);
                         $("#title_vals").html('Ventilaciones de '+reg.unidad+':');
                    break;

                    case 'filtraciones':
                        var tipo_val = reg.filtracion;
                        $('#id_unidad_val').val(reg.id_unidad);
                        $('#tipo_val').val(tipo);
                        $("#title_vals").html('Filtraciones de '+reg.unidad+':');
                    break;

                    case 'controles':
                        var tipo_val = reg.control;
                        $('#id_unidad_val').val(reg.id_unidad);
                        $('#tipo_val').val(tipo);
                        $("#title_vals").html('Controles de '+reg.unidad+':');
                    break;
                    default:
                        break;
                    }
                        valores.append('<div class="flex w-full gap-x-1">'+'<Label id="tipo_'+reg.id+'" name="tipo_'+reg.id+'"class="w-1/4 text-xl mt-1"></Label>'+'<Label id="unidad_'+reg.id+'" name="unidad_'+reg.id+'" class="w-auto text-xl mt-1 text-blue-500">'+tipo_val+'</Label>'+'</div>'+'<div class="flex w-full gap-x-1">'+'<Label id="txt_val_'+reg.id+'" name="txt_val_'+reg.id+'" class="w-1/4 text-xl mt-1">Valor: </Label>'+'<input  id="valor_'+reg.id+'" name="valor_'+reg.id+'" class="w-1/4 text-black border-2 border-blue-600 rounded-md py-1 text-center" value="'+reg.valor+'" type="text">'+'</div>'+'<hr>');


                        /* valores.html('<Label id="tipo_'+reg.id+'" name="tipo_'+reg.id+'"class="w-1/4 text-xl mt-1">'+identi+'</Label>'+'<Label id="unidad" name="unidad" class="w-auto text-xl mt-1 text-blue-500">'+reg.unidad+'</Label>'+'</div>'); */

                    switch (tipo) {
                    case 'unidades':
                        $("#tipo_"+reg.id+"").html('Unidad:');
                    break;

                    case 'diseños':
                        $("#tipo_"+reg.id+"").html('Diseño:');
                    break;

                    case 'drs':
                        $("#tipo_"+reg.id+"").html('D/R:');
                    break;

                    case 'ventilaciones':
                        $("#tipo_"+reg.id+"").html('Ventilación:');
                    break;

                    case 'filtraciones':
                        $("#tipo_"+reg.id+"").html('Filtración:');
                    break;

                    case 'controles':
                        $("#tipo_"+reg.id+"").html('Control:');
                    break;
                    default:
                        break;
                    }

                    });


                }
            });



}

function save_valor(){

/*     var unidad =  $("#unidad").val();
    var identi = $("#identificador").val();
    var txt_val =  $("#valor").val();
    */
    var id_reg = $("#id_unidad_val").val();
    var tipo =  $("#tipo_val").val();

    var token = $("#token").val();

    Swal.fire({
        icon: 'question',
        title: 'Cambiar Valor ?',
        showDenyButton: true,
        confirmButtonText: 'Si',
      }).then((result) => {
        if (result.isConfirmed) {
            var dataString = $('#formulario').serialize(); // carga todos
            $.ajax({
                url: '/change_valor_reg/'+ tipo +'/'+ id_reg,
                headers: { 'X-CSRF-TOKEN': token },
                type: "POST",
                method: 'post',
                data: dataString,
                success: function () {
                    Swal.fire(
                        'Guardado!',
                        '',
                        'success'
                    )
                    setTimeout(() => {
                        location.reload()
                    }, 1000);

                }
            });
        }
      })

}

function ocultar_modal(id){
    $("#"+id).addClass("hidden");
}
</script>
@endsection
