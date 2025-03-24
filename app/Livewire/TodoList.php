<?php

namespace App\Livewire;

use App\Models\Tarefa;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('app')]
class TodoList extends Component
{
    public $todos;

    function mount()
    {
        $this->fetchTodos();
    }

    function fetchTodos()
    {
        $this->todos = Tarefa::all()->reverse();
    }

    protected $listeners = ['tarefaCriada' => 'fetchTodos'];


    public function render()
    {
        return view('livewire.todo-list');
    }
}
