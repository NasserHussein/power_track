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
        Schema::create('operating_expenses', function (Blueprint $table) {
            $table->id();
            $table->string('clause');
            $table->string('description')->nullable();
            $table->integer('amount');
            $table->date('payment_date');
            $table->string('person_responsible_for_payment')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operating_expenses');
    }
};
