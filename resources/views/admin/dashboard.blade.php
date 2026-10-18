<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Kartu Statistik 1 -->
        <div class="bg-gray-800/50 border border-gray-700 rounded-xl p-6">
            <h3 class="text-gray-400 text-sm font-medium mb-1">Total Permohonan</h3>
            <p class="text-3xl font-bold text-white">12</p>
        </div>

        <!-- Kartu Statistik 2 -->
        <div class="bg-gray-800/50 border border-gray-700 rounded-xl p-6">
            <h3 class="text-gray-400 text-sm font-medium mb-1">Menunggu Verifikasi</h3>
            <p class="text-3xl font-bold text-[#D4F379]">8</p>
        </div>

        <!-- Kartu Statistik 3 -->
        <div class="bg-gray-800/50 border border-gray-700 rounded-xl p-6">
            <h3 class="text-gray-400 text-sm font-medium mb-1">Selesai Diproses</h3>
            <p class="text-3xl font-bold text-white">4</p>
        </div>
    </div>

    <div class="bg-gray-800/30 border border-gray-700 rounded-xl p-6 text-center py-12">
        <h2 class="text-xl text-gray-300 font-medium mb-2">Selamat datang di Dasbor DesaHub</h2>
        <p class="text-gray-500 text-sm">Pilih menu di samping kiri untuk mulai mengelola data permohonan warga.</p>
    </div>
@endsection