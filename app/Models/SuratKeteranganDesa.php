<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SuratKeteranganDesa extends Model
{
    use HasFactory;

    protected $table = 'surat_keterangan_desas';

    protected $fillable = [
        'nomor_registrasi',
        'jenis_surat',
        'nama_pemohon',
        'nik',
        'no_hp',
        'alamat',
        'rt_rw',
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

    public function getJenisSuratLabelAttribute(): string
    {
        return match ($this->jenis_surat) {
            'sktm' => 'Surat Keterangan Tidak Mampu (SKTM)',
            'skck' => 'Surat Pengantar Catatan Kepolisian (SKCK)',
            'surat_nikah' => 'Surat Pengantar Nikah (N1-N4)',
            default => ucfirst(str_replace('_', ' ', $this->jenis_surat)),
        };
    }

    public function getFileUrlAttribute(): ?string
    {
        return $this->file_path ? Storage::url($this->file_path) : null;
    }

    public static function generateNomorRegistrasi(string $jenisSurat): string
    {
        $prefix = match ($jenisSurat) {
            'sktm' => 'SKTM',
            'skck' => 'SKCK',
            'surat_nikah' => 'NIKAH',
            default => 'SKD',
        };

        $date = now()->format('Ymd');
        $random = strtoupper(substr(uniqid(), -4));
        return "{$prefix}-{$date}-{$random}";
    }
}

