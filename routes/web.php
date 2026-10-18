<?php
use App\Http\Controllers\AdministrasiKependudukanController;
use App\Http\Controllers\PerizinanUsahaController;
use App\Http\Controllers\SuratKeteranganDesaController;
use App\Http\Controllers\TrackingLayananController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PerangkatDesaController;
use App\Models\Berita;
use App\Models\PerangkatDesa;
use Illuminate\Support\Facades\Route;

// auth controllers
use App\Http\Controllers\AuthController;

// admin controllers
use App\Http\Controllers\Admin\KependudukanController as AdminKependudukanController;
use App\Http\Controllers\Admin\SuratKeteranganController as AdminSuratKeteranganController;
use App\Http\Controllers\Admin\PerizinanUsahaController as AdminPerizinanUsahaController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/profil-desa', function () {
    return view('profil');
})->name('profil');

Route::get('/', function () {
    $beritaTerbaru = Berita::orderBy('created_at', 'desc')->take(3)->get();
    return view('welcome', compact('beritaTerbaru'));
})->name('home');

// Layanan Administrasi Kependudukan
Route::get('/administrasi-kependudukan', [AdministrasiKependudukanController::class, 'index'])
    ->name('layanan.kependudukan');
Route::post('/administrasi-kependudukan', [AdministrasiKependudukanController::class, 'store'])
    ->name('layanan.kependudukan.store');

// Layanan Surat Keterangan Desa 
Route::get('/surat-keterangan-desa', [SuratKeteranganDesaController::class, 'index'])
    ->name('layanan.surat-keterangan');
Route::post('/surat-keterangan-desa', [SuratKeteranganDesaController::class, 'store'])
    ->name('layanan.surat-keterangan.store');

// Layanan Perizinan Usaha
Route::get('/perizinan-usaha', [PerizinanUsahaController::class, 'index'])
    ->name('layanan.perizinan-usaha');
Route::post('/perizinan-usaha', [PerizinanUsahaController::class, 'store'])
    ->name('layanan.perizinan-usaha.store');

// Pusat Cek Status 
Route::get('/status-permohonan', [TrackingLayananController::class, 'index'])
    ->name('layanan.tracking');

// Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

// Perangkat Desa
Route::get('/', function () {
    $beritaTerbaru = Berita::latest()->take(3)->get();
    $perangkatList = PerangkatDesa::orderBy('urutan', 'asc')->get();
    return view('welcome', compact('beritaTerbaru', 'perangkatList'));

})->name('home');

// Kelola Perangkat Desa
Route::get('/admin/perangkat', [PerangkatDesaController::class, 'index'])->name('admin.perangkat.index');
Route::get('/admin/perangkat/create', [PerangkatDesaController::class, 'create'])->name('admin.perangkat.create');
Route::post('/admin/perangkat', [PerangkatDesaController::class, 'store'])->name('admin.perangkat.store');
Route::get('/admin/perangkat/{id}/edit', [PerangkatDesaController::class, 'edit'])->name('admin.perangkat.edit');
Route::put('/admin/perangkat/{id}', [PerangkatDesaController::class, 'update'])->name('admin.perangkat.update');
Route::delete('/admin/perangkat/{id}', [PerangkatDesaController::class, 'destroy'])->name('admin.perangkat.destroy');

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Admin Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::prefix('admin')->name('admin.')->group(function () {

        // Dasbor
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Manajemen Administrasi Kependudukan
        Route::get('/kependudukan', [AdminKependudukanController::class, 'index'])->name('kependudukan.index');
        Route::post('/kependudukan/{id}/status', [AdminKependudukanController::class, 'updateStatus'])->name('kependudukan.status');

        // Manajemen Surat Keterangan
        Route::get('/surat-keterangan', [AdminSuratKeteranganController::class, 'index'])->name('surat-keterangan.index');
        Route::post('/surat-keterangan/{id}/status', [AdminSuratKeteranganController::class, 'updateStatus'])->name('surat-keterangan.status');

        // Manajemen Perizinan Usaha
        Route::get('/perizinan-usaha', [AdminPerizinanUsahaController::class, 'index'])->name('perizinan-usaha.index');
        Route::post('/perizinan-usaha/{id}/status', [AdminPerizinanUsahaController::class, 'updateStatus'])->name('perizinan-usaha.status');

        // Manajemen Berita
        Route::get('/berita', [AdminBeritaController::class, 'index'])->name('berita.index');
        Route::post('/berita', [AdminBeritaController::class, 'store'])->name('berita.store');
        Route::delete('/berita/{id}', [AdminBeritaController::class, 'destroy'])->name('berita.destroy');

    });
});
