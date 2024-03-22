<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public $objData;

    public function __construct($pkey)
    {
        $this->objData = $pkey;
    }
    public function collection()
    {
        if (count($this->objData) != 0) {
            return User::whereIn('id', $this->objData)->get();
        } else {
            return User::get();
        }
    }

    public function map($data): array
    {
        return [
            $data->user_detail->fullName,
            $data->user_detail->position->name,
            $data->email,
            $data->user_detail->contact_no,
            $data->user_detail->DOB,
            $data->user_detail->address,
            $data->status,
            $data->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Fullname',
            'Position',
            'Email',
            'Contact',
            'DOB',
            'Adress',
            'Status',
            'Creation Date',
        ];
    }
}
