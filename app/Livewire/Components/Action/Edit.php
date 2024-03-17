<?php

namespace App\Livewire\Components\Action;

use Livewire\Component;

class Edit extends Component
{
    public $obj_id;
    public function render()
    {
        return view('livewire.components.action.edit');
    }
}
