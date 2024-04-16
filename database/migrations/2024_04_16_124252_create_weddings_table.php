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
            $table->date('date_wedding');
            $table->time('time_wedding');
            $table->string('type_wedding')->nullable();
            $table->string('date_application')->nullable();
            $table->string('groom_name');
            $table->string('groom_age');
            $table->string('groom_bday')->nullable();
            $table->string('groom_father')->nullable();
            $table->string('groom_mother')->nullable();
            $table->string('groom_address')->nullable();
            $table->string('groom_contact_no')->nullable();
            $table->string('groom_place_baptism')->nullable();
            $table->string('groom_parish_of')->nullable();
            $table->string('groom_date_bap')->nullable();
            $table->string('groom_book_no_1')->nullable();
            $table->string('groom_line_no_1')->nullable();
            $table->string('groom_page_no_1')->nullable();
            $table->string('groom_place_confirm')->nullable();
            $table->string('groom_parish_confirm')->nullable();
            $table->string('groom_date_confirm')->nullable();
            $table->string('groom_book_no_2')->nullable();
            $table->string('groom_line_no_2')->nullable();
            $table->string('groom_page_no_2')->nullable();
            $table->string('bride_name');
            $table->string('bride_age');
            $table->string('bride_bday')->nullable();
            $table->string('bride_father')->nullable();
            $table->string('bride_mother')->nullable();
            $table->string('bride_address')->nullable();
            $table->string('bride_contact_no')->nullable();
            $table->string('bride_place_baptism')->nullable();
            $table->string('bride_parish_of')->nullable();
            $table->string('bride_date_bap')->nullable();
            $table->string('bride_book_no_1')->nullable();
            $table->string('bride_line_no_1')->nullable();
            $table->string('bride_page_no_1')->nullable();
            $table->string('bride_place_confirm')->nullable();
            $table->string('bride_parish_confirm')->nullable();
            $table->string('bride_date_confirm')->nullable();
            $table->string('bride_book_no_2')->nullable();
            $table->string('bride_line_no_2')->nullable();
            $table->string('bride_page_no_2')->nullable();
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
