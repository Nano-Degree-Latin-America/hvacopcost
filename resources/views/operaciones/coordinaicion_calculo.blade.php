
<div class="h-[80vh] w-full overflow-y-auto overflow-x-hidden bg-gradient-to-br from-gray-50 to-gray-100 font-roboto mt-1">
    <div class="flex justify-center w-full mt-2">
        <div class="w-full bg-white rounded-2xl shadow-xl overflow-hidden mx-3">
            <div class="w-full flex gap-x-3 justify-center items-center mx-5">

                <div class="w-1/5 flex gap-x-2">
                    <h2 class="text-xl font-bold text-[#1B17BB] place-content-center">Personal</h2>
                    <select name="personal_enviado_coordinacion"  id="personal_enviado_coordinacion" onchange="send_value_personal_coordinacion(this.value,'personal_enviado_mantenimiento');alculate_h_h();" class="w-2/4 border-2 border-color-inps  rounded-md p-1 my-1 font-roboto">
                                    @if ($project_edit_coordinacion->personal == 'tecnico')
                                    <option selected value="tecnico">{{ __('mantenimiento.tecnico') }}</option>
                                    <option value="tecnico_ayudante">{{ __('mantenimiento.tecnico_ayudante') }}</option>
                                    @endif

                                    @if ($project_edit_coordinacion->personal == 'tecnico_ayudante')
                                        <option  value="tecnico">{{ __('mantenimiento.tecnico') }}</option>
                                        <option selected value="tecnico_ayudante">{{ __('mantenimiento.tecnico_ayudante') }}</option>
                                    @endif
                                </select>
                </div>

                <div class="w-1/3 flex gap-x-2">
                    <h2 class="text-xl font-bold text-[#1B17BB] place-content-center">Horas Efectivas Mantenimiento en Sitio (Hrs/día)</h2>
                    <input value="0" id="horas_efectivas_mantenimiento" name="horas_efectivas_mantenimiento" type="text" onchange="no_cero(this.value,this.id);alculate_h_h();" value="0" class="w-1/6 font-bold border-2 border-gray-300 rounded-lg px-4 py-2 text-center bg-blue-200">
                </div>

                <div class="w-1/3 flex gap-x-2">
                    <h2 class="text-xl font-bold text-[#1B17BB] place-content-center">Porcentaje Mano Obra Emergencia</h2>
                    <input value="0%" id="porcent_mano_obra" name="porcent_mano_obra" type="text" onchange="change_to_porcent_mantenimiento(this.value,this.id);alculate_h_h();" class="w-1/6 font-bold border-2 border-gray-300 rounded-lg px-4 py-2 text-center bg-blue-200">
                </div>
            </div>
            <table class="w-full">
                <thead class="bg-white">
                    <tr>
                        <th style="width:100px;" class="px-4 py-4 font-roboto font-bold text-center text-white">

                        </th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">Sistema</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">Cantidad</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">Periodo</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">M1</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">M2</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">M3</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">M4</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">M5</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">M6</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">M7</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">M8</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">M9</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">M10</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">M11</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">M12</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">Total Horas</th>
                    </tr>
                </thead>

                <tbody id="tbody_coordinacion_calculo" name="tbody_coordinacion_calculo" class="divide-y divide-gray-200">
                    <!-- Fila de ejemplo -->
                    {{-- <tr id="tr_exampe_calculo" name="tr_exampe_calculo" class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                        <td class="px-2 py-3">
                            <input
                                disabled
                                type="number"
                                class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                        </td>
                        <td class="px-2 py-3">
                            <input
                                disabled
                                type="number"
                                class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                        </td>
                        <td class="px-2 py-3">
                            <input
                                disabled
                                type="number"
                                class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                        </td>
                        <td class="px-2 py-3">
                            <input
                                disabled
                                type="number"
                                class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                        </td>
                        <td class="px-2 py-3">
                            <input
                                disabled
                                type="number"
                                class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                        </td>
                        <td class="px-2 py-3">
                            <input
                                disabled
                                type="number"
                                class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                        </td>
                        <td class="px-2 py-3">
                            <input
                                disabled
                                type="number"
                                class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                        </td>
                        <td class="px-2 py-3">
                            <input
                                disabled
                                type="number"
                                class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                        </td>
                        <td class="px-2 py-3">
                            <input
                                disabled
                                type="number"
                                class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                        </td>
                        <td class="px-2 py-3">
                            <input
                                disabled
                                type="number"
                                class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                        </td>
                        <td class="px-2 py-3">
                            <input
                                disabled
                                type="number"
                                class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                        </td>
                        <td class="px-2 py-3">
                            <input
                                disabled
                                type="number"
                                class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                        </td>
                        <td class="px-2 py-3">
                            <input
                                disabled
                                type="number"
                                class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                        </td>
                        <td class="px-2 py-3">
                            <input
                                disabled
                                type="number"
                                class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                        </td>
                        <td class="px-2 py-3">
                            <input
                                disabled
                                type="number"
                                class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                        </td>
                        <td class="px-2 py-3">
                            <input
                                disabled
                                type="number"
                                class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                        </td>
                        <td class="px-2 py-3">
                            <input
                                disabled
                                type="number"
                                class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                        </td>
                    </tr> --}}
                </tbody>
            </table>

            {{-- Tabla de Idas Ajustados --}}
            <table>
                <tbody id="tbody_idas_ajustados" name="tbody_idas_ajustados" class="divide-y divide-gray-200">
                        <!-- Fila de ejemplo -->
                        <tr id="tr_idas_ajustados" name="tr_idas_ajustados" class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                            <td class="px-2 py-2">
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            </td>
                            <td class="px-2 py-2">
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            </td>
                            <td class="px-2 py-2">
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            </td>
                            <td class="w-[160px] py-3">
                                <label class="font-bold text-[#1B17BB]" for="">Días ajustados</label>
                            </td>
                            <td class="px-2 py-2">
                                <input
                                    id="idas_ajustados_p4"
                                    name="idas_ajustados_p4"
                                    value="0"
                                    readonly
                                    type="number"
                                    class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                            </td>
                            <td class="px-2 py-2">
                                <input
                                    id="idas_ajustados_p5"
                                    name="idas_ajustados_p5"
                                    value="0"
                                    readonly
                                    type="number"
                                    class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                            </td>
                            <td class="px-2 py-2">
                                <input
                                    id="idas_ajustados_p6"
                                    name="idas_ajustados_p6"
                                    value="0"
                                    readonly
                                    type="number"
                                    class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                            </td>
                            <td class="px-2 py-2">
                                <input
                                    id="idas_ajustados_p7"
                                    name="idas_ajustados_p7"
                                    value="0"
                                    readonly
                                    type="number"
                                    class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                            </td>
                            <td class="px-2 py-2">
                                <input
                                    id="idas_ajustados_p8"
                                    name="idas_ajustados_p8"
                                    value="0"
                                    readonly
                                    type="number"
                                    class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                            </td>
                            <td class="px-2 py-2">
                                <input
                                    id="idas_ajustados_p9"
                                    name="idas_ajustados_p9"
                                    value="0"
                                    readonly
                                    type="number"
                                    class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                            </td>
                            <td class="px-2 py-2">
                                <input
                                    id="idas_ajustados_p10"
                                    name="idas_ajustados_p10"
                                    value="0"
                                    readonly
                                    type="number"
                                    class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                            </td>
                            <td class="px-2 py-2">
                                <input
                                    id="idas_ajustados_p11"
                                    name="idas_ajustados_p11"
                                    value="0"
                                    readonly
                                    type="number"
                                    class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                            </td>
                            <td class="px-2 py-2">
                                <input
                                    id="idas_ajustados_p12"
                                    name="idas_ajustados_p12"
                                    value="0"
                                    readonly
                                    type="number"
                                    class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                            </td>
                            <td class="px-2 py-2">
                                <input
                                    id="idas_ajustados_p13"
                                    name="idas_ajustados_p13"
                                    value="0"
                                    readonly
                                    type="number"
                                    class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                            </td>
                            <td class="px-2 py-2">
                                <input
                                    id="idas_ajustados_p14"
                                    name="idas_ajustados_p14"
                                    value="0"
                                    readonly
                                    type="number"
                                    class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                            </td>
                            <td class="px-2 py-2">
                                <input
                                    id="idas_ajustados_p15"
                                    name="idas_ajustados_p15"
                                    value="0"
                                    readonly
                                    type="number"
                                    class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                            </td>
                            <td class="px-2 py-2">
                                <input
                                    id="idas_ajustados_total"
                                    name="idas_ajustados_total"
                                    value="0"
                                    readonly
                                    type="number"
                                    class="w-full h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                            </td>
                        </tr>
                    </tbody>
            </table>

            {{-- Tabla Horas--}}
            {{-- border-2 border-[#1B17BB] rounded-lg --}}
            <div class="w-full flex gap-x-2 m-2 my-2 p-2">
                <div class="w-auto mx-1 border-2 border-[#1B17BB] rounded-lg">

                    <div class="w-full flex  my-2">
                        <div class="flex gap-x-2 place-items-center">
                            <label for="" class="text-sm font-bold text-[#1B17BB]">Horas Hombre</label>
                        </div>

                        <div class="flex gap-x-1 place-items-center ml-5">
                            <label for="" class="text-sm font-bold text-[#1B17BB]">Mantenimiento</label>
                            <input
                                            id="h_h_mantenimiento"
                                            name="h_h_mantenimiento"
                                            readonly
                                            type="number"
                                            class="w-1/3 h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                        </div>

                        <div class="flex gap-x-1 place-items-center">
                            <label for="" class="text-sm font-bold text-[#1B17BB]">Ingresos y Egresos</label>
                            <input
                                            id="h_h_ingresos_egresos"
                                            name="h_h_ingresos_egresos"
                                            readonly
                                            type="number"
                                            class="w-1/3 h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                        </div>

                        <div class="flex gap-x-1 place-items-center">
                            <label for="" class="text-sm font-bold text-[#1B17BB]">Traslados</label>
                            <input
                                            id="h_h_traslados"
                                            name="h_h_traslados"
                                            readonly
                                            type="number"
                                            class="w-1/3 h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                        </div>

                        <div class="flex gap-x-1 place-items-center">
                            <label for="" class="text-sm font-bold text-[#1B17BB]">Emergencia</label>
                            <input
                                            id="h_h_emergencia"
                                            name="h_h_emergencia"
                                            readonly
                                            type="number"
                                            class="w-1/3 h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                        </div>

                        <div class="flex gap-x-1 place-items-center">
                            <label for="h_h_ajuste_manual" class="text-sm font-bold text-[#1B17BB]">Ajuste Manual</label>
                            <input
                                            id="h_h_ajuste_manual"
                                            name="h_h_ajuste_manual"
                                            value="0"
                                            onkeypress="return soloNumeros(event)"
                                            type="text"
                                            class="w-1/3 h-10 px-3 text-center text-sm font-semibold border-2 border-[#1B17BB] rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 bg-blue-200">
                        </div>
                    </div>

                </div>
                <div class="w-auto border-2 border-[#1B17BB] rounded-lg flex gap-x-2 mr-4">
                 <div class="w-full flex mx-1 my-2">
                    <div class="flex gap-x-1 place-items-center">
                        <label for="" class="text-sm font-bold text-[#1B17BB]">Total Horas Operación</label>
                        <input
                                        id="total_horas_operacion"
                                        name="total_horas_operacion"
                                        readonly
                                        type="number"
                                        class="w-1/3 h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                    </div>

                    <div class="flex gap-x-1 place-items-center mx-1">
                        <label for="" class="text-sm font-bold text-[#1B17BB]">Total Horas x Ventas</label>
                        <input
                                        id="total_horas_x_operacion"
                                        name="total_horas_x_operacion"
                                        readonly
                                        type="text"
                                        class="w-1/3 h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                        <input
                                        id="val_tenicoychalan"
                                        name="val_tenicoychalan"
                                        readonly
                                        type="text"
                                        class="w-1/3 hidden h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                        <input
                                        id="total_calculo_vehiculo"
                                        name="total_calculo_vehiculo"
                                        readonly
                                        type="number"
                                        class="w-1/3 hidden h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                        <input
                                        id="kms_val"
                                        name="kms_val"
                                        readonly
                                        type="number"
                                        class="w-1/3 hidden h-10 px-3 text-center text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                    </div>
                   </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    th, td {
        text-align: center;
        vertical-align: middle;
    }

    /* Scrollbar personalizado */
    .overflow-y-auto::-webkit-scrollbar {
        width: 8px;
    }

    .overflow-y-auto::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .overflow-y-auto::-webkit-scrollbar-thumb {
        background: #1B17BB;
        border-radius: 10px;
    }

    .overflow-y-auto::-webkit-scrollbar-thumb:hover {
        background: #2d28d4;
    }

    /* Animación para filas nuevas */
    @keyframes fadeInRow {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    tbody tr {
        animation: fadeInRow 0.3s ease-out;
    }

    /* Estilos para inputs y selects mejorados */
    .form-control:focus {
        transform: scale(1.02);
        box-shadow: 0 0 0 3px rgba(27, 23, 187, 0.1);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        th, td {
            font-size: 12px;
            padding: 8px 4px;
        }
    }

    @media (max-width: 768px) {
        .overflow-x-hidden {
            overflow-x: auto;
        }

        table {
            min-width: 800px;
        }
    }
</style>

<script>
$(function () {
    //despleegar unidadees_calculo
    showCoordinacionCalculoUnits('{{ $id_project }}')
 });

 // Configuración CSRF global (una vez al inicio de tu app, antes de este código)
$.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

const CLASES = {
  input: 'w-full h-10 px-2 text-center text-sm font-semibold bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 hover:border-[#1B17BB]/50 transition-all duration-200',
  inputSmall: 'w-3/4 h-10 px-2 text-center text-sm font-semibold bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 hover:border-[#1B17BB]/50 transition-all duration-200',
  inputReadonly: 'w-3/4 h-10 px-2 text-center text-sm font-semibold bg-blue-200 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 hover:border-[#1B17BB]/50 transition-all duration-200 cursor-not-allowed',
  select: 'w-full h-10 px-2 text-center text-sm font-semibold bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 hover:border-[#1B17BB]/50 transition-all duration-200',
  tr: 'bg-white hover:bg-blue-50 transition-colors duration-200 border-b border-gray-100',
  td: 'px-2 py-1'
};

const PERIODOS = [
  { value: '0', text: 'Seleccionar' },
  { value: 'T', text: 'T' },
  { value: 'S', text: 'S' },
  { value: 'A', text: 'A' }
];

/**
 * Crea un input text con clases y atributos comunes
 */
function crearInput(id, valor, readonly = false, claseExtra = CLASES.inputSmall) {
  const input = document.createElement('input');
  input.type = 'text';
  input.id = id;
  input.className = claseExtra;
  input.value = valor;
  input.readOnly = readonly;
  return input;
}

/**
 * Crea un select de periodos con opción preseleccionada
 */
function crearSelectPeriodo(rowId, periodoActual) {
  const select = document.createElement('select');
  select.id = `periodoSelect_${rowId}`;
  select.className = CLASES.select;

  PERIODOS.forEach(({ value, text }) => {
    const opt = document.createElement('option');
    opt.value = value;
    opt.textContent = text;
    if (periodoActual && value === periodoActual) opt.selected = true;
    select.appendChild(opt);
  });

  return select;
}

/**
 * Crea las 12 celdas de visitas (P1-P12) más la columna total
 */
function crearColumnasVisitas(rowId) {
  const fragment = document.createDocumentFragment();

  for (let i = 0; i < 13; i++) {
    const td = document.createElement('td');
    td.className = CLASES.td;

    const esTotal = i === 12;
    const inputId = `input${4 + i}_calculo_${rowId}`;

    const input = document.createElement('input');
    input.type = 'text';
    input.id = inputId;
    input.value = '0';

    if (esTotal) {
      input.className = CLASES.inputReadonly;
      input.readOnly = true;
    } else {
      input.className = CLASES.inputSmall;
      // Guardamos metadata en dataset para event delegation
      input.dataset.rowId = rowId;
      input.dataset.colIndex = 4 + i;
      
    }

    td.appendChild(input);
    fragment.appendChild(td);
  }

  return fragment;
}

/**
 * Renderiza una fila completa con todos sus datos
 */
function renderizarFila(item, index) {
  const rowId = index + 1;
  const tr = document.createElement('tr');
  tr.className = CLASES.tr;
  tr.dataset.rowId = rowId;

  // Columna 1: Contador
  const td0 = document.createElement('td');
  td0.className = CLASES.td;
  td0.appendChild(crearInput(`input0_calculo_${rowId}`, rowId, true));
  tr.appendChild(td0);

  // Columna 2: Sistema
  const td1 = document.createElement('td');
  td1.className = 'py-1';
  td1.appendChild(crearInput(`sistemainput1_calculo_${rowId}`, item.sistema || '', true, CLASES.input));
  tr.appendChild(td1);

  // Columna 3: Cantidad
  const td2 = document.createElement('td');
  td2.className = CLASES.td;
  td2.appendChild(crearInput(`cantidadinput2_calculo_${rowId}`, item.cantidad || '0', true));
  tr.appendChild(td2);

  // Columna 4: Select de periodo
  const td3 = document.createElement('td');
  td3.className = `${CLASES.td} justify-center text-center`;
  td3.appendChild(crearSelectPeriodo(rowId, item.periodo));
  tr.appendChild(td3);

  // Columnas 5-17: Visitas P1-P12 + Total
  tr.appendChild(crearColumnasVisitas(rowId));

  return tr;
}

/**
 * Función principal: carga datos y renderiza la tabla de cálculo de coordinación
 */
function show_units_calculo_coordinacion(id, value) {
  $('#tr_exampe_calculo').hide();

  $.ajax({
    url: `/manage_units_coordinacion/${id}/${value}`,
    method: 'POST',
    dataType: 'json'
  })
    .done(function (response) {
      const $tbody = $('#tbody_coordinacion_calculo');
      $tbody.empty();

      if (!Array.isArray(response) || response.length === 0) {
        console.warn('No hay datos para mostrar en la tabla de cálculo.');
        return;
      }

      // Renderizar en lote con DocumentFragment para un solo reflow
      const fragment = document.createDocumentFragment();
      response.forEach((item, idx) => {
        fragment.appendChild(renderizarFila(item, idx));
      });

      $tbody[0].appendChild(fragment);

      // Event delegation para inputs de visitas
      inicializarEventosTabla();
    })
    .fail(function (xhr, status, error) {
      console.error('Error al cargar unidades de coordinación:', error, xhr.responseText);
    });
}

/**
 * Event delegation: maneja clicks y cambios en inputs de visitas
 */
function inicializarEventosTabla() {
  const $tbody = $('#tbody_coordinacion_calculo');

  // Click en inputs de visitas (activa)
  $tbody.off('click', 'input[data-row-id]').on('click', 'input[data-row-id]', function () {
    const rowId = this.dataset.rowId;
    const periodoSelectId = `periodoSelect_${rowId}`;
    if (typeof active_inputs_coordinacion === 'function') {
      active_inputs_coordinacion(this.id, periodoSelectId, rowId);
    }
  });

  // Change en inputs de visitas (suma y formatea)
  $tbody.off('change', 'input[data-row-id]').on('change', 'input[data-row-id]', function () {
    const rowId = this.dataset.rowId;
    const colIndex = parseInt(this.dataset.colIndex, 10);
    const periodoSelectId = `periodoSelect_${rowId}`;

    if (typeof suma_inputs_calculo === 'function') {
      suma_inputs_calculo(this.id, periodoSelectId, rowId);
    }
    if (typeof suma_horas_hombre === 'function') {
      suma_horas_hombre(colIndex);
    }
    if (typeof format_nums_no_$ === 'function') {
      format_nums_no_$(this.value, this.id);
    }
  });

  // Opcional: change en selects de periodo si necesitas lógica adicional
  $tbody.off('change', 'select[id^="periodoSelect_"]').on('change', 'select[id^="periodoSelect_"]', function () {
    const rowId = this.id.split('_').pop();
    // Aquí puedes llamar funciones de recalculo si es necesario
  });
}

function showCoordinacionCalculoUnits(id_project){
    $.ajax({
        type: 'get',
        url: '/get_ids_units_calculo_coordinacion/'+id_project,
        dataType: 'json',
        success: function (response) {
            response.forEach(element => {
                show_units_calculo_coordinacion(element.id,element.cantidad)
            });
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}


/* function coordinacionCalculo(rowCount) {
    var tr_example_calculo = document.getElementById('tr_exampe_calculo');
    tr_example_calculo.style.display = 'none';

    /// elementos calculo
    var tbody_calculo = document.getElementById('tbody_coordinacion_calculo');
    var tr_calculo = document.createElement('tr');
    /////////// elementos estilo calculo
    tr_calculo.className = 'bg-white hover:bg-blue-50 transition-colors duration-200 border-b border-gray-100';

    // Clase común para inputs
    const inputClass = 'w-full h-10 px-2 text-center text-sm font-semibold bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 hover:border-[#1B17BB]/50 transition-all duration-200';

    const selectClass = 'w-full h-10 px-2 text-center text-sm font-semibold bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 hover:border-[#1B17BB]/50 transition-all duration-200';

    //  1er td : input text (columna vacía) calculo
        var td0_calculo = document.createElement('td');
        td0_calculo.className = 'px-2 py-1';
        var input0_calculo = document.createElement('input');
        input0_calculo.type = 'text';
        input0_calculo.id = 'input0_calculo_' + rowCount;
        input0_calculo.className = 'w-3/4 h-10 px-2 text-center text-sm font-semibold bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 hover:border-[#1B17BB]/50 transition-all duration-200';
        input0_calculo.value = rowCount;
        input0_calculo.readOnly = true;
        td0_calculo.appendChild(input0_calculo);
        tr_calculo.appendChild(td0_calculo);

    //  2do td : input text (columna vacía) calculo
        var td1_calculo = document.createElement('td');
        td1_calculo.className = 'py-1';
        var input1_calculo = document.createElement('input');
        input1_calculo.type = 'text';
        input1_calculo.id = 'sistemainput1_calculo_' + rowCount;
        input1_calculo.className = 'w-full h-10 px-2 text-center text-sm font-semibold bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 hover:border-[#1B17BB]/50 transition-all duration-200';
        input1_calculo.value = '';
        input1_calculo.readOnly = true;
        td1_calculo.appendChild(input1_calculo);
        tr_calculo.appendChild(td1_calculo);

    //  3er td : input text (columna vacía) calculo
        var td2_calculo = document.createElement('td');
        td2_calculo.className = 'px-2 py-1';
        var input2_calculo = document.createElement('input');
        input2_calculo.type = 'text';
        input2_calculo.id = 'cantidadinput2_calculo_' + rowCount;
        input2_calculo.className = 'w-3/4 h-10 px-2 text-center text-sm font-semibold bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 hover:border-[#1B17BB]/50 transition-all duration-200';
        input2_calculo.value = '';
        input2_calculo.readOnly = true;
        td2_calculo.appendChild(input2_calculo);
        tr_calculo.appendChild(td2_calculo);

    //  4to td : input text (columna vacía) calculo
        var td3_calculo = document.createElement('td');
        td3_calculo.className = 'px-2 py-1 justify-center text-center';
        var select3 = document.createElement('select');
        select3.id = 'periodoSelect_' + rowCount;
        select3.className = selectClass;
        var option3_1 = document.createElement('option');
        option3_1.value = '0';
        option3_1.text = 'Seleccionar';
        select3.appendChild(option3_1);
        var option3_2 = document.createElement('option');
        option3_2.value = 'T';
        option3_2.text = 'T';
        select3.appendChild(option3_2);
        var option3_3 = document.createElement('option');
        option3_3.value = 'S';
        option3_3.text = 'S';
        select3.appendChild(option3_3);
        var option3_4 = document.createElement('option');
        option3_4.value = 'A';
        option3_4.text = 'A';
        select3.appendChild(option3_4);
        td3_calculo.appendChild(select3);
        tr_calculo.appendChild(td3_calculo);

    // 5to al 16vo td : 12 inputs text (P1 a P12)
    for (let i = 0; i < 13; i++) {
        if(i == 12){
            var td_calculo = document.createElement('td');
            td_calculo.className = 'px-2 py-1';
            var input_calculo = document.createElement('input');
            var inputTotal = 'input16_calculo_' + rowCount;
            input_calculo.type = 'text';
            input_calculo.id = 'input' + (4 + i) + '_calculo_' + rowCount;
            input_calculo.className = 'w-3/4 h-10 px-2 text-center text-sm font-semibold bg-blue-200 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 hover:border-[#1B17BB]/50 transition-all duration-200 cursor-not-allowed';
            input_calculo.value = 0;
            input_calculo.readOnly = true;

        }else{
            var td_calculo = document.createElement('td');
            td_calculo.className = 'px-2 py-1';
            var input_calculo = document.createElement('input');
            var periodoSelect = 'periodoSelect_' + rowCount;
            var inputTotal = 'input16_calculo_' + rowCount;
            var counterAux = 4 + i;
            input_calculo.type = 'text';
            input_calculo.id = 'input' + (4 + i) + '_calculo_' + rowCount;
            input_calculo.className = 'w-3/4 h-10 px-2 text-center text-sm font-semibold bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 hover:border-[#1B17BB]/50 transition-all duration-200';
            input_calculo.value = 0;
            input_calculo.setAttribute('onclick', 'active_inputs_coordinacion(this.id,"'+ periodoSelect +'","' + rowCount + '")');
            input_calculo.setAttribute('onchange', 'suma_inputs_calculo(this.id,"'+ periodoSelect +'","' + rowCount + '");suma_horas_hombre('+counterAux+');format_nums_no_$(this.value,this.id)');
        }

        td_calculo.appendChild(input_calculo);
        tr_calculo.appendChild(td_calculo);
    }

    tbody_calculo.appendChild(tr_calculo);
} */

function delete_calculo_equiops(rowCount,tr) {

    var tr_calculo = getTrCalculoByContador(rowCount,tr); //traer  el tr correspondiente al contador
    tr_calculo.remove();
    var tbody_calculo = document.getElementById('tbody_coordinacion_calculo');
            // Actualizar todos los id y valores de los elementos en cada tr
            var trsActualizados = tbody_calculo.querySelectorAll('tr');


            for (let i = 0; i < trsActualizados.length; i++) {
                let idx = i;
                let inputContador = trsActualizados[i].querySelector('input[id^="input0_calculo_"]');
                if (inputContador) {
                    inputContador.id = 'input0_calculo_' + idx;
                    inputContador.value = idx;
                }
                let sistemainput = trsActualizados[i].querySelector('input[id^="sistemainput1_calculo_"]');
                if (sistemainput) sistemainput.id = 'sistemainput1_calculo_' + idx;
                let cantidadinput2 = trsActualizados[i].querySelector('input[id^="cantidadinput2_calculo_"]');
                if (cantidadinput2) cantidadinput2.id = 'cantidadinput2_calculo_' + idx;
                let periodoSelect = trsActualizados[i].querySelector('select[id^="periodoSelect_"]');
                if (periodoSelect) periodoSelect.id = 'periodoSelect_' + idx;

                 for (let z = 0; z < 13; z++) {
                     let inputCalculo = trsActualizados[i].querySelector('input[id^="input' + (4 + z) + '_calculo_"]');
                     if (inputCalculo) inputCalculo.id = 'input' + (4 + z) + '_calculo_' + idx;
                 }

            }
            rowCount = trsActualizados.length;

}

function getTrCalculoByContador(contador,tr) {
    //obtener el numero de tr  elimnado
    var tr_aux = tr.querySelector('input[id^="input0_"]').id
    const myArray = tr_aux.split('_');
    var number_tr = parseInt(myArray[1]); //numero de tr eliminado

    var tbody_calculo = document.getElementById('tbody_coordinacion_calculo');
    var trs = tbody_calculo.querySelectorAll('tr');

    for (let i = 0; i < trs.length; i++) {
        let inputContador = trs[i].querySelector('input[id^="input0_calculo_"]');
        if (inputContador && parseInt(inputContador.value) === number_tr) {
            return trs[i];
        }
    }
    return null;
}
</script>
