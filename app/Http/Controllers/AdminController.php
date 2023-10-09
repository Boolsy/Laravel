<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Cette méthode affiche la liste de tous les utilisateurs dans la vue admin.index
    public function index()
    {
        // Récupère tous les utilisateurs depuis la base de données
        $users = User::all();

        // Passe les utilisateurs à la vue 'admin.index' en utilisant la fonction compact
        return view('admin.index', compact('users'));
    }

    // Cette méthode permet de supprimer un utilisateur
    public function deleteUser(Request $request, $id)
    {
        // Recherche l'utilisateur avec l'ID spécifié
        $user = User::find($id);

        // Vérifie si l'utilisateur existe
        if (!$user) {
            return response()->json(['message' => 'L\'utilisateur n\'existe pas.'], 404);
        }

        // Supprime l'utilisateur de la base de données
        $user->delete();

        return response()->json(['message' => 'L\'utilisateur a été supprimé avec succès.']);
    }

    // Cette méthode affiche le formulaire d'édition d'un utilisateur
    public function edit(User $user)
    {
        // Récupère les rôles distincts des utilisateurs pour affichage(Pluck extrait une seule colonne de résult d'une requête)
        $roles = User::distinct()->pluck('role');

        // Passe l'utilisateur à la vue 'admin.edit' et les rôles disponibles
        return view('admin.edit', compact('user', 'roles'));
    }

    // Cette méthode met à jour le rôle d'un utilisateur
    public function updateUser(Request $request, $id)
    {
        // Recherche l'utilisateur avec l'ID spécifié
        $user = User::find($id);

        // Valide les données du formulaire (le rôle doit être 'etudiant', 'professeur' ou 'visiteur')
        $request->validate([
            'role' => 'required|in:etudiant,professeur,visiteur',
        ]);

        // Met à jour le rôle de l'utilisateur avec celui fourni dans la requête
        $user->update([
            'role' => $request->input('role'),
        ]);

        // Redirige vers la liste des utilisateurs avec un message de succès
        return redirect()->route('admin.index')->with('success', 'Le rôle de ' . $user->name . ' a été modifié avec succès.');
    }
}

