<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\Models\BonusKaryawan;
use App\Models\Karyawan;
use App\Models\Pelanggaran;
use App\Models\PelanggaranKaryawan;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::with('jabatan', 'gaji_karyawan.gaji', 'rincian_gaji.gaji_bersih')->orderBy('nama', 'asc')->get();
        return view('gaji.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        $karyawan->load('jabatan', 'gaji_karyawan.gaji', 'rincian_gaji.gaji_bersih', 'pelanggaran_karyawan.pelanggaran', 'bonus_karyawan.bonus', 'tunjangan_karyawan.tunjangan');
        return view('gaji.show', compact('karyawan'));
        // return response()->json($karyawan->load('jabatan', 'gaji_karyawan.gaji', 'rincian_gaji.gaji_bersih', 'pelanggaran_karyawan.pelanggaran', 'bonus_karyawan.bonus', 'tunjangan_karyawan.tunjangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete_pelanggaran(PelanggaranKaryawan $pelanggaranKaryawan)
    {
        $pelanggaranKaryawan->delete();
        return redirect()->back();
    }

    public function delete_bonus(BonusKaryawan $bonusKaryawan)
    {
        $bonusKaryawan->delete();
        return redirect()->back();
    }
}
