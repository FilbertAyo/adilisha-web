<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'order',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Scope a query to only include active categories.
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Scope a query to order by order field.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Get the galleries for the category.
     */
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}