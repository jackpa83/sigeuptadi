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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/prueba', function() {
    return view('prueba');
})->name('prueba')->middleware('auth');

/*User*/
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::post('/user', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/user/{slug?}/roles', [App\Http\Controllers\UserController::class, 'roles'])->name('user.roles');
Route::get('/user/{slug?}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{slug?}/updat', [App\Http\Controllers\UserController::class, 'updat'])->name('user.updat');
Route::put('/user/{slug?}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

/*Bitacora*/
Route::get('/bitacora', [App\Http\Controllers\BitacoraController::class, 'index'])->name('bitacora');

/*Roles */
Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles');
Route::get('/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/{slug?}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{slug?}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');

/*Estadisticas*/
Route::get('/estadisticas', [App\Http\Controllers\estadisticasController::class, 'index'])->name('estadisticas');
Route::post('/estadisticas',[App\Http\Controllers\estadisticasController::class, 'buscar'])->name('estadisticas.buscar');

/*Rutas Carreras Listo*/
Route::get('/carreras', [App\Http\Controllers\carreras\CarrerasController::class, 'index'])->name('carreras');
Route::post('/carreras/carreras', [App\Http\Controllers\carreras\CarrerasController::class, 'store'])->name('carreras.store');
Route::get('/carreras/carreras/{slug?}/edit',[App\Http\Controllers\carreras\CarrerasController::class, 'edit'])->name('carreras.edit');
//Route::put('/update-marca/{slug?}', [App\Http\Controllers\ArticuloController::class, 'update'])->name('articulo.update');
//Route::get('marcas-pdf', [App\Http\Controllers\ArticuloController::class, 'downloadPdf'])->name('marcas.downloadPdf');


/*Rutas Marcas Listo*/
Route::get('/articulo', [App\Http\Controllers\ArticuloController::class, 'index'])->name('articulo');
Route::post('/marca', [App\Http\Controllers\ArticuloController::class, 'store'])->name('articulo.store');
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\ArticuloController::class, 'edit'])->name('articulo.edit');
Route::put('/update-marca/{slug?}', [App\Http\Controllers\ArticuloController::class, 'update'])->name('articulo.update');
Route::get('marcas-pdf', [App\Http\Controllers\ArticuloController::class, 'downloadPdf'])->name('marcas.downloadPdf');

/*Rutas Categorias Listo*/

