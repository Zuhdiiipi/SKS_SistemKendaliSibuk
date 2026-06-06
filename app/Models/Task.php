<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; // Tambahkan ini

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'title', 'deadline', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // PBO: Enkapsulasi logika prioritas sebagai atribut objek
    public function getPriorityAttribute()
    {
        if ($this->status === 'done') return 'Selesai';

        $now = Carbon::now();
        $deadlineDate = Carbon::parse($this->deadline);

        // Jika sudah lewat waktu
        if ($now->greaterThan($deadlineDate)) return 'Terlewat';

        // Hitung selisih jam
        $diffInHours = $now->diffInHours($deadlineDate);

        if ($diffInHours <= 24) return 'Tinggi';
        if ($diffInHours <= 72) return 'Sedang'; // 1-3 Hari

        return 'Rendah'; // Lebih dari 3 Hari
    }
}