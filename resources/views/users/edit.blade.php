
@extends('layouts.admin')

@section('content')

  <style>

  </style>
  <div class="my-3 mx-3 font-semibold text-gray-700 flex-1">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="/home" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
              <svg class="mr-2 w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
              <p class="font-montserrat text-[#102E52] text-[25px]">Home</p>

            </a>
          </li>

          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
             <a href="#"> <span class="ml-1 font-montserrat  text-[22px] text-gray-400 md:ml-2 dark:text-gray-500">Usuarios</span></a>

            </div>
          </li>

          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
             <a href="#"> <span class="ml-1 font-montserrat  text-[22px] text-gray-400 md:ml-2 dark:text-gray-500">Nuevo usuario</span></a>

            </div>
          </li>
        </ol>
      </nav>
</div>
<hr>


<div class="container-fluid">



<hr>

<form action="{{url('/edit_usr', [$user_edit->id])}}" id="formulario" method="POST">
    @csrf
    <div class="flex w-full justify-start mx-5">
        <div class="grid w-2/5 gap-x-4 border-2 border-blue-500 rounded-xl my-5">

            <div class="w-90 m-3">
                <div class="flex w-full gap-x-4">
                    <div class="w-3/4">
                        <div class="w-full flex">
                            <label class="text-[16px]" style="color: #102E52">Empresa<span class="text-red-500">*</span></label>
                        </div>
                        <div class="w-full flex justify-start">
                            <select name="empresa" id="empresa" required class="w-full border-2 border-blue-500 rounded-md" onchange="valida_form_calc();unidadHvac(this.value,1,'csTipo','csDisenio_1_1');">
                                @foreach ($empresas as $empresa)
                                @if ($empresa->id == $user_edit->id_empresa)
                                <option selected value="{{$empresa->id}}">{{$empresa->name}}</option>
                                @else
                                <option value="{{$empresa->id}}">{{$empresa->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex w-full gap-x-4 mt-3">
                    <div class="w-3/4">
                        <div class="w-full flex">
                            <label class="text-[16px]" style="color: #102E52">Nombre<span class="text-red-500">*</span></label>
                        </div>
                        <input type="text" id="nombre" name="nombre" required value="{{$user_edit->name}}" type="text" placeholder="Ingrese nombre" class="w-full border-2 border-blue-500 rounded-md" >
                    </div>
                </div>

                <div class="flex w-full mt-3 gap-x-4">
                    <div class="w-3/4">
                        <div class="w-full flex">
                            <label class="text-[16px]" style="color: #102E52">Tipo de Usuario<span class="text-red-500">*</span></label>
                        </div>
                        <div class="w-full flex justify-start">
                            <select name="type_user" id="type_user" required class="w-full border-2 border-blue-500 rounded-md" onchange="valida_form_calc();unidadHvac(this.value,1,'csTipo','csDisenio_1_1');">
                                @if ($user_edit->tipo_user == 1)
                                <option selected value="1">Estandar</option>
                                @else
                                <option value="1">Estandar</option>
                                @endif

                                @if ($user_edit->tipo_user == 2)
                                <option selected value="2">Master</option>
                                @else
                                <option value="2">Master</option>
                                @endif

                                @if ($user_edit->tipo_user == 3)
                                <option  selected value="3">Demo</option>
                                @else
                                <option value="3">Demo</option>
                                @endif


                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex w-full mt-3 gap-x-4">
                    <div class="w-3/4">
                        <div class="w-full flex">
                            <label class="text-[16px]" style="color: #102E52">Contraseña<span class="text-red-500">*</span></label>
                        </div>
                        <input id="password" name="password" type="password" required placeholder="Ingrese nueva contraseña" class="w-full border-2 border-blue-500 rounded-md">
                    </div>
                </div>

                <div class="flex w-full mt-3 gap-x-4">
                    <div class="w-3/4">
                        <div class="w-full flex">
                            <label class="text-[16px]" style="color: #102E52">Correo<span class="text-red-500">*</span></label>
                        </div>
                        <input id="email" name="email" type="email" value="{{$user_edit->email}}" required placeholder="Ingrese correo" class="w-full border-2 border-blue-500 rounded-md">
                    </div>
                </div>

                <div class="flex w-full mt-3 gap-x-4">
                    <div class="w-3/4">
                        <div class="w-full flex">
                            <label class="text-[16px]" style="color: #102E52">Fecha Inicio<span class="text-red-500">*</span></label>
                        </div>
                        <input id="fecha_inicio" name="fecha_inicio" type="date" value="{{$user_edit->fecha_inicio}}" required placeholder="Ingrese correo" class="w-full border-2 border-blue-500 rounded-md">
                    </div>
                </div>

                <div class="flex w-full mt-3 gap-x-4">
                    <div class="w-3/4">
                        <div class="w-full flex">
                            <label class="text-[16px]" style="color: #102E52">Fecha de Termino<span class="text-red-500">*</span></label>
                        </div>
                        <input id="fecha_termino" name="fecha_termino" type="date"  value="{{$user_edit->fecha_termino}}" required placeholder="Ingrese correo" class="w-full border-2 border-blue-500 rounded-md">
                    </div>
                </div>


                <div class="flex w-full justify-end mt-3">
                    <button type="submit" class="focus:bg-gray-500 hover:bg-blue-800 text-white bg-blue-500 rounded-md p-2 border-2 border-white waves-effect waves-light mr-1"  id="submit1" name="submit1" type="button">
                        Guardar
                    </button>
                    <button type="reset" onclick="location.href='/empresas'" class="focus:bg-gray-500 hover:bg-red-800 text-white rounded-md bg-red-500 p-2 border-2 border-white  waves-effect">
                        Cancelar
                    </button>
                </div>
            </div>


        </div>

    </div> <!-- end row -->
</form>
                        </div>

                    </div>
                </div>
             </div>

        </div>
    </div> <!-- end row -->

</div> <!-- end container-fluid -->


<script>
    function valida_contra() {
    aux1 = document.getElementById('password').value;
    aux2 = document.getElementById('password_confirmation').value;
    if (aux1 != aux2) {
        document.getElementById("error_pass").innerHTML = "Las contraseñas no coinciden.";
        document.getElementById("error_pass").value = "1";
        document.getElementById('submit3').disabled = true;
    } else {
        document.getElementById("error_pass").innerHTML = "";
        document.getElementById("error_pass").value = "0";
        document.getElementById('submit3').disabled = false;
    }
}

function check_store(){
    Swal.fire({
        title: '¿Guardar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, guardar!'
    }).then((result) => {
        if (result.isConfirmed) {
            formulario = document.getElementById('formulario');
            formulario.submit();
        }/* else{
            location.href='users/create';
        } */
    })
}
</script>
@endsection
