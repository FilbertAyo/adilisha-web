<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkshopTestimonial extends Model
{
    protected $fillable = [
        'workshop_id',
        'name',
        'role',
        'school',
        'testimonial',
        'image',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
