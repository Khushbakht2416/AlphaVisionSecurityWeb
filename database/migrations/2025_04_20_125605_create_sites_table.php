<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');

            $table->string('name');
            $table->string('type')->nullable();
            $table->text('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('description')->nullable();
            $table->text('emergency_protocol')->nullable();

            $table->integer('no_of_cameras')->nullable();
            $table->string('camera_software')->nullable();
            $table->string('software_credentials')->nullable();

            $table->tinyInteger('status')->default(1);

            $table->string('token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
