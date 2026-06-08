<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 tracking-tight leading-tight">
            {{ __('Manajemen Tugas') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(session('success'))
                <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-2xl shadow-sm animate-fade-in-down">
                    <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white p-5 rounded-3xl shadow-sm border border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-4 relative overflow-hidden">
                <div class="absolute left-0 top-0 w-2 h-full bg-blue-500"></div>
                
                <form action="{{ route('tasks.index') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-3 w-full sm:w-auto pl-4">
                    <div class="relative w-full sm:w-56">
                        <select name="category_id" class="w-full appearance-none bg-slate-50 border border-slate-200 text-slate-700 py-2.5 pl-4 pr-10 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent font-bold text-sm cursor-pointer transition-all" onchange="this.form.submit()">
                            <option value="">Semua Peran Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path></svg>
                        </div>
                    </div>
                    
                    @if(request('category_id'))
                        <a href="{{ route('tasks.index') }}" class="inline-flex items-center gap-1 text-sm text-rose-500 hover:text-rose-700 font-bold bg-rose-50 px-3 py-2 rounded-lg transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            Reset
                        </a>
                    @endif
                </form>

                <a href="{{ route('tasks.create') }}" class="w-full sm:w-auto inline-flex justify-center items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-2.5 px-6 rounded-xl shadow-[0_4px_15px_rgb(37,99,235,0.25)] hover:shadow-[0_4px_15px_rgb(37,99,235,0.4)] transform hover:-translate-y-0.5 transition-all duration-200 shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Tugas
                </a>
            </div>

            <div class="space-y-4">
                @forelse($tasks as $task)
                    <div class="group bg-white p-5 md:p-6 rounded-2xl border transition-all duration-300 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-5 {{ $task->status === 'done' ? 'border-slate-100 bg-slate-50/50 opacity-75' : 'border-slate-200 shadow-sm hover:shadow-md hover:border-blue-200' }}">
                        
                        <div class="flex items-start gap-4 w-full sm:w-auto">
                            <form action="{{ route('tasks.toggle', $task->id) }}" method="POST" class="shrink-0 mt-1">
                                @csrf @method('PATCH')
                                <button type="submit" class="w-7 h-7 rounded-lg flex items-center justify-center transition-all duration-200 {{ $task->status === 'done' ? 'bg-emerald-500 border-emerald-500 text-white shadow-sm' : 'bg-white border-2 border-slate-300 text-transparent hover:border-blue-500 hover:text-blue-500' }}" title="Tandai Selesai/Belum">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </button>
                            </form>

                            <div class="flex-1">
                                <h3 class="text-lg font-extrabold mb-1.5 transition-colors {{ $task->status === 'done' ? 'line-through text-slate-400' : 'text-slate-900 group-hover:text-blue-700' }}">
                                    {{ $task->title }}
                                </h3>
                                
                                <div class="flex flex-wrap items-center gap-3 text-sm">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-bold" style="color: {{ $task->category->color }}; background-color: {{ $task->category->color }}15; border: 1px solid {{ $task->category->color }}30;">
                                        <span class="w-1.5 h-1.5 rounded-full" style="background-color: {{ $task->category->color }}"></span>
                                        {{ $task->category->name }}
                                    </span>
                                    
                                    <span class="flex items-center gap-1.5 font-medium {{ $task->status === 'done' ? 'text-slate-400' : 'text-slate-500' }}">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        {{ \Carbon\Carbon::parse($task->deadline)->translatedFormat('d M Y, H:i') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto gap-4 pt-4 sm:pt-0 border-t sm:border-0 border-slate-100">
                            @php
                                $prioStyles = [
                                    'Tinggi'   => 'bg-rose-50 text-rose-700 border-rose-200',
                                    'Sedang'   => 'bg-amber-50 text-amber-700 border-amber-200',
                                    'Rendah'   => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                    'Terlewat' => 'bg-slate-800 text-white border-slate-700',
                                    'Selesai'  => 'bg-slate-100 text-slate-500 border-slate-200'
                                ];
                                $style = $prioStyles[$task->priority] ?? 'bg-slate-100 text-slate-700 border-slate-200';
                            @endphp
                            <span class="px-3 py-1.5 rounded-lg text-xs font-extrabold uppercase tracking-wider border {{ $style }} shadow-sm">
                                {{ $task->priority }}
                            </span>

                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Hapus tugas ini dari ruang kerja Anda?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-colors" title="Hapus Tugas">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center py-20 px-4 bg-white border-2 border-dashed border-slate-300 rounded-3xl text-center">
                        <div class="w-20 h-20 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-slate-700 mb-2">Tidak Ada Tugas</h4>
                        <p class="text-slate-500 max-w-md">Filter kosong atau Anda sedang tidak memiliki tugas di kategori ini. Anda bisa sedikit bersantai atau <a href="{{ route('tasks.create') }}" class="text-blue-600 hover:underline font-semibold">tambahkan tugas baru</a>.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>