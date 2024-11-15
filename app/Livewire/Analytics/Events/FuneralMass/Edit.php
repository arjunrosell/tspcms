<?php

namespace App\Livewire\Analytics\Events\FuneralMass;

use App\Models\FuneralMass;
use Livewire\Component;
use WireUi\Traits\Actions;
use Carbon\Carbon;

class Edit extends Component
{
    use Actions;

    public $funeralMassId;
    public $date;
    public $deceased_name;
    public $death_date;
    public $birth_date;
    public $age;
    public $mass_time;
    public $spouse_name;
    public $place_of_origin;
    public $cause_of_death;
    public $departure_time;
    public $burial_place;
    public $burial_date;
    public $registrant_name;
    public $contact_number;
    public $celebration_place;

    protected $rules = [
        'date' => 'required|date|after_or_equal:today',
        'deceased_name' => 'required|string|max:255',
        'death_date' => 'required|date|before_or_equal:today',
        'birth_date' => 'required|date|before_or_equal:today',
        'age' => 'required|integer|min:0',
        'mass_time' => 'nullable',
        'spouse_name' => 'nullable|string|max:255',
        'place_of_origin' => 'nullable|string|max:255',
        'cause_of_death' => 'nullable|string|max:255',
        'departure_time' => 'nullable',
        'burial_place' => 'nullable|string|max:255',
        'burial_date' => 'required|date|after_or_equal:today',
        'registrant_name' => 'nullable|string|max:255',
        'contact_number' => 'nullable|string|max:20',
        'celebration_place' => 'nullable|string|max:255',
    ];

    public function messages()
    {
        return [
            'birth_date.before_or_equal' => 'The birth date cannot be in the future.',
            'death_date.before_or_equal' => 'The death date cannot be in the future.',
            'burial_date.after_or_equal' => 'The burial date must be in the future.',
        ];
    }

    public function mount($funeralMassId)
    {
        $this->loadFuneralMass($funeralMassId);
    }

    public function loadFuneralMass($funeralMassId)
    {
        $funeralMass = FuneralMass::findOrFail($funeralMassId);
        $this->funeralMassId = $funeralMass->id;
        $this->date = $funeralMass->date;
        $this->deceased_name = $funeralMass->deceased_name;
        $this->death_date = $funeralMass->death_date;
        $this->birth_date = $funeralMass->birth_date;
        $this->age = $funeralMass->age;
        $this->mass_time = $funeralMass->mass_time;
        $this->spouse_name = $funeralMass->spouse_name;
        $this->place_of_origin = $funeralMass->place_of_origin;
        $this->cause_of_death = $funeralMass->cause_of_death;
        $this->departure_time = $funeralMass->departure_time;
        $this->burial_place = $funeralMass->burial_place;
        $this->burial_date = $funeralMass->burial_date;
        $this->registrant_name = $funeralMass->registrant_name;
        $this->contact_number = $funeralMass->contact_number;
        $this->celebration_place = $funeralMass->celebration_place;
    }

    public function update()
    {
        $this->validate();


        $eventsCount = FuneralMass::whereDate('burial_date', $this->burial_date)
            ->where('id', '!=', $this->funeralMassId)
            ->count();

        if ($eventsCount >= 5) {
            $this->notification()->error(
                'Failed to update',
                'The maximum number of funeral mass for ' . $this->date . ' has been reached (5 events per day).'
            );
            return;
        }

        $funeralMass = FuneralMass::findOrFail($this->funeralMassId);
        $funeralMass->update([
            'date' => $this->date,
            'deceased_name' => $this->deceased_name,
            'death_date' => $this->death_date,
            'birth_date' => $this->birth_date,
            'age' => $this->age,
            'mass_time' => $this->mass_time,
            'spouse_name' => $this->spouse_name,
            'place_of_origin' => $this->place_of_origin,
            'cause_of_death' => $this->cause_of_death,
            'departure_time' => $this->departure_time,
            'burial_place' => $this->burial_place,
            'burial_date' => $this->burial_date,
            'registrant_name' => $this->registrant_name,
            'contact_number' => $this->contact_number,
            'celebration_place' => $this->celebration_place,
        ]);

        $this->notification()->success(
            'Funeral mass updated successfully',
            'The funeral mass for ' . $this->deceased_name . ' has been updated.'
        );

        return redirect()->to('/analytics/events');
    }

    public function updatedBirthDate($value)
    {
        $this->age = Carbon::parse($value)->age;
    }

    public function render()
    {
        return view('livewire.analytics.events.funeral-mass.edit');
    }
}
