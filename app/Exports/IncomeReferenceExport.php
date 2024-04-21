<?php

namespace App\Exports;

use App\Models\DonationReference;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class IncomeReferenceExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public $objData;

    public function __construct($pkey)
    {
        $this->objData = $pkey;
    }
    public function collection()
    {
        if (count($this->objData) != 0) {
            return DonationReference::whereIn('id', $this->objData)->get();
        } else {
            return DonationReference::get();
        }
    }

    public function map($data): array
    {
        return [
            $data->name,
            $data->status,
            $data->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Name',
            'Status',
            'Creation Date',
        ];
    }
}
