<?php

namespace Database\Seeders;

use App\Models\UserDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        $userDetail = UserDetail::create([
            'position_id' => 1,
            'fname' => "Super",
            'lname' => "Admin",
            'nickname' =>  "SuperAdmin",
        ]);
        $userDetail->user()->create([
            'user_detail_id' => $userDetail->id,
            'email' => "superadmin@email.com",
            'password' => Hash::make("password")
        ]);
        $userDetail = UserDetail::create([
            'position_id' => 2,
            'fname' => "Sytem",
            'lname' => "Admin",
            'nickname' =>  "SysAd",
        ]);
        $userDetail->user()->create([
            'user_detail_id' => $userDetail->id,
            'email' => "systemadmin@email.com",
            'password' => Hash::make("password")
        ]);
        $userDetail = UserDetail::create([
            'position_id' => 3,
            'fname' => "Prist",
            'lname' => "Prist",
            'nickname' =>  "Prist",
        ]);
        $userDetail->user()->create([
            'user_detail_id' => $userDetail->id,
            'email' => "prist@email.com",
            'password' => Hash::make("password")
        ]);
        $userDetail = UserDetail::create([
            'position_id' => 4,
            'fname' => "Ministry",
            'lname' => "Ministry",
            'nickname' =>  "Ministry",
        ]);
        $userDetail->user()->create([
            'user_detail_id' => $userDetail->id,
            'email' => "ministry@email.com",
            'password' => Hash::make("password")
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
