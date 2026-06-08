<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 tracking-tight leading-tight">
            {{ __('Kategori Peran') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Notifikasi (Alerts) -->
            @if(session('success'))
                <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-2xl shadow-sm animate-fade-in-down">
                    <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="flex items-center gap-3 bg-rose-50 border border-rose-200 text-rose-700 px-6 py-4 rounded-2xl shadow-sm animate-fade-in-down">
                    <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="font-medium">{{ session('error') }}</p>
                </div>
            @endif

            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-white p-8 rounded-3xl border border-slate-200 shadow-sm relative overflow-hidden">
                <div class="absolute right-0 top-0 w-64 h-64 bg-blue-50 rounded-full mix-blend-multiply filter blur-3xl opacity-50 transform translate-x-1/2 -translate-y-1/2"></div>
                
                <div class="relative z-10">
                    <h3 class="text-2xl font-extrabold text-slate-900 tracking-tight">Isolasi Konteks Peran</h3>
                    <p class="text-slate-500 mt-1 font-medium max-w-xl">
                        Pisahkan fokus Anda. Mulai dari jadwal kuliah reguler, peran di organisasi, hingga tanggung jawab sebagai asisten dosen.
                    </p>
                </div>
                
                <div class="relative z-10 shrink-0">
                    <a href="{{ route('categories.create') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-3 px-6 rounded-xl shadow-[0_8px_30px_rgb(37,99,235,0.25)] hover:shadow-[0_8px_30px_rgb(37,99,235,0.4)] transform hover:-translate-y-0.5 transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                        Tambah Ruang
                    </a>
                </div>
            </div>

            <!-- Grid Kategori (Menggantikan Tabel Bawaan) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($categories as $category)
                    <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 group relative overflow-hidden flex flex-col justify-between min-h-[200px]">
                        
                        <!-- Pendaran Warna Background Dinamis -->
                        <div class="absolute -right-10 -top-10 w-32 h-32 rounded-full opacity-10 group-hover:scale-150 transition-transform duration-700 ease-out" style="background-color: {{ $category->color }}"></div>

                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 rounded-2xl flex items-center justify-center shadow-sm border border-slate-100" style="background-color: {{ $category->color }}15;"> <!-- 15 adalah opacity hex -->
                                    <div class="w-5 h-5 rounded-full shadow-sm" style="background-color: {{ $category->color }}"></div>
                                </div>
                                <div class="bg-slate-50 border border-slate-100 px-3 py-1 rounded-lg">
                                    <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Peran</span>
                                </div>
                            </div>

                            <h4 class="text-xl font-extrabold text-slate-900 mb-2 truncate" title="{{ $category->name }}">{{ $category->name }}</h4>
                            
                            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-slate-50 border border-slate-200 text-slate-600 text-sm font-bold">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                {{ $category->tasks()->count() }} Tugas
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex items-center justify-end gap-2 pt-6 mt-4 border-t border-slate-100 relative z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <a href="{{ route('categories.edit', $category->id) }}" class="inline-flex items-center justify-center w-10 h-10 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-xl transition-colors" title="Edit Peran">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('⚠️ TINDAKAN DESTRUKTIF!\n\nYakin ingin menghapus peran ini? SEMUA TUGAS yang terkait di dalamnya akan ikut lenyap dan tidak dapat dikembalikan.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center justify-center w-10 h-10 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-colors" title="Hapus Peran">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <!-- Kondisi Kosong (Empty State) -->
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <div class="flex flex-col items-center justify-center py-16 px-4 bg-white border-2 border-dashed border-slate-300 rounded-3xl text-center">
                            <div class="w-20 h-20 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            </div>
                            <h4 class="text-xl font-bold text-slate-700 mb-2">Belum Ada Peran Terdaftar</h4>
                            <p class="text-slate-500 max-w-md">Bangun struktur manajemen Anda dengan membuat kategori peran pertama. Klik tombol "Tambah Ruang" di atas.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Limit Status Card (Hanya untuk Basic) -->
            @if(Auth::user()->role_level === 'basic')
                @php
                    $limit = 3;
                    $count = $categories->count();
                    $percentage = ($count / $limit) * 100;
                    
                    // Logika warna progress bar
                    $barColor = 'bg-blue-600';
                    if ($count == $limit) {
                        $barColor = 'bg-rose-500';
                    } elseif ($count == $limit - 1) {
                        $barColor = 'bg-amber-500';
                    }
                @endphp
                
                <div class="bg-white border border-slate-200 rounded-3xl p-6 md:p-8 shadow-sm flex flex-col md:flex-row items-center justify-between gap-8 mt-8">
                    <div class="w-full md:w-1/2">
                        <div class="flex justify-between items-end mb-3">
                            <div>
                                <span class="text-sm font-bold text-slate-800 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Kapasitas Ruang (Basic)
                                </span>
                            </div>
                            <span class="text-xs font-extrabold text-slate-500 bg-slate-100 px-2 py-1 rounded-md">{{ $count }} / {{ $limit }} Terpakai</span>
                        </div>
                        
                        <!-- Progress Bar -->
                        <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden shadow-inner">
                            <div class="{{ $barColor }} h-3 rounded-full transition-all duration-1000 ease-out relative overflow-hidden" style="width: {{ $percentage }}%">
                                <div class="absolute top-0 left-0 bottom-0 right-0 bg-white/20" style="background-image: linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent); background-size: 1rem 1rem;"></div>
                            </div>
                        </div>
                        
                        @if($count == $limit)
                            <p class="text-rose-500 text-xs font-bold mt-2">Batas maksimal pembuatan kategori telah tercapai.</p>
                        @endif
                    </div>
                    
                    <div class="shrink-0 w-full md:w-auto text-center md:text-right">
                        <a href="{{ route('premium.checkout') }}" class="inline-flex items-center justify-center gap-2 text-sm font-bold text-blue-700 bg-blue-50 hover:bg-blue-100 border border-blue-200 px-6 py-3 rounded-xl transition-all w-full md:w-auto">
                            <svg class="w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path></svg>
                            Upgrade Premium (Unlimited)
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>