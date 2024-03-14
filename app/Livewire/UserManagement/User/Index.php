<?php

namespace App\Livewire\UserManagement\User;

use Livewire\Component;

class Index extends Component
{
    public $show = false;
    public function render()
    {
        return view('livewire.user-management.user.index');
    }
}
