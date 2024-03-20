
@extends('layouts.admin')
<script src="https://kit.fontawesome.com/48aa4aa0c4.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
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

          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
             <a href="#"> <span class="ml-1 font-montserrat  text-[22px] text-gray-400 md:ml-2 dark:text-gray-500">Usuarios</span></a>

            </div>
          </li>
        </ol>

      </nav>
</div>
<hr>




  <div class="w-0.8 my-5 mx-5 justify-center">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container mx-full">
      <div class="flex flex-col">
          <div class="w-full">
            <div class="flex w-full my-3">
                <div class="w-1/2">

                    <a href="/users/create" >
                        <button class="mx-5 py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 cursor-pointer">
                            Crear nuevo
                         </button>

                    </a>


                  </div>



               </div>
              <div class="p-8 border-b border-gray-200 shadow">
                  <table class="divide-y divide-gray-300 w-full" id="dataTable">
                      <thead class="bg-[#102E52]">
                          <tr>
                              <th class="px-6 py-2 text-center text-xm text-white">
                                 Nombre
                              </th>
                              <th class="px-6 py-2 text-center text-xm text-white">
                                Email
                                </th>

                                <th class="px-6 py-2 text-center text-xm text-white">
                                    Empresa
                                    </th>
                              <th class="px-6 py-2 text-xm text-white">
                                  Estado
                              </th>

                                <th class="px-6 py-2 text-xm text-white">
                                  Tipo Usuario
                              </th>

                              <th class="px-6 py-2 text-xm text-white">
                                Días  Restantes
                            </th>

                              <th class="px-6 py-2 text-xm text-white">
                                  Fecha de Inicio
                              </th>
                              <th class="px-6 py-2 text-xm text-white">
                                  Fecha Termino
                              </th>

                              <th class="px-6 py-2 text-xm text-white">
                                  <span class="dashicons dashicons-edit-large">Editar</span>
                              </th>

                              <th class="px-6 py-2 text-xm text-white">
                                Inactivar
                            </th>

                              <th class="px-6 py-2 text-xm text-white">
                                  Eliminar
                              </th>
                          </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-300">


                        @foreach ( $users as $client)
                        <tr class="text-center whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{$client->name}}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{$client->email}}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{$client->name_empresa}}
                            </td>
                            @if ($client->status === 1)
                            <td class="px-6 py-4">
                                <div class="text-xm text-gray-900">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Activo </span>
                                </div>
                            </td>
                            @elseif($client->status == 2)
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <span class="px-2 inline-flex text-xm leading-5 font-semibold rounded-full bg-red-100 text-red-800"> Inactivo </span>
                                </div>
                            </td>
                            @endif


                             @if ($client->tipo_user === 1)
                            <td class="px-6 py-4">
                                <div class="text-xm text-gray-900">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white"> Estandar </span>
                                </div>
                            </td>
                            @elseif($client->tipo_user == 2)
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <span class="px-2 inline-flex text-xm leading-5 font-semibold rounded-full bg-orange-500 text-white"> Master </span>
                                </div>
                            </td>
                            @elseif($client->tipo_user == 3)
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <span class="px-2 inline-flex text-xm leading-5 font-semibold rounded-full bg-blue-500 text-white"> Demo </span>
                                </div>
                            </td>
                             @elseif($client->tipo_user == 5)
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <span class="px-2 inline-flex text-xm leading-5 font-semibold rounded-full bg-red-500 text-white"> Admin </span>
                                </div>
                            </td>
                            @endif
                            <td class="px-6 py-4 text-sm text-blue-900">
                                <?php
                                $days = (strtotime($client->fecha_termino)-strtotime($today))/86400
                                    ?>
                                    @if ($days <= 0)
                                    <span class="px-2 inline-flex text-xm leading-5 font-semibold rounded-full bg-red-100 text-red-800">  {{number_format($days)}} </span>
                                    @endif

                                    @if ($days > 20)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">  {{number_format($days)}} </span>
                                    @endif

                                    @if ($days <= 20 && $days >= 0)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-300 text-orange-800">  {{number_format($days)}} </span>
                                    @endif


                            </td>


                            <td class="px-6 py-2">
                                <div class="text-xm text-gray-500">{{date('d-m-Y', strtotime($client->fecha_inicio))}}</div>
                            </td>
                            <td class="px-6 py-2 text-xm text-gray-500">
                                {{date('d-m-Y', strtotime($client->fecha_termino))}}
                            </td>

                        <td class="px-6 py-2">
                            <a href="{{URL::action('UserController@edit',$client->id)}}" class=" inline-block text-center">
                             <i class="fa-solid fa-pen-to-square  text-green-600  text-[25px]"></i>
                         </a>
                        </td>



                        @if($client->status == 1)
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

                            <td class="px-6 py-2">
                                <a  onclick="inac('{{$client->id}}','del_usr');" class=" inline-block text-center">
                                 <i class="fa-sharp fa-solid fa-trash text-orange-600  text-[25px]"></i>
                                </a>
                            </td>


                            @else
                            <td>No aplica</td>

                            @endif


                        @if($client->status == 1)
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

                            <td class="px-6 py-2">
                                <a  onclick="delet('{{$client->id}}','eliminar_usr');" class=" inline-block text-center">
                                 <i class="fa-sharp fa-solid fa-trash text-red-600  text-[25px]"></i>
                                </a>
                            </td>


                            @else
                            <td>No aplica</td>

                            @endif
                        </tr>

                        @endforeach

                      </tbody>
                  </table>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    window.onload = function() {
    let table =  $('#dataTable').DataTable( {
    responsive: true
} );
};
    //FUNCION PARA BORRAR REGISTROS// AUX ES LA RUTA QUE RECIBE
    function inac(id, aux) {
    Swal.fire({
        title: 'Estás seguro?',
        text: "Se inactivará el registro!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, inactivar!'
    }).then((result) => {
        if (result.isConfirmed) {
            // var route = ruta_global + "/" + aux + "/" + id + "";
          /*   var token = document.getElementById('token').value; */
            $.ajax({
                url: "/" + aux + "/" + id + "",
               /*  headers: { 'X-CSRF-TOKEN': token }, */
                type: 'get',
              /*   dataType: 'json', */
                success: function () {
                    Swal.fire(
                        'Inactivado!',
                        'El registro se ha inactivado.',
                        'success'
                    )
                }
            });

            setTimeout(function () { location.reload() }, 1000);

            //location.reload();
        }
    })
}

    //FUNCION PARA BORRAR REGISTROS// AUX ES LA RUTA QUE RECIBE
    function delet(id, aux) {
    Swal.fire({
        title: 'Estás seguro?',
        text: "Se eliminara el registro!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, inactivar!'
    }).then((result) => {
        if (result.isConfirmed) {
            // var route = ruta_global + "/" + aux + "/" + id + "";
          /*   var token = document.getElementById('token').value; */
            $.ajax({
                url: "/" + aux + "/" + id + "",
               /*  headers: { 'X-CSRF-TOKEN': token }, */
                type: 'get',
              /*   dataType: 'json', */
                success: function () {
                    Swal.fire(
                        'Inactivado!',
                        'El registro se ha inactivado.',
                        'success'
                    )
                }
            });

            setTimeout(function () { location.reload() }, 1000);

            //location.reload();
        }
    })
}

/* function redirect_create_user(id){
    window.location.href = "/users/create"+"/"+id;
} */
</script>
@section('content')
@endsection
