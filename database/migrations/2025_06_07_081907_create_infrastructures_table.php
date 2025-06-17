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
        Schema::create('infrastructures', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_url')->nullable();
            $table->string('server_name')->nullable();
            $table->string('current_spec')->nullable();
            $table->string('requested_spec')->nullable();
            $table->text('description')->nullable();
            $table->string('software_version')->nullable();
            $table->unsignedBigInteger('request_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infrastructures');
    }
};
