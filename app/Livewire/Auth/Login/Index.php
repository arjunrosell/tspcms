<?php

namespace App\Livewire\Auth\Login;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.auth.login.index')->layout('components.layouts.auth');
    }
}
