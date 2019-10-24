<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

// NE PAS OUBLIER DE RAJOUTER CETTE LIGNE POUR UTILISATION Auth
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';


    // ON PEUT AJOUTER UNE NOUVELLE METHODE
    // POUR MIEUX GERER LA REDIRECTION SUIVANT LE level
    // https://laravel.com/docs/5.8/authentication#included-authenticating
    public function redirectTo ()
    {
        // https://laravel.com/docs/5.8/authentication#retrieving-the-authenticated-user
        $utilisateurConnecte = Auth::user();

        // CONNECTE COMME MEMBRE (level == 10)
        if ($utilisateurConnecte != null 
                && $utilisateurConnecte->level == 10)
        {
            return '/espace-membre';
        }
        // CONNECTE COMME ADMIN (level == 100)
        if ($utilisateurConnecte != null 
                && $utilisateurConnecte->level == 100)
        {
            return '/espace-admin';
        }
        

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
