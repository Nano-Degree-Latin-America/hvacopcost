<div class="col-4 ml-5 xl:ml-0 lg:ml-0 md:ml-0 lg:sm-0 ">
    @if ($type_p === 3)


            <div class="my-8">
                <label style=" text-shadow: 2px 2px 4px #a9a9b9 ;" class="title_index font-roboto drop-shadow-lg font-bold leading-tight text-center" for="">{{ __('mantenimiento.calculo_analisis_precios') }} <br> {{ __('mantenimiento.contratos_mantenimiento_hvac') }}</label>
            </div>
         <div class="w-full {{-- rounded-xl border-2 border-blue-500 --}} mt-2">

            <div class="flex w-full gap-x-10 my-2 mx-1 justify-center">

                <div class="grid justify-items-end h-full gap-y-1 w-1/2">

                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                        <div class="flex w-full">
                            <div class="flex w-full">
                                <label class="labels_index_mantenimiento  font-roboto font-bold text-left m-0" for=""><b>{{ __('mantenimiento.cliente_prospecto') }}</b></label>
                                <label class="text-red-500 m-0">*</label>
                            </div>
                        </div>
                        <input onchange="check_input(this.value,this.id,'cliente_pro_warning_mantenimiento');check_inp_count('count_cliente_pro_mantenimiento','cliente_pro_mantenimiento');" value="{{$mantenimiento_project->cliente_prospecto}}" name="cliente_pro_mantenimiento" id="cliente_pro_mantenimiento" type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto">
                        <input id="count_cliente_pro_mantenimiento" name="count_cliente_pro_mantenimiento" type="number" class="hidden" value="0">
                        <span id="cliente_pro_warning_mantenimiento" name="cliente_pro_warning_mantenimiento" class="text-red-500"></span>
                    </div>

                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                        <div class="flex w-full">
                            <label class="font-roboto labels_index_mantenimiento  text-left m-0" for=""><b>{{ __('mantenimiento.categoria_edificio') }}</b></label>
                            <label class="text-red-500 m-0">*</label>
                        </div>
                        <select name="cat_edi_mantenimiento" id="cat_edi_mantenimiento" onchange="traer_t_edif_edd(this.value,'tipo_edificio_mantenimiento','count_tipo_edificio_mantenimiento');check_input(this.value,this.id,'cat_ed_warning_mantenimiento');check_inp_count('count_cat_ed_mantenimiento','cat_edi_id_mantenimiento');" wire:change="traer_t_edif($event.target.value)" class="w-full font-roboto border-2 border-color-inps rounded-md p-1 my-1">
                            @foreach ($cate_edificio as $cat_edi)
                            @if ($project_edit->id_cat_edifico == $cat_edi->id)
                            <option selected value="{{$cat_edi->id}}">{{$cat_edi->name}}</option>
                            @endif
                            @if ($project_edit->id_cat_edifico != $cat_edi->id)
                            <option value="{{$cat_edi->id}}">{{$cat_edi->name}}</option>
                            @endif
                            @endforeach
                        </select>
                        <input id="count_cat_edi_mantenimiento" name="count_cat_edi_mantenimiento" type="number" class="hidden" value="0">
                        <span id="cat_ed_warning_mantenimiento" name="cat_ed_warning_mantenimiento" class="text-red-500"></span>
                    </div>

                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                        <div class="flex w-full">
                            <label class="labels_index_mantenimiento  font-roboto text-left m-0" for=""><b>{{ __('index.region') }}</b></label>
                            <label class="text-red-500 m-0">*</label>
                        </div>
                        <select onchange="check_input(this.value,this.id,'paises_warning_mantenimiento');check_inp_count('count_paises_mantenimiento','paises_mantenimiento');" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto" name="paises_mantenimiento" id="paises_mantenimiento">
                            <option selected value="0">-{{ __('mantenimiento.selecciona_region') }}-</option>
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
                        <input id="count_paises_mantenimiento" name="count_paises_mantenimiento" type="number" class="hidden" value="0">
                        <span id="paises_warning_mantenimiento" name="paises_warning_mantenimiento" class="text-red-500"></span>
                    </div>

                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                        <div class="flex w-full">
                            <label class="labels_index_mantenimiento  text-left font-roboto font-bold m-0" for=""><b>{{ __('mantenimiento.distancia_sitio') }}</b></label>
                            <label class="text-red-500 text-left m-0"></label>
                        </div>
                        <input onkeypress="return soloNumeros(event)" value="{{$mantenimiento_project->distancia_sitio}}kms" onchange="check_input(this.value,this.id,'distancia_sitio_warning_mantenimiento');change_to(this.value,'kms',this.id);check_inp_count('count_distancia_sitio_mantenimiento','distancia_sitio_mantenimiento');"  name="distancia_sitio_mantenimiento" id="distancia_sitio_mantenimiento" type="text" style="font-size: 14px;" class="w-1/2 border-2 border-color-inps rounded-md p-1 my-1 font-roboto">
                        <input id="count_distancia_sitio_mantenimiento" name="count_distancia_sitio_mantenimiento" type="number" class="hidden" value="0">
                        <span id="distancia_sitio_warning_mantenimiento" name="distancia_sitio_warning_mantenimiento" class="text-red-500"></span>
                    </div>

                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                        <div class="flex w-full">
                            <label class="labels_index_mantenimiento  font-roboto font-bold text-left m-0" for=""><b>{{ __('mantenimiento.yrs_life_ed') }}:</b></label>
                            <label class="text-red-500 m-0">*</label>
                        </div>
                        <input onkeypress="return soloNumeros(event)" value="{{$mantenimiento_project->yrs_edificio}}" onchange="check_input(this.value,this.id,'yrs_life_ed_warning_mantenimiento');no_cero(this.value,this.id);set_yrs_tarjet(this.value,'yrs_vida_mantenimiento');" name="yrs_life_ed_mantenimiento" id="yrs_life_ed_mantenimiento" type="text" style="font-size: 14px;" class="w-1/2 border-2 border-color-inps rounded-md p-1 my-1 font-roboto">
                        <input id="count_yrs_life_ed_mantenimiento" name="count_yrs_life_ed_mantenimiento" type="number" class="hidden" value="0">
                        <span id="yrs_life_ed_warning_mantenimiento" name="yrs_life_ed_warning_mantenimiento" class="text-red-500"></span>
                    </div>

                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                        <div class="flex w-3/5">
                            <label class="font-roboto labels_index_mantenimiento  m-0" for=""><b>{{ __('mantenimiento.tipo_ambiente') }}:</b></label>
                            <label class="text-red-500 m-0">*</label>
                        </div>
                        <select onchange="check_input(this.value,this.id,'tipo_ambiente_warning_mantenimiento');check_inp_count('count_tipo_ambiente_mantenimiento','tipo_ambiente_mantenimiento');" class="w-1/2 border-2 border-color-inps rounded-md p-1 my-1 font-roboto" name="tipo_ambiente_mantenimiento" id="tipo_ambiente_mantenimiento">
                            <option value="">-{{ __('index.seleccionar') }}-</option>

                        </select>
                        <input id="count_tipo_ambiente_mantenimiento" name="count_tipo_ambiente_mantenimiento" type="number" class="hidden" value="0">
                        <span id="tipo_ambiente_warning_mantenimiento" name="tipo_ambiente_warning_mantenimiento" class="text-red-500"></span>
                    </div>


                    <div class="flex  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-start gap-x-3">
                        <div class="grid w-1/2 justify-items-start">
                                <div class="flex w-full">
                                    <label  class="font-roboto labels_index" for=""><b>{{ __('index.area') }}:</b></label><label class="text-red-500">*</label>
                                </div>
                                <input onchange="check_input(this.value,this.id,'ar_project_warning_mantenimiento');format_nums_no_$(this.value,this.id);check_inp_count('count_ar_project_mantenimiento','ar_project_mantenimiento');"  name="ar_project_mantenimiento" id="ar_project_mantenimiento" value="{{number_format($project_edit->area)}}" onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto text-center" >
                                <input id="count_ar_project_mantenimiento" name="count_ar_project_mantenimiento" type="number" class="hidden" value="0">
                                <span id="ar_project_warning_mantenimiento" name="ar_project_warning_mantenimiento" class="text-red-500"></span>
                        </div>

                        <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                            <div class="flex">
                                <div>
                                        <div class="flex w-full">
                                            <label  class="font-roboto labels_index" for=""><b>{{ __('index.unidad') }}:</b></label><label class="text-red-500">*</label>
                                        </div>
                                        <div class="flex gap-x-3 mt-3">
                                        <div class="flex">
                                            <input checked id="check_mc_mantenimiento"  {{-- onclick="check_unidad('mc');" --}} type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="check_mc_mantenimiento" class="ml-2 unit_style font-medium text-gray-900 dark:text-gray-300 font-roboto">m²</label>
                                        </div>

                                        <div class="flex">
                                            <input  id="check_ft_mantenimiento"  {{-- onclick="check_unidad('ft'); "--}} disabled type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="check_ft_mantenimiento"   class="ml-2 unit_style font-medium text-gray-900 dark:text-gray-300 font-roboto">ft²</label>
                                        </div>
                                        </div>

                                </div>
                            </div>
                            <input type="text" style="font-size: 14px;" class="hidden w-full border-2 border-color-inps rounded-xl"  name="unidad_area_mantenimiento" id="unidad_area_mantenimiento" value="0">
                            <input id="count_unidad" name="count_unidad" type="number" class="hidden" value="0">

                        {{-- <input type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-xl"  name="nombre_projecto" id="nombre_projecto"> --}}
                        </div>
                    </div>

                </div>

                <div class="grid justify-items-start h-full gap-y-1 w-1/2">

                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                        <div class="flex w-full">
                            <label class="labels_index_mantenimiento _mantenimiento  font-roboto font-bold text-left m-0" for=""><b>{{ __('mantenimiento.nombre_sitio') }}</b></label>
                            <label class="text-red-500 m-0">*</label>
                        </div>
                        <input value="{{$mantenimiento_project->nombre_propiedad}}" onchange="check_input(this.value,this.id,'name_sitio_warning_mantenimiento');check_inp_count('count_name_sitio_mantenimiento','name_sitio_mantenimiento');" name="name_sitio_mantenimiento" id="name_sitio_mantenimiento" type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto">
                        <input id="count_name_sitio_mantenimiento" name="count_name_sitio_mantenimiento" type="number" class="hidden" value="0">
                        <span id="name_sitio_warning_mantenimiento" name="name_sitio_warning_mantenimiento" class="text-red-500"></span>
                    </div>

                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                        <div class="flex w-full">
                            <label class="labels_index_mantenimiento  text-left font-roboto m-0" for=""><b>{{ __('mantenimiento.tipo_edificio') }}</b></label>
                            <label class="text-red-500 m-0">*</label>
                        </div>
                        <select name="tipo_edificio_mantenimiento" id="tipo_edificio_mantenimiento" onchange="check_input(this.value,this.id,'tipo_edificio_warning_mantenimiento');check_inp_count('count_tipo_edificio_mantenimiento','tipo_edificio_mantenimiento');" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto">
                            <option value="0">-{{ __('index.seleccionar') }}-</option>
                            {{-- @foreach ($tipo_edificios as $tipo_edificio)
                            <option value="{{$tipo_edificio->id}}">{{$tipo_edificio->name}}</option>
                            @endforeach --}}
                        </select>
                        <input id="count_tipo_edificio_mantenimiento" name="count_tipo_edificio_mantenimiento" type="number" class="hidden" value="0">
                        <span id="tipo_edificio_warning_mantenimiento" name="tipo_edificio_warning_mantenimiento" class="text-red-500"></span>
                    </div>

                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                        <div class="flex w-full">
                            <label class="labels_index_mantenimiento  text-left font-roboto m-0" for=""><b>{{ __('index.ciudad') }}</b></label>
                            <label class="text-red-500 m-0">*</label>
                        </div>
                        <select onchange="check_input(this.value,this.id,'ciudad_warning_mantenimiento');check_inp_count('count_ciudad_mantenimiento','ciudades_mantenimiento');" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto" name="ciudades_mantenimiento" id="ciudades_mantenimiento">
                            <option selected value="0">-{{ __('mantenimiento.selecciona_ciudad') }}-</option>
                            {{-- @foreach ($ciudades as $ciudad)
                            <option value="{{$ciudad->id}}">{{$ciudad->name}}</option>
                            @endforeach --}}
                        </select>
                        <input id="count_ciudad_mantenimiento" name="count_ciudad_mantenimiento" type="number" class="hidden" value="0">
                        <span id="ciudad_warning_mantenimiento" name="ciudad_warning_mantenimiento" class="text-red-500"></span>
                    </div>

                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                        <div class="flex w-full">
                            <label class="labels_index_mantenimiento  font-roboto font-bold text-left m-0" for=""><b>{{ __('mantenimiento.velocidad_promedio') }}:</b></label>
                            <label class="text-red-500 m-0">*</label>
                        </div>
                        <select onchange="check_input(this.value,this.id,'velocidad_promedio_warning_mantenimiento');" class="w-1/2 border-2 border-color-inps rounded-md p-1 my-1 font-roboto" name="velocidad_promedio_mantenimiento" id="velocidad_promedio_mantenimiento">
                            @for ($i = 0; $i <= 120; $i = $i + 10)
                                @if ($mantenimiento_project->velocidad == $i)
                                    <option  value="{{$i}}">{{$i}} Km/h</option>
                                @endif
                            @endfor
                        </select>
                        <input id="count_velocidad_promedio_mantenimiento" name="count_velocidad_promedio_mantenimiento" type="number" class="hidden" value="0">
                        <span id="velocidad_promedio_warning_mantenimiento" name="velocidad_promedio_warning_mantenimiento" class="text-red-500"></span>
                    </div>

                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                        <div class="flex w-full justify-start">
                            <label class="font-roboto font-bold text-left labels_index_mantenimiento  m-0" for=""><b>{{ __('mantenimiento.ocupacion_semanal') }}</b></label>
                            <label class="text-red-500 m-0">*</label>
                        </div>
                        <select onchange="set_horas_diarias();check_input(this.value,this.id,'ocupacion_semanal_warning_mantenimiento');check_inp_count('count_ocupacion_semanal_mantenimiento','ocupacion_semanal_mantenimiento');" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto" name="ocupacion_semanal_mantenimiento" id="ocupacion_semanal_mantenimiento">
                                                        @switch($mantenimiento_project->ocupacion_semanal)
                                                            @case('m_50')
                                                            <option selected value="m_50">{{ __('index.menos de 50 hrs') }}.</option>
                                                            <option value="51_167 ">{{ __('index.51 a 167 hrs') }}.</option>
                                                            <option value="168">168 Hrs.</option>
                                                            @break

                                                            @case('51_167')
                                                            <option  value="m_50">{{ __('index.menos de 50 hrs') }}.</option>
                                                            <option selected value="51_167 ">{{ __('index.51 a 167 hrs') }}.</option>
                                                            <option value="168">168 Hrs.</option>
                                                            @break

                                                            @case('168')
                                                            <option value="m_50">{{ __('index.menos de 50 hrs') }}.</option>
                                                            <option value="51_167 ">{{ __('index.51 a 167 hrs') }}.</option>
                                                            <option selected value="168">168 Hrs.</option>
                                                            @break

                                                            @default

                                                        @endswitch
                        </select>
                        <input id="count_ocupacion_semanal_mantenimiento" name="count_ocupacion_semanal_mantenimiento" type="number" class="hidden"<div class="grid justify-items-end h-full gap-y-1 w-1/2">
                    </div>


                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                        <div class="flex w-full">
                            <label  class="font-roboto labels_index_mantenimiento  m-0" for=""><b>{{ __('mantenimiento.personal_enviado') }}:</b></label>
                            <label class="text-red-500 m-0">*</label>
                        </div>
                            <select  onchange="check_input(this.value,this.id,'personal_enviado_mantenimiento_warning');check_inp_count('count_personal_enviado_mantenimiento','personal_enviado_mantenimiento');" class="w-full border-2 border-color-inps  rounded-md p-1 my-1 font-roboto" name="personal_enviado_mantenimiento"  id="personal_enviado_mantenimiento">
                                @if ($mantenimiento_project->personal_enviado == 'tecnico')
                                    <option selected value="tecnico">{{ __('mantenimiento.tecnico') }}</option>
                                    <option value="tecnico_ayudante ">{{ __('mantenimiento.tecnico_ayudante') }}</option>
                                @endif

                                @if ($mantenimiento_project->personal_enviado == 'tecnico_ayudante')
                                    <option  value="tecnico">{{ __('mantenimiento.tecnico') }}</option>
                                    <option selected value="tecnico_ayudante ">{{ __('mantenimiento.tecnico_ayudante') }}</option>
                                @endif

                            </select>
                            <input id="count_personal_enviado_mantenimiento" name="count_personal_enviado_mantenimiento" type="number" class="hidden" value="0">
                            <span id="personal_enviado_mantenimiento_warning" name="personal_enviado_mantenimiento_warning" class="text-red-500"></span>
                    </div>


                       {{--  <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                            <div class="flex w-full">
                                <label  class="font-roboto text-left labels_index_mantenimiento  m-0" for=""><b>{{ __('mantenimiento.porcentaje_inflacion') }}:</b></label>
                                <label class="text-red-500 m-0"></label>
                            </div>
                            <div class="flex w-full">

                                <input type="text" onkeypress="return soloNumeros(event)" onchange="change_to_porcent(this.value,this.id);" class="w-1/2 border-2 border-color-inps rounded-md p-1 my-1 font-roboto text-center" name="inflacion" id="inflacion">
                                <input id="count_inflacion" name="count_inflacion" type="number" class="hidden" value="0">

                            </div>
                            <span id="inflacion_warning" name="inflacion_warning" class="text-red-500"></span>
                        </div> --}}

                        @include('modal_energia_hvac')

                        <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                            <div class="flex w-full">
                                <label  class="font-roboto text-left labels_index" for=""><b>{{ __('index.energia hvac en el edificio') }}:</b></label><label class="text-red-500">*</label>
                            </div>
                            <div class="flex w-full">
                                <input type="text" value="{{$project_edit->porcent_hvac}}%" onkeypress="return soloNumeros(event)" onchange="buton_check('{{App::getLocale()}}');check_input(this.value,this.id,'por_hvac_warning_mantenimiento');check_inp_count('count_porcent_hvac_mantenimiento','porcent_hvac_mantenimiento');change_to_porcent(this.value,this.id);valida_formulario_mantenimiento();" class="w-1/2 border-2 border-color-inps rounded-md p-1 my-1 font-roboto text-center" name="porcent_hvac_mantenimiento" id="porcent_hvac_mantenimiento">
                                <input id="count_porcent_hvac_mantenimiento" name="count_porcent_hvac_mantenimiento" type="number" class="hidden" value="0">
                                <div class="ml-2" style="margin-top: 5.5px;">
                                    <a onclick="mostrar_modal_energia_hvac('modal_energia_hvac');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                                </div>
                            </div>
                            <span id="por_hvac_warning_mantenimiento" name="por_hvac_warning_mantenimiento" class="text-red-500"></span>
                        </div>



                </div>
            </div>
        </div>
        @endif
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

    {{-- <div class="banner banner-h-sm" style="margin: 0px 0px !important">
        <a href="https://www.universidadhvac.com/" target="_blank"><img src="{{asset('assets/images/banners/universidad.jpg')}}" alt="Universidad hvac"></a>
        <span class="lbl-banner">Visitar</span>
    </div> --}}

<div style="width:16%" class="col-6 mx-1 xl:ml-0 lg:ml-0 md:ml-0 lg:sm-0 ">

    {{-- <div class="grid gap-y-3 type_proy_pos">


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

        </div> --}}
        <div style="margin-top:193px;" class="w-full">
            <div class="flex w-full">
                <label  class="font-roboto text-left labels_index" for=""><b>{{ __('mantenimiento.tipo_mantenimiento') }}:</b></label><label class="text-red-500">*</label>
            </div>
            <div class="flex w-full">
                <select onchange="buton_check('{{App::getLocale()}}');check_input(this.value,this.id,'mantenimiento_realizado_warning');check_inp_count('count_mantenimiento_realizado','mantenimiento_realizado');" class="w-full bg-orange-500 border-2 border-color-tipo-calculo rounded-md p-1 my-1 font-roboto text-white" name="mantenimiento_realizado" id="mantenimiento_realizado">
                    <option value="0">-{{ __('index.seleccionar') }}-</option>
                    <option  selected value="1">Cálculo Rapido</option>
                    <option value="2">Cálculo Detallado</option>
                </select>
                {{-- <input type="text" onkeypress="return soloNumeros(event)" onchange="buton_check('{{App::getLocale()}}');check_input(this.value,this.id,'por_hvac_warning');check_inp_count('count_porcent_hvac','porcent_hvac');change_to_porcent(this.value);" class="w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto text-center" name="porcent_hvac" id="porcent_hvac">
                <input id="count_porcent_hvac" name="count_porcent_hvac" type="number" class="hidden" value="0"> --}}
                <input id="count_porcent_hvac" name="count_porcent_hvac" type="number" class="hidden" value="0">
            </div>
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
            {{-- <div id="div_next" name="div_next" style="width: 80%;" class="">
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
            </div> --}}

            <div id="div_next_h_mantenimiento" name="div_next_h_mantenimiento" style="width: 80%;" class="">
                <button  type="button"  id="next_h_mantenimiento" name="next_h_mantenimiento"
                    x-show="step < 2"
                    onclick="valida_formulario_mantenimiento();"
                    style="background-color:#1B17BB;"
                    class="w-full focus:outline-none border border-transparent py-4 px-7 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                >{{ __('index.siguiente') }}</button>
            </div>
            @if ($type_p == 3)
            <div id="div_next_mantenimiento" name="div_next_mantenimiento" style="width: 80%;" class="hidden">
                <button  type="button"  id="next_mantenimiento" name="next_mantenimiento"
                    x-show="step < 2"
                    onclick="listar_mantenimiento_equipos({{ $project_edit->id }});set_horas_diarias_edit('{{ $mantenimiento_project->ocupacion_semanal }}');"
                    @click="step++"
                    style="background-color:#1B17BB;"
                    class="w-full focus:outline-none border border-transparent py-4 px-7 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                >{{ __('index.siguiente') }}</button>
            </div>
            @endif


            <div id="div_atras_mant" name="div_atras_mant" style="width: 80%;" class="">
                <button  type="button"  id="next_h_mant" name="next_h_mant"
                    x-show="step < 2"
                     onclick="back_begin();"
                    class="w-full focus:outline-none bg-gray-500 border-2 border-color-inps py-4 px-7 rounded-lg shadow-sm text-center text-white hover:bg-gray-800 text-xl font-roboto"
                >{{ __('index.inicio') }}</button>
            </div>
        </div>

</div>
