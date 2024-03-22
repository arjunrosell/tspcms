<?php

namespace App\Livewire\Table;

use App\Exports\IncomeReferenceExport;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\IncomeReference;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Maatwebsite\Excel\Facades\Excel;

class IncomeRefTable extends DataTableComponent
{
    protected $model = IncomeReference::class;

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
        $collection_data = IncomeReference::all()->count();
        if ($collection_data == 0) {
            $this->dialog()->info(
                $title = 'No Data to Export!',
                $description = 'You have no record'
            );
        } else {
            $users = $this->getSelected();
            $this->clearSelected();

            return Excel::download(new IncomeReferenceExport($users), 'IncomeReferences.xlsx');
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
