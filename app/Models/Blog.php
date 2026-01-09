<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'user_id',
        'team_id',
        'custom_author_name',
        'custom_author_position',
        'is_published',
        'published_at'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });

        static::updating(function ($blog) {
            if ($blog->isDirty('title') && empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Get the author name (team member or custom author)
     */
    public function getAuthorNameAttribute(): string
    {
        if ($this->team) {
            return $this->team->name;
        }
        
        if ($this->custom_author_name) {
            return $this->custom_author_name;
        }
        
        return $this->user->name;
    }

    /**
     * Get the author position
     */
    public function getAuthorPositionAttribute(): ?string
    {
        if ($this->team) {
            return $this->team->position;
        }
        
        return $this->custom_author_position;
    }

    /**
     * Get the author image
     */
    public function getAuthorImageAttribute(): ?string
    {
        if ($this->team && $this->team->profile_image) {
            return $this->team->profile_image;
        }
        
        return null;
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('published_at', 'desc');
    }
}
