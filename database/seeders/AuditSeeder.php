<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuditSeeder extends Seeder
{
    public function run()
    {
        $user = User::where('email', 'superadmin@email.com')->first();

        if ($user) {
            DB::table('audit')->insert([
                'user_id' => $user->id,
                'audit' => 'User Login email: superadmin@email.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        } else {
            DB::table('audit')->insert([
                'user_id' => null,
                'audit' => 'Attempted user login with email: superadmin@email.com, but user not found.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
