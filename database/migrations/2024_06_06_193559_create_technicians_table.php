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
        Schema::create('technicians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_no');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('date_of_employment')->nullable();
            $table->string('qualifications')->nullable();
            $table->string('previous_experience')->nullable();
            $table->enum('technical_skills',['0','1'])->comment('(0,فني)/(1,مساعد)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technicians');
    }
};
