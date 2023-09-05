{!! Form::open(array('url'=>'/mis_projectos','method' => 'GET','autocomplete'=>'on','role'=>'search')) !!}
<div class="flex my-3 w-full">
    <div style="" class="w-1/3 grid">
        <label style="font-size: 20px;" class="mb-1 font-roboto" for=""><b>{{ __('index.buscar') }}</b> </label>
        <div class="flex gap-x-3">
        <input placeholder="{{ __('index.buscar_proy') }}" type="text" name="searchText" id="searchText" value="{{$searchText}}" class="w-full border-2 border-blue-600 rounded-md p-1">
        <button title="{{ __('index.buscar') }}" type="submit" class="bg-blue-500 p-1 rounded-md" ><i class="fa-solid fa-magnifying-glass text-xl text-white"></i></button>
      </div>
    </div>

</div>

{!! Form::close() !!}
