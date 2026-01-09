<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Blog;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update existing blogs to have "Adilisha Team" as custom author
        Blog::whereNull('team_id')
            ->whereNull('custom_author_name')
            ->update([
                'custom_author_name' => 'Adilisha Team',
                'custom_author_position' => 'Editorial Team'
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No need to reverse
    }
};
