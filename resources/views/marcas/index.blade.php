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
  <div class="my-3 mx-3 font-semibold text-gray-700 flex-1">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="/home" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
              <svg class="mr-2 w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
              <p class="font-montserrat text-[#102E52] text-[25px]">Marcas</p>

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


  <div class="w-0.8 my-5 mx-5 justify-center">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container mx-auto">
      <div class="flex flex-col">
          <div class="w-full">
            <div class="flex w-full my-3">
                <div class="w-1/2">
                    <a href="/create_marcas" >
                        <button class="mx-5 py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 cursor-pointer">
                            Crear nuevo
                         </button>

                    </a>
                </div>


            </div>



              <div class="card has-table">
                <header class="card-header">
                  <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>

                  </p>

                </header>
                <div class="card-content">
                  <table id="tabla_empresas">
                    <thead>
                    <tr>

                      <th>Marca</th>
                      <th>Equipo</th>
                      <th>Status</th>
                      <th>Fecha de registro</th>
                      <th>Ultima Actualizacion</th>

                    </tr>
                    </thead>
                    <tbody>

                        @foreach ( $marcas  as $marca)
                    <tr>



                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{$marca->marca}}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">

                                @if ($marca->equipo == '1')
                                Paquetes (RTU)
                                @endif

                                @if ($marca->equipo == '2')
                                Split DX
                                @endif

                                @if ($marca->equipo == '3')
                                VRF No Ductados
                                @endif

                                @if ($marca->equipo == '4')
                                VRF Ductados
                                @endif

                                @if ($marca->equipo == '5')
                                PTAC/VTAC
                                @endif

                                @if ($marca->equipo == '6')
                                WSHP
                                @endif

                                @if ($marca->equipo == '7')
                                Minisplit Inverter
                                @endif

                                @if ($marca->equipo == '8')
                                Chiller - Aire - Scroll Constante
                                @endif

                                @if ($marca->equipo == '9')
                                Chiller - Aire - Scroll Variable
                                @endif

                                @if ($marca->equipo == '10')
                                Chiller - Aire - Tornillo 4 Etapas
                                @endif
                            </td>





                            <td class="px-6 py-2">
                                <div class="text-xm text-gray-500">{{$marca->created_at}}</div>
                            </td>
                            <td class="px-6 py-2 text-xm text-gray-500">
                                {{$marca->updated_at}}
                            </td>

                       {{--  <td class="px-6 py-2">
                            <a href="{{URL::action('UserController@edit',$empresa->id)}}" class=" inline-block text-center">
                             <i class="fa-solid fa-pen-to-square  text-green-600  text-[25px]"></i>
                         </a>
                        </td>



                        @if($empresa->status == 1)
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

                            <td class="px-6 py-2">
                                <a  onclick=inactivar('{{$empresa->id}}','del_usr'); class=" inline-block text-center">
                                 <i class="fa-sharp fa-solid fa-trash text-red-600  text-[25px]"></i>
                                </a>
                            </td>


                            @else
                            <td>No aplica</td>

                            @endif
 --}}

                        <td class="actions-cell">
                            <div class="buttons right nowrap">

                                <button onclick="redirect_edit({{$marca->id}});" class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                                    <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                </button>



                                <button  onclick="eliminar('{{$marca->id}}','marca');" class="button small red --jb-modal" data-target="sample-modal" type="button">
                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                </button>


                            </div>
                        </td>
                    </tr>

                        @endforeach
                    </tbody>
                  </table>
                  <div class="table-pagination">
                    <div class="flex items-center justify-between">
                        {{-- {{ $empresas->links() }} --}}
                    </div>
                  </div>
                </div>
              </div>

          </div>
      </div>
  </div>
</div>
<script>
window.onload = function() {
    let table = new DataTable('#tabla_empresas');
};


function redirect_edit(id){
    window.location.href = "edit_marcas"+"/"+id;
}

function redirect_urs_suc(id){
    window.location.href = "/users_sucs"+"/"+id;
}

function mostrar_modal_paises(id){
    $("#"+id).removeClass("hidden");
}

function mostrar_modal_type_p(id){
    $("#"+id).removeClass("hidden");
}

function ocultar_modal(id){
    $("#"+id).addClass("hidden");
}

function eliminar(id, aux) {
    Swal.fire({
        title: 'Seleccione una opción',
        text: "",
        showDenyButton: false,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF6600',
        confirmButtonText: 'Eliminar',
    }).then((result) => {
        if (result.isConfirmed) {
            var token = $("#token").val();

            $.ajax({
                url: '/delete_marcas/'+ id,
                method: 'get',
                dataType: 'json',
                success: function () {
                    Swal.fire(
                        'Eliminado!',
                        'El registro se ha eliminado.',
                        'success'
                    )
                    setTimeout(function () { location.reload() }, 1000);
                }
            });


          }
    })
}


</script>
@endsection
