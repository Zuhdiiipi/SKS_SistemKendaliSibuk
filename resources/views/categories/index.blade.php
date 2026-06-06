<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori Peran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r-lg shadow-sm">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r-lg shadow-sm">
                    {{ session('error') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Daftar Peran Anda</h3>
                    <p class="text-sm text-gray-600">Pisahkan tugas berdasarkan peran ini.</p>
                </div>
                
                <a href="{{ route('categories.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-sm transition">
                    + Tambah Peran
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="p-4 font-semibold text-gray-700">Warna Label</th>
                            <th class="p-4 font-semibold text-gray-700">Nama Peran</th>
                            <th class="p-4 font-semibold text-gray-700 text-center">Jumlah Tugas</th>
                            <th class="p-4 font-semibold text-gray-700 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                            <td class="p-4">
                                <div class="w-8 h-8 rounded-full shadow-sm" style="background-color: {{ $category->color }}"></div>
                            </td>
                            <td class="p-4 font-medium text-gray-900">{{ $category->name }}</td>
                            <td class="p-4 text-center text-gray-600">
                                {{ $category->tasks()->count() }} Tugas
                            </td>
                            <td class="p-4 text-right flex justify-end gap-3">
                                <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm">Edit</a>
                                
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus peran ini? SEMUA TUGAS di dalamnya akan ikut terhapus!');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium text-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-gray-500">
                                Anda belum memiliki kategori peran. Silakan tambah baru.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(Auth::user()->role_level === 'basic')
            <div class="mt-4 text-sm text-gray-500 text-right">
                Anda menggunakan akun Basic (Limit: {{ $categories->count() }} / 3 Peran).
            </div>
            @endif

        </div>
    </div>
</x-app-layout>