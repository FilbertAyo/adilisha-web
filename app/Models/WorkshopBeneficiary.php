<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkshopBeneficiary extends Model
{
    protected $fillable = [
        'workshop_id',
        'name',
        'future_aspiration',
        'image',
        'order',
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }
}
