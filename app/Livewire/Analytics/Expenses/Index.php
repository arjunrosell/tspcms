<?php

namespace App\Livewire\Analytics\Expenses;

use App\Models\Expense;
use Livewire\Component;
use App\Models\AuditLog;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\ExpenseReference;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use Actions;
    use WithFileUploads;

    public $expense_reference_id;
    public $amount;
    public $remarks;
    public $status;
    public $objId;
    public $date;
    public $expense_references;
    public $show = true;
    public $files;

    protected $listeners = [
        'editModal' => 'fetch'
    ];

    // Custom error
    protected $messages = [
        'amount.min' => 'Amount cannot be negative.',
        'date.after_or_equal' => 'The date must be today or a future date.',
        'expense_reference_id' => 'Please select category',
    ];


    public function create()
    {
        $this->validate([
            'expense_reference_id' => 'required|exists:expense_references,id',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date|after_or_equal:today',
            'remarks' => 'nullable|string|max:255',
            'files' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        try {

            $expense = Expense::create([
                'expense_references_id' => $this->expense_reference_id,
                'amount' => $this->amount,
                'remarks' => $this->remarks,
                'date' => $this->date,
                'files' => $this->files->store('public'),
            ]);

            if ($expense) {

                $expenseReference = ExpenseReference::find($this->expense_reference_id);

                $referenceName = $expenseReference ? $expenseReference->name : 'Unknown Reference';

                $this->logAction('Created a new expense record for ' . $referenceName);

                $this->notification()->success(
                    $title = 'Success',
                    $description = 'Your expense was successfully saved.'
                );
                $this->reset();
                $this->dispatch('close-modal');
                $this->dispatch('refreshDatatable');
            } else {
                $this->notification()->error(
                    $title = 'Error',
                    $description = 'Failed to save the expense.'
                );
            }
        } catch (\Throwable $th) {

            Log::error('Error occurred: ' . $th->getMessage(), [
                'exception' => $th
            ]);

            // Send notification to the user
            $this->notification()->error(
                $title = 'Error',
                $description = 'Something went wrong.'
            );
        }
    }

    private function logAction($message)
    {
        AuditLog::create([
            'audit' => $message,
            'audit_date' => now(),
            'user_id' => Auth::id(),
        ]);
    }

    public function render()
    {
        $this->expense_references = ExpenseReference::where('status', 'Active')->get();
        return view('livewire.analytics.expenses.index');
    }
}
