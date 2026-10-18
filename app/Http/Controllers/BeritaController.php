<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // Menampilkan daftar semua berita untuk warga
    public function index()
    {
        // Mengambil berita terbaru, dibatasi 9 per halaman (paginasi)
        $berita = Berita::orderBy('created_at', 'desc')->paginate(9);
        return view('berita.index', compact('berita'));
    }

    // Menampilkan detail teks isi satu berita penuh
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }
}