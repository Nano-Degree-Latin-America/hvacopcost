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

                @foreach ($mantenimiento_equipos as $equipo)
                <tr  id="tr_exampe" name="tr_exampe"  class="">
                    <td></td>
                    <td><input style="border: 2px solid; border-color:#1B17BB!important; width:100%;" value="{{ $equipo->sistema_name }}" disabled type="text" class="text-center text-sm font-bold h-8"></td>
                    <td><input style="border: 2px solid; border-color:#1B17BB!important; width:100%;" value="{{ $equipo->unidad_name }}" disabled type="text" class="text-center text-sm font-bold h-8"></td>
                    <td><input style="border: 2px solid; border-color:#1B17BB!important; width:100%;" value="{{ $equipo->marca_name }}" disabled type="text" class="text-center text-sm font-bold h-8"></td>
                    <td><input style="border: 2px solid; border-color:#1B17BB!important; width:100%;" value="{{ $equipo->modelo_name }}" disabled type="text" class="text-center text-sm font-bold h-8"></td>
                    <td><input style="border: 2px solid; border-color:#1B17BB!important; width:100%;" value="{{ $equipo->capacidad }}" disabled type="text" class="text-center text-sm font-bold h-8"></td>
                    <td><input style="border: 2px solid; border-color:#1B17BB!important; width:100%;" value="{{ $equipo->cantidad }}" disabled type="text" class="text-center text-sm font-bold h-8"></td>
                    <td><input style="border: 2px solid; border-color:#1B17BB!important; width:100%;" value="{{ $equipo->yrs_life }}" disabled type="text" class="text-center text-sm font-bold h-8"></td>
                    <td><input style="border: 2px solid; border-color:#1B17BB!important; width:100%;" value="{{ $equipo->factor_name_acceso }}" disabled type="text" class="text-center text-sm font-bold h-8"></td>
                    <td><input style="border: 2px solid; border-color:#1B17BB!important; width:100%;" value="{{ $equipo->factor_name_estado }}" disabled type="text" class="text-center text-sm font-bold h-8"></td>
                    <td style="width:30px;" class=""><button type="button" onclick="del_td_tr({{ $equipo->id }})" class="px-1 border-2 border-red-500 rounded-md text-xl text-orange-400 hover:text-white hover:bg-orange-400"><i class="fas fa-trash"></i></i></button></td>
                    <td style="width:30px;" class=""><button type="button" onclick="edit_regstro({{ $equipo->id }})" class="px-1 border-2 border-blue-500 rounded-md text-lg text-blue-400 hover:text-white hover:bg-blue-200"><i class="fas fa-edit"></i></i></button></td>

                </tr>
                @endforeach
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
