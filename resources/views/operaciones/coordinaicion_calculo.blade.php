
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
                    <input onchange="setValuesCoordinacion(this.value,'{{ $project_edit_coordinacion->id }}','hrs_mantenimiento_sitio');" value="{{ $project_edit_coordinacion->hrs_mantenimiento_sitio }}" id="horas_efectivas_mantenimiento" name="horas_efectivas_mantenimiento" type="text" onchange="no_cero(this.value,this.id);alculate_h_h();" value="0" class="w-1/6 font-bold border-2 border-gray-300 rounded-lg px-4 py-2 text-center bg-blue-200">
                </div>

                <div class="w-1/3 flex gap-x-2">
                    <h2 class="text-xl font-bold text-[#1B17BB] place-content-center">Porcentaje Mano Obra Emergencia</h2>
                    <input value="{{ $project_edit_coordinacion->porcent_mano_obra }}%" id="porcent_mano_obra" name="porcent_mano_obra" type="text" onchange="change_to_porcent_mantenimiento(this.value,this.id);setValuesCoordinacion(this.value,'{{ $project_edit_coordinacion->id }}','porcent_mano_obra');alculate_h_h();" class="w-1/6 font-bold border-2 border-gray-300 rounded-lg px-4 py-2 text-center bg-blue-200">
                </div>
            </div>
            <table class="w-full">
                <thead class="bg-white">
                    <tr>
                        <th style="width:100px;" class="px-4 py-4 font-roboto font-bold text-center text-white">

                        </th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">Sistema</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-md">Capacidad</th>
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
    showCoordinacionCalculoUnits('{{ $id_project }}');

 });

function delete_calculo_equiops(rowCount,tr,id) {

     $.ajax({
        type: 'DELETE',
        url: '/delete_coordinacion_project/'+id,
        dataType: 'json',
        data: {
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (response) {
                        showCoordinacionCalculoUnits('{{ $id_project }}');
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

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });




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
