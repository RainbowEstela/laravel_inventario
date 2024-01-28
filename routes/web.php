<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LocationController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
});

Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('categorias')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/view', [CategoriaController::class, 'index'])->name("categoria.view");
    Route::get('/create', [CategoriaController::class, 'create'])->name("categoria.create");
    Route::post('/store', [CategoriaController::class, 'store'])->name("categoria.store");
    Route::delete('/delete', [CategoriaController::class, 'destroy'])->name("categoria.destroy");
});

Route::prefix('localizaciones')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/view', [LocationController::class, 'index'])->name("localizaciones.view");
    Route::get('/create', [LocationController::class, 'create'])->name("localizaciones.create");
    Route::post('/store', [LocationController::class, 'store'])->name("localizaciones.store");
    Route::delete('/delete', [LocationController::class, 'destroy'])->name("localizaciones.destroy");
});

require __DIR__ . '/auth.php';
