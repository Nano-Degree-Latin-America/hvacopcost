<div id="modal_prod" name="modal_prod" class="fixed z-10 inset-0 overflow-y-auto mt-10 hidden">
    <div class="flex  items-end justify-end min-h-screen pt-4 px-4 pb-20 text-right mr-5 sm:block sm:p-0">
      <!-- Fondo oscuro -->
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute"></div>
      </div>
      <!-- Contenedor del modal -->
      <div class="border-2 border-blue-600 inline-block align-bottom bg-white rounded-lg text-right overflow-hidden shadow-xl transform transition-all" style="margin-top:250px;width:200px;" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="bg-white px-4 pt-5">
            <div class="grid w-full" >
                <div class="flex w-full justify-center">
                    <p class="text-2xl font-roboto font-bold"></p>
                </div>
          </div>
          <div class="grid w-full" >
                <div class="flex w-full justify-center">
                    <p class="text-md font-roboto font-bold text-justify">Valores Aceptables Entre 5 a 10%</p>
                </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 pt-2 pb-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" onclick="ocultar_modal('modal_prod')">
                Cerrar
            </button>
          </span>
        </div>
      </div>
    </div>
  </div>
