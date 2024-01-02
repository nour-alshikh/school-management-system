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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');

            // father's info
            $table->string('father_name');
            $table->string('father_national_id');
            $table->string('father_passport_id');
            $table->string('father_phone');
            $table->string('father_job');
            $table->unsignedBigInteger('father_nationality_id');
            $table->unsignedBigInteger('father_blood_type_id');
            $table->unsignedBigInteger('father_religion_id');

            $table->foreign('father_nationality_id')->references('id')->on('nationalities');
            $table->foreign('father_blood_type_id')->references('id')->on('blood_types');
            $table->foreign('father_religion_id')->references('id')->on('religions');
            $table->string('father_address');

            // mother's info
            $table->string('mother_name');
            $table->string('mother_national_id');
            $table->string('mother_passport_id');
            $table->string('mother_phone');
            $table->string('mother_job');
            $table->unsignedBigInteger('mother_nationality_id');
            $table->unsignedBigInteger('mother_blood_type_id');
            $table->unsignedBigInteger('mother_religion_id');

            $table->foreign('mother_nationality_id')->references('id')->on('nationalities');
            $table->foreign('mother_blood_type_id')->references('id')->on('blood_types');
            $table->foreign('mother_religion_id')->references('id')->on('religions');
            $table->string('mother_address');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
