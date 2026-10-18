@extends('layouts.admin')

@section('title', 'Tambah Perangkat Desa')

@section('content')
    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 max-w-2xl mx-auto">
        <h2 class="text-xl font-bold text-white mb-6">Tambah Aparatur Desa Baru</h2>

        <form action="{{ route('admin.perangkat.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Input Nama -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Nama Lengkap</label>
                <input type="text" name="nama" required placeholder="Contoh: Budi Santoso, S.E."
                    class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-3 focus:border-[#D4F379] focus:ring-1 focus:ring-[#D4F379] outline-none transition">
            </div>

            <!-- Input Jabatan -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Jabatan</label>
                <input type="text" name="jabatan" required placeholder="Contoh: Kepala Desa / Kaur Keuangan"
                    class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-3 focus:border-[#D4F379] focus:ring-1 focus:ring-[#D4F379] outline-none transition">
            </div>

            <!-- Input Urutan -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Nomor Urut Tampil</label>
                <input type="number" name="urutan" required value="1"
                    class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-3 focus:border-[#D4F379] focus:ring-1 focus:ring-[#D4F379] outline-none transition">
                <p class="text-xs text-gray-500 mt-2">Tips: Gunakan angka 1 untuk Kepala Desa, 2 untuk Sekretaris, dst. agar
                    tampilannya urut.</p>
            </div>

            <!-- Input Foto -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Foto Wajah (Opsional)</label>
                <input type="file" name="foto" accept="image/*"
                    class="w-full text-gray-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#D4F379] file:text-gray-900 hover:file:bg-[#bce055] file:transition cursor-pointer">
            </div>

            <!-- Tombol Aksi -->
            <div class="flex gap-4 pt-4 border-t border-gray-800">
                <a href="{{ route('admin.perangkat.index') }}"
                    class="px-6 py-3 rounded-lg border border-gray-700 text-gray-300 hover:bg-gray-800 transition font-medium">Batal</a>
                <button type="submit"
                    class="px-6 py-3 rounded-lg bg-[#D4F379] text-gray-900 font-bold hover:bg-[#bce055] transition shadow-lg shadow-[#D4F379]/10">Simpan
                    Data</button>
            </div>
        </form>
    </div>
@endsection