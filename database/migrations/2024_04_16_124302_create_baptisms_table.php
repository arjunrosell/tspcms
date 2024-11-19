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
        Schema::create('baptisms', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_child');
            $table->date('date_of_birth');
            $table->date('date_of_baptism');
            $table->string('place_of_birth');
            $table->string('legitimacy')->nullable();
            $table->string('father_name');
            $table->string('father_place')->nullable();
            $table->string('mother_name');
            $table->string('mother_place')->nullable();
            $table->string('residence');
            $table->string('godfathers');
            $table->string('godmothers');
            $table->string('minister_of_baptism');
            $table->string('parish_priest')->nullable();
            $table->string('name_of_baptized');
            $table->date('date_today')->default(DB::raw('CURRENT_DATE'))->change();
            $table->decimal('offering', 8, 2)->default(0);
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baptisms');
    }
};
