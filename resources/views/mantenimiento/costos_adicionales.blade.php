<div class="w-full grid  h-full">
    <div class="w-full flex justify-center my-8">
        <h1 style=" text-shadow: 2px 2px 4px #a9a9b9 ;" class="title_index font-bold font-roboto">Análisis de Costos Adicionales</h1>
    </div>

    <div class="w-full flex gap-x-3  h-full">
        <div class="w-1/3 grid justify-items-center gap-y-1">

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-2xl font-bold">
                        Mano de Obra (Horas)
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-2 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Servicios de Emergencias
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="servicio_emergencias_adicionales" name="servicio_emergencias_adicionales" value="0" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Tiempo Adicional Accesos
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="tiempo_adicional_accesos_adicionales" name="tiempo_adicional_accesos_adicionales" value="0" type="text" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>


            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Curso de Seguridad y Otros
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="curso_seguridad_otros_adicionales" name="curso_seguridad_otros_adicionales" type="text" value="0" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Lavado de Filtros de Aire
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="lavado_filtros_aire_adicionales" name="lavado_filtros_aire_adicionales" type="text" value="0" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Lavado Evaporadores
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="lavado_evaporadores_adicionales" name="lavado_evaporadores_adicionales" type="text" value="0" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-lg font-bold">
                        Lavado Extra Condensadores
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="lavado_extra_condensadores_adicionales" name="lavado_extra_condensadores_adicionales" type="text" value="0" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Lavado de Ventiladores
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="lavado_ventiladores_adicionales" name="lavado_ventiladores_adicionales" type="text" value="0" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Limpieza de Grasa (Cocina)
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input  id="limpieza_grasa_adicionales" name="limpieza_grasa_adicionales" type="text" value="0" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Seguristas y/o Supervición
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input  id="seguristas_supervicion_adicionales" name="seguristas_supervicion_adicionales" type="text" value="0" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

        </div>

        {{--Materiales  --}}
        <div class="w-1/3 grid justify-items-center gap-y-1 h-auto self-start">
            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-2xl font-bold">
                        Materiales
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Costos de Filtro de Aire
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="costos_filtro_aire_adicionales" name="costos_filtro_aire_adicionales" type="text" value="$0" onchange="format_num(this.value,'costos_filtro_aire_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Paquete de Refacciones
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="paquete_refacciones_adicionales" name="paquete_refacciones_adicionales" type="text" value="$0" onchange="format_num(this.value,'paquete_refacciones_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>
        </div>
          {{--Otros  --}}
        <div class="w-1/3 grid justify-items-center gap-y-1 h-auto self-start">
            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-2xl font-bold">
                        Otros
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Andamios, Gruas, etc.
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="andamios_gruas_adicionales" name="andamios_gruas_adicionales" type="text" value="$0" onchange="format_num(this.value,'andamios_gruas_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Pruebas Especiales
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="pruebas_especiales_adicionales" name="pruebas_especiales_adicionales" type="text" value="$0" onchange="format_num(this.value,'pruebas_especiales_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Contratistas
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="contratistas_adicionales" name="contratistas_adicionales" type="text" value="$0" onchange="format_num(this.value,'contratistas_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Viaticos
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="viaticos_adicionales" name="viaticos_adicionales" type="text" value="$0" onchange="format_num(this.value,'viaticos_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            {{-- <div class="w-full  mt-10">
                <div id="div_next" name="div_next" class="w-full flex justify-center">
                    <button type="button"  id="next" name="next"
                        onclick="calcular_speendplan_base_adicionales();"
                        style="background-color:#1B17BB;"
                        @click="step++"
                         x-show="step == 3"
                        class="w-1/4 focus:outline-none border border-transparent py-4 px-7 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-2xl font-roboto"
                    >{{ __('index.calcular') }}</button>
                </div>
            </div> --}}

        </div>
    </div>
</div>


