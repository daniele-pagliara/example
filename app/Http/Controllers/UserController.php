<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();

        $usersForVue = $users->map(function ($user) {
            return [
                //campi per la tabella
                'id' => $user->id,
                'header' => $user->email,
                
                //campi grezzi per la modale
                'first_name' => $user->name,
                'last_name' => $user->surname,
                'email' => $user->email,
                'address' => $user->address ?? '',
                'phone' => $user->phone ?? '',
                
                //campi per la tabella
                'type' => $user->cf,
                'status' => $user->address,
                'target' => $user->phone,
                'limit' => "-",
                'reviewer' => $user->name . ' ' . $user->surname,
            ];
        });
        return view('auth.pages.cerca-dati', compact('usersForVue'));
    }

    public function update(Request $request, $id) {
    $user = User::findOrFail($id);
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
        'address' => 'nullable|string|max:500',
        'phone' => 'nullable|string|max:20',
    ]);
    $user->update($validated);
    return response()->json(['success' => true]);
    }
    

    public function destroy($id) {
    $user = User::findOrFail($id);
    $user->delete(); // Soft Delete
    return response()->json(['success' => true]);
    }

}
