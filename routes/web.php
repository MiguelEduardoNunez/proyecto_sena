<?php

use App\Http\Controllers\Administracion\ModuloController;
use App\Http\Controllers\Administracion\PerfilController;
use App\Http\Controllers\Administracion\PermisoController;
use App\Http\Controllers\Administracion\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\NovedadController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ProyectoElementoController;
use App\Http\Controllers\StandController;
use App\Models\Categoria;
use App\Http\Controllers\TipoNovedadController;
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

Route::resource('/perfiles', PerfilController::class)->middleware('auth');

Route::get('/permisos/{perfil}', [PermisoController::class, 'edit'])->name('permisos.edit');
Route::put('/permisos/{perfil}', [PermisoController::class, 'update'])->name('permisos.update');

Route::resource('/usuarios', UsuarioController::class)->middleware('auth');

Route::resource('/proyectos', ProyectoController::class)->middleware('auth');

Route::resource('/proyectos.elementos', ProyectoElementoController::class)->middleware('auth');

Route::resource('/stands', StandController::class);

Route::resource('/empleados', EmpleadoController::class);

Route::resource('/novedades', NovedadController::class);

Route::resource('/items', ItemController::class);
Route::resource('/tipo_novedades',TipoNovedadController::class);

Route::resource('/categorias', CategoriaController::class);


require __DIR__.'/auth.php';
