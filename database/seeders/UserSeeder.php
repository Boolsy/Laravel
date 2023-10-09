<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Utilise la factory 'User' pour créer 20 utilisateurs fictifs et les insérer dans la base de données.
        User::factory(20)->create();
    }

}
