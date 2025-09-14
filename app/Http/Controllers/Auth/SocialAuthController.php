<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        // find existing social account
        $account = SocialAccount::where('provider', $provider)
                    ->where('provider_id', $socialUser->getId())
                    ->first();

        if ($account) {
            // login existing user
            auth()->login($account->user);
            return redirect()->intended(route('dashboard'));
        }

        // find user by email (if provided)
        $user = null;
        if ($socialUser->getEmail()) {
            $user = User::where('email', $socialUser->getEmail())->first();
        }

        if (! $user) {
            // create new user (you can prompt for name/email if provider didn't return)
            $user = User::create([
                'name' => $socialUser->getName() ?: $socialUser->getNickname() ?: 'User-'.Str::random(6),
                'image' => $socialUser->getAvatar() ?: null,
                'email' => $socialUser->getEmail() ?: null,
                'password' => bcrypt(Str::random(24)), // random password
            ]);
        }

        // attach social account
        $user->socialAccounts()->create([
            'provider' => $provider,
            'provider_id' => $socialUser->getId(),
            'avatar' => $socialUser->getAvatar(),
            'meta' => $socialUser->user,
        ]);

        auth()->login($user);
        return redirect()->intended(route('dashboard'));
    }
}
