<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sauce extends Model
{
    // Nom de la table
    protected $table = 'sauces';

    // Clé primaire
    protected $primaryKey = 'idSauce';

    // Pas de timestamps
    public $timestamps = false;

    // Nom des colonnes
    protected $fillable = [
        'user_id',
        'name',
        'manufacturer',
        'description',
        'mainPepper',
        'imageUrl',
        'heat',
        'likes',
        'dislikes',
        'created_at',
        'updated_at'
    ];


    // Relation avec la table users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
