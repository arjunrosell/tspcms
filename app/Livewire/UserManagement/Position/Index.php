<?php

namespace App\Livewire\UserManagement\Position;

use Livewire\Component;

class Index extends Component
{
    public $show = true;

    protected $listeners = [
        'editModal' => 'fetch'
    ];

    public function fetch($name, $id)
    {
        $this->dispatch('open-modal', ['name' => $name]);
    }
    public function render()
    {
        return view('livewire.user-management.position.index');
    }
}
