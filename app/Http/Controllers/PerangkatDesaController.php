<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatDesaController extends Controller
{
    // 1. Menampilkan daftar perangkat desa di Admin
    public function index()
    {
        // Mengurutkan berdasarkan kolom 'urutan' dari angka terkecil ke terbesar
        $perangkat = PerangkatDesa::orderBy('urutan', 'asc')->get();
        return view('admin.perangkat.index', compact('perangkat'));
    }

    // 2. Menampilkan form tambah
    public function create()
    {
        return view('admin.perangkat.create');
    }

    // 3. Menyimpan data baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'urutan' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Maksimal 2MB
        ]);

        $data = $request->all();

        // Jika admin mengunggah foto
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('perangkat_desa', 'public');
        }

        PerangkatDesa::create($data);

        return redirect()->route('admin.perangkat.index')->with('success', 'Perangkat Desa berhasil ditambahkan!');
    }

    // 4. Menampilkan form edit
    public function edit($id)
    {
        $perangkat = PerangkatDesa::findOrFail($id);
        return view('admin.perangkat.edit', compact('perangkat'));
    }

    // 5. Menyimpan perubahan data
    public function update(Request $request, $id)
    {
        $perangkat = PerangkatDesa::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'urutan' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Jika admin mengunggah foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($perangkat->foto) {
                Storage::disk('public')->delete($perangkat->foto);
            }
            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('perangkat_desa', 'public');
        }

        $perangkat->update($data);

        return redirect()->route('admin.perangkat.index')->with('success', 'Data Perangkat Desa berhasil diperbarui!');
    }

    // 6. Menghapus data
    public function destroy($id)
    {
        $perangkat = PerangkatDesa::findOrFail($id);

        // Hapus file foto dari penyimpanan jika ada
        if ($perangkat->foto) {
            Storage::disk('public')->delete($perangkat->foto);
        }

        $perangkat->delete();

        return redirect()->route('admin.perangkat.index')->with('success', 'Perangkat Desa berhasil dihapus!');
    }
}