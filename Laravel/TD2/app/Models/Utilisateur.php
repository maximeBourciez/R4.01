<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sauce;

class Utilisateur extends Model
{
    // Nom de la table
    protected $table = 'utilisateur';

    // Clé primaire
    protected $primaryKey = 'idUtilisateur';

    // Attributs
    protected $fillable = [
        'email',
        'password'
    ];

    // Désactiver les timestamps
    public $timestamps = false;

    // Relation avec la table sauce
    public function sauces()
    {
        return $this->hasMany(Sauce::class, 'userId');
    }

    
}
