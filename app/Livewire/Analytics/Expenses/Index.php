<?php

namespace App\Livewire\Analytics\Expenses;

use App\Models\Expense;
use App\Models\ExpenseReference;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

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
        // Validate inputs
        $this->validate([
            'expense_reference_id' => 'required|exists:expense_references,id',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date|after_or_equal:today',
            'remarks' => 'nullable|string|max:255',
            'files' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        try {
            // Save the expense data
            $expense = Expense::create([
                'expense_references_id' => $this->expense_reference_id,
                'amount' => $this->amount,
                'remarks' => $this->remarks,
                'date' => $this->date,
                'files' => $this->files->store('public'),
            ]);

            if ($expense) {
                $this->notification()->success(
                    $title = 'Success',
                    $description = 'Your expense was successfully saved'
                );
                $this->reset();
                $this->dispatch('close-modal');
                $this->dispatch('refreshDatatable');
            } else {
                $this->notification()->error(
                    $title = 'Error',
                    $description = 'Failed to save the expense'
                );
            }
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Something went wrong'
            );
        }
    }

    public function update()
    {
        $this->validate([
            'expense_reference_id' => 'required|exists:expense_references,id',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date|after_or_equal:today',
            'remarks' => 'nullable|string|max:255',
            'files' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        try {
            $expense = Expense::find($this->objId);
            $expense->expense_references_id = $this->expense_reference_id;
            $expense->amount = $this->amount;
            $expense->remarks = $this->remarks;
            $expense->date = $this->date;

            if ($this->files) {
                $expense->files = $this->files->store('public');
            }

            if ($expense->save()) {
                $this->notification()->success(
                    $title = 'Success',
                    $description = 'Your expense was successfully updated'
                );
                $this->reset();
                $this->dispatch('close-modal');
                $this->dispatch('refreshDatatable');
            } else {
                $this->notification()->error(
                    $title = 'Error',
                    $description = 'Failed to update the expense'
                );
            }
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Something went wrong'
            );
        }
    }

    public function confirmDelete($pkey)
    {
        try {
            $this->objId = $pkey;
            $this->dialog()->confirm([
                'title'       => 'Are you sure you want to archive this?',
                'description' => 'You cannot revert this.',
                'acceptLabel' => 'Yes',
                'method'      => 'delete'
            ]);
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Something went wrong'
            );
        }
    }

    public function delete()
    {
        try {
            $expense = Expense::find($this->objId);
            if ($expense->delete()) {
                $this->notification()->success(
                    $title = 'Success',
                    $description = 'Your work was successfully saved'
                );
                $this->reset();
                $this->dispatch('close-modal');
                $this->dispatch('refreshDatatable');
            } else {
                $this->notification()->error(
                    $title = 'Error',
                    $description = 'Failed to update expense status'
                );
            }
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Something went wrong'
            );
        }
    }

    public function fetch($name, $pkey)
    {
        try {
            $this->objId = $pkey;
            $this->dispatch('edit-modal');
            $expense = Expense::find($this->objId);
            $this->expense_reference_id = $expense->expense_references_id;
            $this->amount = $expense->amount;
            $this->remarks = $expense->remarks;
            $this->date = $expense->date;
            $this->dispatch('open-modal', ['name' => $name]);
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Failed to fetch data'
            );
        }
    }

    public function render()
    {
        $this->expense_references = ExpenseReference::where('status', 'Active')->get();
        return view('livewire.analytics.expenses.index');
    }
}
