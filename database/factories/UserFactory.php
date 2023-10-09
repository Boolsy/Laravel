<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Définit l'état par défaut du modèle.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Cette méthode définit les attributs par défaut de l'utilisateur fictif.
        return [
            'name' => fake()->name(),                             // Génère un nom aléatoire.
            'email' => fake()->unique()->safeEmail(),             // Génère une adresse e-mail aléatoire et unique.
            'email_verified_at' => now(),                         // Définit l'heure actuelle comme date de vérification de l'e-mail.
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // Mot de passe hashé.
            'remember_token' => Str::random(10),                // Génère un jeton de rappel aléatoire.
        ];
    }

    /**
     * Indique que l'adresse e-mail du modèle ne doit pas être vérifiée.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,  // Réinitialise la date de vérification de l'e-mail à null.
        ]);
    }
}
