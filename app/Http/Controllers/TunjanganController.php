<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Tunjangan;
use App\Models\TunjanganKaryawan;
use Illuminate\Http\Request;

class TunjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunjangan = Tunjangan::orderBy('id', 'desc')->get();
        return view('tunjangan.index', compact('tunjangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tunjangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tunjangan::create([
            'jenis' => $request->jenis,
            'jumlah' => ($request->has('khusus')) ? null : $request->jumlah,
            'khusus' => $request->has('khusus'),
        ]);

        return redirect()->route('tunjangan.index')->with('success', '<strong>Tunjangan baru</strong> berhasil ditambahkan!');
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
    public function edit(Tunjangan $tunjangan)
    {
        return view('tunjangan.edit', compact('tunjangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tunjangan $tunjangan)
    {
        $tunjangan->update([
            'jenis' => $request->jenis,
            'jumlah' => ($request->has('khusus')) ? null : $request->jumlah,
            'khusus' => $request->has('khusus'),
        ]);

        return redirect()->route('tunjangan.index')->with('success', "<strong>Tunjangan ({$tunjangan->jenis})</strong> berhasil diedit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tunjangan $tunjangan)
    {
        $tunjangan->delete();
        return redirect()->route('tunjangan.index')->with('success', "<strong>Tunjangan ({$tunjangan->jenis})</strong> berhasil dihapus!");
    }

    public function add_tunjangan(Request $request)
    {

        $tunjangan = Tunjangan::find($request->tunjangan_id);
        $karyawan = Karyawan::find($request->karyawan_id);

        TunjanganKaryawan::create([
            'karyawan_id' => $karyawan->id,
            'tunjangan_id' => $request->tunjangan_id
        ]);

        return redirect()->route('karyawan.index')->with('success', "<strong>{$karyawan->nama}</strong> telah diberi tunjangan ({$tunjangan->jenis})");
    }
}
