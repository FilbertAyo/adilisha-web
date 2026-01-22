<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Workshop extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'source',
        'overview',
        'what_we_learned',
        'workshop_date',
        'start_time',
        'end_time',
        'location',
        'organizer',
        'duration',
        'total_participants',
        'girls_participation',
        'attendance_rate',
        'schools_represented',
        'main_image',
        'status',
        'is_active',
        'registration_open_date',
        'registration_close_date',
        'application_link',
        'created_by',
    ];

    protected $casts = [
        'workshop_date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'is_active' => 'boolean',
        'attendance_rate' => 'decimal:2',
        'registration_open_date' => 'datetime',
        'registration_close_date' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($workshop) {
            if (empty($workshop->slug)) {
                $workshop->slug = Str::slug($workshop->title);
            }
        });

        static::updating(function ($workshop) {
            if ($workshop->isDirty('title') && empty($workshop->slug)) {
                $workshop->slug = Str::slug($workshop->title);
            }
        });
    }

    // Relationships
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function galleries()
    {
        return $this->hasMany(WorkshopGallery::class)->orderBy('order');
    }

    public function testimonials()
    {
        return $this->hasMany(WorkshopTestimonial::class)->where('is_active', true)->orderBy('order');
    }

    public function beneficiaries()
    {
        return $this->hasMany(WorkshopBeneficiary::class)->orderBy('order');
    }

    public function tags()
    {
        return $this->belongsToMany(WorkshopTag::class, 'workshop_tag_pivot');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('status', 'upcoming')->where('workshop_date', '>=', now());
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeOngoing($query)
    {
        return $query->where('status', 'ongoing');
    }

    public function scopeOpen($query)
    {
        return $query->where('status', 'open')
            ->where(function($q) {
                $q->whereNull('registration_close_date')
                  ->orWhere('registration_close_date', '>=', now());
            });
    }

    public function scopeClosed($query)
    {
        return $query->where('status', 'closed')
            ->orWhere(function($q) {
                $q->where('status', 'open')
                  ->where('registration_close_date', '<', now());
            });
    }

    public function scopeInternal($query)
    {
        return $query->where('source', 'internal');
    }

    public function scopeExternal($query)
    {
        return $query->where('source', 'external');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Accessors & Mutators
    public function getGirlsParticipationPercentageAttribute()
    {
        if ($this->total_participants > 0) {
            return round(($this->girls_participation / $this->total_participants) * 100, 2);
        }
        return 0;
    }

    public function getFormattedDateAttribute()
    {
        return $this->workshop_date->format('F d, Y');
    }

    public function getFormattedTimeRangeAttribute()
    {
        return $this->start_time->format('g:i A') . ' - ' . $this->end_time->format('g:i A');
    }

    public function getStatusBadgeClassAttribute()
    {
        return match($this->status) {
            'upcoming' => 'badge-info',
            'ongoing' => 'badge-warning',
            'completed' => 'badge-success',
            'cancelled' => 'badge-danger',
            'open' => 'badge-success',
            'closed' => 'badge-danger',
            default => 'badge-secondary',
        };
    }

    public function getIsRegistrationOpenAttribute()
    {
        if ($this->status !== 'open') {
            return false;
        }

        $now = now();
        if ($this->registration_open_date && $now < $this->registration_open_date) {
            return false;
        }

        if ($this->registration_close_date && $now > $this->registration_close_date) {
            return false;
        }

        return true;
    }
}
