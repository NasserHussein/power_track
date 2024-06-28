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
        Schema::create('customer_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('card_no')->nullable();
            $table->string('serial_no');
            $table->string('chassis_no')->nullable();
            $table->string('card_model')->nullable();
            $table->date('date_of_purchase')->nullable();
            $table->longText('notes')->nullable();
            $table->string('customer_name');
            $table->string('phone_no');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('company_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_cards');
    }
};
