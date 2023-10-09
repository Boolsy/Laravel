<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateAdminAndRandomUsers extends Command
{
    protected $signature = 'create:admin-users';
    protected $description = 'Crée un admin et 20 utilisateurs fictif';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Demandez à l'utilisateur les informations de l'administrateur
        $name = $this->ask('Saisir le nom de l\'utilisateur admin');
        $email = $this->ask('Saisir l\'adresse email pour l\'admin');
        $password = $this->secret('Saisir le mot de passe de l\'admin');

        // Créez l'administrateur en utilisant les informations saisies
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'admin',
        ]);

        // Créez les 20 utilisateurs aléatoires en utilisant la méthode de seed
        $this->call('db:seed', ['--class' => 'DatabaseSeeder']);

        $this->info('L\'utilisateur Admin et 20 utilisateurs aléatoires ont été créés avec succès.');
    }
}
