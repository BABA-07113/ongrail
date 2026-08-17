<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:super_admin,admin,redacteur',
            'phone' => 'nullable|max:50',
            'is_active' => 'nullable|boolean',
        ]);

        if ($data['role'] === 'super_admin' && !auth()->user()->isSuperAdmin()) {
            return back()->withErrors(['role' => 'Seul un super administrateur peut créer un super administrateur.'])
                ->withInput($request->except('password'));
        }

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('admin.utilisateurs.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function edit(User $user)
    {
        return view('admin.users.form', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
            'role' => 'required|in:super_admin,admin,redacteur',
            'phone' => 'nullable|max:50',
            'is_active' => 'nullable|boolean',
        ]);

        if ($user->id === auth()->id() && $data['role'] !== $user->role) {
            return back()->withErrors(['role' => 'Vous ne pouvez pas modifier votre propre rôle.'])
                ->withInput($request->except('password'));
        }

        if ($data['role'] === 'super_admin' && !auth()->user()->isSuperAdmin()) {
            return back()->withErrors(['role' => 'Seul un super administrateur peut attribuer ce rôle.'])
                ->withInput($request->except('password'));
        }

        if ($user->role === 'super_admin' && $user->id !== auth()->id() && !auth()->user()->isSuperAdmin()) {
            return back()->withErrors(['role' => 'Vous ne pouvez pas modifier un super administrateur.'])
                ->withInput($request->except('password'));
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        return redirect()->route('admin.utilisateurs.index')->with('success', 'Utilisateur mis à jour.');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        if ($user->role === 'super_admin' && !auth()->user()->isSuperAdmin()) {
            return back()->with('error', 'Vous ne pouvez pas supprimer un super administrateur.');
        }

        if ($user->role === 'super_admin' && User::where('role', 'super_admin')->count() <= 1) {
            return back()->with('error', 'Impossible de supprimer le dernier super administrateur.');
        }

        $user->delete();
        return redirect()->route('admin.utilisateurs.index')->with('success', 'Utilisateur supprimé.');
    }
}
