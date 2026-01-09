<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'image_path',
        'order',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Scope a query to only include active gallery images.
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
     * Scope a query to filter by category.
     */
    public function scopeCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    /**
     * Get the category that owns the gallery.
     */
    public function category()
    {
        return $this->belongsTo(GalleryCategory::class);
    }
}
