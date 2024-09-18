<div class=" xl:ml-5 col-6">
    <h2 id="lblMapa">{{-- Da Clic en el Mapa --}}</h2>
<img  class="mapa_img" style="margin-top:100px;" src="{{asset('assets\images\mapa-azul_1.png')}}" alt="" usemap="#mapa" {{-- onClick="cambiarLblMapa('Mapa')" --}}>
<map class="w-full" name="mapa">
    {{-- <area shape="polygon" coords="2,3, 67,5, 98,19, 121,43, 129,81, 174,65, 150,91, 139,112, 78,93, 29,54, 8,27" onclick="getCiudades(17); cambiarLblMapa('México')" alt="México">
    <area shape="polygon" coords="144,108, 155,96, 155,89, 175,84, 232,133, 216,150, 179,131, 171,117" onclick="getCiudades(28); cambiarLblMapa('Centro América')" alt="Centro América">
    <area shape="polygon" coords="187,59,210,55,237,66,272,76,302,83,302,91,260,95,226,92" onclick="getCiudades(27); cambiarLblMapa('Caribe')" alt="Caribe">
    <area shape="polygon" coords="227,142,234,139,244,126,258,120,256,128,253,136,258,142,266,146,272,148,279,152,285,151,285,158,285,167,280,171,274,173,271,182,273,193,256,193,241,181,233,179,224,173" onclick="getCiudades(5); cambiarLblMapa('Colombia')" alt="Colombia">
    <area shape="polygon" coords="223,175,229,179,237,179,241,185,236,192,227,196,222,203,214,202,210,192,213,179" onclick="getCiudades(8); cambiarLblMapa('Ecuador')"  alt="Ecuador">
    <area shape="polygon" coords="270,274,277,265,275,257,278,247,276,238,268,236,256,229,249,219,256,207,269,200,267,193,257,194,244,183,235,194,228,197,225,203,209,204,215,216,236,254,249,264" onclick="getCiudades(21); cambiarLblMapa('Perú')"  alt="Perú">
    <area shape="polygon" coords="278,237,287,237,299,231,301,240,309,246,327,255,329,265,339,267,340,282,333,281,319,282,315,295,306,295,297,294,288,297,283,282,279,270" onclick="getCiudades(2); cambiarLblMapa('Bolivia')"  alt="Bolivia">
    <area shape="polygon" coords="275,273,270,278,268,304,262,335,262,346,261,364,250,388,241,451,243,491,256,508,281,516,276,496,260,492,253,482,252,471,259,462,263,442,260,424,260,403,265,395,264,382,270,376,271,365,270,353,272,342,274,335,279,324,281,312,287,305,290,299,283,296" onclick="getCiudades(4); cambiarLblMapa('Chile')"  alt="Chile">
    <area shape="polygon" coords="319,307,314,297,307,300,297,296,292,300,289,307,283,311,283,320,278,331,274,346,273,365,272,376,266,386,266,403,262,408,263,430,264,441,260,464,255,470,261,485,281,493,280,479,297,462,298,449,292,447,298,436,309,423,318,411,327,397,346,389,352,378,339,365,341,343,351,331,336,327,340,314" onclick="getCiudades(1); cambiarLblMapa('Argentina')"  alt="Argentina">
    <area shape="polygon" coords="341,365,342,356,345,344,356,349,363,352,369,358,369,366,360,372,349,370" onclick="getCiudades(25); cambiarLblMapa('Uruguay')"  alt="Uruguay">
    <area shape="polygon" coords="373,355,361,348,351,344,351,335,364,325,369,320,363,313,358,302,351,296,343,296,343,279,345,271,339,264,328,255,301,236,292,230,280,236,269,236,270,229,261,229,254,220,263,205,273,202,276,185,289,176,303,176,310,171,318,159,332,159,331,169,335,174,347,172,373,171,380,160,403,184,451,196,478,216,471,233,451,253,451,278,432,302,421,303,398,316,396,333,386,347" onclick="getCiudades(3); cambiarLblMapa('Brasil')"  alt="Brasil">
    <area shape="polygon" coords="340,324,348,326,356,325,361,316,360,307,354,302,349,297,342,297,340,285,332,281,321,283,318,291,316,296,322,299,326,303,333,308,345,313" onclick="getCiudades(19); cambiarLblMapa('Paraguay')"  alt="Paraguay">
    <area shape="polygon" coords="266,119,260,123,256,131,260,136,261,142,274,145,279,148,289,148,291,171,301,172,308,167,304,159,314,158,324,154,333,157,334,166,343,170,358,168,374,166,375,156,349,149,326,133,313,126,292,126" onclick="getCiudades(26); cambiarLblMapa('Venezuela/Guyana/Suniam')"  alt="Venezuela"> --}}
