@if (auth::user()->tipo_user == 3)
@include('resultados.resultados_retro_demo')
@endif

@if (auth::user()->tipo_user != 3)
    @include('resultados.resultados_retro')
@endif
