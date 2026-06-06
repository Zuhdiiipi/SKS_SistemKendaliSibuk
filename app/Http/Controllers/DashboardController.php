<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Fungsi Khusus Dasbor Mahasiswa
    public function userDashboard()
    {
        $user = Auth::user();

        // Jika admin nyasar ke /dashboard, kembalikan ke tempatnya
        if ($user->role_level === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $tasks = $user->tasks()->where('status', 'pending')->get();

        $highPriorityCount = $tasks->where('priority', 'Tinggi')->count();
        $mediumPriorityCount = $tasks->where('priority', 'Sedang')->count();
        $lowPriorityCount = $tasks->where('priority', 'Rendah')->count();

        return view('dashboard', compact(
            'highPriorityCount',
            'mediumPriorityCount',
            'lowPriorityCount'
        ));
    }

    // Fungsi Khusus Dasbor Admin
    public function adminDashboard()
    {
        $user = Auth::user();

        // Amankan URL /admin/dashboard dari mahasiswa
        if ($user->role_level !== 'admin') {
            abort(403, 'Akses Ditolak. Anda bukan Administrator.');
        }

        $stats = [
            'total_users' => User::whereKeyNot($user->id)->count(),
            'premium_users' => User::where('role_level', 'premium')->count(),
            'total_categories' => Category::count(),
            'total_tasks' => Task::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}