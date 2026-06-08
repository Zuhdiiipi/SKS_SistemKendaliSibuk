<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SKS - Sistem Kendali Sibuk</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        /* Pola grid latar belakang untuk nuansa "Tech / Coding" */
        .bg-grid-pattern {
            background-image: radial-gradient(#e5e7eb 1px, transparent 1px);
            background-size: 32px 32px;
        }
    </style>
</head>
<body class="antialiased bg-slate-50 text-slate-900 selection:bg-blue-600 selection:text-white">

    <nav class="fixed w-full z-50 bg-white/70 backdrop-blur-md border-b border-slate-200/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <span class="text-2xl font-extrabold tracking-tight text-slate-900">SKS<span class="text-blue-600">.</span></span>
                </div>
                
                <div class="flex items-center gap-4 sm:gap-6">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-bold text-slate-600 hover:text-blue-600 transition">Command Center &rarr;</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-bold text-slate-600 hover:text-blue-600 transition hidden sm:block">Log In</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm font-bold bg-slate-900 text-white px-5 py-2.5 rounded-xl hover:bg-blue-600 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">Daftar Akses</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="relative overflow-hidden bg-grid-pattern">
        <div class="absolute top-0 -left-4 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>

        <div class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 flex content-center items-center justify-center min-h-[85vh]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-100 text-blue-600 text-xs font-bold uppercase tracking-wide mb-8 shadow-sm">
                    <span class="flex h-2 w-2 rounded-full bg-blue-600"></span>
                    Produktivitas Digital V2.0
                </div>
                
                <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-slate-900 mb-6 leading-tight">
                    Kendalikan Kesibukan, <br class="hidden md:block" />
                    Bukan <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Dikendalikan.</span>
                </h1>
                
                <p class="mt-4 text-lg md:text-xl text-slate-600 max-w-2xl mx-auto mb-10 font-medium">
                    Sistem arsitektur tugas yang dirancang dengan presisi untuk memisahkan logika proyek kuliah, kepanitiaan, hingga rutinitas pribadi Anda dalam satu ekosistem.
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center gap-4 sm:gap-6">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-blue-600 text-white font-bold px-8 py-4 rounded-xl shadow-[0_8px_30px_rgb(37,99,235,0.3)] hover:bg-blue-700 hover:shadow-[0_8px_30px_rgb(37,99,235,0.5)] hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2">
                            Buka Ruang Kerja
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white font-bold px-8 py-4 rounded-xl shadow-[0_8px_30px_rgb(37,99,235,0.3)] hover:bg-blue-700 hover:shadow-[0_8px_30px_rgb(37,99,235,0.5)] hover:-translate-y-1 transition-all duration-300">
                            Mulai Kompilasi Tugas
                        </a>
                        <a href="#fitur" class="bg-white text-slate-700 font-bold px-8 py-4 rounded-xl border border-slate-200 shadow-sm hover:bg-slate-50 hover:border-slate-300 transition-all duration-300">
                            Pelajari Sistem
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <div id="fitur" class="bg-white border-t border-slate-100 py-24 relative z-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-16 md:w-2/3">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Infrastruktur Produktivitas</h2>
                    <p class="text-lg text-slate-600 font-medium">Bukan sekadar *to-do list*. Ini adalah sistem kendali terpusat untuk mahasiswa yang dinamis.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    
                    <div class="md:col-span-2 bg-slate-50 p-10 rounded-3xl border border-slate-200 hover:border-blue-300 transition-colors duration-300 group overflow-hidden relative">
                        <div class="absolute -right-10 -bottom-10 opacity-10 group-hover:opacity-20 transition-opacity">
                            <svg class="w-64 h-64 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M4 4h16v16H4V4zm2 4v10h12V8H6zm2 2h8v2H8v-2zm0 4h5v2H8v-2z"></path></svg>
                        </div>
                        <div class="w-14 h-14 bg-white shadow-sm border border-slate-100 text-blue-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">Isolasi Konteks Peran</h3>
                        <p class="text-slate-600 text-lg leading-relaxed max-w-xl relative z-10">
                            Bangun ruang kerja yang terfragmentasi. Pisahkan variabel tugas organisasi, *project* praktikum, dan tanggung jawab personal agar fokus Anda tidak tumpang tindih.
                        </p>
                    </div>

                    <div class="bg-slate-900 text-white p-10 rounded-3xl border border-slate-800 shadow-xl relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="absolute top-6 right-6">
                            <span class="bg-blue-500/20 text-blue-300 text-xs font-bold px-3 py-1 rounded-full border border-blue-500/30">Auto-Compute</span>
                        </div>
                        <div class="w-14 h-14 bg-slate-800 text-blue-400 rounded-2xl flex items-center justify-center mb-6 border border-slate-700">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 relative z-10">Algoritma Prioritas</h3>
                        <p class="text-slate-400 text-lg leading-relaxed relative z-10">
                            Mesin SKS secara dinamis mengkalkulasi selisih waktu aktual ke *deadline* dan melabeli urgensi tugas secara otomatis.
                        </p>
                    </div>

                    <div class="md:col-span-3 bg-gradient-to-r from-blue-600 to-indigo-700 p-10 md:p-12 rounded-3xl text-white shadow-2xl flex flex-col md:flex-row items-center justify-between gap-8 relative overflow-hidden">
                        <div class="absolute -right-20 top-1/2 transform -translate-y-1/2 opacity-20">
                            <svg class="w-96 h-96" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"></path></svg>
                        </div>
                        
                        <div class="relative z-10 md:w-2/3">
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/20 border border-white/30 text-white text-xs font-bold uppercase tracking-wide mb-6">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 21.4111C10.5186 21.412 9.04351 21.0371 7.72895 20.323L7.33332 20.108L3.41103 21.045L4.44415 17.447L4.1795 17.009C3.36442 15.6547 2.92994 14.0754 2.93098 12.4414C2.93306 7.42045 7.33709 3.33496 12.031 3.33496C14.3056 3.336 16.4851 4.18189 18.0931 5.7171C19.7011 7.25232 20.588 9.32421 20.588 11.4939C20.5869 16.5148 16.1829 20.6003 12.031 21.4111ZM7.56209 18.232C8.8986 19.0463 10.4504 19.4795 12.031 19.4784C16.1042 19.4784 19.421 16.331 19.422 12.4424C19.4231 10.609 18.6657 8.85078 17.3005 7.55394C15.9354 6.25709 14.084 5.5262 12.032 5.52516C7.95886 5.52516 4.64104 8.67156 4.64104 12.4424C4.64104 14.0933 5.12788 15.6888 6.03578 17.065L6.31952 17.495L5.61793 19.932L8.27137 19.336L8.68112 19.553C8.68112 19.553 7.56209 18.232 7.56209 18.232Z"/></svg>
                                Ekosistem Premium
                            </div>
                            <h3 class="text-3xl md:text-4xl font-extrabold mb-4">Integrasi WhatsApp Gateway</h3>
                            <p class="text-blue-100 text-lg leading-relaxed max-w-2xl">
                                Tinggalkan kebiasaan membuka aplikasi berulang kali. Kompilasi *Daily Summary* dari seluruh tugas Anda akan didorong (*pushed*) langsung ke perangkat komunikasi Anda.
                            </p>
                        </div>
                        <div class="relative z-10 shrink-0 w-full md:w-auto text-center md:text-right">
                            <a href="{{ route('register') }}" class="inline-block bg-white text-blue-600 font-extrabold px-8 py-4 rounded-xl shadow-lg hover:bg-slate-50 transition-colors w-full md:w-auto">
                                Coba Simulasi Premium
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-t border-slate-200 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 bg-slate-900 rounded-md flex items-center justify-center">
                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <span class="text-xl font-bold text-slate-900 tracking-tight">SKS.</span>
            </div>
            <p class="text-slate-500 font-medium text-sm text-center md:text-left">
                &copy; {{ date('Y') }} Dibangun dengan logika. Didesain untuk efisiensi.
            </p>
            <div class="flex gap-4">
                <a href="#" class="text-slate-400 hover:text-blue-600 transition"><span class="sr-only">GitHub</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg></a>
            </div>
        </div>
    </footer>

</body>
</html>