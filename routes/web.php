<?php

use App\Http\Controllers\ElementoController;
use App\Http\Controllers\NovedadController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ProyectoElementoController;
use App\Http\Controllers\StandController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/modulos', ModuloController::class)->middleware('auth');

Route::get('/perfiles/permisos/{perfil}', [PerfilController::class, 'editPermiso'])->name('perfiles.permisos.edit');
Route::put('/perfiles/permisos/{perfil}', [PerfilController::class, 'updatePermiso'])->name('perfiles.permisos.update');

Route::resource('/perfiles', PerfilController::class)->middleware('auth');

Route::resource('/usuarios', UsuarioController::class)->middleware('auth');

Route::resource('/proyectos', ProyectoController::class);

Route::resource('/proyectos.elementos', ProyectoElementoController::class);

Route::resource('/stands', StandController::class);

Route::resource('/empleados', EmpleadoController::class);

Route::resource('/novedades', NovedadController::class);

Route::resource('/items', ItemController::class);


require __DIR__.'/auth.php';
