<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Tugas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 mb-6 rounded-lg">{{ session('success') }}</div>
            @endif

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 mb-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                <form action="{{ route('tasks.index') }}" method="GET" class="flex items-center gap-3 w-full sm:w-auto">
                    <select name="category_id" class="rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 w-full sm:w-48" onchange="this.form.submit()">
                        <option value="">Semua Peran</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @if(request('category_id'))
                        <a href="{{ route('tasks.index') }}" class="text-sm text-red-500 hover:text-red-700 font-medium">Reset</a>
                    @endif
                </form>

                <a href="{{ route('tasks.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-sm transition shrink-0">
                    + Tambah Tugas
                </a>
            </div>

            <div class="grid grid-cols-1 gap-4">
                @forelse($tasks as $task)
                <div class="bg-white p-5 rounded-xl shadow-sm border {{ $task->status === 'done' ? 'border-gray-200 opacity-60' : 'border-gray-100' }} flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 hover:shadow-md transition">
                    
                    <div class="flex items-start gap-4">
                        <form action="{{ route('tasks.toggle', $task->id) }}" method="POST">
                            @csrf @method('PATCH')
                            <button type="submit" class="mt-1 w-6 h-6 rounded border flex items-center justify-center transition {{ $task->status === 'done' ? 'bg-green-500 border-green-500 text-white' : 'border-gray-300 hover:border-blue-500 text-transparent hover:text-blue-500' }}">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                            </button>
                        </form>

                        <div>
                            <h3 class="text-lg font-bold {{ $task->status === 'done' ? 'line-through text-gray-500' : 'text-gray-900' }}">
                                {{ $task->title }}
                            </h3>
                            <div class="flex flex-wrap items-center gap-3 mt-1 text-sm">
                                <span class="px-2 py-0.5 rounded-md text-xs font-bold text-gray-700" style="background-color: {{ $task->category->color }}30; border: 1px solid {{ $task->category->color }}">
                                    {{ $task->category->name }}
                                </span>
                                <span class="text-gray-500 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ \Carbon\Carbon::parse($task->deadline)->format('d M Y, H:i') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 w-full sm:w-auto justify-between sm:justify-end border-t sm:border-0 pt-3 sm:pt-0">
                        @php
                            $prioColors = [
                                'Tinggi' => 'bg-red-100 text-red-700',
                                'Sedang' => 'bg-yellow-100 text-yellow-700',
                                'Rendah' => 'bg-green-100 text-green-700',
                                'Terlewat' => 'bg-gray-800 text-white',
                                'Selesai' => 'bg-gray-100 text-gray-500'
                            ];
                        @endphp
                        <span class="px-3 py-1 rounded-full text-xs font-bold {{ $prioColors[$task->priority] }}">
                            Prioritas: {{ $task->priority }}
                        </span>

                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Hapus tugas ini?');">
                            @csrf @method('DELETE')
                            <button class="text-red-500 hover:text-red-700 text-sm font-medium">Hapus</button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="bg-white p-8 rounded-xl border border-gray-100 text-center text-gray-500 shadow-sm">
                    Tidak ada tugas di kategori ini. Anda bisa sedikit bersantai.
                </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>