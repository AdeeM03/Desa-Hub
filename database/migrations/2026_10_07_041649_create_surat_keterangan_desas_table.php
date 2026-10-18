<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat_keterangan_desas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_registrasi')->unique();
            $table->enum('jenis_surat', ['sktm', 'skck', 'surat_nikah']);
            $table->string('nama_pemohon');
            $table->string('nik', 20);
            $table->string('no_hp', 20);
            $table->text('alamat');
            $table->string('rt_rw', 20)->nullable();
            $table->text('keperluan');
            $table->json('detail_data')->nullable();
            $table->string('file_path');
            $table->string('file_name');
            $table->unsignedBigInteger('file_size')->nullable();
            $table->string('file_type', 50)->nullable();
            $table->text('keterangan')->nullable();
            $table->string('status')->default('Menunggu Verifikasi');
            $table->text('catatan_petugas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keterangan_desas');
    }
};
