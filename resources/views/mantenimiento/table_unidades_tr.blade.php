<div class="w-full">
    <style>
        .width_inputs{
            width: 100px;
        }
    </style>
    <table id="table_projects"  name="table_projects" class="font-roboto w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg">
        <thead class="text-white">
            <tr style="background-color:#1B17BB;" class="flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                <th class="p-3 text-left"><span class="text-lg">Sistema HVAC</span></th>
                <th class="p-3 text-left"><span class="text-lg">Unidad HVAC</span></th>
                <th class="p-3 text-left"><span class="text-lg">1 - 2.9</span></th>
                <th class="p-3 text-left"><span class="text-lg">3 - 7.4</span></th>
                <th class="p-3 text-left"><span class="text-lg">7.5 - 14.9</span></th>
                <th class="p-3 text-left"><span class="text-lg">15 - 24.9</span></th>
                <th class="p-3 text-left"><span class="text-lg">25 - 49.9</span></th>
                <th class="p-3 text-left"><span class="text-lg">50 - 99.9</span></th>
                <th class="p-3 text-left"><span class="text-lg">100 - 199.9</span></th>
                <th class="p-3 text-left"><span class="text-lg">200 - 350</span></th>
                <th class="p-3 text-left"><span class="text-lg">Periodo</span></th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($unidades_tr  as $unidad)
                <tr>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            {{$unidad->nombre_sistema}}
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            {{$unidad->nombre_unidad}}
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                           <input type="text" readonly value="{{$unidad->one}}" class="text-center width_inputs" id="one_tr_{{$unidad->id}}" name="one_tr_{{$unidad->id}}" onclick="disabled_input(this.id)" onchange="edit_unidad({{$unidad->id}},'one','tr',this.value,this.id)" >
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            <input type="text" readonly value="{{$unidad->two}}" class="text-center width_inputs" id="two_tr_{{$unidad->id}}" name="two_tr_{{$unidad->id}}" onclick="disabled_input(this.id)" onchange="edit_unidad({{$unidad->id}},'two','tr',this.value,this.id)">
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            <input type="text" readonly value="{{$unidad->three}}" class="text-center width_inputs" id="three_tr_{{$unidad->id}}" name="three_tr_{{$unidad->id}}" onclick="disabled_input(this.id)" onchange="edit_unidad({{$unidad->id}},'three','tr',this.value,this.id)">
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            <input type="text" readonly value="{{$unidad->four}}" class="text-center width_inputs" id="four_tr_{{$unidad->id}}" name="four_tr_{{$unidad->id}}" onclick="disabled_input(this.id)" onchange="edit_unidad({{$unidad->id}},'four','tr',this.value,this.id)">
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            <input type="text" readonly value="{{$unidad->five}}" class="text-center width_inputs" id="five_tr_{{$unidad->id}}" name="five_tr_{{$unidad->id}}" onclick="disabled_input(this.id)" onchange="edit_unidad({{$unidad->id}},'five','tr',this.value,this.id)">
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            <input type="text" readonly value="{{$unidad->six}}" class="text-center width_inputs" id="six_tr_{{$unidad->id}}" name="six_tr_{{$unidad->id}}" onclick="disabled_input(this.id)" onchange="edit_unidad({{$unidad->id}},'six','tr',this.value,this.id)">
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            <input type="text" readonly value="{{$unidad->seven}}" class="text-center width_inputs" id="seven_tr_{{$unidad->id}}" name="seven_tr_{{$unidad->id}}" onclick="disabled_input(this.id)" onchange="edit_unidad({{$unidad->id}},'seven','tr',this.value,this.id)">
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            <input type="text" readonly value="{{$unidad->eight}}" class="text-center width_inputs" id="eight_tr_{{$unidad->id}}" name="eight_tr_{{$unidad->id}}" onclick="disabled_input(this.id)" onchange="edit_unidad({{$unidad->id}},'eight','tr',this.value,this.id)">
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            <input type="text" readonly value="{{$unidad->periodo}}" class="text-center width_inputs" id="periodo_tr_{{$unidad->id}}" name="periodo_tr_{{$unidad->id}}" onclick="disabled_input(this.id)" onchange="edit_unidad({{$unidad->id}},'eight','tr',this.value,this.id)">
                        </td>
                </tr>

                @endforeach

        </tbody>
    </table>
</div>
