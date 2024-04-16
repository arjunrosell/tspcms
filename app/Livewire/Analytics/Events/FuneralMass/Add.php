<?php

namespace App\Livewire\Analytics\Events\FuneralMass;

use App\Models\FuneralMass;
use Livewire\Component;
use WireUi\Traits\Actions;

class Add extends Component
{
    use Actions;

    public $status;
    public $objId;
    public $show = true;
    public $date;
    public $pangalan_ng_namatay;
    public $petsa_ng_kamatayan;
    public $petsa_ng_libing;
    public $oras_ng_alis;
    public $edad;
    public $pangalan_ng_asawa;
    public $taga_saan;
    public $sanhi_ng_kamatayan;
    public $oras_ng_misa;
    public $saan_ililibing;
    public $pangalan_ng_nagpalista;
    public $contact_no;
    public $taga_pagdiwang;

    protected $listeners = [
        'editModal' => 'fetch'
    ];

    public function create()
    {
        try {
            $funeral_mass = FuneralMass::create([
                'date' => $this->date,
                'pangalan_ng_namatay' => $this->pangalan_ng_namatay,
                'petsa_ng_kamatayan' => $this->petsa_ng_kamatayan,
                'petsa_ng_libing' => $this->petsa_ng_libing,
                'oras_ng_alis' => $this->oras_ng_alis,
                'edad' => $this->edad,
                'pangalan_ng_asawa' => $this->pangalan_ng_asawa,
                'taga_saan' => $this->taga_saan,
                'sanhi_ng_kamatayan' => $this->sanhi_ng_kamatayan,
                'oras_ng_misa' => $this->oras_ng_misa,
                'saan_ililibing' => $this->saan_ililibing,
                'pangalan_ng_nagpalista' => $this->pangalan_ng_nagpalista,
                'contact_no' => $this->contact_no,
                'taga_pagdiwang' => $this->taga_pagdiwang,
            ]);

            if ($funeral_mass) {
                $this->notification()->success(
                    $title = 'Success',
                    $description = 'Your work was successfully saved'
                );
                $this->reset();
                return redirect()->route('analytics-events-funeral-mass.index');
            } else {
                $this->notification()->error(
                    $title = 'Error',
                    $description = 'Failed to update funeral_mass status'
                );
            }
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Something went wrong ' . $th->getMessage()
            );
        }
    }

    public function confirmDelete($pkey)
    {
        try {
            $this->objId = $pkey;
            $this->dialog()->confirm([
                'title'       => 'Are you Sure you want to archieve this?',
                'description' => 'You cant revert this',
                'acceptLabel' => 'Yes',
                'method'      => 'delete'
            ]);
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Something went wrong'
            );
        }
    }

    public function delete()
    {
        try {
            $funeral_mass = FuneralMass::find($this->objId);
            if ($funeral_mass->delete()) {
                $this->notification()->success(
                    $title = 'Success',
                    $description = 'Your work was successfully saved'
                );
                $this->reset();
                $this->dispatch('close-modal');
                $this->dispatch('refreshDatatable');
            } else {
                $this->notification()->error(
                    $title = 'Error',
                    $description = 'Failed to update funeral_mass status'
                );
            }
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Something went wrong'
            );
        }
    }

    public function render()
    {
        return view('livewire.analytics.events.funeral-mass.add');
    }
}
