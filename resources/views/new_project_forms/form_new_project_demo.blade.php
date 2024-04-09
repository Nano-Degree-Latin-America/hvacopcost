<div id="content" style=" display: flex; justify-content: center;" class="font-roboto">
    <div style="width: 100%; text-align: -webkit-right;" class="mx-1">
        <div style="background-color: #233064;" class="text-white rounded-t-xl w-80 2xl:flex xl:flex lg:grid justify-between 2xl:py-3 xl:py-3 lg:py-0  ">
            <div class="ml-5 2xl:w-10 xl:w-auto lg:w-1/4 flex justify-start">
             <a href="#final1">   <button onclick="modal_solo_paga();" type="button" style="background-color: #233064;" class="rounded-xl p-1 m-0 hover-button-plus text-3xl"><i class="fa-solid fa-plus text-white"></i></button></a>
                <input type="text" class="hidden" value="2" id="cont_sol_1" name="cont_sol_1">
                <input type="text" class="hidden" value="1" id="set_sol_1" name="set_sol_1">
            </div>
            <div class="2xl:ml-5 xl:ml-5 lg:ml-10 w-full flex  2xl:justify-center xl:justify-center lg:justify-center  py-1">
                <h2 style="margin-right: 75px;" class="text-white font-bold text-3xl">{{ __('index.solucion') }} Base</h2>
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
        <div class="w-full  mt-2 mx-2 bg-gray-200 rounded-md shadow-md">
          <div class="grid gap-y-1 my-2 ">
            <div class="flex w-full">

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2 ">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.unidadhvac') }}</b> </label>
                    </div>

                    <div class="w-1/2 flex justify-start">
                        <select name="cUnidad_1_1" id="cUnidad_1_1" class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_form_calc(1);unidadHvac(this.value,1,'csTipo','csDisenio_1_1');check_chiller(this.value,'csStd',1);">
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
                    <div class="flex justify-start w-1/2 text-left">
                        <label class="labels" for=""><b>{{ __('index.tipo equipo') }}</b> </label>
                    </div>
                    <div class="w-full flex justify-start">
                        <select style="font-size: 14px" class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);change_diseño(this.value,1,'csDisenio_1_1','tipo_control_1_1','dr_1_1','lblCsTipo_1_1');"  name="csTipo" id="csTipo">
                        </select>
                    </div>

                    <input type="text" style="display: none" id="lblCsTipo_1_1" name="lblCsTipo_1_1">
                    <input  id="tipo_equipo_1_1_count" name="tipo_equipo_1_1_count" type="number" class="hidden" value="1">
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">

                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.tipo diseño') }}</b> </label>
                    </div>

                    <div class="w-1/2 flex justify-start">
                        <select onchange="valida_selects_inps(this.id);send_name(this.id);" name="csDisenio_1_1" id="csDisenio_1_1" class="w-full border-2 border-blue-600 rounded-md py-2">
                        </select>
                    </div>
                    <input type="text" style="display: none" id="lblCsDisenio" name="lblCsDisenio" value="ASHRAE 55/62.1/90.1">
                    <input type="text" style="display: none" id="name_diseno_1_1" name="name_diseno_1_1">
                    <input  id="csDisenio_1_1_count" name="csDisenio_1_1_count" type="number" class="hidden" value="1">
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/2 text-left">
                        <label  class="labels" for=""><b>{{ __('index.capacidad termica') }}</b> </label>
                    </div>
                    <div class="flex w-full justify-start gap-x-2">
                        <div class="w-full">
                            <input type="text" style="margin-left: 1px;" onchange="valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);"  onkeypress="return soloNumeros(event)" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md py-2 text-center" name="capacidad_total" id="capacidad_total" >
                        </div>
                        <input  id="capacidad_total_1_1_count" name="capacidad_total_1_1_count" type="number" class="hidden" value="1">
                        <div class="w-full">
                        <select class="w-full  border-2 border-blue-600 rounded-md h-full text-center" onchange="cap_term_change(this.value);"  id="unidad_capacidad_tot" name="unidad_capacidad_tot">
                            <option value="TR">TR</option>
                            <option value="KW">KW</option>
                        </select>
                         </div>
                    </div>


                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                    <div class="w-1/3 flex justify-start text-left" title="Costo Eléctrico">
                       {{--  <label style="font-size: 14px;" class="" for=""><b>Costo Eléctrico</b><b style="font-size: 10px;"> $/Kwh</b> </label> --}}
                        <label  class="labels" for=""><b>{{ __('index.costo elec') }} $/Kwh</b> </label>
                    </div>
                    <div class="w-1/2 flex justify-start">
                        <input id="costo_elec" name="costo_elec" onchange="valida_selects_inps(this.id);asign_cos_ele(this.value);" onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full text-center border-2 border-blue-600 rounded-md py-1">
                    </div>
                    <input  id="costo_elec_1_1_count" name="costo_elec_1_1_count" type="number" class="hidden" value="1">
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/3 text-left">
                        <label  class="labels" for=""><b>{{ __('index.hors enf') }}</b> </label>
                    </div>
                    <div class="flex justify-start w-1/3">
                        <input  type="text" style="font-size: 14px;margin-left:1px;" class="w-full border-2 border-blue-600 rounded-md py-1 text-center" name="hrsEnfriado" onkeypress="return soloNumeros(event)" id="hrsEnfriado" onchange="hrs_enfs_inps(this.value);valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);">
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
                    <div class="flex justify-start w-1/3">
                        <select name="csStd" id="csStd" style="padding-top: 0.43rem;padding-bottom: 0.43rem;font-size: 14px;" onchange="check_send_efi(this.value,document.getElementById('cUnidad_1_1').value,'csStd');" class="w-full border-2 border-blue-600 rounded-md text-center">

                        </select>
                    </div>
                    <div class="flex justify-start w-1/4">
                        <input name="csStd_cant_1_1" id="csStd_cant_1_1" onchange="valida_selects_inps(this.id);" type="text" class="text-center w-full border-2 border-blue-600 rounded-md">
                        <input  id="csStd_cant_1_1_count" name="csStd_cant_1_1_count" type="number" class="hidden" value="1">
                    </div>
                    <div class="mt-1">
                        <a onclick="mostrar_modal_energia_hvac('modal_seer');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                    <div class="flex justify-start text-left w-1/2">
                        <label  class="labels" for=""><b>{{ __('index.tipo control') }}</b> </label>
                    </div>

                    <div class="flex justify-start w-full">
                        <select class="w-full border-2 border-blue-600 rounded-md py-1"   onchange="valida_selects_inps(this.id);send_name_t_c(this.id);" name="tipo_control_1_1" id="tipo_control_1_1">

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
                        <select style="width: 77%;margin-left:1.5px;" class="border-2 border-blue-600 rounded-md py-1" onchange="valida_selects_inps(this.id);send_name_dr(this.id);" name="dr_1_1" id="dr_1_1" >
                        </select>
                    </div>
                    <input  id="dr_1_1_count" name="dr_1_1_count" type="number" class="hidden" value="1">
                    <input type="text" style="display: none" id="dr_name_1_1" name="dr_name_1_1">
                </div>


                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex w-1/3 justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.mantenimiento') }}</b></label>
                    </div>
                    <div class="flex w-full justify-start">
                        <select onchange="valida_selects_inps(this.id);"  style="margin-left: 2px;" class="w-full border-2 border-blue-600 rounded-md py-2" name="csMantenimiento" id="csMantenimiento">
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
                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>{{ __('index.inversion inicial') }} (CAPEX)</b></label>
                    </div>

                    <div class="w-1/2 flex justify-start text-left">
                        <input style="margin-left: 0px;" onchange="format_num(this.value,this.id);valida_selects_inps(this.id)" type="text" class="2xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center" type="text" name="cheValorS_1_1" id="cheValorS_1_1" >
                        <input  id="cheValorS_1_1_count" name="cheValorS_1_1_count" type="number" class="hidden" value="1">
                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label  class="labels" for=""><b>{{ __('index.costo anual') }}</b> </label>
                    </div>

                    <div class="w-1/2 flex justify-start">
                        <input type="text" style="margin-left: 2px;" onchange="format_num(this.value,this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center"  name="maintenance_cost_1_1" id="maintenance_cost_1_1" >
                    </div>
                </div>




            </div>
          </div>
        </div>
       </div>
      </div>

      {{-- 1.1 --}}


    </div>
