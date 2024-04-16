<?php

namespace App\Livewire\Analytics\Expenses;

use App\Models\Expense;
use App\Models\ExpenseReference;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

class Index extends Component
{
    use Actions;

    public $expense_reference_id;
    public $amount;
    public $remarks;
    public $status;
    public $objId;
    public $expense_references;
    public $show = true;

    protected $listeners = [
        'editModal' => 'fetch'
    ];

    public function create()
    {
        try {
            $expense = Expense::create([
                'expense_references_id' => $this->expense_reference_id,
                'amount' => $this->amount,
                'remarks' => $this->remarks
            ]);

            if ($expense) {
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

    public function update()
    {
        try {
            $expense = Expense::find($this->objId);
            $expense->expense_references_id = $this->expense_reference_id;
            $expense->amount = $this->amount;
            $expense->remarks = $this->remarks;
            if ($expense->save()) {
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

    public function confirmDelete($pkey)
    {
        try {
            $this->objId = $pkey;
            $this->dialog()->confirm([
                'title'       => 'Are you Sure you want to archieve this?',
                'description' => 'You cant revert this',
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
