<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DesaHub - Desa Tebel</title>
    <!-- Memanggil Tailwind CSS via CDN untuk kemudahan development awal -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Kelas custom untuk efek kaca (glassmorphism) */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body class="bg-gray-900 text-white antialiased">

    <!-- SECTION 1: HERO & NAVBAR -->
    <!-- Background dari Hero Section (menggunakan placeholder gambar pemandangan) -->
    <section class="relative w-full h-screen bg-cover bg-center flex flex-col" style="background-image: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        
        <!-- Overlay gelap agar teks tetap terbaca di atas gambar -->
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        <!-- Navbar (Bentuk Pill & Efek Kaca) -->
        <nav class="relative z-10 glass mx-auto mt-6 px-6 py-4 rounded-full flex justify-between items-center w-11/12 md:w-3/4 max-w-5xl">
            <div class="flex items-center gap-2">
                <!-- Logo DesaHub -->
                <span class="text-xl font-bold tracking-wider">DesaHub<span class="text-[#D4F379]">.</span></span>
            </div>
            
            <!-- Menu Navigasi (Sembunyi di HP, muncul di layar sedang/besar) -->
            <ul class="hidden md:flex gap-6 lg:gap-8 text-sm font-medium text-gray-200">
                <li><a href="{{ route('home') }}" class="text-[#D4F379] font-semibold">Beranda</a></li>
                <li><a href="#profil" class="hover:text-white transition">Profil</a></li>
                <li><a href="#berita" class="hover:text-white transition">Berita</a></li>
                <li><a href="#layanan" class="hover:text-white transition">Layanan</a></li>
                <li><a href="{{ route('login') }}" class="hover:text-[#D4F379] transition">Login</a></li>
            </ul>

            <!-- Tombol Action -->
            <a href="{{ route('layanan.tracking') }}" class="bg-[#D4F379] text-gray-900 px-5 py-2 rounded-full text-sm font-bold hover:bg-[#bce055] transition shadow-lg shadow-[#D4F379]/10">
                Lacak Dokumen
            </a>
        </nav>

        <!-- Konten Teks Utama -->
        <div class="relative z-10 flex-grow flex flex-col items-center justify-center text-center px-4">
            <!-- Label kecil di atas judul -->
            <div class="flex items-center gap-2 mb-4">
                <span class="w-2 h-2 rounded-full bg-[#D4F379]"></span>
                <span class="text-sm md:text-base font-semibold text-gray-200">Portal Informasi Desa Tebel</span>
            </div>
            
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-semibold leading-tight mb-6 max-w-4xl tracking-tight">
                Layanan Cerdas Membangun Masa Depan Desa
            </h1>
            
            <p class="text-sm md:text-lg text-gray-300 mb-10 max-w-2xl">
                Akses mudah dan terpusat untuk layanan administrasi, berita terkini, pariwisata, dan potensi UMKM masyarakat Desa Tebel, Kabupaten Sidoarjo.
            </p>
            
            <a href="#jelajah" class="bg-[#D4F379] text-gray-900 px-8 py-3 rounded-full font-bold text-lg hover:bg-[#bce055] transition">
                Jelajahi Sekarang
            </a>
        </div>

        <!-- Floating Card di Kanan Bawah (Meniru referensi Redient) -->
        <div class="absolute bottom-8 right-8 z-10 glass p-5 rounded-xl hidden md:block max-w-[250px]">
            <h3 class="text-sm font-bold text-white mb-2">Pusat Layanan</h3>
            <p class="text-xs text-gray-300">Balai Desa buka Senin - Jumat <br> 08.00 - 15.00 WIB.</p>
            <a href="#layanan" class="text-xs text-[#D4F379] mt-3 inline-block hover:underline">Lihat Detail &rarr;</a>
        </div>

    </section>

    <!-- SECTION 2: PROFIL DESA & STATISTIK -->
    <section id="profil" class="py-24 px-6 bg-[#0f1115]">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
    
            <!-- Kolom Kiri: Teks Profil -->
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                    <span class="text-sm font-semibold text-gray-400 uppercase tracking-widest">Tentang Desa Tebel</span>
                </div>
    
                <h2 class="text-3xl md:text-5xl font-medium text-white leading-tight mb-6">
                    Membangun komunitas mandiri, inovatif, dan berkelanjutan.
                </h2>
    
                <p class="text-gray-400 mb-8 leading-relaxed text-lg">
                    Desa Tebel merupakan desa yang terus berinovasi dalam mengelola potensi sumber daya alam dan sumber daya
                    manusianya. Melalui DesaHub, kami berkomitmen menghadirkan transparansi informasi dan kemudahan
                    pelayanan bagi seluruh lapisan masyarakat.
                </p>
            </div>
    
            <!-- Kolom Kanan: Grid Statistik -->
            <!-- Menggunakan border atas (border-t) dan pembatas abu-abu gelap agar terlihat seperti tabel modern di referensi -->
            <div class="grid grid-cols-2 gap-8 lg:gap-12 border-t border-gray-800 pt-8 lg:border-t-0 lg:pt-0">
    
                <!-- Stat 1 -->
                <div class="border-b border-gray-800 pb-6 lg:border-none lg:pb-0">
                    <h3 class="text-4xl md:text-5xl font-light text-white mb-2">5,000+</h3>
                    <p class="text-sm text-gray-400 font-medium">Total Penduduk (Jiwa)</p>
                </div>
    
                <!-- Stat 2 -->
                <div class="border-b border-gray-800 pb-6 lg:border-none lg:pb-0">
                    <h3 class="text-4xl md:text-5xl font-light text-white mb-2">32</h3>
                    <p class="text-sm text-gray-400 font-medium">Rukun Tetangga (RT)</p>
                </div>
    
                <!-- Stat 3 -->
                <div>
                    <h3 class="text-4xl md:text-5xl font-light text-white mb-2">120+</h3>
                    <p class="text-sm text-gray-400 font-medium">UMKM & Usaha Warga</p>
                </div>
    
                <!-- Stat 4 -->
                <div>
                    <h3 class="text-4xl md:text-5xl font-light text-white mb-2">100%</h3>
                    <p class="text-sm text-gray-400 font-medium">Layanan Terintegrasi</p>
                </div>
    
            </div>
    
        </div>

        <!-- SECTION 3: PERANGKAT DESA                     -->
        <!-- ========================================== -->
        <!-- SECTION STRUKTUR ORGANISASI / APARATUR     -->
        <!-- ========================================== -->
        <section id="aparatur" class="py-20 bg-[#0b0d11]">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Struktur Organisasi Desa</h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Susunan kepemimpinan dan aparatur yang siap melayani masyarakat
                        Desa Tebel.</p>
                </div>
        
                @if($perangkatList->count() > 0)
                    <div class="flex flex-col items-center">

                        <!-- TINGKAT 1: KEPALA DESA (Mengambil data urutan pertama) -->
                        @php $kades = $perangkatList->first(); @endphp
                        <div class="w-full max-w-sm relative z-10">
                            <div
                                class="bg-gray-900 border border-[#D4F379]/50 rounded-3xl p-8 text-center shadow-[0_0_30px_rgba(212,243,121,0.1)] relative group">
                                <div
                                    class="w-32 h-32 mx-auto bg-gray-800 rounded-full mb-6 overflow-hidden border-4 border-gray-800 group-hover:border-[#D4F379] transition duration-300 flex items-center justify-center">
                                    @if($kades->foto)
                                        <img src="{{ asset('storage/' . $kades->foto) }}" alt="{{ $kades->nama }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <span class="text-4xl text-gray-500 font-bold">{{ substr($kades->nama, 0, 1) }}</span>
                                    @endif
                                </div>
                                <h3 class="text-xl font-bold text-white mb-2">{{ $kades->nama }}</h3>
                                <div class="inline-block px-4 py-1.5 rounded-full bg-[#D4F379] text-gray-900 text-sm font-bold">
                                    {{ $kades->jabatan }}
                                </div>
                            </div>
                            <!-- Garis vertikal ke bawah -->
                            @if($perangkatList->count() > 1)
                                <div class="absolute -bottom-10 left-1/2 w-px h-10 bg-gray-700 -translate-x-1/2 -z-10"></div>
                            @endif
                        </div>

                        <!-- TINGKAT 2: SEKRETARIS DESA (Mengambil data urutan kedua) -->
                        @if($perangkatList->count() > 1)
                            @php $sekdes = $perangkatList->skip(1)->first(); @endphp
                            <div class="w-full max-w-sm relative z-10 mt-10">
                                <div
                                    class="bg-gray-900 border border-gray-700 rounded-3xl p-8 text-center hover:border-gray-500 transition duration-300 group">
                                    <div
                                        class="w-28 h-28 mx-auto bg-gray-800 rounded-full mb-6 overflow-hidden border-4 border-gray-800 group-hover:border-[#D4F379] transition duration-300 flex items-center justify-center">
                                        @if($sekdes->foto)
                                            <img src="{{ asset('storage/' . $sekdes->foto) }}" alt="{{ $sekdes->nama }}"
                                                class="w-full h-full object-cover">
                                        @else
                                            <span class="text-3xl text-gray-500 font-bold">{{ substr($sekdes->nama, 0, 1) }}</span>
                                        @endif
                                    </div>
                                    <h3 class="text-lg font-bold text-white mb-2">{{ $sekdes->nama }}</h3>
                                    <div
                                        class="inline-block px-4 py-1.5 rounded-full bg-gray-800 border border-gray-700 text-[#D4F379] text-sm font-medium">
                                        {{ $sekdes->jabatan }}
                                    </div>
                                </div>
                                <!-- Garis vertikal ke bawah untuk menghubungkan ke jajaran selanjutnya -->
                                @if($perangkatList->count() > 2)
                                    <div class="absolute -bottom-10 left-1/2 w-px h-10 bg-gray-700 -translate-x-1/2 -z-10"></div>
                                @endif
                            </div>
                        @endif

                        <!-- TINGKAT 3: JAJARAN KAUR / KASI (Mengambil sisa data dari urutan ketiga dst) -->
                        @if($perangkatList->count() > 2)
                            <div class="w-full max-w-5xl relative mt-10">
                                <!-- Garis horizontal (sebagai penghubung bagan) -->
                                <div class="absolute -top-10 left-[15%] right-[15%] h-px bg-gray-700 hidden md:block -z-10"></div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                    @foreach($perangkatList->skip(2) as $p)
                                        <div
                                            class="bg-gray-900/50 border border-gray-800 rounded-3xl p-6 text-center hover:bg-gray-900 hover:border-gray-600 transition duration-300 group relative">
                                            <!-- Garis penghubung ke atas (untuk tiap kotak tingkat 3) -->
                                            <div
                                                class="absolute -top-10 left-1/2 w-px h-10 bg-gray-700 -translate-x-1/2 hidden md:block -z-10">
                                            </div>

                                            <div
                                                class="w-24 h-24 mx-auto bg-gray-800 rounded-full mb-4 overflow-hidden border-2 border-gray-800 group-hover:border-[#D4F379] transition duration-300 flex items-center justify-center">
                                                @if($p->foto)
                                                    <img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama }}"
                                                        class="w-full h-full object-cover">
                                                @else
                                                    <span class="text-2xl text-gray-500 font-bold">{{ substr($p->nama, 0, 1) }}</span>
                                                @endif
                                            </div>
                                            <h3 class="text-base font-bold text-white mb-1">{{ $p->nama }}</h3>
                                            <div class="text-gray-400 text-sm font-medium">
                                                {{ $p->jabatan }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>
                @else
                    <div class="text-center py-12 bg-gray-800/30 rounded-3xl border border-gray-800">
                        <p class="text-gray-500">Data perangkat desa belum tersedia saat ini.</p>
                    </div>
                @endif
            </div>
        </section>

        <!-- Garis Pemisah -->
        <div class="h-px w-full bg-gradient-to-r from-transparent via-gray-700 to-transparent my-20"></div>
        
        <!-- Section: 4 Demografi -->
        <div class="max-w-7xl mx-auto px-6">
        <div class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Demografi Penduduk</h2>
                <p class="text-gray-400">Gambaran umum kependudukan di Desa Tebel saat ini.</p>
            </div>
        
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="bg-gray-800/30 border border-gray-700 rounded-2xl p-8 hover:border-[#D4F379]/50 transition">
                    <div class="text-4xl md:text-5xl font-bold text-[#D4F379] mb-2">4.250</div>
                    <div class="text-gray-400 text-sm font-medium">Total Penduduk</div>
                </div>
                <div class="bg-gray-800/30 border border-gray-700 rounded-2xl p-8 hover:border-[#D4F379]/50 transition">
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2">1.120</div>
                    <div class="text-gray-400 text-sm font-medium">Kepala Keluarga</div>
                </div>
                <div class="bg-gray-800/30 border border-gray-700 rounded-2xl p-8 hover:border-[#D4F379]/50 transition">
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2">2.100</div>
                    <div class="text-gray-400 text-sm font-medium">Laki-laki</div>
                </div>
                <div class="bg-gray-800/30 border border-gray-700 rounded-2xl p-8 hover:border-[#D4F379]/50 transition">
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2">2.150</div>
                    <div class="text-gray-400 text-sm font-medium">Perempuan</div>
                </div>
            </div>
        </div>
        
        <div class="mb-20">
            <div
                class="flex flex-col md:flex-row gap-12 items-center bg-gray-900 border border-gray-800 rounded-3xl p-8 md:p-12">
                <div class="flex-1 space-y-6">
                    <h2 class="text-3xl font-bold">Potensi & UMKM Lokal</h2>
                    <p class="text-gray-400 leading-relaxed">
                        Desa Tebel memiliki potensi besar di sektor perdagangan dan UMKM. Lokasinya yang strategis di Kecamatan
                        Gedangan membuat denyut nadi perekonomian desa berjalan cepat.
                    </p>
                    <ul class="space-y-3 text-sm text-gray-300">
                        <li class="flex items-center gap-3">
                            <div
                                class="w-6 h-6 rounded-full bg-[#D4F379]/20 text-[#D4F379] flex items-center justify-center shrink-0">
                                ✓</div>
                            <span>Sentra industri rumah tangga dan kerajinan.</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <div
                                class="w-6 h-6 rounded-full bg-[#D4F379]/20 text-[#D4F379] flex items-center justify-center shrink-0">
                                ✓</div>
                            <span>Pusat kuliner lokal dan jajanan tradisional.</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <div
                                class="w-6 h-6 rounded-full bg-[#D4F379]/20 text-[#D4F379] flex items-center justify-center shrink-0">
                                ✓</div>
                            <span>Pertanian perkotaan skala menengah.</span>
                        </li>
                    </ul>
                </div>
                <div class="flex-1 grid grid-cols-2 gap-4 w-full">
                    <div class="h-40 bg-gray-800 rounded-2xl"></div> <!-- Placeholder Gambar Potensi 1 -->
                    <div class="h-40 bg-gray-800 rounded-2xl mt-8"></div> <!-- Placeholder Gambar Potensi 2 -->
                </div>
            </div>
        </div>
        
        <!-- Section: 6 Letak Geografis -->
        <div>
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Letak Geografis</h2>
                <p class="text-gray-400">Wilayah administratif dan lokasi Balai Desa Tebel.</p>
            </div>
        
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Info Batas Wilayah -->
                <div class="lg:col-span-1 bg-gray-800/30 border border-gray-700 rounded-2xl p-6 md:p-8 space-y-6">
                    <h3 class="text-xl font-medium text-white mb-2">Batas Wilayah</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between border-b border-gray-700 pb-2">
                            <span class="text-gray-400">Utara</span>
                            <span class="text-white font-medium">Desa Gedangan</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-700 pb-2">
                            <span class="text-gray-400">Timur</span>
                            <span class="text-white font-medium">Desa Ketajen</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-700 pb-2">
                            <span class="text-gray-400">Selatan</span>
                            <span class="text-white font-medium">Desa Punggul</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Barat</span>
                            <span class="text-white font-medium">Desa Keboansikep</span>
                        </div>
                    </div>
                </div>
        
                <!-- Sematan Google Maps -->
                <div
                    class="lg:col-span-2 h-80 md:h-auto min-h-[300px] bg-gray-800 rounded-2xl overflow-hidden border border-gray-700">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15826.6579624536!2d112.71801835!3d-7.39148415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e44a71a065db%3A0xb309095bc3d8ab5!2sTebel%2C%20Gedangan%2C%20Sidoarjo%20Regency%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition duration-500">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 7: LAYANAN & ADMINISTRASI -->
    <section id="layanan" class="py-24 px-6 bg-[#0f1115]">
        <div class="max-w-7xl mx-auto">
    
            <!-- Header Section -->
            <div class="text-center mb-16">
                <div class="flex items-center justify-center gap-2 mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#D4F379]"></span>
                    <span class="text-sm font-semibold text-gray-400 uppercase tracking-widest">Layanan Masyarakat</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-medium text-white">Solusi Cerdas Pelayanan Desa</h2>
            </div>
    
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
    
                <!-- Kolom Kiri: Gambar & Floating Card (Gaya Redient) -->
                <div class="relative rounded-2xl overflow-hidden h-[450px] lg:h-[600px] w-full">
                    <!-- Gambar Placeholder (Bisa diganti foto Balai Desa) -->
                    <img src="https://images.unsplash.com/photo-1577493340887-b7bfff550145?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                        alt="Layanan Balai Desa" class="absolute inset-0 w-full h-full object-cover">
    
                    <!-- Overlay Gradasi agar gambar tidak terlalu terang -->
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 to-transparent"></div>
    
                    <!-- Card Glassmorphism di atas gambar -->
                    <div
                        class="absolute bottom-6 left-6 right-6 lg:right-auto lg:w-80 bg-gray-900/60 backdrop-blur-lg border border-gray-700 p-6 rounded-xl">
                        <h4 class="text-white font-semibold mb-4 text-lg">Jam Operasional Balai Desa</h4>
                        <ul class="space-y-4 text-sm">
                            <li class="flex justify-between border-b border-gray-700/50 pb-2">
                                <span class="text-gray-300">Senin - Kamis</span>
                                <span class="text-white font-medium">08.00 - 15.00</span>
                            </li>
                            <li class="flex justify-between border-b border-gray-700/50 pb-2">
                                <span class="text-gray-300">Jumat</span>
                                <span class="text-white font-medium">08.00 - 11.00</span>
                            </li>
                            <li class="flex justify-between">
                                <span class="text-gray-300">Sabtu & Minggu</span>
                                <span class="text-[#D4F379] font-medium">Tutup / Libur</span>
                            </li>
                        </ul>
                    </div>
                </div>
    
                <!-- Kolom Kanan: Daftar Layanan (List 01, 02, 03) -->
                <div class="flex flex-col justify-center">
    
                    <!-- Item Layanan 1 (Gaya Aktif/Highlighted) -->
                    <a href="{{ route('layanan.kependudukan') }}"
                        class="group block border border-gray-700 bg-gray-800/40 rounded-xl p-8 mb-4 hover:border-[#D4F379] hover:bg-gray-800/70 transition duration-300">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <span class="inline-block text-[11px] font-semibold text-[#D4F379] uppercase tracking-wider mb-1">KTP &bull; KK &bull; Akta &bull; Pindah Domisili</span>
                                <h3 class="text-xl md:text-2xl font-medium text-white group-hover:text-[#D4F379] transition">
                                    Administrasi Kependudukan
                                </h3>
                            </div>
                            <span class="text-lg font-light text-[#D4F379]">01</span>
                        </div>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4">
                            Layanan formulir pengurusan KTP, Kartu Keluarga (KK), Akta Kelahiran, dan surat pindah domisili warga lengkap dengan upload berkas yang langsung terdata dalam sistem.
                        </p>
                        <span class="inline-flex items-center gap-1.5 text-xs font-bold text-[#D4F379] group-hover:translate-x-1 transition duration-200">
                            Buka Formulir & Kelola Data &rarr;
                        </span>
                    </a>
    
                    <!-- Item Layanan 2 -->
                    <a href="{{ route('layanan.surat-keterangan') }}"
                        class="group block border border-transparent border-b-gray-800 p-8 mb-4 hover:bg-gray-800/40 hover:border-gray-700 hover:rounded-xl transition duration-300">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <span class="inline-block text-[11px] font-semibold text-sky-400 uppercase tracking-wider mb-1">SKTM &bull; Pengantar SKCK &bull; Surat Nikah</span>
                                <h3 class="text-xl md:text-2xl font-medium text-white group-hover:text-[#D4F379] transition">
                                    Surat Keterangan Desa
                                </h3>
                            </div>
                            <span class="text-lg font-light text-gray-500">02</span>
                        </div>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4">
                            Pengurusan Surat Keterangan Tidak Mampu (SKTM), Surat Keterangan Catatan Kepolisian (SKCK), dan surat pengantar nikah online dengan upload berkas terpadu.
                        </p>
                        <span class="inline-flex items-center gap-1.5 text-xs font-bold text-sky-400 group-hover:translate-x-1 transition duration-200">
                            Buka Formulir & Ajukan Surat &rarr;
                        </span>
                    </a>
    
                    <!-- Item Layanan 3 -->
                    <a href="{{ route('layanan.perizinan-usaha') }}"
                        class="group block border border-transparent border-b-gray-800 p-8 hover:bg-gray-800/40 hover:border-gray-700 hover:rounded-xl transition duration-300">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <span class="inline-block text-[11px] font-semibold text-emerald-400 uppercase tracking-wider mb-1">Legalitas Usaha &bull; SKU &bull; UMKM Warga</span>
                                <h3 class="text-xl md:text-2xl font-medium text-white group-hover:text-[#D4F379] transition">
                                    Perizinan Usaha (UMKM)
                                </h3>
                            </div>
                            <span class="text-lg font-light text-gray-500">03</span>
                        </div>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4">
                            Fasilitasi penerbitan Surat Keterangan Usaha (SKU) serta pengunggahan berkas perizinan untuk mendukung legalitas bisnis UMKM warga Desa Tebel.
                        </p>
                        <span class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-400 group-hover:translate-x-1 transition duration-200">
                            Upload Berkas & Daftar SKU &rarr;
                        </span>
                    </a>
    
                </div>
            </div>
    
        </div>
    </section>

    <!-- SECTION KABAR DESA -->
    <section id="berita" class="py-20 bg-[#0f1115] border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-6">
    
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Kabar Desa Terbaru</h2>
                <p class="text-gray-400 max-w-2xl mx-auto">Ikuti informasi, pengumuman, dan kegiatan terkini dari balai
                    desa.</p>
            </div>
    
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($beritaTerbaru as $item)
                    <!-- KARTU BERITA -->
                    <div
                        class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden hover:border-gray-600 transition group flex flex-col">
                        <div class="h-48 bg-gray-800 relative overflow-hidden">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-600 bg-gray-800/50">Tanpa Gambar</div>
                            @endif
                        </div>

                        <div class="p-6 flex-1 flex flex-col">
                            <div class="text-xs text-[#D4F379] mb-3 font-mono">{{ $item->created_at->format('d M Y') }}</div>
                            <h3 class="text-lg font-medium text-white mb-2 line-clamp-2">{{ $item->judul }}</h3>
                            <p class="text-gray-400 text-sm mb-6 line-clamp-3 flex-1">{{ $item->konten }}</p>

                            <!-- Tombol Pemicu Pop-up -->
                            <button onclick="bukaModalBerita('modal-berita-{{ $item->id }}')"
                                class="inline-block mt-auto text-sm text-white hover:text-[#D4F379] transition font-medium text-left">
                                Baca selengkapnya &rarr;
                            </button>
                        </div>
                    </div>

                    <!-- POP-UP (MODAL) BERITA (Sembunyi secara default) -->
                    <div id="modal-berita-{{ $item->id }}"
                        class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6 opacity-0 transition-opacity duration-300">
                        <!-- Latar Belakang Gelap (Klik untuk menutup) -->
                        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm"
                            onclick="tutupModalBerita('modal-berita-{{ $item->id }}')"></div>

                        <!-- Kotak Pop-up -->
                        <div class="relative w-full max-w-3xl bg-[#0b0d11] border border-gray-800 rounded-2xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col transform scale-95 transition-transform duration-300"
                            id="modal-box-{{ $item->id }}">

                            <!-- Header Pop-up (Tombol Silang) -->
                            <div class="flex justify-between items-center p-5 border-b border-gray-800 bg-[#0f1115]">
                                <span class="text-xs font-bold text-gray-500 tracking-widest uppercase">Kabar Desa</span>
                                <button onclick="tutupModalBerita('modal-berita-{{ $item->id }}')"
                                    class="text-gray-400 hover:text-red-400 transition p-1">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                                        </path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Area Teks Berita (Bisa di-scroll) -->
                            <div class="p-6 md:p-8 overflow-y-auto custom-scrollbar">
                                <div class="mb-6">
                                    <div class="text-[#D4F379] text-sm font-mono mb-3">{{ $item->created_at->format('d F Y') }}</div>
                                    <h2 class="text-2xl md:text-3xl font-bold text-white">{{ $item->judul }}</h2>
                                </div>

                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                        class="w-full aspect-video object-cover rounded-xl mb-8 border border-gray-800">
                                @endif

                                <!-- Teks Asli -->
                                <div
                                    class="prose prose-invert max-w-none text-gray-300 whitespace-pre-line leading-relaxed text-base md:text-lg">
                                    {{ $item->konten }}
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-span-1 md:col-span-3 text-center py-16 bg-gray-800/30 rounded-2xl border border-gray-700">
                        <p class="text-gray-400">Belum ada kabar atau pengumuman desa saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- SECTION 8: FOOTER -->
    <footer class="bg-[#050608] pt-24 pb-8 px-6 border-t border-gray-800">
        <div class="max-w-7xl mx-auto">
    
            <!-- Top Footer: Tautan & Berlangganan -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
    
                <!-- Kolom 1: Ikuti Kami & Deskripsi Singkat -->
                <div>
                    <h5 class="text-white font-medium mb-6">Ikuti Kami</h5>
                    <div class="flex gap-3 mb-6">
                        <!-- Icon Sosial Media (Menggunakan SVG sederhana) -->
                        <a href="#"
                            class="w-10 h-10 rounded-full border border-gray-700 flex items-center justify-center text-gray-400 hover:text-[#D4F379] hover:border-[#D4F379] transition">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full border border-gray-700 flex items-center justify-center text-gray-400 hover:text-[#D4F379] hover:border-[#D4F379] transition">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        DesaHub adalah platform informasi desa terpadu yang dirancang untuk mendukung transparansi, inovasi,
                        dan kemandirian masyarakat Desa Tebel.
                    </p>
                </div>
    
                <!-- Kolom 2: Menu Layanan -->
                <div>
                    <h5 class="text-white font-medium mb-6">Layanan Online</h5>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="{{ route('layanan.kependudukan') }}" class="hover:text-[#D4F379] transition">Administrasi Kependudukan</a></li>
                        <li><a href="{{ route('layanan.surat-keterangan') }}" class="hover:text-[#D4F379] transition">Surat Keterangan Desa</a></li>
                        <li><a href="{{ route('layanan.perizinan-usaha') }}" class="hover:text-[#D4F379] transition">Perizinan Usaha (UMKM)</a></li>
                        <li><a href="{{ route('layanan.tracking') }}" class="hover:text-[#D4F379] transition">Pelacakan Berkas Terdata</a></li>
                    </ul>
                </div>
    
                <!-- Kolom 3: Tautan Lainnya -->
                <div>
                    <h5 class="text-white font-medium mb-6">Informasi Lain</h5>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="{{ route('layanan.kependudukan', ['#ktp']) }}" class="hover:text-[#D4F379] transition">Form KTP & Kartu Keluarga</a></li>
                        <li><a href="{{ route('layanan.kependudukan', ['#akta_kelahiran']) }}" class="hover:text-[#D4F379] transition">Form Akta Kelahiran</a></li>
                        <li><a href="{{ route('layanan.kependudukan', ['#pindah_domisili']) }}" class="hover:text-[#D4F379] transition">Surat Pindah Domisili</a></li>
                        <li><a href="{{ route('layanan.surat-keterangan', ['#sktm']) }}" class="hover:text-[#D4F379] transition">Surat Keterangan Tidak Mampu</a></li>
                    </ul>
                </div>
    
                <!-- Kolom 4: Subscribe/Kontak -->
                <div>
                    <h5 class="text-white font-medium mb-6">Dapatkan Info Terbaru</h5>
                    <p class="text-gray-400 text-sm mb-4 leading-relaxed">
                        Daftarkan email Anda untuk menerima pembaruan kegiatan dan pengumuman desa.
                    </p>
                    <div class="flex gap-2">
                        <input type="email" placeholder="contoh@email.com"
                            class="bg-gray-900 border border-gray-700 text-white text-sm rounded-lg focus:ring-[#D4F379] focus:border-[#D4F379] block w-full p-2.5 outline-none">
                        <button
                            class="bg-[#D4F379] text-gray-900 px-4 rounded-lg font-medium hover:bg-[#bce055] transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>
    
            </div>
    
            <!-- Middle Footer: Giant Logo & Kontak -->
            <div
                class="border-t border-gray-800 py-12 flex flex-col xl:flex-row justify-between items-start xl:items-center gap-10">
    
                <!-- Teks Raksasa -->
                <h2 class="text-6xl md:text-8xl lg:text-[9rem] font-bold text-[#D4F379] tracking-tighter leading-none">
                    DESAHUB<span class="text-white">.</span>
                </h2>
    
                <div class="flex flex-col md:flex-row gap-8 lg:gap-16 items-start xl:items-center">
                    <!-- Kontak -->
                    <div>
                        <p class="text-gray-500 text-sm mb-1">Hubungi Kami</p>
                        <a href="mailto:info@desatebel.id"
                            class="text-white hover:text-[#D4F379] block mb-1 font-medium transition">info@desatebel.id</a>
                        <p class="text-white font-medium">+62 812-3456-7890</p>
                    </div>
    
                    <!-- Alamat -->
                    <div>
                        <p class="text-gray-500 text-sm mb-1">Alamat Balai Desa</p>
                        <p class="text-white font-medium leading-relaxed">Jl. Raya Tebel No. 123,<br>Gedangan, Sidoarjo
                            61254</p>
                    </div>
    
                    <!-- Tombol Kembali ke Atas (Meniru panah di pojok referensi) -->
                    <a href="#"
                        class="w-12 h-12 shrink-0 rounded-full border border-gray-700 flex items-center justify-center text-gray-400 hover:text-black hover:bg-white transition duration-300 ml-auto md:ml-0">
                        &uarr;
                    </a>
                </div>
            </div>
    
            <!-- Bottom Footer: Hak Cipta -->
            <div
                class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500">
                <p>&copy; 2026 Desa Tebel, Kabupaten Sidoarjo. Dikembangkan melalui program Studi Independen UNESA.</p>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-white transition">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-white transition">Syarat Penggunaan</a>
                </div>
            </div>
    
        </div>
    </footer>

</body>

<!-- Script Modal Berita -->
<script>
    function bukaModalBerita(modalId) {
        const modal = document.getElementById(modalId);
        const box = document.getElementById(modalId.replace('modal-berita', 'modal-box'));

        // Tampilkan modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // Kunci scroll halaman utama
        document.body.style.overflow = 'hidden';

        // Trigger animasi muncul halus (sedikit delay agar transisi CSS bekerja)
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
            box.classList.remove('scale-95');
            box.classList.add('scale-100');
        }, 10);
    }

    function tutupModalBerita(modalId) {
        const modal = document.getElementById(modalId);
        const box = document.getElementById(modalId.replace('modal-berita', 'modal-box'));

        // Trigger animasi menghilang
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        box.classList.remove('scale-100');
        box.classList.add('scale-95');

        // Kembalikan scroll halaman utama
        document.body.style.overflow = 'auto';

        // Sembunyikan setelah animasi selesai (300ms)
        setTimeout(() => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }, 300);
    }
</script>

</html>