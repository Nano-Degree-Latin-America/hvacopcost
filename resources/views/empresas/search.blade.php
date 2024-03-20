{!! Form::open(array('url'=>'/empresas','method' => 'GET','autocomplete'=>'on','role'=>'search')) !!}
<div class="flex  w-full">
    <div class="w-1/3 grid mb-2">
        <label style="font-size: 20px;" class="mb-1" for=""><b>Buscar</b> </label>
        <div class="flex gap-x-3">
       <input type="text" name="searchText" id="searchText" value="{{$searchText}}" class="p-1 rounded-md border-2">
        <button type="submit" class="bg-blue-500 p-1 rounded-md" ><i class="fa-solid fa-magnifying-glass text-xl text-white"></i></button>
      </div>
    </div>

</div>

{!! Form::close() !!}
