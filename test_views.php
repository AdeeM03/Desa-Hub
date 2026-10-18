<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    echo "1. Testing welcome view: " . strlen(view('welcome')->render()) . " bytes\n";
    echo "2. Testing administrasi-kependudukan view: " . strlen(view('layanan.administrasi-kependudukan', [
        'submissions' => App\Models\AdministrasiKependudukan::paginate(10),
        'kategori' => null,
        'search' => null,
        'totalSemua' => 0,
        'totalKtp' => 0,
        'totalKk' => 0,
        'totalAkta' => 0,
        'totalPindah' => 0
    ])->render()) . " bytes\n";
    echo "3. Testing surat-keterangan view: " . strlen(view('layanan.surat-keterangan', [
        'submissions' => App\Models\SuratKeteranganDesa::paginate(10),
        'jenisSurat' => null,
        'search' => null,
        'totalSemua' => 0,
        'totalSktm' => 0,
        'totalSkck' => 0,
        'totalNikah' => 0
    ])->render()) . " bytes\n";
    echo "4. Testing perizinan-usaha view: " . strlen(view('layanan.perizinan-usaha', [
        'submissions' => App\Models\PerizinanUsaha::paginate(10),
        'search' => null,
        'totalSemua' => 0,
        'totalKuliner' => 0,
        'totalKerajinan' => 0,
        'totalJasa' => 0
    ])->render()) . " bytes\n";
    echo "5. Testing tracking view: " . strlen(view('layanan.tracking', [
        'keyword' => null,
        'hasilKependudukan' => collect(),
        'hasilSurat' => collect(),
        'hasilUsaha' => collect(),
        'totalKependudukan' => 0,
        'totalSurat' => 0,
        'totalUsaha' => 0
    ])->render()) . " bytes\n";
    echo "SUCCESS: ALL VIEWS COMPILED AND RENDERED PERFECTLY!\n";
} catch (\Throwable $e) {
    echo "ERROR: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine() . "\n";
    exit(1);
}

