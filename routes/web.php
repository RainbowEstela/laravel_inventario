<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

// RUTAS DE PRODUCTO
Route::prefix("productos")->middleware(['auth', 'verified'])->group(function () {
    // VER
    Route::get('/view', [ProductoController::class, 'index'])->name("productos.view");

    // CREAR Y GUARDAR
    Route::get('/create', [ProductoController::class, 'create'])->name("productos.create");
    Route::post('/store', [ProductoController::class, 'store'])->name("productos.store");

    // EDITAR Y GUARDAR
    Route::get('/edit/{id}', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::post('/update/{id}', [ProductoController::class, 'update'])->name('productos.update');

    // VISTA DE ASSIGNAR LOCALIZACION A PRODUCTO
    Route::get('/location/{idl}/producto/{idp}', [ProductoController::class, 'locationAssing'])->name('productos.location');

    // BORRAR
    Route::get('/delete/{id}', [ProductoController::class, 'destroy'])->name("productos.destroy");

    // FILTROS
    Route::post('/categoria', [ProductoController::class, 'filtrarCategoria'])->name("productos.categoria");
    Route::get('/categoria/{id}', [ProductoController::class, 'vistaCategoria'])->name("productos.categoria.view");

    Route::post('/nombre', [ProductoController::class, 'filtrarNombre'])->name('productos.nombre');
    Route::get('/nombre/{nombre}', [ProductoController::class, 'vistaNombre'])->name('productos.nombre.view');

    Route::post('/codigo', [ProductoController::class, 'filtrarCod'])->name('productos.codigo');
    Route::get('/codigo/{cod}', [ProductoController::class, 'viewCod'])->name('productos.codigo.view');
});

// RUTAS USER
Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// RUTAS CATEGORIAS
Route::prefix('categorias')->middleware(['auth', 'verified'])->group(function () {
    // VER
    Route::get('/view', [CategoriaController::class, 'index'])->name("categoria.view");

    // CREAR Y GUARDAR
    Route::get('/create', [CategoriaController::class, 'create'])->name("categoria.create");
    Route::post('/store', [CategoriaController::class, 'store'])->name("categoria.store");

    //BORRAR
    Route::get('/delete/{id}', [CategoriaController::class, 'destroy'])->name("categoria.destroy");
});

// RUTAS LOCALIZACIONES
Route::prefix('localizaciones')->middleware(['auth', 'verified'])->group(function () {

    // VER Y MOSTRAR
    Route::get('/view', [LocationController::class, 'index'])->name("localizaciones.view");
    Route::get('/show/{id}', [LocationController::class, 'show'])->name("localizaciones.show");

    // VISTA DE ASIGNAR
    Route::get('/assing/{id}', [LocationController::class, 'assingView'])->name("localizaciones.assing");

    // CREAR Y GUARDAR
    Route::get('/create', [LocationController::class, 'create'])->name("localizaciones.create");
    Route::post('/store', [LocationController::class, 'store'])->name("localizaciones.store");

    // BORRAR
    Route::get('/delete/{id}', [LocationController::class, 'destroy'])->name("localizaciones.destroy");
});

require __DIR__ . '/auth.php';
