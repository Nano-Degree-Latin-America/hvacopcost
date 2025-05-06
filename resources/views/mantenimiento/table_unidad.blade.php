<div class="w-full">
    <table id="table_projects"  name="table_projects" class="font-roboto w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg">
        <thead class="text-white">
            <tr style="background-color:#1B17BB;" class="flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                <th class="p-3 text-left"><span class="text-lg">Sistema HVAC</span></th>
                <th class="p-3 text-left"><span class="text-lg">Unidad HVAC</span></th>
                <th class="p-3 text-left"><span class="text-lg">Unidad</span></th>
                <th class="p-3 text-left"><span class="text-lg">Periodo</span></th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($unidades_unidad  as $unidad)
                <tr>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            {{$unidad->nombre_sistema}}

                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            {{$unidad->nombre_unidad}}
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            <input type="text" readonly value="{{$unidad->one}}" class="text-center width_inputs" id="one_unidad_{{$unidad->id}}" name="one_unidad_{{$unidad->id}}" onclick="disabled_input(this.id)" onchange="edit_unidad({{$unidad->id}},'one','unidad',this.value,this.id)" >
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            <input type="text" readonly value="{{$unidad->periodo}}" class="text-center width_inputs" id="periodo_unidad_{{$unidad->id}}" name="periodo_unidad_{{$unidad->id}}" onclick="disabled_input(this.id)" onchange="edit_unidad({{$unidad->id}},'periodo','unidad',this.value,this.id)" >
                        </td>
                </tr>

                @endforeach

        </tbody>
    </table>
</div>
