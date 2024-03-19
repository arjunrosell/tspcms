<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Support\Facades\Blade;
use App\Models\UserDetail;
use Illuminate\Database\Eloquent\Builder;

class UserTable extends DataTableComponent
{
    protected $model = UserDetail::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return UserDetail::query()->with(['position', 'user'])->select('user_details.*');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Profile", "profile")
                ->sortable(),
            Column::make("Fname", "fname")
                ->sortable(),
            Column::make("Mname", "mname")
                ->sortable(),
            Column::make("Lname", "lname")
                ->sortable(),
            Column::make("Nickname", "nickname")
                ->sortable(),
            Column::make("Position", "position.name")
                ->sortable(),
            Column::make("DOB", "DOB")
                ->sortable(),
            Column::make("Gender", "gender")
                ->sortable(),
            Column::make("Contact no", "contact_no")
                ->sortable(),
            Column::make("Permanent address", "permanent_address")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make('Action', 'id')
                ->format(function ($value, $row, Column $column) {
                    return Blade::render("<livewire:components.action.edit obj_id='$row->id' />");
                })
                ->html()
        ];
    }
}
