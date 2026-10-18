<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DesaHub - @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#0f1115] text-white flex min-h-screen font-sans">

    <!-- Sidebar Kiri -->
    <aside class="w-64 bg-gray-900 border-r border-gray-800 hidden md:flex flex-col">
        <!-- Logo -->
        <div class="h-16 flex items-center px-6 border-b border-gray-800">
            <h2 class="text-xl font-bold tracking-wider">DesaHub<span class="text-[#D4F379]">.</span></h2>
        </div>

        <!-- Menu Navigasi -->
        <nav class="flex-1 p-4 space-y-1.5 overflow-y-auto">
            <!-- Link Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg bg-gray-800 text-[#D4F379] font-medium transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                Dashboard
            </a>

            <p class="px-4 pt-5 pb-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Manajemen Layanan</p>

            <!-- Link Kependudukan -->
            <a href="{{ route('admin.kependudukan.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition"
                class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                Kependudukan
            </a>

            <!-- Link Surat Keterangan -->
            <a href="{{ route('admin.surat-keterangan.index') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                Surat Keterangan
            </a>

            <!-- Link Perizinan Usaha -->
            <a href="{{ route('admin.perizinan-usaha.index') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
                Perizinan Usaha
            </a>

            <a href="{{ route('admin.berita.index') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2">
                    </path>
                </svg>
                Berita & Pengumuman
            </a>

            -
            <a href="{{ route('admin.perangkat.index') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                Perangkat Desa
            </a>
        </nav>

        <!-- Tombol Logout di Bawah -->
        <div class="p-4 border-t border-gray-800">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 px-4 py-2.5 w-full text-left rounded-lg text-red-400 hover:bg-gray-800 hover:text-red-300 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Area Konten Utama -->
    <main class="flex-1 flex flex-col min-w-0 bg-[#0f1115]">
        <!-- Header Atas -->
        <header
            class="h-16 flex items-center justify-between px-8 border-b border-gray-800 bg-gray-900/50 backdrop-blur-sm sticky top-0 z-10">
            <h1 class="text-xl font-medium text-white">@yield('title', 'Dashboard')</h1>

            <!-- Profil Admin -->
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-400 hidden sm:block">Admin Desa Tebel</span>
                <div
                    class="w-9 h-9 rounded-full bg-[#D4F379] text-gray-900 flex items-center justify-center font-bold text-sm">
                    A
                </div>
            </div>
        </header>

        <!-- Konten Halaman yang Berubah-ubah -->
        <div class="p-6 md:p-8 overflow-y-auto">
            @yield('content')
        </div>
    </main>

</body>

<!-- Script Auto Logout -->
<script>
    let inactivityTime = function () {
        let time;
        // Waktu tunggu dalam milidetik. Contoh: 10000 = 10 detik.
        // (Untuk produksi riil, ubah menjadi misal 900000 untuk 15 menit).
        const timeoutLimit = 10000;

        // Fungsi untuk eksekusi logout (otomatis submit form)
        function autoLogout() {
            document.getElementById('logout-form').submit();
        }

        // Fungsi untuk mereset perhitungan mundur jika ada aktivitas
        function resetTimer() {
            clearTimeout(time);
            time = setTimeout(autoLogout, timeoutLimit);
        }

        // Daftar aktivitas yang dianggap admin masih aktif
        window.onload = resetTimer;
        document.onmousemove = resetTimer;
        document.onkeypress = resetTimer;
        document.onclick = resetTimer;
        document.onscroll = resetTimer;
    };

    inactivityTime();
</script>
</body>

</html>