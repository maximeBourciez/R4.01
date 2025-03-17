<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SauceSeeder extends Seeder
{
    public function run(): void
    {
        // Récupérer les IDs des utilisateurs
        $userIds = DB::table('users')->pluck('idUtilisateur')->toArray();

        $sauces = [
            [
                'userId' => $userIds[0],
                'name' => 'Ghost Pepper Sauce',
                'manufacturer' => 'Haunted Heat',
                'description' => 'Une sauce extrêmement piquante à base de piments ghost pepper, parfaite pour les amateurs de sensations fortes',
                'mainPepper' => 'Ghost Pepper (Bhut Jolokia)',
                'imageUrl' => 'sauces/ghost-pepper.jpg',
                'heat' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'userId' => $userIds[1],
                'name' => 'Sweet Chipotle',
                'manufacturer' => 'Smoky Heaven',
                'description' => 'Un mélange parfait de piments chipotle fumés et de miel local, offrant un équilibre entre douceur et chaleur',
                'mainPepper' => 'Chipotle (Jalapeño fumé)',
                'imageUrl' => 'sauces/sweet-chipotle.jpg',
                'heat' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'userId' => $userIds[2],
                'name' => 'Habanero Mango',
                'manufacturer' => 'Tropical Spice',
                'description' => 'Une sauce exotique qui combine la douceur de la mangue avec le piquant de l\'habanero',
                'mainPepper' => 'Habanero Orange',
                'imageUrl' => 'sauces/habanero-mango.jpg',
                'heat' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'userId' => $userIds[0],
                'name' => 'Citrus Scorpion',
                'manufacturer' => 'Exotic Heat',
                'description' => 'Une explosion d\'agrumes combinée au piquant intense du piment scorpion',
                'mainPepper' => 'Trinidad Scorpion',
                'imageUrl' => 'sauces/citrus-scorpion.jpg',
                'heat' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'userId' => $userIds[1],
                'name' => 'Jalapeño Verde',
                'manufacturer' => 'Verde Sabor',
                'description' => 'Une sauce verte fraîche à base de jalapeños frais et d\'herbes aromatiques',
                'mainPepper' => 'Jalapeño Vert',
                'imageUrl' => 'sauces/jalapeno-verde.jpg',
                'heat' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('sauces')->insert($sauces);
    }
}