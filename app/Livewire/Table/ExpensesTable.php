<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use NumberFormatter;

class ExpensesTable extends DataTableComponent
{
    protected $model = Expense::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Expenses ID', 'id')
                ->format(function ($value, $row, Column $column) {
                    return $row->id;
                })
                ->html(),
            Column::make("Expense Category", "expense_references.name")
                ->searchable()
                ->sortable(),
            Column::make("Amount", "amount")
                ->format(function ($value, $row, Column $column) {
                    return numfmt_format_currency(numfmt_create('en_PH', NumberFormatter::CURRENCY), $row->amount, 'PHP');
                })
                ->searchable()
                ->sortable(),
            Column::make("Remarks", "remarks")
                ->searchable()
                ->sortable(),
            Column::make("Date", "date")
                ->format(function ($value, $row, Column $column) {
                    return Carbon::parse($row->date)->format('M d,Y');
                })
                ->sortable(),
            Column::make("Created at", "created_at")
                ->format(function ($value, $row, Column $column) {
                    return Carbon::parse($row->created_at)->format('M d,Y');
                })
                ->sortable(),
            Column::make("View Reciept", "files")
                ->format(function ($value, $row, Column $column) {
                    return view('livewire.analytics.expenses.image-show', [
                        'files' => 'storage/' . explode('/', $row->files)[1],
                        "index" => $row->id
                    ]);
                })
                ->searchable()
                ->sortable()
        ];
    }
}
