<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProyectoController;

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

Route::get('/', HomeController::class)->name('home');




/*
|--------------------------------------------------------------------------
| proyectos
|--------------------------------------------------------------------------
| La ruta de proyectos es administrada por el controlador 
| CostoDeEnvioController, ya que debe cumplir con la funciones 
| de CRUD para proyectos. 
*/
Route::controller(ProyectoController::class)->group(function () {
    Route::get('proyectos', 'index')->name('proyectos.index'); // TODO: crear el ->middleware('acceso.administrador');
    /*Route::get('proyectos/create', 'create')->name('proyectos.create');*/
    Route::post('proyectos', 'store')->name('proyectos.store'); // TODO: crear el ->middleware('acceso.administrador');
    /*Route::get('proyectos/{proyecto}', 'show')->name('proyectos.show');*/
    //Route::get('proyectos/{proyecto}/edit', 'edit')->name('proyectos.edit')->middleware('acceso.administrador');
    //Route::put('proyectos/{proyecto}', 'update')->name('proyectos.update')->middleware('acceso.administrador');
    //Route::delete('proyectos/{proyecto}', 'destroy')->name('proyectos.destroy')->middleware('acceso.administrador');
});



// ruta para cerrar sesion
Route::get('/cerrar_sesion', function () {
    Auth::logout();
    return redirect('/');
})->name('cerrar_sesion');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
