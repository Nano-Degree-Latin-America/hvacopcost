 {{-- ESPACIO PARA FORMULARIO --}}
 <form id="configuraciones_form" name="configuraciones_form" class="w-full flex space-x-3 justify-center">

    <input type="hidden" id="id_configuracion" name="id_configuracion">
    <div class="flex flex-col">
      <label for="configuracion" class="text-gray-700 font-bold font-roboto text-lg">Configuración</label>
      <input required type="text" id="configuracion" name="configuracion" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center">
    </div>
    <div class="flex flex-col">
      <label for="valor" class="text-gray-700 font-bold font-roboto text-lg">Valor</label>
      <input required type="text" id="valor" name="valor" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center">
    </div>
    <div class="flex flex-col">
      <label for="unidad" class="text-gray-700 font-bold font-roboto text-lg">Unidad</label>
      <input required type="text" id="unidad" name="unidad" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center">
    </div>
  </form>
