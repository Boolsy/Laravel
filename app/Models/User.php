<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // Utilise les traits HasApiTokens, HasFactory, et Notifiable.

    /**
     * Les attributs qui sont massivement assignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',         // Nom de l'utilisateur.
        'email',        // Adresse e-mail de l'utilisateur.
        'password',     // Mot de passe de l'utilisateur.
        'role',         // Rôle de l'utilisateur.
        'lastlogin',    // Date et heure de la dernière connexion de l'utilisateur.
    ];

    /**
     * Les attributs qui doivent être masqués pour la sérialisation.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',          // Masque le mot de passe.
        'remember_token',    // Masque le jeton de rappel.
    ];

    /**
     * Les attributs qui doivent être convertis en types natifs.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // Convertit la colonne 'email_verified_at' en un type de date et heure.
        'password' => 'hashed',           // Indique que le mot de passe est haché.
    ];

    /**
     * Vérifie si l'utilisateur a un rôle spécifique.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }


}
