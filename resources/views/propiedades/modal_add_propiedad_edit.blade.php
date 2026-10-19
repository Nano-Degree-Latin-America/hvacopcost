<div id="modal_add_propiedad_edit" name="modal_add_propiedad_edit" class="fixed z-10 inset-0 overflow-y-auto mt-10 font-roboto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div onclick="ocultar_modal('modal_add_propiedad')" class="fixed inset-0 transition-opacity">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div style="width: 50%" class="border-2 border-blue-600 inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 w-full">
                <div class="flex items-center justify-between border-b border-gray-200 pb-3 mb-4">
                    <h2 id="modal-headline" class="text-xl font-semibold text-blue-900">Propiedades</h2>
                    <button type="button" onclick="ocultar_modal('modal_add_propiedad_edit')" class="text-gray-500 hover:text-gray-800 text-2xl leading-none">×</button>
                </div>
                <input id="id_edit" name="id_edit" type="hidden" placeholder="Ingrese cliente" class="mt-1 block w-full rounded-md border-2 border-color-inps px-3 py-2 focus:border-blue-700 focus:outline-none" />

                <div class="space-y-4">
                    <div class="grid grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-blue-900">Nombre del Cliente<span class="text-red-500">*</span></label>
                            <input id="cliente_edit" name="cliente_edit" type="text" placeholder="Ingrese cliente" class="mt-1 block w-full rounded-md border-2 border-color-inps px-3 py-2 focus:border-blue-700 focus:outline-none" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-blue-900">Nombre de la Propiedad<span class="text-red-500">*</span></label>
                            <input id="nombre_edit" name="nombre_edit" type="text" placeholder="Ingrese nombre" class="mt-1 block w-full rounded-md border-2 border-color-inps px-3 py-2 focus:border-blue-700 focus:outline-none" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-blue-900">Categoría del Edificio<span class="text-red-500">*</span></label>
                            <select id="categoria_edit" name="categoria_edit" type="text"  class="mt-1 block w-full rounded-md border-2 border-color-inps px-3 py-2 focus:border-blue-700 focus:outline-none">

                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-blue-900">Años Edificio<span class="text-red-500">*</span></label>
                            <input id="yrs_edificio_edit" name="yrs_edificio_edit" type="text" maxlength="2" onkeypress="return soloNumeros(event)" class="mt-1 block w-full rounded-md border-2 border-color-inps px-3 py-2 focus:border-blue-700 focus:outline-none"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-blue-900">Dirección<span class="text-red-500">*</span></label>
                            <input id="direccion_edit" name="direccion_edit" type="text" placeholder="Ingrese dirección" class="mt-1 block w-full rounded-md border-2 border-color-inps px-3 py-2 focus:border-blue-700 focus:outline-none" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-blue-900">Nombre del Contacto<span class="text-red-500">*</span></label>
                            <input id="contacto_edit" name="contacto_edit" type="text" placeholder="Ingrese contacto" class="mt-1 block w-full rounded-md border-2 border-color-inps px-3 py-2 focus:border-blue-700 focus:outline-none" />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-blue-900">Ciudad<span class="text-red-500">*</span></label>
                            <input id="ciudad_edit" name="ciudad_edit" type="text" placeholder="Ingrese ciudad" class="mt-1 block w-full rounded-md border-2 border-color-inps px-3 py-2 focus:border-blue-700 focus:outline-none" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-blue-900">Estado<span class="text-red-500">*</span></label>
                            <input id="estado_edit" name="estado_edit" type="text" placeholder="Ingrese Estado" class="mt-1 block w-full rounded-md border-2 border-color-inps px-3 py-2 focus:border-blue-700 focus:outline-none" />
                        </div>
                        <div style="display: none">
                            <label class="block text-sm font-medium text-blue-900">Código Postal<span class="text-red-500">*</span></label>
                            <input id="codigo_postal_edit" name="codigo_postal_edit" maxlength="15" onkeypress="return soloNumeros(event)" type="text" placeholder="Ingrese código postal" class="mt-1 block w-full rounded-md border-2 border-color-inps px-3 py-2 focus:border-blue-700 focus:outline-none" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-blue-900">Distancia Sitio (km)<span class="text-red-500">*</span></label>
                            <input id="distancia_edit" name="distancia_edit" type="text" placeholder="Distancia Sitio" onkeypress="return soloNumeros(event)" onchange="change_to(this.value,'kms',this.id)" class="mt-1 block w-full rounded-md border-2 border-color-inps px-3 py-2 focus:border-blue-700 focus:outline-none" />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-blue-900">Teléfono<span class="text-red-500">*</span></label>
                            <input id="telefono_edit" name="telefono_edit" maxlength="10" onkeypress="return soloNumeros(event)" type="text" placeholder="Ingrese teléfono" class="mt-1 block w-full rounded-md border-2 border-color-inps px-3 py-2 focus:border-blue-700 focus:outline-none" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-blue-900">Correo<span class="text-red-500">*</span></label>
                            <input id="email_edit" name="email_edit" type="email" placeholder="Ingrese correo" class="mt-1 block w-full rounded-md border-2 border-color-inps px-3 py-2 focus:border-blue-700 focus:outline-none" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-blue-900">Estatus<span class="text-red-500">*</span></label>
                            <select id="estatus_edit" name="estatus_edit" type="text" class="mt-1 block w-full rounded-md border-2 border-color-inps px-3 py-2 focus:border-blue-700 focus:outline-none">
                              <option value="">Seleccione</option>
                              <option value="activo">Activo</option>
                              <option value="inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-blue-900">Comentarios<span class="text-red-500">*</span></label>
                        <textarea id="datos_factura_edit" name="datos_factura_edit" placeholder="Ingrese comentarios" class="mt-1 block w-full rounded-md border-2 border-color-inps px-3 py-2 focus:border-blue-700 focus:outline-none" rows="4"></textarea>
                    </div>
                </div>
            </div>
            <div class="w-full bg-gray-50 px-4 py-1 sm:px-6 sm:flex sm:flex-row-reverse">
                <button onclick="update_propiedad($('#id_edit').val());" type="button" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 sm:ml-3 sm:text-sm">Guardar</button>
                <button type="button" onclick="ocultar_modal('modal_add_propiedad_edit')" class=" inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 sm:mt-0 sm:text-sm">Cerrar</button>
            </div>
        </div>
    </div>
</div>
