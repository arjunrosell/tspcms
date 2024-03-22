<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('positions')->truncate();
        DB::table('positions')->insert([
            [
                'name' => 'System Administrator',
                'slug' => Str::slug('System Administrator'),
                'created_at' => now(),
            ],
            [
                'name' => 'Administrator',
                'slug' => Str::slug('Administrator'),
                'created_at' => now(),
            ],
            [
                'name' => 'Prist',
                'slug' => Str::slug('Prist'),
                'created_at' => now(),
            ],
            [
                'name' => 'Ministry',
                'slug' => Str::slug('Ministry'),
                'created_at' => now(),
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
