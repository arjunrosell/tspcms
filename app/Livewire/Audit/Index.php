<?php

namespace App\Livewire\Audit;

use Livewire\Component;
use App\Models\AuditLog;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    public $perPage = 15;
    public function render()
    {
        $logs = AuditLog::latest()->paginate($this->perPage);

        return view('livewire.audit.index', ['logs' => $logs]);
    }
}
