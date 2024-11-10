<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Donation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use NumberFormatter;

class DonationTable extends DataTableComponent
{
    protected $model = Donation::class;

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
            Column::make("Donation Category", "donation_reference.name")
                ->searchable()
                ->sortable(),
            Column::make("Amount", "amount")
                ->format(function ($value, $row, Column $column) {
                    return numfmt_format_currency(numfmt_create('en_PH', NumberFormatter::CURRENCY), $row->amount, 'PHP');
                })
                ->searchable()
                ->sortable(),
            // Column::make("Donation Type", "category")
            //     ->sortable(),
            Column::make("Receive From", "name")
                ->sortable(),
            Column::make("Date", "date")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->format(function ($value, $row, Column $column) {
                    return Carbon::parse($row->created_at)->format('M d,Y');
                })
                ->sortable(),
            Column::make("View Reciept", "files")
                ->format(function ($value, $row, Column $column) {
                    return view('livewire.analytics.expenses.image-show', ['files' => 'storage/' . explode('/', $row->files)[1], "index" => $row->id]);
                })
        ];
    }
}
