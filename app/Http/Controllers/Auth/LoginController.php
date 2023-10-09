<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | Ce contrôleur gère l'authentification des utilisateurs pour l'application
    | et les redirige vers l'écran d'accueil. Le contrôleur utilise un trait
    | pour fournir commodément ses fonctionnalités à l'app.
    |
    */

    use AuthenticatesUsers; // Utilise le trait AuthenticatesUsers pour gérer l'authentification.

    /**
     * Où rediriger les utilisateurs après leur connexion.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::PROFILE; // Définit la page de redirection après une connexion réussie.

    /**
     * Crée une nouvelle instance de contrôleur.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout'); // Applique le middleware 'guest' sauf pour la méthode 'logout'.
    }

    // Cette fonction est appelée lorsque l'utilisateur est authentifié avec succès.
    protected function authenticated(Request $request, $user)
    {
        $message =  $user->name . ' !';

        // Si l'utilisateur a le rôle 'admin', définir la session 'role' à 'admin'.
        if ($user->hasRole('admin')) {
            $request->session()->put('role', 'admin');
        }

        // Si la demande est en JSON, renvoyer une réponse JSON, sinon flasher un message de statut.
        if ($request->wantsJson()) {
            return response()->json(['message' => $message]);
        }

        $request->session()->flash('status', $message);

        // Rediriger vers la route 'profile'.
        return redirect()->route('profile');
    }

    // Cette fonction gère la déconnexion de l'utilisateur.
    public function logout(Request $request)
    {
        $this->guard()->logout(); // Déconnecte l'utilisateur.
        $request->session()->invalidate(); // Invalide la session.
        $request->session()->regenerateToken(); // Régénère le jeton de session.

        // Rediriger vers la page d'accueil avec un message de déconnexion.
        return redirect('/')->with('message', 'Au revoir ! Vous avez été déconnecté avec succès.');
    }
}
