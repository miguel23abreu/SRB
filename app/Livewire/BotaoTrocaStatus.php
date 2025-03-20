<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tarefa;

class BotaoTrocaStatus extends Component
{
    public Tarefa $tarefa;

    public function trocarStatus()
    {
        $sequencia = ['A Fazer', 'Em Progresso', 'Terminada'];
        $indice = array_search($this->tarefa->status, $sequencia);
        $novoStatus = $sequencia[($indice + 1) % count($sequencia)];

        $this->tarefa->update(['status' => $novoStatus]);

        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.botao-troca-status');
    }
}

