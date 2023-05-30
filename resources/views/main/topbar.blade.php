<header>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
     <div id="slider" class="slider-big">
         <div class="col-4">
             <img class="header" name="logoEmpresa" id="logoEmpresa" src="{{asset('assets/images/Logo-NDL_blanco_marca-r.png')}}" alt="Nano Degree">
         </div>
         <div class=" col-4 flex justify-center" style="line-height: 30px">
             {{-- <a href="{{route('index')}}"><img class="header" id="logoSitio" id="logoSitio" src="assets/images/logos/hvac.png" alt=""></a> --}}
             <a><img src="{{asset('/assets/images/Logotipo-HVACOPCOST_blanco.png')}}" alt="hvacopcost latinoamérica" style="max-height: 100px; width:230px;"></a>

        </div>

        <div class="col-4 mt-5 flex justify-end"{{-- class="contenedor" --}}>



             </div>

         <div class="col-4 mt-3 flex justify-end gap-x-3">

            @if (Auth::user()->tipo_user == 5)
            <button class="ml-5 p-3 bg-blue-600 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600"><a href="empresas">Admin</a></button>
            @endif

         {{--     <a href="#"><img class="header" id="logoDesprosoft" id="logoDesprosoft" src="{{asset('assets/images/logos/sarsoftware.png')}}" alt="sarsoftware"></a> --}}
         @if (Request::path() == 'home')
         <button class="p-3 bg-blue-600 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600"><a href="mis_projectos">Mis Proyectos</a></button>
         @endif

         @if (Request::path() == 'mis_projectos' || Request::path() == 'resultados')
         <button class="p-3 bg-blue-600 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600"><a href="home">Nuevo Proyecto</a></button>
         @endif

         <a class="p-3 bg-blue-600 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600"  href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                <button>
                    Cerrar Sesión
                    </button>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
         </div>
     </div>
 </header>
