<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // La méthode 'run' est appelée lors de l'exécution de la commande artisan 'db:seed'.

        // Dans cette méthode, on spécifie quel seeder doit être exécuté pour peupler la base de données.

        // Ici, on appelle le seeder 'UserSeeder', qui est responsable de l'insertion de données d'utilisateurs fictifs dans la base de données.
        $this->call(UserSeeder::class);
    }

}

// commande pour crée user php artisan db:seed
