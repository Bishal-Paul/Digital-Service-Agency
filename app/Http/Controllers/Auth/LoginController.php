<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


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


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // protected function _registerOrLoginUser($data){
    //     $user = User::where('email', '=', $data->email)->first();
    //     if(!$user) {
    //         $user = new User();
    //         $user->name = $data->name;
    //         $user->email = $data->email;
    //         $user->provider_id = $data->provider_id;
    //         $user->save();
    //     }

    //     Auth::login($user);
    // }

    // GOOGLE
    public function RedirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function HandleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $user_login = User::where('provider_id', $user->getId())->first();

        if ($user_login) {
            Auth::login($user_login);
            return redirect()->to('/');
        } else {
            $user = User::create([
                'name'     => $user->getName(),
                'email'    => $user->getEmail(),
                'provider' => "google",
                'provider_id' => $user->getId()
            ]);
            Auth::login($user);
            return redirect()->to('/');
        }
    }

    // FACEBOOK
    public function RedirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function HandleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $user_login = User::where('provider_id', $user->getId())->first();

        if ($user_login) {
            Auth::login($user_login);
            return redirect()->to('/');
        } else {
            $user = User::create([
                'name'     => $user->getName(),
                'email'    => $user->getEmail(),
                'provider' => "facebook",
                'provider_id' => $user->getId()
            ]);
            Auth::login($user);
            return redirect()->to('/');
        }
    }


    // GITHUB
    public function RedirectToGithub(){
        return Socialite::driver('github')->redirect();
    }

    public function HandleGithubCallback(){
        $user = Socialite::driver('github')->user();
        $user_login = User::where('provider_id', $user->getId())->first();

        if($user_login){
            Auth::login($user_login);
            return redirect()->to('/');
        }
        else{
            $user = User::create([
                'name'     => $user->getName(),
                'email'    => $user->getEmail(),
                'provider' => "Github",
                'provider_id' => $user->getId()
            ]);
            Auth::login($user);
            return redirect()->to('/');
        }
    }

    // LINKEDIN
    public function RedirectToLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function HandleLinkedinCallback()
    {
        $user = Socialite::driver('linkedin')->user();
        $user_login = User::where('provider_id', $user->getId())->first();

        if ($user_login) {
            Auth::login($user_login);
            return redirect()->to('/');
        } else {
            $user = User::create([
                'name'     => $user->getName(),
                'email'    => $user->getEmail(),
                'provider' => "linkedin",
                'provider_id' => $user->getId()
            ]);
            Auth::login($user);
            return redirect()->to('/');
        }
    }
}
