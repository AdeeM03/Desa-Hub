<?php

namespace App\Http\Controllers;

use App\Models\PerizinanUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerizinanUsahaController extends Controller
{
    /**
     * Tampilkan halaman Perizinan Usaha (UMKM) beserta riwayat terdata
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $query = PerizinanUsaha::query()->latest();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nomor_registrasi', 'like', "%{$search}%")
                  ->orWhere('nama_pemilik', 'like', "%{$search}%")
                  ->orWhere('nama_usaha', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%");
            });
        }

        $submissions = $query->paginate(10)->withQueryString();
        $totalSemua = PerizinanUsaha::count();
        $totalKuliner = PerizinanUsaha::where('jenis_usaha', 'like', '%Kuliner%')->count();
        $totalKerajinan = PerizinanUsaha::where('jenis_usaha', 'like', '%Kerajinan%')->count();
        $totalJasa = PerizinanUsaha::where('jenis_usaha', 'like', '%Jasa%')->orWhere('jenis_usaha', 'like', '%Dagang%')->count();

        return view('layanan.perizinan-usaha', compact(
            'submissions',
            'search',
            'totalSemua',
            'totalKuliner',
            'totalKerajinan',
            'totalJasa'
        ));
    }

    /**
     * Simpan data pengajuan perizinan usaha (Surat Keterangan Usaha)
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_pemilik' => 'required|string|max:255',
            'nik' => 'required|numeric|digits_between:16,16',
            'no_hp' => 'required|string|max:20',
            'nama_usaha' => 'required|string|max:255',
            'jenis_usaha' => 'required|string|max:100',
            'alamat_usaha' => 'required|string',
            'rt_rw' => 'nullable|string|max:20',
            'lama_usaha' => 'nullable|string|max:50',
            'jumlah_karyawan' => 'nullable|integer|min:0',
            'keperluan' => 'required|string|max:500',
            'file_dokumen' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'keterangan' => 'nullable|string|max:1000',
        ];

        $validated = $request->validate($rules, [
            'nik.digits_between' => 'NIK harus berjumlah 16 digit angka.',
            'file_dokumen.required' => 'Wajib mengunggah berkas Surat Keterangan Usaha / Berkas Pendukung.',
            'file_dokumen.mimes' => 'Format file yang diperbolehkan adalah JPG, JPEG, PNG, atau PDF.',
            'file_dokumen.max' => 'Ukuran file maksimal adalah 5MB.',
        ]);

        $file = $request->file('file_dokumen');
        $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
        $filePath = $file->storeAs('dokumen/perizinan-usaha', $fileName, 'public');

        $nomorRegistrasi = PerizinanUsaha::generateNomorRegistrasi();

        PerizinanUsaha::create([
            'nomor_registrasi' => $nomorRegistrasi,
            'nama_pemilik' => $request->nama_pemilik,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'nama_usaha' => $request->nama_usaha,
            'jenis_usaha' => $request->jenis_usaha,
            'alamat_usaha' => $request->alamat_usaha,
            'rt_rw' => $request->rt_rw,
            'lama_usaha' => $request->lama_usaha,
            'jumlah_karyawan' => $request->jumlah_karyawan,
            'keperluan' => $request->keperluan,
            'file_path' => $filePath,
            'file_name' => $file->getClientOriginalName(),
            'file_size' => $file->getSize(),
            'file_type' => $file->getClientMimeType(),
            'keterangan' => $request->keterangan,
            'status' => 'Menunggu Verifikasi',
        ]);

        return redirect()->route('layanan.perizinan-usaha', ['#riwayat'])
            ->with('success', "Permohonan Surat Keterangan Usaha berhasil disimpan ke sistem! Nomor Registrasi: {$nomorRegistrasi}");
    }
}

