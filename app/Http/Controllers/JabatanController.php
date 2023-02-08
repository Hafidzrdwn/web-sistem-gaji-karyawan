<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::orderBy('jabatan', 'asc')->paginate(8);
        return view('jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jabatan = Jabatan::create([
            'jabatan' => $request->jabatan,
            'tingkat' => $request->tingkat,
        ]);

        Gaji::create([
            'jabatan_id' => $jabatan->id,
            'gaji_pokok' => $request->gaji_pokok,
        ]);

        return redirect()->route('jabatan.index')->with('success', '<strong>Jabatan baru</strong> berhasil ditambahkan!');
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
    public function edit(Jabatan $jabatan)
    {
        return view('jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $jabatan->update([
            'jabatan' => $request->jabatan,
            'tingkat' => $request->tingkat,
        ]);

        Gaji::where('jabatan_id', $jabatan->id)->update([
            'gaji_pokok' => $request->gaji_pokok,
        ]);

        return redirect()->route('jabatan.index')->with('success', "<strong>Jabatan ({$jabatan->jabatan})</strong> berhasil diedit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();

        return redirect()->route('jabatan.index')->with('success', "<strong>Jabatan {$jabatan->jabatan}</strong> berhasil dihapus!");
    }
}
