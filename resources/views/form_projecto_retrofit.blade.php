<div id="content" style=" display: flex; justify-content: center;" class="font-roboto">
    <div style="width: 100%; text-align: -webkit-right;" class="mx-1">
        <div class="bg-orange-500 text-white rounded-t-xl w-80 2xl:flex xl:flex lg:grid justify-between 2xl:py-3 xl:py-3 lg:py-0  ">
            <div class="ml-5 2xl:w-10 xl:w-auto lg:w-1/4 flex justify-start">
             <a href="#final1">   <button onclick="active_display_retro('sol_1_retro');" type="button" class="rounded-xl p-1 m-0 hover-button-plus text-3xl">{{-- <i class="fa-solid fa-plus text-white"></i> --}}</button></a>
                <input type="text" class="hidden" value="2" id="cont_sol_1_retro" name="cont_sol_1_retro">
                <input type="text" class="hidden" value="1" id="set_sol_1_retro" name="set_sol_1_retro">
            </div>
            <div class="2xl:ml-5 xl:ml-5 lg:ml-10 w-full flex  2xl:justify-center xl:justify-center lg:justify-center  py-1">
                <h2 style="margin-right: 0px;" class="text-white font-bold text-3xl">Sistema Existente</h2>
            </div>
            @include('modal_add_marca_modelo')
            <div class="mr-5 2xl:w-10 xl:w-auto lg:w-1/4 flex justify-end">
                <button  onclick="mostrar_modal_marcas_modelos('modal_add_marca_modelo');send_marcas_to_datalist();" type="button"  class="rounded-xl p-1 m-0 text-3xl"><img src="{{asset('/assets/images/air-conditioning_blue.png')}}" height ="60" width="60" /></button>
            </div>
                {{--   <div cslass="w-1/2 flex justify-start">
                <h2 class="text-white font-bold justify-start">ENFRIAMIENTO SOLUCIÓN 1</h2>
            </div> --}}
        </div>
        <div style="border-color:#233064;" class="border-r-2 border-l-2">


        <div class="grid w-full" id="sol_1_1" name="sol_1_1">
        <input type="text" name="pais_retro" id="pais_retro" class="hidden">
        <input type="text" name="ciudad_retro" id="ciudad_retro" class="hidden">

       <div class="flex w-full ">
        <div class="w-full  mt-2 mx-2 bg-gray-200 rounded-md shadow-md">
          <div class="grid gap-y-2 my-2 ">

            <div class="flex w-full">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2 ">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>Unidad HVAC</b> </label>
                    </div>

                    <div class="w-1/2 flex justify-start">
                        <select name="cUnidad_1_1_retro" id="cUnidad_1_1_retro" class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_form_calc(2);unidadHvac(this.value,1,'csTipo_1_1_retro','csDisenio_1_1_retro');">
                            <option value="0">Seleccionar</option>
                            <option value="1">Paquetes (RTU)</option>
                            <option value="2">Split DX</option>
                            <option value="3">VRF No Ductados</option>
                            <option value="4">VRF Ductados</option>
                            <option value="5">PTAC/VTAC</option>
                            <option value="6">WSHP</option>
                            <option value="7">Minisplit Inverter</option>
                        </select>
                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/2 text-left">
                        <label class="labels" for=""><b>Tipo Equipo</b> </label>
                    </div>
                    <div class="w-full flex justify-start">
                        <select style="font-size: 14px" class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);change_diseño(this.value,1,'csDisenio_1_1_retro','tipo_control_1_1_retro','dr_1_1_retro','lblCsTipo_1_1_retro');"  name="csTipo_1_1_retro" id="csTipo_1_1_retro">
                        </select>
                    </div>

                    <input type="text" style="display: none" id="lblCsTipo_1_1_retro" name="lblCsTipo_1_1_retro">
                    <input  id="tipo_equipo_1_1_count_retro " name="tipo_equipo_1_1_count_retro " type="number" class="hidden" value="1">
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>Marca</b> </label>
                    </div>

                    <div class="w-1/2 flex justify-start">
                        <select onchange="valida_selects_inps(this.id);send_modelos(this.value,'modelo_1_1_retro');send_marca_to_modal(this.value,'marcas_modal');" name="marca_1_1_retro" id="marca_1_1_retro" class="w-full border-2 border-blue-600 rounded-md py-2">

                        </select>
                        <input  id="marca_1_1_retro_count" name="marca_1_1_retro_count" type="number" class="hidden" value="1">

                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/2 text-left">
                        <label class="labels" for=""><b>Modelo</b></label>
                    </div>
                    <div class="w-full flex justify-start">
                        <select style="font-size: 14px" onchange="valida_selects_inps(this.id);" class="w-full border-2 border-blue-600 rounded-md py-2"   name="modelo_1_1_retro" id="modelo_1_1_retro">
                        </select>
                    </div>

                    <input  id="modelo_1_1_retro_count" name="modelo_1_1_retro_count" type="number" class="hidden" value="1">
                </div>
            </div>


            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/3 ">
                        <label  class="labels" for=""><b>Años de vida</b> </label>
                    </div>

                    <div class="flex justify-start w-1/3">
                        <input name="yrs_vida_1_1_retro" id="yrs_vida_1_1_retro" onchange="valida_selects_inps(this.id);" onkeypress="return soloNumeros(event)"  type="text" class="text-center w-full border-2 border-blue-600 rounded-md">

                        <input  id="yrs_vida_1_1_retro_count" name="yrs_vida_1_1_retro_count" type="number" class="hidden" value="1">

                    </div>


                </div>
                @include('modal_seer_retro')
                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">
                    <div class="flex justify-start w-1/3 text-left">
                        <label  class="labels" for=""><b>Eficiencia Original</b> </label>
                    </div>
                    <div class="flex justify-start w-1/4">
                        <select name="csStd_1_1_retro" id="csStd_1_1_retro" style="padding-top: 0.43rem;padding-bottom: 0.43rem;" onchange="set_ser_to_sers(this.value);" class="w-full border-2 border-blue-600 rounded-md text-center">
                            <option value="SEER">SEER</option>
                            <option value="SEER2">SEER2</option>
                            <option value="IEER">IEER</option>
                            <option value="IPVL" disabled>IPVL</option>
                        </select>
                    </div>
                    <div class="flex justify-start w-1/4">
                        <input name="csStd_retro_1_1_cant" id="csStd_retro_1_1_cant" onkeypress="return soloNumeros(event)" onchange="valida_selects_inps(this.id);" type="text" class="text-center w-full border-2 border-blue-600 rounded-md">
                        <input  id="csStd_retro_1_1_count" name="csStd_retro_1_1_count" type="number" class="hidden" value="1">
                    </div>
                    <div class="mt-1">
                        <a onclick="mostrar_modal_energia_hvac('modal_seer_retro');" class="btn_roundf_retro" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                    </div>
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/2 text-left">
                        <label  class="labels" for=""><b>Capacidad Térmica</b> </label>
                    </div>
                    <div class="flex w-full justify-start gap-x-2">
                        <div class="w-1/3">
                            <input type="text" style="margin-left: 1px;" onchange="valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);"  onkeypress="return soloNumeros(event)" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md py-2 text-center" name="capacidad_total_1_1_retro" id="capacidad_total_1_1_retro" >
                        </div>
                        <input  id="capacidad_total_1_1_retro_count" name="capacidad_total_1_1_retro_count" type="number" class="hidden" value="1">
                        <div class="w-1/3">
                        <select class="w-full  border-2 border-blue-600 rounded-md h-full text-center" onchange="cap_term_change(this.value);"  id="unidad_capacidad_tot_1_1_retro" name="unidad_capacidad_tot_1_1_retro">
                            <option value="TR">TR</option>
                            <option value="KW">KW</option>
                        </select>
                         </div>
                    </div>


                </div>

                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">

                    <div class="w-1/2 flex justify-start text-left">
                        <label class="labels" for=""><b>Tipo Diseño</b> </label>
                    </div>

                    <div class="w-full flex justify-start">
                        <select onchange="valida_selects_inps(this.id);send_name(this.id);" name="csDisenio_1_1_retro" id="csDisenio_1_1_retro" class="w-full border-2 border-blue-600 rounded-md py-2">
                        </select>
                    </div>
                    <input type="text" style="display: none" id="lblCsDisenio" name="lblCsDisenio" value="ASHRAE 55/62.1/90.1">
                    <input type="text" style="display: none" id="name_diseno_1_1_retro" name="name_diseno_1_1_retro">
                    <input  id="csDisenio_1_1_retro_count" name="csDisenio_1_1_retro_count" type="number" class="hidden" value="1">
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                    <div class="w-1/3 flex justify-start text-left" title="Costo Eléctrico">
                        <label  class="labels" for=""><b>Costo Eléctrico $/Kwh</b> </label>
                    </div>
                    <div class="w-1/2 flex justify-start">
                        <input id="costo_elec_1_1_retro" name="costo_elec_1_1_retro" onchange="valida_selects_inps(this.id);asign_cos_ele(this.value);" onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full text-center border-2 border-blue-600 rounded-md py-1">
                    </div>
                    <input  id="costo_elec_1_1_retro_count" name="costo_elec_1_1_retro_count" type="number" class="hidden" value="1">
                </div>
                @include('modal_coolinghours_retro')
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/3 text-left">
                        <label  class="labels" for=""><b>Horas Enfriamiento</b> </label>
                    </div>
                    <div class="flex justify-start w-1/3">
                        <input  type="text" style="font-size: 14px;margin-left:1px;" class="w-full border-2 border-blue-600 rounded-md py-1 text-center" name="hrsEnfriado_1_1_retro" onkeypress="return soloNumeros(event)" id="hrsEnfriado_1_1_retro" onchange="hrs_enfs_inps(this.value);valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);">
                        <input  id="hrsEnfriado_1_1_retro_count" name="hrsEnfriado_1_1_retro_count" type="number" class="hidden" value="1">
                    </div>

                    <div class="mt-1">
                        <a onclick="mostrar_modal_energia_hvac('modal_coolinghours_retro');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                    </div>
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                    <div class="flex justify-start w-1/3 text-left">
                        <label  class="labels" for=""><b>Tipo Control</b> </label>
                    </div>

                    <div class="flex justify-start w-1/2">
                        <select class="w-full border-2 border-blue-600 rounded-md py-2"   onchange="valida_selects_inps(this.id);send_name_t_c(this.id);" name="tipo_control_1_1_retro" id="tipo_control_1_1_retro">

                        </select>
                        <input  id="tipo_control_1_1_retro_count" name="tipo_control_1_1_retro_count" type="number" class="hidden" value="1">

                    </div>

                    <input type="text" style="display: none" id="name_t_control_1_1_retro" name="name_t_control_1_1_retro">
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>Difusor/Rejilla</b> </label>
                    </div>
                    <div class="w-full flex justify-start">
                        <select style="width: 100%;margin-left:6px;" class="border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);send_name_dr(this.id);" name="dr_1_1_retro" id="dr_1_1_retro" >
                        </select>
                    </div>
                    <input  id="dr_1_1_retro_count" name="dr_1_1_retro_count" type="number" class="hidden" value="1">
                    <input type="text" style="display: none" id="dr_name_1_1_retro" name="dr_name_1_1_retro">
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex w-1/2">
                    <div class="flex w-1/3 justify-start text-left">
                        <label class="labels" for=""><b>Tipo de Mantenimiento</b></label>
                    </div>
                    <div class="flex w-1/2 justify-start">
                        <select onchange="valida_selects_inps(this.id);"  style="margin-left: 5px;" class="w-full border-2 border-blue-600 rounded-md py-2" name="csMantenimiento_1_1_retro" id="csMantenimiento_1_1_retro">
                            <option selected value="0">Seleccionar</option>
                            <option value="ASHRAE 180">ASHRAE 180</option>
                            <option value="Deficiente">Deficiente</option>
                            <option value="Sin Mantenimiento">Sin Mantenimiento</option>
                        </select>
                        <input  id="csMantenimiento_1_1_retro_count" name="csMantenimiento_1_1_retro_count" type="number" class="hidden" value="1">

                    </div>


                    <input type="text" style="display: none" id="lblCsMantenimiento_1_1_retro" name="lblCsMantenimiento_1_1_retro" value="ASHRAE 180 Proactivo">
                    <input type="text" style="display: none" id="lblCsTipo" name="lblCsTipo" value="Tipo paquete">
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label  class="labels" for=""><b>Valor por Depreciar</b> </label>
                    </div>

                    <div class="w-1/2 flex justify-start">
                        <input type="text" style="margin-left: 2px;" onchange="valida_selects_inps(this.id);format_num(this.value,this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center"  name="costo_recu_1_1_retro" id="costo_recu_1_1_retro" >
                    </div>
                    <input  id="costo_recu_1_1_retro_count" name="costo_recu_1_1_retro_count" type="number" class="hidden" value="1">

                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                    <div class="w-1/3 flex justify-start text-left">
                        <label  class="labels" for=""><b>Costo Anual Mantenimiento</b> </label>
                    </div>

                    <div class="w-1/2 flex justify-start">
                        <input type="text" style="margin-left: 2px;" onchange="valida_selects_inps(this.id);format_num(this.value,this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center"  name="maintenance_cost_1_1_retro" id="maintenance_cost_1_1_retro" >
                    </div>
                     <input  id="maintenance_cost_1_1_retro_count" name="maintenance_cost_1_1_retro_count" type="number" class="hidden" value="1">
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>Costo Anual Reparaciones</b></label>
                    </div>

                    <div class="w-1/2 flex justify-start text-left">
                        <input style="margin-left: 0px;" onchange="format_num(this.value,this.id);valida_selects_inps(this.id)" type="text" class="2xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center" type="text" name="const_an_rep_1_1" id="const_an_rep_1_1" >
                        <input  id="const_an_rep_1_1_count" name="const_an_rep_1_1_count" type="number" class="hidden" value="1">
                    </div>
                </div>
            </div>


          </div>
        </div>
       </div>
      </div>

      {{-- 1.1 --}}

      {{-- 1.2 --}}
      {{-- <div class="grid w-full hidden"  id="sol_1_2_retro" name="sol_1_2_retro">
       <div class="mx-2">
        <hr>
       </div>
        <div class="flex">
        <div class="rounded-xl mt-2 bg-gray-200 rounded-md shadow-md mx-2">

          <div class="grid gap-y-2 my-2">
            <div class="flex w-full">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label  class="labels" for=""><b>Unidad HVAC</b> </label>
                    </div>

                    <div class="w-1/2 flex justify-start">
                        <select  class="w-full border-2 border-blue-600 rounded-md p-2" onchange="unidadHvac(this.value,2,'csTipo_1_2_retro');" name="cUnidad_1_2_retro" id="cUnidad_1_2_retro" >
                            <option value="0">Seleccionar</option>
                            <option value="1">Paquetes (RTU)</option>
                            <option value="2">Split DX</option>
                            <option value="3">VRF No Ductados</option>
                            <option value="4">VRF Ductados</option>
                            <option value="5">PTAC</option>
                            <option value="6">WSHP</option>
                            <option value="7">Minisplit Inverter</option>
                        </select>
                    </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/2 text-left">
                        <label  class="labels" for=""><b>Tipo Equipo</b></label>
                    </div>

                    <div class="w-full flex justify-start">
                        <select style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);change_diseño(this.value,2,'csDisenio_1_2_retro','tipo_control_1_2_retro','dr_1_2_retro','lblCsTipo_1_2_retro');"  name="csTipo_1_2_retro" id="csTipo_1_2_retro">
                        </select>
                    </div>
                    <input  id="csTipo_1_2_count_retro" name="csTipo_1_2_count_retro" type="number" class="hidden" value="1">
                    <input type="text" style="display: none" id="lblCsTipo_1_2_retro" name="lblCsTipo_1_2_retro">
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label  class="labels" for=""><b>Tipo Diseño</b> </label>
                    </div>
                    <div class="w-1/2 flex justify-start">
                        <select  class="w-full border-2 border-blue-600 rounded-md py-2"  onchange="valida_selects_inps(this.id);send_name(this.id);" name="csDisenio_1_2_retro" id="csDisenio_1_2_retro">
                        </select>
                    </div>
                    <input  id="csDisenio_1_2_retro_count" name="csDisenio_1_2_retro_count" type="number" class="hidden" value="1">
                    <input type="text" style="display: none" id="lblCsDisenio_1_2_retro" name="lblCsDisenio_1_2_retro">
                    <input type="text" style="display: none" id="name_diseno_1_2_retro" name="name_diseno_1_2_retro">
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/2 text-left">
                        <label class="labels" for=""><b>Capacidad Térmica</b> </label>
                    </div>

                    <div class="flex w-full justify-start gap-x-2">
                    <div class="w-full">
                        <input style="margin-left: 0px;" name="capacidad_total_1_2_retro" id="capacidad_total_1_2_retro" onchange="valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);"  onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md py-2 text-center" >
                    </div>
                    <input  id="capacidad_total_1_2_retro_count" name="capacidad_total_1_2_retro_count" type="number" class="hidden" value="1">
                    <div class="w-full">
                        <input class="w-full  border-2 border-blue-600 rounded-md py-2 text-center"  type="text" readonly name="unidad_capacidad_tot_1_2_retro" id="unidad_capacidad_tot_1_2_retro" >
                    </div>
                    </div>
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                    <div class="w-1/3 flex justify-start text-left">
                        <label  class="labels" for=""><b>Costo Eléctrico $/Kwh</b> </label>
                    </div>
                    <div class="w-1/2 flex justify-start">
                        <input  id="costo_elec_1_2_retro" name="costo_elec_1_2_retro" readonly onchange="valida_selects_inps(this.id);" onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full text-center border-2 border-blue-600 rounded-md py-1">
                     </div>
                     <input  id="costo_elec_1_2_retro_count" name="costo_elec_1_2_retro_count" type="number" class="hidden" value="1">

                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex justify-start w-1/3 text-left ">
                        <label  class="labels" for=""><b>Horas Enfriamiento</b> </label>
                    </div>

                    <div class="flex justify-start w-1/3">
                        <input type="text" onchange="valida_selects_inps(this.id);" style="font-size: 14px;margin-left:1px;" class="w-full border-2 border-blue-600 rounded-md py-1 text-center" name="hrsEnfriado_1_2_retro" id="hrsEnfriado_1_2_retro">
                        <input  id="hrsEnfriado_1_2_retro_count" name="hrsEnfriado_1_2_retro_count" type="number" class="hidden" value="1">

                    </div>
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">

                        <div class="flex justify-start w-1/3">
                        <input type="text"  style="padding-top: 0.425rem;padding-bottom: 0.425rem;" readonly name="csStd_1_2_retro" id="csStd_1_2_retro" class="w-full border-2 border-blue-600 rounded-md text-center">

                        </div>

                        <div class="flex justify-start w-1/4">
                            <input  id="csStd_cant_1_2_retro" onchange="valida_selects_inps(this.id);" name="csStd_cant_1_2_retro" type="number"  style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md py-1 text-center">
                        </div>
                        <input  id="csStd_cant_1_2_retro_count" name="csStd_cant_1_2_retro_count" type="number" class="hidden" value="1">



                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                    <div class="flex justify-start w-1/2">
                        <label  class="labels" for=""><b>Tipo Control</b> </label>
                    </div>

                    <div class="flex justify-start w-full">
                        <select class="w-full border-2 border-blue-600 rounded-md py-1"  onchange="valida_selects_inps(this.id);send_name_t_c(this.id);"  name="tipo_control_1_2_retro" id="tipo_control_1_2_retro">
                        </select>
                    </div>
                    <input  id="tipo_control_1_2_retro_count" name="tipo_control_1_2_retro_count" type="number" class="hidden" value="1">

                    <input type="text" style="display: none" id="name_t_control_1_2_retro" name="name_t_control_1_2_retro">
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-1/3 flex justify-start text-left">
                        <label  class="labels" for=""><b>Difusor/Rejilla</b> </label>
                    </div>
                    <div class="w-full flex justify-start text-left">
                    <select  style="width: 75%;margin-left:3.5px;" class="border-2 border-blue-600 rounded-md py-1"  onchange="valida_selects_inps(this.id);send_name_dr(this.id);" name="dr_1_2_retro" id="dr_1_2_retro" >
                        <option value="">Seleccionar</option>
                    </select>
                    <input  id="dr_1_2_retro_count" name="dr_1_2_retro_count" type="number" class="hidden" value="1">

                    </div>
                    <input type="text" style="display: none" id="dr_name_1_2_retro" name="dr_name_1_2_retro">
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="flex w-1/3 justify-start text-left">
                        <label class="labels" for=""><b>Mantenimiento</b></label>
                    </div>
                    <div class="flex w-full justify-start">
                        <select onchange="valida_selects_inps(this.id);"  style="margin-left: 2px;" class="w-full border-2 border-blue-600 rounded-md py-2" name="csMantenimiento_1_2_retro" id="csMantenimiento_1_2_retro">
                            <option selected value="0">Seleccionar</option>
                            <option value="ASHRAE 180">ASHRAE 180</option>
                            <option value="Deficiente">Deficiente</option>
                            <option value="Sin Mantenimiento">Sin Mantenimiento</option>
                        </select>
                        <input  id="csMantenimiento_1_2_retro_count" name="csMantenimiento_1_2_retro_count" type="number" class="hidden" value="1">

                    </div>
                    <input type="text" style="display: none" id="lblCsMantenimiento_1_2_retro" name="lblCsMantenimiento_1_2_retro" value="ASHRAE 180 Proactivo">

                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                    <div class="w-1/3 flex justify-start text-left">
                        <label class="labels" for=""><b>Inversión Inicial (CAPEX)</b> </label>
                    </div>
                    <div class="w-1/2 flex justify-start text-left">
                         <input onchange="format_num(this.value,this.id);valida_selects_inps(this.id)"  class="w-full 2xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center" name="cheValorS_1_2_retro" id="cheValorS_1_2_retro" >
                         <input  id="cheValorS_1_2_retro_count" name="cheValorS_1_2_retro_count" type="number" class="hidden" value="1">

                        </div>
                </div>

                <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                    <div class="w-3/6 flex justify-start text-left">
                        <label class="labels" for=""><b>Costo Anual Mantenimiento</b> </label>
                    </div>

                    <div class="w-full flex gap-x-2 justify-start">
                        <div class="flex">
                            <input type="text" style="margin-left: 2.5px;" onchange="format_num(this.value,this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center"  name="maintenance_cost_1_2_retro" id="maintenance_cost_1_2_retro" >
                        </div>
                        <div class="flex justify-end">
                            <button onclick="inactive_display_retro('sol_1_retro')" type="button" class="py-1 px-3 border-2 border-red-500 rounded-md mr-5 text-xl text-orange-400 mt-1 hover:text-white hover:bg-orange-400"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
       </div>
      </div> --}}
      {{-- 1.2 --}}
       <a id="final1" name="final1" href=""></a>

    </div>
