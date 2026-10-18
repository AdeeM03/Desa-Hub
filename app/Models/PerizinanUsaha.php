<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PerizinanUsaha extends Model
{
    use HasFactory;

    protected $table = 'perizinan_usahas';

    protected $fillable = [
        'nomor_registrasi',
        'nama_pemilik',
        'nik',
        'no_hp',
        'nama_usaha',
        'jenis_usaha',
        'alamat_usaha',
        'rt_rw',
        'lama_usaha',
        'jumlah_karyawan',
        'keperluan',
        'detail_data',
        'file_path',
        'file_name',
        'file_size',
        'file_type',
        'keterangan',
        'status',
        'catatan_petugas',
    ];

    protected $casts = [
        'detail_data' => 'array',
    ];

    public function getFileUrlAttribute(): ?string
    {
        return $this->file_path ? Storage::url($this->file_path) : null;
    }

    public static function generateNomorRegistrasi(): string
    {
        $date = now()->format('Ymd');
        $random = strtoupper(substr(uniqid(), -4));
        return "SKU-{$date}-{$random}";
    }
}

