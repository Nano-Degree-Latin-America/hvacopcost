@extends('main.main')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
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
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

<div class="w-full flex justify-center">
    <div class="w-1/3 flex justify-start mt-3 ml-3" style="line-height: 30px; height:99px;">
        <button title="Regresar" class="bg-transparent mx-1 py-1 px-4 rounded-md font-roboto" onclick="window.location.href='/home'"><x-svg.back style="width:60px;height:60px;fill:#000"/></button>
    </div>
    <div class=" w-1/3 flex justify-center mt-10" style="line-height: 30px;">
        <h1 class="title_index font-bold font-roboto">Clientes y Propiedades</h1>
    </div>
    <div class="w-1/3 my-6 mr-2 flex justify-start h-1/3">
    </div>
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
<div class="w-full flex justify-end px-4 mb-2">
    <button onclick="mostrar_modal('modal_add_propiedad');traer_categorias_edificio_propiedad();" class="bg-orange-500 hover:bg-orange-700 text-white font-bold px-3 py-2 rounded mr-2">
        Nuevo
    </button>
</div>
<section class="flex items-start gap-5 mx-auto max-w-[1600px] px-4 py-1 lg:px-6">
    <div class="min-w-0 flex-1 self-start">
        <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="flex items-center justify-end py-2 px-3 text-white" style="background-color:black;">

            </div>
            <div class="overflow-x-auto overflow-y-auto p-0">
                <table class="min-w-full table-auto text-left text-sm">
                    <thead style="background-color:black;" class="text-xs text-white uppercase tracking-wide text-slate-500">
                        <tr>
                            <th class="px-4 py-3">Cliente</th>
                            <th class="px-4 py-3">Propiedad</th>
                            <th class="px-4 py-3">Categoría Edificio</th>
                            <th class="px-4 py-3">Años Edificio</th>
                            {{-- <th class="px-4 py-3">Estatus</th> --}}
                            <th class="px-4 py-3">Dirección</th>
                            <th class="px-4 py-3">Distancia</th>
                            <th class="px-4 py-3">Ciudad</th>
                            {{-- <th class="px-4 py-3">Código Postal</th> --}}
                            <th class="px-4 py-3">Contacto</th>
                            <th class="px-4 py-3">Teléfono</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($propiedades as $propiedad)
                            <tr>
                                <td class="px-4 py-2">{{ $propiedad->cliente}}</td>
                                <td class="px-4 py-2">{{ $propiedad->name}}</td>
                                <td class="px-4 py-2 uppercase">{{ $propiedad->categorias_edificios_name}}</td>
                                <td class="px-4 py-2">{{ $propiedad->yrs_edificio}}</td>
                                {{-- <td class="px-4 py-2 uppercase">{{ $propiedad->estatus}}</td> --}}
                                <td class="px-4 py-2">{{ $propiedad->direccion}}</td>
                                <td class="px-4 py-2">{{ $propiedad->distancia}} kms</td>
                                <td class="px-4 py-2">{{ $propiedad->ciudad}}</td>
                                {{-- <td class="px-4 py-2">{{ $propiedad->codigo_postal}}</td> --}}
                                <td class="px-4 py-2">{{ $propiedad->contacto}}</td>
                                <td class="px-4 py-2">{{ $propiedad->telefono}}</td>
                                <td class="px-4 py-2">{{ $propiedad->email}}</td>
                                <td class="px-4 py-2">
                                    <button onclick="traer_categorias_edificio_propiedad();edit({{$propiedad->id}});" title="Editar" class="p-1 bg-blue-400 rounded-md hover:bg-blue-600 text-white">
                                          <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button onclick="delete_propiedad('{{$propiedad->id}}');"
                                    class="p-1 bg-orange-400 rounded-md hover:bg-orange-600 text-white">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('propiedades.modal_add_propiedad')
            @include('propiedades.modal_add_propiedad_edit')
        </article>
    </div>
</section>

