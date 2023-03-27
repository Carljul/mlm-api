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
        Schema::create('variations', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('size')->nullable();
            $table->decimal('custom_size')->nullable();
            $table->string('weight_type')->nullable();
            $table->decimal('weight')->nullable();
            $table->string('height_type')->nullable();
            $table->decimal('height')->nullable();
            $table->string('color')->nullable();
            $table->string('color_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variations');
    }
};
