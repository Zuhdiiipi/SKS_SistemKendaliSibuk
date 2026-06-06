<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kategori Peran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-6">
                
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Peran (Misal: Kuliah, Asdos, Lomba)</label>
                        <input type="text" name="name" id="name" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               placeholder="Masukkan nama peran..." value="{{ old('name') }}">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="color" class="block text-sm font-medium text-gray-700">Warna Label</label>
                        <div class="flex items-center gap-3 mt-1">
                            <input type="color" name="color" id="color" required
                                   class="h-10 w-14 rounded-md border-gray-300 shadow-sm cursor-pointer"
                                   value="{{ old('color', '#3B82F6') }}">
                            <span class="text-sm text-gray-500">Pilih warna untuk membedakan peran ini dengan yang lain.</span>
                        </div>
                        @error('color')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-3 mt-6 border-t pt-4">
                        <a href="{{ route('categories.index') }}" class="text-gray-600 hover:text-gray-900 font-medium px-4 py-2">
                            Batal
                        </a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-sm transition">
                            Simpan Peran
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>