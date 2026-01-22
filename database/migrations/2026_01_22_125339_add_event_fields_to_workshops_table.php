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
        Schema::table('workshops', function (Blueprint $table) {
            $table->string('type')->nullable()->after('title'); // workshop, event, competition, training, etc.
            $table->enum('source', ['internal', 'external'])->default('internal')->after('type');
            $table->string('organizer')->nullable()->after('location');
            $table->dateTime('registration_open_date')->nullable()->after('workshop_date');
            $table->dateTime('registration_close_date')->nullable()->after('registration_open_date');
            $table->string('application_link')->nullable()->after('registration_close_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('workshops', function (Blueprint $table) {
            $table->dropColumn([
                'type',
                'source',
                'organizer',
                'registration_open_date',
                'registration_close_date',
                'application_link'
            ]);
        });
    }
};
