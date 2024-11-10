<?php

namespace App\Livewire\Table;

use App\Exports\UsersExport;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Support\Facades\Blade;
use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;

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

    public function bulkActions(): array
    {
        return [
            'export' => 'Export',
        ];
    }

    public function export()
    {
        $collection_data = User::all()->count();
        if ($collection_data == 0) {
            $this->dialog()->info(
                $title = 'No Data to Export!',
                $description = 'You have no record'
            );
        } else {
            $users = $this->getSelected();
            $this->clearSelected();

            return Excel::download(new UsersExport($users), 'Users.xlsx');
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
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Profile", "profile")
                ->sortable(),
            Column::make("Fname", "fname")
                ->searchable()
                ->sortable(),
            Column::make("Mname", "mname")
                ->searchable()
                ->sortable(),
            Column::make("Lname", "lname")
                ->searchable()
                ->sortable(),
            Column::make("Nickname", "nickname")
                ->searchable()
                ->sortable(),
            Column::make("Position", "position.name")
                ->searchable()
                ->sortable(),
            Column::make("DOB", "DOB")
                ->searchable()
                ->sortable(),
            Column::make("Gender", "gender")
                ->searchable()
                ->sortable(),
            Column::make("Contact no", "contact_no")
                ->searchable()
                ->sortable(),
            Column::make("Permanent address", "permanent_address")
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
