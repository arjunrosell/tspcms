<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use App\Models\Event;
use App\Models\Baptism;
use App\Models\Expense;
use App\Models\Wedding;
use Livewire\Component;
use App\Models\Donation;
use App\Models\FuneralMass;
use App\Models\ExpenseReference;
use App\Models\DonationReference;

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
        $this->upcomingWedddings = Wedding::where('wedding_date', '>=', now())
            ->orderBy('wedding_date', 'asc')
            ->orderBy('wedding_time', 'asc')
            ->limit(5)
            ->get();

        $this->upcomingBapstisms = Baptism::limit(5)->get();
        $this->upcomingFuneralMass = FuneralMass::limit(5)->get();

        $expenseReferences = ExpenseReference::all();

        $expensesPerReference = Expense::selectRaw('expense_references_id, SUM(amount) as total')
            ->groupBy('expense_references_id')
            ->orderBy('expense_references_id', 'ASC')
            ->get()
            ->keyBy('expense_references_id');

        $referenceLabels = $expenseReferences->pluck('name')->toArray();
        $referenceExpenses = $expenseReferences->map(function ($reference) use ($expensesPerReference) {
            return $expensesPerReference[$reference->id]->total ?? 0;
        })->toArray();


        $donationReferences = DonationReference::all();

        $donationsPerReference = Donation::selectRaw('donation_references_id, SUM(amount) as total')
            ->groupBy('donation_references_id')
            ->orderBy('donation_references_id', 'ASC')
            ->get()
            ->keyBy('donation_references_id');

        $donationLabels = $donationReferences->pluck('name')->toArray();
        $donationAmounts = $donationReferences->map(function ($reference) use ($donationsPerReference) {
            return $donationsPerReference[$reference->id]->total ?? 0;
        })->toArray();

        return view('livewire.dashboard.index', compact('referenceLabels', 'referenceExpenses', 'donationLabels', 'donationAmounts', 'totalActiveUsers', 'totalExpenses', 'totalDonations', 'totalEvents'));
    }
}
