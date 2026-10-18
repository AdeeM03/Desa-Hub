<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Layanan Desa') - DesaHub Desa Tebel</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#D4F379',
                        'primary-dark': '#bce055',
                        dark: '#0f1115',
                        darker: '#050608',
                        card: 'rgba(31, 41, 55, 0.4)',
                    }
                }
            }
        }
    </script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.12);
        }
        .glass-card {
            background: rgba(22, 27, 34, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glass-card:hover {
            border-color: rgba(212, 243, 121, 0.3);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(15, 17, 21, 0.5);
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(212, 243, 121, 0.3);
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(212, 243, 121, 0.6);
        }
    </style>
    @stack('styles')
</head>
<body class="bg-[#0b0d11] text-gray-100 min-h-screen flex flex-col antialiased selection:bg-[#D4F379] selection:text-black">

    <!-- Top Glow Effect -->
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-3/4 max-w-4xl h-48 bg-[#D4F379]/10 blur-[130px] rounded-full pointer-events-none -z-10"></div>

    <!-- Navigation Bar -->
    <header class="sticky top-4 z-50 px-4 md:px-8">
        <nav class="glass max-w-6xl mx-auto px-5 py-3.5 rounded-full flex justify-between items-center transition-all duration-300">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 group transition {{ request()->routeIs('home') ? 'text-[#D4F379]' : 'text-gray-300' }}">
                <div class="w-8 h-8 rounded-full bg-[#D4F379] flex items-center justify-center text-gray-950 font-black text-sm group-hover:scale-105 transition">
                    D
                </div>
                <span class="text-lg md:text-xl font-bold tracking-wider text-white">DesaHub<span class="text-[#D4F379]">.</span></span>
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex items-center gap-6 text-sm font-medium">
                <li>
                    <a href="{{ route('layanan.kependudukan') }}" class="hover:text-[#D4F379] transition {{ request()->routeIs('layanan.kependudukan*') ? 'text-[#D4F379] font-semibold' : 'text-gray-300' }}">
                        Administrasi Kependudukan
                    </a>
                </li>
                <li>
                    <a href="{{ route('layanan.surat-keterangan') }}" class="hover:text-[#D4F379] transition {{ request()->routeIs('layanan.surat-keterangan*') ? 'text-[#D4F379] font-semibold' : 'text-gray-300' }}">
                        Surat Keterangan Desa
                    </a>
                </li>
                <li>
                    <a href="{{ route('layanan.perizinan-usaha') }}" class="hover:text-[#D4F379] transition {{ request()->routeIs('layanan.perizinan-usaha*') ? 'text-[#D4F379] font-semibold' : 'text-gray-300' }}">
                        Perizinan Usaha (UMKM)
                    </a>
                </li>
                <li>
                    <a href="{{ route('layanan.tracking') }}" class="hover:text-[#D4F379] transition {{ request()->routeIs('layanan.tracking*') ? 'text-[#D4F379] font-semibold' : 'text-gray-300' }}">
                        Status Permohonan
                    </a>
                </li>
            </ul>

            <!-- Action Button & Mobile Toggle -->
            <div class="flex items-center gap-3">
                <a href="{{ route('layanan.tracking') }}" class="hidden sm:inline-flex items-center gap-2 bg-[#D4F379] text-gray-950 px-4 py-2 rounded-full text-xs md:text-sm font-bold hover:bg-[#bce055] transition shadow-lg shadow-[#D4F379]/10">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span>Lacak Berkas</span>
                </a>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" type="button" class="lg:hidden p-2 text-gray-300 hover:text-white rounded-lg focus:outline-none" aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile Drawer Menu -->
        <div id="mobileMenu" class="hidden lg:hidden glass mt-2 mx-auto max-w-6xl rounded-2xl p-5 border border-white/10 space-y-3">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('home') ? 'bg-[#D4F379]/20 text-[#D4F379]' : 'text-gray-300 hover:bg-white/5' }}">Beranda</a>
            <a href="{{ route('layanan.kependudukan') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('layanan.kependudukan*') ? 'bg-[#D4F379]/20 text-[#D4F379]' : 'text-gray-300 hover:bg-white/5' }}">Administrasi Kependudukan</a>
            <a href="{{ route('layanan.surat-keterangan') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('layanan.surat-keterangan*') ? 'bg-[#D4F379]/20 text-[#D4F379]' : 'text-gray-300 hover:bg-white/5' }}">Surat Keterangan Desa</a>
            <a href="{{ route('layanan.perizinan-usaha') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('layanan.perizinan-usaha*') ? 'bg-[#D4F379]/20 text-[#D4F379]' : 'text-gray-300 hover:bg-white/5' }}">Perizinan Usaha (UMKM)</a>
            <a href="{{ route('layanan.tracking') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('layanan.tracking*') ? 'bg-[#D4F379]/20 text-[#D4F379]' : 'text-gray-300 hover:bg-white/5' }}">Status Permohonan</a>
        </div>
    </header>

    <!-- Global Notifications / Alerts -->
    <div class="max-w-6xl mx-auto w-full px-4 md:px-8 mt-6">
        @if(session('success'))
            <div class="bg-[#172e1c] border border-emerald-500/50 rounded-2xl p-5 flex items-start gap-4 shadow-xl">
                <div class="w-10 h-10 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div class="flex-grow">
                    <h4 class="text-emerald-400 font-bold text-base">Berhasil Terdata Dalam Sistem!</h4>
                    <p class="text-gray-300 text-sm mt-1 leading-relaxed">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if(isset($errors) && $errors->any())
            <div class="bg-[#351616] border border-red-500/50 rounded-2xl p-5 flex items-start gap-4 shadow-xl">
                <div class="w-10 h-10 rounded-full bg-red-500/20 text-red-400 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <div class="flex-grow">
                    <h4 class="text-red-400 font-bold text-base">Terdapat Kesalahan Pengisian Form:</h4>
                    <ul class="list-disc list-inside text-gray-300 text-sm mt-1 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#050608] mt-24 pt-16 pb-8 px-6 border-t border-gray-800">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                <div class="md:col-span-2 space-y-4">
                    <div class="flex items-center gap-2">
                        <span class="text-2xl font-bold tracking-wider text-white">DesaHub<span class="text-[#D4F379]">.</span></span>
                    </div>
                    <p class="text-gray-400 text-sm max-w-md leading-relaxed">
                        Sistem Informasi & Pelayanan Administrasi Terpadu Desa Tebel, Kecamatan Gedangan, Kabupaten Sidoarjo. Memberikan kemudahan bagi warga dalam mengurus dokumen secara online, cepat, dan transparan.
                    </p>
                </div>

                <div>
                    <h5 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Layanan Desa</h5>
                    <ul class="space-y-2.5 text-sm text-gray-400">
                        <li><a href="{{ route('layanan.kependudukan') }}" class="hover:text-[#D4F379] transition">Administrasi Kependudukan</a></li>
                        <li><a href="{{ route('layanan.surat-keterangan') }}" class="hover:text-[#D4F379] transition">Surat Keterangan Desa</a></li>
                        <li><a href="{{ route('layanan.perizinan-usaha') }}" class="hover:text-[#D4F379] transition">Perizinan Usaha (UMKM)</a></li>
                        <li><a href="{{ route('layanan.tracking') }}" class="hover:text-[#D4F379] transition">Cek Status Berkas</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Kontak Pelayanan</h5>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li class="flex items-center gap-2 text-white font-medium">Balai Desa Tebel</li>
                        <li>Jl. Raya Tebel No. 123, Gedangan</li>
                        <li>Sidoarjo, Jawa Timur 61254</li>
                        <li class="pt-2 text-white font-medium">+62 812-3456-7890</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800/80 pt-6 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-gray-500">
                <p>&copy; {{ date('Y') }} Pemerintah Desa Tebel, Sidoarjo. Terintegrasi DesaHub.</p>
                <div class="flex gap-4">
                    <a href="{{ route('home') }}" class="hover:text-[#D4F379] transition">Beranda</a>
                    <a href="{{ route('layanan.tracking') }}" class="hover:text-[#D4F379] transition">Pelacakan Berkas</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        const mobileBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileBtn && mobileMenu) {
            mobileBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
