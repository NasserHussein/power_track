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
        Schema::create('technician_customer_maintenance', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('technician_id')->unsigned();
            $table->bigInteger('customer_maintenance_id')->unsigned();
            $table->timestamps();
            $table->foreign('technician_id')->references('id')->on('technicians')->onDelete('cascade');
            $table->foreign('customer_maintenance_id')->references('id')->on('customer_maintenances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technician_customer_maintenance');
    }
};
