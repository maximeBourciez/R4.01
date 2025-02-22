<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UtilisateurSeeder extends Seeder
{
    public function run(): void
    {
        $utilisateurs = [
            [
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password456'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'pierre.martin@example.com',
                'password' => Hash::make('password789'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('utilisateur')->insert($utilisateurs);
    }
}