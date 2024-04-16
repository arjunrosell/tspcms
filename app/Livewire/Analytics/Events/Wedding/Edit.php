<?php

namespace App\Livewire\Analytics\Events\Wedding;

use App\Models\Wedding;
use Livewire\Component;
use WireUi\Traits\Actions;

class Edit extends Component
{
    use Actions;

    public $status;
    public $objId;
    public $show = true;
    public $date_wedding;
    public $time_wedding;
    public $type_wedding;
    public $date_application;
    public $groom_name;
    public $groom_age;
    public $groom_bday;
    public $groom_father;
    public $groom_mother;
    public $groom_address;
    public $groom_contact_no;
    public $groom_place_baptism;
    public $groom_parish_of;
    public $groom_date_bap;
    public $groom_book_no_1;
    public $groom_line_no_1;
    public $groom_page_no_1;
    public $groom_place_confirm;
    public $groom_parish_confirm;
    public $groom_date_confirm;
    public $groom_book_no_2;
    public $groom_line_no_2;
    public $groom_page_no_2;
    public $bride_name;
    public $bride_age;
    public $bride_bday;
    public $bride_father;
    public $bride_mother;
    public $bride_address;
    public $bride_contact_no;
    public $bride_place_baptism;
    public $bride_parish_of;
    public $bride_date_bap;
    public $bride_book_no_1;
    public $bride_line_no_1;
    public $bride_page_no_1;
    public $bride_place_confirm;
    public $bride_parish_confirm;
    public $bride_date_confirm;
    public $bride_book_no_2;
    public $bride_line_no_2;
    public $bride_page_no_2;

    protected $listeners = [
        'editModal' => 'fetch'
    ];
    public function update()
    {
        try {
            $wedding = Wedding::find($this->objId);
            $wedding->update([
                'date_wedding' => $this->date_wedding,
                'time_wedding' => $this->time_wedding,
                'type_wedding' => $this->type_wedding,
                'date_application' => $this->date_application,
                'groom_name' => $this->groom_name,
                'groom_age' => $this->groom_age,
                'groom_bday' => $this->groom_bday,
                'groom_father' => $this->groom_father,
                'groom_mother' => $this->groom_mother,
                'groom_address' => $this->groom_address,
                'groom_contact_no' => $this->groom_contact_no,
                'groom_place_baptism' => $this->groom_place_baptism,
                'groom_parish_of' => $this->groom_parish_of,
                'groom_date_bap' => $this->groom_date_bap,
                'groom_book_no_1' => $this->groom_book_no_1,
                'groom_line_no_1' => $this->groom_line_no_1,
                'groom_page_no_1' => $this->groom_page_no_1,
                'groom_place_confirm' => $this->groom_place_confirm,
                'groom_parish_confirm' => $this->groom_parish_confirm,
                'groom_date_confirm' => $this->groom_date_confirm,
                'groom_book_no_2' => $this->groom_book_no_2,
                'groom_line_no_2' => $this->groom_line_no_2,
                'groom_page_no_2' => $this->groom_page_no_2,
                'bride_name' => $this->bride_name,
                'bride_age' => $this->bride_age,
                'bride_bday' => $this->bride_bday,
                'bride_father' => $this->bride_father,
                'bride_mother' => $this->bride_mother,
                'bride_address' => $this->bride_address,
                'bride_contact_no' => $this->bride_contact_no,
                'bride_place_baptism' => $this->bride_place_baptism,
                'bride_parish_of' => $this->bride_parish_of,
                'bride_date_bap' => $this->bride_date_bap,
                'bride_book_no_1' => $this->bride_book_no_1,
                'bride_line_no_1' => $this->bride_line_no_1,
                'bride_page_no_1' => $this->bride_page_no_1,
                'bride_place_confirm' => $this->bride_place_confirm,
                'bride_parish_confirm' => $this->bride_parish_confirm,
                'bride_date_confirm' => $this->bride_date_confirm,
                'bride_book_no_2' => $this->bride_book_no_2,
                'bride_line_no_2' => $this->bride_line_no_2,
                'bride_page_no_2' => $this->bride_page_no_2,
            ]);

            if ($wedding->save()) {
                $this->notification()->success(
                    $title = 'Success',
                    $description = 'Your work was successfully saved'
                );
                $this->reset();
                return redirect()->route('analytics-events-wedding.index');
            } else {
                $this->notification()->error(
                    $title = 'Error',
                    $description = 'Failed to update wedding status'
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
            $wedding = Wedding::find($this->objId);
            $this->date_wedding = $wedding->date_wedding;
            $this->time_wedding = $wedding->time_wedding;
            $this->type_wedding = $wedding->type_wedding;
            $this->date_application = $wedding->date_application;
            $this->groom_name = $wedding->groom_name;
            $this->groom_age = $wedding->groom_age;
            $this->groom_bday = $wedding->groom_bday;
            $this->groom_father = $wedding->groom_father;
            $this->groom_mother = $wedding->groom_mother;
            $this->groom_address = $wedding->groom_address;
            $this->groom_contact_no = $wedding->groom_contact_no;
            $this->groom_place_baptism = $wedding->groom_place_baptism;
            $this->groom_parish_of = $wedding->groom_parish_of;
            $this->groom_date_bap = $wedding->groom_date_bap;
            $this->groom_book_no_1 = $wedding->groom_book_no_1;
            $this->groom_line_no_1 = $wedding->groom_line_no_1;
            $this->groom_page_no_1 = $wedding->groom_page_no_1;
            $this->groom_place_confirm = $wedding->groom_place_confirm;
            $this->groom_parish_confirm = $wedding->groom_parish_confirm;
            $this->groom_date_confirm = $wedding->groom_date_confirm;
            $this->groom_book_no_2 = $wedding->groom_book_no_2;
            $this->groom_line_no_2 = $wedding->groom_line_no_2;
            $this->groom_page_no_2 = $wedding->groom_page_no_2;
            $this->bride_name = $wedding->bride_name;
            $this->bride_age = $wedding->bride_age;
            $this->bride_bday = $wedding->bride_bday;
            $this->bride_father = $wedding->bride_father;
            $this->bride_mother = $wedding->bride_mother;
            $this->bride_address = $wedding->bride_address;
            $this->bride_contact_no = $wedding->bride_contact_no;
            $this->bride_place_baptism = $wedding->bride_place_baptism;
            $this->bride_parish_of = $wedding->bride_parish_of;
            $this->bride_date_bap = $wedding->bride_date_bap;
            $this->bride_book_no_1 = $wedding->bride_book_no_1;
            $this->bride_line_no_1 = $wedding->bride_line_no_1;
            $this->bride_page_no_1 = $wedding->bride_page_no_1;
            $this->bride_place_confirm = $wedding->bride_place_confirm;
            $this->bride_parish_confirm = $wedding->bride_parish_confirm;
            $this->bride_date_confirm = $wedding->bride_date_confirm;
            $this->bride_book_no_2 = $wedding->bride_book_no_2;
            $this->bride_line_no_2 = $wedding->bride_line_no_2;
            $this->bride_page_no_2 = $wedding->bride_page_no_2;
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Failed to fetch data'
            );
        }
    }
    public function render()
    {
        return view('livewire.analytics.events.wedding.edit');
    }
}
