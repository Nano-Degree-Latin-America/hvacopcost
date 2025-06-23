<div class="col-4 ml-5 xl:ml-0 lg:ml-0 md:ml-0 lg:sm-0">
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



                                        <div class="my-5">
                                            <label style=" text-shadow: 2px 2px 4px #a9a9b9 ;" class="title_index font-roboto drop-shadow-lg font-bold leading-tight" for="">{{ __('index.análisis energético y financiero') }} <br> {{ __('index.de sistemas HVAC') }} <p id="type_project_name" name="type_project_name"></p></label>
                                        </div>
                                     <div class="w-full {{-- rounded-xl border-2 border-blue-500 --}} mt-1">


                                        <div class="flex w-full gap-x-10 my-1 mx-1 justify-center">

                                            <div class="grid justify-items-end h-full gap-y-3 w-1/2">
                                                <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                    <div class="flex w-full">
                                                        <label  class="labels_index font-roboto font-bold" for=""><b>{{ __('index.nombre projecto') }}</b></label><label class="text-red-500">*</label>
                                                    </div>
                                                <input id="count_name_pro" name="count_name_pro" type="number" class="hidden" value="1">
                                                <input onchange="check_input(this.value,this.id,'name_warning');check_inp_count('count_name_pro','name_pro');" name="name_pro" id="name_pro" value="{{$project_edit->name}}" type="text" style="font-size: 14px;" class="w-full border-2  border-color-inps rounded-md p-1 my-1 font-roboto" >
                                                <span id="name_warning" name="name_warning" class="text-red-500"></span>
                                                </div>




                                                <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                                                    <div class="flex w-full">
                                                        <label  class="labels_index font-roboto" for=""><b>{{ __('index.region') }}:</b></label><label class="text-red-500">*</label>
                                                    </div>
                                                    <select onchange="check_input(this.value,this.id,'paises_warning');traer_ciudad_edit(this.value);check_inp_count('count_paises','paises_edit');clean_tipo_ambiente();" class=" w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto" name="paises_edit" id="paises_edit">
                                                       {{--  @foreach ($paises as $pais)
                                                        @if ($project_edit->region == $pais->pais)
                                                        <option selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                        @endif
                                                        @if ($project_edit->region != $pais->pais)
                                                        <option value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                        @endif
                                                        @endforeach --}}
                                                        <option value="0">-{{ __('index.selecciona tu region') }}-</option>
                                                        <?php  $all_paises=$all_paises->all_paises(); ?>
                                                            @foreach ($all_paises as $pais)

                                                            @if($pais->pais === 'Argentina')
                                                            <?php  $check_pais=$paises_empresa->check_pais('Argentina'); ?>
                                                                @if ($check_pais)
                                                                    @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                    @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Bolivia')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Bolivia'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Brasil')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Brasil'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Chile')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Chile'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif


                                                            @if($pais->pais === 'Colombia')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Colombia'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Ecuador')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Ecuador'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'México')
                                                                <?php  $check_pais=$paises_empresa->check_pais('México'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                        <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                         @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Paraguay')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Paraguay'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Perú')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Perú'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Uruguay')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Uruguay'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Venezuela')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Venezuela'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Caribe')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Caribe'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Centro América')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Centro América'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                            @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                            @endif
                                                                            @if ($project_edit->region != $pais->pais)
                                                                                <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                            @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Arizona')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Arizona'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                            @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                            @endif
                                                                            @if ($project_edit->region != $pais->pais)
                                                                                <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                            @endif
                                                                            @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @endforeach
                                                    </select>
                                                    <input id="count_paises" name="count_paises" type="number" class="hidden" value="1">

                                                    <span id="paises_warning" name="paises_warning" class="text-red-500"></span>
                                                </div>

                                                <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                                                    <div class="flex w-full">
                                                        <label  class="labels_index font-roboto" for=""><b>{{ __('index.ciudad') }}:</b></label><label class="text-red-500">*</label>
                                                    </div>
                                                    <select onchange="check_input(this.value,this.id,'ciudad_warning');getDegreeHrs_edd($('#paises_edit').val(),this.value);check_inp_count('count_ciudad','ciudades_edit');"  class=" w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto"  name="ciudades_edit" id="ciudades_edit">

                                                    </select>
                                                    <input id="count_ciudad" name="count_ciudad" type="number" class="hidden" value="1" >
                                                    <span id="ciudad_warning" name="ciudad_warning" class="text-red-500"></span>
                                                </div>

                                                <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                    <div class="flex w-full">
                                                        <label  class="labels_index font-roboto font-bold text-left" for=""><b>{{ __('index.incremento anual energia') }}</b></label><label class="text-red-500"></label>
                                                    </div>
                                                    <select  onchange="check_input(this.value,this.id,'inc_ene_warning');" class="w-1/2 border-2 border-color-inps rounded-md p-1 my-1 font-roboto" name="inc_ene" id="inc_ene">
                                                        @for ($i = 0; $i <= 15; $i++)
                                                        @if ($i == $project_edit->inflacion)
                                                        <option selected value="{{$i}}">{{$i}}%</option>
                                                        @else
                                                        <option value="{{$i}}">{{$i}}%</option>
                                                        @endif
                                                        @endfor
                                                    </select>
                                                    <span id="inc_ene_warning" name="inc_ene_warning" class="text-red-500"></span>
                                                </div>

                                                <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                    <div class="flex w-full">
                                                        <label  class="labels_index font-roboto font-bold" for=""><b>{{ __('index.inflacion anual') }}:</b></label><label class="text-red-500">*</label>
                                                    </div>
{{--                                                     <input onkeypress="return soloNumeros(event)" onchange="check_input(this.value,this.id,'inc_ene_warning');" name="inc_ene" id="inc_ene" type="text" style="font-size: 14px;" class="w-full border-2  border-color-inps rounded-md p-1 my-1 font-roboto" >
--}}                                                    <select  onchange="check_input(this.value,this.id,'inc_ene_warning');" class="w-1/2 border-2 border-color-inps rounded-md p-1 my-1 font-roboto" name="inflation_rate" id="inflation_rate">
                                                            @for ($i = 0; $i <= 15; $i++)
                                                            @if ($i == $project_edit->inflacion_rate)
                                                            <option selected value="{{$i}}">{{$i}}%</option>
                                                            @else
                                                            <option value="{{$i}}">{{$i}}%</option>
                                                            @endif
                                                            @endfor
                                                        </select>
                                                <span id="inflation_rate_warning" name="inflation_rate_warning" class="text-red-500"></span>
                                                </div>

                                            </div>

                                            <div class="grid justify-items-start h-full gap-y-3 w-1/2">
                                                <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                    <div class="flex w-full">
                                                        <label class="labels_index font-roboto" for=""><b>{{ __('index.categoria edificio') }}</b></label></label><label class="text-red-500">*</label>
                                                    </div>
                                                    <select  name="cat_ed_edit" id="cat_ed_edit"onchange="traer_t_edif_edd(this.value,'tipo_edificio_edit','count_tipo_edificio');set_porcent_hvac(this.value);check_input(this.value,this.id,'cat_ed_warning');"  class="w-full font-roboto border-2 border-color-inps rounded-md p-1 my-1">
                                                        @foreach ($cate_edificio as $cat_edi)
                                                        @if ($project_edit->id_cat_edifico == $cat_edi->id)
                                                        <option selected value="{{$cat_edi->id}}">{{$cat_edi->name}}</option>
                                                        @endif
                                                        @if ($project_edit->id_cat_edifico != $cat_edi->id)
                                                        <option value="{{$cat_edi->id}}">{{$cat_edi->name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    <input id="count_cat_ed" name="count_cat_ed" type="number" class="hidden" value="1">
                                                    <span id="cat_ed_warning" name="cat_ed_warning" class="text-red-500"></span>
                                                </div>

                                                <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                  <div class="flex w-full">
                                                    <label  class="labels_index font-roboto" for=""><b>{{ __('index.tipo edificio') }}:</b></label><label class="text-red-500">*</label>
                                                  </div>
                                                    <select onchange="check_input(this.value,this.id,'tipo_Edificio_warning');check_inp_count('count_tipo_edificio','tipo_edificio_edit');" class="w-full border-2 border-color-inps  rounded-md p-1 my-1 font-roboto" name="tipo_edificio_edit"  id="tipo_edificio_edit"></select>
                                                    <input id="count_tipo_edificio" name="count_tipo_edificio" type="number" class="hidden" value="1">
                                                    <span id="tipo_Edificio_warning" name="tipo_Edificio_warning" class="text-red-500"></span>
                                                </div>

                                                <div class="flex md:w-3/5 xl:w-3/5 lg:w-1/2 justify-start gap-x-3">
                                                    <div class="grid w-1/2 justify-items-start">
                                                         <div class="flex w-full">
                                                             <label  class="labels_index font-roboto" for=""><b>{{ __('index.area') }}:</b></label><label class="text-red-500">*</label>
                                                         </div>
                                                         <input onchange="check_input(this.value,this.id,'ar_project_warning');format_nums_no_$(this.value,this.id);check_inp_count('count_ar_project','ar_project');"  value="{{number_format($project_edit->area)}}" name="ar_project" id="ar_project"  onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto text-center" >
                                                         <input id="count_ar_project" name="count_ar_project" type="number" class="hidden" value="1">
                                                         <span id="ar_project_warning" name="ar_project_warning" class="text-red-500"></span>
                                                    </div>

                                                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                                                     <div class="flex">
                                                     <div>
                                                     <div class="flex w-full">
                                                         <label  class="labels_index font-roboto" for=""><b>{{ __('index.unidad') }}:</b></label><label class="text-red-500">*</label>
                                                     </div>
                                                     <div class="flex gap-x-3 mt-3">
                                                         @if ($project_edit->unidad)
                                                             @if($project_edit->unidad == 'mc' )
                                                                <div class="flex">
                                                                    <input  id="check_mc" checked  onclick="check_unidad('mc');" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                    <label for="check_mc" class="ml-2 text-xl font-medium text-gray-900 dark:text-gray-300 font-roboto">m²</label>
                                                                    </div>

                                                                    <div class="flex">
                                                                    <input  id="check_ft"  onclick="check_unidad('ft');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                    <label for="check_ft"   class="ml-2 text-xl font-medium text-gray-900 dark:text-gray-300 font-roboto">ft²</label>
                                                                    </div>

                                                                @endif

                                                                @if($project_edit->unidad == 'ft' )
                                                                <div class="flex">
                                                                    <input  id="check_mc"   onclick="check_unidad('mc');" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                    <label for="check_mc" class="ml-2 text-xl font-medium text-gray-900 dark:text-gray-300 font-roboto">m²</label>
                                                                    </div>

                                                                    <div class="flex">
                                                                    <input  id="check_ft" checked onclick="check_unidad('ft');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                    <label for="check_ft"   class="ml-2 text-xl font-medium text-gray-900 dark:text-gray-300 font-roboto">ft²</label>
                                                                    </div>

                                                                @endif
                                                         @else
                                                                <div class="flex">
                                                                    <input  id="check_mc"  onclick="check_unidad('mc');" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                    <label for="check_mc" class="ml-2 unit_style font-medium text-gray-900 dark:text-gray-300 font-roboto">m²</label>
                                                                </div>

                                                                <div class="flex">
                                                                    <input  id="check_ft"  onclick="check_unidad('ft');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                    <label for="check_ft"   class="ml-2 unit_style font-medium text-gray-900 dark:text-gray-300 font-roboto">ft²</label>
                                                                </div>
                                                         @endif
                                                         <input id="count_unidad" name="count_unidad" type="number" class="hidden" value="1">
                                                         <input type="text" style="font-size: 14px;" class="hidden w-full border-2 border-color-inps rounded-xl" value="{{$project_edit->unidad}}" name="unidad" id="unidad">

                                                     </div>
                                                    </div>
                                                   </div>

                                                     {{-- <input type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-xl"  name="nombre_projecto" id="nombre_projecto"> --}}
                                                     </div>
                                                 </div>


                                                 <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                        <div class="flex w-full">
                                                            <label  class="labels_index font-roboto font-bold" for=""><b>{{ __('index.ocupacion semanal') }}</b></label><label class="text-red-500">*</label>
                                                        </div>
{{--                                                     <input onchange="check_input(this.value,this.id,'tiempo_porcent_warning');" value="{{$project_edit->hrs_tiempo}}"  name="tiempo_porcent" id="tiempo_porcent" type="text" style="font-size: 14px;" class="w-full border-2  border-color-inps rounded-md p-1 my-1 font-roboto" >
 --}}                                               <select onchange="check_inp_count('count_tiempo_porcent','tiempo_porcent');" class=" w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto" name="tiempo_porcent" id="tiempo_porcent">
                                                        @if ($project_edit->hrs_tiempo)
                                                            @switch($project_edit->hrs_tiempo)
                                                                @case(30)
                                                                <option selected value="m_50">{{ __('index.menos de 50 hrs') }}.</option>
                                                                <option value="51_167 ">{{ __('index.51 a 167 hrs') }}.</option>
                                                                <option value="168">168 Hrs.</option>
                                                                @break

                                                                @case(80)
                                                                <option  value="m_50">{{ __('index.menos de 50 hrs') }}.</option>
                                                                <option selected value="51_167 ">{{ __('index.51 a 167 hrs') }}.</option>
                                                                <option value="168">168 Hrs.</option>
                                                                @break

                                                                @case(168)
                                                                <option value="m_50">{{ __('index.menos de 50 hrs') }}.</option>
                                                                <option value="51_167 ">{{ __('index.51 a 167 hrs') }}.</option>
                                                                <option selected value="168">168 Hrs.</option>
                                                                @break

                                                                @default

                                                            @endswitch
                                                        @else
                                                            <option value="">-{{ __('index.seleccionar horas') }}-</option>
                                                            <option value="m_50">{{ __('index.menos de 50 hrs') }}.</option>
                                                            <option value="51_167 ">{{ __('index.51 a 167 hrs') }}.</option>
                                                            <option value="168">{{ __('index.168 hrs') }}.</option>
                                                        @endif



                                                    </select>
                                                    <input id="count_tiempo_porcent" name="count_tiempo_porcent" type="number" class="hidden" value="1">

                                                    <span id="tiempo_porcent_warning" name="tiempo_porcent_warning" class="text-red-500"></span>
                                                </div>
                                                @include('modal_energia_hvac')
                                                <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                                                    <div class="flex w-full">
                                                        <label  class="labels_index font-roboto" for=""><b>{{ __('index.energia hvac en el edificio') }}:</b></label><label class="text-red-500">*</label>
                                                    </div>
                                                    <div class="flex w-full">
                                                       {{--  <select onchange="buton_check_edit();check_input(this.value,this.id,'por_hvac_warning');check_inp_count('count_porcent_hvac','porcent_hvac');" class=" w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto" name="porcent_hvac" id="porcent_hvac">
                                                            <option value="0">-{{ __('index.selecciona porcentaje') }}-</option>
                                                        </select> --}}
                                                        <input type="text" value="{{$project_edit->porcent_hvac}}%" onkeypress="return soloNumeros(event)" onchange="buton_check_edit('{{App::getLocale()}}');check_input(this.value,this.id,'por_hvac_warning');check_inp_count('count_porcent_hvac','porcent_hvac');change_to_porcent(this.value,this.id);" class=" w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto text-center" name="porcent_hvac" id="porcent_hvac">
                                                        <input id="count_porcent_hvac" name="count_porcent_hvac" type="number" class="hidden" value="1">
                                                        <div class="ml-2" style="margin-top: 5.5px;">
                                                            <a onclick="mostrar_modal_energia_hvac('modal_energia_hvac');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                                                        </div>
                                                    </div>
                                                    <span id="por_hvac_warning" name="por_hvac_warning" class="text-red-500"></span>
                                                </div>

                                            </div>

                                        </div>
                                        @include('modal_analisis_prod')

                                        <div class="flex justify-center w-2/3  mt-8">
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
                                                <input onkeypress="return soloNumeros(event)" value="{{$project_edit->n_empleados}}" onchange="check_input(this.value,this.id,'n_empleados_warning');format_nums_no_$(this.value,this.id);" name="n_empleados" id="n_empleados" type="text" style="font-size: 14px;" class="w-1/2 border-2  border-color-inps rounded-md p-1 my-1 font-roboto text-center" >

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
                                                        <input id="count_sal_an_prom" name="count_sal_an_prom" type="number" class="hidden" value="1">

                                                    </div>
                                                    <span id="sal_an_prom_warning" name="sal_an_prom_warning" class="text-red-500"></span>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                            </div>
                            <div class="col-3 mx-1 xl:ml-0 lg:ml-0 md:ml-0 lg:sm-0">
                                <div  class="grid gap-y-3 type_proy_pos">


                                     {{-- @if ( $check_types_pn == 1 &&  $check_types_pr == 1 &&  $check_types_m == 1)
                                    <div class="flex">
                                        @if ($type_p == 1 || $type_p == 0)
                                        <input class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  checked class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        @if ($type_p == 2)
                                        <input class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        @if ($type_p == 3)
                                        <input class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Nuevo</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                            <input class="check_style" id="pr" type="checkbox" checked onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                            <input class="check_style" id="pr" type="checkbox" onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                            <input class="check_style" id="pr" type="checkbox" onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Retrofit</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                        <input  disabled class="check_style" id="man" type="checkbox" onclick="check_form_proy('man','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                        <input  disabled class="check_style" id="man" type="checkbox" onclick="check_form_proy('man','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                        <input  disabled class="check_style" id="man" checked type="checkbox" onclick="check_form_proy('man','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
                                    </div>
                                    @endif

                                    @if ( $check_types_pn == 1 &&  $check_types_pr == 0  &&  $check_types_m == 0)
                                    <div class="flex">
                                        @if ($type_p == 1 || $type_p == 0)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  checked class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        @if ($type_p == 2)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Nuevo</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                            <input disabled class="check_style" id="pr" type="checkbox" checked onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                            <input disabled class="check_style" id="pr" type="checkbox" onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                            <input disabled class="check_style" id="pr" type="checkbox" onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Retrofit</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                        <input disabled class="check_style" id="man" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                        <input disabled class="check_style" id="man" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                        <input disabled class="check_style" id="man" checked type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
                                    </div>
                                    @endif

                                    @if ( $check_types_pn == 1 &&  $check_types_pr == 0  &&  $check_types_m == 1)
                                    <div class="flex">
                                        @if ($type_p == 1 || $type_p == 0)
                                        <input  class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  checked class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        @if ($type_p == 2)
                                        <input  class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                        <input  class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Nuevo</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                            <input disabled class="check_style" id="pr" type="checkbox" checked onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                            <input disabled class="check_style" id="pr" type="checkbox" onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                            <input disabled class="check_style" id="pr" type="checkbox" onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Retrofit</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                        <input disabled class="check_style" id="man" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                        <input disabled class="check_style" id="man" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                        <input disabled class="check_style" id="man" checked type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
                                    </div>
                                    @endif

                                    @if ( $check_types_pn == 1 &&  $check_types_pr == 1  &&  $check_types_m == 0)

                                    <div class="flex">
                                        @if ($type_p == 1 || $type_p == 0)
                                        <input  class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  checked class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        @if ($type_p == 2)
                                        <input  class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                        <input  class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Nuevo</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                            <input  class="check_style" id="pr" type="checkbox" checked onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                            <input  class="check_style" id="pr" type="checkbox" onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                            <input  class="check_style" id="pr" type="checkbox" onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Retrofit</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                        <input disabled class="check_style" id="man" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                        <input disabled class="check_style" id="man" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                        <input disabled class="check_style" id="man" checked type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
                                    </div>
                                    @endif

                                    @if ( $check_types_pn == 0 &&  $check_types_pr == 1  &&  $check_types_m == 1)
                                    <div class="flex">
                                        @if ($type_p == 1 || $type_p == 0)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  checked class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        @if ($type_p == 2)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Nuevo</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                            <input  class="check_style" id="pr" type="checkbox" checked onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                            <input  class="check_style" id="pr" type="checkbox" onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                            <input  class="check_style" id="pr" type="checkbox" onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Retrofit</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                        <input disabled class="check_style" id="man" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                        <input disabled class="check_style" id="man" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                        <input disabled class="check_style" id="man" checked type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
                                    </div>
                                    @endif

                                    @if ( $check_types_pn == 0 &&  $check_types_pr == 1 &&  $check_types_m == 0)
                                    <div class="flex">
                                        @if ($type_p == 1 || $type_p == 0)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  checked class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        @if ($type_p == 2)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        @if ($type_p == 3)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Nuevo</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                            <input disabled class="check_style" id="pr" type="checkbox" checked onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                            <input disabled class="check_style" id="pr" type="checkbox" onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                            <input disabled class="check_style" id="pr" type="checkbox" checked onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Retrofit</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                        <input disabled class="check_style" id="man" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                        <input disabled class="check_style" id="man" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                        <input disabled class="check_style" id="man" checked type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
                                    </div>
                                    @endif

                                    @if ( $check_types_pn == 0 &&  $check_types_pr == 0 &&  $check_types_m == 1)
                                    <div class="flex">
                                        @if ($type_p == 1 || $type_p == 0)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  checked class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        @if ($type_p == 2)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        @if ($type_p == 3)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Nuevo</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                            <input disabled class="check_style" id="pr" type="checkbox" checked onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                            <input disabled class="check_style" id="pr" type="checkbox" onclick="D('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                            <input disabled class="check_style" id="pr" type="checkbox" checked onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Retrofit</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                        <input disabled class="check_style" id="man" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                        <input disabled class="check_style" id="man" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                        <input disabled class="check_style" id="man" checked type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
                                    </div>
                                    @endif

                                    @if ( !$check_types_pn &&  !$check_types_pr &&  !$check_types_m)
                                    <div class="flex">
                                        @if ($type_p == 1 || $type_p == 0)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"   class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        @if ($type_p == 2)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Nuevo</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                            <input disabled class="check_style" id="pr" type="checkbox"  onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                            <input disabled class="check_style" id="pr" type="checkbox" onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3 || $type_p == 0)
                                        <input disabled class="check_style" id="pr" type="checkbox" onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Retrofit</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                        <input disabled class="check_style" id="man" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                        <input disabled class="check_style" id="man" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 3)
                                        <input disabled class="check_style" id="man"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="man"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.type_man') }}</label>
                                    </div>
                                    @endif --}}

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

                                    <div class="w-full mt-2 grid justify-items-start mt-7 gap-y-2">
                                        <div id="div_next" name="div_next" style="width: 80%;" class="text-start">
                                            <button type="button" id="next" name="next"
                                            style="background-color:#1B17BB;"
                                                onclick="buton_check_edit();"
                                                class="w-full  py-4 px-7 rounded-lg shadow-sm text-center text-white hover_button_blue text-xl font-roboto"
                                            >{{ __('index.siguiente') }}</button>
                                        </div>
                                        <div id="div_next_h" name="div_next_h" style="width: 80%;" class="text-start">
                                                <button  type="button" id="next_h" name="next_h"
                                                style="background-color:#1B17BB;"
                                                    x-show="step < 2"
                                                    @click="step++"
                                                    class="w-full  py-4 px-7 rounded-lg shadow-sm text-center text-white hover_button_blue text-xl font-roboto"
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
                            </div>
