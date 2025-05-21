<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory;
    protected $table = 'photos';

    protected $fillable = [
        'garment_id',
        'image_url',
    ];
    
    public function garment()
    {
        return $this->belongsTo(Garment::class);
    }
}

 
