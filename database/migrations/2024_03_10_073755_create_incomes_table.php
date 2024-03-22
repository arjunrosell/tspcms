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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('income_references_id')->nullable();
            $table->double('amount');
            $table->string('remarks')->nullable();
            $table->string('address')->nullable();
            $table->string('received_from')->nullable();
            $table->unsignedBigInteger('received_by')->nullable();
            $table->enum('status', ['Active', 'Disabled'])->default('Active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
