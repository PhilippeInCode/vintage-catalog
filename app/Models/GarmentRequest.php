<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GarmentRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'usage_type',
        'description',
        'origin_country',
        'used_country',
        'production_year',
        'usage_year',
        'production_period',
        'materials',
        'status',
        'responded_at',
    ];

    protected $casts = [
        'responded_at' => 'datetime',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->hasMany(GarmentRequestPhoto::class);
    }

    public function dashboard()
    {
        $requests = GarmentRequest::with('user')->latest()->get();
        return view('admin.dashboard', compact('requests'));
    }
}
