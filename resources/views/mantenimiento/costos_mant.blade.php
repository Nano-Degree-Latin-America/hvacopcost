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
        <h1 style=" text-shadow: 2px 2px 4px #a9a9b9 ;" class="title_index font-bold font-roboto">Análisis de Costos de Mantenimiento</h1>
    </div>

    <div class="w-full flex gap-x-3  h-full">
        {{-- mant_prev --}}
        <div class="grid  tarjets_mant">
            <div style="border-color:#1B17BB;" class="w-full grid justify-items-center gap-y-1  h-auto self-start border-2 rounded-xl">

                <div  class="gap-x-3 flex py-2 justify-center width_tiempos_operacionales">
                    <div class="w-3/4 grid justify-items-start place-items-center">
                        <p class="text_blue text-2xl font-bold">
                            Mantenimiento Preventivo ASHRAE 180 - Base *
                        </p>
                    </div>
                    <div class="w-1/4 flex justify-start">
                    </div>
                </div>

                <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                    <div class="w-3/4 grid justify-items-start place-items-center">
                        <p class="text_blue text-xl font-bold">
                           Valor Contrato Anual
                        </p>
                    </div>
                    <div class="w-1/3 flex justify-start place-items-center">
                        <input  type="text" id="valor_contrato_anual" name="valor_contrato_anual" class="inp_valor_contrato_anual text-blue-800 border-2 border-color-inps text-lg rounded-md py-2 text-center"> {{-- <label  class="font-bold  font-roboto text_blue" for="">Días</label> --}}
                    </div>
                </div>

                <div class="gap-x-3 flex py-2 justify-start width_tiempos_operacionales">
                    <div class="w-3/4 grid justify-items-start place-items-center">
                        <p class="text_blue text-2xl font-bold">
                           Tiempos Operacionales
                        </p>
                    </div>
                </div>

                <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                    <div class="w-3/4 grid justify-items-start place-items-center">
                        <p class="text_blue text-xl font-bold">
                           Días de Mantenimiento
                        </p>
                    </div>
                    <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                        <input id="dias_mantenimiento" name="dias_mantenimiento" type="text" class="inps_tiempos_operacionales text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                        <div>
                            <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                        </div>
                    </div>
                </div>

                <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                    <div class="w-3/4 grid justify-items-start place-items-center">
                        <p class="text_blue text-xl font-bold">
                           Tiempo Mantenimiento
                        </p>
                    </div>
                    <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                        <input id="tiempo_mantenimiento" name="tiempo_mantenimiento" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                        <div>
                            <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                        </div>
                    </div>
                </div>

                <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                    <div class="w-3/4 grid justify-items-start place-items-center">
                        <p class="text_blue text-xl font-bold">
                           Tiempo Traslados
                        </p>
                    </div>
                    <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                        <input id="tiempo_traslados" name="tiempo_traslados" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                        <div>
                            <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                        </div>
                    </div>
                </div>

                <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                    <div class="w-3/4 grid justify-items-start place-items-center">
                        <p class="text_blue text-xl font-bold">
                           Tiempo Acceso Edificio
                        </p>
                    </div>
                    <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                        <input id="tiempo_acceso_edificio" name="tiempo_acceso_edificio" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                        <div>
                            <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                        </div>
                    </div>
                </div>

                <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales mb-2">
                    <div class="w-3/4 grid justify-items-start place-items-center">
                        <p class="text_blue text-xl font-bold">
                           Tiempo Para Garantías
                        </p>
                    </div>
                    <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                        <input  id="tiempo_garantias" name="tiempo_garantias" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                        <div>
                            <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                        </div>
                    </div>
                </div>

            </div>

           <div class="flex justify-start my-2">
                <label  class="text-xl text_blue font-bold" for="">* Basado en ASHRAE 180-2018</label>
           </div>

        </div>

        {{--Materiales  --}}
        <div style="border-color:#1B17BB;" class="tarjets_mant grid justify-items-center gap-y-1 h-auto self-start border-2 rounded-xl">

            <div class="gap-x-3 flex py-2 justify-center width_tiempos_operacionales">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-2xl font-bold">
                        Mantenimiento Preventivo Costos Adicionales *
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                </div>
            </div>

            <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Valor Contrato Anual
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center">
                    <input type="text" id="valor_contrato_anual_adicionales" name="valor_contrato_anual_adicionales" class="w-full bg-blue-800 text-white border-2 border-color-inps text-lg rounded-md py-2 text-center"> {{-- <label  class="font-bold  font-roboto text_blue" for="">Días</label> --}}
                </div>
            </div>

            <div class="gap-x-3 flex py-2 justify-start width_tiempos_operacionales">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-2xl font-bold">
                       Tiempos Operacionales
                    </p>
                </div>
            </div>

            <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Días de Mantenimiento
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                    <input id="dias_mantenimiento_adicionales" name="dias_mantenimiento_adicionales" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center"> <div>
                        <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                    </div>
                </div>
            </div>

            <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Tiempo Mantenimiento
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                    <input id="tiempo_mantenimiento_adicionales" name="tiempo_mantenimiento_adicionales" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                    <div>
                        <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                    </div>
                </div>
            </div>

            <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Tiempo Traslados
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                    <input id="tiempo_traslados_adicionales" name="tiempo_traslados_adicionales" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center"> <div>
                        <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                    </div>
                </div>
            </div>

            <div class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Tiempo Acceso Edificio
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                    <input id="tiempo_acceso_edificio_adicionales" name="tiempo_acceso_edificio_adicionales" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                    <div>
                        <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                    </div>
                </div>
            </div>

            <div  class="gap-x-3 flex mt-1 justify-center width_tiempos_operacionales mb-2">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Tiempo Para Garantías
                    </p>
                </div>
                <div class="w-1/3 flex justify-start place-items-center gap-x-1">
                    <input  id="tiempo_garantias_adicionales" name="tiempo_garantias_adicionales" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center"> <div>
                        <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                    </div>
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

</script>
