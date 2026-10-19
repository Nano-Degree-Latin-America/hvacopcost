<link rel="stylesheet" href="{{asset("assets/css/simulaciones.css")}}">

<div id="div_left_simulaciones" class="w-full h-100 ml-12 grid md:grid-cols-2 sm:grid-cols-1">
    {{-- <div id="space" class="w-1/4 hidden">
            &nbsp;
    </div> --}}
    {{-- <div id="eslogan" style="margin-top:13rem;margin-left:18rem;" class="w-full grid text-4xl text-center font-arial-narrow"> --}}
    <div id="eslogan" class="w-full h-1/2 grid justify-items-center mx-5 mt-8 font-arial-narrow text-4xl">
        {{-- <h2 style="color:#000;">Comparando Soluciones para <br> la Optimización</h2>
        <h2 class="font-bold mt-4" style="color:#000;font-size:4rem;">Energética y Financiera</h2>
        <h2 class="mt-4" style="color:#000;" >de Proyectos de Sistemas de</h2>
        <h2 class="font-bold mt-4" style="color:#000;font-size:5rem;"></p>HVAC</h2> --}}
        <label class="2xl:text-4xl xl:text-4xl lg:text-4xl md:text-3xl sm:text-xl xs:text-md font-bold text-center leading-none">SOFTWARE DE CÁLCULO
        <br>
        ENERGÉTICO Y FINANCIERO DE</label>
        <label class="2xl:text-6xl xl:text-6xl lg:text-5xl md:text-4xl sm:text-2xl xs:text-lg font-bold text-center">PROYECTOS HVAC</label>
    </div>
</div>


{{-- simulacionees buttons --}}
{{-- @include('simulaciones_index') --}}
<div id="simulaciones" style="" class="grid">
        @include('simulaciones_index')
</div>

{{-- calculos Energético y Financiero Proyectos form --}}
{{-- formulario de proyecto nuevo y retrofit --}}
<div id="ene_fin_pro_form_project" class="hidden flex justify-center w-full">
     @include('ene_fin_pro_hvac.form_ene_fin_pro_hvac')
</div>

{{-- calculos precios hvac form --}}
{{-- formulario de ventas --}}
<div id="mantenimiento_form_project" class="hidden">
    @include('mantenimiento.mantenimiento_form_project')
</div>


