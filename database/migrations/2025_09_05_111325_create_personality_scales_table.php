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
        Schema::create('personality_scales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_id')->constrained('personality_tests')->cascadeOnDelete();
            $table->string('name');
            $table->unsignedInteger('threshold');
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personality_scales');
    }
};
