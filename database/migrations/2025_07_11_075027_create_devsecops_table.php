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
        Schema::create('devsecops', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_url')->nullable();
            $table->string('type_scan')->nullable();
            $table->string('repository_url')->nullable();
            $table->string('branch_name')->nullable();
            $table->text('purpose')->nullable();
            $table->string('pr_url')->nullable();
            $table->unsignedBigInteger('request_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devsecops');
    }
};
