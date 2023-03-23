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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('person_id');
            $table->string('email')->unique();
            $table->string('cellphone_number');
            $table->string('cellphone_number_verified_at');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_active');
            $table->string('password');
            $table->string('genealogy_invitation_code');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
