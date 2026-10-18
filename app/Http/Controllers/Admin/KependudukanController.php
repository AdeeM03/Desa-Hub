<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdministrasiKependudukan;
use Illuminate\Http\Request;

class KependudukanController extends Controller
{
    // Menampilkan halaman tabel data permohonan
    public function index()
    {
        // Mengambil semua data permohonan dari terbaru ke terlama
        $permohonan = AdministrasiKependudukan::orderBy('created_at', 'desc')->get();

        return view('admin.kependudukan.index', compact('permohonan'));
    }

    // Mengupdate status permohonan (Verifikasi/Tolak/Selesai)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
            'catatan_petugas' => 'nullable|string'
        ]);

        $data = AdministrasiKependudukan::findOrFail($id);
        $data->status = $request->status;
        $data->catatan_petugas = $request->catatan_petugas;
        $data->save();

        return redirect()->back()->with('success', 'Status permohonan berhasil diperbarui!');
    }
}