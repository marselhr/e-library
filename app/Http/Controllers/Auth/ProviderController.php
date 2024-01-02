<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
            $user = User::where([
                'provider' => $provider,
                'provider_id' => $socialUser->id,
            ])->first();

            if (!$user) {
                if (User::where('email', $socialUser->getEmail())->exists()) {
                    return redirect()->route('login')->withErrors(['email' => 'Email Telah Digunakan Untuk Masuk']);
                }
                $user = User::create([
                    'provider_id' => $socialUser->getId(),
                    'provider' => $provider,
                    'name' => User::generateUserName($socialUser->name),
                    'email' => $socialUser->getEmail(),
                    'provider_token' => $socialUser->token,
                    'email_verified_at' => now()
                ]);
            }

            Auth::login($user);
            return redirect()->route('home');
        } catch (\Exception $exception) {
            return redirect('/login');
        }
    }
}
