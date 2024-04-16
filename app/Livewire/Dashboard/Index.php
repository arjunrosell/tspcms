<?php

namespace App\Livewire\Dashboard;

use App\Models\Baptism;
use App\Models\Event;
use App\Models\Expense;
use App\Models\FuneralMass;
use App\Models\Income;
use App\Models\User;
use App\Models\Wedding;
use Livewire\Component;

class Index extends Component
{
    public $upcomingWedddings;
    public $upcomingBapstisms;
    public $upcomingFuneralMass;
    public function render()
    {
        $totalActiveUsers = User::where('status', 'Active')->paginate(1000);
        $totalExpenses = Expense::sum('amount');
        $totalDonations = Income::sum('amount');
        $totalEvents = FuneralMass::all()->count() + Baptism::all()->count() + Wedding::all()->count();
        $this->upcomingWedddings  = Wedding::limit(5)->get();
        $this->upcomingBapstisms  = Baptism::limit(5)->get();
        $this->upcomingFuneralMass  = FuneralMass::limit(5)->get();
        return view('livewire.dashboard.index', compact('totalActiveUsers', 'totalExpenses', 'totalDonations', 'totalEvents'));
    }
}
