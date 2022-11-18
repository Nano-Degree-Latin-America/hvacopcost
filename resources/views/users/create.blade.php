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
    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <div class="grid">


                    <div class="w-full">
                        <div class="w-1/2 bg-gray-100 p-2 m-2 rounded-lg">
                            <h4 class="header-title">Formulario de registro para nuevos usuarios</h4><br>

                            <input type="text" value="{{$id}}" id="id_sucursal" name="id_sucursal" style="display:none;">
                            <div class="form-group">
                                <label for="userName">Nombre del usuario<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="nombre"
                                   {{--  onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" --}}
                                    onkeypress="return soloLetras(event)" maxlength="30" minlength="1"
                                    parsley-trigger="change" value="{{old('nombre')}}" placeholder="Ingresar el nombre" required
                                    class="form-control" id="nombre">
                            </div>

                            <div class="form-groups">
                                <label for="userName">Tipo Usuario<span class="text-danger">*</span></label>
                                <select class="form-control" style="width: 100%" name="tipo_user"
                                    data-placeholder="Seleccione una opción ..." id="tipo_user" required
                                    data-toggle="select2">
                                    <option value="" selected>Seleccione una opción</option>
                                       <option value="1">Común</option>
                                       <option value="3">Demo</option>



                                </select>

                            </div>



                            <div class="form-group">
                                <label for="emailAddress">Email<span class="text-danger">*</span></label>
                                <input type="email" name="email"  onchange="valida_email_form('form',this.value);" parsley-trigger="change" required
                                    placeholder="Ingresar el email" class="form-control" id="email">
                                <div class="text-danger" value="{{old('email')}}" id='error_email' name="error_email"></div>
                            </div>

                            <div class="form-group">
                                <label for="userName">Contraseña<span class="text-danger">*</span></label>
                                <input class="form-control" type="password" value="{{old('password')}}" required="" name="password" id="password"
                                    placeholder="Ingresa una contraseña">
                            </div>

                            <div class="form-group">
                                <label for="userName">Confirma tu contraseña<span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="password" value="{{old('password')}}" required="" id="password_confirmation"
                                    name="password_confirmation" onKeyUp="valida_contra();"
                                    placeholder="Repite la contraseña">
                                <div class="text-danger" id='error_pass' name="error_pass"></div>
                            </div>



                            <div class="form-group text-right mb-0">
                                <button class=" mx-2 py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 cursor-pointer " onclick="check_store();"  id="submit1" name="submit1" type="button">
                                    Guardar
                                </button>
                                <button type="reset" onclick="location.href='/users_admin_hvaccopcostla'" class="mx-2 py-2 px-4 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 cursor-pointer">
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
