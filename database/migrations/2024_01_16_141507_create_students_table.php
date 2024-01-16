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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->foreignId("gender_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("blood_type_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("nationality_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->date('birth_date');
            $table->foreignId("guardian_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("grade_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("classroom_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("section_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->string('academic_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
