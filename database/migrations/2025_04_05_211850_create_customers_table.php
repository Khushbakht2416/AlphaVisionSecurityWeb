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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('raw_password');
            $table->string('phone_number', 20)->unique()->nullable();
            $table->text('address')->nullable();
            $table->string('city', 50)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('zip_code', 20)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('profile_image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
