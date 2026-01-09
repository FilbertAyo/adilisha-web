<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Report extends Model
{
    protected $fillable = [
        'title',
        'description',
        'file_path',
        'thumbnail_path',
        'file_size',
        'year',
        'category',
        'highlights',
        'published_date',
        'is_featured',
        'download_count'
    ];

    protected $casts = [
        'highlights' => 'array',
        'published_date' => 'date',
        'is_featured' => 'boolean'
    ];

    public function getFileUrlAttribute()
    {
        return Storage::url($this->file_path);
    }

    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail_path) {
            return asset('storage/' . $this->thumbnail_path);
        }
        return asset('front-end/images/default-report-thumb.jpg');
    }

    public function incrementDownloads()
    {
        $this->increment('download_count');
    }
}
