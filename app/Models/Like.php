<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Like extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'garment_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function garment()
    {
        return $this->belongsTo(Garment::class);
    }
}

