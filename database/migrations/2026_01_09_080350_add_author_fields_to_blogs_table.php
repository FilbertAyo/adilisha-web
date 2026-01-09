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
        Schema::table('blogs', function (Blueprint $table) {
            // Add team_id for team member authors
            $table->foreignId('team_id')->nullable()->after('user_id')->constrained()->onDelete('set null');
            
            // Add custom author fields
            $table->string('custom_author_name')->nullable()->after('team_id');
            $table->string('custom_author_position')->nullable()->after('custom_author_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropForeign(['team_id']);
            $table->dropColumn(['team_id', 'custom_author_name', 'custom_author_position']);
        });
    }
};
