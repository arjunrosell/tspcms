<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\FuneralMass;
use Illuminate\Support\Facades\Blade;

class FuneralMassTable extends DataTableComponent
{
    protected $model = FuneralMass::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Date", "date")
                ->sortable(),
            Column::make("Deceased Name", "deceased_name")
                ->sortable(),
            Column::make("Death Date", "death_date")
                ->sortable(),
            Column::make("Burial Date", "burial_date")
                ->sortable(),
            Column::make("Departure Time", "departure_time")
                ->sortable()
                ->searchable()
                ->format(function ($value) {
                    return \Carbon\Carbon::parse($value)->format('g:i A');
                }),
            Column::make("Departure Time", "birth_date")
                ->sortable(),
            Column::make("Age", "age")
                ->sortable(),
            Column::make("Spouse Name", "spouse_name")
                ->sortable(),
            Column::make("Place of Origin", "place_of_origin")
                ->sortable(),
            Column::make("Cause of Death", "cause_of_death")
                ->sortable(),
            Column::make("Mass Time", "mass_time")
                ->sortable()
                ->searchable()
                ->format(function ($value) {
                    return \Carbon\Carbon::parse($value)->format('g:i A');
                }),
            Column::make("Burial Place", "burial_place")
                ->sortable(),
            Column::make("Registrant Name", "registrant_name")
                ->sortable(),
            Column::make("Contact Number", "contact_number")
                ->sortable(),
            Column::make("Celebration Place", "celebration_place")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable()
                ->searchable()
                ->format(function ($value) {
                    return \Carbon\Carbon::parse($value)->format('M d, Y g:i A');
                }),
            Column::make('Actions', 'id')
                ->format(function ($value, $row, Column $column) {
                    return Blade::render("<x-button red sm icon='pencil' wire:click='editData($row->id)' />");
                })
                ->html(),
        ];
    }

    public function editData($control_num)
    {
        return redirect()->route('analytics-events-funeral-mass.edit-funeral-mass', ['funeralMassId' => $control_num]);
    }
}
