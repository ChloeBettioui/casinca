<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'image',
        'actif'
    ];

    public function product()
    {
        return $this->hasOne('App\Models\Product','id','product_id');
    }
}
