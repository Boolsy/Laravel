<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;

class AssignAdminRole
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        // Récupère l'utilisateur associé à l'événement.
        $user = $event->user;

        // Vérifie si c'est le premier utilisateur enregistré dans le système.
        if (User::count() === 1) {
            // Si le premier utilisateur est enregistré et son rôle est 'admin', ne rien faire.
            // Sinon, mettre à jour le rôle de cet utilisateur en 'admin'.
            if ($user->role === 'admin') {
                // L'utilisateur a déjà un rôle 'admin', aucune action requise.
            } else {
                // L'utilisateur n'a pas de rôle 'admin', donc met à jour son rôle en 'admin'.
                $user->update(['role' => 'admin']);
            }
        }
    }
}
