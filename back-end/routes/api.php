<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([

    'middleware' => 'api'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    Route::resource('users','UserController');
    Route::resource('roles','RolController');
    Route::resource('personas','PersonaController');
    Route::resource('empresas','EmpresaController');
    Route::resource('doctores','DoctorController');
    Route::resource('muestras','MuestraController');
    Route::resource('analisis','AnalisisController');
    Route::resource('orden_atencion','OrdenAtencionController');

    Route::resource('paises','PaisController');
    Route::resource('ciudades','CiudadController');
    Route::resource('empresa_sucursal','EmpresaSucursalController');
    Route::resource('importar','ImportController');
    Route::resource('encuestas','EncuestaController');
    Route::resource('tipo_encuesta','TipoEncuestaController');
    Route::resource('encuesta_persona','EncuestaPersonaController');
    Route::resource('preguntas','PreguntaController');
    Route::resource('subpreguntas','SubPreguntaController');
    Route::resource('respuestas','RespuestaController');
    Route::resource('links','LinkController');
    Route::resource('exportar','ExportController');
    Route::get('exportar/intereses/{interes_id}/{persona_id}', 'ExportController@pdf_intereses');
    Route::get('exportar/temperamentos/{temperamento_id}/{persona_id}', 'ExportController@pdf_temperamentos');
    Route::get('exportar/consolidados/{interes_id}/{persona_id}', 'ExportController@pdf_consolidado');
    Route::resource('encuesta_puntaje','EncuestaPuntajeController');
    Route::resource('talentos','TalentoController');
});



    // Route::get('/migrate', function() {
    //     $exitCode = Artisan::call('migrate');
    //     return 'DONE'; //Return anything
    // });

    // Route::get('/seed', function() {
    //     $exitCode = Artisan::call('db:seed');
    //     return 'DONE'; //Return anything
    // });

    // Route::get('/migrate-refresh', function() {
    //     $exitCode = Artisan::call('migrate:refresh --seed');
    //     return 'DONE'; //Return anything
    // });

    // Route::get('/storage-link', function() {
    //     $exitCode = Artisan::call('storage:link');
    //     return 'DONE'; //Return anything
    // });

    Route::get('/cache_clear', function() {
        $exitCode = Artisan::call('cache:clear');
        return 'DONE'; //Return anything
    });

    Route::get('/config_clear', function() {
        $exitCode = Artisan::call('config:clear');
        return 'DONE'; //Return anything
    });

    Route::get('/config_cache', function() {
        $exitCode = Artisan::call('config:cache');
        return 'DONE'; //Return anything
    });
