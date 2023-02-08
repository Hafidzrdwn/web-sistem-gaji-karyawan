<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiKaryawan extends Model
{
    use HasFactory;
    protected $table = 'gaji_karyawan';
    protected $guarded = ['id'];

    public function gaji()
    {
        return $this->belongsTo(Gaji::class);
    }
}
