<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | Ce contrôleur gère l'inscription de nouveaux utilisateurs ainsi que leur
    | validation et création. Par défaut, ce contrôleur utilise un trait
    | pour fournir cette fonctionnalité sans nécessiter de code supplémentaire.
    |
    */

    use RegistersUsers; // Utilise le trait RegistersUsers pour gérer l'inscription des utilisateurs.

    /**
     * Où rediriger les utilisateurs après leur inscription.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::PROFILE; // Définit la page de redirection après l'inscription réussie.

    /**
     * Crée une nouvelle instance de contrôleur.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest'); // Applique le middleware 'guest', ce qui signifie que l'inscription est autorisée uniquement pour les utilisateurs non connectés.
    }

    /**
     * Obtient un validateur pour une demande d'inscription entrante.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // Crée un validateur en utilisant les règles de validation pour les données d'inscription.
        // Ces règles vérifient que le nom est requis, que l'email est une adresse email valide,
        // que l'email est unique dans la table "users", que le mot de passe est requis et a une longueur minimale de 8 caractères,
        // et que le champ de confirmation de mot de passe correspond au mot de passe.
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Crée une nouvelle instance utilisateur après une inscription valide.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Crée un nouvel utilisateur en utilisant les données fournies dans le tableau $data.
        // Les données du nom, de l'e-mail et du mot de passe sont extraites du tableau $data,
        // et le mot de passe est haché avant d'être stocké dans la base de données.
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
