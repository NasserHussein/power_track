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
        Schema::create('customer_maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('card_state');
            $table->string('problem_description');
            $table->date('received_date');
            $table->string('work_details')->nullable();
            $table->string('card_state_after_maintenance')->nullable();
            $table->string('spare_parts')->nullable();
            $table->integer('maintenance_cost')->nullable();
            $table->date('date_of_finishing');
            $table->date('delivery_date');
            $table->longText('notes')->nullable();
            $table->bigInteger('customer_card_id')->unsigned();
            $table->timestamps();
            $table->foreign('customer_card_id')->references('id')->on('customer_cards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_maintenances');
    }
};
