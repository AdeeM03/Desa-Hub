<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Mengizinkan penyimpanan massal untuk kolom ini
    protected $fillable = [
        'judul',
        'konten',
        'gambar',
    ];
}