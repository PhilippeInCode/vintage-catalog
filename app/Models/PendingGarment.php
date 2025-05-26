<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class PendingGarment extends Model
{
    use HasFactory;

    protected $table = 'pending_garments';

    public $timestamps = false;


    protected $fillable = [
        'user_id',
        'garment_id',
        'status',
        'submitted_at',
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

