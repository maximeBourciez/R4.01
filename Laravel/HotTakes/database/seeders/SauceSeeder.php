<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SauceSeeder extends Seeder
{
    public function run(): void
    {
        // Récupérer les IDs des utilisateurs
        $userIds = DB::table('users')->pluck('id')->toArray();

        // Vérifier qu'il y a au moins un utilisateur
        if (empty($userIds)) {
            echo "Aucun utilisateur trouvé. Veuillez ajouter des utilisateurs avant d'exécuter ce seeder.\n";
            return;
        }

        // Définition des sauces
        $sauces = [
            [
                'name' => 'Ghost Pepper Sauce',
                'manufacturer' => 'Haunted Heat',
                'description' => 'Une sauce extrêmement piquante à base de piments ghost pepper, parfaite pour les amateurs de sensations fortes',
                'mainPepper' => 'Ghost Pepper (Bhut Jolokia)',
                'imageUrl' => 'storage/sauces/ghost-pepper.jpg',
                'heat' => 9,
            ],
            [
                'name' => 'Sweet Chipotle',
                'manufacturer' => 'Smoky Heaven',
                'description' => 'Un mélange parfait de piments chipotle fumés et de miel local, offrant un équilibre entre douceur et chaleur',
                'mainPepper' => 'Chipotle (Jalapeño fumé)',
                'imageUrl' => 'storage/sauces/sweet-chipotle.jpg',
                'heat' => 5,
            ],
            [
                'name' => 'Habanero Mango',
                'manufacturer' => 'Tropical Spice',
                'description' => 'Une sauce exotique qui combine la douceur de la mangue avec le piquant de l\'habanero',
                'mainPepper' => 'Habanero Orange',
                'imageUrl' => 'storage/sauces/habanero-mango.jpg',
                'heat' => 7,
            ],
            [
                'name' => 'Citrus Scorpion',
                'manufacturer' => 'Exotic Heat',
                'description' => 'Une explosion d\'agrumes combinée au piquant intense du piment scorpion',
                'mainPepper' => 'Trinidad Scorpion',
                'imageUrl' => 'storage/sauces/citrus-scorpion.jpg',
                'heat' => 8,
            ],
            [
                'name' => 'Jalapeño Verde',
                'manufacturer' => 'Verde Sabor',
                'description' => 'Une sauce verte fraîche à base de jalapeños frais et d\'herbes aromatiques',
                'mainPepper' => 'Jalapeño Vert',
                'imageUrl' => 'storage/sauces/jalapeno-verde.jpg',
                'heat' => 4,
            ],
        ];

        // Insérer les sauces avec des userId aléatoires
        foreach ($sauces as &$sauce) {
            $sauce['userId'] = $userIds[array_rand($userIds)]; // Sélectionne un ID utilisateur au hasard
            $sauce['created_at'] = now();
            $sauce['updated_at'] = now();
        }

        // Insertion dans la base de données
        DB::table('sauces')->insert($sauces);
    }
}
