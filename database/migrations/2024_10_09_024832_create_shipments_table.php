<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Foreign key to the orders table
            $table->string('tracking_number')->unique(); // Ensure tracking numbers are unique
            $table->string('status')->default('pending'); // Default status
            $table->date('estimated_delivery')->nullable(); // Allow null values for estimated delivery
            $table->string('origin')->nullable(); // Allow null values for origin
            $table->string('destination')->nullable()->default('Not specified'); // Nullable with a default value
            $table->timestamps(); // Created and updated timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}
