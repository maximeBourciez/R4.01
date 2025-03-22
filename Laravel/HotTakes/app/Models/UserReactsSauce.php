<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReactsSauce extends Model
{
    use HasFactory;

    protected $table = 'user_reacts_sauce';
    public $incrementing = false; // Car la clé primaire est composée
    public $timestamps = false; // À activer si besoin de timestamps

    protected $fillable = [
        'userId',
        'sauceId',
        'reaction',
    ];

    /**
     * Relation avec l'utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    /**
     * Relation avec la sauce.
     */
    public function sauce()
    {
        return $this->belongsTo(Sauce::class, 'sauceId');
    }
}
