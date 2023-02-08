<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianGaji extends Model
{
    use HasFactory;
    protected $table = 'rincian_gaji';
    protected $guarded = ['id'];

    public function gaji_bersih()
    {
        return $this->hasOne(GajiBersih::class);
    }
}
