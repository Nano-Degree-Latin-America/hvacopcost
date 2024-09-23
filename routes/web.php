<?php
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/home', 'IndexController@check_user')->name('home');

Route::get('/', 'HomeController@redirect_login');

Route::get('check_usr/{email}', 'UserController@check_usr')->name('check_usr');

/* Route::get('/prueba', function () {
    // if (Session::get('idUsuario'))
    // {
        return view('home');
    // }else{
    //     return view('login');
    // }
})->name('prueba');

Route::get('/settings', function () {
     if (Session::get('id'))
     {
        return view('settings');
     }else{
         return view('login');
    }
})->name('settings');
Route::get('/resultados', function () {
    // if (Session::get('idUsuario'))
    // {
        return view('index');
    // }else{
    //     return view('login');
    // }
})->name('resultados2');

Route::get('/lo_gin', function () {
    return view('login');
})->name('lo_gin'); */



Route::get('valida_email', 'UserController@valida_email');

Route::post('reg_ister', 'UserController@reg_ister')->name('reg_ister');
//-----------Login/logout--------------------
Route::post('/lo_gin', 'UserController@lo_gin')->name('lo_gin');

Route::get('/lo_gout', 'UserController@lo_gout')->name('lo_gout');




//rutas index
Route::post('/getPaises','IndexController@getPaises')->name('getPaises');
Route::post('/getCiudades','IndexController@getCiudades');
Route::post('/getDegreeHrs','IndexController@getdegreeHrs');
Route::get('/getDegreeHrsadd/{id}','IndexController@getDegreeHrsadd');

Route::get('check_date_2_0/{id_project}','IndexController@check_date_2_0');
// rutas resultados
Route::post('/resultados','ResultadosController@getResultados')->name('resultados');

//rutas resources y user controller
Route::get('/users_admin_hvaccopcostla/{$id}', 'UserController@index')->name('index');;
Route::get('/users/create/', 'UserController@create');
Route::get('/users_edit/{id}', 'UserController@edit');
Route::get('/del_usr/{id}', 'UserController@delete')->name('delete');
Route::get('/eliminar_usr/{id}', 'UserController@eliminar_usr')->name('eliminar_usr');
Route::get('/check_mail/{mail}', 'HomeController@check_mail');

Route::post('/edit_usr/{id}', 'UserController@update')->name('update');
Route::post('users_store', 'UserController@users_store')->name('users_store');
Route::post('/getLogo','UserController@getLogo');
Route::post('/actualizarLogo','UserController@actualizarLogo')->name('setLogo');
Route::get('/users', 'UserController@users')->name('users');
//rutas settings
Route::post('/setDegreeHrs','SettingsController@setDegreeHrs');


Route::get('/homeee', 'HomeController@index')->name('homeee');
// Lobby
Route::get('lobby_admin', 'LobbyController@index');

// Lobby
Route::resource('empresas', 'EmpresasController');
Route::get('create_empresa', 'EmpresasController@create');
Route::get('edit_empresa/{id}', 'EmpresasController@edit');
Route::get('change_empresa/{id}', 'EmpresasController@change_empresa');
Route::get('change_pais/{id_empresa}/{pais}', 'EmpresasController@change_pais');
Route::get('change_type_project/{id_empresa}/{tyoe_p}', 'EmpresasController@change_type_project');
Route::get('delete_empresa/{id}', 'EmpresasController@delete_empresa');
Route::get('add_marcas_empresas', 'EmpresasController@add_marcas_empresas');
Route::get('add_marcas_empresasvrf', 'EmpresasController@add_marcas_empresasvrf');
Route::get('add_marcas_empresaschillers', 'EmpresasController@add_marcas_empresaschillers');
Route::get('add_genericos', 'EmpresasController@add_genericos');
Route::get('delete_marcas_empresa/{value}', 'EmpresasController@delete_marcas_empresa');
//sucursales
Route::get('sucursales_emp/{id}', 'SucursalesController@sucursales_empresa');
Route::resource('sucursales', 'SucursalesController');
Route::get('create_sucursal/{id}', 'SucursalesController@create');
Route::get('sucursal_empresa_edit/{id}', 'SucursalesController@edit');
// projects
Route::get('project/{id_project}', 'ResultadosController@project');
Route::get('get_cat_edi', 'ProjectController@categories_paieses')->name('get_cat_edi');
Route::get('get_cat_edi/{id}', 'ProjectController@get_cat_edi');
Route::get('mis_projectos', 'ProjectController@mis_projectos')->name('mis_projectos');
Route::get('porcents_aux/{id}', 'ProjectController@porcents_aux');
Route::get('edit_project/{id_project}', 'ResultadosController@edit_project');
Route::get('get_ciudades/{pais}', 'ProjectController@get_ciudades');
Route::get('get_ciudades_Edit/{pais}', 'ProjectController@get_ciudades_Edit');
Route::post('/edit_project/{id}', 'ProjectController@edit_project')->name('edit_project');
Route::get('traer_unidad_hvac/{id_project}/{num_sol}/{num_enf}', 'ProjectController@traer_unidad_hvac');
Route::get('inactive_tarject/{id_project}/{num_sol}/{num_enf}', 'ProjectController@inactive_tarject');
Route::get('generatePDF/{id_project}', 'ResultadosController@generatePDF');
Route::get('ipvl', 'ResultadosController@iplv');
Route::get('clean_solution/{id_project}/{num_sol}/{num_enf}', 'ProjectController@clean_solution');
Route::get('del_solution/{id_project}/{num_sol}/{num_enf}', 'ProjectController@del_solution');
Route::get('/del_project/{id}', 'ProjectController@del_project')->name('del_project');
Route::get('edit_project_copy/{id_project}', 'ResultadosController@edit_project_copy');
Route::get('resultados_retrofit/{id_project}', 'ResultadosController@resultados_retrofit');
Route::post('elimina_project_demo/{id_project}', 'ResultadosController@elimina_project_demo');
///asigna tipo, existente
Route::get('asigna_tipos', 'ResultadosController@asiga_typos');
Route::get('asigna_empresas_tipo', 'ResultadosController@asigna_empresas_tipo');
//resultados_graficas

