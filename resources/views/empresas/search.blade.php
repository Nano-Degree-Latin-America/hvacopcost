{!! Form::open(array('url'=>'/empresas','method' => 'GET','autocomplete'=>'on','role'=>'search')) !!}
<div class="flex  w-full">
    <div class="w-1/3 grid mb-2">
        <label style="font-size: 20px;" class="mb-1" for=""><b>Buscar</b> </label>
        <div class="flex gap-x-3">
        <select name="searchText" id="searchText" value="{{$searchText}}"  class="w-full border-2 border-blue-600 rounded-md p-1" onchange="valida_form_calc();unidadHvac(this.value,1,'csTipo','csDisenio_1_1');">
            <option value="">Seleccionar</option>
            @foreach ($emps as $emp)
            <option value="{{$emp->id}}">{{$emp->name}}</option>
            @endforeach
        </select>
        <button type="submit" class="bg-blue-500 p-1 rounded-md" ><i class="fa-solid fa-magnifying-glass text-xl text-white"></i></button>
      </div>
    </div>

</div>

{!! Form::close() !!}
