@extends('layouts.app')

@section('content')
<div style="background-color:#1B17BB;" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="formulario" name="formulario">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('index.nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('index.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" onchange="check_mail(this.value)" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Región de Aplicación</label>

                            <div class="col-md-6">
                                <select id="pais"  onchange="check_mail(this.value)" class="form-control @error('pais') is-invalid @enderror" name="pais"  required autocomplete="pais">
                                    <option value="0">-{{ __('index.selecciona tu region') }}-</option>

                                    <option disabled class="font-roboto" value="Argentina">Argentina</option>

                                    <option disabled class="font-roboto" value="Bolivia">Bolivia</option>

                                    <option disabled class="font-roboto" value="Brasil">Brasil</option>

                                    <option disabled class="font-roboto" value="Chile">Chile</option>

                                    <option  class="font-roboto font-bold" value="Colombia"><b>Colombia</b></option>

                                    <option disabled class="font-roboto" value="Ecuador">Ecuador</option>

                                    <option  class="font-roboto font-bold" value="México"><b>México</b></option>

                                    <option disabled class="font-roboto" value="Paraguay">Paraguay</option>

                                    <option disabled class="font-roboto" value="Perú">Perú</option>

                                    <option disabled class="font-roboto" value="Uruguay">Uruguay</option>

                                    <option disabled class="font-roboto" value="Venezuela">Venezuela</option>

                                    <option disabled class="font-roboto" value="Caribe">Caribe</option>

                                    <option disabled class="font-roboto" value="Centro América">Centro América</option>
                                </select>
                                @error('pais')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('index.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('index.password_confirm') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" onclick="send_mail()" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    function check_mail(value){
        $.ajax({
        type: 'get',
        url: '/check_mail/'+value,
        success: function (response) {
           if(response  == 1){
            Swal.fire(
             'Atención',
             value+" Ya Existe",
            'warning'
        )
           }else{
            return false;
           }

        },
        error: function (responsetext) {

        }
    });
    }

    function send_mail(){
         var nombre =  $('#name').val();
         var mail =  $('#email').val();
         var pass =  $('#password').val();
         var pass__conf = $('#password-confirm').val();

        if(nombre != "" &&  mail != "" &&  pass != "" &&  pass__conf != ""){

            Swal.fire({
            title: "Guardado",
            text: "Se ha mandado un correo de confirmacion a "+mail,
            icon: "success",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Aceptar"
            }).then((result) => {
            if (result.isConfirmed) {
                $("#formulario").trigger("submit");
            }
});


    }
        }


</script>
@endsection
