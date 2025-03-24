<?php

namespace App\Livewire;

use Livewire\Component;

class Pomodoro extends Component
{

    public $tempos = [
        'focus' => [
            'hours' => 0,
            'minutes' => 25,
            'seconds' => 0,
        ],
        'short_break' => [
            'hours' => 0,
            'minutes' => 5,
            'seconds' => 0,
        ],
        'long_break' => [
            'hours' => 0,
            'minutes' => 15,
            'seconds' => 0,
        ]
    ];

    public function mount()
    {

    }

    public function startFocus()
    {
        $this->dispatch('startFocusTimer');
    }

    public function startShortBreakTimer()
    {
        $this->dispatch('startShortBreakTimer');
    }

    public function startLongBreakTimer()
    {
        $this->dispatch('startLongBreakTimer');
    }

    public function render()
    {
        return view('livewire.pomodoro');
    }
}