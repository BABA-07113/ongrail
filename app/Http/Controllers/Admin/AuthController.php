<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $key = Str::lower($request->input('email')) . '|' . $request->ip();
        $maxAttempts = 5;
        $decaySeconds = 60;

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            $seconds = RateLimiter::availableIn($key);

            return back()
                ->withErrors(['email' => 'Trop de tentatives de connexion. Réessayez dans ' . ceil($seconds / 60) . ' minute(s).'])
                ->onlyInput('email');
        }

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            RateLimiter::clear($key);

            $user = Auth::user();
            if (!$user->is_active) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors(['email' => 'Votre compte est désactivé. Contactez l\'administrateur.']);
            }

            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        RateLimiter::hit($key, $decaySeconds);

        $remaining = max(0, $maxAttempts - RateLimiter::attempts($key));
        $message = $remaining > 0
            ? 'Email ou mot de passe incorrect. Il vous reste ' . $remaining . ' tentative(s).'
            : 'Email ou mot de passe incorrect.';

        return back()
            ->withErrors(['email' => $message])
            ->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('status', 'Vous avez été déconnecté(e).');
    }

    public function showForgot()
    {
        return view('admin.auth.forgot');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', 'Si cette adresse existe, un lien de réinitialisation vient d\'être envoyé.')
            : back()->withErrors(['email' => __($status)]);
    }

    public function showReset(Request $request, string $token)
    {
        return view('admin.auth.reset', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill(['password' => Hash::make($password)])->save();
                Auth::login($user);
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('admin.dashboard')->with('success', 'Votre mot de passe a été réinitialisé.')
            : back()->withErrors(['email' => __($status)]);
    }
}
