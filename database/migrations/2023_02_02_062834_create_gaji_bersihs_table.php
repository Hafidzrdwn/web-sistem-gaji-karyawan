<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaji_bersih', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained('karyawan')->cascadeOnDelete();
            $table->foreignId('gaji_id')->constrained('gaji');
            $table->foreignId('tunjangan_karyawan_id')->constrained('tunjangan_karyawan');
            $table->foreignId('pelanggaran_karyawan_id')->constrained('pelanggaran_karyawan');
            $table->foreignId('tambahan_karyawan_id')->constrained('tambahan_karyawan');
            $table->unsignedInteger('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gaji_bersih');
    }
};
