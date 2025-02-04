<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insérer 10 clients aléatoires en utilisant la Factory
        Client::factory(10)->create();
    }
}
