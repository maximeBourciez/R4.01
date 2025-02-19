<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SauceSeeder extends Seeder
{
    public function run(): void
    {
        // Récupérer les IDs des utilisateurs
        $userIds = DB::table('utilisateur')->pluck('idUtilisateur')->toArray();

        $sauces = [
            [
                'userId' => $userIds[0],
                'name' => 'Sauce Sriracha',
                'manufacturer' => 'Huy Fong Foods',
                'description' => 'Sauce piquante à base de piments rouges, ail et vinaigre',
                'mainPepper' => 'Piment rouge jalapeño',
                'imageUrl' => 'sriracha.jpg',
                'heat' => 7,
                'likes' => 45,
                'dislikes' => 2,
                'usersLiked' => json_encode([$userIds[1], $userIds[2]]),
                'usersDisliked' => json_encode([$userIds[0]]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'userId' => $userIds[1],
                'name' => 'Tabasco Original',
                'manufacturer' => 'McIlhenny Company',
                'description' => 'Sauce traditionnelle vieillie en fût de chêne',
                'mainPepper' => 'Tabasco (Capsicum frutescens)',
                'imageUrl' => 'tabasco.jpg',
                'heat' => 6,
                'likes' => 38,
                'dislikes' => 5,
                'usersLiked' => json_encode([$userIds[0]]),
                'usersDisliked' => json_encode([$userIds[2]]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'userId' => $userIds[2],
                'name' => 'Sauce Sambal Oelek',
                'manufacturer' => 'Huy Fong Foods',
                'description' => 'Purée de piments frais, simple et puissante',
                'mainPepper' => 'Piment rouge frais',
                'imageUrl' => 'sambal.jpg',
                'heat' => 8,
                'likes' => 29,
                'dislikes' => 3,
                'usersLiked' => json_encode([$userIds[0], $userIds[1]]),
                'usersDisliked' => json_encode([]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('sauce')->insert($sauces);
    }
}