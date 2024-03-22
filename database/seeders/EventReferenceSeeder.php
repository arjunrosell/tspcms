<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class EventReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('event_references')->truncate();
        DB::table('event_references')->insert([
            [
                'name' => 'Mass',
                'slug' => Str::slug('Mass'),
                'created_at' => now(),
            ],
            [
                'name' => 'Baptism',
                'slug' => Str::slug('Baptism'),
                'created_at' => now(),
            ],
            [
                'name' => 'Wedding',
                'slug' => Str::slug('Wedding'),
                'created_at' => now(),
            ],
            [
                'name' => 'Confirmation',
                'slug' => Str::slug('Confirmation'),
                'created_at' => now(),
            ],
            [
                'name' => 'Funeral Mass',
                'slug' => Str::slug('Funeral'),
                'created_at' => now(),
            ],
            [
                'name' => 'Blessing/Enthronement',
                'slug' => Str::slug('Blessing/Enthronement'),
                'created_at' => now(),
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
