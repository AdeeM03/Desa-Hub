@extends('layouts.admin') <!-- Sesuaikan dengan nama layout admin Anda -->

@section('title', 'Kelola Perangkat Desa')

@section('content')
    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
            <h2 class="text-xl font-bold text-white">Daftar Perangkat Desa</h2>
            <a href="{{ route('admin.perangkat.create') }}"
                class="bg-[#D4F379] text-gray-900 px-4 py-2 rounded-lg text-sm font-bold hover:bg-[#bce055] transition shadow-lg">+
                Tambah Aparatur</a>
        </div>

        @if(session('success'))
            <div class="bg-emerald-500/10 border border-emerald-500/50 text-emerald-400 p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-400">
                <thead class="text-xs uppercase bg-gray-800 text-gray-300">
                    <tr>
                        <th class="px-6 py-3 rounded-tl-lg">Profil</th>
                        <th class="px-6 py-3">Nama & Jabatan</th>
                        <th class="px-6 py-3">Urutan</th>
                        <th class="px-6 py-3 rounded-tr-lg text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($perangkat as $p)
                        <tr class="border-b border-gray-800 hover:bg-gray-800/50 transition">
                            <td class="px-6 py-4">
                                @if($p->foto)
                                    <img src="{{ asset('storage/' . $p->foto) }}"
                                        class="w-12 h-12 rounded-full object-cover border border-gray-600">
                                @else
                                    <div
                                        class="w-12 h-12 rounded-full bg-gray-700 flex items-center justify-center text-white font-bold text-lg">
                                        {{ substr($p->nama, 0, 1) }}
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-white font-bold text-base">{{ $p->nama }}</div>
                                <div class="text-[#D4F379] mt-1">{{ $p->jabatan }}</div>
                            </td>
                            <td class="px-6 py-4 text-center w-20">
                                <span class="bg-gray-800 px-3 py-1 rounded text-white">{{ $p->urutan }}</span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-3">
                                <a href="{{ route('admin.perangkat.edit', $p->id) }}"
                                    class="text-blue-400 hover:text-blue-300">Edit</a>
                                <form action="{{ route('admin.perangkat.destroy', $p->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Yakin ingin mencopot aparatur ini dari sistem?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">Belum ada data perangkat desa. Klik
                                "Tambah Aparatur" untuk memulai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection