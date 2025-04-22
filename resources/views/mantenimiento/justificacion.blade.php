<style>
    .width_tiempos_operacionales{
        width: 80%;
    }
    .inps_tiempos_operacionales{
         width: 80%;
    }
    .inp_valor_contrato_anual{
        width: 95%;

    }
    .tarjets_mant{
        width: 29%;
    }
</style>
<div class="w-full grid  h-full font-roboto">
    <div class="w-full flex justify-center my-8">
        <h1 style=" text-shadow: 2px 2px 4px #a9a9b9 ;" class="title_index font-bold font-roboto">Justificación Financiera</h1>
    </div>

    <div class="w-full flex">


        <div class="w-1/2 grid gap-x-3 h-full justify-items-center gap-y-3 ">
            {{-- mant_prev --}}
            <div class="grid w-3/4">
                <div style="border-color:#1B17BB;" class="w-full grid justify-items-center gap-y-1  h-auto self-start border-2 rounded-xl py-5">

                    <div  class="gap-x-3 flex py-2 justify-center width_tiempos_operacionales">
                        <div class="w-3/4 grid justify-items-center place-items-center">
                            <p class="text_blue text-2xl font-bold">
                                Costos Actuales
                            </p>
                        </div>
                    </div>


                    <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                        <div class="w-3/4 grid justify-items-start place-items-center">
                            <p class="text_blue text-xl font-bold">
                            Mantenimiento
                            </p>
                        </div>
                        <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                            <input onchange="suma_mantenimiento();" id="mantenimiento_justificacion_mantenimiento" name="mantenimiento_justificacion_mantenimiento" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">

                        </div>
                    </div>

                    <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                        <div class="w-3/4 grid justify-items-start place-items-center">
                            <p class="text_blue text-xl font-bold">
                                Energía
                            </p>
                        </div>
                        <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                            <input  id="energia_justificacion_mantenimiento" name="energia_justificacion_mantenimiento" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">

                        </div>
                    </div>

                    <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                        <div class="w-3/4 grid justify-items-start place-items-center">
                            <p class="text_blue text-xl font-bold">
                            Reparaciones
                            </p>
                        </div>
                        <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                            <input onchange="format_num(this.value,this.id);suma_mantenimiento();" id="reparaciones_justificacion_mantenimiento" name="reparaciones_justificacion_mantenimiento" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">

                        </div>
                    </div>

                    <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                        <div class="w-3/4 grid justify-items-start place-items-center">
                            <p class="text_blue text-xl font-bold">
                                Total Mantenimiento
                            </p>
                        </div>
                        <div class="w-1/3 flex justify-start place-items-center">
                            <input type="text" id="total_justificacion_mantenimiento" name="total_justificacion_mantenimiento" class="w-full bg-blue-800 text-white border-2 border-color-inps text-lg rounded-md py-2 text-center"> {{-- <label  class="font-bold  font-roboto text_blue" for="">Días</label> --}}
                        </div>
                    </div>

                </div>
            </div>

            {{--Materiales  --}}
            <div class="grid w-3/4">
                <div style="border-color:#1B17BB;" class="w-full grid justify-items-center gap-y-1  h-auto self-start border-2 rounded-xl py-5">

                    <div  class="gap-x-3 flex py-2 justify-center width_tiempos_operacionales">
                        <div class="w-3/4 grid justify-items-center place-items-center">
                            <p class="text_blue text-2xl font-bold">
                                Costos Futuros
                            </p>
                        </div>
                    </div>


                    <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                        <div class="w-3/4 grid justify-items-start place-items-center">
                            <p class="text_blue text-xl font-bold">
                            Mantenimiento
                            </p>
                        </div>
                        <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                            <input id="mantenimiento_justificacion_financiera_futuro" name="mantenimiento_justificacion_financiera_futuro" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">

                        </div>
                    </div>

                    <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                        <div class="w-3/4 grid justify-items-start place-items-center">
                            <p class="text_blue text-xl font-bold">
                                Energía
                            </p>
                        </div>
                        <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                            <input id="energia_justificacion_financiera_futuro" name="energia_justificacion_financiera_futuro" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">

                        </div>
                    </div>

                    <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                        <div class="w-3/4 grid justify-items-start place-items-center">
                            <p class="text_blue text-xl font-bold">
                            Reparaciones
                            </p>
                        </div>
                        <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                            <input   id="reparaciones_justificacion_financiera_futuro" name="reparaciones_justificacion_financiera_futuro" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">

                        </div>
                    </div>

                    <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                        <div class="w-3/4 grid justify-items-start place-items-center">
                            <p class="text_blue text-xl font-bold">
                                Total Mantenimiento
                            </p>
                        </div>
                        <div class="w-1/3 flex justify-start place-items-center">
                            <input type="text" id="total_mantenimiento_justificacion_futuro" name="total_mantenimiento_justificacion_futuro" class="w-full bg-blue-800 text-white border-2 border-color-inps text-lg rounded-md py-2 text-center"> {{-- <label  class="font-bold  font-roboto text_blue" for="">Días</label> --}}
                        </div>
                    </div>

                </div>
            </div>
            {{--Otros  --}}
        </div>
    <div class="w-1/2 grid place-items-center">
        <div id="chart" name="chart" style="width: 600px;"></div>
    </div>
 </div>

</div>

<script>
    $(document).ready(function() {
        justidicacion_financiera_chart();

});
function justidicacion_financiera_chart(){

    var options = {
          series: [{
            name: "Desktops",
            data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Product Trends by Month',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
}
</script>
