<?php

namespace App\Livewire\GeneralReport;

use App\Models\Expense;
use Livewire\Component;
use App\Models\Donation;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class Index extends Component
{
    public $columnsDonation;
    public $columnsExpenses;
    public $data;
    public $date_start;
    public $date_end;
    public $donationData;
    public $expensesData;
    public $totalDonationAmount = 0;
    public $totalExpenseAmount = 0;

    public function mount()
    {
        $this->date_start = now()->format('Y-m-d');
        $this->date_end = now()->format('Y-m-d');
        $this->columnsDonation[] = [
            'title' => 'Donation General Reports',
            'width' => '100%',
            'hozAlign' => 'right',
            'columns' => [
                ['title' => 'Donation Category', 'hozAlign' => 'left', 'width' => '33.33%', 'field' => 'donationReference'],
                ['title' => 'Amount', 'hozAlign' => 'left', 'width' => '33.33%', 'field' => 'amount'],
                [
                    'title' => 'Total Donation',
                    'hozAlign' => 'left',
                    'width' => '33.33%',
                    'field' => 'totalAmount',
                ],
            ],
        ];

        $this->columnsExpenses[] = [
            'title' => 'Expenses General Reports',
            'width' => '100%',
            'hozAlign' => 'right',
            'columns' => [
                ['title' => 'Type of Expenses', 'hozAlign' => 'left', 'width' => '33%', 'field' => 'category'],
                ['title' => 'Amount', 'hozAlign' => 'left', 'width' => '33.33%', 'field' => 'amount'],
                [
                    'title' => 'Total Expenses',
                    'hozAlign' => 'left',
                    'width' => '33.33%',
                    'field' => 'totalAmount',
                ],
            ],
        ];

        $this->generateReport();
    }

    public function generateReport()
    {
        try {
            // Fetch Donations
            $donations = Donation::with('donation_reference')
                ->select('donation_references_id', DB::raw('sum(amount) as amount'))
                ->whereBetween('date', [$this->date_start, $this->date_end])
                ->groupBy('donation_references_id')
                ->get();

            $this->reset('donationData');
            $totalDonationAmount = 0;
            foreach ($donations as $value) {
                $formattedAmount = number_format($value->amount ?? 0, 2);

                $this->donationData[] = [
                    'donationReference' => $value->donation_reference->name ?? 'Unknown',
                    'amount'            => $formattedAmount,
                ];

                $totalDonationAmount += $value->amount ?? 0;
            }

            $this->donationData[] = [
                'totalAmount' => number_format($totalDonationAmount, 2),
            ];

            $expenses = Expense::with('expense_references')
                ->select('expense_references_id', DB::raw('sum(amount) as amount'))
                ->whereBetween('date', [$this->date_start, $this->date_end])
                ->groupBy('expense_references_id')
                ->get();

            $this->reset('expensesData');
            $totalExpenseAmount = 0;
            foreach ($expenses as $value) {
                $formattedAmount = number_format($value->amount ?? 0, 2);

                $this->expensesData[] = [
                    'category' => $value->expense_references->name ?? 'Unknown',
                    'amount'   => $formattedAmount,
                ];

                $totalExpenseAmount += $value->amount ?? 0;
            }

            $this->expensesData[] = [
                'totalAmount' => number_format($totalExpenseAmount, 2),
            ];

            $this->totalDonationAmount = $totalDonationAmount;
            $this->totalExpenseAmount = $totalExpenseAmount;
        } catch (\Throwable $th) {
            Log::error('Error generating report: ' . $th->getMessage());
            Log::error($th->getTraceAsString());
        }
    }

    public function render()
    {
        return view('livewire.general-report.index', [
            'totalDonationAmount' => $this->totalDonationAmount,
            'totalExpenseAmount' => $this->totalExpenseAmount,
        ]);
    }
}
