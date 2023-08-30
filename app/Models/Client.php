<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'telephone',
    ];

    // Si vous voulez activer les timestamps (créé à, mis à jour à)
    public $timestamps = true;

    // ... (autres méthodes, relations, etc.)
}

