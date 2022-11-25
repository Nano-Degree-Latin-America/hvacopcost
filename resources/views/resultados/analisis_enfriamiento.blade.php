<div class="w-full flex justify-center"> <?php  $unidad_area=$results->unidad_area($id_project) ?>
    <div class="w-3/4">
        <div class="grid my-3 bg-gray-200 rounded-md shadow-xl">
            <div class="w-full flex justify-center text-white bg-orange-500 rounded-md p-3">
                <label  class="font-bold text-white text-3xl font-roboto">ANÁLISIS ENERGÉTICO - ENFRIAMIENTO</label>
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
            <?php  $solutions=$solutions->solutions($id_project) ?>

            <div class="grid">
                {{-- 1 --}}
                <div class="w-full flex justify-center">
                    @foreach ($solutions as $solution)
                        @if ($solution->num_sol == 1)
                            <div class="grid w-1/3 mx-1 ">

                                <div class="flex">
                                    <div class="w-full">

                        {{-- ----DIV --}}
                                @if ($solution->num_enf == 1)
                                <div class="w-full bg-blue-800 rounded-md p-2 text-center">
                                <label class="text-white font-bold text-4xl font-roboto" for="">Solución Base</label>
                                @endif

                                @if ($solution->num_enf == 2 || $solution->num_enf == 3)
                                <div class="w-full bg-blue-500 rounded-md p-2 text-center">
                                    @if ($solution->num_enf == 2 )
                                    <label class="text-white font-bold text-4xl font-roboto" for="">Solución A</label>
                                    @endif

                                    @if ($solution->num_enf == 3 )
                                    <label class="text-white font-bold text-4xl font-roboto" for="">Solución B</label>
                                    @endif
                                @endif

                                  </div>
                        {{-- ----DIV --}}
                                </div>
                            </div>

                            {{-- cuerpo --}}
                            <div class="mx-5 mb-3">
                                <div class="w-full flex">
                                    <div class="w-2/5 flex justify-start">
                                        <label class="text-blue-900 font-bold font-roboto" for="">Capacidad Térmica</label>
                                    </div>
                                    <div class="ml-2 w-2/5 flex justify-start">
                                        <label  class="uppercase font-roboto text-blue-600 font-bold" for="">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label>
                                    </div>
                                </div>

                                <div class="w-full flex justify-start">
                                    <div class="w-2/5 flex justify-start">
                                        <label class="text-blue-900 font-bold font-roboto" for="">SEER</label>
                                    </div>
                                    <div class="ml-2 w-2/5 flex justify-start">
                                        <label class="font-roboto text-blue-600 font-bold" for="">{{$solution->eficencia_ene_cant}}  </label>
                                    </div>
                                </div>

                                <div class="w-full flex">
                                    <div class="">
                                        <label class="text-blue-900 font-bold font-roboto" for="">Sistemas HVAC</label>
                                    </div>

                                </div>

                                <div class="w-full flex">
                                    <div class="w-2/5 flex ">
                                        <p class="text-blue-900  text-justify mr-10 font-roboto font-bold" for="">Equipos HVAC</p>
                                    </div>
                                    <div class="ml-2 w-2/5">
                                        <p class="flex text-blue-600 justify-start font-roboto font-bold" for="">
                                            @if ($solution->unidad_hvac == 1)
                                            Paquetes (RTU)
                                            @endif
                                            @if ($solution->unidad_hvac == 2)
                                            Split
                                            @endif
                                            @if ($solution->unidad_hvac == 3)
                                            VRF No Ductados
                                            @endif
                                            @if ($solution->unidad_hvac == 4)
                                            VRF Ductados
                                            @endif
                                            @if ($solution->unidad_hvac == 5)
                                            PTAC
                                            @endif
                                            @if ($solution->unidad_hvac == 6)
                                            WSHP
                                            @endif
                                            @if ($solution->unidad_hvac == 7)
                                            Minisplit Inverter
                                            @endif
                                        </p>
                                    </div>

                                </div>

                                <div class="w-full flex">
                                    <div class="w-2/5 flex ">
                                        <p class="text-blue-900 text-justify mr-10 font-roboto font-bold" for="">Tipo Equipo</p>
                                    </div>
                                    <div class="ml-2 w-2/5">
                                        <p class="text-blue-600 flex justify-start font-roboto font-bold" for="">
                                            @if ($solution->tipo_equipo == 'basico')
                                            Básico
                                            @endif

                                            @if ($solution->tipo_equipo == 'c_economizador')
                                            c/ Economizador
                                            @endif

                                            @if ($solution->tipo_equipo == 'manejadora')
                                            Manejadora
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil')
                                            Fancoil
                                            @endif

                                            @if ($solution->tipo_equipo == 'ca_pi_te')
                                            Cassette y Piso Techo
                                            @endif

                                            @if ($solution->tipo_equipo == 'fa_man')
                                            Fancoils y Manejadoras
                                            @endif

                                            @if ($solution->tipo_equipo == 'est_ptac')
                                            Estándar
                                            @endif

                                            @if ($solution->tipo_equipo == 'est_wshp')
                                            Estándar
                                            @endif

                                            @if ($solution->tipo_equipo == 'pa_pi_te')
                                            Pared - Piso - Techo
                                            @endif
                                        </p>
                                    </div>

                                </div>

                                <div class="w-full flex">
                                    <div class="w-2/5 flex ">
                                        <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Tipo Diseño</p>
                                    </div>
                                    <div class="ml-2 w-2/5">
                                        <p class="text-blue-600 text-left font-bold font-roboto" for="">
                                            {{$solution->name_disenio}}
                                        </p>
                                    </div>

                                </div>

                                <div class="w-full flex">
                                    <div class="w-2/5 flex ">
                                        <p class="text-blue-900 text-justify mr-10 font-roboto font-bold" for="">Tipo Control</p>
                                    </div>
                                    <div class="ml-2 w-1/2">
                                        <p class="text-blue-600 text-left font-bold  font-roboto" for="">
                                            {{$solution->name_t_control}}
                                        </p>
                                    </div>

                                </div> <div class="w-full flex">
                                    <div class="w-2/5 flex ">
                                        <p class="text-blue-900 text-sm text-justify mr-10 font-roboto font-bold" for="">Difusor o Rejilla</p>
                                    </div>
                                    <div class="ml-2 w-2/5">
                                        <p class="text-blue-600  text-left font-bold  font-roboto" for="">
                                            {{$solution->dr_name}}
                                        </p>
                                    </div>

                                </div>
                                {{-- <div class="w-full flex">
                                    <div class="w-1/2 flex ">
                                        <p class="text-blue-900 font-bold   text-justify mr-10" for="">Costo Eléctrico</p>
                                    </div>
                                    <div class="w-1/2">
                                        <p class="text-blue-400  text-justify" for="">
                                            {{$solution->costo_elec}} $/KW
                                        </p>
                                    </div>

                                </div> --}}


                                <div class="w-full flex">
                                    <div class="w-2/5 flex justify-start">
                                        <label class="text-blue-900 font-bold font-roboto" for="">Mantenimiento</label>
                                    </div>
                                    <div class="ml-2 w-2/5 flex justify-start text-left">
                                        <label class="font-roboto text-blue-600 font-bold" for="">{{$solution->mantenimiento}}</label>
                                    </div>
                                </div>

                                <div class="w-full flex">
                                    <div class="w-2/5 flex justify-start">
                                        <label class="text-blue-900 font-bold font-roboto" for="">CAPEX Estimado</label>
                                    </div>
                                    <div class="ml-2 w-2/5 flex justify-start">
                                        <label class="font-roboto text-blue-600 font-bold" for="">${{number_format($solution->val_aprox)}}</label>
                                    </div>
                                </div>
                            </div>
                            {{-- cuerpo --}}
                        </div>
                        @endif
                    @endforeach
                </div>
                    {{-- 1 --}}

                     {{-- 1 --}}
                <div class="w-full flex justify-center">
                    @foreach ($solutions as $solution)
                        @if ($solution->num_sol == 2)
                            <div class="grid w-1/3 mx-1">



                            {{-- cuerpo --}}
                            <div class="mx-5 border-t-2">
                                <div class="w-full flex">
                                    <div class="w-2/5 flex justify-start">
                                        <label class="text-blue-900 font-bold font-roboto" for="">Capacidad Térmica</label>
                                    </div>
                                    <div class="ml-2 w-2/5 flex justify-start">
                                        <label  class="uppercase font-roboto text-blue-600 font-bold" for="">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label>
                                    </div>
                                </div>

                                <div class="w-full flex justify-start">
                                    <div class="w-2/5 flex justify-start">
                                        <label class="text-blue-900 font-bold font-roboto" for="">SEER</label>
                                    </div>
                                    <div class="ml-2 w-2/5 flex justify-start">
                                        <label class="font-roboto text-blue-600 font-bold" for="">{{$solution->eficencia_ene_cant}}  </label>
                                    </div>
                                </div>

                                <div class="w-full flex">
                                    <div class="">
                                        <label class="text-blue-900 font-bold font-roboto" for="">Sistemas HVAC</label>
                                    </div>

                                </div>

                                <div class="w-full flex">
                                    <div class="w-2/5 flex ">
                                        <p class="text-blue-900  text-justify mr-10 font-roboto font-bold" for="">Equipos HVAC</p>
                                    </div>
                                    <div class="ml-2 w-2/5">
                                        <p class="flex text-blue-600 justify-start font-roboto font-bold" for="">
                                            @if ($solution->unidad_hvac == 1)
                                            Paquetes (RTU)
                                            @endif
                                            @if ($solution->unidad_hvac == 2)
                                            Split
                                            @endif
                                            @if ($solution->unidad_hvac == 3)
                                            VRF No Ductados
                                            @endif
                                            @if ($solution->unidad_hvac == 4)
                                            VRF Ductados
                                            @endif
                                            @if ($solution->unidad_hvac == 5)
                                            PTAC
                                            @endif
                                            @if ($solution->unidad_hvac == 6)
                                            WSHP
                                            @endif
                                            @if ($solution->unidad_hvac == 7)
                                            Minisplit Inverter
                                            @endif
                                        </p>
                                    </div>

                                </div>

                                <div class="w-full flex">
                                    <div class="w-2/5 flex ">
                                        <p class="text-blue-900 text-justify mr-10 font-roboto font-bold" for="">Tipo Equipo</p>
                                    </div>
                                    <div class="ml-2 w-2/5">
                                        <p class="text-blue-600 flex justify-start font-roboto font-bold" for="">
                                            @if ($solution->tipo_equipo == 'basico')
                                            Básico
                                            @endif

                                            @if ($solution->tipo_equipo == 'c_economizador')
                                            c/ Economizador
                                            @endif

                                            @if ($solution->tipo_equipo == 'manejadora')
                                            Manejadora
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil')
                                            Fancoil
                                            @endif

                                            @if ($solution->tipo_equipo == 'ca_pi_te')
                                            Cassette y Piso Techo
                                            @endif

                                            @if ($solution->tipo_equipo == 'fa_man')
                                            Fancoils y Manejadoras
                                            @endif

                                            @if ($solution->tipo_equipo == 'est_ptac')
                                            Estándar
                                            @endif

                                            @if ($solution->tipo_equipo == 'est_wshp')
                                            Estándar
                                            @endif

                                            @if ($solution->tipo_equipo == 'pa_pi_te')
                                            Pared - Piso - Techo
                                            @endif
                                        </p>
                                    </div>

                                </div>

                                <div class="w-full flex">
                                    <div class="w-2/5 flex ">
                                        <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Tipo Diseño</p>
                                    </div>
                                    <div class="ml-2 w-2/5">
                                        <p class="text-blue-600 text-left font-bold font-roboto" for="">
                                            {{$solution->name_disenio}}
                                        </p>
                                    </div>

                                </div>

                                <div class="w-full flex">
                                    <div class="w-2/5 flex ">
                                        <p class="text-blue-900 text-justify mr-10 font-roboto font-bold" for="">Tipo Control</p>
                                    </div>
                                    <div class="ml-2 w-1/2">
                                        <p class="text-blue-600 text-left font-bold  font-roboto" for="">
                                            {{$solution->name_t_control}}
                                        </p>
                                    </div>

                                </div> <div class="w-full flex">
                                    <div class="w-2/5 flex ">
                                        <p class="text-blue-900 text-sm text-justify mr-10 font-roboto font-bold" for="">Difusor o Rejilla</p>
                                    </div>
                                    <div class="ml-2 w-2/5">
                                        <p class="text-blue-600  text-left font-bold  font-roboto" for="">
                                            {{$solution->dr_name}}
                                        </p>
                                    </div>

                                </div>
                                {{-- <div class="w-full flex">
                                    <div class="w-1/2 flex ">
                                        <p class="text-blue-900 font-bold   text-justify mr-10" for="">Costo Eléctrico</p>
                                    </div>
                                    <div class="w-1/2">
                                        <p class="text-blue-400  text-justify" for="">
                                            {{$solution->costo_elec}} $/KW
                                        </p>
                                    </div>

                                </div> --}}


                                <div class="w-full flex">
                                    <div class="w-2/5 flex justify-start">
                                        <label class="text-blue-900 font-bold font-roboto" for="">Mantenimiento</label>
                                    </div>
                                    <div class="ml-2 w-2/5 flex justify-start text-left">
                                        <label class="font-roboto text-blue-600 font-bold" for="">{{$solution->mantenimiento}}</label>
                                    </div>
                                </div>

                                <div class="w-full flex">
                                    <div class="w-2/5 flex justify-start">
                                        <label class="text-blue-900 font-bold font-roboto" for="">CAPEX Estimado</label>
                                    </div>
                                    <div class="ml-2 w-2/5 flex justify-start">
                                        <label class="font-roboto text-blue-600 font-bold" for="">${{number_format($solution->val_aprox)}}</label>
                                    </div>
                                </div>
                            </div>
                            {{-- cuerpo --}}
                        </div>
                        @endif
                    @endforeach
                </div>
                    {{-- 1 --}}

                     {{-- 1 --}}
                <div class="w-full flex justify-center">
                    @foreach ($solutions as $solution)
                        @if ($solution->num_sol == 3)
                            <div class="grid w-1/3 mx-1">



                            {{-- cuerpo --}}
                            <div class="mx-5  border-t-2">
                                <div class="w-full flex">
                                    <div class="w-2/5 flex justify-start">
                                        <label class="text-blue-900 font-bold font-roboto" for="">Capacidad Térmica</label>
                                    </div>
                                    <div class="ml-2 w-2/5 flex justify-start">
                                        <label  class="uppercase font-roboto text-blue-600 font-bold" for="">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label>
                                    </div>
                                </div>

                                <div class="w-full flex justify-start">
                                    <div class="w-2/5 flex justify-start">
                                        <label class="text-blue-900 font-bold font-roboto" for="">SEER</label>
                                    </div>
                                    <div class="ml-2 w-2/5 flex justify-start">
                                        <label class="font-roboto text-blue-600 font-bold" for="">{{$solution->eficencia_ene_cant}}  </label>
                                    </div>
                                </div>

                                <div class="w-full flex">
                                    <div class="">
                                        <label class="text-blue-900 font-bold font-roboto" for="">Sistemas HVAC</label>
                                    </div>

                                </div>

                                <div class="w-full flex">
                                    <div class="w-2/5 flex ">
                                        <p class="text-blue-900  text-justify mr-10 font-roboto font-bold" for="">Equipos HVAC</p>
                                    </div>
                                    <div class="ml-2 w-2/5">
                                        <p class="flex text-blue-600 justify-start font-roboto font-bold" for="">
                                            @if ($solution->unidad_hvac == 1)
                                            Paquetes (RTU)
                                            @endif
                                            @if ($solution->unidad_hvac == 2)
                                            Split
                                            @endif
                                            @if ($solution->unidad_hvac == 3)
                                            VRF No Ductados
                                            @endif
                                            @if ($solution->unidad_hvac == 4)
                                            VRF Ductados
                                            @endif
                                            @if ($solution->unidad_hvac == 5)
                                            PTAC
                                            @endif
                                            @if ($solution->unidad_hvac == 6)
                                            WSHP
                                            @endif
                                            @if ($solution->unidad_hvac == 7)
                                            Minisplit Inverter
                                            @endif
                                        </p>
                                    </div>

                                </div>

                                <div class="w-full flex">
                                    <div class="w-2/5 flex ">
                                        <p class="text-blue-900 text-justify mr-10 font-roboto font-bold" for="">Tipo Equipo</p>
                                    </div>
                                    <div class="ml-2 w-2/5">
                                        <p class="text-blue-600 flex justify-start font-roboto font-bold" for="">
                                            @if ($solution->tipo_equipo == 'basico')
                                            Básico
                                            @endif

                                            @if ($solution->tipo_equipo == 'c_economizador')
                                            c/ Economizador
                                            @endif

                                            @if ($solution->tipo_equipo == 'manejadora')
                                            Manejadora
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil')
                                            Fancoil
                                            @endif

                                            @if ($solution->tipo_equipo == 'ca_pi_te')
                                            Cassette y Piso Techo
                                            @endif

                                            @if ($solution->tipo_equipo == 'fa_man')
                                            Fancoils y Manejadoras
                                            @endif

                                            @if ($solution->tipo_equipo == 'est_ptac')
                                            Estándar
                                            @endif

                                            @if ($solution->tipo_equipo == 'est_wshp')
                                            Estándar
                                            @endif

                                            @if ($solution->tipo_equipo == 'pa_pi_te')
                                            Pared - Piso - Techo
                                            @endif
                                        </p>
                                    </div>

                                </div>

                                <div class="w-full flex">
                                    <div class="w-2/5 flex ">
                                        <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Tipo Diseño</p>
                                    </div>
                                    <div class="ml-2 w-2/5">
                                        <p class="text-blue-600 text-left font-bold font-roboto" for="">
                                            {{$solution->name_disenio}}
                                        </p>
                                    </div>

                                </div>

                                <div class="w-full flex">
                                    <div class="w-2/5 flex ">
                                        <p class="text-blue-900 text-justify mr-10 font-roboto font-bold" for="">Tipo Control</p>
                                    </div>
                                    <div class="ml-2 w-1/2">
                                        <p class="text-blue-600 text-left font-bold  font-roboto" for="">
                                            {{$solution->name_t_control}}
                                        </p>
                                    </div>

                                </div> <div class="w-full flex">
                                    <div class="w-2/5 flex ">
                                        <p class="text-blue-900 text-sm text-justify mr-10 font-roboto font-bold" for="">Difusor o Rejilla</p>
                                    </div>
                                    <div class="ml-2 w-2/5">
                                        <p class="text-blue-600  text-left font-bold  font-roboto" for="">
                                            {{$solution->dr_name}}
                                        </p>
                                    </div>

                                </div>
                                {{-- <div class="w-full flex">
                                    <div class="w-1/2 flex ">
                                        <p class="text-blue-900 font-bold   text-justify mr-10" for="">Costo Eléctrico</p>
                                    </div>
                                    <div class="w-1/2">
                                        <p class="text-blue-400  text-justify" for="">
                                            {{$solution->costo_elec}} $/KW
                                        </p>
                                    </div>

                                </div> --}}


                                <div class="w-full flex">
                                    <div class="w-2/5 flex justify-start text-left">
                                        <label class="text-blue-900 font-bold font-roboto" for="">Mantenimiento</label>
                                    </div>
                                    <div class="ml-2 w-2/5 flex justify-start">
                                        <label class="font-roboto text-blue-600 font-bold" for="">{{$solution->mantenimiento}}</label>
                                    </div>
                                </div>

                                <div class="w-full flex">
                                    <div class="w-2/5 flex justify-start">
                                        <label class="text-blue-900 font-bold font-roboto" for="">CAPEX Estimado</label>
                                    </div>
                                    <div class="ml-2 w-2/5 flex justify-start">
                                        <label class="font-roboto text-blue-600 font-bold" for="">${{number_format($solution->val_aprox)}}</label>
                                    </div>
                                </div>
                            </div>
                            {{-- cuerpo --}}
                        </div>
                        @endif
                    @endforeach
                </div>
                    {{-- 1 --}}
            </div>

        </div>
    </div>
</div>
