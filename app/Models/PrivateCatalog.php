<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PrivateCatalog extends Pivot
{
    protected $table = 'private_catalog';

    protected $fillable = [
        'user_id',
        'garment_id',
    ];
}