<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/home', 'IndexController@check_user');

Route::get('/', 'UserController@redirect_login');

Route::get('check_usr/{email}', 'UserController@check_usr')->name('check_usr');;

Route::get('/prueba', function () {
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
})->name('lo_gin');



Route::get('valida_email', 'UserController@valida_email');

Route::post('reg_ister', 'UserController@reg_ister')->name('reg_ister');
//-----------Login/logout--------------------
Route::post('/lo_gin', 'UserController@lo_gin')->name('lo_gin');

Route::get('/lo_gout', 'UserController@lo_gout')->name('lo_gout');




//rutas index
Route::post('/getPaises','IndexController@getPaises');
Route::post('/getCiudades','IndexController@getCiudades');
Route::post('/getDegreeHrs','IndexController@getdegreeHrs');
// rutas resultados
Route::post('/resultados','ResultadosController@getResultados')->name('resultados');

//rutas resources y user controller
Route::get('/users_admin_hvaccopcostla/{$id}', 'UserController@index')->name('index');;
Route::get('/users/create/', 'UserController@create');
Route::get('/users_edit/{id}', 'UserController@edit');
Route::get('/del_usr/{id}', 'UserController@delete')->name('delete');
Route::post('/edit_usr/{id}', 'UserController@update')->name('update');
Route::post('users_store', 'UserController@users_store')->name('users_store');
Route::post('/getLogo','UserController@getLogo');
Route::post('/actualizarLogo','UserController@actualizarLogo')->name('setLogo');
Route::get('/users', 'UserController@users');
//rutas settings
Route::post('/setDegreeHrs','SettingsController@setDegreeHrs');


Route::get('/homeee', 'HomeController@index')->name('homeee');
// Lobby
Route::get('lobby_admin', 'LobbyController@index');

// Lobby
Route::resource('empresas', 'EmpresasController');
Route::get('create_empresa', 'EmpresasController@create');
Route::get('edit_empresa/{id}', 'EmpresasController@edit');
//sucursales
Route::get('sucursales_emp/{id}', 'SucursalesController@sucursales_empresa');
Route::resource('sucursales', 'SucursalesController');
Route::get('create_sucursal/{id}', 'SucursalesController@create');
Route::get('sucursal_empresa_edit/{id}', 'SucursalesController@edit');
// projects
Route::get('project/{id_project}', 'ResultadosController@project');
Route::get('get_cat_edi', 'ProjectController@categories_paieses');
Route::get('get_cat_edi/{id}', 'ProjectController@get_cat_edi');
Route::get('mis_projectos', 'ProjectController@mis_projectos');
Route::get('porcents_aux/{id}', 'ProjectController@porcents_aux');
Route::get('edit_project/{id_project}', 'ResultadosController@edit_project');
Route::get('get_ciudades/{pais}', 'ProjectController@get_ciudades');
Route::get('get_ciudades_Edit/{pais}', 'ProjectController@get_ciudades_Edit');
Route::post('/edit_project/{id}', 'ProjectController@edit_project')->name('edit_project');
Route::get('traer_unidad_hvac/{id_project}/{num_sol}/{num_enf}', 'ProjectController@traer_unidad_hvac');
Route::get('inactive_tarject/{id_project}/{num_sol}/{num_enf}', 'ProjectController@inactive_tarject');
Route::get('generatePDF/{id_project}', 'ResultadosController@generatePDF');
Route::get('clean_solution/{id_project}/{num_sol}/{num_enf}', 'ProjectController@clean_solution');
Route::get('del_solution/{id_project}/{num_sol}/{num_enf}', 'ProjectController@del_solution');
Route::get('/del_project/{id}', 'ProjectController@del_project')->name('del_project');
