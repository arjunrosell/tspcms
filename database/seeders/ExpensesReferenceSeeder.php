<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ExpensesReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('expense_references')->truncate();
        DB::table('expense_references')->insert([
            [
                'name' => 'Foods',
                'slug' => Str::slug('Foods'),
                'created_at' => now(),
            ],
            [
                'name' => 'Transportation',
                'slug' => Str::slug('Transportation'),
                'created_at' => now(),
            ],
            [
                'name' => 'Utilities',
                'slug' => Str::slug('Utilities'),
                'created_at' => now(),
            ],
            [
                'name' => 'Water Bills',
                'slug' => Str::slug('Water Bills'),
                'created_at' => now(),
            ],
            [
                'name' => 'Electric Bills',
                'slug' => Str::slug('Electric Bills'),
                'created_at' => now(),
            ],
            [
                'name' => 'Cables and Internet',
                'slug' => Str::slug('Cables and Internet'),
                'created_at' => now(),
            ],
            [
                'name' => 'Minor Repair and Renovations',
                'slug' => Str::slug('Minor Repair and Renovations'),
                'created_at' => now(),
            ],
            [
                'name' => 'Furniture and Fixtures',
                'slug' => Str::slug('Furniture and Fixtures'),
                'created_at' => now(),
            ],
            [
                'name' => 'Kitchen needs and Utensils',
                'slug' => Str::slug('Kitchen needs and Utensils'),
                'created_at' => now(),
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
