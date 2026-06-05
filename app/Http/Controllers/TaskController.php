<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        // Menggunakan relasi Eloquent: Mengambil hanya tugas milik user yang sedang login
        $tasks = Auth::user()->tasks()->with('category')->get();

        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:200',
            'deadline' => 'required|date',
        ]);

        // Menyimpan tugas dengan menyematkan user_id otomatis
        Auth::user()->tasks()->create($validated);

        return redirect()->back()->with('success', 'Tugas berhasil ditambahkan!');
    }
}