<div class="w-full grid  h-full font-roboto">
    <div class="w-full flex justify-center">
        <h1 style=" text-shadow: 2px 2px 4px #a9a9b9 ;" class="title_index font-bold font-roboto">Análisis de Costos de Mantenimiento</h1>
    </div>

    <div class="w-full flex gap-x-3  h-full">
        {{-- mant_prev --}}
        <div class="w-1/3 grid justify-items-center gap-y-1  h-auto self-start">

            <div style="width: 75%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-2xl font-bold">
                        Mantenimiento Preventivo ASHRAE 180 - Base
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                </div>
            </div>

            <div style="width: 75%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Valor Contrato Anual
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center">
                    <input type="text" id="valor_contrato_anual" name="valor_contrato_anual" class="w-full bg-blue-800 text-white border-2 border-color-inps text-lg rounded-md py-2 text-center"> <label  class="font-bold  font-roboto text_blue" for="">Días</label>
                </div>
            </div>

            <div style="width: 75%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-2xl font-bold">
                       Tiempos Operacionales
                    </p>
                </div>
            </div>

            <div style="width: 75%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Días de Mantenimiento
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center">
                    <input id="dias_mantenimiento" name="dias_mantenimiento" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center"> <label class="font-bold  font-roboto text_blue"  for="">Hrs</label>
                </div>
            </div>

            <div style="width: 75%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Tiempo Mantenimiento
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center">
                    <input id="tiempo_mantenimiento" name="tiempo_mantenimiento" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center"> <label class="font-bold  font-roboto text_blue"  for="">Hrs</label>
                </div>
            </div>

            <div style="width: 75%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Tiempo Traslados
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center">
                    <input id="tiempo_traslados" name="tiempo_traslados" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center"> <label class="font-bold  font-roboto text_blue"  for="">Hrs</label>
                </div>
            </div>

            <div style="width: 75%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Tiempo Acceso Edificio
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center">
                    <input id="tiempo_acceso_edificio" name="tiempo_acceso_edificio" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center"> <label class="font-bold  font-roboto text_blue"  for="">Hrs</label>
                </div>
            </div>

            <div style="width: 75%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Tiempo Para Garantías
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center">
                    <input  id="tiempo_garantias" name="tiempo_garantias" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center"> <label class="font-bold  font-roboto text_blue"  for="">Hrs</label>
                </div>
            </div>

        </div>

        {{--Materiales  --}}
        <div class="w-1/3 grid justify-items-center gap-y-1  h-auto self-start">

            <div style="width: 75%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-2xl font-bold">
                        Mantenimiento Preventivo ASHRAE 180 - Base
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                </div>
            </div>

            <div style="width: 75%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Valor Contrato Anual
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center">
                    <input type="text" id="valor_contrato_anual_adicionales" name="valor_contrato_anual_adicionales" class="w-full bg-blue-800 text-white border-2 border-color-inps text-lg rounded-md py-2 text-center"> <label  class="font-bold  font-roboto text_blue" for="">Días</label>
                </div>
            </div>

            <div style="width: 75%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-2xl font-bold">
                       Tiempos Operacionales
                    </p>
                </div>
            </div>

            <div style="width: 75%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Días de Mantenimiento
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center">
                    <input id="dias_mantenimiento" name="dias_mantenimiento_adicionales" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center"> <label class="font-bold  font-roboto text_blue"  for="">Hrs</label>
                </div>
            </div>

            <div style="width: 75%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Tiempo Mantenimiento
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center">
                    <input id="tiempo_mantenimiento" name="tiempo_mantenimiento_adicionales" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center"> <label class="font-bold  font-roboto text_blue"  for="">Hrs</label>
                </div>
            </div>

            <div style="width: 75%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Tiempo Traslados
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center">
                    <input id="tiempo_traslados" name="tiempo_traslados_adicionales" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center"> <label class="font-bold  font-roboto text_blue"  for="">Hrs</label>
                </div>
            </div>

            <div style="width: 75%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Tiempo Acceso Edificio
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center">
                    <input id="tiempo_acceso_edificio" name="tiempo_acceso_edificio_adicionales" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center"> <label class="font-bold  font-roboto text_blue"  for="">Hrs</label>
                </div>
            </div>

            <div style="width: 75%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Tiempo Para Garantías
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center">
                    <input  id="tiempo_garantias" name="tiempo_garantias_adicionales" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center"> <label class="font-bold  font-roboto text_blue"  for="">Hrs</label>
                </div>
            </div>

        </div>
          {{--Otros  --}}
        <div class="w-1/3 grid justify-items-center gap-y-1 h-auto self-start">
            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-2xl font-bold">
                        Comparativa de Costos de Mantenimieto
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                </div>
            </div>

            <div style="width:90%;" id="chart_vals_mant" name="chart_vals_mant" class="mt-5">

            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        chart_vals_mant();
    });

    function chart_vals_mant(){

     var options = {
          series: [{
          data: [400, 430, 448, 470]
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
        xaxis: {
          categories: ['C/Adicionales', 'Base', 'Rav Máximo','Rav Minimo'
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
</script>
