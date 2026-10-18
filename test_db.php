<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\AdministrasiKependudukan;
use App\Models\SuratKeteranganDesa;
use App\Models\PerizinanUsaha;

echo "--- TESTING MODELS & DATABASE ---\n";

// 1. Test AdministrasiKependudukan
$adm = AdministrasiKependudukan::create([
    'nomor_registrasi' => AdministrasiKependudukan::generateNomorRegistrasi('ktp'),
    'kategori' => 'ktp',
    'nama_pemohon' => 'Budi Santoso',
    'nik' => '3515081234560001',
    'no_kk' => '3515081234560002',
    'no_hp' => '081234567890',
    'alamat' => 'Jl. Kenanga No. 12, RT 02 / RW 01',
    'rt_rw' => 'RT 02 / RW 01',
    'detail_data' => [
        'jenis_pengajuan' => 'KTP Baru (Pemula 17 Tahun)',
        'tempat_lahir' => 'Sidoarjo',
        'tanggal_lahir' => '2009-05-14',
        'jenis_kelamin' => 'Laki-laki',
    ],
    'file_path' => 'dokumen/kependudukan/sample_ktp.jpg',
    'file_name' => 'sample_ktp.jpg',
    'file_size' => 102400,
    'file_type' => 'image/jpeg',
    'keterangan' => 'Pengajuan KTP pertama kali',
    'status' => 'Menunggu Verifikasi',
]);
echo "Created Kependudukan: " . $adm->nomor_registrasi . " (ID: " . $adm->id . ")\n";

// 2. Test SuratKeteranganDesa
$skd = SuratKeteranganDesa::create([
    'nomor_registrasi' => SuratKeteranganDesa::generateNomorRegistrasi('sktm'),
    'jenis_surat' => 'sktm',
    'nama_pemohon' => 'Siti Aminah',
    'nik' => '3515081234560003',
    'no_hp' => '081987654321',
    'alamat' => 'Jl. Mawar RT 01 / RW 03',
    'rt_rw' => 'RT 01 / RW 03',
    'keperluan' => 'Permohonan Keringanan Biaya Kuliah (KIP-K)',
    'detail_data' => [
        'pekerjaan' => 'Buruh Harian',
        'penghasilan_bulanan' => 'Di bawah Rp 1.000.000',
    ],
    'file_path' => 'dokumen/surat-keterangan/sample_sktm.pdf',
    'file_name' => 'sample_sktm.pdf',
    'file_size' => 204800,
    'file_type' => 'application/pdf',
    'keterangan' => 'Untuk anak pertama kuliah semester 1',
    'status' => 'Menunggu Verifikasi',
]);
echo "Created Surat Keterangan: " . $skd->nomor_registrasi . " (ID: " . $skd->id . ")\n";

// 3. Test PerizinanUsaha
$sku = PerizinanUsaha::create([
    'nomor_registrasi' => PerizinanUsaha::generateNomorRegistrasi(),
    'nama_pemilik' => 'Ahmad Fauzi',
    'nik' => '3515081234560004',
    'no_hp' => '081333444555',
    'nama_usaha' => 'Bandeng Presto Tebel Berkah',
    'jenis_usaha' => 'Kuliner & Makanan Minuman',
    'alamat_usaha' => 'Jl. Raya Tebel No. 45',
    'rt_rw' => 'RT 04 / RW 02',
    'lama_usaha' => '3 Tahun',
    'jumlah_karyawan' => 4,
    'keperluan' => 'Pengajuan KUR BRI untuk modal penambahan alat presto',
    'file_path' => 'dokumen/perizinan-usaha/sample_sku.pdf',
    'file_name' => 'sample_sku.pdf',
    'file_size' => 150000,
    'file_type' => 'application/pdf',
    'keterangan' => 'Usaha telah beroperasi aktif setiap hari',
    'status' => 'Menunggu Verifikasi',
]);
echo "Created Perizinan Usaha: " . $sku->nomor_registrasi . " (ID: " . $sku->id . ")\n";

echo "ALL MODELS AND DATABASE TESTS PASSED!\n";


// 4. Test Tracking Controller
$req = Illuminate\Http\Request::create('/status-permohonan', 'GET', ['keyword' => '3515081234560001']);
$view = app(App\Http\Controllers\TrackingLayananController::class)->index($req);
echo "Tracking view rendered: " . strlen($view->render()) . " bytes\n";
echo "TRACKING CONTROLLER TEST PASSED!\n";
