<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_availments', function (Blueprint $table) {
            $table->id();
            $table->string('requester_name');
            $table->string('contact_number');
            $table->string('service_type');
            $table->text('incident_location');
            $table->enum('status', ['pending', 'dispatched', 'resolved', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_availments');
    }
};