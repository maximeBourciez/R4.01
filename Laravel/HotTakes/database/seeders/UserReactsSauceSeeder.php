<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $sauces = DB::table('sauces')->get('idSauce');
        $users = DB::table('users')->get('idUtilisateur');

        // Créer les réactions
        $userReactsSauce = [];
        foreach ($users as $user) {
            foreach ($sauces as $sauce) {
                $userReactsSauce[] = [
                    'userId' => $user->idUtilisateur,
                    'sauceId' => $sauce->idSauce,
                    'reacted' => rand(0, 1) ? true : false,
                ];
            }
        }

        DB::table('user_reacts_sauce')->insert($userReactsSauce);
    }
}
