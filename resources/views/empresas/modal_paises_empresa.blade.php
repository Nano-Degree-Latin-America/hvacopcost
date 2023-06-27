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
                        <?php  $Brasil=$pais_empresa->paises_empresa($empresa->id,'Brasil') ?>
                                @if ($Brasil === null)
                                <input type="checkbox" onclick="change_pais({{$empresa->id}},'Brasil')"><label class="mt-1">Brasil</label>
                                    @elseif($Brasil !== null)
                                <input type="checkbox" onclick="change_pais({{$empresa->id}},'Brasil')" checked><label for="" class="mt-1">Brasil</label>
                                @endif
                            </div>
                        <div class="w-full flex gap-x-2">
                            <?php  $Chile=$pais_empresa->paises_empresa($empresa->id,'Chile') ?>
                            @if ($Chile === null)
                            <input type="checkbox" onclick="change_pais({{$empresa->id}},'Chile')"><label class="mt-1">Chile</label>
                                @elseif($Chile !== null)
                            <input type="checkbox" onclick="change_pais({{$empresa->id}},'Chile')" checked><label for="" class="mt-1">Chile</label>
                            @endif
                        </div>
                       <div class="w-full flex gap-x-2">
                        <?php  $Colombia=$pais_empresa->paises_empresa($empresa->id,'Colombia') ?>
                            @if ($Colombia === null)
                            <input type="checkbox" onclick="change_pais({{$empresa->id}},'Colombia')"><label class="mt-1">Colombia</label>
                                @elseif($Colombia !== null)
                            <input type="checkbox" onclick="change_pais({{$empresa->id}},'Colombia')" checked><label for="" class="mt-1">Colombia</label>
                            @endif
                        </div>
                       <div class="w-full flex gap-x-2">
                        <?php  $Caribe=$pais_empresa->paises_empresa($empresa->id,'Caribe') ?>
                        @if ($Caribe === null)
                        <input type="checkbox" onclick="change_pais({{$empresa->id}},'Caribe')"><label class="mt-1">Caribe</label>
                            @elseif($Caribe !== null)
                        <input type="checkbox" onclick="change_pais({{$empresa->id}},'Caribe')" checked><label for="" class="mt-1">Caribe</label>
                        @endif
                        </div>
                       <div class="w-full flex gap-x-2">
                        <?php  $Centro_a=$pais_empresa->paises_empresa($empresa->id,'Centro América') ?>
                        @if ($Centro_a === null)
                        <input type="checkbox" onclick="change_pais({{$empresa->id}},'Centro América')"><label class="mt-1">Centro América</label>
                            @elseif($Centro_a !== null)
                        <input type="checkbox" onclick="change_pais({{$empresa->id}},'Centro América')" checked><label for="" class="mt-1">Centro América</label>
                        @endif
                        </div>

                </div>
                <div class="grid w-1/2">

                    <div class="w-full flex gap-x-2">
                        <?php  $Ecuador=$pais_empresa->paises_empresa($empresa->id,'Ecuador') ?>
                        @if ($Ecuador === null)
                        <input type="checkbox" onclick="change_pais({{$empresa->id}},'Ecuador')"><label class="mt-1">Ecuador</label>
                            @elseif($Ecuador !== null)
                        <input type="checkbox" onclick="change_pais({{$empresa->id}},'Ecuador')" checked><label for="" class="mt-1">Ecuador</label>
                        @endif
                     </div>
                    <div class="w-full flex gap-x-2">
                        <?php  $México=$pais_empresa->paises_empresa($empresa->id,'México') ?>
                        @if ($México === null)
                        <input type="checkbox" onclick="change_pais({{$empresa->id}},'México')"><label class="mt-1">México</label>
                            @elseif($México !== null)
                        <input type="checkbox" onclick="change_pais({{$empresa->id}},'México')" checked><label for="" class="mt-1">México</label>
                        @endif
                     </div>
                    <div class="w-full flex gap-x-2">
                        <?php  $Paraguay=$pais_empresa->paises_empresa($empresa->id,'Paraguay') ?>
                        @if ($Paraguay === null)
                        <input type="checkbox" onclick="change_pais({{$empresa->id}},'Paraguay')"><label class="mt-1">Paraguay</label>
                            @elseif($Paraguay !== null)
                        <input type="checkbox" onclick="change_pais({{$empresa->id}},'Paraguay')" checked><label for="" class="mt-1">Paraguay</label>
                        @endif
                     </div>
                    <div class="w-full flex gap-x-2">
                        <?php  $Perú=$pais_empresa->paises_empresa($empresa->id,'Perú') ?>
                        @if ($Perú === null)
                        <input type="checkbox" onclick="change_pais({{$empresa->id}},'Perú')"><label class="mt-1">Perú</label>
                            @elseif($Perú !== null)
                        <input type="checkbox" onclick="change_pais({{$empresa->id}},'Perú')" checked><label for="" class="mt-1">Perú</label>
                        @endif
                     </div>
                    <div class="w-full flex gap-x-2">
                        <?php  $Uruguay=$pais_empresa->paises_empresa($empresa->id,'Uruguay') ?>
                        @if ($Uruguay === null)
                        <input type="checkbox" onclick="change_pais({{$empresa->id}},'Uruguay')"><label class="mt-1">Uruguay</label>
                            @elseif($Uruguay !== null)
                        <input type="checkbox" onclick="change_pais({{$empresa->id}},'Uruguay')" checked><label for="" class="mt-1">Uruguay</label>
                        @endif
                     </div>
                    <div class="w-full flex gap-x-2">
                        <?php  $Venezuela=$pais_empresa->paises_empresa($empresa->id,'Venezuela') ?>
                        @if ($Venezuela === null)
                        <input type="checkbox" onclick="change_pais({{$empresa->id}},'Venezuela')"><label class="mt-1">Venezuela</label>
                            @elseif($Venezuela !== null)
                        <input type="checkbox" onclick="change_pais({{$empresa->id}},'Venezuela')" checked><label for="" class="mt-1">Venezuela</label>
                        @endif
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
