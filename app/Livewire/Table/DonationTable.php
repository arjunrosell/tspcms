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
            Column::make('Donation ID', 'id')
                ->format(function ($value, $row, Column $column) {
                    return $row->id;
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

            Column::make("Donation Source", "name")
                ->sortable()
                ->format(function ($value, $row, Column $column) {
                    return $value ?? 'Anonymous';
                }),

            Column::make("Received By", "received_by")
                ->sortable()
                ->format(function ($value, $row, Column $column) {
                    return $value ?? 'Anonymous';
                }),

            Column::make("Date", "date")
                ->sortable(),

            Column::make("Created at", "created_at")
                ->format(function ($value, $row, Column $column) {
                    return Carbon::parse($row->created_at)->format('M d,Y');
                })
                ->sortable(),
        ];
    }
}
