@extends('layouts.app')

@section('title', 'Perizinan Usaha (UMKM)')

@section('content')
<div class="max-w-6xl mx-auto px-4 md:px-8 py-10">

    <!-- Header Section -->
    <div class="mb-10 text-center max-w-3xl mx-auto">
        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#D4F379]/10 border border-[#D4F379]/20 text-[#D4F379] text-xs font-semibold mb-4">
            <span class="w-2 h-2 rounded-full bg-[#D4F379] animate-pulse"></span>
            Layanan 03 &bull; Pemberdayaan UMKM Desa
        </div>
        <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight mb-4">
            Perizinan Usaha & Surat Keterangan Usaha
        </h1>
        <p class="text-gray-400 text-sm md:text-base leading-relaxed">
            Mendukung legalitas dan kemajuan usaha mikro, kecil, dan menengah (UMKM) warga Desa Tebel. Ajukan permohonan dan upload berkas Surat Keterangan Usaha (SKU) secara langsung ke dalam sistem database desa.
        </p>
    </div>

    <!-- Quick Stats Bar -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-10">
        <div class="glass-card p-4 rounded-2xl text-center">
            <span class="text-xs text-gray-400 font-medium">Total UMKM Terdata</span>
            <p class="text-2xl font-bold text-white mt-1">{{ $totalSemua }}</p>
        </div>
        <div class="glass-card p-4 rounded-2xl text-center">
            <span class="text-xs text-gray-400 font-medium">Sektor Kuliner</span>
            <p class="text-2xl font-bold text-[#D4F379] mt-1">{{ $totalKuliner }}</p>
        </div>
        <div class="glass-card p-4 rounded-2xl text-center">
            <span class="text-xs text-gray-400 font-medium">Sektor Kerajinan</span>
            <p class="text-2xl font-bold text-sky-400 mt-1">{{ $totalKerajinan }}</p>
        </div>
        <div class="glass-card p-4 rounded-2xl text-center">
            <span class="text-xs text-gray-400 font-medium">Jasa & Perdagangan</span>
            <p class="text-2xl font-bold text-emerald-400 mt-1">{{ $totalJasa }}</p>
        </div>
    </div>

    <!-- Tab Buttons -->
    <div class="flex flex-wrap gap-2 p-1.5 glass rounded-2xl mb-8 border border-white/10" id="tabsNav">
        <button type="button" onclick="switchTab('form')" id="tabBtn-form"
            class="tab-btn flex-1 min-w-[200px] py-3 px-4 rounded-xl text-xs md:text-sm font-semibold transition-all duration-200 flex items-center justify-center gap-2 bg-[#D4F379] text-gray-950 shadow-md">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            <span>Form & Upload Surat Keterangan Usaha (SKU)</span>
        </button>

        <button type="button" onclick="switchTab('riwayat')" id="tabBtn-riwayat"
            class="tab-btn flex-1 min-w-[200px] py-3 px-4 rounded-xl text-xs md:text-sm font-semibold transition-all duration-200 flex items-center justify-center gap-2 text-gray-300 hover:text-white hover:bg-white/5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
            <span>Data Usaha Terdata Dalam Sistem ({{ $totalSemua }})</span>
        </button>
    </div>

    <!-- TAB PANEL 1: FORMULIR SURAT KETERANGAN USAHA -->
    <div id="panel-form" class="tab-panel">
        <div class="glass-card rounded-3xl p-6 md:p-10 border border-white/10 relative overflow-hidden">
            <div class="border-b border-gray-800 pb-5 mb-8">
                <h3 class="text-xl md:text-2xl font-bold text-white flex items-center gap-3">
                    <span class="w-3 h-3 rounded-full bg-[#D4F379]"></span>
                    Formulir Permohonan Surat Keterangan Usaha (SKU)
                </h3>
                <p class="text-sm text-gray-400 mt-1">Lengkapi data usaha dan unggah file berkas Surat Keterangan Usaha / foto usaha Anda untuk verifikasi pemerintah desa.</p>
            </div>

            <form action="{{ route('layanan.perizinan-usaha.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Section: Data Pemilik Usaha -->
                <div class="bg-gray-900/60 p-5 rounded-2xl border border-gray-800 space-y-4">
                    <h4 class="text-sm font-bold text-[#D4F379] uppercase tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        1. Identitas Pemilik Usaha
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                Nama Lengkap Pemilik <span class="text-[#D4F379]">*</span>
                            </label>
                            <input type="text" name="nama_pemilik" value="{{ old('nama_pemilik') }}" required placeholder="Nama pemilik sesuai KTP"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                Nomor Induk Kependudukan (NIK) <span class="text-[#D4F379]">*</span>
                            </label>
                            <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16" minlength="16" required placeholder="16 Digit NIK Pemilik"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                Nomor WhatsApp / HP Aktif <span class="text-[#D4F379]">*</span>
                            </label>
                            <input type="text" name="no_hp" value="{{ old('no_hp') }}" required placeholder="Contoh: 081234567890"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>
                    </div>
                </div>

                <!-- Section: Informasi Usaha -->
                <div class="bg-gray-900/60 p-5 rounded-2xl border border-gray-800 space-y-4">
                    <h4 class="text-sm font-bold text-[#D4F379] uppercase tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        2. Informasi Usaha (UMKM)
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                Nama Usaha / Merk Dagang <span class="text-[#D4F379]">*</span>
                            </label>
                            <input type="text" name="nama_usaha" value="{{ old('nama_usaha') }}" required placeholder="Contoh: Bandeng Presto Bu Tebel / Anyaman Bambu Lestari"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                Bidang / Jenis Usaha <span class="text-[#D4F379]">*</span>
                            </label>
                            <select name="jenis_usaha" required class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                                <option value="Kuliner & Makanan Minuman">Kuliner & Makanan Minuman</option>
                                <option value="Kerajinan Tangan & Handycraft">Kerajinan Tangan & Handycraft</option>
                                <option value="Perdagangan / Toko Kelontong">Perdagangan / Toko Kelontong</option>
                                <option value="Jasa & Servis / Bengkel">Jasa & Servis / Bengkel</option>
                                <option value="Pertanian / Perikanan / Peternakan">Pertanian / Perikanan / Peternakan</option>
                                <option value="Konveksi / Busana & Fashion">Konveksi / Busana & Fashion</option>
                                <option value="Teknologi / Percetakan">Teknologi / Percetakan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                    Alamat Lokasi Usaha di Desa Tebel <span class="text-[#D4F379]">*</span>
                                </label>
                                <input type="text" name="alamat_usaha" value="{{ old('alamat_usaha') }}" required placeholder="Jalan, Gang, atau Dusun tempat usaha beroperasi"
                                    class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                    RT / RW Lokasi Usaha
                                </label>
                                <input type="text" name="rt_rw" value="{{ old('rt_rw') }}" placeholder="Contoh: RT 03 / RW 01"
                                    class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                Lama Usaha Berdiri
                            </label>
                            <input type="text" name="lama_usaha" value="{{ old('lama_usaha') }}" placeholder="Contoh: 2 Tahun / Sejak 2024"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                Jumlah Tenaga Kerja / Karyawan
                            </label>
                            <input type="number" name="jumlah_karyawan" min="0" value="{{ old('jumlah_karyawan', 1) }}" placeholder="Jumlah orang"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                                Keperluan Surat Keterangan Usaha <span class="text-[#D4F379]">*</span>
                            </label>
                            <input type="text" name="keperluan" value="{{ old('keperluan') }}" required placeholder="Contoh: Pengajuan KUR Bank BRI/Mandiri, Persyaratan Izin NIB, Bantuan Modal UMKM"
                                class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">
                        </div>
                    </div>
                </div>

                <!-- Section: Upload Berkas Surat Keterangan Usaha -->
                <div class="bg-gray-900/60 p-5 rounded-2xl border border-gray-800 space-y-4">
                    <h4 class="text-sm font-bold text-[#D4F379] uppercase tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        3. Upload Berkas Surat Keterangan Usaha & Dokumen Pendukung <span class="text-[#D4F379]">*</span>
                    </h4>

                    <div class="border-2 border-dashed border-gray-700 rounded-2xl p-6 hover:border-[#D4F379] transition bg-gray-900/50">
                        <div class="flex flex-col items-center justify-center text-center">
                            <svg class="w-12 h-12 text-[#D4F379] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p class="text-sm text-gray-200 font-semibold">Unggah File Surat Keterangan Usaha (SKU) / Foto Tempat Usaha / Pengantar RT</p>
                            <p class="text-xs text-gray-400 mt-1">Bisa berupa Dokumen (PDF) atau Foto/Gambar (JPG, PNG) &bull; Ukuran maksimal 5MB</p>
                            <input type="file" name="file_dokumen" required accept=".pdf,.jpg,.jpeg,.png"
                                class="mt-4 block w-full max-w-sm text-xs text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-[#D4F379] file:text-gray-950 hover:file:bg-[#bce055] cursor-pointer">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2 uppercase tracking-wider">
                            Keterangan / Deskripsi Produk & Usaha
                        </label>
                        <textarea name="keterangan" rows="2" placeholder="Jelaskan secara singkat produk unggulan atau aktivitas usaha Anda..."
                            class="w-full bg-gray-900/90 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[#D4F379]">{{ old('keterangan') }}</textarea>
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-4 border-t border-gray-800">
                    <button type="reset" class="px-6 py-2.5 rounded-full border border-gray-700 text-sm font-semibold text-gray-400 hover:text-white hover:border-gray-500 transition">
                        Reset Form
                    </button>
                    <button type="submit" class="bg-[#D4F379] text-gray-950 px-8 py-3 rounded-full text-sm font-bold hover:bg-[#bce055] transition shadow-lg shadow-[#D4F379]/10">
                        Kirim & Simpan ke Sistem &rarr;
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- TAB PANEL 2: DATA TERDATA DALAM SISTEM -->
    <div id="panel-riwayat" class="tab-panel hidden">
        <div class="glass-card rounded-3xl p-6 md:p-10 border border-white/10">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-gray-800 pb-6 mb-6">
                <div>
                    <h3 class="text-xl md:text-2xl font-bold text-white flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-[#D4F379]"></span>
                        Data Perizinan Usaha (UMKM) Terdata
                    </h3>
                    <p class="text-xs md:text-sm text-gray-400 mt-1">Daftar legalitas dan permohonan SKU warga yang telah terdaftar dalam sistem DesaHub.</p>
                </div>

                <!-- Form Filter & Pencarian -->
                <form action="{{ route('layanan.perizinan-usaha') }}" method="GET" class="flex items-center gap-2">
                    <input type="hidden" name="tab" value="riwayat">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama usaha / NIK / No Reg..."
                        class="bg-gray-900 border border-gray-700 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-[#D4F379]">
                    <button type="submit" class="bg-[#D4F379] text-gray-950 px-3 py-2 rounded-xl text-xs font-bold hover:bg-[#bce055] transition">
                        Cari
                    </button>
                </form>
            </div>

            <!-- Tabel Data Terdata -->
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-800 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                            <th class="py-3 px-4">No. Registrasi</th>
                            <th class="py-3 px-4">Nama Usaha & Bidang</th>
                            <th class="py-3 px-4">Pemilik Usaha & NIK</th>
                            <th class="py-3 px-4">Lokasi Usaha</th>
                            <th class="py-3 px-4">Berkas SKU Upload</th>
                            <th class="py-3 px-4">Waktu Terdata</th>
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
                                    <div class="font-bold text-white">{{ $item->nama_usaha }}</div>
                                    <span class="inline-flex items-center px-2 py-0.5 mt-1 rounded text-[11px] font-medium bg-[#D4F379]/10 text-[#D4F379] border border-[#D4F379]/30">
                                        {{ $item->jenis_usaha }}
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-medium text-white">{{ $item->nama_pemilik }}</div>
                                    <div class="text-xs text-gray-400 font-mono">NIK: {{ $item->nik }}</div>
                                    <div class="text-xs text-gray-500">WA: {{ $item->no_hp }}</div>
                                </td>
                                <td class="py-4 px-4 text-xs text-gray-300 max-w-xs truncate" title="{{ $item->alamat_usaha }}">
                                    {{ $item->alamat_usaha }}
                                    @if($item->rt_rw) ({{ $item->rt_rw }}) @endif
                                </td>
                                <td class="py-4 px-4">
                                    @if($item->file_path)
                                        <a href="{{ Storage::url($item->file_path) }}" target="_blank"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-xs text-[#D4F379] border border-gray-700 transition">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            <span>Lihat SKU</span>
                                        </a>
                                        <div class="text-[11px] text-gray-500 mt-1 truncate max-w-[140px]" title="{{ $item->file_name }}">
                                            {{ $item->file_name }}
                                        </div>
                                    @else
                                        <span class="text-xs text-gray-500">-</span>
                                    @endif
                                </td>
                                <td class="py-4 px-4 text-xs text-gray-400">
                                    {{ $item->created_at->format('d M Y, H:i') }} WIB
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
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                        <p class="text-sm font-medium text-gray-400">Belum ada perizinan usaha yang terdata.</p>
                                        <p class="text-xs text-gray-600 mt-1">Silakan mengisi form permohonan di atas untuk mendaftarkan usaha Anda.</p>
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

