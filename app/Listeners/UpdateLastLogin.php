<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Authenticated;


class UpdateLastLogin
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
    public function handle(Login $event): void
    {
        // Récupère l'utilisateur qui vient de se connecter.
        $user = $event->user;

        // Met à jour la date et l'heure de la dernière connexion de l'utilisateur à (now).
        $user->update(['lastlogin' => now()]);
    }

}
