<?php

namespace App\Livewire\Analytics\Events\Baptism;

use Livewire\Component;

class Edit extends Component
{
    public $ninongs = [];
    public $ninangs = [];
    public $ninong;

    public function mount()
    {
        $this->ninongs[] = [''];
        $this->ninangs[] = [''];
    }

    public function addNinong()
    {
        $this->ninongs[] = [''];
    }
    public function removeNinong($index)
    {
        unset($this->ninongs[$index]);
    }

    public function addNinang()
    {
        $this->ninangs[] = [''];
    }
    public function removeNinang($index)
    {
        unset($this->ninangs[$index]);
    }

    public function render()
    {
        return view('livewire.analytics.events.baptism.edit');
    }
}
