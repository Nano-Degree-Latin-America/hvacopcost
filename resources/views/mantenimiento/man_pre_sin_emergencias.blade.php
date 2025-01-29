
<div class="w-full h-full grid justify-items-center font-roboto gap-y-1">
    <div class="grid justify-items-center">
        <h1 class="text-3xl text_blue font-bold">Mantenimiento Preventivo ASHRAE 180</h1>
        <h2 class="text-2xl text_blue font-bold">Preventivo</h2>
    </div>

    <div style="width:65%;" class="gap-x-3 flex mt-3 justify-center">
        <div class="w-1/2 grid justify-items-center place-items-center ">
            <p class="text_blue text-xl font-bold">
                Valor Anual - Base
            </p>
        </div>
        <div class="w-1/2 flex justify-start">
            <input type="text" class="w-1/2 bg-blue-800 text-white border-2 border-color-inps text-lg rounded-md py-3 text-center" type="text" >
        </div>
    </div>

    <div style="width:65%;" class="flex mt-3">
        <label class="text_blue text-lg">Tiempos de Operaciones Anuales</label>
    </div>

    <div style="width:65%;" class="gap-x-3 flex mt-3 justify-center">
        <div class="w-1/2 grid justify-items-start place-items-center ">
            <p class="text_blue text-xl font-bold">
                Días de Mantenimiento
            </p>
        </div>
        <div class="w-1/2 flex justify-start">
            <input type="text" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text" >
        </div>
    </div>

    <div style="width:65%;" class="gap-x-3 flex mt-3 justify-center">
        <div class="w-1/2 grid justify-items-start place-items-center ">
            <p class="text_blue text-xl font-bold">
                Tiempo de Mantenimiento
            </p>
        </div>
        <div class="w-1/2 flex justify-start place-items-center">
            <input type="text" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text" > <p class="text_blue">Hrs.</p>
        </div>
    </div>

    <div style="width:65%;" class="gap-x-3 flex mt-3 justify-center">
        <div class="w-1/2 grid justify-items-start place-items-center ">
            <p class="text_blue text-xl font-bold">
                Tiempo de Traslados
            </p>
        </div>
        <div class="w-1/2 flex justify-start place-items-center">
            <input type="text" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text" > <p class="text_blue">Hrs.</p>
        </div>
    </div>

    <div style="width:65%;" id="chart_vals_mant" name="chart_vals_mant" class="mt-5">

    </div>

<style>
    .alto_caja_blue{
        height:50% !important;
    }

    .alto_caja{
        height:98% ;
    }

    .act_var{
        height:60% ;
    }
</style>
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
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart_vals_mant"), options);
        chart.render();
    }
</script>
