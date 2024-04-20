<?php

namespace App\Livewire\Analytics\Income;

use App\Models\Income;
use App\Models\IncomeReference;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

class Index extends Component
{
    use Actions;
    public $income_references_id;
    public $amount;
    public $remarks;
    public $address;
    public $received_from;
    public $received_by;
    public $status;
    public $objId;
    public $income_references;
    public $users;
    public $show = true;

    protected $listeners = [
        'editModal' => 'fetch'
    ];

    protected $rules = [
        'income_references_id' => 'required',
        'amount' => 'required',
    ];

    public function create()
    {
        try {
            $this->validate();
            $income = Income::create([
                'income_references_id' => $this->income_references_id,
                'amount' => $this->amount,
                'remarks' => $this->remarks,
                'received_from' => $this->received_from,
            ]);

            if ($income) {
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
                    $description = 'Failed to update income status'
                );
            }
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Something went wrong ' . $th->getMessage()
            );
        }
    }

    public function update()
    {
        try {
            $income = Income::find($this->objId);
            $income->income_references_id = $this->income_references_id;
            $income->amount = $this->amount;
            $income->remarks = $this->remarks;
            $income->received_from = $this->received_from;
            if ($income->save()) {
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
                    $description = 'Failed to update income status'
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
            $income = Income::find($this->objId);
            if ($income->delete()) {
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
                    $description = 'Failed to update income status'
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
            $income = Income::find($this->objId);
            $this->income_references_id = $income->income_references_id;
            $this->amount = $income->amount;
            $this->remarks = $income->remarks;
            $this->received_by = $income->received_by;
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
        $this->income_references = IncomeReference::where('status', 'Active')->get();
        $this->users = User::with('user_detail')->where('status', 'Active')->get();
        return view('livewire.analytics.income.index');
    }
}
