<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\SauceSeeder;
use Database\Seeders\UserReactsSauceSeeder;
use Database\Seeders\UtilisateurSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder les utilisateurs, sauces et réactions
        $this->call([
            UtilisateurSeeder::class,
            SauceSeeder::class,
            UserReactsSauceSeeder::class,
        ]);
    }
}
