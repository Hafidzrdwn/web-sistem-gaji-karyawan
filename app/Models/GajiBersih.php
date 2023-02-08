<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiBersih extends Model
{
    use HasFactory;
    protected $table = 'gaji_bersih';
    protected $guarded = ['id'];
}
