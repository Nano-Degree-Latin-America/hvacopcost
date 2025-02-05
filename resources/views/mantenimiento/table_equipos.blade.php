<div style="height:80%" class="w-full overflow-y-auto overflow-x-hidden">
   {{--  @inject('marcas_modelos','App\Http\Controllers\MarcasController') --}}
    <table class="table-fin-04 w-full table-auto">
        <thead>
            <tr>
                <th style="width:60px;" class="font-roboto font-bold text-center"></th>
                <th class="font-roboto font-bold text-center">Sistema</th>
                <th class="font-roboto font-bold text-center">Unidad</th>
                <th style="width:100px;" class="font-roboto font-bold text-center">Marca</th>
                <th style="width:100px;" class="font-roboto font-bold text-center">Modelo</th>
                <th style="width:100px;" class="font-roboto font-bold text-center">Capacidad</th>
                <th style="width:100px;" class="font-roboto font-bold text-center">Cantidad</th>
                <th style="width:100px;" class="font-roboto font-bold text-center">Años Vida</th>
                <th style="width:100px;" class="font-roboto font-bold text-center">Acceso</th>
                <th style="width:100px;" class="font-roboto font-bold text-center">Estado</th>
            </tr>
    </thead>
    <tbody id="tbody_equipos" name="tbody_equipos">
        <tr  id="tr_exampe" name="tr_exampe"  class="">
            <td><input style="border-color:#1B17BB;!important" disabled type="number" class="form-control form-finanza form-control-sm text-center text-sm font-bold h-8"></td>
            <td><input style="border-color:#1B17BB;!important" disabled type="number" class="form-control form-finanza form-control-sm text-center text-sm font-bold h-8"></td>
            <td><input style="border-color:#1B17BB;!important" disabled type="number" class="form-control form-finanza form-control-sm text-center text-sm font-bold h-8"></td>
            <td><input style="border-color:#1B17BB;!important" disabled type="number" class="form-control form-finanza form-control-sm text-center text-sm font-bold h-8"></td>
            <td><input style="border-color:#1B17BB;!important" disabled type="number" class="form-control form-finanza form-control-sm text-center text-sm font-bold h-8"></td>
            <td><input style="border-color:#1B17BB;!important" disabled type="number" class="form-control form-finanza form-control-sm text-center text-sm font-bold h-8"></td>
            <td><input style="border-color:#1B17BB;!important" disabled type="number" class="form-control form-finanza form-control-sm text-center text-sm font-bold h-8"></td>
            <td><input style="border-color:#1B17BB;!important" disabled type="number" class="form-control form-finanza form-control-sm text-center text-sm font-bold h-8"></td>
            <td><input style="border-color:#1B17BB;!important" disabled type="number" class="form-control form-finanza form-control-sm text-center text-sm font-bold h-8"></td>
            <td><input style="border-color:#1B17BB;!important" disabled type="number" class="form-control form-finanza form-control-sm text-center text-sm font-bold h-8"></td>
        </tr>
    </tbody>
    <input id="contador_table" type="number" value="0" class="hidden">
    <input id="array_table_equipos" name="array_table_equipos[]" type="text">
    </table>

</div>
<div class="w-full  mt-10">
    <div id="div_next" name="div_next" class="w-full flex justify-center">
        <button type="button"  id="next" name="next"
            onclick="buton_check('{{App::getLocale()}}');"
            style="background-color:#1B17BB;"
            @click="step++"
             x-show="step == 2"
            class="w-1/5 focus:outline-none border border-transparent py-4 px-7 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-2xl font-roboto"
        >{{ __('index.calcular') }}</button>
    </div>
</div>
<style>
    table {
       width: 100%;

   }
   th, td {
       text-align: center; /* Centers the text horizontally */
       vertical-align: middle; /* Centers the text vertically */
   }
</style>
