@extends('layouts.admin')

@section('title', 'Manajemen Kependudukan')

@section('content')
    <div class="mb-6 flex justify-between items-end">
        <div>
            <h2 class="text-2xl font-semibold text-white mb-1">Permohonan Kependudukan</h2>
            <p class="text-sm text-gray-400">Kelola data permohonan KTP, KK, Akta Kelahiran, dan Pindah Domisili.</p>
        </div>
    </div>

    <!-- Alert Sukses -->
    @if(session('success'))
        <div class="bg-green-500/10 border border-green-500/50 text-green-500 p-4 rounded-lg mb-6 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Data -->
    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-800/50 border-b border-gray-800 text-xs uppercase tracking-wider text-gray-400 font-medium">
                        <th class="p-4">Tanggal</th>
                        <th class="p-4">No. Registrasi</th>
                        <th class="p-4">Nama Pemohon</th>
                        <th class="p-4">Layanan</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-800">
                    @forelse($permohonan as $item)
                        <tr class="hover:bg-gray-800/20 transition">
                            <td class="p-4 text-gray-300">{{ $item->created_at->format('d M Y') }}</td>
                            <td class="p-4 font-mono text-gray-400">{{ $item->nomor_registrasi }}</td>
                            <td class="p-4">
                                <p class="text-white font-medium">{{ $item->nama_pemohon }}</p>
                                <p class="text-xs text-gray-500">NIK: {{ $item->nik }}</p>
                            </td>
                            <td class="p-4 text-gray-300 uppercase text-xs">{{ str_replace('_', ' ', $item->kategori) }}</td>
                            <td class="p-4">
                                @if($item->status == 'Menunggu Verifikasi')
                                    <span class="px-3 py-1 rounded-full bg-yellow-500/10 text-yellow-500 border border-yellow-500/20 text-xs">Menunggu</span>
                                @elseif($item->status == 'Diproses')
                                    <span class="px-3 py-1 rounded-full bg-blue-500/10 text-blue-500 border border-blue-500/20 text-xs">Diproses</span>
                                @elseif($item->status == 'Selesai')
                                    <span class="px-3 py-1 rounded-full bg-green-500/10 text-green-500 border border-green-500/20 text-xs">Selesai</span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-red-500/10 text-red-500 border border-red-500/20 text-xs">Ditolak</span>
                                @endif
                            </td>
                            <td class="p-4">
                                <!-- Form Update Status Singkat (Langsung di baris tabel untuk mempermudah) -->
                                <form action="{{ route('admin.kependudukan.status', $item->id) }}" method="POST" class="flex gap-2">
                                    @csrf
                                    <select name="status" class="bg-gray-800 border border-gray-700 text-white text-xs rounded outline-none p-1.5 focus:border-[#D4F379]">
                                        <option value="Menunggu Verifikasi" {{ $item->status == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu</option>
                                        <option value="Diproses" {{ $item->status == 'Diproses' ? 'selected' : '' }}>Proses</option>
                                        <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="Ditolak" {{ $item->status == 'Ditolak' ? 'selected' : '' }}>Tolak</option>
                                    </select>
                                    <button type="submit" class="bg-[#D4F379] text-gray-900 px-3 py-1.5 rounded text-xs font-semibold hover:bg-[#bce055] transition">
                                        Simpan
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-500">
                                Belum ada data permohonan kependudukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection