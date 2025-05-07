<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivateCatalog extends Model
{
    protected $table = 'private_catalog';
    protected $fillable = ['user_id','garment_id'];
}
