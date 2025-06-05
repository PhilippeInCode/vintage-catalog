<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GarmentRequestPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'garment_request_id',
        'image_url',
        'public_id',
    ];

    public function garmentRequest()
    {
        return $this->belongsTo(GarmentRequest::class);
    }
}
