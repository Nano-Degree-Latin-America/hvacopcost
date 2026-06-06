<link rel="stylesheet" href="{{asset("assets/css/simulaciones.css")}}">

<div id="div_left_simulaciones" class="grid col-6 justify-items-center">
    <div id="space" class="w-1/4 hidden">
            &nbsp;
    </div>
    <div id="eslogan" style="margin-top:8rem;margin-left:19rem;" class="w-full grid text-5xl text-left font-arial-narrow">
        <h2 style="color:#0D08EE;">Comparando Soluciones para <br> la Optimización</h2>
        <h2 class="font-bold" style="color:#0D08EE;font-size:4rem;">Energética y Financiera</h2>
        <h2 style="color:#0D08EE;" >de Proyectos de Sistemas de</h2>
        <h2 class="font-bold flex" style="color:#0D08EE;font-size:5rem;"></p>HVAC</h2>
    </div>
</div>

{{-- simulacionees buttons --}}
<div id="simulaciones_update" style="" class="hidden">
        @include('simulaciones_index_update')
</div>

{{-- calculos Energético y Financiero Proyectos form --}}
<div id="ene_fin_pro_hvac_update" class="hidden">
     @include('ene_fin_pro_hvac.form_ene_fin_pro_hvac_update')
</div>

{{-- calculos precios hvac form --}}
<div id="mantenimiento_form_project" class="hidden">
    @if ($type_p === 3)
    @include('mantenimiento.mantenimiento_form_project_edit')
    @else
    @include('mantenimiento.mantenimiento_form_project_clean')
    @endif
</div>


