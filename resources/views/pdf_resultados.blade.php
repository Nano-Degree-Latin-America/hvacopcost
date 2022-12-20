<!DOCTYPE html>
@inject('solutions','app\Http\Controllers\ResultadosController')
@inject('results','app\Http\Controllers\ResultadosController')
@inject('smasolutions','app\Http\Controllers\ResultadosController')
@inject('sumacap_term','app\Http\Controllers\ResultadosController')
<html lang="es">

   <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link rel="stylesheet" href="../assets/css/style.css" media="all" />
    <style>

   @import url('https://fonts.googleapis.com/css2?family=ABeeZee&family=Comfortaa&family=Dongle&family=Montserrat:wght@500;600&family=Rubik:wght@300&display=swap');
   @import url('https://fonts.googleapis.com/css2?family=ABeeZee&family=Comfortaa&family=Dongle&family=Montserrat:wght@500;600&family=Rubik:wght@300&display=swap');

   .font-roboto{
    font-family: 'ABeeZee', sans-serif;
}
.tarjet {
  background-color:#edf2f7;
  width: 100%;
  border-radius: 1% 1% 1% 1%;
  display: grid;
}

.title_tarjet {
  background-color:#ed8936;
  width: 100%;
  border-radius: 1% 1% 0% 00%;
}

.title_style{
    font-size: 1.3rem;
    color: white;
    font-family: 'ABeeZee', sans-serif;
    font-weight: bold;
}

.container{
    width: 100%;
    display: flex;
}

.info_project_size_font{
    font-size: 13px;
    color:#2c5282;
    font-family: 'ABeeZee', sans-serif;
    font-weight: bold;
    padding:10px;
}

.solutions_style_titles{
    font-size: 30px;
    color:white;
    font-family: 'ABeeZee', sans-serif;
    font-weight: bold;
    background-color:blue;
    padding:10px;
    width: 100%;
    margin: 10px;
}



/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33%;
}

/* Clear floats after the columns */
.tr_style{
    width:100% !important;

}

.td_style{
    width:50% !important;
}

	</style>
</head>

<body>

    <header class="clearfix">
    </header>

    <div class="tarjet">
        <div align="center" class="title_tarjet">
            <label  class="title_style">ANÁLISIS ENERGÉTICO - ENFRIAMIENTO</label>
        </div>
        <?php  $tar_ele=$solutions->tar_elec($id_project) ?>
        <div>
            <table class="">
                <tbody>
                  <tr>
                    <td class="info_project_size_font"><label for="">Nombre:</label> <label style="color:#3182ce;">{{substr($tar_ele->name, 0,25)}}</label></td>
                    <td class="info_project_size_font"><label for="">País:</label> <label style="color:#3182ce;">{{$tar_ele->region}}</label></td>
                    <td class="info_project_size_font"><label for="">Ciudad:</label> <label style="color:#3182ce;">{{$tar_ele->ciudad}}</label></td></td>
                    <td class="info_project_size_font"><label for="">Categoría Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->cad_edi}}</label></td></td>
                    <td class="info_project_size_font"><label for="">Área:</label> <label style="color:#3182ce;">{{number_format($tar_ele->area)}}</label></td></td>
                  </tr>

                </tbody>
              </table>
              <table class="">
                <tbody>
                    <tr>
                        <td class="info_project_size_font"><label for="">Tipo Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->tipo_edi}}</label></td>
                        <td></td>
                        <td class="info_project_size_font"><label for="">Horas Enfriamiento Anual:</label> <label style="color:#3182ce;">{{number_format($tar_ele->coolings_hours)}}</label></td>
                        <td></td>
                        <td class="info_project_size_font"><label for="">Tarifa Elécrtica:</label> <label style="color:#3182ce;">{{$tar_ele->costo_elec}} $/Kwh</label></td></td>
                      </tr>

                </tbody>
              </table>

        </div>
    </div>

    <div style="margin-top:5px; height:85%;" class="tarjet">
        <?php  $solutions=$solutions->solutions($id_project) ?>
        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;background-color: #2c5282;border_radius:5px;">
                        <label style="margin-left:40px;" class="title_style">Solución Base</label>
                    </div>
                    <table class="">
                        <tbody style="width: 100%;">
                            @foreach ($solutions as $solution)
                            <tr class="tr_style">
                                @if ($solution->num_sol == 1 && $solution->num_enf == 1)
                                    <td class="td_style">Capacidad Térmica</td>
                                    <td class="td_style">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</td>
                                @endif
                            </tr>
                          <tr class="tr_style">
                            @if ($solution->num_sol == 1 && $solution->num_enf == 1)
                            <td class="td_style">{{$solution->eficencia_ene}}</td>
                            <td class="td_style">{{$solution->eficencia_ene_cant}}</td>
                            @endif
                          </tr>
                          <tr class="tr_style">
                            @if ($solution->num_sol == 1 && $solution->num_enf == 1)
                            <td class="td_style">Sistemas HVAC</td>
                            @endif
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>

            </div>

            <div>
                <div style="background-color: #4299e1;margin-top:5px;border_radius:5px;" class="column" >
                    <div style="width:100%;">
                        <label style="margin-left:45px;" class="title_style">Solución A</label>
                    </div>

                </div>
            </div>

            <div>
                <div style="background-color:#4299e1;margin-left:5px;margin-top:5px;border_radius:5px;" class="column" >
                    <div style="width:100%;">
                        <label style="margin-left:45px;" class="title_style">Solución B</label>
                    </div>

                </div>
            </div>


        </div>

    </div>
</body>
</html>
