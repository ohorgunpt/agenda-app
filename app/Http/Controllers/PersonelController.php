<?php

namespace App\Http\Controllers;

use App\Models\Personel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Unit;
use DB;

class PersonelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personel = Personel::all();
        return view ('personel.index',compact('personel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ambil data unit
        $unit = Unit::all();
        //redirect to create page
        return view('personel.create', compact('unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Function add to database
        //menampilkan pesan error apabila tidak diisi
        $this->validate($request,[
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'unit_id' => 'required'
        ]);
        //mengambil data dari form
        //$nama_satker = $-POST ['nama_satker'];
        $input = $request ->all();
        //insert data ke table balai
        //INSERT INTO personels (nama) VALUES ('$nama);
        Personel::create($input);
        //redirect to index balai
        return redirect()->route('personel.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function show(personel $personel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //passing to edit page
        $personel = Personel::find($id);
        //redirect to edit page
        return view('personel.edit', compact('personel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update data unit
        $this->validate($request,[
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'unit_id' => 'required'
        ]);
        $personel = Personel::find($id);
        $personel->nama = $request->input('nama');
        $personel->nip = $request->input('nip');
        $personel->jabatan = $request->input('jabatan');
        $personel->unit_id = $request->input('unit_id');
        //save/update
        $personel->save();
        //dd($unit);
        return redirect()->route('personel.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Personel::destroy($id);
        //redirect to index personel
        return redirect()->route('personel.index')->with('success', 'Data berhasil dihapus');
    }
}
