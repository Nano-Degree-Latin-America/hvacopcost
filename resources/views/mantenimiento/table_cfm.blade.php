<div class="w-full">
    <table id="table_projects"  name="table_projects" class="font-roboto w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg">
        <thead class="text-white">
            <tr style="background-color:#1B17BB;" class="flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                <th class="p-3 text-left"><span class="text-lg">Sistema HVAC</span></th>
                <th class="p-3 text-left"><span class="text-lg">Unidad HVAC</span></th>
                <th class="p-3 text-left"><span class="text-lg">1 - 199</span></th>
                <th class="p-3 text-left"><span class="text-lg">200 - 999</span></th>
                <th class="p-3 text-left"><span class="text-lg">1,000 - 9,999</span></th>
                <th class="p-3 text-left"><span class="text-lg">10,000 - 49,999</span></th>
                <th class="p-3 text-left"><span class="text-lg">50,000 y más</span></th>
                <th class="p-3 text-left"><span class="text-lg">Periodo</span></th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($unidades_cfm  as $unidad)
                <tr>
                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            {{$unidad->nombre_sistema}}
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            {{$unidad->nombre_unidad}}
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            <input type="text" readonly value="{{$unidad->one}}" class="text-center width_inputs" id="one_cfm_{{$unidad->id}}" name="one_cfm_{{$unidad->id}}" onclick="disabled_input(this.id)" onchange="edit_unidad({{$unidad->id}},'one','cfm',this.value,this.id)" >
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            <input type="text" readonly value="{{$unidad->two}}" class="text-center width_inputs" id="two_cfm_{{$unidad->id}}" name="two_cfm_{{$unidad->id}}" onclick="disabled_input(this.id)" onchange="edit_unidad({{$unidad->id}},'two','cfm',this.value,this.id)" >
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            <input type="text" readonly value="{{$unidad->three}}" class="text-center width_inputs" id="three_cfm_{{$unidad->id}}" name="three_cfm_{{$unidad->id}}" onclick="disabled_input(this.id)" onchange="edit_unidad({{$unidad->id}},'three','cfm',this.value,this.id)" >
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            <input type="text" readonly value="{{$unidad->four}}" class="text-center width_inputs" id="four_cfm_{{$unidad->id}}" name="four_cfm_{{$unidad->id}}" onclick="disabled_input(this.id)" onchange="edit_unidad({{$unidad->id}},'four','cfm',this.value,this.id)" >
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            <input type="text" readonly value="{{$unidad->five}}" class="text-center width_inputs" id="five_cfm_{{$unidad->id}}" name="five_cfm_{{$unidad->id}}" onclick="disabled_input(this.id)" onchange="edit_unidad({{$unidad->id}},'five','cfm',this.value,this.id)" >
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            <input type="text" readonly value="{{$unidad->periodo}}" class="text-center width_inputs" id="periodo_cfm_{{$unidad->id}}" name="periodo_cfm_{{$unidad->id}}" onclick="disabled_input(this.id)" onchange="edit_unidad({{$unidad->id}},'periodo','cfm',this.value,this.id)" >
                        </td>
                </tr>

                @endforeach

        </tbody>
    </table>
</div>
