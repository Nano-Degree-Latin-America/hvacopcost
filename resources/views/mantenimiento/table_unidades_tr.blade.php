<div class="w-full">
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
                <th class="p-3 text-left"><span class="text-lg">Editar</span></th>
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
                            {{$unidad->one}}
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            {{$unidad->two}}
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            {{$unidad->three}}
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            {{$unidad->four}}
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            {{$unidad->five}}
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            {{$unidad->six}}
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            {{$unidad->seven}}
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            {{$unidad->eight}}
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            {{$unidad->periodo}}
                        </td>

                        <td class="border-grey-light border hover:bg-gray-100 text-center">
                            <div class="">
                                <button  class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                                    <span class="icon"><i class="text-blue-600 text-3xl far fa-edit hover:text-gray-500"></i></span>
                                </button>
                            </div>
                        </td>
                </tr>

                @endforeach

        </tbody>
    </table>
</div>
