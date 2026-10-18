@extends('layouts.app') <!-- Asumsi Anda menggunakan layout utama yang sama dengan layanan -->

@section('content')
    <div class="bg-[#0f1115] min-h-screen text-white pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Bagian 1: Sejarah & Visi Misi -->
            <div class="mb-20">
                <div class="text-center mb-12">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Profil Desa Tebel</h1>
                    <p class="text-gray-400 max-w-2xl mx-auto">Mengenal lebih dekat sejarah, visi, dan misi desa kami dalam
                        mewujudkan masyarakat yang mandiri dan sejahtera.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div class="bg-gray-800/50 p-8 rounded-2xl border border-gray-700">
                        <h2 class="text-2xl font-semibold text-[#D4F379] mb-4">Sejarah Singkat</h2>
                        <p class="text-gray-300 leading-relaxed text-sm">
                            Desa Tebel merupakan salah satu desa yang terletak di Kecamatan Gedangan, Kabupaten Sidoarjo.
                            Sejak dahulu, desa ini dikenal dengan semangat gotong royong warganya yang tinggi serta potensi
                            sektor UMKM yang terus berkembang. Melalui platform DesaHub, kami berkomitmen membawa pelayanan
                            desa ke era digital.
                        </p>
                    </div>
                    <div class="space-y-6">
                        <div class="bg-gray-800/50 p-6 rounded-2xl border border-gray-700 hover:border-gray-500 transition">
                            <h3 class="text-xl font-medium mb-2">Misi</h3>
                            <p class="text-gray-400 text-sm">Mewujudkan Desa Tebel yang transparan, inovatif, dan berdaya
                                saing melalui digitalisasi pelayanan publik.</p>
                        </div>
                        <div class="bg-gray-800/50 p-6 rounded-2xl border border-gray-700 hover:border-gray-500 transition">
                            <h3 class="text-xl font-medium mb-2">Visi</h3>
                            <ul class="list-disc list-inside text-gray-400 text-sm space-y-1">
                                <li>Meningkatkan kualitas pelayanan administrasi desa.</li>
                                <li>Mendorong pertumbuhan ekonomi warga berbasis UMKM.</li>
                                <li>Menjaga kelestarian lingkungan dan budaya gotong royong.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- BAGIAN: STRUKTUR ORGANISASI / PERANGKAT DESA -->
            <!-- ========================================== -->
            <div class="mb-20">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold mb-4 text-white">Perangkat Desa</h2>
                    <p class="text-gray-400">Struktur organisasi dan aparatur yang siap melayani masyarakat Desa Tebel.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($perangkatList as $p)
                        <div
                            class="bg-gray-900 border border-gray-800 rounded-2xl p-6 text-center hover:border-gray-600 transition group">
                            <div
                                class="w-24 h-24 mx-auto bg-gray-800 rounded-full mb-4 overflow-hidden border-2 border-gray-700 group-hover:border-[#D4F379] transition flex items-center justify-center">
                                @if($p->foto)
                                    <!-- Jika admin sudah mengunggah foto -->
                                    <img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama }}" class="w-full h-full object-cover">
                                @else
                                    <!-- Jika foto kosong, tampilkan inisial nama -->
                                    <span class="text-3xl text-gray-500 font-bold">{{ substr($p->nama, 0, 1) }}</span>
                                @endif
                            </div>
                            <h3 class="text-lg font-medium text-white mb-1">{{ $p->nama }}</h3>
                            <p class="text-[#D4F379] text-sm font-medium">{{ $p->jabatan }}</p>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-8 text-gray-500 bg-gray-800/30 rounded-2xl border border-gray-700">
                            Data perangkat desa belum tersedia saat ini.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
@endsection