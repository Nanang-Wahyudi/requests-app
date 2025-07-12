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
        Schema::create('networks', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_url')->nullable();
            $table->string('server_name')->nullable();
            $table->text('purpose')->nullable();
            $table->string('source_ip')->nullable();
            $table->string('destination_ip')->nullable();
            $table->string('port')->nullable();
            $table->unsignedBigInteger('request_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('networks');
    }
};
