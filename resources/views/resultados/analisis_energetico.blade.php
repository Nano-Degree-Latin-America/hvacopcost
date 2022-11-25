                        <div class="w-full flex justify-center">
                            <div class="w-3/4 my-3 ">
                                <div class="grid bg-gray-200 rounded-md shadow-xl"> <?php  $unidad_area=$results->unidad_area($id_project) ?>
                                    <div class="w-full flex justify-center text-white bg-orange-500 rounded-md p-3">
                                        <label class="font-bold text-white text-2xl font-roboto text-3xl">RESULTADOS ANÁLISIS ENERGÉTICO</label>
                                    </div>


                                    <div class="w-full flex justify-center m-1 " >
                                        <div class="flex w-1/3 justify-start">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Nombre:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{substr($tar_ele->name, 0, 15)}} </label>
                                            </div>
                                        </div>
                                        <div class="flex w-1/4  justify-start">
                                            <div class="mr-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">País:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->region}}</label>
                                            </div>
                                        </div>
                                        <div class="flex w-1/3  justify-start">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Ciudad: </label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->ciudad}}</label>
                                            </div>
                                        </div>
                                        <div class="flex w-1/3  justify-start">
                                            <div class="mr-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Categoría Edificio:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->cad_edi}}</label>
                                            </div>
                                        </div>

                                        <div class="flex w-1/5 justify-start">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Área:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->area}}
                                                    @if ($tar_ele->unidad == 'mc')
                                                        m²
                                                    @endif

                                                    @if ($tar_ele->unidad == 'ft')
                                                    ft²
                                                    @endif
                                            </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="w-full flex justify-start m-1" >
                                        <div class="flex w-2/5  justify-start">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Tipo Edificio:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->tipo_edi}}</label>
                                            </div>
                                        </div>


                                        <div class="flex w-auto justify-start">
                                            <div class="ml-3">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Horas Enfriamiento Anual:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->coolings_hours}}</label>
                                            </div>
                                        </div>
                                        <div class="flex w-1/4 justify-start ml-10 pl-1">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Tarifa Elécrtica:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->costo_elec}} $/Kwh</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-2 mb-3 mx-1 border-2 border-blue-900 rounded-md">

                                    {{--  --}}
                                        <div class="w-full flex justify-center my-3 " >
                                            {{-- @foreach ($results as $solution)


                                            @if ($solution->num_enf == 1) --}}
                                                <div class="grid w-1/3">

                                                <div class="flex w-full ">
                                                        <div class="grid w-full mx-3">

                                                            <div class="flex justify-center w-full bg-blue-800 rounded-md p-2">
                                                                <label class="text-white font-bold text-4xl font-roboto">Solución Base</label>
                                                            </div>

                                                            <div class="grid justify-center">

                                                                @if ($result1 ==! null)
                                                                <?php  $sumaopex_1=$smasolutions->sumaopex($id_project,$result1->num_enf) ?>
                                                                <?php  $sumacap_term_1=$smasolutions->sumacap_term($id_project,$result1->num_enf) ?>
                                                                <?php  $unid_med_1=$smasolutions->unid_med($id_project,$result1->num_enf) ?>
                                                                @elseif($result1 === null)
                                                                <?php $sumaopex_1=0?>
                                                               <?php $sumacap_term_1=0?>
                                                               <?php $unid_med_1=""?>
                                                                @endif

                                                                @if ($unid_med_1 !== "")
                                                                    <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label>
                                                                    @if (strlen($sumacap_term_1) >= 15)
                                                                    <p class="text-blue-800 font-bold text-4xl font-roboto uppercase text-center">{{$sumacap_term_1}} {{$unid_med_1->unid_med}} </p>
                                                                    @endif

                                                                    @if (strlen($sumacap_term_1) < 15)
                                                                    <p class="text-blue-800 font-bold text-5xl font-roboto uppercase text-center">{{$sumacap_term_1}} {{$unid_med_1->unid_med}} </p>
                                                                    @endif

                                                                @endif

                                                                @if ($unid_med_1 === "")
                                                                 <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_1}} {{$unid_med_1}} </p>
                                                                @endif
                                                            </div>

                                                            <div class="grid justify-items-center">
                                                                <label class="font-bold font-roboto text-2xl mt-3">Consumo Anual (OPEX)</label>
                                                               <div class="flex w-full justify-center">
                                                                <p class="text-blue-800 font-bold text-5xl font-roboto">{{number_format($sumaopex_1/$tar_ele->costo_elec)}}</p><b class="text-blue-800 font-bold text-3xl font-roboto mt-5">Kw/hr</b>
                                                               </div>
                                                            </div>

                                                        </div>
                                                </div>
                                            </div>
                                            {{-- @endif
                                            @endforeach --}}


                                            <div class="grid w-1/3">

                                                <div class="flex w-full ">
                                                        <div class="grid w-full mx-3">

                                                            <div class="w-full bg-blue-500 rounded-md p-2 text-center">
                                                                <label class="text-white font-bold text-4xl font-roboto" for="">Solución A</label>
                                                            </div>


                                                            <div class="grid justify-center text-center">

                                                                @if ($result2 ==! null)
                                                                <?php  $sumaopex_2=$smasolutions->sumaopex($id_project,$result2->num_enf) ?>
                                                                <?php  $sumacap_term_2=$smasolutions->sumacap_term($id_project,$result2->num_enf) ?>
                                                                <?php  $unid_med_2=$smasolutions->unid_med($id_project,$result2->num_enf) ?>
                                                                @elseif($result2 === null)
                                                                <?php $sumaopex_2=0?>
                                                               <?php $sumacap_term_2=0?>
                                                               <?php $unid_med_2=""?>
                                                                @endif

                                                                @if ($unid_med_2 !== "")
                                                                <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_2}} {{$unid_med_2->unid_med}} </p>
                                                                @endif

                                                                @if ($unid_med_2 === "")
                                                                <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_2}} {{$unid_med_2}} </p>
                                                                @endif
                                                            </div>

                                                            <div class="grid justify-items-center">
                                                                <label class="font-bold font-roboto text-2xl mt-3">Consumo Anual (OPEX)</label>
                                                               <div class="flex w-full justify-center">
                                                                <p class="text-blue-800 font-bold text-5xl font-roboto">{{number_format($sumaopex_2/$tar_ele->costo_elec)}}</p><b class="text-blue-800 font-bold text-3xl font-roboto mt-5">Kw/hr</b>
                                                               </div>
                                                            </div>

                                                        </div>
                                                </div>
                                            </div>

                                            <div class="grid w-1/3">

                                                <div class="flex w-full ">
                                                        <div class="grid w-full mx-3">

                                                            <div class="w-full bg-blue-500 rounded-md p-2 text-center">
                                                                <label class="text-white font-bold text-4xl font-roboto" for="">Solución B</label>
                                                            </div>


                                                            <div class="grid justify-center text-center">

                                                                @if ($result3 ==! null)
                                                                <?php  $sumaopex_3=$smasolutions->sumaopex($id_project,$result3->num_enf) ?>
                                                                <?php  $sumacap_term_3=$smasolutions->sumacap_term($id_project,$result3->num_enf) ?>
                                                                <?php  $unid_med_3=$smasolutions->unid_med($id_project,$result3->num_enf) ?>
                                                                @elseif($result3 === null)
                                                                <?php $sumaopex_3=0?>
                                                               <?php $sumacap_term_3=0?>
                                                               <?php $unid_med_3=""?>
                                                                @endif

                                                                @if ($unid_med_3 !== "")
                                                                <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_3}} {{$unid_med_3->unid_med}} </p>
                                                                @endif

                                                                @if ($unid_med_3 === "")
                                                                <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_3}} {{$unid_med_3}} </p>
                                                                @endif
                                                            </div>

                                                            <div class="grid justify-items-center">
                                                                <label class="font-bold font-roboto text-2xl mt-3">Consumo Anual (OPEX)</label>
                                                               <div class="flex w-full justify-center">
                                                                <p class="text-blue-800 font-bold text-5xl font-roboto">{{number_format($sumaopex_3/$tar_ele->costo_elec)}}</p><b class="text-black font-bold text-3xl font-roboto mt-5 ml-2">Kw/hr</b>
                                                               </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl">
                                        <div class="flex w-full justify-center">
                                            <label class="text-blue-800 text-[18px] font-roboto font-bold text-blue-900 text-4xl">Consumo de Energía HVAC por Área</label>
                                        </div>



                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">

                                            @if ($result1 ==! null)
                                            <?php  $result_area_1=$results->result_area($id_project,1,$sumaopex_1,$tar_ele->costo_elec) ?>
                                            <?php  $unidad_area=$results->unidad_area($id_project,1,$sumaopex_1,$tar_ele->costo_elec) ?>
                                            <div class="flex justify-center w-1/3 ">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                    @if (strlen($result_area_1) >= 19)
                                                <b class="text-[24px] text-green-500 font-roboto text-6xl">${{number_format($result_area_1, 2)}} /
                                                    @if ($unidad_area == 'mc')
                                                    m²
                                                    @endif

                                                    @if ($unidad_area == 'ft')
                                                    ft²
                                                    @endif
                                                </b>
                                                     @endif

                                                     @if (strlen($result_area_1) < 19)
                                                <b class="text-[24px] text-green-500 font-roboto text-6xl">${{number_format($result_area_1, 2)}} /
                                                    @if ($unidad_area == 'mc')
                                                    m²
                                                @endif

                                                @if ($unidad_area == 'ft')
                                                ft²
                                                @endif
                                                </b>
                                                     @endif
                                                </div>
                                            </div>
                                            @else
                                            <div class="flex justify-center w-1/3 mx-20 px-5">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b class="text-[24px] text-green-500 font-roboto text-6xl">$0 /
                                                    @if ($unidad_area == 'mc')
                                                    m²
                                                    @endif

                                                    @if ($unidad_area == 'ft')
                                                    ft²
                                                    @endif
                                                </b>
                                                </div>
                                            </div>
                                            @endif

                                            @if ($result2 ==! null)
                                            <?php  $result_area_2=$results->result_area($id_project,2,$sumaopex_2,$tar_ele->costo_elec) ?>
                                            <div class="flex justify-center w-1/3 ">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                    @if (strlen($result_area_2) >= 19)
                                                    <b class="text-[24px] text-green-500 font-roboto text-6xl">${{number_format($result_area_2, 2)}} /
                                                     @if ($unidad_area == 'mc')
                                                    m²
                                                    @endif

                                                    @if ($unidad_area == 'ft')
                                                    ft²
                                                    @endif
                                                    </b>
                                                    @endif

                                                    @if (strlen($result_area_2) < 19)
                                                    <b class="text-[24px] text-green-500 font-roboto text-6xl">${{number_format($result_area_2, 2)}} /
                                                     @if ($unidad_area == 'mc')
                                                    m²
                                                    @endif

                                                    @if ($unidad_area == 'ft')
                                                    ft²
                                                    @endif
                                                    </b>
                                                    @endif
                                                </div>
                                            </div>
                                            @else
                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b class="text-[24px] text-green-500 font-roboto text-6xl">$0 /
                                                    @if ($unidad_area == 'mc')
                                                    m²
                                                    @endif

                                                    @if ($unidad_area == 'ft')
                                                    ft²
                                                    @endif

                                                </b>
                                                </div>
                                            </div>
                                            @endif

                                            @if ($result3 ==! null)
                                            <?php  $result_area_3=$results->result_area($id_project,3,$sumaopex_3,$tar_ele->costo_elec) ?>
                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                    @if (strlen($result_area_3) >= 19)
                                                        <b class="text-[24px] text-green-500 font-roboto text-6xl">${{number_format($result_area_3, 2)}} /
                                                         @if ($unidad_area == 'mc')
                                                    m²
                                                    @endif

                                                    @if ($unidad_area == 'ft')
                                                    ft²
                                                    @endif</b>
                                                     @endif

                                                     @if (strlen($result_area_3) < 19)
                                                     <b class="text-[24px] text-green-500 font-roboto text-6xl">${{number_format($result_area_3, 2)}} /
                                                     @if ($unidad_area == 'mc')
                                                    m²
                                                    @endif

                                                    @if ($unidad_area == 'ft')
                                                    ft²
                                                    @endif</b>
                                                     @endif
                                                </div>
                                            </div>
                                            @else
                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b class="text-[24px] text-green-500 font-roboto text-6xl">$0 /
                                                     @if ($unidad_area == 'mc')
                                                    m²
                                                    @endif

                                                    @if ($unidad_area == 'ft')
                                                    ft²
                                                    @endif
                                                </b>
                                                </div>
                                            </div>
                                            @endif

                                        </div>

                                    </div>
                                    <?php  $results=$results->results($id_project) ?>
                                    <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl">
                                        <div class="flex w-full justify-center mb-3">
                                            <label class="text-blue-800 text-[18px] font-roboto font-bold text-blue-900 text-4xl">Ahorro Anual Energía – Diferencia entre Soluciones (Kw/hr año)</label>
                                        </div>
                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                            @if (count($results)>1)

                                            <div class="flex justify-center w-full">
                                            @foreach ($results as $solution)
                                                @if (count($results) == 1)

                                                @endif

                                                @if (count($results) == 2)
                                                @if ($solution->num_enf == 1)
                                                <?php  $dif_1=$smasolutions->dif_1($solution->id_project,count($results),$tar_ele->costo_elec) ?>
                                                <div class="grid w-1/2 justify-center text-[24px] gap-x-4">
                                                    <div class="grid w-full  justify-center">
                                                    <b class="text-blue-800 mr-1 font-roboto text-3xl">Solución  Base v/s A </b>
                                                    </div>
                                                    <div class="flex justify-center w-full">
                                                    <b class="text-[24px] text-green-500 font-roboto text-6xl">{{number_format($dif_1)}} </b>
                                                    </div>
                                                </div>

                                                <div class="grid w-1/2 justify-center text-[24px] m-1 gap-x-4">
                                                    <div class="grid w-full  justify-center">
                                                    <b class="text-blue-800 mr-1 font-roboto text-3xl">Solución  Base v/s A </b>
                                                    <b class="text-[24px] text-green-500 font-roboto text-6xl text-center">0 </b>
                                                    </div>
                                                </div>
                                                @endif
                                                @endif



                                                @if (count($results) == 3)
                                                    @if ($solution->num_enf == 1)
                                                    <?php  $dif_1=$smasolutions->dif_1($solution->id_project,count($results),$tar_ele->costo_elec) ?>
                                                    <div class="w-1/2 grid w-full justify-center text-[24px] gap-x-4">
                                                        <div class="flex justify-center w-full">
                                                            <b class="text-blue-800 mr-1 font-roboto text-3xl">Solución  Base v/s A </b>
                                                            </div>
                                                        <div class="flex justify-center w-full">
                                                            <b class="text-[24px] text-green-500 font-roboto text-6xl">{{number_format($dif_1)}}</b> <b class="text-3xl mt-3 text-green-500 font-roboto ml-1"></b>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if ($solution->num_enf == 2)
                                                    <?php  $dif_2=$smasolutions->dif_2($solution->id_project,count($results),$tar_ele->costo_elec) ?>
                                                    <div class="w-1/2 grid w-full justify-center text-[24px]  gap-x-4">
                                                        <div class="flex w-full justify-center">
                                                        <b class="text-blue-800 mr-1 font-roboto text-3xl">Solución  Base v/s B </b>
                                                        </div>
                                                        <div class="flex w-full justify-center">
                                                            <b class="text-[24px] text-green-500 font-roboto text-6xl">{{number_format($dif_2)}}</b> <b class="text-3xl mt-3 text-green-500 font-roboto ml-1"></b>
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endif
                                                @endforeach
                                            </div>
                                            @endif

                                            @if (count($results)==1)

                                            @foreach ($results as $solution)
                                            <div class="flex justify-center w-full">


                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b class="text-blue-800 mr-1 font-roboto text-2xl mt-5">Solución  Base v/s A </b><b class="text-[24px] text-green-500 font-roboto text-5xl">0 Kw/hr año</b>
                                                </div>

                                                    <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                    <b class="text-blue-800 mr-1 font-roboto text-2xl mt-5">Solución  Base v/s B </b><b class="text-[24px] text-green-500 font-roboto text-5xl">0 Kw/hr año</b>
                                                    </div>
                                            </div>
                                             @endforeach
                                            @endif

                                        </div>
                                    </div>

                                </div>
                            </div>
                              {{-- espacio --}}
                              <div class="grid w-full justify-items-center mt-8s rounded-md  p-10">

                            </div>
                             {{-- espacio --}}
