



@extends('layouts.admin')

@section('content')
  <div class="my-3 mx-3 font-semibold text-gray-700 flex-1">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="/marcas" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
              <svg class="mr-2 w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
              <p class="font-montserrat text-[#102E52] text-[25px]">Marcas</p>

            </a>
          </li>

          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
             <a href="#"> <span class="ml-1 font-montserrat  text-[22px] text-gray-400 md:ml-2 dark:text-gray-500">Crear</span></a>

            </div>
          </li>


        </ol>
      </nav>
</div>
<hr>
<div class="container-fluid">



<hr>

<div class="w-full flex justify-start mt-5 mx-5">
    <label class="text-[24px] font-bold" style="color: #102E52">Crear Marca</label>
</div>

<form action="{{ route('marcas.store') }}" id="formulario" method="POST">
    @csrf
    <div class="flex w-full justify-start mx-5">
        <div class="grid w-2/5 gap-x-4 border-2 border-blue-500 rounded-xl my-5">

            <div class="w-90 m-3">

                <div class="flex w-full gap-x-4">
                    <div class="w-1/2">
                        <div class="w-full flex">
                            <label class="text-[16px]" style="color: #102E52">Nombre<span class="text-red-500">*</span></label>
                        </div>
                        <input type="text" required id="marca" name="marca"  type="text" placeholder="Ingrese nombre" class="w-full border-2 border-blue-500 rounded-md" >
                    </div>
                </div>

                <div class="flex w-1/2 mt-3 gap-x-4">
                    <div class="w-full">
                        <div class="w-full flex">
                            <label class="text-[16px]" style="color: #102E52">Equipo<span class="text-red-500">*</span></label>
                        </div>
                        <select required name="cUnidad" id="cUnidad" class="w-full border-2 border-blue-500 rounded-md">
                            <option value="0">{{ __('index.seleccionar') }}</option>
                            <option value="1">Paquetes (RTU)</option>
                            <option value="2">Split DX</option>
                            <option value="3">VRF No Ductados</option>
                            <option value="4">VRF Ductados</option>
                            <option value="5">PTAC/VTAC</option>
                            <option value="6">WSHP</option>
                            <option value="7">Minisplit Inverter</option>
                            <option value="8">Chiller - Aire - Scroll Constante</option>
                            <option value="9">Chiller - Aire - Scroll Variable</option>
                            <option value="10">Chiller - Aire - Tornillo 4 Etapas</option>
                        </select>
                    </div>
                </div>


                <div class="flex w-full justify-end mt-3">
                    <button  class="focus:bg-gray-500 hover:bg-blue-800 text-white bg-blue-500 rounded-md p-2 border-2 border-white waves-effect waves-light mr-1"  id="submit1" name="submit1" type="submit">
                        Guardar
                    </button>
                    <button type="reset" onclick="location.href='/empresas'" class="focus:bg-gray-500 hover:bg-red-800 text-white rounded-md bg-red-500 p-2 border-2 border-white  waves-effect">
                        Cancelar
                    </button>
                </div>
            </div>


        </div>

    </div>
</form>
                        </div>

                    </div>
                </div>
             </div>

        </div>
    </div> <!-- end row -->

</div> <!-- end container-fluid -->
<script>

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
