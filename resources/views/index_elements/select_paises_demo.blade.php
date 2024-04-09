<select onchange="check_input(this.value,this.id,'paises_warning');check_inp_count('count_paises','paises');" class=" w-full border-2 border-blue-600 rounded-md p-1 my-1 font-roboto" name="paises" id="paises">
    <option value="0">-{{ __('index.selecciona tu region') }}-</option>
    <?php  $all_paises=$all_paises->all_paises(); ?>
    <?php  $usuario_pais=$usuario_pais->usuario_pais(); ?>
    @foreach ($all_paises as $pais)
    @if ($pais->idPais == $usuario_pais->pais)
    <option  class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
    @endif
    @endforeach
            {{-- <option disabled class="font-roboto" value="Argentina">Argentina</option>

            <option disabled class="font-roboto" value="Bolivia">Bolivia</option>

            <option disabled class="font-roboto" value="Brasil">Brasil</option>

            <option disabled class="font-roboto" value="Chile">Chile</option>

            <option  class="font-roboto" value="Colombia">Colombia</option>

            <option disabled class="font-roboto" value="Ecuador">Ecuador</option>

            <option  class="font-roboto" value="México">México</option>

            <option disabled class="font-roboto" value="Paraguay">Paraguay</option>

            <option disabled class="font-roboto" value="Perú">Perú</option>

            <option disabled class="font-roboto" value="Uruguay">Uruguay</option>

            <option disabled class="font-roboto" value="Venezuela">Venezuela</option>

            <option disabled class="font-roboto" value="Caribe">Caribe</option>

            <option disabled class="font-roboto" value="Centro América">Centro América</option> --}}

</select>
