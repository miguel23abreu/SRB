<?php

namespace App\Livewire;

use App\Models\Tarefa;
use Livewire\Component;

class ModalTarefa extends Component
{
    public $showModal = false;
    public $tarefa, $descricao, $ciclos, $dificuldade, $prioridade, $prazo, $status = 'A Fazer', $revisao = false;

    protected $rules = [
        'tarefa' => 'required|string|max:255',
        'descricao' => 'nullable|string',
        'ciclos' => 'required|integer|min:1',
        'dificuldade' => 'required|integer|between:1,5',
        'prioridade' => 'required|in:baixa,media,alta',
        'prazo' => 'required|date',
        'status' => 'required|in:A Fazer,Em Progresso,Terminada',
        'revisao' => 'boolean'
    ];

    protected $listeners = ['showModal' => 'show'];

    public function show()
    {
        $this->reset(); // Limpa os campos
        $this->showModal = true;
    }

    public function hide()
    {
        $this->reset(); // Limpa os campos
        $this->showModal = false;
    }

    public function save()
    {
        $this->validate();

        Tarefa::create([
            'tarefa' => $this->tarefa,
            'descricao' => $this->descricao,
            'ciclos' => $this->ciclos,
            'dificuldade' => $this->dificuldade,
            'prioridade' => $this->prioridade,
            'prazo' => $this->prazo,
            'status' => $this->status,
            'revisao' => $this->revisao,
        ]);

        $this->dispatch('tarefaCriada'); // Atualiza lista de tarefas
        $this->showModal = false; // Fecha o modal
    }

    public function render()
    {
        return view('livewire.modal-tarefa');
    }
}
