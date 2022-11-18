<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GXCVJ80B4N"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-GXCVJ80B4N');
    </script>
    {{-- no cahce --}}
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <script
    src="https://code.jquery.com/jquery-3.6.1.js"
    integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo_default.webp')}}"/>
    <script src="https://use.fontawesome.com/4e957e572c.js"></script>
    <script src="https://kit.fontawesome.com/48aa4aa0c4.js" crossorigin="anonymous"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>
    <!-- hoja de estilos -->
{{--     <link rel="stylesheet" type="text/css" href="assets/css/styles.css"> --}}
    <link rel="stylesheet" href="{{asset("assets/css/styles.css")}}">
    {{-- <link href="assets/css/styles.css?v=<?php echo time(); ?>" rel="stylesheet"> --}}
    <link rel=»canonical» href=»https://hvacopcostla.sarsoftware.com/»/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js" integrity="sha256-+8RZJua0aEWg+QVVKg4LEzEEm/8RFez5Tb4JBNiV5xA=" crossorigin="anonymous"></script>
    <style>
@import url('https://fonts.googleapis.com/css2?family=ABeeZee&family=Comfortaa&family=Dongle&family=Montserrat:wght@500;600&family=Rubik:wght@300&display=swap');

        .font-roboto{
            font-family: 'ABeeZee', sans-serif;
        }
    </style>
    @section('css')

    @show
    <title>HVACOPCOST Latinoamérica</title>
    <meta name="description" content="Herramienta para el cálculo de costos de operación en equipos de hvac">
    <meta name="keywords" content="Energía aire acondicionado, ahorro de energía en HVAC,
    Costos de energía en HVAC, y costo de energía aire acondicionado, enfriamiento, Latinoamérica,
    hvac Latinoamérica, Análisis ROI, retorno de inversión, costo operativo, ahorro financiero,
    valor financiero, propuesta aire acondicionado, propuesta hvac, comparar, tipos de sistemas,
    proyecto hvac, aire acondicionado, diferencia de costos, incremento de energía, ahorro energía,
    calcular, calculadora hvac, hvac calculadora">
</head>
<body>
   {{--  <div id="loader" class="">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div> --}}
    @section('content')

    @show
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <script src="{{asset('plugins/requirejs/require.js')}}"></script> --}}
   {{--  <script src="{{asset('plugins/jquery/jquery-3.6.0.min.js')}}"></script> --}}
   <script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
   <script src="{{asset('plugins/chartjs/dist/Chart.js')}}"></script>
    {{-- <script src="{{asset('plugins/rwdImageMaps/jquery.rwdImageMaps.min.js')}}" type="module"></script> --}}
    <script src="{{asset('js/resources.js?v=1.1')}}"></script>
    @section('js')

    @show
</body>
@include('main.footer')
</html>
