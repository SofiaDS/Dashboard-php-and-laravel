<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Elenco utenti paginato (7 per pagina).
     */
    public function read()
    {
        $users = User::orderBy('id', 'ASC')->paginate(7);

        return view('v1.crud.read', ['users' => $users]);
    }

    /**
     * Crea un nuovo utente.
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Mostra il form di modifica, già compilato.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('v1.crud.update', ['user' => $user]);
    }

    /**
     * Aggiorna un utente. La password cambia solo se ne viene inserita una nuova.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];
        if (! empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->save();

        return redirect()->route('dashboard');
    }

    /**
     * Elimina un utente.
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('dashboard');
    }
}
