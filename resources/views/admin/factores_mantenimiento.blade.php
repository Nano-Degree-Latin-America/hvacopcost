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
  </style>
          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

  <div class="my-3 mx-3 font-semibold text-gray-700 flex-1">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="/home" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
              <svg class="mr-2 w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
              <p class="font-montserrat text-[#102E52] text-[25px]">Factores Mantenimiento</p>

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


  <div class="w-0.8 my-1 mx-5 justify-center">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container mx-auto">
      <div class="flex flex-col">
          <div class="grid gap-y-2 w-full">
              <div class="flex w-full gap-x-3">
                 <div class="w-1/4 bg-gray-100 border-2 border-gray-500">
                    <h1 class="font-bold font-roboto text-xl">Factor Ambiente (FA)</h1>
                    <table id="factor_ambiente_table">
                        <thead>
                        <tr>
                          <th class="text-center">Factor</th>
                          <th class="text-center">Valor</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($factor_acceso as $acceso)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                {{$acceso->factor}}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                    {{$acceso->valor}}
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                 </div>

                 <div class="w-1/4 bg-gray-100  border-2 border-gray-500">
                    <h1 class="font-bold font-roboto text-xl">Factor Tipo Acceso (FTA)</h1>
                    <table id="factor_tipo_acceso_table">
                        <thead>
                            <tr>
                              <th class="text-center">Factor</th>
                              <th class="text-center">Valor</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($factor_ambiente as $ambiente)
                                <tr>
                                <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                  {{$ambiente->factor}}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                    {{$ambiente->valor}}
                                  </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                    </table>
                 </div>

                 <div class="w-1/4 bg-gray-100 border-2 border-gray-500">
                    <h1 class="font-bold font-roboto text-xl">Factor Estado Unidad (FEU)</h1>
                    <table id="factor_estado_unidad_table">
                        <thead>
                            <tr>
                              <th class="text-center">Factor</th>
                              <th class="text-center">Valor</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($factor_estado_unidad as $estado_unidad)
                                <tr>
                                <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                  {{$estado_unidad->factor}}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                    {{$estado_unidad->valor}}
                                  </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                    </table>
                 </div>



                @include('admin.modal_configuraciones')
            </div>

            <div class="grid w-full">
                <div class="flex w-full gap-x-3">
                   <div class="w-1/4 bg-gray-100 border-2 border-gray-500">
                      <h1 class="font-bold font-roboto text-xl">Factor Garantia (FG)</h1>
                      <table id="factor_garantia_table">
                        <thead>
                            <tr>
                              <th class="text-center">Factor</th>
                              <th class="text-center">Valor</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($factor_horas_diarias as $horas_diarias)
                                <tr>
                                <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                  {{$horas_diarias->factor}}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                    {{$horas_diarias->valor}}
                                  </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                      </table>
                   </div>
                   <div class="w-1/4 bg-gray-100  border-2 border-gray-500">
                    <h1 class="font-bold font-roboto text-xl">Factor Horas Diarias (FHD)</h1>
                    <table id="factor_horas_diarias_table">
                        <thead>
                            <tr>
                              <th class="text-center">Factor</th>
                              <th class="text-center">Valor</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($factor_garantia as $garantia)
                                <tr>
                                <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                  {{$garantia->factor}}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                    {{$garantia->valor}}
                                  </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                    </table>
                 </div>
                </div>
            </div>
            {{-- ghajsdgashdgj --}}
          </div>
      </div>
  </div>
</div>
<script>
window.onload = function() {
  /*   let factor_ambiente_table = new DataTable('#factor_ambiente_table');
    let factor_tipo_acceso_table = new DataTable('#factor_tipo_acceso_table');
    let factor_estado_unidad_table = new DataTable('#factor_estado_unidad_table');
    let factor_garantia_table = new DataTable('#factor_garantia_table');
    let factor_horas_diarias_table = new DataTable('#factor_horas_diarias_table'); */
};

function ocultar_modal(id){
    $("#"+id).addClass("hidden");
}

</script>
@endsection
