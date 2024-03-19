<?php

namespace App\Livewire\UserManagement\Position;

use App\Models\Position;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

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
            $position = Position::create([
                'slug' => Str::slug($this->name),
                'name' => $this->name,
            ]);

            if ($position) {
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
            $position = Position::find($this->objId);
            $position->name = $this->name;
            $position->slug = Str::slug($this->name);
            if ($position->save()) {
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
                'title'       => 'Are you Sure you want to delete this?',
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
            $position = Position::find($this->objId);
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

    public function fetch($name, $pKey)
    {
        try {
            $this->objId = $pKey;
            $this->dispatch('edit-modal');
            $position = Position::find($this->objId);
            $this->name = $position->name;
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
        return view('livewire.user-management.position.index');
    }
}
