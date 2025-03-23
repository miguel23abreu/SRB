<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;
use App\Livewire\TodoList;

Route::get('/', TodoList::class)->name('home');

Route::get('/tarefas', [TarefaController::class, 'index']);
Route::post('/tarefas', [TarefaController::class, 'store']);
Route::get('/tarefas/{tarefa}', [TarefaController::class, 'show']);
Route::put('/tarefas/{tarefa}', [TarefaController::class, 'update']);
Route::delete('/tarefas/{tarefa}', [TarefaController::class, 'destroy']);
