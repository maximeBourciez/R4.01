<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sauce extends Model
{
    // Nom de la table
    protected $table = 'sauce';

    // Clé primaire
    protected $primaryKey = 'idSauce';

    // Attributs
    protected $fillable = [
        'userId',
        'name',
        'manufacturer',
        'description',
        'mainPepper',
        'imageUrl',
        'heat',
        'likes',
        'dislikes',
        'usersLiked',
        'usersDisliked'
    ];

    // Désactiver les timestamps
    public $timestamps = false;

    // Relation avec la table utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'userId');
    }
}
