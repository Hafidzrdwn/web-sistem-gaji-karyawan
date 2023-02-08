<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\Models\BonusKaryawan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bonus = Bonus::orderBy('id', 'desc')->get();
        return view('bonus.index', compact('bonus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bonus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bonus::create($request->all());
        return redirect()->route('bonus.index')->with('success', '<strong>Jenis Bonus Baru</strong> berhasil ditambahkan!');
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
    public function edit(Bonus $bonus)
    {
        return view('bonus.edit', compact('bonus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bonus $bonus)
    {
        $bonus->update($request->all());

        return redirect()->route('bonus.index')->with('success', "<strong>Jenis Bonus ({$bonus->jenis})</strong> berhasil diedit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bonus $bonus)
    {
        $bonus->delete();
        return redirect()->route('bonus.index')->with('success', "<strong>Jenis Bonus ({$bonus->jenis})</strong> berhasil dihapus!");
    }

    public function add_bonus(Request $request)
    {
        BonusKaryawan::create([
            'karyawan_id' => $request->karyawan_id,
            'bonus_id' => $request->bonus_id
        ]);

        $karyawan = Karyawan::find($request->karyawan_id);
        $bonus = Bonus::find($request->bonus_id);

        return redirect()->route('karyawan.index')->with('success', "<strong>{$karyawan->nama}</strong> diberi bonus ({$bonus->jenis}) sebesar <strong>" . rupiah($bonus->bonus) . "</strong>");
    }
}
