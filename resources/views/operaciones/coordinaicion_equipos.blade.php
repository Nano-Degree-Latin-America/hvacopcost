<div class="h-[80vh] w-full overflow-y-auto overflow-x-hidden bg-gradient-to-br from-gray-50 to-gray-100 p-4 font-roboto">
    <div class="flex justify-center w-full mt-6">
        <div class="w-full max-w-[80%] bg-white rounded-2xl shadow-xl overflow-hidden">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-[#1B17BB] to-[#2d28d4]">
                    <tr>
                        <th style="width:100px;" class="px-4 py-4 font-roboto font-bold text-center text-white">
                            <button
                                id="addRowBtn"
                                title="Agregar Equipo"
                                type="button"
                                class="group relative px-4 py-2 bg-white text-[#1B17BB] rounded-lg hover:bg-[#1B17BB] hover:text-white transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#1B17BB]">
                                <i class="fas fa-plus text-base transition-transform group-hover:rotate-90 duration-300"></i>
                            </button>
                        </th>
                        <th style="width:300px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-sm">Sistema</th>
                        <th style="width:300px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-sm">Unidad</th>
                        <th style="width:300px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-sm">Marca</th>
                        <th style="width:300px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-sm">Modelo</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-sm">Capacidad</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-sm">Cantidad</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-sm">Cantidad total</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-sm">Mantenimiento</th>
                    </tr>
                </thead>

                <tbody id="tbody_equipos" name="tbody_equipos" class="divide-y divide-gray-200">
                    <!-- Fila de ejemplo -->
                    <tr id="tr_exampe" name="tr_exampe" class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
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
                    </tr>
                </tbody>
            </table>
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
document.addEventListener('DOMContentLoaded', function() {
    var tr_example = document.getElementById('tr_exampe');

    let rowCount = 0;

    document.getElementById('addRowBtn').addEventListener('click', function() {
        tr_example.style.display = 'none';

        var tbody = document.getElementById('tbody_equipos');
        var trs = tbody.querySelectorAll('tr');
        // Obtener el último valor del contador actual
        let lastContador = 0;
        if (trs.length > 0) {
            let lastInput = trs[trs.length - 1].querySelector('input[id^="input0_"]');
            if (lastInput) {
                lastContador = parseInt(lastInput.value);
            }
        }
        rowCount = lastContador + 1;
        var tr = document.createElement('tr');

        tr.className = 'bg-white hover:bg-blue-50 transition-colors duration-200 border-b border-gray-100';

        // Clase común para inputs
        const inputClass = 'w-full h-10 px-3 text-center text-sm font-semibold bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 hover:border-[#1B17BB]/50 transition-all duration-200';

        const selectClass = 'w-full h-10 px-3 text-center text-sm font-semibold bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 hover:border-[#1B17BB]/50 transition-all duration-200';

        // 1er td: input text (columna vacía)
        var td0 = document.createElement('td');
        td0.className = 'px-2 py-1';
        var input0 = document.createElement('input');
        input0.type = 'text';
        input0.id = 'input0_' + rowCount;
        input0.className = 'w-3/4 h-10 px-3 text-center text-sm font-semibold bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 hover:border-[#1B17BB]/50 transition-all duration-200';
        input0.value = rowCount;
        input0.readOnly = true;
        td0.appendChild(input0);
        tr.appendChild(td0);

        // Al agregar, actualizar los id de todos los elementos en cada tr
        setTimeout(function() {
            var trsActualizados = tbody.querySelectorAll('tr');
            for (let i = 0; i < trsActualizados.length; i++) {
                let idx = i;
                let inputContador = trsActualizados[i].querySelector('input[id^="input0_"]');
                if (inputContador) {
                    inputContador.id = 'input0_' + idx;
                    inputContador.value = idx;
                }
                let sistemaSelect = trsActualizados[i].querySelector('select[id^="sistemaSelect_"]');
                if (sistemaSelect) sistemaSelect.id = 'sistemaSelect_' + idx;
                let unidadSelect = trsActualizados[i].querySelector('select[id^="unidadSelect_"]');
                if (unidadSelect) unidadSelect.id = 'unidadSelect_' + idx;
                let marcaSelect = trsActualizados[i].querySelector('select[id^="marcaSelect_"]');
                if (marcaSelect) marcaSelect.id = 'marcaSelect_' + idx;
                let modeloSelect = trsActualizados[i].querySelector('select[id^="modeloSelect_"]');
                if (modeloSelect) modeloSelect.id = 'modeloSelect_' + idx;
                let capacidadInput = trsActualizados[i].querySelector('input[id^="capacidadInput_"]');
                if (capacidadInput) capacidadInput.id = 'capacidadInput_' + idx;
                let cantidadInputTotal = trsActualizados[i].querySelector('input[id^="cantidadInputTotal_"]');
                if (cantidadInputTotal) cantidadInputTotal.id = 'cantidadInputTotal_' + idx;
                let mantenimientoSelect = trsActualizados[i].querySelector('select[id^="mantenimientoSelect_"]');
                if (mantenimientoSelect) mantenimientoSelect.id = 'mantenimientoSelect_' + idx;
                let deleteBtn = trsActualizados[i].querySelector('button[id^="deleteBtn_"]');
                if (deleteBtn) deleteBtn.id = 'deleteBtn_' + idx;
            }
        }, 10);

        // 2do td: select (Sistema)
        var td1 = document.createElement('td');
        td1.className = 'px-2 py-1';
        var select1 = document.createElement('select');
        id_unidadSelectAux = String("unidadSelect_" + rowCount);
        id_marcaSelectAux = String("marcaSelect_" + rowCount);
        id_sistemaCalculoAux = String("sistemainput1_calculo_" + rowCount);
        select1.id = 'sistemaSelect_' + rowCount;
        select1.className = selectClass;
        select1.setAttribute('onchange', 'unidadHvac(this.value,"","' + id_unidadSelectAux + '",2);send_value_equipo_marcas(this.id,this.value,"'+id_marcaSelectAux+'");send_value_sistemas_calculo_coordinacion("' + id_sistemaCalculoAux + '",this.value);');

        const sistemas = [
            {value: '0', text: 'Seleccionar'},
            {value: '1', text: 'Paquetes (RTU)'},
            {value: '2', text: 'Split DX'},
            {value: '16', text: 'VRF / VRV'},
            {value: '5', text: 'PTAC/VTAC'},
            {value: '6', text: 'WSHP'},
            {value: '7', text: 'Minisplit Inverter'},
            {value: '8', text: 'Unidades Presición'},
            {value: '9', text: 'Chiller Scroll'},
            {value: '10', text: 'Chiller de Tornillo'},
            {value: '11', text: 'Chiller Turbocor'},
            {value: '12', text: 'Equipamiento Agua Fría'},
            {value: '13', text: 'Torres de Enfriamiento'},
            {value: '14', text: 'Ventilación'},
            {value: '15', text: 'Accesorios'}
        ];

        sistemas.forEach(item => {
            var option = document.createElement('option');
            option.value = item.value;
            option.text = item.text;
            select1.appendChild(option);
        });

        td1.appendChild(select1);
        tr.appendChild(td1);

        // 3er td: select (Unidad)
        var td2 = document.createElement('td');
        td2.className = 'px-2 py-1';
        var select2 = document.createElement('select');
        select2.id = 'unidadSelect_' + rowCount;
        select2.className = selectClass;
        select2.setAttribute('onchange', 'onSelectChange(this)');
        var option0_2 = document.createElement('option');
        option0_2.value = '0';
        option0_2.text = 'Seleccionar';
        select2.appendChild(option0_2);
        td2.appendChild(select2);
        tr.appendChild(td2);

        // 4to td: select (Marca)
        var td3 = document.createElement('td');
        td3.className = 'px-2 py-1';
        var select3 = document.createElement('select');
        var id_modeloSelectAux = String("modeloSelect_" + rowCount);
        select3.id = 'marcaSelect_' + rowCount;
        select3.className = selectClass;
        select3.setAttribute('onchange', 'send_modelos(this.value,"'+id_modeloSelectAux+'");');
        var option0_3 = document.createElement('option');
        option0_3.value = '0';
        option0_3.text = 'Seleccionar';
        select3.appendChild(option0_3);
        td3.appendChild(select3);
        tr.appendChild(td3);

        // 5to td: select (Modelo)
        var td4 = document.createElement('td');
        td4.className = 'px-2 py-1';
        var select4 = document.createElement('select');
        select4.id = 'modeloSelect_' + rowCount;
        select4.className = selectClass;
        select4.setAttribute('onchange', 'onSelectChange(this)');
        var option0_4 = document.createElement('option');
        option0_4.value = '0';
        option0_4.text = 'Seleccionar';
        select4.appendChild(option0_4);
        td4.appendChild(select4);
        tr.appendChild(td4);

        // 6to td: input text (Capacidad)
        var td5 = document.createElement('td');
        td5.className = 'px-2 py-1';
        var input1 = document.createElement('input');
        var id_cantidadInputAux = String("cantidadInput_" + rowCount);
        var id_cantidadTotalInputAux = String("cantidadTotalInput_" + rowCount);
        input1.type = 'text';
        input1.id = 'capacidadInput_' + rowCount;
        input1.className = inputClass;
        input1.placeholder = '0';
        input1.setAttribute('onkeypress', 'return soloNumeros(event)');
        input1.setAttribute('onchange', 'mult_capacidad_cantidad_coordinacion("'+input1.id+'","'+id_cantidadInputAux+'","'+id_cantidadTotalInputAux+'");');
        td5.appendChild(input1);
        tr.appendChild(td5);

        // 7mo td: input text (Cantidad)
        var td6 = document.createElement('td');
        td6.className = 'px-2 py-1';
        var input2 = document.createElement('input');
        var id_sistemaCantidadAux = String("cantidadinput2_calculo_" + rowCount);
        var id_capacidadInputAux = String("capacidadInput_" + rowCount);
        var id_cantidadTotalInputAux = String("cantidadTotalInput_" + rowCount);
        input2.type = 'text';
        input2.id = 'cantidadInput_' + rowCount;
        input2.className = inputClass;
        input2.placeholder = '0';
        input2.setAttribute('onkeypress', 'return soloNumeros(event)');
        input2.setAttribute('onchange', 'send_value_cantidad_calculo_coordinacion("' + id_sistemaCantidadAux + '",this.value);mult_capacidad_cantidad_coordinacion("'+id_capacidadInputAux+'","'+input2.id+'","'+id_cantidadTotalInputAux+'");');
        td6.appendChild(input2);
        tr.appendChild(td6);

        // 7mo td: input text (Cantidad total)
        var td7 = document.createElement('td');
        td7.className = 'px-2 py-1';
        var input3 = document.createElement('input');
        input3.type = 'text';
        input3.id = 'cantidadTotalInput_' + rowCount;
        input3.className = inputClass;
        input3.placeholder = '0';
        input3.readOnly = true;
        input3.setAttribute('onkeypress', 'return soloNumeros(event)');
        td7.appendChild(input3);
        tr.appendChild(td7);

        // 8vo td: select (Mantenimiento)
        var td8 = document.createElement('td');
        td8.className = 'px-2 py-1';
        var select5 = document.createElement('select');
        select5.id = 'mantenimientoSelect_' + rowCount;
        select5.className = selectClass;
        var periodoId = 'periodoSelect_' + rowCount;
        var sistemaId = 'sistemaSelect_' + rowCount;
        var unidadId = 'unidadSelect_' + rowCount;

        const mantenimientos = [
            {value: '0', text: 'Seleccionar'},
            {value: 'ashrae', text: 'ASHRAE 180'},
            {value: 'personalizado', text: 'Personalizado'}
        ];

        mantenimientos.forEach(item => {
            var option = document.createElement('option');
            option.value = item.value;
            option.text = item.text;
            select5.appendChild(option);
        });
        select5.setAttribute('onchange', 'set_periodo("'+ sistemaId +'","' + unidadId + '","' + periodoId + '",this.value);');
        td8.appendChild(select5);
        tr.appendChild(td8);

 // Botón eliminar
        var tdDelete = document.createElement('td');
        var btnDelete = document.createElement('button');
        btnDelete.type = 'button';
        btnDelete.id = 'deleteBtn_' + rowCount;
        btnDelete.className = 'bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition-colors duration-200';
        btnDelete.innerHTML = '<i class="fas fa-trash" aria-hidden="true"></i>';
        btnDelete.onclick = function() {
            tr.remove();
            // Actualizar todos los id y valores de los elementos en cada tr
            var trsActualizados = tbody.querySelectorAll('tr');
            for (let i = 0; i < trsActualizados.length; i++) {
                let idx = i;
                let inputContador = trsActualizados[i].querySelector('input[id^="input0_"]');
                if (inputContador) {
                    inputContador.id = 'input0_' + idx;
                    inputContador.value = idx;
                }
                let sistemaSelect = trsActualizados[i].querySelector('select[id^="sistemaSelect_"]');
                if (sistemaSelect) sistemaSelect.id = 'sistemaSelect_' + idx;
                let unidadSelect = trsActualizados[i].querySelector('select[id^="unidadSelect_"]');
                if (unidadSelect) unidadSelect.id = 'unidadSelect_' + idx;
                let marcaSelect = trsActualizados[i].querySelector('select[id^="marcaSelect_"]');
                if (marcaSelect) marcaSelect.id = 'marcaSelect_' + idx;
                let modeloSelect = trsActualizados[i].querySelector('select[id^="modeloSelect_"]');
                if (modeloSelect) modeloSelect.id = 'modeloSelect_' + idx;
                let capacidadInput = trsActualizados[i].querySelector('input[id^="capacidadInput_"]');
                if (capacidadInput) capacidadInput.id = 'capacidadInput_' + idx;
                let cantidadInput = trsActualizados[i].querySelector('input[id^="cantidadInput_"]');
                if (cantidadInput) cantidadInput.id = 'cantidadInput_' + idx;
                let cantidadInputTotal = trsActualizados[i].querySelector('input[id^="cantidadInputTotal_"]');
                if (cantidadInputTotal) cantidadInputTotal.id = 'cantidadInputTotal_' + idx;
                let cantidadTotalInput = trsActualizados[i].querySelector('input[id^="cantidadTotalInput_"]');
                if (cantidadTotalInput) cantidadTotalInput.id = 'cantidadTotalInput_' + idx;
                let mantenimientoSelect = trsActualizados[i].querySelector('select[id^="mantenimientoSelect_"]');
                if (mantenimientoSelect) mantenimientoSelect.id = 'mantenimientoSelect_' + idx;
                let deleteBtn = trsActualizados[i].querySelector('button[id^="deleteBtn_"]');
                if (deleteBtn) deleteBtn.id = 'deleteBtn_' + idx;
            }
            rowCount = trsActualizados.length;

            delete_calculo_equiops(rowCount,tr);
        };
        tdDelete.appendChild(btnDelete);
        tr.appendChild(tdDelete);

        tbody.appendChild(tr);
        coordinacionCalculo(rowCount);
    });
});

function onSelectChange(selectElem) {
    console.log('Select cambiado:', selectElem.id, 'Nuevo valor:', selectElem.value);
}
</script>
