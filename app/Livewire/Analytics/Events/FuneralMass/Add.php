<?php

namespace App\Livewire\Analytics\Events\FuneralMass;

use App\Models\FuneralMass;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class Add extends Component
{
    use Actions;

    // Form fields
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

    // Validation rules
    protected $rules = [
        'date' => 'required|date',
        'pangalan_ng_namatay' => 'required|string',
        'petsa_ng_kamatayan' => 'required|date',
        'petsa_ng_libing' => 'required|date',
        'oras_ng_alis' => 'required|date_format:H:i',
        'edad' => 'required|integer',
        'pangalan_ng_asawa' => 'nullable|string',
        'taga_saan' => 'nullable|string',
        'sanhi_ng_kamatayan' => 'nullable|string',
        'oras_ng_misa' => 'required|date_format:H:i',
        'saan_ililibing' => 'nullable|string',
        'pangalan_ng_nagpalista' => 'nullable|string',
        'contact_no' => 'nullable|string',
        'taga_pagdiwang' => 'nullable|string',
    ];

    // Handle form submission
    public function create()
    {
        try {
            // Validate the form data
            $this->validate();

            // Store the new Funeral Mass record in the database
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

            // Show success notification
            $this->notification()->success(
                'Success',
                'Funeral Mass record created successfully.'
            );

            // Reset the form fields
            $this->reset();

            // Redirect to the index route
            return redirect()->route('analytics-events-funeral-mass.index');
        } catch (ValidationException $e) {
            // Handle validation exceptions
            Log::error('Validation error in Funeral Mass creation: ' . $e->getMessage());
            $this->notification()->error(
                'Error',
                'There was a problem with the data you provided. Please check and try again.'
            );
        } catch (\Throwable $th) {
            // Handle any other exceptions
            Log::error('Error creating Funeral Mass: ' . $th->getMessage());
            $this->notification()->error(
                'Error',
                'Something went wrong. Please try again later.'
            );
        }
    }

    // Render the Livewire component view
    public function render()
    {
        return view('livewire.analytics.events.funeral-mass.add');
    }
}
