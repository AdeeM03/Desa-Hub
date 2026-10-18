@extends('layouts.app')

@section('title', 'Surat Keterangan Desa')

@section('content')
<div class="max-w-6xl mx-auto px-4 md:px-8 py-10">

    <!-- Header Section -->
    <div class="mb-10 text-center max-w-3xl mx-auto">
        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#D4F379]/10 border border-[#D4F379]/20 text-[#D4F379] text-xs font-semibold mb-4">
            <span class="w-2 h-2 rounded-full bg-[#D4F379] animate-pulse"></span>
            Layanan 02 &bull; Administrasi Desa
        </div>
        <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight mb-4">
            Surat Keterangan Desa
        </h1>
        <p class="text-gray-400 text-sm md:text-base leading-relaxed">
            Pengurusan surat pengantar dan keterangan resmi dari Pemerintah Desa Tebel secara online. Ajukan Surat Keterangan Tidak Mampu (SKTM), Pengantar SKCK, dan Surat Pengantar Nikah dengan mudah, transparan, dan terdata.
        </p>
    </div>

    <!-- Quick Stats Bar -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-10">
        <div class="glass-card p-4 rounded-2xl text-center">
            <span class="text-xs text-gray-400 font-medium">Total Surat Terdata</span>
            <p class="text-2xl font-bold text-white mt-1">{{ $totalSemua }}</p>
        </div>
        <div class="glass-card p-4 rounded-2xl text-center">
            <span class="text-xs text-gray-400 font-medium">SKTM</span>
            <p class="text-2xl font-bold text-emerald-400 mt-1">{{ $totalSktm }}</p>
        </div>
        <div class="glass-card p-4 rounded-2xl text-center">
            <span class="text-xs text-gray-400 font-medium">Pengantar SKCK</span>
            <p class="text-2xl font-bold text-sky-400 mt-1">{{ $totalSkck }}</p>
        </div>
        <div class="glass-card p-4 rounded-2xl text-center">
            <span class="text-xs text-gray-400 font-medium">Pengantar Nikah</span>
            <p class="text-2xl font-bold text-[#D4F379] mt-1">{{ $totalNikah }}</p>
        </div>
    </div>

    <!-- Tab Buttons -->
    <div class="flex flex-wrap gap-2 p-1.5 glass rounded-2xl mb-8 border border-white/10" id="tabsNav">
        <button type="button" onclick="switchTab('sktm')" id="tabBtn-sktm"
            class="tab-btn flex-1 min-w-[160px] py-3 px-4 rounded-xl text-xs md:text-sm font-semibold transition-all duration-200 flex items-center justify-center gap-2 bg-[#D4F379] text-gray-950 shadow-md">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span>SKTM (Tidak Mampu)</span>
        </button>

        <button type="button" onclick="switchTab('skck')" id="tabBtn-skck"
            class="tab-btn flex-1 min-w-[160px] py-3 px-4 rounded-xl text-xs md:text-sm font-semibold transition-all duration-200 flex items-center justify-center gap-2 text-gray-300 hover:text-white hover:bg-white/5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
            </svg>
            <span>Pengantar SKCK</span>
        </button>

        <button type="button" onclick="switchTab('surat_nikah')" id="tabBtn-surat_nikah"
            class="tab-btn flex-1 min-w-[160px] py-3 px-4 rounded-xl text-xs md:text-sm font-semibold transition-all duration-200 flex items-center justify-center gap-2 text-gray-300 hover:text-white hover:bg-white/5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
            <span>Surat Nikah (Pengantar)</span>
        </button>

        <button type="button" onclick="switchTab('riwayat')" id="tabBtn-riwayat"
            class="tab-btn flex-1 min-w-[160px] py-3 px-4 rounded-xl text-xs md:text-sm font-semibold transition-all duration-200 flex items-center justify-center gap-2 text-gray-300 hover:text-white hover:bg-white/5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
            <span>Data Terdata ({{ $totalSemua }})</span>
        </button>
    </div>

    <!-- FORM 1: SURAT KETERANGAN TIDAK MAMPU (SKTM) -->
    <div id="panel-sktm" class="tab-panel">
        <div class="glass-card rounded-3xl p-6 md:p-10 border border-white/10 relative overflow-hidden">
            <div class="border-b border-gray-800 pb-5 mb-8">
                <h3 class="text-xl md:text-2xl font-bold text-white flex items-center gap-3">
                    <span class="w-3 h-3 rounded-full bg-emerald-400"></span>
                    Formulir Surat Keterangan Tidak Mampu (SKTM)
                </h3>
                <p class="text-sm text-gray-400 mt-1">Layanan pengajuan SKTM untuk keperluan beasiswa pendidikan, keringanan biaya kesehatan/RS, bantuan sosial, atau keperluan kedinasan lainnya.</p>
            </div>

            <form action="{{ route('layanan.surat-keterangan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <input type="hidden" name="jenis_surat" value="sktm">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nama Lengkap Pemohon <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nama_pemohon" value="{{ old('nama_pemohon') }}" required placeholder="Nama lengkap sesuai KTP"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nomor Induk Kependudukan (NIK) <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16" minlength="16" required placeholder="16 Digit NIK"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Pekerjaan / Mata Pencaharian <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" required placeholder="Contoh: Buruh Harian Lepas / Pedagang Keliling"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Rata-Rata Penghasilan Bulanan <span class="text-[#D4F379]">*</span>
                        </label>
                        <select name="penghasilan_bulanan" required class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                            <option value="Di bawah Rp 1.000.000">Di bawah Rp 1.000.000</option>
                            <option value="Rp 1.000.000 - Rp 2.000.000">Rp 1.000.000 - Rp 2.000.000</option>
                            <option value="Rp 2.000.000 - Rp 3.000.000">Rp 2.000.000 - Rp 3.000.000</option>
                            <option value="Tidak Memiliki Penghasilan Tetap">Tidak Memiliki Penghasilan Tetap</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nomor WhatsApp / HP Aktif <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" required placeholder="08xxxxxxxxxx"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            RT / RW <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="rt_rw" value="{{ old('rt_rw') }}" placeholder="Contoh: RT 04 / RW 01"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Alamat Lengkap Pemohon <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="alamat" value="{{ old('alamat') }}" required placeholder="Jalan / Gang / No Rumah di Desa Tebel"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Tujuan / Keperluan Pembuatan SKTM <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="keperluan" value="{{ old('keperluan') }}" required placeholder="Contoh: Pengajuan Beasiswa KIP Kuliah / Keringanan Biaya Rawat Inap RSUD"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <!-- Upload File SKTM -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Upload File Surat Pengantar RT/RW / Foto Kondisi Rumah / Kartu Keluarga <span class="text-[#D4F379]">*</span>
                        </label>
                        <div class="border-2 border-dashed border-gray-700 rounded-2xl p-6 hover:border-emerald-400 transition bg-gray-900/50">
                            <div class="flex flex-col items-center justify-center text-center">
                                <svg class="w-10 h-10 text-emerald-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="text-sm text-gray-300 font-medium">Unggah Surat Pengantar RT atau Berkas Bukti Pendukung SKTM</p>
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
                        <textarea name="keterangan" rows="2" placeholder="Informasi tambahan mengenai tanggungan keluarga atau kondisi khusus..."
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">{{ old('keterangan') }}</textarea>
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-4 border-t border-gray-800">
                    <button type="reset" class="px-6 py-2.5 rounded-full border border-gray-700 text-sm font-semibold text-gray-400 hover:text-white hover:border-gray-500 transition">
                        Reset Form
                    </button>
                    <button type="submit" class="bg-emerald-400 text-gray-950 px-8 py-3 rounded-full text-sm font-bold hover:bg-emerald-300 transition shadow-lg shadow-emerald-400/10">
                        Kirim Permohonan SKTM &rarr;
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- FORM 2: SURAT KETERANGAN CATATAN KEPOLISIAN (SKCK) -->
    <div id="panel-skck" class="tab-panel hidden">
        <div class="glass-card rounded-3xl p-6 md:p-10 border border-white/10 relative overflow-hidden">
            <div class="border-b border-gray-800 pb-5 mb-8">
                <h3 class="text-xl md:text-2xl font-bold text-white flex items-center gap-3">
                    <span class="w-3 h-3 rounded-full bg-sky-400"></span>
                    Formulir Surat Pengantar Catatan Kepolisian (SKCK)
                </h3>
                <p class="text-sm text-gray-400 mt-1">Layanan pengajuan surat pengantar dari desa untuk pembuatan Surat Keterangan Catatan Kepolisian (SKCK) di Polsek / Polres Sidoarjo.</p>
            </div>

            <form action="{{ route('layanan.surat-keterangan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <input type="hidden" name="jenis_surat" value="skck">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nama Lengkap Pemohon <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nama_pemohon" value="{{ old('nama_pemohon') }}" required placeholder="Nama lengkap sesuai KTP"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nomor Induk Kependudukan (NIK) <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16" minlength="16" required placeholder="16 Digit NIK"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Tempat Lahir <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required placeholder="Kota tempat lahir"
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
                            Agama <span class="text-[#D4F379]">*</span>
                        </label>
                        <select name="agama" required class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                            <option value="Islam">Islam</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Khonghucu">Khonghucu</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Pendidikan Terakhir <span class="text-[#D4F379]">*</span>
                        </label>
                        <select name="pendidikan" required class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                            <option value="SMA / SMK / Sederajat">SMA / SMK / Sederajat</option>
                            <option value="Diploma (D3/D4)">Diploma (D3/D4)</option>
                            <option value="Sarjana (S1)">Sarjana (S1)</option>
                            <option value="Magister (S2)">Magister (S2)</option>
                            <option value="SMP / Sederajat">SMP / Sederajat</option>
                            <option value="SD / Sederajat">SD / Sederajat</option>
                        </select>
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
                                Alamat Domisili Desa Tebel <span class="text-[#D4F379]">*</span>
                            </label>
                            <input type="text" name="alamat" value="{{ old('alamat') }}" required placeholder="Alamat lengkap domisili"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                RT / RW
                            </label>
                            <input type="text" name="rt_rw" value="{{ old('rt_rw') }}" placeholder="Contoh: RT 02 / RW 03"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Keperluan Pembuatan SKCK <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="keperluan" value="{{ old('keperluan') }}" required placeholder="Contoh: Melamar Pekerjaan di PT / Seleksi BUMN / CPNS / Lanjut Kuliah"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <!-- Upload File SKCK -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Upload File Dokumen Persyaratan (KTP, KK, & Pas Foto Latar Merah) <span class="text-[#D4F379]">*</span>
                        </label>
                        <div class="border-2 border-dashed border-gray-700 rounded-2xl p-6 hover:border-sky-400 transition bg-gray-900/50">
                            <div class="flex flex-col items-center justify-center text-center">
                                <svg class="w-10 h-10 text-sky-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="text-sm text-gray-300 font-medium">Unggah Berkas File KTP, Kartu Keluarga, atau Pas Foto 4x6</p>
                                <p class="text-xs text-gray-500 mt-1">Format: PDF, JPG, atau PNG (Maksimal 5MB)</p>
                                <input type="file" name="file_dokumen" required accept=".pdf,.jpg,.jpeg,.png"
                                    class="mt-4 block w-full max-w-sm text-xs text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-sky-400 file:text-gray-950 hover:file:bg-sky-300 cursor-pointer">
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Catatan Tambahan
                        </label>
                        <textarea name="keterangan" rows="2" placeholder="Catatan atau permintaan khusus..."
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">{{ old('keterangan') }}</textarea>
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-4 border-t border-gray-800">
                    <button type="reset" class="px-6 py-2.5 rounded-full border border-gray-700 text-sm font-semibold text-gray-400 hover:text-white hover:border-gray-500 transition">
                        Reset Form
                    </button>
                    <button type="submit" class="bg-sky-400 text-gray-950 px-8 py-3 rounded-full text-sm font-bold hover:bg-sky-300 transition shadow-lg shadow-sky-400/10">
                        Kirim Permohonan Pengantar SKCK &rarr;
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- FORM 3: SURAT PENGANTAR NIKAH (SURAT NIKAH) -->
    <div id="panel-surat_nikah" class="tab-panel hidden">
        <div class="glass-card rounded-3xl p-6 md:p-10 border border-white/10 relative overflow-hidden">
            <div class="border-b border-gray-800 pb-5 mb-8">
                <h3 class="text-xl md:text-2xl font-bold text-white flex items-center gap-3">
                    <span class="w-3 h-3 rounded-full bg-[#D4F379]"></span>
                    Formulir Surat Pengantar Nikah (Model N1 - N4)
                </h3>
                <p class="text-sm text-gray-400 mt-1">Layanan penerbitan surat pengantar nikah dari Pemerintah Desa Tebel sebagai syarat pendaftaran pernikahan di Kantor Urusan Agama (KUA).</p>
            </div>

            <form action="{{ route('layanan.surat-keterangan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <input type="hidden" name="jenis_surat" value="surat_nikah">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nama Lengkap Calon Pengantin (Pemohon) <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nama_pemohon" value="{{ old('nama_pemohon') }}" required placeholder="Nama lengkap sesuai KTP"
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
                            Status Perkawinan Pemohon <span class="text-[#D4F379]">*</span>
                        </label>
                        <select name="status_pernikahan" required class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                            <option value="Jejaka">Jejaka (Belum Pernah Menikah)</option>
                            <option value="Perawan">Perawan (Belum Pernah Menikah)</option>
                            <option value="Duda">Duda</option>
                            <option value="Janda">Janda</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nomor WhatsApp / HP Aktif <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" required placeholder="08xxxxxxxxxx"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Nama Lengkap Calon Pasangan <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="nama_pasangan" value="{{ old('nama_pasangan') }}" required placeholder="Nama lengkap calon suami/istri"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            NIK Calon Pasangan
                        </label>
                        <input type="text" name="nik_pasangan" value="{{ old('nik_pasangan') }}" maxlength="16" placeholder="16 Digit NIK Calon Pasangan"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Rencana Tanggal Akad Nikah
                        </label>
                        <input type="date" name="tanggal_akad" value="{{ old('tanggal_akad') }}"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Alamat Calon Pasangan <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="alamat_pasangan" value="{{ old('alamat_pasangan') }}" required placeholder="Desa, Kecamatan, Kota/Kab calon pasangan"
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                Alamat Domisili Pemohon di Desa Tebel <span class="text-[#D4F379]">*</span>
                            </label>
                            <input type="text" name="alamat" value="{{ old('alamat') }}" required placeholder="Alamat rumah pemohon"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                RT / RW
                            </label>
                            <input type="text" name="rt_rw" value="{{ old('rt_rw') }}" placeholder="Contoh: RT 03 / RW 01"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Keperluan Surat <span class="text-[#D4F379]">*</span>
                        </label>
                        <input type="text" name="keperluan" value="{{ old('keperluan', 'Pengantar Pendaftaran Pernikahan di KUA') }}" required
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                    </div>

                    <!-- Upload File Surat Nikah -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Upload File Persyaratan Surat Nikah (KTP Pemohon & Calon Pasangan, KK, Akta Kelahiran/Ijazah) <span class="text-[#D4F379]">*</span>
                        </label>
                        <div class="border-2 border-dashed border-gray-700 rounded-2xl p-6 hover:border-[#D4F379] transition bg-gray-900/50">
                            <div class="flex flex-col items-center justify-center text-center">
                                <svg class="w-10 h-10 text-[#D4F379] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-sm text-gray-300 font-medium">Unggah Berkas File Dokumen Persyaratan Nikah</p>
                                <p class="text-xs text-gray-500 mt-1">Format: PDF, JPG, atau PNG (Maksimal 5MB)</p>
                                <input type="file" name="file_dokumen" required accept=".pdf,.jpg,.jpeg,.png"
                                    class="mt-4 block w-full max-w-sm text-xs text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-[#D4F379] file:text-gray-950 hover:file:bg-[#bce055] cursor-pointer">
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Catatan Tambahan
                        </label>
                        <textarea name="keterangan" rows="2" placeholder="Nama KUA tujuan, atau catatan penting lainnya..."
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">{{ old('keterangan') }}</textarea>
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-4 border-t border-gray-800">
                    <button type="reset" class="px-6 py-2.5 rounded-full border border-gray-700 text-sm font-semibold text-gray-400 hover:text-white hover:border-gray-500 transition">
                        Reset Form
                    </button>
                    <button type="submit" class="bg-[#D4F379] text-gray-950 px-8 py-3 rounded-full text-sm font-bold hover:bg-[#bce055] transition shadow-lg shadow-[#D4F379]/10">
                        Kirim Permohonan Surat Nikah &rarr;
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- TAB PANEL 4: DATA TERDATA DALAM SISTEM -->
    <div id="panel-riwayat" class="tab-panel hidden">
        <div class="glass-card rounded-3xl p-6 md:p-10 border border-white/10">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-gray-800 pb-6 mb-6">
                <div>
                    <h3 class="text-xl md:text-2xl font-bold text-white flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-[#D4F379]"></span>
                        Data Surat Keterangan Desa Terdata
                    </h3>
                    <p class="text-xs md:text-sm text-gray-400 mt-1">Daftar permohonan surat keterangan yang telah tersimpan dalam sistem DesaHub.</p>
                </div>

                <!-- Form Filter & Pencarian -->
                <form action="{{ route('layanan.surat-keterangan') }}" method="GET" class="flex flex-wrap items-center gap-2">
                    <input type="hidden" name="tab" value="riwayat">
                    <select name="jenis_surat" onchange="this.form.submit()" class="bg-gray-900 border border-gray-700 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-[#D4F379]">
                        <option value="">Semua Jenis Surat</option>
                        <option value="sktm" {{ request('jenis_surat') == 'sktm' ? 'selected' : '' }}>SKTM</option>
                        <option value="skck" {{ request('jenis_surat') == 'skck' ? 'selected' : '' }}>Pengantar SKCK</option>
                        <option value="surat_nikah" {{ request('jenis_surat') == 'surat_nikah' ? 'selected' : '' }}>Surat Nikah</option>
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
                            <th class="py-3 px-4">Jenis Surat</th>
                            <th class="py-3 px-4">Nama Pemohon & NIK</th>
                            <th class="py-3 px-4">Keperluan</th>
                            <th class="py-3 px-4">Waktu Terdata</th>
                            <th class="py-3 px-4">Berkas Upload</th>
                            <th class="py-3 px-4">Status</th>
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
                                        @if($item->jenis_surat == 'sktm') bg-emerald-500/10 text-emerald-400 border border-emerald-500/30
                                        @elseif($item->jenis_surat == 'skck') bg-sky-500/10 text-sky-400 border border-sky-500/30
                                        @else bg-[#D4F379]/10 text-[#D4F379] border border-[#D4F379]/30
                                        @endif">
                                        {{ $item->jenis_surat_label }}
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-medium text-white">{{ $item->nama_pemohon }}</div>
                                    <div class="text-xs text-gray-400 font-mono">NIK: {{ $item->nik }}</div>
                                </td>
                                <td class="py-4 px-4 text-xs text-gray-300 max-w-xs truncate" title="{{ $item->keperluan }}">
                                    {{ $item->keperluan }}
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
                                        <div class="text-[11px] text-gray-500 mt-1 truncate max-w-[140px]" title="{{ $item->file_name }}">
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
                                <td colspan="7" class="py-12 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="text-sm font-medium text-gray-400">Belum ada surat keterangan yang terdata.</p>
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
        document.querySelectorAll('.tab-panel').forEach(panel => {
            panel.classList.add('hidden');
        });

        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('bg-[#D4F379]', 'text-gray-950', 'shadow-md');
            btn.classList.add('text-gray-300', 'hover:text-white', 'hover:bg-white/5');
        });

        const activePanel = document.getElementById('panel-' + tabId);
        if (activePanel) {
            activePanel.classList.remove('hidden');
        }

        const activeBtn = document.getElementById('tabBtn-' + tabId);
        if (activeBtn) {
            activeBtn.classList.remove('text-gray-300', 'hover:text-white', 'hover:bg-white/5');
            activeBtn.classList.add('bg-[#D4F379]', 'text-gray-950', 'shadow-md');
        }

        history.replaceState(null, null, '#' + tabId);
    }

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

