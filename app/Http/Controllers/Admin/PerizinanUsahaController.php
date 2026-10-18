<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerizinanUsaha;
use Illuminate\Http\Request;

class PerizinanUsahaController extends Controller
{
    public function index()
    {
        $permohonan = PerizinanUsaha::orderBy('created_at', 'desc')->get();
        return view('admin.perizinan-usaha.index', compact('permohonan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|string', 'catatan_petugas' => 'nullable|string']);

        $data = PerizinanUsaha::findOrFail($id);
        $data->status = $request->status;
        $data->catatan_petugas = $request->catatan_petugas;
        $data->save();

        return redirect()->back()->with('success', 'Status Perizinan Usaha berhasil diperbarui!');
    }
}