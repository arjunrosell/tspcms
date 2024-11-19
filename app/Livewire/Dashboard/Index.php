<?php

namespace App\Livewire\Dashboard;

use App\Models\Baptism;
use App\Models\Event;
use App\Models\Expense;
use App\Models\FuneralMass;
use App\Models\Donation;
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
        $totalExpenses = number_format(Expense::sum('amount'), 2);
        $totalDonations = number_format(Donation::sum('amount'), 2);
        $totalEvents = FuneralMass::all()->count() + Baptism::all()->count() + Wedding::all()->count();
        $this->upcomingWedddings  = Wedding::limit(5)->get();
        $this->upcomingBapstisms  = Baptism::limit(5)->get();
        $this->upcomingFuneralMass  = FuneralMass::limit(5)->get();
        return view('livewire.dashboard.index', compact('totalActiveUsers', 'totalExpenses', 'totalDonations', 'totalEvents'));
    }
}
