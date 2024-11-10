<?php

namespace App\Livewire\Analytics\Donation;

use App\Models\Donation;
use App\Models\DonationReference;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;

class Index extends Component
{
    use Actions;
    use WithFileUploads;

    public $donation_references_id;
    public $name;
    public $category;
    public $amount;
    public $date;
    public $status;
    public $objId;
    public $donation_references;
    public $users;
    public $show = true;
    public $files;

    protected $listeners = [
        'editModal' => 'fetch'
    ];

    protected $rules = [
        'donation_references_id' => 'required',
        'amount' => 'required',
    ];

    public function create()
    {
        try {
            $this->validate([
                'files' => [
                    'image',
                    'max:4096',
                ],
            ]);

            $this->validate();
            $donation = Donation::create([
                'donation_references_id' => $this->donation_references_id,
                'amount' => $this->amount,
                'files'  => $this->files->store('public'),
                'date' => $this->date,
                'name' => $this->name
            ]);

            if ($donation) {
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
                    $description = 'Failed to update donation status'
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
            $donation = Donation::find($this->objId);
            $donation->update([
                'donation_references_id' => $this->donation_references_id,
                'amount' => $this->amount,
                'date' => $this->date,
                'name' => $this->name,
                'category' => $this->category,
            ]);
            if ($donation->save()) {
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
                    $description = 'Failed to update donation status'
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
            $donation = Donation::find($this->objId);
            if ($donation->delete()) {
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
                    $description = 'Failed to update donation status'
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
            $donation = Donation::find($this->objId);
            $this->donation_references_id = $donation->donation_references_id;
            $this->amount = $donation->amount;
            $this->date = $donation->date;
            $this->name = $donation->name;
            $this->category = $donation->category;
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
        $this->donation_references = DonationReference::where('status', 'Active')->get();
        $this->users = User::with('user_detail')->where('status', 'Active')->get();
        return view('livewire.analytics.donation.index');
    }
}
