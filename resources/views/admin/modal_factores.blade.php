<div id="modal_factores" name="modal_factores" class="fixed z-10 inset-0 overflow-y-auto mt-10 font-roboto hidden">
    <style>

    </style>
        <div class="flex  items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
          <!-- Fondo oscuro -->
          <div onclick="ocultar_modal('modal_factores')" class="fixed inset-0 transition-opacity ">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>
          <!-- Contenedor del modal -->
          <div style="width: 40%" class="border-2 border-blue-600 inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 justify-items-center" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
              <div class="bg-white px-4 pt-5 pb-4 w-full">
                <h1 id="titulo_modal" name="titulo_modal" class="font-bold text-roboto  text-xl"></h1>
              <div style="width: 100%" class="grid justify-items-center">

                <form id="factor_form" name="factor_form" class="w-full flex space-x-3 justify-center">

                    <input type="hidden" id="id_factor" name="id_factor">
                    <input type="hidden" id="tipo_factor" name="tipo_factor">
                    <div class="flex flex-col">
                        <label for="factor" class="text-gray-700 font-bold font-roboto text-lg">Factor</label>
                        <input required type="text" id="factor" name="factor" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center">
                        </div>
                    <div class="flex flex-col">
                    <label for="valor" class="text-gray-700 font-bold font-roboto text-lg">Valor</label>
                    <input required type="text" id="valor" name="valor" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center">
                    </div>

                </form>

              </div>
            </div>
            <div class="w-full bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto justify-end">
                <button onclick="save_factores();" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Guardar</button>
                <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-white-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" onclick="ocultar_modal('modal_factores')">
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

