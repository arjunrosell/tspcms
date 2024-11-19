<?php

namespace App\Livewire\Analytics\Events\Blessing;

use App\Models\Blessing;
use Livewire\Component;
use App\Models\AuditLog;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    use Actions;

    public $blessingId;
    public $fullname;
    public $location;
    public $date;
    public $time;
    public $contactPersonNameAndNumber;
    public $blessedItemAndCount;

    protected $rules = [
        'fullname' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'date' => 'required|date|after_or_equal:today',
        'time' => 'required|time_between:08:00,17:00', // Validate between 8 AM and 5 PM
        'contactPersonNameAndNumber' => 'required|string|max:255',
        'blessedItemAndCount' => 'required|string|max:255',
    ];

    protected $messages = [
        'time.time_between' => 'The time must be between 8:00 AM and 5:00 PM.',
    ];

    public function mount($blessingId)
    {
        $blessing = Blessing::findOrFail($blessingId);

        $this->blessingId = $blessing->id;
        $this->fullname = $blessing->fullname;
        $this->location = $blessing->location;
        $this->date = $blessing->date;
        $this->time = $blessing->time;
        $this->contactPersonNameAndNumber = $blessing->contact_person_name_and_number;
        $this->blessedItemAndCount = $blessing->blessed_item_and_count;
    }

    public function update()
    {

        $this->validate();

        $blessing = Blessing::findOrFail($this->blessingId);

        $blessing->update([
            'fullname' => $this->fullname,
            'location' => $this->location,
            'date' => $this->date,
            'time' => $this->time,
            'contact_person_name_and_number' => $this->contactPersonNameAndNumber,
            'blessed_item_and_count' => $this->blessedItemAndCount,
        ]);
        $this->logAction('Updated the blessing record for ' . $this->fullname);

        $this->notification()->success('Success', 'Blessing record updated successfully!');

        return redirect()->to('/analytics-events-blessing');
    }

    private function logAction($message)
    {
        AuditLog::create([
            'audit' => $message,
            'audit_date' => now(),
            'user_id' => Auth::id(),
        ]);
    }

    public function render()
    {
        return view('livewire.analytics.events.blessing.edit');
    }
}