Route::get('cap_op_1_retro/{id_project}', 'ResultadosController@cap_op_1_retro');
Route::get('cap_op_3_retro/{id_project}', 'ResultadosController@cap_op_3_retro');
Route::get('cap_op_5_retro/{id_project}', 'ResultadosController@cap_op_5_retro');
Route::get('cap_op_10_retro/{id_project}', 'ResultadosController@cap_op_10_retro');
Route::get('cap_op_3/{id_project}', 'ResultadosController@cap_op_3');
Route::get('cap_op_5/{id_project}', 'ResultadosController@cap_op_5');
Route::get('cap_op_10/{id_project}', 'ResultadosController@cap_op_10');
Route::get('cap_op_15/{id_project}', 'ResultadosController@cap_op_15');
Route::get('roi_base_a/{id_project}/{dif_cost}/{inv_ini}', 'ResultadosController@roi_base_a');
Route::get('roi_s_ene/{id_project}/{dif_cost}/{inv_ini}/{dif_cost_2}/{inv_ini_2}', 'ResultadosController@roi_s_ene');
Route::get('roi_base_a_retro/{id_project}/{dif_cost}/{inv_ini}', 'ResultadosController@roi_base_a_retro');
Route::get('roi_base_a_retro_new/{id_project}/{dif_cost}/{inv_ini}', 'ResultadosController@roi_base_a_retro_new');
Route::get('roi_base_a_retro_ene_prod/{id_project}/{dif_cost}/{inv_ini}/{costobase}/{costo}', 'ResultadosController@roi_base_a_retro_ene_prod');
Route::get('roi_ene_prod/{id_project}/{dif_cost}/{inv_ini}/{costobase}/{costo_a}/{dif_cost_2}/{inv_ini_2}/{costo_b}', 'ResultadosController@roi_ene_prod');
Route::get('red_hu_carb_grafic/{dif}/{dif_2}', 'ResultadosController@red_hu_carb_grafic');
Route::get('red_en_mw_grafic/{dif}/{dif_2}', 'ResultadosController@red_en_mw_grafic');
Route::post('cerrar_session', 'IndexController@cerrar_session')->name('cerrar_session');

//marcas
Route::resource('marcas', 'MarcasController');
Route::get('create_marcas', 'MarcasController@create');
Route::get('edit_marcas/{id}', 'MarcasController@edit');
Route::get('delete_marcas/{id}', 'MarcasController@delete_marcas');
Route::get('send_marcas', 'ResultadosController@send_marcas');
Route::get('send_marcas_equipo/{value}', 'ResultadosController@send_marcas_equipo');
Route::get('send_modelos/{value}', 'ResultadosController@send_modelos');
Route::get('check_marca/{value}', 'ResultadosController@check_marca');


Route::post('store_new_marc/{value}', 'ResultadosController@store_new_marc');
Route::get('store_new_model/{value}/{marca}/{eficiencia}/{equipo}', 'ResultadosController@store_new_model');
Route::get('send_modelos_datalist/{value}/{equipo}', 'ResultadosController@send_modelos_datalist');
Route::get('send_efi/{value}', 'ResultadosController@send_efi');

Route::get('verifica_solucion/{num_disp}/{num_sol}/{id_project}/{type}', 'ProjectController@verifica_solucion');
Route::get('delete_all_disp_sol_thre', 'ResultadosController@delete_all_disp_sol_thre');


//lang
Route::get('locale/{locale}', function($locale){
   session()->put('locale',$locale);
   return Redirect::back();
});

