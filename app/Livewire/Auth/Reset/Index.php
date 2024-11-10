<?php

namespace App\Livewire\Auth\Reset;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.auth.reset.index')->layout('components.layouts.auth');
    }
}
