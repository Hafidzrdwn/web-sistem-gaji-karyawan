<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusKaryawan extends Model
{
    use HasFactory;
    protected $table = 'bonus_karyawan';
    protected $guarded = ['id'];

    public function bonus()
    {
        return $this->belongsTo(Bonus::class);
    }
}
