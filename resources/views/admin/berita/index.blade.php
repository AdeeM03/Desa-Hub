@extends('layouts.admin')
@section('title', 'Berita & Pengumuman')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-white mb-1">Kelola Berita</h2>
        <p class="text-sm text-gray-400">Tambahkan informasi, pengumuman, atau agenda desa terbaru.</p>
    </div>

    @if(session('success'))
        <div class="bg-green-500/10 border border-green-500/50 text-green-500 p-4 rounded-lg mb-6 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Tambah Berita -->
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mb-8">
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm text-gray-400 mb-1">Judul Berita</label>
                <input type="text" name="judul" required
                    class="w-full bg-gray-800 border border-gray-700 text-white rounded p-2 outline-none focus:border-[#D4F379]">
            </div>
            <div>
                <label class="block text-sm text-gray-400 mb-1">Isi/Konten</label>
                <textarea name="konten" rows="4" required
                    class="w-full bg-gray-800 border border-gray-700 text-white rounded p-2 outline-none focus:border-[#D4F379]"></textarea>
            </div>
            <div>
                <label class="block text-sm text-gray-400 mb-1">Foto/Gambar (Opsional)</label>
                <input type="file" name="gambar" accept="image/*"
                    class="text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-gray-800 file:text-[#D4F379]">
            </div>
            <button type="submit"
                class="bg-[#D4F379] text-gray-900 px-4 py-2 rounded font-semibold hover:bg-[#bce055]">Publikasikan</button>
        </form>
    </div>

    <!-- Tabel Daftar Berita -->
    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-800/50 border-b border-gray-800 text-xs uppercase text-gray-400">
                    <th class="p-4">Tanggal</th>
                    <th class="p-4">Judul</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-800">
                @forelse($berita as $item)
                    <tr class="hover:bg-gray-800/20">
                        <td class="p-4 text-gray-300">{{ $item->created_at->format('d M Y') }}</td>
                        <td class="p-4 text-white font-medium">{{ $item->judul }}</td>
                        <td class="p-4">
                            <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400 text-xs"
                                    onclick="return confirm('Hapus berita ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-6 text-center text-gray-500">Belum ada berita.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection