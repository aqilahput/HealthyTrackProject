<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Tampilkan semua user (role 'user') hanya untuk admin
    public function users()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Access denied');
        }

        $users = User::where('role', 'user')->get();
        return view('users.index', compact('users'));
    }

    // Hapus user berdasarkan id (hanya role 'user' yang bisa dihapus)
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);

        // Cek kalau user yang dihapus bukan admin
        if ($user->role === 'user') {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
        }

        return redirect()->route('users.index')->with('error', 'Tidak bisa menghapus admin!');
    }
}
