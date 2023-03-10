<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TunjanganKaryawan extends Model
{
    use HasFactory;
    protected $table = 'tunjangan_karyawan';
    protected $guarded = ['id'];

    public function tunjangan()
    {
        return $this->belongsTo(Tunjangan::class);
    }
}
