<?php

use App\Http\Controllers\DocenteController;
use Illuminate\Support\Facades\Route;
//agregamos los controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ExternoController;
use Illuminate\Support\Facades\Artisan;

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
Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/seguimiento', function () {
    return view('seguimiento');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/seguimientoga',[DocumentController::class,'seguimiento'])->name('doc.seguimiento');

Auth::routes();


Route::resource('forestudiante',EstudianteController::class);
Route::resource('fordocente',DocenteController::class);
Route::resource('forexterno',ExternoController::class);

Route::group(['middleware'=>['auth']],function(){
    Route::resource('roles',RolController::class);
    Route::resource('usuarios',UsuarioController::class);
    Route::put('/changepass',[UsuarioController::class,'updatepass'])->name('pass.update');
    Route::resource('documents',DocumentController::class);
    Route::get('documento/rechazados',[DocumentController::class,'rechazados'])->name('doc.rechazados');
    Route::get('documento/finalizados',[DocumentController::class,'finalizados'])->name('doc.finalizados');

    Route::put('/enviardoc/{doc}',[DocumentController::class,'enviar'])->name('doc.update');
    Route::put('/rechazardoc/{doc}',[DocumentController::class,'rechazar'])->name('doc.updaterecha');
    Route::put('/finalizadodoc/{doc}',[DocumentController::class,'finalizado'])->name('doc.updatefnlzdo');

    Route::resource('tipos', TipoController::class);
});
