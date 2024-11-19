<?php

namespace App\Livewire\Table;

use App\Models\Blessing;
use Illuminate\Support\Facades\Blade;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class BlessingTable extends DataTableComponent
{
    protected $model = Blessing::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Actions', 'id')
                ->format(function ($value, $row, Column $column) {
                    return Blade::render("<x-button red sm icon='pencil' wire:click='editData($row->id)' />");
                })
                ->html(),
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("Full Name", "fullname")
                ->sortable()
                ->searchable(),
            Column::make("Location", "location")
                ->sortable()
                ->searchable(),
            Column::make("Date", "date")
                ->sortable()
                ->searchable(),
            Column::make("Time", "time")
                ->sortable()
                ->searchable()
                ->format(function ($value) {
                    return \Carbon\Carbon::parse($value)->format('g:i A');
                }),
            Column::make("Contact Person (Name & Number)", "contact_person_name_and_number")
                ->sortable()
                ->searchable(),
            Column::make("Blessed Item & Count", "blessed_item_and_count")
                ->sortable()
                ->searchable(),
            Column::make("Created at", "created_at")
                ->sortable()
                ->searchable()
                ->format(function ($value) {
                    return \Carbon\Carbon::parse($value)->format('M d, Y g:i A');
                }),
        ];
    }

    public function editData($control_num)
    {
        return redirect()->route('analytics-events-blessing.edit-blessing', ['blessingId' => $control_num]);
    }
}
