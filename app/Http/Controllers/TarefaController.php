<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        return Tarefa::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tarefa' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'ciclos' => 'required|integer|min:1',
            'dificuldade' => 'required|integer|between:1,5',
            'prioridade' => 'required|in:baixa,media,alta',
            'prazo' => 'required|date',
            'status' => 'in:A Fazer,Em Progresso,Terminada',
            'revisao' => 'boolean'
        ]);

        return Tarefa::create($validated);
    }

    public function show(Tarefa $tarefa)
    {
        return $tarefa;
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $validated = $request->validate([
            'tarefa' => 'sometimes|string|max:255',
            'descricao' => 'nullable|string',
            'ciclos' => 'sometimes|integer|min:1',
            'dificuldade' => 'sometimes|integer|between:1,5',
            'prioridade' => 'sometimes|in:baixa,media,alta',
            'prazo' => 'sometimes|date',
            'status' => 'sometimes|in:A Fazer,Em Progresso,Terminada',
            'revisao' => 'sometimes|boolean'
        ]);

        $tarefa->update($validated);

        // Retorna a tarefa atualizada
        return response()->json($tarefa, 200);
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return response()->json(['message' => 'Tarefa deletada com sucesso!'], 200);
    }
}
