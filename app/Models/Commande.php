<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'statut',
        'montant',
        'commentaire',
        'date_commande',
        'date_recuperation'
    ];

    public function user() {
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
