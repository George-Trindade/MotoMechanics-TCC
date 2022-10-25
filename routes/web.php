<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendamentosController;
use App\Http\Controllers\HorariosController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

//Agendamentos
Route::get('/agendamentos/', [AgendamentosController::class, 'index'])->name('agendamentos.index');
Route::get('/agendamentos/novo', [AgendamentosController::class, 'create'])->name('agendamentos.create');
Route::post('/agendamentos/novo', [AgendamentosController::class, 'store'])->name('agendamentos.store');
Route::get('/agendamentos/novo/horarios/{datadigitada}', [HorariosController::class, 'horario'])->name('agendamentos.horario');

