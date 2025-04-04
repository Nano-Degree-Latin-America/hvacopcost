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
        <h1 style=" text-shadow: 2px 2px 4px #a9a9b9 ;" class="title_index font-bold font-roboto">Justificación</h1>
    </div>

    <div class="w-full flex gap-x-3 h-full mx-5 justify-center gap-x-10">
        {{-- mant_prev --}}
        <div class="grid  tarjets_mant">
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
                            Costos Actuales
                        </p>
                    </div>
                    <div class="w-1/3 flex justify-start place-items-center">
                        <input type="text" id="valor_contrato_anual_adicionales" name="valor_contrato_anual_adicionales" class="w-full bg-blue-800 text-white border-2 border-color-inps text-lg rounded-md py-2 text-center"> {{-- <label  class="font-bold  font-roboto text_blue" for="">Días</label> --}}
                    </div>
                </div>

                <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                    <div class="w-3/4 grid justify-items-start place-items-center">
                        <p class="text_blue text-xl font-bold">
                           Mantenimiento
                        </p>
                    </div>
                    <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                        <input id="dias_mantenimiento_adicionales" name="dias_mantenimiento_adicionales" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">

                    </div>
                </div>

                <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                    <div class="w-3/4 grid justify-items-start place-items-center">
                        <p class="text_blue text-xl font-bold">
                            Energía
                        </p>
                    </div>
                    <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                        <input id="dias_mantenimiento_adicionales" name="dias_mantenimiento_adicionales" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">

                    </div>
                </div>

                <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                    <div class="w-3/4 grid justify-items-start place-items-center">
                        <p class="text_blue text-xl font-bold">
                           Reparaciones
                        </p>
                    </div>
                    <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                        <input id="dias_mantenimiento_adicionales" name="dias_mantenimiento_adicionales" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">

                    </div>
                </div>

            </div>
        </div>

        {{--Materiales  --}}
        <div class="grid  tarjets_mant">
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
                            Costos Actuales
                        </p>
                    </div>
                    <div class="w-1/3 flex justify-start place-items-center">
                        <input type="text" id="valor_contrato_anual_adicionales" name="valor_contrato_anual_adicionales" class="w-full bg-blue-800 text-white border-2 border-color-inps text-lg rounded-md py-2 text-center"> {{-- <label  class="font-bold  font-roboto text_blue" for="">Días</label> --}}
                    </div>
                </div>

                <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                    <div class="w-3/4 grid justify-items-start place-items-center">
                        <p class="text_blue text-xl font-bold">
                           Mantenimiento
                        </p>
                    </div>
                    <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                        <input id="dias_mantenimiento_adicionales" name="dias_mantenimiento_adicionales" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">

                    </div>
                </div>

                <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                    <div class="w-3/4 grid justify-items-start place-items-center">
                        <p class="text_blue text-xl font-bold">
                            Energía
                        </p>
                    </div>
                    <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                        <input id="dias_mantenimiento_adicionales" name="dias_mantenimiento_adicionales" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">

                    </div>
                </div>

                <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                    <div class="w-3/4 grid justify-items-start place-items-center">
                        <p class="text_blue text-xl font-bold">
                           Reparaciones
                        </p>
                    </div>
                    <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                        <input id="dias_mantenimiento_adicionales" name="dias_mantenimiento_adicionales" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">

                    </div>
                </div>

            </div>
        </div>
          {{--Otros  --}}

    </div>
</div>

<script>

</script>
