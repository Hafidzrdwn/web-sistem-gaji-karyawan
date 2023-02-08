<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\Models\Jabatan;
use App\Models\JenisKelamin;
use App\Models\Karyawan;
use App\Models\Pelanggaran;
use App\Models\Tunjangan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::with('jenis_kelamin', 'jabatan')->orderBy('id', 'desc')->paginate(5);
        return view('karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        $jenis_kelamin = JenisKelamin::all();
        return view('karyawan.create', compact('jabatan', 'jenis_kelamin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Karyawan::create($request->all());

        return redirect()->route('karyawan.index')->with('success', '<strong>Karyawan baru</strong> berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        $jabatan = Jabatan::all();
        $jenis_kelamin = JenisKelamin::all();
        return view('karyawan.edit', compact('karyawan', 'jabatan', 'jenis_kelamin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $karyawan->update($request->all());

        return redirect()->route('karyawan.index')->with('success', "<strong>Karyawan ({$karyawan->nama})</strong> berhasil diedit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', "<strong>Karyawan ({$karyawan->nama})</strong> berhasil dihapus!");
    }

    public function pelanggaran(Karyawan $karyawan)
    {
        $pelanggaran = Pelanggaran::all();
        return view('karyawan.pelanggaran', compact('karyawan', 'pelanggaran'));
    }

    public function bonus(Karyawan $karyawan)
    {
        $bonus = Bonus::all();
        return view('karyawan.bonus', compact('karyawan', 'bonus'));
    }

    public function tunjangan(Karyawan $karyawan)
    {
        $karyawan->load('jabatan');
        $tunjangan = Tunjangan::all();
        return view('karyawan.tunjangan', compact('karyawan', 'tunjangan'));
    }
}
