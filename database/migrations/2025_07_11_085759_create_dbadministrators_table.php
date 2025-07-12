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
        Schema::create('dbadministrators', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_url')->nullable();
            $table->string('database_name')->nullable();
            $table->string('query')->nullable();
            $table->text('purpose')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('request_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dbadministrators');
    }
};
