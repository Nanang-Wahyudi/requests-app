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
         Schema::create('request_details', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_url')->nullable();
            $table->string('server_name')->nullable();
            $table->string('current_spec')->nullable();
            $table->string('requested_spec')->nullable();
            $table->string('software_version')->nullable();
            $table->string('software_name')->nullable();
            $table->string('file')->nullable();
            $table->string('service_name')->nullable();
            $table->string('feature')->nullable();
            $table->string('source_ip')->nullable();
            $table->string('destination_ip')->nullable();
            $table->string('port')->nullable();
            $table->string('database_name')->nullable();
            $table->string('query')->nullable();
            $table->text('description')->nullable();
            $table->string('scan_type')->nullable();
            $table->string('repository_url')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('pr_url')->nullable();
            $table->text('purpose')->nullable();
            $table->unsignedBigInteger('request_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_details');
    }
};
