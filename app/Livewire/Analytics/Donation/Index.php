<?php

namespace App\Livewire\Analytics\Donation;

use Livewire\Component;
use App\Models\AuditLog;
use App\Models\Donation;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Models\DonationReference;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use Actions, WithFileUploads;

    public $donation_references_id, $name, $amount, $date, $status, $donor_type, $received_by;
    public $objId, $donation_references;
    public $show = true;
    public $donor_type_options = ['Anonymous', 'Organization', 'Donor Name'];

    protected $listeners = ['editModal' => 'fetch'];

    protected $rules = [
        'donation_references_id' => 'required|exists:donation_references,id',
        'amount' => 'required|numeric|min:0',
        'date' => 'required|date|after_or_equal:today',
        'donor_type' => 'required',
        'received_by' => 'required|string|max:255',
        'name' => 'required_if:donor_type,Organization,Donor Name',
        'status' => 'nullable|in:Active,Inactive',
    ];

    protected $messages = [
        'amount.min' => 'Amount cannot be negative.',
        'date.after_or_equal' => 'The date must be today or a future date.',
        'donation_references_id.required' => 'Please select a donation reference.',
        'name.required_if' => 'Please provide the name of the organization when donating as an Organization.',
        'received_by.required' => 'Please provide the name of the person or entity receiving the donation.',
    ];

    public function create()
    {
        $this->validate();

        try {
            $donation = Donation::create([
                'donation_references_id' => $this->donation_references_id,
                'amount' => $this->amount,
                'date' => $this->date,
                'name' => $this->name,
                'donor_type' => $this->donor_type,
                'status' => $this->status,
                'received_by' => $this->received_by,
            ]);

            $this->handleSuccess($donation);
        } catch (\Throwable $th) {
            $this->notification()->error(
                'Error',
                'Something went wrong: ' . $th->getMessage()
            );
        }
    }

    public function fetch($name, $pkey)
    {
        try {
            $this->objId = $pkey;
            $donation = Donation::findOrFail($this->objId);

            $this->fillDonationData($donation);
            $this->dispatch('open-modal', ['name' => $name]);
        } catch (\Throwable $th) {
            $this->notification()->error(
                'Error',
                'Failed to fetch data: ' . $th->getMessage()
            );
        }
    }

    private function fillDonationData($donation)
    {
        $this->donation_references_id = $donation->donation_references_id;
        $this->amount = $donation->amount;
        $this->date = $donation->date;
        $this->name = $donation->name;
        $this->donor_type = $donation->donor_type;
        $this->status = $donation->status;
        $this->received_by = $donation->received_by;
    }

    private function handleSuccess($donation)
    {
        if ($donation) {
            $donationReference = DonationReference::find($this->donation_references_id);
            $referenceName = $donationReference ? $donationReference->name : 'Unknown Reference';
            $this->logAction('Created a new donation record for ' . $referenceName);
            $this->notification()->success(
                'Success',
                'Your donation was successfully saved.'
            );
            $this->resetFields();
            $this->dispatch('close-modal');
            $this->dispatch('refreshDatatable');
        } else {
            $this->notification()->error(
                'Error',
                'Failed to save the donation.'
            );
        }
    }

    private function resetFields()
    {
        $this->reset([
            'donation_references_id',
            'name',
            'amount',
            'date',
            'status',
            'donor_type',
            'received_by'
        ]);
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
        $this->donation_references = DonationReference::where('status', 'Active')->get();

        $showNameField = $this->donor_type == 'Organization';

        return view('livewire.analytics.donation.index', compact('showNameField'));
    }
}
