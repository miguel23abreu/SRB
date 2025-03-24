@extends('app')

@section('content')
<div class="flex-col w-full h-full">
    <!-- Componente Pomodoro -->
    <livewire:pomodoro />
    
    <!-- Chama o componente do modal -->
    <livewire:modal-tarefa />

    <!-- Componente To-do List -->
    <livewire:todo-list />
</div>
@endsection

