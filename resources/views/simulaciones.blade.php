<link rel="stylesheet" href="{{asset("assets/css/simulaciones.css")}}">

<div class=" xl:ml-5 col-6">
     {{-- imagen_ene_fin_proy_hvac --}}
    <div id="img_ene_fin_proy_hvac" class="">
        @include('ene_fin_pro_hvac.mapa_ene_fin_proy_hvac')
    </div>

    {{-- imagen_portada_mantenimiento --}}
    <div id="img_mantenimiento" class="hidden">
        @include('mantenimiento.img_mantenimiento')
    </div>
</div>

{{-- simulacionees buttons --}}
<div id="simulaciones" style="" class="">
        @include('simulaciones_index')
</div>

{{-- calculos Energético y Financiero Proyectos form --}}
{{-- formulario de proyecto nuevo y retrofit --}}
<div id="ene_fin_pro_form_project" class="hidden">
     @include('ene_fin_pro_hvac.form_ene_fin_pro_hvac')
</div>

{{-- calculos precios hvac form --}}
{{-- formulario de ventas --}}
<div id="mantenimiento_form_project" class="hidden">
    @include('mantenimiento.mantenimiento_form_project')
</div>


