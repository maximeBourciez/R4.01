<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    // Spécifier les champs qu'on peut remplir massivement
    protected $fillable = [
        'matricule',
        'modele',
        'nombredeplace',
        'prix',
        'disponible'
    ];

    // Spécifier le type des attributs
    protected $casts = [
        'prix' => 'float',
        'nombredeplace' => 'integer',
        'disponible' => 'boolean'
    ];

    // Relation many-to-many avec Reservation
    public function reservations()
    {
        return $this->belongsToMany(App\Models\Reservation::class);
    }
}
