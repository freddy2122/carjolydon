<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin()) {
            $this->redirectTo = '/administer'; // Redirige l'administrateur vers son tableau de bord
        } elseif ($user->isPersonel()) {
            $this->redirectTo = '/personel'; // Redirige le personnel vers son tableau de bord
        } elseif ($user->isAgent()) {
            $this->redirectTo = '/agentpages/dashboard'; // Redirige l'agent vers son tableau de bord
        } elseif ($user->isCommercial()) {
            $this->redirectTo = '/commercialepages/dashboard'; // Redirige l'agent vers son tableau de bord
        }
        elseif ($user->isMecanicien()) {
            $this->redirectTo = '/mecanicienpages/dashboard'; // Redirige l'agent vers son tableau de bord
        }
        // ... Ajoutez des conditions pour d'autres rôles

        return redirect()->intended($this->redirectTo);
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
