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
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('overview')->nullable();
            $table->text('what_we_learned')->nullable();
            $table->date('workshop_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('location');
            $table->string('duration')->nullable();
            $table->integer('total_participants')->default(0);
            $table->integer('girls_participation')->default(0);
            $table->decimal('attendance_rate', 5, 2)->default(0);
            $table->integer('schools_represented')->default(0);
            $table->string('main_image')->nullable();
            $table->enum('status', ['upcoming', 'ongoing', 'completed', 'cancelled'])->default('upcoming');
            $table->boolean('is_active')->default(true);
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        // Workshop Gallery Images
        Schema::create('workshop_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workshop_id')->constrained()->cascadeOnDelete();
            $table->string('image_path');
            $table->string('caption')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Workshop Testimonials
        Schema::create('workshop_testimonials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workshop_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('role'); // e.g., "Student", "Teacher"
            $table->string('school')->nullable();
            $table->text('testimonial');
            $table->string('image')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Workshop Beneficiaries
        Schema::create('workshop_beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workshop_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('future_aspiration')->nullable();
            $table->string('image')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Workshop Tags
        Schema::create('workshop_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // Workshop Tag Pivot
        Schema::create('workshop_tag_pivot', function (Blueprint $table) {
            $table->foreignId('workshop_id')->constrained()->cascadeOnDelete();
            $table->foreignId('workshop_tag_id')->constrained('workshop_tags')->cascadeOnDelete();
            $table->primary(['workshop_id', 'workshop_tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshop_tag_pivot');
        Schema::dropIfExists('workshop_tags');
        Schema::dropIfExists('workshop_beneficiaries');
        Schema::dropIfExists('workshop_testimonials');
        Schema::dropIfExists('workshop_galleries');
        Schema::dropIfExists('workshops');
    }
};
