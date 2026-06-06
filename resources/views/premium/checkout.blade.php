<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upgrade ke Premium') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-8">

                <div class="text-center mb-8">
                    <h3 class="text-3xl font-extrabold text-gray-900 mb-2">Buka Potensi Penuh Anda</h3>
                    <p class="text-gray-600">Simulasi Pembayaran untuk Sistem Kendali Sibuk</p>
                </div>

                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200 mb-8">
                    <h4 class="font-bold text-lg text-gray-800 border-b pb-4 mb-4">Rincian Tagihan</h4>

                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-600">Paket Premium (Akses Selamanya)</span>
                        <span class="font-semibold text-gray-900">Rp 49.000</span>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-600">Biaya Layanan</span>
                        <span class="font-semibold text-gray-900">Rp 1.000</span>
                    </div>

                    <div class="flex justify-between items-center border-t pt-4 mt-4">
                        <span class="font-bold text-xl text-gray-900">Total Tagihan</span>
                        <span class="font-extrabold text-2xl text-blue-600">Rp 50.000</span>
                    </div>
                </div>

                <div class="flex justify-end gap-4">
                    <a href="{{ route('dashboard') }}"
                        class="px-6 py-3 text-gray-600 hover:text-gray-900 font-medium transition">
                        Batal
                    </a>

                    <form action="{{ route('premium.process') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg transition">
                            Bayar Sekarang
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
