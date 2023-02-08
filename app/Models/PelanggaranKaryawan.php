<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelanggaranKaryawan extends Model
{
    use HasFactory;
    protected $table = 'pelanggaran_karyawan';
    protected $guarded = ['id'];

    public function pelanggaran()
    {
        return $this->belongsTo(Pelanggaran::class);
    }
}
