<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar rotas web para sua aplicação. Essas
| rotas são carregadas pelo RouteServiceProvider e todas elas
| serão atribuídas ao grupo de middleware "web". Crie algo incrível!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', function () {return redirect()->route('tarefa.index');});

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/tarefas', [TarefaController::class, 'index'])->name('tarefa.index');
    Route::get('/tarefas/criar', [TarefaController::class, 'create'])->name('tarefa.create');
    Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefa.store');
    Route::delete('/tarefas/{id}', [TarefaController::class, 'destroy'])->name('tarefa.destroy');
    Route::delete('/anexos/{id}', [TarefaController::class, 'removerAnexo'])->name('tarefa.anexo.destroy');
    Route::post('/tarefas/{id}/anexar', [TarefaController::class, 'anexar'])->name('tarefa.anexar');
});

require __DIR__.'/auth.php';
