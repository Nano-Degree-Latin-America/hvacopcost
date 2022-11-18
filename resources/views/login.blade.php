<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/4e957e572c.js"></script>
    <!-- hoja de estilos -->
    {{-- <link rel="stylesheet" type="text/css" href="../public/assets/css/styles.css"> --}}
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
    <!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo_default.webp')}}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login-assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login-assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login-assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login-assets/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{asset('login-assets/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login-assets/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login-assets/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login-assets/css/main.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/css">
    	.container-login100
    	{
    		/* background-image: url("{{asset('assets/images/backgrond_login.PNG')}}"); */
    	}
    </style>
    <title>Acceso</title>
</head>
<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-b-20">
                <div class="w-full flex justify-center">
                    <img src="{{asset('assets\images\Logotipo-HVACopcost-LA_blanco.png')}}" class="mr-10" style="height:350px; width:700px;" >
                </div>
                <div class="w-full flex justify-center">
                    <form  style="width: 390px;" role="form" method="POST" action="./lo_gin">
                        @csrf
                        
    
                        <div class="wrap-input100 validate-input m-b-10" data-validate = "Se requiere el usuario">
                            <input class="input100" type="text" name="username" placeholder="Usuario" required="">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
    
                        <div class="wrap-input100 validate-input m-b-10" data-validate = "Se requiere contraseña">
                            <input class="input100" type="password" name="password" placeholder="Contraseña" required="">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
    
                        <div class="container-login100-form-btn p-t-10">
                            <input type="submit" class="login100-form-btn" style="" value="Entrar">
                        </div>

                        
                    </form>
                </div>
                <div class="w-full flex justify-between mt-3">
                    <div>
                       <a href="/register">
                        <input type="button" class="bg-gray-100 text-[14px] text-black cursor-pointer font-bold p-3 rounded-xl hover:text-white hover:bg-gray-500" style="" value="Registro Demo">
                       </a>
                    </div>

                    <div>
                        <input type="button"class="bg-gray-100 text-[14px] text-black cursor-pointer font-bold py-3 px-4 rounded-xl hover:text-white hover:bg-gray-500" style="" value="Comprar">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('plugins/jquery/jquery-3.6.0.min.js')}}"></script>
    {{-- <script src="{{asset('js/index.js')}}"></script> --}}
</body>
</html>