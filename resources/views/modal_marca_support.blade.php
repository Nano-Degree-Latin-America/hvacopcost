<div id="modal_marca_support" name="modal_marca_support" class="fixed z-10 inset-0 overflow-y-auto mt-20 hidden">

    <div class="flex  items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Fondo oscuro -->
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
      <!-- Contenedor del modal -->
      <div class="border-2 border-blue-600 inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="grid w-full" >
                <div class="flex w-full justify-center">
                    <p class="text-xl font-roboto font-bold text-center">Añadir dispositivo​​</p>
                </div>
          </div>
          <div class="flex w-full" >
            <div class="mt-3 w-full grid justify-items-center">
                <p class="text-blue-800">Dar click en el siguiente icono</p>
                <div class="mt-2 w-full flex gap-x-3 justify-center">

                <div class="rounded-md shadow-md">
                    <img  class="rounded-md" style="width: 300px; height:200px;"  src="{{asset('assets\images\disp_click.png')}}">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" onclick="ocultar_modal('modal_marca_support')">
              Cerrar
            </button>
          </span>
        </div>
      </div>
    </div>
  </div>
