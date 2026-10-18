<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratKeteranganDesa;
use Illuminate\Http\Request;

class SuratKeteranganController extends Controller
{
    public function index()
    {
        $permohonan = SuratKeteranganDesa::orderBy('created_at', 'desc')->get();
        return view('admin.surat-keterangan.index', compact('permohonan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|string', 'catatan_petugas' => 'nullable|string']);

        $data = SuratKeteranganDesa::findOrFail($id);
        $data->status = $request->status;
        $data->catatan_petugas = $request->catatan_petugas;
        $data->save();

        return redirect()->back()->with('success', 'Status Surat Keterangan berhasil diperbarui!');
    }
}