<?php

use App\Http\Controllers\AsignacionesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClasesController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

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
    return redirect('/inicio');
});

//REGISTRO
Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'register']);

//Login
Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/inicio', [HomeController::class, 'index'])->name('inicio');
Route::get('/logout', [LogoutController::class, 'logout']);

//CLases
Route::get('/recibidas', [ClasesController::class,'indexRecibidas'])->name('clases')->middleware('auth');
Route::get('/impartidas', [ClasesController::class,'indexImpartidas'])->name('clases')->middleware('auth');
Route::get('/nueva-clase', [ClasesController::class,'show'])->name('nueva-clase')->middleware('auth');
Route::get('/clase/{id}', [ClasesController::class,'showClase'])->name('clase-show')
->middleware('usuarioCorrecto');
Route::get('/unirse', [ClasesController::class,'showUnirse'])->name('clase-unirse')->middleware('auth');


Route::post('/nueva-clase', [ClasesController::class,'store'])->name('clases')->middleware('auth');
Route::post('/unirse-clase', [ClasesController::class,'submit'])->name('clases-unirse')->middleware('auth');

Route::get('/asignaciones/clase/{id}', [AsignacionesController::class,'create'])->name('asignaciones-create')->middleware('auth');
Route::post('/asignaciones/clase/{id}', [AsignacionesController::class,'store'])->name('asignaciones-store')->middleware('auth');
Route::get('/asignacion/{asignacion}/clase/{id}', [AsignacionesController::class,'show'])->name('asignaciones-show')->middleware(['auth', 'usuarioCorrecto']);
Route::get('/asignacion/{asignacion}/clase/{id}/editar', [AsignacionesController::class,'edit'])->name('asignaciones-edit')->middleware(['auth', 'usuarioCorrecto']);
Route::resource('asignaciones',AsignacionesController::class)->only(['update', 'destroy']);;
