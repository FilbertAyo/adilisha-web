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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('details');
            $table->string('image')->nullable();
            $table->string('type'); // event, competition, workshop, training, etc.
            $table->enum('source', ['internal', 'external'])->default('internal');
            $table->string('location');
            $table->string('organizer')->nullable();
            $table->dateTime('event_date');
            $table->dateTime('registration_open_date')->nullable();
            $table->dateTime('registration_close_date')->nullable();
            $table->string('application_link')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->enum('status', ['open', 'closed', 'upcoming'])->default('upcoming');
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
