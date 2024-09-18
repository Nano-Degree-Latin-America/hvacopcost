<div id="content" style=" display: flex; justify-content: center;" class="font-roboto">
    <div style="width: 100%; text-align: -webkit-right;" class="mx-1">
        <div style="background-color: #1B17BB;" class="text-white rounded-t-xl w-80 2xl:flex xl:flex lg:grid justify-between 2xl:py-3 xl:py-3 lg:py-0  ">
            <div class="ml-5 2xl:w-10 xl:w-auto lg:w-1/4 flex justify-start">
             <a href="#final1">   <button onclick="active_display('sol_1');" type="button" style="background-color: #1B17BB;" class="rounded-xl p-1 m-0 hover-button-plus text-3xl"><i class="fa-solid fa-plus text-white"></i></button></a>
                <input type="text" class="hidden" value="2" id="cont_sol_1" name="cont_sol_1">
                <input type="text" class="hidden" value="1" id="set_sol_1" name="set_sol_1">
            </div>
            <div class="2xl:ml-5 xl:ml-5 lg:ml-10 w-full flex  2xl:justify-center xl:justify-center lg:justify-center  py-1">
                <h2 style="margin-right:0px;" class="text-white font-bold text-3xl">{{ __('index.solucion') }} A</h2>
            </div>

            @include('modal_add_marca_modelo')
            <div class="mr-5 2xl:w-10 xl:w-auto lg:w-1/4 flex justify-end">
                <button  onclick="mostrar_modal_marcas_modelos('modal_add_marca_modelo');send_marcas_to_datalist();" type="button"  class="rounded-xl p-1 m-0 text-3xl"><img src="{{asset('/assets/images/air-conditioning.png')}}" height ="60" width="60" /></button>
            </div>
          {{--   <div cslass="w-1/2 flex justify-start">
                <h2 class="text-white font-bold justify-start">ENFRIAMIENTO SOLUCIÓN 1</h2>
            </div> --}}
        </div>
        <div style="border-color:#233064;" id="base_border_bottom" name="base_border_bottom" class="border-r-2 border-l-2">


        <div class="grid w-full" id="sol_1_1" name="sol_1_1">
        <input type="text" name="pais" id="pais" class="hidden">
        <input type="text" name="ciudad" id="ciudad" class="hidden">

       <div class="flex w-full ">
        <div class="w-full  mt-2 mx-2 rounded-md shadow-xl">
          <div class="grid gap-y-1 my-2 ">
            <div class="flex w-full">

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2 ">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.unidadhvac') }}</b> </label>
                    </div>

                    <div class="w-1/2 flex justify-start">
                        <select name="cUnidad_1_1" id="cUnidad_1_1" class="w-full border-2 rounded-md py-2 border-color-inps" onchange="valida_form_calc(1);unidadHvac(this.value,1,'csTipo','csDisenio_1_1');check_chiller(this.value,'csStd',1);send_value_equipo_marca_form(this.id,'equipo_modal',this.value);"">
                            <option value="0">{{ __('index.seleccionar') }}</option>
                            <option value="1">Paquetes (RTU)</option>
                            <option value="2">Split DX</option>
                            <option value="3">VRF No Ductados</option>
                            <option value="4">VRF Ductados</option>
                            <option value="5">PTAC/VTAC</option>
                            <option value="6">WSHP</option>
                            <option value="7">Minisplit Inverter</option>
{{--                             <option value="8">Chiller - Aire - Scroll Constante</option>
                            <option value="9">Chiller - Aire - Scroll Variable</option>
                            <option value="10">Chiller - Aire - Tornillo 4 Etapas</option> --}}
                        </select>
                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/2 text-left">
                        <label class="labels" for=""><b>{{ __('index.tipo equipo') }}</b> </label>
                    </div>
                    <div class="w-full flex justify-start">
                        <select style="font-size: 14px" class="w-full border-2 border-color-inps rounded-md py-2" onchange="valida_selects_inps(this.id);change_diseño(this.value,1,'csDisenio_1_1','tipo_control_1_1','dr_1_1','ventilacion_1_1','filtracion_1_1','lblCsTipo_1_1');"  name="csTipo" id="csTipo">
                        </select>
                    </div>

                    <input type="text" style="display: none" id="lblCsTipo_1_1" name="lblCsTipo_1_1">
                    <input  id="tipo_equipo_1_1_count" name="tipo_equipo_1_1_count" type="number" class="hidden" value="1">
                </div>
            </div>

            @include('modal_marca_support')
            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.marca') }}</b> </label>
                    </div>

                    <div class="w-1/2 flex justify-start">
                        <select onchange="valida_selects_inps(this.id);send_modelos(this.value,'modelo_1_1');send_marca_to_modal(this.value,'marcas_modal');check_type_set_mant('type_p','marca_2_1','marca_3_1',this.value);" name="marca_1_1" id="marca_1_1" class="w-full border-2 border-color-inps rounded-md py-2">
                        </select>
                        <input  id="marca_1_1_count" name="marca_1_1_count" type="number" class="hidden" value="1">

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
                        <select style="font-size: 14px" onchange="valida_selects_inps(this.id);check_type_set_mant('type_p','modelo_2_1','modelo_3_1',this.value);send_efi(this.value,'csStd');" class="w-full border-2 border-color-inps rounded-md py-2"   name="modelo_1_1" id="modelo_1_1">
                        </select>
                    </div>


                    <input  id="modelo_1_1_count" name="modelo_1_1_count" type="number" class="hidden" value="1">
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2 mr-1">
                    <div class="flex justify-start w-1/3 text-left">
                        <label  class="labels" for=""><b>{{ __('index.capacidad termica') }}</b> </label>
                    </div>
                    <div class="flex w-1/2 justify-start gap-x-2">
                        <div class="w-full">
                            <input type="text" style="margin-left: 1px;" onchange="valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);"  onkeypress="return soloNumeros(event)" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md py-2 text-center" name="capacidad_total" id="capacidad_total" >
                        </div>
                        <input  id="capacidad_total_1_1_count" name="capacidad_total_1_1_count" type="number" class="hidden" value="1">
                        <div class="w-full">
                        <select class="w-full  border-2 border-color-inps rounded-md h-full text-center" onchange="cap_term_change(this.value);"  id="unidad_capacidad_tot" name="unidad_capacidad_tot">
                            <option value="TR">TR</option>
                            <option value="KW">KW</option>
                        </select>
                         </div>
                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/2 flex justify-start text-left">
                        <label  class="labels" for=""><b>{{ __('index.efi') }}</b> </label>
                    </div>

                    <div class="flex w-full justify-start gap-x-2">
                        <div class="flex justify-start w-full">
                            <select name="csStd" id="csStd" style="padding-top: 0.43rem;padding-bottom: 0.43rem;font-size: 14px;" onchange="check_send_efi(this.value,document.getElementById('cUnidad_1_1').value,'csStd');" class="w-full border-2 border-color-inps rounded-md text-center">

                            </select>
                        </div>
                        <div class="flex justify-start fw-full">
                            <input name="csStd_cant_1_1" id="csStd_cant_1_1" onchange="valida_selects_inps(this.id);" type="text" class="text-center w-full border-2 border-color-inps rounded-md">
                            <input  id="csStd_cant_1_1_count" name="csStd_cant_1_1_count" type="number" class="hidden" value="1">
                        </div>
                        <div class="mt-1">
                            <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @include('modal_costo_elec')
            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                    <div class="w-1/3 flex justify-start text-left" title="Costo Eléctrico">
                       {{--  <label style="font-size: 14px;" class="" for=""><b>Costo Eléctrico</b><b style="font-size: 10px;"> $/Kwh</b> </label> --}}
                        <label  class="labels" for=""><b>{{ __('index.costo elec') }} $/Kwh</b> </label>
                    </div>
                    <div class="w-1/2 flex justify-start">
                        <input id="costo_elec" name="costo_elec" onchange="valida_selects_inps(this.id);asign_cos_ele(this.value);" onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full text-center border-2 border-color-inps rounded-md py-1">
                    </div>
                    <input  id="costo_elec_1_1_count" name="costo_elec_1_1_count" type="number" class="hidden" value="1">
                    <div class="mt-1">
                        <a onclick="mostrar_modal('modal_costo_elec');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/3 text-left">
                        <label  class="labels" for=""><b>{{ __('index.hors enf') }}</b> </label>
                    </div>
                    <div class="flex justify-start w-1/3">
                        <input  type="text" style="font-size: 14px;margin-left:1px;" class="w-full border-2 border-color-inps rounded-md py-1 text-center" name="hrsEnfriado" onkeypress="return soloNumeros(event)" id="hrsEnfriado" onchange="hrs_enfs_inps(this.value);valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);">
                        <input  id="hrsEnfriado_1_1_count" name="hrsEnfriado_1_1_count" type="number" class="hidden" value="1">
                    </div>
                    @include('modal_coolinghours')
                    <div class="mt-1">
                        <a onclick="mostrar_modal_energia_hvac('modal_coolinghours');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                    </div>
                </div>
            </div>
            @include('modal_seer')
            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.tipo diseño') }}</b> </label>
                    </div>

                    <div class="w-1/2 flex justify-start">
                        <select onchange="valida_selects_inps(this.id);send_name(this.id);" name="csDisenio_1_1" id="csDisenio_1_1" class="w-full border-2 border-color-inps rounded-md py-2">
                        </select>
                    </div>
                    <input type="text" style="display: none" id="lblCsDisenio" name="lblCsDisenio" value="ASHRAE 55/62.1/90.1">
                    <input type="text" style="display: none" id="name_diseno_1_1" name="name_diseno_1_1">
                    <input  id="csDisenio_1_1_count" name="csDisenio_1_1_count" type="number" class="hidden" value="1">
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                    <div class="flex justify-start text-left w-1/2">
                        <label  class="labels" for=""><b>{{ __('index.tipo control') }}</b> </label>
                    </div>

                    <div class="flex justify-start w-full">
                        <select class="w-full border-2 border-color-inps rounded-md py-1"   onchange="valida_selects_inps(this.id);send_name_t_c(this.id);" name="tipo_control_1_1" id="tipo_control_1_1">

                        </select>
                        <input  id="tipo_control_1_1_count" name="tipo_control_1_1_count" type="number" class="hidden" value="1">

                    </div>

                    <input type="text" style="display: none" id="name_t_control_1_1" name="name_t_control_1_1">
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.dr') }}</b> </label>
                    </div>
                    <div class="w-full flex justify-start">
                        <select style="width: 77%;margin-left:1.5px;" class="border-2 border-color-inps rounded-md py-1" onchange="valida_selects_inps(this.id);send_name_dr(this.id);" name="dr_1_1" id="dr_1_1" >
                        </select>
                    </div>
                    <input  id="dr_1_1_count" name="dr_1_1_count" type="number" class="hidden" value="1">
                    <input type="text" style="display: none" id="dr_name_1_1" name="dr_name_1_1">
                </div>


                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex w-1/2 justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.ventilacion') }}</b></label>
                    </div>
                    <div class="flex w-full justify-start">
                        <select onchange="valida_selects_inps(this.id);send_name_vent(this.id);"  style="margin-left: 2px;" class="w-full border-2 border-color-inps rounded-md py-2" name="ventilacion_1_1" id="ventilacion_1_1">

                        </select>
                        <input  id="ventilacion_1_1_count" name="ventilacion_1_1_count" type="number" class="hidden" value="1">
                        <input type="text" style="display: none" id="ventilacion_name_1_1" name="ventilacion_name_1_1">
                    </div>
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                    <div class="flex w-1/2 justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.filtracion') }}</b></label>
                    </div>
                    <div class="flex w-full justify-start">
                        <select onchange="valida_selects_inps(this.id);send_name_filt(this.id);"  style="width: 77%;margin-left:0px;" class="border-2 border-color-inps rounded-md py-1" name="filtracion_1_1" id="filtracion_1_1">

                        </select>
                        <input  id="filtracion_1_1_count" name="filtracion_1_1_count" type="number" class="hidden" value="1">
                        <input type="text" style="display: none" id="filtracion_name_1_1" name="filtracion_name_1_1">
                    </div>
                </div>


                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                     <div class="flex w-1/3 justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.mantenimiento') }}</b></label>
                    </div>
                    <div class="flex w-full justify-start">
                        <select onchange="valida_selects_inps(this.id);"  style="margin-left: 2px;" class="w-full border-2 border-color-inps rounded-md py-2" name="csMantenimiento" id="csMantenimiento">
                            <option selected value="0">{{ __('index.seleccionar') }}</option>
                            <option value="ASHRAE 180">ASHRAE 180</option>
                            <option value="Deficiente">Deficiente</option>
                            <option value="Sin Mantenimiento">Sin Mantenimiento</option>
                        </select>
                        <input  id="csMantenimiento_1_1_count" name="csMantenimiento_1_1_count" type="number" class="hidden" value="1">

                    </div>


                    <input type="text" style="display: none" id="lblCsMantenimiento" name="lblCsMantenimiento" value="ASHRAE 180 Proactivo">
                    <input type="text" style="display: none" id="lblCsTipo" name="lblCsTipo" value="Tipo paquete">
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                    <div class="flex w-1/2 justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.tipo_ambiente') }}</b></label>
                    </div>
                    <div class="flex w-full justify-start">
                        <select onchange="valida_selects_inps(this.id);show_prot_cond(this.value,'proteccion_condensador_1_1','new');"  style="width: 77%;margin-left:0px;" class="border-2 border-color-inps rounded-md py-1" name="tipo_ambiente_1_1" id="tipo_ambiente_1_1">
                            <option selected value="0">{{ __('index.seleccionar') }}</option>
                            <option value="no_agresivo">No Agresivo</option>
                            <option value="marino">Marino</option>
                            <option value="contaminado">Contaminado</option>
                        </select>
                        <input  id="tipo_ambiente_1_1_count" name="tipo_ambiente_1_1_count" type="number" class="hidden" value="1">

                    </div>
                </div>

                @include('modal_sin_proteccion')
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                     <div class="flex w-1/3 justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.proteccion_condensador') }}</b></label>
                    </div>
                    <div class="flex w-full justify-start">
                        <select onchange="valida_selects_inps(this.id);send_value_box('proteccion_condensador_1_1','proteccion_condensador_1_1_value','tipo_ambiente_1_1');"  style="margin-left: 16px;" class="w-full border-2 border-color-inps rounded-md py-2" name="proteccion_condensador_1_1" id="proteccion_condensador_1_1">
                        </select>
                        <input  id="proteccion_condensador_1_1_count" name="proteccion_condensador_1_1_count" type="number" class="hidden" value="1">
                        <input  id="proteccion_condensador_1_1_value" name="proteccion_condensador_1_1_value" type="text" class="hidden">
                    </div>
                    <div class="mt-1">
                        <a onclick="mostrar_modal('modal_sin_proteccion');" class="btn_roundf_retro" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                    </div>
                </div>
            </div>


            @include('modal_inv_ini')
            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.inversion inicial') }} (CAPEX)</b></label>
                    </div>

                    <div class="w-1/2 flex justify-start text-left">
                        <input style="margin-left: 0px;" onchange="format_num(this.value,this.id);valida_selects_inps(this.id)" type="text" class="2xl:w-full xl:w-full lg:w-3/6 border-2 border-color-inps rounded-md py-1 text-center" type="text" name="cheValorS_1_1" id="cheValorS_1_1" >
                        <input  id="cheValorS_1_1_count" name="cheValorS_1_1_count" type="number" class="hidden" value="1">
                    </div>
                    <div class="mt-1">
                        <a onclick="mostrar_modal('modal_inv_ini');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label  class="labels" for=""><b>{{ __('index.costo anual') }}</b> </label>
                    </div>

                    <div class="w-1/2 flex justify-start">
                        <input type="text" style="margin-left: 2px;" onchange="format_num(this.value,this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-color-inps rounded-md py-1 text-center"  name="maintenance_cost_1_1" id="maintenance_cost_1_1" >
                    </div>
                </div>




            </div>
          </div>
        </div>
       </div>
      </div>

      {{-- 1.1 --}}

      {{-- 1.2 --}}
      <div class="grid w-full hidden mb-1"  id="sol_1_2" name="sol_1_2">
       <div class="mx-2">
        <hr>
       </div>
        <div class="flex">
        <div class="rounded-xl mt-3 rounded-xl shadow-md mx-2">

          <div class="grid gap-y-1 my-2">
            <div class="flex w-full">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label  class="labels" for=""><b>{{ __('index.unidadhvac') }}</b> </label>
                    </div>

                    <div class="w-1/2 flex justify-start">
                        <select  class="w-full border-2 border-color-inps rounded-md p-2" onchange="unidadHvac(this.value,2,'csTipo_1_2');check_chiller(this.value,'csStd_1_2',1);send_value_equipo_marcas(this.id,this.value,'marca_1_2');" name="cUnidad_1_2" id="cUnidad_1_2" >
                            <option value="0">{{ __('index.seleccionar') }}</option>
                            <option value="1">Paquetes (RTU)</option>
                            <option value="2">Split DX</option>
                            <option value="3">VRF No Ductados</option>
                            <option value="4">VRF Ductados</option>
                            <option value="5">PTAC/VTAC</option>
                            <option value="6">WSHP</option>
                            <option value="7">Minisplit Inverter</option>
{{--                             <option value="8">Chiller - Aire - Scroll Constante</option>
                            <option value="9">Chiller - Aire - Scroll Variable</option>
                            <option value="10">Chiller - Aire - Tornillo 4 Etapas</option> --}}
                        </select>
                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/2 text-left">
                        <label  class="labels" for=""><b>{{ __('index.tipo equipo') }}</b></label>
                    </div>

                    <div class="w-full flex justify-start">
                        <select style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md py-2" onchange="valida_selects_inps(this.id);change_diseño(this.value,2,'csDisenio_1_2','tipo_control_1_2','dr_1_2','ventilacion_1_2','filtracion_1_2','lblCsTipo_1_2');"  name="csTipo_1_2" id="csTipo_1_2">
                        </select>
                    </div>
                    <input  id="csTipo_1_2_count" name="csTipo_1_2_count" type="number" class="hidden" value="1">
                    <input type="text" style="display: none" id="lblCsTipo_1_2" name="lblCsTipo_1_2">
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.marca') }}</b> </label>
                    </div>

                    <div class="w-1/2 flex justify-start">
                        <select onchange="valida_selects_inps(this.id);send_modelos(this.value,'modelo_1_2');send_marca_to_modal(this.value,'marcas_modal');check_type_set_mant('type_p','marca_2_1','marca_3_1',this.value);" name="marca_1_2" id="marca_1_2" class="w-full border-2 border-color-inps rounded-md py-2">
                        </select>
                        <input  id="marca_1_2_count" name="marca_1_2_count" type="number" class="hidden" value="1">

                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/2 text-left">
                        <label class="labels" for=""><b>{{ __('index.modelo') }}</b></label>
                    </div>
                    <div class="w-full flex justify-start">
                        <select style="font-size: 14px" onchange="valida_selects_inps(this.id);check_enfi_mod(this.value,'csStd_1_2',this.id,'cUnidad_1_1');" class="w-full border-2 border-color-inps rounded-md py-2"   name="modelo_1_2" id="modelo_1_2">
                        </select>
                    </div>


                    <input  id="modelo_1_2_count" name="modelo_1_2_count" type="number" class="hidden" value="1">
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">

                    <div class="flex justify-start w-1/3 text-left">
                        <label class="labels" for=""><b>{{ __('index.capacidad termica') }}</b> </label>
                    </div>

                    <div class="flex w-1/2 justify-start gap-x-2">
                    <div class="w-full">
                        <input style="margin-left: 0px;" name="capacidad_total_1_2" id="capacidad_total_1_2" onchange="valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);"  onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md py-2 text-center" >
                    </div>
                    <input  id="capacidad_total_1_2_count" name="capacidad_total_1_2_count" type="number" class="hidden" value="1">
                    <div class="w-full">
                        <input class="w-full  border-2 border-color-inps rounded-md py-2 text-center"  type="text" readonly name="unidad_capacidad_tot_1_2" id="unidad_capacidad_tot_1_2" >
                    </div>
                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
       {{--  --}}
                    <div class="w-1/2 flex justify-start text-left">
                        <label  class="labels" for=""><b>{{ __('index.efi') }}</b> </label>
                    </div>

                    <div class="flex w-full justify-start gap-x-2">
                        <div class="flex justify-start w-1/3">
                            <select name="csStd_1_2" id="csStd_1_2" style="padding-top: 0.43rem;padding-bottom: 0.43rem;font-size: 14px;" onchange="check_send_efi(this.value,document.getElementById('cUnidad_1_2').value,'csStd_1_2');" class="w-full border-2 border-color-inps rounded-md text-center">
                            </select>
                        </div>

                        <div class="flex justify-start w-1/3">
                            <input  id="csStd_cant_1_2" onchange="valida_selects_inps(this.id);" name="csStd_cant_1_2" type="number"  style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md py-1 text-center">
                        </div>
                        <input  id="csStd_cant_1_2_count" name="csStd_cant_1_2_count" type="number" class="hidden" value="1">
                    </div>
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                    <div class="w-1/3 flex justify-start text-left">
                        <label  class="labels" for=""><b>{{ __('index.costo elec') }} $/Kwh</b> </label>
                    </div>
                    <div class="w-1/2 flex justify-start">
                        <input  id="costo_elec_1_2" name="costo_elec_1_2" readonly onchange="valida_selects_inps(this.id);" onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full text-center border-2 border-color-inps rounded-md py-1">
                     </div>
                     <input  id="costo_elec_1_2_count" name="costo_elec_1_2_count" type="number" class="hidden" value="1">

                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/3 text-left ">
                        <label  class="labels" for=""><b>{{ __('index.hors enf') }}</b> </label>
                    </div>

                    <div class="flex justify-start w-1/3">
                        <input type="text" onchange="valida_selects_inps(this.id);" style="font-size: 14px;margin-left:1px;" class="w-full border-2 border-color-inps rounded-md py-1 text-center" name="hrsEnfriado_1_2" id="hrsEnfriado_1_2">
                        <input  id="hrsEnfriado_1_2_count" name="hrsEnfriado_1_2_count" type="number" class="hidden" value="1">

                    </div>
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">
                    <div class="w-1/3 flex justify-start text-left">
                        <label  class="labels" for=""><b>{{ __('index.tipo diseño') }}</b> </label>
                    </div>
                    <div class="w-1/2 flex justify-start">
                        <select  class="w-full border-2 border-color-inps rounded-md py-2"  onchange="valida_selects_inps(this.id);send_name(this.id);" name="csDisenio_1_2" id="csDisenio_1_2">
                        </select>
                    </div>
                    <input  id="csDisenio_1_2_count" name="csDisenio_1_2_count" type="number" class="hidden" value="1">
                    <input type="text" style="display: none" id="lblCsDisenio_1_2" name="lblCsDisenio_1_2">
                    <input type="text" style="display: none" id="name_diseno_1_2" name="name_diseno_1_2">
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                    <div class="flex justify-start text-left w-1/2">
                        <label  class="labels" for=""><b>{{ __('index.tipo control') }}</b> </label>
                    </div>

                    <div class="flex justify-start w-full">
                        <select class="w-full border-2 border-color-inps rounded-md py-1"  onchange="valida_selects_inps(this.id);send_name_t_c(this.id);"  name="tipo_control_1_2" id="tipo_control_1_2">
                        </select>
                    </div>
                    <input  id="tipo_control_1_2_count" name="tipo_control_1_2_count" type="number" class="hidden" value="1">

                    <input type="text" style="display: none" id="name_t_control_1_2" name="name_t_control_1_2">
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label  class="labels" for=""><b>{{ __('index.dr') }}</b> </label>
                    </div>
                    <div class="w-full flex justify-start text-left">
                    <select  style="width: 75%;margin-left:3.5px;" class="border-2 border-color-inps rounded-md py-1"  onchange="valida_selects_inps(this.id);send_name_dr(this.id);" name="dr_1_2" id="dr_1_2" >
                        <option value="">{{ __('index.seleccionar') }}</option>
                    </select>
                    <input  id="dr_1_2_count" name="dr_1_2_count" type="number" class="hidden" value="1">

                    </div>
                    <input type="text" style="display: none" id="dr_name_1_2" name="dr_name_1_2">
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
          {{--            --}}
                    <div class="flex w-1/2 justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.ventilacion') }}</b></label>
                    </div>
                    <div class="flex w-full justify-start">
                        <select onchange="valida_selects_inps(this.id);send_name_vent(this.id);"  style="margin-left: 2px;" class="w-full border-2 border-color-inps rounded-md py-2" name="ventilacion_1_2" id="ventilacion_1_2">

                        </select>
                        <input  id="ventilacion_1_2_count" name="ventilacion_1_2_count" type="number" class="hidden" value="1">
                        <input type="text" style="display: none" id="ventilacion_name_1_2" name="ventilacion_name_1_2">
                    </div>
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                    <div class="flex w-1/2 justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.filtracion') }}</b></label>
                    </div>
                    <div class="flex w-full justify-start">
                        <select onchange="valida_selects_inps(this.id);send_name_filt(this.id);"  style="width: 77%;margin-left:0px;" class="border-2 border-color-inps rounded-md py-1" name="filtracion_1_2" id="filtracion_1_2">

                        </select>
                        <input  id="filtracion_1_2_count" name="filtracion_1_2_count" type="number" class="hidden" value="1">
                        <input type="text" style="display: none" id="filtracion_name_1_2" name="filtracion_name_1_2">
                    </div>
                </div>


                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex w-1/3 justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.mantenimiento') }}</b></label>
                    </div>
                    <div class="flex w-full justify-start">
                        <select onchange="valida_selects_inps(this.id);"  style="margin-left: 2px;" class="w-full border-2 border-color-inps rounded-md py-2" name="csMantenimiento_1_2" id="csMantenimiento_1_2">
                            <option selected value="0">{{ __('index.seleccionar') }}</option>
                            <option value="ASHRAE 180">ASHRAE 180</option>
                            <option value="Deficiente">Deficiente</option>
                            <option value="Sin Mantenimiento">Sin Mantenimiento</option>
                        </select>
                        <input  id="csMantenimiento_1_2_count" name="csMantenimiento_1_2_count" type="number" class="hidden" value="1">

                    </div>
                    <input type="text" style="display: none" id="lblCsMantenimiento_1_2" name="lblCsMantenimiento_1_2" value="ASHRAE 180 Proactivo">
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                    <div class="flex w-1/2 justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.tipo_ambiente') }}</b></label>
                    </div>
                    <div class="flex w-full justify-start">
                        <select onchange="valida_selects_inps(this.id);show_prot_cond(this.value,'proteccion_condensador_1_2','new');"  style="width: 77%;margin-left:0px;" class="border-2 border-color-inps rounded-md py-1" name="tipo_ambiente_1_2" id="tipo_ambiente_1_2">
                            <option selected value="0">{{ __('index.seleccionar') }}</option>
                            <option value="no_agresivo">No Agresivo</option>
                            <option value="marino">Marino</option>
                            <option value="contaminado">Contaminado</option>
                        </select>
                        <input  id="tipo_ambiente_1_2_count" name="tipo_ambiente_1_2_count" type="number" class="hidden" value="1">
                    </div>
                </div>


                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                     <div class="flex w-1/3 justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.proteccion_condensador') }}</b></label>
                    </div>
                    <div class="flex w-full justify-start">
                        <select onchange="valida_selects_inps(this.id);send_value_box('proteccion_condensador_1_2','proteccion_condensador_1_2_value','tipo_ambiente_1_2');"  style="margin-left: 16px;" class="w-full border-2 border-color-inps rounded-md py-2" name="proteccion_condensador_1_2" id="proteccion_condensador_1_2">
                        </select>
                        <input  id="proteccion_condensador_1_2_count" name="proteccion_condensador_1_2_count" type="number" class="hidden" value="1">
                        <input  id="proteccion_condensador_1_2_value" name="proteccion_condensador_1_2_value" type="text" class="">
                    </div>
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.inversion inicial') }} (CAPEX)</b> </label>
                    </div>
                    <div class="w-1/2 flex justify-start text-left">
                         <input onchange="format_num(this.value,this.id);valida_selects_inps(this.id)"  class="w-full 2xl:w-full xl:w-full lg:w-3/6 border-2 border-color-inps rounded-md py-1 text-center" name="cheValorS_1_2" id="cheValorS_1_2" >
                         <input  id="cheValorS_1_2_count" name="cheValorS_1_2_count" type="number" class="hidden" value="1">

                        </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-3/6 flex justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.costo anual') }}</b> </label>
                    </div>

                    <div class="w-full flex gap-x-2 justify-start">
                        <div class="flex">
                            <input type="text" style="margin-left: 2.5px;" onchange="format_num(this.value,this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-color-inps rounded-md py-2 text-center"  name="maintenance_cost_1_2" id="maintenance_cost_1_2" >
                        </div>
                        <div class="flex justify-end">
                            <button onclick="inactive_display('sol_1')" type="button" class="py-1 px-3 border-2 border-red-500 rounded-md mr-5 text-xl text-orange-400 mt-1 hover:text-white hover:bg-orange-400"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
       </div>
      </div>
      {{-- 1.2 --}}

      {{-- 1.3 --}}
      {{-- <div class="grid w-full hidden"  id="sol_1_3" name="sol_1_3">
        <div class="mx-2">
            <hr>
           </div>

        <div class="flex">

            <div class="mt-2 mx-2 bg-gray-200 rounded-md shadow-md">
                <div class="grid gap-y-2 my-2">
                    <div class="flex w-full">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                           <div class="w-1/3 flex justify-start text-left">
                               <label style="font-size: 14px;" class="" for=""><b>{{ __('index.unidadhvac') }}</b> </label>
                           </div>
                           <div class="w-1/2 flex justify-start">
                               <select  class="w-full border-2 border-blue-600 rounded-md p-2" onchange="unidadHvac(this.value,3,'csTipo_1_3');check_chiller(this.value,'csStd_1_3',1);" name="cUnidad_1_3" id="cUnidad_1_3" >
                                    <option selected value="0">{{ __('index.seleccionar') }}</option>
                                   <option value="1">Paquetes (RTU)</option>
                                   <option value="2">Split DX</option>
                                   <option value="3">VRF No Ductados</option>
                                   <option value="4">VRF Ductados</option>
                                   <option value="5">PTAC/VTAC</option>
                                   <option value="6">WSHP</option>
                                   <option value="7">Minisplit Inverter</option>
                                   <option value="8">Chiller - Aire - Scroll Constante</option>
                                   <option value="9">Chiller - Aire - Scroll Variable</option>
                                   <option value="10">Chiller - Aire - Tornillo 4 Etapas</option>
                               </select>
                           </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                           <div class="w-1/2 flex justify-start text-left">
                               <label  class="labels" for=""><b>{{ __('index.tipo equipo') }}</b> </label>
                           </div>
                           <div class="w-full flex justify-start">
                            <select style="font-size: 14px" class="w-full border-2 border-blue-600 rounded-md py-2"  onchange="valida_selects_inps(this.id);change_diseño(this.value,3,'csDisenio_1_3','tipo_control_1_3','dr_1_3','lblCsTipo_1_3');"   name="csTipo_1_3" id="csTipo_1_3">
                            </select>
                            <input  id="csTipo_1_3_count" name="csTipo_1_3_count" type="number" class="hidden" value="1">

                           </div>
                            <input type="text" style="display: none" id="lblCsTipo_1_3" name="lblCsTipo_1_3">
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                           <div class="w-1/3 flex justify-start text-left">
                               <label  class="labels" for=""><b>{{ __('index.tipo diseño') }}</b> </label>
                           </div>
                           <div class="w-1/2 flex justify-start">
                            <select  onchange="valida_selects_inps(this.id);send_name(this.id);" class="w-full border-2 border-blue-600 rounded-md py-2" name="csDisenio_1_3" id="csDisenio_1_3">

                            </select>
                            <input  id="csDisenio_1_3_count" name="csDisenio_1_3_count" type="number" class="hidden" value="1">

                           </div>
                            <input type="text" style="display: none" id="name_diseno_1_3" name="name_diseno_1_3">
                            <input type="text" style="display: none" id="lblCsDisenio_1_3" name="lblCsDisenio_1_3" value="ASHRAE 55/62.1/90.1">
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                           <div class="flex w-1/2 justify-start text-left">
                               <label  class="labels" for=""><b>{{ __('index.capacidad termica') }}</b> </label>
                           </div>
                           <div class="flex w-full justify-start gap-x-2">
                               <div class="w-full">
                                   <input type="text" style="font-size: 14px;" onchange="valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);"  onkeypress="return soloNumeros(event)" class="w-full border-2 border-blue-600 rounded-md h-full text-center"  name="capacidad_total_1_3" id="capacidad_total_1_3">
                               </div>
                               <input  id="capacidad_total_1_3_count" name="capacidad_total_1_3_count" type="number" class="hidden" value="1">

                               <div class="w-full">
                                   <input class="w-full  border-2 border-blue-600 rounded-md py-2 text-center"  type="text" readonly name="unidad_capacidad_tot_1_3" id="unidad_capacidad_tot_1_3" >

                               </div>
                           </div>

                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                           <div class="w-1/3 flex justify-start text-left">
                               <label class="labels" for=""><b>{{ __('index.costo elec') }} $/Kwh</b> </label>
                           </div>
                           <div class="w-1/2 flex justify-start">
                            <input id="costo_elec_1_3" name="costo_elec_1_3" readonly onchange="valida_selects_inps(this.id);" onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full text-center border-2 border-blue-600 rounded-md py-1"><p style="font-size: 12px; margin:0px;"></p>
                           </div>
                           <input  id="costo_elec_1_3_count" name="costo_elec_1_3_count" type="number" class="hidden" value="1">

                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                           <div class="flex text-left justify-start w-1/3">
                               <label class="labels" for=""><b>{{ __('index.hors enf') }}</b> </label>
                           </div>
                           <div class="flex justify-start w-1/3">
                               <input type="text" style="font-size: 14px;" onchange="valida_selects_inps(this.id);" class="w-full border-2 border-blue-600 rounded-md py-1 text-center" name="hrsEnfriado_1_3" id="hrsEnfriado_1_3">
                           </div>
                           <input  id="hrsEnfriado_1_3_count" name="hrsEnfriado_1_3_count" type="number" class="hidden" value="1">

                       </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">
                           <div class="flex justify-start w-1/3">
                                <select name="csStd_1_3" id="csStd_1_3" style="padding-top: 0.43rem;padding-bottom: 0.43rem;" class="w-full border-2 border-blue-600 rounded-md text-center" onchange="check_send_efi(this.value,document.getElementById('cUnidad_1_3').value,'csStd_1_3');">

                                </select>
                            </div>
                           <div class="flex justify-start w-1/4">
                               <input type="number" onchange="valida_selects_inps(this.id);" id="csStd_cant_1_3" name="csStd_cant_1_3" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md py-1 text-center">
                               </div>
                               <input  id="csStd_cant_1_3_count" name="csStd_cant_1_3_count" type="number" class="hidden" value="1">

                           </div>

                           <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                               <div class="flex justify-start text-left w-1/2">
                                   <label  class="labels" for=""><b>{{ __('index.tipo control') }}</b> </label>
                               </div>

                               <div class="flex justify-start w-full">
                                <select class="w-full border-2 border-blue-600 rounded-md py-1"  onchange="valida_selects_inps(this.id);send_name_t_c(this.id);" name="tipo_control_1_3" id="tipo_control_1_3">

                                </select>
                                <input  id="tipo_control_1_3_count" name="tipo_control_1_3_count" type="number" class="hidden" value="1">

                               </div>
                                <input type="text" style="display: none" id="name_t_control_1_3" name="name_t_control_1_3">

                           </div>

                    </div>



                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                           <div class="w-1/3 flex justify-start text-left">
                               <label  class="labels" for=""><b>{{ __('index.dr') }}</b> </label>
                           </div>
                           <div class="w-full flex justify-start text-left">
                            <select style="width: 77%;" class="border-2 border-blue-600 rounded-md py-1"  onchange="valida_selects_inps(this.id);send_name_dr(this.id);" name="dr_1_3" id="dr_1_3" >


                            </select>
                            <input  id="dr_1_3_count" name="dr_1_3_count" type="number" class="hidden" value="1">

                           </div>
                            <input type="text" style="display: none" id="dr_name_1_3" name="dr_name_1_3">
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                           <div class="flex w-1/3 justify-start text-left">
                               <label class="labels" for=""><b>{{ __('index.mantenimiento') }}</b> </label>
                           </div>
                           <div class="flex w-full justify-start">
                            <select  style="margin-left: 2px;" class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);" name="csMantenimiento_1_3" id="csMantenimiento_1_3">
                               <option selected value="0">{{ __('index.seleccionar') }}</option>
                               <option value="ASHRAE 180">ASHRAE 180</option>
                               <option value="Deficiente">Deficiente</option>
                               <option value="Sin Mantenimiento">Sin Mantenimiento</option>
                            </select>
                            <input  id="csMantenimiento_1_3_count" name="csMantenimiento_1_3_count" type="number" class="hidden" value="1">

                           </div>
                            <input type="text" style="display: none" id="lblCsMantenimiento_1_3" name="lblCsMantenimiento_1_3" value="ASHRAE 180 Proactivo">

                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                           <div class="w-1/3 flex justify-start text-left">
                               <label  class="labels" for=""><b>{{ __('index.inversion inicial') }} (CAPEX)</b> </label>
                           </div>
                           <div class="w-1/2 flex justify-start text-left">
                                <input onchange="format_num(this.value,this.id);valida_selects_inps(this.id)"  class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center" name="cheValorS_1_3" id="cheValorS_1_3" >
                           </div>
                       </div>
                       <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="w-3/6 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.costo anual') }}</b> </label>
                        </div>

                        <div class="w-full flex gap-x-2 justify-start">
                            <div class="flex">
                                <input type="text" style="margin-left: 2.5px;" onchange="format_num(this.value,this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center"  name="maintenance_cost_1_3" id="maintenance_cost_1_3" >
                            </div>
                            <div class="flex justify-end">
                                <button onclick="inactive_display('sol_1')"  type="button" class="py-1 px-3 border-2 border-red-500 rounded-md mr-5 text-xl text-orange-400 mt-1 hover:text-white hover:bg-orange-400"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                    </div>

           </div>
         </div>
        </div>
       </div> --}}
       {{-- 1.3 --}}

       <a id="final1" name="final1" href=""></a>
       {{-- 1.4 --}}
        {{-- <table  style="margin-right:15px; border-right: 1px solid rgb(177, 177, 177); text-align: left; width: 80%">
            <thead>
                <th colspan="2" class="cooling" style="text-align: center !important"><h2>ENFRIAMIENTO SOLUCIÓN 1</h2></th>
            </thead>
            <tr>
                <td style="max-width: 185px; min-width: 160px"><label for="">Capacidad del equipo</label></td>
                <td>
                    <input class="fcontrol" type="number" step="0.5" name="cSize" id="cSize" style="width: 50% !important">
                    <select class="fcontrol" name="cUnidad" id="cUnidad" style="width: 43% !important">
                        <option value="0">TR</option>
                        <option value="1">Kw</option>
                        <option value="2">Btuh</option>
                    </select>
                    <input style="display: none" id="cUnidadLbl" name="cUnidadLbl" value="TR" />
                </td>
            </tr>
            <tr>
                <td><label for="">Tarifa electrica</label></td>
                <td>
                    <input class="fcontrol" type="number" step="0.01" name="cTarifa" id="cTarifa" style="width: 50% !important;">
                    <label for="" style="width: 45% !important;">$/Kw</label>
                </td>
            </tr>
            <tr>
                <td><label for="">Horas de enfriado</label></td>
                <td>
                    <input class="fcontrol w50" type="number" step="0.01" name="hrsEnfriado" id="hrsEnfriado">
                </td>
            </tr>
            <tr>
                <td>
                    <select name="csStd" id="csStd" class="fcontrol" style="width: 85%">
                        <option value="0">SEER</option>
                        <option value="1">IEER</option>
                        <option value="2" disabled>IPVL</option>
                    </select>
                    <input style="display: none" id="lblCsStd" name="lblCsStd" value="SEER" />
                </td>
                <td>
                    <input class="fcontrol w30" type="number" step="0.5" name="csStdValue" id="csStdValue">
                    <label for="" class="w30" style="display: inline-block; text-align: right">Tipo de equipo</label>
                    <select class="fcontrol w30"  name="csTipo" id="csTipo">
                        <option value="0">Tipo paquete</option>
                        <option value="1">Split</option>
                        <option value="2">Mini Split</option>
                        <option value="3">VRF</option>
                        <option value="4">c/Economizador</option>
                        <option value="5">c/Economizador y VAV</option>
                        <option value="6">Chillers Standard</option>
                        <option value="7">Chillers Variable</option>
                    </select>
                    <input type="text" style="display: none" id="lblCsTipo" name="lblCsTipo" value="Tipo paquete">
                </td>
            </tr>
            <tr>
                <td><label for="">Diseño Sistema</label></td>
                <td>
                    <select class="fcontrol w30" name="csDisenio" id="csDisenio">
                        <option value="0">ASHRAE 55/62.1/90.1</option>
                        <option value="1">Básico</option>
                        <option value="2">Básico c/ducto Flexible</option>
                        <option value="3">Ducto Flex. y Plenum Ret.</option>
                    </select>
                    <input type="text" style="display: none" id="lblCsDisenio" name="lblCsDisenio" value="ASHRAE 55/62.1/90.1">
                    <label for="" class="w30" style="display: inline-block; text-align: right">Mantenimiento</label>
                    <select class="fcontrol w30" name="csMantenimiento" id="csMantenimiento">
                        <option value="0">ASHRAE 180 Proactivo</option>
                        <option value="1">Deficiente</option>
                        <option value="2">Sin Mantenimiento</option>
                    </select>
                    <input type="text" style="display: none" id="lblCsMantenimiento" name="lblCsMantenimiento" value="ASHRAE 180 Proactivo">
                </td>
            </tr>
            {{-- <tr>
                <td><label for="">Diseño</label></td>
                <td>
                    <select class="fcontrol w50" name="csDisenio" id="csDisenio">
                        <option value="0">ASHRAE 55/62.1/90.1</option>
                        <option value="1">Básico</option>
                        <option value="2">Básico c/ducto Flexible</option>
                        <option value="3">Ducto Flex. y Plenum Ret.</option>
                    </select>
                    <input type="text" style="display: none" id="lblCsDisenio" name="lblCsDisenio" value="ASHRAE 55/62.1/90.1">
                </td>
            </tr> --------
            <tr>
                <td><label for="">Valor estimado</label></td>
                <td>
                    <span style="max-width: 5%; padding-right: 5px">$   </span><input style="max-width: 47%" class="fcontrol"  step="0.01" name="cheValorS" id="cheValorS" >
                </td>
            </tr>
        </table> --}}
    </div>
</div>
    <div style="width: 100%" class="mx-1">
        {{-- 2.1 --}}
        <div  class="text-white rounded-t-xl w-80 bg-orange-500 2xl:flex xl:flex lg:grid justify-between 2xl:py-3 xl:py-3 lg:py-0 ">
            <div class="ml-5 2xl:w-10 xl:w-auto lg:w-1/4 flex justify-start">
                <a href="#final2">
                    <button onclick="active_display('sol_2');" type="button"  class="rounded-xl p-1 m-0 hover-button-plus text-3xl"><i class="fa-solid fa-plus text-white "></i></button>
                </a>
            <input type="number" class="hidden" value="2" id="cont_sol_2" name="cont_sol_2">
            </div>
            <div class="2xl:ml-5 xl:ml-5 lg:ml-10 w-full flex 2xl:justify-center xl:justify-center lg:justify-center py-1">
                <h2 style="margin-right: 75px;" class="text-white font-bold justify-start text-3xl">{{ __('index.solucion') }} B</h2>
            </div>
          {{--   <div cslass="w-1/2 flex justify-start">
                <h2 class="text-white font-bold justify-start">ENFRIAMIENTO SOLUCIÓN 1</h2>
            </div> --}}
        </div>
        <div class="border-r-2 border-l-2 border-blue-500" id="2_border_bottom" name="2_border_bottom">


        <div class="grid w-full">

            <div class="flex">
                <div class="w-full mx-2 mt-2 rounded-md shadow-xl">
                  <div class="grid gap-y-1 my-2">
                    <div class="flex w-full gap-x-1">
                        <div class="lg:grid 2xl:flex xl:flex  gap-x-1 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.unidadhvac') }}</b> </label>
                            </div>
                            <div class="w-1/2 flex justify-start">
                                <select class="w-full border-2 border-color-inps rounded-md p-2" onchange="unidadHvac(this.value,1,'cheTipo_2_1');check_chiller(this.value,'csStd_2_1',1);send_value_equipo_marcas(this.id,this.value,'marca_2_1');"  name="cUnidad_2_1" id="cUnidad_2_1" >
                                    <option value="0">{{ __('index.seleccionar') }}</option>
                                    <option value="1">Paquetes (RTU)</option>
                                    <option value="2">Split DX</option>
                                    <option value="3">VRF No Ductados</option>
                                    <option value="4">VRF Ductados</option>
                                    <option value="5">PTAC/VTAC</option>
                                    <option value="6">WSHP</option>
                                    <option value="7">Minisplit Inverter</option>
       {{--                             <option value="8">Chiller - Aire - Scroll Constante</option>
                            <option value="9">Chiller - Aire - Scroll Variable</option>
                            <option value="10">Chiller - Aire - Tornillo 4 Etapas</option> --}}
                                </select>
                            </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/2 text-left">
                                <label class="labels" for=""><b>{{ __('index.tipo equipo') }}</b> </label>
                            </div>
                            <div class="w-full flex justify-start">
                                <select style="font-size: 14px" class="w-full border-2 border-color-inps rounded-md py-2" onchange="valida_selects_inps(this.id);change_diseño(this.value,1,'cheDisenio_2_1','tipo_control_2_1','dr_2_1','ventilacion_2_1','filtracion_2_1','lblCsTipo_2_1');"  name="cheTipo_2_1" id="cheTipo_2_1">

                                </select>
                             </div>
                             <input  id="cheTipo_2_1_count" name="cheTipo_2_1_count" type="number" class="hidden" value="1">
                            <input type="text" style="display: none" id="lblCsTipo_2_1" name="lblCsTipo_2_1">
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.marca') }}</b> </label>
                            </div>

                            <div class="w-1/2 flex justify-start">
                                <select name="marca_2_1" id="marca_2_1" class="w-full border-2 border-color-inps rounded-md py-2" onchange="valida_selects_inps(this.id);send_modelos(this.value,'modelo_2_1');send_marca_to_modal(this.value,'marcas_modal_2_1');">

                                </select>
                            <input  id="marca_2_1_count" name="marca_2_1_count" type="number" class="hidden" value="1">

                            </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/2 text-left">
                                <label class="labels" for=""><b>{{ __('index.modelo') }}</b> </label>
                            </div>
                            <div class="w-full flex justify-start">
                                <select style="font-size: 14px" class="w-full border-2 border-color-inps rounded-md py-2" onchange="valida_selects_inps(this.id);check_enfi_mod(this.value,'csStd_2_1',this.id,'cUnidad_1_1');"  name="modelo_2_1" id="modelo_2_1">
                                </select>
                            <input  id="modelo_2_1_count" name="modelo_2_1_count" type="number" class="hidden" value="1">

                            </div>


                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/3 text-left">
                                <label  class="labels" for=""><b>{{ __('index.capacidad termica') }}</b> </label>
                            </div>
                            <div class="flex w-1/2 justify-start gap-x-2">
                                <div class="w-full">
                                    <input name="capacidad_total_2_1" id="capacidad_total_2_1" style="margin-left: 2.3px;" onchange="valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);"  onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md py-2 text-center" >
                                </div>
                                <input  id="capacidad_total_2_1_count" name="capacidad_total_2_1_count" type="number" class="hidden" value="1">
                                <div class="w-full">
                                    <input type="text" class="w-full border-2 border-color-inps rounded-md py-2 text-center" readonly name="unidad_capacidad_tot_2_1" id="unidad_capacidad_tot_2_1" >

                                 </div>
                             </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                             <div class="w-1/2 flex justify-start text-left">
                                <label  class="labels" for=""><b>{{ __('index.efi') }}</b> </label>
                            </div>

                            <div class="flex w-full justify-start gap-x-2">
                                <div class="flex justify-start w-1/3">
                                    {{--                                 <input name="csStd_2_1" readonly id="csStd_2_1" style="padding-top: 0.425rem;padding-bottom: 0.248rem;" class="w-full border-2 border-color-inps rounded-md py-1 text-center">
                                     --}}
                                    <select name="csStd_2_1" id="csStd_2_1" style="padding-top: 0.43rem;padding-bottom: 0.43rem;font-size: 14px;" onchange="check_send_efi(this.value,document.getElementById('cUnidad_2_1').value,'csStd_2_1');" class="w-full border-2 border-color-inps rounded-md text-center">

                                    </select>
                                </div>

                                <div class="flex justify-start w-1/3">
                                    <input onchange="valida_selects_inps(this.id);"  name="csStd_cant_2_1" id="csStd_cant_2_1" type="text" style="font-size: 14px;" class="text-center w-full border-2 border-color-inps rounded-md">
                                    <input  id="csStd_cant_2_1_count" name="csStd_cant_2_1_count" type="number" class="hidden" value="1">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                            <div class="w-1/3 flex justify-start text-left" title="Costo Eléctrico">
                                <label style="" class="labels" for=""><b>{{ __('index.costo elec') }} $/Kwh</b> </label>
                            </div>

                            <div class="w-1/2 flex justify-start">
                            <input name="costo_elec_2_1" id="costo_elec_2_1" readonly onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full text-center border-2 border-color-inps rounded-md py-1">
                            <input  id="costo_elec_2_1_count" name="costo_elec_2_1_count" type="number" class="hidden" value="1">
                        </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/3 text-left">
                                <label class="labels" for=""><b>{{ __('index.hors enf') }}</b> </label>
                            </div>
                            <div class="flex justify-start w-1/3">
                                <input type="text" style="font-size: 14px;margin-left:1px;" onchange="valida_selects_inps(this.id);" class="w-full border-2 border-color-inps rounded-md py-1 text-center" name="hrsEnfriado_2_1" id="hrsEnfriado_2_1" readonly>
                                <input  id="hrsEnfriado_2_1_count" name="hrsEnfriado_2_1_count" type="number" class="hidden" value="1">
                            </div>
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">
                            <div class="w-1/3 flex justify-start text-left">
                                <label  class="labels" for=""><b>{{ __('index.tipo diseño') }}</b> </label>
                            </div>
                            <div class="w-1/2 flex justify-start">
                                <select class="w-full border-2 border-color-inps rounded-md py-2" onchange="valida_selects_inps(this.id);send_name(this.id);" name="cheDisenio_2_1" id="cheDisenio_2_1">

                                </select>
                            </div>
                            <input  id="cheDisenio_2_1_count" name="cheDisenio_2_1_count" type="number" class="hidden" value="1">
                            <input type="text" style="display: none" id="name_diseno_2_1" name="name_diseno_2_1">


                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                            <div class="flex justify-start text-left w-1/2">
                                <label class="labels" for=""><b>{{ __('index.tipo control') }}</b> </label>
                            </div>
                            <div class="flex justify-start w-full">
                            <select class="w-full border-2 border-color-inps rounded-md py-1"  onchange="valida_selects_inps(this.id);send_name_t_c(this.id);"  name="tipo_control_2_1" id="tipo_control_2_1">

                            </select>
                            <input  id="tipo_control_2_1_count" name="tipo_control_2_1_count" type="number" class="hidden" value="1">

                            </div>
                            <input type="text" style="display: none" id="name_t_control_2_1" name="name_t_control_2_1">
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label style="margin-left:2.5px;" class="labels" for=""><b>{{ __('index.dr') }}</b> </label>
                            </div>
                            <div class="w-full flex justify-start">
                            <select  style="width: 77%;" class="border-2 border-color-inps rounded-md py-1" onchange="valida_selects_inps(this.id);send_name_dr(this.id);" name="dr_2_1" id="dr_2_1" >


                            </select>
                            </div>
                            <input type="text" style="display: none" id="dr_name_2_1"   name="dr_name_2_1">
                            <input  id="dr_2_1_count" name="dr_2_1_count" type="number" class="hidden" value="1">
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">

                            <div class="flex w-1/2 justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.ventilacion') }}</b></label>
                            </div>
                            <div class="flex w-full justify-start">
                                <select onchange="valida_selects_inps(this.id);send_name_vent(this.id);"  style="margin-left: 2px;" class="w-full border-2 border-color-inps rounded-md py-2" name="ventilacion_2_1" id="ventilacion_2_1">

                                </select>
                                <input  id="ventilacion_2_1_count" name="ventilacion_2_1_count" type="number" class="hidden" value="1">
                                <input type="text" style="display: none" id="ventilacion_name_2_1" name="ventilacion_name_2_1">
                            </div>
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                            <div class="flex w-1/2 justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.filtracion') }}</b></label>
                            </div>
                            <div class="flex w-full justify-start">
                                <select onchange="valida_selects_inps(this.id);send_name_filt(this.id);"  style="width: 77%;margin-left:0px;" class="border-2 border-color-inps rounded-md py-1" name="filtracion_2_1" id="filtracion_2_1">

                                </select>
                                <input  id="filtracion_2_1_count" name="filtracion_2_1_count" type="number" class="hidden" value="1">
                                <input type="text" style="display: none" id="filtracion_name_2_1" name="filtracion_name_2_1">
                            </div>
                        </div>


                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex w-1/3 justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.mantenimiento') }}</b> </label>
                            </div>
                            <div class="flex w-full justify-start">
                                <select style="margin-left: 0px;" class="w-full border-2 border-color-inps rounded-md py-2" name="csMantenimiento_2_1" id="csMantenimiento_2_1" onchange="valida_selects_inps(this.id);">
                                    <option value="0">{{ __('index.seleccionar') }}</option>
                                    <option value="ASHRAE 180">ASHRAE 180</option>
                                    <option value="Deficiente">Deficiente</option>
                                    <option value="Sin Mantenimiento">Sin Mantenimiento</option>
                                </select>
                                <input  id="csMantenimiento_2_1_count" name="csMantenimiento_2_1_count" type="number" class="hidden" value="1">

                            </div>
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                            <div class="flex w-1/2 justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.tipo_ambiente') }}</b></label>
                            </div>
                            <div class="flex w-full justify-start">
                                <select onchange="valida_selects_inps(this.id);show_prot_cond(this.value,'proteccion_condensador_2_1','new');"  style="width: 77%;margin-left:0px;" class="border-2 border-color-inps rounded-md py-1" name="tipo_ambiente_2_1" id="tipo_ambiente_2_1">
                                    <option selected value="0">{{ __('index.seleccionar') }}</option>
                                    <option value="no_agresivo">No Agresivo</option>
                                    <option value="marino">Marino</option>
                                    <option value="contaminado">Contaminado</option>
                                </select>
                                <input  id="tipo_ambiente_2_1_count" name="tipo_ambiente_2_1_count" type="number" class="hidden" value="1">
                            </div>
                        </div>


                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                             <div class="flex w-1/3 justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.proteccion_condensador') }}</b></label>
                            </div>
                            <div class="flex w-full justify-start">
                                <select onchange="valida_selects_inps(this.id);send_value_box('proteccion_condensador_2_1','proteccion_condensador_2_1_value','tipo_ambiente_2_1');"  style="margin-left: 16px;" class="w-full border-2 border-color-inps rounded-md py-2" name="proteccion_condensador_2_1" id="proteccion_condensador_2_1">
                                </select>
                                <input  id="proteccion_condensador_2_1_count" name="proteccion_condensador_2_1_count" type="number" class="hidden" value="1">
                                <input  id="proteccion_condensador_2_1_value" name="proteccion_condensador_2_1_value" type="text" class="hidden">
                            </div>
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                            <div class="w-1/3 flex justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.inversion inicial') }} (CAPEX)</b></label>
                            </div>
                            <div class="w-1/2 flex justify-start text-left">
                                <input type="text"  onchange="format_num(this.value,this.id);valida_selects_inps(this.id)"  class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-color-inps rounded-md py-1 text-center" name="cheValorS_2_1" id="cheValorS_2_1" >
                                <input  id="cheValorS_2_1_count" name="cheValorS_2_1_count" type="number" class="hidden" value="1">

                            </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.costo anual') }}</b> </label>
                            </div>

                            <div class="w-1/2 flex justify-start">
                                <input type="text" style="margin-left: 3px;" onchange="format_num(this.value,this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-color-inps rounded-md py-1 text-center"  name="maintenance_cost_2_1" id="maintenance_cost_2_1" >
                            </div>
                        </div>


                    </div>
                  </div>
                </div>
               </div>
        </div>
        {{-- 2.1 --}}
        {{-- 2.2 --}}
      <div class="grid w-full hidden mb-1"  id="sol_2_2" name="sol_2_2">
        <div class="mx-2">
            <hr>
        </div>
        <div class="flex">
            <div class="mt-3  mx-2  rounded-md shadow-xl">
              <div class="grid gap-y-1 my-2">
                <div class="flex w-full gap-x-1">
                    <div class="lg:grid 2xl:flex xl:flex  gap-x-1 w-1/2">
                        <div class="w-1/3 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.unidadhvac') }}</b> </label>
                        </div>
                        <div class="w-1/2 flex justify-start">
                            <select style="margin-left:1px;" class="w-full border-2 border-color-inps rounded-md p-2"  onchange="unidadHvac(this.value,2,'cheTipo_2_2');check_chiller(this.value,'csStd_2_2',1);send_value_equipo_marcas(this.id,this.value,'marca_2_2');"  name="cUnidad_2_2" id="cUnidad_2_2" >
                                <option value="0">{{ __('index.seleccionar') }}</option>
                                <option value="1">Paquetes (RTU)</option>
                                <option value="2">Split DX</option>
                                <option value="3">VRF No Ductados</option>
                                <option value="4">VRF Ductados</option>
                                <option value="5">PTAC/VTAC</option>
                                <option value="6">WSHP</option>
                                <option value="7">Minisplit Inverter</option>
{{--                             <option value="8">Chiller - Aire - Scroll Constante</option>
                            <option value="9">Chiller - Aire - Scroll Variable</option>
                            <option value="10">Chiller - Aire - Tornillo 4 Etapas</option> --}}
                            </select>
                        </div>
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="w-1/2 flex justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.tipo equipo') }}</b> </label>
                        </div>
                        <div class="w-full flex justify-start">
                        <select style="font-size: 14px" class="w-full border-2 border-color-inps rounded-md py-2"  onchange="valida_selects_inps(this.id);change_diseño(this.value,2,'cheDisenio_2_2','tipo_control_2_2','dr_2_2','ventilacion_2_2','filtracion_2_2','lblCsTipo_2_2');"  name="cheTipo_2_2" id="cheTipo_2_2">
                        </select>
                        </div>
                        <input  id="cheTipo_2_2_count" name="cheTipo_2_2_count" type="number" class="hidden" value="1">

                        <input type="text" style="display: none" id="lblCsTipo_2_2" name="lblCsTipo_2_2">
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="w-1/3 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.marca') }}</b> </label>
                        </div>

                        <div class="w-1/2 flex justify-start">
                            <select name="marca_2_2" id="marca_2_2" class="w-full border-2 border-color-inps rounded-md py-2" onchange="valida_selects_inps(this.id);send_modelos(this.value,'modelo_2_2');send_marca_to_modal(this.value,'marca_2_2');">

                            </select>
                        <input  id="marca_2_2_count" name="marca_2_2_count" type="number" class="hidden" value="1">

                        </div>
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="flex justify-start w-1/2 text-left">
                            <label class="labels" for=""><b>{{ __('index.modelo') }}</b> </label>
                        </div>
                        <div class="w-full flex justify-start">
                            <select style="font-size: 14px" class="w-full border-2 border-color-inps rounded-md py-2" onchange="valida_selects_inps(this.id);check_enfi_mod(this.value,'csStd_2_2',this.id,'cUnidad_2_1');"  name="modelo_2_2" id="modelo_2_2">
                            </select>
                        <input  id="modelo_2_2_count" name="modelo_2_2_count" type="number" class="hidden" value="1">

                        </div>


                    </div>
                </div>


                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="flex w-1/3 justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.capacidad termica') }}</b> </label>
                        </div>
                        <div class="flex w-1/2 justify-start gap-x-2">
                            <div class="w-full">
                                <input style="margin-left: 2.3px;" id="capacidad_total_2_2" name="capacidad_total_2_2" onchange="valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);"  onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md py-2 text-center" >
                                <input  id="capacidad_total_2_2_count" name="capacidad_total_2_2_count" type="number" class="hidden" value="1">

                            </div>
                             <div class="w-full">
                                <input class="w-full border-2 border-color-inps rounded-md py-2 text-center"  type="text" readonly name="unidad_capacidad_tot_2_2" id="unidad_capacidad_tot_2_2" >
                            </div>
                        </div>
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="w-1/2 flex justify-start text-left">
                            <label  class="labels" for=""><b>{{ __('index.efi') }}</b> </label>
                        </div>

                        <div class="flex w-full justify-start gap-x-2">
                            <div class="flex justify-start w-1/3">
                                <select name="csStd_2_2" id="csStd_2_2" style="padding-top: 0.43rem;padding-bottom: 0.43rem;font-size: 14px;"  class="w-full border-2 border-color-inps rounded-md text-center" onchange="check_send_efi(this.value,document.getElementById('cUnidad_2_2').value,'csStd_2_2');">
                                </select>
                            </div>
                            <div class="flex justify-start w-1/3">
                                <input  name="csStd_cant_2_2" id="csStd_cant_2_2" type="text" style="font-size: 14px;" onchange="valida_selects_inps(this.id);" class="w-full border-2 border-color-inps rounded-md py-1 text-center">
                                <input  id="csStd_cant_2_2_count" name="csStd_cant_2_2_count" type="number" class="hidden" value="1">

                            </div>
                        </div>

                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                        <div class="w-1/3 flex justify-start text-left" title="Costo Eléctrico">
                            <label  class="labels" for=""><b>{{ __('index.costo elec') }} $/Kwh</b> </label>
                        </div>
                        <div class="w-1/2 flex justify-start">
                        <input name="costo_elec_2_2" id="costo_elec_2_2" readonly onchange="valida_selects_inps(this.id);" onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full text-center border-2 border-color-inps rounded-md py-1">
                        <input  id="costo_elec_2_2_count" name="costo_elec_2_2_count" type="number" class="hidden" value="1">

                        </div>
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">

                        <div class="flex justify-start w-1/3 text-left">
                            <label class="labels" for=""><b>{{ __('index.hors enf') }}</b> </label>
                        </div>
                        <div class="flex justify-start w-1/3">
                            <input type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md py-1 text-center" onchange="valida_selects_inps(this.id);"  step="0.01" name="hrsEnfriado_2_2" id="hrsEnfriado_2_2" readonly>
                            <input  id="hrsEnfriado_2_2_count" name="hrsEnfriado_2_2_count" type="number" class="hidden" value="1">
                        </div>
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">
                        <div class="w-1/3 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.tipo diseño') }}</b> </label>
                        </div>
                        <div class="w-1/2 flex justify-start">
                            <select class="w-full border-2 border-color-inps rounded-md py-2"  onchange="valida_selects_inps(this.id);send_name(this.id);" name="cheDisenio_2_2" id="cheDisenio_2_2">

                            </select>
                        </div>
                        <input  id="cheDisenio_2_2_count" name="cheDisenio_2_2_count" type="number" class="hidden" value="1">

                        <input type="text" style="display: none" id="name_diseno_2_2" name="name_diseno_2_2">
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                        <div class="flex justify-start text-left w-1/2">
                            <label class="labels" for=""><b>{{ __('index.tipo control') }}</b> </label>
                        </div>

                        <div class="flex justify-start w-full">
                            <select class="w-full border-2 border-color-inps rounded-md py-1"  onchange="valida_selects_inps(this.id);send_name_t_c(this.id);"  name="tipo_control_2_2" id="tipo_control_2_2">
                            </select>
                            <input  id="tipo_control_2_2_count" name="tipo_control_2_2_count" type="number" class="hidden" value="1">

                        </div>
                        <input type="text" style="display: none" id="name_t_control_2_2" name="name_t_control_2_2">
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                        <div class="w-1/3 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.dr') }}</b> </label>
                        </div>
                        <div class="w-full flex justify-start">
                        <select style="width: 77%;" class="border-2 border-color-inps rounded-md py-1"  onchange="valida_selects_inps(this.id);send_name_dr(this.id);" name="dr_2_2" id="dr_2_2" >
                        </select>
                        <input  id="dr_2_2_count" name="dr_2_2_count" type="number" class="hidden" value="1">

                        </div>
                        <input type="text" style="display: none" id="dr_name_2_2" name="dr_name_2_2">
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        {{--  --}}
                        <div class="flex w-1/2 justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.ventilacion') }}</b></label>
                        </div>
                        <div class="flex w-full justify-start">
                            <select onchange="valida_selects_inps(this.id);send_name_vent(this.id);"  style="margin-left: 2px;" class="w-full border-2 border-color-inps rounded-md py-2" name="ventilacion_2_2" id="ventilacion_2_2">

                            </select>
                            <input  id="ventilacion_2_2_count" name="ventilacion_2_2_count" type="number" class="hidden" value="1">

                        </div>
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                        <div class="flex w-1/2 justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.filtracion') }}</b></label>
                        </div>
                        <div class="flex w-full justify-start">
                            <select onchange="valida_selects_inps(this.id);send_name_filt(this.id);"  style="width: 77%;margin-left:0px;" class="border-2 border-color-inps rounded-md py-1" name="filtracion_2_2" id="filtracion_2_2">

                            </select>
                            <input  id="filtracion_2_2_count" name="filtracion_2_2_count" type="number" class="hidden" value="1">
                            <input type="text" style="display: none" id="ventilacion_name_2_2" name="ventilacion_name_2_2">
                        </div>
                    </div>


                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="flex w-1/3 justify-start text-left">
                            <label  class="labels" for=""><b>{{ __('index.mantenimiento') }}</b> </label>
                        </div>
                        <div class="flex w-full justify-start">
                            <select style="margin-left: 1px;" class="w-full border-2 border-color-inps rounded-md py-2" name="cheMantenimiento_2_2" id="cheMantenimiento_2_2" onchange="valida_selects_inps(this.id);">
                                <option value="">{{ __('index.seleccionar') }}</option>
                                <option value="ASHRAE 180">ASHRAE 180</option>
                                <option value="Deficiente">Deficiente</option>
                                <option value="Sin Mantenimiento">Sin Mantenimiento</option>
                            </select>
                            <input  id="cheMantenimiento_2_2_count" name="cheMantenimiento_2_2_count" type="number" class="hidden" value="1">
                            <input type="text" style="display: none" id="filtracion_name_2_2" name="filtracion_name_2_2">
                        </div>
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                        <div class="flex w-1/2 justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.tipo_ambiente') }}</b></label>
                        </div>
                        <div class="flex w-full justify-start">
                            <select onchange="valida_selects_inps(this.id);show_prot_cond(this.value,'proteccion_condensador_2_2','new');"  style="width: 77%;margin-left:0px;" class="border-2 border-color-inps rounded-md py-1" name="tipo_ambiente_2_2" id="tipo_ambiente_2_2">
                                <option selected value="0">{{ __('index.seleccionar') }}</option>
                                <option value="no_agresivo">No Agresivo</option>
                                <option value="marino">Marino</option>
                                <option value="contaminado">Contaminado</option>
                            </select>
                            <input  id="tipo_ambiente_2_2_count" name="tipo_ambiente_2_2_count" type="number" class="hidden" value="1">
                        </div>
                    </div>


                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                         <div class="flex w-1/3 justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.proteccion_condensador') }}</b></label>
                        </div>
                        <div class="flex w-full justify-start">
                            <select onchange="valida_selects_inps(this.id);send_value_box('proteccion_condensador_2_2','proteccion_condensador_2_2_value','tipo_ambiente_2_2');"  style="margin-left: 16px;" class="w-full border-2 border-color-inps rounded-md py-2" name="proteccion_condensador_2_2" id="proteccion_condensador_2_2">
                            </select>
                            <input  id="proteccion_condensador_2_2_count" name="proteccion_condensador_2_2_count" type="number" class="hidden" value="1">
                            <input  id="proteccion_condensador_2_2_value" name="proteccion_condensador_2_2_value" type="text" class="hidden">
                        </div>
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                            <div class="w-1/3 flex justify-start text-left">
                                <label  class="labels" for=""><b>{{ __('index.inversion inicial') }} (CAPEX)</b> </label>
                            </div>
                            <div class="w-1/2 flex justify-start text-left">
                                <input onchange="format_num(this.value,this.id);valida_selects_inps(this.id)"  class="2xl:w-full xl:w-full xl:w-full lg:w-3/6 border-2 border-color-inps rounded-md py-1 text-center"   name="cheValorS_2_2" id="cheValorS_2_2" >
                                <input  id="cheValorS_2_2_count" name="cheValorS_2_2_count" type="number" class="hidden" value="1">

                            </div>
                    </div>
                    <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                        <div class="w-3/6 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.costo anual') }}</b> </label>
                        </div>

                        <div class="w-full flex gap-x-2 justify-start">
                            <div class="flex">
                                <input type="text" onchange="format_num(this.value,this.id);" class="2xl:w-full xl:w-full xl:w-full lg:w-3/6 border-2 border-color-inps rounded-md py-2 text-center"  name="maintenance_cost_2_2" id="maintenance_cost_2_2" >
                            </div>
                            <div class="flex justify-end">
                                <button onclick="inactive_display('sol_2')" type="button" class="py-1 px-3 border-2 border-red-500 rounded-md mr-5 text-xl text-orange-400 mt-1 hover:text-white hover:bg-orange-400"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
           </div>
       </div>
       {{-- 2.2 --}}

       {{-- 2.3 --}}
       {{-- <div class="grid w-full hidden"  id="sol_2_3" name="sol_1_3">
        <div class="mx-2">
            <hr>
        </div>
        <div class="flex">
            <div class="mt-2 mx-2 bg-gray-200 rounded-md shadow-md">
              <div class="grid gap-y-2 my-2">
                <div class="flex w-full gap-x-1">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="w-1/3 flex justify-start text-left">
                            <label  class="labels" for=""><b>{{ __('index.unidadhvac') }}</b> </label>
                        </div>
                        <div class="w-1/2 flex justify-start">
                            <select class="w-full border-2 border-blue-600 rounded-md p-2" onchange="unidadHvac(this.value,3,'cheTipo_2_3');check_chiller(this.value,'csStd_2_3',1);" name="cUnidad_2_3" id="cUnidad_2_3" >
                                <option value="0">{{ __('index.seleccionar') }}</option>
                                <option value="1">Paquetes (RTU)</option>
                                <option value="2">Split DX</option>
                                <option value="3">VRF No Ductados</option>
                                <option value="4">VRF Ductados</option>
                                <option value="5">PTAC/VTAC</option>
                                <option value="6">WSHP</option>
                                <option value="7">Minisplit Inverter</option>
                                <option value="8">Chiller - Aire - Scroll Constante</option>
                                <option value="9">Chiller - Aire - Scroll Variable</option>
                                <option value="10">Chiller - Aire - Tornillo 4 Etapas</option>
                            </select>
                    </div>
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                         <div class="w-1/2 flex justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.tipo equipo') }}</b> </label>
                         </div>
                         <div class="w-full flex justify-start">
                        <select style="font-size: 14px" class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);change_diseño(this.value,3,'cheDisenio_2_3','tipo_control_2_3','dr_2_3','lblCsTipo_2_3');"  name="cheTipo_2_3" id="cheTipo_2_3">

                        </select>
                        </div>
                        <input  id="cheTipo_2_3_count" name="cheTipo_2_3_count" type="number" class="hidden" value="1">
                        <input type="text" style="display: none" id="lblCsTipo_2_3" name="lblCsTipo_2_3">
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="w-1/3 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.tipo diseño') }}</b> </label>
                        </div>
                        <div class="w-1/2 flex justify-start">
                            <select class="w-full border-2 border-blue-600 rounded-md py-2"  onchange="send_name(this.id);" name="cheDisenio_2_3" id="cheDisenio_2_3">

                            </select>
                        </div>
                        <input type="text" style="display: none" id="name_diseno_2_3" name="name_diseno_2_3">
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="flex w-1/2 justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.capacidad termica') }}</b> </label>
                        </div>

                        <div class="flex w-full justify-start gap-x-2">
                            <div class="w-full">
                                <input style="margin-left: 2.3px;" name="capacidad_total_2_3" id="capacidad_total_2_3" onchange="format_nums_no_$(this.value,this.id);"  onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md py-2 text-center" >
                            </div>
                            <div class="w-full">
                                <input class="w-full h-full border-2 border-blue-600 rounded-md py-2 text-center"  type="text" readonly name="unidad_capacidad_tot_2_3" id="unidad_capacidad_tot_2_3" >
                            </div>
                        </div>

                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                        <div class="w-1/3 flex justify-start text-left" title="Costo Eléctrico">
                            <label  class="labels" for=""><b>{{ __('index.costo elec') }} $/Kwh</b> </label>
                        </div>
                        <div class="w-1/2 flex justify-start">
                        <input name="costo_elec_2_3" id="costo_elec_2_3" readonly onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full text-center border-2 border-blue-600 rounded-md py-1">
                        </div>
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="flex justify-start w-1/3 text-left">
                            <label class="labels" for=""><b>{{ __('index.hors enf') }}</b> </label>
                        </div>
                        <div class="flex justify-start w-1/3">
                        <input type="text" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md py-1 text-center"  name="hrsEnfriado_2_3" id="hrsEnfriado_2_3" readonly>
                        </div>
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">
                        <div class="flex justify-start w-1/3">
                            <select name="csStd_2_3" id="csStd_2_3" style="padding-top: 0.43rem;padding-bottom: 0.43rem;"  class="w-full border-2 border-blue-600 rounded-md text-center" onchange="check_send_efi(this.value,document.getElementById('cUnidad_2_3').value,'csStd_2_3');">
                            </select>
                        </div>
                        <div class="flex justify-start w-1/4">
                        <input  name="csStd_cant_2_3" id="csStd_cant_2_3" type="text" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md py-1 text-center">
                          </div>
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                        <div class="flex justify-start text-left w-1/2">
                            <label class="labels" for=""><b>{{ __('index.tipo control') }}</b> </label>
                        </div>
                        <div class="flex justify-start w-full">
                            <select class="w-full border-2 border-blue-600 rounded-md py-1" onchange="send_name_t_c(this.id);"  name="tipo_control_2_3" id="tipo_control_2_3">

                            </select>
                        </div>
                        <input type="text" style="display: none" id="name_t_control_2_3" name="name_t_control_2_3">
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                        <div class="w-1/3 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.dr') }}</b> </label>
                        </div>
                        <div class="w-full flex justify-start">
                        <select style="width: 77%;" class="border-2 border-blue-600 rounded-md py-1" onchange="send_name_dr(this.id);" name="dr_2_3" id="dr_2_3" >

                        </select>
                        </div>
                        <input type="text" style="display: none" id="dr_name_2_3" name="dr_name_2_3">
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="flex w-1/3 justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.mantenimiento') }}</b> </label>
                        </div>
                        <div class="flex w-full justify-start">
                            <select style="margin-left: 1px;" class="w-full border-2 border-blue-600 rounded-md py-2" name="cheMantenimiento_2_3" id="cheMantenimiento_2_3">
                                <option value="">{{ __('index.seleccionar') }}</option>
                                <option value="ASHRAE 180">ASHRAE 180</option>
                                <option value="Deficiente">Deficiente</option>
                                <option value="Sin Mantenimiento">Sin Mantenimiento</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                        <div class="w-1/3 flex justify-start text-left">
                            <label  class="labels" for=""><b>{{ __('index.inversion inicial') }} (CAPEX)</b> </label>
                        </div>
                        <div class="w-1/2 flex justify-start text-left">
                            <input onchange="format_num(this.value,this.id);valida_selects_inps(this.id)"  class="2xl:w-full xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center" name="cheValorS_2_3" id="cheValorS_2_3" >
                        </div>
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                        <div class="w-3/6 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.costo anual') }}</b> </label>
                        </div>

                        <div class="w-full flex gap-x-2 justify-start">
                            <div class="flex">
                                <input type="text" onchange="format_num(this.value,this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center"  name="maintenance_cost_2_3" id="maintenance_cost_2_3" >
                            </div>
                            <div class="flex justify-end">
                                <button onclick="inactive_display('sol_2')" type="button" class="py-1 px-3 border-2 border-red-500 rounded-md mr-5 text-xl text-orange-400 mt-1 hover:text-white hover:bg-orange-400"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
           </div>
        </div> --}}
        {{-- 2.3 --}}


        {{-- 2.4 --}}
        <a id="final2" name="final2" href=""></a>
        {{-- <table style="padding-left: 15px; padding-right: 15px; border-right: 1px solid rgb(177, 177, 177); text-align: left; width: 80%">
            <thead>
                <th colspan="2" class="cooling" style="text-align: center !important"><h2>ENFRIAMIENTO SOLUCIÓN 2</h2></th>
            </thead>
            <tr>
                <td style="max-width: 185px; min-width: 160px; width: 160px"><label for="">Capacidad del equipo</label></td>
                <td>
                    <input class="fcontrol" type="number" step="0.5" name="cSize2" id="cSize2" style="width: 50% !important">
                    <select class="fcontrol" name="cUnidad" id="cUnidad2" style="width: 43% !important" disabled>
                        <option value="0">TR</option>
                        <option value="1">Kw</option>
                        <option value="2">Btuh</option>
                    </select>
                    <input style="display: none" id="cUnidadLbl2" name="cUnidadLbl2" value="TR" />
                </td>
            </tr>
            <tr>
                <td><label for="">Tarifa electrica</label></td>
                <td>
                    <input class="fcontrol" type="number" step="0.01" name="cTarifa2" id="cTarifa2" style="width: 50% !important;" readonly>
                    <label for="" style="width: 45% !important;">$/Kw</label>
                </td>
            </tr>
            <tr>
                <td><label for="">Horas de enfriado</label></td>
                <td><input class="fcontrol w50" type="number" step="0.01" name="hrsEnfriado2" id="hrsEnfriado2" readonly></td>
            </tr>
            <tr>
                <td>
                    <select name="csStd2" id="csStd2" class="fcontrol" disabled style="width: 85%">
                        <option value="0">SEER</option>
                        <option value="1">IEER</option>
                        <option value="2" disabled>IPVL</option>
                    </select>
                    <input style="display: none" id="lblCsStd2" name="lblCsStd2" value="SEER" />
                </td>
                <td>
                    <input class="fcontrol w30" type="number" step="0.5" name="cheStd" id="cheStd">
                    <label for="" class="w30" style="display: inline-block; text-align: right">Tipo de equipo</label>
                    <select class="fcontrol w30"  name="cheTipo" id="cheTipo">
                        <option value="0">Tipo paquete</option>
                        <option value="1">Split</option>
                        <option value="2">Mini Split</option>
                        <option value="3">VRF</option>
                        <option value="4">c/Economizador</option>
                        <option value="5">c/Economizador y VAV</option>
                        <option value="6">Chillers Standard</option>
                        <option value="7">Chillers Variable</option>
                    </select>
                    <input type="text" style="display: none" id="lblCheTipo" name="lblCheTipo" value="Tipo paquete">
                </td>
            </tr>
            ---------------- <tr>
                <td><label for="">Tipo de sistema</label></td>
                <td>
                    <select class="fcontrol"  name="cheTipo" id="cheTipo">
                        <option value="0">Tipo paquete</option>
                        <option value="1">Split</option>
                        <option value="2">Mini Split</option>
                        <option value="3">VRF</option>
                        <option value="4">c/Economizador</option>
                        <option value="5">c/Economizador y VAV</option>
                        <option value="6">Chillers Standard</option>
                        <option value="7">Chillers Variable</option>
                    </select>
                    <input type="text" style="display: none" id="lblCheTipo" name="lblCheTipo" value="Tipo paquete">
                </td>
            </tr> -------------------
            <tr>
                <td><label for="">Diseño Sistema</label></td>
                <td>
                    <select class="fcontrol w30" name="cheDisenio" id="cheDisenio">
                        <option value="0">ASHRAE 55/62.1/90.1</option>
                        <option value="1">Básico</option>
                        <option value="2">Básico c/ducto Flexible</option>
                        <option value="3">Ducto Flex. y Plenum Ret.</option>
                    </select>
                    <input type="text" style="display: none" id="lblCheDisenio" name="lblCheDisenio" value="ASHRAE 55/62.1/90.1">
                    <label for="" class="w30" style="display: inline-block; text-align: right">Mantenimiento</label>
                    <select class="fcontrol w30" name="cheMantenimiento" id="cheMantenimiento">
                        <option value="0">ASHRAE 180 Proactivo</option>
                        <option value="1">Deficiente</option>
                        <option value="2">Sin Mantenimiento</option>
                    </select>
                    <input type="text" style="display: none" id="lblCheMantenimiento" name="lblCheMantenimiento" value="ASHRAE 180 Proactivo">
                </td>
            </tr>
         --------- <tr>
                <td><label for="">Mantenimimento</label></td>
                <td>
                    <select class="fcontrol" name="cheMantenimiento" id="cheMantenimiento">
                        <option value="0">ASHRAE 180 Proactivo</option>
                        <option value="1">Deficiente</option>
                        <option value="2">Sin Mantenimiento</option>
                    </select>
                    <input type="text" style="display: none" id="lblCheMantenimiento" name="lblCheMantenimiento" value="ASHRAE 180 Proactivo">
                </td>
            </tr> ---------

            <tr>
                <td><label for="">Valor estimado</label></td>
                <td>
                    <label for="" style="max-width: 5%; padding-right: 5px">$   </label><input style="max-width: 47%" class="fcontrol"  step="0.01" name="cheValorS2" id="cheValorS2" >
                </td>
            </tr>
        </table> --}}
    </div>
    </div>

    <div style="width: 100%" class="mx-1">
         {{-- 3.1 --}}
         <div  class="bg-orange-500 text-white rounded-t-xl w-80 2xl:flex xl:flex lg:grid justify-between 2xl:py-3 xl:py-3 lg:py-0 ">
            <div class="ml-5 2xl:w-10 xl:w-auto lg:w-1/4 flex justify-start">
                <a href="#final3">
                    <button onclick="active_display('sol_3');" type="button"  class="rounded-xl p-1 m-0 hover-button-plus text-3xl"><i class="fa-solid fa-plus text-white"></i></button>
                </a>
                <input type="number" class="hidden" value="2" id="cont_sol_3" name="cont_sol_3">
            </div>
            <div class="2xl:ml-0 xl:ml-0 lg:ml-10 w-full flex 2xl:justify-center xl:justify-center lg:justify-center py-1">
                <h2 style="margin-right: 75px;" class="text-white font-bold  text-3xl ">{{ __('index.solucion') }} C</h2>
            </div>
          {{--   <div cslass="w-1/2 flex justify-start">
                <h2 class="text-white font-bold justify-start">ENFRIAMIENTO SOLUCIÓN 1</h2>
            </div> --}}
        </div>
        <div class="border-r-2 border-l-2 border-color-inps" id="3_border_bottom" name="3_border_bottom">


         <div class="grid w-full">

            <div class="flex">
                <div class="w-full mx-2 mt-2 rounded-md shadow-xl">
                  <div class="grid gap-y-1 my-2">
                    <div class="flex w-full">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label  class="labels" for=""><b>{{ __('index.unidadhvac') }}</b> </label>
                            </div>
                            <div class="w-1/2 flex justify-start">
                                <select class="w-full border-2 border-color-inps rounded-md p-2"  onchange="unidadHvac(this.value,1,'cheTipo_3_1');check_chiller(this.value,'csStd2_3_1',1);send_value_equipo_marcas(this.id,this.value,'marca_3_1');" name="cUnidad_3_1" id="cUnidad_3_1" >
                                    <option value="0">{{ __('index.seleccionar') }}</option>
                                    <option value="1">Paquetes (RTU)</option>
                                    <option value="2">Split DX</option>
                                    <option value="3">VRF No Ductados</option>
                                    <option value="4">VRF Ductados</option>
                                    <option value="5">PTAC/VTAC</option>
                                    <option value="6">WSHP</option>
                                    <option value="7">Minisplit Inverter</option>
{{--                             <option value="8">Chiller - Aire - Scroll Constante</option>
                            <option value="9">Chiller - Aire - Scroll Variable</option>
                            <option value="10">Chiller - Aire - Tornillo 4 Etapas</option> --}}
                                </select>
                            </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/2 text-left">
                                 <label  class="labels" for=""><b>{{ __('index.tipo equipo') }}</b> </label>
                             </div>
                             <div class="w-full flex justify-start">
                                    <select style="font-size: 14px" class="w-full border-2 border-color-inps rounded-md py-2" onchange="valida_selects_inps(this.id);change_diseño(this.value,1,'cheDisenio_3_1','tipo_control_3_1','dr_3_1','ventilacion_3_1','filtracion_3_1','lblCsTipo_3_1');"  name="cheTipo_3_1" id="cheTipo_3_1">

                                    </select>
                            </div>
                            <input  id="cheTipo_3_1_count" name="cheTipo_3_1_count" type="number" class="hidden" value="1">

                            <input type="text" style="display: none" id="lblCsTipo_3_1" name="lblCsTipo_3_1">
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.marca') }}</b> </label>
                            </div>

                            <div class="w-1/2 flex justify-start">
                                <select name="marca_3_1" id="marca_3_1" class="w-full border-2 border-color-inps rounded-md py-2" onchange="valida_selects_inps(this.id);send_modelos(this.value,'modelo_3_1');send_marca_to_modal(this.value,'marcas_modal_3_1');">

                                </select>
                                <input  id="marca_3_1_count" name="marca_3_1_count" type="number" class="hidden" value="1">

                            </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/2 text-left">
                                <label class="labels" for=""><b>{{ __('index.modelo') }}</b> </label>
                            </div>
                            <div class="w-full flex justify-start">
                                <select style="font-size: 14px" onchange="valida_selects_inps(this.id);check_enfi_mod(this.value,'csStd2_3_1',this.id,'cUnidad_2_1');" class="w-full border-2 border-color-inps rounded-md py-2"   name="modelo_3_1" id="modelo_3_1">
                                </select>
                            </div>
                            <input  id="modelo_3_1_count" name="modelo_3_1_count" type="number" class="hidden" value="1">
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                            <div class="flex justify-start w-1/3 text-left">
                                <label class="labels" for=""><b>{{ __('index.capacidad termica') }}</b> </label>
                            </div>

                            <div class="flex w-1/2 justify-start gap-x-2">
                                <div class="w-full">
                                    <input id="capacidad_total_3_1" name="capacidad_total_3_1" type="text" onchange="valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);"  onkeypress="return soloNumeros(event)" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md h-full text-center" >
                                    <input  id="capacidad_total_3_1_count" name="capacidad_total_3_1_count" type="number" class="hidden" value="1">

                                </div>
                                <div class="w-full">
                                    <input class="w-full  border-2 border-color-inps rounded-md py-2 text-center"  type="text" readonly name="unidad_capacidad_tot_3_1" id="unidad_capacidad_tot_3_1" >

                                </div>
                            </div>
                            <input type="text" style="display: none" id="lblCsTipo" name="lblCsTipo" value="Tipo paquete">
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="w-1/2 flex justify-start text-left">
                                <label  class="labels" for=""><b>{{ __('index.efi') }}</b> </label>
                            </div>

                            <div class="flex w-full justify-start gap-x-2">
                                <div class="flex justify-start w-1/3">
                                    <select name="csStd2_3_1" id="csStd2_3_1" style="padding-top: 0.43rem;padding-bottom: 0.43rem;font-size: 14px;" onchange="check_send_efi(this.value,document.getElementById('cUnidad_3_1').value,'csStd2_3_1');" class="w-full border-2 border-color-inps rounded-md text-center">
                                    </select>
                                </div>
                                <div class="flex justify-start w-1/3">
                                 <input  name="cheStd_3_1" id="cheStd_3_1" onchange="valida_selects_inps(this.id);" type="text" style="font-size: 14px;" class="w-full py-1 border-2 border-color-inps rounded-md text-center">
                                </div>
                                <input  id="cheStd_3_1_count" name="cheStd_3_1_count" type="number" class="hidden" value="1">
                            </div>
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-2">
                            <div class="w-1/3 flex justify-start text-left" title="Costo Eléctrico">
                                <label style="" class="labels" for=""><b>{{ __('index.costo elec') }} $/Kwh</b> </label>
                            </div>
                            <div class="w-1/2 flex justify-start">
{{--                                                                 <input onchange="valida_selects_inps(this.id);" name="costo_elec_3_1" id="costo_elec_3_1" readonly onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;margin-left:2px;" class="w-full text-center border-2 border-color-inps rounded-md py-1">
--}}
                            <input name="costo_elec_3_1" id="costo_elec_3_1" readonly onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full text-center border-2 border-color-inps rounded-md py-1">

                            </div>
                            <input  id="costo_elec_3_1_count" name="costo_elec_3_1_count" type="number" class="hidden" value="1">
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/3 text-left">
                                <label  class="labels" for=""><b>{{ __('index.hors enf') }}</b> </label>
                            </div>
                            <div class="flex justify-start w-1/3">
                                <input onchange="valida_selects_inps(this.id);" type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md py-1 text-center" name="hrsEnfriado_3_1" id="hrsEnfriado_3_1" readonly>

                            </div>
                            <input  id="hrsEnfriado_3_1_count" name="hrsEnfriado_3_1_count" type="number" class="hidden" value="1">

                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-2 gap-y-1">
                            <div class="w-1/3 flex justify-start text-left">
                                <label  class="labels" for=""><b>{{ __('index.tipo diseño') }}</b> </label>
                            </div>
                            <div class="w-1/2 flex justify-start">
                                <select class="w-full border-2 border-color-inps rounded-md py-2" onchange="valida_selects_inps(this.id);send_name(this.id);" name="cheDisenio_3_1" id="cheDisenio_3_1">

                                </select>
                            </div>
                            <input  id="cheDisenio_3_1_count" name="cheDisenio_3_1_count" type="number" class="hidden" value="1">
                            <input type="text" style="display: none" id="name_diseno_3_1" name="name_diseno_3_1">
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                            <div class="flex justify-start text-left w-1/2">
                                <label  class="labels" for=""><b>{{ __('index.tipo control') }}</b> </label>
                            </div>
                            <div class="flex justify-start w-full">
                                <select class="w-full border-2 border-color-inps rounded-md py-1"  onchange="valida_selects_inps(this.id);send_name_t_c(this.id);"  name="tipo_control_3_1" id="tipo_control_3_1">

                                </select>
                            </div>
                            <input  id="tipo_control_3_1_count" name="tipo_control_3_1_count" type="number" class="hidden" value="1">

                            <input type="text" style="display: none" id="name_t_control_3_1" name="name_t_control_3_1">
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-3 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label  class="labels" for=""><b>{{ __('index.dr') }}</b> </label>
                            </div>
                            <div class="w-full flex justify-start">
                                <select style="width: 77%;margin-left:2.5px;" class="border-2 border-color-inps rounded-md py-1" onchange="valida_selects_inps(this.id);send_name_dr(this.id);" name="dr_3_1" id="dr_3_1" >
                                </select>
                            </div>
                            <input  id="dr_3_1_count" name="dr_3_1_count" type="number" class="hidden" value="1">

                            <input type="text" style="display: none" id="dr_name_3_1" name="dr_name_3_1">

                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex w-1/2 justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.ventilacion') }}</b></label>
                            </div>
                            <div class="flex w-full justify-start">
                                <select onchange="valida_selects_inps(this.id);send_name_vent(this.id);"  style="margin-left: 2px;" class="w-full border-2 border-color-inps rounded-md py-2" name="ventilacion_3_1" id="ventilacion_3_1">

                                </select>
                                <input  id="ventilacion_3_1_count" name="ventilacion_3_1_count" type="number" class="hidden" value="1">
                                <input type="text" style="display: none" id="ventilacion_name_3_1" name="ventilacion_name_3_1">
                            </div>
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                            <div class="flex w-1/2 justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.filtracion') }}</b></label>
                            </div>
                            <div class="flex w-full justify-start">
                                <select onchange="valida_selects_inps(this.id);send_name_filt(this.id);"  style="width: 77%;margin-left:0px;" class="border-2 border-color-inps rounded-md py-1" name="filtracion_3_1" id="filtracion_3_1">

                                </select>
                                <input  id="filtracion_3_1_count" name="filtracion_3_1_count" type="number" class="hidden" value="1">
                                <input type="text" style="display: none" id="filtracion_name_3_1" name="filtracion_name_3_1">
                            </div>
                        </div>


                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex w-1/3 justify-start text-left">
                                <label  class="labels" for=""><b>{{ __('index.mantenimiento') }}</b> </label>
                            </div>
                            <div class="flex w-full justify-start">
                                <select onchange="valida_selects_inps(this.id);" style="margin-left: 2px;" class="w-full border-2 border-color-inps rounded-md py-2" name="cheMantenimiento_3_1" id="cheMantenimiento_3_1">
                                    <option value="0">{{ __('index.seleccionar') }}</option>
                                    <option value="ASHRAE 180">ASHRAE 180</option>
                                    <option value="Deficiente">Deficiente</option>
                                    <option value="Sin Mantenimiento">Sin Mantenimiento</option>
                                </select>
                                <input  id="cheMantenimiento_3_1_count" name="cheMantenimiento_3_1_count" type="number" class="hidden" value="1">

                            </div>
                        </div>
                    </div>


                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                        <div class="flex w-1/2 justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.tipo_ambiente') }}</b></label>
                        </div>
                        <div class="flex w-full justify-start">
                            <select onchange="valida_selects_inps(this.id);show_prot_cond(this.value,'proteccion_condensador_3_1','new');"  style="width: 77%;margin-left:0px;" class="border-2 border-color-inps rounded-md py-1" name="tipo_ambiente_3_1" id="tipo_ambiente_3_1">
                                <option selected value="0">{{ __('index.seleccionar') }}</option>
                                <option value="no_agresivo">No Agresivo</option>
                                <option value="marino">Marino</option>
                                <option value="contaminado">Contaminado</option>
                            </select>
                            <input  id="tipo_ambiente_3_1_count" name="tipo_ambiente_3_1_count" type="number" class="hidden" value="1">
                        </div>
                    </div>


                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                         <div class="flex w-1/3 justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.proteccion_condensador') }}</b></label>
                        </div>
                        <div class="flex w-full justify-start">
                            <select onchange="valida_selects_inps(this.id);send_value_box('proteccion_condensador_3_1','proteccion_condensador_3_1_value','tipo_ambiente_3_1');"  style="margin-left: 16px;" class="w-full border-2 border-color-inps rounded-md py-2" name="proteccion_condensador_3_1" id="proteccion_condensador_3_1">
                            </select>
                            <input  id="proteccion_condensador_3_1_count" name="proteccion_condensador_3_1_count" type="number" class="hidden" value="1">
                            <input  id="proteccion_condensador_3_1_value" name="proteccion_condensador_3_1_value" type="text" class="hidden">
                        </div>
                    </div>
                </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label  class="labels" for=""><b>{{ __('index.inversion inicial') }} (CAPEX)</b> </label>
                            </div>
                            <div class="w-1/2 flex justify-start text-left">
                                 <input style="margin-left: 1px;" onchange="format_num(this.value,this.id);valida_selects_inps(this.id)" type="text" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-color-inps rounded-md py-1 text-center" name="cheValorS_3_1" id="cheValorS_3_1" >
                                 <input  id="cheValorS_3_1_count" name="cheValorS_3_1_count" type="number" class="hidden" value="1">

                                </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.costo anual') }}</b> </label>
                            </div>

                            <div class="w-1/2 flex justify-start">
                                <input type="text" tyle="margin-left: 2px;" onchange="format_num(this.value,this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-color-inps rounded-md py-1 text-center"   name="maintenance_cost_3_1" id="maintenance_cost_3_1" >
                            </div>
                        </div>


                    </div>
                  </div>
                </div>
               </div>
        </div>
        {{-- 3.1 --}}
        {{-- 3.2 --}}
      <div class="grid w-full hidden mb-1"  id="sol_3_2" name="sol_3_2">
        <div class="mx-2">
            <hr>
        </div>
        <div class="flex w-full">
            <div class=" mx-2 rounded-md shadow-md w-full  mt-3">
              <div class="grid gap-y-1 my-2">
                <div class="flex w-full">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                        <div class="w-1/3 flex justify-start text-left">
                            <label  class="labels" for=""><b>{{ __('index.unidadhvac') }}</b> </label>
                        </div>
                        <div class="w-1/2 flex justify-start">
                            <select class="w-full border-2 border-color-inps rounded-md p-2" onchange="unidadHvac(this.value,1,'cheTipo_3_2');check_chiller(this.value,'csStd_3_2',1);send_value_equipo_marcas(this.id,this.value,'marca_3_2');" name="cUnidad_3_2" id="cUnidad_3_2" >
                                <option value="0">{{ __('index.seleccionar') }}</option>
                                <option value="1">Paquetes (RTU)</option>
                                <option value="2">Split DX</option>
                                <option value="3">VRF No Ductados</option>
                                <option value="4">VRF Ductados</option>
                                <option value="5">PTAC/VTAC</option>
                                <option value="6">WSHP</option>
                                <option value="7">Minisplit Inverter</option>
{{--                             <option value="8">Chiller - Aire - Scroll Constante</option>
                            <option value="9">Chiller - Aire - Scroll Variable</option>
                            <option value="10">Chiller - Aire - Tornillo 4 Etapas</option> --}}
                            </select>
                        </div>
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                         <div class="flex justify-start w-1/2 text-left">
                              <label  class="labels" for=""><b>{{ __('index.tipo equipo') }}</b> </label>
                        </div>
                        <div class="w-full flex justify-start">
                            <select style="font-size: 14px" class="w-full border-2 border-color-inps rounded-md py-2" onchange="valida_selects_inps(this.id);change_diseño(this.value,2,'cheDisenio_3_2','tipo_control_3_2','dr_3_2','ventilacion_3_2','filtracion_3_2','lblCsTipo_3_2');" name="cheTipo_3_2" id="cheTipo_3_2">
                            </select>
                            <input  id="cheTipo_3_2_count" name="cheTipo_3_2_count" type="number" class="hidden" value="1">

                        </div>
                        <input type="text" style="display: none" id="lblCsTipo_3_2" name="lblCsTipo_3_2">
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="w-1/3 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.marca') }}</b> </label>
                        </div>

                        <div class="w-1/2 flex justify-start">
                            <select name="marca_3_2" id="marca_3_2" class="w-full border-2 border-color-inps rounded-md py-2" onchange="valida_selects_inps(this.id);send_modelos(this.value,'modelo_3_2');send_marca_to_modal(this.value,'marcas_modal_2_1');">

                            </select>
                            <input  id="marca_3_2_count" name="marca_3_2_count" type="number" class="hidden" value="1">

                        </div>
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="flex justify-start w-1/2 text-left">
                            <label class="labels" for=""><b>{{ __('index.modelo') }}</b> </label>
                        </div>
                        <div class="w-full flex justify-start">
                            <select style="font-size: 14px" onchange="valida_selects_inps(this.id);check_enfi_mod(this.value,'csStd_3_2',this.id,'cUnidad_3_1');" class="w-full border-2 border-color-inps rounded-md py-2"   name="modelo_3_2" id="modelo_3_2">
                            </select>
                        </div>
                        <input  id="modelo_3_2_count" name="modelo_3_2_count" type="number" class="hidden" value="1">
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                        <div class="flex w-1/3 justify-start text-left">
                            <label  class="labels" for=""><b>{{ __('index.capacidad termica') }}</b> </label>
                        </div>
                        <div class="flex w-1/2 justify-start gap-x-2">
                            <div class="w-full">
                                <input id="capacidad_total_3_2" name="capacidad_total_3_2" type="text" onchange="valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);"  onkeypress="return soloNumeros(event)" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md h-full text-center" >
                            </div>
                            <input  id="capacidad_total_3_2_count" name="capacidad_total_3_2_count" type="number" class="hidden" value="1">

                            <div class="w-full">
                                <input class="w-full  border-2 border-color-inps rounded-md py-2 text-center"  type="text" readonly name="unidad_capacidad_tot_3_2" id="unidad_capacidad_tot_3_2" >

                            </div>
                        </div>
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="w-1/2 flex justify-start text-left">
                            <label  class="labels" for=""><b>{{ __('index.efi') }}</b> </label>
                        </div>

                        <div class="flex w-full justify-start gap-x-2">
                            <div class="flex justify-start w-1/3">
                                <select name="csStd_3_2" id="csStd_3_2" style="padding-top: 0.43rem;padding-bottom: 0.43rem;font-size: 14px;" onchange="check_send_efi(this.value,document.getElementById('cUnidad_3_2').value,'csStd_3_2');" class="w-full border-2 border-color-inps rounded-md text-center">
                                </select>
                            </div>

                            <div class="flex justify-start w-1/3">
                                <input onchange="valida_selects_inps(this.id);"  name="csStd_cant_3_2" id="csStd_cant_3_2" type="number" style="font-size: 14px;" class="w-full py-1 border-2 border-color-inps rounded-md  text-center">
                                <input  id="csStd_cant_3_2_count" name="csStd_cant_3_2_count" type="number" class="hidden" value="1">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-2">
                        <div class="w-1/3 flex justify-start text-left" title="Costo Eléctrico">
                            <label  class="labels" for=""><b>{{ __('index.costo elec') }} $/Kwh</b> </label>
                        </div>
                        <div class="w-1/2 flex justify-start">
                            <input name="costo_elec_3_2" id="costo_elec_3_2" onchange="valida_selects_inps(this.id);" readonly onkeypress="return soloNumeros(event)"  style="font-size: 14px;" class="w-full text-center border-2 border-color-inps rounded-md py-1">
                            <input  id="costo_elec_3_2_count" name="costo_elec_3_2_count" type="number" class="hidden" value="1">

                        </div>
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="flex justify-start w-1/3 text-left">
                            <label  class="labels" for=""><b>{{ __('index.hors enf') }}</b> </label>
                        </div>
                        <div class="flex justify-start w-1/3">
                            <input type="text" style="font-size: 14px;" class="w-full border-2 border-color-inps rounded-md py-1 text-center" name="hrsEnfriado_3_2" id="hrsEnfriado_3_2" onchange="valida_selects_inps(this.id);" readonly>
                            <input  id="hrsEnfriado_3_2_count" name="hrsEnfriado_3_2_count" type="number" class="hidden" value="1">

                        </div>
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-2 gap-y-1">
                        <div class="w-1/3 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.tipo diseño') }}</b> </label>
                        </div>
                        <div class="w-1/2 flex justify-start">
                            <select class="w-full border-2 border-color-inps rounded-md py-2" onchange="valida_selects_inps(this.id);send_name(this.id);" name="cheDisenio_3_2" id="cheDisenio_3_2">

                            </select>
                            <input  id="cheDisenio_3_2_count" name="cheDisenio_3_2_count" type="number" class="hidden" value="1">
                        </div>
                        <input type="text" id="name_diseno_3_2" name="name_diseno_3_2" style="display: none" >
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                        <div class="flex justify-start text-left w-1/2">
                            <label  class="labels" for=""><b>{{ __('index.tipo control') }}</b> </label>
                        </div>
                        <div class="flex justify-start w-full">
                            <select class="w-full border-2 border-color-inps rounded-md py-1" onchange="valida_selects_inps(this.id);send_name_t_c(this.id);" name="tipo_control_3_2" id="tipo_control_3_2">

                            </select>
                            <input  id="tipo_control_3_2_count" name="tipo_control_3_2_count" type="number" class="hidden" value="1">

                        </div>
                         <input type="text" id="name_t_control_3_2" name="name_t_control_3_2" style="display:none;">
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-3 w-1/2">
                        <div class="w-1/3 flex justify-start text-left">
                            <label  class="labels" for=""><b>{{ __('index.dr') }}</b> </label>
                        </div>
                        <div class="w-full flex justify-start">
                            <select style="width: 77%;margin-left:2.5px;"  class="border-2 border-color-inps rounded-md py-1"  onchange="valida_selects_inps(this.id);send_name_dr(this.id);" name="dr_3_2" id="dr_3_2" >

                            </select>
                            <input  id="dr_3_2_count" name="dr_3_2_count" type="number" class="hidden" value="1">

                        </div>
                        <input type="text" id="dr_name_3_2" name="dr_name_3_2" style="display:none;">
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="flex w-1/2 justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.ventilacion') }}</b></label>
                        </div>
                        <div class="flex w-full justify-start">
                            <select onchange="valida_selects_inps(this.id);send_name_vent(this.id);"  style="margin-left: 2px;" class="w-full border-2 border-color-inps rounded-md py-2" name="ventilacion_3_2" id="ventilacion_3_2">

                            </select>
                            <input  id="ventilacion_3_2_count" name="ventilacion_3_2_count" type="number" class="hidden" value="1">
                            <input type="text" style="display: none" id="ventilacion_name_3_2" name="ventilacion_name_3_2">
                        </div>
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                        <div class="flex w-1/2 justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.filtracion') }}</b></label>
                        </div>
                        <div class="flex w-full justify-start">
                            <select onchange="valida_selects_inps(this.id);send_name_filt(this.id);"  style="width: 77%;margin-left:0px;" class="border-2 border-color-inps rounded-md py-1" name="filtracion_3_2" id="filtracion_3_2">

                            </select>
                            <input  id="filtracion_3_2_count" name="filtracion_3_2_count" type="number" class="hidden" value="1">
                            <input type="text" style="display: none" id="filtracion_name_3_2" name="filtracion_name_3_2">
                        </div>
                    </div>


                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="flex w-1/3 justify-start text-left">
                            <label  class="labels" for=""><b>{{ __('index.mantenimiento') }}</b> </label>
                        </div>
                        <div class="flex w-full justify-start">
                            <select onchange="valida_selects_inps(this.id);" style="margin-left: 2px;" class="w-full border-2 border-color-inps rounded-md py-2" name="cheMantenimiento_3_2" id="cheMantenimiento_3_2">
                                <option value="">{{ __('index.seleccionar') }}</option>
                                <option value="ASHRAE 180">ASHRAE 180</option>
                                <option value="Deficiente">Deficiente</option>
                                <option value="Sin Mantenimiento">Sin Mantenimiento</option>
                            </select>
                            <input  id="cheMantenimiento_3_2_count" name="cheMantenimiento_3_2_count" type="number" class="hidden" value="1">

                        </div>
                        <input type="text" style="display: none" id="lblCheMantenimiento_3_2" name="lblCheMantenimiento_3_2" value="ASHRAE 180 Proactivo">
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                        <div class="flex w-1/2 justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.tipo_ambiente') }}</b></label>
                        </div>
                        <div class="flex w-full justify-start">
                            <select onchange="valida_selects_inps(this.id);show_prot_cond(this.value,'proteccion_condensador_3_2','new');"  style="width: 77%;margin-left:0px;" class="border-2 border-color-inps rounded-md py-1" name="tipo_ambiente_3_2" id="tipo_ambiente_3_2">
                                <option selected value="0">{{ __('index.seleccionar') }}</option>
                                <option value="no_agresivo">No Agresivo</option>
                                <option value="marino">Marino</option>
                                <option value="contaminado">Contaminado</option>
                            </select>
                            <input  id="tipo_ambiente_3_2_count" name="tipo_ambiente_3_2_count" type="number" class="hidden" value="1">
                        </div>
                    </div>


                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                         <div class="flex w-1/3 justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.proteccion_condensador') }}</b></label>
                        </div>
                        <div class="flex w-full justify-start">
                            <select onchange="valida_selects_inps(this.id);send_value_box('proteccion_condensador_3_2','proteccion_condensador_3_2_value','tipo_ambiente_3_2');"  style="margin-left: 16px;" class="w-full border-2 border-color-inps rounded-md py-2" name="proteccion_condensador_3_2" id="proteccion_condensador_3_2">
                            </select>
                            <input  id="proteccion_condensador_3_2_count" name="proteccion_condensador_3_2_count" type="number" class="hidden" value="1">
                            <input  id="proteccion_condensador_3_2_value" name="proteccion_condensador_3_2_value" type="text" class="hidden">
                        </div>
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-2">
                        <div class="w-1/3 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.inversion inicial') }} (CAPEX)</b> </label>
                        </div>
                        <div class="w-1/2 flex justify-start">
                             <input  style="margin-left: 1px;" onchange="format_num(this.value,this.id);valida_selects_inps(this.id)"  class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-color-inps rounded-md py-1 text-center" type="text" name="cheValorS2_3_2" id="cheValorS2_3_2" >
                        </div>
                    </div>
                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="w-3/6 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.costo anual') }}</b> </label>
                        </div>

                        <div class="w-full flex gap-x-2 justify-start">
                            <div class="flex">
                                <input type="text" style="margin-left: 2.5px;" onchange="format_num(this.value,this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-color-inps rounded-md py-2 text-center"  name="maintenance_cost_3_2" id="maintenance_cost_3_2" >
                            </div>
                            <div class="flex justify-end">
                                <button onclick="inactive_display('sol_3')" type="button" class="py-1 px-3 border-2 border-red-500 rounded-md mr-5 text-xl text-orange-400 mt-1 hover:text-white hover:bg-orange-400"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
           </div>
       </div>
       {{-- 3.2 --}}

       {{-- 3.3 --}}
       {{-- <div class="grid w-full hidden"  id="sol_3_3" name="sol_3_3">
        <div class="mx-2">
            <hr>
        </div>
        <div class="flex">
            <div class="mx-2 bg-gray-200 rounded-md shadow-md w-full  mt-2 w-full mt-2">
              <div class="grid gap-y-2 my-2">
                <div class="flex w-full">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                        <div class="w-1/3 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.unidadhvac') }}</b> </label>
                        </div>
                        <div class="w-1/2 flex justify-start">
                            <select class="w-full border-2 border-blue-600 rounded-md p-2"  onchange="unidadHvac(this.value,1,'cheTipo_3_3');check_chiller(this.value,'csStd_3_3',1);" name="cUnidad_3_3" id="cUnidad_3_3" >
                                <option value="0">{{ __('index.seleccionar') }}</option>
                                <option value="1">Paquetes (RTU)</option>
                                <option value="2">Split DX</option>
                                <option value="3">VRF No Ductados</option>
                                <option value="4">VRF Ductados</option>
                                <option value="5">PTAC/VTAC</option>
                                <option value="6">WSHP</option>
                                <option value="7">Minisplit Inverter</option>
                                <option value="8">Chiller - Aire - Scroll Constante</option>
                                <option value="9">Chiller - Aire - Scroll Variable</option>
                                <option value="10">Chiller - Aire - Tornillo 4 Etapas</option>
                            </select>
                        </div>
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                      <div class="w-1/2 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.tipo equipo') }}</b> </label>
                      </div>
                      <div class="w-full flex justify-start">
                            <select style="font-size: 14px" class="w-full border-2 border-blue-600 rounded-md py-2"  onchange="change_diseño(this.value,3,'cheDisenio_3_3','tipo_control_3_3','dr_3_3','lblCsTipo_3_3');" name="cheTipo_3_3" id="cheTipo_3_3">

                            </select>
                        </div>
                        <input  id="cheTipo_3_3_count" name="cheTipo_3_3_count" type="number" class="hidden" value="1">

                        <input type="text" style="display: none" id="lblCsTipo_3_3" name="lblCsTipo_3_3">
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                        <div class="w-1/3 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.tipo diseño') }}</b> </label>
                        </div>
                        <div class="w-1/2 flex justify-start">
                            <select class="w-full border-2 border-blue-600 rounded-md py-2"  onchange="send_name(this.id);" name="cheDisenio_3_3" id="cheDisenio_3_3">

                            </select>
                        </div>
                        <input  id="cheDisenio_3_3_count" name="cheDisenio_3_3_count" type="number" class="hidden" value="1">

                        <input type="text" style="display: none" id="name_diseno_3_3" name="name_diseno_3_3">
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="flex w-1/2 justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.capacidad termica') }}</b> </label>
                        </div>
                        <div class="flex w-full justify-start gap-x-2">
                        <div class="w-full">
                         <input name="capacidad_total_3_3" id="capacidad_total_3_3" type="text" onchange="format_nums_no_$(this.value,this.id);"  onkeypress="return soloNumeros(event)" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md py-2 text-center" >
                        </div>
                        <input  id="capacidad_total_3_3_count" name="capacidad_total_3_3_count" type="number" class="hidden" value="1">
                        <div class="w-full">
                            <input readonly  type="text" class="w-full border-2 border-blue-600 rounded-md py-2 text-center" name="unidad_capacidad_tot_3_3" id="unidad_capacidad_tot_3_3" >
                        </div>
                    </div>
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-2">
                        <div class="w-1/3 flex justify-start text-left">
                            <label  class="labels" for=""><b>{{ __('index.costo elec') }} $/Kwh</b> </label>
                        </div>
                        <div class="w-1/2 flex justify-start">
                         <input name="costo_elec_3_3"  onkeypress="return soloNumeros(event)" readonly id="costo_elec_3_3" type="text" style="font-size: 14px;" class="w-full text-center border-2 border-blue-600 rounded-md py-1">
                         <input  id="costo_elec_3_3_count" name="costo_elec_3_3_count" type="number" class="hidden" value="1">

                        </div>
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="flex justify-start w-1/3 text-left">
                            <label  class="labels" for=""><b>{{ __('index.hors enf') }}</b> </label>
                        </div>
                        <div class="flex justify-start w-1/3">
                            <input type="text" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md py-1 text-center" name="hrsEnfriado_3_3" id="hrsEnfriado_3_3" readonly>
                            <input  id="hrsEnfriado_3_3_count" name="hrsEnfriado_3_3_count" type="number" class="hidden" value="1">

                        </div>

                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-2 gap-y-1">
                        <div class="flex justify-start w-1/3">
                            <select name="csStd_3_3" id="csStd_3_3" style="padding-top: 0.43rem;padding-bottom: 0.43rem;"  class="w-full border-2 border-blue-600 rounded-md text-center">
                            </select>
                        </div>
                        <div class="flex justify-start w-1/4">
                            <input name="cheStd_3_3" id="cheStd_3_3" type="text" style="font-size: 14px;" class="w-full py-1 border-2 border-blue-600 rounded-md text-center">
                            <input  id="cheStd_3_3_count" name="cheStd_3_3_count" type="number" class="hidden" value="1">
                        </div>
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                        <div class="flex justify-start text-left w-1/2">
                            <label class="labels" for=""><b>{{ __('index.tipo control') }}</b> </label>
                        </div>
                        <div class="flex justify-start w-full">
                            <select class="w-full border-2 border-blue-600 rounded-md py-1" onchange="send_name_t_c(this.id);"  name="tipo_control_3_3" id="tipo_control_3_3">

                            </select>
                            <input  id="tipo_control_3_3_count" name="tipo_control_3_3_count" type="number" class="hidden" value="1">

                         </div>
                        <input type="text" style="display: none" id="name_t_control_3_3" name="name_t_control_3_3">
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex gap-x-3 w-1/2">
                        <div class="w-1/3 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.dr') }}</b> </label>
                        </div>
                        <div class="w-full flex justify-start">
                            <select style="width: 77%;margin-left:2.5px;"  class="border-2 border-blue-600 rounded-md py-1" onchange="send_name_dr(this.id);"  name="dr_3_3" id="dr_3_3" >
                            </select>
                            <input  id="dr_3_3_count" name="dr_3_3_count" type="number" class="hidden" value="1">

                        </div>
                        <input type="text" style="display: none" id="dr_name_3_3" name="dr_name_3_3">
                    </div>

                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="flex w-1/3 justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.mantenimiento') }}</b> </label>
                        </div>
                        <div class="flex w-full justify-start">
                                <select style="margin-left: 2px;" class="w-full border-2 border-blue-600 rounded-md py-2" name="cheMantenimiento_3_3" id="cheMantenimiento_3_3">
                                    <option value="0">{{ __('index.seleccionar') }}</option>
                                    <option value="ASHRAE 180">ASHRAE 180</option>
                                    <option value="Deficiente">Deficiente</option>
                                    <option value="Sin Mantenimiento">Sin Mantenimiento</option>
                                </select>
                                <input  id="cheMantenimiento_3_3_count" name="cheMantenimiento_3_3_count" type="number" class="hidden" value="1">

                            </div>
                    </div>
                </div>

                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                    <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-2">
                        <div class="w-1/3 flex justify-start text-left">
                            <label  class="labels" for=""><b>{{ __('index.inversion inicial') }} (CAPEX)</b> </label>
                        </div>
                        <div class="w-1/2 flex justify-start">
                            <input onchange="format_num(this.value,this.id);valida_selects_inps(this.id)"  class="2xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center" name="cheValorS_3_3" id="cheValorS_3_3" >
                        </div>
                    </div>
                    <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                        <div class="w-3/6 flex justify-start text-left">
                            <label class="labels" for=""><b>{{ __('index.costo anual') }}</b> </label>
                        </div>

                        <div class="w-full flex gap-x-2 justify-start">
                            <div class="flex">
                                <input type="text" style="margin-left: 2.5px;" onchange="format_num(this.value,this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center"  name="maintenance_cost_3_3" id="maintenance_cost_3_3" >
                            </div>
                            <div class="flex justify-end">
                                <button onclick="inactive_display('sol_3')" type="button" class="py-1 px-3 border-2 border-red-500 rounded-md mr-5 text-xl text-orange-400 mt-1 hover:text-white hover:bg-orange-400"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
           </div>
        </div> --}}
        {{-- 3.3 --}}

        {{-- 3.4 --}}
        <a id="final3" name="final3" href=""></a>
        </div>
        {{-- espacio --}}
        <div class="grid w-full justify-items-center mt-8s rounded-md  p-10">

        </div>
         {{-- espacio --}}
    </div>
</div>
