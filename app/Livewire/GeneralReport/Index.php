<?php

namespace App\Livewire\GeneralReport;

use Livewire\Component;

class Index extends Component
{

    public $columns;
    public $data;
    public $date_start;
    public $date_end;

    public function mount()
    {
        $this->columns[] = ['title' => 'Donation General Reports', 'width' => 300, 'hozAlign' => 'right', 'columns' => [
            ['title' => 'Type of Donation', 'hozAlign' => 'left', 'width' => 150, 'field' => 'receiverName', 'headerSort' => false, 'editor' => "input"],
            ['title' => 'Amount', 'hozAlign' => 'right', 'width' => 150, 'field' => 'phoneNumber', 'headerSort' => false, 'editor' => "input"]
        ]];
    }

    public function generateReport()
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.general-report.index');
    }
}
