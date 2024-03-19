<?php

namespace App\Livewire\UserManagement\User;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\Position;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

class Index extends Component
{
    use Actions;

    public $profile;
    public $positions;
    public $fname;
    public $mname;
    public $lname;
    public $nickname;
    public $DOB;
    public $gender;
    public $contact_no;
    public $permanent_address;
    public $user_detail_id;
    public $position_id;
    public $email;
    public $password;

    public $status;
    public $objId;
    public $show = true;

    protected $listeners = [
        'editModal' => 'fetch'
    ];

    public function fetch($name, $id)
    {

        try {
            $this->objId = $id;
            $this->dispatch('edit-modal');
            $user = User::find($this->objId);
            $this->profile = $user->user_detail->profile;
            $this->fname = $user->user_detail->fname;
            $this->mname = $user->user_detail->mname;
            $this->lname = $user->user_detail->lname;
            $this->position_id = $user->user_detail->position_id;
            $this->nickname = $user->user_detail->nickname;
            $this->DOB = $user->user_detail->DOB;
            $this->gender = $user->user_detail->gender;
            $this->contact_no = $user->user_detail->contact_no;
            $this->permanent_address = $user->user_detail->permanent_address;
            $this->user_detail_id = $user->user_detail_id;
            $this->email = $user->email;
            $this->dispatch('open-modal', ['name' => $name]);
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Failed to fetch data'
            );
        }
    }

    public function create()
    {
        try {
            $userDetail = UserDetail::create([
                'profile' => $this->profile,
                'position_id' => 1,
                'fname' => $this->fname,
                'mname' => $this->mname,
                'lname' => $this->lname,
                'nickname' => $this->nickname,
                'DOB' => $this->DOB,
                'gender' => $this->gender,
                'contact_no' => $this->contact_no,
                'permanent_address' => $this->permanent_address
            ]);
            $userDetail->user()->create([
                'user_detail_id' => $userDetail->id,
                'email' => $this->email,
                'password' => Hash::make($this->password)
            ]);

            if ($userDetail->save()) {
                $this->notification()->success(
                    $title = 'Success',
                    $description = 'Your work was successfully saved'
                );
                $this->dispatch('close-modal');
                $this->dispatch('refreshDatatable');
                $this->reset();
            } else {
                $this->notification()->error(
                    $title = 'Error',
                    $description = 'Failed to update user status'
                );
            }
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Something went wrong' . $th->getMessage()
            );
        }
    }

    // public function fetch($pKey)
    // {
    //     try {
    //         $this->objId = $pKey;
    //         $this->dispatch('edit-modal');
    //         $user = User::find($this->objId);
    //         $this->profile = $user->user_detail->profile;
    //         $this->fname = $user->user_detail->fname;
    //         $this->mname = $user->user_detail->mname;
    //         $this->lname = $user->user_detail->lname;
    //         $this->position_id = $user->user_detail->position_id;
    //         $this->nickname = $user->user_detail->nickname;
    //         $this->DOB = $user->user_detail->DOB;
    //         $this->gender = $user->user_detail->gender;
    //         $this->contact_no = $user->user_detail->contact_no;
    //         $this->permanent_address = $user->user_detail->permanent_address;
    //         $this->user_detail_id = $user->user_detail_id;
    //         $this->email = $user->email;
    //     } catch (\Throwable $th) {
    //         $this->notification()->error(
    //             $title = 'Error',
    //             $description = 'Failed to fetch data'
    //         );
    //     }
    // }

    public function update()
    {
        try {
            $user = User::find($this->objId);
            $user->email = $this->email;
            $user->user_detail()->update([
                'profile' => $this->profile,
                'position_id' => $this->position_id,
                'fname' => $this->fname,
                'mname' => $this->mname,
                'lname' => $this->lname,
                'nickname' => $this->nickname,
                'DOB' => $this->DOB,
                'gender' => $this->gender,
                'contact_no' => $this->contact_no,
                'permanent_address' => $this->permanent_address
            ]);
            if ($user->save()) {
                $this->notification()->success(
                    $title = 'Success',
                    $description = 'Your work was successfully saved'
                );
                $this->dispatch('close-modal');
                $this->dispatch('refreshDatatable');
                $this->reset();
            } else {
                $this->notification()->error(
                    $title = 'Error',
                    $description = 'Failed to update user status'
                );
            }
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Something went wrong ' . $th->getMessage()
            );
        }
    }

    public function confirmDelete($pkey)
    {
        try {
            $this->objId = $pkey;
            $this->dialog()->confirm([
                'title'       => 'Are you Sure you want to delete this?',
                'description' => 'You cant revert this',
                'acceptLabel' => 'Yes',
                'method'      => 'delete'
            ]);
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Something went wrong'
            );
        }
    }

    public function delete()
    {
        try {
            $user = User::find($this->objId);
            if ($user->delete() && $user->user_detail()->delete()) {
                $this->notification()->success(
                    $title = 'Success',
                    $description = 'Your work was successfully saved'
                );
                $this->dispatch('close-modal');
                $this->dispatch('refreshDatatable');
                $this->reset();
            } else {
                $this->notification()->error(
                    $title = 'Error',
                    $description = 'Failed to update user status'
                );
            }
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Something went wrong'
            );
        }
    }

    public function resetComponent()
    {
        $this->reset();
    }

    public function render()
    {
        $this->positions = Position::where('status', 'Active')->get();
        return view('livewire.user-management.user.index');
    }
}
