
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
                    <h1  class="text_blue subtitles-just-financiera font-bold">
                        Energía Actual
                    </h1>
                </div>
                <div class="w-full flex gap-x-3">
                    <div class="w-2/5 flex">
                            <label class="text_blue text-size-adicionales font-bold">Consumo Anual Edificio</label>
                    </div>
                    <div class="w-1/2 flex">
                        <input value="${{number_format($costos_operativos->consumo_anual_edificio) }}" onkeypress="return soloNumeros(event)" onchange="format_num(this.value,this.id);eui_justificacion_financiera(this.value);" type="text" id="consumo_energia_edificio_mantenimiento" name="consumo_energia_edificio_mantenimiento" type="text" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 h-10 text-center">
                    </div>
                </div>
            </div>



            <div class="w-1/3">
                <div class="flex justify-start w-full gap-x-3">
                    <div class="w-2/5 flex">
                        <label class="text_blue text-size-adicionales font-bold">Indice EUI (Kbtu/ft2)</label>
                    </div>
                    <div class="w-1/2 flex">
                        <input value="{{ number_format($costos_operativos->eui,1) }}" type="text" readonly id="eui_mantenimiento" name="eui_mantenimiento"  type="text" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                    </div>
                </div>

            </div>

            <div class="w-1/3">
                 <div id="chart_div" style="width: 500px; height: 120px;"></div>
            </div>
        </div>

        <div class="w-full  flex justify-start mt-3">
            <h1  class="text_blue subtitles-just-financiera font-bold">
                Oportunidades
            </h1>
        </div>
        <div class="w-full flex">

            <div class="w-1/6 flex gap-x-3">
                @if ($costos_operativos->estandar_ashrae == 'on')
                <input checked id="estandar_ashrae_checked" name="estandar_ashrae_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.08)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                @else
                <input  id="estandar_ashrae_checked" name="estandar_ashrae_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.08)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                @endif
                <label class="text_blue text-size-adicionales font-bold">Estandar ASHRAE 180</label>
            </div>

            <div class="w-1/6 flex gap-x-3">
                @if ($costos_operativos->filtros_merv_7 == 'on')
                <input checked id="filtros_merv_checked" name="filtros_merv_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.07)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                @else
                <input id="filtros_merv_checked" name="filtros_merv_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.07)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                @endif
                <label class="text_blue text-size-adicionales font-bold">Filtros MERV > 7</label>
            </div>

            <div class="w-1/6 flex gap-x-3">
                @if ($costos_operativos->remplazo_filtros == 'on')
                <input checked id="remplazo_filtros_checked" name="remplazo_filtros_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.06)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                @else
                <input id="remplazo_filtros_checked" name="remplazo_filtros_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.06)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                @endif
                <label class="text_blue text-size-adicionales font-bold">Reemplazo Filtros</label>
            </div>

            <div class="w-1/6 flex gap-x-3">
                @if ($costos_operativos->mantenimiento_proactivo == 'on')
                <input checked id="mant_preven_checked" name="mant_preven_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.09)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                @else
                <input id="mant_preven_checked" name="mant_preven_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.09)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                @endif
                <label class="text_blue text-size-adicionales font-bold">Mantenimiento Proactivo</label>
            </div>
            <div class="w-1/4 flex gap-x-3">
            </div>
        </div>

        <div class="w-full  flex justify-start mt-3">
            <h1  class="text_blue subtitles-just-financiera font-bold">
                Energía Futura Estimada
            </h1>
        </div>
        <div class="w-full flex ">

            <div class="w-1/3 flex gap-x-3">
                <div class="w-2/5 flex">
                    <label class="text_blue text-size-adicionales font-bold">Consumo Anual Edificio</label>
                </div>
                <div class="w-1/2 flex">
                    <input value="${{ number_format($costos_operativos->consumo_anual_edificio_futura) }}" readonly id="consumo_energia_edificio_mantenimiento_financiero" name="consumo_energia_edificio_mantenimiento_financiero" type="text" type="text" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
            </div>

            <div class="w-1/3 flex gap-x-3 justify-center">
                <div class="flex justify-start w-full gap-x-3">
                    <div class="w-2/5 flex">
                      <label class="text_blue text-size-adicionales font-bold">Reducción Energética</label>
                    </div>
                    <div class="w-1/2 flex">
                        <input value="${{ number_format($costos_operativos->reduccion_energetica) }}" readonly type="text" type="text" id="reduccion_energetica_mantenimiento_financiero" name="reduccion_energetica_mantenimiento_financiero" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                    </div>
                </div>
            </div>
            <div class="w-1/3">

            </div>
        </div>

        <div class="w-full  flex justify-start mt-3">
            <h1  class="text_blue subtitles-just-financiera font-bold">
                Costo Actual Reparaciones
            </h1>
        </div>
        <div class="w-full flex">

            <div class="w-1/3 flex gap-x-3">
                <div class="w-2/5 flex">
                    <label class="text_blue text-size-adicionales font-bold">Costo Reparaciónes</label>
                </div>
                <div class="w-1/2 flex">
                    <input value="${{number_format($costos_operativos->costo_reparaciones) }}" id="monto_actual_mantenimiento_financiero" name="monto_actual_mantenimiento_financiero" type="text"  onkeypress="return soloNumeros(event)" onchange="reduccion_gastos_reparaciones();format_num(this.value,this.id)" type="text" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
            </div>

            <div class="w-1/3 flex gap-x-3 justify-center">
                <div class="flex justify-start w-full gap-x-3">
                    <div class="w-2/5 flex">
                        <label class="text_blue text-size-adicionales font-bold">Reducción Reparaciónes</label>
                    </div>
                    <div class="w-1/2 flex">
                        <input readonly value="${{number_format($costos_operativos->reduccion_reparaciones) }}" onchange="format_num(this.value,this.id);" id="reduccion_reparaciones_mantenimiento_financiero" name="reduccion_reparaciones_mantenimiento_financiero" type="text" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                    </div>
                </div>
            </div>
            <div class="w-1/3">

            </div>
        </div>

        <div class="w-full  flex justify-start mt-3">
            <h1  class="text_blue subtitles-just-financiera font-bold">
                Costo Actual Mantenimiento
            </h1>
        </div>
        <div class="w-full flex gap-x-3">

            <div class="w-1/3 flex gap-x-3">
                <div class="w-2/5 flex">
                        <label class="text_blue text-size-adicionales font-bold">Costo Mantenimiento</label>
                </div>
                <div class="w-1/2 flex">
                    <input value="${{number_format($costos_operativos->costo_mantenimiento) }}" id="costo_mantenimiento_mantenimiento_financiero" name="costo_mantenimiento_mantenimiento_financiero" type="text"  onkeypress="return soloNumeros(event)" onchange="format_num(this.value,this.id);justificacion_financiera_send_mant(this.value);" type="text" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
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
    google.charts.load('current', {'packages':['gauge']});
    google.charts.setOnLoadCallback(grafica_eui_analisis_costos);
$('#consumo_energia_edificio_mantenimiento').on('change', function () {
     google.charts.setOnLoadCallback(grafica_eui_analisis_costos);
 });
});

function grafica_eui_analisis_costos(){

    var eui = $('#eui_mantenimiento').val();
    var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['EUI', parseInt(eui)]
        ]);

        var options = {
          width: 500, height: 200,
          greenFrom:1,greenTo:200,
          redFrom: 300, redTo: 400,
          yellowFrom:200, yellowTo: 300,
          minorTicks: 5,
          max:400,
          min:1,
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);
    }
</script>
