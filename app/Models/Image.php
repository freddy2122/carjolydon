<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path','voiture_id'];

    public function voiture()
    {
        return $this->belongsTo(Voitures::class);
    }
}
