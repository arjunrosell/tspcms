<?php

namespace App\Livewire\Analytics\Events\FuneralMass;

use App\Models\FuneralMass;
use Livewire\Component;
use WireUi\Traits\Actions;

class Edit extends Component
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

    public function update()
    {
        try {
            $funeral_mass = FuneralMass::find($this->objId);
            $funeral_mass->update([
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
                'taga_pagdiwang' => $this->taga_pagdiwan,
            ]);

            if ($funeral_mass->save()) {
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
                $description = 'Something went wrong'
            );
        }
    }
    public function mount($pkey)
    {
        try {
            $this->objId = $pkey;
            $funeral_mass = FuneralMass::find($this->objId);
            $this->date = $funeral_mass->date;
            $this->pangalan_ng_namatay = $funeral_mass->pangalan_ng_namatay;
            $this->petsa_ng_kamatayan = $funeral_mass->petsa_ng_kamatayan;
            $this->petsa_ng_libing = $funeral_mass->petsa_ng_libing;
            $this->oras_ng_alis = $funeral_mass->oras_ng_alis;
            $this->edad = $funeral_mass->edad;
            $this->pangalan_ng_asawa = $funeral_mass->pangalan_ng_asawa;
            $this->taga_saan = $funeral_mass->taga_saan;
            $this->sanhi_ng_kamatayan = $funeral_mass->sanhi_ng_kamatayan;
            $this->oras_ng_misa = $funeral_mass->oras_ng_misa;
            $this->saan_ililibing = $funeral_mass->saan_ililibing;
            $this->pangalan_ng_nagpalista = $funeral_mass->pangalan_ng_nagpalista;
            $this->contact_no = $funeral_mass->contact_no;
            $this->taga_pagdiwang = $funeral_mass->taga_pagdiwang;
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Failed to fetch data'
            );
        }
    }

    public function render()
    {
        return view('livewire.analytics.events.funeral-mass.edit');
    }
}
