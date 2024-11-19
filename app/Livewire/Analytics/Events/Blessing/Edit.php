<?php

namespace App\Livewire\Analytics\Events\Blessing;

use Livewire\Component;
use App\Models\Blessing;
use WireUi\Traits\Actions;

class Edit extends Component
{
    use Actions;

    public $fullname;
    public $location;
    public $date;
    public $time;
    public $contactPersonNameAndNumber;
    public $blessedItemAndCount;
    public $blessingId;

    protected $rules = [
        'fullname' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'date' => 'required|date|after_or_equal:today',
        'time' => 'required|date_format:H:i|time_between:08:00,17:00', // Validate 8 AM and 5 PM
        'contactPersonNameAndNumber' => 'required|string|max:255',
        'blessedItemAndCount' => 'required|string|max:255',
    ];

    protected $messages = [
        'time.time_between' => 'The time must be between 8:00 AM and 5:00 PM.',
    ];

    // Method to load existing Blessing data when editing
    public function mount($blessingId = null)
    {
        if ($blessingId) {
            // Edit mode: Load existing Blessing record by ID
            $blessing = Blessing::findOrFail($blessingId);
            $this->blessingId = $blessing->id;
            $this->fullname = $blessing->fullname;
            $this->location = $blessing->location;
            $this->date = $blessing->date;
            $this->time = $blessing->time;
            $this->contactPersonNameAndNumber = $blessing->contact_person_name_and_number;
            $this->blessedItemAndCount = $blessing->blessed_item_and_count;
        }
    }
    public function update()
    {
        $this->validate();

        if ($this->blessingId) {
            $blessing = Blessing::findOrFail($this->blessingId);
            $blessing->update([
                'fullname' => $this->fullname,
                'location' => $this->location,
                'date' => $this->date,
                'time' => $this->time,
                'contact_person_name_and_number' => $this->contactPersonNameAndNumber,
                'blessed_item_and_count' => $this->blessedItemAndCount,
            ]);
            $this->notification()->success('Success', 'Blessing record updated successfully!');
        } else {

            $count = Blessing::whereDate('date', $this->date)->count();

            if ($count >= 5) {
                $this->notification()->error('Error', 'You can only add up to 5 Blessings per day.');
                return;
            }

            Blessing::create([
                'fullname' => $this->fullname,
                'location' => $this->location,
                'date' => $this->date,
                'time' => $this->time,
                'contact_person_name_and_number' => $this->contactPersonNameAndNumber,
                'blessed_item_and_count' => $this->blessedItemAndCount,
            ]);

            $this->notification()->success('Success', 'Blessing record created successfully!');
        }

        return redirect()->to('/analytics-events-blessing');
    }

    public function render()
    {
        return view('livewire.analytics.events.blessing.edit');
    }
}