Route::get('/categoria', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categorias');
Route::post('/categorias', [App\Http\Controllers\CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{slug?}/edit', [App\Http\Controllers\CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('/update-categorias/{slug?}', [App\Http\Controllers\CategoriaController::class, 'update'])->name('categorias.update');
Route::get('categorias-pdf', [App\Http\Controllers\CategoriaController::class, 'downloadPdf'])->name('categorias.downloadPdf');

/*Bienes listo*/
Route::get('/bienes', [App\Http\Controllers\BienesController::class, 'index'])->name('bienes');
Route::post('/bienes', [App\Http\Controllers\BienesController::class, 'store'])->name('bienes.store');
Route::get('/bienes/{slug?}/edit', [App\Http\Controllers\BienesController::class, 'edit'])->name('bienes.edit');
Route::put('/update-bienes/{slug?}', [App\Http\Controllers\BienesController::class, 'update'])->name('bienes.update');
Route::get('bienes-pdf', [App\Http\Controllers\BienesController::class, 'downloadPdf'])->name('bienes.downloadPdf');

/*Traspasos*/
Route::get('/traspasos', [App\Http\Controllers\TraspasosController::class, 'index'])->name('traspasos');
Route::post('/traspasos', [App\Http\Controllers\TraspasosController::class, 'store'])->name('traspasos.store');
Route::get('/traspasos/{slug?}/edit', [App\Http\Controllers\TraspasosController::class, 'edit'])->name('traspasos.edit');
Route::put('/traspasos/{slug?}', [App\Http\Controllers\TraspasosController::class, 'update'])->name('trapasos.update');

//Route::post('/traspasos/{slug?}', [App\Http\Controllers\TraspasosController::class, 'buscar'])->name('traspasos.buscar');

/*Rutas Espacios Listo*/
Route::get('/espacio', [App\Http\Controllers\EspaciosController::class, 'index'])->name('espacio');
Route::post('/espacio', [App\Http\Controllers\EspaciosController::class, 'store'])->name('espacios.store');
Route::get('/espacios/{slug?}/edit', [App\Http\Controllers\EspaciosController::class, 'edit'])->name('espacios.edit');
Route::put('/update-espacio/{slug?}', [App\Http\Controllers\EspaciosController::class, 'update'])->name('espacios.update');
Route::get('espacios-pdf', [App\Http\Controllers\EspaciosController::class, 'downloadPdf'])->name('espacios.downloadPdf');

/*Rutas Incidencias listo*/
Route::get('/incidencia', [App\Http\Controllers\IncidenciasController::class, 'index'])->name('incidencia');
Route::post('/incidencia', [App\Http\Controllers\IncidenciasController::class, 'store'])->name('incidencias.store');
Route::get('incidencias/{slug?}/incidenciaPdf', [App\Http\Controllers\IncidenciasController::class, 'incidenciaPdf'])->name('incidencias.incidenciaPdf');
Route::get('incidencias-pdf', [App\Http\Controllers\IncidenciasController::class, 'downloadPdf'])->name('incidencias.downloadPdf');
Route::get('/incidencia/{slug?}/edit', [App\Http\Controllers\IncidenciasController::class, 'edit'])->name('incidencias.edit');
Route::put('/update-incidencia/{slug?}', [App\Http\Controllers\IncidenciasController::class, 'update'])->name('incidencias.update');

/*Ubicaciones listo*/
Route::get('/ubicacion',  [App\Http\Controllers\UbicacionesController::class, 'index'])->name('ubicacion');
Route::post('/ubicacion', [App\Http\Controllers\UbicacionesController::class, 'store'])->name('ubicacion.store');
Route::get('/ubicaciones/{slug?}/edit', [App\Http\Controllers\UbicacionesController::class, 'edit'])->name('ubicacion.edit');
Route::put('/update-ubicacion/{slug?}', [App\Http\Controllers\UbicacionesController::class, 'update'])->name('ubicacion.update');
Route::get('ubicaciones-pdf', [App\Http\Controllers\UbicacionesController::class, 'downloadPdf'])->name('ubicaciones.downloadPdf');

/*Solicitante listo*/
Route::get('/solicitante',  [App\Http\Controllers\SolicitantesController::class, 'index'])->name('solicitante');
Route::post('/solicitante', [App\Http\Controllers\SolicitantesController::class, 'store'])->name('solicitante.store');
Route::get('/solicitantes/{slug?}/edit', [App\Http\Controllers\SolicitantesController::class, 'edit'])->name('solicitante.edit');
Route::put('/update-solicitante/{slug?}', [App\Http\Controllers\SolicitantesController::class, 'update'])->name('solicitante.update');

/*Asignaciones*/
Route::get('/respaldo', [App\Http\Controllers\RespaldoController::class, 'index'])->name('respaldo');

/*Prestamos listo*/
Route::get ('/prestamos', [App\Http\Controllers\PrestamosController::class, 'index'])->name('prestamos');
Route::post('/prestamos', [App\Http\Controllers\PrestamosController::class, 'store'])->name('prestamos.store');
Route::get('/prestamos/{slug?}/edit', [App\Http\Controllers\PrestamosController::class, 'edit'])->name('prestamos.edit');
Route::get('/prestamos/{slug?}',[App\Http\Controllers\PrestamosController::class, 'update'])->name('prestamos.update');
Route::post('/registrar-prestamos/{slug?}',[App\Http\Controllers\PrestamosController::class, 'buscar'])->name('prestamos.buscar');
Route::get('prestamos-pdf', [App\Http\Controllers\PrestamosController::class, 'downloadPdf'])->name('prestamos.downloadPdf');