@extends('layouts.admin')

@section('content')
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
{{-- <div class="flex mx-5 my-5 justify-center">
    <form action="{{ route('users_store') }}" id="formulario" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="grid">


                        <div class="w-full">
                            <div>
                                <h4 class="header-title">Formulario de registro para nuevos usuarios</h4><br>


                                <div class="form-group">
                                    <label for="userName">Nombre del usuario<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nombre"
                                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                                        onkeypress="return soloLetras(event)" maxlength="30" minlength="1"
                                        parsley-trigger="change" value="{{old('nombre')}}" placeholder="Ingresar el nombre" required
                                        class="form-control" id="nombre">
                                </div>




                                <div class="form-group">
                                    <label for="emailAddress">Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email"  onchange="valida_email_form('form',this.value);" parsley-trigger="change" required
                                        placeholder="Ingresar el email" class="form-control" id="email">
                                    <div class="text-danger" value="{{old('email')}}" id='error_email' name="error_email"></div>
                                </div>

                                <div class="form-group">
                                    <label for="userName">Contraseña<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{old('password')}}" required="" name="password" id="password"
                                        placeholder="Ingresa una contraseña">
                                </div>

                                <div class="form-group">
                                    <label for="userName">Confirma tu contraseña<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{old('password')}}" required="" id="password_confirmation"
                                        name="password_confirmation" onKeyUp="valida_contra();"
                                        placeholder="Repite la contraseña">
                                    <div class="text-danger" id='error_pass' name="error_pass"></div>
                                </div>



                                <div class="form-group text-right mb-0">
                                    <button class="btn btn-primary waves-effect waves-light mr-1"  id="submit1" name="submit1" type="submit">
                                        Guardar
                                    </button>
                                    <button type="reset" onclick="location.href='/users'" class="btn btn-secondary waves-effect">
                                        Cancelar
                                    </button>
                                </div>


                            </div>

                        </div>


                    </div>


                </div>

            </div>


        </div> <!-- end row -->
    </form>
</div> --}}

<div class="container-fluid">



<hr>

<form action="{{ route('users_store') }}" id="formulario" method="POST">
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
                                <option value="">Seleccionar</option>
                                @foreach ($empresas as $empresa)
                                <option value="{{$empresa->id}}">{{$empresa->name}}</option>
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
                        <input type="text" id="nombre" name="nombre" required  type="text" placeholder="Ingrese nombre" class="w-full border-2 border-blue-500 rounded-md" >
                    </div>
                </div>

                <div class="flex w-full mt-3 gap-x-4">
                    <div class="w-3/4">
                        <div class="w-full flex">
                            <label class="text-[16px]" style="color: #102E52">Tipo de Usuario<span class="text-red-500">*</span></label>
                        </div>
                        <div class="w-full flex justify-start">
                            <select name="type_user" id="type_user" required class="w-full border-2 border-blue-500 rounded-md" onchange="valida_form_calc();unidadHvac(this.value,1,'csTipo','csDisenio_1_1');">
                                <option selected value="">Seleccionar</option>
                                <option value="1">Estandar</option>
                                <option value="2">Master</option>
                                <option value="3">Demo</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex w-full mt-3 gap-x-4">
                    <div class="w-3/4">
                        <div class="w-full flex">
                            <label class="text-[16px]" style="color: #102E52">Correo<span class="text-red-500">*</span></label>
                        </div>
                        <input id="email" name="email" type="email" required placeholder="Ingrese correo" class="w-full border-2 border-blue-500 rounded-md">
                    </div>
                </div>

                <div class="flex w-full mt-3 gap-x-4">
                    <div class="w-3/4">
                        <div class="w-full flex">
                            <label class="text-[16px]" style="color: #102E52">Fecha Inicio<span class="text-red-500">*</span></label>
                        </div>
                        <input id="fecha_inicio" name="fecha_inicio" type="date" required placeholder="Ingrese correo" class="w-full border-2 border-blue-500 rounded-md">
                    </div>
                </div>

                <div class="flex w-full mt-3 gap-x-4">
                    <div class="w-3/4">
                        <div class="w-full flex">
                            <label class="text-[16px]" style="color: #102E52">Fecha de Termino<span class="text-red-500">*</span></label>
                        </div>
                        <input id="fecha_termino" name="fecha_termino" type="date" required placeholder="Ingrese correo" class="w-full border-2 border-blue-500 rounded-md">
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
