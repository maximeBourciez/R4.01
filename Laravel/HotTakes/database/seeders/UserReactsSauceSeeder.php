<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserReactsSauceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer les sauces et les utilisateurs
        $sauces = DB::table('sauces')->pluck('idSauce')->toArray();
        $users = DB::table('users')->pluck('id')->toArray();

        // Vérifier s'il y a des utilisateurs et des sauces avant d'insérer
        if (empty($sauces) || empty($users)) {
            echo "Aucune sauce ou utilisateur trouvé. Veuillez exécuter les autres seeders d'abord.\n";
            return;
        }

        // Créer les réactions
        $userReactsSauce = [];
        foreach ($users as $userId) {
            foreach ($sauces as $sauceId) {
                $userReactsSauce[] = [
                    'userId' => $userId,
                    'sauceId' => $sauceId,
                    'reaction' => rand(-1, 1), // -1 = dislike, 0 = neutre, 1 = like
                ];
            }
        }

        // Insertion en base de données
        DB::table('user_reacts_sauce')->insert($userReactsSauce);
    }
}
