<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Desprosoft Hvacopcost</title>

  <script src="https://kit.fontawesome.com/48aa4aa0c4.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
  <!-- Tailwind is included -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="{{asset("assets/styles_layout/css/main.css")}}">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png"/>
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6"/>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-130795909-1');
  </script>
  <script src="{{asset("js/script.js")}}"></script>

</head>
<body>
<div id="app">

<nav id="navbar-main" class="navbar is-fixed-top">

  <div class="navbar-brand is-right">
    <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
      <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
    </a>
  </div>
  <div class="navbar-menu" id="navbar-menu">
    <div class="navbar-end">

      <div class="navbar-item dropdown has-divider has-user-avatar">
        <a class="navbar-link">

          <div class="is-user-name"><span>{{Auth::user()->name}}</span></div>
          <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
        </a>
        <div class="navbar-dropdown">
          <a href="profile.html" class="navbar-item">
            <span class="icon"><i class="mdi mdi-account"></i></span>
            <span>My Profile</span>
          </a>
          <hr class="navbar-divider">

          <a class="navbar-item" href="{{ route('cerrar_session') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
              <button class="">
                  Cerrar Sesión
                  </button>
          </a>
          <form id="logout-form" action="{{ route('cerrar_session') }}" method="POST" class="d-none">
              @csrf
          </form>

        </div>
      </div>

      <a title="Log out" class="navbar-item desktop-icon-only">
        <span class="icon"><i class="mdi mdi-logout"></i></span>
        <span>Cerrar sesion</span>
      </a>
    </div>
  </div>
</nav>

<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>

     <b>Admin</b>
    </div>
  </div>
  <div class="menu is-menu-main">
    <p class="menu-label">General</p>
    <ul class="menu-list">
      <li>
        <a class="dropdown">
          <span class="icon"><i class="mdi mdi-view-list"></i></span>
          <span class="menu-item-label">Menu</span>
          <span class="icon"><i class="mdi mdi-plus"></i></span>
        </a>
        <ul>
          <li>
            <a href="/empresas">
              <span>Empresas</span>
            </a>
          </li>

          <li>
            <a href="/users">
              <span>Usuario</span>
            </a>
          </li>

          <li>
            <a href="/home">
              <span>Nuevo Proyecto</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
 {{--  <li>
        <a href="login.html">
          <span class="icon"><i class="mdi mdi-lock"></i></span>
          <span class="menu-item-label">Login</span>
        </a>
      </li> --}}
  </div>
</aside>
<main class="py-4">
    @yield('content')
</main>
</div>

<!-- Scripts below are for demo only -->
{{-- <script type="text/javascript"  src="js/main.min.js?v=1628755089081"></script> --}}

<script src="{{asset('js/styles_layout/js/main.min.js')}}"></script>
<script src="{{asset('js/styles_layout/js/chart.sample.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>




<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
@yield('javascript')
</body>
</html>
