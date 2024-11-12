<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('expense_references_id');
            $table->double('amount');
            $table->longText('remarks')->nullable();
            $table->enum('status', ['Active', 'Disabled'])->default('Active');
            $table->timestamps();
            $table->softDeletes();
            $table->string('date', 50)->nullable();
            $table->longText('event_description')->nullable();
            $table->text('location')->nullable();
            $table->text('files')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
