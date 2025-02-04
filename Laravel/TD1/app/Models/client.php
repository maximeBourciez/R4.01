<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Nom de ula table si différent du nom par défat
    protected $table = 'clients';

    // Clé primaire (si ce n'est pas "id")
    protected $primaryKey = 'numeroClient';

    // Autoriser les champs modifiables en masse
    protected $fillable = [
        'nom',
        'email',
        'carteBancaire'
    ];

    // Spécifier les types des attributs
    protected $casts = [
        'nom' => 'string',
        'email' => 'string',
        'carteBancaire' => 'string'
    ];

    // Relation One-to-Many avec Reservation
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
