<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Kendali Sibuk (SKS)</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans bg-gray-50 text-gray-900">

    <nav class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-2xl font-extrabold text-blue-600">SKS<span class="text-gray-800">.</span></span>
                </div>
                
                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-gray-600 hover:text-blue-600 transition">Ke Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-600 hover:text-blue-600 transition">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm font-semibold bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition shadow-sm">Daftar Gratis</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-[70vh]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-gray-900 mb-6">
                    Manajemen Tugas Cerdas untuk <br class="hidden md:block" />
                    <span class="text-blue-600">Mahasiswa Aktif</span>
                </h1>
                <p class="mt-4 text-lg md:text-xl text-gray-600 max-w-2xl mx-auto mb-10">
                    Berhenti kebingungan membedakan tugas kuliah, tanggung jawab praktikum, hingga rapat organisasi. Atur semua peran Anda dalam satu kendali.
                </p>
                <div class="flex justify-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-blue-600 text-white font-bold px-8 py-3 rounded-xl shadow-lg hover:bg-blue-700 hover:-translate-y-0.5 transition-all">Buka Dashboard Anda</a>
                    @else
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white font-bold px-8 py-3 rounded-xl shadow-lg hover:bg-blue-700 hover:-translate-y-0.5 transition-all">Mulai Sekarang - Gratis</a>
                    @endauth
                </div>
            </div>
        </div>

        <div class="bg-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900">Mengapa Menggunakan SKS?</h2>
                    <p class="mt-4 text-gray-600">Dirancang khusus untuk memecahkan masalah produktivitas mahasiswa.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:shadow-md transition">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center font-bold text-xl mb-6">1</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Isolasi Konteks Peran</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Pisahkan tugas berdasarkan kategori. Tugas Asisten Dosen, Kepanitiaan, dan Kuliah reguler tidak akan lagi tercampur aduk.
                        </p>
                    </div>

                    <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:shadow-md transition">
                        <div class="w-12 h-12 bg-red-100 text-red-600 rounded-xl flex items-center justify-center font-bold text-xl mb-6">2</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Kalkulasi Prioritas Otomatis</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Sistem secara cerdas menganalisis tenggat waktu (*deadline*) dan memberikan label Tinggi, Sedang, atau Rendah secara *real-time*.
                        </p>
                    </div>

                    <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:shadow-md transition relative overflow-hidden">
                        <div class="absolute top-0 right-0 bg-yellow-400 text-yellow-900 text-xs font-bold px-3 py-1 rounded-bl-lg">Premium</div>
                        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center font-bold text-xl mb-6">3</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Pengingat via WhatsApp</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Dapatkan ringkasan tugas harian (*Daily Summary*) langsung ke nomor WhatsApp Anda tanpa perlu repot membuka aplikasi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-900 py-8 text-center text-gray-400">
        <p>&copy; {{ date('Y') }} Sistem Kendali Sibuk. Didesain untuk manajemen tugas yang lebih baik.</p>
    </footer>

</body>
</html>