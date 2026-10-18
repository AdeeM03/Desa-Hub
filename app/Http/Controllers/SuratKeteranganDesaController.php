<?php

namespace App\Http\Controllers;

use App\Models\SuratKeteranganDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeteranganDesaController extends Controller
{
    /**
     * Tampilkan halaman Surat Keterangan Desa beserta riwayat terdata
     */
    public function index(Request $request)
    {
        $jenisSurat = $request->query('jenis_surat');
        $search = $request->query('search');

        $query = SuratKeteranganDesa::query()->latest();

        if ($jenisSurat && in_array($jenisSurat, ['sktm', 'skck', 'surat_nikah'])) {
            $query->where('jenis_surat', $jenisSurat);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nomor_registrasi', 'like', "%{$search}%")
                  ->orWhere('nama_pemohon', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%");
            });
        }

        $submissions = $query->paginate(10)->withQueryString();
        $totalSemua = SuratKeteranganDesa::count();
        $totalSktm = SuratKeteranganDesa::where('jenis_surat', 'sktm')->count();
        $totalSkck = SuratKeteranganDesa::where('jenis_surat', 'skck')->count();
        $totalNikah = SuratKeteranganDesa::where('jenis_surat', 'surat_nikah')->count();

        return view('layanan.surat-keterangan', compact(
            'submissions',
            'jenisSurat',
            'search',
            'totalSemua',
            'totalSktm',
            'totalSkck',
            'totalNikah'
        ));
    }

    /**
     * Simpan data pengajuan surat keterangan desa
     */
    public function store(Request $request)
    {
        $rules = [
            'jenis_surat' => 'required|in:sktm,skck,surat_nikah',
            'nama_pemohon' => 'required|string|max:255',
            'nik' => 'required|numeric|digits_between:16,16',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'rt_rw' => 'nullable|string|max:20',
            'keperluan' => 'required|string|max:500',
            'file_dokumen' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'keterangan' => 'nullable|string|max:1000',
        ];

        $jenisSurat = $request->input('jenis_surat');
        if ($jenisSurat === 'sktm') {
            $rules['pekerjaan'] = 'required|string|max:100';
            $rules['penghasilan_bulanan'] = 'required|string|max:100';
        } elseif ($jenisSurat === 'skck') {
            $rules['tempat_lahir'] = 'required|string|max:100';
            $rules['tanggal_lahir'] = 'required|date';
            $rules['jenis_kelamin'] = 'required|in:Laki-laki,Perempuan';
            $rules['agama'] = 'required|string|max:50';
            $rules['pendidikan'] = 'required|string|max:50';
        } elseif ($jenisSurat === 'surat_nikah') {
            $rules['status_pernikahan'] = 'required|string|max:50';
            $rules['nama_pasangan'] = 'required|string|max:255';
            $rules['nik_pasangan'] = 'nullable|numeric|digits_between:16,16';
            $rules['alamat_pasangan'] = 'required|string';
            $rules['tanggal_akad'] = 'nullable|date';
        }

        $validated = $request->validate($rules, [
            'nik.digits_between' => 'NIK harus berjumlah 16 digit angka.',
            'nik_pasangan.digits_between' => 'NIK Pasangan harus berjumlah 16 digit angka.',
            'file_dokumen.required' => 'Wajib mengunggah file berkas/gambar pendukung.',
            'file_dokumen.mimes' => 'Format file yang diperbolehkan adalah JPG, JPEG, PNG, atau PDF.',
            'file_dokumen.max' => 'Ukuran file maksimal adalah 5MB.',
        ]);

        $file = $request->file('file_dokumen');
        $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
        $filePath = $file->storeAs('dokumen/surat-keterangan', $fileName, 'public');

        $detailData = [];
        if ($jenisSurat === 'sktm') {
            $detailData = [
                'pekerjaan' => $request->pekerjaan,
                'penghasilan_bulanan' => $request->penghasilan_bulanan,
            ];
        } elseif ($jenisSurat === 'skck') {
            $detailData = [
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'pendidikan' => $request->pendidikan,
            ];
        } elseif ($jenisSurat === 'surat_nikah') {
            $detailData = [
                'status_pernikahan' => $request->status_pernikahan,
                'nama_pasangan' => $request->nama_pasangan,
                'nik_pasangan' => $request->nik_pasangan,
                'alamat_pasangan' => $request->alamat_pasangan,
                'tanggal_akad' => $request->tanggal_akad,
            ];
        }

        $nomorRegistrasi = SuratKeteranganDesa::generateNomorRegistrasi($jenisSurat);

        SuratKeteranganDesa::create([
            'nomor_registrasi' => $nomorRegistrasi,
            'jenis_surat' => $jenisSurat,
            'nama_pemohon' => $request->nama_pemohon,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'rt_rw' => $request->rt_rw,
            'keperluan' => $request->keperluan,
            'detail_data' => $detailData,
            'file_path' => $filePath,
            'file_name' => $file->getClientOriginalName(),
            'file_size' => $file->getSize(),
            'file_type' => $file->getClientMimeType(),
            'keterangan' => $request->keterangan,
            'status' => 'Menunggu Verifikasi',
        ]);

        return redirect()->route('layanan.surat-keterangan', ['#riwayat'])
            ->with('success', "Permohonan Surat Keterangan berhasil diajukan dan terdata dalam sistem! Nomor Registrasi: {$nomorRegistrasi}");
    }
}

