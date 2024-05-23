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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('card_no')->nullable();
            $table->string('part')->nullable();
            $table->string('card_model')->nullable();
            $table->string('model_year')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('mast_type')->nullable();
            $table->string('tire_type')->nullable();
            $table->string('card_load')->nullable();
            $table->string('chassis_no')->nullable();
            $table->string('safety')->nullable();
            $table->string('battery')->nullable();
            $table->string('charger')->nullable();
            $table->string('charging_plug')->nullable();
            $table->string('card_hours')->nullable();
            $table->date('date_of_oil')->nullable();
            $table->string('oil_hours')->nullable();
            $table->integer('hours_used')->nullable();
            $table->integer('remaining_hours')->nullable();
            $table->date('date_of_oil_gearbox')->nullable();
            $table->string('oil_hours_gearbox')->nullable();
            $table->integer('hours_used_gearbox')->nullable();
            $table->integer('remaining_hours_gearbox')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
