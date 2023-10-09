<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    // Affiche le profil de l'utilisateur actuellement connecté.
    public function index()
    {
        $user = Auth::user(); // Récupère l'utilisateur actuellement connecté.
        return view('profile.index', compact('user')); // Affiche la vue 'profile.index' en passant l'utilisateur à la vue.
    }

    // Affiche le formulaire d'édition du profil de l'utilisateur.
    public function edit()
    {
        return view('profile.edit'); // Affiche la vue 'profile.edit'.
    }

    // Met à jour les informations du profil de l'utilisateur.
    public function update(Request $request)
    {
        $user = Auth::user(); // Récupère l'utilisateur actuellement connecté.


        // Valide les données de la requête (email, mot de passe, etc.).
        $request->validate([
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:6',
        ], [
            'email.required' => 'Le champ adresse e-mail est obligatoire.',
            'email.unique' => 'L\'adresse e-mail est déjà utilisée par un autre utilisateur. Veuillez en choisir une autre.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
        ]);

        // Met à jour l'adresse e-mail de l'utilisateur.
        $user->email = $request->input('email');

        // Met à jour le mot de passe de l'utilisateur s'il en a saisi un nouveau.
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Enregistre les modifications de l'utilisateur.
        $user->save();

        //with permet de passer un message de succès ou une variable à la vue
        return redirect()->route('profile')->with('success', 'Profil mis à jour avec succès.');
    }

    // Exporte les données de l'utilisateur au format JSON.
    public function export()
    {
        $user = Auth::user(); // Récupère l'utilisateur actuellement connecté.
        $userData = json_encode($user); // Convertit les données de l'utilisateur en JSON.

        // Génère un nom de fichier JSON basé sur le nom de l'utilisateur.
        //Slug transforme une chaîne de texte en une version URL frendly supprime les caractères spéciaux ect
        $fileName = Str::slug($user->name) . '_profile.json';

        // Retourne une réponse JSON avec le contenu des données de l'utilisateur en tant que fichier à télécharger.
        return response($userData)
            ->header('Content-Type', 'application/json')
            ->header('Content-Disposition', "attachment; filename=$fileName");
    }
}
