<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 tracking-tight leading-tight">
            {{ __('Upgrade ke Premium') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
                <div class="bg-slate-900 p-8 text-center text-white">
                    <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-blue-900/50">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold tracking-tight">Aktifkan Fitur Premium</h3>
                    <p class="text-slate-400 mt-2">Satu langkah terakhir menuju manajemen yang lebih cerdas.</p>
                </div>

                <div class="p-8 space-y-6">
                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Rincian Pembayaran</h4>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-600 font-medium">Paket Premium (Lifetime)</span>
                                <span class="text-slate-900 font-bold">Rp 49.000</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-600 font-medium">Biaya Layanan</span>
                                <span class="text-slate-900 font-bold">Rp 1.000</span>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-slate-200 flex justify-between items-center">
                            <span class="text-slate-900 font-bold text-lg">Total</span>
                            <span class="text-3xl font-extrabold text-blue-600 tracking-tight">Rp 50.000</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-center gap-2 text-slate-400 text-xs font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Pembayaran diamankan secara enkripsi
                    </div>
                </div>

                <div class="p-8 bg-slate-50 border-t border-slate-100 flex items-center justify-between gap-4">
                    <a href="{{ route('dashboard') }}" class="text-slate-500 font-bold text-sm hover:text-slate-800 transition">
                        Batal
                    </a>
                    
                    <form action="{{ route('premium.process') }}" method="POST" class="w-full sm:w-auto">
                        @csrf
                        <button type="submit"
                            class="w-full sm:w-auto bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-4 px-10 rounded-2xl shadow-[0_8px_30px_rgb(37,99,235,0.3)] hover:shadow-[0_8px_30px_rgb(37,99,235,0.5)] transform hover:-translate-y-0.5 transition-all duration-300">
                            Bayar Sekarang
                        </button>
                    </form>
                </div>
            </div>
            
            <p class="text-center text-slate-400 text-xs mt-8">
                Setelah pembayaran sukses, fitur Premium akan langsung aktif di akun Anda.
            </p>
        </div>
    </div>
</x-app-layout>