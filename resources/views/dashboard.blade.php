<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daily Summary') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl mb-6 border border-gray-100">
                <div class="p-6 text-gray-900 flex justify-between items-center flex-wrap gap-4">
                    <div>
                        <h3 class="text-2xl font-bold">Halo, {{ Auth::user()->name }}! 👋</h3>
                        <p class="text-gray-600 mt-1">Berikut adalah ringkasan kendali kesibukan Anda hari ini.</p>
                    </div>
                    
                    @if(Auth::user()->role_level === 'premium')
                    <div>
                        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-sm transition flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.031 21.4111C10.5186 21.412 9.04351 21.0371 7.72895 20.323L7.33332 20.108L3.41103 21.045L4.44415 17.447L4.1795 17.009C3.36442 15.6547 2.92994 14.0754 2.93098 12.4414C2.93306 7.42045 7.33709 3.33496 12.031 3.33496C14.3056 3.336 16.4851 4.18189 18.0931 5.7171C19.7011 7.25232 20.588 9.32421 20.588 11.4939C20.5869 16.5148 16.1829 20.6003 12.031 21.4111ZM7.56209 18.232C8.8986 19.0463 10.4504 19.4795 12.031 19.4784C16.1042 19.4784 19.421 16.331 19.422 12.4424C19.4231 10.609 18.6657 8.85078 17.3005 7.55394C15.9354 6.25709 14.084 5.5262 12.032 5.52516C7.95886 5.52516 4.64104 8.67156 4.64104 12.4424C4.64104 14.0933 5.12788 15.6888 6.03578 17.065L6.31952 17.495L5.61793 19.932L8.27137 19.336L8.68112 19.553C8.68112 19.553 7.56209 18.232 7.56209 18.232Z"/>
                                <path d="M16.5173 15.1154C16.2917 14.6854 15.6148 14.4274 14.6 13.9544C13.5852 13.4814 13.0778 13.2444 12.8522 13.2444C12.6265 13.2444 12.4009 13.4814 12.1753 13.8254C11.9497 14.1694 11.2728 14.8574 11.0471 15.1154C10.8215 15.3734 10.5959 15.4594 10.0885 15.2014C9.58107 14.9434 8.4529 14.5994 7.43763 13.7824C6.53504 13.0514 5.97098 12.1054 5.74534 11.8474C5.5197 11.5894 5.74534 11.4174 5.97098 11.2454C6.19662 11.0734 6.42226 10.7294 6.6479 10.4714C6.87353 10.2134 6.98634 10.0414 7.15556 9.69741C7.32477 9.35341 7.21195 9.00941 7.15556 8.83741C7.09916 8.66541 6.6479 7.46141 6.42226 6.85941C6.19662 6.25741 5.97098 6.42941 5.74534 6.42941C5.5197 6.42941 5.29406 6.42941 5.06842 6.42941C4.84278 6.42941 4.39151 6.51541 4.05307 6.85941C3.71463 7.20341 2.81204 8.06341 2.81204 9.86941C2.81204 11.6754 4.05307 13.4814 4.39151 13.8254C4.72995 14.1694 6.6479 17.2654 9.80718 18.4694C12.9665 19.6734 12.9665 18.8134 13.6434 18.7274C14.3202 18.6414 15.6741 17.9534 15.9561 17.1794C16.2381 16.4054 16.2381 15.7174 16.5173 15.1154Z"/>
                            </svg>
                            Kirim Pengingat WA
                        </button>
                    </div>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-red-50 border-l-4 border-red-500 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h4 class="text-red-700 font-bold text-lg mb-2">Prioritas Tinggi</h4>
                    <p class="text-4xl font-extrabold text-red-600">{{ $highPriorityCount ?? 0 }}</p>
                    <p class="text-sm text-red-500 mt-2 font-medium">Tenggat Waktu < 24 Jam</p>
                </div>

                <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h4 class="text-yellow-700 font-bold text-lg mb-2">Prioritas Sedang</h4>
                    <p class="text-4xl font-extrabold text-yellow-600">{{ $mediumPriorityCount ?? 0 }}</p>
                    <p class="text-sm text-yellow-500 mt-2 font-medium">Tenggat Waktu 1-3 Hari</p>
                </div>

                <div class="bg-green-50 border-l-4 border-green-500 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h4 class="text-green-700 font-bold text-lg mb-2">Prioritas Rendah</h4>
                    <p class="text-4xl font-extrabold text-green-600">{{ $lowPriorityCount ?? 0 }}</p>
                    <p class="text-sm text-green-500 mt-2 font-medium">Tenggat Waktu > 3 Hari</p>
                </div>
            </div>

            @if(Auth::user()->role_level === 'basic')
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-100 rounded-xl p-6 flex flex-col md:flex-row items-center justify-between gap-4 mt-8">
                <div>
                    <h4 class="text-blue-800 font-bold text-lg mb-1">Tingkatkan Kapasitas Manajemen Anda!</h4>
                    <p class="text-blue-600 text-sm">Upgrade ke Premium untuk membuat kategori tanpa batas dan mengaktifkan pengingat WhatsApp otomatis.</p>
                </div>
                <a href="#" class="shrink-0 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition shadow-sm">
                    Upgrade Premium
                </a>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>