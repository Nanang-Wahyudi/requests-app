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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->date('request_date');
            $table->date('collect_date')->nullable();
            $table->date('complated_date')->nullable();
            $table->string('status');
            $table->string('result')->nullable();
            $table->string('result_file')->nullable();
            $table->text('note')->nullable();
            $table->string('pic')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('request_type_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
