<div id="modal_base_calculo" name="modal_base_calculo" class="fixed z-10 inset-0 overflow-y-auto mt-10 font-roboto hidden">
    <style>

    </style>
        <div class="flex  items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
          <!-- Fondo oscuro -->
          <div onclick="ocultar_modal('modal_base_calculo')" class="fixed inset-0 transition-opacity ">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>
          <!-- Contenedor del modal -->
          <div style="width: 40%" class="border-2 border-blue-600 inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 justify-items-center" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 w-full">
              <div style="width: 100%" class="flex justify-center">

                <form id="base_calculo_form" name="base_calculo_form" class="w-full flex space-x-3 justify-center">

                    <input type="hidden" id="id_calculo_base" name="id_calculo_base">
                    <div class="flex flex-col w-1/3">
                      <label for="sistema" class="text-gray-700 font-bold font-roboto text-md">Sistema</label>
                      <input disabled type="text" id="sistema" name="sistema" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 bg-gray-200 border-2 border-blue-600 rounded-md py-2 text-center">
                    </div>
                    <div class="flex flex-col w-1/3">
                        <label for="equipo" class="text-gray-700 font-bold font-roboto text-md">Unidad</label>
                        <input disabled type="text" id="equipo" name="equipo" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 bg-gray-200 border-2 border-blue-600 rounded-md py-2 text-center">
                    </div>
                     <div class="flex flex-col w-1/4">
                    <label for="costo_instalado" class="text-gray-700 font-bold font-roboto text-md">Costo Instalación</label>
                    <input  type="text" id="costo_instalado" name="costo_instalado" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center">
                    </div>
                    <div class="flex flex-col w-1/4">
                    <label for="unidad" class="text-gray-700 font-bold font-roboto text-md">Unidad Costo</label>
                    <input  type="text" id="unidad" name="unidad" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center">
                    </div>
                   {{--  <div class="flex flex-col">
                      <label for="valor" class="text-gray-700 font-bold font-roboto text-lg">Valor</label>
                      <input required type="text" id="valor" name="valor" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center">
                    </div>
                    <div class="flex flex-col">
                      <label for="unidad" class="text-gray-700 font-bold font-roboto text-lg">Unidad</label>
                      <input required type="text" id="unidad" name="unidad" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center">
                    </div> --}}
                  </form

              </div>
            </div>
            <div class="w-full bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto justify-end">
                <button onclick="save_base_calculo();" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Guardar</button>
                <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-white-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" onclick="ocultar_modal('modal_base_calculo')">
                  Cerrar
                </button>
              </span>
            </div>
          </div>
        </div>
        <script>
    $('#equipo_modal_retro').on('change', function () {
        var eficiencia = $('#equipo_modal').val();
        mostrar_eficiencias(eficiencia,'eficiencia_modal_retro')
    });

        </script>
      </div>

