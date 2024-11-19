@extends('layouts.admin')

@section('content')
  <style>
   .botonF1{
  width:100px;
  height:40px;
  background: #102E52;
  right:0;
  bottom:0;
  top: 10px;
  position:absolute;
  margin-right:30px;
  margin-bottom:16px;
  border:none;
  outline:none;
  color:#FFF;
  border-radius:10px;
  font-size:14px;
  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
  transition:.3s;
  cursor:pointer;
}
span{
    font-size: 14px;
  transition:.5s;
}
.botonF1:hover span{
  transform:rotate(360deg);
}
.botonF1:active{
  transform:scale(1.1);
}

.animacionVer{
  transform:scale(1);
}

.txt-size-p{
    font-size:9px;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid gray;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
  </style>
{{--   @inject('unidades','app\Http\Controllers\UnidadesValoresController') --}}
  <?php
  $idm = App::getLocale();
  ?>
  <div class="my-3 mx-3 font-semibold text-gray-700 flex-1">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
              <svg class="mr-2 w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
              <p class="font-roboto text-[#102E52] text-[25px]">Unidades y Valores</p>

            </a>
          </li>


        </ol>
        <div class="contenedor">
                    <a href="/lo_gout">
                        <button class="botonF1">
                            Cerrar Sesión
                            </button>
                    </a>

                     </div>
      </nav>
</div>
<hr>
<?php
$arry_sistemas = ['','Unidad Paquete (RTU)','Split DX','VRF No Ductados','VRF Ductados','PTAC / VTAC','WSHP','MS Inverter']
?>

  <div class="w-full h-full my-5 mx-1">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <table>
        <tr>
          <th>Sistema Hvac</th>
          <th>Unidad Hvac</th>
          <th>Diseño</th>
          <th>DR</th>
          <th>Ventilación</th>
          <th>Filtración</th>
          <th>Control</th>
         {{--  <th>Mantenimiento</th> --}}
        </tr>
        @for ($i=1;$i < count($arry_sistemas);$i++)
        <tr>
            <td><p class="txt-size-p font-bold">{{$arry_sistemas[$i]}}</p>
            </td>
            <td>
               <div class="grid">
                  @foreach ($unidades as $unidad)
                  @if ($unidad->equipo == $i)
                      <div class="flex gap-x-1">
                          <p class="txt-size-p font-bold">Unidad: {{$unidad->unidad}}</p>,
                          <p class="txt-size-p font-bold text-blue-500">Valor: {{$unidad->valor}}</p>
                         {{--  <p class="txt-size-p font-bold text-blue-500 mt-1">Valor:</p> <input id="{{$unidad->identificador}}_{{$unidad->id}}" name="{{$unidad->identificador}}_{{$unidad->id}}" class="txt-size-p font-bold text-blue-500 w-8" type="text" value="{{$unidad->valor}}"> --}}
                      </div>
                  @endif
                  @endforeach
               </div>
            </td>
            <td>
              <div class="grid">
                  @foreach ($disenos as $diseno)
                  @if ($diseno->id_unidad == $i)
                      <div class="flex gap-x-1">
                          <p class="txt-size-p font-bold">Diseño: {{$diseno->diseno}}</p>,
                          <p class="txt-size-p font-bold text-blue-500">Valor: {{$diseno->valor}}</p>
                      </div>
                  @endif
                  @endforeach
               </div>
            </td>
            <td>
              <div class="grid">
                  @foreach ($drs as $dr)
                  @if ($dr->id_unidad == $i)
                      <div class="flex gap-x-1">
                          <p class="txt-size-p font-bold">Dr: {{$dr->dr}}</p>,
                          <p class="txt-size-p font-bold text-blue-500">Valor: {{$dr->valor}}</p>
                      </div>
                  @endif
                  @endforeach
               </div>
            </td>
            <td>
              <div class="grid">
                  @foreach ($ventilaciones as $ventilacion)
                  @if ($ventilacion->id_unidad == $i)
                      <div class="flex gap-x-1">
                          <p class="txt-size-p font-bold">Ventilación: {{$ventilacion->ventilacion}}</p>,
                          <p class="txt-size-p font-bold text-blue-500">Valor: {{$ventilacion->valor}}</p>
                      </div>
                  @endif
                  @endforeach
               </div>
            </td>
            <td>
              <div class="grid">
                  @foreach ($filtraciones as $filtracion)
                  @if ($filtracion->id_unidad == $i)
                      <div class="flex gap-x-1">
                          <p class="txt-size-p font-bold">Filtracion: {{$filtracion->filtracion}}</p>,
                          <p class="txt-size-p font-bold text-blue-500">Valor: {{$filtracion->valor}}</p>
                      </div>
                  @endif
                  @endforeach
               </div>
            </td>
            <td>
              <div class="grid">
                  @foreach ($controles as $control)
                  @if ($control->id_unidad == $i)
                      <div class="flex gap-x-1">
                          <p class="txt-size-p font-bold">Control: {{$control->control}}</p>,
                          <p class="txt-size-p font-bold text-blue-500">Valor: {{$control->valor}}</p>
                      </div>
                  @endif
                  @endforeach
               </div>
            </td>
            {{-- <td>
                <div class="grid">
                        <div class="flex gap-x-1">
                            <p class="txt-size-p font-bold">Mantenimiento: ASHRAE 180</p>,
                            <p class="txt-size-p font-bold text-blue-500">Valor: -0.1</p>
                        </div>

                        <div class="flex gap-x-1">
                            <p class="txt-size-p font-bold">Deficiente</p>,
                            <p class="txt-size-p font-bold text-blue-500">Valor: 0.11</p>
                        </div>

                        <div class="flex gap-x-1">
                            <p class="txt-size-p font-bold">Sin Mantenimiento</p>,
                            <p class="txt-size-p font-bold text-blue-500"> 0.18</p>
                        </div>
                 </div>
              </td> --}}
          </tr>
        @endfor
        {{-- <tr>
          <td><p class="txt-size-p font-bold">Unidad Paquete (RTU)</p>
          </td>
          <td>
             <div class="grid">
                @foreach ($unidades as $unidad)
                @if ($unidad->equipo == 1)
                    <div class="flex gap-x-1">
                        <p class="txt-size-p font-bold">Unidad: {{$unidad->unidad}}</p>,
                        <p class="txt-size-p font-bold text-blue-500">Valor: {{$unidad->valor}}</p>
                    </div>
                @endif
                @endforeach
             </div>
          </td>
          <td>
            <div class="grid">
                @foreach ($disenos as $diseno)
                @if ($diseno->id_unidad == 1)
                    <div class="flex gap-x-1">
                        <p class="txt-size-p font-bold">Diseño: {{$diseno->diseno}}</p>,
                        <p class="txt-size-p font-bold text-blue-500">Valor: {{$diseno->valor}}</p>
                    </div>
                @endif
                @endforeach
             </div>
          </td>
          <td>
            <div class="grid">
                @foreach ($drs as $dr)
                @if ($dr->id_unidad == 1)
                    <div class="flex gap-x-1">
                        <p class="txt-size-p font-bold">Dr: {{$dr->dr}}</p>,
                        <p class="txt-size-p font-bold text-blue-500">Valor: {{$dr->valor}}</p>
                    </div>
                @endif
                @endforeach
             </div>
          </td>
          <td>
            <div class="grid">
                @foreach ($ventilaciones as $ventilacion)
                @if ($ventilacion->id_unidad == 1)
                    <div class="flex gap-x-1">
                        <p class="txt-size-p font-bold">Ventilación: {{$ventilacion->ventilacion}}</p>,
                        <p class="txt-size-p font-bold text-blue-500">Valor: {{$ventilacion->valor}}</p>
                    </div>
                @endif
                @endforeach
             </div>
          </td>
          <td>
            <div class="grid">
                @foreach ($filtraciones as $filtracion)
                @if ($filtracion->id_unidad == 1)
                    <div class="flex gap-x-1">
                        <p class="txt-size-p font-bold">Filtracion: {{$filtracion->filtracion}}</p>,
                        <p class="txt-size-p font-bold text-blue-500">Valor: {{$filtracion->valor}}</p>
                    </div>
                @endif
                @endforeach
             </div>
          </td>
          <td>
            <div class="grid">
                @foreach ($controles as $control)
                @if ($control->id_unidad == 1)
                    <div class="flex gap-x-1">
                        <p class="txt-size-p font-bold">Control: {{$control->control}}</p>,
                        <p class="txt-size-p font-bold text-blue-500">Valor: {{$control->valor}}</p>
                    </div>
                @endif
                @endforeach
             </div>
          </td>
        </tr> --}}

      </table>
  </div>

<script>

</script>
@endsection
