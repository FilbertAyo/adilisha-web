<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkshopGallery extends Model
{
    protected $fillable = [
        'workshop_id',
        'image_path',
        'caption',
        'order',
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }
}
