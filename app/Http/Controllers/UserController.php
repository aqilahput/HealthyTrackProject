<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    // Tampilkan form edit user (nama + password)
    public function edit(User $user)
    {
        
        if (auth()->id() !== $user->id) {
            abort(403);
        }

        return view('users.edit', compact('user'));
    }

    // Proses update nama + password (email readonly)
    public function update(Request $request, User $user)
    {
        if (auth()->id() !== $user->id) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect()->route('profile.index', $user->id)->with('success', 'Data user berhasil diperbarui.');
    }
}
