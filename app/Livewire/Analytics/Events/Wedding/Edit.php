<?php

namespace App\Livewire\Analytics\Events\Wedding;

use App\Models\Wedding;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Edit extends Component
{
    use Actions;

    public $wedding_date, $wedding_time, $wedding_type, $application_date;

    public $groom_name, $groom_age, $groom_birthday, $groom_father, $groom_mother, $groom_address, $groom_contact;
    public $groom_baptism, $groom_baptism_parish, $groom_baptism_date;
    public $groom_confirmation, $groom_confirmation_parish, $groom_confirmation_date;

    public $bride_name, $bride_age, $bride_birthday, $bride_father, $bride_mother, $bride_address, $bride_contact;
    public $bride_baptism, $bride_baptism_parish, $bride_baptism_date;
    public $bride_confirmation, $bride_confirmation_parish, $bride_confirmation_date;

    public $minWeddingDate;
    public $weddingId;

    public function mount($weddingId)
    {
        $this->minWeddingDate = Carbon::now()->addWeek()->toDateString();
        $this->createWedding($weddingId);
    }

    public function rules()
    {
        return [
            'wedding_date' => 'required|date|after_or_equal:' . $this->minWeddingDate,
            'wedding_time' => 'nullable',
            'wedding_type' => 'required|string',
            'application_date' => 'required|date|after_or_equal:today',

            // groom's validation
            'groom_name' => 'required|string',
            'groom_age' => 'required|integer|min:18',
            'groom_birthday' => 'required|date',
            'groom_father' => 'nullable|string',
            'groom_mother' => 'nullable|string',
            'groom_address' => 'nullable|string',
            'groom_contact' => 'nullable|string',
            'groom_baptism' => 'nullable|string',
            'groom_baptism_parish' => 'nullable|string',
            'groom_baptism_date' => 'nullable|date',
            'groom_confirmation' => 'nullable|string',
            'groom_confirmation_parish' => 'nullable|string',
            'groom_confirmation_date' => 'nullable|date',

            // bride's validation
            'bride_name' => 'required|string',
            'bride_age' => 'required|integer|min:18',
            'bride_birthday' => 'required|date',
            'bride_father' => 'nullable|string',
            'bride_mother' => 'nullable|string',
            'bride_address' => 'nullable|string',
            'bride_contact' => 'nullable|string',
            'bride_baptism' => 'nullable|string',
            'bride_baptism_parish' => 'nullable|string',
            'bride_baptism_date' => 'nullable|date',
            'bride_confirmation' => 'nullable|string',
            'bride_confirmation_parish' => 'nullable|string',
            'bride_confirmation_date' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'wedding_date.after_or_equal' => 'The wedding date must be at least 1 week from today.',
        ];
    }

    public function createWedding($weddingId)
    {
        $wedding = Wedding::findOrFail($weddingId);
        $this->weddingId = $wedding->id;
        $this->wedding_date = $wedding->wedding_date;
        $this->wedding_time = $wedding->wedding_time;
        $this->wedding_type = $wedding->wedding_type;
        $this->application_date = $wedding->application_date;

        //groom
        $this->groom_name = $wedding->groom_name;
        $this->groom_age = $wedding->groom_age;
        $this->groom_birthday = $wedding->groom_birthday;
        $this->groom_father = $wedding->groom_father;
        $this->groom_mother = $wedding->groom_mother;
        $this->groom_address = $wedding->groom_address;
        $this->groom_contact = $wedding->groom_contact;
        $this->groom_baptism = $wedding->groom_baptism;
        $this->groom_baptism_parish = $wedding->groom_baptism_parish;
        $this->groom_baptism_date = $wedding->groom_baptism_date;
        $this->groom_confirmation = $wedding->groom_confirmation;
        $this->groom_confirmation_parish = $wedding->groom_confirmation_parish;
        $this->groom_confirmation_date = $wedding->groom_confirmation_date;

        //bride
        $this->bride_name = $wedding->bride_name;
        $this->bride_age = $wedding->bride_age;
        $this->bride_birthday = $wedding->bride_birthday;
        $this->bride_father = $wedding->bride_father;
        $this->bride_mother = $wedding->bride_mother;
        $this->bride_address = $wedding->bride_address;
        $this->bride_contact = $wedding->bride_contact;
        $this->bride_baptism = $wedding->bride_baptism;
        $this->bride_baptism_parish = $wedding->bride_baptism_parish;
        $this->bride_baptism_date = $wedding->bride_baptism_date;
        $this->bride_confirmation = $wedding->bride_confirmation;
        $this->bride_confirmation_parish = $wedding->bride_confirmation_parish;
        $this->bride_confirmation_date = $wedding->bride_confirmation_date;
    }

    public function update()
    {
        $this->validate();

        $WeddingEventsCount = Wedding::whereDate('wedding_date', $this->wedding_date)->count();

        if ($WeddingEventsCount >= 5) {
            $this->notification()->error(
                'Failed to add wedding',
                'The maximum number of wedding events for ' . $this->wedding_date . ' has been reached (5 events per day).'
            );

            return;
        }

        $wedding = Wedding::findOrFail($this->weddingId);
        $wedding->update([
            'wedding_date' => $this->wedding_date,
            'wedding_time' => $this->wedding_time,
            'wedding_type' => $this->wedding_type,
            'application_date' => $this->application_date,

            //groom
            'groom_name' => $this->groom_name,
            'groom_age' => $this->groom_age,
            'groom_birthday' => $this->groom_birthday,
            'groom_father' => $this->groom_father,
            'groom_mother' => $this->groom_mother,
            'groom_address' => $this->groom_address,
            'groom_contact' => $this->groom_contact,
            'groom_baptism' => $this->groom_baptism,
            'groom_baptism_parish' => $this->groom_baptism_parish,
            'groom_baptism_date' => $this->groom_baptism_date,
            'groom_confirmation' => $this->groom_confirmation,
            'groom_confirmation_parish' => $this->groom_confirmation_parish,
            'groom_confirmation_date' => $this->groom_confirmation_date,

            //bride
            'bride_name' => $this->bride_name,
            'bride_age' => $this->bride_age,
            'bride_birthday' => $this->bride_birthday,
            'bride_father' => $this->bride_father,
            'bride_mother' => $this->bride_mother,
            'bride_address' => $this->bride_address,
            'bride_contact' => $this->bride_contact,
            'bride_baptism' => $this->bride_baptism,
            'bride_baptism_parish' => $this->bride_baptism_parish,
            'bride_baptism_date' => $this->bride_baptism_date,
            'bride_confirmation' => $this->bride_confirmation,
            'bride_confirmation_parish' => $this->bride_confirmation_parish,
            'bride_confirmation_date' => $this->bride_confirmation_date,
        ]);


        $this->notification()->success(
            'Wedding events  updated successfully',
            'The wedding information for ' . $this->wedding_date . ' has been updated.'
        );

        return redirect()->to('/analytics-events-wedding');
    }
    public function updatedGroomBirthday($value)
    {
        if ($value) {
            $birthDate = Carbon::parse($value);
            $currentDate = Carbon::now();
            $this->groom_age = $currentDate->diffInYears($birthDate);
        }
    }

    public function updatedBrideBirthday($value)
    {
        if ($value) {
            $birthDate = Carbon::parse($value);
            $currentDate = Carbon::now();
            $this->bride_age = $currentDate->diffInYears($birthDate);
        }
    }

    public function render()
    {
        return view('livewire.analytics.events.wedding.edit');
    }
}
