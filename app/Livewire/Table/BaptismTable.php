<?php

namespace App\Livewire\Table;

use App\Models\Baptism;
use Illuminate\Support\Facades\Blade;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class BaptismTable extends DataTableComponent
{
    protected $model = Baptism::class;

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
            Column::make("Date of Baptism", "date_of_baptism")
                ->sortable()
                ->searchable(),
            Column::make("Name of Child", "name_of_child")
                ->sortable()
                ->searchable(),
            Column::make("Father's Name", "father_name")
                ->sortable()
                ->searchable(),
            Column::make("Mother's Name", "mother_name")
                ->sortable()
                ->searchable(),
            Column::make("Legitimacy", "legitimacy")
                ->sortable()
                ->searchable(),
            Column::make("Residence", "residence")
                ->sortable()
                ->searchable(),
            Column::make("Minister of Baptism", "minister_of_baptism")
                ->sortable()
                ->searchable(),
            Column::make("Parish Priest", "parish_priest")
                ->sortable()
                ->searchable(),
            Column::make("Name of Baptized", "name_of_baptized")
                ->sortable()
                ->searchable(),
            Column::make("Offering", "offering")
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
    public function editData($baptismId)
    {
        if (!Baptism::find($baptismId)) {
            session()->flash('error', 'Record not found.');
            return;
        }

        return redirect()->route('analytics-events-baptism.edit-baptism', ['baptismId' => $baptismId]);
    }
}
