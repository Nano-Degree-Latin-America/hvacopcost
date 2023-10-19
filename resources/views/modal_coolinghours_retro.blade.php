<div id="modal_coolinghours_retro" name="modal_coolinghours_retro" class="fixed z-10 inset-0 overflow-y-auto mt-10 hidden">
    <div class="flex  items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Fondo oscuro -->
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute"></div>
      </div>
      <!-- Contenedor del modal -->
      <div class="border-2 border-blue-600 inline-block align-bottom bg-white rounded_modal_ebergy_hvac text-left overflow-hidden shadow-xl transform transition-all w-1/5" style="margin-top:370px;margin-right:380px;" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="bg-white px-4 pt-5">
            <div class="grid w-full" >
                <div class="flex w-full justify-center">
                    <p class="text-1xl font-roboto font-bold">Horas mínimas para el
                        enfriamiento en una ciudad, se pueden ingresar horas adicionales
                        si es necesario.​</p>
                </div>
          </div>
          {{-- <div class="grid w-full" >
                <div class="flex w-full justify-center">
                    <p class="text-2xl font-roboto font-bold">Valores Aproximados</p>
                </div>

                <div lass="grid mt-1 w-full justify-items-center">
                    <ul class="list-disc">
                        <li>EER = 0.7 x IERR​</li>
                        <li>IEER = 1.43 x EER​​</li>
                        <li>IEER = 1.25 x SEER​​</li>
                        <li>SEER = 0.8 x IEER​​</li>
                        <li>SEER = 1.14 x EER​​</li>
                        <li>SEER2 = SEER x 0.95​</li>











                        <!-- ... -->
                      </ul>
                </div>
          </div> --}}
        </div>
        <div class="bg-gray-50 px-4 pt-2 pb-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" onclick="ocultar_modal('modal_coolinghours_retro')">
              Cerrar
            </button>
          </span>
        </div>
      </div>
    </div>
  </div>
