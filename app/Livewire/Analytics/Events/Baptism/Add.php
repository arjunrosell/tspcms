<?php

namespace App\Livewire\Analytics\Events\Baptism;

use App\Models\Baptism;
use Livewire\Component;
use WireUi\Traits\Actions;

class Add extends Component
{
    use Actions;
    public $date_of_baptism;
    public $name_of_child;
    public $place_of_birth;
    public $date_of_birth;
    public $legitimacy;
    public $father_name;
    public $father_place;
    public $mother_name;
    public $mother_place;
    public $residence;
    public $godfathers;
    public $godmothers;
    public $minister_of_baptism;
    public $parish_priest;
    public $name_of_baptized;
    public $offering;
    public $remarks;

    protected $rules = [
        'date_of_baptism' => 'required|date|after_or_equal:today',
        'name_of_child' => 'required|string|max:255',
        'place_of_birth' => 'required|string|max:255',
        'date_of_birth' => 'required|date|before_or_equal:today',
        'legitimacy' => 'nullable|string|max:255',
        'father_name' => 'required|string|max:255',
        'father_place' => 'required|string|max:255',
        'mother_name' => 'required|string|max:255',
        'mother_place' => 'required|string|max:255',
        'residence' => 'nullable|string|max:255',
        'godfathers' => 'nullable|string',
        'godmothers' => 'nullable|string',
        'minister_of_baptism' => 'nullable|string|max:255',
        'parish_priest' => 'nullable|string|max:255',
        'name_of_baptized' => 'nullable|string|max:255',
        'offering' => 'nullable|numeric',
        'remarks' => 'nullable|string',
    ];

    public function create()
    {
        $this->validate();

        $baptismEventsCount = Baptism::whereDate('date_of_baptism', $this->date_of_baptism)->count();

        if ($baptismEventsCount >= 5) {

            $this->notification()->error(
                'Failed to add',
                'The maximum number of baptism for ' . $this->date_of_baptism . ' has been reached (5 events per day).'
            );
            return;
        }

        Baptism::create([
            'date_of_baptism' => $this->date_of_baptism,
            'name_of_child' => $this->name_of_child,
            'place_of_birth' => $this->place_of_birth,
            'date_of_birth' => $this->date_of_birth,
            'legitimacy' => $this->legitimacy,
            'father_name' => $this->father_name,
            'father_place' => $this->father_place,
            'mother_name' => $this->mother_name,
            'mother_place' => $this->mother_place,
            'residence' => $this->residence,
            'godfathers' => $this->godfathers,
            'godmothers' => $this->godmothers,
            'minister_of_baptism' => $this->minister_of_baptism,
            'parish_priest' => $this->parish_priest,
            'name_of_baptized' => $this->name_of_baptized,
            'offering' => $this->offering,
            'remarks' => $this->remarks,
        ]);

        $this->notification()->success(
            'Success',
            'Baptism record created successfully!'
        );

        $this->reset();
    }

    public function render()
    {
        return view('livewire.analytics.events.baptism.add');
    }
}
