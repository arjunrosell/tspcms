<?php

namespace App\Livewire\UserManagement\Position;

use Livewire\Component;

class Index extends Component
{
    public $show = false;
    public function render()
    {
        return view('livewire.user-management.position.index');
    }
}
