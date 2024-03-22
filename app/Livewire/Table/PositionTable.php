<?php

namespace App\Livewire\Table;

use App\Exports\PositionExport;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Position;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Maatwebsite\Excel\Facades\Excel;

class PositionTable extends DataTableComponent
{
    protected $model = Position::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function bulkActions(): array
    {
        return [
            'export' => 'Export',
        ];
    }

    public function export()
    {
        $position_data = Position::all()->count();
        if ($position_data == 0) {
            $this->dialog()->info(
                $title = 'No Data to Export!',
                $description = 'You have no record'
            );
        } else {
            $positions = $this->getSelected();
            $this->clearSelected();

            return Excel::download(new PositionExport($positions), 'Positions.xlsx');
        }
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
