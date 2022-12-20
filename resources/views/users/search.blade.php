{!! Form::open(array('url'=>'/users','method' => 'GET','autocomplete'=>'on','role'=>'search')) !!}
<div style="margin-left:50px;" class="w-1/3 grid mt-5">
    <label style="font-size: 20px;" class="mb-1" for=""><b>Empresas</b> </label>
    <select name="searchText" id="searchText" value="{{$searchText}}" required class="w-full border-2 border-blue-600 rounded-md p-1" onchange="valida_form_calc();unidadHvac(this.value,1,'csTipo','csDisenio_1_1');">
        <option value="">Seleccionar</option>
        @foreach ($empresas as $empresa)
        <option value="{{$empresa->id}}">{{$empresa->name}}</option>
        @endforeach
    </select>
</div>
{!! Form::close() !!}
