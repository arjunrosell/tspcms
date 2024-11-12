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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donation_references_id');
            $table->string('name')->nullable();
            $table->double('amount');
            $table->date('date');
            $table->enum('status', ['Active', 'Disabled'])->default('Active')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->enum('donor_type', ['Anonymous', 'Organization', 'Donor Name'])->default('Anonymous');
            $table->string('received_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
