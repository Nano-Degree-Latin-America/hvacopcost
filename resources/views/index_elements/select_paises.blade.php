<select onchange="check_input(this.value,this.id,'paises_warning');check_inp_count('count_paises','paises');clean_tipo_ambiente()" class=" w-full border-2 border-color-inps rounded-md p-1 my-1 font-roboto" name="paises" id="paises">
    <option value="0">-{{ __('index.selecciona tu region') }}-</option>
    <?php  $all_paises=$all_paises->all_paises(); ?>
    @foreach ($all_paises as $pais)

    @if($pais->pais === 'Argentina')
    <?php  $check_pais=$paises_empresa->check_pais('Argentina'); ?>
        @if ($check_pais)
            @if($check_pais->pais === $pais->pais)
                <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
            @endif
        @else
            <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
        @endif
    @endif

    @if($pais->pais === 'Bolivia')
        <?php  $check_pais=$paises_empresa->check_pais('Bolivia'); ?>
        @if ($check_pais)
                @if($check_pais->pais === $pais->pais)
                <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                @endif
        @else
            <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
        @endif
    @endif

    @if($pais->pais === 'Brasil')
        <?php  $check_pais=$paises_empresa->check_pais('Brasil'); ?>
        @if ($check_pais)
                @if($check_pais->pais === $pais->pais)
                <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                @endif
        @else
            <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
        @endif
    @endif

    @if($pais->pais === 'Chile')
        <?php  $check_pais=$paises_empresa->check_pais('Chile'); ?>
        @if ($check_pais)
                @if($check_pais->pais === $pais->pais)
                <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                @endif
        @else
            <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
        @endif
    @endif


    @if($pais->pais === 'Colombia')
        <?php  $check_pais=$paises_empresa->check_pais('Colombia'); ?>
        @if ($check_pais)
                @if($check_pais->pais === $pais->pais)
                <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                @endif
        @else
            <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
        @endif
    @endif

    @if($pais->pais === 'Ecuador')
        <?php  $check_pais=$paises_empresa->check_pais('Ecuador'); ?>
        @if ($check_pais)
                @if($check_pais->pais === $pais->pais)
                <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                @endif
        @else
            <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
        @endif
    @endif

    @if($pais->pais === 'México')
        <?php  $check_pais=$paises_empresa->check_pais('México'); ?>
        @if ($check_pais)
                @if($check_pais->pais === $pais->pais)
                <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                @endif
        @else
            <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
        @endif
    @endif

    @if($pais->pais === 'Paraguay')
        <?php  $check_pais=$paises_empresa->check_pais('Paraguay'); ?>
        @if ($check_pais)
                @if($check_pais->pais === $pais->pais)
                <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                @endif
        @else
            <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
        @endif
    @endif

    @if($pais->pais === 'Perú')
        <?php  $check_pais=$paises_empresa->check_pais('Perú'); ?>
        @if ($check_pais)
                @if($check_pais->pais === $pais->pais)
                <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                @endif
        @else
            <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
        @endif
    @endif

    @if($pais->pais === 'Uruguay')
        <?php  $check_pais=$paises_empresa->check_pais('Uruguay'); ?>
        @if ($check_pais)
                @if($check_pais->pais === $pais->pais)
                <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                @endif
        @else
            <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
        @endif
    @endif

    @if($pais->pais === 'Venezuela')
        <?php  $check_pais=$paises_empresa->check_pais('Venezuela'); ?>
        @if ($check_pais)
                @if($check_pais->pais === $pais->pais)
                <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                @endif
        @else
            <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
        @endif
    @endif

    @if($pais->pais === 'Caribe')
        <?php  $check_pais=$paises_empresa->check_pais('Caribe'); ?>
        @if ($check_pais)
                @if($check_pais->pais === $pais->pais)
                <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                @endif
        @else
            <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
        @endif
    @endif

    @if($pais->pais === 'Centro América')
        <?php  $check_pais=$paises_empresa->check_pais('Centro América'); ?>
        @if ($check_pais)
                @if($check_pais->pais === $pais->pais)
                <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                @endif
        @else
            <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
        @endif
    @endif

    @if($pais->pais === 'Arizona')
        <?php  $check_pais=$paises_empresa->check_pais('Arizona'); ?>
        @if ($check_pais)
                @if($check_pais->pais === $pais->pais)
                <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                @endif
        @else
            <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
        @endif
    @endif

    @endforeach

</select>
