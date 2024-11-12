<?php

namespace App\Livewire\Audit;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function logAudit($action)
    {
        $userId = Auth::id();

        DB::table('audit')->insert([
            'user_id' => $userId,
            'audit' => $action,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function render()
    {
        $data = DB::table('audit')
            ->select('id', 'audit', 'created_at')
            ->get();

        $this->logAudit('Viewed audit logs.');

        return view('livewire.audit.index', ['data' => $data]);
    }
}