</div>
    <div style="width: 100%" class="mx-1">
        {{-- 2.1 --}}
        <div style="background-color: #233064;" class="text-white rounded-t-xl w-80 bg-orange-500  2xl:flex xl:flex lg:grid justify-between 2xl:py-3 xl:py-3 lg:py-0 ">
            <div class="ml-5 2xl:w-10 xl:w-auto lg:w-1/4 flex justify-start">
                <a href="#final2">
                    <button onclick="active_display_retro('sol_2_retro');" type="button"  class="rounded-xl p-1 m-0 hover-button-plus text-3xl">{{-- <i class="fa-solid fa-plus text-white "></i> --}}</button>
                </a>
            <input type="number" class="hidden" value="2" id="cont_sol_2_retro" name="cont_sol_2">
            </div>
            <div class="2xl:ml-5 xl:ml-5 lg:ml-10 w-full flex 2xl:justify-center xl:justify-center lg:justify-center py-1">
                <h2 style="margin-right: 75px;" class="text-white font-bold justify-start text-3xl">Solución A</h2>
            </div>

        </div>
        <div class="border-r-2 border-l-2 border-blue-500">


        <div class="grid w-full">

            <div class="flex">
                <div class="w-full mx-2 mt-2 bg-gray-200 rounded-md shadow-md">
                  <div class="grid gap-y-2 my-2">
                    <div class="flex w-full gap-x-1">
                        <div class="lg:grid 2xl:flex xl:flex  gap-x-1 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label class="labels" for=""><b>Unidad HVAC</b> </label>
                            </div>
                            <div class="w-1/2 flex justify-start">
                                <select class="w-full border-2 border-blue-600 rounded-md p-2" onchange="unidadHvac(this.value,1,'cheTipo_2_1_retro');"  name="cUnidad_2_1_retro" id="cUnidad_2_1_retro" >
                                    <option value="0">Seleccionar</option>
                                    <option value="1">Paquetes (RTU)</option>
                                    <option value="2">Split DX</option>
                                    <option value="3">VRF No Ductados</option>
                                    <option value="4">VRF Ductados</option>
                                    <option value="5">PTAC/VTAC</option>
                                    <option value="6">WSHP</option>
                                    <option value="7">Minisplit Inverter</option>
                                  {{--   <option value="8">Chiller</option> --}}
                                </select>
                            </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/2 text-left">
                                <label class="labels" for=""><b>Tipo Equipo</b> </label>
                            </div>
                            <div class="w-full flex justify-start">
                                <select style="font-size: 14px" class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);change_diseño(this.value,1,'cheDisenio_2_1_retro','tipo_control_2_1_retro','dr_2_1_retro','lblCsTipo_2_1_retro');"  name="cheTipo_2_1_retro" id="cheTipo_2_1_retro">

                                </select>
                             </div>
                             <input  id="cheTipo_2_1_count_retro" name="cheTipo_2_1_count_retro" type="number" class="hidden" value="1">
                            <input type="text" style="display: none" id="lblCsTipo_2_1_retro" name="lblCsTipo_2_1_retro">
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label class="labels" for=""><b>Marca</b> </label>
                            </div>

                            <div class="w-1/2 flex justify-start">
                                <select name="marca_2_1_retro" id="marca_2_1_retro" class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);send_modelos(this.value,'modelo_2_1_retro');send_marca_to_modal(this.value,'marcas_modal_2_1');">

                                </select>
                            <input  id="marca_2_1_retro_count" name="marca_2_1_retro_count" type="number" class="hidden" value="1">

                            </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/2 text-left">
                                <label class="labels" for=""><b>Modelo</b> </label>
                            </div>
                            <div class="w-full flex justify-start">
                                <select style="font-size: 14px" class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);"  name="modelo_2_1_retro" id="modelo_2_1_retro">
                                </select>
                            <input  id="modelo_2_1_retro_count" name="modelo_2_1_retro_count" type="number" class="hidden" value="1">

                            </div>


                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/3 ">
                                <label  class="labels" for=""><b>Años de vida</b> </label>
                            </div>

                            <div class="flex justify-start w-1/3">
                                <input name="yrs_vida_2_1_retro" id="yrs_vida_2_1_retro"  type="text" onchange="valida_selects_inps(this.id);" onkeypress="return soloNumeros(event)" class="text-center w-full border-2 border-blue-600 rounded-md">

                                <input  id="yrs_vida_2_1_retro_count" name="yrs_vida_2_1_retro_count" type="number" class="hidden" value="1">

                            </div>

                        </div>

                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">
                            <div class="flex justify-start w-1/3 text-left">
                                <label  class="labels" for=""><b>Eficiencia</b> </label>
                            </div>
                            <div class="flex justify-start w-1/3">
                                <input name="csStd_2_1_retro" readonly id="csStd_2_1_retro" style="padding-top: 0.425rem;padding-bottom: 0.248rem;" class="w-full border-2 border-blue-600 rounded-md py-1 text-center">
                            </div>
                            <div class="flex justify-start w-1/4">
                            <input onchange="valida_selects_inps(this.id);"  name="csStd_cant_2_1_retro" id="csStd_cant_2_1_retro" type="text" style="font-size: 14px;" class="text-center w-full border-2 border-blue-600 rounded-md">
                            <input  id="csStd_2_1_retro_count" name="csStd_2_1_retro_count" type="number" class="hidden" value="1">
                            </div>

                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">


                            <div class="flex justify-start w-1/3 text-left">
                                <label  class="labels" for=""><b>Capacidad Térmica</b> </label>
                            </div>
                            <div class="flex w-1/2 justify-start gap-x-2">
                                <div class="w-full">
                                    <input name="capacidad_total_2_1_retro" id="capacidad_total_2_1_retro" style="margin-left: 2.3px;" onchange="valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);"  onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md py-2 text-center" >
                                </div>
                                <input  id="capacidad_total_2_1_retro_count" name="capacidad_total_2_1_retro_count" type="number" class="hidden" value="1">
                                <div class="w-full">
                                    <input type="text" class="w-full border-2 border-blue-600 rounded-md py-2 text-center" readonly name="unidad_capacidad_tot_2_1_retro" id="unidad_capacidad_tot_2_1_retro" >

                                 </div>
                             </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="w-1/2 flex justify-start text-left">
                                <label  class="labels" for=""><b>Tipo Diseño</b> </label>
                            </div>
                            <div class="w-full flex justify-start">
                                <select class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);send_name(this.id);" name="cheDisenio_2_1_retro" id="cheDisenio_2_1_retro">

                                </select>
                            </div>
                            <input  id="cheDisenio_2_1_retro_count" name="cheDisenio_2_1_retro_count" type="number" class="hidden" value="1">
                            <input type="text" style="display: none" id="name_diseno_2_1_retro" name="name_diseno_2_1_retro">
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">
                            <div class="w-1/3 flex justify-start text-left" title="Costo Eléctrico">
                                <label style="" class="labels" for=""><b>Costo Eléctrico $/Kwh</b> </label>
                            </div>

                            <div class="w-1/2 flex justify-start">
                            <input name="costo_elec_2_1_retro" id="costo_elec_2_1_retro" readonly onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full text-center border-2 border-blue-600 rounded-md py-1">
                            <input  id="costo_elec_2_1_retro_count" name="costo_elec_2_1_retro_count" type="number" class="hidden" value="1">
                        </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/3 text-left">
                                <label class="labels" for=""><b>Horas Enfriamiento</b> </label>
                            </div>
                            <div class="flex justify-start w-1/3">
                                <input type="text" style="font-size: 14px;margin-left:1px;" onchange="valida_selects_inps(this.id);" class="w-full border-2 border-blue-600 rounded-md py-1 text-center" name="hrsEnfriado_2_1_retro" id="hrsEnfriado_2_1_retro" readonly>
                                <input  id="hrsEnfriado_2_1_retro_count" name="hrsEnfriado_2_1_retro_count" type="number" class="hidden" value="1">
                            </div>
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">
                            <div class="flex justify-start w-1/3">
                                <label class="labels" for=""><b>Tipo Control</b> </label>
                            </div>
                            <div class="flex justify-start w-1/2">
                            <select class="w-full border-2 border-blue-600 rounded-md py-2"  onchange="valida_selects_inps(this.id);send_name_t_c(this.id);"  name="tipo_control_2_1_retro" id="tipo_control_2_1_retro">

                            </select>
                            <input  id="tipo_control_2_1_retro_count" name="tipo_control_2_1_retro_count" type="number" class="hidden" value="1">

                            </div>
                            <input type="text" style="display: none" id="name_t_control_2_1_retro" name="name_t_control_2_1_retro">
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label style="margin-left:2.5px;" class="labels" for=""><b>Difusor/Rejilla</b> </label>
                            </div>
                            <div class="w-full flex justify-start">
                            <select  style="width: 100%;" class="border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);send_name_dr(this.id);" name="dr_2_1_retro" id="dr_2_1_retro" >


                            </select>
                            </div>
                            <input type="text" style="display: none" id="dr_name_2_1_retro"   name="dr_name_2_1_retro">
                            <input  id="dr_2_1_retro_count" name="dr_2_1_retro_count" type="number" class="hidden" value="1">
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2">
                            <div class="flex w-1/3 justify-start text-left">
                                <label class="labels" for=""><b>Tipo de Mantenimiento</b></label>
                            </div>
                            <div class="flex w-1/2 justify-start">
                                <select style="margin-left: 3px;" class="w-full border-2 border-blue-600 rounded-md py-2" name="csMantenimiento_2_1_retro" id="csMantenimiento_2_1_retro" onchange="valida_selects_inps(this.id);">
                                    <option value="0">Seleccionar</option>
                                    <option value="ASHRAE 180">ASHRAE 180</option>
                                    <option value="Deficiente">Deficiente</option>
                                    <option value="Sin Mantenimiento">Sin Mantenimiento</option>
                                </select>
                                <input  id="csMantenimiento_2_1_retro_count" name="csMantenimiento_2_1_retro_count" type="number" class="hidden" value="1">
                            </div>
                            <input type="text" style="display: none" id="lblCsMantenimiento" name="lblCsMantenimiento" value="ASHRAE 180 Proactivo">
                            <input type="text" style="display: none" id="lblCsTipo" name="lblCsTipo" value="Tipo paquete">
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label  class="labels" for=""><b>Inversión Inicial (CAPEX)</b> </label>
                            </div>

                            <div class="w-1/2 flex justify-start">
                                <input type="text" style="margin-left: 2px;" onchange="format_num(this.value,this.id);valida_selects_inps(this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center" name="costo_recu_2_1_retro" id="costo_recu_2_1_retro" >
                            </div>
                            <input  id="costo_recu_2_1_retro_count" name="costo_recu_2_1_retro_count" type="number" class="hidden" value="1">

                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1">

                            <div class="w-1/3 flex justify-start text-left">
                                <label class="labels" for=""><b>Costo Anual Mantenimiento</b> </label>
                            </div>

                            <div class="w-1/2 flex justify-start">
                                <input type="text" style="margin-left: 3px;" onchange="format_num(this.value,this.id);valida_selects_inps(this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center"  name="maintenance_cost_2_1_retro" id="maintenance_cost_2_1_retro" >
                            </div>

                            <input  id="maintenance_cost_2_1_retro_count" name="maintenance_cost_2_1_retro_count" type="number" class="hidden" value="1">

                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                           {{--  <div class="w-1/3 flex justify-start text-left">
                                <label class="labels" for=""><b>Costo Anual Reparaciones</b></label>
                            </div>
                            <div class="w-1/2 flex justify-start text-left">
                                <input type="text"  onchange="format_num(this.value,this.id);valida_selects_inps(this.id)"  class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center" name="const_an_rep_2_1" id="const_an_rep_2_1" >
                                <input  id="const_an_rep_2_1_retro_count" name="const_an_rep_2_1_retro_count" type="number" class="hidden" value="1">

                            </div> --}}

                        </div>


                    </div>
                  </div>
                </div>
               </div>
        </div>
        {{-- 2.1 --}}

       {{-- 2.2 --}}
        <a id="final2" name="final2" href=""></a>

    </div>
    </div>

    <div style="width: 100%" class="mx-1">
         {{-- 3.1 --}}
         <div style="background-color: #233064;" class="text-white rounded-t-xl w-80 2xl:flex xl:flex lg:grid justify-between 2xl:py-3 xl:py-3 lg:py-0 ">
            <div class="ml-5 2xl:w-10 xl:w-auto lg:w-1/4 flex justify-start">
                <a href="#final3">
                    <button onclick="active_display_retro('sol_3_retro');" type="button"  class="rounded-xl p-1 m-0 hover-button-plus text-3xl">{{-- <i class="fa-solid fa-plus text-white"></i> --}}</button>
                </a>
                <input type="number" class="hidden" value="2" id="cont_sol_3_retro" name="cont_sol_3_retro">
            </div>
            <div class="2xl:ml-0 xl:ml-0 lg:ml-10 w-full flex 2xl:justify-center xl:justify-center lg:justify-center py-1">
                <h2 style="margin-right: 75px;" class="text-white font-bold  text-3xl ">Solución B</h2>
            </div>

          {{--   <div cslass="w-1/2 flex justify-start">
                <h2 class="text-white font-bold justify-start">ENFRIAMIENTO SOLUCIÓN 1</h2>
            </div> --}}
        </div>
        <div class="border-r-2 border-l-2 border-blue-600">


         <div class="grid w-full">

            <div class="flex">
                <div class="w-full mx-2 mt-2 bg-gray-200 rounded-md shadow-md">
                  <div class="grid gap-y-2 my-2">
                    <div class="flex w-full">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label  class="labels" for=""><b>Unidad HVAC</b> </label>
                            </div>
                            <div class="w-1/2 flex justify-start">
                                <select class="w-full border-2 border-blue-600 rounded-md p-2"  onchange="unidadHvac(this.value,1,'cheTipo_3_1_retro');" name="cUnidad_3_1_retro" id="cUnidad_3_1_retro" >
                                    <option value="0">Seleccionar</option>
                                    <option value="1">Paquetes (RTU)</option>
                                    <option value="2">Split DX</option>
                                    <option value="3">VRF No Ductados</option>
                                    <option value="4">VRF Ductados</option>
                                    <option value="5">PTAC/VTAC</option>
                                    <option value="6">WSHP</option>
                                    <option value="7">Minisplit Inverter</option>
                                   {{--  <option value="8">Chiller</option> --}}
                                </select>
                            </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/2 text-left">
                                 <label  class="labels" for=""><b>Tipo Equipo</b> </label>
                             </div>
                             <div class="w-full flex justify-start">
                                    <select style="font-size: 14px" class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);change_diseño(this.value,1,'cheDisenio_3_1_retro','tipo_control_3_1_retro','dr_3_1_retro','lblCsTipo_3_1_retro');"  name="cheTipo_3_1_retro" id="cheTipo_3_1_retro">

                                    </select>
                            </div>
                            <input  id="cheTipo_3_1_retro_count" name="cheTipo_3_1_retro_count" type="number" class="hidden" value="1">

                            <input type="text" style="display: none" id="lblCsTipo_3_1_retro" name="lblCsTipo_3_1_retro">
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label class="labels" for=""><b>Marca</b> </label>
                            </div>

                            <div class="w-1/2 flex justify-start">
                                <select name="marca_3_1_retro" id="marca_3_1_retro" class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);send_modelos(this.value,'modelo_3_1_retro');send_marca_to_modal(this.value,'marcas_modal_3_1');">

                                </select>
                                <input  id="marca_3_1_retro_count" name="marca_3_1_retro_count" type="number" class="hidden" value="1">

                            </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/2 text-left">
                                <label class="labels" for=""><b>Modelo</b> </label>
                            </div>
                            <div class="w-full flex justify-start">
                                <select style="font-size: 14px" onchange="valida_selects_inps(this.id);" class="w-full border-2 border-blue-600 rounded-md py-2"   name="modelo_3_1_retro" id="modelo_3_1_retro">
                                </select>
                            </div>
                            <input  id="modelo_3_1_retro_count" name="modelo_3_1_retro_count" type="number" class="hidden" value="1">
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/3 ">
                                <label  class="labels" for=""><b>Años de vida</b> </label>
                            </div>

                            <div class="flex justify-start w-1/3">
                                <input name="yrs_vida_3_1_retro" id="yrs_vida_3_1_retro" onchange="valida_selects_inps(this.id);" type="text" onkeypress="return soloNumeros(event)" class="text-center w-full border-2 border-blue-600 rounded-md">

                                <input  id="yrs_vida_3_1_retro_count" name="yrs_vida_3_1_retro_count" type="number" class="hidden" value="1">

                            </div>

                        </div>

                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-1 gap-y-1">
                            <div class="flex justify-start w-1/3 text-left">
                                <label  class="labels" for=""><b>Eficiencia</b> </label>
                            </div>
                            <div class="flex justify-start w-1/3">
                                <input readonly style="padding-top: 0.425rem;padding-bottom: 0.248rem;" type="text" name="csStd_3_1_retro" id="csStd_3_1_retro" class="text-center w-full py-1 border-2 border-blue-600 rounded-md">
                            </div>
                            <div class="flex justify-start w-1/4">
                             <input  name="csStd_cant_3_1_retro" id="csStd_cant_3_1_retro" onchange="valida_selects_inps(this.id);" type="text" style="font-size: 14px;" class="w-full py-1 border-2 border-blue-600 rounded-md text-center">
                            </div>
                            <input  id="cheStd_3_1_retro_count" name="cheStd_3_1_retro_count" type="number" class="hidden" value="1">
                        </div>
                        </div>


                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">

                            <div class="flex justify-start w-1/3 text-left">
                                <label class="labels" for=""><b>Capacidad Térmica</b> </label>
                            </div>

                            <div class="flex w-1/2 justify-start gap-x-2">
                                <div class="w-full">
                                    <input id="capacidad_total_3_1_retro" name="capacidad_total_3_1_retro" type="text" onchange="valida_selects_inps(this.id);format_nums_no_$(this.value,this.id);"  onkeypress="return soloNumeros(event)" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md h-full text-center" >
                                    <input  id="capacidad_total_3_1_retro_count" name="capacidad_total_3_1_retro_count" type="number" class="hidden" value="1">

                                </div>
                                <div class="w-full">
                                    <input class="w-full  border-2 border-blue-600 rounded-md py-2 text-center"  type="text" readonly name="unidad_capacidad_tot_3_1_retro" id="unidad_capacidad_tot_3_1_retro" >

                                </div>
                            </div>
                            <input type="text" style="display: none" id="lblCsTipo" name="lblCsTipo" value="Tipo paquete">


                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="w-1/2 flex justify-start text-left">
                                <label  class="labels" for=""><b>Tipo Diseño</b> </label>
                            </div>
                            <div class="w-full flex justify-start">
                                <select class="w-full border-2 border-blue-600 rounded-md py-2" onchange="valida_selects_inps(this.id);send_name(this.id);" name="cheDisenio_3_1_retro" id="cheDisenio_3_1_retro">

                                </select>
                            </div>
                            <input  id="cheDisenio_3_1_retro_count" name="cheDisenio_3_1_retro_count" type="number" class="hidden" value="1">
                            <input type="text" style="display: none" id="name_diseno_3_1_retro" name="name_diseno_3_1_retro">
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-2">
                            <div class="w-1/3 flex justify-start text-left" title="Costo Eléctrico">
                                <label style="" class="labels" for=""><b>Costo Eléctrico $/Kwh</b> </label>
                            </div>
                            <div class="w-1/2 flex justify-start">
{{--                                                                 <input onchange="valida_selects_inps(this.id);" name="costo_elec_3_1" id="costo_elec_3_1" readonly onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;margin-left:2px;" class="w-full text-center border-2 border-blue-600 rounded-md py-1">
--}}
                            <input name="costo_elec_3_1_retro" id="costo_elec_3_1_retro" readonly onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full text-center border-2 border-blue-600 rounded-md py-2">

                            </div>
                            <input  id="costo_elec_3_1_retro_count" name="costo_elec_3_1_retro_count" type="number" class="hidden" value="1">
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="flex justify-start w-1/3 text-left">
                                <label  class="labels" for=""><b>Horas Enfriamiento</b> </label>
                            </div>
                            <div class="flex justify-start w-1/3">
                                <input onchange="valida_selects_inps(this.id);" type="text" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md py-1 text-center" name="hrsEnfriado_3_1_retro" id="hrsEnfriado_3_1_retro" readonly>

                            </div>
                            <input  id="hrsEnfriado_3_1_retro_count" name="hrsEnfriado_3_1_retro_count" type="number" class="hidden" value="1">

                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-2 gap-y-1">
                            <div class="flex justify-start w-1/3">
                                <label  class="labels" for=""><b>Tipo Control</b> </label>
                            </div>
                            <div class="flex justify-start w-1/2">
                                <select class="w-full border-2 border-blue-600 rounded-md py-2"  onchange="valida_selects_inps(this.id);send_name_t_c(this.id);"  name="tipo_control_3_1_retro" id="tipo_control_3_1_retro">

                                </select>
                            </div>
                            <input  id="tipo_control_3_1_retro_count" name="tipo_control_3_1_retro_count" type="number" class="hidden" value="1">

                            <input type="text" style="display: none" id="name_t_control_3_1_retro" name="name_t_control_3_1_retro">
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                            <div class="w-1/2 flex justify-start text-left">
                                <label  class="labels" for=""><b>Difusor/Rejilla</b> </label>
                            </div>
                            <div class="w-full flex justify-start">
                                <select style="width: 100%;margin-left:2.5px;" class="border-2 border-blue-600 rounded-md py-1" onchange="valida_selects_inps(this.id);send_name_dr(this.id);" name="dr_3_1_retro" id="dr_3_1_retro" >
                                </select>
                            </div>
                            <input  id="dr_3_1_retro_count" name="dr_3_1_retro_count" type="number" class="hidden" value="1">

                            <input type="text" style="display: none" id="dr_name_3_1_retro" name="dr_name_3_1_retro">
                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex gap-x-2 w-1/2">
                              <div class="flex w-1/3 justify-start text-left">
                                <label  class="labels" for=""><b>Tipo Mantenimiento</b> </label>
                            </div>
                            <div class="flex w-1/2 justify-start">
                                <select onchange="valida_selects_inps(this.id);" style="margin-left: 0px;" class="w-full border-2 border-blue-600 rounded-md py-2" name="cheMantenimiento_3_1_retro" id="cheMantenimiento_3_1_retro">
                                    <option value="0">Seleccionar</option>
                                    <option value="ASHRAE 180">ASHRAE 180</option>
                                    <option value="Deficiente">Deficiente</option>
                                    <option value="Sin Mantenimiento">Sin Mantenimiento</option>
                                </select>
                                <input  id="cheMantenimiento_3_1_retro_count" name="cheMantenimiento_3_1_retro_count" type="number" class="hidden" value="1">

                            </div>
                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            <div class="w-1/3 flex justify-start text-left">
                                <label  class="labels" for=""><b>Inversión Inicial (CAPEX)</b> </label>
                            </div>

                            <div class="w-1/2 flex justify-start">
                                <input type="text" style="margin-left: 2px;"  onchange="format_num(this.value,this.id);valida_selects_inps(this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center"  name="costo_recu_3_1_retro" id="costo_recu_3_1_retro" >
                            </div>
                            <input  id="costo_recu_3_1_retro_count" name="costo_recu_3_1_retro_count" type="number" class="hidden" value="1">

                        </div>
                    </div>

                    <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                        <div class="lg:grid 2xl:flex xl:flex w-1/2 gap-x-2">
                                <div class="w-1/3 flex justify-start text-left">
                                    <label class="labels" for=""><b>Costo Anual Mantenimiento</b> </label>
                                </div>

                                <div class="w-1/2 flex justify-start">
                                    <input type="text" tyle="margin-left: 2px;" onchange="format_num(this.value,this.id);valida_selects_inps(this.id);" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center"   name="maintenance_cost_3_1_retro" id="maintenance_cost_3_1_retro" >
                                </div>
                                <input  id="maintenance_cost_3_1_retro_count" name="maintenance_cost_3_1_retro_count" type="number" class="hidden" value="1">

                        </div>

                        <div class="lg:grid 2xl:flex xl:flex gap-x-1 w-1/2">
                            {{-- <div class="w-1/3 flex justify-start text-left">
                                <label  class="labels" for=""><b>Costo Anual Reparaciones</b> </label>
                            </div>
                            <div class="w-1/2 flex justify-start text-left">
                                 <input style="margin-left: 1px;" onchange="format_num(this.value,this.id);valida_selects_inps(this.id)" type="text" class="2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-1 text-center" name="const_an_rep_3_1" id="const_an_rep_3_1" >
                                 <input  id="cheValorS_3_1_retro_count" name="const_an_rep_3_1_retro_count" type="number" class="hidden" value="1">

                                </div> --}}
                        </div>


                    </div>
                  </div>
                </div>
               </div>
        </div>
        {{-- 3.1 --}}
        <a id="final3" name="final3" href=""></a>
        </div>
    </div>
</div>
