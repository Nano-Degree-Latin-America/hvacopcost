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
              <p class="font-montserrat text-[#102E52] text-[25px]">Empresas</p>

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
                    <a href="/create_empresa" >
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
                    Empresas
                  </p>

                </header>
                <div class="card-content">
                  <table>
                    <thead>
                    <tr>

                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Fecha de registro</th>
                      <th>Ultima Actualizacion</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ( $empresas  as $empresa)
                    <tr>



                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{$empresa->name}}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{$empresa->email}}
                            </td>

                            @if ($empresa->status === 1)
                            <td class="px-6 py-4">
                                <div class="text-xm text-gray-900">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Activo </span>
                                </div>
                            </td>
                            @elseif($empresa->status == 2)
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <span class="px-2 inline-flex text-xm leading-5 font-semibold rounded-full bg-red-100 text-red-800"> Inactivo </span>
                                </div>
                            </td>
                            @endif



                            <td class="px-6 py-2">
                                <div class="text-xm text-gray-500">{{$empresa->created_at}}</div>
                            </td>
                            <td class="px-6 py-2 text-xm text-gray-500">
                                {{$empresa->updated_at}}
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

                                <button onclick="redirect_edit({{$empresa->id}});" class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                                    <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                  </button>

                                  <button title="Paises" onclick="mostrar_modal_paises('modal_paises_empresa_{{$empresa->id}}')" class="button small green" type="button">
                                  <span class="icon"><i class="mdi mdi-flag"></i></span>
                                </button>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                                <button  onclick="inactivar('{{$empresa->id}}','empresas');" class="button small red --jb-modal" data-target="sample-modal" type="button">
                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                </button>

                                <button onclick="change_empresa({{$empresa->id}});" class="button small bg-orange-500 --jb-modal"  data-target="sample-modal-2" type="button">
                                    <span class="icon"><i class="text-white mdi mdi-factory"></i></span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @include('empresas.modal_paises_empresa')
                        @endforeach
                    </tbody>
                  </table>
                  <div class="table-pagination">
                    <div class="flex items-center justify-between">

                    </div>
                  </div>
                </div>
              </div>

          </div>
      </div>
  </div>
</div>
<script>

function redirect_edit(id){
    window.location.href = "edit_empresa"+"/"+id;
}

function redirect_urs_suc(id){
    window.location.href = "/users_sucs"+"/"+id;
}

function mostrar_modal_paises(id){
    $("#"+id).removeClass("hidden");
}

function ocultar_modal(id){
    $("#"+id).addClass("hidden");
}

function change_pais(id_empresa,pais){

    $.ajax({
                type: 'get',
                url: '/change_pais/'+ id_empresa+'/'+pais,
                success: function (response) {
                  /*   alert(response); */
                },
                error: function (responsetext) {

                }
            });
}

function change_empresa(id_empresa){

    Swal.fire({
        title: '¿Administrar?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0dcaf0',
        cancelButtonColor: 'orange',
        confirmButtonText: 'SI'
    }).then((result) => {
        if (result.isConfirmed) {
            // var route = ruta_global + "/" + aux + "/" + id + "";
            var token = $("#_token").val();
            $.ajax({
                type: 'get',
                url: '/change_empresa/'+ id_empresa,
                success: function (response) {
                    Swal.fire(
                        'Exito!',
                        '',
                        'success'
                    )
                },
                error: function (responsetext) {

                }
            });

            setTimeout(function () { location.reload() }, 1000);

            //location.reload();
        }
    })

}
</script>
@endsection
