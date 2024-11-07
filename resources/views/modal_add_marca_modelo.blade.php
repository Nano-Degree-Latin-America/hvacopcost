<div id="modal_add_marca_modelo" name="modal_add_marca_modelo" class="fixed z-10 inset-0 overflow-y-auto mt-10 hidden">
    <style>
datalist {
  position: absolute;
  background-color: white;
  border: 1px solid blue;
  border-radius: 0 0 5px 5px;
  border-top: none;
  font-family: sans-serif;
  width: 350px;
  padding: 5px;
}

datalist.option {
  background-color: white;
  padding: 4px;
  color: blue;
  margin-bottom: 1px;
  font-size: 18px;
  cursor: pointer;
}

.btn_del_model{
border:1px solid #ffff;
background: #ce3153;
color:#ffff;
border-radius: 50%;
width: 30px;
height: 30px;
z-index: 90090;
display: flex;
align-content: center;
justify-content: center;
text-align: center;
align-items: center;
cursor: pointer;
}
.btn_del_model:hover {
border:1px solid #4299e1;
background: #4299e1;
color:#ffff;
border-radius: 50%;
width: 30px;
height: 30px;
z-index: 90090;
display: flex;
align-content: center;
justify-content: center;
text-align: center;
align-items: center;
cursor: pointer;
}

.btn_del_model:active {
border:1px solid #ffffff;
background: #ce3153;
color:#ffff;
border-radius: 50%;
width: 30px;
height: 30px;
z-index: 90090;
display: flex;
align-content: center;
justify-content: center;
text-align: center;
align-items: center;
cursor: pointer;
}
    </style>
        <div class="flex  items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
          <!-- Fondo oscuro -->
          <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>
          <!-- Contenedor del modal -->
          <div style="width: 45%" class="border-2 border-blue-600 inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 justify-items-center" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 w-full">
              <div class="grid w-full">

                <div class="flex w-full" >
                    <div class="mt-1 w-full py-2 border-b-2 border-blue-600">
                        <div>
                            <label for="" class="text-black font-roboto">Añadir Marca/Modelo</label>
                        </div>

                    </div>
                </div>


                <div class="flex w-full 2xl:mt-3 xl:mt-3 lg:mt-0 gap-x-2">
                    <div class="lg:grid 2xl:grid xl:grid w-1/3 gap-x-2">
                        <div class="w-1/2 flex justify-start text-left">
                            <label  class="labels" for=""><b>Equipo</b> </label>
                        </div>
                        <div class="w-full flex justify-start">


                            <select name="equipo_modal" id="equipo_modal" onchange="send_value_equipo_marca_modal(this.id,'cUnidad_1_1','cUnidad_1_1_retro',this.value);mostrar_eficiencias(this.value,'eficiencia_modal');send_marcas_equipo(this.value);" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-left">
                                <option value="0">{{ __('index.seleccionar') }}</option>
                                <option value="1">Paquetes (RTU)</option>
                                <option value="2">Split DX</option>
                                <option value="3">VRF No Ductados</option>
                                <option value="4">VRF Ductados</option>
                                <option value="5">PTAC/VTAC</option>
                                <option value="6">WSHP</option>
                                <option value="7">Minisplit Inverter</option>
{{--                                 <option value="8">Chiller - Aire - Scroll Constante</option>
                                <option value="9">Chiller - Aire - Scroll Variable</option>
                                <option value="10">Chiller - Aire - Tornillo 4 Etapas</option> --}}
                            </select>

                        </div>

                    </div>

                    <div class="lg:grid 2xl:grid xl:grid w-1/3 gap-x-2">
                        <div class="w-1/2 flex justify-start text-left">
                            <label  class="labels" for=""><b>Marca</b> </label>
                        </div>
                        <div class="w-full flex justify-start">

                            <input type="text" list="browsers" autocomplete="off" id="marca_modal" onchange="send_modelos_to_datalist(value,'modelos_datalist',document.getElementById('equipo_modal').value,'nuevo_modelo_modal');check_marcas_guardadas(this.value,'marca_modal');" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center">
                            <datalist id="browsers">

                            </datalist>

                            {{--  <input type="text" list="browsers" id="marca_modal" onchange="send_modelos_to_datalist(value,'modelos_datalist')" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center">
                            <datalist id="browsers">

                            </datalist> --}}

                           {{--  <select name="marca_modal" id="marca_modal"  onchange="send_modelos_to_datalist(value,'modelos_datalist')" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-left">
                            </select> --}}

                            {{--  onchange="send_value_equipo_marca_modal(this.id,'cUnidad_1_1_retro',this.value);"  --}}

                        </div>

                        {{-- <div class="dropdown ">

                            <div id="myDropdown" class="dropdown-content text-black grid hidden">


                            </div>
                          </div> --}}
                    </div>

                    <div class="lg:grid 2xl:grid xl:grid w-1/3">
                        <div class="w-full">
                            <div class="w-full flex justify-start text-left">
                                <label class="labels" for=""><b>Modelo</b></label>
                            </div>

                            <div class="w-full flex justify-start text-left">
                                        <div  class="w-full">
                                            <input type="text" list="modelos_datalist" autocomplete="off" type="text" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center"  name="nuevo_modelo_modal" id="nuevo_modelo_modal" >
                                            <datalist id="modelos_datalist">

                                            </datalist>
                                        </div>

                            </div>
                        </div>
                    </div>

                    <div class="lg:grid 2xl:grid xl:grid w-1/3 gap-x-2">
                        <div class="w-full flex justify-start text-left">
                            <label  class="labels" for=""><b>Eficiencia</b> </label>
                        </div>

                        <div class="flex w-full gap-x-2">
                            <div class="w-1/2 flex justify-start">
                                <input type="text" value="0" type="text" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-center"  name="cantidad_eficiencia" id="cantidad_eficiencia" >

                            </div>

                            <div class="w-1/2 flex justify-start">
                                <select name="eficiencia_modal" id="eficiencia_modal" class="text-black 2xl:xl:w-full xl:w-full lg:w-3/6 border-2 border-blue-600 rounded-md py-2 text-left">


                                </select>

                            </div>
                        </div>

                    </div>

                    <div style="margin-top:28px;" class="flex gap-x-1">
                        <a onclick="new_model_or_marck_add('nuevo_modelo_modal','marca_modal','eficiencia_modal',document.getElementById('equipo_modal').value,'cantidad_eficiencia','equipo_modal');" class="btn_roundf_retro" title="Guardar Modelo" alt="Guardar Modelo"><i class="fa-solid fa-plus"></i></a>
                        <a onclick="delete_mark('marca_modal','nuevo_modelo_modal','equipo_modal','cantidad_eficiencia');" class="btn_del_model" title="Borrar Modelo" alt="Borrar Modelo"><i class="fa-solid fa-trash"></i></a>
                    </div> {{-- onclick="new_model_or_marck_add('nuevo_modelo_modal','marca_modal','eficiencia_modal');" --}}
                </div>

              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" onclick="ocultar_modal('modal_add_marca_modelo')">
                  Cerrar
                </button>
              </span>
            </div>
          </div>
        </div>
        <script>
    $('#equipo_modal').on('change', function () {
        var eficiencia = $('#equipo_modal').val();
        mostrar_eficiencias(eficiencia,'eficiencia_modal')
    });
        </script>
      </div>

