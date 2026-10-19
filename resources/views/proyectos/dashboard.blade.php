@extends('main.main')
@inject('tipo_usuario','app\Http\Controllers\ProjectController')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
{{-- <link rel="stylesheet" href="{{asset('css/indexpage.css')}}"> --}}
@endsection
@section('content')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
.botonF1{
  width:100px;
  height:40px;
  background:#102E52;
  right:0;
  bottom:0;
  top:120px;
  position:absolute;
  margin-right:30px;
  margin-bottom:16px;
  border:none;
  outline:none;
  color:#FFF;
  border-radius:10px;
  font-size:14px;
  box-shadow:0 3px 6px rgba(0,0,0,0.16),0 3px 6px rgba(0,0,0,0.23);
  transition:.3s;
  cursor:pointer;
}
span{
  font-size:14px;
  transition:.5s;
}
.botonF1:hover span{
  transform:rotate(360deg);
}
.botonF1:active{
  transform:scale(1.1);
}
.animacionVer{ transform:scale(1); }
.border-blue{
  border:2px;
  border-color:#1B17BB;
  border-radius:10px;
}
[x-cloak]{ display:none; }
[type="checkbox"]{
  box-sizing:border-box;
  padding:0;
}
.form-checkbox,
.form-radio{
  -webkit-appearance:none;
  -moz-appearance:none;
  appearance:none;
  -webkit-print-color-adjust:exact;
  color-adjust:exact;
  display:inline-block;
  vertical-align:middle;
  background-origin:border-box;
  -webkit-user-select:none;
  -moz-user-select:none;
  -ms-user-select:none;
  user-select:none;
  flex-shrink:0;
  color:currentColor;
  background-color:#fff;
  border-color:#e2e8f0;
  border-width:1px;
  height:1.4em;
  width:1.4em;
}
.form-checkbox{ border-radius:0.25rem; }
.form-radio{ border-radius:50%; }
.form-checkbox:checked{
  background-image:url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M5.707 7.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L7 8.586 5.707 7.293z'/%3e%3c/svg%3e");
  border-color:transparent;
  background-color:currentColor;
  background-size:100% 100%;
  background-position:center;
  background-repeat:no-repeat;
}
.form-radio:checked{
  background-image:url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
  border-color:transparent;
  background-color:currentColor;
  background-size:100% 100%;
  background-position:center;
  background-repeat:no-repeat;
}
input[type="number"]{ text-align:center; }
.hover-button-plus:hover{
  border:1px solid;
  border-color:white !important;
  padding:1px;
}
.btn_roundf,
.btn_roundf_retro{
  border:1px solid #3182ce;
  background:#3182ce;
  color:#ffff;
  border-radius:50%;
  width:30px;
  height:30px;
  z-index:90090;
  display:flex;
  align-content:center;
  justify-content:center;
  text-align:center;
  align-items:center;
  cursor:pointer;
}
.btn_roundf:hover,
.btn_roundf_retro:hover{
  border:1px solid #4299e1;
  background:#4299e1;
}
.btn_roundf:active,
.btn_roundf_retro:active{
  border:1px solid #3182ce;
  background:#3182ce;
}
.dropbtn{
  background-color:#0D124F;
  color:white;
  padding:.60rem;
  font-size:16px;
  border:none;
  cursor:pointer;
  border-radius:5px;
  margin-top:.5rem;
}
.dropbtn:hover,.dropbtn:focus{ background-color:#2980B9; }
.dropdown{ position:relative; display:inline-block; }
.dropdown-content{
  display:none;
  position:absolute;
  background-color:#f1f1f1;
  overflow:auto;
  box-shadow:0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index:1;
  cursor:pointer;
}
.dropdown-content a{
  color:black;
  padding:12px 16px;
  text-decoration:none;
  display:block;
}
.dropdown a:hover{ background-color:#ddd; }
.show{ display:block; }
.rounded_modal_ebergy_hvac{ border-radius:40px; }
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button{
  -webkit-appearance:none;
  margin:0;
}
.border-color-inps{ border-color:#1B17BB; }

.title_index{ color:#1B17BB !important; }
.text_blue{ color:#1B17BB !important; }
.labels{ font-size:11px; }
.labels_index{ font-size:14px; color:#2c5282 !important; }
.labels_index_mantenimiento{ font-size:19px; color:#1B17BB !important; }
.type_proyect_label{ font-size:14px; }
.unit_style{ font-size:1rem; }
.check_style{ width:20px; height:20px; }
.ancho{ width:100%; }
.mapa_img{ width:320px; height:520px; }

@media (max-width: 640px){
  .labels{ font-size:10px; }
  .labels_index{ font-size:12px; }
  .mapa_img{ width:300px; height:500px; }
  .title_index{ font-size:1.6rem; }
  .logo_hvacservice{ height:150px; width:450px; }
}
@media (min-width: 768px){
  .labels{ font-size:11px; }
  .labels_index{ font-size:13px; }
  .mapa_img{ width:320px; height:520px; }
  .title_index{ font-size:2rem; }
  .logo_hvacservice{ height:200px; width:500px; }
}
@media (min-width: 1280px){
  .labels{ font-size:14px; }
  .labels_index{ font-size:18px; }
  .mapa_img{ width:450px; height:650px; }
  .title_index{ font-size:2.2rem; }
  .logo_hvacservice{ height:300px; width:600px; }
}
@media (min-width: 1540px){
  .title_index{ font-size:2.5rem; }
  .mapa_img{ width:550px; height:700px; }
  .check_style{ width:30px; height:30px; }
  .logo_hvacservice{ height:300px; width:600px; }
}
@media (min-width: 1640px){
  .title_index{ font-size:2.5rem; }
  .mapa_img{ width:550px; height:700px; }
  .check_style{ width:30px; height:30px; }
  .logo_hvacservice{ height:300px; width:600px; }
}
@media (min-width: 1760px){
  .title_index{ font-size:2.5rem; }
  .mapa_img{ width:550px; height:700px; }
  .check_style{ width:30px; height:30px; }
  .logo_hvacservice{ height:300px; width:600px; }
}
@media (min-width: 1940px){
  .title_index{ font-size:2.5rem; }
  .mapa_img{ width:550px; height:700px; }
  .check_style{ width:30px; height:30px; }
  .logo_hvacservice{ height:300px; width:600px; }
}
.title_index{
        font-size: 2.6rem;
        color:#000 !important;"
    }
.border-dark{
    border-color: #000;
}
</style>
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
@inject('type_project','app\Http\Controllers\ProjectController')
@inject('check_types_p','app\Http\Controllers\ProjectController')
<div class="w-full flex justify-center">
    <div class="w-1/3 flex justify-start mt-3 ml-3" style="line-height: 30px; height:99px;">
        <button title="Regresar" class="bg-transparent mx-1 py-1 px-4 rounded-md font-roboto" onclick="window.location.href='/home'"><x-svg.back style="width:60px;height:60px;fill:#000"/></button>
    </div>
    <div class=" w-1/3 flex justify-center mt-10" style="line-height: 30px;">
        <h1 class="title_index font-bold font-roboto">Mis Proyectos</h1>
    </div>
    <div class="w-1/3 my-6 mr-2 flex justify-start h-1/3">
    </div>
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
<?php
$idm = App::getLocale();
?>
<div class="min-h-screen bg-[#f4f5f7] text-slate-900">
    <main class="mx-auto max-w-[1600px] px-4 py-8 lg:px-6">
        <section class="mb-2 grid gap-4 md:grid-cols-2 xl:grid-cols-8">
            <article class="rounded-2xl border border-dark bg-white p-2 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm uppercase tracking-wide text-slate-500">Mis Trabajos </p>
                        <p class="mt-2 text-3xl font-bold">{{$numero_proyectos}}</p>
                    </div>
                    <div class="rounded-xl p-3 text-black">
                        <i class="fa-solid fa-briefcase text-xl"></i>
                    </div>
                </div>
            </article>
            {{-- <article class="rounded-2xl border border-dark bg-white p-2 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm uppercase tracking-wide text-slate-500">Proyectos</p>
                        <p class="mt-2 text-3xl font-bold">{{ '0' }}</p>
                    </div>
                    <div class="rounded-xl bg-amber-100 p-3 text-amber-600">
                        <i class="fa-solid fa-folder-open text-xl"></i>
                    </div>
                </div>
            </article> --}}
            <article class="rounded-2xl border border-dark bg-white p-2 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm uppercase tracking-wide text-slate-500">Propiedades</p>
                        <p class="mt-2 text-3xl font-bold">{{$propiedades}}</p>
                    </div>
                    <div class="rounded-xl bg-emerald-100 p-3 text-emerald-600">
                      <i class="fa-solid fa-building text-xl"></i>
                    </div>
                </div>
            </article>
            {{-- <article class="rounded-2xl border border-dark bg-white p-2 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                      <p class="text-sm uppercase tracking-wide text-slate-500">Ventas</p>
                      <p class="mt-2 text-3xl font-bold">0</p>
                    </div>
                    <div class="rounded-xl bg-emerald-100 p-3 text-emerald-600">
                        <i class="fa-solid fa-circle-check text-xl"></i>
                    </div>
                </div>
            </article> --}}
        </section>
        <div class="w-full flex justify-end px-4 mb-2">
            <button title="Nuevo Proyecto" onclick="window.location.href='new_project'" class="bg-orange-500 hover:bg-orange-700 text-white font-bold px-3 py-2 rounded">
                Nuevo
            </button>
        </div>
        <section class="flex items-start gap-5">
            <div class="min-w-0 flex-1 self-start">
                <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                    <div class="flex items-center justify-end py-3 px-4 text-white" style="background-color:black;">
                    </div>
                    <div class="overflow-x-auto overflow-y-auto">
                        <table class="min-w-full table-auto text-left text-sm">
                            <thead style="background-color:black;" class="text-white text-xs uppercase tracking-wide text-slate-500">
                                <tr>
                                    <th class="px-4 py-3">Nombre del Proyecto</th>
                                    <th class="px-4 py-3">Tipo Edificio</th>
                                    <th class="px-4 py-3">Región</th>
                                    <th class="px-4 py-3">Ciudad</th>
                                    <th class="px-4 py-3">Tipo Proyecto</th>
                                    <th class="px-4 py-3">Fecha</th>
                                    <th class="px-4 py-3">Estatus</th>
                                    <th class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach ($proyectos as $project)
                                    <?php  $type_p=$type_project->type_project($project->id) ?>
                                    <?php  $check_types_pn=$check_types_p->check_p_type_pn(Auth::user()->id_empresa); ?>
                                    <?php  $check_types_pr=$check_types_p->check_p_type_pr(Auth::user()->id_empresa); ?>
                                    <?php  $check_types_m=$check_types_p->check_p_type_m(Auth::user()->id_empresa); ?>
                                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                        <td class="px-4 py-2">
                                            {{ $project->name }}
                                        </td>
                                        <td class="px-4 py-2">
                                            {{$project->tipo_edi}}
                                        </td>
                                        <td class="px-4 py-2">
                                            {{$project->region}}
                                        </td>
                                        <td class="px-4 py-2">
                                            {{$project->ciudad}}
                                        </td>
                                        <td class="px-4 py-2">
                                            @if ($project->type_p == 2 )
                                            {{ __('index.proyecto retrofit') }}
                                            @endif

                                            @if ($project->type_p == 1 ||  $project->type_p == 0)
                                            {{ __('index.proyecto nuevo') }}
                                            @endif

                                            @if ($project->type_p == 3)
                                            {{ __('index.type_man') }}
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">
                                            {{$project->created_at}}
                                        </td>
                                        <td class="px-4 py-2">
                                            @if ($project->status == 1)
                                            <span class="px-2 inline-flex text-md leading-5 font-semibold rounded-full bg-green-500 text-white">{{ __('index.activo') }}</span>
                                            @endif
                                            @if ($project->status == 2)
                                            <span class="px-2 inline-flex text-md leading-5 font-semibold rounded-full bg-red-500 text-white">{{ __('index.inactivo') }}</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">
                                            @if ($type_p->type_p < 2 )
                                            <button title="Ver Resultados" class="p-1 bg-blue-600 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600"><a href="project/{{$project->id}}" target="_blank" rel="noopener noreferrer"><i class="far fa-eye"></i></a></button>
                                            @endif

                                            @if ($type_p->type_p == 2)
                                            <button title="Ver Resultados" class="p-1 bg-blue-600 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600"><a href="resultados_retrofit/{{$project->id}}" target="_blank" rel="noopener noreferrer"><i class="far fa-eye"></i></a></button>
                                            @endif

                                            @if ($project->type_p == 3)
                                                <?php  $user_master=Auth::user()->tipo_user?>
                                                @if ($user_master == 2 || $user_master == 5)
                                                <button title="Coordinacion" class="p-1 bg-blue-400 rounded-md hover:bg-blue-600 text-white font-roboto action:bg-blue-600"><a href="coordinacion/{{$project->id}}" target="_blank" rel="noopener noreferrer"><i class="fas fa-list"></i></a></button>
                                                @endif
                                            @else

                                            @endif
                                            <button title="Editar" class="p-1 bg-blue-400 rounded-md hover:bg-blue-600 text-white font-roboto action:bg-blue-600"><a href="edit_project/{{$project->id}}" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-pen-to-square"></i></a></button>
                                            <button  onclick="elimiinar_project('{{$project->id}}','del_project');" class="p-1  bg-orange-400 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600"><a><i class="fas fa-trash"></i></a></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="flex justify-end mt-5 mb-5">
                            {{ $proyectos->withQueryString()->links() }}
                        </div> --}}
                    </div>
                </article>
            </div>
        </section>
    </main>
</div>
@endsection
@section('js')
<?php echo '<script src="../../js/index.js?v='.time().'"></script>'; ?>
@endsection
