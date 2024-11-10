<?php

namespace App\Livewire\Audit;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $data = DB::table('audit')->select('id', 'audit', 'created_at')->get();

        return view('livewire.audit.index', ['data' => $data]);
    }
}
