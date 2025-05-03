<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingGarment extends Model
{
    /**
     * The table associated with the model.
     * (By default Laravel pluralizes "pending_garment" to "pending_garments".)
     */
    protected $table = 'pending_garments';

    /**
     * Indicates if the model should be timestamped.
     * We use our own submitted_at column instead.
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'garment_id',
        'status',
        'submitted_at',
    ];

    /**
     * Get the user who submitted this garment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the garment that was submitted.
     */
    public function garment()
    {
        return $this->belongsTo(Garment::class);
    }
}
