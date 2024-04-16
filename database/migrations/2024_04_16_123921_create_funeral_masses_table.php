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
        Schema::create('funeral_masses', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('pangalan_ng_namatay')->nullable();
            $table->string('petsa_ng_kamatayan')->nullable();
            $table->string('petsa_ng_libing')->nullable();
            $table->string('oras_ng_alis')->nullable();
            $table->string('edad')->nullable();
            $table->string('pangalan_ng_asawa')->nullable();
            $table->string('taga_saan')->nullable();
            $table->string('sanhi_ng_kamatayan')->nullable();
            $table->string('oras_ng_misa')->nullable();
            $table->string('saan_ililibing')->nullable();
            $table->string('pangalan_ng_nagpalista')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('taga_pagdiwang')->nullable();
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
        Schema::dropIfExists('funeral_masses');
    }
};
