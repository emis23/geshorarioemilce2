<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesoresController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//PROFESORES
    Route::controller(ProfesoresController::class)->group(function () {
        Route::get('profesores/registro', 'registro')->name('profesores.registro');
        Route::post('profesores/registro_graba', 'registro_graba')->name('profesores.registro_graba');
    });

// REQUIEREN ESTAR LOGUEADO	
Route::group( ['middleware' => ['auth'] ], function() {

}); //FIN Requiere estar conectado

    // MANTENIMIENTO DE USUARIOS
    Route::resource('users','App\Http\Controllers\UserController');
    Route::get('user/password', 'App\Http\Controllers\UserController@password');
    Route::post('user/updatepassword', 'App\Http\Controllers\UserController@updatePassword');
    // la defino asi para llamarla directamente
    Route::get('user/{id}/destroy', [
            'uses' => 'App\Http\Controllers\UserController@destroy' ,  // nombreControlador@metodo
            'as' => 'user.destroy' ]);


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
