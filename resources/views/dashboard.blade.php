<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 tracking-tight leading-tight">
            {{ __('Ruang Kerja Utama') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            @if (session('success'))
                <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-2xl shadow-sm animate-fade-in-down">
                    <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            @endif

            @if (session('error'))
                <div class="flex items-center gap-3 bg-rose-50 border border-rose-200 text-rose-700 px-6 py-4 rounded-2xl shadow-sm animate-fade-in-down">
                    <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="font-medium">{{ session('error') }}</p>
                </div>
            @endif

            <div class="relative bg-slate-900 rounded-3xl p-8 md:p-10 shadow-xl overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8 border border-slate-800">
                <div class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-blue-500 rounded-full mix-blend-screen filter blur-[80px] opacity-40"></div>
                <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-64 h-64 bg-indigo-500 rounded-full mix-blend-screen filter blur-[80px] opacity-30"></div>

                <div class="relative z-10 w-full md:w-auto">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 text-blue-300 text-xs font-bold uppercase tracking-wide mb-4 backdrop-blur-sm">
                        <span class="flex h-2 w-2 rounded-full bg-blue-400"></span>
                        Sistem Aktif
                    </div>
                    <h3 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight mb-2">Halo, {{ explode(' ', Auth::user()->name)[0] }}!</h3>
                    <p class="text-slate-400 text-lg">Pantau kode, tugas kuliah, dan rutinitas Anda hari ini.</p>
                </div>

                @if (Auth::user()->role_level === 'premium')
                    <div class="relative z-10 w-full md:w-auto bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-5 shadow-lg">
                        <p class="text-sm font-bold text-white mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 21.4111C10.5186 21.412 9.04351 21.0371 7.72895 20.323L7.33332 20.108L3.41103 21.045L4.44415 17.447L4.1795 17.009C3.36442 15.6547 2.92994 14.0754 2.93098 12.4414C2.93306 7.42045 7.33709 3.33496 12.031 3.33496C14.3056 3.336 16.4851 4.18189 18.0931 5.7171C19.7011 7.25232 20.588 9.32421 20.588 11.4939C20.5869 16.5148 16.1829 20.6003 12.031 21.4111ZM7.56209 18.232C8.8986 19.0463 10.4504 19.4795 12.031 19.4784C16.1042 19.4784 19.421 16.331 19.422 12.4424C19.4231 10.609 18.6657 8.85078 17.3005 7.55394C15.9354 6.25709 14.084 5.5262 12.032 5.52516C7.95886 5.52516 4.64104 8.67156 4.64104 12.4424C4.64104 14.0933 5.12788 15.6888 6.03578 17.065L6.31952 17.495L5.61793 19.932L8.27137 19.336L8.68112 19.553C8.68112 19.553 7.56209 18.232 7.56209 18.232Z"/></svg>
                            Kirim Daily Summary
                        </p>
                        <form action="{{ route('premium.send-wa') }}" method="POST" class="flex items-center gap-2">
                            @csrf
                            <input type="text" name="wa_number" placeholder="Nomor WA (081x)" required
                                class="bg-white/5 border border-white/20 text-white text-sm rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-400 focus:border-transparent outline-none placeholder:text-slate-400 w-40 transition">
                            
                            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2.5 px-4 rounded-xl shadow-md transition-all transform hover:-translate-y-0.5 border border-blue-500 flex items-center justify-center">
                                Kirim
                            </button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm hover:shadow-md hover:border-rose-300 transition-all group relative overflow-hidden">
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-rose-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="w-14 h-14 bg-rose-100 text-rose-600 rounded-2xl flex items-center justify-center mb-6 relative z-10 border border-rose-200">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-slate-500 font-bold text-sm tracking-wide uppercase mb-1 relative z-10">Prioritas Tinggi</h4>
                    <div class="flex items-end justify-between relative z-10">
                        <p class="text-5xl font-extrabold text-slate-900">{{ $highPriorityCount ?? 0 }}</p>
                        <span class="bg-rose-100 text-rose-700 text-xs font-bold px-3 py-1 rounded-full mb-1">< 24 Jam</span>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm hover:shadow-md hover:border-amber-300 transition-all group relative overflow-hidden">
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-amber-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="w-14 h-14 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center mb-6 relative z-10 border border-amber-200">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-slate-500 font-bold text-sm tracking-wide uppercase mb-1 relative z-10">Prioritas Sedang</h4>
                    <div class="flex items-end justify-between relative z-10">
                        <p class="text-5xl font-extrabold text-slate-900">{{ $mediumPriorityCount ?? 0 }}</p>
                        <span class="bg-amber-100 text-amber-700 text-xs font-bold px-3 py-1 rounded-full mb-1">1 - 3 Hari</span>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm hover:shadow-md hover:border-emerald-300 transition-all group relative overflow-hidden">
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-emerald-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-6 relative z-10 border border-emerald-200">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-slate-500 font-bold text-sm tracking-wide uppercase mb-1 relative z-10">Prioritas Rendah</h4>
                    <div class="flex items-end justify-between relative z-10">
                        <p class="text-5xl font-extrabold text-slate-900">{{ $lowPriorityCount ?? 0 }}</p>
                        <span class="bg-emerald-100 text-emerald-700 text-xs font-bold px-3 py-1 rounded-full mb-1">> 3 Hari</span>
                    </div>
                </div>
            </div>

            @if (Auth::user()->role_level === 'basic')
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-3xl p-8 flex flex-col md:flex-row items-center justify-between gap-6 relative overflow-hidden shadow-sm">
                    <div class="absolute -left-10 top-0 w-32 h-32 bg-blue-200/50 rounded-full filter blur-2xl"></div>
                    
                    <div class="relative z-10">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold uppercase tracking-wide mb-3">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd"></path></svg>
                            Tingkatkan Kapasitas
                        </div>
                        <h4 class="text-slate-900 font-extrabold text-2xl mb-2">Buka Potensi Penuh Sistem Anda</h4>
                        <p class="text-slate-600 font-medium text-lg max-w-xl">
                            Buat fragmentasi kategori tanpa batas dan aktifkan automasi pengingat WhatsApp langsung ke gawai Anda.
                        </p>
                    </div>
                    <div class="relative z-10 shrink-0 w-full md:w-auto">
                        <a href="{{ route('premium.checkout') }}" class="w-full md:w-auto inline-flex justify-center items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-xl transition-all shadow-[0_8px_30px_rgb(37,99,235,0.3)] hover:shadow-[0_8px_30px_rgb(37,99,235,0.5)] transform hover:-translate-y-1">
                            Akses Fitur Premium
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>