<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendamentosController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VeiculosController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/teste', [VeiculosController::class, 'teste']);
Route::get('/base', [VeiculosController::class, 'base']);

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

//User
Route::get('/meusdados/', [RegisteredUserController::class, 'index'])->name('usuario.index')->middleware('auth');
Route::get('/meusdados/edit/{id}', [RegisteredUserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::put('/meusdados/edit/{id}', [RegisteredUserController::class, 'update'])->name('user.update')->middleware('auth');



//Agendamentos
Route::get('/agendamentos/', [AgendamentosController::class, 'index'])->name('agendamentos.index')->middleware('auth');
Route::get('/agendamentos/novo', [AgendamentosController::class, 'create'])->name('agendamentos.create')->middleware('auth');
Route::post('/agendamentos/novo', [AgendamentosController::class, 'store'])->name('agendamentos.store')->middleware('auth');
Route::delete('/agendamentos/{id}', [AgendamentosController::class, 'destroy'])->name('agendamentos.destroy')->middleware('auth');
Route::get('/agendamentos/alterar/{id}', [AgendamentosController::class, 'edit'])->name('agendamentos.edit')->middleware('auth');
Route::put('/agendamentos/alterar/{id}', [AgendamentosController::class, 'update'])->name('agendamentos.update')->middleware('auth');
Route::get('/agendamentos/novo/horarios/{datadigitada}', [HorariosController::class, 'horario'])->name('agendamentos.horario')->middleware('auth');
Route::get('/agendamentos/novo/horarios/{datadigitada}/{horario}', [HorariosController::class, 'verificaHorario'])->name('agendamentos.horarioDisponivel')->middleware('auth');

//Admin
Route::get('/admin/', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('admin');
Route::get('/admin/usuarios', [AdminController::class, 'listaUsuarios'])->name('admin.listaUsuarios')->middleware('admin');
Route::get('/admin/agendamentos', [AdminController::class, 'listaAgendamentos'])->name('admin.listaAgendamentos')->middleware('admin');
Route::get('/admin/agendamentos/{id}', [AdminController::class, 'editAgendamentos'])->name('admin.editAgendamentos')->middleware('admin');
Route::put('/admin/agendamentos/{id}', [AdminController::class, 'confirmaAgendamentos'])->name('admin.confirmaAgendamentos')->middleware('admin');
Route::get('/admin/agendamentos/conclui{id}', [AdminController::class, 'editDoneAgendamentos'])->name('admin.editDoneAgendamentos')->middleware('admin');
Route::put('/admin/agendamentos/conclui/{id}', [AdminController::class, 'concluiAgendamentos'])->name('admin.concluiAgendamentos')->middleware('admin');
Route::delete('/admin/agendamentos/delete/{id}', [AdminController::class, 'destroyAgendamentos'])->name('admin.destroyAgendamentos')->middleware('admin');
Route::get('/admin/agendamentos/get/ajaxsolicitados', [AdminController::class, 'ajaxAgendamento'])->name('admin.ajaxSolicitados')->middleware('admin');

//Veiculos
Route::get('/veiculo/', [VeiculosController::class, 'index'])->name('veiculos.index');
Route::get('/veiculo/novo', [VeiculosController::class, 'create'])->name('veiculos.create');
Route::post('/veiculo/novo', [VeiculosController::class, 'store'])->name('veiculos.store');
Route::get('/veiculos/alterar/{id}', [VeiculosController::class, 'edit'])->name('veiculos.edit')->middleware('auth');
Route::put('/veiculos/alterar/{id}', [VeiculosController::class, 'update'])->name('veiculos.update')->middleware('auth');
Route::delete('/veiculos/{id}', [VeiculosController::class, 'destroy'])->name('veiculos.destroy')->middleware('auth');
