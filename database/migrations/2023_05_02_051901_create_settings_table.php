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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('t_list_id', 100)->charset('utf8mb4_general_ci');
            $table->string('t_board_id', 100)->charset('utf8mb4_general_ci');
            $table->string('t_key', 100)->charset('utf8mb4_general_ci');
            $table->string('t_token', 155)->charset('utf8mb4_general_ci');
            $table->bigInteger('line_number');
            $table->string('signature', 100)->charset('utf8mb4_general_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
