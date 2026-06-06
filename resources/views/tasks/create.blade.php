<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Tugas Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-6">

                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf

                    <div class="mb-5">
                        <label for="title" class="block text-sm font-medium text-gray-700">Apa yang harus
                            dikerjakan?</label>
                        <input type="text" name="title" id="title" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Contoh: Membuat modul praktikum PBO, Rapat divisi..."
                            value="{{ old('title') }}">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Tugas ini untuk peran
                            apa?</label>
                        <select name="category_id" id="category_id" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="" disabled selected>-- Pilih Kategori Peran --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-8">
                        <label for="deadline" class="block text-sm font-medium text-gray-700">Batas Waktu
                            (Deadline)</label>
                        <input type="datetime-local" name="deadline" id="deadline" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            value="{{ old('deadline') }}">
                        <p class="text-xs text-gray-500 mt-2">Sistem akan otomatis memberikan label prioritas
                            berdasarkan jarak waktu ke deadline ini.</p>
                        @error('deadline')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-3 border-t border-gray-100 pt-5">
                        <a href="{{ route('tasks.index') }}"
                            class="text-gray-600 hover:text-gray-900 font-medium px-4 py-2">
                            Batal
                        </a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-sm transition">
                            Simpan Tugas
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
