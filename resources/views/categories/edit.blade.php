<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kategori Peran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-6">
                
                <form method="POST" action="{{ route('categories.update', $category->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Peran</label>
                        <input type="text" name="name" id="name" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               value="{{ old('name', $category->name) }}">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="color" class="block text-sm font-medium text-gray-700">Warna Label</label>
                        <div class="flex items-center gap-3 mt-1">
                            <input type="color" name="color" id="color" required
                                   class="h-10 w-14 rounded-md border-gray-300 shadow-sm cursor-pointer"
                                   value="{{ old('color', $category->color) }}">
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
                            Perbarui Peran
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>