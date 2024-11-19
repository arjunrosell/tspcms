<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blessings', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('location');
            $table->date('date');
            $table->time('time');
            $table->string('contact_person_name_and_number');
            $table->string('blessed_item_and_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blessings');
    }
};
