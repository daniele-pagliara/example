<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class ResetPasswordController extends Controller
{
    // Mostra il form per inserire l'email
    public function showRequestForm() {
        return view('pagine.forgot-password');
    }

    // Invia il link via email
    public function sendResetLink(Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('successo', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    // Mostra il form per impostare la nuova password
    public function showResetForm($token) {
        return view('pagine.reset-password', ['token' => $token]);
    }

    // Salva la nuova password nel DB
    public function storeNewPassword(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill(['password' => Hash::make($password)])->save();
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('successo', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
