<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'name',
        'email',
        'from',
        'position',
        'rating',
        'message',
        'active',
        'order',
    ];

    protected $casts = [
        'active' => 'boolean',
        'rating' => 'integer',
        'order' => 'integer',
    ];

    /**
     * Scope a query to only include active feedback.
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
        return $query->orderBy('order', 'asc')->orderBy('created_at', 'desc');
    }
}
