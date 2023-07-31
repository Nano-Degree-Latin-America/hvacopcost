<div id="modal_add_marca_modelo_2_1" name="modal_add_marca_modelo_2_1" class="fixed z-10 inset-0 overflow-y-auto mt-10 hidden">

    <div class="flex  items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Fondo oscuro -->
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
      <!-- Contenedor del modal -->
      <div class="border-2 border-blue-600 inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="grid w-full">
            <div class="flex w-full" >
                <div class="mt-1 w-full py-2 border-b-2 border-blue-600">
                    <div>
                        <label for="" class="text-black font-roboto">Añadir Marca/Modelo</label>
                    </div>

                </div>
              </div>

              <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0">
                <div class="lg:grid 2xl:grid xl:grid w-1/2 gap-x-1">
                    <div class="w-full flex justify-start text-left">
                        <label  class="labels" for=""><b>Nueva Marca</b> </label>
                    </div>

                    <div class="w-full flex justify-start gap-x-2">
                        <input type="text" style="margin-left: 2px;" type="text" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center"  name="nueva_marca_2_1" id="nueva_marca_2_1" >
                        <div class="mt-1">
                            <a onclick="new_marc_add('nueva_marca_2_1','marcas_modal_2_1');" class="btn_roundf_retro" title="Guardar Modelo" alt="Guardar Modelo"><i class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0 gap-x-2">
                <div class="lg:grid 2xl:grid xl:grid w-1/2 gap-x-2">
                    <div class="w-1/2 flex justify-start text-left">
                        <label  class="labels" for=""><b>Marca</b> </label>
                    </div>
                    <div class="w-full flex justify-start">
                        <select  class="w-full border-2 border-blue-600 rounded-md py-2 text-black" name="marcas_modal_2_1" id="marcas_modal_2_1">
                        </select>
                    </div>
                </div>

                <div class="lg:grid 2xl:grid xl:grid gap-x-1 w-1/2">
                    <div class="w-full flex justify-start text-left">
                        <label class="labels" for=""><b>Nuevo Modelo</b></label>
                    </div>

                    <div class="w-full flex justify-start text-left gap-x-2">
                                <div>
                                    <input type="text"  type="text" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center"  name="nuevo_modelo_modal_2_1" id="nuevo_modelo_modal_2_1" >
                                </div>
                                <div class="mt-1">
                                    <a onclick="new_model_add('nuevo_modelo_modal_2_1','marcas_modal_2_1');" class="btn_roundf_retro" title="Guardar Modelo" alt="Guardar Modelo"><i class="fa-solid fa-plus"></i></a>
                                </div>
                    </div>
                </div>
            </div>

          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" onclick="ocultar_modal('modal_add_marca_modelo_2_1')">
              Cerrar
            </button>
          </span>
        </div>
      </div>
    </div>
  </div>
