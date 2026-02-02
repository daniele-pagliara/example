<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

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
                'password' => '', // Lascia vuoto per motivi di sicurezza
                'address' => $user->address ?? '',
                'phone' => $user->phone ?? '',

                //campi per la tabella
                'type' => $user->cf,
                'status' => $user->disabled ? 'Disabilitato' : 'Attivo',
                'target' => $user->phone,
                'limit' => "-",
                'reviewer' => $user->name . ' ' . $user->surname,
            ];
        });
        return view('auth.pages.cerca-dati', compact('usersForVue'));
    }

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return response()->json(['success' => true, 'message' => 'Utente creato con successo!'], 201);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();

        if(!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return response()->json(['success' => true]);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // Soft Delete
        return response()->json(['success' => true]);
    }

    public function disable($id)
    {
        $user = User::findOrFail($id);
        $user->disabled = true;
        $user->save();
        return response()->json(['success' => true]);
    }

    public function enable($id)
    {
        $user = User::findOrFail($id);
        $user->disabled = false;
        $user->save();
        return response()->json(['success' => true]);
    }
}
