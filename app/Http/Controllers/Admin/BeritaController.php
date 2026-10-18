<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::orderBy('created_at', 'desc')->get();
        return view('admin.berita.index', compact('berita'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => $path,
        ]);

        return redirect()->back()->with('success', 'Berita berhasil dipublikasikan!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $berita->delete();

        return redirect()->back()->with('success', 'Berita berhasil dihapus!');
    }
}