<?php

namespace App\Livewire\Dashboard;

use App\Models\Event;
use App\Models\Expense;
use App\Models\Income;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $totalActiveUsers = User::where('status', 'Active')->paginate(1000);
        $totalExpenses = Expense::sum('amount');
        $totalDonations = Income::sum('amount');
        $totalEvents = Event::paginate(1000);
        return view('livewire.dashboard.index', compact('totalActiveUsers', 'totalExpenses', 'totalDonations', 'totalEvents'));
    }
}
