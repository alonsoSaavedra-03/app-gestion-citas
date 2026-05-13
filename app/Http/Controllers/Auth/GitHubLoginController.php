<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GithubLoginController extends Controller
{
    /**
     * Redirigir a GitHub
     */
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Callback de GitHub
     */
    public function handleGithubCallback()
        {
            $githubUser = Socialite::driver('github')->stateless()->user();

            $user = User::updateOrCreate(
                [
                    'email' => $githubUser->email,
                ],
                [
                    'name' => $githubUser->name ?? $githubUser->nickname,
                ]
            );

            Auth::login($user);

            return redirect('/dashboard');
        }
}