<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AdministrasiKependudukan extends Model
{
    use HasFactory;

    protected $table = 'administrasi_kependudukans';

    protected $fillable = [
        'nomor_registrasi',
        'kategori',
        'nama_pemohon',
        'nik',
        'no_kk',
        'no_hp',
        'alamat',
        'rt_rw',
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

    public function getKategoriLabelAttribute(): string
    {
        return match ($this->kategori) {
            'ktp' => 'Pengurusan KTP',
            'kartu_keluarga' => 'Kartu Keluarga (KK)',
            'akta_kelahiran' => 'Akta Kelahiran',
            'pindah_domisili' => 'Surat Pindah Domisili',
            default => ucfirst(str_replace('_', ' ', $this->kategori)),
        };
    }

    public function getFileUrlAttribute(): ?string
    {
        return $this->file_path ? Storage::url($this->file_path) : null;
    }

    public static function generateNomorRegistrasi(string $kategori): string
    {
        $prefix = match ($kategori) {
            'ktp' => 'KTP',
            'kartu_keluarga' => 'KK',
            'akta_kelahiran' => 'AKTA',
            'pindah_domisili' => 'PNDH',
            default => 'ADM',
        };

        $date = now()->format('Ymd');
        $random = strtoupper(substr(uniqid(), -4));
        return "{$prefix}-{$date}-{$random}";
    }
}

