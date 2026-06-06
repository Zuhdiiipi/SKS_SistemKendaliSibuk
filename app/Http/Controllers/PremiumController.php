<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class PremiumController extends Controller
{
    public function sendWhatsApp(Request $request)
    {
        // Validasi input nomor WA
        $request->validate([
            'wa_number' => 'required|numeric'
        ]);

        // Ambil semua tugas yang belum selesai
        $tasks = Auth::user()->tasks()->where('status', 'pending')->orderBy('deadline', 'asc')->get();

        if ($tasks->isEmpty()) {
            return back()->with('success', 'Tidak ada tugas yang tertunda. Anda bisa bersantai!');
        }

        // Merangkai teks pesan WhatsApp
        $message = "*SKS - Daily Summary*\n";
        $message .= "Halo *" . Auth::user()->name . "*, berikut ringkasan kesibukanmu hari ini:\n\n";

        foreach ($tasks as $task) {
            $date = Carbon::parse($task->deadline)->format('d M Y, H:i');
            $message .= "▫️ [*" . $task->priority . "*] " . $task->title . " \n⏳ " . $date . "\n\n";
        }

        $message .= "Semangat mengerjakannya! Jangan lupa istirahat.";

        // Mengirim request ke API Fonnte (Layanan WA Gateway Gratis)
        $response = Http::withHeaders([
            'Authorization' => env('FONNTE_TOKEN', 'GANTI_DENGAN_TOKEN_ANDA') // Kita atur tokennya nanti
        ])->post('https://api.fonnte.com/send', [
            'target' => $request->wa_number,
            'message' => $message,
            'countryCode' => '62', // Standar kode negara Indonesia
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Ringkasan harian berhasil dikirim ke WhatsApp Anda!');
        }

        return back()->with('error', 'Gagal mengirim pesan WhatsApp. Periksa koneksi atau token API.');
    }

    public function checkout()
    {
        // Pastikan hanya akun basic yang bisa mengakses halaman ini
        if (Auth::user()->role_level !== 'basic') {
            return redirect()->route('dashboard')->with('success', 'Akun Anda sudah Premium!');
        }

        return view('premium.checkout');
    }

    public function processPayment()
    {
        // Cek apakah user benar-benar Basic
        if (Auth::user()->role_level !== 'basic') {
            return redirect()->route('dashboard')->with('success', 'Akun Anda sudah Premium!');
        }

        // Nanti kode pemanggilan API Midtrans diletakkan di sini

        // Sementara, kita asumsikan simulasi sukses dan langsung ubah role-nya
        $user = Auth::user();
        $user->role_level = 'premium';
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Simulasi Pembayaran Berhasil! Akun Anda kini Premium.');
    }
}