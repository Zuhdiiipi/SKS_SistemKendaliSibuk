<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // Query builder untuk isolasi data
        $query = Auth::user()->tasks()->with('category');

        // Logika Filter Kategori
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Urutkan dari deadline terdekat
        $tasks = $query->orderBy('deadline', 'asc')->get();
        $categories = Auth::user()->categories()->get();

        return view('tasks.index', compact('tasks', 'categories'));
    }

    public function create()
    {
        $categories = Auth::user()->categories()->get();

        // Proteksi jika user belum punya kategori
        if ($categories->isEmpty()) {
            return redirect()->route('categories.index')->with('error', 'Buat kategori peran terlebih dahulu!');
        }

        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:200',
            'deadline' => 'required|date',
        ]);

        // Verifikasi bahwa kategori yang dipilih benar milik user tersebut
        // $category = Category::where('id', $request->category_id)->where('user_id', Auth::id())->firstOrFail();
        $category = Auth::user()->categories()->findOrFail($request->category_id);

        Auth::user()->tasks()->create([
            'category_id' => $category->id,
            'title' => $request->title,
            'deadline' => $request->deadline,
            'status' => 'pending',
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tugas ditambahkan!');
    }

    // Method khusus untuk mengubah status (Selesai/Belum) dengan cepat
    public function toggleStatus(Task $task)
    {
        if ($task->user_id !== Auth::id()) abort(403);

        $task->update([
            'status' => $task->status === 'pending' ? 'done' : 'pending'
        ]);

        return back()->with('success', 'Status tugas diperbarui!');
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) abort(403);
        // $task->delete();
        Auth::user()->tasks()->where('id', $task->id)->delete();
        return back()->with('success', 'Tugas dihapus!');
    }
}