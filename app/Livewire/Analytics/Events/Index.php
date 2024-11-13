<?php

namespace App\Livewire\Analytics\Events;

use App\Models\Event;
use App\Models\EventReference;
use Livewire\Component;
use WireUi\Traits\Actions;

class Index extends Component
{
    use Actions;

    public $name;
    public $event_reference_id;
    public $event_description;
    public $date;
    public $location;
    public $status;
    public $objId;
    public $event_references;
    public $show = true;

    protected $listeners = [
        'editModal' => 'fetch'
    ];

    public function create()
    {
        try {
            $expense = Event::create([
                'name' => $this->name,
                'event_reference_id' => $this->event_reference_id,
                'event_description' => $this->event_description,
                'date' => $this->date,
                'location' => $this->location,
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
                $description = 'Something went wrong ' . $th->getMessage()
            );
        }
    }

    public function update()
    {
        try {
            $expense = Event::find($this->objId);
            $expense->update([
                'name' => $this->name,
                'event_reference_id' => $this->event_reference_id,
                'event_description' => $this->event_description,
                'date' => $this->date,
                'location' => $this->location,
            ]);
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
            $expense = Event::find($this->objId);
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
            $expense = Event::find($this->objId);
            $this->name = $expense->name;
            $this->event_reference_id = $expense->event_reference_id;
            $this->event_description = $expense->event_description;
            $this->date = $expense->date;
            $this->location = $expense->location;
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
        $this->event_references = EventReference::where('status', 'Active')->whereNotIn('id', ['5', '3'])->get();
        return view('livewire.analytics.events.funeral-mass.index');
    }
}
