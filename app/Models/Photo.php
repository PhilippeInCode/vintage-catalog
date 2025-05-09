<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'garment_id',
        'image_url',
    ];

    public function garment()
    {
        return $this->belongsTo(Garment::class);
    }
}