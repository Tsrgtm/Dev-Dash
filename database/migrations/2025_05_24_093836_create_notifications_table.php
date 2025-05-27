<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\NotificationType;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Notification recipient
            $table->string('title');
            $table->text('body')->nullable();
            $table->string('link')->nullable(); // e.g., /posts/123
            $table->enum('type', NotificationType::values())->default(NotificationType::DEFAULT);
            $table->boolean('read')->default(false);

            // JSON field for optional buttons
            $table->json('action_buttons')->nullable(); // contains primary & secondary button data

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
