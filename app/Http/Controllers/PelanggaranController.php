<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Pelanggaran;
use App\Models\PelanggaranKaryawan;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggaran = Pelanggaran::orderBy('id', 'desc')->get();
        return view('pelanggaran.index', compact('pelanggaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pelanggaran::create($request->all());

        return redirect()->route('pelanggaran.index')->with('success', '<strong>Jenis Pelanggaran baru</strong> berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggaran $pelanggaran)
    {
        return view('pelanggaran.edit', compact('pelanggaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggaran $pelanggaran)
    {
        $pelanggaran->update($request->all());

        return redirect()->route('pelanggaran.index')->with('success', "<strong>Pelanggaran ({$pelanggaran->jenis})</strong> berhasil diedit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggaran $pelanggaran)
    {
        $pelanggaran->delete();

        return redirect()->route('pelanggaran.index')->with('success', "<strong>Pelanggaran ({$pelanggaran->jenis})</strong> berhasil dihapus!");
    }

    public function add_pelanggaran(Request $request)
    {
        PelanggaranKaryawan::create([
            'karyawan_id' => $request->karyawan_id,
            'pelanggaran_id' => $request->pelanggaran_id
        ]);

        $karyawan = Karyawan::find($request->karyawan_id);
        $pelanggaran = Pelanggaran::find($request->pelanggaran_id);

        if ($karyawan == null) {
            return redirect()->route('karyawan.index')->with('success', "Karyawan telah <strong>dikeluarkan</strong> dari perusahaan karena pelanggaran berat.");
        }

        return redirect()->route('karyawan.index')->with('success', "Gaji <strong>{$karyawan->nama}</strong> dipotong <strong>" . rupiah($pelanggaran->potongan_gaji) . "</strong> karena <strong>{$pelanggaran->jenis}</strong>");
    }
}
