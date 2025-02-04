<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Nom de la table 
    protected $table = "reservations";

    // Clé primaire
    protected $primaryKey = "codeReservation";

    // Spécifier les champs qu'on peut remplir massivement
    protected $fillable =[
        "dateReservation",
        "dateAller",
        "dateRetour",
    ];

    // Spécifier le type des attributs
    protected $casts = [
        "dateReservation" => "string",
        "dateAller" => "string",
        "dateRetour" => "string",
    ];

    // Relation many-to-one avec Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
