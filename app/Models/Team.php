<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'position',
        'instagram',
        'linkedin',
        'description',
        'order',
        'active',
        'profile_image',
    ];

    protected $casts = [
        'active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Scope a query to only include active team members.
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
}
