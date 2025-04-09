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
                        Costo de Materiales
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Filtros de Aire
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
                        Filtros Adicionales
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="filtro_adicionales_adicionales" name="filtro_adicionales_adicionales" type="text" value="$0" onchange="format_num(this.value,'filtro_adicionales_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Refacciones Básicas
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="refacciones_basicas_adicionales" name="refacciones_basicas_adicionales" type="text" value="$0" onchange="format_num(this.value,'refacciones_basicas_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Filtros de Aceite Chiller
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="filtro_aceite_chiller_adicionales" name="filtro_aceite_chiller_adicionales" type="text" value="$0" onchange="format_num(this.value,'filtro_aceite_chiller_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Filtros Secador Chiller
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="filtro_secador_chiller_adicionales" name="filtro_secador_chiller_adicionales" type="text" value="$0" onchange="format_num(this.value,'filtro_secador_chiller_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
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
                        Otros Costos
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
                        Pruebas Acidez Básica
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="pruebas_acidez_basoca_adicionales" name="pruebas_acidez_basoca_adicionales" type="text" value="$0" onchange="format_num(this.value,'pruebas_acidez_basoca_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Pruebas Aceite Laboratorio
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="pruebas_aceite_laboratorio_adicionales" name="pruebas_aceite_laboratorio_adicionales" type="text" value="$0" onchange="format_num(this.value,'pruebas_aceite_laboratorio_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Pruebas de Refrigerante
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="pruebas_refrigerante_adicionales" name="pruebas_refrigerante_adicionales" type="text" value="$0" onchange="format_num(this.value,'pruebas_refrigerante_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                        Eddy Current Test
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="eddy_current_test_adicionales" name="eddy_current_test_adicionales" type="text" value="$0" onchange="format_num(this.value,'eddy_current_test_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-md font-bold">
                       Limpieza Evaporador Chiller
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="limpieza_evaporador_chiller_adicionales" name="limpieza_evaporador_chiller_adicionales" type="text" value="$0" onchange="format_num(this.value,'limpieza_evaporador_chiller_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-md font-bold">
                       Limpieza Condensador Agua
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="limpeza_condenzador_agua_adicionales" name="limpeza_condenzador_agua_adicionales" type="text" value="$0" onchange="format_num(this.value,'limpeza_condenzador_agua_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Cambio de Aceite Chillers
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="cambio_aceite_chillers_adicionales" name="cambio_aceite_chillers_adicionales" type="text" value="$0" onchange="format_num(this.value,'cambio_aceite_chillers_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
                </div>
                <div>
                    <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf mt-1" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>

            <div style="width: 65%;" class="gap-x-3 flex mt-1 justify-center">
                <div class="w-3/4 grid justify-items-start place-items-center">
                    <p class="text_blue text-xl font-bold">
                       Limpieza Anual Torres Enf.
                    </p>
                </div>
                <div class="w-1/4 flex justify-start">
                    <input id="limpieza_anual_torres_adicionales" name="limpieza_anual_torres_adicionales" type="text" value="$0" onchange="format_num(this.value,'limpieza_anual_torres_adicionales')" class="w-full text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center">
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


