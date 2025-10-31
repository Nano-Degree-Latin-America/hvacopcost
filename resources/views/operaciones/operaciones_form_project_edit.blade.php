<div class="col-4 ml-5 xl:ml-0 lg:ml-0 md:ml-0 lg:sm-0 ">
    @inject('all_paises','App\Http\Controllers\IndexController')
    @inject('paises_empresa','App\Http\Controllers\IndexController')
            <div class="my-8">
                <label style=" text-shadow: 2px 2px 4px #a9a9b9 ;" class="title_index font-roboto drop-shadow-lg font-bold leading-tight text-center" for="">Análisis Operacional de<br> {{ __('mantenimiento.contratos_mantenimiento_hvac') }}</label>
            </div>
         <div class="w-full {{-- rounded-xl border-2 border-blue-500 --}} mt-2">

            <div class="flex w-full gap-x-10 my-2 mx-1 justify-center">

                <div class="grid justify-items-end h-full gap-y-1 w-1/2">

                    <div class="grid md:w-4/5 xl:w-4/5 lg:w-1/2 justify-items-start ">
                        <div class="flex w-full">
                            <div class="flex w-full">
                                <label class="labels_index_coordinacion  font-roboto font-bold text-left m-0" for=""><b>{{ __('mantenimiento.cliente_prospecto') }}</b></label>
                                <label class="text-red-500 m-0">*</label>
                            </div>
                        </div>
                        <input value="{{ $project_edit_coordinacion->cliente_prospecto }}" onchange="check_input(this.value,this.id,'cliente_pro_warning_mantenimiento');check_inp_count_coordinacion('count_cliente_pro_mantenimiento','cliente_pro_mantenimiento');valida_selects_inps(this.id);" name="cliente_pro_mantenimiento" id="cliente_pro_mantenimiento" type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto">
                        <input id="count_cliente_pro_mantenimiento" name="count_cliente_pro_mantenimiento" type="number" class="hidden" value="1">
                        <span id="cliente_pro_warning_mantenimiento" name="cliente_pro_warning_mantenimiento" class="text-red-500"></span>
                    </div>

                    <div class="grid md:w-4/5 xl:w-4/5 lg:w-1/2 justify-items-start ">
                        <div class="flex w-full">
                            <label class="font-roboto labels_index_coordinacion  text-left m-0" for=""><b>{{ __('mantenimiento.categoria_edificio') }}</b></label>
                            <label class="text-red-500 m-0">*</label>
                        </div>
                        <select name="cat_edi_mantenimiento" id="cat_edi_mantenimiento" onchange="traer_t_edif(this.value,'tipo_edificio_mantenimiento','{{App::getLocale()}}');check_input(this.value,this.id,'cat_ed_warning_mantenimiento');check_inp_count_coordinacion('count_cat_edi_mantenimiento','cat_edi_id_mantenimiento');valida_selects_inps(this.id);" class="w-full font-roboto border-2 border-color-inps rounded-md p-1 my-1">
                            @foreach ($cate_edificio as $cat_edi)
                            @if ($project_edit->id_cat_edifico == $cat_edi->id)
                            <option selected value="{{$cat_edi->id}}">{{$cat_edi->name}}</option>
                            @endif
                            @if ($project_edit->id_cat_edifico != $cat_edi->id)
                            <option value="{{$cat_edi->id}}">{{$cat_edi->name}}</option>
                            @endif
                            @endforeach
                        </select>
                        <input id="count_cat_edi_mantenimiento" name="count_cat_edi_mantenimiento" type="number" class="hidden" value="1">
                        <span id="cat_ed_warning_mantenimiento" name="cat_ed_warning_mantenimiento" class="text-red-500"></span>
                    </div>

                    <div class="grid md:w-4/5 xl:w-4/5 lg:w-1/2 justify-items-start ">
                        <div class="flex w-full justify-start">
                            <label class="font-roboto font-bold text-left labels_index_coordinacion  m-0" for=""><b>{{ __('mantenimiento.ocupacion_semanal') }}</b></label>
                            <label class="text-red-500 m-0">*</label>
                        </div>
                        <select onchange="set_horas_diarias();check_input(this.value,this.id,'ocupacion_semanal_warning_mantenimiento');check_inp_count_coordinacion('count_ocupacion_semanal_mantenimiento','ocupacion_semanal_mantenimiento');valida_selects_inps(this.id);" class="w-1/2 border-2 border-color-inps rounded-md p-1 my-1 font-roboto" name="ocupacion_semanal_mantenimiento" id="ocupacion_semanal_mantenimiento">
                                                        @switch($project_edit_coordinacion->ocupacion_semanal)
                                                            @case('m_50')
                                                            <option selected value="m_50">{{ __('index.menos de 50 hrs') }}.</option>
                                                            <option value="51_167">{{ __('index.51 a 167 hrs') }}.</option>
                                                            <option value="168">168 Hrs.</option>
                                                            @break

                                                            @case('51_167')
                                                            <option  value="m_50">{{ __('index.menos de 50 hrs') }}.</option>
                                                            <option selected value="51_167">{{ __('index.51 a 167 hrs') }}.</option>
                                                            <option value="168">168 Hrs.</option>
                                                            @break

                                                            @case('168')
                                                            <option value="m_50">{{ __('index.menos de 50 hrs') }}.</option>
                                                            <option value="51_167">{{ __('index.51 a 167 hrs') }}.</option>
                                                            <option selected value="168">168 Hrs.</option>
                                                            @break

                                                            @default

                                                        @endswitch
                        </select>
                        <input value="1" id="count_ocupacion_semanal_mantenimiento" name="count_ocupacion_semanal_mantenimiento" type="number" class="hidden"<div class="grid justify-items-end h-full gap-y-1 w-1/2">
                        <span id="ocupacion_semanal_warning_mantenimiento" name="ocupacion_semanal_warning_mantenimiento" class="text-red-500"></span>
                    </div>


                    <div class="grid md:w-4/5 xl:w-4/5 lg:w-1/2 justify-items-start">
                        <div class="flex w-full">
                            <label  class="font-roboto labels_index_coordinacion  m-0" for=""><b>Tiempo Ingreso:</b></label>
                            <label class="text-red-500 m-0">*</label>
                        </div>
                            <select onchange="check_input(this.value,this.id,'tiempo_ingreso_warning');check_inp_count_coordinacion('count_tiempo_ingreso','tiempo_ingreso');valida_selects_inps(this.id);" name="tiempo_ingreso" id="tiempo_ingreso" class="w-1/4 border-2 border-color-inps rounded-md p-1 my-1 font-roboto">

                                @switch($project_edit_coordinacion->tiempo_ingreso)
                                    @case('0.00')
                                        <option selected value="0.0">0.0 hrs.</option>
                                        <option value="0.25">0.25 hrs.</option>
                                        <option value="0.5">0.5 hrs.</option>
                                        <option value="1.0">1.0 hrs.</option>
                                        <option value="1.5">1.5 hrs.</option>
                                        <option value="2.0">2.0 hrs.</option>
                                    @break

                                    @case('0.25')
                                        <option value="0.0">0.0 hrs.</option>
                                        <option selected value="0.25">0.25 hrs.</option>
                                        <option value="0.5">0.5 hrs.</option>
                                        <option value="1.0">1.0 hrs.</option>
                                        <option value="1.5">1.5 hrs.</option>
                                        <option value="2.0">2.0 hrs.</option>
                                    @break

                                    @case('0.50')
                                        <option value="0.0">0.0 hrs.</option>
                                        <option value="0.25">0.25 hrs.</option>
                                        <option selected value="0.5">0.5 hrs.</option>
                                        <option value="1.0">1.0 hrs.</option>
                                        <option value="1.5">1.5 hrs.</option>
                                        <option value="2.0">2.0 hrs.</option>
                                    @break

                                    @case('1.00')
                                        <option value="0.0">0.0 hrs.</option>
                                        <option value="0.25">0.25 hrs.</option>
                                        <option value="0.5">0.5 hrs.</option>
                                        <option selected value="1.0">1.0 hrs.</option>
                                        <option value="1.5">1.5 hrs.</option>
                                        <option value="2.0">2.0 hrs.</option>
                                    @break

                                    @case('1.50')
                                        <option value="0.0">0.0 hrs.</option>
                                        <option value="0.25">0.25 hrs.</option>
                                        <option value="0.5">0.5 hrs.</option>
                                        <option value="1.0">1.0 hrs.</option>
                                        <option selected value="1.5">1.5 hrs.</option>
                                        <option value="2.0">2.0 hrs.</option>
                                    @break

                                    @case('2.00')
                                        <option value="0.0">0.0 hrs.</option>
                                        <option value="0.25">0.25 hrs.</option>
                                        <option value="0.5">0.5 hrs.</option>
                                        <option value="1.0">1.0 hrs.</option>
                                        <option value="1.5">1.5 hrs.</option>
                                        <option selected value="2.0">2.0 hrs.</option>
                                    @break

                                    @default

                                    @endswitch
                            </select>
                            <input id="count_tiempo_ingreso" name="count_tiempo_ingreso" type="number" class="hidden" value="1">
                            <span id="tiempo_ingreso_warning" name="tiempo_ingreso_warning" class="text-red-500"></span>
                    </div>

                    <div class="grid md:w-4/5 xl:w-4/5 lg:w-1/2 justify-items-start">
                        <div class="flex w-full">
                            <label  class="font-roboto labels_index_coordinacion  m-0" for=""><b>Tiempo Egreso:</b></label>
                            <label class="text-red-500 m-0">*</label>
                        </div>
                            <select onchange="check_input(this.value,this.id,'tiempo_egreso_warning');check_inp_count_coordinacion('count_tiempo_egreso','tiempo_egreso');valida_selects_inps(this.id)" name="tiempo_egreso" id="tiempo_egreso" type="text" class="w-1/4 border-2 border-color-inps rounded-md p-1 my-1 font-roboto">
                                @switch($project_edit_coordinacion->tiempo_egreso)
                                    @case('0.00')
                                        <option selected value="0.0">0.0 hrs.</option>
                                        <option value="0.25">0.25 hrs.</option>
                                        <option value="0.5">0.5 hrs.</option>
                                        <option value="1.0">1.0 hrs.</option>
                                        <option value="1.5">1.5 hrs.</option>
                                        <option value="2.0">2.0 hrs.</option>
                                    @break

                                    @case('0.25')
                                        <option value="0.0">0.0 hrs.</option>
                                        <option selected value="0.25">0.25 hrs.</option>
                                        <option value="0.5">0.5 hrs.</option>
                                        <option value="1.0">1.0 hrs.</option>
                                        <option value="1.5">1.5 hrs.</option>
                                        <option value="2.0">2.0 hrs.</option>
                                    @break

                                    @case('0.50')
                                        <option value="0.0">0.0 hrs.</option>
                                        <option value="0.25">0.25 hrs.</option>
                                        <option selected value="0.5">0.5 hrs.</option>
                                        <option value="1.0">1.0 hrs.</option>
                                        <option value="1.5">1.5 hrs.</option>
                                        <option value="2.0">2.0 hrs.</option>
                                    @break

                                    @case('1.00')
                                        <option value="0.0">0.0 hrs.</option>
                                        <option value="0.25">0.25 hrs.</option>
                                        <option value="0.5">0.5 hrs.</option>
                                        <option selected value="1.0">1.0 hrs.</option>
                                        <option value="1.5">1.5 hrs.</option>
                                        <option value="2.0">2.0 hrs.</option>
                                    @break

                                    @case('1.50')
                                        <option value="0.0">0.0 hrs.</option>
                                        <option value="0.25">0.25 hrs.</option>
                                        <option value="0.5">0.5 hrs.</option>
                                        <option value="1.0">1.0 hrs.</option>
                                        <option selected value="1.5">1.5 hrs.</option>
                                        <option value="2.0">2.0 hrs.</option>
                                    @break

                                    @case('2.00')
                                        <option value="0.0">0.0 hrs.</option>
                                        <option value="0.25">0.25 hrs.</option>
                                        <option value="0.5">0.5 hrs.</option>
                                        <option value="1.0">1.0 hrs.</option>
                                        <option value="1.5">1.5 hrs.</option>
                                        <option selected value="2.0">2.0 hrs.</option>
                                    @break

                                    @default

                                    @endswitch
                            </select>

                            <input id="count_tiempo_egreso" name="count_tiempo_egreso" type="number" class="hidden" value="1">
                            <span id="tiempo_egreso_warning" name="tiempo_egreso_warning" class="text-red-500"></span>
                    </div>
                </div>

                <div class="grid justify-items-start h-full gap-y-1 w-1/2">

                    <div class="grid md:w-4/5 xl:w-4/5 lg:w-1/2 justify-items-start ">
                        <div class="flex w-full">
                            <label class="labels_index_coordinacion _mantenimiento  font-roboto font-bold text-left m-0" for=""><b>{{ __('mantenimiento.nombre_sitio') }}</b></label>
                            <label class="text-red-500 m-0">*</label>
                        </div>
                        <input value="{{ $project_edit_coordinacion->nombre_propiedad }}" onchange="check_input(this.value,this.id,'name_sitio_warning_mantenimiento');check_inp_count_coordinacion('count_name_sitio_mantenimiento','name_sitio_mantenimiento');valida_selects_inps(this.id);" name="name_sitio_mantenimiento" id="name_sitio_mantenimiento" type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto">
                        <input id="count_name_sitio_mantenimiento" name="count_name_sitio_mantenimiento" type="number" class="hidden" value="1">
                        <span id="name_sitio_warning_mantenimiento" name="name_sitio_warning_mantenimiento" class="text-red-500"></span>
                    </div>

                    <div class="flex md:w-4/5 xl:w-4/5 lg:w-1/2 justify-start gap-x-3">
                        <div class="grid w-full justify-items-start ">
                            <div class="flex w-full">
                                <label class="labels_index_coordinacion  font-roboto font-bold text-left m-0" for=""><b>Años Edificio:</b></label>
                                <label class="text-red-500 m-0">*</label>
                            </div>
                            <input value="{{ $project_edit_coordinacion->yrs_edificio }}" onkeypress="return soloNumeros(event)" value="0" onchange="check_input(this.value,this.id,'yrs_life_ed_warning_mantenimiento');no_cero(this.value,this.id);set_yrs_tarjet(this.value,'yrs_vida_mantenimiento');valida_selects_inps(this.id);" name="yrs_life_ed_mantenimiento" id="yrs_life_ed_mantenimiento" type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto">
                            <input id="count_yrs_life_ed_mantenimiento" name="count_yrs_life_ed_mantenimiento" type="number" class="hidden" value="1">
                            <span id="yrs_life_ed_warning_mantenimiento" name="yrs_life_ed_warning_mantenimiento" class="text-red-500"></span>
                        </div>

                        <div class="grid w-full justify-items-start">
                            <div class="flex w-full">
                                <label class="font-roboto labels_index_coordinacion  m-0" for=""><b>Ambiente:</b></label>
                                <label class="text-red-500 m-0">*</label>
                            </div>
                            <select onchange="check_input(this.value,this.id,'tipo_ambiente_warning_mantenimiento');check_inp_count_coordinacion('count_tipo_ambiente_mantenimiento','tipo_ambiente_coordinacion');valida_selects_inps(this.id);" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-robot" name="tipo_ambiente_coordinacion" id="tipo_ambiente_coordinacion">

                                @foreach ($factor_ambiente as $factor)
                                    @if ($project_edit_coordinacion->medio_ambiente == $factor->id)
                                        <option selected value="{{$factor->id}}">{{$factor->factor}}</option>
                                    @else
                                        <option value="{{$factor->id}}">{{$factor->factor}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input id="count_tipo_ambiente_mantenimiento" name="count_tipo_ambiente_mantenimiento" type="number" class="hidden" value="1">
                            <span id="tipo_ambiente_warning_mantenimiento" name="tipo_ambiente_warning_mantenimiento" class="text-red-500"></span>
                        </div>
                    </div>

                    <div class="flex md:w-4/5 xl:w-4/5 lg:w-1/2 justify-start gap-x-3">
                        <div class="grid md:w-4/5 xl:w-4/5 lg:w-1/2 justify-items-start ">
                            <div class="flex w-full">
                                <label class="labels_index_coordinacion  text-left font-roboto font-bold m-0" for=""><b>{{ __('mantenimiento.distancia_sitio') }}</b></label>
                                <label class="text-red-500 text-left m-0"></label>
                            </div>
                            <input onkeypress="return soloNumeros(event)" value="{{ $project_edit_coordinacion->distancia_sitio }} kms" onchange="check_input(this.value,this.id,'distancia_sitio_warning_mantenimiento');change_to(this.value,'kms',this.id);valida_selects_inps(this.id);" name="distancia_sitio_mantenimiento" id="distancia_sitio_mantenimiento" type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto">
                            <input id="count_distancia_sitio_mantenimiento" name="count_distancia_sitio_mantenimiento" type="number" class="hidden" value="1">
                            <span id="distancia_sitio_warning_mantenimiento" name="distancia_sitio_warning_mantenimiento" class="text-red-500"></span>
                        </div>

                        <div class="grid md:w-4/5 xl:w-4/5 lg:w-1/2 justify-items-start ">
                            <div class="flex w-full">
                                <label class="labels_index_coordinacion  font-roboto font-bold text-left m-0" for=""><b>Velocidad:</b></label>
                                <label class="text-red-500 m-0">*</label>
                            </div>
                            <select onchange="check_input(this.value,this.id,'velocidad_promedio_warning_mantenimiento');check_inp_count_coordinacion('count_velocidad_promedio_mantenimiento','velocidad_promedio_mantenimiento');valida_selects_inps(this.id);" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto" name="velocidad_promedio_mantenimiento" id="velocidad_promedio_mantenimiento">
                                @for ($i = 0; $i <= 120; $i = $i + 10)
                                @if ($project_edit_coordinacion->velocidad == $i)
                                    <option selected value="{{$i}}">{{$i}} Km/h</option>
                                @else
                                    <option  value="{{$i}}">{{$i}} Km/h</option>
                                @endif
                            @endfor
                            </select>
                            <input id="count_velocidad_promedio_mantenimiento" name="count_velocidad_promedio_mantenimiento" type="number" class="hidden" value="1">
                            <span id="velocidad_promedio_warning_mantenimiento" name="velocidad_promedio_warning_mantenimiento" class="text-red-500"></span>
                        </div>
                    </div>

                    <div class="flex md:w-4/5 xl:w-4/5 lg:w-1/2 justify-start gap-x-3">
                        <div class="grid md:w-4/5 xl:w-4/5 lg:w-1/2 justify-items-start">
                            <div class="flex w-full">
                                <label  class="font-roboto text-md  m-0" for=""><b>Valor Contrato:</b></label>
                                <label class="text-red-500 m-0">*</label>
                            </div>
                                <input value="${{ number_format($project_edit_coordinacion->valor_contrato) }}" onchange="check_input(this.value,this.id,'valor_contrato_warning');check_inp_count_coordinacion('count_valor_contrato','valor_contrato');valida_selects_inps(this.id);format_num(this.value,this.id);set_val_to_fact(this.value,'facturacion_ventas');" onkeypress="return soloNumeros(event)" name="valor_contrato" id="valor_contrato" type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto">
                                <input id="count_valor_contrato" name="count_valor_contrato" type="number" class="hidden" value="1">
                                <span id="valor_contrato_warning" name="valor_contrato_warning" class="text-red-500"></span>
                        </div>

                        <div class="grid  md:w-4/5 xl:w-4/5 lg:w-1/2 justify-items-start">
                            <div class="flex w-full">
                                <label  class="font-roboto text-left labels_index_coordinacion  m-0" for=""><b>Escalación:</b></label>
                                <label class="text-red-500 m-0"></label>
                            </div>
                            <div class="flex w-full">

                                <input value="{{ number_format($project_edit_coordinacion->escalacion) }}%" type="text" onkeypress="return soloNumeros(event)" onchange="change_to_porcent_mantenimiento(this.value,this.id);check_inp_count_coordinacion('count_inflacion','inflacion');" class="w-1/2 border-2 border-color-inps rounded-md p-1 my-1 font-roboto text-center" name="inflacion" id="inflacion">
                                <input id="count_inflacion" name="count_inflacion" type="number" class="hidden" value="1">

                            </div>
                            <span id="inflacion_warning" name="inflacion_warning" class="text-red-500"></span>
                        </div>

                    </div>

                    <div class="flex md:w-4/5 xl:w-4/5 lg:w-1/2 justify-start gap-x-3">

                        <div class="grid md:w-4/5 xl:w-4/5 lg:w-1/2 justify-items-start">
                            <div class="flex w-full">
                                <label  class="font-roboto labels_index_coordinacion  m-0" for=""><b>Personal:</b></label>
                                <label class="text-red-500 m-0">*</label>
                            </div>
                                <select name="personal_enviado_mantenimiento"  id="personal_enviado_mantenimiento" onchange="check_input(this.value,this.id,'personal_enviado_mantenimiento_warning');check_inp_count_coordinacion('count_personal_enviado','personal_enviado_mantenimiento');valida_selects_inps(this.id);send_value_personal_coordinacion(this.value,'personal_enviado_coordinacion');" class="w-3/4 border-2 border-color-inps  rounded-md p-1 my-1 font-roboto">
                                    @if ($project_edit_coordinacion->personal == 'tecnico')
                                    <option selected value="tecnico">{{ __('mantenimiento.tecnico') }}</option>
                                    <option value="tecnico_ayudante">{{ __('mantenimiento.tecnico_ayudante') }}</option>
                                    @endif

                                    @if ($project_edit_coordinacion->personal == 'tecnico_ayudante')
                                        <option  value="tecnico">{{ __('mantenimiento.tecnico') }}</option>
                                        <option selected value="tecnico_ayudante">{{ __('mantenimiento.tecnico_ayudante') }}</option>
                                    @endif
                                </select>
                                <input id="count_personal_enviado_mantenimiento" name="count_personal_enviado_mantenimiento" type="number" class="hidden" value="1">
                                <span id="personal_enviado_mantenimiento_warning" name="personal_enviado_mantenimiento_warning" class="text-red-500"></span>
                        </div>

                    </div>




                        @include('modal_energia_hvac')





                </div>
            </div>
        </div>

        </div>



<div style="width:16%" class="col-6 mx-1 xl:ml-0 lg:ml-0 md:ml-0 lg:sm-0 ">


        <div style="margin-top:193px;" class="w-full">

        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="w-full grid justify-items-center gap-y-1">

            {{-- <div id="div_next_h_mantenimiento" name="div_next_h_mantenimiento" style="width: 80%;" class="">
                <button  type="button"  id="next_h_mantenimiento" name="next_h_mantenimiento"
                    x-show="step < 2"
                    onclick="valida_formulario_coordinacion();"
                    style="background-color:#1B17BB;"
                    class="w-full focus:outline-none border border-transparent py-4 px-7 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                >{{ __('index.siguiente') }}</button>
            </div> --}}

            <div id="div_next_mantenimiento" name="div_next_mantenimiento" style="width: 80%;" class="">
                <button  type="button"  id="next_mantenimiento" name="next_mantenimiento"
                    x-show="step < 2"
                    @click="step++"
                    onclick="setValContratoSPV({{ $project_edit_coordinacion->valor_contrato }});calculateSpendVentas($('#valor_contrato').val());"
                    style="background-color:#1B17BB;"
                    class="w-full focus:outline-none border border-transparent py-4 px-7 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                >{{ __('index.siguiente') }}</button>
            </div>

            <div id="div_atras_mant" name="div_atras_mant" style="width: 80%;" class="">
                <button  type="button"  id="next_h_mant" name="next_h_mant"
                    x-show="step < 2"
                     onclick="back_home();"
                    class="w-full focus:outline-none bg-gray-500 border-2 border-color-inps py-4 px-7 rounded-lg shadow-sm text-center text-white hover:bg-gray-800 text-xl font-roboto"
                >{{ __('index.inicio') }}</button>
            </div>
        </div>

</div>
<script>

/* function getValsform(){

        $.ajax({
                url: '/get_vals_form_coordinacion/'+'{{$id_project}}',
                type: 'get',
                success: function(response) {
                    $('#cliente_pro_mantenimiento').val(response.cliente_prospecto);
                    $("#cat_edi_mantenimiento").find('option[value="' + response.id_cat_edifico + '"]').prop("selected", "selected");


                },
                error: function(xhr, status, error) {
                console.error('Error al enviar los datos:', error);
                }
        });
} */

function valida_formulario_coordinacion(){

            // Validación de campos
            let count_inps = 0;

            const fields = [
                'cliente_pro_mantenimiento',
                'cat_edi_mantenimiento',
                'ocupacion_semanal_mantenimiento',
                'tiempo_ingreso',
                'tiempo_egreso',
                'name_sitio_mantenimiento',
                'yrs_life_ed_mantenimiento',
                'tipo_ambiente_mantenimiento',
                'distancia_sitio_mantenimiento',
                'velocidad_promedio_mantenimiento',
                'valor_contrato',
                'inflacion',
                'personal_enviado_mantenimiento',
            ];

            fields.forEach(field => {
                const element = document.getElementById(field);
                if (!element.value || element.value === '0' || element.value === '') {
                    element.style.borderColor = 'red';
                    count_inps++;
                } else {
                    element.style.borderColor = '#d1d5db';
                }
            });

            if (count_inps === 0) {
                document.getElementById('div_next_h_mantenimiento').classList.add('hidden');
                document.getElementById('div_next_mantenimiento').classList.remove('hidden');
            }
        }


  function check_inp_count_coordinacion(count_id,id){
        var inp = $("#"+id).val();
        var inp_cont = $("#"+count_id);
        var suma_inps = 0;


        if(inp == "" || inp == 0){
             if(id == 'paises'){
                 $('#count_ciudad').val(0);
             }
         inp_cont.val(0);
        }

        if(inp != "" && inp != 0){
             inp_cont.val(1);

        }

        checksuma_coor();

     }

     function checksuma_coor(){
        count_cliente_pro_mantenimiento = $('#count_cliente_pro_mantenimiento').val();
        count_cat_edi_mantenimiento = $('#count_cat_edi_mantenimiento').val();
        count_ocupacion_semanal_mantenimiento = $('#count_ocupacion_semanal_mantenimiento').val();
        count_name_sitio_mantenimiento = $('#count_name_sitio_mantenimiento').val();
        count_tipo_ambiente_mantenimiento = $('#count_tipo_ambiente_mantenimiento').val();
        count_velocidad_promedio_mantenimiento = $('#count_velocidad_promedio_mantenimiento').val();
        count_valor_contrato = $('#count_valor_contrato').val();
        count_inflacion = $('#count_inflacion').val();
        count_personal_enviado_mantenimiento = $('#count_personal_enviado_mantenimiento').val();


       suma_inps = parseInt(count_cliente_pro_mantenimiento) + parseInt(count_cat_edi_mantenimiento) + parseInt(count_ocupacion_semanal_mantenimiento) + parseInt(count_name_sitio_mantenimiento) + parseInt(count_tipo_ambiente_mantenimiento) + parseInt(count_velocidad_promedio_mantenimiento) + parseInt(count_valor_contrato) + parseInt(count_inflacion) + parseInt(count_personal_enviado_mantenimiento);

       if(suma_inps == 8){
        $('#div_next_mantenimiento').removeClass("hidden");
        $('#div_next_h_mantenimiento').addClass("hidden");

       }

       if(suma_inps < 8){
        $('#div_next_mantenimiento').addClass("hidden");
        $('#div_next_h_mantenimiento').removeClass("hidden");

       }

    }

    function back_home(){
        window.location.href = "/home";
    }
</script>
