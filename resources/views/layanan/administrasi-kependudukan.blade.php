@extends('layouts.app')
@section('title', 'Administrasi Kependudukan')
@section('content')
<div class="max-w-6xl mx-auto px-4 md:px-8 py-10">

    <!-- Header Section -->
    <div class="mb-10 text-center max-w-3xl mx-auto">
        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#D4F379]/10 border border-[#D4F379]/20 text-[#D4F379] text-xs font-semibold mb-4">
            <span class="w-2 h-2 rounded-full bg-[#D4F379] animate-pulse"></span>
            Layanan 01 &bull; Kependudukan Desa
        </div>
        <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight mb-4">
            Administrasi Kependudukan
        </h1>
        <p class="text-gray-400 text-sm md:text-base leading-relaxed">
            Formulir resmi pelayanan kependudukan Desa Tebel. Ajukan permohonan pengurusan KTP, Kartu Keluarga (KK), Akta Kelahiran, dan Surat Pindah Domisili dengan pengunggahan dokumen yang langsung terdata dalam sistem desa.
        </p>
    </div>

    <!-- Quick Stats Bar -->
    <div class="grid grid-cols-2 md:grid-cols-5 gap-3 mb-10">
        <div class="glass-card p-4 rounded-2xl text-center">
            <span class="text-xs text-gray-400 font-medium">Total Terdata</span>
            <p class="text-2xl font-bold text-white mt-1">{{ $totalSemua }}</p>
        </div>
        <div class="glass-card p-4 rounded-2xl text-center">
            <span class="text-xs text-gray-400 font-medium">Pengurusan KTP</span>
            <p class="text-2xl font-bold text-[#D4F379] mt-1">{{ $totalKtp }}</p>
        </div>
        <div class="glass-card p-4 rounded-2xl text-center">
            <span class="text-xs text-gray-400 font-medium">Kartu Keluarga</span>
            <p class="text-2xl font-bold text-sky-400 mt-1">{{ $totalKk }}</p>
        </div>
        <div class="glass-card p-4 rounded-2xl text-center">
            <span class="text-xs text-gray-400 font-medium">Akta Kelahiran</span>
            <p class="text-2xl font-bold text-emerald-400 mt-1">{{ $totalAkta }}</p>
        </div>
        <div class="glass-card p-4 rounded-2xl text-center col-span-2 md:col-span-1">
            <span class="text-xs text-gray-400 font-medium">Pindah Domisili</span>
            <p class="text-2xl font-bold text-amber-400 mt-1">{{ $totalPindah }}</p>
        </div>
    </div>

    <!-- Tab Buttons -->
    <div class="flex flex-wrap gap-2 p-1.5 glass rounded-2xl mb-8 border border-white/10" id="tabsNav">
        <button type="button" onclick="switchTab('ktp')" id="tabBtn-ktp"
            class="tab-btn flex-1 min-w-[140px] py-3 px-4 rounded-xl text-xs md:text-sm font-semibold transition-all duration-200 flex items-center justify-center gap-2 bg-[#D4F379] text-gray-950 shadow-md">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
            </svg>
            <span>Pengurusan KTP</span>
        </button>

        <button type="button" onclick="switchTab('kartu_keluarga')" id="tabBtn-kartu_keluarga"
            class="tab-btn flex-1 min-w-[140px] py-3 px-4 rounded-xl text-xs md:text-sm font-semibold transition-all duration-200 flex items-center justify-center gap-2 text-gray-300 hover:text-white hover:bg-white/5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <span>Kartu Keluarga (KK)</span>
        </button>

        <button type="button" onclick="switchTab('akta_kelahiran')" id="tabBtn-akta_kelahiran"
            class="tab-btn flex-1 min-w-[140px] py-3 px-4 rounded-xl text-xs md:text-sm font-semibold transition-all duration-200 flex items-center justify-center gap-2 text-gray-300 hover:text-white hover:bg-white/5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <span>Akta Kelahiran</span>
        </button>

        <button type="button" onclick="switchTab('pindah_domisili')" id="tabBtn-pindah_domisili"
            class="tab-btn flex-1 min-w-[140px] py-3 px-4 rounded-xl text-xs md:text-sm font-semibold transition-all duration-200 flex items-center justify-center gap-2 text-gray-300 hover:text-white hover:bg-white/5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
            </svg>
            <span>Pindah Domisili</span>
        </button>

        <button type="button" onclick="switchTab('riwayat')" id="tabBtn-riwayat"
            class="tab-btn flex-1 min-w-[140px] py-3 px-4 rounded-xl text-xs md:text-sm font-semibold transition-all duration-200 flex items-center justify-center gap-2 text-gray-300 hover:text-white hover:bg-white/5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
            <span>Data Terdata ({{ $totalSemua }})</span>
        </button>
    </div>

    <!-- FORM 1: PENGURUSAN KTP -->
    <div id="panel-ktp" class="tab-panel">
        <div class="glass-card rounded-3xl p-6 md:p-10 border border-white/10 relative overflow-hidden">
            <div class="border-b border-gray-800 pb-5 mb-8">
                <h3 class="text-xl md:text-2xl font-bold text-white flex items-center gap-3">
                    <span class="w-3 h-3 rounded-full bg-[#D4F379]"></span>
                    Formulir Permohonan Pengurusan KTP
                </h3>
                <p class="text-sm text-gray-400 mt-1">Layanan pengurusan KTP baru, perpanjangan, penggantian hilang/rusak, dan pembaruan data kependudukan.</p>
            </div>

            <form action="{{ route('layanan.kependudukan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <input type="hidden" name="kategori" value="ktp">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Jenis Pengajuan <span class="text-[#D4F379]">*</span>
                        </label>
                        <select name="jenis_pengajuan" required class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                            <option value="KTP Baru (Pemula 17 Tahun)">KTP Baru (Pemula 17 Tahun)</option>
                            <option value="Penggantian KTP Rusak">Penggantian KTP Rusak</option>
                            <option value="Penggantian KTP Hilang">Penggantian KTP Hilang (Surat Kehilangan)</option>
                            <option value="Perubahan Data Elemen KTP">Perubahan Data Elemen KTP</option>
                            <option value="Perekaman KTP Elektronik">Perekaman e-KTP Baru</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nama Lengkap (Sesuai Akta/KK) <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nama_pemohon" value="{{ old('nama_pemohon') }}" required placeholder="Contoh: Budi Santoso"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nomor Induk Kependudukan (NIK) <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16" minlength="16" required placeholder="16 Digit NIK Pemohon"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nomor Kartu Keluarga (KK)
                        </label>
                        <input type="text" name="no_kk" value="{{ old('no_kk') }}" maxlength="16" placeholder="16 Digit No. KK"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Tempat Lahir <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required placeholder="Contoh: Sidoarjo"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Tanggal Lahir <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Jenis Kelamin <span class="text-[#D4F379]">*</span>
                        </label>
                        <div class="flex gap-4 pt-2">
                            <label class="flex items-center gap-2 cursor-pointer text-sm text-gray-200">
                                <input type="radio" name="jenis_kelamin" value="Laki-laki" checked class="accent-[#D4F379]">
                                <span>Laki-laki</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer text-sm text-gray-200">
                                <input type="radio" name="jenis_kelamin" value="Perempuan" class="accent-[#D4F379]">
                                <span>Perempuan</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nomor WhatsApp / HP Aktif <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" required placeholder="Contoh: 081234567890"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                Alamat Lengkap Domisili <span class="text-[#D4F379]">*</span>
                            </label>
                            <input type="text" name="alamat" value="{{ old('alamat') }}" required placeholder="Nama jalan, gang, nomor rumah di Desa Tebel"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                RT / RW
                            </label>
                            <input type="text" name="rt_rw" value="{{ old('rt_rw') }}" placeholder="Contoh: RT 03 / RW 02"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>
                    </div>

                    <!-- Upload File / Dokumen KTP -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Upload Berkas / Foto Dokumen Pendukung (KK / Pas Foto / Surat Kehilangan) <span class="text-[#D4F379]">*</span>
                        </label>
                        <div class="border-2 border-dashed border-gray-700 rounded-2xl p-6 hover:border-[#D4F379] transition bg-gray-900/50">
                            <div class="flex flex-col items-center justify-center text-center">
                                <svg class="w-10 h-10 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="text-sm text-gray-300 font-medium">Unggah berkas foto KTP lama / Pas Foto / KK / Dokumen Pendukung</p>
                                <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, atau PDF (Maksimal 5MB)</p>
                                <input type="file" name="file_dokumen" required accept=".jpg,.jpeg,.png,.pdf"
                                    class="mt-4 block w-full max-w-sm text-xs text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-[#D4F379] file:text-gray-950 hover:file:bg-[#bce055] cursor-pointer">
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Catatan / Keterangan Tambahan
                        </label>
                        <textarea name="keterangan" rows="2" placeholder="Tuliskan keterangan permohonan atau instruksi tambahan..."
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">{{ old('keterangan') }}</textarea>
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-4 border-t border-gray-800">
                    <button type="reset" class="px-6 py-2.5 rounded-full border border-gray-700 text-sm font-semibold text-gray-400 hover:text-white hover:border-gray-500 transition">
                        Reset Form
                    </button>
                    <button type="submit" class="bg-[#D4F379] text-gray-950 px-8 py-3 rounded-full text-sm font-bold hover:bg-[#bce055] transition shadow-lg shadow-[#D4F379]/10">
                        Kirim Permohonan KTP &rarr;
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- FORM 2: KARTU KELUARGA (KK) -->
    <div id="panel-kartu_keluarga" class="tab-panel hidden">
        <div class="glass-card rounded-3xl p-6 md:p-10 border border-white/10 relative overflow-hidden">
            <div class="border-b border-gray-800 pb-5 mb-8">
                <h3 class="text-xl md:text-2xl font-bold text-white flex items-center gap-3">
                    <span class="w-3 h-3 rounded-full bg-sky-400"></span>
                    Formulir Permohonan Kartu Keluarga (KK)
                </h3>
                <p class="text-sm text-gray-400 mt-1">Layanan pengajuan pembuatan Kartu Keluarga baru, penambahan anggota keluarga, perubahan data, atau pecah kartu keluarga.</p>
            </div>

            <form action="{{ route('layanan.kependudukan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <input type="hidden" name="kategori" value="kartu_keluarga">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Jenis Permohonan KK <span class="text-[#D4F379]">*</span>
                        </label>
                        <select name="jenis_permohonan" required class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                            <option value="Penerbitan KK Baru (Pasangan Baru Menikah)">Penerbitan KK Baru (Pasangan Baru Menikah)</option>
                            <option value="Penambahan Anggota Keluarga (Kelahiran)">Penambahan Anggota Keluarga (Kelahiran)</option>
                            <option value="Pengurangan Anggota Keluarga (Kematian/Pindah)">Pengurangan Anggota Keluarga (Kematian/Pindah)</option>
                            <option value="Perubahan Data Elemen KK">Perubahan Data Elemen KK (Pendidikan/Pekerjaan/dsb)</option>
                            <option value="Pemisahan KK (Pecah KK Mandiri)">Pemisahan KK (Pecah KK Mandiri)</option>
                            <option value="Penggantian KK Hilang / Rusak">Penggantian KK Hilang / Rusak</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nama Kepala Keluarga <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nama_kepala_keluarga" value="{{ old('nama_kepala_keluarga') }}" required placeholder="Nama Kepala Keluarga"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nama Pemohon / Pelapor <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nama_pemohon" value="{{ old('nama_pemohon') }}" required placeholder="Nama Pelapor"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            NIK Pemohon / Pelapor <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16" minlength="16" required placeholder="16 Digit NIK"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nomor KK Lama (Jika Ada)
                        </label>
                        <input type="text" name="no_kk" value="{{ old('no_kk') }}" maxlength="16" placeholder="Nomor KK sebelumnya"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nomor WhatsApp / HP Aktif <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" required placeholder="08xxxxxxxxxx"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                Alamat Domisili Keluarga <span class="text-[#D4F379]">*</span>
                            </label>
                            <input type="text" name="alamat" value="{{ old('alamat') }}" required placeholder="Alamat rumah / domisili di Desa Tebel"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                RT / RW
                            </label>
                            <input type="text" name="rt_rw" value="{{ old('rt_rw') }}" placeholder="Contoh: RT 02 / RW 01"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>
                    </div>

                    <!-- Upload Gambar / File KK -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Upload Gambar / File Dokumen Kartu Keluarga / Buku Nikah / Surat Pendukung <span class="text-[#D4F379]">*</span>
                        </label>
                        <div class="border-2 border-dashed border-gray-700 rounded-2xl p-6 hover:border-sky-400 transition bg-gray-900/50">
                            <div class="flex flex-col items-center justify-center text-center">
                                <svg class="w-10 h-10 text-sky-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-sm text-gray-300 font-medium">Unggah Berkas KK Lama, Foto Buku Nikah, atau Surat Keterangan Pendukung</p>
                                <p class="text-xs text-gray-500 mt-1">Bisa berupa Gambar (JPG, PNG) atau Dokumen File (PDF) - Maksimal 5MB</p>
                                <input type="file" name="file_dokumen" required accept=".jpg,.jpeg,.png,.pdf"
                                    class="mt-4 block w-full max-w-sm text-xs text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-sky-400 file:text-gray-950 hover:file:bg-sky-300 cursor-pointer">
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Keterangan Tambahan
                        </label>
                        <textarea name="keterangan" rows="2" placeholder="Keterangan anggota keluarga baru atau catatan elemen yang dirubah..."
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">{{ old('keterangan') }}</textarea>
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-4 border-t border-gray-800">
                    <button type="reset" class="px-6 py-2.5 rounded-full border border-gray-700 text-sm font-semibold text-gray-400 hover:text-white hover:border-gray-500 transition">
                        Reset Form
                    </button>
                    <button type="submit" class="bg-sky-400 text-gray-950 px-8 py-3 rounded-full text-sm font-bold hover:bg-sky-300 transition shadow-lg shadow-sky-400/10">
                        Kirim Permohonan KK &rarr;
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- FORM 3: AKTA KELAHIRAN -->
    <div id="panel-akta_kelahiran" class="tab-panel hidden">
        <div class="glass-card rounded-3xl p-6 md:p-10 border border-white/10 relative overflow-hidden">
            <div class="border-b border-gray-800 pb-5 mb-8">
                <h3 class="text-xl md:text-2xl font-bold text-white flex items-center gap-3">
                    <span class="w-3 h-3 rounded-full bg-emerald-400"></span>
                    Formulir Permohonan Akta Kelahiran
                </h3>
                <p class="text-sm text-gray-400 mt-1">Layanan penerbitan Akta Kelahiran bagi anak baru lahir atau warga yang belum memiliki akta kelahiran resmi.</p>
            </div>

            <form action="{{ route('layanan.kependudukan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <input type="hidden" name="kategori" value="akta_kelahiran">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nama Lengkap Bayi / Anak <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nama_anak" value="{{ old('nama_anak') }}" required placeholder="Nama lengkap anak"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Jenis Kelamin Anak <span class="text-[#D4F379]">*</span>
                        </label>
                        <div class="flex gap-4 pt-2">
                            <label class="flex items-center gap-2 cursor-pointer text-sm text-gray-200">
                                <input type="radio" name="jenis_kelamin_anak" value="Laki-laki" checked class="accent-[#D4F379]">
                                <span>Laki-laki</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer text-sm text-gray-200">
                                <input type="radio" name="jenis_kelamin_anak" value="Perempuan" class="accent-[#D4F379]">
                                <span>Perempuan</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Tempat Lahir Anak <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="tempat_lahir_anak" value="{{ old('tempat_lahir_anak') }}" required placeholder="Contoh: RS Siti Hajar Sidoarjo"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Tanggal Lahir Anak <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="date" name="tanggal_lahir_anak" value="{{ old('tanggal_lahir_anak') }}" required
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nama Lengkap Ayah Kandung <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" required placeholder="Nama Ayah"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nama Lengkap Ibu Kandung <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" required placeholder="Nama Ibu"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nama Pemohon / Pelapor <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nama_pemohon" value="{{ old('nama_pemohon') }}" required placeholder="Nama orang tua / pelapor"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            NIK Pemohon / Pelapor <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16" minlength="16" required placeholder="16 Digit NIK"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nomor KK Pemohon <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="no_kk" value="{{ old('no_kk') }}" maxlength="16" placeholder="Nomor KK Orang Tua"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nomor WhatsApp / HP Aktif <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" required placeholder="08xxxxxxxxxx"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                Alamat Orang Tua <span class="text-[#D4F379]">*</span>
                            </label>
                            <input type="text" name="alamat" value="{{ old('alamat') }}" required placeholder="Alamat rumah di Desa Tebel"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                RT / RW
                            </label>
                            <input type="text" name="rt_rw" value="{{ old('rt_rw') }}" placeholder="Contoh: RT 01 / RW 04"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>
                    </div>

                    <!-- Upload File Akta Kelahiran -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Upload File Dokumen Persyaratan (Surat Lahir RS/Bidan, Buku Nikah Orang Tua, KK) <span class="text-[#D4F379]">*</span>
                        </label>
                        <div class="border-2 border-dashed border-gray-700 rounded-2xl p-6 hover:border-emerald-400 transition bg-gray-900/50">
                            <div class="flex flex-col items-center justify-center text-center">
                                <svg class="w-10 h-10 text-emerald-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="text-sm text-gray-300 font-medium">Unggah Surat Keterangan Lahir (Rumah Sakit/Puskesmas/Bidan) atau Berkas Pendukung</p>
                                <p class="text-xs text-gray-500 mt-1">Format: PDF, JPG, atau PNG (Maksimal 5MB)</p>
                                <input type="file" name="file_dokumen" required accept=".pdf,.jpg,.jpeg,.png"
                                    class="mt-4 block w-full max-w-sm text-xs text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-emerald-400 file:text-gray-950 hover:file:bg-emerald-300 cursor-pointer">
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Catatan Tambahan
                        </label>
                        <textarea name="keterangan" rows="2" placeholder="Catatan anak ke-berapa, status kelahiran, atau hal penting lainnya..."
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">{{ old('keterangan') }}</textarea>
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-4 border-t border-gray-800">
                    <button type="reset" class="px-6 py-2.5 rounded-full border border-gray-700 text-sm font-semibold text-gray-400 hover:text-white hover:border-gray-500 transition">
                        Reset Form
                    </button>
                    <button type="submit" class="bg-emerald-400 text-gray-950 px-8 py-3 rounded-full text-sm font-bold hover:bg-emerald-300 transition shadow-lg shadow-emerald-400/10">
                        Kirim Permohonan Akta Kelahiran &rarr;
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- FORM 4: SURAT PINDAH DOMISILI WARGA -->
    <div id="panel-pindah_domisili" class="tab-panel hidden">
        <div class="glass-card rounded-3xl p-6 md:p-10 border border-white/10 relative overflow-hidden">
            <div class="border-b border-gray-800 pb-5 mb-8">
                <h3 class="text-xl md:text-2xl font-bold text-white flex items-center gap-3">
                    <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                    Formulir Surat Pindah Domisili Warga
                </h3>
                <p class="text-sm text-gray-400 mt-1">Layanan penerbitan Surat Pengantar Pindah Domisili Keluar dari wilayah Desa Tebel ke daerah lain (Antar Desa, Kecamatan, Kab/Kota, atau Provinsi).</p>
            </div>

            <form action="{{ route('layanan.kependudukan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <input type="hidden" name="kategori" value="pindah_domisili">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nama Lengkap Pemohon <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nama_pemohon" value="{{ old('nama_pemohon') }}" required placeholder="Nama lengkap kepala/pemohon pindah"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            NIK Pemohon <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16" minlength="16" required placeholder="16 Digit NIK Pemohon"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nomor Kartu Keluarga (KK) <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="no_kk" value="{{ old('no_kk') }}" maxlength="16" placeholder="16 Digit Nomor KK"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nomor WhatsApp / HP Aktif <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" required placeholder="08xxxxxxxxxx"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                Alamat Domisili Asal (Desa Tebel) <span class="text-[#D4F379]">*</span>
                            </label>
                            <input type="text" name="alamat" value="{{ old('alamat') }}" required placeholder="Alamat lengkap asal di Desa Tebel"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                RT / RW Asal
                            </label>
                            <input type="text" name="rt_rw" value="{{ old('rt_rw') }}" placeholder="Contoh: RT 05 / RW 02"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Alamat Lengkap Tujuan Pindah <span class="text-[#D4F379]">*</span>
                        </label>
                        <textarea name="alamat_tujuan" rows="2" required placeholder="Tuliskan jalan, RT/RW, Dusun/Kelurahan, Kecamatan, Kabupaten/Kota, dan Provinsi tujuan pindah secara lengkap..."
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">{{ old('alamat_tujuan') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Alasan Pindah Domisili <span class="text-[#D4F379]">*</span>
                        </label>
                        <select name="alasan_pindah" required class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                            <option value="Pekerjaan / Dinas">Pekerjaan / Dinas</option>
                            <option value="Pendidikan / Studi">Pendidikan / Studi</option>
                            <option value="Pernikahan / Mengikuti Suami-Istri">Pernikahan / Mengikuti Suami-Istri</option>
                            <option value="Keluarga / Mengikuti Orang Tua">Keluarga / Mengikuti Orang Tua</option>
                            <option value="Perumahan Sendiri">Pindah ke Rumah Baru Sendiri</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Jumlah Anggota Keluarga yang Pindah <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="number" name="jumlah_anggota_pindah" min="1" max="20" value="{{ old('jumlah_anggota_pindah', 1) }}" required
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <!-- Upload File Berkas Pindah Domisili -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Upload File Berkas Persyaratan Pindah (KTP, KK, & Surat Pengantar RT/RW) <span class="text-[#D4F379]">*</span>
                        </label>
                        <div class="border-2 border-dashed border-gray-700 rounded-2xl p-6 hover:border-amber-400 transition bg-gray-900/50">
                            <div class="flex flex-col items-center justify-center text-center">
                                <svg class="w-10 h-10 text-amber-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path>
                                </svg>
                                <p class="text-sm text-gray-300 font-medium">Unggah Berkas File Kartu Keluarga, KTP, atau Surat Pengantar RT Asal</p>
                                <p class="text-xs text-gray-500 mt-1">Format: PDF, JPG, atau PNG (Maksimal 5MB)</p>
                                <input type="file" name="file_dokumen" required accept=".pdf,.jpg,.jpeg,.png"
                                    class="mt-4 block w-full max-w-sm text-xs text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-amber-400 file:text-gray-950 hover:file:bg-amber-300 cursor-pointer">
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Catatan / Nama-Nama Anggota yang Ikut Pindah
                        </label>
                        <textarea name="keterangan" rows="2" placeholder="Sebutkan nama dan NIK anggota keluarga yang ikut pindah (bila lebih dari 1 orang)..."
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">{{ old('keterangan') }}</textarea>
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-4 border-t border-gray-800">
                    <button type="reset" class="px-6 py-2.5 rounded-full border border-gray-700 text-sm font-semibold text-gray-400 hover:text-white hover:border-gray-500 transition">
                        Reset Form
                    </button>
                    <button type="submit" class="bg-amber-400 text-gray-950 px-8 py-3 rounded-full text-sm font-bold hover:bg-amber-300 transition shadow-lg shadow-amber-400/10">
                        Kirim Permohonan Surat Pindah &rarr;
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- TAB PANEL 5: DATA TERDATA DALAM SISTEM -->
    <div id="panel-riwayat" class="tab-panel hidden">
        <div class="glass-card rounded-3xl p-6 md:p-10 border border-white/10">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-gray-800 pb-6 mb-6">
                <div>
                    <h3 class="text-xl md:text-2xl font-bold text-white flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-[#D4F379]"></span>
                        Data Permohonan Kependudukan Terdata
                    </h3>
                    <p class="text-xs md:text-sm text-gray-400 mt-1">Daftar permohonan yang telah tersimpan dalam database sistem DesaHub.</p>
                </div>

                <!-- Form Filter & Pencarian -->
                <form action="{{ route('layanan.kependudukan') }}" method="GET" class="flex flex-wrap items-center gap-2">
                    <input type="hidden" name="tab" value="riwayat">
                    <select name="kategori" onchange="this.form.submit()" class="bg-gray-900 border border-gray-700 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-[#D4F379]">
                        <option value="">Semua Kategori</option>
                        <option value="ktp" {{ request('kategori') == 'ktp' ? 'selected' : '' }}>KTP</option>
                        <option value="kartu_keluarga" {{ request('kategori') == 'kartu_keluarga' ? 'selected' : '' }}>Kartu Keluarga</option>
                        <option value="akta_kelahiran" {{ request('kategori') == 'akta_kelahiran' ? 'selected' : '' }}>Akta Kelahiran</option>
                        <option value="pindah_domisili" {{ request('kategori') == 'pindah_domisili' ? 'selected' : '' }}>Pindah Domisili</option>
                    </select>
                    <div class="flex items-center gap-1">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari NIK / No Reg..."
                            class="bg-gray-900 border border-gray-700 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-[#D4F379]">
                        <button type="submit" class="bg-[#D4F379] text-gray-950 px-3 py-2 rounded-xl text-xs font-bold hover:bg-[#bce055] transition">
                            Cari
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabel Data Terdata -->
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-800 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                            <th class="py-3 px-4">No. Registrasi</th>
                            <th class="py-3 px-4">Kategori Layanan</th>
                            <th class="py-3 px-4">Nama Pemohon & NIK</th>
                            <th class="py-3 px-4">Waktu Terdata</th>
                            <th class="py-3 px-4">Berkas Upload</th>
                            <th class="py-3 px-4">Status Sistem</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800/60 text-sm">
                        @forelse($submissions as $item)
                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-4 px-4 font-mono font-bold text-xs text-[#D4F379]">
                                    {{ $item->nomor_registrasi }}
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                        @if($item->kategori == 'ktp') bg-[#D4F379]/10 text-[#D4F379] border border-[#D4F379]/30
                                        @elseif($item->kategori == 'kartu_keluarga') bg-sky-500/10 text-sky-400 border border-sky-500/30
                                        @elseif($item->kategori == 'akta_kelahiran') bg-emerald-500/10 text-emerald-400 border border-emerald-500/30
                                        @else bg-amber-500/10 text-amber-400 border border-amber-500/30
                                        @endif">
                                        {{ $item->kategori_label }}
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-medium text-white">{{ $item->nama_pemohon }}</div>
                                    <div class="text-xs text-gray-400 font-mono">NIK: {{ $item->nik }}</div>
                                    @if($item->no_hp)
                                        <div class="text-xs text-gray-500">WA: {{ $item->no_hp }}</div>
                                    @endif
                                </td>
                                <td class="py-4 px-4 text-xs text-gray-400">
                                    {{ $item->created_at->format('d M Y, H:i') }} WIB
                                </td>
                                <td class="py-4 px-4">
                                    @if($item->file_path)
                                        <a href="{{ Storage::url($item->file_path) }}" target="_blank"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-xs text-[#D4F379] border border-gray-700 transition">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            <span>Lihat Berkas</span>
                                        </a>
                                        <div class="text-[11px] text-gray-500 mt-1 truncate max-w-[150px]" title="{{ $item->file_name }}">
                                            {{ $item->file_name }}
                                        </div>
                                    @else
                                        <span class="text-xs text-gray-500">-</span>
                                    @endif
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                        {{ $item->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="text-sm font-medium text-gray-400">Belum ada permohonan yang terdata.</p>
                                        <p class="text-xs text-gray-600 mt-1">Silakan mengisi formulir di atas untuk mengajukan permohonan baru.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $submissions->links() }}
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function switchTab(tabId) {
        // Hide all panels
        document.querySelectorAll('.tab-panel').forEach(panel => {
            panel.classList.add('hidden');
        });

        // Reset button styles
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('bg-[#D4F379]', 'text-gray-950', 'shadow-md');
            btn.classList.add('text-gray-300', 'hover:text-white', 'hover:bg-white/5');
        });

        // Show target panel
        const activePanel = document.getElementById('panel-' + tabId);
        if (activePanel) {
            activePanel.classList.remove('hidden');
        }

        // Active button style
        const activeBtn = document.getElementById('tabBtn-' + tabId);
        if (activeBtn) {
            activeBtn.classList.remove('text-gray-300', 'hover:text-white', 'hover:bg-white/5');
            activeBtn.classList.add('bg-[#D4F379]', 'text-gray-950', 'shadow-md');
        }

        // Optional update hash
        history.replaceState(null, null, '#' + tabId);
    }

    // Auto open tab from URL hash or query params
    document.addEventListener('DOMContentLoaded', () => {
        const hash = window.location.hash.replace('#', '');
        const urlParams = new URLSearchParams(window.location.search);
        const tabParam = urlParams.get('tab') || hash;

        if (tabParam && document.getElementById('panel-' + tabParam)) {
            switchTab(tabParam);
        }
    });
</script>
@endpush

