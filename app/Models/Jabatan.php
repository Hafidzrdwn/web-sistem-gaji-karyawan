<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table = 'jabatan';
    public function jabatan(){
        return $this->hasOne(Gaji::class, 'jabatan_id', 'id');
    }
}
