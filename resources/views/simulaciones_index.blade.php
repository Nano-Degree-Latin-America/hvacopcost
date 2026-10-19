<div class="w-full h-full grid md:grid-cols-2 sm:grid-cols-1 overflow-y-auto">


    <div class="w-full h-full ml-12">
        <div class="w-100 h-1/2 justify-items-center mx-5 gap-y-5 mt-16 gap-x-2">
            <div class="">
                {{-- <div class="w-full grid justify-center gap-y-8 mt-2 mb-3"> --}}
                    <button  onclick="window.location.href='propiedades';" style="background-color:#FB9804;box-shadow: 0 20px 25px -5px rgba(0, 0, 0, .1), 0 10px 10px -5px rgba(0, 0, 0, 1.04);" type="button" class="w-full py-8 px-8 rounded-lg shadow-xl text-center text-white hover_button_blue text-3xl font-bold font-roboto flex justify-center gap-x-6 mb-6">
                    <label for="" class="">Clientes</label>
                    </button>
                    <button  onclick="window.location.href='dashboard'" style="background-color:#000;box-shadow: 0 20px 25px -5px rgba(0, 0, 0, .1), 0 10px 10px -5px rgba(0, 0, 0, 1.04);" type="button" class="w-full py-8 px-8 rounded-lg shadow-xl text-center text-white hover_button_blue text-3xl font-bold font-roboto flex place-items-center gap-x-6 mb-6">
                    <label for="">Proyecto Nuevo</label><img src="{{asset('/assets/images/p_new.png')}}" style="width: 100px; height:80px;s" alt="">
                    </button>

                    <button  onclick="check_form_proy('pr','display_nuevo_project','display_nuevo_retrofit','display_mant','calcular_p_n','calcular_p_r','store');" style="background-color:#000;box-shadow: 0 20px 25px -5px rgba(0, 0, 0, .1), 0 10px 10px -5px rgba(0, 0, 0, 1.04);" type="button" class="w-full py-8 px-8 rounded-lg shadow-xl text-center text-white hover_button_blue text-3xl font-bold font-roboto flex place-items-center gap-x-6">
                    <label for="">Proyecto Retrofit</label><img src="{{asset('/assets/images/p_nuevo.png')}}" style="width: 100px; height:80px;s" alt="">
                    </button>
                 {{-- </div> --}}
            </div>
        </div>
    </div>
</div>


