<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Wedding;
use Illuminate\Support\Facades\Blade;

class WeddingTable extends DataTableComponent
{
    protected $model = Wedding::class;

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
            Column::make("Time Wedding", "wedding_time")
                ->sortable()
                ->searchable()
                ->format(function ($value) {
                    return \Carbon\Carbon::parse($value)->format('g:i A');
                }),
            Column::make("Type Wedding", "wedding_type")
                ->sortable(),
            Column::make("Date Application", "application_date")
                ->sortable(),
            Column::make("Groom Name", "groom_name")
                ->sortable(),

            // Column::make("Groom age", "groom_age")
            //     ->sortable(),
            // Column::make("Groom bday", "groom_bday")
            //     ->sortable(),
            // Column::make("Groom father", "groom_father")
            //     ->sortable(),
            // Column::make("Groom mother", "groom_mother")
            //     ->sortable(),
            // Column::make("Groom address", "groom_address")
            //     ->sortable(),
            // Column::make("Groom Contact No.", "groom_contact")
            //     ->sortable(),
            // Column::make("Groom place baptism", "groom_place_baptism")
            //     ->sortable(),
            // Column::make("Groom parish of", "groom_parish_of")
            //     ->sortable(),
            // Column::make("Groom date bap", "groom_date_bap")
            //     ->sortable(),
            // Column::make("Groom place confirm", "groom_place_confirm")
            //     ->sortable(),
            // Column::make("Groom parish confirm", "groom_parish_confirm")
            //     ->sortable(),
            // Column::make("Groom date confirm", "groom_date_confirm")
            //     ->sortable(),
            Column::make("Bride Name", "bride_name")
                ->sortable(),
            // Column::make("Bride age", "bride_age")
            //     ->sortable(),
            // Column::make("Bride bday", "bride_bday")
            //     ->sortable(),
            // Column::make("Bride father", "bride_father")
            //     ->sortable(),
            // Column::make("Bride mother", "bride_mother")
            //     ->sortable(),
            // Column::make("Bride address", "bride_address")
            //     ->sortable(),
            // Column::make("Bride Contact No", "bride_contact")
            //     ->sortable(),
            // Column::make("Bride place baptism", "bride_place_baptism")
            //     ->sortable(),
            // Column::make("Bride parish of", "bride_parish_of")
            //     ->sortable(),
            // Column::make("Bride date bap", "bride_date_bap")
            //     ->sortable(),
            // Column::make("Bride place confirm", "bride_place_confirm")
            //     ->sortable(),
            // Column::make("Bride parish confirm", "bride_parish_confirm")
            //     ->sortable(),
            // Column::make("Bride date confirm", "bride_date_confirm")
            //     ->sortable(),
            // Column::make("Created at", "created_at")
            //     ->sortable(),
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
        return redirect()->route('analytics-events-wedding.edit-wedding', ['weddingId' => $control_num]);
    }
}
