<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Http\Requests\RegisterUserRequest;

class AuthController extends Controller
{
    public function showGuestHome()
    {
        return view('guest.pages.home');
    }

    public function showLogin()
    {
        return view('guest.pages.login');
    }

    public function login(Request $request)
    {
        // Generiamo la chiave univoca
        $throttleKey = Str::transliterate(Str::lower($request->input('email')) . '|' . $request->ip());

        // 1. Controlliamo se l'utente ha superato i 3 tentativi
        if (RateLimiter::tooManyAttempts($throttleKey, 3)) {

            $seconds = RateLimiter::availableIn($throttleKey);

            return back()->withErrors([
                'email' => "Troppi tentativi di accesso. Riprova tra $seconds secondi."
            ])->withInput($request->only('email'));
        }

        // 2. Tentiamo il login vero e proprio
        if (Auth::attempt($request->only('email', 'password'), $request->has('remember'))) {

            // Se il login riesce, resettiamo il contatore dei tentativi
            RateLimiter::clear($throttleKey);

            $request->session()->regenerate();
            $idLogged = Auth::id();
            return redirect()->route('pagine.home');
        }

        // 3. Se il login fallisce, incrementiamo il contatore dei fallimenti
        RateLimiter::hit($throttleKey, 60);

        return back()->withErrors([
            'email' => 'Le credenziali inserite non sono corrette.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('successo', 'Disconnesso!');
    }

    public function showRegistrati()
    {
        return view('guest.pages.register');
    }

    public function registrati(RegisterUserRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        Auth::login($user);
        
        //$request->session()->regenerate();

        return redirect()->route('pagine.home');
    }
}
