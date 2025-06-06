<div class="grid w-full  gap-y-2">
    <div style="width: 100%; text-align: -webkit-right;" class="mt-6">
        <div style="border:solid 2px;border-color:#233064;" class="rounded-t-xl w-full 2xl:flex xl:flex lg:grid justify-between 2xl:py-3 xl:py-3 lg:py-0  ">
            <div class="ml-5 2xl:w-10 xl:w-auto lg:w-1/4 flex justify-start">
             <a href="#final1">   <button onclick="active_display_retro('sol_1_retro');" type="button" class="rounded-xl p-1 m-0 hover-button-plus text-3xl">{{-- <i class="fa-solid fa-plus text-white"></i> --}}</button></a>
                <input type="text" class="hidden" value="2" id="cont_sol_1_retro" name="cont_sol_1_retro">
                <input type="text" class="hidden" value="1" id="set_sol_1_retro" name="set_sol_1_retro">
                <input type="text" class="hidden" value="" id="id_tabla_edit" name="id_tabla_edit">
            </div>
            <div class="2xl:ml-5 xl:ml-5 lg:ml-10 w-full flex  2xl:justify-center xl:justify-center lg:justify-center  py-1">
                <h2 style="color:#1B17BB;" class="font-bold text-3xl">{{ __('index.sis_ext') }}</h2>
            </div>

            <div class="mr-5 2xl:w-20 xl:w-auto lg:w-1/4 flex justify-end">
                <button id="button_modal" name="button_modal" {{-- onclick="mostrar_modal('modal_add_marca_modelo');send_marcas_to_datalist();" --}} type="button"  class="rounded-xl p-1 m-0 text-3xl"><img src="{{asset('/assets/images/air-conditioning_blue.png')}}" style="width:75px!important; height:45px;" /></button>
            </div>

        </div>
        <div style="border-color:#233064;" class="border-r-2 border-l-2 border-b-2  rounded-b-xl">


        <div class="grid w-full" id="sol_1_1" name="sol_1_1">
        <input type="text" name="pais_retro" id="pais_retro" class="hidden">
        <input type="text" name="ciudad_retro" id="ciudad_retro" class="hidden">

       <div class="flex w-full">
        <div class="w-full mt-2 mx-2 rounded-md">
          <div class="grid my-2 ">

            <div class="flex w-full">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2 ">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.unidadhvac') }}</b> </label>
                    </div>

                    <div class="w-1/2 flex justify-start">
                        <select onchange="unidadHvac(this.value,'','unidad_mantenimiento',{{$module_2}});send_value_equipo_marcas(this.id,this.value,'marca_mantenimiento');valida_selects_inps(this.id);" name="sistema_mantenimiento" id="sistema_mantenimiento" class="w-full border-2 border-color-inps rounded-md py-2">
                            <option value="0">{{ __('index.seleccionar') }}</option>
                           {{--  @foreach ($sistemas as $sistema)
                            <option value="{{$sistema->id}}">{{$sistema->name}}</option>
                            @endforeach --}}
                            <option value="0">{{ __('index.seleccionar') }}</option>
                            <option value="1">Paquetes (RTU)</option>
                            <option value="2">Split DX</option>
                            {{-- <option value="3">VRF No Ductados</option>
                            <option value="4">VRF Ductados</option> --}}
                            <option value="16">VRF / VRV</option>
                            <option value="5">PTAC/VTAC</option>
                            <option value="6">WSHP</option>
                            <option value="7">Minisplit Inverter</option>
                            <option value="8">Unidades Presición</option>
                            <option value="9">Chiller Scroll</option>
                            <option value="10">Chiller de Tornillo</option>
                            <option value="11">Chiller Turbocor</option>
                            <option value="12">Equipamiento Agua Fría</option>
                            <option value="13">Torres de Enfriamiento</option>
                            <option value="14">Ventilación</option>
                            <option value="15">Accesorios</option>

                        </select>
                        <input id="sistema_count_mantenimiento" name="sistema_count_mantenimiento" type="number" class="hidden" value="1">
                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/2 text-left">
                        <label class="labels" for=""><b>{{ __('index.tipo equipo') }}</b> </label>
                    </div>
                    <div class="w-full flex justify-start">
                        <select style="font-size: 14px" class="w-full border-2 border-color-inps rounded-md py-2" onchange="valida_selects_inps(this.id);change_img(this.value);" name="unidad_mantenimiento" id="unidad_mantenimiento">

                        </select>
                    </div>
                    <input id="unidad_count_mantenimiento" name="unidad_count_mantenimiento" type="number" class="hidden" value="1">
                </div>
            </div>

            <div class="flex w-full 2xl:mt-2 xl:mt-2 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.marca') }}</b> </label>
                    </div>

                    <div class="w-1/2 flex justify-start">
                        <select onchange="send_modelos(this.value,'modelo_mantenimiento');valida_selects_inps(this.id);" name="marca_mantenimiento" id="marca_mantenimiento" class="w-full border-2 border-color-inps rounded-md py-2">

                        </select>
                        <input id="marca_count_mantenimiento" name="marca_count_mantenimiento" type="number" class="hidden" value="1">
                    </div>
                    <div class="mt-1">
                        <a onclick="mostrar_modal('modal_marca_support');" class="btn_roundf_retro" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/2 text-left">
                        <label class="labels" for=""><b>{{ __('index.modelo') }}</b></label>
                    </div>
                    <div class="w-full flex justify-start">
                        <select style="font-size: 14px" onchange="valida_selects_inps(this.id);" class="w-full border-2 border-color-inps rounded-md py-2" name="modelo_mantenimiento" id="modelo_mantenimiento">
                        </select>
                    </div>
                    <input id="modelo_equipo_count_mantenimiento" name="modelo_equipo_count_mantenimiento" type="number" class="hidden" value="1">
                </div>
            </div>

            <div class="flex w-full 2xl:mt-2 xl:mt-2 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/3 text-left">
                        <label class="labels" for=""><b>{{ __('mantenimiento.yrs_life_equipo') }}</b> </label>
                    </div>

                    <div class="flex justify-start w-1/3">
                        <input name="yrs_vida_mantenimiento" id="yrs_vida_mantenimiento" onchange="valida_selects_inps(this.id);check_type_set_mant_inp('type_p','yrs_vida_2_1_retro_mantenimiento','yrs_vida_3_1_retro_mantenimiento',this.value);" onkeypress="return soloNumeros(event)" type="text" class="text-center w-full border-2 border-color-inps rounded-md">

                        <input id="yrs_vida_count_mantenimiento" name="yrs_vida_count_mantenimiento" type="number" class="hidden" value="1">
                    </div>
                </div>
                {{-- @include('modal_seer_retro') --}}
                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">
                    <div class="flex justify-start w-1/2 text-left">
                        <label class="labels" for=""><b>{{ __('index.capacidad termica') }}</b> </label>
                    </div>
                    <div class="flex w-full justify-start gap-x-2">
                        <div class="w-1/2">
                            <input type="text" style="margin-left: 1px;" onchange="valida_selects_inps(this.id);" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md py-2 text-center" name="capacidad_termica_mantenimiento" id="capacidad_termica_mantenimiento">
                        </div>
                        <input id="capacidad_termica_count_mantenimiento" name="capacidad_termica_count_mantenimiento" type="number" class="hidden" value="1">
                        <div class="w-1/2">
                            <select class="w-full border-2 border-color-inps rounded-md h-full text-center" id="capacidad_termica_unidad_mantenimiento" name="capacidad_termica_unidad_mantenimiento">
                                <option selected value="TR">TR</option>
                                <option value="KW">KW</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex w-full 2xl:mt-2 xl:mt-2 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>Horas Diarias</b> </label>
                    </div>

                    <div class="flex justify-start w-1/2">
                        <input readonly type="text" style="font-size: 14px;margin-left:1px;" class="w-full border-2 border-color-inps rounded-md py-1 text-center bg-gray-400" id="horas_diarias_mantenimiento" name="horas_diarias_mantenimiento"
                        @if($mantenimiento_project->ocupacion_semanal == "m_50")
                            value="{{ __('index.menos de 50 hrs') }}."
                        @endif

                        @if($mantenimiento_project->ocupacion_semanal == "51_167")
                            value="{{ __('index.51 a 167 hrs') }}."
                        @endif

                        @if($mantenimiento_project->ocupacion_semanal == "168")
                            value="168 Hrs."
                        @endif
                        onchange="valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);">
                        <input id="horas_diarias_count_mantenimiento" name="horas_diarias_count_mantenimiento" type="number" class="hidden" value="1">
                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">
                    <div class="flex justify-start w-1/2 text-left">
                        <label class="labels" for=""><b>Tipo Acceso</b></label>
                    </div>
                    <div class="w-full flex justify-start">
                        <select style="font-size: 14px" onchange="valida_selects_inps(this.id);" class="w-full border-2 border-color-inps rounded-md py-2" name="tipo_acceso_mantenimiento" id="tipo_acceso_mantenimiento">
                            <option selected value="">&nbsp;Seleccionar</option>

                        </select>
                    </div>
                    <input id="tipo_acceso_count_mantenimiento" name="tipo_acceso_count_mantenimiento" type="number" class="hidden" value="1">
                </div>
            </div>

            <div class="flex w-full 2xl:mt-2 xl:mt-2 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>Estado Unidad</b> </label>
                    </div>

                    <div class="w-1/2 flex justify-start">
                        <select onchange="valida_selects_inps(this.id);" name="estado_unidad_mantenimiento" id="estado_unidad_mantenimiento" class="w-full border-2 border-color-inps rounded-md py-2">
                            <option selected value="">&nbsp;Seleccionar</option>
                        </select>
                        <input id="estado_unidad_count_mantenimiento" name="estado_unidad_count_mantenimiento" type="number" class="hidden" value="1">
                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">
                    <div class="flex justify-start w-1/2 text-left">
                        <label class="labels" for=""><b>Cambio de Filtros</b></label>
                    </div>
                    <div class="w-full flex justify-start">
                        <select style="font-size: 14px" onchange="valida_selects_inps(this.id);" class="w-full border-2 border-color-inps rounded-md py-2" name="cambio_filtros_mantenimiento" id="cambio_filtros_mantenimiento">
                            <option selected value="0">&nbsp;Seleccionar</option>
                            <option value="si" class="">&nbsp;Si</option>
                            <option value="no" class="">&nbsp;No</option>
                            <option value="lavado" class="">&nbsp;Lavado</option>
                        </select>
                    </div>
                    <input id="cambio_filtros_count_mantenimiento" name="cambio_filtros_count_mantenimiento" type="number" class="hidden" value="1">
                </div>
            </div>

            <div class="flex w-full 2xl:mt-2 xl:mt-2 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label style="font-size:12px;" for=""><b>Costo Cambio Filtros</b> </label>
                    </div>

                    <div class="flex justify-start w-1/3">
                        <input value="$0" type="text" style="font-size: 14px;margin-left:1px;" class="w-full border-2 border-color-inps rounded-md py-1 text-center" id="costo_filtro_mantenimiento" name="costo_filtro_mantenimiento" onkeypress="return soloNumeros(event)" onchange="valida_selects_inps(this.id);format_num(this.value,this.id);/* send_costo_cambio_filtros(); */">
                        <input id="costo_filtro_count_mantenimiento" name="costo_filtro_count_mantenimiento" type="number" class="hidden" value="1">
                    </div>
                    <div class="" style="margin-top: 5.5px;">
                        <a onclick="mostrar_modal_energia_hvac('modal_energia_hvac');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>Cambios Anuales</b> </label>
                    </div>

                    <div class="flex justify-start w-1/2">
                        <input value="0" type="text" style="font-size: 14px;margin-left:1px;" class="w-full border-2 border-color-inps rounded-md py-1 text-center" id="cantidad_filtros_mantenimiento" name="cantidad_filtros_mantenimiento" onkeypress="return soloNumeros(event)" onchange="valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);/* send_costo_cambio_filtros(); */">
                        <input id="cantidad_filtros_count_mantenimiento" name="cantidad_filtros_count_mantenimiento" type="number" class="hidden" value="1">
                    </div>
                </div>
            </div>

            <div class="flex w-full 2xl:mt-2 xl:mt-2 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>Cantidad Unidades</b> </label>
                    </div>

                    <div class="flex justify-start w-1/3">
                        <input value="1" type="text" style="font-size: 14px;margin-left:1px;" class="w-full border-2 border-color-inps rounded-md py-1 text-center" id="cantidad_unidades_mantenimiento" name="cantidad_unidades_mantenimiento" onkeypress="return soloNumeros(event)" onchange="valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);/* send_costo_cambio_filtros(); */">
                        <input id="cantidad_unidades_count_mantenimiento" name="cantidad_unidades_count_mantenimiento" type="number" class="hidden" value="1">
                    </div>
                    <div class="" style="margin-top: 5.5px;">
                        <a onclick="mostrar_modal_energia_hvac('modal_energia_hvac');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">
                    <button onclick="check_form_mantenimiento_tarjet_edit('{{$project_edit->id}}','{{App::getLocale()}}')"style="background-color:#1B17BB;" type="button" name="save__button_mantenimiento" id="save__button_mantenimiento" class=" focus:outline-none border border-transparent py-2 px-3 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-lg font-roboto">Guardar</button>

                    <div class="flex justify-end">
                        <button onclick="clean_form_tarjet_mantenimiento();" type="button" title="Limpiar Tarjeta" class="py-1 px-3 border-2 rounded-md text-xl bg-orange-500 text-white hover:text-gray-200"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>


          </div>
        </div>
       </div>
      </div>


    </div>
    </div>

   <div class="mt-5 flex justify-center w-full">
       <div id="img_sistemas" name="img_sistemas"></div>
   </div>
</div>

