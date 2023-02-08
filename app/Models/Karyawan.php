<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $guarded = ['id'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function jenis_kelamin()
    {
        return $this->belongsTo(JenisKelamin::class);
    }

    public function gaji_karyawan()
    {
        return $this->hasOne(GajiKaryawan::class);
    }

    public function rincian_gaji()
    {
        return $this->hasOne(RincianGaji::class);
    }

    public function pelanggaran_karyawan()
    {
        return $this->hasMany(PelanggaranKaryawan::class);
    }

    public function bonus_karyawan()
    {
        return $this->hasMany(BonusKaryawan::class);
    }

    public function tunjangan_karyawan()
    {
        return $this->hasMany(TunjanganKaryawan::class);
    }
}
