<?php

namespace App\Http\Controllers;

use App\Models\AdministrasiKependudukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdministrasiKependudukanController extends Controller
{
    /**
     * Tampilkan halaman Administrasi Kependudukan beserta data terdata
     */
    public function index(Request $request)
    {
        $kategori = $request->query('kategori');
        $search = $request->query('search');

        $query = AdministrasiKependudukan::query()->latest();

        if ($kategori && in_array($kategori, ['ktp', 'kartu_keluarga', 'akta_kelahiran', 'pindah_domisili'])) {
            $query->where('kategori', $kategori);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nomor_registrasi', 'like', "%{$search}%")
                  ->orWhere('nama_pemohon', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%");
            });
        }

        $submissions = $query->paginate(10)->withQueryString();
        $totalSemua = AdministrasiKependudukan::count();
        $totalKtp = AdministrasiKependudukan::where('kategori', 'ktp')->count();
        $totalKk = AdministrasiKependudukan::where('kategori', 'kartu_keluarga')->count();
        $totalAkta = AdministrasiKependudukan::where('kategori', 'akta_kelahiran')->count();
        $totalPindah = AdministrasiKependudukan::where('kategori', 'pindah_domisili')->count();

        return view('layanan.administrasi-kependudukan', compact(
            'submissions',
            'kategori',
            'search',
            'totalSemua',
            'totalKtp',
            'totalKk',
            'totalAkta',
            'totalPindah'
        ));
    }

    /**
     * Simpan data pengajuan administrasi kependudukan
     */
    public function store(Request $request)
    {
        $rules = [
            'kategori' => 'required|in:ktp,kartu_keluarga,akta_kelahiran,pindah_domisili',
            'nama_pemohon' => 'required|string|max:255',
            'nik' => 'required|numeric|digits_between:16,16',
            'no_kk' => 'nullable|numeric|digits_between:16,16',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'rt_rw' => 'nullable|string|max:20',
            'file_dokumen' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'keterangan' => 'nullable|string|max:1000',
        ];

        // Validasi spesifik per kategori
        $kategori = $request->input('kategori');
        if ($kategori === 'ktp') {
            $rules['jenis_pengajuan'] = 'required|string|max:100';
            $rules['tempat_lahir'] = 'required|string|max:100';
            $rules['tanggal_lahir'] = 'required|date';
            $rules['jenis_kelamin'] = 'required|in:Laki-laki,Perempuan';
        } elseif ($kategori === 'kartu_keluarga') {
            $rules['jenis_permohonan'] = 'required|string|max:100';
            $rules['nama_kepala_keluarga'] = 'required|string|max:255';
        } elseif ($kategori === 'akta_kelahiran') {
            $rules['nama_anak'] = 'required|string|max:255';
            $rules['tempat_lahir_anak'] = 'required|string|max:100';
            $rules['tanggal_lahir_anak'] = 'required|date';
            $rules['jenis_kelamin_anak'] = 'required|in:Laki-laki,Perempuan';
            $rules['nama_ayah'] = 'required|string|max:255';
            $rules['nama_ibu'] = 'required|string|max:255';
        } elseif ($kategori === 'pindah_domisili') {
            $rules['alamat_tujuan'] = 'required|string';
            $rules['alasan_pindah'] = 'required|string|max:255';
            $rules['jumlah_anggota_pindah'] = 'required|integer|min:1';
        }

        $validated = $request->validate($rules, [
            'nik.digits_between' => 'NIK harus berjumlah 16 digit angka.',
            'no_kk.digits_between' => 'Nomor KK harus berjumlah 16 digit angka.',
            'file_dokumen.required' => 'Wajib mengunggah file berkas/gambar pendukung.',
            'file_dokumen.mimes' => 'Format file yang diperbolehkan adalah JPG, JPEG, PNG, atau PDF.',
            'file_dokumen.max' => 'Ukuran file maksimal adalah 5MB.',
        ]);

        // Upload berkas ke storage public
        $file = $request->file('file_dokumen');
        $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
        $filePath = $file->storeAs('dokumen/kependudukan', $fileName, 'public');

        // Susun detail data spesifik
        $detailData = [];
        if ($kategori === 'ktp') {
            $detailData = [
                'jenis_pengajuan' => $request->jenis_pengajuan,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
            ];
        } elseif ($kategori === 'kartu_keluarga') {
            $detailData = [
                'jenis_permohonan' => $request->jenis_permohonan,
                'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            ];
        } elseif ($kategori === 'akta_kelahiran') {
            $detailData = [
                'nama_anak' => $request->nama_anak,
                'tempat_lahir_anak' => $request->tempat_lahir_anak,
                'tanggal_lahir_anak' => $request->tanggal_lahir_anak,
                'jenis_kelamin_anak' => $request->jenis_kelamin_anak,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
            ];
        } elseif ($kategori === 'pindah_domisili') {
            $detailData = [
                'alamat_tujuan' => $request->alamat_tujuan,
                'alasan_pindah' => $request->alasan_pindah,
                'jumlah_anggota_pindah' => $request->jumlah_anggota_pindah,
            ];
        }

        $nomorRegistrasi = AdministrasiKependudukan::generateNomorRegistrasi($kategori);

        $record = AdministrasiKependudukan::create([
            'nomor_registrasi' => $nomorRegistrasi,
            'kategori' => $kategori,
            'nama_pemohon' => $request->nama_pemohon,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'rt_rw' => $request->rt_rw,
            'detail_data' => $detailData,
            'file_path' => $filePath,
            'file_name' => $file->getClientOriginalName(),
            'file_size' => $file->getSize(),
            'file_type' => $file->getClientMimeType(),
            'keterangan' => $request->keterangan,
            'status' => 'Menunggu Verifikasi',
        ]);

        return redirect()->route('layanan.kependudukan', ['#riwayat'])
            ->with('success', "Permohonan berhasil disimpan ke dalam sistem! Nomor Registrasi Anda: {$nomorRegistrasi}");
    }
}

