<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gaji = Gaji::all();
        $jabatan = Jabatan::all();
        return view('jabatan.index',compact('gaji','jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        return view('jabatan.add',compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' =>'isi :attribute terlebih dahulu',
        ];
        $this->validate ($request,[
            'jabatan_id' => 'required',
            'gaji_pokok' => 'required',     
   
        ],$messages);
        Gaji::create($request->all());
        return redirect('/jabatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gaji = Gaji::find($id);
        return view('jabatan.show',compact('gaji'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gaji = Gaji::find($id);
        $jabatan = Jabatan::all();
        return view('jabatan.edit',compact('gaji','jabatan'));
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

        $messages = [
            'required' =>'isi :attribute terlebih dahulu',
        ];
        $this->validate ($request,[
            'jabatan_id' => 'required',
            'gaji_pokok' => 'required',     
   
        ],$messages);

        $gaji=Gaji::find($id);
        $gaji->jabatan_id = $request->jabatan_id;
        $gaji->gaji_pokok = $request->gaji_pokok;
        $gaji->save();
        return redirect('/jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gaji = Gaji::find($id)->delete();
        return redirect()->back();
    }

    public function add(Request $request){
        $messages = [
            'required' =>'isi :attribute terlebih dahulu',
        ];
        $this->validate ($request,[
            'jabatan' => 'required',     
   
        ],$messages);
        Jabatan::create($request->all());

        return redirect()->back();
    }
}
