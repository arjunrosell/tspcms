<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Baptism;

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
                ->sortable(),

        ];
    }
}
