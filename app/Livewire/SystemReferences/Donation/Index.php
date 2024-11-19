<?php

namespace App\Livewire\SystemReferences\Donation;

use Livewire\Component;
use App\Models\AuditLog;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\DonationReference;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use Actions;

    public $name;
    public $status;
    public $objId;
    public $show = true;

    protected $listeners = [
        'editModal' => 'fetch'
    ];

    public function create()
    {
        try {
            $position = DonationReference::create([
                'slug' => Str::slug($this->name),
                'name' => $this->name,
            ]);

            if ($position) {
                $this->logAction('Created new donation record' . $this->name);
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
                    $description = 'Failed to update position status'
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
            $position = DonationReference::find($this->objId);
            $position->name = $this->name;
            $position->slug = Str::slug($this->name);
            if ($position->save()) {
                $this->logAction('Updated donation record ' . $this->name);
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
                    $description = 'Failed to update position status'
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
            $position = DonationReference::find($this->objId);
            if ($position->delete()) {
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
                    $description = 'Failed to update position status'
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
            $position = DonationReference::find($this->objId);
            $this->name = $position->name;
            $this->dispatch('open-modal', ['name' => $name]);
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Failed to fetch data'
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
        return view('livewire.system-references.donation.index');
    }
}
