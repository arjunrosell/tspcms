<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuneralMassesTable extends Migration
{
    public function up(): void
    {
        Schema::create('funeral_masses', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('deceased_name');
            $table->date('death_date');
            $table->date('birth_date');
            $table->integer('age');
            $table->time('mass_time');
            $table->date('burial_date');
            $table->string('spouse_name')->nullable();
            $table->string('place_of_origin')->nullable();
            $table->string('cause_of_death')->nullable();
            $table->time('departure_time')->nullable();
            $table->string('burial_place')->nullable();
            $table->string('registrant_name')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('celebration_place')->nullable();
            $table->enum('status', ['Active', 'Disabled'])->default('Active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('funeral_masses');
    }
}
