<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = [
        'name',
        'details',
        'image',
        'type',
        'source',
        'location',
        'organizer',
        'event_date',
        'registration_open_date',
        'registration_close_date',
        'application_link',
        'is_visible',
        'status',
        'created_by',
    ];

    protected $casts = [
        'event_date' => 'datetime',
        'registration_open_date' => 'datetime',
        'registration_close_date' => 'datetime',
        'is_visible' => 'boolean',
    ];

    /**
     * Boot method to auto-update status based on dates
     */
    protected static function booted()
    {
        static::saving(function ($event) {
            $event->updateStatus();
        });
    }

    /**
     * Update event status based on dates
     */
    public function updateStatus()
    {
        $now = Carbon::now();
        
        if ($this->registration_close_date && $now->greaterThan($this->registration_close_date)) {
            $this->status = 'closed';
        } elseif ($this->registration_open_date && $now->greaterThanOrEqualTo($this->registration_open_date)) {
            $this->status = 'open';
        } else {
            $this->status = 'upcoming';
        }
    }

    /**
     * Relationship with User (creator)
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Scope to get only visible events
     */
    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    /**
     * Scope to get open events
     */
    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

    /**
     * Scope to get upcoming events
     */
    public function scopeUpcoming($query)
    {
        return $query->where('event_date', '>=', Carbon::now());
    }

    /**
     * Scope to get past events
     */
    public function scopePast($query)
    {
        return $query->where('event_date', '<', Carbon::now());
    }

    /**
     * Check if registration is open
     */
    public function isRegistrationOpen(): bool
    {
        return $this->status === 'open';
    }

    /**
     * Check if event is upcoming
     */
    public function isUpcoming(): bool
    {
        return Carbon::now()->lessThan($this->event_date);
    }

    /**
     * Get formatted event date
     */
    public function getFormattedEventDateAttribute(): string
    {
        return $this->event_date->format('F d, Y');
    }

    /**
     * Get formatted event time
     */
    public function getFormattedEventTimeAttribute(): string
    {
        return $this->event_date->format('h:i A');
    }
}
