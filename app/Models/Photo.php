<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * The table associated with the model.
     * (Laravel will pluralize "photo" to "photos" by default, so this line is optional
     * unless you wish to override the convention.)
     */
    protected $table = 'photos';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'garment_id',
        'image_url',
    ];

    /**
     * Get the garment that this photo belongs to.
     */
    public function garment()
    {
        return $this->belongsTo(Garment::class);
    }
}
 