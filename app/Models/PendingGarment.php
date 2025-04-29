<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingGarment extends Model
{
    protected $fillable = [
        'user_id',
        'garment_id',
        'status',
        'submitted_at',
    ];

    public $timestamps = false; 
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function garment()
    {
        return $this->belongsTo(Garment::class);
    }
}