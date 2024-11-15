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
        Schema::create('weddings', function (Blueprint $table) {
            $table->id();
            // Wedding Information
            $table->date('wedding_date');
            $table->time('wedding_time');
            $table->string('wedding_type');
            $table->date('application_date');

            // Groom's Information
            $table->string('groom_name');
            $table->integer('groom_age');
            $table->date('groom_birthday');
            $table->string('groom_father')->nullable();
            $table->string('groom_mother')->nullable();
            $table->string('groom_address')->nullable();
            $table->string('groom_contact')->nullable();
            $table->string('groom_baptism')->nullable();
            $table->string('groom_baptism_parish')->nullable();
            $table->date('groom_baptism_date')->nullable();
            $table->string('groom_confirmation')->nullable();
            $table->string('groom_confirmation_parish')->nullable();
            $table->date('groom_confirmation_date')->nullable();

            // Bride's Information
            $table->string('bride_name');
            $table->integer('bride_age');
            $table->date('bride_birthday');
            $table->string('bride_father')->nullable();
            $table->string('bride_mother')->nullable();
            $table->string('bride_address')->nullable();
            $table->string('bride_contact')->nullable();
            $table->string('bride_baptism')->nullable();
            $table->string('bride_baptism_parish')->nullable();
            $table->date('bride_baptism_date')->nullable();
            $table->string('bride_confirmation')->nullable();
            $table->string('bride_confirmation_parish')->nullable();
            $table->date('bride_confirmation_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weddings');
    }
};
