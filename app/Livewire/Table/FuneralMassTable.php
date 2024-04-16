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
            Column::make("Pangalan ng namatay", "pangalan_ng_namatay")
                ->sortable(),
            Column::make("Petsa ng kamatayan", "petsa_ng_kamatayan")
                ->sortable(),
            Column::make("Petsa ng libing", "petsa_ng_libing")
                ->sortable(),
            Column::make("Oras ng alis", "oras_ng_alis")
                ->sortable(),
            Column::make("Edad", "edad")
                ->sortable(),
            Column::make("Pangalan ng asawa", "pangalan_ng_asawa")
                ->sortable(),
            Column::make("Taga saan", "taga_saan")
                ->sortable(),
            Column::make("Sanhi ng kamatayan", "sanhi_ng_kamatayan")
                ->sortable(),
            Column::make("Oras ng misa", "oras_ng_misa")
                ->sortable(),
            Column::make("Saan ililibing", "saan_ililibing")
                ->sortable(),
            Column::make("Pangalan ng nagpalista", "pangalan_ng_nagpalista")
                ->sortable(),
            Column::make("Contact no", "contact_no")
                ->sortable(),
            Column::make("Taga pagdiwang", "taga_pagdiwang")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make('Actions', 'id')
                ->format(function ($value, $row, Column $column) {
                    return Blade::render("<x-button red sm icon='pencil' wire:click='editData($row->id)' />");
                })
                ->html(),
        ];
    }

    public function editData($control_num)
    {
        return redirect()->route('analytics-events-funeral-mass.edit-funeral-mass', ['pkey' => $control_num]);
    }
}
