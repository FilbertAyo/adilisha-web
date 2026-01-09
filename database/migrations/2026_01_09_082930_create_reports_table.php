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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file_path'); // Path to PDF file
            $table->string('file_size')->nullable(); // e.g., "2.5 MB"
            $table->string('year')->nullable(); // e.g., "2024"
            $table->string('category')->default('annual'); // annual, financial, impact, strategic
            $table->json('highlights')->nullable(); // Key highlights as JSON
            $table->date('published_date')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('download_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
