<div class="h-[80vh] w-full overflow-y-auto overflow-x-hidden bg-gradient-to-br from-gray-50 to-gray-100 p-4 font-roboto">
    <div class="flex justify-center w-full mt-6">
        <div class="w-full max-w-[95%] bg-white rounded-2xl shadow-2xl overflow-hidden">
            <table class="w-full">
                <thead class="bg-white">
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
                        <th style="width:100px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-sm">Capacidad</th>
                        <th style="width:120px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-sm"></th>
                        <th style="width:100px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-sm">Cantidad</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-sm">Acceso Equipo</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-sm">Estado</th>
                        <th style="width:100px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-sm">Años Vida</th>
                        <th style="width:200px;" class="px-1 py-4 font-roboto font-bold text-center text-[#1B17BB] text-sm">Horario</th>
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
    <input id="total_toneladas" name="total_toneladas" class="hidden" type="text">
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
    // Requiere jQuery cargado una sola vez

$(function () {
  // 1) CSRF global para todas las peticiones jQuery
  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
  });

  const $tbody = $('#tbody_equipos');
  const $addBtn = $('#addRowBtn');

  const selectClass = 'w-full h-10 px-3 text-center text-sm font-semibold bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 hover:border-[#1B17BB]/50 transition-all duration-200';
  const inputClass  = 'w-full h-10 px-3 text-center text-sm font-semibold bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 hover:border-[#1B17BB]/50 transition-all duration-200';

  const sistemas = [
    { value: '0', text: 'Seleccionar' },
    { value: '1', text: 'Paquetes (RTU)' },
    { value: '2', text: 'Split DX' },
    { value: '16', text: 'VRF / VRV' },
    { value: '5', text: 'PTAC/VTAC' },
    { value: '6', text: 'WSHP' },
    { value: '7', text: 'Minisplit Inverter' },
    { value: '8', text: 'Unidades Presición' },
    { value: '9', text: 'Chiller Scroll' },
    { value: '10', text: 'Chiller de Tornillo' },
    { value: '11', text: 'Chiller Turbocor' },
    { value: '12', text: 'Equipamiento Agua Fría' },
    { value: '13', text: 'Torres de Enfriamiento' },
    { value: '14', text: 'Ventilación' },
    { value: '15', text: 'Accesorios' }
  ];

  const accesos = [
    { value: '0', text: 'Seleccionar' },
    { value: 'Fácil', text: 'Fácil' },
    { value: 'Medio', text: 'Medio' },
    { value: 'Dificil', text: 'Dificil' }
  ];

  const estados = [
    { value: '0', text: 'Seleccionar' },
    { value: 'Bueno', text: 'Bueno' },
    { value: 'Deficiente', text: 'Deficiente' },
    { value: 'Malo', text: 'Malo' }
  ];

  const unidadesCant = [
    { value: '0', text: 'Seleccionar' },
    { value: 'TR', text: 'TR' },
    { value: 'KW', text: 'KW' },
  ];

  const optTags = list => list.map(o => `<option value="${o.value}">${o.text}</option>`).join('');

  function horarioTexto(code) {
    if (code === 'm_50') return 'Menos de 50 Hrs.';
    if (code === '51_167') return '51 a 167 Hrs.';
    if (code === '168') return '168 Hrs.';
    return '';
  }

  function renderRow(resp, displayIndex) {
    const id = resp.id; // clave del registro devuelta por el backend
    const ids = {
      contador: `input0_${id}`,
      rowId: `inputId_${id}`,
      sistema: `sistemaSelect_${id}`,
      unidad: `unidadSelect_${id}`,
      marca: `marcaSelect_${id}`,
      modelo: `modeloSelect_${id}`,
      capacidad: `capacidadInput_${id}`,
      unidadCantidad: `unidadCantidadSelect_${id}`,
      cantidad: `cantidadInput_${id}`,
      acceso: `accesoEquipoSelect_${id}`,
      estado: `estadoEquipoSelect_${id}`,
      yrs: `yrsLifeInput_${id}`,
      horario: `horarioInput_${id}`,
      mantenimiento: `mantenimientoSelect_${id}`,
      periodo: `periodoSelect_${id}`,
      cantidadTotal: `cantidadTotalInput_${id}`,
      cantidadInputTotal: `cantidadInputTotal_${id}`,
      deleteBtn: `deleteBtn_${id}`
    };

    const tr = document.createElement('tr');
    tr.className = 'bg-white hover:bg-blue-50 transition-colors duration-200 border-b border-gray-100';
    tr.dataset.rowId = id;

    tr.innerHTML = `
      <td class="px-2 py-1">
        <input type="text" id="${ids.contador}" class="w-3/4 ${inputClass}" value="${displayIndex}" readonly>
      </td>
      <td class="px-2 py-1 hidden">
        <input type="text" id="${ids.rowId}" class="w-3/4 ${inputClass}" value="${id}" readonly>
      </td>
      <td class="px-2 py-1">
        <select id="${ids.sistema}" class="${selectClass}">
          ${optTags(sistemas)}
        </select>
      </td>
      <td class="px-2 py-1">
        <select id="${ids.unidad}" class="${selectClass}">
          <option value="0">Seleccionar</option>
        </select>
      </td>
      <td class="px-2 py-1">
        <select id="${ids.marca}" class="${selectClass}">
          <option value="0">Seleccionar</option>
        </select>
      </td>
      <td class="px-2 py-1">
        <select id="${ids.modelo}" class="${selectClass}">
          <option value="0">Seleccionar</option>
        </select>
      </td>
      <td class="px-2 py-1">
        <input type="text" id="${ids.capacidad}" class="${inputClass}" placeholder="0">
      </td>
      <td class="pr-2 py-1">
        <select id="${ids.unidadCantidad}" class="${selectClass}">
          ${optTags(unidadesCant)}
        </select>
      </td>
      <td class="px-2 py-1">
        <input type="text" id="${ids.cantidad}" class="${inputClass}" placeholder="0">
      </td>
      <td class="px-2 py-1">
        <select id="${ids.acceso}" class="${selectClass}">
          ${optTags(accesos)}
        </select>
      </td>
      <td class="px-2 py-1">
        <select id="${ids.estado}" class="${selectClass}">
          ${optTags(estados)}
        </select>
      </td>
      <td class="px-2 py-1">
        <input type="text" id="${ids.yrs}" class="${inputClass}" value="${resp.yrs_life ?? ''}" readonly>
      </td>
      <td class="px-2 py-1">
        <input type="text" id="${ids.horario}" class="${inputClass}" value="${horarioTexto(resp.horario)}" readonly>
      </td>
      <td class="px-2 py-1">
        <select id="${ids.mantenimiento}" class="${selectClass}">
          <option value="0">Seleccionar</option>
          <option value="ashrae">ASHRAE 180</option>
          <option value="personalizado">Personalizado</option>
        </select>
      </td>
      <td class="px-2 py-1">
        <button type="button" id="${ids.deleteBtn}" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition-colors duration-200 mr-5">
          <i class="fas fa-trash" aria-hidden="true"></i>
        </button>
      </td>
      <input type="hidden" id="${ids.cantidadTotal}">
      <input type="hidden" id="${ids.cantidadInputTotal}">
    `;
    return tr;
  }

  function renumberRows() {
    $tbody.children('tr').each(function (i) {
      const $counter = $(this).find('input[id^="input0_"]');
      if ($counter.length) $counter.val(i + 1);
    });
  }

  // Utilidad: espera a que un <select> tenga una <option> con cierto value
  function waitForOption(selectEl, value, timeoutMs = 5000) {
    return new Promise((resolve, reject) => {
      const hasOption = () => !!selectEl.querySelector(`option[value="${value}"]`);
      if (hasOption()) return resolve(true);

      const observer = new MutationObserver(() => {
        if (hasOption()) {
          observer.disconnect();
          resolve(true);
        }
      });
      observer.observe(selectEl, { childList: true, subtree: true });

      const t = setTimeout(() => {
        observer.disconnect();
        resolve(false);
      }, timeoutMs);
    });
  }

  // Inicializa valores de una fila recién renderizada evitando disparar guardados durante el arranque
  async function initializeRowValues(resp) {
    const id = resp.id;
    const $row = $tbody.find(`tr[data-row-id="${id}"]`);
    $row.data('loading', true);

    // Set sistema y dispara carga de dependencias
    const sistemaSel = document.getElementById(`sistemaSelect_${id}`);
    if (sistemaSel) {
      sistemaSel.value = String(resp.id_sistema ?? '0');
      // dispara change para que se llenen unidad y marcas
      $(sistemaSel).trigger('change');
    }

    // Esperar a que Unidad y Marca reciban sus opciones y setear valores
    const unidadSel = document.getElementById(`unidadSelect_${id}`);
    if (unidadSel && resp.unidad != null) {
      await waitForOption(unidadSel, String(resp.unidad));
      unidadSel.value = String(resp.unidad);
      $(unidadSel).trigger('change'); // por si hay cálculos dependientes
    }

    const marcaSel = document.getElementById(`marcaSelect_${id}`);
    if (marcaSel && resp.id_marca != null) {
      await waitForOption(marcaSel, String(resp.id_marca));
      marcaSel.value = String(resp.id_marca);
      $(marcaSel).trigger('change'); // para que cargue modelos
    }

    // Esperar modelos y setear modelo
    const modeloSel = document.getElementById(`modeloSelect_${id}`);
    if (modeloSel && resp.id_modelo != null) {
      await waitForOption(modeloSel, String(resp.id_modelo));
      modeloSel.value = String(resp.id_modelo);
    }

    // Valores simples
    const accesoSel = document.getElementById(`accesoEquipoSelect_${id}`);
    if (accesoSel && resp.acceso_equipo != null) accesoSel.value = String(resp.acceso_equipo);

    const estadoSel = document.getElementById(`estadoEquipoSelect_${id}`);
    if (estadoSel && resp.estado != null) estadoSel.value = String(resp.estado);

    const mantSel = document.getElementById(`mantenimientoSelect_${id}`);
    if (mantSel && resp.mantenimiento != null) mantSel.value = String(resp.mantenimiento);

    const capInp = document.getElementById(`capacidadInput_${id}`);
    if (capInp && resp.capacidad != null) capInp.value = String(resp.capacidad);

    const cantInp = document.getElementById(`cantidadInput_${id}`);
    if (cantInp && resp.cantidad != null) cantInp.value = String(resp.cantidad);

    const uniadCant = document.getElementById(`unidadCantidadSelect_${id}`);
    if (uniadCant && resp.unidad_capacidad != null) uniadCant.value = String(resp.unidad_capacidad);

    $row.data('loading', false);
  }

  // Carga inicial: trae todos los equipos del proyecto y los pinta
  function loadEquipos() {
    $('#tr_exampe').hide();
    const url = '/equipos_coordinacion/{{ $id_project }}'; // GET que devuelve arreglo JSON
    $.getJSON(url)
      .done(async function (lista) {
        // Limpia y pinta en bloque
        $tbody.empty();
        const frag = document.createDocumentFragment();
        (lista || []).forEach((item, idx) => {
          const tr = renderRow(item, idx + 1);
          frag.appendChild(tr);
        });
        $tbody[0].appendChild(frag);

        // Inicializa cada fila (selects dependientes, etc.)
        for (const item of (lista || [])) {
          // Evita bloquear el hilo; permite pintar primero
          await initializeRowValues(item);
        }
      })
      .fail(function (xhr, status, err) {
        console.error('Error al cargar equipos:', err);
      });
  }

  // Añadir fila con AJAX (se mantiene)
  $addBtn.on('click', function () {
    $('#tr_exampe').hide();
    $.ajax({
      url: '/save_equipo_coordinacion/{{ $id_project }}',
      method: 'POST',
      dataType: 'json'
    })
      .done(function (resp) {
        const index = $tbody.children('tr').length + 1;
        const tr = renderRow(resp, index);
        const frag = document.createDocumentFragment();
        frag.appendChild(tr);
        $tbody[0].appendChild(frag);
        initializeRowValues(resp);
      })
      .fail(function (xhr, status, err) {
        console.error('Error al enviar los datos:', err);
      });
  });

  // Delegación: cambios de sistema -> carga unidad, marcas, cálculo
  $tbody.on('change', 'select[id^="sistemaSelect_"]', function () {
    const id = this.id.split('_').pop();
    const unidadId = `unidadSelect_${id}`;
    const marcaId = `marcaSelect_${id}`;
    const sistCalcId = `sistemainput1_calculo_${id}`;
    if (typeof unidadHvac === 'function') unidadHvac(this.value, '', unidadId, 2);
    if (typeof send_value_equipo_marcas === 'function') send_value_equipo_marcas(this.id, this.value, marcaId);
    if (typeof send_value_sistemas_calculo_coordinacion === 'function') send_value_sistemas_calculo_coordinacion(sistCalcId, this.value);
    if (!$(this).closest('tr').data('loading') && typeof save_dates_coordinacion_equipos === 'function') {
      save_dates_coordinacion_equipos(id, this.value, 'id_sistema');
    }
  });

  // Delegación: cambios de unidad -> update_unidad
  $tbody.on('change', 'select[id^="unidadSelect_"]', function () {
    const id = this.id.split('_').pop();
    if (!$(this).closest('tr').data('loading') && typeof save_dates_coordinacion_equipos === 'function') {
      save_dates_coordinacion_equipos(id, this.value, 'unidad');
    }
  });

  // Delegación: marca -> carga modelos
  $tbody.on('change', 'select[id^="marcaSelect_"]', function () {
    const id = this.id.split('_').pop();
    const modeloId = `modeloSelect_${id}`;
    if (typeof send_modelos === 'function') send_modelos(this.value, modeloId);
    if (!$(this).closest('tr').data('loading') && typeof save_dates_coordinacion_equipos === 'function') {
      save_dates_coordinacion_equipos(id, this.value, 'id_marca');
    }
  });

  // Delegación: modelos -> update_modelo
  $tbody.on('change', 'select[id^="modeloSelect_"]', function () {
    const id = this.id.split('_').pop();
    if (!$(this).closest('tr').data('loading') && typeof save_dates_coordinacion_equipos === 'function') {
      save_dates_coordinacion_equipos(id, this.value, 'id_modelo');
    }
  });

  // Delegación: cambios en capacidad y cantidad -> cálculo y sincronización
  $tbody.on('change', 'input[id^="capacidadInput_"], input[id^="cantidadInput_"]', function () {
    const id = this.id.split('_').pop();
    if (!$(this).closest('tr').data('loading')) {
      if (this.id.startsWith('capacidadInput_') && typeof save_dates_coordinacion_equipos === 'function') {
        save_dates_coordinacion_equipos(id, this.value, 'capacidad');
      }
      if (this.id.startsWith('cantidadInput_') && typeof save_dates_coordinacion_equipos === 'function') {
        save_dates_coordinacion_equipos(id, this.value, 'cantidad');
        show_units_calculo_coordinacion(id, this.value);
      }
    }
  });

  // Delegación: acceso_equipo -> set acceso
  $tbody.on('change', 'select[id^="accesoEquipoSelect_"]', function () {
    const id = this.id.split('_').pop();
    if (!$(this).closest('tr').data('loading') && typeof save_dates_coordinacion_equipos === 'function') {
      save_dates_coordinacion_equipos(id, this.value, 'acceso_equipo');
    }
  });

  // Delegación: acceso_equipo -> set acceso
  $tbody.on('change', 'select[id^="unidadCantidadSelect_"]', function () {
    const id = this.id.split('_').pop();
    if (!$(this).closest('tr').data('loading') && typeof save_dates_coordinacion_equipos === 'function') {
      save_dates_coordinacion_equipos(id, this.value, 'unidad_capacidad');
    }
  });

  // Delegación: estado -> set estado
  $tbody.on('change', 'select[id^="estadoEquipoSelect_"]', function () {
    const id = this.id.split('_').pop();
    if (!$(this).closest('tr').data('loading') && typeof save_dates_coordinacion_equipos === 'function') {
      save_dates_coordinacion_equipos(id, this.value, 'estado');
    }
  });

  // Delegación: mantenimiento -> set periodo
  $tbody.on('change', 'select[id^="mantenimientoSelect_"]', function () {
    const id = this.id.split('_').pop();
    const sistemaId = `sistemaSelect_${id}`;
    const unidadId = `unidadSelect_${id}`;
    const periodoId = `periodoSelect_${id}`;
    if (!$(this).closest('tr').data('loading') && typeof save_dates_coordinacion_equipos === 'function') {
      save_dates_coordinacion_equipos(id, this.value, 'mantenimiento');
    }
    if (typeof set_periodo === 'function') set_periodo(sistemaId, unidadId, periodoId, this.value);
  });

  // Restricción numérica (si existe soloNumeros)
  $tbody.on('keypress', 'input[id^="capacidadInput_"], input[id^="cantidadInput_"]', function (e) {
    if (typeof soloNumeros === 'function') return soloNumeros(e);
    return true;
  });

  // Delegación: eliminar fila
  $tbody.on('click', 'button[id^="deleteBtn_"]', function () {
    $(this).closest('tr').remove();
    renumberRows();
    if (typeof delete_calculo_equiops === 'function') {
      const rowCount = $tbody.children('tr').length;
      delete_calculo_equiops(rowCount, null);
    }
  });

  // Cargar todos los equipos al iniciar
  loadEquipos();
});


/* document.addEventListener('DOMContentLoaded', function() {
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
        btnDelete.className = 'bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition-colors duration-200 mr-5';
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
}); */
</script>
