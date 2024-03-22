<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DonationReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('income_references')->truncate();
        DB::table('income_references')->insert([
            [
                'name' => 'Mass Collection',
                'slug' => Str::slug('Mass Collection'),
                'created_at' => now(),
            ],
            [
                'name' => 'Baptism',
                'slug' => Str::slug('Baptism'),
                'created_at' => now(),
            ],
            [
                'name' => 'Confirmation',
                'slug' => Str::slug('Confirmation'),
                'created_at' => now(),
            ],
            [
                'name' => 'Funeral',
                'slug' => Str::slug('Funeral'),
                'created_at' => now(),
            ],
            [
                'name' => 'Blessings',
                'slug' => Str::slug('Blessings'),
                'created_at' => now(),
            ],
            [
                'name' => 'Thithes',
                'slug' => Str::slug('Thithes'),
                'created_at' => now(),
            ],
            [
                'name' => 'Offering',
                'slug' => Str::slug('Offering'),
                'created_at' => now(),
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
