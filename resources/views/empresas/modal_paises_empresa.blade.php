<div id="modal_paises_empresa_{{$empresa->id}}" name="modal_paises_empresa_{{$empresa->id}}" class="fixed z-10 inset-0 overflow-y-auto mt-10 hidden">
    @inject('pais_empresa','app\Http\Controllers\EmpresasController')
    <div class="flex  items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Fondo oscuro -->
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
      <!-- Contenedor del modal -->
      <div class="border-2 border-blue-600 inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="flex w-full" >
            <div class="mt-3 w-full">

              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                <?php  $name_empresa=$pais_empresa->name_empresa($empresa->id) ?>
                Paises Empresa: {{$name_empresa}}
              <div class="mt-2 w-full flex gap-x-3">
                <div class="grid w-1/2">
                        <div class="w-full flex gap-x-2">
                            <?php  $Argentina=$pais_empresa->paises_empresa($empresa->id,'Argentina') ?>
                              @if ($Argentina === null)
                                <input type="checkbox" onclick="change_pais({{$empresa->id}},'Argentina')"><label class="mt-1">Argentina</label>
                                    @elseif($Argentina !== null)
                                <input type="checkbox" onclick="change_pais({{$empresa->id}},'Argentina')" checked><label for="" class="mt-1">Argentina</label>
                              @endif
                        </div>
                         <div class="w-full flex gap-x-2">
                            <?php  $Bolivia=$pais_empresa->paises_empresa($empresa->id,'Bolivia') ?>
                            @if ($Bolivia === null)
                              <input type="checkbox" onclick="change_pais({{$empresa->id}},'Bolivia')"><label class="mt-1">Bolivia</label>
                                  @elseif($Bolivia !== null)
                              <input type="checkbox" onclick="change_pais({{$empresa->id}},'Bolivia')" checked><label for="" class="mt-1">Bolivia</label>
                            @endif

                        </div>
                       <div class="w-full flex gap-x-2">
                                <input type="checkbox"><label for="" class="mt-1">Brasil</label>
                        </div>
                        <div class="w-full flex gap-x-2">
                                <input type="checkbox"><label for="" class="mt-1">Chile</label>
                        </div>
                       <div class="w-full flex gap-x-2">
                             <input type="checkbox"><label for="" class="mt-1">Colombia</label>
                        </div>
                       <div class="w-full flex gap-x-2">
                                <input type="checkbox"><label for="" class="mt-1">Caribe</label>
                        </div>
                       <div class="w-full flex gap-x-2">
                             <input type="checkbox"><label for="" class="mt-1">Centro América</label>
                        </div>

                </div>
                <div class="grid w-1/2">

                    <div class="w-full flex gap-x-2">
                    <input type="checkbox"><label for="" class="mt-1">Ecuador</label>
                     </div>
                    <div class="w-full flex gap-x-2">
                    <input type="checkbox"><label for="" class="mt-1">México</label>
                     </div>
                    <div class="w-full flex gap-x-2">
                    <input type="checkbox"><label for="" class="mt-1">Paraguay</label>
                     </div>
                    <div class="w-full flex gap-x-2">
                    <input type="checkbox"><label for="" class="mt-1">Perú</label>
                     </div>
                    <div class="w-full flex gap-x-2">
                    <input type="checkbox"><label for="" class="mt-1">Uruguay</label>
                     </div>
                    <div class="w-full flex gap-x-2">
                    <input type="checkbox"><label for="" class="mt-1">Venezuela</label>
                     </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" onclick="ocultar_modal('modal_paises_empresa_{{$empresa->id}}')">
              Cerrar
            </button>
          </span>
        </div>
      </div>
    </div>
  </div>
