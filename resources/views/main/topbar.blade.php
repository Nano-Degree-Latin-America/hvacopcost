<header>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
     <div id="slider" class="slider-big">
         <div class="col-4 flex gap-x-3 h-full">
             <img class="my-5" style="max-height: 100px; width:230px;margin-left:4.3rem;" name="logoEmpresa" id="logoEmpresa" src="{{asset('assets/images/Logotipo-HVACOPCOST.png')}}" alt="Nano Degree">
           {{--  <h1 style=" font-size: 4.3rem;" class="text-white font-roboto" >3.0</h1> --}}
        </div>
         <div class=" col-4 flex justify-center" style="line-height: 30px">
             {{-- <a href="{{route('index')}}"><img class="header" id="logoSitio" id="logoSitio" src="assets/images/logos/hvac.png" alt=""></a> --}}

        </div>
 @inject('check_types_p','App\Http\Controllers\IndexController')
 <?php  $check_types_m=$check_types_p->check_p_type_m(Auth::user()->id_empresa); ?>
        <div class="col-4 mt-5 flex justify-end"{{-- class="contenedor" --}}>



        </div>

         <div class="col-4 flex justify-end gap-x-3 mt-5">



            {{-- @if ($check_types_m == 1 )
                @if (Auth::user()->tipo_user == 2 || Auth::user()->tipo_user == 5)
                <button class="text_butons_top ml-5 mt-2 button-size  bg-transparent rounded-md hover:bg-blue-900 text-white font-roboto action:bg-transparent" onclick="window.location.href='configuraciones'"><p class="text_butons_top">Configuraciónes</p></button>
                @endif
             @endif --}}

            @if (Auth::user()->tipo_user == 5)
                <button class="p-1 bg-transparent rounded-md hover:bg-blue-900  font-roboto action:bg-transparent" onclick="window.location.href='/empresas'"><img src="{{asset('/assets/images/admin.png')}}" title="Administrador" style="max-height: 40px; width:40px;"></button>
            @endif

         {{--     <a href="#"><img class="header" id="logoDesprosoft" id="logoDesprosoft" src="{{asset('assets/images/logos/sarsoftware.png')}}" alt="sarsoftware"></a> --}}


            @if (Auth::user()->tipo_user != 3)
                @if (Request::path() == 'home')
                <button class="p-1 bg-transparent rounded-md hover:bg-blue-900 text-white font-roboto action:bg-transparent" onclick="window.location.href='/mis_projectos'"><img src="{{asset('/assets/images/mis_proyectos.png')}}" title="Mis Proyectos" style="max-height: 40px; width:40px;;"></button>
                @endif
            @endif

        @if (Auth::user()->tipo_user == 3)

        @endif

         @if (Request::path() == 'mis_projectos' || Request::path() == 'resultados')
         <button class="text_butons_top mt-2 button-size  bg-transparent rounded-md hover:bg-blue-900 text-white font-roboto action:bg-transparent" onclick="window.location.href='home'"><p class="text_butons_top">{{ __('index.nuevo_projecto') }}</p></button>
         @endif

         <a class="p-1 bg-transparent rounded-md hover:bg-blue-900 text-[#0D08EE] font-roboto action:bg-transparent grid place-content-center"  href="{{ route('cerrar_session') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
               <i title="Cerrar Sesión" class="fas fa-sign-out-alt text-4xl"></i>
            </a>

{{--             @if (Auth::user()->tipo_user == 5)
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn font-roboto">{{ __('index.idioma') }}</button>
                <div id="myDropdown" class="dropdown-content">

                  @if (App::getLocale() == 'es')
                  <a href="{{ url('locale/port')}}" class="font-roboto">Port</a>
                  @endif

                  @if (App::getLocale() == 'port')
                  <a href="{{ url('locale/es')}}" class="font-roboto">Es</a>
                  @endif
                </div>
              </div>
            @endif --}}


              <form id="logout-form" action="{{ route('cerrar_session') }}" method="POST" class="d-none">
                @csrf
              </form>
         </div>
     </div>

 </header>

