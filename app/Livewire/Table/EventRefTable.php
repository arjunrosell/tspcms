<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\EventReference;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;

class EventRefTable extends DataTableComponent
{
    protected $model = EventReference::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Action', 'id')
                ->format(function ($value, $row, Column $column) {
                    return Blade::render("<livewire:components.action.edit obj_id='$row->id' />");
                })
                ->html(),
            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("Status", "status")
                ->searchable()
                ->sortable(),
            Column::make("Created at", "created_at")
                ->format(function ($value, $row, Column $column) {
                    return Carbon::parse($row->created_at)->format('M d,Y');
                })
                ->sortable(),
        ];
    }
}
