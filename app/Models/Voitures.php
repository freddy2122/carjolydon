<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voitures extends Model
{
    use HasFactory;
    protected $fillable = ['marque', 'annee', 'modele','prix','description', 'carrosserie_id', 'transmission_id', 'carburant_id'];

    public function carrosserie()
    {
        return $this->belongsTo(Carrosserie::class);
    }

    public function transmission()
    {
        return $this->belongsTo(Transmission::class);
    }

    public function carburant()
    {
        return $this->belongsTo(Carburant::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'voiture_id');
    }
}
