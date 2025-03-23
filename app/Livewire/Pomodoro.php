<?php

namespace App\Livewire;

use Livewire\Component;

class Pomodoro extends Component
{
    public function startFocusTimer()
    {
        $this->dispatchBrowserEvent('startFocusTimer');
    }

    public function startShortBreakTimer()
    {
        $this->dispatchBrowserEvent('startShortBreakTimer');
    }

    public function startLongBreakTimer()
    {
        $this->dispatchBrowserEvent('startLongBreakTimer');
    }

    public function render()
    {
        return view('livewire.pomodoro');
    }
}