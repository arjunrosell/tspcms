<?php

namespace App\Livewire\Analytics\Events\FuneralMass;

use App\Models\EventReference;
use Livewire\Component;

class Index extends Component
{
    public $event_references;
    public function render()
    {
        $this->event_references = EventReference::where('status', 'Active')->whereNotIn('id', ['5', '3'])->get();
        return view('livewire.analytics.events.funeral-mass.index');
    }
}
