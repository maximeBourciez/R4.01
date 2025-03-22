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
                'imageUrl' => 'sauces/ghost-pepper.jpg',
                'heat' => 9,
            ],
            [
                'name' => 'Sweet Chipotle',
                'manufacturer' => 'Smoky Heaven',
                'description' => 'Un mélange parfait de piments chipotle fumés et de miel local, offrant un équilibre entre douceur et chaleur',
                'mainPepper' => 'Chipotle (Jalapeño fumé)',
                'imageUrl' => 'sauces/sweet-chipotle.jpg',
                'heat' => 5,
            ],
            [
                'name' => 'Habanero Mango',
                'manufacturer' => 'Tropical Spice',
                'description' => 'Une sauce exotique qui combine la douceur de la mangue avec le piquant de l\'habanero',
                'mainPepper' => 'Habanero Orange',
                'imageUrl' => 'sauces/habanero-mango.jpg',
                'heat' => 7,
            ],
            [
                'name' => 'Citrus Scorpion',
                'manufacturer' => 'Exotic Heat',
                'description' => 'Une explosion d\'agrumes combinée au piquant intense du piment scorpion',
                'mainPepper' => 'Trinidad Scorpion',
                'imageUrl' => 'sauces/citrus-scorpion.jpg',
                'heat' => 8,
            ],
            [
                'name' => 'Jalapeño Verde',
                'manufacturer' => 'Verde Sabor',
                'description' => 'Une sauce verte fraîche à base de jalapeños frais et d\'herbes aromatiques',
                'mainPepper' => 'Jalapeño Vert',
                'imageUrl' => 'sauces/jalapeno-verde.jpg',
                'heat' => 4,
            ],
            [
                'name' => 'Carolina Reaper Fury',
                'manufacturer' => 'Inferno Bites',
                'description' => 'Une sauce terrifiante à base de Carolina Reaper, réservée aux plus courageux',
                'mainPepper' => 'Carolina Reaper',
                'imageUrl' => 'sauces/carolina-reaper.jpg',
                'heat' => 10,
            ],
            [
                'name' => 'Garlic Serrano',
                'manufacturer' => 'Savory Fire',
                'description' => 'Une sauce relevée à l\'ail et aux piments serrano, idéale pour relever vos plats',
                'mainPepper' => 'Serrano',
                'imageUrl' => 'sauces/garlic-serrano.jpg',
                'heat' => 6,
            ],
            [
                'name' => 'Thai Dragon Fire',
                'manufacturer' => 'Asian Heat',
                'description' => 'Une sauce inspirée de la cuisine thaïlandaise, alliant piment thai et lait de coco',
                'mainPepper' => 'Piment Thai',
                'imageUrl' => 'sauces/thai-dragon-fire.jpg',
                'heat' => 7,
            ],
            [
                'name' => 'Pineapple Habanero',
                'manufacturer' => 'Tropical Spice',
                'description' => 'Une explosion de saveurs tropicales avec de l\'ananas sucré et du piment habanero',
                'mainPepper' => 'Habanero Rouge',
                'imageUrl' => 'sauces/pineapple-habanero.jpg',
                'heat' => 6,
            ],
            [
                'name' => 'Smoked Ancho BBQ',
                'manufacturer' => 'BBQ Master',
                'description' => 'Une sauce BBQ douce et fumée avec des piments ancho et une touche de mélasse',
                'mainPepper' => 'Ancho (Poblano séché)',
                'imageUrl' => 'sauces/smoked-ancho.jpg',
                'heat' => 3,
            ],
            [
                'name' => 'Wasabi Jalapeño',
                'manufacturer' => 'Fusion Heat',
                'description' => 'Un mélange explosif de wasabi et de jalapeño pour un piquant unique',
                'mainPepper' => 'Jalapeño',
                'imageUrl' => 'sauces/wasabi-jalapeno.jpg',
                'heat' => 5,
            ],
            [
                'name' => 'Blueberry Scorpion',
                'manufacturer' => 'Exotic Heat',
                'description' => 'Une sauce fruitée avec des myrtilles et du piment scorpion pour une touche sucrée et brûlante',
                'mainPepper' => 'Trinidad Scorpion',
                'imageUrl' => 'sauces/blueberry-scorpion.jpg',
                'heat' => 8,
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
