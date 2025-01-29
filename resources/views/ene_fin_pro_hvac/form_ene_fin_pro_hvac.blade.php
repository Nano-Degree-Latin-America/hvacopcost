<div class="col-4 ml-5 xl:ml-0 lg:ml-0 md:ml-0 lg:sm-0 ">
    {{-- <ul style="padding-bottom: 60px; text-align: justify; font-size: 15px; font-style: italic; font-weight: 400">
        <li>Horas de Enfriamiento por Región y Ciudad de Latin América </li>
        <li>Comparador de Sistemas de Enfriamiento </li>
        <li>Comparador de Eficiencia de Sistemas HVAC</li>
        <li>Comparador de Tipos de Sistemas de HVAC</li>
        <li>Comparador de Diferentes Tipos de Diseño en Sistemas de HVAC</li>
        <li>Comparador de Diferentes Tipos de Mantenimientos de Sistemas de HVAC</li>
        <li>Calculo de Costo Operativo Anual por Sistema </li>
        <li>Comparador Financiero de Sistemas de HVAC</li>
        <li>Calculo de Ahorro Financiero Acumulado del Sistema Propuesto</li>
        <li>Análisis de ROI por Sistema Propuesto  de HVAC</li>
    </ul> --}}
    {{-- <div class="contenedor pb-15">
        <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
            <button class="botonF1 mt-8">
                Cerrar Sesión
                </button>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>


         </div> --}}

            <div class="my-5">
                <label style=" text-shadow: 2px 2px 4px #a9a9b9 ;" class="title_index font-roboto drop-shadow-lg font-bold leading-tight" for="">{{ __('index.análisis energético y financiero') }} <br> {{ __('index.de sistemas HVAC') }} <p id="type_project_name" name="type_project_name"></p></label>
            </div>
         <div class="w-full {{-- rounded-xl border-2 border-blue-500 --}} mt-1">

            <div class="flex w-full gap-x-10 my-1 mx-1 justify-center">

                <div class="grid justify-items-end h-full gap-y-3 w-1/2">

                        <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                <div class="flex w-full">
                                    <label  class="labels_index font-roboto font-bold text-left" for=""><b>{{ __('index.nombre projecto') }}</b></label><label class="text-red-500">*</label>
                                </div>
                            <input onchange="check_input(this.value,this.id,'name_warning');check_inp_count('count_name_pro','name_pro');" name="name_pro" id="name_pro" type="text" style="font-size: 14px;" class="w-full border-2  border-color-inps rounded-md p-1 my-1 font-roboto" >
                            <input id="count_name_pro" name="count_name_pro" type="number" class="hidden" value="0">
                            <span id="name_warning" name="name_warning" class="text-red-500"></span>
                        </div>


                         <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                            <div class="flex w-full">
                                <label class="labels_index font-roboto text-left" for=""><b>{{ __('index.region') }}</b></label><label class="text-red-500">*</label>
                            </div>


                                @include('index_elements.select_paises')


                            <input id="count_paises" name="count_paises" type="number" class="hidden" value="0">
                            <span id="paises_warning" name="paises_warning" class="text-red-500"></span>
                        </div>

                        <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                            <div class="flex w-full">
                                <label  class="labels_index text-left font-roboto" for=""><b>{{ __('index.ciudad') }}</b></label><label class="text-red-500">*</label>
                            </div>
                            <select onchange="check_input(this.value,this.id,'ciudad_warning');check_inp_count('count_ciudades','ciudades');" class=" w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto"  name="ciudades" id="ciudades">
                                <option value="0">-{{ __('index.selecciona tu ciudad') }}-</option>
                            </select>
                            <input id="count_ciudades" name="count_ciudades" type="number" class="hidden" value="0" >
                            <span id="ciudades_warning" name="ciudades_warning" class="text-red-500"></span>
                        </div>

                        <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                            <div class="flex w-full">
                                <label  class="labels_index text-left font-roboto font-bold text-left" for=""><b>{{ __('index.incremento anual energia') }}</b></label><label class="text-red-500 text-left"></label>
                            </div>
{{--                                                     <input onkeypress="return soloNumeros(event)" onchange="check_input(this.value,this.id,'inc_ene_warning');" name="inc_ene" id="inc_ene" type="text" style="font-size: 14px;" class="w-full border-2  border-color-inps rounded-md p-1 my-1 font-roboto" >
--}}                         <select  onchange="check_input(this.value,this.id,'inc_ene_warning');" class="w-1/2 border-2 border-color-inps rounded-md p-1 my-1 font-roboto" name="inc_ene" id="inc_ene">
                                    @for ($i = 0; $i <= 15; $i++)
                                    <option value="{{$i}}">{{$i}}%</option>
                                    @endfor
                                </select>
                            <span id="inc_ene_warning" name="inc_ene_warning" class="text-red-500"></span>
                        </div>

                        <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                            <div class="flex w-full">
                                <label  class="labels_index font-roboto font-bold text-left" for=""><b>{{ __('index.inflacion anual') }}:</b></label><label class="text-red-500">*</label>
                            </div>
{{--                                                     <input onkeypress="return soloNumeros(event)" onchange="check_input(this.value,this.id,'inc_ene_warning');" name="inc_ene" id="inc_ene" type="text" style="font-size: 14px;" class="w-full border-2  border-color-inps rounded-md p-1 my-1 font-roboto" >
--}}                                                    <select  onchange="check_input(this.value,this.id,'inc_ene_warning');" class="w-1/2 border-2 border-color-inps rounded-md p-1 my-1 font-roboto" name="inflation_rate" id="inflation_rate">
                                    @for ($i = 0; $i <= 15; $i++)
                                    <option value="{{$i}}">{{$i}}%</option>
                                    @endfor
                                </select>
                        <span id="inflation_rate_warning" name="inflation_rate_warning" class="text-red-500"></span>
                        </div>





                </div>

                <div class="grid justify-items-start h-full gap-y-3 w-1/2">

                    <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                        <div class="flex w-full">
                            <label  class="font-roboto labels_index  text-left" for=""><b>{{ __('index.categoria edificio') }}</b></label></label><label class="text-red-500">*</label>
                        </div>
                        <select  name="cat_ed" id="cat_ed" onchange="traer_t_edif(this.value,'tipo_edificio','{{App::getLocale()}}');check_input(this.value,this.id,'cat_ed_warning');check_inp_count('count_cat_ed','cat_ed');"  class="w-full font-roboto border-2 border-color-inps rounded-md p-1 my-1">
                        <option value="0">-{{ __('index.seleccionar') }}-</option>
                        </select>
                        <input id="count_cat_ed" name="count_cat_ed" type="number" class="hidden" value="0">
                        <span id="cat_ed_warning" name="cat_ed_warning" class="text-red-500"></span>
                    </div>
{{--  --}}
                    <div class="flex w-full gap-x-4">
                        <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                            <div class="flex w-full">
                                <label  class="font-roboto labels_index" for=""><b>{{ __('index.tipo edificio') }}:</b></label><label class="text-red-500">*</label>
                            </div>
                                <select onchange="check_input(this.value,this.id,'tipo_Edificio_warning');check_inp_count('count_tipo_edificio','tipo_edificio');" class="w-full border-2 border-color-inps  rounded-md p-1 my-1 font-roboto" name="tipo_edificio"  id="tipo_edificio">
                                    <option value="0">-{{ __('index.seleccionar') }}-</option>
                                </select>
                                <input id="count_tipo_edificio" name="count_tipo_edificio" type="number" class="hidden" value="0">
                                <span id="tipo_Edificio_warning" name="tipo_Edificio_warning" class="text-red-500"></span>
                        </div>



                    </div>

                    <div class="flex  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-start gap-x-3">
                        <div class="grid w-1/2 justify-items-start">
                                <div class="flex w-full">
                                    <label  class="font-roboto labels_index" for=""><b>{{ __('index.area') }}:</b></label><label class="text-red-500">*</label>
                                </div>
                                <input onchange="check_input(this.value,this.id,'ar_project_warning');format_nums_no_$(this.value,this.id);check_inp_count('count_ar_project','ar_project');"  name="ar_project" id="ar_project"  onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto text-center" >
                                <input id="count_ar_project" name="count_ar_project" type="number" class="hidden" value="0">
                                <span id="ar_project_warning" name="ar_project_warning" class="text-red-500"></span>
                        </div>

                    <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                            <div class="flex">
                                <div>
                                        <div class="flex w-full">
                                            <label  class="font-roboto labels_index" for=""><b>{{ __('index.unidad') }}:</b></label><label class="text-red-500">*</label>
                                        </div>
                                        <div class="flex gap-x-3 mt-3">
                                        <div class="flex">
                                            <input  id="check_mc"  onclick="check_unidad('mc');" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="check_mc" class="ml-2 unit_style font-medium text-gray-900 dark:text-gray-300 font-roboto">m²</label>
                                        </div>

                                        <div class="flex">
                                            <input  id="check_ft"  onclick="check_unidad('ft');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="check_ft"   class="ml-2 unit_style font-medium text-gray-900 dark:text-gray-300 font-roboto">ft²</label>
                                        </div>
                                        </div>

                                </div>
                            </div>
                            <input type="text" style="font-size: 14px;" class="hidden w-full border-2 border-color-inps rounded-xl"  name="unidad" id="unidad" value="0">
                            <input id="count_unidad" name="count_unidad" type="number" class="hidden" value="0">

                        {{-- <input type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-xl"  name="nombre_projecto" id="nombre_projecto"> --}}
                        </div>
                    </div>


                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                            <div class="flex w-full justify-start">
                                <label  class="font-roboto font-bold text-left labels_index" for=""><b>{{ __('index.ocupacion semanal') }}</b></label><label class="text-red-500">*</label>
                            </div>
{{--                                                     <input onchange="check_input(this.value,this.id,'tiempo_porcent_warning');"  name="tiempo_porcent"  id="tiempo_porcent" type="text" style="font-size: 14px;" class="w-full border-2  border-color-inps rounded-md p-1 my-1 font-roboto" >
--}}

                                    <select onchange="check_input(this.value,this.id,'tiempo_porcent_warning');check_inp_count('count_tiempo_porcent','tiempo_porcent');" class=" w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto" name="tiempo_porcent" id="tiempo_porcent">
                                        <option value="">-{{ __('index.seleccionar horas') }}-</option>
                                        <option value="m_50">{{ __('index.menos de 50 hrs') }}.</option>
                                        <option value="51_167 ">{{ __('index.51 a 167 hrs') }}.</option>
                                        <option value="168">{{ __('index.168 hrs') }}.</option>
                                    </select>

                            <input id="count_tiempo_porcent" name="count_tiempo_porcent" type="number" class="hidden" value="0">
                            <span id="tiempo_porcent_warning" name="tiempo_porcent_warning" class="text-red-500"></span>
                    </div>
                    @include('modal_energia_hvac')

                    <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                        <div class="flex w-full">
                            <label  class="font-roboto text-left labels_index" for=""><b>{{ __('index.energia hvac en el edificio') }}:</b></label><label class="text-red-500">*</label>
                        </div>
                        <div class="flex w-full">
                           {{--  <select onchange="buton_check('{{App::getLocale()}}');check_input(this.value,this.id,'por_hvac_warning');check_inp_count('count_porcent_hvac','porcent_hvac');" class=" w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto" name="porcent_hvac" id="porcent_hvac">
                                <option value="0">-{{ __('index.selecciona porcentaje') }}-</option>
                            </select> --}}
                            <input type="text" onkeypress="return soloNumeros(event)" onchange="buton_check('{{App::getLocale()}}');check_input(this.value,this.id,'por_hvac_warning');check_inp_count('count_porcent_hvac','porcent_hvac');change_to_porcent(this.value);" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto text-center" name="porcent_hvac" id="porcent_hvac">
                            <input id="count_porcent_hvac" name="count_porcent_hvac" type="number" class="hidden" value="0">
                            <div class="ml-2" style="margin-top: 5.5px;">
                                <a onclick="mostrar_modal_energia_hvac('modal_energia_hvac');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                            </div>
                        </div>
                        <span id="por_hvac_warning" name="por_hvac_warning" class="text-red-500"></span>
                    </div>




                </div>


            </div>
            @include('modal_analisis_prod')
            <div class="flex justify-center w-2/3 mt-8">
                <label style="color:#1B17BB;margin-top:2px;" class="text-2xl font-roboto  font-bold" for="">Análisis de Productividad Laboral</label>
                <div class="ml-2" style="">
                    <a onclick="mostrar_modal('modal_analisis_prod');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                </div>
            </div>
            <div class="flex w-full gap-x-10 my-2 mx-1 justify-center">

                <div class="grid justify-items-end h-full gap-y-3 w-1/2">

                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                        <div class="flex w-full">
                            <label  class="labels_index font-roboto font-bold text-left" for=""><b>{{ __('index.n_empleados') }}:</b></label><label class="text-red-500"></label>
                        </div>
                    <input onkeypress="return soloNumeros(event)" onchange="check_input(this.value,this.id,'n_empleados_warning');format_nums_no_$(this.value,this.id);" name="n_empleados" id="n_empleados" type="text" style="font-size: 14px;" class="w-1/2 border-2  border-color-inps rounded-md p-1 my-1 font-roboto text-center" >

                    <span id="n_empleados_warning" name="n_empleados_warning" class="text-red-500"></span>
                    </div>


                </div>

                <div class="grid justify-items-start h-full gap-y-3 w-1/2">
                    <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                        <div class="flex w-full">
                            <label  class="font-roboto text-left labels_index" for=""><b>{{ __('index.sal_an_prom') }}:</b></label><label class="text-red-500"></label>
                        </div>
                        <div class="flex w-full">

                            <input type="text" onkeypress="return soloNumeros(event)" onchange="format_num(this.value,this.id);" class="w-1/2 border-2 border-color-inps rounded-md p-1 my-1 font-roboto text-center" name="sal_an_prom" id="sal_an_prom">
                            <input id="count_sal_an_prom" name="count_sal_an_prom" type="number" class="hidden" value="0">

                        </div>
                        <span id="sal_an_prom_warning" name="sal_an_prom_warning" class="text-red-500"></span>
                    </div>
                </div>


            </div>


        </div>





</div>


<div class="col-3 mx-1 xl:ml-0 lg:ml-0 md:ml-0 lg:sm-0 ">
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
    <div class="w-full grid justify-items-start gap-y-2">
        <div id="div_next" name="div_next" style="width: 80%;" class="">
            <button type="button"  id="next" name="next"
                onclick="buton_check('{{App::getLocale()}}');"
                style="background-color:#1B17BB;"
                class="w-full py-4 px-7 rounded-lg shadow-sm text-center text-white hover_button_blue text-xl font-roboto"
            >{{ __('index.siguiente') }}</button>
        </div>
        <div id="div_next_h" name="div_next_h" style="width: 80%;" class="">
                <button  type="button"  id="next_h" name="next_h"
                    x-show="step < 2"
                    @click="step++"
                    style="background-color:#1B17BB;"
                    class="w-full py-4 px-7 rounded-lg shadow-sm text-center text-white hover_button_blue text-xl font-roboto"
                >{{ __('index.siguiente') }}</button>
        </div>
        <div id="div_inicio" name="div_inicio" style="width: 80%;" class="">
            <button  type="button"  id="inicio" name="inicio"
                x-show="step < 2"

                onclick="back_begin();"
                class="w-full focus:outline-none bg-gray-500 border-2 border-color-inps py-4 px-7 rounded-lg shadow-sm text-center text-white hover:bg-gray-800 text-xl font-roboto"
            >{{ __('index.inicio') }}</button>
        </div>
    </div>
</div>

{{-- <div class="col-6 mx-1 xl:ml-0 lg:ml-0 md:ml-0 lg:sm-0 ">
    <div class="grid gap-y-3 type_proy_pos">


        @if ( $check_types_pn == 1 &&  $check_types_pr == 1 &&  $check_types_m == 1)
        <div class="flex">
            <input class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" type="checkbox"  checked class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto nuevo') }}</label>
        </div>

        <div class="flex">
            <input class="check_style" id="pr" type="checkbox"  onclick="check_form_proy('pr','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto retrofit') }}</label>
        </div>

        <div class="flex ">
            <input disabled class="check_style" id="man" type="checkbox"  onclick="check_form_proy('man','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
        </div>
        @endif

        @if ( $check_types_pn == 1 &&  $check_types_pr == 0 &&  $check_types_m == 0)
        <div class="flex">
            <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" type="checkbox"  checked class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto nuevo') }}</label>
        </div>

        <div class="flex">
            <input disabled class="check_style" id="pr" type="checkbox"  onclick="check_form_proy('pr','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto retrofit') }}</label>
        </div>

        <div class="flex">
            <input disabled class="check_style" id="man" type="checkbox"  onclick="check_form_proy('man','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
        </div>
        @endif

        @if ( $check_types_pn == 0 &&  $check_types_pr == 1 &&  $check_types_m == 0)
        <div class="flex">
            <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" type="checkbox"   class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto nuevo') }}</label>
        </div>

        <div class="flex">
            <input disabled class="check_style" id="pr" type="checkbox"  onclick="check_form_proy('pr','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" checked class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto retrofit') }}</label>
        </div>

        <div class="flex ">
            <input disabled class="check_style" id="man" type="checkbox"  onclick="check_form_proy('man','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
        </div>
        @endif

        @if ( $check_types_pn == 0 &&  $check_types_pr == 0 &&  $check_types_m == 1)
        <div class="flex">
            <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" type="checkbox"   class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto nuevo') }}</label>
        </div>

        <div class="flex">
            <input disabled class="check_style" id="pr" type="checkbox"  onclick="check_form_proy('pr','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto retrofit') }}</label>
        </div>

        <div class="flex ">
            <input disabled class="check_style" id="man" type="checkbox"  onclick="check_form_proy('man','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" checked class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
        </div>
        @endif

        @if ( $check_types_pn == 0 &&  $check_types_pr == 1 &&  $check_types_m == 1)
        <div class="flex">
            <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" type="checkbox"   class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto nuevo') }}</label>
        </div>

        <div class="flex">
            <input  class="check_style" id="pr" type="checkbox"  onclick="check_form_proy('pr','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" checked class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto retrofit') }}</label>
        </div>

        <div class="flex ">
            <input disabled class="check_style" id="man" type="checkbox"  onclick="check_form_proy('man','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
        </div>
        @endif

        @if ( $check_types_pn == 1 &&  $check_types_pr == 1 &&  $check_types_m == 0)
        <div class="flex">
            <input  class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" type="checkbox" checked  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto nuevo') }}</label>
        </div>

        <div class="flex">
            <input  class="check_style" id="pr" type="checkbox"  onclick="check_form_proy('pr','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto retrofit') }}</label>
        </div>

        <div class="flex ">
            <input disabled class="check_style" id="man" type="checkbox"  onclick="check_form_proy('man','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
        </div>
        @endif

        @if ( $check_types_pn == 1 &&  $check_types_pr == 0 &&  $check_types_m == 1)
        <div class="flex">
            <input  class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" type="checkbox" checked  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto nuevo') }}</label>
        </div>

        <div class="flex">
            <input disabled class="check_style" id="pr" type="checkbox"  onclick="check_form_proy('pr','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto retrofit') }}</label>
        </div>

        <div class="flex ">
            <input disabled class="check_style" id="man" type="checkbox"  onclick="check_form_proy('man','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
        </div>
        @endif

        @if ( !$check_types_pn && !$check_types_pr && !$check_types_m)
        <?php  $check_types_pn = 0?>
        <?php  $check_types_pr = 0?>
        <div class="flex">
            <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" type="checkbox"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto nuevo') }}</label>
        </div>

        <div class="flex">
            <input disabled class="check_style" id="pr" type="checkbox"  onclick="check_form_proy('pr','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto retrofit') }}</label>
        </div>

        <div class="flex ">
            <input disabled class="check_style" id="man" type="checkbox"  onclick="check_form_proy('man','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
        </div>
        @endif

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
        <div class="w-full flex justify-start">
            <div id="div_next" name="div_next" style="width: 80%;" class="">
                <button type="button"  id="next" name="next"
                    onclick="buton_check('{{App::getLocale()}}');"
                    style="background-color:#1B17BB;"
                    class="w-full focus:outline-none border border-transparent py-4 px-7 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                >{{ __('index.siguiente') }}</button>
            </div>
            <div id="div_next_h" name="div_next_h" style="width: 80%;" class="">
                    <button  type="button"  id="next_h" name="next_h"
                        x-show="step < 2"
                        @click="step++"
                        style="background-color:#1B17BB;"
                        class="w-full focus:outline-none border border-transparent py-4 px-7 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                    >{{ __('index.siguiente') }}</button>
            </div>
        </div>

</div> --}}

