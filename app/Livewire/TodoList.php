<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('app')]
class TodoList extends Component
{
    public $todos;
    public $tarefa = '';

    function mount()
    {
        $this->fetchTodos();
    }

    function fetchTodos()
    {
        $this->todos = Todo::all()->reverse();
    }

    function addTarefa()
    {
        if($this->tarefa != ''){
            $todo = new Todo();
            $todo->tarefa = $this->tarefa;
            $todo->save();
            $this->tarefa = '';
            $this->fetchTodos();
        }
    }
    public function render()
    {
        return view('livewire.todo-list');
    }
}