</div>
    <div style="width: 100%" class="mx-1">
        {{-- 2.1 --}}
        <div  class="text-white rounded-t-xl w-80 bg-orange-500 2xl:flex xl:flex lg:grid justify-between 2xl:py-3 xl:py-3 lg:py-0 ">
            <div class="ml-5 2xl:w-10 xl:w-auto lg:w-1/4 flex justify-start">
                <a href="#final2">
                    <button onclick="modal_solo_paga();" type="button"  class="rounded-xl p-1 m-0 hover-button-plus text-3xl"><i class="fa-solid fa-plus text-white "></i></button>
                </a>
            <input type="number" class="hidden" value="2" id="cont_sol_2" name="cont_sol_2">
            </div>
            <div class="2xl:ml-5 xl:ml-5 lg:ml-10 w-full flex 2xl:justify-center xl:justify-center lg:justify-center py-1">
                <h2 style="margin-right: 75px;" class="text-white font-bold justify-start text-3xl">{{ __('index.solucion') }} A</h2>
            </div>
          {{--   <div cslass="w-1/2 flex justify-start">
                <h2 class="text-white font-bold justify-start">ENFRIAMIENTO SOLUCIÓN 1</h2>
            </div> --}}
        </div>
        <div class="border-r-2 border-l-2 border-blue-500" id="2_border_bottom" name="2_border_bottom">


        <div class="grid w-full">

            <div class="flex">
                <div class="w-full mx-2 mt-2 bg-gray-200 rounded-md shadow-md">
                  <div class="grid gap-y-1 my-2">
                    <div class="flex w-full gap-x-1">
                        <div class="lg:grid 2xl:flex xl:flex  gap-x-1 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.unidadhvac') }}</b> </label>
                            </div>
                            <div class="w-1/2 flex justify-start">
                                <select class="w-full border-2 border-blue-600 rounded-md p-2" onchange="unidadHvac(this.value,1,'cheTipo_2_1');check_chiller(this.value,'csStd_2_1',1);"  name="cUnidad_2_1" id="cUnidad_2_1" >
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
                            <div class="flex justify-start w-1/2 text-left">
                                <label class="labels" for=""><b>{{ __('index.tipo equipo') }}</b> </label>
                            </div>
                            <div class="w-full flex justify-start">
                                <select style="font-size: 14px" class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);change_diseño(this.value,1,'cheDisenio_2_1','tipo_control_2_1','dr_2_1','lblCsTipo_2_1');"  name="cheTipo_2_1" id="cheTipo_2_1">

                                </select>
                             </div>
                             <input  id="cheTipo_2_1_count" name="cheTipo_2_1_count" type="number" class="hidden" value="1">
                            <input type="text" style="display: none" id="lblCsTipo_2_1" name="lblCsTipo_2_1">
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label  class="labels" for=""><b>{{ __('index.tipo diseño') }}</b> </label>
                            </div>
                            <div class="w-1/2 flex justify-start">
                                <select class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);send_name(this.id);" name="cheDisenio_2_1" id="cheDisenio_2_1">

                                </select>
                            </div>
                            <input  id="cheDisenio_2_1_count" name="cheDisenio_2_1_count" type="number" class="hidden" value="1">
                            <input type="text" style="display: none" id="name_diseno_2_1" name="name_diseno_2_1">
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/2 text-left">
                                <label  class="labels" for=""><b>{{ __('index.capacidad termica') }}</b> </label>
                            </div>
                            <div class="flex w-full justify-start gap-x-2">
                                <div class="w-full">
                                    <input name="capacidad_total_2_1" id="capacidad_total_2_1" style="margin-left: 2.3px;" onchange="valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);"  onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md py-2 text-center" >
                                </div>
                                <input  id="capacidad_total_2_1_count" name="capacidad_total_2_1_count" type="number" class="hidden" value="1">
                                <div class="w-full">
                                    <input type="text" class="w-full border-2 border-blue-600 rounded-md py-2 text-center" readonly name="unidad_capacidad_tot_2_1" id="unidad_capacidad_tot_2_1" >

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
                            <input name="costo_elec_2_1" id="costo_elec_2_1" readonly onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full text-center border-2 border-blue-600 rounded-md py-1">
                            <input  id="costo_elec_2_1_count" name="costo_elec_2_1_count" type="number" class="hidden" value="1">
                        </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/3 text-left">
                                <label class="labels" for=""><b>{{ __('index.hors enf') }}</b> </label>
                            </div>
                            <div class="flex justify-start w-1/3">
                                <input type="text" style="font-size: 14px;margin-left:1px;" onchange="valida_selects_inps(this.id);" class="w-full border-2 border-blue-600 rounded-md py-1 text-center" name="hrsEnfriado_2_1" id="hrsEnfriado_2_1" readonly>
                                <input  id="hrsEnfriado_2_1_count" name="hrsEnfriado_2_1_count" type="number" class="hidden" value="1">
                            </div>
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">
                            <div class="flex justify-start w-1/3">
{{--                                 <input name="csStd_2_1" readonly id="csStd_2_1" style="padding-top: 0.425rem;padding-bottom: 0.248rem;" class="w-full border-2 border-blue-600 rounded-md py-1 text-center">
 --}}
                                <select name="csStd_2_1" id="csStd_2_1" style="padding-top: 0.43rem;padding-bottom: 0.43rem;font-size: 14px;" onchange="check_send_efi(this.value,document.getElementById('cUnidad_2_1').value,'csStd_2_1');" class="w-full border-2 border-blue-600 rounded-md text-center">

                                </select>
                            </div>
                            <div class="flex justify-start w-1/4">
                            <input onchange="valida_selects_inps(this.id);"  name="csStd_cant_2_1" id="csStd_cant_2_1" type="text" style="font-size: 14px;" class="text-center w-full border-2 border-blue-600 rounded-md">
                            <input  id="csStd_cant_2_1_count" name="csStd_cant_2_1_count" type="number" class="hidden" value="1">
                            </div>

                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                            <div class="flex justify-start text-left w-1/2">
                                <label class="labels" for=""><b>{{ __('index.tipo control') }}</b> </label>
                            </div>
                            <div class="flex justify-start w-full">
                            <select class="w-full border-2 border-blue-600 rounded-md py-1"  onchange="valida_selects_inps(this.id);send_name_t_c(this.id);"  name="tipo_control_2_1" id="tipo_control_2_1">

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
                            <select  style="width: 77%;" class="border-2 border-blue-600 rounded-md py-1" onchange="valida_selects_inps(this.id);send_name_dr(this.id);" name="dr_2_1" id="dr_2_1" >


                            </select>
                            </div>
                            <input type="text" style="display: none" id="dr_name_2_1"   name="dr_name_2_1">
                            <input  id="dr_2_1_count" name="dr_2_1_count" type="number" class="hidden" value="1">
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                            <div class="flex w-1/3 justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.mantenimiento') }}</b> </label>
                            </div>
                            <div class="flex w-full justify-start">
                                <select style="margin-left: 0px;" class="w-full border-2 border-blue-600 rounded-md py-2" name="csMantenimiento_2_1" id="csMantenimiento_2_1" onchange="valida_selects_inps(this.id);">
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
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                            <div class="w-1/3 flex justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.inversion inicial') }} (CAPEX)</b></label>
                            </div>
                            <div class="w-1/2 flex justify-start text-left">
                                <input type="text"  onchange="format_num(this.value,this.id);valida_selects_inps(this.id)"  class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center" name="cheValorS_2_1" id="cheValorS_2_1" >
                                <input  id="cheValorS_2_1_count" name="cheValorS_2_1_count" type="number" class="hidden" value="1">

                            </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.costo anual') }}</b> </label>
                            </div>

                            <div class="w-1/2 flex justify-start">
                                <input type="text" style="margin-left: 3px;" onchange="format_num(this.value,this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center"  name="maintenance_cost_2_1" id="maintenance_cost_2_1" >
                            </div>
                        </div>


                    </div>
                  </div>
                </div>
               </div>
        </div>
        {{-- 2.1 --}}


    </div>
    </div>

    <div style="width: 100%" class="mx-1">
         {{-- 3.1 --}}
         <div  class="bg-orange-500 text-white rounded-t-xl w-80 2xl:flex xl:flex lg:grid justify-between 2xl:py-3 xl:py-3 lg:py-0 ">
            <div class="ml-5 2xl:w-10 xl:w-auto lg:w-1/4 flex justify-start">
                <a href="#final3">
                    <button onclick="modal_solo_paga();" type="button"  class="rounded-xl p-1 m-0 hover-button-plus text-3xl"><i class="fa-solid fa-plus text-white"></i></button>
                </a>
                <input type="number" class="hidden" value="2" id="cont_sol_3" name="cont_sol_3">
            </div>
            <div class="2xl:ml-0 xl:ml-0 lg:ml-10 w-full flex 2xl:justify-center xl:justify-center lg:justify-center py-1">
                <h2 style="margin-right: 75px;" class="text-white font-bold  text-3xl ">{{ __('index.solucion') }} B</h2>
            </div>
          {{--   <div cslass="w-1/2 flex justify-start">
                <h2 class="text-white font-bold justify-start">ENFRIAMIENTO SOLUCIÓN 1</h2>
            </div> --}}
        </div>
        <div class="border-r-2 border-l-2 border-blue-600" id="3_border_bottom" name="3_border_bottom">


         <div class="grid w-full">

            <div class="flex">
                <div class="w-full mx-2 mt-2 bg-gray-200 rounded-md shadow-md">
                  <div class="grid gap-y-1 my-2">
                    <div class="flex w-full">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label  class="labels" for=""><b>{{ __('index.unidadhvac') }}</b> </label>
                            </div>
                            <div class="w-1/2 flex justify-start">
                                <select class="w-full border-2 border-blue-600 rounded-md p-2"  onchange="unidadHvac(this.value,1,'cheTipo_3_1');check_chiller(this.value,'csStd2_3_1',1);" name="cUnidad_3_1" id="cUnidad_3_1" >
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
                            <div class="flex justify-start w-1/2 text-left">
                                 <label  class="labels" for=""><b>{{ __('index.tipo equipo') }}</b> </label>
                             </div>
                             <div class="w-full flex justify-start">
                                    <select style="font-size: 14px" class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);change_diseño(this.value,1,'cheDisenio_3_1','tipo_control_3_1','dr_3_1','lblCsTipo_3_1');"  name="cheTipo_3_1" id="cheTipo_3_1">

                                    </select>
                            </div>
                            <input  id="cheTipo_3_1_count" name="cheTipo_3_1_count" type="number" class="hidden" value="1">

                            <input type="text" style="display: none" id="lblCsTipo_3_1" name="lblCsTipo_3_1">
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label  class="labels" for=""><b>{{ __('index.tipo diseño') }}</b> </label>
                            </div>
                            <div class="w-1/2 flex justify-start">
                                <select class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);send_name(this.id);" name="cheDisenio_3_1" id="cheDisenio_3_1">

                                </select>
                            </div>
                            <input  id="cheDisenio_3_1_count" name="cheDisenio_3_1_count" type="number" class="hidden" value="1">
                            <input type="text" style="display: none" id="name_diseno_3_1" name="name_diseno_3_1">
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/2 text-left">
                                <label class="labels" for=""><b>{{ __('index.capacidad termica') }}</b> </label>
                            </div>

                            <div class="flex w-full justify-start gap-x-2">
                                <div class="w-full">
                                    <input id="capacidad_total_3_1" name="capacidad_total_3_1" type="text" onchange="valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);"  onkeypress="return soloNumeros(event)" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md py-2 text-center" >
                                    <input  id="capacidad_total_3_1_count" name="capacidad_total_3_1_count" type="number" class="hidden" value="1">

                                </div>
                                <div class="w-full">
                                    <input class="w-full  border-2 border-blue-600 rounded-md py-2 text-center"  type="text" readonly name="unidad_capacidad_tot_3_1" id="unidad_capacidad_tot_3_1" >

                                </div>
                            </div>
                            <input type="text" style="display: none" id="lblCsTipo" name="lblCsTipo" value="Tipo paquete">
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-2">
                            <div class="w-1/3 flex justify-start text-left" title="Costo Eléctrico">
                                <label style="" class="labels" for=""><b>{{ __('index.costo elec') }} $/Kwh</b> </label>
                            </div>
                            <div class="w-1/2 flex justify-start">
{{--                                                                 <input onchange="valida_selects_inps(this.id);" name="costo_elec_3_1" id="costo_elec_3_1" readonly onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;margin-left:2px;" class="w-full text-center border-2 border-blue-600 rounded-md py-1">
--}}
                            <input name="costo_elec_3_1" id="costo_elec_3_1" readonly onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full text-center border-2 border-blue-600 rounded-md py-1">

