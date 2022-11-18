@extends('main.main')

@section('css')
<link href="{{asset('plugins/chartjs/dist/Chart.css')}}" rel="stylesheet" media="all">
<style>
    .center #content tr {
    line-height: 35px !important;
}
</style>
@endsection

@section('content')
<div id="blur" class="blur">
    @include('main.topbar')
        <div class="center">
            <table class="hidden">
                <tr>
                    <td><b>Periodo de tiempo</b></td>
                    <td>Desde: </td>
                    <td>
                        <input class="fcontrol flatpickr flatpickr-input" style="margin-top: 10px" type="text" name="fechaDia1" id="fechaDia1" placeholder="seleccione fecha" readonly="readonly">

                    </td>
                    <td>Hasta: </td>
                    <td>
                        <input class="fcontrol flatpickr flatpickr-input" style="margin-top: 10px" type="text" name="fechaDia2" id="fechaDia2" placeholder="seleccione fecha" readonly="readonly">

                    </td>
                    <td><b>Factor(Filtro)</b></td>
                    <td>
                        <select name="" id="" class="fcontrol" style="margin-top: 10px">
                            <option value="1">opcion 1</option>
                            <option value="2">opcion 2</option>
                            <option value="3">opcion 3</option>
                            <option value="4">opcion 4</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <div class="center" id="resultadoContent">
            <div class="static-content bannerDown bleft lhide">
                <a href="https://www.sofanoralarcon.com/" target="_blak"><img src="{{asset('assets/images/banners/sa.jpg')}}" alt="Sofanor Alarcon"></a>
            </div>
            <div class="static-content bannerDown bright rhide">
                <a href="https://www.universidadhvac.com/programa-de-capacitaciones-tecnicos" target="_blank"><img src="{{asset('assets/images/banners/tecnicos.jpg')}}" alt="Capacitacion tecnicos hvac"></a>
            </div>
            <section id="content" style="text-align: -webkit-center;">
                <table id="tabla-resultados" style="width: 90%">
                    <tr >
                        <td  colspan="6" style="text-align: right;"><label style="color: rgb(122, 120, 120); font-size: 18px;">Región: {{ $region }}</label></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="table-header">Valores</td>
                    </tr>
                    <tr>
                        <td class="cooling" colspan="6"><h2>ENFRIAMIENTO</h2></td>
                        {{-- <td class="heating" colspan="4"><h2>CALEFACCIÓN</h2></td> --}}
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 48%"><strong>Tarifa electrica:</strong></td>
                        <td colspan="2"><label for="" id="cTarifa">{{$cTarifa}}</label> $/Kw</td>
                        {{-- <td><strong>Tarifa de gas:</strong></td>
                        <td>{{$hTarifa}}</td> --}}
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Horas de enfriado:</strong></td>
                        <td colspan="2"><label for="" id="hrsEnfriado">{{$hrsEnfriado}}</label></td>
                        {{-- <td>Horas de calefacción:</td>
                        <td>{{$dDays}}</td> --}}
                    </tr>
                    <tr>
                        <td colspan="2"><h2 style="background-color: #e3e5e5;">SOLUCIÓN 1</h2></td>
                        <td colspan="2"><h2 style="background-color: #e3e5e5;">SOLUCIÓN 2</h2></td>
                        <td colspan="2"><h2 style="background-color: #e3e5e5;">SOLUCIÓN 3</h2></td>
                        {{-- <td colspan="4"><h2>CALEFACCIÓN - ACTUAL</h2></td> --}}
                    </tr>
                    <tr>
                        <label for="" id="cUnidad" class="hidden">{{$cUnidad}}</label>
                        <td>Capacidad del equipo:</td>
                        <td><label for="" id="cSize">{{$cSize}}</label>  {{$cUnidadLbl}}</td>
                        <label for="" id="cUnidad" class="hidden">{{$cUnidad}}</label>
                        <td>Capacidad del equipo:</td>
                        <td><label for="" id="cSize2">{{$cSize2}}</label>  {{$cUnidadLbl}}</td>
                        <td>Capacidad del equipo:</td>
                        <td><label for="" id="cSize2">{{$cSize3}}</label>  {{$cUnidadLbl}}</td>
                    </tr>
                    <tr>
                        <td>{{$csStd}}:</td>
                        <td><label for="" id="csStdValue">{{$csStdValue}}</label></td>
                        <td>{{$csStd}}:</td>
                        <td><label id="cheStdValue">{{$cheStd}}</label></td>
                        <td>{{$csStd}}:</td>
                        <td><label id="cheStdValue">{{$cheStd}}</label></td>
                        {{-- <td>AFUE:</td>
                        <td>{{$hsStd}}</td> --}}
                    </tr>
                    <tr>
                        <label class="hidden" id="csTipo">{{$csTipoValue}}</label>
                        <td>Tipo de sistema:</td>
                        <td>{{$csTipo}}</td>
                        <label class="hidden" id="cheTipo">{{$cheTipoValue}}</label>
                        <td>Tipo de sistema:</td>
                        <td>{{$cheTipo}}</td>
                        <td>Tipo de sistema:</td>
                        <td>{{$cheTipo}}</td>
                        {{-- <td>Tipo de sistema:</td>
                        <td>{{$hsTipo}}</td> --}}
                    </tr>
                    <tr>
                        <label class="hidden" id="csDisenio">{{$csDisenio}}</label>
                        <td>Diseño:</td>
                        <td>{{$lblCsDisenio}}</td>
                        <label class="hidden" id="cheDisenio">{{$cheDisenio}}</label>
                        <td>Diseño:</td>
                        <td>{{$lblCheDisenio}}</td>
                        {{-- <td>Diseño:</td>
                        <td>xxx</td> --}}
                    </tr>
                    <tr>
                        <label class="hidden" id="csMantenimiento">{{$csMantenimiento}}</label>
                        <td>Mantenimiento:</td>
                        <td>{{$lblCsMantenimiento}}</td>
                        <label class="hidden" id="cheMantenimiento">{{$cheMantenimiento}}</label>
                        <td>Mantenimiento:</td>
                        <td>{{$lblCheMantenimiento}}</td>
                        <td>Mantenimiento:</td>
                        <td>{{$lblCheMantenimiento}}</td>
                        {{-- <td>Mantenimiento:</td>
                        <td>xxx</td> --}}
                    </tr>
                    <tr>
                        <td style="padding-bottom: 18px">Valor estimado del sistema:</td>
                        <td style="padding-bottom: 18px"><label id="cheValorS">${{$cheValorS}}</label></td>
                        <td style="padding-bottom: 18px">Valor estimado del sistema:</td>
                        <td style="padding-bottom: 18px"><label id="cheValorS2">${{$cheValorS2}}</label></td>
                        <td style="padding-bottom: 18px">Valor estimado del sistema:</td>
                        <td style="padding-bottom: 18px"><label id="cheValorS2">${{$cheValorS2}}</label></td>
                    </tr>
                    {{-- <tr>
                        <td colspan="4"><h2 style="background-color: #e3e5e5;">PROPUESTO</h2></td>
                    </tr>
                    <tr>
                        <td colspan="2">Capacidad del equipo:</td>
                        <td colspan="2"><label for="" id="cSize2">{{$cSize2}}</label>  {{$cUnidadLbl}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">{{$csStd}}:</td>
                        <td colspan="2"><label id="cheStdValue">{{$cheStd}}</label></td>
                    </tr>
                    <tr>
                        <td colspan="2">Tipo de sistema:</td>
                        <td colspan="2">{{$cheTipo}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Diseño:</td>
                        <td colspan="2">{{$lblCheDisenio}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Mantenimiento:</td>
                        <td colspan="2">{{$lblCheMantenimiento}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-bottom: 18px">Valor estimado del sistema:</td>
                        <td colspan="2" style="padding-bottom: 18px"><label id="cheValorS2">${{$cheValorS2}}</label></td>
                    </tr> --}}
                    <tr>
                        <td colspan="6" class="table-header">Resultados</td>
                    </tr>
                    <tr>
                        <td colspan="6"><h3>ENFRIAMIENTO - SOLUCIÓN 1</h3></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Costo de operación por año:</b></td>
                        <td colspan="2">$ <label for="" id="resultadoCs" class="result"></label></td>
                    </tr>
                    <tr>
                        <td colspan="6"><h3>ENFRIAMIENTO - SOLUCIÓN 2</h3></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Costo de operacion por año:</b></td>
                        <td colspan="2">$ <label for="" id="resultadoChe" class="result"></label></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-top: 15px"><b>Diferencia de costos (Sol. 1 - Sol. 2.)</b></td>
                        <td colspan="2">$ <label for="" id="diferencia" style="font-weight: bold; color: green" class="result"></label></td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td colspan="6" style="padding-top: 10px">Incremento anual de energía eléctria: <input type="number" step="0.01" id="porcentaje" style="max-width: 55px" value="6"> %<button class="btn btn-primary" onClick="recalcular()" style="font-size: 9px; padding: 10px !important; position: relative; left: 4px; bottom: 2px"><i class="fa fa-refresh" aria-hidden="true"></i></button></td>
                    </tr>
                    <tr >
                            <td colspan="6" class="result" style="position: relative; top: 15px">
                                <span style="position: relative;right: 152px;top: 146px;">$</span>
                                COSTO SOLUCIÓN 1 vs SOLUCIÓN 2
                            </td>
                    </tr>
                    <tr style="text-align: -webkit-center">
                        <td colspan="6">
                            <canvas id="myChart2" style="max-height: 335px; max-width: 670px; margin-top: -20px"></canvas>
                        </td>
                    </tr>

                    <tr >
                        <td colspan="6" class="result" style="position: relative; top: 15px">
                            <span style="position: relative;right: 209px;top: 146px;">$</span>
                            Ahorro Acumulado
                        </td>
                    </tr>
                    <tr style="text-align: -webkit-center">
                        <td colspan="6">
                            <canvas id="myChart3" style="max-height: 335px; max-width: 670px; margin-top: -20px; "></canvas>
                        </td>
                    </tr>

                    <tr >
                            <td colspan="6" class="result" style="padding-top: 5px; position: relative; top: 10px">Retorno de la Inversión</td>
                    </tr>
                    <tr style="text-align: -webkit-center">
                        <td colspan="6">
                            <canvas id="myChart" style="max-height: 300px; max-width: 600px; margin-top: -15px"></canvas>
                        </td>
                    </tr>
                    {{-- <tr>
                        <td colspan="4">Aumento en el valor de la vivienda:</td>
                        <td colspan="2">*</td>
                    </tr>
                    <tr>
                        <td colspan="4">(*Basado en estudios recientes del gobierno)</td>
                    </tr> --}}

                </table>
            </section>
            <div class="bloque">
                <i>*Descargo de responsabilidad: Los costos reales varían de acuerdo con las condiciones climáticas y el uso. Esta información está destinada
                    únicamente a fines comparativos. Esta calculadora no debe usarse para determinar el tamaño de una nueva unidad HVAC, está diseñada para fines
                    de comparación de costos.
                </i>
            </div>
            <div class="bloque">
                <button class="btn btn-secondary" id="btn-imprimir">Imprimir</button>
                <a class="btn" {{-- href="/?with data=true" --}} href="/home">Atras</a>
            </div>
        </div>
    </div>
@endsection
@section('js')
<?php
     /*    echo '  <script src="../../js/resultados.js?v='.time().'"></script>' */
    ?>
@endsection
