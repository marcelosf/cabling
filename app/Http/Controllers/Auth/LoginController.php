<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider() 
    {
    
        return Socialite::driver('senhaunica')->redirect();

    }

    public function handleProviderCallback()
    {
        $userSenhaUnica = Socialite::driver('senhaunica')->user();
        $user = User::updateOrCreate(['codpes' => $userSenhaUnica->codpes], $this->handleUserData($userSenhaUnica));

        Auth::login($user, true);

        return redirect($this->redirectTo);

    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    protected function handleUserData($userData)
    {
        $user = [
            'token_secret' => $userData->tokenSecret,
            'codpes' => $userData->codpes,
            'name' => $userData->nompes,
            'email' => $userData->email,
            'email_usp' => $userData->emailUsp,
            'email_alternativo' => $userData->emailAlternativo,
            'telefone' => $userData->telefone,
            'vinculo' => json_encode($userData->vinculo[0]),
        ];

        return $user;
    }
}
