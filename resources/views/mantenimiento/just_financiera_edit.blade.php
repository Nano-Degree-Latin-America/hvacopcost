
<style>
    .js_charts_style{
                width: 350px;
                height: 150px;
                margin: 0px auto;
            }
</style>
<div class="w-full grid  h-full font-roboto">
@inject('costos_operativos','app\Http\Controllers\ResultadosController')
<?php  $costos_operativos=$costos_operativos->costos_operativos($project_edit->id); ?>
    <div class="w-full flex justify-center mt-8">
        <h1 style=" text-shadow: 2px 2px 4px #a9a9b9 ;" class="title_index font-bold font-roboto">Análisis de Costos Operativos</h1>
    </div>

    <div class="w-full grid gap-x-3 gap-y-3  h-full mx-10">

        <div class="w-full flex  place-items-end">

            <div class="w-1/3">
                <div class="w-full  flex justify-start">
                    <h1  class="text_blue text-4xl font-bold">
                        Energía Actual
                    </h1>
                </div>
                <div class="w-full flex gap-x-3">
                    <label class="text_blue text-xl font-bold">Consumo Anual del Edificio</label>
                    <input value="${{number_format($costos_operativos->consumo_anual_edificio) }}" onkeypress="return soloNumeros(event)" onchange="format_num(this.value,this.id);eui_justificacion_financiera(this.value);" type="text" id="consumo_energia_edificio_mantenimiento" name="consumo_energia_edificio_mantenimiento" type="text" class="w-1/4 text_blue border-2 border-color-inps text-lg rounded-md py-1 h-10 text-center">
                </div>
            </div>



            <div class="w-1/3">
                <div class="flex justify-start w-full gap-x-3">
                    <label class="text_blue text-xl font-bold">EUI (Kbtu/ft2)</label>
                    <input value="{{ number_format($costos_operativos->eui,1) }}" type="text" readonly id="eui_mantenimiento" name="eui_mantenimiento"  type="text" class="w-1/4 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>

            </div>

            <div class="w-1/3">
                <div id="chartDiv" name="chartDiv" class="js_charts_style">

                </div>
            </div>
        </div>

        <div class="w-full  flex justify-start mt-5">
            <h1  class="text_blue text-4xl font-bold">
                Oportunidades
            </h1>
        </div>
        <div class="w-full flex">

            <div class="w-1/6 flex gap-x-3">
                @if ($costos_operativos->estandar_ashrae == 'on')
                <input checked id="estandar_ashrae_checked" name="estandar_ashrae_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.08)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                @else
                <input checked id="estandar_ashrae_checked" name="estandar_ashrae_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.08)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                @endif
                <label class="text_blue text-xl font-bold">Estandar ASHRAE 180</label>
            </div>

            <div class="w-1/6 flex gap-x-3">
                @if ($costos_operativos->filtros_merv_7 == 'on')
                <input checked id="filtros_merv_checked" name="filtros_merv_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.07)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                @else
                <input id="filtros_merv_checked" name="filtros_merv_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.07)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                @endif
                <label class="text_blue text-xl font-bold">Filtros MERV > 7</label>
            </div>

            <div class="w-1/6 flex gap-x-3">


                @if ($costos_operativos->remplazo_filtros == 'on')
                <input checked id="remplazo_filtros_checked" name="remplazo_filtros_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.06)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                @else
                <input id="remplazo_filtros_checked" name="remplazo_filtros_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.06)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                @endif
                <label class="text_blue text-xl font-bold">Reemplazo Filtros</label>
            </div>

            <div class="w-1/6 flex gap-x-3">

                @if ($costos_operativos->mantenimiento_proactivo == 'on')
                <input checked id="mant_preven_checked" name="mant_preven_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.09)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                @else
                <input id="mant_preven_checked" name="mant_preven_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.09)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                @endif
                <label class="text_blue text-xl font-bold">Mantenimiento Proactivo</label>
            </div>
            <div class="w-1/4 flex gap-x-3">
            </div>
        </div>

        <div class="w-full  flex justify-start mt-5">
            <h1  class="text_blue text-4xl font-bold">
                Energía Futura Estimada
            </h1>
        </div>
        <div class="w-full flex ">

            <div class="w-1/3 flex gap-x-3">
                <label class="text_blue text-xl font-bold">Consumo Anual Edificio</label>
                <input value="{{ number_format($costos_operativos->consumo_anual_edificio_futura) }}" readonly id="consumo_energia_edificio_mantenimiento_financiero" name="consumo_energia_edificio_mantenimiento_financiero" type="text" type="text" class="w-1/4 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
            </div>

            <div class="w-1/3 flex gap-x-3 justify-center">
                <div class="flex justify-start w-full gap-x-3">
                    <label class="text_blue text-xl font-bold">Reducción Energética</label>
                    <input value="{{ number_format($costos_operativos->reduccion_energetica) }}" readonly type="text" type="text" id="reduccion_energetica_mantenimiento_financiero" name="reduccion_energetica_mantenimiento_financiero" class="w-1/4 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
            </div>
            <div class="w-1/3">

            </div>
        </div>

        <div class="w-full  flex justify-start mt-5">
            <h1  class="text_blue text-4xl font-bold">
                Costo Actual Reparaciones
            </h1>
        </div>
        <div class="w-full flex gap-x-3">

            <div class="w-1/3 flex gap-x-3">
                <label class="text_blue text-xl font-bold">Costo Reparaciónes</label>
                <input value="${{number_format($costos_operativos->costo_reparaciones) }}" id="monto_actual_mantenimiento_financiero" name="monto_actual_mantenimiento_financiero" type="text"  onkeypress="return soloNumeros(event)" onchange="reduccion_gastos_reparaciones();format_num(this.value,this.id)" type="text" class="w-1/4 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
            </div>

            <div class="w-1/3 flex gap-x-3 justify-center">
                <div class="flex justify-start w-full gap-x-3">
                    <label class="text_blue text-xl font-bold">Reducción Reparaciónes</label>
                    <input value="${{number_format($costos_operativos->reduccion_reparaciones) }}" onchange="format_num(this.value,this.id);" id="reduccion_reparaciones_mantenimiento_financiero" name="reduccion_reparaciones_mantenimiento_financiero" type="text" class="w-1/4 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
            </div>
            <div class="w-1/3">

            </div>
        </div>

        <div class="w-full  flex justify-start mt-5">
            <h1  class="text_blue text-4xl font-bold">
                Costo Actual Mantenimiento
            </h1>
        </div>
        <div class="w-full flex gap-x-3">

            <div class="w-1/3 flex gap-x-3">
                <label class="text_blue text-xl font-bold">Costo de Mantenimiento</label>
                <input value="${{number_format($costos_operativos->costo_mantenimiento) }}" id="costo_mantenimiento_mantenimiento_financiero" name="costo_mantenimiento_mantenimiento_financiero" type="text"  onkeypress="return soloNumeros(event)" onchange="format_num(this.value,this.id);justificacion_financiera_send_mant(this.value);" type="text" class="w-1/4 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
            </div>

            <div class="w-1/3 flex gap-x-3 justify-center">

            </div>
            <div class="w-1/3">

            </div>
        </div>

    </div>
</div>

<script>

$(document).ready(function() {
    con_ene_hvac_ar_Base();

});



function con_ene_hvac_ar_Base(){
        // JS

       // JS
var chart = JSC.chart('chartDiv', {
  debug: true,
  type: 'gauge',
  legend_visible: false,
  height:220,
  xAxis: { spacingPercentage: 0.25 },
  yAxis: {
    defaultTick: {
      padding: -5,
      label_style_fontSize: '14px'
    },
    line: {
      width: 9,
      color: 'smartPalette',
      breaks_gap: 0.06
    },
    scale_range: [0, 100]
  },
  palette: {
    pointValue: '{%value/100}',
    colors: ['green', 'yellow', 'red']
  },
  defaultTooltip_enabled: false,
  defaultSeries: {
    angle: { sweep: 180 },
    shape: {
      innerSize: '70%',

      label: {
        text:
          '<span color="%color">{%sum:n1}</span><br/><span color="#696969" fontSize="20px">kW</span>',
        style_fontSize: '46px',
        verticalAlign: 'middle'
      }
    }
  },
  series: [
    {
      type: 'column roundcaps',
      points: [{ id: '1', x: 'speed', y: 0 }]
    }
  ],

});
        }
</script>
