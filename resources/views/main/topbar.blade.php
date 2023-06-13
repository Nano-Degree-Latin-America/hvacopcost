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

         <div class="col-4 flex justify-end gap-x-3">

            @if (Auth::user()->tipo_user == 5)
            <button class="text_butons_top ml-5 mt-2 button-size  bg-blue-600 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600" onclick="window.location.href='empresas'"><p class="text_butons_top">Admin</p></button>
            @endif

         {{--     <a href="#"><img class="header" id="logoDesprosoft" id="logoDesprosoft" src="{{asset('assets/images/logos/sarsoftware.png')}}" alt="sarsoftware"></a> --}}
         @if (Request::path() == 'home')
         <button class="text_butons_top mt-2 button-size  bg-blue-600 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600" onclick="window.location.href='mis_projectos'"><p class="text_butons_top">Mis Proyectos</p></button>
         @endif

         @if (Request::path() == 'mis_projectos' || Request::path() == 'resultados')
         <button class="text_butons_top mt-2 button-size  bg-blue-600 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600" onclick="window.location.href='home'"><p class="text_butons_top">Nuevo Proyecto</p></button>
         @endif

         <a class="text_butons_top mt-2 button-size bg-blue-600 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600"  href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                <button class="">
                    Log Out
                    </button>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
         </div>
     </div>
     <style>


@media (min-width: 380px) {
            .text_butons_top{
                font-size: 10px;
            }
            .button-size{
                padding: .52rem;
            }
 }

 @media (min-width: 400px) {
            .text_butons_top{
                font-size: 80%;
            }
            .button-size{
                padding: .55rem
            }

 }

 @media (min-width: 750px) {
            .text_butons_top{
                font-size: 80%;
            }
            .button-size{
                padding: .55rem
            }

 }

 @media (min-width: 780px) {
            .text_butons_top{
                font-size: 80%;
            }
            .button-size{
                padding: .55rem
            }

 }

 @media (min-width: 790px) {
            .text_butons_top{
                font-size: 80%;
            }
            .button-size{
                padding: .55rem
            }

 }

 @media (min-width: 800px) {
            .text_butons_top{
                font-size: 85%;
            }
            .button-size{
                padding: .58rem
            }

 }

 @media (min-width: 850px) {
            .text_butons_top{
                font-size: 85%;
            }
            .button-size{
                padding: .58rem
            }

 }

 @media (min-width: 880px) {
            .text_butons_top{
                font-size: 85%;
            }
            .button-size{
                padding: .58rem
            }

 }

 @media (min-width: 1020px) {
            .text_butons_top{
                font-size: 100%;
            }
            .button-size{
                padding: .65rem
            }

 }
     </style>
 </header>
