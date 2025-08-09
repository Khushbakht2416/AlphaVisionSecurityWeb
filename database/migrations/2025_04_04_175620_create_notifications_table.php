<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->enum('notification_type', ['hourly', 'incident']);
            $table->text('message');
            $table->timestamp('notification_date');
            $table->enum('status', ['unread', 'read'])->default('unread');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
