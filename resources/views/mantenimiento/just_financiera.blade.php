
<style>
    .js_charts_style{
                width: 350px;
                height: 150px;
                margin: 0px auto;
            }
</style>
<div class="w-full grid  h-full font-roboto">
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
                    <div class="w-2/5 flex">
                        <label class="text_blue text-xl font-bold">Consumo Anual Edificio</label>
                    </div>
                    <div class="w-1/2 flex">
                        <input onkeypress="return soloNumeros(event)" onchange="format_num(this.value,this.id);eui_justificacion_financiera(this.value);" type="text" id="consumo_energia_edificio_mantenimiento" name="consumo_energia_edificio_mantenimiento" type="text" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 h-10 text-center">
                    </div>

                </div>
            </div>



            <div class="w-1/3">
                <div class="flex justify-start w-full gap-x-3">
                    <div class="w-2/5 flex">
                        <label class="text_blue text-xl font-bold">Indice EUI (Kbtu/ft2)</label>
                    </div>
                    <div class="w-1/2 flex">
                        <input type="text" readonly id="eui_mantenimiento" name="eui_mantenimiento"  type="text" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center ml-2">

                    </div>
                </div>

            </div>

            <div class="w-1/3 flex justify-center">
                <div id="chart_div" style="width: 500px; height: 120px;"></div>
            </div>
        </div>

        <div class="w-full  flex justify-start mt-5">
            <h1  class="text_blue text-4xl font-bold">
                Oportunidades
            </h1>
        </div>
        <div class="w-full flex">

            <div class="w-1/6 flex gap-x-3">
                <input id="estandar_ashrae_checked" name="estandar_ashrae_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.08)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                <label class="text_blue text-xl font-bold">Estandar ASHRAE 180</label>
            </div>

            <div class="w-1/6 flex gap-x-3">
                <input id="filtros_merv_checked" name="filtros_merv_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.07)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                <label class="text_blue text-xl font-bold">Filtros MERV > 7</label>
            </div>

            <div class="w-1/6 flex gap-x-3">
                <input id="remplazo_filtros_checked" name="remplazo_filtros_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.06)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
                <label class="text_blue text-xl font-bold">Reemplazo Filtros</label>
            </div>

            <div class="w-1/6 flex gap-x-3">
                <input id="mant_preven_checked" name="mant_preven_checked" type="checkbox" onclick="calcular_justificacion_financiera(0.09)" class="w-6 h-6 text_blue border-2 border-color-inps text-lg rounded-md p-2 text-center">
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
                <div class="w-2/5 flex">
                    <label class="text_blue text-xl font-bold">Consumo Anual Edificio</label>
                </div>
                <div class="w-1/2 flex">
                    <input readonly id="consumo_energia_edificio_mantenimiento_financiero" name="consumo_energia_edificio_mantenimiento_financiero" type="text" type="text" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
            </div>

            <div class="w-1/3 flex gap-x-3 justify-center">
                <div class="flex justify-start w-full gap-x-3">
                    <div class="w-2/5 flex">
                        <label class="text_blue text-xl font-bold">Reducción Energética</label>
                    </div>
                    <div class="w-1/2 flex">
                        <input readonly type="text" type="text" id="reduccion_energetica_mantenimiento_financiero" name="reduccion_energetica_mantenimiento_financiero" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center  ml-1">
                    </div>
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
                <div class="w-2/5 flex">
                    <label class="text_blue text-xl font-bold">Costo Reparaciónes</label>
                </div>
                <div class="w-1/2 flex">
                    <input value="0" id="monto_actual_mantenimiento_financiero" name="monto_actual_mantenimiento_financiero"  onkeypress="return soloNumeros(event)" onchange="reduccion_gastos_reparaciones();format_num(this.value,this.id)" type="text" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>

            </div>

            <div class="w-1/3 flex gap-x-3 justify-center">
                <div class="flex justify-start w-full gap-x-3">
                    <div class="w-2/5 flex">
                        <label class="text_blue text-xl font-bold">Reducción Reparaciónes</label>
                    </div>
                    <div class="w-1/2 flex">
                        &nbsp;<input onchange="format_num(this.value,this.id);" id="reduccion_reparaciones_mantenimiento_financiero" name="reduccion_reparaciones_mantenimiento_financiero" readonly type="text" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                    </div>
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
                <div class="w-2/5 flex">
                        <label class="text_blue text-xl font-bold">Costo Mantenimiento</label>
                </div>
                <div class="w-1/2 flex">
                    <input value="0" id="costo_mantenimiento_mantenimiento_financiero" name="costo_mantenimiento_mantenimiento_financiero" type="text"  onkeypress="return soloNumeros(event)" onchange="format_num(this.value,this.id);justificacion_financiera_send_mant(this.value);" type="text" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
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

});




</script>
