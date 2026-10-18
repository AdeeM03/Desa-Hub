<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - DesaHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#0f1115] text-white flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-gray-900 border border-gray-800 rounded-2xl p-8 shadow-2xl">
        <div class="text-center mb-8">
            <!-- Logo DesaHub -->
            <h1 class="text-3xl font-bold tracking-wider mb-2">DesaHub<span class="text-[#D4F379]">.</span></h1>
            <p class="text-gray-400 text-sm">Masuk ke panel manajemen desa</p>
        </div>

        <!-- Notifikasi jika terjadi error saat login (email/password salah) -->
        @if ($errors->any())
            <div class="bg-red-500/10 border border-red-500/50 text-red-500 p-3 rounded-lg mb-6 text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form Login -->
        <form action="{{ route('login.post') }}" method="POST">
            @csrf <!-- Token keamanan bawaan Laravel -->

            <!-- Input Email -->
            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-gray-400 mb-2">Alamat Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                    placeholder="admin@tebel.id"
                    class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg focus:ring-[#D4F379] focus:border-[#D4F379] p-3 outline-none transition">
            </div>

            <!-- Input Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-400 mb-2">Password</label>
                <input type="password" name="password" id="password" required placeholder="••••••••"
                    class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg focus:ring-[#D4F379] focus:border-[#D4F379] p-3 outline-none transition">
            </div>

            <!-- Tombol Login -->
            <button type="submit"
                class="w-full bg-[#D4F379] text-gray-900 font-bold rounded-lg px-5 py-3 hover:bg-[#bce055] transition duration-300">
                Masuk ke Dasbor
            </button>
        </form>

        <!-- Link Kembali -->
        <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-white transition">&larr; Kembali ke
                Beranda</a>
        </div>
    </div>

</body>

</html>