</div>
                            <input  id="costo_elec_3_1_count" name="costo_elec_3_1_count" type="number" class="hidden" value="1">
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/3 text-left">
                                <label  class="labels" for=""><b>{{ __('index.hors enf') }}</b> </label>
                            </div>
                            <div class="flex justify-start w-1/3">
                                <input onchange="valida_selects_inps(this.id);" type="text" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md py-1 text-center" name="hrsEnfriado_3_1" id="hrsEnfriado_3_1" readonly>

                            </div>
                            <input  id="hrsEnfriado_3_1_count" name="hrsEnfriado_3_1_count" type="number" class="hidden" value="1">

                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-2 gap-y-1">
                            <div class="flex justify-start w-1/3">
                                <select name="csStd2_3_1" id="csStd2_3_1" style="padding-top: 0.43rem;padding-bottom: 0.43rem;font-size: 14px;" onchange="check_send_efi(this.value,document.getElementById('cUnidad_3_1').value,'csStd2_3_1');" class="w-full border-2 border-blue-600 rounded-md text-center">
                                </select>
                            </div>
                            <div class="flex justify-start w-1/4">
                             <input  name="cheStd_3_1" id="cheStd_3_1" onchange="valida_selects_inps(this.id);" type="text" style="font-size: 14px;" class="w-full py-1 border-2 border-blue-600 rounded-md text-center">
                            </div>
                            <input  id="cheStd_3_1_count" name="cheStd_3_1_count" type="number" class="hidden" value="1">
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                            <div class="flex justify-start text-left w-1/2">
                                <label  class="labels" for=""><b>{{ __('index.tipo control') }}</b> </label>
                            </div>
                            <div class="flex justify-start w-full">
                                <select class="w-full border-2 border-blue-600 rounded-md py-1"  onchange="valida_selects_inps(this.id);send_name_t_c(this.id);"  name="tipo_control_3_1" id="tipo_control_3_1">

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
                                <select style="width: 77%;margin-left:2.5px;" class="border-2 border-blue-600 rounded-md py-1" onchange="valida_selects_inps(this.id);send_name_dr(this.id);" name="dr_3_1" id="dr_3_1" >
                                </select>
                            </div>
                            <input  id="dr_3_1_count" name="dr_3_1_count" type="number" class="hidden" value="1">

                            <input type="text" style="display: none" id="dr_name_3_1" name="dr_name_3_1">

                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex w-1/3 justify-start text-left">
                                <label  class="labels" for=""><b>{{ __('index.mantenimiento') }}</b> </label>
                            </div>
                            <div class="flex w-full justify-start">
                                <select onchange="valida_selects_inps(this.id);" style="margin-left: 2px;" class="w-full border-2 border-blue-600 rounded-md py-2" name="cheMantenimiento_3_1" id="cheMantenimiento_3_1">
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
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label  class="labels" for=""><b>{{ __('index.inversion inicial') }} (CAPEX)</b> </label>
                            </div>
                            <div class="w-1/2 flex justify-start text-left">
                                 <input style="margin-left: 1px;" onchange="format_num(this.value,this.id);valida_selects_inps(this.id)" type="text" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center" name="cheValorS_3_1" id="cheValorS_3_1" >
                                 <input  id="cheValorS_3_1_count" name="cheValorS_3_1_count" type="number" class="hidden" value="1">

                                </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label class="labels" for=""><b>{{ __('index.costo anual') }}</b> </label>
                            </div>

                            <div class="w-1/2 flex justify-start">
                                <input type="text" tyle="margin-left: 2px;" onchange="format_num(this.value,this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center"   name="maintenance_cost_3_1" id="maintenance_cost_3_1" >
                            </div>
                        </div>


                    </div>
                  </div>
                </div>
               </div>
        </div>
        {{-- 3.1 --}}


        </div>
        {{-- espacio --}}
        <div class="grid w-full justify-items-center mt-8s rounded-md  p-10">

        </div>
         {{-- espacio --}}
    </div>
</div>
<div  class="w-full mt-4  flex justify-center">
    <img style="width:70%;height:185px;" src="{{asset('assets\images\banner_ver.png')}}" alt="">
</div>
