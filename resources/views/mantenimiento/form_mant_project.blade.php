<div class="">
    <div class="w-full h-full font-roboto flex ">
        <?php  $module_2=2?>
        <div class="flex w-full gap-x-3 mx-5">

            <div style="width: 29%" class="h-full flex">
                {{-- tarejate sistema existente --}}
                @include('mantenimiento.target_equipo')
            </div>

            <div  style="width: 71%" class="">
                {{-- lista  de equipos --}}
                @include('mantenimiento.table_equipos')
            </div>
           </div>
        </div>
</div>
