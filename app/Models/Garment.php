<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Garment extends Model
{
    protected $fillable = [
        'name',
        'description',
        'origin_country',
        'production_year',
        'production_period',
        'usage_type',
        'usage_year',
        'used_country',
        'materials',
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function usersWhoLiked()
    {
        return $this->belongsToMany(User::class, 'likes')
                    ->withTimestamps();
    }

    public function privateUsers()
    {
        return $this->belongsToMany(User::class, 'private_catalog')
                    ->withTimestamps();
    }

    public function pendingEntries()
    {
        return $this->hasMany(PendingGarment::class);
    }
}