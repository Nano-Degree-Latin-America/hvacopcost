<div style="height:80%" class="w-full overflow-y-auto overflow-x-hidden">
   {{--  @inject('marcas_modelos','App\Http\Controllers\MarcasController') --}}
    <table class="table-fin-04 w-full">

        <thead>
            <tr>
                <th style="width:60px;" class="font-roboto font-bold text-center"></th>
                <th class="font-roboto font-bold text-center">Sistema</th>
                <th class="font-roboto font-bold text-center">Unidad</th>
                <th class="font-roboto font-bold text-center">Marca</th>
                <th class="font-roboto font-bold text-center">Modelo</th>
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

<style>
    table {
       width: 100%;

   }
   th, td {
       text-align: center; /* Centers the text horizontally */
       vertical-align: middle; /* Centers the text vertically */
   }
</style>
