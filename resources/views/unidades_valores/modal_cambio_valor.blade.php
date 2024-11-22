<div id="modal_cambio_valor" name="modal_cambio_valor" class="fixed z-10 inset-0 overflow-y-auto mt-10 hidden">
    <style>

    </style>
        <div class="flex  items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
          <!-- Fondo oscuro -->
          <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>
          <!-- Contenedor del modal -->
          <div style="width: 25%" class="border-2 border-blue-600 inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 justify-items-center" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 w-full">
              <div class="grid w-full">

                <div class="flex w-full" >
                    <div class="mt-1 w-full py-2 border-b-2 border-blue-600">
                        <div>
                            <label for="" class="text-2xl text-black font-roboto">Cambiar Valor</label>
                        </div>

                    </div>
                </div>


                <div class="grid w-full 2xl:mt-3 xl:mt-3 lg:mt-0 gap-y-1">
                    <div class="flex w-full gap-x-1">
                        <Label id="tipo" name="tipo" class="w-1/4 text-xl mt-1"></Label>
                        <Label id="unidad" name="unidad" class="w-auto text-xl mt-1 text-blue-500"></Label>
                    </div>
                    <div class="flex w-full gap-x-1">
                        <Label class="w-1/4 text-xl mt-1">Valor:</Label>
                        <input  id="valor" name="valor" class="w-1/4 text-black border-2 border-blue-600 rounded-md py-1 text-center" type="text">

                    </div>
                    <input id="identificador" name="identificador" type="text" class="hidden">
                    <input id="id_reg" name="id_reg" type="text" class="hidden">
                    <input id="tipo" name="tipo" type="text" class="hidden">
                </div>

              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse w-full">
              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button type="button" onclick="save_valor();" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" >
                    Guardar
                  </button>
                <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" onclick="ocultar_modal('modal_cambio_valor')">
                  Cerrar
                </button>
              </span>
            </div>
          </div>
        </div>
        <script>
/*     $('#equipo_modal_retro').on('change', function () {
        var eficiencia = $('#equipo_modal').val();
        mostrar_eficiencias(eficiencia,'eficiencia_modal_retro')
    }); */

        </script>
      </div>

