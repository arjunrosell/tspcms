<?php

namespace App\Livewire\GeneralReport;

use App\Models\Donation;
use App\Models\Expense;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{

    public $columns;
    public $columnsexp;
    public $data;
    public $date_start;
    public $date_end;
    public $donationData;
    public $expensesData;
    public $funeraldata;
    public $weddingdata;
    public $eventsdata;

    public function mount()
    {
        $this->date_start = now()->format('Y-m-d');
        $this->date_end = now()->format('Y-m-d');
        $this->columns[] = ['title' => 'Donation General Reports', 'width' => 300, 'hozAlign' => 'right', 'columns' => [
            ['title' => 'Donation Category', 'hozAlign' => 'left', 'width' => 250, 'field' => 'donationReference',],
            ['title' => 'Type of Donation', 'hozAlign' => 'left', 'width' => 250, 'field' => 'category',],
            ['title' => 'Amount', 'hozAlign' => 'right', 'width' => 230, 'field' => 'amount',]
        ]];
        $this->columnsexp[] = ['title' => 'Expenses General Reports', 'width' => 300, 'hozAlign' => 'right', 'columns' => [
            ['title' => 'Type of Expenses', 'hozAlign' => 'left', 'width' => 300, 'field' => 'category',],
            ['title' => 'Amount', 'hozAlign' => 'right', 'width' => 300, 'field' => 'amount',]
        ]];

        $this->generateReport();
    }

    public function generateReport()
    {
        try {
            $donations = Donation::with('donation_reference')->select('donation_references_id', 'category', DB::raw('sum(amount) as amount'))
                ->whereBetween('date', [$this->date_start, $this->date_end])
                ->groupBy('category', 'donation_references_id')->get();
            $this->reset('donationData');
            foreach ($donations as $key => $value) {
                $this->donationData[$key]['donationReference'][] = $value->donation_reference->name;
                $this->donationData[$key]['category'][] = $value->category;
                $this->donationData[$key]['amount'][] = $value->amount;
            }

            $expenses = Expense::with('expense_references')->select('expense_references_id', DB::raw('sum(amount) as amount'))
                ->whereBetween('date', [$this->date_start, $this->date_end])
                ->groupBy('expense_references_id')->get();
            $this->reset('expensesData');
            foreach ($expenses as $key => $value) {
                $this->expensesData[$key]['category'][] = $value->expense_references->name;
                $this->expensesData[$key]['amount'][] = $value->amount;
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.general-report.index');
    }
}
