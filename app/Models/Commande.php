<?php


// Commande.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = ['agent_id', 'client_id', 'voiture_id'];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function voiture()
    {
        return $this->belongsTo(Voitures::class, 'voiture_id');
    }
}
