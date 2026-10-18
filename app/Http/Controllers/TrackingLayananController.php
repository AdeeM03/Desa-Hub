<?php

namespace App\Http\Controllers;

use App\Models\AdministrasiKependudukan;
use App\Models\PerizinanUsaha;
use App\Models\SuratKeteranganDesa;
use Illuminate\Http\Request;

class TrackingLayananController extends Controller
{
    /**
     * Halaman tracking / pencarian data permohonan layanan
     */
    public function index(Request $request)
    {
        $keyword = $request->query('keyword');
        $hasilKependudukan = collect();
        $hasilSurat = collect();
        $hasilUsaha = collect();

        if ($keyword) {
            $keyword = trim($keyword);

            $hasilKependudukan = AdministrasiKependudukan::where('nomor_registrasi', 'like', "%{$keyword}%")
                ->orWhere('nik', $keyword)
                ->orWhere('nama_pemohon', 'like', "%{$keyword}%")
                ->latest()
                ->get();

            $hasilSurat = SuratKeteranganDesa::where('nomor_registrasi', 'like', "%{$keyword}%")
                ->orWhere('nik', $keyword)
                ->orWhere('nama_pemohon', 'like', "%{$keyword}%")
                ->latest()
                ->get();

            $hasilUsaha = PerizinanUsaha::where('nomor_registrasi', 'like', "%{$keyword}%")
                ->orWhere('nik', $keyword)
                ->orWhere('nama_pemilik', 'like', "%{$keyword}%")
                ->latest()
                ->get();
        }

        $totalKependudukan = AdministrasiKependudukan::count();
        $totalSurat = SuratKeteranganDesa::count();
        $totalUsaha = PerizinanUsaha::count();

        return view('layanan.tracking', compact(
            'keyword',
            'hasilKependudukan',
            'hasilSurat',
            'hasilUsaha',
            'totalKependudukan',
            'totalSurat',
            'totalUsaha'
        ));
    }
}