<script>
    function save_propiedad(){
        var token = $("#token").val();
        var formData = {};
        $("input[name$='nombre'], input[name$='cliente'], select[name$='categoria'], input[name*='yrs_edificio'], input[name*='contacto'], input[name*='telefono'], input[name*='direccion'], select[name$='estatus'], input[name*='distancia'], input[name*='ciudad'], input[name*='estado'], input[name*='email'], input[name*='codigo_postal'], textarea[name*='datos_factura']").each(function() {
            formData[$(this).attr('name')] = $(this).val();
        });
        var id_empresa = '{{$id_empresa}}';
        $.ajax({
            url: '/save_propiedad/'+id_empresa,
            type: 'POST',
            data: formData,
            headers: { 'X-CSRF-TOKEN': token },
            success: function(response) {
                Swal.fire(
                            'Guardado!',
                            'El registro ha guardado.',
                            'success'
                        )
                setTimeout(function () { location.reload() }, 500);
                ocultar_modal('modal_configuraciones');

            },
            error: function(xhr, status, error) {
                console.error('Error al enviar los datos:', error);
            }
        });
    }
    function edit(id){
        var token = $("#token").val();
        var formData = {};
        $("input[name$='nombre'], input[name$='cliente'], select[name$='categoria'], input[name*='yrs_edificio'], input[name*='contacto'], input[name*='telefono'], input[name*='direccion'], select[name$='estatus'], input[name*='distancia'], input[name*='ciudad'], input[name*='estado'], input[name*='email'], input[name*='codigo_postal'], textarea[name*='datos_factura']").each(function() {
            formData[$(this).attr('name')] = $(this).val();
        });
        $.ajax({
            type: 'get',
            url: '/get_propiedad/'+id,
            headers: { 'X-CSRF-TOKEN': token },
            success: function (response) {
                $('#nombre_edit').val(response.name);
                $('#id_edit').val(response.id);
                $('#cliente_edit').val(response.cliente);
                $("#categoria_edit").find('option[value="' + response.categoria + '"]').prop("selected", "selected");
                $("#estatus_edit").find('option[value="' + response.estatus + '"]').prop("selected", "selected");
                $('#contacto_edit').val(response.contacto);
                $('#yrs_edificio_edit').val(response.yrs_edificio);
                $('#contacto_edit').val(response.contacto);
                $('#telefono_edit').val(response.telefono);
                $('#distancia_edit').val(response.distancia+' kms');
                $('#direccion_edit').val(response.direccion);
                $('#ciudad_edit').val(response.ciudad);
                $('#estado_edit').val(response.estado);
                $('#email_edit').val(response.email);
                $('#codigo_postal_edit').val(response.codigo_postal);
                $('#datos_factura_edit').val(response.comentarios);
                $('#modal_add_propiedad_edit').removeClass('hidden');

            },
            error: function(xhr, status, error) {
                console.error('Error al enviar los datos:', error);
            }
        });
    }
    function update_propiedad(id){
        var token = $("#token").val();
        var formData = {};
         $("input[name$='nombre_edit'], input[name$='cliente_edit'], select[name$='categoria_edit'], input[name*='yrs_edificio_edit'], input[name*='contacto_edit'], input[name*='telefono_edit'], input[name*='direccion_edit'], select[name$='estatus_edit'], input[name*='distancia_edit'], input[name*='ciudad_edit'], input[name*='estado_edit'], input[name*='email_edit'], input[name*='codigo_postal_edit'], textarea[name*='datos_factura_edit']").each(function() {
            formData[$(this).attr('name')] = $(this).val();
        });
        $.ajax({
            url: '/edit_propiedad/'+id,
            type: 'POST',
            data: formData,
            headers: { 'X-CSRF-TOKEN': token },
            success: function(response) {
                Swal.fire(
                            'Guardado!',
                            'El registro ha guardado.',
                            'success'
                        )
                setTimeout(function () { location.reload() }, 500);
                ocultar_modal('modal_configuraciones');

            },
            error: function(xhr, status, error) {
                console.error('Error al enviar los datos:', error);
            }
        });
    }
    function traer_categorias_edificio_propiedad(){
        $.ajax({
            type: 'get',
            url: '/get_cat_edi',
            dataType: 'json',
            data: {
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            success: function (response) {
            $('#categoria').empty();
            $('#categoria').append($('<option>', {
                value: '',
                text: '-Seleccionar-'
            }));
                response.map((cat_ed, i) => {
                    $('#categoria').append($('<option>', {
                        value: cat_ed.id,
                        text: cat_ed.name
                    }));
                });

                $('#categoria_edit').empty();
            $('#categoria_edit').append($('<option>', {
                value: '',
                text: '-Seleccionar-'
            }));
                response.map((cat_ed, i) => {
                    $('#categoria_edit').append($('<option>', {
                        value: cat_ed.id,
                        text: cat_ed.name
                    }));
                });

            },
            error: function (responsetext) {

            }
        });
    }
    function delete_propiedad(id) {
        Swal.fire({
            title: '¿Eliminar Propiedad?',
            text: "Se eliminara la propiedad",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: 'orange',
            confirmButtonText: 'Eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                // var route = ruta_global + "/" + aux + "/" + id + "";
                var token = $("#token").val();
                $.ajax({
                    url: "/propiedad/"+ id,
                    headers: { 'X-CSRF-TOKEN': token },
                    type: 'delete',
                    dataType: 'json',
                    success: function () {
                        Swal.fire(
                            'Eliminado!',
                            'El registro se ha eliminado.',
                            'success'
                        )
                    }
                });

                setTimeout(function () { location.reload() }, 1000);

                //location.reload();
            }
        })
    }
</script>
@endsection
@section('js')
<?php
echo '<script src="../../js/index.js?v='.time().'"></script>';
?>
@endsection
