<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class RendezVous extends Model
{

    protected $table = 'rendez_vous';

    protected $fillable = [
        'client_nom', 'client_prenom', 'date', 'lieu', 'agent_id'
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}
