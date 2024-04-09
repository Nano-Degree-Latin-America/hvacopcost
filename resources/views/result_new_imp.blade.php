@if (auth::user()->tipo_user == 3)
@include('resultados.resultados_new_demo')
@endif

@if (auth::user()->tipo_user != 3)
    @include('resultados.resultados_new')
@endif
