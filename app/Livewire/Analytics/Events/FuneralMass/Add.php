<?php

namespace App\Livewire\Analytics\Events\FuneralMass;

use App\Models\FuneralMass;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class Add extends Component
{
    use Actions;

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
    public $status = 'Active';

    protected $rules = [
        'date' => 'required|date',
        'deceased_name' => 'required|string|max:255',
        'death_date' => 'required|date|before_or_equal:today',
        'birth_date' => 'required|date|before_or_equal:today',
        'age' => 'required|integer|min:0',
        'mass_time' => 'required|date_format:H:i',
        'spouse_name' => 'nullable|string|max:255',
        'place_of_origin' => 'nullable|string|max:255',
        'cause_of_death' => 'nullable|string|max:255',
        'departure_time' => 'nullable|date_format:H:i',
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
    public function create()
    {
        $this->validate();
        $eventsCount = FuneralMass::whereDate('burial_date', $this->burial_date)->count();

        if ($eventsCount >= 5) {

            $this->notification()->error(
                'Failed to add',
                'The maximum number of funeral mass for ' . $this->burial_date . ' has been reached (5 events per day).'
            );
            return;
        }

        FuneralMass::create([
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
            'status' => $this->status,
        ]);
        $this->notification()->success(
            'Funeral mass created successfully',
            'The funeral mass for ' . $this->deceased_name . ' has been added to the system.'
        );
        $this->reset();
        // return redirect()->to('/analytics/events');
    }

    public function updatedBirthDate($value)
    {
        $this->age = Carbon::parse($value)->age;
    }

    public function render()
    {
        return view('livewire.analytics.events.funeral-mass.add');
    }
}
