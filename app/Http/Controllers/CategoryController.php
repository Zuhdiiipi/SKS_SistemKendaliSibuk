<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        // Isolasi Data: Hanya ambil kategori milik user yang sedang login
        $categories = Auth::user()->categories()->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        // Logika Limitasi: Cek jika user Basic dan sudah punya >= 3 kategori
        if (Auth::user()->role_level === 'basic' && Auth::user()->categories()->count() >= 3) {
            return redirect()->route('categories.index')
                ->with('error', 'Akun Basic maksimal hanya dapat membuat 3 Kategori Peran. Silakan upgrade ke Premium!');
        }

        return view('categories.create');
    }

    public function store(Request $request)
    {
        // Keamanan tambahan: Cek ulang limitasi saat data di-submit
        if (Auth::user()->role_level === 'basic' && Auth::user()->categories()->count() >= 3) {
            return redirect()->route('categories.index')
                ->with('error', 'Limit kategori tercapai.');
        }

        $request->validate([
            'name' => 'required|string|max:50',
            'color' => 'required|string|max:7', // Hex color code
        ]);

        Auth::user()->categories()->create([
            'name' => $request->name,
            'color' => $request->color,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(Category $category)
    {
        // Keamanan: Pastikan user hanya bisa mengedit kategorinya sendiri
        if ($category->user_id !== Auth::id()) abort(403);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        if ($category->user_id !== Auth::id()) abort(403);

        $request->validate([
            'name' => 'required|string|max:50',
            'color' => 'required|string|max:7',
        ]);

        $category->update($request->only('name', 'color'));

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy(Category $category)
    {
        if ($category->user_id !== Auth::id()) abort(403);

        // $category->delete(); // Otomatis memicu cascade delete pada tugas di dalamnya
        Category::destroy($category->id);
        // Bisa juga menerima array ID: Category::destroy([1, 2, 3]);
        return redirect()->route('categories.index')->with('success', 'Kategori dan seluruh tugas di dalamnya berhasil dihapus!');
    }
}
