<?php

namespace App\Http\Controllers;

use App\Models\JenisKelamin;
use Illuminate\Http\Request;

class JenisKelaminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_kelamin = JenisKelamin::all();
        return view('jk.index', compact('jenis_kelamin'));
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
        JenisKelamin::create($request->all());

        return redirect()->route('jenis_kelamin.index')->with('success', "<strong>Jenis Kelamin Baru</strong> berhasil ditambahkan!");
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
    public function edit(JenisKelamin $jk)
    {
        return view('jk.edit', compact('jk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisKelamin $jk)
    {
        $jk->update($request->all());

        return redirect()->route('jenis_kelamin.index')->with('success', "<strong>Data Jenis Kelamin({$jk->jk})</strong> berhasil diedit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisKelamin $jk)
    {
        $jk->delete();

        return redirect()->route('jenis_kelamin.index')->with('success', "<strong>Data Jenis Kelamin({$jk->jk})</strong> berhasil dihapus!");
    }
}
