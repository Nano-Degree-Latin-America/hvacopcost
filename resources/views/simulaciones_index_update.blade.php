<div class="col-5 ml-5 xl:ml-0 lg:ml-0 md:ml-0 lg:sm-0 h-full justify-items-center">
    <div class="margin-title-top-simulaciones">
        <label style=" text-shadow: 2px 2px 4px #a9a9b9 ;" class="title_index font-roboto drop-shadow-lg font-bold leading-tight" for="">{{ __('index.titulo1_simulaciones') }} <br> {{ __('index.titulo2_simulaciones') }}
        </label>
    </div>

    <div style="margin-top:50px;" class="w-full flex justify-center">
        <div style="width:70%" class="grid gap-y-5">
            <div class="grid">
                <div class="flex w-full justify-start">
                    <label for=""></label>
                    <label class="title_simulaciones_index font-roboto drop-shadow-lg font-bold leading-tight" for="">{{ __('index.eneretico_financiero_projectos_hvac') }}
                    </label>
                </div>
                <div class="w-full flex justify-center gap-x-3">
                    <button  onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" style="background-color:#1B17BB;width: 80%;" type="button" class="py-2 px-6 rounded-lg shadow-sm text-center text-white hover_button_blue text-2xl font-roboto ">{{ __('index.nuevo') }}</button>
                    <button  onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" style="background-color:#1B17BB;width: 80%;" type="button" class="py-2 px-6 rounded-lg shadow-sm text-center text-white hover_button_blue text-2xl font-roboto ">{{ __('index.retrofit') }}</button>
                    <button style="width: 80%;" type="button" class="bg-gray-500 border-2 border-color-inps focus:outline-none  py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-gray-800 text-xl font-roboto ">{{ __('index.chillers') }}</button>
                </div>
            </div>

            <div class="grid">
                <div class="flex w-full justify-start">
                    <label for=""></label>
                    <label class="title_simulaciones_index font-roboto drop-shadow-lg font-bold leading-tight" for="">{{ __('index.calculo_precios_havc') }}
                    </label>
                </div>
                <div class="w-full flex justify-center gap-x-3">
                    @if (Auth::user()->tipo_user == 5)
                    <button  onclick="check_form_proy('man','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" style="width: 80%;" type="button" class="focus:outline-none bg-gray-500 border-2 border-color-inps py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-gray-800 text-2xl font-roboto ">{{ __('index.mantenimiento_index') }}</button>
                    @endif

                    @if (Auth::user()->tipo_user != 5)
                    <button  {{-- onclick="check_form_proy('man','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" --}} style="width: 80%;" type="button" class="focus:outline-none bg-gray-500 border-2 border-color-inps py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-gray-800 text-2xl font-roboto ">{{ __('index.mantenimiento_index') }}</button>
                    @endif
                    <button style="width: 80%;" type="button" class="focus:outline-none bg-gray-500 border-2 border-color-inps py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-gray-800 text-2xl font-roboto ">{{ __('index.servicios') }}</button>
                    <button style="width: 80%;" type="button" class="focus:outline-none bg-gray-500 border-2 border-color-inps py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-gray-800 text-2xl font-roboto ">{{ __('index.proyectos') }}</button>
                </div>
            </div>

            <div class="grid">
                <div class="flex w-full justify-start">
                    <label for=""></label>
                    <label class="title_simulaciones_index font-roboto drop-shadow-lg font-bold leading-tight" for="">{{ __('index.cargas_termicas') }}
                    </label>
                </div>
                <div class="w-full flex justify-center gap-x-3">
                    <button style="width: 80%;" type="button" class="focus:outline-none bg-gray-500 border-2 border-color-inps py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-gray-800 text-2xl font-roboto ">{{ __('index.metodo_rts') }}</button>
                    <button style="width: 80%;" type="button" class="focus:outline-none bg-gray-500 border-2 border-color-inps py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-gray-800 text-2xl font-roboto ">{{ __('index.residencial') }}</button>
                    <div style="width:80%;">

                    </div>
                </div>
            </div>

            <div class="grid">
                <div class="flex w-full justify-start">
                    <label for=""></label>
                    <label class="title_simulaciones_index font-roboto drop-shadow-lg font-bold leading-tight" for="">{{ __('index.formulas_calculos__rapidos') }}
                    </label>
                </div>
                <div class="w-full flex justify-center gap-x-3">
                    <button style="width: 80%;" type="button" class="focus:outline-none bg-gray-500 border-2 border-color-inps py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-gray-800 text-2xl font-roboto ">{{ __('index.equivalencia') }}</button>
                    <button style="width: 80%;" type="button" class="focus:outline-none bg-gray-500 border-2 border-color-inps py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-gray-800 text-2xl font-roboto ">{{ __('index.ingenieria') }}</button>
                    <div style="width:80%;">

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




