<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Keamanan Lapis Pertama: Pastikan hanya Admin yang bisa masuk
        if (Auth::user()->role_level !== 'admin') {
            abort(403, 'Akses Ditolak. Halaman ini khusus Administrator.');
        }

        // Ambil semua data pengguna, urutkan dari yang terbaru, kecuali akun admin yang sedang login
        // $users = User::where('id', '!=', Auth::id())->latest()->get();
        $users = User::whereKeyNot(Auth::id())->latest()->get();
        return view('users.index', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        if (Auth::user()->role_level !== 'admin') {
            abort(403);
        }

        $request->validate([
            'role_level' => 'required|in:basic,premium,admin'
        ]);

        $user->update([
            'role_level' => $request->role_level
        ]);

        return back()->with('success', 'Level akses akses pengguna ' . $user->name . ' berhasil diperbarui!');
    }
}