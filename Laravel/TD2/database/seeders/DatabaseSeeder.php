<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Imports des autres seeders
use Database\Seeders\UtilisateurSeeder;
use Database\Seeders\SauceSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UtilisateurSeeder::class,
            SauceSeeder::class,
        ]);
    }
}
