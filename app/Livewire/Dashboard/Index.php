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

        // Fetch expense references (these are like categories or groupings)
        $expenseReferences = ExpenseReference::all();

        // Fetch expenses and group by expense_references_id
        $expensesPerReference = Expense::selectRaw('expense_references_id, SUM(amount) as total')
            ->groupBy('expense_references_id')
            ->orderBy('expense_references_id', 'ASC')
            ->get()
            ->keyBy('expense_references_id'); // Key by expense_references_id

        // Prepare data for the chart
        $referenceLabels = $expenseReferences->pluck('name')->toArray(); // Get expense reference names (like categories)
        $referenceExpenses = $expenseReferences->map(function ($reference) use ($expensesPerReference) {
            return $expensesPerReference[$reference->id]->total ?? 0; // Get total expenses per reference
        })->toArray();

        // Fetch donation references (these are like categories or groupings)
        $donationReferences = DonationReference::all(); // Assuming a DonationReference model exists

        // Fetch donations and group by donation_references_id
        $donationsPerReference = Donation::selectRaw('donation_references_id, SUM(amount) as total')
            ->groupBy('donation_references_id')
            ->orderBy('donation_references_id', 'ASC')
            ->get()
            ->keyBy('donation_references_id'); // Key by donation_references_id

        // Prepare data for the donation chart
        $donationLabels = $donationReferences->pluck('name')->toArray(); // Get donation reference names (like categories)
        $donationAmounts = $donationReferences->map(function ($reference) use ($donationsPerReference) {
            return $donationsPerReference[$reference->id]->total ?? 0; // Get total donations per reference
        })->toArray();

        return view('livewire.dashboard.index', compact('referenceLabels', 'referenceExpenses', 'donationLabels', 'donationAmounts', 'totalActiveUsers', 'totalExpenses', 'totalDonations', 'totalEvents'));
    }
}