</map>
</div>
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
         <form action="{{route('resultados')}}" novalidate method="POST" name="formulario" id="formulario" files="true" enctype="multipart/form-data">
            @csrf
            <div class="my-8">
                <label style=" text-shadow: 2px 2px 4px #a9a9b9 ;" class="title_index font-roboto drop-shadow-lg font-bold leading-tight" for="">{{ __('index.análisis energético y financiero') }} <br> {{ __('index.de sistemas HVAC') }}</label>
            </div>
         <div class="w-full {{-- rounded-xl border-2 border-blue-500 --}} mt-2">
            <input type="text" name="idioma" id="idioma" value="{{$idm}}" class="hidden">
            <input type="number" class="hidden" id="type_p" name="type_p">
            <div class="flex w-full gap-x-10 my-2 mx-1 justify-center">

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
                            <select onchange="check_input(this.value,this.id,'ciudad_warning');check_inp_count('count_ciudad','ciudades');" class=" w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto"  name="ciudades" id="ciudades">
                                <option value="0">-{{ __('index.selecciona tu ciudad') }}-</option>
                            </select>
                            <input id="count_ciudad" name="count_ciudad" type="number" class="hidden" value="0" >
                            <span id="ciudad_warning" name="ciudad_warning" class="text-red-500"></span>
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
                        <select  name="cat_ed" id="cat_ed" onchange="traer_t_edif(this.value,'{{App::getLocale()}}');check_input(this.value,this.id,'cat_ed_warning');check_inp_count('count_cat_ed','cat_ed');"  class="w-full font-roboto border-2 border-color-inps rounded-md p-1 my-1">
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

     {{-- <div class="bullets">
       <h2><i class="far fa-snowflake"></i> Consulta</h2>
        <div>
            <span><i class="fas fa-check"></i> Horas de Enfriamiento por Región y Ciudad en Latin America</span>
            <span><i class="fas fa-check"></i> Análisis ROI por Sistema Propuesto HVAC</span>
        </div>
        <h2><i class="far fa-snowflake"></i> Calcula</h2>
        <div>
            <span><i class="fas fa-check"></i> Costo Operativo Anual por Sistema</span>
            <span><i class="fas fa-check"></i> Ahorro Financiero Acumulado del Sistema Propuesto</span>
        </div>
        <h2><i class="far fa-snowflake"></i> Compara</h2>
        <div>
            <span><i class="fas fa-check"></i> Tipos de Sistemas HVAC</span>
            <span><i class="fas fa-check"></i> Mantenimientos de Sistemas HVAC</span>
        </div>
    </div> --}}

   {{--  <table id="tabla-region" style="float: left; ">
        <tr>
            <td colspan="2"><b style="font-size: 20px">Selecciona tu Región y Ciudad.</b></td>
        </tr>
        <tr>
            <td><label>Región</label></td>
            <td style="position: relative; top: 7px">
                <select class="fcontrol" name="paises" id="paises">
                    <option value="0">-Selecciona tu región-</option>
                </select>
            </td>
        </tr>

        <tr>
            <td><label>Ciudad</label></td>
            <td style="position: relative; top: 7px">
                <select class="fcontrol" name="ciudades" id="ciudades">
                    <option value="0">-Selecciona tu ciudad-</option>
                </select>
            </td>
        </tr>
    </table> --}}


    <div class="clearfix"></div>
    {{-- <div class="banner banner-h-sm" style="margin: 0px 0px !important">
        <a href="https://www.universidadhvac.com/" target="_blank"><img src="{{asset('assets/images/banners/universidad.jpg')}}" alt="Universidad hvac"></a>
        <span class="lbl-banner">Visitar</span>
    </div> --}}
</div>
<div class="col-6 mx-1 xl:ml-0 lg:ml-0 md:ml-0 lg:sm-0 ">
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
{{--         <div class="flex ">
            <input disabled class="check_style" id="agua_fria" type="checkbox"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">Sistemas de Agua Fría</label>
        </div> --}}
        {{-- @if (Auth::user()->tipo_user === 5)
        <div class="flex">
            <input  class="check_style" id="man" type="checkbox"  onclick="check_form_proy('man','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
        </div>
        @else
        <div class="flex">
            <input disabled class="check_style" id="man" type="checkbox"  onclick="check_form_proy('man','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
        </div>
        @endif --}}
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
        <div class="w-full flex justify-center">
            <div id="div_next" name="div_next" class="w-1/2 ">
                <button type="button"  id="next" name="next"
                    onclick="buton_check('{{App::getLocale()}}');"
                    style="background-color:#1B17BB;"
                    class="w-32 focus:outline-none border border-transparent py-4 px-7 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                >{{ __('index.siguiente') }}</button>
            </div>
            <div id="div_next_h" name="div_next_h" class="w-1/2">
                    <button  type="button"  id="next_h" name="next_h"
                        x-show="step < 2"
                        @click="step++"
                        style="background-color:#1B17BB;"
                        class="w-32 focus:outline-none border border-transparent py-4 px-7 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                    >{{ __('index.siguiente') }}</button>
            </div>
        </div>

</div>

